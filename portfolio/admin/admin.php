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

        <div class="admin-container">
            <div class="last-project">
                <h2>Dernier Projet</h2>
                    <?php
                        // Récupère toutes les informations de tous les projets
                        $select_project = $conn->prepare("SELECT *, p.ID as id_projet FROM projets p LEFT JOIN video_ytb s ON p.`ID-video` = s.id ORDER BY p.date1 DESC LIMIT 1");
                        $select_project->execute();
                        if($select_project->rowCount() > 0){
                            while($fetch_project = $select_project->fetch(PDO::FETCH_ASSOC)){
                                // Extraire l'ID de la vidéo YouTube à partir de l'URL
                                preg_match('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=)?([a-zA-Z0-9_-]+)/', $fetch_project['lien_ytb'], $matches);
                                $videoId = $matches[1] ?? null;
                    ?>
                    <article class="projets">
                        <h3><?= _($fetch_project['titre']);?></h3>
                        <?php
                            // Vérifie si une image est présente dans la base de données
                            if (empty($fetch_project['image'])) {
                                // Affiche l'iframe pour la vidéo YouTube
                                echo '<iframe class="videoYT" id="desfac_vid" src="https://www.youtube.com/embed/' . htmlspecialchars($videoId) . '" 
                                    title="' . htmlspecialchars($fetch_project['titre_ytb']) . '" framebprojet="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>';
                            } else {
                                // Affiche le lien avec l'image
                                echo '<img src="../images/miniature/' . htmlspecialchars($fetch_project['image']) . '" class="videoYT" id="img_lien" 
                                    alt="Cliquez pour voir le Court-Métrage" onclick="window.open(" ' . htmlspecialchars($fetch_project['lien_projet']) . ');"/>';
                            }
                        ?>
                            <h4><?= _($fetch_project['type1']);?></h4>
                        <p><em><?= $fetch_project['short_synopsis'] == NULL
                            ? _($fetch_project['synopsis'] )
                            : _($fetch_project['short_synopsis']); ?></em></p>
                        <p><?= $fetch_project['short_vue_ensemble'] == NULL
                            ? _($fetch_project['vue_ensemble']) 
                            : _($fetch_project['short_vue_ensemble']); ?></p>
                        <p id="plus"><strong><a href="../fiche-projet.php?pid=<?= $fetch_project['id_projet']; ?>"><?= _("EN SAVOIR PLUS"); ?></a></strong></p>
                    </article>
                    <?php
                            }
                        }else{
                            echo '<p class="empty">Aucun projet disponible</p>';
                        }
                    ?>
            </div>
            <div class="dashboard">
                <?php
                // Compteur de projets
                $select_projets = $conn->prepare("SELECT * FROM `projets`");
                $select_projets->execute();
                $numbers_of_projets = $select_projets->rowCount();

                // Chemin du fichier compteur
                $fichier = '../FichiersTechniques/compteur.txt';
                
                // Lire le contenu du fichier et le convertir en nombre
                $visites = file_exists($fichier) ? (int) file_get_contents($fichier) : 0;

                // Vérifier si l'utilisateur est l'admin principal (ID 1)
                $admin_id = $_SESSION['admin_id'] ?? 0;
                $is_super_admin = ($admin_id == 1 || $admin_id == 2);

                // Liste des autres admins
                $select_admins = $conn->prepare("SELECT * FROM `admin` WHERE id != 1");
                $select_admins->execute();
                $admins = $select_admins->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <h2>Dashboard</h2>
                
                <div class="box-container">

                    <!-- Box : Nombre de projets -->
                    <div class="box">
                        <h4>Projets</h4>
                        <p><?= $numbers_of_projets; ?></p>
                    </div>

                    <!-- Box : Compteur de visites -->
                    <div class="box">
                        <h4>Visites</h4>
                        <p id="compteur"><?= $visites; ?></p>
                    </div>

                    <!-- Box : Modifier compte -->
                    <div class="box">
                        <h4>Modifier</h4>
                        <button id="modifier-compte" type="button" onclick="loadModal('modif-admin.php')">Modifier Compte</button>
                    </div>

                    <?php if ($is_super_admin): ?>
                        <!-- Box : Gestion des administrateurs -->
                        <div class="box" id="super">
                            <h4>Admins</h4>
                            <div class="admin-table-container">
                                <table border="1" cellspacing="0" cellpadding="5">
                                    <tbody>
                                        <?php foreach ($admins as $admin): ?>
                                            <tr class="admin-list">
                                                <td><?= htmlspecialchars($admin['name']); ?></td>
                                                <td class="delete-admin">
                                                    <a href="#" onclick="deleteAdmin(<?= $admin['ID']; ?>)" class="delete-btn">Supprimer</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="2" style="text-align: center;">
                                                <button id="add-admin" type="button" onclick="loadModal('add-admin.php')">Ajouter un admin</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id="modalContainer"></div>

        <script src="../component/admin.js"></script>
    </body>
</html>