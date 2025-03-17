# Portfolio Matthieu

Ce projet est un site web conçu pour un ami afin de lui fournir un portfolio en ligne. À l'origine, il avait commencé en HTML, mais pour assurer une meilleure évolutivité, il a été refait en PHP avec une base de données MySQL. Ce projet a aussi été l'occasion de lui enseigner les bases de ces technologies.

## 📌 Structure du projet

Le site est divisé en trois parties principales :
- **Interface utilisateur** : Pages accessibles aux visiteurs.
- **Espace administrateur** : Gestion simplifiée du contenu.
- **Back-end** : Fonctionnalités techniques et gestion des données.

---

## 🚀 Partie 1 : Interface utilisateur

- Les pages classiques affichent les projets récupérés via des requêtes SQL.
- Un bouton "Load More" permet d'afficher progressivement les projets sans surcharger la page.
- Le **Header** et **Footer** sont des fichiers indépendants pour faciliter les modifications globales.
- Un bouton permet de télécharger le CV, généré dynamiquement en PHP avec TCPDF.
- Les pages de projet utilisent un template qui charge dynamiquement les données du projet sélectionné.
- Navigation simplifiée avec des flèches permettant de passer d'un projet à un autre.

---

## 🔧 Partie 2 : Espace administrateur

- Les pages d'administration reprennent la structure des pages classiques, avec des options pour modifier et ajouter du contenu.
- Le tableau de bord affiche :
  - Le dernier projet ajouté (même s'il est prévu pour le futur).
  - Le nombre de projets et de visites.
  - La gestion des administrateurs (ajout/suppression).
- **Archivage des projets** : Un projet peut être conservé sans être visible sur le site public.
- Utilisation de fenêtres modales pour la gestion des projets.

🔗 [Pages Admin](https://github.com/Yananas23/Portfolio-Matthieu/blob/main/portfolio/admin/admin.php)

---

## ⚙️ Partie 3 : Back-end et composants

Le dossier `component` contient plusieurs modules facilitant le fonctionnement du site :

- **Suppression des éléments** : Suppression des projets via SQL (`DELETE`).
- **Gestion des images** (`resize.php`) : Vérifie la conformité des fichiers, les compresse et les redimensionne.
- **Compteur de visites** (`compteur.php`) : Incrémente à chaque passage sur la page d'accueil (pas d'utilisation de cookies).
- **Fichier `admin.js`** :
  - Gère l'affichage et les interactions des fenêtres modales.
  - Utilise AJAX pour les requêtes avec la base de données.

🔗 [Back-end](https://github.com/Yananas23/Portfolio-Matthieu/tree/main/portfolio/component)

---

## 🌍 Partie 4 : Gestion des langues avec GetText

Le site utilise **GetText** pour la traduction des textes :

1. Extraction des chaînes de caractères dans un fichier `.pot`.
2. Création de fichiers `.po` pour chaque langue (actuellement, seul l'anglais est pris en charge).
3. Compilation en `.mo` pour être utilisé en production.
4. Les fichiers sont stockés dans `locales/en_US/LC_MESSAGES/messages.mo`.

---

## 📂 Liens utiles

- [Projets](https://github.com/Yananas23/Portfolio-Matthieu/blob/main/portfolio/projets.php)
- [Fiche projet](https://github.com/Yananas23/Portfolio-Matthieu/blob/main/portfolio/fiche-projet.php)
- [Modales admin](https://github.com/Yananas23/Portfolio-Matthieu/tree/main/portfolio/admin/modal)
- [Index](https://github.com/Yananas23/Portfolio-Matthieu/blob/main/portfolio/index.php)
- [Site en ligne](https://matthieuthiesset.fr/index.php)

---

