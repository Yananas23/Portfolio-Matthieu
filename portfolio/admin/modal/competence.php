<?php
include '../../component/connect.php';
session_start();

    $pid = $_SESSION['pid'];

    $ct = [
        'categorie'=>''
    ];
    $skills;
    $title = "Ajouter une compétence";

    // Si ID > 0 on va chercher les données
    if ($pid > 0) {
        $title = "Modifier une compétence";

        $select_ct = $conn->prepare("SELECT * FROM competences WHERE id = ?");
        $select_ct->execute([$pid]);
        $ct = $select_ct->fetch(PDO::FETCH_ASSOC);

        if (!$ct) {
            die("Centre d'interet introuvable.");
        }
    }

function findOrCreateSkillId(PDO $conn, $skill) {
    // 1. Chercher si l'entrée existe
    $stmt = $conn->prepare("SELECT id FROM `skill` WHERE categorie = ? AND titre = ?");
    $stmt->execute([$skill['categorie'], $skill['titre']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($result) {
        // L'entrée existe, on retourne l'ID
        return (int)$result['id'];
    }

    // 2. Sinon, l'insérer
    $insert = $conn->prepare("INSERT INTO `skill` (`categorie`, `titre`, `niveau`) VALUES (?, ?, ?)");
    $insert->execute([$skill['categorie'], $skill['titre'], $skill['niveau']]);

    return null;
}

function renameSkill($skillName) {
    $result = mb_strtolower($skillName);

    $accents = [
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', 'ã' => 'a', 'å' => 'a',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o', 'õ' => 'o',
        'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
        'ý' => 'y', 'ÿ' => 'y',
        'ñ' => 'n', 'ç' => 'c'
    ];

    $result = strtr($result, $accents);

    $chars_to_replace = [' ', '/', '&nbsp;', '-'];
    $result = str_replace($chars_to_replace, '_', $result);

    $result = "logo_" . $result;

    return $result;
}

function saveLogo($image, $skillName){
    include '../../component/resize.php';

    if (isset($image)) {
        try {
            $target_folder = '../../images/logos-competences/';
            $target_name = renameSkill($skillName); 
            $image = resizeAndSaveImage($image, $target_folder, $target_name, 720);

            echo "Image redimensionnée et enregistrée : " . $image . "\n";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

function recreate($Files, $tmp_id) {
    $imgInfo = [
            'name'=>'',
            'full_path'=>'',
            'type'=>'',
            'tmp_name'=>'',
            'error'=>'',
            'size'=>''
        ];

    foreach ($imgInfo as $key => $value) {
        $imgInfo[$key] = $Files[$key][$tmp_id];
    }

    return $imgInfo;
}
    

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['type'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $imgInfo;

    try {
        if ($action === 'supprimer' && $pid > 1) {
            $skills = $conn->prepare("SELECT id FROM skill WHERE categorie = ?");
            $skills->execute([$pid]);
            if($skills->rowCount() > 0) {
                echo "Il reste des skills attachés à cette compétence !";
            } else {
                $stmt = $conn->prepare("DELETE FROM competences WHERE id = ?");
                $stmt->execute([$pid]);
                echo "Expérience supprimée avec succès.";
            }
            exit();
        } elseif ($action === 'modifier' && $pid == 1) {
            $soft_skill = $_POST['description_ss'];
            $soft = $conn->prepare('UPDATE skill SET `titre` = ? WHERE categorie = 1');
            $soft->execute([$soft_skill]);
            echo "Soft skills mis à jour avec succès !";
            exit();
        } elseif ($action === 'modifier' && $pid > 1) {
            $stmt = $conn->prepare("UPDATE competences SET `categorie` = ? WHERE id = ?");
            $stmt->execute([$categorie, $pid]);

            // Traiter les skills existants (modification)
            if (isset($_POST['skill_name']) && is_array($_POST['skill_name'])) {
                foreach ($_POST['skill_name'] as $skill_id => $skill_name) {
                    $skill_rating = $_POST['skill_rating'][$skill_id] ?? 5;
                    
                    // Mettre à jour le skill existant
                    $update_skill = $conn->prepare("UPDATE skill SET titre = ?, niveau = ? WHERE id = ?");
                    $update_skill->execute([$skill_name, $skill_rating, $skill_id]);
                    
                    // Traiter l'image si elle est présente
                    if (isset($_FILES['new_skill_image']) && !empty($_FILES['new_skill_image']['name'][$skill_id])) {
                        $imageInfo = recreate($_FILES['new_skill_image'], $temp_id);
                        saveLogo($imageInfo, $skill_name);
                    }
                }
            }
            
            // Traiter les nouveaux skills
            if (isset($_POST['new_skill_name']) && is_array($_POST['new_skill_name'])) {
                foreach ($_POST['new_skill_name'] as $temp_id => $skill_name) {
                    $skill_rating = $_POST['new_skill_rating'][$temp_id] ?? 5;

                    // Créer un nouveau skill
                    $skill = [
                        'categorie' => $pid,
                        'titre' => $skill_name,
                        'niveau' => $skill_rating
                    ];
                    
                    // Utiliser findOrCreateSkillId pour vérifier si le skill existe déjà
                    $skill_id = findOrCreateSkillId($conn, $skill);
                    
                    // Si null est retourné, le skill a été créé, sinon on met à jour le niveau
                    if ($skill_id !== null) {
                        $update_skill = $conn->prepare("UPDATE skill SET niveau = ? WHERE id = ?");
                        $update_skill->execute([$skill_rating, $skill_id]);
                    }
                    
                    // Traiter l'image si elle est présente
                    if (isset($_FILES['new_skill_image']) && !empty($_FILES['new_skill_image']['name'][$temp_id])) {
                        $imageInfo = recreate($_FILES['new_skill_image'], $temp_id);
                        saveLogo($imageInfo, $skill_name);
                    }
                }
            }

            echo "Compétence mise à jour avec succès.";
        } elseif ($action == 'modifier') {
            // Création d'une nouvelle compétence
            $stmt = $conn->prepare("INSERT INTO competences (`categorie`) VALUES (?)");
            $stmt->execute([$categorie]);
            $pid = (int)$conn->lastInsertId();

            // Traiter les nouveaux skills
            if (isset($_POST['new_skill_name']) && is_array($_POST['new_skill_name'])) {
                foreach ($_POST['new_skill_name'] as $temp_id => $skill_name) {
                    $skill_rating = $_POST['new_skill_rating'][$temp_id] ?? 5;
                    
                    // Créer un nouveau skill
                    $skill = [
                        'categorie' => $pid,
                        'titre' => $skill_name,
                        'niveau' => $skill_rating
                    ];
                    
                    // Utiliser findOrCreateSkillId pour vérifier si le skill existe déjà
                    $skill_id = findOrCreateSkillId($conn, $skill);
                    
                    // Si null est retourné, le skill a été créé, sinon on met à jour le niveau
                    if ($skill_id !== null) {
                        $update_skill = $conn->prepare("UPDATE skill SET niveau = ? WHERE id = ?");
                        $update_skill->execute([$skill_rating, $skill_id]);
                    }
                    
                    // Traiter l'image si elle est présente
                    if (isset($_FILES['new_skill_image']) && !empty($_FILES['new_skill_image']['name'][$temp_id])) {
                        $imageInfo = recreate($_FILES['new_skill_image'], $temp_id);
                        saveLogo($imageInfo, $skill_name);
                    }
                }
            }

            echo "Compétence ajoutée avec succès.";
        } else {
            echo "Action non reconnue ou ID manquant.";
        }        
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit();
    }
}
?>

<link rel="stylesheet" href="../css/ct.css" />
<link rel="stylesheet" href="../css/modal.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Fenêtre modale -->
<div class="modal competence" id="competenceModal">
    <div class="modal-content form-ct" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-ct"><?= $title ?></h1>

        <form id="ct-form" method="POST" action="./modal/competence.php" data-reload>
            <input type="hidden" name="type" id="type" value="modifier">

            <div class="info-grid">
                <!-- Catégorie -->
                <div>
                    <label>Catégorie :</label>
                    <input type="text" name="categorie" value="<?= htmlspecialchars($ct['categorie']) ?>" required>
                </div>

                <?php if ($pid != 1) { ?>

                <!-- Description - Full width -->
                <div class="full-width">
                    <label>Skills :</label>
                    <div class="scrollable-skill">
                    <!-- Affichage de chaque compétence sur une ligne -->
                    <?php 
                        if ($pid > 1){
                            $select_skill = $conn->prepare("SELECT 
                                                                s.*
                                                            FROM 
                                                                skill AS s
                                                            WHERE
                                                                s.categorie = ?;");
                            $select_skill->execute([$pid]);
                            if($select_skill->rowCount() > 0){
                                while($fetch_skill = $select_skill->fetch(PDO::FETCH_ASSOC)){
                                    $skill = formatingSkill($fetch_skill["titre"], $fetch_skill["niveau"]);
                        ?>

                        <div class="skill-item" data-skill-id="<?= $fetch_skill['id'] ?>">
                            <!-- Image modifiable avec aperçu -->
                            <div class="skill-image-container">
                                <img src="<?= !empty($skill['image']) ? $skill['image'] : '../images/logos-competences/logo_default.svg' ?>" 
                                    alt="<?= htmlspecialchars($skill['nom']) ?>" 
                                    class="skill-image preview-image">
                                <input type="file" name="new_skill_image[<?= $fetch_skill['id'] ?>]" 
                                    class="image-upload" accept="image/*" style="display:none;" 
                                    onchange="previewImage(this)">
                                <button type="button" class="change-image-btn" onclick="triggerFileInput(this)">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            
                            <!-- Label/input pour le nom de la compétence -->
                            <div class="skill-name">
                                <input type="text" name="skill_name[<?= $fetch_skill['id'] ?>]" 
                                    value="<?= htmlspecialchars($fetch_skill['titre']) ?>" required>
                            </div>
                            
                            <!-- Compteur de 1 à 10 -->
                            <div class="skill-rating">
                                <button type="button" class="counter-btn minus" onclick="decrementCounter(this)">-</button>
                                <input type="number" name="skill_rating[<?= $fetch_skill['id'] ?>]" 
                                    value="<?= $fetch_skill['niveau'] ?>" min="1" max="10" class="rating-counter" readonly>
                                <button type="button" class="counter-btn plus" onclick="incrementCounter(this)">+</button>
                            </div>
                            
                            <!-- Bouton pour supprimer la compétence -->
                            <div class="skill-delete">
                                <button type="button" class="delete-skill-btn" onclick="removeSkill(<?= $fetch_skill['id']; ?>, '<?= $skill['nom']; ?>' )">
                                    &times;
                                </button>
                            </div>
                        </div>
                        <?php }}} ?>
                    </div>
                </div>
            </div>
            <?php if ($pid != 1): ?>
                <button type="button" class="add-skill-btn modaleBtn" id="addSkillBtn">Ajouter une compétence</button>
            <?php endif; 
                } else {
                    
                    $select_soft = $conn->prepare("SELECT titre FROM skill WHERE categorie = 1;");
                    $select_soft->execute();
                    if($select_soft->rowCount() > 0){
                        $fetch_soft = $select_soft->fetch(PDO::FETCH_ASSOC);}?>

                <label>Description :</label>
                <textarea name="description_ss" rows="10" required><?= htmlspecialchars($fetch_soft['titre']) ?></textarea>
            
                <?php } ?>

            <button id="btn-mod" class="modaleBtn" name="experience" type="submit">Enregistrer</button>
            <?php if ($pid > 1): ?>
                <button id="btn-del" class="modaleBtn" name="experience" type="submit" onclick="document.getElementById('type').value='supprimer';">Supprimer</button>
            <?php endif; ?>
        </form>
    </div>
</div>
<?php
function formatingSkill($texte, $entier) {
    $repertoire = "../../images/logos-competences/";

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
                    return $repertoire . $fichier;
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
    $img = substr($img, 3);

    return [
        'image' => $img,
        'nom' => $texte,
        'lvl' => $lvl
    ];
}
?>