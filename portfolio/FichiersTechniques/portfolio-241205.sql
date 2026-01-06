-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 05 déc. 2024 à 21:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
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
  `ID` int(11) NOT NULL,
  `titre_etape` varchar(100) NOT NULL DEFAULT '',
  `detail_etape` varchar(5000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`ID`, `titre_etape`, `detail_etape`) VALUES
(1, 'Écriture', 'On avait déjà prévu de se voir, donc on a décidé d’écrire cette histoire ensemble à ce moment-là. C’était réellement cool, on a très peu bloqué, quand l’un de nous bloquait, l’autre avait des idées. Et on était tous les deux d’accord sur la direction que l’histoire prenait. On a donc eu en quelques jours un premier jet dont on était très satisfaits, que l’on a que très peu modifié, en changeant juste des tournures de phrases.'),
(2, 'Casting et Enregistrements', 'Pour le casting, nous avons fait le choix de ne pas faire appel à nos amis, non seulement pour tester le fait de demander dans la communauté de la fiction Audio en France, et parce que nous éprouvions ce besoin de faire ce projet à l’abri de leurs regards. Surement par peur de leur avis, c’était notre bébé, et on l’a gardé pour nous jusqu’à une semaine avant la sortie. Nous avons donc fait le Casting via les salons de recrutements sur deux serveurs discord de fiction audio (Audiodidact et Fiction Sonore), et nous avons eu plusieurs propositions, ce qui nous a permis de choisir le meilleur. Ensuite, j’étais en vacances, et j’ai donc laissé Yanis gérer les enregistrements, il me tenait au courant de la fin des Castings, et je lui donnais mon avis, puis faisait les enregistrements en vocal avec les comédiens, pour leur donner les indications. Tout s’est très bien passé.'),
(3, 'Mixage Audio et Montage', 'À ce moment, nous n’avions eu que les retours des comédiens, et ils étaient tous très positifs. On a mis un peu de temps à se mettre au mixage, et début septembre, on s’est séparé le script en 2, et en une dizaine de jours, on a chacun mixé notre partie, en tenant au courant l’autre, et en lui demandant son avis / son aide par moments. Au final, nous avons demandé un avis extérieur sur le serveur Audiodidact. Le retour était positif, et notre seul changement a été de baisser le volume de la musique. Ensuite, tout était prêt, et on l’a sorti le dimanche qui a suivi.'),
(4, 'Publication et Remaster', 'Après avoir rejoint le groupe Javras, nous avons retravaillé le mixage de cet épisode pilote, avec tout ce que nous avions appris en un an et les retours de l’équipe. Et c’est avec plaisir que nous sortons cette série sur <strong><a target=\"_blank\" href=\"https://javras.fr\"> Javras</a></strong>.'),
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
(31, 'Préproduction et Tests', 'Comme pour Perdu, nous avons fait un découpage technique et une horaire de tournage détaillé, ainsi que préparé les lieux de tournage. Nous avons fait des tests de plans et de colorimétrie. Et j’était sur la partie direction artistique avec Florian. Nous avons donc réfléchi aux couleurs et aux tons que l’on voulait donner, notamment pour la différence entre fiction et réalité. L’acteur étant en dépression, avoir une fiction très saturée, trop saturée en couleur et une réalité très désaturée. Et tout cela s\'atténuera pour se mélanger, et s’inverser avec le temps. Nous avons aussi réfléchi à un moyen de différencier la réalité et la fiction, et avons pensé à un objet personnel du personnage principal : sa bague, qu’il n\'aurait pas lorsqu’il joue dans un film.'),
(32, 'Tournage', 'A cause de quelques imprévus, nous avons dû réadapter nos horaires de tournage, mais nous avons su nous adapter et tout s\'est bien passé.'),
(33, 'Montage', 'Le montage devait être fait par Gabriel et c\'est lui qui en a fait la majorité, mais comme il a manqué de temps je lui ai donné un coup de main en montant une partie. Il a ensuite terminé, et avec Florian, nous nous sommes occupés de la colorimétrie. Et après un visionnage tous ensemble, nous avons rendu le film.'),
(34, 'écriture', 'Après un rapide brainstorm et qu’une idée se soit dégagée, Daniel, Gabriel et Célestin se sont retrouvé pour écrire, et je les ai aidé pour finir (pendant un cours). Tout le groupe était content de l’histoire.'),
(35, 'Tournage', 'Cette fois, le tournage était bien organisé, divisé sur 2 jours, mais bien organisé, de telle sorte que tous les plans sont rentrés parfaitement dans le planning, et mieux annoncé et autre pour le monteur (Daniel). C’était très cool de faire ce tournage en tant qu’acteur, tout le monde était efficace, motivé, et connaissait son rôle, il n’y avait donc personne non occupé pour perturber les autres.'),
(36, 'Montage', '\r\n\r\nJe n’ai pas participé au montage, Daniel et Célestin qui l’ont fait l’ont très bien fait, ils se sont bien réparti les tâches pour le finir dans les temps.'),
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
(53, 'Mixage Audio et Montage', 'Sur toute la partie recréation du son j’étais derrière l’ordinateur à faire la technique, et j’ai donc participé à toutes les étapes avec, à chaque fois, un autre membre de l’équipe.<br><br>\r\n\r\n    <strong>- Planifier :</strong> Tout d’abord, nous avons fait un visionnage ensemble, et, avec les conseils de Billy, nous avons planifié quels sons allaient être utilisés, et quels effets sonores nous voulions créer, dans le but de créer quelles réactions chez le spectateur.<br><br>\r\n\r\n    <strong>- Les voix :</strong> Ensuite, avec Lilou, nous avons retrouvé tous les acteurs un à un pour qu’ils enregistrent la réplique. Le procédé était simple, on passait plusieurs fois la réplique à l’acteur, et ensuite, l’acteur faisait plusieurs prises, jusqu’à ce qu’on ait la bonne.<br><br>\r\n\r\n    <strong>- Les ambiances :</strong> Pendant ces enregistrements, Eugénie a listé tous les bruitages nécessaires aux ambiances et est allée les enregistrer. Elle m’a ensuite rejoint, et nous avons composé ces ambiances à l’aide des bruitages qu’elle avait pris, en commençant un peu à mixer le tout pour avoir un résultat clair à montrer à Billy.\r\n    Lucas avait aussi demandé à Etienne Bultot de nous composer une musique inspirée de celle utilisée comme témoin pour le picture lock, pour coller à l’ambiance que l’on souhaitait créer.<br><br>\r\n\r\n    <strong>- Les bruitages :</strong> Un peu plus tard, j’ai retrouvé Malo qui avait apporté de quoi enregistrer les bruitages en studio, et nous avons passé le court métrage plusieurs fois pour enregistrer et placer tous les bruitages (une passe pour les pas, une passe pour les bruits de main, …)<br><br>\r\n\r\n    <strong>- Mixer le tout :</strong> Enfin, j’ai vu BIlly pour parler du mixage, il m’a montré l’utilisation des BUS, et j’ai donc trié plus proprement la timeline, et fait plusieurs passes pour ajouter la réverbération, puis spatialiser le tout en 5.1, tout en harmonisant le tout à -24LUFS.'),
(54, 'Rendu et Making Of', 'Après quelques visionnages, nous étions tous satisfaits, et nous avons rendu ce film à Billy pour qu’il prépare un DCP pour le visionnage qui était prévu au cinéma. Antoine a aussi réalisé un <strong><a target=\"_blank\" href=\"https://youtu.be/IM-N591v8Nc\">Making Of.</a></strong>'),
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
-- Structure de la table `objectifs`
--

