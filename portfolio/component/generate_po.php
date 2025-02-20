<?php
include "connect.php";

$locales = ['en_US.UTF-8', 'fr_FR']; // Liste des langues
$potFile = '../locales/messages.pot'; // Chemin du fichier template
$localeDir = '../locales'; // Répertoire des traductions

try {
    // Récupérer toutes les chaînes uniques depuis la BDD
    $query = $conn->query("SELECT DISTINCT
                                p.type1,
                                p.synopsis,
                                p.short_synopsis,
                                p.vue_ensemble,
                                p.short_vue_ensemble,
                                p.avis_perso,
                                o.titre_objectif,
                                o.detail_objectif,
                                e.titre_etape,
                                e.detail_etape
                            FROM
                                projets AS p
                            JOIN
                                `projets-objectifs` AS po ON p.ID = po.`ID-Projet`
                            JOIN
                                objectifs AS o ON po.`ID-objectif` = o.ID
                            JOIN
                                `projets-etapes` AS pe ON p.ID = pe.`ID-Projet`
                            JOIN
                                etapes AS e ON pe.`ID-Etape` = e.ID;");

    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!$results) {
        throw new Exception("Aucune donnée récupérée depuis la base de données.");
    }

    // Extraire toutes les valeurs uniques
    $strings = [];
    foreach ($results as $row) {
        foreach ($row as $value) {
            // Nettoyer la chaîne : ltrim() supprime les espaces au début
            $cleanValue = ltrim($value);
            if (!empty($cleanValue) && !in_array($cleanValue, $strings, true)) {
                $strings[] = $cleanValue;
            }
        }
    }

    // Générer le fichier .pot
    $potContent = "# Fichier template des traductions\nmsgid \"\"\nmsgstr \"\"\n\"Content-Type: text/plain; charset=UTF-8\"\n\n";
    foreach ($strings as $string) {
        $potContent .= "msgid \"$string\"\nmsgstr \"\"\n\n";
    }
    if (file_put_contents($potFile, $potContent) === false) {
        throw new Exception("Impossible d'écrire le fichier .pot.");
    }

    // Mettre à jour les fichiers .po pour chaque langue
    foreach ($locales as $locale) {
        if ($locale === 'fr_FR') {
            continue; // Pas besoin de générer un fichier .po pour la langue source
        }

        $poFile = "$localeDir/$locale/LC_MESSAGES/messages.po";
        $poContent = file_exists($poFile) ? file_get_contents($poFile) : "# $locale translations\nmsgid \"\"\nmsgstr \"\"\n\"Content-Type: text/plain; charset=UTF-8\"\n\n";

        foreach ($strings as $string) {
            if (!str_contains($poContent, "msgid \"$string\"")) {
                $poContent .= "msgid \"$string\"\nmsgstr \"\"\n\n";
            }
        }

        // Sauvegarder le fichier .po mis à jour
        if (file_put_contents($poFile, $poContent) === false) {
            throw new Exception("Impossible d'écrire le fichier $poFile.");
        }
    }

    // Si tout s'est bien passé
    echo "Fichiers .po mis à jour avec succès !";
} catch (Exception $e) {
    // En cas d'erreur, renvoyer un code 500 et afficher un message
    http_response_code(500);
    echo "Erreur : " . $e->getMessage();
    exit; // Arrêter le script
}
?>
