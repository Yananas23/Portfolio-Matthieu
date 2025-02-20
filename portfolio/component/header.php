<?php
// Détecter la page actuelle à partir de l'URL
$currentPage = basename($_SERVER['SCRIPT_NAME']);

    require_once './component/traduction.php';
    include "./component/connect.php";

// Ajouter le paramètre `lang` à tous les liens
$localeQuery = '?lang=' . $locale;
?>

<header id="up">
    <form id="lang" method="get" action="">
        <?php foreach ($_GET as $key => $value): ?>
            <?php if ($key !== 'lang'): ?>
                <input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>">
            <?php endif; ?>
        <?php endforeach; ?>
        <div id="div_lang">
            <button name="lang" value="fr_FR">
                <img class="resize" id="<?= $locale == 'fr_FR' ? 'active_lang' : '' ?>" src="./images/drapeau/fr.jpg" alt="Français">
            </button>
            <button name="lang" value="en_US.UTF-8">
                <img class="resize" id="<?= $locale == 'en_US.UTF-8' ? 'active_lang' : '' ?>" src="./images/drapeau/en.jpg" alt="English">
            </button>
        </div>
    </form>
    <div class="div_up" id="up_txt">
        <h1><?php echo _("Portfolio de Matthieu Thiesset"); ?></h1>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="index.php<?= $localeQuery ?>" id="nav_accueil" class="<?= $currentPage == 'index.php' ? 'active' : '' ?>">
                        <?php echo _("ACCUEIL"); ?>
                    </a>
                </li>
                <li>
                    <a href="projets.php<?= $localeQuery ?>" id="nav_projets" class="<?= in_array($currentPage, ['projets.php', 'fiche-projet.php']) ? 'active' : '' ?>">
                        <?php echo _("PROJETS"); ?>
                    </a>
                </li>
                <li>
                    <a href="apropos.php<?= $localeQuery ?>" id="nav_apropos" class="<?= $currentPage == 'apropos.php' ? 'active' : '' ?>">
                        <?php echo _("À PROPOS"); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="div_up" id="up_img">
        <img id="tete" src="./images/TeteMatthieu.png" alt="Matthieu Thiesset" />
    </div>
</header>
<div id="separateur"></div>

