<?php
include '../component/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $adminId = intval($_POST['id']);
    
    try {
        $delete = $conn->prepare("DELETE FROM `admin` WHERE id = ?");
        $delete->execute([$adminId]);
        
        echo "success";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
