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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['type'] ?? '';
    $titre = $_POST['titre'] ?? '';
    $description = $_POST['description'] ?? '';

    try {
        if ($action === 'supprimer' && $pid > 0) {
            $stmt = $conn->prepare("DELETE FROM centres_interet WHERE id = ?");
            $stmt->execute([$pid]);
            echo "Centre d'intérêt supprimé avec succès.";
        } elseif ($action === 'modifier' && $pid > 0) {
            $stmt = $conn->prepare("UPDATE centres_interet SET `titre` = ?, `description` = ? WHERE id = ?");
            $stmt->execute([$titre, $description, $pid]);
            echo "Centre d'intérêt mis à jour avec succès.";
        } elseif ($action === 'modifier') {
            $stmt = $conn->prepare("INSERT INTO centres_interet (`titre`, `description`) VALUES (?, ?)");
            $stmt->execute([$titre, $description]);
            echo "Centre d'intérêt ajouté avec succès.";
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

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal centreInteret" id="centreInteretModal">
    <div class="modal-content form-ci" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-ci"><?= $title ?></h1>

        <form id="ci-form" method="POST" action="./modal/centreInteret.php" data-reload>
            <input type="hidden" name="type" id="type" value="modifier">

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

            <button id="btn-mod" class="modaleBtn" name="centreInteret" type="submit" onclick="document.getElementById('type').value='modifier';">Enregistrer</button>
            <?php if ($pid > 0): ?>
                <button id="btn-del" class="modaleBtn" name="centreInteret" type="submit" onclick="document.getElementById('type').value='supprimer';">Supprimer</button>
            <?php endif; ?>
        </form>

    </div>
</div>
