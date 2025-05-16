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
        <section class="cv" id="resume_cv">
            <?php
                $select_cv = $conn->prepare("SELECT * FROM curriculum_vitae");
                $select_cv->execute();
                if($select_cv->rowCount() > 0){
                    $fetch_cv = $select_cv->fetch(PDO::FETCH_ASSOC);
            ?>
            <h2><a class="cv-modal" href="#">Curriculum Vitae - Matthieu Thiesset</a></h2>
                <div id="resume_container">
                    <div class="div_resume_cv">
                    
                        <p class="resume_cv "><?= _("Né le 12 Septembre 2005 ("). calculerAge() ._("&nbsp;ans),") ?><br>
                            <?= $fetch_cv['adresse'] ?><br>
                            <srong><?= htmlspecialchars($fetch_cv['telephone']) ?></srong> - <?= htmlspecialchars($fetch_cv['mail']) ?><br>
                            Portfolio : <strong><a target="_blank" href="https://matthieuthiesset.fr">https://matthieuthiesset.fr</a></strong></p>
                    </div>
                    <div class="div_resume_cv">
                        <p class="resume_cv"><?= _($fetch_cv['description']) ?></p>
                    </div>
                </div><?php }; ?>
        </section>
        <div id="separateur"></div>
        <section class="cv" id="detail_cv">
            <div class="cv_parts" id="cv_part1">
                <article class="cv_info" id="experience">
                    
                <h3>Experiences</h3>
                    <ul>
                        <?php
                            $select_xp = $conn->prepare("SELECT 
                                                            e.*, 
                                                            e.id AS xp_id,
                                                            df.aujourdhui AS df_aujourdhui,
                                                            df.complete AS df_complete,
                                                            dd.complete AS dd_complete,
                                                            dd.mois AS dd_mois,
                                                            dd.annee AS dd_annee
                                                        FROM 
                                                            experiences AS e
                                                        JOIN 
                                                            `date` AS df ON e.fin = df.id
                                                        JOIN 
                                                            `date` AS dd ON e.debut = dd.id
                                                        ORDER BY 
                                                            df.aujourdhui DESC,  
                                                            df.complete DESC,     
                                                            dd.complete DESC,
                                                            dd.annee DESC,
                                                            dd.mois DESC;");
                            $select_xp->execute();
                            if($select_xp->rowCount() > 0){
                                while($fetch_xp = $select_xp->fetch(PDO::FETCH_ASSOC)){
                                    
                                    $fetch_xp['dd_complete'] == NULL ? $date_debut = $fetch_xp['dd_mois'] . ' ' . $fetch_xp['dd_annee'] : $date_debut = formatingDate($fetch_xp['dd_complete'], true);
                                    $fetch_xp['df_aujourdhui'] == 1 ? $date_fin = "AUJOURD'HUI" : $date_fin = formatingDate($fetch_xp['df_complete'], true);
                        ?>
                        <li class="xp" id="<?= $fetch_xp['id'] ?>">
                            <h4>
                                <strong>
                                    <?php if ($fetch_xp['site']) : ?>
                                        <a target="_blank" href="<?= $fetch_xp['site'] ?>">
                                            <?= $fetch_xp['entreprise'] ?>
                                        </a>
                                    <?php else : ?>
                                        <?= $fetch_xp['entreprise'] ?>
                                    <?php endif; ?>
                                </strong>,
                                <?= $fetch_xp['ville'] ?> - <strong><em><?= _($fetch_xp['poste']); ?></em></strong>
                            </h4>
                            <h5><em><?= _($date_debut ." - " . $date_fin); ?></em></h5>
                            <p><?= _($fetch_xp['description']); ?></p>
                        </li>
                        <?php
                                }
                            }else{
                                echo '<p class="empty">Aucune expérience à afficher</p>';
                            }
                        ?>
                        <li class="xp new" id="0">
                            <p id="add"><a id="la">+</a></p>
                        </li>
                    </ul>
                </article>
                <article class="cv_info" id="formation">
                    <h3><?= _("Formation"); ?></h3>
                    <ul>
                        <?php
                            $select_formation = $conn->prepare("SELECT 
                                                            f.*, 
                                                            f.id AS f_id,
                                                            df.aujourdhui AS df_aujourdhui,
                                                            df.complete AS df_complete,
                                                            dd.complete AS dd_complete,
                                                            dd.mois AS dd_mois,
                                                            dd.annee AS dd_annee,
                                                            df.mois AS df_mois,
                                                            df.annee AS df_annee
                                                        FROM 
                                                            formations AS f
                                                        JOIN 
                                                            `date` AS df ON f.fin = df.id
                                                        LEFT JOIN 
                                                            `date` AS dd ON f.debut = dd.id
                                                        ORDER BY 
                                                            df.aujourdhui DESC,  
                                                            df.complete DESC,     
                                                            dd.complete DESC,
                                                            dd.annee DESC,
                                                            dd.mois DESC;");
                            $select_formation->execute();
                            if($select_formation->rowCount() > 0){
                                while($fetch_formation = $select_formation->fetch(PDO::FETCH_ASSOC)){

                                    if($fetch_formation['debut'] != NULL){
                                        $fetch_formation['dd_complete'] == NULL ? $date_debut = $fetch_formation['dd_mois'] . ' ' . $fetch_formation['dd_annee'] : $date_debut = formatingDate($fetch_formation['dd_complete'], true);
                                    };
                                    $fetch_formation['df_aujourdhui'] == 1 ? $date_fin = "AUJOURD'HUI" :
                                        ($fetch_formation['df_complete'] == NULL ? $date_fin = $fetch_formation['df_mois'] . ' ' . $fetch_formation['df_annee'] :
                                            $date_fin = formatingDate($fetch_formation['df_complete'], true));
                        ?>
                        <li class="ft" id="<?= $fetch_formation['id'] ?>">
                            <h4><strong><?= $fetch_formation['site'] ? "<a target=\"_blank\" href=\"{$fetch_formation['site']}\">" : "" ?>
                            <?= $fetch_formation['etablissement'] ?></a></strong>, <?= $fetch_formation['ville'] ?> - <strong><em><?= _($fetch_formation['diplome']); ?></em></strong></h4>
                            <h5><em><?= _( !empty($date_debut) ? $date_debut ." - " . $date_fin : $date_fin); ?></em></h5>
                            <p><?= _( $fetch_formation['description']); ?></p>
                        </li>
                        <?php
                            $date_debut = NULL;
                                }
                            }else{
                                echo '<p class="empty">Aucune formation à afficher</p>';
                            }
                        ?>
                        <li class="ft new" id="0">
                            <p id="add"><a id="la">+</a></p>
                        </li>
                    </ul>
                </article>
            </div>
            <div class="cv_parts" id="cv_part2">
                <article class="cv_info" id="competences">
                    <h3><?= _("Compétences"); ?></h3>
                    <ul>
                        <li class="ct" id="1">
                            <?php
                                $select_ss = $conn->prepare("SELECT 
                                                                c.*, 
                                                                s.titre
                                                            FROM 
                                                                competences AS c
                                                            JOIN 
                                                                skill AS s ON s.id = 1;");
                                $select_ss->execute();
                                if($select_ss->rowCount() > 0){
                                    $fetch_ss = $select_ss->fetch(PDO::FETCH_ASSOC);
                                } 
                            ?>
                            <p id="soft_skills"><?= _($fetch_ss["titre"]); ?></p>
                        </li>
                        <?php
                            $select_categorie = $conn->prepare("SELECT 
                                                            c.*
                                                        FROM 
                                                            competences AS c
                                                        WHERE
                                                            c.id != 1;");
                            $select_categorie->execute();
                            if($select_categorie->rowCount() > 0){
                                while($fetch_categorie = $select_categorie->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li class="ct" id="<?= $fetch_categorie['id'] ?>">
                            <p><strong><?= _($fetch_categorie["categorie"] ."&nbsp;:"); ?></strong> 

                                <?php
                                    $select_skill = $conn->prepare("SELECT 
                                                                        s.*
                                                                    FROM 
                                                                        skill AS s
                                                                    WHERE
                                                                        s.categorie = ?;");
                                    $select_skill->execute([$fetch_categorie["id"]]);
                                    if($select_skill->rowCount() > 0){
                                        while($fetch_skill = $select_skill->fetch(PDO::FETCH_ASSOC)){
                                            $skill = formatingSkill($fetch_skill["titre"], $fetch_skill["niveau"])
                                ?>

                                <span class="comp"><img class="img_comp" src=<?=$skill["img"]; ?>>&nbsp;<?= _($skill["nom"]); ?>&nbsp;<img class="img_comp" src=<?= "../images/lvl-competences/". $skill["lvl"] .".png"; ?>></span>
                                
                                <?php
                                        }
                                    }else{
                                        echo '<p class="empty">Aucune compétence à afficher</p>';
                                    }
                                ?></p>
                        </li>
                        <?php
                                }
                            }else{
                                echo '<p class="empty">Aucune compétence à afficher</p>';
                            }
                        ?>
                        <li class="ct new" id="0">
                            <p id="add"><a id="la">+</a></p>
                        </li>                    
                    </ul>
                </article>
                <article class="cv_info" id="hobbys">
                    <h3><?= _("Centres d'intérêt"); ?></h3>
                    <ul>
                        <?php
                            $select_ci = $conn->prepare("SELECT ci.* FROM 
                                                            centres_interet AS ci;");
                            $select_ci->execute();
                            if($select_ci->rowCount() > 0){
                                while($fetch_ci = $select_ci->fetch(PDO::FETCH_ASSOC)){
                        ?>   
                        <li class="ci" id="<?= $fetch_ci['id'] ?>">
                            <p><strong><?= _($fetch_ci['titre'] . "&nbsp;"); ?>: </strong>
                            <?= _($fetch_ci['description']); ?></p>
                        </li>
                        <?php
                                }
                            }else{
                                echo '<p class="empty">Aucun centres d\'intérêt à afficher</p>';
                            }
                        ?>
                        <li class="ci new" id="0">
                            <p id="add"><a id="la">+</a></p>
                        </li>
                    </ul>
                </article>
            </div>
        </section>
        <div id="modalContainer"></div>
        <?php
            function formatingDate($date, $uppercaseMonth = false) {
                $dateObj = dateTime::createFromFormat('Y-m-d', $date);
                $formatteddate = $dateObj->format('j F Y');

                // Convertir le mois en français
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
                $formatteddate = strtr($formatteddate, $months);

                if ($uppercaseMonth) {
                    return mb_strtoupper($formatteddate);
                }
                
                return $formatteddate;
            };

            function formatingSkill($texte, $entier) {
                $repertoire = "../images/logos-competences/";

                $lvl = sprintf("%02d", $entier);

                $img = strtolower($texte);
                $img = str_replace([' ', '/', '&nbsp;', '-'], '_', $img);

                $img = str_replace(
                    ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'],
                    ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'],
                    $img
                );

                $mots = explode('_', $img);

                if (is_dir($repertoire)) {
                    $fichiers = scandir($repertoire);
            
                    $verifierImage = function($mot) use ($fichiers, $repertoire) {
                        foreach ($fichiers as $fichier) {
                            if (preg_match("/logo_(" . preg_quote($mot, '/') . ").*\.png/i", $fichier)) {
                                return $repertoire . DIRECTORY_SEPARATOR . $fichier;
                            }
                        }
                        return null;
                    };
 
                    for ($i = 0; $i < count($mots); $i++) {
                        $combinaison = $mots[$i];
                        for ($j = $i + 1; $j < count($mots); $j++) {
                            $img = $verifierImage($combinaison);
                            if ($img) {
                                break 2;
                            }
                            $combinaison .= '_' . $mots[$j];
                        }
                        $img = $verifierImage($combinaison);
                        if ($img) {
                            break;
                        }
                    }
                }
                if ($img === null) {
                    $img = $repertoire . "logo_default.svg";
                }

                return [
                    'img' => $img,
                    'nom' => $texte,
                    'lvl' => $lvl
                ];
            };

            function calculerAge() {
                $dateNaissance = new DateTime("2005-09-12");
                $aujourdHui = new DateTime();
                $age = $aujourdHui->diff($dateNaissance)->y;
                return $age;
            };

            
        ?>
        <script src="../component/modal.js"></script>
        <script src="../component/admin.js"></script>
    </body>
</html>