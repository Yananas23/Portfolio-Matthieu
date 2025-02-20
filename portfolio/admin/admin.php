<?php
include '../component/connect.php';
session_start();

// Vérification de l'identifiant admin
if (!isset($_SESSION['admin_id'])) {
    header("location:./admin-login.php");
}; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <meta name="viewport" content="width=device-width, minimum-scale=0.5"/>
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="icon" href="../images/iconeM.ico" type="image/x-icon"/>
        <title>Admin</title>
    </head>
    <body>
        <?php include "../component/admin-header.php"; ?>
        <section id="liste_projets">
            <h2 id="liste_title">Liste des projets auxquels j'ai participé</h2>
            <div id="liste_page_projets">
                <ul id="liste_generale">
                    <li>
                        <article class="projets">
                            <p id="add"><a id="la" href="./add-projet.php">+</a></p>
                        </article>
                    </li>
                    <?php
                        // Récupère toutes les informations de tous les projets
                        $select_projects = $conn->prepare("SELECT *, p.ID as id_projet FROM projets p LEFT JOIN video_ytb s ON p.`ID-video` = s.ID ORDER BY p.date1 DESC");
                        $select_projects->execute();
                        if($select_projects->rowCount() > 0){
                            while($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)){
                                // Extraire l'ID de la vidéo YouTube à partir de l'URL
                                preg_match('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=)?([a-zA-Z0-9_-]+)/', $fetch_projects['lien_ytb'], $matches);
                                $videoId = $matches[1] ?? null;
                    ?>
                    <li><article class="projets">
                        <h3><?= $fetch_projects['titre'];?></h3>
                        <?php
                            // Vérifie si une image est présente dans la base de données
                            if (empty($fetch_projects['image'])) {
                                // Affiche l'iframe pour la vidéo YouTube
                                echo '<iframe class="videoYT" id="desfac_vid" src="https://www.youtube.com/embed/' . htmlspecialchars($videoId) . '" 
                                    title="' . htmlspecialchars($fetch_projects['titre_ytb']) . '" frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>';
                            } else {
                                // Affiche le lien avec l'image
                                echo '<img src="../images/miniature/' . htmlspecialchars($fetch_projects['image']) . '" class="videoYT" id="img_lien" 
                                    alt="Cliquez pour voir le Court-Métrage" onclick="window.open(" ' . htmlspecialchars($fetch_projects['lien_projet']) . ');"/>';
                            }
                        ?>
                            <h4><?= $fetch_projects['type1'];?></h4>
                        <p><em><?= $fetch_projects['short_synopsis'] == NULL
                            ? $fetch_projects['synopsis'] 
                            : $fetch_projects['short_synopsis']; ?></em></p>
                        <p><?= $fetch_projects['short_vue_ensemble'] == NULL
                            ? $fetch_projects['vue_ensemble'] 
                            : $fetch_projects['short_vue_ensemble']; ?></p>
                        <p id="plus"><strong><a href="modif-projet.php?pid=<?= $fetch_projects['id_projet']; ?>">Modifier</a></strong></p>
                    </article></li>
                    <?php
                            }
                        }else{
                            echo '<p class="empty">Aucun projet disponible</p>';
                        }
                    ?>
                </ul>
            </div>
        </section>
        <script>
            function deconnexion(){
                fetch("../component/disconnect.php",{ // Appeler le fichier générique
               method: 'POST',
               headers: {
                     'Content-Type': 'application/json',
               }});
               alert('Vous êtes déconnecté.')
            }

            function updateTranslations() {
                fetch('../component/generate_po.php', { method: 'POST' })
                    .then(response => {
                        if (response.ok) {
                            alert("Les fichiers de traduction ont été mis à jour !");
                        } else {
                            alert("Une erreur s'est produite lors de la mise à jour.");
                        }
                    })
                    .catch(error => {
                        console.error("Erreur :", error);
                        alert("Impossible de mettre à jour les fichiers de traduction.");
                    });
            }
        </script>
    </body>
</html>