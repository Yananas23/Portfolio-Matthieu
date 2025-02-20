<?php 
    require_once './component/traduction.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <meta name="viewport" content="width=device-width, minimum-scale=0.5"/>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="icon" href="./images/iconeM.ico" type="image/x-icon"/>
        <title><?= _("Matthieu Thiesset - Portfolio"); ?></title>
    </head>
    <body>
        <?php include "./component/header.php"; ?>
        <section class="cv" id="resume_cv">
            <h2>Curriculum Vitae - Matthieu Thiesset</h2>
                <div id="resume_container">
                    <div class="div_resume_cv">
                        <p class="resume_cv "><?= _("Né le 12 Septembre 2005 (19&nbsp;ans),"); ?><br>
                            523 route de la Lauzière, 73660&nbsp;Saint&nbsp;Rémy&nbsp;de&nbsp;Maurienne - France<br>
                            <srong>(33) 06 47 93 74 92</srong> - matthieuthiesset@gmail.com<br>
                            Portfolio : <strong><a target="_blank" href="https://matthieuthiesset.fr">https://matthieuthiesset.fr</a></strong></p>
                    </div>
                    <div class="div_resume_cv">
                        <p class="resume_cv"><?= _("Étudiant en Audiovisuel et créateur de fictions audio au sein de la "); ?><strong><a target="_blank" href="https://javras.fr">TeamJavras</a></strong>
                        <?= _(", je me passionne pour la création sonore, le montage audio et le sound design."); ?></p>
                    </div>
                </div>
        </section>
        <div id="separateur"></div>
        <section class="cv" id="detail_cv">
            <div class="cv_parts" id="cv_part1">
                <article class="cv_info" id="experience">
                    <h3><?= _("Experiences"); ?></h3>
                    <ul>
                        <li>
                            <h4><strong><a target="_blank" href="https://www.mauriennisezvous.fr/">Mauriennisez-Vous</a></strong>, Saint Jean de Maurienne (73) - <strong><em><?= _("Bénévole"); ?></em></strong></h4>
                            <h5><em><?= _("AVRIL 2021 - AUJOURD'HUI"); ?></em></h5>
                            <p><?= _("J’ai rejoint l’association Mauriennisez-Vous, qui a pour objet de valoriser la Maurienne, et j’ai ainsi participé à l’organisation et à l’animation de quelques soirées d’astronomie pendant l’été. J’ai aussi pu voir comment fonctionne la chaîne de TV : Maurienne TV qui est gérée par l’association."); ?></p>
                        </li>
                        <li>
                            <h4><strong><a target="_blank" href="https://www.jevadrouille.com/">Vadrouille Shoes</a></strong>, Lyon (69) - <strong><em><?= _("Stagiaire Montage Vidéo"); ?></em></strong></h4>
                            <h5><em><?= _("6 MAI 2024 - 5 JUILLET 2024"); ?></em></h5>
                            <p><?= _("Stage de technicien en tant que monteur pour les réseaux sociaux de Vadrouille. Très enrichissant, autant en technique qu’en appréhension de l’environnement professionnel."); ?> 
                            (<a target='_blank' href='https://docs.google.com/document/d/1sStTlDA_wfz4dv-HGY6qNquXP--97JZ_2IDTunp90tE/edit?usp=drive_link'><?= _("lien vers mon rapport de stage"); ?></a>)</p>
                        </li>
                        <li>
                            <h4><strong><a target="_blank" href="https://www.favier-jeanluc.com/">Entreprise Favier Jean-Luc</a></strong>, Saint Jean de Maurienne (73) - <strong><em><?= _("Ouvrier de Chantier"); ?></em></strong></h4>
                            <h5><em><?= _("5 JUIN 2023 - 28 JUILLET 2023"); ?></em></h5>
                            <p><?= _("J’ai assisté l’entreprise sur ses chantiers, pour la pose, le changement ou la réparation de fenêtres, portes-fenêtres, portes de garage, portes d’entrée, volets et stores. C’est-à-dire que j’ai participé à démonter ce que l’on change, préparer le nouveau, préparer la zone pour le poser, le poser, le fixer, et nettoyer. Les dernières semaines, je changeais une fenêtre seul."); ?></p>
                        </li>
                    </ul>
                </article>
                <article class="cv_info" id="formation">
                    <h3><?= _("Formation"); ?></h3>
                    <ul>
                        <li>
                            <h4><strong><a target="_blank" href="https://www.uphf.fr/">UPHF</a></strong>, Valenciennes (59) - <strong><em><?= _("Licence"); ?></em></strong></h4>
                            <h5><em><?= _("SEPTEMBRE 2022 - AUJOURD'HUI"); ?></em></h5>
                            <p><?= _("Licence Science et Technologie parcours Audiovisuel et Média Numériques. 3<sup>e</sup> année de Licence en cours. 2<sup>e</sup> année en mobilité internationale à l’Université du Québec en Abitibi-Témiscamingue (UQAT)."); ?></p>
                        </li>
                        <li>
                            <h4><strong><a target="_blank" href="https://assomption-chambery.org/lycee-saint-ambroise/">Lycée Saint Ambroise</a></strong>, Chambery (73) - <strong><em>Baccalauréat</em></strong></h4>
                            <h5><em><?= _("JUIN 2022"); ?></em></h5>
                            <p><?= _("Baccalauréat général, Spécialité Mathématiques et Sciences Physique Chimie. Mention Très Bien."); ?></p>
                        </li>
                    </ul>
                </article>
            </div>
            <div class="cv_parts" id="cv_part2">
                <article class="cv_info" id="competences">
                    <h3><?= _("Compétences"); ?></h3>
                    <ul>
                        <li>
                            <p id="soft_skills"><?= _("Autonome, Riguoureux, Organisé, Curieux et Créatif, j'adore découvrir et apprendre de nouvelles choses."); ?></p>
                        </li>
                        <li>
                            <p><strong><?= _("Mixage Audio&nbsp;:"); ?></strong> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_reaper.png"/>&nbsp;Reaper&nbsp;<img class="img_comp" src="./images/lvl-competences/09.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_audition.png"/>&nbsp;Adobe&nbsp;Audition&nbsp;<img class="img_comp" src="./images/lvl-competences/08.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_audacity.png"/>&nbsp;Audacity&nbsp;<img class="img_comp" src="./images/lvl-competences/10.png"/></span></p>
                        </li>
                        <li>
                            <p><strong><?= _("Sound Design&nbsp;:"); ?></strong> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_micro.png"/>&nbsp;<?= _("Bruitages&nbsp;/&nbsp;Ambiances&nbsp;/&nbsp;Voix"); ?>&nbsp;<img class="img_comp" src="images/lvl-competences/08.png"/></span></p>
                        </li>
                        <li>
                            <p><strong><?= _("Montage Vidéo&nbsp;:"); ?></strong> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_premierepro.png"/>&nbsp;Adobe&nbsp;Première&nbsp;Pro&nbsp;<img class="img_comp" src="./images/lvl-competences/09.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_davinci.png"/>&nbsp;DaVinci&nbsp;Resolve&nbsp;<img class="img_comp" src="./images/lvl-competences/07.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_aftereffect.png"/>&nbsp;After&nbsp;Effect&nbsp;<img class="img_comp" src="./images/lvl-competences/04.png"/></span></p>
                        </li>
                        <li>
                            <p><strong><?= _("Montage Photo&nbsp;:");; ?></strong> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_gimp.png"/>&nbsp;Gimp&nbsp;<img class="img_comp" src="./images/lvl-competences/08.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_photoshop.png"/>&nbsp;Photoshop&nbsp;<img class="img_comp" src="./images/lvl-competences/07.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_krita.png"/>&nbsp;Krita&nbsp;<img class="img_comp" src="./images/lvl-competences/08.png"/></span></p>
                        </li>
                        <li>
                            <p><strong><?= _("Programmation&nbsp;:"); ?></strong> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_python.png"/>&nbsp;Python&nbsp;<img class="img_comp" src="./images/lvl-competences/08.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_cpp.png"/>&nbsp;C/C++&nbsp;<img class="img_comp" src="./images/lvl-competences/08.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_java.png"/>&nbsp;Java&nbsp;<img class="img_comp" src="./images/lvl-competences/05.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_html.png"/>&nbsp;HTML&nbsp;<img class="img_comp" src="./images/lvl-competences/09.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_css.png"/>&nbsp;CSS&nbsp;<img class="img_comp" src="./images/lvl-competences/09.png"/></span> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_php.png"/>&nbsp;PHP&nbsp;<img class="img_comp" src="./images/lvl-competences/03.png"/></span></p>
                        </li>
                        <li>
                            <p><strong><?= _("Langues&nbsp;:"); ?></strong> 
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_france.png"/>&nbsp;<?= _("Français"); ?>&nbsp;<img class="img_comp" src="./images/lvl-competences/10.png"/></span>
                            <span class="comp"><img class="img_comp" src="./images/logos-competences/logo_anglais.png"/>&nbsp;<?= _("Anglais"); ?>&nbsp;<img class="img_comp" src="./images/lvl-competences/08.png"/></span></p>
                        </li>
                    </ul>
                </article>
                <article class="cv_info" id="hobbys">
                    <h3><?= _("Centres d'intérêt"); ?></h3>
                    <ul>
                        <li>
                            <p><strong><?= _("Création de Fictions Audio&nbsp;: "); ?></strong>
                            <?= _("Depuis 3 ans, je crée de manière très sérieuse des fictions audio. Et depuis début octobre,  je suis membre de la "); ?><strong><a target="_blank" href="https://javras.fr">TeamJavras</a></strong>.</p>
                        </li>
                        <li>
                            <p><strong><?= _("Création de Courts-Métrages&nbsp;: "); ?></strong>
                            <?= _("Depuis 7 ans, je co réalise et réalise des courts-métrages avec des amis."); ?></p>
                        </li>
                        <li>
                            <p><strong><?= _("Cyclisme (sur route)&nbsp;: "); ?></strong>
                            <?= _("Depuis 7 ans, je fais du vélo, je profite d’être proche des cols montés par le  Tour de France pour les faire."); ?></p>
                        </li>
                        <li>
                            <p><strong><?= _("Guitare&nbsp;: "); ?></strong>
                            <?= _("Depuis quelques mois, je joue de la guitare sur mon temps libre."); ?></p>
                        </li>
                        <li>
                            <p><strong><?= _("Membre de la LPO et de Servas&nbsp;: "); ?></strong>
                            <?= _("Je suis, via mes parents, membre de la "); ?><strong><a target="_blank" href="https://www.lpo.fr/">LPO</a></strong>
                            <?= _(" (Ligue de Protection des Oiseaux), et de l'association "); ?><strong><a target="_blank" href="https://servas.org/fr">Servas</a></strong>
                            <?= _(" (réseau mondial et multiculturel de personnes partageant la vision qu'il est possible de rendre le monde plus pacifique)."); ?></p>
                        </li>
                    </ul>
                </article>
            </div>
        </section>
        <?php include "./component/footer.php"; ?>
    </body>
</html>