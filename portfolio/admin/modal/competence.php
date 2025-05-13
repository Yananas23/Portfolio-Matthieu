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
?>

<link rel="stylesheet" href="../css/ct.css" />
<link rel="stylesheet" href="../css/modal.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Fenêtre modale -->
<div class="modal competence" id="competenceModal">
    <div class="modal-content form-ct" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-ct"><?= $title ?></h1>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($pid) ?>">

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

                    
                        <!-- Affichage de chaque compétence sur une ligne -->
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
                                <button type="button" class="delete-skill-btn" onclick="removeSkill(this)">
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
                <textarea name="description" rows="10" required><?= htmlspecialchars($fetch_soft['titre']) ?></textarea>
            
                <?php } ?>
            <button id="btn-mod" class="modaleBtn" name="competence" type="submit">Enregistrer</button>
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