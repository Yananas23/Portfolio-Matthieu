<?php
include '../component/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $skillId = intval($_POST['id']);
    $filePath = searchImg($_POST['skill']);
    
    try {
        $delete = $conn->prepare("DELETE FROM skill WHERE id = ?");
        $delete->execute([$skillId]);
        
        if (file_exists($filePath)) {
            unlink($filePath); // Supprime le fichier
        }

        echo "success";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function searchImg($texte) {
    $repertoire = "../images/logos-competences/";

    $img = strtolower($texte);
    $img = str_replace([' ', '/', '&nbsp;', '-'], '_', $img);

    $img = str_replace(
        ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'],
        ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'],
        $img
    );

    $mots = explode('_', $img);

    if (is_dir($repertoire)) {
        $fichiers = scandir($repertoire);

        $verifierImage = function($mot) use ($fichiers, $repertoire) {
            foreach ($fichiers as $fichier) {
                if (preg_match("/logo_(" . preg_quote($mot, '/') . ").*\.png/i", $fichier)) {
                    return $repertoire . DIRECTORY_SEPARATOR . $fichier;
                }
            }
            return null;
        };

        for ($i = 0; $i < count($mots); $i++) {
            $combinaison = $mots[$i];
            for ($j = $i + 1; $j < count($mots); $j++) {
                $img = $verifierImage($combinaison);
                if ($img) {
                    break 2;
                }
                $combinaison .= '_' . $mots[$j];
            }
            $img = $verifierImage($combinaison);
            if ($img) {
                break;
            }
        }
    }

    return $img;
};
?>
