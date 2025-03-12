<?php
session_start();

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    // Validez et assainissez l'identifiant du projet ici
    $_SESSION['pid'] = $projectId;
    echo "Session variable définie.";
} else {
    echo "ID de projet non fourni.";
}
?>
