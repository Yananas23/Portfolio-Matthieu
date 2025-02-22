<footer>
    <?php
        $select_cv = $conn->prepare("SELECT telephone, mail FROM curriculum_vitae");
        $select_cv->execute();
        if($select_cv->rowCount() > 0){
            $fetch_cv = $select_cv->fetch(PDO::FETCH_ASSOC);
        }
    ?>
    <div class="div_footer" id="infos">
        <p id="info"><?php echo _("Portfolio de Matthieu Thiesset"); ?></p>
        <p class="contact" id="contact1">contact : 📧 <?= $fetch_cv["mail"]; ?> - </p>
        <p class="contact" id="contact2">☎️ <?= $fetch_cv["telephone"]; ?></p>
    </div>
    <div class="div_footer" id="footer_nav">
        <ul>
            <li><u>NAVIGATION :</u></li>
            <li><a href="./index.php<?= $localeQuery ?>" id="nav_accueil"><?php echo _("ACCUEIL"); ?></a></li>
            <li><a href="./projets.php<?= $localeQuery ?>" id="nav_projets"><?php echo _("PROJETS"); ?></a></li>
            <li><a href="./apropos.php<?= $localeQuery ?>" id="nav_apropos"><?php echo _("À PROPOS"); ?></a></li>
        </ul>
    </div>
    <div class="credits">
        <p id="credits"><?php echo _("© Site créé par Matthieu Thiesset avec l'aide de "); ?><a id="yanis" target="_blank" href="https://www.instagram.com/yananas23_/">Yanis Boulogne</a></p>
    </div>
</footer>
<script src="./component/script.js"></script>
