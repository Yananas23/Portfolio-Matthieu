<?php
include '../component/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $projetId = intval($_POST['id']);
    
    try {
        // Vérifier si le projet existe
        $check = $conn->prepare("SELECT ID FROM `projets` WHERE ID = ?");
        $check->execute([$projetId]);

        if ($check->rowCount() > 0) {
            // Commencer une transaction
            $conn->beginTransaction();

            // Supprimer le projet
            $delete = $conn->prepare("DELETE FROM `projets` WHERE ID = ?");
            $delete->execute([$projetId]);

            // Valider la transaction
            $conn->commit();
            echo "success";
        } else {
            echo "Projet introuvable.";
        }
    } catch (PDOException $e) {
        $conn->rollBack(); // Annuler en cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}
?>

