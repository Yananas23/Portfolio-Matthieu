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

        <script>
            document.querySelectorAll('li.xp').forEach(el => {
                el.addEventListener('click', () => {
                    const id = el.id;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../component/set_session.php?id=" + id, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Charger la modale après avoir défini la variable de session
                            loadModal('experience.php');
                            setTimeout(() => {
                                const modal = document.getElementById('modal');
                                if (modal) {
                                    modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            }, 100);
                            observerModaleEtInit();
                        }
                    };
                    xhr.send();
                });
            });

            // Empêche les clics sur les liens dans .xp de déclencher l'ouverture de la modale
            document.querySelectorAll('.xp:not(.new) a').forEach(a => {
                a.addEventListener('click', e => e.stopPropagation());
            });

            document.querySelectorAll('li.ft').forEach(el => {
                el.addEventListener('click', () => {
                    const id = el.id;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../component/set_session.php?id=" + id, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Charger la modale après avoir défini la variable de session
                            loadModal('formation.php');
                            setTimeout(() => {
                                const modal = document.getElementById('modal');
                                if (modal) {
                                    modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            }, 100);
                            observerModaleEtInit();
                        }
                    };
                    xhr.send();
                });
            });

            // Empêche les clics sur les liens dans .ft de déclencher l'ouverture de la modale
            document.querySelectorAll('.ft:not(.new) a').forEach(a => {
                a.addEventListener('click', e => e.stopPropagation());
            });

            document.querySelectorAll('li.ci').forEach(el => {
                el.addEventListener('click', () => {
                    const id = el.id;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../component/set_session.php?id=" + id, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Charger la modale après avoir défini la variable de session
                            loadModal('centreInteret.php');
                            setTimeout(() => {
                                const modal = document.getElementById('modal');
                                if (modal) {
                                    modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            }, 100);
                            observerModaleEtInit();
                        }
                    };
                    xhr.send();
                });
            });

            // Empêche les clics sur les liens dans .ft de déclencher l'ouverture de la modale
            document.querySelectorAll('.ci:not(.new) a').forEach(a => {
                a.addEventListener('click', e => e.stopPropagation());
            });

            document.querySelectorAll('li.ct').forEach(el => {
                el.addEventListener('click', () => {
                    const id = el.id;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../component/set_session.php?id=" + id, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Charger la modale après avoir défini la variable de session
                            loadModal('competence.php');
                            setTimeout(() => {
                                const modal = document.getElementById('modal');
                                if (modal) {
                                    modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            }, 100);
                            observerModaleEtInit();
                        }
                    };
                    xhr.send();
                });
            });

            // Empêche les clics sur les liens dans .xp de déclencher l'ouverture de la modale
            document.querySelectorAll('.ct:not(.new) a').forEach(a => {
                a.addEventListener('click', e => e.stopPropagation());
            });

            document.querySelectorAll('a.cv-modal').forEach(el => {
                el.addEventListener('click', () => {
                    const id = el.id;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../component/set_session.php?id=" + id, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Charger la modale après avoir défini la variable de session
                            loadModal('cv.php');
                            setTimeout(() => {
                                const modal = document.getElementById('modal');
                                if (modal) {
                                    modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            }, 100);
                            observerModaleEtInit();
                        }
                    };
                    xhr.send();
                });
            });

            function initialiserFormulaireDates() {
                function majJours(selectId, monthInputId) {
                    const select = document.getElementById(selectId);
                    const monthInput = document.getElementById(monthInputId);
                    if (!select || !monthInput) return;

                    monthInput.addEventListener("change", () => {
                        const [annee, mois] = monthInput.value.split("-");
                        if (!annee || !mois) return;

                        const nbJours = new Date(annee, mois, 0).getDate();
                        const selectedValue = select.value;

                        select.innerHTML = '<option value="">-- Aucun jour --</option>';
                        for (let i = 1; i <= nbJours; i++) {
                            const option = document.createElement("option");
                            option.value = i;
                            option.textContent = i;
                            if (parseInt(selectedValue) === i) option.selected = true;
                            select.appendChild(option);
                        }
                    });

                    // Initialisation immédiate
                    monthInput.dispatchEvent(new Event("change"));
                }

                majJours("date_debut_jour", "date_debut_mois");
                majJours("date_fin_jour", "date_fin_mois");

                const checkbox = document.getElementById("encore_en_poste");
                const moisFin = document.getElementById("date_fin_mois");
                const jourFin = document.getElementById("date_fin_jour");

                if (checkbox && moisFin && jourFin) {
                    function toggleFinFields() {
                        const disabled = checkbox.checked;
                        moisFin.disabled = disabled;
                        jourFin.disabled = disabled;
                    }

                    checkbox.addEventListener("change", toggleFinFields);
                    toggleFinFields(); // Initialisation au chargement
                }
            }

            // Fonction qui observe le container et initialise quand le formulaire est chargé
            function observerModaleEtInit() {
                const modalContainer = document.getElementById("modalContainer");
                if (!modalContainer) return;

                const observer = new MutationObserver((mutationsList, observer) => {
                    for (const mutation of mutationsList) {
                        if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
                            const hasForm = [...mutation.addedNodes].some(node =>
                                node.nodeType === 1 && node.querySelector && node.querySelector("#date_debut_mois")
                            );
                            if (hasForm) {
                                setTimeout(() => {
                                    initialiserFormulaireDates();
                                    observer.disconnect(); // Stopper après initialisation
                                }, 50);
                                break;
                            }
                        }
                    }
                });

                observer.observe(modalContainer, { childList: true });
            }

            // Fonctions pour gérer les interactions
            function triggerFileInput(btn) {
                // Solution directe: trouver le champ d'entrée de fichier dans le même div parent
                const container = btn.closest('.skill-image-container');
                if (container) {
                    const fileInput = container.querySelector('input[type="file"]');
                    if (fileInput) {
                        fileInput.click();
                    } else {
                        console.error("Input file introuvable dans le conteneur");
                    }
                } else {
                    console.error("Conteneur d'image introuvable");
                }
            }

            function previewImage(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Trouver l'image dans le même conteneur que l'input
                        const container = input.closest('.skill-image-container');
                        if (container) {
                            const img = container.querySelector('img');
                            if (img) {
                                img.src = e.target.result;
                            }
                        }
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function decrementCounter(btn) {
                const input = btn.nextElementSibling;
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            }

            function incrementCounter(btn) {
                const input = btn.previousElementSibling;
                const currentValue = parseInt(input.value);
                if (currentValue < 10) {
                    input.value = currentValue + 1;
                }
            }

            function removeSkill(btn) {
                const skillItem = btn.closest('.skill-item');
                const skillId = skillItem.dataset.skillId;
                
                if (confirm("Êtes-vous sûr de vouloir supprimer cette compétence ?")) {
                    // Crée un champ caché pour indiquer la suppression lors de la soumission du formulaire
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'skill_delete[]';
                    hiddenInput.value = skillId;
                    document.querySelector('form').appendChild(hiddenInput);
                    
                    // Supprime l'élément de l'interface
                    skillItem.remove();
                }
            }

            // Fonction pour ajouter une nouvelle compétence (template)
            document.addEventListener('click', function(event) {
                const addSkillBtn = event.target.closest('#addSkillBtn');
                if (addSkillBtn) {
                    // Trouver le parent le plus proche contenant les compétences
                    const form = addSkillBtn.closest('form');
                    const container = form.querySelector('.scrollable-skill') || form.querySelector('.full-width');
                    
                    if (container) {
                        const newSkillId = 'new_' + Date.now();
                        // Votre code HTML pour la nouvelle compétence
                        const newSkillHtml = `
                            <div class="skill-item" data-skill-id="${newSkillId}">
                                <!-- Image modifiable avec aperçu -->
                                <div class="skill-image-container">
                                    <img src="../images/logos-competences/logo_default.svg" 
                                        alt="Nouvelle compétence" 
                                        class="skill-image preview-image">
                                    <input type="file" name="new_skill_image[${newSkillId}]" 
                                        class="image-upload" accept="image/*" style="display:none;" 
                                        onchange="previewImage(this)">
                                    <button type="button" class="change-image-btn" onclick="triggerFileInput(this)">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                                
                                <!-- Label/input pour le nom de la compétence -->
                                <div class="skill-name">
                                    <input type="text" name="new_skill_name[${newSkillId}]" 
                                        placeholder="Nom de la compétence" required>
                                </div>
                                
                                <!-- Compteur de 1 à 10 -->
                                <div class="skill-rating">
                                    <button type="button" class="counter-btn minus" onclick="decrementCounter(this)">-</button>
                                    <input type="number" name="new_skill_rating[${newSkillId}]" 
                                        value="5" min="1" max="10" class="rating-counter" readonly>
                                    <button type="button" class="counter-btn plus" onclick="incrementCounter(this)">+</button>
                                </div>
                                
                                <!-- Bouton pour supprimer la compétence -->
                                <div class="skill-delete">
                                    <button type="button" class="delete-skill-btn" onclick="removeSkill(this)">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', newSkillHtml);
                    } else {
                        console.error("Conteneur de compétences introuvable");
                    }
                }
            });
            </script>
        <script src="../component/admin.js"></script>
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
            }

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

                return [
                    'img' => $img,
                    'nom' => $texte,
                    'lvl' => $lvl
                ];
            }

            function calculerAge() {
                $dateNaissance = new DateTime("2005-09-12");
                $aujourdHui = new DateTime();
                $age = $aujourdHui->diff($dateNaissance)->y;
                return $age;
            }
        ?>
    </body>
</html>