<?php
include '../component/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $projetId = intval($_POST['id']);
    
    try {
        // Vérifier si le projet existe
        $check = $conn->prepare("SELECT * FROM `projets` WHERE ID = ?");
        $check->execute([$projetId]);

        if ($check->rowCount() > 0) {
            $projet = $check->fetch(PDO::FETCH_ASSOC);
            $id_video = $projet["ID-video"]; 
            // Commencer une transaction
            $conn->beginTransaction();

            //Supprime le projet de video_ytb
            $video = $conn ->prepare("SELECT `image` FROM `video_ytb` WHERE ID = ?");
            $video->execute([$id_video]);

            $image = $video->fetchColumn();

            if ($image) {
                $filePath = '../images/miniature/' . $image;
                if (file_exists($filePath)) {
                    unlink($filePath); // Supprime le fichier
                }
            }

            // Supprimer le projet et le video_ytb
            $delete = $conn->prepare("DELETE FROM `projets` WHERE ID = ?");
            $delete->execute([$projetId]);

            $delete = $conn->prepare("DELETE FROM `video_ytb` WHERE ID = ?");
            $delete ->execute([$id_video]);

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

