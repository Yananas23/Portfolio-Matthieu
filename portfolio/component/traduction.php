<?php

session_start();

$languages = [
    'fr_FR' => 'Français',
    'en_US.UTF-8' => 'English',
];

// Langue par défaut
if (!isset($_SESSION['locale'])) {
    $_SESSION['locale'] = 'fr_FR'; // Français par défaut
}

// Mettre à jour la langue si elle est spécifiée dans l'URL
if (isset($_GET['lang']) && in_array($_GET['lang'], array_keys($languages))) {
    $_SESSION['locale'] = $_GET['lang'];
}

// Appliquer la langue sélectionnée
$locale = $_SESSION['locale'];
putenv("LANG=$locale");
setlocale(LC_ALL, $locale);
bindtextdomain("messages", "./locales");
textdomain("messages");