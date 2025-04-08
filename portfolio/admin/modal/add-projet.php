<?php
include '../../component/connect.php';
session_start();

// Vérifiez si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $conn->beginTransaction();

      try {
         include '../../component/resize.php';

         $image1 = null; 
         if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
            try {
               $target_folder = '../../images/miniature/';
               $target_name = $_POST['titre']; 
               $image1 = resizeAndSaveImage($_FILES['image1'], $target_folder, $target_name);

               echo "Image redimensionnée et enregistrée : " . $image1 . "\n";
            } catch (Exception $e) {
               echo "Erreur : " . $e->getMessage();
            }
         }

         $query = "INSERT INTO `video_ytb` (`lien_ytb`, `titre_ytb`, `image`) VALUES (?, ?, ?)";
         $stmt = $conn->prepare($query);
         $stmt->execute([$_POST['youtube_link'], $_POST['titreYTB'], $image1]);
         $video_id = $conn->lastInsertId();

         $synopsis = isset($_POST['synopsis']) ? trim($_POST['synopsis']) : null;
         $short_synopsis = isset($_POST['short_synopsis']) ? trim($_POST['short_synopsis']) : null;
         if ($short_synopsis === '') {
            $short_synopsis = null;
         }

         $vue_ensemble = isset($_POST['vue_ensemble']) ? trim($_POST['vue_ensemble']) : null;
         $short_vue_ensemble = isset($_POST['short_vue_ensemble']) ? trim($_POST['short_vue_ensemble']) : null;
         if ($short_vue_ensemble === '') {
            $short_vue_ensemble = null;
         }

         if (empty($synopsis) || empty($vue_ensemble)) {
            throw new Exception("Erreur : Le synopsis ou la vue d'ensemble sont vides.");
         }

         $query = "INSERT INTO `projets` 
                  (`titre`, `type1`, `duree`, `date1`, `lien_projet`, `synopsis`, `short_synopsis`, `vue_ensemble`, `short_vue_ensemble`, `avis_perso`, `ID-video`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $conn->prepare($query);
         $stmt->execute([
            $_POST['titre'], $_POST['type1'], $_POST['duree'], $_POST['date1'], 
            $_POST['lien_proj'], $synopsis, $short_synopsis, $vue_ensemble, 
            $short_vue_ensemble, $_POST['avis_perso'], $video_id
         ]);
         $project_id = $conn->lastInsertId();

         if (isset($_POST['etape_nom']) && is_array($_POST['etape_nom'])) {
            foreach ($_POST['etape_nom'] as $index => $etape_nom) {
                  if (!empty($etape_nom)) {
                     $etape_desc = $_POST['etape_desc'][$index] ?? null;

                     $query = "INSERT INTO `etapes` (`titre_etape`, `detail_etape`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$etape_nom, $etape_desc]);
                     $etape_id = $conn->lastInsertId();

                     $query = "INSERT INTO `projets-etapes` (`ID-Projet`, `ID-Etape`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$project_id, $etape_id]);
                  }
            }
         }

         if (isset($_POST['objectif_nom']) && is_array($_POST['objectif_nom'])) {
            foreach ($_POST['objectif_nom'] as $index => $objectif_nom) {
                  if (!empty($objectif_nom)) {
                     $objectif_desc = $_POST['objectif_desc'][$index] ?? null;

                     $query = "INSERT INTO `objectifs` (`titre_objectif`, `detail_objectif`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$objectif_nom, $objectif_desc]);
                     $objectif_id = $conn->lastInsertId();

                     $query = "INSERT INTO `projets-objectifs` (`ID-Projet`, `ID-Objectif`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$project_id, $objectif_id]);
                  }
            }
         }

         $conn->commit();
         echo "Projet ajouté avec succès";
         exit;

      } catch (Exception $e) {
         $conn->rollBack();
         echo "Erreur : " . $e->getMessage();
         exit;
      }
   }