CREATE TABLE `objectifs` (
  `ID` int(11) NOT NULL,
  `titre_objectif` varchar(100) NOT NULL DEFAULT '',
  `detail_objectif` varchar(1000) NOT NULL DEFAULT ''
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
  `ID` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL DEFAULT '',
  `type1` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `synopsis` varchar(1000) DEFAULT '',
  `short_synopsis` varchar(1000) DEFAULT NULL,
  `vue_ensemble` varchar(1000) NOT NULL DEFAULT '',
  `short_vue_ensemble` varchar(1000) DEFAULT NULL,
  `avis_perso` varchar(10000) NOT NULL DEFAULT '',
  `duree` time NOT NULL,
  `date1` date NOT NULL,
  `lien_projet` varchar(100) NOT NULL DEFAULT '',
  `ID-video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`ID`, `titre`, `type1`, `role`, `synopsis`, `short_synopsis`, `vue_ensemble`, `short_vue_ensemble`, `avis_perso`, `duree`, `date1`, `lien_projet`, `ID-video`) VALUES
(1, 'Inspecteur Desfac - Pilote', 'Mono MP3', 'Créateur', 'L’inspecteur Baptiste Desfac, célèbre pour son manque de logique et sa confiance inébranlable, est appelé avec son acolyte Johnson pour enquêter sur un meurtre. Tandis que Johnson, pragmatique, découvre un couteau qu’il pense être l’arme du crime, Desfac se concentre sur des miettes de brownie trouvées sur la victime, convaincu qu’elles détiennent la clé du mystère. Ils se lancent alors dans une enquête autant absurde qu\'improbable, allant jusqu’à interroger une boulangère prétendument spécialiste des brownies', '               L’inspecteur Desfac enquête avec son acolyte Johnson sur un meurtre. Tandis que Johnson trouve un couteau suspect, Desfac se focalise sur des miettes de brownie, persuadé d’y trouver la clé du mystère.               ', 'Avec Yanis Boulogne, un été, on a eu l’idée d’un inspecteur débile, qui dirait des évidences, on l’a noté, et quand on s’est vu en vrai, on l’a écrit. Ce projet a vite pris vie, en un mono humoristique que nous avons beaucoup aimé faire, et on a tellement aimé cet inspecteur qu’une série se prépare…', 'Avec Yanis Boulogne, un été, on a eu l’idée d’un inspecteur débile, qui dirait des évidences…                                             ', 'C’est un projet que j’ai beaucoup aimé faire, par le personnage et l’histoire que je trouve géniaux, mais aussi surtout, parce que via ce projet, j\'ai retrouvé ce qui m’avait manqué sur mes derniers projets : faire quelque chose à deux sans prétentions, le mieux qu’on peut dans la bonne humeur avec un ami. J’ai retrouvé ce qui m’avait fait aimer la création audiovisuelle avec Baptiste Martin il y a quelques années, parce que pendant l’année, être dans une licence d’audiovisuel avec d’autres personnes qui font de l’audiovisuel met une pression, et les projets que j’ai faits avec mes amis de ma promo étaient trop “structurés” pour moi, trop à chercher le pro. Dans ce projet, j’ai retrouvé l’esprit bon enfant où on se lance sans trop savoir ce que ça va donner, mais on sera content du résultat dans tous les cas. Et en effet, je suis très fier du résultat final, on a réussi à faire ce que l’on imaginait, et on a découvert la puissance de la communauté de la fiction audio française lorsqu’il s’agit de chercher des comédien(nes). Bref, que du positif sur tout le processus de création !', '00:21:18', '2024-11-10', 'https://www.javras.fr/2024/11/10/inspecteur-desfac-pilote-le-couteau-qui-coupe/', 1),
(2, 'Refaire le son 1', 'Refaire le Son', 'Créateur', 'Découvrez le récit qui se cache derrière l’une des plus grandes rivalités d’Overwatch dans le troisième épisode de notre série d’animation : Dragons.', NULL, 'Cet été, je me suis amusé à prendre ce court-métrage d’animation du jeu Overwatch et à recréer tout le son excepté la musique.', NULL, 'Je me suis beaucoup amusé, et j’ai senti que je m\'améliorais au cours de ce projet, et même si je vois des défauts, je suis content d’avoir réussi à faire cela seul, avec ce que j’avais sous la main.', '00:07:44', '2024-09-10', 'https://youtu.be/sPHeUS829Qc', 2),
(3, 'Évasion Nocturne', 'Court-Métrage', 'Créateur', 'Lors d’une soirée improvisée, 2 jeunes décident de s’évader en fumant…', NULL, 'Dans le cadre du cours de Design Sonore de Billy Larivière, nous avons réalisé un court métrage dont nous avons ensuite refait tout le son. Pour ce projet, j’étais avec Alexandre Gomez, Eugénie Rizzon, Malo Chardronnet, Lucas Bouchez, Lilou Dubuis et Antoine Videau.', NULL, 'C’était un projet sur lequel j’ai pris beaucoup de plaisir à participer. Je me suis principalement investi sur la partie sonore, et j’ai beaucoup aimé reprendre les voix, recréer les ambiances, ajouter les bruitages, mixer et spatialiser le tout en 5.1. C\'est un projet sur lequel j’ai énormément appris et où j’ai découvert un aspect du montage que j’adore : le design sonore !', '00:05:53', '2024-04-16', 'https://youtu.be/K_1ZVSius38', 3),
(6, 'Zapping', 'Court-Métrage', 'Créateur', 'Deux amis, Maël et Corentin, vont, après quelques recherches, se décider sur quel film regarder : « Les Chausses-Pieds du Havre », une comédie musicale. Cependant, avant de pouvoir regarder leur film, ils vont devoir subir l’une des caractéristiques principales de la télévision : les publicités…', NULL, 'Court-métrage réalisé par Daniel Le Toriellec dans le cadre du concours ¾ de cinéma, dans lequel j’ai participé à l’écriture et au design sonore. Vainqueur du prix du montage de ce concours.', 'Court-métrage réalisé par Daniel Le Toriellec dans le cadre du concours ¾ de cinéma, dans…', 'C’était un super projet, on s’est beaucoup amusé à le créer, et on est tous très content du résultat qui nous fait toujours autant rire.', '00:06:28', '2024-04-10', 'https://youtu.be/RnzigF2BXu4', 12),
(7, 'Souris !', 'Court-Métrage', 'Créateur', 'An 2352, l’IA contrôle le monde, il n’y a plus de gouvernements, et les hommes sont gérés par des IA pour être le plus productif possible. Même la justice est gérée par des IA. Est-ce que cela est bien ? C’est discutable.', NULL, 'Ce projet était initialement destiné à un concours dont le thème était “Le Monde de Demain”, mais dans l’impossibilité de le réaliser dans les temps, nous l’avons fait pour nous.', 'Ce projet était initialement destiné à un concours dont le thème était “Le Monde de Demain”, mais dans l’impossibilité de le réaliser dans les temps, nous…', 'C’était très cool de faire ce Court-Métrage, premièrement, car ça faisait un moment qu’on avait rien tourné, donc on a retrouvé l’ambiance, l\'excitation et la joie, et ça a été très formateur pour moi pour faire un montage efficace, en sachant quelles choses j’oublie avec la pression du temps. Au final, je suis très fier du résultat, car je trouve que l’idée générale qu’on avait imaginée est bien retranscrite, et le résultat visuel et sonore est bon.', '00:05:31', '2023-02-26', 'https://youtu.be/7Ud023579ds', 13),
(8, 'PHOENIX', 'Court-Métrage', 'Créateur', 'Quand pour un acteur réalité et fiction se mélangent, où se trouve le réel danger ?', NULL, 'Comme pour Perdu, dans le cadre du cours de mise en scène de Jean-François Perron à l’UQAT, nous devions réaliser 2 courts métrages au cours du trimestre. Pour chacun d’eux, nous avons eu environ 6 semaines pour les produire. Celui-ci est le deuxième que nous avons fait. Pour ce projet, j’était en équipe avec Martin Foucher, Antoine Videau, Gabriel Herchy, Florian Couttenier et Sarah-Jeanne Mantha.<br><br>\r\nComme pour Perdu, l’idée était de travailler la mise en scène, l’anticiper, et apprendre ainsi tous les aspects importants à prévoir au niveau des lieux, accessoires, costumes, plans de caméra, dynamique de montage, etc… à anticiper à l’étape de pré-production.', 'Comme pour Perdu, dans le cadre du cours de mise en scène de Jean-François Perron à l’UQAT, nous devions réaliser 2 courts métrages au cours du trimestre. Pour chacun d’eux, nous avons eu environ 6 semaines pour les produire. Celui-ci est le deuxième que nous avons fait. Pour ce projet, j’étais en équipe…', 'Ce court-métrage m’a plus perturbé que d’autres, jusqu\'au rendu final je ne savais pas vraiment si le résultat serait à la hauteur de nos attentes, mais c’était aussi une première expérience de travail de colorimétrie qui m’a beaucoup apporté. Je suis au final très content de ce que nous avons produit, même si je trouve que certaines choses auraient pu être faites différemment.', '00:07:31', '2024-04-25', 'https://youtu.be/J1yI7LnJh9w', 14),
(9, 'News', 'Court-Métrage', 'Créateur', 'Raphaël, Aby et Mattéo, trois étudiants en histoire, vont, pendant leurs révisions, être témoins d\'un étrange événement…', NULL, '2ème création du Placard Production, réalisée dans le cadre du concours 3/4 de semaine, organisé par 3/4 de Pouce (et vainqueur ;), avec une plus petite équipe que sur d\'autres projets.', NULL, 'Nous sommes tous très fier du résultat (et nous avons gagné). Je retire beaucoup de positif de cette expérience, notamment sur l\'organisation, et le fait que nous étions moins que pour la Coloc, mais que personne n’a manqué. Je compare ça avec mes anciennes et toujours actuelles expériences avec Baptiste Martin, où nous sommes en dehors des acteurs 2 tout le temps, avec par moment l’aide pour le cadrage. Comme quoi, pas besoin d’être beaucoup pour faire quelque chose de bien. Là, le fait d’être 7 nous a bien permis de nous organiser, sans être trop. Pour le tournage aussi, où nous n’étions pas tous les 7 là les 2 jours, 6 un jour et 5 l’autre, les personnes inutiles ne sont pas venues, ce qui a aidé la productivité. Je suis donc globalement très content de ce qu’on a fait.', '00:05:02', '2023-03-08', 'https://youtu.be/2bXA16SUyCU', 15),
(10, 'Les Guimauves Tueuses', 'Créateur', 'Mono MP3', 'An 2223, 2 Guimauves vivantes et intelligentes terrorisent l\'humanité qui va bientôt s\'éteindre par leur faute. […] Tout semble perdu, jusqu\'à ce qu\'un jour, des amis découvrent le moyen de voyager dans le temps… Entre présent et passé, la fuite éternelle s\'arrêtera-t-elle un jour ?', NULL, 'Fiction audio que j’ai créé dans le cadre du <strong><a target=\"_blank\" href=\"https://2023.sagadelete.fr\">concours de la Saga de l’été</a></strong>, concours qui consiste à créer une fiction audio de plus de 15 minutes en 3 mois entre le 1er juin et début septembre. À partir de plusieurs pistes d’idées , j’ai écrit, puis réalisé Les Guimauves Tueuses.', 'Fiction audio que j’ai créé dans le cadre du <strong><a target=\"_blank\" href=\"https://2023.sagadelete.fr\">concours de la Saga de l’été</a></strong>, concours qui consiste à créer une fiction audio…', 'C’était une super expérience, je suis très content d’avoir fini, et je suis très content de ce que j’ai sorti ! J’ai été étonné de tous les retours positifs et toutes les personnes qui l’ont vu. J\'ai aussi eu certains retours sur la problématique de qualité de micro trop variée entre chaque acteur, qui sortait l\'auditeur de l\'histoire. Ce que j\'ai compris, et pris en compte pour mes prochaines créations', '00:39:41', '2023-09-03', 'https://youtu.be/nYfWaIYYOcs', 16),
(11, 'La Nuit des Étoiles', 'Créateur', 'Saga mp3', 'Astéria, déesse des étoiles, décide de mener une expérience sur les étoiles le soir de noël en permettant à certaines constellations de se déplacer afin d\'étudier leur comportement.', NULL, 'C’est un projet assez ambitieux d’une série audio de 25 épisodes au format calendrier de l’avent, que j’ai co-réalisé avec Yanis Boulogne. C’est via ce projet que nous avons rejoint le groupe Javras. Et comme nous avons eu l’idée en Septembre, pour nous lancer seulement en Octobre, les deadlines étaient assez courtes, ce qui a créé un challenge très motivant.', 'C’est un projet assez ambitieux d’une série audio de 25 épisodes au format calendrier de l’avent, que j’ai co-réalisé avec Yanis Boulogne. C’est via ce projet que nous avons rejoint le groupe Javras…', 'C’était un vrai challenge, mais nous sommes vraiment contents d’en être arrivés à bout, et nous sommes très fiers de ce que nous avons fait. Nous avons pu apprendre et nous perfectionner tout au long de la création. La limite de temps a été un moteur dans la création de cette fiction, et nous motive à en créer beaucoup d’autres. Un élément très important pour nous est aussi d’avoir rejoint la Team Javras, qui nous motive aussi à continuer. Bref, j’ai adoré créer cette fiction, j’ai en parallèle appris beaucoup avec mes cours, et tout mettre en parallèle ne m’apporte que du positif !', '01:45:50', '2023-12-25', 'https://www.javras.fr/sagas-mp3/la-nuit-des-etoiles/', 17),
(12, 'La Lettre', 'Court-Métrage', 'Créateur', 'Trois gangsters reçoivent une lettre qu\'ils ont récupérée pour leur Boss, sans savoir ce qu\'il y a dedans. Ils vont donc se demander s’il faut l\'ouvrir ou pas. Cependant, un inspecteur de police se lance à leur poursuite afin de récupérer cette mystérieuse lettre...', NULL, '3ème création du Placard Production, pour le 3ème concours de courts-métrages de cette année, le concours 3/4 de cinéma, créer un court-métrage en 1 mois.', '3ème création du Placard Production, pour le 3ème concours de courts-métrages de cette année, le concours 3/4 de cinéma…', 'Pour le fait de créer en 1 mois, je n’ai pas été très impliqué à part à la fin, donc j’en retire plus une expérience de montage en groupe sous la pression du temps, qui était, même si compliquée, très sympa à vivre avec des amis, tous dans le même bâteau.\r\nComme dit précédemment, il y avait des détails que j’aurais aimé plus travailler, mais j’étais quand même très fier de ce que l’on avait fait, et voir son court-métrage projeté sur grand écran est quelque chose de très gratifiant.', '00:13:23', '2023-05-01', 'https://youtu.be/QIjq8JScQME', 18),
(13, 'La Découverte d\'un Nouveau Monde', 'Saga mp3', 'Créateur', '2 amis partent en forêt, mais se retrouvent aspirés par une lumière blanche. Ils se réveillent dans un monde où tout est cubique (Minecraft). L’un est très doué, mais l’autre, encore attaché à notre monde découvre Minecraft et ses incohérences…', NULL, 'La Découverte d’un Nouveau Monde est ma première série audio, et c’est une parodie du jeu Minecraft. Je me suis inspiré de Javras, qui a fait des séries audio parodiant des jeux vidéo.', NULL, 'C’était une très bonne expérience, qui m’a fait beaucoup aimer beaucoup d’aspects des fictions audio, notamment le fait de ne pas avoir besoin de faire venir tout le monde à un même endroit un même jour, chacun enregistre de chez lui. Et même si la fin de cette série a mis du temps à être faite*, j’aurais ainsi pu évoluer dans ma manière de créer les épisodes, entre le premier et le dernier. J’ai aussi évolué sur les visuels, qui ne sont plus statiques à 100%.', '01:02:46', '2021-05-01', 'https://www.youtube.com/playlist?list=PLUifC7P1TaXshLp4ngFnufuEtMH9Tt9o2', 19),
(14, 'Erreur de Lutin', 'Mono mp3', 'Créateur', 'La nuit du 24 Décembre, le père noël part faire sa distribution, comme tous les ans, accompagné de 2 lutins, mais cette année, tout ne se passe pas comme prévu…', NULL, '2 semaines avant noël, je m’ennuyais, je ne savais pas quoi faire, et j’ai voulu faire une fiction audio pour noël. Je l’ai donc écrite, trouvé les acteurs et fait enregistrer dans la semaine, puis monté dans la semaine qui a suivi, pour que tout soit prêt pour noël.', NULL, 'Je suis finalement très fier du résultat, malgré quelques détails que je remarque uniquement parce que j’ai fait le montage, j’aime, moi-même beaucoup écouter cette fiction. Faire cette fiction m’a apporté une nouvelle expérience d’audio, pour que je sois plus confiant de mes capacité, après le Mono MP3 Course Contre l’IA, qui m’avait remis le pied à l’étrier de la création de fictions audio.', '00:04:10', '2022-12-25', 'https://youtu.be/LvNCEGmbHQg', 20),
(15, 'Course Contre l\'IA', 'Mono mp3', 'Créateur', 'An 2352, l’IA contrôle le monde, et tous les humains sont dans une routine pour être le plus productifs possible.', NULL, 'J’ai créé ce mono mp3 lors d’une journée d’apprentissage de la fiction audio organisé par Javras. L’idée était de créer une bande annonce pour un film qui ne sortirait pas. J’ai décidé de faire une bande annonce pour un prochain court-métrage que j’écrivais (Souris !), puis au final nous avons écrit souris avec un autre angle donc ce mono mp3 est juste resté une histoire dans le même univers.', 'J’ai créé ce mono mp3 lors d’une journée d’apprentissage de la fiction audio organisé par Javras. L’idée était de créer une bande annonce pour un film qui ne sortirait pas. J’ai décidé de faire une bande annonce pour un prochain court-métrage que j’écrivais (Souris !), puis au final…', 'La création de ce mono a été très intéressante, j’ai appris beaucoup, et je me suis peu de temps après lancé dans la création de nouvelles fictions audio, qui me permettent de faire des fictions avec des gens, sans avoir à se voir tous un jour à un endroit en présentiel, voir même ne jamais nous voir, juste discuter par internet.', '00:04:31', '2022-10-29', 'https://youtu.be/lYAO5Tb8IEY', 21),
(16, 'Bonnes Résolutions', 'Court-Métrage', 'Créateur', 'Un Homme du futur se retrouve le jour du nouvel an en 2022, il découvre cette tradition très ancienne pour lui, et s’interroge sur la raison de sa présence ici, avant de comprendre…', NULL, 'Avec ce court-métrage, nous voulions juste faire un court-métrage ensemble, parce que cela faisait quelques mois que nous n’en avions pas fait, nous l’avons donc écrit, puis tourné dans la foulée.', NULL, 'Je suis très content de ce qu\'on a fait, d\'autant plus que je voulais vraiment faire un petit truc pour le nouvel an, et faire un petit court métrage sans prise de tête, histoire de faire une pause dans l\'écriture d\'un court métrage plus long et pour lequel on prendrait plus le temps.<br><br>\r\n\r\nC\'est le court-métrage le plus ancien que le met dans mon portfolio, car, aujourd\'hui, je considère que c\'est le premier qui vaut le coup, tout ce que j\'ai fait avant étant maintenant plutôt classé au rang d\'expérimentations dans ma tête. Si vous souhaitez tout de même voir tout cela, ce sont les vidéos les plus anciennes de la chaîne <strong><a target=\"_blank\" href=\"https://www.youtube.com/@les-jeunes-createurs\">Les Jeunes Créateurs</a></strong>. Libre à vous d\'aller voir. ', '00:05:05', '2022-01-01', 'https://youtu.be/XtsPSZL5APU', 22),
(17, 'Assassin\'S Creed : Nouvelle Ère ', 'Court-Métrage', 'Créateur', 'Alexandre vit une vie banale, jusqu’au jour où il reçoit une lettre étrange, et découvre qu’il est le descendant d’un mystérieux Assassin nommé Ezio et qu\'il doit stopper les Templiers, qui utilisent une nouvelle arme : le numérique…', NULL, '\r\nL’idée était de faire un premier gros court-métrage après la fin de la série Doctor Who, où nous avions décidé de faire une pause sur les séries car à chaque fois, nous manquions d’inspiration pour certains épisodes.', 'L’idée était de faire un premier gros court-métrage après la fin de la série Doctor Who, où nous avions décidé de…', 'Le montage était très motivant pour moi, parce que j’ai démarré après chaque journée de tournage avec ce que l’on avait tourné. J’ai pour la première fois découpé mon montage en plusieurs petits montages, ce qui me motivait aussi, à chaque fois que je finissais un petit bout. Et faire le montage des scènes de combat était une première très intéressante, parce que le montage dynamique à couper à l’image près faisait que je créait vraiment le combat que l’on avait simulé.', '00:14:02', '2022-07-17', 'https://youtu.be/bwbp1wqbwwM', 23),
(18, 'Perdu', 'Court-Métrage', 'Créateur', 'Ben va donner sa paie hebdomadaire à son Boss, malheureusement, il a eu quelques problèmes et son Boss s’en rend compte…', NULL, 'Court-métrage que j’ai réalisé avec Antoine Videau, Florian Couttennier, Gabriel Herchy, Martin Foucher et Sarah-Jeanne Mantha dans le cadre du cours de Mise en Scène et éclairages de Jean-François Perron à l’UQAT. J’étais réalisateur sur ce projet, ce qui m’a donné un aperçu des responsabilités endossées par ce rôle, et comment m’améliorer en tant que réalisateur pour mes prochaines créations.', 'Court-métrage que j’ai réalisé avec Antoine Videau, Florian Couttennier, Gabriel Herchy, Martin Foucher et Sarah-Jeanne Mantha dans le cadre du cours de Mise en Scène et éclairages de Jean-François Perron à l’UQAT. J’étais réalisateur sur ce projet, ce qui m’a donné un aperçu des…', 'C’était un projet très cool à mener, j’ai beaucoup appris au cours de son avancée, en grande partie des choses que je réutiliserai pour mes futures créations, et mon équipe était très agréable, et très compétente, ce qui a rendu la réalisation de ce projet encore plus fluide.', '00:07:19', '2024-02-28', 'https://youtu.be/4dquyS8u_78', 24),
(19, 'Camping Tranquille', 'Mono mp3', 'Créateur', 'Tak campe dans la forêt pour s\'évader. Elle profite du calme ambiant avant que son séjour ne soit gâché par un étrange personnage.', NULL, 'C’est le projet de Ukarnub qui cherchait un mixeur car il n’arrivait pas à finir sa fiction. Je me suis proposé, et je lui ai fait le mixage. Cela m’a permis de pratiquer, avec un autre juge sur mon travail que uniquement moi-même, ce qui était très instructif et motivant.', NULL, 'J’ai travaillé sur ce mixage peu à peu, de Mars à Août 2024, et c’était vraiment très cool de sentir le projet s’améliorer à chaque modification que me demandait Ukarnub. C’était vraiment une super expérience, j’ai pris beaucoup de plaisir et j’ai beaucoup appris à travailler sur ce projet.', '00:15:50', '2024-08-07', 'https://youtu.be/DYJ4ijVMJUA', 25),
(20, 'Twinkle', 'Court-Métrage', 'Créateur', 'Un soir, alors qu\'il rentre chez lui, le psychothérapeute Hugo Darlan raconte sa journée à son ami John[…] Soudain, un bruit retentit dehors et Brandon, parti sortir les poubelles, ne revient pas. Hugo et John partent à sa recherche dans la nuit noire…', NULL, 'Dans le cadre du concours 48HFP, Daniel Le Toriellec a réuni un équipe dont j’ai fait partie. J’ai participé à l’écriture et je me suis chargé du sound design.', 'Dans le cadre du concours 48HFP, Daniel Le Toriellec a réuni un équipe dont j’ai fait partie. J’ai…', 'C’était une très bonne expérience, car j’ai participé là où est ma force, et Daniel a bien su gérer la réalisation pour que chacun de nous travaille sans pression du temps. Et je n’ai pas ressenti de stress nocif à travailler avec lui sur ce 48H. Je me suis bien amusé, et j’ai découvert l’éditeur audio de DaVinci, avec lequel je n’était pas familier, mais cela n’a posé aucun problème.', '00:07:54', '2024-11-29', 'https://youtu.be/rmqZOcG6k9Q', 26);

-- --------------------------------------------------------

--
-- Structure de la table `projets-etapes`
--

CREATE TABLE `projets-etapes` (
  `ID-Projet` int(11) NOT NULL,
  `ID-Etape` int(11) NOT NULL
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
(3, 51),
(3, 52),
(3, 53),
(3, 54),
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
  `ID-Projet` int(11) NOT NULL,
  `ID-Objectif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets-objectifs`
--

INSERT INTO `projets-objectifs` (`ID-Projet`, `ID-Objectif`) VALUES
(1, 1),
(1, 2),
(2, 11),
(3, 28),
(3, 29),
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
  `ID` int(11) NOT NULL,
  `lien_ytb` varchar(100) NOT NULL,
  `titre_ytb` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `objectifs`
--
ALTER TABLE `objectifs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `video_ytb`
--
ALTER TABLE `video_ytb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
