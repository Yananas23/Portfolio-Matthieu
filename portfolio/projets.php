<?php 
    require_once './component/traduction.php';
    include "./component/connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <meta name="viewport" content="width=device-width, minimum-scale=0.5"/>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="icon" href="./images/iconeM.ico" type="image/x-icon"/>
        <title><?= _("Matthieu Thiesset - Portfolio"); ?></title>
    </head>
    <body>
        <?php include "./component/header.php"; ?>
        <section id="liste_projets">
            <h2 id="liste_title"><?= _("Liste des projets auxquels j'ai participé"); ?></h2>
            <div id="liste_page_projets">
                <ul id="liste_generale">
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
                    <li>
                        <article class="projets">
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
                                echo '<img src="./images/miniature/' . htmlspecialchars($fetch_projects['image']) . '" class="videoYT" id="img_lien" 
                                    alt="Cliquez pour voir le Court-Métrage" onclick="window.open(" ' . htmlspecialchars($fetch_projects['lien_projet']) . ');"/>';
                            }
                        ?>
                            <h4><?= _($fetch_projects['type1']);?></h4>
                        <p><em><?= $fetch_projects['short_synopsis'] == NULL
                            ? _($fetch_projects['synopsis']) 
                            : _($fetch_projects['short_synopsis']); ?></em></p>
                        <p><?= $fetch_projects['short_vue_ensemble'] == NULL
                            ? _($fetch_projects['vue_ensemble']) 
                            : _($fetch_projects['short_vue_ensemble']); ?></p>
                        <p id="plus"><strong><a href="fiche-projet.php?pid=<?= $fetch_projects['id_projet']; ?>"><?= _("EN SAVOIR PLUS"); ?></a></strong></p>
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
        <?php include "./component/footer.php"; ?>
    </body>
</html>