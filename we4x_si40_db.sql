-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hote : localhost
-- Genere le : ven. 24 avr. 2026 a 18:05
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnees : `we4x_si40_db`
CREATE DATABASE we4x_si40_db;
USE we4x_si40_db;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  `is_valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `reservation_id`, `content`, `rate`, `date`, `is_valid`) VALUES
(1, 1, 1, 'Salle propre, rien a signaler.', 4, '2026-05-10 18:30:00', 1),
(2, 2, 2, 'Bonne soiree, on a bien joue.', 4, '2026-05-11 21:15:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre` int(11) NOT NULL,
  `nb_player_max` int(11) NOT NULL,
  `plateform` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `game`
--

INSERT INTO `game` (`id`, `title`, `genre`, `nb_player_max`, `plateform`, `description`) VALUES
(1, 'Counter-Strike 2', 1, 10, 'PC', 'FPS tactique competitif par equipes de 5.'),
(2, 'Valorant', 1, 10, 'PC', 'FPS tactique avec agents et strategies d\'equipe.'),
(3, 'League of Legends', 3, 10, 'PC', 'MOBA 5v5 tres joue en competition.'),
(4, 'Rocket League', 5, 6, 'PC', 'Football arcade avec voitures, rapide et fun.'),
(5, 'EA Sports FC 25', 5, 4, 'PlayStation 5', 'Simulation de football ideale pour jouer entre amis.'),
(6, 'Mario Kart 8 Deluxe', 6, 4, 'Nintendo Switch', 'Course arcade familiale et accessible.'),
(7, 'Super Smash Bros. Ultimate', 7, 8, 'Nintendo Switch', 'Jeu de combat festif avec de nombreux personnages.'),
(8, 'Beat Saber', 12, 4, 'VR', 'Jeu de rythme en realite virtuelle.'),
(9, 'Minecraft', 10, 10, 'PC', 'Jeu de construction et de survie en multijoueur.'),
(10, 'Street Fighter 6', 7, 2, 'PlayStation 5', 'Jeu de combat technique et competitif.' );

-- --------------------------------------------------------

--
-- Structure de la table `game_genre`
--

CREATE TABLE `game_genre` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `game_genre`
--

