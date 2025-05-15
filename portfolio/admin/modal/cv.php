<?php
include '../../component/connect.php';
session_start();

    $select_curriculum = $conn->prepare("SELECT * FROM curriculum_vitae");
    $select_curriculum->execute();
    $curriculum = $select_curriculum->fetch(PDO::FETCH_ASSOC);

    if (!$curriculum) {
        die("Cv introuvable.");
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données avec les bons noms de champs
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $mail = $_POST['email'];
    $description = $_POST['description'];

    try {
        // Préparation et exécution de la requête
        $modif_cv = $conn->prepare("UPDATE curriculum_vitae 
                                                SET adresse = ?,
                                                telephone = ?,
                                                mail = ?,
                                                `description` = ?
                                                WHERE id = 1");
        $modif_cv->execute([$adresse, $telephone, $mail, $description]);

        echo "Cv mis à jour avec succès.";
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit();
    }
}
?>

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal curriculum" id="curriculumModal">
    <div class="modal-content form-curriculum" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-curriculum">Curriculum Vitae</h1>

        <form method="POST" action="./modal/cv.php" data-reload>
            <div class="info-collumn">
                <!-- Titre -->
                <div>
                    <label>Adresse :</label>
                    <input type="text" name="adresse" value="<?= htmlspecialchars($curriculum['adresse']) ?>" required>
                </div>

                <div>
                    <label>Téléphone :</label>
                    <input type="tel" name="telephone" value="<?= htmlspecialchars($curriculum['telephone']) ?>" required>
                </div>

                <div>
                    <label>Email :</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($curriculum['mail']) ?>" required>
                </div>

                <!-- Description - Full width -->
                <div class="full-width">
                    <label>Description :</label>
                    <textarea name="description" rows="10" required><?= htmlspecialchars($curriculum['description']) ?></textarea>
                </div>
            </div>

            <button id="btn-mod" class="modaleBtn" name="cv" type="submit">Enregistrer</button>
        </form>

    </div>
</div>
