<?php

function renameImage($target_name) {
    $name = $target_name;
    
    $name = str_replace("'", "", $name);
    
    $replacements = [
        'à' => 'a', 'â' => 'a', 'ä' => 'a',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'î' => 'i', 'ï' => 'i',
        'ô' => 'o', 'ö' => 'o',
        'ù' => 'u', 'û' => 'u', 'ü' => 'u',
        'ÿ' => 'y',
        'ç' => 'c',
        'á' => 'a', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
        'ñ' => 'n'
    ];
    
    $name = strtr($name, $replacements);
    
    return $name;
}

function resizeAndSaveImage($file, $target_folder, $target_name, $new_width = 1280, $new_height = 720) {
    $image = $file['name'];
    $image_tmp_name = $file['tmp_name'];
    $image_size = $file['size'];
    $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $image_folder = $target_folder . renameImage($target_name) . $image_ext;

    $image_name = renameImage($target_name) . '.' . $image_ext;

    // Vérification des extensions et de la taille
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    if (in_array($image_ext, $allowed_extensions) && $image_size <= 20 * 1024 * 1024) { // Limite de 20 Mo
        // Charger l'image selon l'extension
        $image_ext = strtolower($image_ext);
        switch ($image_ext) {
            case 'jpg':
            case 'jpeg':
                $source_image = imagecreatefromjpeg($image_tmp_name);
                break;
            case 'png':
                $source_image = imagecreatefrompng($image_tmp_name);
                break;
            default:
                throw new Exception("Erreur : Format d'image non pris en charge.");
        }

        // Obtenir les dimensions originales
        list($original_width, $original_height) = getimagesize($image_tmp_name);

        // Si les dimensions sont à 0, utiliser les dimensions originales
        if ($new_width == 0) $new_width = $original_width;
        if ($new_height == 0) $new_height = $original_height;

        // Créer une nouvelle image redimensionnée
        $resized_image = imagecreatetruecolor($new_width, $new_height);

        // Préserver la transparence pour les PNG
        if ($image_ext === 'png') {
            // Activer la gestion de la transparence
            imagealphaBlending($resized_image, false);
            imageSaveAlpha($resized_image, true);
            // Définir le fond comme transparent
            $transparent = imagecolorallocatealpha($resized_image, 0, 0, 0, 127);
            imagefilledrectangle($resized_image, 0, 0, $new_width, $new_height, $transparent);
        }

        // Redimensionner l'image
        imagecopyresampled(
            $resized_image,
            $source_image,
            0, 0, 0, 0,
            $new_width,
            $new_height,
            $original_width,
            $original_height
        );

        // Sauvegarder l'image redimensionnée
        switch ($image_ext) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($resized_image, $image_folder);
                break;
            case 'png':
                imagepng($resized_image, $image_folder);
                break;
        }

        // Libérer la mémoire
        imagedestroy($source_image);
        imagedestroy($resized_image);

        return $image_name; // Retourne le nom de l'image redimensionnée
    } else {
        throw new Exception("Erreur : Extension ou taille d'image invalide.");
    }
}

function deleteFile($filePath) {
    $filePath = '../images/miniature/' . $filePath;
    if (file_exists($filePath)) {
        unlink($filePath); // Supprime le fichier
        return true;
    }
    return false;
}