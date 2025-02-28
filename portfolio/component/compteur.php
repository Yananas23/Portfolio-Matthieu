<?php

$fichier = '../FichiersTechniques/compteur.txt';

// Lire et incrémenter le compteur
    $visites = file_exists($fichier) ? (int)file_get_contents($fichier) : 0;
    $visites++;

// Enregistrer le nouveau nombre
file_put_contents($fichier, $visites);
?>