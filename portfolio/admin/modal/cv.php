<?php
include '../../component/connect.php';
session_start();

    $select_curriculum = $conn->prepare("SELECT * FROM curriculum_vitae");
    $select_curriculum->execute();
    $curriculum = $select_curriculum->fetch(PDO::FETCH_ASSOC);

    if (!$curriculum) {
        die("Centre d'interet introuvable.");
    }

?>

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal curriculum" id="curriculumModal">
    <div class="modal-content form-curriculum" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-curriculum">Curriculum Vitae</h1>

            <form action="" method="POST">
                <div class="info-collumn">
                    <!-- Titre -->
                    <div>
                        <label>Adresse :</label>
                        <input type="text" name="titre" value="<?= htmlspecialchars($curriculum['adresse']) ?>" required>
                    </div>

                    <div>
                        <label>Téléphone :</label>
                        <input type="text" name="titre" value="<?= htmlspecialchars($curriculum['telephone']) ?>" required>
                    </div>

                    <div>
                        <label>Email :</label>
                        <input type="text" name="titre" value="<?= htmlspecialchars($curriculum['mail']) ?>" required>
                    </div>

                    <!-- Description - Full width -->
                    <div class="full-width">
                        <label>Description :</label>
                        <textarea name="description" rows="10" required><?= htmlspecialchars($curriculum['description']) ?></textarea>
                    </div>
                </div>

                <button id="btn-mod" class="modaleBtn" name="centreInteret" type="submit">Enregistrer</button>
            </form>
    </div>
</div>
