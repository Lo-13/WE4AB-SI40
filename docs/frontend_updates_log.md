# Mise à jour Frontend (Front-End Updates Log)

Voici le résumé des tâches frontend que j'ai récemment accomplies pour avancer sur notre projet WE4A-SI40, conformément à notre To-Do list :

## 1. JavaScript & Animations (UX/UI)
Pour rendre le site plus dynamique et professionnel, j'ai créé deux nouveaux scripts (chargés globalement via `footer.php`) :

*   **`site/js/validation.js`** :
    *   **Sécurité et UX** : Ajout d'une icône "œil" (👁️) sur les pages de connexion et d'inscription pour afficher/masquer le mot de passe.
    *   **Indicateur de force** : Ajout d'une barre de progression sur la page d'inscription qui évalue en temps réel la force du mot de passe saisi (Faible/Moyen/Fort).
    *   **Vérification en temps réel** : Le champ "Confirmer le mot de passe" vérifie dynamiquement si les mots de passe correspondent. Si ce n'est pas le cas, le champ devient rouge et le bouton de soumission est désactivé.
*   **`site/js/animations.js`** :
    *   **Scroll Reveal** : Utilisation de `IntersectionObserver` sur la page d'accueil (`home.php`) et la liste des salles (`rooms.php`). Les éléments glissent vers le haut et apparaissent en fondu (fade-in) au fur et à mesure que l'utilisateur fait défiler la page.
    *   **Effet Tilt 3D** : Ajout d'un effet interactif de survol en 3D sur les cartes des salles. Les cartes s'inclinent en suivant le curseur de la souris.
    *   **Système de Toast** : Création d'une fonction réutilisable `showToast()` pour afficher des notifications élégantes au lieu des pop-ups `alert()` basiques.

## 2. Navigation Globale (Header)
*   **Mise à jour** : Dans `site/views/partials/header.php`, le lien "Dashboard" a été renommé en **"Mes Réservations"** pour les utilisateurs connectés.
*   **Redirection** : Le lien pointe désormais correctement vers la page `my-reservations`, permettant à l'utilisateur de voir ses salles réservées, comme nous l'avions décidé.

## 3. Système de Tri des Salles (Sorting System)
*   **Interface UI** : Ajout d'un menu déroulant de tri (Select Dropdown) sur la page `site/views/rooms.php`, permettant de trier par prix (croissant/décroissant) et par capacité.
*   **Logique Backend (PHP/SQL)** : Modification du contrôleur `site/controllers/rooms.php` pour récupérer le paramètre `GET['sort']` et appliquer une clause `ORDER BY` dynamique à la requête SQL. Le tri est donc 100% fonctionnel et tire les données directement de la base.

---
**Tâches restantes (pour moi ou le reste de l'équipe) :**
- [ ] Concevoir l'interface spécifique pour l'Admin Dashboard (nouveaux onglets/sidebar).
- [ ] Enrichir la page `room-detail.php` avec des détails plus réalistes (icônes des équipements, galerie d'images, etc.).
