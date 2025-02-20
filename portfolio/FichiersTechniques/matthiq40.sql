-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : matthiq40.mysql.db
-- Généré le : mer. 19 fév. 2025 à 21:45
-- Version du serveur : 8.0.40-31
-- Version de PHP : 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `matthiq40`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`) VALUES
(1, 'Matthieu', '962560F20D33AF8CDBA36BBF4B4FD86E6CD9E89B');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `ID` int NOT NULL,
  `titre_etape` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `detail_etape` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`ID`, `titre_etape`, `detail_etape`) VALUES
(1, 'Écriture', 'On avait déjà prévu de se voir, donc on a décidé d’écrire cette histoire ensemble à ce moment-là. C’était réellement cool, on a très peu bloqué, quand l’un de nous bloquait, l’autre avait des idées. Et on était tous les deux d’accord sur la direction que l’histoire prenait. On a donc eu en quelques jours un premier jet dont on était très satisfaits, que l’on a que très peu modifié, en changeant juste des tournures de phrases.'),
(2, 'Casting et Enregistrements', 'Pour le casting, nous avons fait le choix de ne pas faire appel à nos amis, non seulement pour tester le fait de demander dans la communauté de la fiction Audio en France, et parce que nous éprouvions ce besoin de faire ce projet à l’abri de leurs regards. Surement par peur de leur avis, c’était notre bébé, et on l’a gardé pour nous jusqu’à une semaine avant la sortie. Nous avons donc fait le Casting via les salons de recrutements sur deux serveurs discord de fiction audio (Audiodidact et Fiction Sonore), et nous avons eu plusieurs propositions, ce qui nous a permis de choisir le meilleur. Ensuite, j’étais en vacances, et j’ai donc laissé Yanis gérer les enregistrements, il me tenait au courant de la fin des Castings, et je lui donnais mon avis, puis faisait les enregistrements en vocal avec les comédiens, pour leur donner les indications. Tout s’est très bien passé.'),
(3, 'Mixage Audio et Montage', 'À ce moment, nous n’avions eu que les retours des comédiens, et ils étaient tous très positifs. On a mis un peu de temps à se mettre au mixage, et début septembre, on s’est séparé le script en 2, et en une dizaine de jours, on a chacun mixé notre partie, en tenant au courant l’autre, et en lui demandant son avis / son aide par moments. Au final, nous avons demandé un avis extérieur sur le serveur Audiodidact. Le retour était positif, et notre seul changement a été de baisser le volume de la musique. Ensuite, tout était prêt, et on l’a sorti le dimanche qui a suivi.'),
(4, 'Publication et Remaster', 'Après avoir rejoint le groupe Javras, nous avons retravaillé le mixage de cet épisode pilote, avec tout ce que nous avions appris en un an et les retours de l’équipe. Et c’est avec plaisir que nous sortons cette série sur <strong><a target=\'_blank\' href=\'https://javras.fr\'> Javras</a></strong>.'),
(21, 'Planification', 'Tout d’abord, j’ai visionné plusieurs fois la cinématique pour anticiper la manière de réaliser chaque son, et je me suis fait une liste de son, ainsi qu’une liste des répliques.'),
(22, 'Voix', 'J’ai ensuite enregistré les répliques de Hanzo et Genji, en essayant de modifier ma voix pendant l’enregistrement, et ensuite en post-production pour avoir des rendus proches des voix initiales, mais cela reste très imparfait. Mon petit regret est d’avoir fait ce petit projet seul, et de ne pas avoir cherché à avoir d’autres personnes pour les voix.'),
(23, 'Bruitages', 'Enfin, le plus gros morceau, mais le plus fun, j’ai fait plusieurs passages par scène, à faire les pas, les coups, réfléchir à la nécessité de l’ambiance, comment avoir un son réaliste sans en faire trop… '),
(24, 'écriture', 'On s\'est retrouvé plusieurs fois en appel pour écrire, brainstormer, trouver des idées, qui ont évolué, et quand on a eu l’idée du zapping, on a fait une liste d’émissions et de publicités qu’il pourrait y avoir, pour ensuite sélectionner celles que nous écrirons, en fonction de la faisabilité, de la cohérence et de nos préférences.'),
(25, 'Tournage', 'N’étant pas en France pendant cette période, le tournage s\'est déroulé sans moi, sans accroc.'),
(26, 'Montage', 'Daniel a fait tout le montage visuel, et j’ai créé des ambiances pour 2 passages, ainsi que fait une voix pour une publicité, et après avoir validé avec l’équipe, nous avons rendu notre court métrage.'),
(27, 'écriture', 'Avec Baptiste, nous avons passé une petite heure à brainstormer sur nos idées sur le thème, puis après en avoir trouvé une que nous aimions tous les 2, nous avons avancé chacun de notre côté , en relisant ce que l’autre avait fait dans les semaines qui ont suivi.'),
(28, 'Tournage', 'Initialement, nous avions le temps, mais avec les aléas de la vie, et nos disponibilités compliquées, nous n’avons pu tourner que le 19 février, en pensant que la date limite de rendu était le 10. Nous avons donc tourné un peu dans le rush, mais tout s’est bien passé, nous avons l’habitude de ce genre de tournage.'),
(29, 'Montage', 'Comme précisé au dessus, initialement, je pensais avoir uniquement 1 nuit, donc j’ai fait une V1 en 3h, qui était assez bien, et quand j’ai appris que j’avais plus de temps, j’ai pris le temps de repasser sur le montage en 1 semaine, pour faire quelque chose de bien et le sortir.'),
(30, 'écriture', 'Nous n’avions pas vraiment d’idée, et Sarah-Jeanne nous a proposé un scénario qu’elle avait écrit, nous l’avons lu et avons fait des retours, puis Sarah l’a retravaillé à la suite d’une discussion et de conseils de Jean-François, qui nous a montré des points forts selon lui, ce qui nous a aidé aussi pour penser la mise en scène du court-métrage.'),
(31, 'Préproduction et Tests', 'Comme pour Perdu, nous avons fait un découpage technique et une horaire de tournage détaillé, ainsi que préparé les lieux de tournage. Nous avons fait des tests de plans et de colorimétrie. Et j’étais sur la partie direction artistique avec Florian. Nous avons donc réfléchi aux couleurs et aux tons que l’on voulait donner, notamment pour la différence entre fiction et réalité. L’acteur étant en dépression, avoir une fiction très saturée, trop saturée en couleur et une réalité très désaturée. Et tout cela s\'atténuera pour se mélanger, et s’inverser avec le temps. Nous avons aussi réfléchi à un moyen de différencier la réalité et la fiction, et avons pensé à un objet personnel du personnage principal : sa bague, qu’il n\'aurait pas lorsqu’il joue dans un film.'),
(32, 'Tournage', 'A cause de quelques imprévus, nous avons dû réadapter nos horaires de tournage, mais nous avons su nous adapter et tout s\'est bien passé.'),
(33, 'Montage', 'Le montage devait être fait par Gabriel et c\'est lui qui en a fait la majorité, mais comme il a manqué de temps je lui ai donné un coup de main en montant une partie. Il a ensuite terminé, et avec Florian, nous nous sommes occupés de la colorimétrie. Et après un visionnage tous ensemble, nous avons rendu le film.'),
(34, 'écriture', 'Après un rapide brainstorm et qu’une idée se soit dégagée, Daniel, Gabriel et Célestin se sont retrouvé pour écrire, et je les ai aidé pour finir (pendant un cours). Tout le groupe était content de l’histoire.'),
(35, 'Tournage', 'Cette fois, le tournage était bien organisé, divisé sur 2 jours, mais bien organisé, de telle sorte que tous les plans sont rentrés parfaitement dans le planning, et mieux annoncé et autre pour le monteur (Daniel). C’était très cool de faire ce tournage en tant qu’acteur, tout le monde était efficace, motivé, et connaissait son rôle, il n’y avait donc personne non occupé pour perturber les autres.'),
(36, 'Montage', 'Je n’ai pas participé au montage, Daniel et Célestin qui l’ont fait, ils se sont bien réparti les tâches pour le finir dans les temps.'),
(37, 'écriture', 'Au début j’ai envoyé un message pour chercher des acteurs pour savoir qui serait dispo, avoir une idée du nombre de personnages que je pourrais faire. J’ai mis quelques jours à avoir l’idée, puis le soir pendant le mois de juin, j’avançais tous les jours un petit peu sur l’écriture. Ça a bien avancé, et fin juin je l’ai envoyé à mes amis pour relecture. Et après quelques modifications et améliorations, le script final était validé, et j’en étais content.'),
(38, 'Enregistrements', 'Pour éviter de prendre trop de temps, j’ai sélectionné les rôles pour chaque comédien moi-même, sans test, en les connaissant, et en sachant ce qu’ils peuvent bien faire. Et je leur ai donc laissé 3 semaines pour faire les enregistrements, ce qui m’a aussi fait une pause. Pause qui m’a amené la volonté de faire plein d’autres choses, mais aussi des doutes, sur l’histoire, est-ce qu’elle est vraiment bien ? Et sur mes capacités pour le mixage.'),
(39, 'Montage / Mixage', 'J’ai mis un peu de temps pour me mettre au mixage, et j’ai eu de l’aide de Yanis, qui m’a trouvé la majorité des bruitages. Ensuite, j’y ai passé quelques moments, une fois de temps en temps et j’ai eu quelques frayeurs sur les délais, puis j’ai fini 2 semaines avant la date butoire, j’ai donc pu avoir un retour de 3 personnes, et de l’améliorer, tout en le sortant 1 semaine avant la date butoire.'),
(40, 'Publication', 'J’avais tout prévu pour le sortir à 18h le dimanche, et j’ai eu un week-end très éprouvant, et j’ai oublié la publication, et étant au canada, je l’ai sorti à 21h heure canadienne ,un peu de retard…'),
(41, 'Organisation', 'Tout d’abord, en Septembre quand nous avons eu l’idée d’une série audio calendrier de l’avent, nous pensions le faire dans 1 an. Puis quand j’ai eu une idée, fin septembre, on en a parlé, on s’est dit “En vrai… Il y a un monde où ça le fait”. Nous avons donc planifié toute la réalisation de cette fiction audio, pour la réaliser en 2 mois, pour que tout se passe au mieux et soit réalisable.'),
(42, 'écriture', 'Après avoir validé l’idée initiale, je me suis lancé sur une semaine à l’écriture d’une trame générale pour chaque épisode, et nous avions ensuite planifié 2 semaines d’écriture pour chaque bloc de 6 épisodes. Au début j’ai suivi ce rythme, et après le difficulté que j’ai eu à me replonger dedans pour l’écriture de l’épisode 7, j’ai décidé de ne plus faire de pause de plus de 1 jour dans l’écriture, et de toujours faire quelque chose pour avancer chaque jour (même si c’est juste envoyer un message). Et à ce rythme, j’ai fini l’écriture début Novembre, en étant plutôt serein sur nos deadlines d’écriture, mais peu rassuré sur les deadlines de montage.'),
(43, 'Casting et Enregistrements', 'Dans ce projet, nous avons tout mélangé, c\'est-à-dire que dans notre planification, pendant l’écriture de 6 épisodes, les 6 épisodes précédents étaient enregistrés. Donc nous avons fait un casting pendant l’écriture des 6 premiers épisodes, en envoyant des messages sur plusieurs serveurs discord faisant de la fiction audio où nous sommes. Nous pensions avoir du mal à trouver 21 voix, mais finalement, nous avons même eu quelques personnes en trop, ce qui nous a permis de choisir les meilleures voix, et nous sommes très content des voix que nous avons choisies. C’est aussi pendant le casting que nous avons été approché par Richoult pour que la Team Javras nous aide dans la production de cette série (car c’était vraiment un gros défi), et ainsi rejoindre la Team Javras pour de prochaines créations. Et nous avons donc accepté cette aide, qui nous a été très précieuse tout au long de la réalisation. Ainsi, pour les enregistrements, nous avons enregistré avec certaines personnes en direct, et reçu les enregistrements puis fait des retours pour d’autres, en fonction de la préférence, et tout s’est bien passé. Nous avons eu quelques oublis, mais c’est compréhensible dans un projet comme celui-là, et cela ne nous a pas ralenti dans le mixage.'),
(44, 'Mixage', 'Pour le mixage, nous nous sommes séparé les épisodes en 2, je mixait les épisodes impairs, et Yanis les pairs. Pour sortir cette série sur le site de la Team Javras, il fallait avoir les épisodes prêts en avance pour les sortir en avant première aux mécènes sur Tipeee et Patreon. Ainsi, nous avons vu avec Richoult, pour planifier toutes les deadlines pour chaque bloc d’épisodes, et nous nous sommes lancés. Comme j’avais globalement plus de temps libre que Yanis, surtout sur la fin, j’ai monté certains des épisodes qu’il devait monter quand il n’avait pas le temps et que je l’avais. C’était l’avantage d’être à 2 sur ce projet, pouvoir se soulager l’un et l’autre d’une charge de travail, en fonction de nos activités extérieures et de nos cours qui nous occupaient une majorité de notre temps.'),
(45, 'Illustration, Composition et Diffusion', 'Pour tout ce qui concerne l’illustration, la composition d’un jingle, et la diffusion, un grand merci à Richoult qui a tout géré, nous demandant des directives et nous faisant valider (superbe pochette réalisée par Fafodill, et jingle incroyable composé par Kayji). Et cela a été très cool pour nous, de pouvoir nous concentrer sur le mixage sans avoir à nous soucier de tout ça.'),
(46, 'Montage', 'Pour ce court-métrage, nous étions beaucoup, j’ai donc souhaité ne pas m’imposer, et faire la partie que je préfère : le Montage. J’ai donc donné mon avis sur le scénario, mais pas plus, et n’ai pas participé au tournage (ils étaient assez sur place). Pour le montage, suite à un problème de communication et d’organisation, Célestin et moi avons reçu les rushs 5h30 avant l\'heure de rendu, pas besoin d’être un génie pour savoir que nous avons été pressés. Daniel nous avait bien mâché le travail en nous coupant toutes les séquences et en les nommant, mais nous avons passé ces 5h30 en vocal à travailler sur tous les détails que l’on pouvait améliorer, à peu manger pendant ces 5h. Pour au final rendre avec des défauts que nous n’avions pas eu le temps de corriger, à 22h59 (pour 23h au plus tard) C’était très intense, mais très cool à faire, même si décevant de laisser des défauts, notamment sur le son, que l’on a pas eu le temps de vraiment beaucoup retravailler. Daniel est ensuite repassé sur notre montage pour faire ces améliorations avant la publication sur YouTube.'),
(47, 'écriture', 'Au début, je me suis fait un schéma de tout ce qu’il devait se passer. Et ensuite, pour chaque épisode, il y avait environ 1 semaine d’écriture, où, en me posant, les idées venaient toutes seules. Pour les 2 premiers épisodes j’ai été aidé par Baptiste Martin.'),
(48, 'Distribution et Enregistrements', 'C’était ma première fiction audio, et j’ai donc expérimenté le fait de faire jouer 2 rôles ou plus à une même personne, sans que cela ne se remarque, et donc partager les 5-6 rôles par épisodes, aux 3 à 4 acteurs que nous étions. Au final rien de très compliqué.'),
(49, 'Montage', 'Première expérience aussi en montage audio, que je négligeais jusqu’alors. J’ai découvert la joie de pouvoir ajouter les bruitages, modifier les voix, remodeler les phrases sans que ça ne s’entende. Mais aussi, ce que j’ai appris plus vers les derniers épisodes, plus prendre le temps, parce que mon montage restait très simple.'),
(50, 'Autre', 'Les 2 derniers épisodes ont été écrits avant que je ne prenne plus le temps de faire mes fictions audio, mais monté après. Il n’y a donc pas vraiment d’évolution sur l’écriture, mais j’ai essayé de faire un meilleur mixage, ils m’ont permis de prendre en main le logiciel Reaper avant de me lancer dans le mixage de ma saga de l’été (Les Guimauves Tueuses) même si le sujet ne menait pas à de grandes difficultés de montage. Et c’est en partie pour ça que je l’ai choisi, recréer l’univers sonore de minecraft est assez simple, en reprenant les bruitages du jeu, qui a une vraie identité sonore pour tous les joueurs.'),
(51, 'L\'idée et l\'écriture', 'Nous nous sommes vus quelques fois pour discuter de l’idée, que quelques-uns écrivent, puis que l’on rediscute, adapte les idées et réécrive le tout jusqu’à atteindre une version que l’on aimait tous.'),
(52, 'Tournage et Montage du Picture Lock', 'Lucas et Malo ont supervisé la partie Tournage, et Alexandre s’est occupé de la prise son terrain pour avoir un son témoin. Le tournage s’est bien passé, bien qu’ambitieux et se passant dans 3 lieux différents sur une semaine, nous avons réussi à avoir les images que l’on voulait, puis Lucas a fait le montage du picture lock, que nous avons tous validé.'),
(53, 'Mixage Audio et Montage', 'Sur toute la partie recréation du son j’étais derrière l’ordinateur à faire la technique, et j’ai donc participé à toutes les étapes avec, à chaque fois, un autre membre de l’équipe.<br><br><strong>- Planifier :</strong> Tout d’abord, nous avons fait un visionnage ensemble, et, avec les conseils de Billy, nous avons planifié quels sons allaient être utilisés, et quels effets sonores nous voulions créer, dans le but de créer quelles réactions chez le spectateur.<br><br><strong>- Les voix :</strong> Ensuite, avec Lilou, nous avons retrouvé tous les acteurs un à un pour qu’ils enregistrent la réplique. Le procédé était simple, on passait plusieurs fois la réplique à l’acteur, et ensuite, l’acteur faisait plusieurs prises, jusqu’à ce qu’on ait la bonne.<br><br><strong>- Les ambiances :</strong> Pendant ces enregistrements, Eugénie a listé tous les bruitages nécessaires aux ambiances et est allée les enregistrer. Elle m’a ensuite rejoint, et nous avons composé ces ambiances à l’aide des bruitages qu’elle avait pris, en commençant un peu à mixer le tout pour avoir un résultat clair à montrer à Billy. Lucas avait aussi demandé à Etienne Bultot de nous composer une musique inspirée de celle utilisée comme témoin pour le picture lock, pour coller à l’ambiance que l’on souhaitait créer.<br><br><strong>- Les bruitages :</strong> Un peu plus tard, j’ai retrouvé Malo qui avait apporté de quoi enregistrer les bruitages en studio, et nous avons passé le court métrage plusieurs fois pour enregistrer et placer tous les bruitages (une passe pour les pas, une passe pour les bruits de main, …)<br><br><strong>- Mixer le tout :</strong> Enfin, j’ai vu Billy pour parler du mixage, il m’a montré l’utilisation des BUS, et j’ai donc trié plus proprement la timeline, et fait plusieurs passes pour ajouter la réverbération, puis spatialiser le tout en 5.1, tout en harmonisant le tout à -24LUFS.'),
(54, 'Rendu et Making Of', 'Après quelques visionnages, nous étions tous satisfaits, et nous avons rendu ce film à Billy pour qu’il prépare un DCP pour le visionnage qui était prévu au cinéma. Antoine a aussi réalisé un <strong><a target=\'_blank\' href=\'https://youtu.be/IM-N591v8Nc\'>Making Of.</a></strong>'),
(55, 'écriture', 'Comme je l’ai précisé, la création de cette fiction audio est tombée au milieu de l’écriture de l’Ordre des Brownies, ce qui m’a influencé sur le fait de faire une histoire vraiment différente de ce que j’écrivais. En plus, l’idée d’écrire quelque chose de court, après avoir passé plusieurs semaines sur une histoire longue pas encore terminée était très motivante.'),
(56, 'Casting et Enregistrements', 'J’ai du trouver les acteurs et les faire enregistrer en une semaine, ce qui est un défi, quand tout le monde a des cours ou des partiels, mais au final, cela a apporté un moment de pause dans la semaine à chacun des doubleurs, et les enregistrements se sont très bien passés.'),
(57, 'Montage / Mixage', 'Au moment des enregistrements, j’étais assez stressé par le manque de temps au moment du Montage, mais au final, il s’est avéré qu’une semaine était largement suffisante. J’ai expérimenté via cette fiction audio une nouvelle manière de faire les visuels, en ajoutant une onde visible du son, pour qu’il y ait de l’activité visuelle.'),
(58, 'écriture', 'L\'exercice d’écrire pour une fiction ne m\'était pas étranger, et je me suis vite habitué à la subtilité qu’il faut ajouter aux dialogues, et aux détails de bruitages qu’il faut mettre pour rendre la scène réaliste sans images.'),
(59, 'Enregistrements et Montage', 'Pour l’enregistrement, rien de nouveau non plus, enregistrer sans pause, mais la nouveauté : faire plusieurs fois chaque réplique avec différentes intonations, pour choisir la meilleure au montage. Au niveau du montage, j’ai découvert des fonctionnalités sur audacity, et des sites pour récupérer des bruitages et des musiques, ce qui est très utile pour tous les prochains projets.'),
(60, 'Export et Tags du fichier mp3', 'Enfin, j’ai découvert des pré-réglages d’exports classiques pour avoir un bon son restitué, et l’application MP3Tag, qui permet de changer les propriétés d’un fichier mp3, notamment le titre, l’année, l’auteur, les participants, la pochette du mono mp3… '),
(61, 'écriture', 'Tout s\'est fait en 1 semaine, comme nous n\'avions pas beaucoup de temps, nous ne nous sommes pas attardé sur l\'écriture, quitte à réadapter au tournage.'),
(62, 'Tournage', 'Nous avons profité de l\'aprem de tournage, pour, avant de tourner faire un petit bilan de la chaîne YouTube, et des projets, et le tournage s\'est fait assez naturellement avec ce qu\'on avait écrit. '),
(63, 'Montage', 'Nous avions imaginé l\'histoire pour qu\'elle soit simple à tourner et monter, le montage n\'a donc pas été un problème. '),
(64, 'écriture', 'La phase d’écriture a été assez longue, notamment car je ne connaissais rien du jeu Assassin’S Creed dans l’univers duquel l’histoire devait se passer, et j\'ai donc laissé Baptiste Martin faire un squelette assez détaillé, et une fois qu’il avait bien avancé, et qu’il n’avait plus trop de temps, je l’ai aidé, ce qui a fait qu’un script débuté en décembre 2021 a été terminé en juillet 2022.'),
(65, 'Tournage', 'Très vite après la fin de l’écriture, nous avons commencé à tourner, sur plusieurs jours, en plusieurs étapes, en nous organisant bien, pour me simplifier la vie au montage, et rendre quelque chose de qualitatif dont on serait fier. Comme dans tout tournage nous n’avons pas été efficaces à 100%, mais nous étions plus sérieux en général.'),
(66, 'Montage', 'Le montage était très motivant pour moi, parce que j’ai démarré après chaque journée de tournage avec ce que l’on avait tourné. J’ai pour la première fois découpé mon montage en plusieurs petits montages, ce qui me motivait aussi, à chaque fois que je finissais un petit bout. Et faire le montage des scènes de combat était une première très intéressante, parce que le montage dynamique à couper à l’image près faisait que je créait vraiment le combat que l’on avait simulé.'),
(67, 'Pré-production', 'La première étape de ce court-métrage, une fois écrit, était de préparer un cahier d’intentions pour exprimer nos intentions en termes de réalisation, de direction artistique et de direction photo. Ce qui s’est bien passé, le travail étant bien réparti dans le groupe. Ensuite, Antoine, l’assistant réalisateur, s’est occupé du cahier de production, contenant toutes les informations relatives au tournage pour qu’il se passe au mieux, notamment d’un découpage technique et d’un horaire détaillé des journées de tournage. Et nous avons fait des tests selon nos intentions, pour nous assurer que l’effet souhaité était là pour le cassage volontaire de la règle des 180°, et faire des repérages sur les cadrages que nous ferions.'),
(68, 'Tournage', 'Tout s’est bien passé en pré-prod, et le tournage a été très bien préparé, autant pour la réservation du lieu, que pour l’organisation des acteurs et figurants. Donc tout le tournage s’est très bien passé, sauf 2 plans que nous avons dû retourner plus tard car ils étaient surexposés, mais nous n’avons pas eu plus de contre-temps'),
(69, 'Montage', 'Après discussion avec l’équipe, nous avons décidé que je m’occuperais du montage principal, et qu’ils m\'aideraient pour les détails, comme le design sonore, ou la colorimétrie, qui a été entièrement faite par Martin et Florian. Le montage était très agréable, j’ai pu mettre en pratique le cours que nous avons eu l’automne dernier, et recréer toute l’ambiance que nous cherchions, via des cuts à des moments clés. J’ai ensuite travaillé le son du court métrage, qui ne me plaisait pas initialement, pour atteindre le résultat que je souhaitais, notamment en ajoutant dans bruitages.'),
(70, 'Pré-montage des voix', 'Tout d’abord, j’ai dérushé les enregistrements de voix, puis les ai positionné pour avoir la base de l’histoire de timée et en prendre déjà mieux connaissance qu’avec juste une lecture du script.'),
(71, 'Préparation, Enregistrement et Recherche de Bruitages', 'Ensuite, j’ai fait un passage sur le script en me notant tous les bruitages nécessaires, et ai réfléchi aux bruitages nécessaires pour recréer l’ambiance de la forêt. A suivi une recherche de bruitages, et une liste des bruitages que je ne trouvais pas et que je pouvais enregistrer, puis sur une heure, j’ai enregistré ces bruitages.'),
(72, 'Création de l\'ambiance sonore', 'L’étape suivante a été de placer de manière semi-aléatoire les bruitages que j’avais pour recréer l’ambiance de la forêt sur toute la fiction.'),
(73, 'Placement des bruitages', 'Et enfin, pour atteindre une version écoutable de la fiction, le placement de tous les bruitages. Et une écoute pour gérer tous les volumes, et une dernière pour assurer la cohérence de tout.'),
(74, 'Envoi d\'une V1 et Modifications', 'Ensuite, j’ai envoyé cette V1 à Ukarnub qui m’a fait des retours, et nous avons échangés jusqu’à une V7, où nous avons fait quelques dernières petites modifications, pour en arriver à une version finale qui nous plaisait à tous les 2'),
(75, 'écriture', 'Le soir de la révélation du thème et des contraintes, nous avons fait un brainstorm avec toute l’équipe pour choisir une ligne directrice pour l’histoire. Puis, Daniel, Célestin et moi-même nous sommes retrouvés en plus petit comité pour écrire plus en détail les dialogues et l’histoire. C’était très cool d’écrire à 3, car quand l’un de nous manquait d’inspiration, les 2 autres étaient là pour aider.'),
(76, 'Tournage et Montage Visuel', 'Je n\'étais pas présent, mais le tournage s\'est bien passé, sans gros accroc, et Daniel a fait ensuite le montage visuel toute la nuit de samedi à dimanche.'),
(77, 'Sound Design', 'Dimanche matin, j’ai rejoint Daniel, il m’a tout envoyé et j’ai pu faire le sound design avec ses indications, et comme il était avec moi en appel, je pouvais lui poser des questions régulièrement. J’ai donc pu rééquilibrer le volume des voix, ajouter des bruitages et une musique, nous avons visionné tout cela ensemble, et avons validé une version.');

-- --------------------------------------------------------

--
-- Structure de la table `mod960_commentmeta`
--

CREATE TABLE `mod960_commentmeta` (
  `meta_id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mod960_comments`
--

CREATE TABLE `mod960_comments` (
  `comment_ID` bigint UNSIGNED NOT NULL,
  `comment_post_ID` bigint UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_comments`
