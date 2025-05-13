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
        <link rel="stylesheet" href="../css/admin.css" />
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
                        <article class="projets" id="article_add_projet">
                            <p id="add"><a href="#liste_projets" id="la" onclick="loadModal('add-projet.php');">+</a></p>
                        </article>
                    </li>
                    <?php
                        // Récupère toutes les informations de tous les projets
                        $firstLoadItems = 5; // Nombre d'éléments au chargement initial
                        $itemsPerPage = 6;   // Nombre d'éléments à charger après

                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                        if ($page === 1) {
                            $offset = 0;
                            $itemsToShow = $firstLoadItems;
                        } else {
                            // Ajustement de l'offset pour inclure les 2 premiers projets
                            $offset = $firstLoadItems + ($page - 2) * $itemsPerPage;
                            $itemsToShow = $itemsPerPage;
                        }

                        $select_projects = $conn->prepare("SELECT *, p.ID as id_projet
                                                                        FROM projets p
                                                                        LEFT JOIN video_ytb s ON p.`ID-video` = s.ID
                                                                        ORDER BY p.date1 DESC
                                                                        LIMIT :limit OFFSET :offset");
                        $select_projects->bindValue(':limit', $itemsToShow, PDO::PARAM_INT);
                        $select_projects->bindValue(':offset', $offset, PDO::PARAM_INT);
                        $select_projects->execute();
                        if($select_projects->rowCount() > 0){
                            while($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)){
                                // Extraire l'ID de la vidéo YouTube à partir de l'URL
                                preg_match('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=)?([a-zA-Z0-9_-]+)/', $fetch_projects['lien_ytb'], $matches);
                                $videoId = $matches[1] ?? null;
                                $fetch_projects['archived'] == 1 ? $pClass = "projets archived" : $pClass = "projets";
                                $pID = "projet-" . $fetch_projects['id_projet'];
                    ?>
                    <li class="more">
                        <article class="<?= $pClass; ?>" id="<?= $pID; ?>">
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
                                    $projet_link = "'" . htmlspecialchars($fetch_projects['lien_projet'], ENT_QUOTES, 'UTF-8') . "'";
                                    echo '<img src="../images/miniature/' . htmlspecialchars($fetch_projects['image']) . '" class="videoYT" id="img_lien" 
                                        alt="Cliquez pour voir le Court-Métrage" onclick="window.open('. $projet_link .');"/>';
                                }
                            ?>
                            <h4><?= _($fetch_projects['type1']);?></h4>
                            <p><em><?= $fetch_projects['short_synopsis'] == NULL
                                ? _($fetch_projects['synopsis']) 
                                : _($fetch_projects['short_synopsis']); ?></em></p>
                            <p><?= $fetch_projects['short_vue_ensemble'] == NULL
                                ? _($fetch_projects['vue_ensemble']) 
                                : _($fetch_projects['short_vue_ensemble']); ?></p>

                            <div id="plus">
                                <strong><a href="#liste_projets" id="modifier" onclick="setSessionAndLoadModal('<?= $fetch_projects['id_projet']; ?>');">Modifier</a></strong>
                                <strong><a id="supprimer" onclick="deleteProject('<?= $fetch_projects['id_projet']; ?>'); return false;" >Supprimer</a></strong>
                                <?php 
                                if ($fetch_projects['archived'] == 1) {
                                    ?>
                                    <strong><a id="archiver" onclick="archiveProject('<?= $fetch_projects['id_projet']; ?>', '<?= $fetch_projects['archived']; ?>'); return false;" >Désarchiver</a></strong>
                                <?php } else {
                                    ?>
                                    <strong><a id="archiver" onclick="archiveProject('<?= $fetch_projects['id_projet']; ?>', '<?= $fetch_projects['archived']; ?>'); return false;" >Archiver</a></strong>
                                <?php } ?>
                            </div>
                        </article>
                    </li>
                    <?php
                            }
                        }else{
                            echo '<p class="empty">Aucun projet disponible</p>';
                        }
                    ?>
                </ul>
            </div>
            <div id="load-more"> load more </div>
        </section>
        <div id="modalContainer"></div>
        
        <script src="../component/admin.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let loadMoreBtn = document.querySelector('#load-more');
                let currentPage = 1;
                let totalProjects = <?= $conn->query("SELECT COUNT(*) FROM projets")->fetchColumn(); ?>; 
                let firstLoadItems = 5;
                let itemsPerPage = 6;

                // Vérifier si le bouton doit être caché dès le début
                if (firstLoadItems >= totalProjects) {
                    loadMoreBtn.style.display = 'none';
                }

                loadMoreBtn.addEventListener('click', () => {
                    currentPage++;
                    fetch(`?page=${currentPage}`)
                        .then(response => response.text())
                        .then(data => {
                            let parser = new DOMParser();
                            let doc = parser.parseFromString(data, 'text/html');
                            let newProjects = doc.querySelectorAll('li.more');

                            newProjects.forEach(project => {
                                let list = document.querySelector('#liste_generale');
                                list.appendChild(project); // Ajoute le projet à la fin de la liste
                            });

                            let totalLoaded = document.querySelectorAll('li.more').length;
                            if (totalLoaded >= totalProjects) {
                                loadMoreBtn.style.display = 'none';
                            }
                        })
                        .catch(error => console.error('Erreur lors du chargement des projets:', error));
                });
            });
        </script>
    </body>
</html>