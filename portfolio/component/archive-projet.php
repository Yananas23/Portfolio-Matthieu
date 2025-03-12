<?php
include '../component/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['statut'])) {
    $projetId = intval($_POST['id']);
    $statut = intval($_POST['statut']);
    
    // Toggle du statut (1 <-> 0)
    $statut = $statut === 1 ? 0 : 1;

    try {
        $update = $conn->prepare("UPDATE `projets` SET `archived` = ? WHERE ID = ?");
        $update->execute([$statut, $projetId]);

        echo "success";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