?>

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal add-projet" id="addProjectModal">
   <div class="modal-content form-add">
      <span class="close" id="closeModalBtn">&times;</span>
      <h1 id="add-projet">Ajouter un projet</h1>
      <form class="projet" method="POST" action="./modal/add-projet.php" data-reload>

         <!-- Info général (toujours visible) -->
         <div class="general">
            <input type="text" name="titre" id="titre" class="boite" required placeholder="Titre">
            <input type="text" name="type1" id="type1" class="boite" required placeholder="Type">
            <div id="duree-total">
               <label for="duree">Durée :</label>
               <input type="time" step="1" name="duree" id="duree" class="boite duo" required>
            </div>
            <div id="date-sortie">
               <label for="date1">Date de sortie :</label>
               <input type="date" name="date1" id="date1" class="boite duo" required>
            </div>
         </div>

         <!-- Conteneur des sections -->
         <div id="sections-container">

            <!-- Contenu multimédia (visible au départ) -->
            <section class="section active">
               <h2>Contenu multimédia</h2>
               <div class="general" id="G2">
                  <div class="grid-container">
                        <div class="input-group">
                           <label for="lien_proj">Lien vers le projet :</label>
                           <input type="text" name="lien_proj" id="lien_proj" class="boite duo" required>
                        </div>
                        <div class="input-group">
                           <label for="titreYTB">Titre YouTube :</label>
                           <input type="text" name="titreYTB" id="titreYTB" class="boite duo">
                        </div>
                        <div class="input-group">
                           <label for="youtube_link">Lien YouTube :</label>
                           <input type="url" name="youtube_link" id="youtube_link" placeholder="https://www.youtube.com/watch?v=..." class="boite duo">
                        </div>
                        <div class="input-group">
                           <label for="image1">Image (format JPG, PNG) :</label>
                           <input type="file" name="image1" id="image1" accept="image/*" class="boite duo">
                        </div>
                  </div>
               </div>
            </section>
            
            <!-- Synopsis -->
            <section class="section">
               <h2>Synopsis</h2>
               <div id="synopsis-container">
                  <div class="synopsis">
                     <textarea name="synopsis" id="add_synopsis" cols="40" required></textarea>
                     <textarea class="hidden" name="short_synopsis" id="short_synopsis" cols="40"></textarea>
                  </div>
               </div>
               <button class="modaleBtn" type="button" onclick="shortSynopsis()" id="shortSB">Ajouter un synopsis court</button>
               <button class="modaleBtn hidden" type="button" onclick="supprimerShortS()" id="RshortSB">Supprimer</button>
            </section>

            <!-- Vue d'ensemble -->
            <section class="section">
               <h2>Vue d'ensemble</h2>
               <div id="resume-container">
                  <div class="resume">
                     <textarea name="vue_ensemble" id="vue_ensemble" cols="40" required></textarea>
                     <textarea class="hidden" name="short_vue_ensemble" id="short_resume" cols="40"></textarea>
                  </div>
               </div>
               <button class="modaleBtn" type="button" onclick="shortVueEnsemble()" id="shortRB">Ajouter un résumé court</button>
               <button class="modaleBtn hidden" type="button" onclick="supprimerShortR()" id="RshortRB">Supprimer</button>
            </section>

            <!-- Objectifs (avec scrollbar si trop d'éléments) -->
            <section class="section">
               <h2>Objectifs</h2>
               <div id="objectifs-container" class="scrollable">
                  <div class="objectif">
                     <label for="objectif_nom[]">Nom de l'objectif :</label>
                     <input type="text" name="objectif_nom[]" required>
                     <label for="objectif_desc[]">Description :</label>
                     <textarea name="objectif_desc[]"></textarea>
                  </div>
               </div>
               <button class="modaleBtn" type="button" onclick="ajouterObjectif()">Ajouter un objectif</button>
            </section>

            <!-- Étapes (avec scrollbar si trop d'éléments) -->
            <section class="section">
               <h2>Étapes</h2>
               <div id="etapes-container" class="scrollable">
                  <div class="etape">
                     <label for="etape_nom[]">Nom de l'étape :</label>
                     <input type="text" name="etape_nom[]" required>
                     <label for="etape_desc[]">Description :</label>
                     <textarea name="etape_desc[]"></textarea>
                  </div>
               </div>
               <button class="modaleBtn" type="button" onclick="ajouterEtape()">Ajouter une étape</button>
            </section>

            <!-- Avis personnel & Bouton d'envoi -->
            <section class="section">
               <h2>Avis personnel</h2>
               <div id="avis-container">
                  <div class="avis">
                     <textarea name="avis_perso" id="avis_perso" cols="50"></textarea>
                  </div>
               </div>
               <button id="btn-add" class="modaleBtn" name="add_projet" type="submit">Ajouter le projet</button>
            </section>

         </div>
      </form>
      <!-- Boutons de navigation -->
      <div id="navBtn">
         <button id="prevBtn" onclick="prevSection()" style="display: none;">⬅ Précédent</button>
         <button id="nextBtn" onclick="nextSection()">Suivant ➡</button>
      </div>
   </div>
</div>
