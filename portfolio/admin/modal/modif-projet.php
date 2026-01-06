<?php
include '../../component/connect.php';
session_start();

$pid = $_SESSION['pid'];

// Vérifiez si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $conn->beginTransaction();
   $pid = $_SESSION['pid'];

   try {
      include '../../component/resize.php';

      // --- Gestion de l'image du produit ---
      $image1 = null; // Par défaut, pas d'image
      if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
         try {
            $target_folder = '../../images/miniature/';
            $target_name = $_POST['titre']; // Utilisez le titre comme nom pour l'image

            // Récupérer l'ancienne image avant de la remplacer
            $query_old_image = "SELECT `image` FROM `video_ytb` WHERE `ID` = ?";
            $stmt_old_image = $conn->prepare($query_old_image);
            $stmt_old_image->execute([$video_id]);
            $old_image_path = $stmt_old_image->fetchColumn();

            // Supprimer l'ancienne image si elle existe
            if ($old_image_path) {
               deleteFile($old_image_path); // Utilisation de la fonction externe
            }

            $image1 = resizeAndSaveImage($_FILES['image1'], $target_folder, $target_name);

            // Le chemin de l'image redimensionnée est stocké dans $image1
            echo "Image redimensionnée et enregistrée : " . $image1;
         } catch (Exception $e) {
            // Gérer les erreurs (par exemple, extensions non autorisées, erreur de téléchargement, etc.)
            echo "Erreur : " . $e->getMessage();
         }
      }

      $query_video_id = "SELECT `ID-video` FROM `projets` WHERE `ID` = ?";
      $stmt = $conn->prepare($query_video_id);
      $stmt->execute([$pid]);
      $video_id = $stmt->fetchColumn();

      if ($image1 === null) {
         $query_update = "UPDATE `video_ytb` 
                           SET `lien_ytb` = ?, `titre_ytb` = ? 
                           WHERE `ID` = ?";
         $params = [$_POST['youtube_link'], $_POST['titreYTB'], $video_id];
      } else {
         $query_update = "UPDATE `video_ytb` 
                           SET `lien_ytb` = ?, `titre_ytb` = ?, `image` = ? 
                           WHERE `ID` = ?";
         $params = [$_POST['youtube_link'], $_POST['titreYTB'], $image1, $video_id];
      }
      $stmt_update = $conn->prepare($query_update);
      $stmt_update->execute($params);


      // --- Récupération et validation des champs synopsis et vue d'ensemble ---
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

      // --- Mise à jour dans la table projets ---
      $query = "UPDATE `projets` 
                  SET `titre` = ?, `type1` = ?, `role` = ?, `duree` = ?, `date1` = ?,
                     `lien_projet` = ?, `synopsis` = ?, `short_synopsis` = ?, 
                     `vue_ensemble` = ?, `short_vue_ensemble` = ?, `avis_perso` = ? 
                  WHERE `ID` = ?";
      $stmt = $conn->prepare($query);
      $stmt->execute([
         $_POST['titre'],
         $_POST['type1'],
         $_POST['role'],
         $_POST['duree'],
         $_POST['date1'],
         $_POST['lien_proj'],
         $synopsis,
         $short_synopsis,
         $vue_ensemble,
         $short_vue_ensemble,
         $_POST['avis_perso'],
         $pid
      ]);

      // --- Mise à jour ou remplacement des étapess ---
      if (isset($_POST['etape_nom']) && is_array($_POST['etape_nom'])) {
         foreach ($_POST['etape_nom'] as $index => $etape_nom) {
            $etape_desc = $_POST['etape_desc'][$index] ?? null;
            $etape_id = $_POST['etape_id'][$index] ?? null;

            if ($etape_id) {
               // Mise à jour de l'étape existante
               $query = "UPDATE `etapes`
                              SET `titre_etape` = ?, `detail_etape` = ?
                              WHERE `ID` = ?";
               $stmt = $conn->prepare($query);
               $stmt->execute([$etape_nom, $etape_desc, $etape_id]);
            } else {
               // Ajout d'une nouvelle étape
               $query = "INSERT INTO `etapes` (`titre_etape`, `detail_etape`) VALUES (?, ?)";
               $stmt = $conn->prepare($query);
               $stmt->execute([$etape_nom, $etape_desc]);
               $etape_id = $conn->lastInsertId();

               // Associer l'étape au projet
               $query = "INSERT INTO `projets-etapes` (`ID-Projet`, `ID-Etape`) VALUES (?, ?)";
               $stmt = $conn->prepare($query);
               $stmt->execute([$pid, $etape_id]);
            }
         }
      }

      // --- Mise à jour ou remplacement des objectifs ---
      if (isset($_POST['objectif_nom']) && is_array($_POST['objectif_nom'])) {
         foreach ($_POST['objectif_nom'] as $index => $objectif_nom) {
            $objectif_desc = $_POST['objectif_desc'][$index] ?? null;
            $objectif_id = $_POST['objectif_id'][$index] ?? null;

            if ($objectif_id) {
               // Mise à jour de l'objectif existant
               $query = "UPDATE `objectifs`
                              SET `titre_objectif` = ?, `detail_objectif` = ?
                              WHERE `ID` = ?";
               $stmt = $conn->prepare($query);
               $stmt->execute([$objectif_nom, $objectif_desc, $objectif_id]);
            } else {
               // Ajout d'un nouvel objectif
               $query = "INSERT INTO `objectifs` (`titre_objectif`, `detail_objectif`) VALUES (?, ?)";
               $stmt = $conn->prepare($query);
               $stmt->execute([$objectif_nom, $objectif_desc]);
               $objectif_id = $conn->lastInsertId();

               // Associer l'objectif au projet
               $query = "INSERT INTO `projets-objectifs` (`ID-Projet`, `ID-objectif`) VALUES (?, ?)";
               $stmt = $conn->prepare($query);
               $stmt->execute([$pid, $objectif_id]);
            }
         }
      }


      // Confirmer la transaction
      $conn->commit();
      echo "Projet modifié avec succès";
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
<div class="modal modif-projet" id="modifProjectModal">
   <div class="modal-content form-mod">
      <span class="close" id="closeModalBtn">&times;</span>
      <?php
      // Récupère toutes les informations de tous les projets
      $pid = $_SESSION['pid'];
      $select_projects = $conn->prepare("SELECT 
                                                   *
                                                FROM 
                                                   projets p
                                                LEFT JOIN 
                                                   video_ytb v ON p.`ID-video` = v.ID
                                                WHERE 
                                                   p.ID = ?;");
      $select_projects->execute([$pid]);
      if ($select_projects->rowCount() > 0) {
         while ($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)) {
            $avis_perso = $fetch_projects['avis_perso'];
            ?>
            <h1 id="update-projet">Modifier un projet</h1>
            <form class="projet" method="POST" action="./modal/modif-projet.php" data-reload>

               <!-- Info général (toujours visible) -->
               <div class="general">
                  <input type="text" name="titre" id="titre" class="boite" required required
                     value="<?= htmlspecialchars($fetch_projects['titre'] ?? ''); ?>">
                  <input type="text" name="type1" id="type1" class="boite" required required
                     value="<?= htmlspecialchars($fetch_projects['type1'] ?? ''); ?>">
                  <input type="text" name="role" id="role" class="boite" required
                     value="<?= htmlspecialchars($fetch_projects['role'] ?? ''); ?>">
                  <div id="duree-total">
                     <label for="duree">Durée :</label>
                     <input type="time" step="1" name="duree" id="duree" class="boite duo" required
                        value="<?= htmlspecialchars($fetch_projects['duree'] ?? ''); ?>">
                  </div>
                  <div id="date-sortie">
                     <label for="date1">Date de sortie :</label>
                     <input type="date" name="date1" id="date1" class="boite duo" required
                        value="<?= htmlspecialchars($fetch_projects['date1'] ?? ''); ?>">
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
                              <input type="text" name="lien_proj" id="lien_proj" class="boite duo" required
                                 value="<?= $fetch_projects['lien_projet']; ?>">
                           </div>
                           <div class="input-group">
                              <label for="titreYTB">Titre YouTube :</label>
                              <input type="text" name="titreYTB" id="titreYTB" class="boite duo"
                                 value="<?= $fetch_projects['titre_ytb']; ?>">
                           </div>
                           <div class="input-group">
                              <label for="youtube_link">Lien YouTube :</label>
                              <input type="url" name="youtube_link" id="youtube_link"
                                 value="<?= $fetch_projects['lien_ytb']; ?>" class="boite duo">
                           </div>
                           <div class="input-group">
                              <label for="image1">Image (format JPG, PNG) :</label>
                              <input type="file" name="image1" id="image1" accept="image/*" class="boite duo">
                           </div>
                        </div>

                        <div id="image-display">
                           <?php if (!empty($fetch_projects['image'])): ?>
                              <label for="external_image1">Image actuelle :</label>
                              <img src="../images/miniature/<?= htmlspecialchars($fetch_projects['image']); ?>"
                                 alt="Image actuelle">
                           <?php endif; ?>
                        </div>
                     </div>
                  </section>

                  <!-- Synopsis -->
                  <section class="section">
                     <h2>Synopsis</h2>
                     <div id="synopsis-container">
                        <div class="synopsis">
                           <textarea name="synopsis" id="add_synopsis" cols="40"
                              required><?= $fetch_projects['synopsis']; ?></textarea>

                           <?php if (isset($fetch_projects['short_synopsis']) && $fetch_projects['short_synopsis'] !== '') { ?>
                              <textarea name="short_synopsis" id="short_synopsis" cols="40">
                              <?= trim(htmlspecialchars($fetch_projects['short_synopsis'])); ?></textarea>
                           </div>
                        </div>
                        <button class="modaleBtn hidden" type="button" onclick="shortSynopsis()" id="shortSB">Ajouter un synopsis
                           court</button>
                        <button class="modaleBtn" type="button" onclick="supprimerShortS()" id="RshortSB">Supprimer</button>
                     <?php } else {
                              ; ?>
                        <textarea class="hidden" name="short_synopsis" id="short_synopsis" cols="40"></textarea>
                  </div>
            </div>
            <button class="modaleBtn" type="button" onclick="shortSynopsis()" id="shortSB">Ajouter un synopsis court</button>
            <button class="modaleBtn hidden" type="button" onclick="supprimerShortS()" id="RshortSB">Supprimer</button>
         <?php }
                           ; ?>
         </section>

         <!-- Vue d'ensemble -->
         <section class="section">
            <h2>Vue d'ensemble</h2>
            <div id="resume-container">
               <div class="resume">
                  <textarea name="vue_ensemble" id="vue_ensemble" cols="40"
                     required><?= $fetch_projects['vue_ensemble']; ?></textarea>

                  <?php if (isset($fetch_projects['short_vue_ensemble']) && $fetch_projects['short_vue_ensemble'] !== '') { ?>
                     <textarea name="short_vue_ensemble" id="short_resume" cols="40">
                              <?= htmlspecialchars($fetch_projects['short_vue_ensemble']); ?></textarea>
                  </div>
               </div>
               <button class="modaleBtn hidden" type="button" onclick="shortVueEnsemble()" id="shortRB">Ajouter un résumé
                  court</button>
               <button class="modaleBtn" type="button" onclick="supprimerShortR()" id="RshortRB">Supprimer</button>
            <?php } else {
                     ; ?>
               <textarea class="hidden" name="short_vue_ensemble" id="short_resume"
                  cols="40"><?= htmlspecialchars($fetch_projects['short_vue_ensemble']); ?></textarea>
         </div>
         </div>
         <button class="modaleBtn" type="button" onclick="shortVueEnsemble()" id="shortRB">Ajouter un résumé court</button>
         <button class="modaleBtn hidden" type="button" onclick="supprimerShortR()" id="RshortRB">Supprimer</button>
      <?php }
                  ; ?>
      </section>

      <!-- Objectifs (avec scrollbar si trop d'éléments) -->
      <section class="section">
         <h2>Objectifs</h2>
         <div id="objectifs-container" class="scrollable">
            <?php
            $pid = $_SESSION['pid'];
            $select_projects = $conn->prepare("SELECT 
                                                         o.*
                                                      FROM 
                                                         projets p
                                                      LEFT JOIN 
                                                         `projets-objectifs` ti1 ON p.ID = ti1.`ID-Projet`
                                                      LEFT JOIN 
                                                         objectifs o ON ti1.`ID-Objectif` = o.ID
                                                      WHERE 
                                                         p.ID = ?;");
            $select_projects->execute([$pid]);
            if ($select_projects->rowCount() > 0) {
               while ($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)) {
                  ; ?>
                  <div class="objectif" data-id="<?= $fetch_projects['ID']; ?>">
                     <input type="hidden" name="objectif_id[]" value="<?= $fetch_projects['ID']; ?>">
                     <label for="objectif_nom[]">Nom de l'objectif :</label>
                     <input type="text" name="objectif_nom[]" required value="<?= $fetch_projects['titre_objectif']; ?>">
                     <label for="objectif_desc[]">description :</label>
                     <textarea name="objectif_desc[]"><?= $fetch_projects['detail_objectif']; ?></textarea>
                     <button id="suppr" type="button" class="supprimer"
                        onclick="supprimerElement(this, 'objectif')">Supprimer</button>
                  </div>
               <?php }
            }
            ; ?>
         </div>
         <button class="modaleBtn" type="button" onclick="ajouterObjectif()">Ajouter un objectif</button>
      </section>

      <!-- Étapes (avec scrollbar si trop d'éléments) -->
      <section class="section">
         <h2>Étapes</h2>
         <div id="etapes-container" class="scrollable">
            <?php
            $pid = $_SESSION['pid'];
            $select_projects = $conn->prepare("SELECT 
                                                         e.*
                                                      FROM 
                                                         projets p
                                                      LEFT JOIN 
                                                         `projets-etapes` ti1 ON p.ID = ti1.`ID-Projet`
                                                      LEFT JOIN 
                                                         etapes e ON ti1.`ID-Etape` = e.ID
                                                      WHERE 
                                                         p.ID = ?;");
            $select_projects->execute([$pid]);
            if ($select_projects->rowCount() > 0) {
               while ($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <div class="etape" data-id="<?= $fetch_projects['ID']; ?>">
                     <input type="hidden" name="etape_id[]" value="<?= $fetch_projects['ID']; ?>">
                     <label for="etape_nom[]">Nom de l'étape :</label>
                     <input type="text" name="etape_nom[]" required value="<?= $fetch_projects['titre_etape']; ?>">
                     <label for="etape_desc[]">description :</label>
                     <textarea name="etape_desc[]"><?= $fetch_projects['detail_etape']; ?></textarea>
                     <button id="suppr" type="button" class="supprimer" onclick="supprimerElement(this, 'etape')">Supprimer</button>
                  </div>
               <?php }
            }
            ; ?>
         </div>
         <button class="modaleBtn" type="button" onclick="ajouterEtape()">Ajouter une étape</button>
      </section>

      <!-- Avis personnel & Bouton d'envoi -->
      <section class="section">
         <h2>Avis personnel</h2>
         <div id="avis-container">
            <div class="avis">
               <textarea name="avis_perso" id="avis_perso" cols="50"><?= $avis_perso; ?></textarea>
            </div>
         </div>
         <button id="btn-mod" class="modaleBtn" name="update_projet" type="submit">Modifier le projet</button>
      </section>

      </div>
      </form>
   <?php }
      }
      ; ?>
<!-- Boutons de navigation -->
<div id="navBtn">
   <button id="prevBtn" onclick="prevSection()" style="display: none;">⬅ Précédent</button>
   <button id="nextBtn" onclick="nextSection()">Suivant ➡</button>
</div>
</div>
</div>