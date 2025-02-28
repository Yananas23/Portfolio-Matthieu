<?php
// Détecter la page actuelle à partir de l'URL
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<header id="up">
    <div class="div_up" id="up_txt">
        <h1>Portfolio de Matthieu Thiesset</h1>
        <nav class="navbar">
            <ul>
                <li><a href="./admin.php" id="nav_accueil" class="<?= $currentPage == './index.php' ? 'active' : '' ?>">ACCUEIL</a></li>
                <li><a href="./admin-projets.php" id="nav_projets" class="<?= $currentPage == './projets.php' ? 'active' : '' ?><?= $currentPage == './fiche-projet.php' ? 'active' : '' ?>">PROJETS</a></li>
                <li><a href="./admin-apropos.php" id="nav_apropos" class="<?= $currentPage == './apropos.php' ? 'active' : '' ?>">À PROPOS</a></li>
            </ul>
        </nav>
        <nav class="navAdmin">
            <ul>
                <li id="admin-button">
                <a href="#" onclick="updateTranslations(); return false;">METTRE À JOUR LES TRADUCTIONS</a>
                </li>
                <li id="admin-button"><a href="#" onclick="deconnexion(); return false;">DECONNEXION</a></li>
            </ul>
        </nav>
    </div>
    <div class="div_up" id="up_img">
        <a  href="../index.php">    
            <img id="tete" src="../images/TeteMatthieu.png" alt="Matthieu Thiesset"/>
        </a>
    </div>
</header>
<div id="separateur"></div>