--

INSERT INTO `mod960_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Un commentateur WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2024-12-09 23:07:28', '2024-12-09 22:07:28', 'Bonjour, ceci est un commentaire.\nPour débuter avec la modération, la modification et la suppression de commentaires, veuillez visiter l’écran des Commentaires dans le Tableau de bord.\nLes avatars des personnes qui commentent arrivent depuis <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mod960_links`
--

CREATE TABLE `mod960_links` (
  `link_id` bigint UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mod960_options`
--

CREATE TABLE `mod960_options` (
  `option_id` bigint UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_options`
--

INSERT INTO `mod960_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://matthieuthiesset.fr', 'yes'),
(2, 'home', 'http://matthieuthiesset.fr', 'yes'),
(3, 'blogname', 'WordPress', 'yes'),
(4, 'blogdescription', 'Un site utilisant WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'matthieuthiesset@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'j F Y', 'yes'),
(24, 'time_format', 'G\\hi', 'yes'),
(25, 'links_updated_date_format', 'd F Y G\\hi', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '', 'yes'),
(29, 'rewrite_rules', '', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'twentytwentytwo', 'yes'),
(41, 'stylesheet', 'twentytwentytwo', 'yes'),
(42, 'comment_registration', '0', 'yes'),
(43, 'html_type', 'text/html', 'yes'),
(44, 'use_trackback', '0', 'yes'),
(45, 'default_role', 'subscriber', 'yes'),
(46, 'db_version', '51917', 'yes'),
(47, 'uploads_use_yearmonth_folders', '1', 'yes'),
(48, 'upload_path', '', 'yes'),
(49, 'blog_public', '1', 'yes'),
(50, 'default_link_category', '2', 'yes'),
(51, 'show_on_front', 'posts', 'yes'),
(52, 'tag_base', '', 'yes'),
(53, 'show_avatars', '1', 'yes'),
(54, 'avatar_rating', 'G', 'yes'),
(55, 'upload_url_path', '', 'yes'),
(56, 'thumbnail_size_w', '150', 'yes'),
(57, 'thumbnail_size_h', '150', 'yes'),
(58, 'thumbnail_crop', '1', 'yes'),
(59, 'medium_size_w', '300', 'yes'),
(60, 'medium_size_h', '300', 'yes'),
(61, 'avatar_default', 'mystery', 'yes'),
(62, 'large_size_w', '1024', 'yes'),
(63, 'large_size_h', '1024', 'yes'),
(64, 'image_default_link_type', 'none', 'yes'),
(65, 'image_default_size', '', 'yes'),
(66, 'image_default_align', '', 'yes'),
(67, 'close_comments_for_old_posts', '0', 'yes'),
(68, 'close_comments_days_old', '14', 'yes'),
(69, 'thread_comments', '1', 'yes'),
(70, 'thread_comments_depth', '5', 'yes'),
(71, 'page_comments', '0', 'yes'),
(72, 'comments_per_page', '50', 'yes'),
(73, 'default_comments_page', 'newest', 'yes'),
(74, 'comment_order', 'asc', 'yes'),
(75, 'sticky_posts', 'a:0:{}', 'yes'),
(76, 'widget_categories', 'a:0:{}', 'yes'),
(77, 'widget_text', 'a:0:{}', 'yes'),
(78, 'widget_rss', 'a:0:{}', 'yes'),
(79, 'uninstall_plugins', 'a:0:{}', 'no'),
(80, 'timezone_string', 'Europe/Paris', 'yes'),
(81, 'page_for_posts', '0', 'yes'),
(82, 'page_on_front', '0', 'yes'),
(83, 'default_post_format', '0', 'yes'),
(84, 'link_manager_enabled', '0', 'yes'),
(85, 'finished_splitting_shared_terms', '1', 'yes'),
(86, 'site_icon', '0', 'yes'),
(87, 'medium_large_size_w', '768', 'yes'),
(88, 'medium_large_size_h', '0', 'yes'),
(89, 'wp_page_for_privacy_policy', '3', 'yes'),
(90, 'show_comments_cookies_opt_in', '1', 'yes'),
(91, 'admin_email_lifespan', '1749334047', 'yes'),
(92, 'disallowed_keys', '', 'no'),
(93, 'comment_previously_approved', '1', 'yes'),
(94, 'auto_plugin_theme_update_emails', 'a:0:{}', 'no'),
(95, 'auto_update_core_dev', 'enabled', 'yes'),
(96, 'auto_update_core_minor', 'enabled', 'yes'),
(97, 'auto_update_core_major', 'enabled', 'yes'),
(98, 'wp_force_deactivated_plugins', 'a:0:{}', 'yes'),
(99, 'initial_db_version', '51917', 'yes'),
(100, 'mod960_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(101, 'fresh_site', '1', 'yes'),
(102, 'widget_block', 'a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:159:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Articles récents</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:233:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Commentaires récents</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:151:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Catégories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(103, 'sidebars_widgets', 'a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:13:\"array_version\";i:3;}', 'yes'),
(104, 'cron', 'a:3:{i:1733782049;a:6:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:18:\"wp_https_detection\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1733868449;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'yes'),
(105, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(115, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(116, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(117, '_transient_doing_cron', '1733783617.7756779193878173828125', 'yes'),
(118, '_transient_timeout_global_styles_twentytwentytwo', '1733783677', 'no'),
(119, '_transient_global_styles_twentytwentytwo', 'body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--color--foreground: #000000;--wp--preset--color--background: #ffffff;--wp--preset--color--primary: #1a4548;--wp--preset--color--secondary: #ffe2c7;--wp--preset--color--tertiary: #F6F6F6;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--gradient--vertical-secondary-to-tertiary: linear-gradient(to bottom,var(--wp--preset--color--secondary) 0%,var(--wp--preset--color--tertiary) 100%);--wp--preset--gradient--vertical-secondary-to-background: linear-gradient(to bottom,var(--wp--preset--color--secondary) 0%,var(--wp--preset--color--background) 100%);--wp--preset--gradient--vertical-tertiary-to-background: linear-gradient(to bottom,var(--wp--preset--color--tertiary) 0%,var(--wp--preset--color--background) 100%);--wp--preset--gradient--diagonal-primary-to-foreground: linear-gradient(to bottom right,var(--wp--preset--color--primary) 0%,var(--wp--preset--color--foreground) 100%);--wp--preset--gradient--diagonal-secondary-to-background: linear-gradient(to bottom right,var(--wp--preset--color--secondary) 50%,var(--wp--preset--color--background) 50%);--wp--preset--gradient--diagonal-background-to-secondary: linear-gradient(to bottom right,var(--wp--preset--color--background) 50%,var(--wp--preset--color--secondary) 50%);--wp--preset--gradient--diagonal-tertiary-to-background: linear-gradient(to bottom right,var(--wp--preset--color--tertiary) 50%,var(--wp--preset--color--background) 50%);--wp--preset--gradient--diagonal-background-to-tertiary: linear-gradient(to bottom right,var(--wp--preset--color--background) 50%,var(--wp--preset--color--tertiary) 50%);--wp--preset--duotone--dark-grayscale: url(\'#wp-duotone-dark-grayscale\');--wp--preset--duotone--grayscale: url(\'#wp-duotone-grayscale\');--wp--preset--duotone--purple-yellow: url(\'#wp-duotone-purple-yellow\');--wp--preset--duotone--blue-red: url(\'#wp-duotone-blue-red\');--wp--preset--duotone--midnight: url(\'#wp-duotone-midnight\');--wp--preset--duotone--magenta-yellow: url(\'#wp-duotone-magenta-yellow\');--wp--preset--duotone--purple-green: url(\'#wp-duotone-purple-green\');--wp--preset--duotone--blue-orange: url(\'#wp-duotone-blue-orange\');--wp--preset--duotone--foreground-and-background: url(\'#wp-duotone-foreground-and-background\');--wp--preset--duotone--foreground-and-secondary: url(\'#wp-duotone-foreground-and-secondary\');--wp--preset--duotone--foreground-and-tertiary: url(\'#wp-duotone-foreground-and-tertiary\');--wp--preset--duotone--primary-and-background: url(\'#wp-duotone-primary-and-background\');--wp--preset--duotone--primary-and-secondary: url(\'#wp-duotone-primary-and-secondary\');--wp--preset--duotone--primary-and-tertiary: url(\'#wp-duotone-primary-and-tertiary\');--wp--preset--font-size--small: 1rem;--wp--preset--font-size--medium: 1.125rem;--wp--preset--font-size--large: 1.75rem;--wp--preset--font-size--x-large: clamp(1.75rem, 3vw, 2.25rem);--wp--preset--font-family--system-font: -apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;--wp--preset--font-family--source-serif-pro: \"Source Serif Pro\", serif;--wp--custom--spacing--small: max(1.25rem, 5vw);--wp--custom--spacing--medium: clamp(2rem, 8vw, calc(4 * var(--wp--style--block-gap)));--wp--custom--spacing--large: clamp(4rem, 10vw, 8rem);--wp--custom--spacing--outer: var(--wp--custom--spacing--small, 1.25rem);--wp--custom--typography--font-size--huge: clamp(2.25rem, 4vw, 2.75rem);--wp--custom--typography--font-size--gigantic: clamp(2.75rem, 6vw, 3.25rem);--wp--custom--typography--font-size--colossal: clamp(3.25rem, 8vw, 6.25rem);--wp--custom--typography--line-height--tiny: 1.15;--wp--custom--typography--line-height--small: 1.2;--wp--custom--typography--line-height--medium: 1.4;--wp--custom--typography--line-height--normal: 1.6;}body { margin: 0; }body{background-color: var(--wp--preset--color--background);color: var(--wp--preset--color--foreground);font-family: var(--wp--preset--font-family--system-font);font-size: var(--wp--preset--font-size--medium);line-height: var(--wp--custom--typography--line-height--normal);--wp--style--block-gap: 1.5rem;}.wp-site-blocks > .alignleft { float: left; margin-right: 2em; }.wp-site-blocks > .alignright { float: right; margin-left: 2em; }.wp-site-blocks > .aligncenter { justify-content: center; margin-left: auto; margin-right: auto; }.wp-site-blocks > * { margin-top: 0; margin-bottom: 0; }.wp-site-blocks > * + * { margin-top: var( --wp--style--block-gap ); }h1{font-family: var(--wp--preset--font-family--source-serif-pro);font-size: var(--wp--custom--typography--font-size--colossal);font-weight: 300;line-height: var(--wp--custom--typography--line-height--tiny);}h2{font-family: var(--wp--preset--font-family--source-serif-pro);font-size: var(--wp--custom--typography--font-size--gigantic);font-weight: 300;line-height: var(--wp--custom--typography--line-height--small);}h3{font-family: var(--wp--preset--font-family--source-serif-pro);font-size: var(--wp--custom--typography--font-size--huge);font-weight: 300;line-height: var(--wp--custom--typography--line-height--tiny);}h4{font-family: var(--wp--preset--font-family--source-serif-pro);font-size: var(--wp--preset--font-size--x-large);font-weight: 300;line-height: var(--wp--custom--typography--line-height--tiny);}h5{font-family: var(--wp--preset--font-family--system-font);font-size: var(--wp--preset--font-size--medium);font-weight: 700;line-height: var(--wp--custom--typography--line-height--normal);text-transform: uppercase;}h6{font-family: var(--wp--preset--font-family--system-font);font-size: var(--wp--preset--font-size--medium);font-weight: 400;line-height: var(--wp--custom--typography--line-height--normal);text-transform: uppercase;}a{color: var(--wp--preset--color--foreground);}.wp-block-button__link{background-color: var(--wp--preset--color--primary);border-radius: 0;color: var(--wp--preset--color--background);font-size: var(--wp--preset--font-size--medium);}.wp-block-post-title{font-family: var(--wp--preset--font-family--source-serif-pro);font-size: var(--wp--custom--typography--font-size--gigantic);font-weight: 300;line-height: var(--wp--custom--typography--line-height--tiny);}.wp-block-post-comments{padding-top: var(--wp--custom--spacing--small);}.wp-block-pullquote{border-width: 1px 0;}.wp-block-query-title{font-family: var(--wp--preset--font-family--source-serif-pro);font-size: var(--wp--custom--typography--font-size--gigantic);font-weight: 300;line-height: var(--wp--custom--typography--line-height--small);}.wp-block-quote{border-width: 1px;}.wp-block-site-title{font-family: var(--wp--preset--font-family--system-font);font-size: var(--wp--preset--font-size--medium);font-weight: normal;line-height: var(--wp--custom--typography--line-height--normal);}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-foreground-color{color: var(--wp--preset--color--foreground) !important;}.has-background-color{color: var(--wp--preset--color--background) !important;}.has-primary-color{color: var(--wp--preset--color--primary) !important;}.has-secondary-color{color: var(--wp--preset--color--secondary) !important;}.has-tertiary-color{color: var(--wp--preset--color--tertiary) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-foreground-background-color{background-color: var(--wp--preset--color--foreground) !important;}.has-background-background-color{background-color: var(--wp--preset--color--background) !important;}.has-primary-background-color{background-color: var(--wp--preset--color--primary) !important;}.has-secondary-background-color{background-color: var(--wp--preset--color--secondary) !important;}.has-tertiary-background-color{background-color: var(--wp--preset--color--tertiary) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-foreground-border-color{border-color: var(--wp--preset--color--foreground) !important;}.has-background-border-color{border-color: var(--wp--preset--color--background) !important;}.has-primary-border-color{border-color: var(--wp--preset--color--primary) !important;}.has-secondary-border-color{border-color: var(--wp--preset--color--secondary) !important;}.has-tertiary-border-color{border-color: var(--wp--preset--color--tertiary) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-vertical-secondary-to-tertiary-gradient-background{background: var(--wp--preset--gradient--vertical-secondary-to-tertiary) !important;}.has-vertical-secondary-to-background-gradient-background{background: var(--wp--preset--gradient--vertical-secondary-to-background) !important;}.has-vertical-tertiary-to-background-gradient-background{background: var(--wp--preset--gradient--vertical-tertiary-to-background) !important;}.has-diagonal-primary-to-foreground-gradient-background{background: var(--wp--preset--gradient--diagonal-primary-to-foreground) !important;}.has-diagonal-secondary-to-background-gradient-background{background: var(--wp--preset--gradient--diagonal-secondary-to-background) !important;}.has-diagonal-background-to-secondary-gradient-background{background: var(--wp--preset--gradient--diagonal-background-to-secondary) !important;}.has-diagonal-tertiary-to-background-gradient-background{background: var(--wp--preset--gradient--diagonal-tertiary-to-background) !important;}.has-diagonal-background-to-tertiary-gradient-background{background: var(--wp--preset--gradient--diagonal-background-to-tertiary) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}.has-system-font-font-family{font-family: var(--wp--preset--font-family--system-font) !important;}.has-source-serif-pro-font-family{font-family: var(--wp--preset--font-family--source-serif-pro) !important;}', 'no'),
(120, 'theme_mods_twentytwentytwo', 'a:1:{s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(121, '_transient_timeout_global_styles_svg_filters_twentytwentytwo', '1733783678', 'no'),
(122, '_transient_global_styles_svg_filters_twentytwentytwo', '<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-dark-grayscale\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 0.49803921568627\" /><feFuncG type=\"table\" tableValues=\"0 0.49803921568627\" /><feFuncB type=\"table\" tableValues=\"0 0.49803921568627\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-grayscale\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 1\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0 1\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-purple-yellow\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.54901960784314 0.98823529411765\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0.71764705882353 0.25490196078431\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-blue-red\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 1\" /><feFuncG type=\"table\" tableValues=\"0 0.27843137254902\" /><feFuncB type=\"table\" tableValues=\"0.5921568627451 0.27843137254902\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-midnight\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 0\" /><feFuncG type=\"table\" tableValues=\"0 0.64705882352941\" /><feFuncB type=\"table\" tableValues=\"0 1\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-magenta-yellow\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.78039215686275 1\" /><feFuncG type=\"table\" tableValues=\"0 0.94901960784314\" /><feFuncB type=\"table\" tableValues=\"0.35294117647059 0.47058823529412\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-purple-green\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.65098039215686 0.40392156862745\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0.44705882352941 0.4\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-blue-orange\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.098039215686275 1\" /><feFuncG type=\"table\" tableValues=\"0 0.66274509803922\" /><feFuncB type=\"table\" tableValues=\"0.84705882352941 0.41960784313725\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-foreground-and-background\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 1\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0 1\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-foreground-and-secondary\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 1\" /><feFuncG type=\"table\" tableValues=\"0 0.88627450980392\" /><feFuncB type=\"table\" tableValues=\"0 0.78039215686275\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-foreground-and-tertiary\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 0.96470588235294\" /><feFuncG type=\"table\" tableValues=\"0 0.96470588235294\" /><feFuncB type=\"table\" tableValues=\"0 0.96470588235294\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-primary-and-background\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.10196078431373 1\" /><feFuncG type=\"table\" tableValues=\"0.27058823529412 1\" /><feFuncB type=\"table\" tableValues=\"0.28235294117647 1\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-primary-and-secondary\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.10196078431373 1\" /><feFuncG type=\"table\" tableValues=\"0.27058823529412 0.88627450980392\" /><feFuncB type=\"table\" tableValues=\"0.28235294117647 0.78039215686275\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-primary-and-tertiary\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.10196078431373 0.96470588235294\" /><feFuncG type=\"table\" tableValues=\"0.27058823529412 0.96470588235294\" /><feFuncB type=\"table\" tableValues=\"0.28235294117647 0.96470588235294\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg>', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `mod960_postmeta`
--

CREATE TABLE `mod960_postmeta` (
  `meta_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_postmeta`
--

INSERT INTO `mod960_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default');

-- --------------------------------------------------------

--
-- Structure de la table `mod960_posts`
--

CREATE TABLE `mod960_posts` (
  `ID` bigint UNSIGNED NOT NULL,
  `post_author` bigint UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_posts`
--

INSERT INTO `mod960_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2024-12-09 23:07:28', '2024-12-09 22:07:28', '<!-- wp:paragraph -->\n<p>Bienvenue sur WordPress. Ceci est votre premier article. Modifiez-le ou supprimez-le, puis commencez à écrire !</p>\n<!-- /wp:paragraph -->', 'Bonjour tout le monde !', '', 'publish', 'open', 'open', '', 'bonjour-tout-le-monde', '', '', '2024-12-09 23:07:28', '2024-12-09 22:07:28', '', 0, 'http://matthieuthiesset.fr/?p=1', 0, 'post', '', 1),
(2, 1, '2024-12-09 23:07:28', '2024-12-09 22:07:28', '<!-- wp:paragraph -->\n<p>Ceci est une page d’exemple. C’est différent d’un article de blog parce qu’elle restera au même endroit et apparaîtra dans la navigation de votre site (dans la plupart des thèmes). La plupart des gens commencent par une page « À propos » qui les présente aux personnes visitant le site. Cela pourrait ressembler à quelque chose comme cela :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Bonjour ! Je suis un mécanicien qui aspire à devenir acteur, et voici mon site. J’habite à Bordeaux, j’ai un super chien baptisé Russell, et j’aime la vodka (ainsi qu’être surpris par la pluie soudaine lors de longues balades sur la plage au coucher du soleil).</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>…ou quelque chose comme cela :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>La société 123 Machin Truc a été créée en 1971, et n’a cessé de proposer au public des machins-trucs de qualité depuis lors. Située à Saint-Remy-en-Bouzemont-Saint-Genest-et-Isson, 123 Machin Truc emploie 2 000 personnes, et fabrique toutes sortes de bidules supers pour la communauté bouzemontoise.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>En tant que nouvel utilisateur ou utilisatrice de WordPress, vous devriez vous rendre sur <a href=\"http://matthieuthiesset.fr/wp-admin/\">votre tableau de bord</a> pour supprimer cette page et créer de nouvelles pages pour votre contenu. Amusez-vous bien !</p>\n<!-- /wp:paragraph -->', 'Page d’exemple', '', 'publish', 'closed', 'open', '', 'page-d-exemple', '', '', '2024-12-09 23:07:28', '2024-12-09 22:07:28', '', 0, 'http://matthieuthiesset.fr/?page_id=2', 0, 'page', '', 0),
(3, 1, '2024-12-09 23:07:28', '2024-12-09 22:07:28', '<!-- wp:heading --><h2>Qui sommes-nous ?</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>L’adresse de notre site est : http://matthieuthiesset.fr.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Commentaires</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Quand vous laissez un commentaire sur notre site, les données inscrites dans le formulaire de commentaire, ainsi que votre adresse IP et l’agent utilisateur de votre navigateur sont collectés pour nous aider à la détection des commentaires indésirables.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Une chaîne anonymisée créée à partir de votre adresse e-mail (également appelée hash) peut être envoyée au service Gravatar pour vérifier si vous utilisez ce dernier. Les clauses de confidentialité du service Gravatar sont disponibles ici : https://automattic.com/privacy/. Après validation de votre commentaire, votre photo de profil sera visible publiquement à coté de votre commentaire.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Médias</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous téléversez des images sur le site, nous vous conseillons d’éviter de téléverser des images contenant des données EXIF de coordonnées GPS. Les personnes visitant votre site peuvent télécharger et extraire des données de localisation depuis ces images.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous déposez un commentaire sur notre site, il vous sera proposé d’enregistrer votre nom, adresse e-mail et site dans des cookies. C’est uniquement pour votre confort afin de ne pas avoir à saisir ces informations si vous déposez un autre commentaire plus tard. Ces cookies expirent au bout d’un an.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Si vous vous rendez sur la page de connexion, un cookie temporaire sera créé afin de déterminer si votre navigateur accepte les cookies. Il ne contient pas de données personnelles et sera supprimé automatiquement à la fermeture de votre navigateur.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Lorsque vous vous connecterez, nous mettrons en place un certain nombre de cookies pour enregistrer vos informations de connexion et vos préférences d’écran. La durée de vie d’un cookie de connexion est de deux jours, celle d’un cookie d’option d’écran est d’un an. Si vous cochez « Se souvenir de moi », votre cookie de connexion sera conservé pendant deux semaines. Si vous vous déconnectez de votre compte, le cookie de connexion sera effacé.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>En modifiant ou en publiant une publication, un cookie supplémentaire sera enregistré dans votre navigateur. Ce cookie ne comprend aucune donnée personnelle. Il indique simplement l’ID de la publication que vous venez de modifier. Il expire au bout d’un jour.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Contenu embarqué depuis d’autres sites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Les articles de ce site peuvent inclure des contenus intégrés (par exemple des vidéos, images, articles…). Le contenu intégré depuis d’autres sites se comporte de la même manière que si le visiteur se rendait sur cet autre site.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d’un compte connecté sur leur site web.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Utilisation et transmission de vos données personnelles</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous demandez une réinitialisation de votre mot de passe, votre adresse IP sera incluse dans l’e-mail de réinitialisation.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Durées de stockage de vos données</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet de reconnaître et approuver automatiquement les commentaires suivants au lieu de les laisser dans la file de modération.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Pour les comptes qui s’inscrivent sur notre site (le cas échéant), nous stockons également les données personnelles indiquées dans leur profil. Tous les comptes peuvent voir, modifier ou supprimer leurs informations personnelles à tout moment (à l’exception de leur identifiant). Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Les droits que vous avez sur vos données</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Si vous avez un compte ou si vous avez laissé des commentaires sur le site, vous pouvez demander à recevoir un fichier contenant toutes les données personnelles que nous possédons à votre sujet, incluant celles que vous nous avez fournies. Vous pouvez également demander la suppression des données personnelles vous concernant. Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de sécurité.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Transmission de vos données personnelles</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Texte suggéré : </strong>Les commentaires des visiteurs peuvent être vérifiés à l’aide d’un service automatisé de détection des commentaires indésirables.</p><!-- /wp:paragraph -->', 'Politique de confidentialité', '', 'draft', 'closed', 'open', '', 'politique-de-confidentialite', '', '', '2024-12-09 23:07:28', '2024-12-09 22:07:28', '', 0, 'http://matthieuthiesset.fr/?page_id=3', 0, 'page', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `mod960_termmeta`
--

CREATE TABLE `mod960_termmeta` (
  `meta_id` bigint UNSIGNED NOT NULL,
  `term_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mod960_terms`
--

CREATE TABLE `mod960_terms` (
  `term_id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_terms`
--

INSERT INTO `mod960_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Non classé', 'non-classe', 0);

-- --------------------------------------------------------

--
-- Structure de la table `mod960_term_relationships`
--

CREATE TABLE `mod960_term_relationships` (
  `object_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_term_relationships`
--

INSERT INTO `mod960_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mod960_term_taxonomy`
--

CREATE TABLE `mod960_term_taxonomy` (
  `term_taxonomy_id` bigint UNSIGNED NOT NULL,
  `term_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_term_taxonomy`
--

INSERT INTO `mod960_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mod960_usermeta`
--

CREATE TABLE `mod960_usermeta` (
  `umeta_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_usermeta`
--

INSERT INTO `mod960_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin1435'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'mod960_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'mod960_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1');

-- --------------------------------------------------------

--
-- Structure de la table `mod960_users`
--

CREATE TABLE `mod960_users` (
  `ID` bigint UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `mod960_users`
--

INSERT INTO `mod960_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin1435', '$P$B.6eNTwyCXa01N2TTHS5PjJlqRZW.Y1', 'admin1435', 'matthieuthiesset@gmail.com', 'http://matthieuthiesset.fr', '2024-12-09 22:07:27', '', 0, 'admin1435');

-- --------------------------------------------------------

--
-- Structure de la table `objectifs`
--

CREATE TABLE `objectifs` (
  `ID` int NOT NULL,
  `titre_objectif` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `detail_objectif` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `objectifs`
--

INSERT INTO `objectifs` (`ID`, `titre_objectif`, `detail_objectif`) VALUES
(1, 'Faire une fiction audio à 2', 'On a eu l’idée à 2, et Yanis m’aidait un peu pour les Guimauves Tueuses, alors il a été presque naturel pour nous de chercher à créer cette fiction audio à 2, sur toutes les étapes'),
(2, 'Donner vie à cet inspecteur', 'C’est un personnage que nous avons imaginé, et beaucoup aimé avant même d’écrire l’histoire, et après, alors on avait qu’une hâte, qu’il prenne vraiment vie, une fois que le mono serait sorti.'),
(11, 'Faire du Sound Design', 'l’objectif principal était de pratiquer en s\'amusant pour m’améliorer car je n’avais pas de projet au stade du sound design à ce moment.'),
(12, 'Participer au concours', 'Ce concours était une bonne excuse pour se retrouver entre potes et faire un court-métrage, alors on en a profité !'),
(13, 'Faire un film qui nous ferait rire', 'Avec l’idée que nous avions d’un zapping, on cherchait beaucoup d’idées qui nous feraient rire, en pensant que ça ferait ensuite rire le public.'),
(14, 'Faire un court-métrage ensemble', 'Avec le début de nos études, nous avons eu moins de temps pour faire des courts-métrages, ce concours était l’occasion de refaire quelque chose.'),
(15, 'Participer à un concours', 'L’idée était aussi de participer à un premier concours, pour participer à d’autres plus tard.'),
(16, 'Expérimenter', 'Avec l’idée qu’on avait, quelques doutes nous habitent, mais nous avons décidé de profiter de l’opportunité de ce cours pour expérimenter quelque chose contenant moins de dialogue, et reposant plus sur la mise en scène, ce qui en plus, était en cohérence avec le cours.'),
(17, 'Faire un tournage de plus grande ampleur', 'Nous cherchions à faire mieux qu’avant, et à être plus ambitieux.'),
(18, 'Faire mieux qu\'avant', 'Nous étions un peu déçu du résultat final de nos premiers projets ensemble, et sommes donc revenus plus que motivés pour faire quelque chose de bien mieux pour ce nouveau concours.'),
(19, 'Participer au 3/4 de semaine', 'Encore une fois, c’est un concours qui nous motive à trouver le temps de faire un court-métrage. Ce concours consiste à créer un court-métrage en 1 semaine.'),
(20, 'Faire une Saga de l\'été', 'C’est un concours dont j’avais entendu parler, et l’ambiance du concours est très motivante, donc je me suis lancé.'),
(21, 'Finir un gros projet de ficiton audio', 'Avec d’autres idées de fiction audio qui n\'avançaient pas, je commençais à douter de mes capacités à finir une fiction audio, et la limite de temps m’a aidé à me dire que j’allais finir un premier gros projet.'),
(22, 'Finir', 'Étant donné que nous avons eu l’idée assez tardivement, réaliser ce projet de manière complète était un vrai défi pour nous.'),
(23, 'Travailler notre adaptation', 'Via ce projet, nous sortions de notre zone de confort en deadline, et nous avons dû adapter l’organisation de notre temps et de nos activités pour mener à bien ce projet .'),
(24, 'Faire quelque chose de qualitatif', 'En nous lançant, nous ne voulions pas juste le faire pour le faire, nous voulions le faire et avoir un résultat qui nous plait, et qui serait qualitatif. Le fait de rejoindre la Team Javras pour le faire a augmenté cette volonté.'),
(25, 'Participer au concours 3/4 de cinéma', 'Voyant la possibilité de faire un court-métrage dans le cadre d’un concours, nous avons décidé de nous lancer, et d’essayer de faire un court-métrage plus important que nos premières créations'),
(26, 'Faire ma toute première série audio', 'Ayant écouté pas mal de fictions audio pendant les 2 années précédant le premier épisode de cette série, et co-réalisant déjà des séries, j’ai eu envie de m’essayer à l’exercice d’une fiction audio, et donc d’en découvrir les codes, les difficultés, et les facilités par rapport à un court-métrage ou une série.'),
(27, 'M\'amuser à faire un truc drôle', 'C’est une parodie, et donc forcément, l’objectif était d’apporter beaucoup de blagues à cette fiction audio, je voulais que ça me fasse rire. '),
(28, 'Profiter d\'une église skatepark', 'Nous avions découvert une église transformée en skatepark, et ce lieu nous intriguait, ce qui nous a donné envie d’y tourner.'),
(29, 'Faire un projet qualitatif en tous points', 'notre groupe étant plus grand que d’habitude, nous souhaitions tous mettre nos connaissances et capacité en commun pour atteindre le meilleur possible, sur les conditions de tournage, la qualité vidéo, la qualité sonore, l’entente dans le groupe…'),
(30, 'Faire une fiction Audio', 'J’étais en plein dans l’écriture de l’Ordre des Brownies (une grosse fiction audio que je préparais), et j’avais besoin, pour moi, de faire une première fiction audio moi à 100%, avec un temps raisonnable, et j’avais envie de faire du montage et du mixage.'),
(31, 'Une fiction tout public', 'Toujours dans l’écriture de l\'Ordre des Brownies, qui est une histoire un peu sombre, non destinée à tous les publics, j’avais la volonté de faire un fiction pour les familles, que tout le monde pourrait écouter et aimer. '),
(32, 'Apprendre les principales étapes de création d’une fiction audio', 'Comme dit plus tôt, j’ai réalisé ce mono mp3 lors d’un atelier de création de fiction audio, et l’objectif était de voir toutes les étapes, pour pouvoir ensuite en faire seul.'),
(33, 'Me (re)mettre à faire des fictions audio', 'J’avais commencé une saga mp3 (La Découverte d’un Nouveau Monde), et participé à quelques fictions audio en prêtant ma voix, et je souhaitai finir cette saga mp3, et me lancer sur de plus gros projets de fiction audio, qui, pour moi, offrent plus de possibilité que la vidéo avec moins de moyens (un micro, et audacity et on peut déjà faire un truc qualitatif), particulièrement dans des idées qui seraient farfelues, où étranges, tous les moyen nécessaires pour trouver un lieu, et faire les effets spéciaux (en réel ou en post-prod) ne sont pas nécessaires. '),
(34, 'Faire un petit court-métrage', 'Ça faisait quelques mois qu\'on avait fini la série Doctor Who, et on se lançait dans l\'écriture de Assassin\'S Creed : Nouvelle Ère. Ce petit court métrage nous a donc permis de faire un petit truc, au milieu du début d\'un projet qui prendrait du temps. '),
(35, 'Faire un bon court-métrage', 'Nous voulions faire un bon court-métrage, à la hauteur d’une série, tant en durée, qu’en histoire.'),
(36, 'Mieux travailler au tournage', 'Pour une des premières fois, nous avions vraiment préparé chaque jour de tournage, en sachant ce que l’on allait tourner, c’était le début d’une certaine professionnalisation pour nous 2.'),
(37, 'M’améliorer en Montage', 'Avec plusieurs scènes de combat, devant être plus dynamiques, et tous les plans que nous avons tourné, j’ai pu faire un montage dont j’étais très fier, et qui s’approche d’un excellent montage de mon point de vue. '),
(38, 'Travailler la mise en scène', 'Étant donné le cours pour lequel ce court-métrage a été réalisé, l’objectif principal était de travailler la mise en scène, prévoir nos choix pour rendre cette histoire la meilleure, et transmettre les bons messages sur les personnages'),
(39, 'Rendre un projet fidèle à ses attentes', 'Comme je ne réalise pas ce mixage uniquement pour moi, l’objectif principal est que le résultat plaise au principal concerné qui m’a demandé de faire le mixage.'),
(40, 'Rendre un projet qualitatif dont je suis fier', 'Étant donné le temps nécessaire à passer sur ce mixage, et mes apprentissages en cours, j’avais vraiment la volonté de faire un mixage qui me semble vraiment bien, sans aucun moment où je me dise quelque chose du type “Bof, on y croit moyen là”'),
(41, 'Participer au 48HFP', 'Faire un 48h était une superbe occasion pour nous retrouver après les vacances autour d\'un projet commun.');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `ID` int NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `type1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `synopsis` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT '',
  `short_synopsis` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vue_ensemble` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `short_vue_ensemble` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avis_perso` varchar(10000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `duree` time NOT NULL,
  `date1` date NOT NULL,
  `lien_projet` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ID-video` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`ID`, `titre`, `type1`, `synopsis`, `short_synopsis`, `vue_ensemble`, `short_vue_ensemble`, `avis_perso`, `duree`, `date1`, `lien_projet`, `ID-video`) VALUES
(1, 'Inspecteur Desfac - Pilote', 'Mono MP3', 'L’inspecteur Baptiste Desfac, célèbre pour son manque de logique et sa confiance inébranlable, est appelé avec son acolyte Johnson pour enquêter sur un meurtre. Tandis que Johnson, pragmatique, découvre un couteau qu’il pense être l’arme du crime, Desfac se concentre sur des miettes de brownie trouvées sur la victime, convaincu qu’elles détiennent la clé du mystère. Ils se lancent alors dans une enquête autant absurde qu\'improbable, allant jusqu’à interroger une boulangère prétendument spécialiste des brownies', 'L’inspecteur Desfac enquête avec son acolyte Johnson sur un meurtre. Tandis que Johnson trouve un couteau suspect, Desfac se focalise sur des miettes de brownie, persuadé d’y trouver la clé du mystère.', 'Avec Yanis Boulogne, un été, on a eu l’idée d’un inspecteur débile, qui dirait des évidences, on l’a noté, et quand on s’est vu en vrai, on l’a écrit. Ce projet a vite pris vie, en un mono humoristique que nous avons beaucoup aimé faire, et on a tellement aimé cet inspecteur qu’une série se prépare…', 'Avec Yanis Boulogne, un été, on a eu l’idée d’un inspecteur débile, qui dirait des évidences…', 'C’est un projet que j’ai beaucoup aimé faire, par le personnage et l’histoire que je trouve géniaux, mais aussi surtout, parce que via ce projet, j\'ai retrouvé ce qui m’avait manqué sur mes derniers projets : faire quelque chose à deux sans prétentions, le mieux qu’on peut dans la bonne humeur avec un ami. J’ai retrouvé ce qui m’avait fait aimer la création audiovisuelle avec Baptiste Martin il y a quelques années, parce que pendant l’année, être dans une licence d’audiovisuel avec d’autres personnes qui font de l’audiovisuel met une pression, et les projets que j’ai faits avec mes amis de ma promo étaient trop “structurés” pour moi, trop à chercher le pro. Dans ce projet, j’ai retrouvé l’esprit bon enfant où on se lance sans trop savoir ce que ça va donner, mais on sera content du résultat dans tous les cas. Et en effet, je suis très fier du résultat final, on a réussi à faire ce que l’on imaginait, et on a découvert la puissance de la communauté de la fiction audio française lorsqu’il s’agit de chercher des comédien(nes). Bref, que du positif sur tout le processus de création !', '00:21:18', '2024-11-10', 'https://www.javras.fr/2024/11/10/inspecteur-desfac-pilote-le-couteau-qui-coupe/', 1),
(2, 'Refaire le son 1', 'Refaire le Son', 'Découvrez le récit qui se cache derrière l’une des plus grandes rivalités d’Overwatch dans le troisième épisode de notre série d’animation : Dragons.', NULL, 'Cet été, je me suis amusé à prendre ce court-métrage d’animation du jeu Overwatch et à recréer tout le son excepté la musique.', NULL, 'Je me suis beaucoup amusé, et j’ai senti que je m\'améliorais au cours de ce projet, et même si je vois des défauts, je suis content d’avoir réussi à faire cela seul, avec ce que j’avais sous la main.', '00:07:44', '2024-09-10', 'https://youtu.be/sPHeUS829Qc', 2),
(3, 'Évasion Nocturne', 'Court-Métrage', 'Lors d’une soirée improvisée, 2 jeunes décident de s’évader en fumant…', NULL, 'Dans le cadre du cours de Design Sonore de Billy Larivière, nous avons réalisé un court métrage dont nous avons ensuite refait tout le son. Pour ce projet, j’étais avec Alexandre Gomez, Eugénie Rizzon, Malo Chardronnet, Lucas Bouchez, Lilou Dubuis et Antoine Videau.', NULL, 'C’était un projet sur lequel j’ai pris beaucoup de plaisir à participer. Je me suis principalement investi sur la partie sonore, et j’ai beaucoup aimé reprendre les voix, recréer les ambiances, ajouter les bruitages, mixer et spatialiser le tout en 5.1. C\'est un projet sur lequel j’ai énormément appris et où j’ai découvert un aspect du montage que j’adore : le design sonore !', '00:05:53', '2024-04-16', 'https://youtu.be/K_1ZVSius38', 3),
(6, 'Zapping', 'Court-Métrage', 'Deux amis, Maël et Corentin, vont, après quelques recherches, se décider sur quel film regarder : « Les Chausses-Pieds du Havre », une comédie musicale. Cependant, avant de pouvoir regarder leur film, ils vont devoir subir l’une des caractéristiques principales de la télévision : les publicités…', NULL, 'Court-métrage réalisé par Daniel Le Toriellec dans le cadre du concours ¾ de cinéma, dans lequel j’ai participé à l’écriture et au design sonore. Vainqueur du prix du montage de ce concours.', 'Court-métrage réalisé par Daniel Le Toriellec dans le cadre du concours ¾ de cinéma, dans…', 'C’était un super projet, on s’est beaucoup amusé à le créer, et on est tous très content du résultat qui nous fait toujours autant rire.', '00:06:28', '2024-04-10', 'https://youtu.be/RnzigF2BXu4', 12),
(7, 'Souris !', 'Court-Métrage', 'An 2352, l’IA contrôle le monde, il n’y a plus de gouvernements, et les hommes sont gérés par des IA pour être le plus productif possible. Même la justice est gérée par des IA. Est-ce que cela est bien ? C’est discutable.', NULL, 'Ce projet était initialement destiné à un concours dont le thème était “Le Monde de Demain”, mais dans l’impossibilité de le réaliser dans les temps, nous l’avons fait pour nous.', 'Ce projet était initialement destiné à un concours dont le thème était “Le Monde de Demain”, mais dans l’impossibilité de le réaliser dans les temps, nous…', 'C’était très cool de faire ce Court-Métrage, premièrement, car ça faisait un moment qu’on avait rien tourné, donc on a retrouvé l’ambiance, l\'excitation et la joie, et ça a été très formateur pour moi pour faire un montage efficace, en sachant quelles choses j’oublie avec la pression du temps. Au final, je suis très fier du résultat, car je trouve que l’idée générale qu’on avait imaginée est bien retranscrite, et le résultat visuel et sonore est bon.', '00:05:31', '2023-02-26', 'https://youtu.be/7Ud023579ds', 13),
(8, 'PHOENIX', 'Court-Métrage', 'Quand pour un acteur réalité et fiction se mélangent, où se trouve le réel danger ?', NULL, 'Comme pour Perdu, dans le cadre du cours de mise en scène de Jean-François Perron à l’UQAT, nous devions réaliser 2 courts métrages au cours du trimestre. Pour chacun d’eux, nous avons eu environ 6 semaines pour les produire. Celui-ci est le deuxième que nous avons fait. Pour ce projet, j’était en équipe avec Martin Foucher, Antoine Videau, Gabriel Herchy, Florian Couttenier et Sarah-Jeanne Mantha.<br><br>Comme pour Perdu, l’idée était de travailler la mise en scène, l’anticiper, et apprendre ainsi tous les aspects importants à prévoir au niveau des lieux, accessoires, costumes, plans de caméra, dynamique de montage, etc… à anticiper à l’étape de pré-production.', 'Comme pour Perdu, dans le cadre du cours de mise en scène de Jean-François Perron à l’UQAT, nous devions réaliser 2 courts métrages au cours du trimestre. Pour chacun d’eux, nous avons eu environ 6 semaines pour les produire. Celui-ci est le deuxième que nous avons fait. Pour ce projet, j’étais en équipe…', 'Ce court-métrage m’a plus perturbé que d’autres, jusqu\'au rendu final je ne savais pas vraiment si le résultat serait à la hauteur de nos attentes, mais c’était aussi une première expérience de travail de colorimétrie qui m’a beaucoup apporté. Je suis au final très content de ce que nous avons produit, même si je trouve que certaines choses auraient pu être faites différemment.', '00:07:31', '2024-04-25', 'https://youtu.be/J1yI7LnJh9w', 14),
(9, 'News', 'Court-Métrage', 'Raphaël, Aby et Mattéo, trois étudiants en histoire, vont, pendant leurs révisions, être témoins d\'un étrange événement…', NULL, '2<sup>e</sup> création du Placard Production, réalisée dans le cadre du concours 3/4 de semaine, organisé par 3/4 de Pouce (et vainqueur ;), avec une plus petite équipe que sur d\'autres projets.', NULL, 'Nous sommes tous très fier du résultat (et nous avons gagné). Je retire beaucoup de positif de cette expérience, notamment sur l\'organisation, et le fait que nous étions moins que pour la Coloc, mais que personne n’a manqué. Je compare ça avec mes anciennes et toujours actuelles expériences avec Baptiste Martin, où nous sommes en dehors des acteurs 2 tout le temps, avec par moment l’aide pour le cadrage. Comme quoi, pas besoin d’être beaucoup pour faire quelque chose de bien. Là, le fait d’être 7 nous a bien permis de nous organiser, sans être trop. Pour le tournage aussi, où nous n’étions pas tous les 7 là les 2 jours, 6 un jour et 5 l’autre, les personnes inutiles ne sont pas venues, ce qui a aidé la productivité. Je suis donc globalement très content de ce qu’on a fait.', '00:05:02', '2023-03-08', 'https://youtu.be/2bXA16SUyCU', 15),
(10, 'Les Guimauves Tueuses', 'Mono MP3', 'An 2223, 2 Guimauves vivantes et intelligentes terrorisent l\'humanité qui va bientôt s\'éteindre par leur faute. […] Tout semble perdu, jusqu\'à ce qu\'un jour, des amis découvrent le moyen de voyager dans le temps… Entre présent et passé, la fuite éternelle s\'arrêtera-t-elle un jour ?', NULL, 'Fiction audio que j’ai créé dans le cadre du <strong><a target=\'_blank\' href=\'https://2023.sagadelete.fr\'>concours de la Saga de l’été</a></strong>, concours qui consiste à créer une fiction audio de plus de 15 minutes en 3 mois entre le 1er juin et début septembre. À partir de plusieurs pistes d’idées , j’ai écrit, puis réalisé Les Guimauves Tueuses.', 'Fiction audio que j’ai créé dans le cadre du <strong><a target=\'_blank\' href=\'https://2023.sagadelete.fr\'>concours de la Saga de l’été</a></strong>, concours qui consiste à créer…', 'C’était une super expérience, je suis très content d’avoir fini, et je suis très content de ce que j’ai sorti ! J’ai été étonné de tous les retours positifs et toutes les personnes qui l’ont vu. J\'ai aussi eu certains retours sur la problématique de qualité de micro trop variée entre chaque acteur, qui sortait l\'auditeur de l\'histoire. Ce que j\'ai compris, et pris en compte pour mes prochaines créations', '00:39:41', '2023-09-03', 'https://youtu.be/nYfWaIYYOcs', 16),
(11, 'La Nuit des Étoiles', 'Saga mp3', 'Astéria, déesse des étoiles, décide de mener une expérience sur les étoiles le soir de noël en permettant à certaines constellations de se déplacer afin d\'étudier leur comportement.', NULL, 'C’est un projet assez ambitieux d’une série audio de 25 épisodes au format calendrier de l’avent, que j’ai co-réalisé avec Yanis Boulogne. C’est via ce projet que nous avons rejoint le groupe Javras. Et comme nous avons eu l’idée en Septembre, pour nous lancer seulement en Octobre, les deadlines étaient assez courtes, ce qui a créé un challenge très motivant.', 'C’est un projet assez ambitieux d’une série audio de 25 épisodes au format calendrier de l’avent, que j’ai co-réalisé avec Yanis Boulogne. C’est via ce projet que nous avons rejoint…', 'C’était un vrai challenge, mais nous sommes vraiment contents d’en être arrivés à bout, et nous sommes très fiers de ce que nous avons fait. Nous avons pu apprendre et nous perfectionner tout au long de la création. La limite de temps a été un moteur dans la création de cette fiction, et nous motive à en créer beaucoup d’autres. Un élément très important pour nous est aussi d’avoir rejoint la Team Javras, qui nous motive aussi à continuer. Bref, j’ai adoré créer cette fiction, j’ai en parallèle appris beaucoup avec mes cours, et tout mettre en parallèle ne m’apporte que du positif !', '01:45:50', '2023-12-25', 'https://www.javras.fr/sagas-mp3/la-nuit-des-etoiles/', 17),
(12, 'La Lettre', 'Court-Métrage', 'Trois gangsters reçoivent une lettre qu\'ils ont récupérée pour leur Boss, sans savoir ce qu\'il y a dedans. Ils vont donc se demander s’il faut l\'ouvrir ou pas. Cependant, un inspecteur de police se lance à leur poursuite afin de récupérer cette mystérieuse lettre…', NULL, '3ème création du Placard Production, pour le 3ème concours de courts-métrages de cette année, le concours 3/4 de cinéma, créer un court-métrage en 1 mois.', '3ème création du Placard Production, pour le 3ème concours de courts-métrages de cette année, le…', 'Pour le fait de créer en 1 mois, je n’ai pas été très impliqué, à part à la fin, donc j’en retire plus une expérience de montage en groupe sous la pression du temps, qui était, même si compliquée, très sympa à vivre avec des amis, tous dans le même bâteau. Comme dit précédemment, il y avait des détails que j’aurais aimé plus travailler, mais j’étais quand même très fier de ce que l’on avait fait, et voir son court-métrage projeté sur grand écran est quelque chose de très gratifiant.', '00:13:23', '2023-05-01', 'https://youtu.be/QIjq8JScQME', 18),
(13, 'La Découverte d\'un Nouveau Monde', 'Saga mp3', '2 amis partent en forêt, mais se retrouvent aspirés par une lumière blanche. Ils se réveillent dans un monde où tout est cubique (Minecraft). L’un est très doué, mais l’autre, encore attaché à notre monde découvre Minecraft et ses incohérences…', '2 amis partent en forêt, mais se retrouvent aspirés par une lumière blanche. Ils se réveillent dans un monde où tout est cubique…', 'La Découverte d’un Nouveau Monde est ma première série audio, et c’est une parodie du jeu Minecraft. Je me suis inspiré de Javras, qui a fait des séries audio parodiant des jeux vidéo.', 'La Découverte d’un Nouveau Monde est ma première série audio, et c’est une parodie du jeu Minecraft. Je me suis inspiré de Javras, qui a fait des séries audio parodiant des jeux vidéo…', 'C’était une très bonne expérience, qui m’a fait beaucoup aimer beaucoup d’aspects des fictions audio, notamment le fait de ne pas avoir besoin de faire venir tout le monde à un même endroit un même jour, chacun enregistre de chez lui. Et même si la fin de cette série a mis du temps à être faite*, j’aurais ainsi pu évoluer dans ma manière de créer les épisodes, entre le premier et le dernier. J’ai aussi évolué sur les visuels, qui ne sont plus statiques à 100%.', '01:02:46', '2021-05-01', 'https://www.youtube.com/playlist?list=PLUifC7P1TaXshLp4ngFnufuEtMH9Tt9o2', 19),
(14, 'Erreur de Lutin', 'Mono mp3', 'La nuit du 24 Décembre, le père noël part faire sa distribution, comme tous les ans, accompagné de 2 lutins, mais cette année, tout ne se passe pas comme prévu…', NULL, '2 semaines avant noël, je m’ennuyais, je ne savais pas quoi faire, et j’ai voulu faire une fiction audio pour noël. Je l’ai donc écrite, trouvé les acteurs et fait enregistrer dans la semaine, puis monté dans la semaine qui a suivi, pour que tout soit prêt pour noël.', '2 semaines avant noël, je m’ennuyais, je ne savais pas quoi faire, et j’ai voulu faire une fiction audio pour noël. Je l’ai donc écrite, trouvé les acteurs et fait enregistrer dans la semaine, puis monté dans la semaine qui a suivi, pour…', 'Je suis finalement très fier du résultat, malgré quelques détails que je remarque uniquement parce que j’ai fait le montage, j’aime, moi-même beaucoup écouter cette fiction. Faire cette fiction m’a apporté une nouvelle expérience d’audio, pour que je sois plus confiant de mes capacité, après le Mono MP3 Course Contre l’IA, qui m’avait remis le pied à l’étrier de la création de fictions audio.', '00:04:10', '2022-12-25', 'https://youtu.be/LvNCEGmbHQg', 20),
(15, 'Course Contre l\'IA', 'Mono mp3', 'An 2352, l’IA contrôle le monde, et tous les humains sont dans une routine pour être le plus productifs possible.', NULL, 'J’ai créé ce mono mp3 lors d’une journée d’apprentissage de la fiction audio organisé par Javras. L’idée était de créer une bande annonce pour un film qui ne sortirait pas. J’ai décidé de faire une bande annonce pour un prochain court-métrage que j’écrivais (Souris !), puis au final nous avons écrit souris avec un autre angle donc ce mono mp3 est juste resté une histoire dans le même univers.', 'J’ai créé ce mono mp3 lors d’une journée d’apprentissage de la fiction audio organisé par Javras. L’idée était de créer une bande annonce pour un film qui ne sortirait pas. J’ai décidé de faire une bande annonce pour un prochain court-métrage que j’écrivais (Souris !), puis au final…', 'La création de ce mono a été très intéressante, j’ai appris beaucoup, et je me suis peu de temps après lancé dans la création de nouvelles fictions audio, qui me permettent de faire des fictions avec des gens, sans avoir à se voir tous un jour à un endroit en présentiel, voir même ne jamais nous voir, juste discuter par internet.', '00:04:31', '2022-10-29', 'https://youtu.be/lYAO5Tb8IEY', 21),
(16, 'Bonnes Résolutions', 'Court-Métrage', 'Un Homme du futur se retrouve le jour du nouvel an en 2022, il découvre cette tradition très ancienne pour lui, et s’interroge sur la raison de sa présence ici, avant de comprendre…', NULL, 'Avec ce court-métrage, nous voulions juste faire un court-métrage ensemble, parce que cela faisait quelques mois que nous n’en avions pas fait, nous l’avons donc écrit, puis tourné dans la foulée.', NULL, 'Je suis très content de ce qu\'on a fait, d\'autant plus que je voulais vraiment faire un petit truc pour le nouvel an, et faire un petit court métrage sans prise de tête, histoire de faire une pause dans l\'écriture d\'un court métrage plus long et pour lequel on prendrait plus le temps.<br><br>C\'est le court-métrage le plus ancien que le met dans mon portfolio, car, aujourd\'hui, je considère que c\'est le premier qui vaut le coup, tout ce que j\'ai fait avant étant maintenant plutôt classé au rang d\'expérimentations dans ma tête. Si vous souhaitez tout de même voir tout cela, ce sont les vidéos les plus anciennes de la chaîne <strong><a target=\'_blank\' href=\'https://www.youtube.com/@les-jeunes-createurs\'>Les Jeunes Créateurs</a></strong>. Libre à vous d\'aller voir. ', '00:05:05', '2022-01-01', 'https://youtu.be/XtsPSZL5APU', 22),
(17, 'Assassin\'S Creed : Nouvelle Ère ', 'Court-Métrage', 'Alexandre vit une vie banale, jusqu’au jour où il reçoit une lettre étrange, et découvre qu’il est le descendant d’un mystérieux Assassin nommé Ezio et qu\'il doit stopper les Templiers, qui utilisent une nouvelle arme : le numérique…', NULL, 'L’idée était de faire un premier gros court-métrage après la fin de la série Doctor Who, où nous avions décidé de faire une pause sur les séries car à chaque fois, nous manquions d’inspiration pour certains épisodes.', 'L’idée était de faire un premier gros court-métrage après la fin de la série Doctor Who, où nous avions décidé de…', 'Le montage était très motivant pour moi, parce que j’ai démarré après chaque journée de tournage avec ce que l’on avait tourné. J’ai pour la première fois découpé mon montage en plusieurs petits montages, ce qui me motivait aussi, à chaque fois que je finissais un petit bout. Et faire le montage des scènes de combat était une première très intéressante, parce que le montage dynamique à couper à l’image près faisait que je créait vraiment le combat que l’on avait simulé.', '00:14:02', '2022-07-17', 'https://youtu.be/bwbp1wqbwwM', 23),
(18, 'Perdu', 'Court-Métrage', 'Ben va donner sa paie hebdomadaire à son Boss, malheureusement, il a eu quelques problèmes et son Boss s’en rend compte…', NULL, 'Court-métrage que j’ai réalisé avec Antoine Videau, Florian Couttennier, Gabriel Herchy, Martin Foucher et Sarah-Jeanne Mantha dans le cadre du cours de Mise en Scène et éclairages de Jean-François Perron à l’UQAT. J’étais réalisateur sur ce projet, ce qui m’a donné un aperçu des responsabilités endossées par ce rôle, et comment m’améliorer en tant que réalisateur pour mes prochaines créations.', 'Court-métrage que j’ai réalisé avec Antoine Videau, Florian Couttennier, Gabriel Herchy, Martin Foucher et Sarah-Jeanne Mantha dans le cadre du cours de Mise en Scène et éclairages de Jean-François Perron à l’UQAT. J’étais réalisateur sur ce projet, ce qui m’a donné un…', 'C’était un projet très cool à mener, j’ai beaucoup appris au cours de son avancée, en grande partie des choses que je réutiliserai pour mes futures créations, et mon équipe était très agréable, et très compétente, ce qui a rendu la réalisation de ce projet encore plus fluide.', '00:07:19', '2024-02-28', 'https://youtu.be/4dquyS8u_78', 24),
(19, 'Camping Tranquille', 'Mono mp3', 'Tak campe dans la forêt pour s\'évader. Elle profite du calme ambiant avant que son séjour ne soit gâché par un étrange personnage.', NULL, 'C’est le projet de Ukarnub qui cherchait un mixeur car il n’arrivait pas à finir sa fiction. Je me suis proposé, et je lui ai fait le mixage. Cela m’a permis de pratiquer, avec un autre juge sur mon travail que uniquement moi-même, ce qui était très instructif et motivant.', 'C’est le projet de Ukarnub qui cherchait un mixeur car il n’arrivait pas à finir sa fiction. Je me suis proposé, et je lui ai fait le mixage. Cela m’a permis de pratiquer, avec un autre juge sur mon travail que uniquement…', 'J’ai travaillé sur ce mixage peu à peu, de Mars à Août 2024, et c’était vraiment très cool de sentir le projet s’améliorer à chaque modification que me demandait Ukarnub. C’était vraiment une super expérience, j’ai pris beaucoup de plaisir et j’ai beaucoup appris à travailler sur ce projet.', '00:15:50', '2024-08-07', 'https://youtu.be/DYJ4ijVMJUA', 25),
(20, 'Twinkle', 'Court-Métrage', 'Un soir, alors qu\'il rentre chez lui, le psychothérapeute Hugo Darlan raconte sa journée à son ami John[…] Soudain, un bruit retentit dehors et Brandon, parti sortir les poubelles, ne revient pas. Hugo et John partent à sa recherche dans la nuit noire…', NULL, 'Dans le cadre du concours 48HFP, Daniel Le Toriellec a réuni un équipe dont j’ai fait partie. J’ai participé à l’écriture et je me suis chargé du sound design.', 'Dans le cadre du concours 48HFP, Daniel Le Toriellec a réuni un équipe dont j’ai fait partie. J’ai…', 'C’était une très bonne expérience, car j’ai participé là où est ma force, et Daniel a bien su gérer la réalisation pour que chacun de nous travaille sans pression du temps. Et je n’ai pas ressenti de stress nocif à travailler avec lui sur ce 48H. Je me suis bien amusé, et j’ai découvert l’éditeur audio de DaVinci, avec lequel je n’était pas familier, mais cela n’a posé aucun problème.', '00:07:54', '2024-11-29', 'https://youtu.be/rmqZOcG6k9Q', 26);

-- --------------------------------------------------------

--
-- Structure de la table `projets-etapes`
--

CREATE TABLE `projets-etapes` (
  `ID-Projet` int NOT NULL,
  `ID-Etape` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets-etapes`
--

INSERT INTO `projets-etapes` (`ID-Projet`, `ID-Etape`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 21),
(2, 22),
(2, 23),
(6, 24),
(6, 25),
(6, 26),
(7, 27),
(7, 28),
(7, 29),
(8, 30),
(8, 31),
(8, 32),
(8, 33),
(9, 34),
(9, 35),
(9, 36),
(10, 37),
(10, 38),
(10, 39),
(10, 40),
(11, 41),
(11, 42),
(11, 43),
(11, 44),
(11, 45),
(12, 46),
(13, 47),
(13, 48),
(13, 49),
(13, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(14, 55),
(14, 56),
(14, 57),
(15, 58),
(15, 59),
(15, 60),
(16, 61),
(16, 62),
(16, 63),
(17, 64),
(17, 65),
(17, 66),
(18, 67),
(18, 68),
(18, 69),
(19, 70),
(19, 71),
(19, 72),
(19, 73),
(19, 74),
(20, 75),
(20, 76),
(20, 77);

-- --------------------------------------------------------

--
-- Structure de la table `projets-objectifs`
--

CREATE TABLE `projets-objectifs` (
  `ID-Projet` int NOT NULL,
  `ID-Objectif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets-objectifs`
--

INSERT INTO `projets-objectifs` (`ID-Projet`, `ID-Objectif`) VALUES
(1, 1),
(1, 2),
(2, 11),
(6, 12),
(6, 13),
(7, 14),
(7, 15),
(8, 16),
(8, 17),
(9, 18),
(9, 19),
(10, 20),
(10, 21),
(11, 22),
(11, 23),
(11, 24),
(12, 25),
(13, 26),
(13, 27),
(3, 28),
(3, 29),
(14, 30),
(14, 31),
(15, 32),
(15, 33),
(16, 34),
(17, 35),
(17, 36),
(17, 37),
(18, 38),
(19, 39),
(19, 40),
(20, 41);

-- --------------------------------------------------------

--
-- Structure de la table `video_ytb`
--

CREATE TABLE `video_ytb` (
  `ID` int NOT NULL,
  `lien_ytb` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `titre_ytb` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `video_ytb`
--

INSERT INTO `video_ytb` (`ID`, `lien_ytb`, `titre_ytb`, `image`) VALUES
(1, 'https://youtu.be/cEEbYG9BM5g', 'Saga MP3 - Inspecteur Desfac - Pilote - Le Couteau Qui Coupe', NULL),
(2, 'https://youtu.be/sPHeUS829Qc', 'Overwatch Deux Dragons ExportFinal', NULL),
(3, 'https://youtu.be/K_1ZVSius38', 'EvasionNocturne Stereo', NULL),
(12, 'https://youtu.be/RnzigF2BXu4', 'Zapping [Parodies | Court-Métrage]', NULL),
(13, 'https://youtu.be/7Ud023579ds', 'Souris !', NULL),
(14, 'https://youtu.be/J1yI7LnJh9w', 'PHOENIX', NULL),
(15, 'https://youtu.be/2bXA16SUyCU', 'News [Court-Métrage]', NULL),
(16, 'https://youtu.be/nYfWaIYYOcs', 'Les Guimauves Tueuses [Saga de l\'été 2023]', NULL),
(17, 'https://youtu.be/dA2jf1I5oCg?list=PLX9jskeW-ypdK1ZrBLzQRmqOAsEcY01R7', 'La Nuit des Etoiles - Episode 00 - Prologue', NULL),
(18, 'https://youtu.be/QIjq8JScQME', 'La Lettre [Court-Métrage]', NULL),
(19, 'https://youtu.be/TXWM4QmoTBc?list=PLUifC7P1TaXshLp4ngFnufuEtMH9Tt9o2', 'La découverte dun nouveau monde - Episode 1 - Des Zombies qui parlent ?', NULL),
(20, 'https://youtu.be/LvNCEGmbHQg', 'Erreur de Lutin - Fiction Audio de Noël', NULL),
(21, 'https://youtu.be/lYAO5Tb8IEY', 'Mono MP3 - Course Contre l\'IA', NULL),
(22, 'https://youtu.be/XtsPSZL5APU', 'Bonnes Résolutions - Nouvel AN 2022', NULL),
(23, 'https://youtu.be/bwbp1wqbwwM', 'Assassin\'S Creed : Nouvelle Ere', NULL),
(24, '', 'Perdu', 'minia-Perdu.jpg'),
(25, '', 'Camping Tranquille', 'minia-camping-tranquille.jpg'),
(26, 'https://youtu.be/rmqZOcG6k9Q', 'Twinkle [Court-Métrage] - 48HFP Hauts-de-France 2024', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `mod960_commentmeta`
--
ALTER TABLE `mod960_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `mod960_comments`
--
ALTER TABLE `mod960_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Index pour la table `mod960_links`
--
ALTER TABLE `mod960_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Index pour la table `mod960_options`
--
ALTER TABLE `mod960_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Index pour la table `mod960_postmeta`
--
ALTER TABLE `mod960_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `mod960_posts`
--
ALTER TABLE `mod960_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Index pour la table `mod960_termmeta`
--
ALTER TABLE `mod960_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `mod960_terms`
--
ALTER TABLE `mod960_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Index pour la table `mod960_term_relationships`
--
ALTER TABLE `mod960_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Index pour la table `mod960_term_taxonomy`
--
ALTER TABLE `mod960_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Index pour la table `mod960_usermeta`
--
ALTER TABLE `mod960_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `mod960_users`
--
ALTER TABLE `mod960_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Index pour la table `objectifs`
--
ALTER TABLE `objectifs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `projets-etapes`
--
ALTER TABLE `projets-etapes`
  ADD PRIMARY KEY (`ID-Projet`,`ID-Etape`),
  ADD KEY `etape` (`ID-Etape`);

--
-- Index pour la table `projets-objectifs`
--
ALTER TABLE `projets-objectifs`
  ADD PRIMARY KEY (`ID-Projet`,`ID-Objectif`),
  ADD KEY `objectif` (`ID-Objectif`);

--
-- Index pour la table `video_ytb`
--
ALTER TABLE `video_ytb`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `mod960_commentmeta`
--
ALTER TABLE `mod960_commentmeta`
  MODIFY `meta_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mod960_comments`
--
ALTER TABLE `mod960_comments`
  MODIFY `comment_ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mod960_links`
--
ALTER TABLE `mod960_links`
  MODIFY `link_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mod960_options`
--
ALTER TABLE `mod960_options`
  MODIFY `option_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `mod960_postmeta`
--
ALTER TABLE `mod960_postmeta`
  MODIFY `meta_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `mod960_posts`
--
ALTER TABLE `mod960_posts`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `mod960_termmeta`
--
ALTER TABLE `mod960_termmeta`
  MODIFY `meta_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mod960_terms`
--
ALTER TABLE `mod960_terms`
  MODIFY `term_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mod960_term_taxonomy`
--
ALTER TABLE `mod960_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mod960_usermeta`
--
ALTER TABLE `mod960_usermeta`
  MODIFY `umeta_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mod960_users`
--
ALTER TABLE `mod960_users`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `objectifs`
--
ALTER TABLE `objectifs`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `video_ytb`
--
ALTER TABLE `video_ytb`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projets-etapes`
--
ALTER TABLE `projets-etapes`
  ADD CONSTRAINT `etape` FOREIGN KEY (`ID-Etape`) REFERENCES `etapes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projetE` FOREIGN KEY (`ID-Projet`) REFERENCES `projets` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projets-objectifs`
--
ALTER TABLE `projets-objectifs`
  ADD CONSTRAINT `objectif` FOREIGN KEY (`ID-Objectif`) REFERENCES `objectifs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projetO` FOREIGN KEY (`ID-Projet`) REFERENCES `projets` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
