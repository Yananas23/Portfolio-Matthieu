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
        <div class="page_projet">
            <?php
                // Récupère toutes les informations de tous les projets
                $pid = $_GET['pid'];
                $select_projects = $conn->prepare("SELECT 
                                                        *
                                                    FROM 
                                                        projets p
                                                    LEFT JOIN 
                                                        video_ytb v ON p.`ID-video` = v.ID
                                                    WHERE 
                                                        p.ID = ?;");
                $select_projects->execute([$pid]);
                if($select_projects->rowCount() > 0){
                    while($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)){
                    // Extraire l'ID de la vidéo YouTube à partir de l'URL
                    preg_match('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=)?([a-zA-Z0-9_-]+)/', $fetch_projects['lien_ytb'], $matches);
                    $videoId = $matches[1] ?? null;
                    $date1 = $fetch_projects["date1"];
                    $date1Obj = dateTime::createFromFormat('Y-m-d', $date1);
                    $formatteddate1 = $date1Obj->format('j F Y');

                    // Convertir le mois en français
                    if($_SESSION['locale'] == 'fr_FR'){
                        $months = [
                            'January' => 'Janvier',
                            'February' => 'Février',
                            'March' => 'Mars',
                            'April' => 'Avril',
                            'May' => 'Mai',
                            'June' => 'Juin',
                            'July' => 'Juillet',
                            'August' => 'Août',
                            'September' => 'Septembre',
                            'October' => 'Octobre',
                            'November' => 'Novembre',
                            'December' => 'Décembre'
                        ];
                        $formatteddate1 = strtr($formatteddate1, $months);
                    }

                    
            ?>
            <section class="projet" id="titre">
                <h2 id="titre_projet"><?= $fetch_projects['titre']; ?></h2>
                <h3 id="infos_projet"><?= _($fetch_projects['type1']); ?> - <?= $fetch_projects['duree']; ?> - <?= $formatteddate1; ?> - <a target="_blank" href="<?= $fetch_projects['lien_projet']; ?>"><?= $fetch_projects['titre']; ?></a></h3>
            </section>
            <section class="projet" id="vue_dEnsemble">
                <article id="article_projet">
                <div id="div_synopsis">
                    <div class="media_container">
                        <?php
                            if (empty($fetch_projects['image'])) {
                                echo '<iframe class="article_proj" id="vid_PR" src="https://www.youtube.com/embed/' . htmlspecialchars($videoId) . '" 
                                    title="' . htmlspecialchars($fetch_projects['titre_ytb']) . '" frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>';
                            } else {
                                echo '<a id="lien_img" target="_blank" href=" '. htmlspecialchars($fetch_projects['lien_projet']) . '">
                                    <img src="./images/miniature/' . htmlspecialchars($fetch_projects['image']) . '" class="article_proj" id="vid_PR" 
                                    alt="Cliquez pour voir le Court-Métrage"/>
                                </a>';
                            }
                        ?>
                    </div>
                    <div class="text_container">
                        <h2><?= _("Vue d'ensemble"); ?></h2>
                        <p class="article_proj" id="synopsis">
                            <strong>Synopsis&nbsp;:</strong> 
                            <em>“<?= _($fetch_projects['synopsis']); ?>”</em><br><br>
                            <?= _($fetch_projects['vue_ensemble']); ?>
                        </p>
                    </div>
                </div>
                </article>
            </section>
            <?php }}; ?>
            <section class="projet" id="detail">
                <article id="etapes">
                    <article id="objectifs">
                        <h2><?= _("Objectifs&nbsp;"); ?>:</h2>
                        <ul>
                            <?php 
                                $pid = $_GET['pid'];
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
                                if($select_projects->rowCount() > 0){
                                    while($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <li><p><strong><?= _($fetch_projects['titre_objectif']); ?>&nbsp;:</strong> <?= _($fetch_projects['detail_objectif']); ?></p></li>
                            </li>
                            <?php }}?>
                        </ul>
                    </article>
                    <h2><?= _("Grandes étapes"); ?></h2>
                    <ul>
                        <?php 
                            $pid = $_GET['pid'];
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
                            if($select_projects->rowCount() > 0){
                                while($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li>
                            <h3><?= _($fetch_projects['titre_etape']); ?></h3>
                            <p><?= _($fetch_projects['detail_etape']); ?></p>
                        </li>
                        <?php }}?>
                    </ul>
                </article>
            </section>
            <section class="projet" id="retour">
                <article id="avis_final">
                <?php
                    // Récupère toutes les informations de tous les projets
                    $pid = $_GET['pid'];
                    $select_projects = $conn->prepare("SELECT avis_perso FROM projets WHERE ID = ?;");
                    $select_projects->execute([$pid]);
                    if($select_projects->rowCount() > 0){
                        while($fetch_projects = $select_projects->fetch(PDO::FETCH_ASSOC)){
                ; ?>
                    <h2><?= _("Avis global personnel"); ?></h2>
                    <p><?= _($fetch_projects['avis_perso']); ?></p>
                <?php }}?>
                </article>
            </section>
            <section class="projet" id="nav_projet">
                <?php $pid = $_GET['pid'];
                    $select_projects = $conn->prepare("SELECT 
                                                        *
                                                    FROM 
                                                        projets p
                                                    WHERE
                                                        p.ID=?;");
                    $select_projects->execute([$pid]);
                    $projet = $select_projects->fetch(PDO::FETCH_ASSOC);

                    // Projet suivant (par date1 croissante)
                    $querySuivant = $conn ->prepare("SELECT ID, date1, titre
                                                    FROM projets 
                                                    WHERE date1 > ?
                                                    AND date1 <= CURDATE()
                                                    AND archived = 0
                                                    ORDER BY date1 ASC 
                                                    LIMIT 1");
                    $querySuivant->execute([$projet['date1']]);
                    $suivant = $querySuivant->fetch(PDO::FETCH_ASSOC);

                    // Projet précédent (par date1 décroissante)
                    $queryPrecedent = $conn->prepare("SELECT ID, date1, titre
                                                    FROM projets 
                                                    WHERE date1 < ?
                                                    AND date1 <= CURDATE()
                                                    AND archived = 0
                                                    ORDER BY date1 DESC 
                                                    LIMIT 1");
                    $queryPrecedent->execute([$projet['date1']]);
                    $precedent = $queryPrecedent->fetch(PDO::FETCH_ASSOC);
                ; ?>
                <?php if ($precedent): ?>
                    <a href="?pid=<?= $precedent['ID'] ?>" class="nav_projet" id="proj_precedent">⬅️ <?= $precedent['titre']; ?></a>
                <?php endif; ?>

                <?php if ($suivant): ?>
                    <a href="?pid=<?= $suivant['ID'] ?>" class="nav_projet" id="proj_suivant"><?= $suivant['titre']; ?> ➡️</a>
                <?php endif; ?>
            </section>
        </div>
        <?php include "./component/footer.php"; ?>
    </body>
</html>