<?php
include '../component/connect.php';
session_start();

// Vérification de l'identifiant admin
if (!isset($_SESSION['admin_id'])) {
   header("location:admin-login.php");
}

// Vérifiez si le formulaire est soumis
if (isset($_POST['add_projet'])) {
      // Commencez une transaction
      $conn->beginTransaction();

      try {
         include '../component/resize.php';

         // --- Gestion de l'image du produit ---
         $image1 = null; // Par défaut, pas d'image
         if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
            try {
               $target_folder = '../images/miniature/';
               $target_name = $_POST['titre']; // Utilisez le titre comme nom pour l'image
               $image1 = resizeAndSaveImage($_FILES['image1'], $target_folder, $target_name);

               // Le chemin de l'image redimensionnée est stocké dans $image1
               echo "Image redimensionnée et enregistrée : " . $image1;
            } catch (Exception $e) {
               // Gérer les erreurs (par exemple, extensions non autorisées, erreur de téléchargement, etc.)
               echo "Erreur : " . $e->getMessage();
            }
         }

         // --- Insertion dans la table video_ytb ---
         $query = "INSERT INTO `video_ytb` (`lien_ytb`, `titre_ytb`, `image`) VALUES (?, ?, ?)";
         $stmt = $conn->prepare($query);
         $stmt->execute([$_POST['youtube_link'], $_POST['titreYTB'], $image1]);
         $video_id = $conn->lastInsertId();

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


         // --- Insertion dans la table projets ---
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

         // --- Insertion des étapes ---
         if (isset($_POST['etape_nom']) && is_array($_POST['etape_nom'])) {
            foreach ($_POST['etape_nom'] as $index => $etape_nom) {
                  if (!empty($etape_nom)) {
                     $etape_desc = $_POST['etape_desc'][$index] ?? null;

                     // Ajouter l'étape
                     $query = "INSERT INTO `etapes` (`titre_etape`, `detail_etape`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$etape_nom, $etape_desc]);
                     $etape_id = $conn->lastInsertId();

                     // Associer l'étape au projet
                     $query = "INSERT INTO `projets-etapes` (`ID-Projet`, `ID-Etape`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$project_id, $etape_id]);
                  }
            }
         }

         // --- Insertion des objectifs ---
         if (isset($_POST['objectif_nom']) && is_array($_POST['objectif_nom'])) {
            foreach ($_POST['objectif_nom'] as $index => $objectif_nom) {
                  if (!empty($objectif_nom)) {
                     $objectif_desc = $_POST['objectif_desc'][$index] ?? null;

                     // Ajouter l'objectif
                     $query = "INSERT INTO `objectifs` (`titre_objectif`, `detail_objectif`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$objectif_nom, $objectif_desc]);
                     $objectif_id = $conn->lastInsertId();

                     // Associer l'objectif au projet
                     $query = "INSERT INTO `projets-objectifs` (`ID-Projet`, `ID-Objectif`) VALUES (?, ?)";
                     $stmt = $conn->prepare($query);
                     $stmt->execute([$project_id, $objectif_id]);
                  }
            }
         }

         // --- Confirmation de la transaction ---
         $conn->commit();
         header("location:admin.php");
         exit;

      } catch (Exception $e) {
         $conn->rollBack();
         die("Erreur : " . $e->getMessage());
      }
   }
?>


<!DOCtype html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/style.css" />
      <link rel="stylesheet" href="../css/admin.css" />
      <link rel="icon" href="../images/iconeM.ico" type="image/x-icon"/>
      <title>Admin</title>
      <style>
         .input-group {
            margin-bottom: 15px;
         }
         .hidden {
            display: none;
         }
      </style>
   </head>
   <body>
      
      <main>
      <section class="form-add">
      <button id="retour" onclick="redirectToPage()">Retour à la page Admin</button>
      <h1 id="add-projet">Ajouter un projet</h1>
         <form class="projet" action="" method="POST" enctype="multipart/form-data">

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
            
            <h2>Contenu multimédia</h2>

            <div class="general" id="G2">
               <div >
                  <label for="lien_proj">Lien vers le projet :</label>
                  <input type="text" name="lien_proj" id="lien_proj" class="boite duo" required>
               </div>

               <div >
                  <label for="titreYTB">Titre YouTube :</label>
                  <input type="text" name="titreYTB" id="titreYTB" required class="boite duo">
               </div>

               <div >
                  <label for="youtube_link">Lien YouTube :</label>
                  <input type="url" name="youtube_link" id="youtube_link" placeholder="https://www.youtube.com/watch?v=..." class="boite duo">
               </div>

               <div >
                  <label for="image1">image (format JPG, PNG) :</label>
                  <input type="file" name="image1" id="image1" accept="image/*" class="boite duo">
               </div>
            </div>

            
            <h2>Synopsis</h2>
            <div id="synopsis-container">
               <div class="synopsis">
                  <textarea name="synopsis" id="add_synopsis" cols="40"  required></textarea>
                  <textarea class="hidden" name="short_synopsis" id="short_synopsis" cols="40"></textarea>
               </div>
            </div>
            <button type="button" onclick="shortSynopsis()" id="shortSB">Ajouter un synopsis court</button>
            <button class="hidden" type="button" onclick="supprimerShortS()" id="RshortSB">Supprimer</button><br><br>


            <h2>Vue d'ensemble</h2>
            <div id="resume-container">
               <div class="resume">
                  <textarea name="vue_ensemble" id="vue_ensemble" cols="40" required></textarea>
                  <textarea class="hidden" name="short_vue_ensemble" id="short_resume" cols="40"></textarea>
               </div>
            </div>
            <button type="button" onclick="shortVueEnsemble()" id="shortRB">Ajouter un résumé court</button>
            <button class="hidden" type="button" onclick="supprimerShortR()" id="RshortRB" >Supprimer</button><br><br>


            <!-- Objectifs -->
            <h2>Objectifs</h2>
            <div id="objectifs-container">
               <div class="objectif">
                     <label for="objectif_nom[]">Nom de l'objectif :</label>
                     <input type="text" name="objectif_nom[]" required>
                     <label for="objectif_desc[]">description :</label>
                     <textarea name="objectif_desc[]"></textarea>
               </div>
            </div>
            <button type="button" onclick="ajouterObjectif()">Ajouter un objectif</button><br>


            <!-- Étapes -->
            <h2>Étapes</h2>
            <div id="etapes-container">
               <div class="etape">
                     <label for="etape_nom[]">Nom de l'étape :</label>
                     <input type="text" name="etape_nom[]" required>
                     <label for="etape_desc[]">description :</label>
                     <textarea name="etape_desc[]"></textarea>
               </div>
            </div>
            <button type="button" onclick="ajouterEtape()">Ajouter une étape</button><br>

            <h2>Avis Personnel :</h2>
            <div id="avis-container">
               <div class="avis">
                  <textarea name="avis_perso" id="avis_perso" cols="50"></textarea>
               </div>
            </div>
            
            <br><input id="btn-add" name="add_projet" type="submit" value="Ajouter le projet">
         </form>
      </section>
      </main>

      <script src="../component/admin.js"></script>
   </body>
</html>