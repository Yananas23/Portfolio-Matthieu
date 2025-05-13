<?php
include '../../component/connect.php';
session_start();

    $pid = $_SESSION['pid'];

    $ci = [
        'titre'=>'',
        'description'=>''
    ];

    $title = "Ajouter un centre d'interet";

    // Si ID > 0 on va chercher les données
    if ($pid > 0) {
        $title = "Modifier un centre d'interet";

        $select_ci = $conn->prepare("SELECT * FROM centres_interet WHERE id = ?");
        $select_ci->execute([$pid]);
        $ci = $select_ci->fetch(PDO::FETCH_ASSOC);

        if (!$ci) {
            die("Centre d'interet introuvable.");
        }
    }
?>

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal centreInteret" id="centreInteretModal">
    <div class="modal-content form-ci" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-ci"><?= $title ?></h1>

            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($pid) ?>">

                <div class="info-grid">
                    <!-- Titre -->
                    <div>
                        <label>Titre :</label>
                        <input type="text" name="titre" value="<?= htmlspecialchars($ci['titre']) ?>" required>
                    </div>

                    <!-- Description - Full width -->
                    <div class="full-width">
                        <label>Description :</label>
                        <textarea name="description" rows="10" required><?= htmlspecialchars($ci['description']) ?></textarea>
                    </div>
                </div>

                <button id="btn-mod" class="modaleBtn" name="centreInteret" type="submit">Enregistrer</button>
            </form>
    </div>
</div>
