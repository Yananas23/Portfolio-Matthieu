<?php
// Inclure la connexion à la base de données
include 'connect.php';

// Récupérer les données envoyées en JSON
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$type = $data['type'];

// Vérifier le type d'entité et exécuter la requête correspondante
if ($type === 'etape') {
    $conn->query("DELETE FROM etapes WHERE ID = $id");
    echo 'success';
} elseif ($type === 'objectif') {
    $conn->query("DELETE FROM objectifs WHERE ID = $id");
    echo 'success';
} else {
    echo 'invalid_type'; // Gérer les types non valides
}
?>