INSERT INTO `game_genre` (`game_id`, `genre_id`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 5),
(5, 5),
(6, 6),
(7, 7),
(8, 12),
(9, 10),
(10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `game_plateform`
--

CREATE TABLE `game_plateform` (
  `game_id` int(11) NOT NULL,
  `plateforme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `game_plateform`
--

INSERT INTO `game_plateform` (`game_id`, `plateforme_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 6),
(7, 6),
(8, 8),
(9, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'FPS'),
(3, 'MOBA'),
(5, 'Sport'),
(6, 'Course'),
(7, 'Combat'),
(10, 'Aventure'),
(12, 'VR');

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('credit_card','check','cash','other') NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('pending','completed','failed','refunded') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `payment`
--

INSERT INTO `payment` (`id`, `reservation_id`, `amount`, `type`, `date`, `status`) VALUES
(1, 1, 45.00, 'credit_card', '2026-05-10 14:05:00', 'completed'),
(2, 2, 40.00, 'cash', '2026-05-11 18:05:00', 'completed'),
(3, 3, 36.00, 'credit_card', '2026-05-12 16:05:00', 'pending'),
(4, 4, 28.00, 'credit_card', '2026-05-13 15:05:00', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `plateform`
--

CREATE TABLE `plateform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `plateform`
--

INSERT INTO `plateform` (`id`, `name`) VALUES
(1, 'PC'),
(2, 'PlayStation 5'),
(6, 'Nintendo Switch'),
(8, 'VR');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `game_id` tinyint(4) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `date_begin` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `nb_player` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `room_id`, `game_id`, `date_reservation`, `date_begin`, `date_end`, `nb_player`, `status`, `total_price`) VALUES
(1, 1, 1, 1, '2026-05-10 14:00:00', '2026-05-10 15:00:00', '2026-05-10 18:00:00', 5, 1, 45),
(2, 2, 2, 5, '2026-05-11 18:00:00', '2026-05-11 19:00:00', '2026-05-11 21:00:00', 4, 1, 40),
(3, 1, 4, 8, '2026-05-12 16:00:00', '2026-05-12 17:00:00', '2026-05-12 19:00:00', 4, 0, 36),
(4, 2, 3, 4, '2026-05-13 15:00:00', '2026-05-13 15:00:00', '2026-05-13 17:00:00', 4, 0, 28);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `capacity` int(11) NOT NULL,
  `hourly_rate` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `status` enum('available','unavailable','maintenance','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `room`
--

INSERT INTO `room` (`id`, `name`, `address`, `capacity`, `hourly_rate`, `description`, `status`) VALUES
(1, 'Alpha PC', '12 Rue Oberkampf, 75011 Paris', 6, 15.00, 'Salle PC compacte avec 6 postes, ecrans 144Hz et casques micro.', 'available'),
(2, 'Omega Console', '25 Rue Merciere, 69002 Lyon', 8, 20.00, 'Salon console avec PS5, canape, television 4K et jeux multijoueurs.', 'available'),
(3, 'Nexus Bordeaux', '47 Cours Victor Hugo, 33000 Bordeaux', 10, 14.00, 'Salle polyvalente pour groupes, consoles et postes PC legers.', 'available'),
(4, 'VR Lab Lille', '6 Rue Nationale, 59000 Lille', 6, 18.00, 'Espace VR avec casques recents et zone de jeu securisee.', 'available'),
(5, 'Retro Arcade Nantes', '22 Quai de la Fosse, 44000 Nantes', 12, 16.00, 'Salle retro avec bornes arcade et jeux Switch pour soirees entre amis.', 'available'),
(6, 'Squad Arena Paris', '18 Rue des Petites Ecuries, 75010 Paris', 20, 32.00, 'Grande salle orientee competition avec postes PC alignes et coin briefing.', 'available'),
(7, 'Console Loft Rennes', '9 Rue Saint-Michel, 35000 Rennes', 6, 13.00, 'Petit loft console confortable pour sessions privees.', 'available'),
(8, 'ESport Toulouse', '14 Avenue de Muret, 31300 Toulouse', 16, 25.00, 'Salle e-sport pour entrainements d\'equipe et mini-tournois.', 'available'),
(9, 'Family Gaming Dijon', '4 Rue de la Liberte, 21000 Dijon', 5, 12.50, 'Salle accessible pour familles, jeux cooperatifs et espace detente.', 'available'),
(10, 'Studio Marseille', '9 Boulevard de Louvain, 13008 Marseille', 4, 22.00, 'Petite salle avec eclairage, micro et PC pour enregistrer ou jouer.', 'available');

-- --------------------------------------------------------

--
-- Structure de la table `room_game`
--

CREATE TABLE `room_game` (
  `room_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `room_game`
--

INSERT INTO `room_game` (`room_id`, `game_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 5),
(2, 7),
(3, 4),
(3, 5),
(4, 8),
(5, 6),
(5, 7),
(6, 1),
(6, 2),
(6, 3),
(7, 5),
(7, 6),
(8, 1),
(8, 2),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `room_type_material`
--

CREATE TABLE `room_type_material` (
  `room_id` int(11) NOT NULL,
  `type_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `room_type_material`
--

INSERT INTO `room_type_material` (`room_id`, `type_material_id`) VALUES
(1, 1),
(1, 6),
(2, 2),
(2, 5),
(3, 1),
(3, 2),
(4, 3),
(4, 5),
(5, 4),
(5, 2),
(6, 1),
(6, 6),
(7, 2),
(7, 5),
(8, 1),
(8, 6),
(9, 2),
(9, 5),
(10, 1),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `type_material`
--

CREATE TABLE `type_material` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `type_material`
--

INSERT INTO `type_material` (`id`, `name`) VALUES
(1, 'PC Gaming'),
(2, 'Console'),
(3, 'Casque VR'),
(4, 'Borne Arcade'),
(5, 'Television 4K'),
(6, 'Ecran 144Hz');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dechargement des donnees de la table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `last_name`, `age`, `password`, `role`, `registration_date`) VALUES
(1, 'julie.client@example.com', 'Julie', 'Bened', 21, '$2y$10$2JlIEryg06SDm3nnpCrUuOHSSV4JYSkZmiOfSNK61kp4eOO/9PmEe', 'user', '2026-04-10 10:00:00'),
(2, 'antoine.martin@example.com', 'Antoine', 'Martin', 24, '$2y$10$2JlIEryg06SDm3nnpCrUuOHSSV4JYSkZmiOfSNK61kp4eOO/9PmEe', 'user', '2026-04-11 11:00:00'),
(10, 'admin@gamingrooms.local', 'Admin', 'GamingRooms', 30, '$2y$10$44QOasrRNA9z.BiNhYnb0Om5OHZmViSGfCj9TSko/Ld9yay9i5kmC', 'admin', '2026-04-19 09:00:00');

--
-- Index pour les tables dechargees
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_reservation_id` (`reservation_id`),
  ADD KEY `com_user_id` (`user_id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game_genre`
--
ALTER TABLE `game_genre`
  ADD KEY `genre_game_id` (`game_id`),
  ADD KEY `genre_genre_id` (`genre_id`);

--
-- Index pour la table `game_plateform`
--
ALTER TABLE `game_plateform`
  ADD KEY `game_id` (`game_id`),
  ADD KEY `plateforme_id` (`plateforme_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiement_revervation_id` (`reservation_id`);

--
-- Index pour la table `plateform`
--
ALTER TABLE `plateform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_room_id` (`room_id`),
  ADD KEY `reservation_user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room_game`
--
ALTER TABLE `room_game`
  ADD KEY `room_id` (`room_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Index pour la table `room_type_material`
--
ALTER TABLE `room_type_material`
  ADD KEY `type_materiel_room` (`room_id`),
  ADD KEY `type_materiel` (`type_material_id`);

--
-- Index pour la table `type_material`
--
ALTER TABLE `type_material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables dechargees
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `plateform`
--
ALTER TABLE `plateform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `type_material`
--
ALTER TABLE `type_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables dechargees
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `com_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`),
  ADD CONSTRAINT `com_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `game_genre`
--
ALTER TABLE `game_genre`
  ADD CONSTRAINT `genre_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `genre_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `game_plateform`
--
ALTER TABLE `game_plateform`
  ADD CONSTRAINT `game_plateform_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `game_plateform_ibfk_2` FOREIGN KEY (`plateforme_id`) REFERENCES `plateform` (`id`);

--
-- Contraintes pour la table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `paiement_revervation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `reservation_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `room_game`
--
ALTER TABLE `room_game`
  ADD CONSTRAINT `game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);

--
-- Contraintes pour la table `room_type_material`
--
ALTER TABLE `room_type_material`
  ADD CONSTRAINT `type_materiel` FOREIGN KEY (`type_material_id`) REFERENCES `type_material` (`id`),
  ADD CONSTRAINT `type_materiel_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




