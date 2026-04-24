-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 24 avr. 2026 à 18:05
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
-- Base de données : `we4x_si40_db`
--

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
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `reservation_id`, `content`, `rate`, `date`, `is_valid`) VALUES
(1, 3, 1, 'Super session CS2, les PCs sont ultra puissants, connexion impeccable. On reviendra !', 5, '2026-01-10 17:30:00', 1),
(2, 4, 2, 'Très bon moment à V.Hive, ambiance Team Vitality au top. Un peu cher mais ça vaut le coup.', 4, '2026-01-11 20:30:00', 1),
(3, 5, 3, 'FIFA en salle, c\'est tellement mieux que chez soi ! Super expérience.', 5, '2026-01-12 17:30:00', 1),
(4, 6, 4, 'Les bornes arcade sont géniales, on s\'est éclatés sur Pac-Man. Nostalgie assurée !', 5, '2026-01-13 19:30:00', 1),
(5, 7, 5, 'iRacing sur simulateur Fanatec c\'est une expérience incroyable. Je recommande vivement.', 5, '2026-01-14 13:30:00', 1),
(6, 8, 6, 'LAN party bien organisée, les PCs tournent bien. Seul bémol : il faisait un peu chaud.', 4, '2026-01-15 23:30:00', 1),
(7, 10, 8, 'Bonne salle à Lyon, personnel accueillant. Les chaises pourraient être plus confortables.', 3, '2026-01-17 21:30:00', 1),
(8, 11, 9, 'Tekken 8 en salle c\'est top. Juste deux joueurs mais quelle intensité !', 5, '2026-01-18 17:30:00', 1),
(9, 12, 10, 'Petite salle à Bordeaux mais sympa. FIFA avec les potes, parfait !', 4, '2026-01-19 16:30:00', 1),
(10, 13, 11, 'ESpot Arena = paradis du gamer. League of Legends sur 240Hz c\'est une autre vie.', 5, '2026-01-20 22:30:00', 1),
(11, 14, 12, 'Bonne organisation à V.Hive pour notre groupe. Valorant fluide et sans lag.', 4, '2026-01-21 18:30:00', 1),
(12, 15, 13, 'La Maison de l\'Esport est magnifique. Mario Kart en groupe c\'est festif.', 5, '2026-01-22 17:30:00', 1),
(13, 16, 14, 'Super soirée rétro chez Geek Room ! Les Tortues Ninja c\'est un chef-d\'œuvre.', 5, '2026-01-23 19:30:00', 1),
(14, 18, 16, 'God of War en salon gaming, excellent. Dommage que la session était courte.', 4, '2026-01-25 18:30:00', 1),
(15, 19, 17, 'Super Smash Bros avec des amis dans la salle de Toulouse, ambiance folle !', 5, '2026-01-26 16:30:00', 1),
(16, 20, 18, 'Assetto Corsa Competizione sur simulateur : physique parfaite, sensations réelles.', 5, '2026-01-27 14:30:00', 1),
(17, 21, 19, 'Hogwarts Legacy dans une salle gaming, c\'est magique. Bel écran 4K.', 4, '2026-01-28 20:30:00', 1),
(18, 23, 20, 'Half-Life Alyx en VR chez BeGame, époustouflant. Je suis fan de la VR maintenant.', 5, '2026-01-29 17:30:00', 1),
(19, 24, 21, 'Rocket League compétitif à V.Hive, super session. Réseau stable et rapide.', 4, '2026-01-30 21:30:00', 1),
(20, 25, 22, 'Street Fighter à la Maison de l\'Esport, tournoi informel entre amis, parfait.', 5, '2026-02-01 17:30:00', 1),
(21, 26, 23, 'CS2 en LAN party chez eSportBox, super feeling. La salle est fonctionnelle.', 3, '2026-02-02 21:30:00', 1),
(22, 27, 24, 'FIFA en salle à Toulouse, rien à dire c\'était bien. Tarif raisonnable.', 4, '2026-02-03 18:30:00', 1),
(23, 28, 25, 'Starcraft II en LAN, moment de nostalgie intense. ESpot Arena toujours au top.', 5, '2026-02-04 14:30:00', 1),
(24, 29, 26, 'Hades solo dans un coin de GameRoom Lyon, zen et agréable.', 4, '2026-02-05 22:30:00', 1),
(25, 31, 28, 'Guilty Gear Strive à Bordeaux, les graphismes sur TV 4K, wow.', 5, '2026-02-07 20:30:00', 1),
(26, 32, 29, 'Superhot VR chez BeGame, concept genial. J\'ai transpire comme jamais.', 5, '2026-02-08 17:30:00', 1),
(27, 33, 30, 'Apex Legends avec 30 personnes à ESpot, ambiance compétition, j\'adore.', 5, '2026-02-10 17:30:00', 1),
(28, 34, 31, 'Dota 2 à V.Hive, setup parfait pour du compétitif sérieux.', 4, '2026-02-11 21:30:00', 1),
(29, 35, 32, 'Tekken 8 duo à Toulouse, excellente session. Le staff est sympa.', 5, '2026-02-12 18:30:00', 1),
(30, 36, 33, 'Overwatch 2 à la Maison de l\'Esport, belle salle. Un peu bruyant le soir.', 3, '2026-02-13 22:30:00', 1),
(31, 37, 34, 'Fortnite en équipe chez eSportBox, fun ! Les configs sont au poil.', 4, '2026-02-14 23:30:00', 1),
(32, 38, 35, 'Cyberpunk 2077 seul dans la salle de Lyon, immersion totale sur écran géant.', 5, '2026-02-15 18:30:00', 1),
(33, 39, 37, 'Valorant en équipe à ESpot, conditions parfaites. Meilleure salle gaming de Paris.', 5, '2026-02-17 21:30:00', 1),
(34, 40, 38, 'Just Dance à Bordeaux, soirée entre filles hilarante. On a adoré !', 5, '2026-02-18 17:30:00', 1),
(35, 41, 39, 'Phasmophobia en VR chez BeGame, on a hurlé toute la session. Incroyable.', 5, '2026-02-19 21:30:00', 1),
(36, 42, 40, 'Rainbow Six Siege à V.Hive, les 10 PCs côte à côte c\'est parfait pour les équipes.', 4, '2026-02-20 19:30:00', 1),
(37, 43, 41, 'Super Smash Bros à la Maison de l\'Esport, 8 joueurs sur grand écran.', 5, '2026-02-21 17:30:00', 1),
(38, 44, 42, 'Minecraft en multijoueur chez eSportBox, inattendu mais très sympa.', 4, '2026-02-22 21:30:00', 1),
(39, 45, 43, 'Beat Saber chez BeGame, mes bras en ont pris pour leur grade. Excellent !', 5, '2026-02-23 17:30:00', 1),
(40, 46, 44, 'Elden Ring seul à Lyon, tranquille et confortable. Bonne salle.', 4, '2026-02-24 22:30:00', 1),
(41, 47, 46, 'FIFA à Bordeaux, soirée décontractée, bon rapport qualité-prix.', 3, '2026-02-26 18:30:00', 1),
(42, 48, 47, 'Pac-Man en arcade chez Geek Room, les bornes sont en excellent état.', 5, '2026-02-27 17:30:00', 1),
(43, 49, 48, 'Rocket League chez ESpot Arena, connexion 0 lag, setup pro.', 5, '2026-02-28 14:30:00', 1),
(44, 50, 49, 'God of War à la Maison de l\'Esport, fin d\'après-midi parfaite.', 4, '2026-03-01 17:30:00', 1),
(45, 52, 49, 'Très belle salle, je reviendrai sûrement. Service client au top.', 5, '2026-03-01 18:00:00', 1),
(46, 3, 8, 'Lyon est une bonne adresse gaming, je recommande à tous les joueurs de la région.', 4, '2026-01-17 22:00:00', 1),
(47, 4, 13, 'Mario Kart avec ma famille à la Maison de l\'Esport, les enfants ont adoré.', 5, '2026-01-22 18:00:00', 1),
(48, 5, 11, 'LoL sur 240Hz à ESpot, on voit vraiment la différence. Incroyable setup.', 5, '2026-01-20 23:00:00', 1),
(49, 6, 4, 'Bornes rétro en parfait état chez Geek Room, staff passionné et disponible.', 5, '2026-01-13 20:00:00', 1),
(50, 9, 7, 'La session VR a été annulée au dernier moment, c\'était décevant. Remboursement ok.', 2, '2026-01-17 00:00:00', 0);

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
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `title`, `genre`, `nb_player_max`, `plateform`, `description`) VALUES
(1, 'Counter-Strike 2', 1, 10, 'PC', 'FPS tactique compétitif par équipes de 5. Référence mondiale de l\'esport.'),
(2, 'Valorant', 1, 10, 'PC', 'FPS tactique avec agents aux capacités uniques, par Riot Games.'),
(3, 'Call of Duty: Warzone', 2, 150, 'PC', 'Battle royale 150 joueurs dans la ville de Verdansk.'),
(4, 'Fortnite', 2, 100, 'PC', 'Battle royale coloré avec construction, événements live et skins iconiques.'),
(5, 'League of Legends', 3, 10, 'PC', 'MOBA 5v5 le plus joué au monde, centaines de champions.'),
(6, 'Dota 2', 3, 10, 'PC', 'MOBA stratégique profond de Valve, prize pools records en esport.'),
(7, 'Elden Ring', 4, 1, 'PC', 'RPG action open-world de FromSoftware, GOTY 2022.'),
(8, 'The Witcher 3', 4, 1, 'PC', 'RPG épique dans un monde médiéval fantastique, 200+ heures de contenu.'),
(9, 'FIFA 25', 5, 22, 'PlayStation 5', 'Simulation football la plus populaire au monde, modes Ultimate Team et Carrière.'),
(10, 'EA Sports FC 25', 5, 22, 'PlayStation 5', 'Nouveau nom du football virtuel d\'EA, graphismes next-gen.'),
(11, 'Gran Turismo 7', 6, 16, 'PlayStation 5', 'Simulation automobile ultra-réaliste, 400+ voitures, circuits légendaires.'),
(12, 'Forza Motorsport', 6, 24, 'Xbox Series X', 'Simulation course ultra-fidèle par Turn 10, idéal simulateur de course.'),
(13, 'Rocket League', 5, 6, 'PC', 'Football avec des voitures propulsées par des roquettes, compétitif et addictif.'),
(14, 'Street Fighter 6', 7, 2, 'PlayStation 5', 'Jeu de combat de référence par Capcom, nouveau système de drive.'),
(15, 'Tekken 8', 7, 2, 'PlayStation 5', 'Combat 3D avec roster de 32 personnages, graphismes époustouflants.'),
(16, 'Mortal Kombat 1', 7, 2, 'PC', 'Reboot de la saga MK, fatalities brutales et nouveau système kameo.'),
(17, 'Starcraft II', 8, 200, 'PC', 'STR compétitif de Blizzard, légende de l\'esport coréen et mondial.'),
(18, 'Age of Empires IV', 8, 8, 'PC', 'STR historique moderne avec 8 civilisations uniques.'),
(19, 'Resident Evil 4 Remake', 9, 1, 'PlayStation 5', 'Survival horror légendaire entièrement refait, graphismes next-gen.'),
(20, 'Phasmophobia', 9, 4, 'PC', 'Jeu d\'horreur coopératif de chasse aux fantômes, compatible VR.'),
(21, 'The Last of Us Part I', 10, 1, 'PlayStation 5', 'Aventure post-apocalyptique émotionnelle, chef-d\'œuvre narratif.'),
(22, 'God of War Ragnarök', 10, 1, 'PlayStation 5', 'Action-aventure épique avec Kratos et Atreus dans la mythologie nordique.'),
(23, 'Pac-Man', 11, 4, 'Arcade', 'Classique arcade intemporel, manger des pac-gommes en évitant les fantômes.'),
(24, 'Space Invaders', 11, 2, 'Arcade', 'Shoot\'em up rétro légendaire de Taito, 1978.'),
(25, 'Donkey Kong', 11, 2, 'Arcade', 'Jeu de plateforme arcade classique avec le célèbre gorille.'),
(26, 'Beat Saber', 12, 8, 'VR (Meta Quest 3)', 'Rythme VR : trancher des blocs au rythme de la musique avec des sabres laser.'),
(27, 'Half-Life: Alyx', 12, 1, 'VR (Meta Quest 3)', 'FPS narratif VR de Valve, référence absolue de la réalité virtuelle.'),
(28, 'Superhot VR', 12, 1, 'VR (Meta Quest 3)', 'FPS VR où le temps ne bouge que quand vous bougez.'),
(29, 'Mario Kart 8 Deluxe', 6, 4, 'Nintendo Switch', 'Course arcade multijoueur festif avec les personnages Nintendo.'),
(30, 'Super Smash Bros. Ultimate', 7, 8, 'Nintendo Switch', 'Jeu de combat festif avec 80+ personnages Nintendo et guests.'),
(31, 'Among Us', 8, 15, 'PC', 'Jeu de déduction sociale dans l\'espace, phénomène mondial 2020.'),
(32, 'Minecraft', 10, 20, 'PC', 'Jeu de survie et construction en monde ouvert, le plus vendu de l\'histoire.'),
(33, 'Overwatch 2', 1, 10, 'PC', 'FPS hero-shooter de Blizzard, compétitions mondiales d\'esport.'),
(34, 'Apex Legends', 2, 60, 'PC', 'Battle royale en escouades de 3, légendes aux capacités uniques.'),
(35, 'Rainbow Six Siege', 1, 10, 'PC', 'FPS tactique et destructible, destruction d\'environnement clé.'),
(36, 'Cyberpunk 2077', 4, 1, 'PC', 'RPG futuriste en monde ouvert à Night City, DLC Phantom Liberty inclus.'),
(37, 'Hogwarts Legacy', 4, 1, 'PlayStation 5', 'RPG dans l\'univers Harry Potter au XIXe siècle, magie et exploration.'),
(38, 'NBA 2K25', 5, 10, 'PlayStation 5', 'Simulation basketball ultra-réaliste avec mode carrière profond.'),
(39, 'Guilty Gear Strive', 7, 2, 'PlayStation 5', 'Jeu de combat 2D ultra stylisé d\'Arc System Works, bande-son metal.'),
(40, 'Diablo IV', 4, 4, 'PC', 'Action-RPG hack\'n slash coopératif dans un monde sombre et brutal.'),
(41, 'Fall Guys', 2, 60, 'PC', 'Battle royale festif avec mini-jeux loufoques et costumes colorés.'),
(42, 'It Takes Two', 10, 2, 'PC', 'Platformer coopératif en duo, primé GOTY 2021.'),
(43, 'Hades', 10, 1, 'PC', 'Rogue-like action de Supergiant Games, narration et gameplay parfaits.'),
(44, 'Stardew Valley', 4, 4, 'PC', 'Simulation de ferme en pixel art, expérience relaxante et addictive.'),
(45, 'Forza Horizon 5', 6, 12, 'Xbox Series X', 'Course arcade en monde ouvert au Mexique, centaines de voitures.'),
(46, 'iRacing', 6, 64, 'Simulateur de course', 'Simulateur de course en ligne ultra-réaliste, référence des simracers.'),
(47, 'Assetto Corsa Competizione', 6, 30, 'Simulateur de course', 'Simulation GT3/GT4 officielle, physique irréprochable.'),
(48, 'Just Dance 2025', 5, 6, 'Nintendo Switch', 'Jeu de danse festif avec les hits de l\'année, idéal soirée.'),
(49, 'Teenage Mutant Ninja Turtles: Shredder\'s Revenge', 11, 6, 'Arcade', 'Beat\'em up rétro hommage à l\'arcade 80s/90s avec les Tortues Ninja.'),
(50, 'Tekken 7', 7, 2, 'PlayStation 4', 'Volet précédent de la saga Tekken, toujours très joué en tournois.');

-- --------------------------------------------------------

--
-- Structure de la table `game_genre`
--

CREATE TABLE `game_genre` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `game_genre`
--

INSERT INTO `game_genre` (`game_id`, `genre_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(7, 10),
(8, 4),
(8, 10),
(9, 5),
(10, 5),
(11, 6),
(12, 6),
(13, 5),
(13, 6),
(14, 7),
(15, 7),
(16, 7),
(17, 8),
(18, 8),
(19, 9),
(19, 10),
(20, 9),
(21, 10),
(22, 10),
(23, 11),
(24, 11),
(25, 11),
(26, 12),
(27, 1),
(27, 12),
(28, 1),
(28, 12),
(29, 6),
(30, 7),
(31, 8),
(32, 10),
(33, 1),
(34, 2),
(35, 1),
(36, 4),
(37, 4),
(38, 5),
(39, 7),
(40, 4),
(41, 2),
(42, 10),
(43, 10),
(44, 4),
(45, 6),
(46, 6),
(47, 6),
(48, 5),
(49, 11),
(50, 7);

-- --------------------------------------------------------

--
-- Structure de la table `game_plateform`
--

CREATE TABLE `game_plateform` (
  `game_id` int(11) NOT NULL,
  `plateforme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `game_plateform`
--

INSERT INTO `game_plateform` (`game_id`, `plateforme_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(13, 1),
(17, 1),
(18, 1),
(20, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(9, 2),
(10, 2),
(11, 2),
(14, 2),
(15, 2),
(19, 2),
(21, 2),
(22, 2),
(37, 2),
(38, 2),
(39, 2),
(9, 3),
(50, 3),
(12, 4),
(45, 4),
(29, 6),
(30, 6),
(48, 6),
(23, 7),
(24, 7),
(25, 7),
(49, 7),
(26, 8),
(27, 8),
(28, 8),
(46, 9),
(47, 9),
(12, 9);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(10, 'Aventure'),
(2, 'Battle Royale'),
(7, 'Combat'),
(6, 'Course'),
(1, 'FPS'),
(9, 'Horreur'),
(3, 'MOBA'),
(11, 'Rétro'),
(4, 'RPG'),
(5, 'Sport'),
(8, 'Stratégie'),
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
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`id`, `reservation_id`, `amount`, `type`, `date`, `status`) VALUES
(1, 1, 135.00, 'credit_card', '2026-01-02 09:05:00', 'completed'),
(2, 2, 76.00, 'credit_card', '2026-01-03 10:05:00', 'completed'),
(3, 3, 44.00, 'cash', '2026-01-04 11:10:00', 'completed'),
(4, 4, 54.00, 'credit_card', '2026-01-05 12:05:00', 'completed'),
(5, 5, 135.00, 'credit_card', '2026-01-06 08:05:00', 'completed'),
(6, 6, 84.00, 'credit_card', '2026-01-07 14:10:00', 'completed'),
(7, 7, 70.00, 'cash', '2026-01-08 09:35:00', 'refunded'),
(8, 8, 60.00, 'credit_card', '2026-01-09 10:05:00', 'completed'),
(9, 9, 44.00, 'check', '2026-01-10 11:10:00', 'completed'),
(10, 10, 34.00, 'cash', '2026-01-11 09:05:00', 'completed'),
(11, 11, 135.00, 'credit_card', '2026-01-12 10:35:00', 'completed'),
(12, 12, 76.00, 'credit_card', '2026-01-13 08:05:00', 'completed'),
(13, 13, 90.00, 'credit_card', '2026-01-14 09:05:00', 'completed'),
(14, 14, 36.00, 'cash', '2026-01-15 12:05:00', 'completed'),
(15, 15, 84.00, 'credit_card', '2026-01-16 10:05:00', 'refunded'),
(16, 16, 60.00, 'check', '2026-01-17 11:05:00', 'completed'),
(17, 17, 44.00, 'credit_card', '2026-01-18 09:05:00', 'completed'),
(18, 18, 180.00, 'credit_card', '2026-01-19 10:05:00', 'completed'),
(19, 19, 34.00, 'cash', '2026-01-20 13:05:00', 'completed'),
(20, 20, 70.00, 'credit_card', '2026-01-21 14:05:00', 'completed'),
(21, 21, 76.00, 'credit_card', '2026-01-22 09:05:00', 'completed'),
(22, 22, 60.00, 'cash', '2026-01-23 10:05:00', 'completed'),
(23, 23, 84.00, 'credit_card', '2026-01-24 08:35:00', 'completed'),
(24, 24, 44.00, 'check', '2026-01-25 10:05:00', 'completed'),
(25, 25, 180.00, 'credit_card', '2026-01-26 09:05:00', 'completed'),
(26, 26, 60.00, 'credit_card', '2026-01-27 11:05:00', 'completed'),
(27, 27, 36.00, 'cash', '2026-01-28 12:05:00', 'refunded'),
(28, 28, 34.00, 'credit_card', '2026-01-29 10:05:00', 'completed'),
(29, 29, 70.00, 'credit_card', '2026-01-30 09:05:00', 'completed'),
(30, 30, 135.00, 'other', '2026-02-01 10:05:00', 'completed'),
(31, 31, 114.00, 'credit_card', '2026-02-02 09:05:00', 'completed'),
(32, 32, 44.00, 'cash', '2026-02-03 11:05:00', 'completed'),
(33, 33, 90.00, 'credit_card', '2026-02-04 10:05:00', 'completed'),
(34, 34, 84.00, 'credit_card', '2026-02-05 09:35:00', 'completed'),
(35, 35, 60.00, 'check', '2026-02-06 10:05:00', 'completed'),
(36, 36, 54.00, 'cash', '2026-02-07 11:05:00', 'refunded'),
(37, 37, 135.00, 'credit_card', '2026-02-08 09:05:00', 'completed'),
(38, 38, 34.00, 'credit_card', '2026-02-09 12:05:00', 'completed'),
(39, 39, 70.00, 'cash', '2026-02-10 10:05:00', 'completed'),
(40, 40, 114.00, 'credit_card', '2026-02-11 09:05:00', 'completed'),
(41, 41, 90.00, 'credit_card', '2026-02-12 11:05:00', 'completed'),
(42, 42, 84.00, 'credit_card', '2026-02-13 10:05:00', 'completed'),
(43, 43, 70.00, 'check', '2026-02-14 09:05:00', 'completed'),
(44, 44, 60.00, 'credit_card', '2026-02-15 10:05:00', 'completed'),
(45, 45, 135.00, 'credit_card', '2026-02-16 09:35:00', 'pending'),
(46, 46, 34.00, 'cash', '2026-02-17 11:05:00', 'completed'),
(47, 47, 54.00, 'credit_card', '2026-02-18 10:05:00', 'completed'),
(48, 48, 180.00, 'credit_card', '2026-02-19 08:05:00', 'completed'),
(49, 49, 60.00, 'credit_card', '2026-02-20 09:05:00', 'completed'),
(50, 50, 84.00, 'credit_card', '2026-02-21 10:05:00', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `plateform`
--

CREATE TABLE `plateform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plateform`
--

INSERT INTO `plateform` (`id`, `name`) VALUES
(7, 'Arcade'),
(6, 'Nintendo Switch'),
(1, 'PC'),
(3, 'PlayStation 4'),
(2, 'PlayStation 5'),
(10, 'Rétro (SNES/Mega Drive)'),
(9, 'Simulateur de course'),
(8, 'VR (Meta Quest 3)'),
(5, 'Xbox One'),
(4, 'Xbox Series X');

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
  `status` varchar(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `room_id`, `game_id`, `date_reservation`, `date_begin`, `date_end`, `nb_player`, `status`, `total_price`) VALUES
(1, 3, 4, 1, '2026-01-02 09:00:00', '2026-01-10 14:00:00', '2026-01-10 17:00:00', 10, 'completed', 135),
(2, 4, 5, 5, '2026-01-03 10:00:00', '2026-01-11 18:00:00', '2026-01-11 20:00:00', 6, 'completed', 76),
(3, 5, 8, 9, '2026-01-04 11:00:00', '2026-01-12 15:00:00', '2026-01-12 17:00:00', 4, 'confirmed', 44),
(4, 6, 9, 23, '2026-01-05 12:00:00', '2026-01-13 16:00:00', '2026-01-13 19:00:00', 8, 'completed', 54),
(5, 7, 4, 46, '2026-01-06 08:00:00', '2026-01-14 10:00:00', '2026-01-14 13:00:00', 2, 'completed', 135),
(6, 8, 6, 3, '2026-01-07 14:00:00', '2026-01-15 20:00:00', '2026-01-15 23:00:00', 12, 'completed', 84),
(7, 9, 7, 26, '2026-01-08 09:30:00', '2026-01-16 14:00:00', '2026-01-16 16:00:00', 3, 'cancelled', 70),
(8, 10, 11, 1, '2026-01-09 10:00:00', '2026-01-17 18:00:00', '2026-01-17 21:00:00', 6, 'completed', 60),
(9, 11, 8, 14, '2026-01-10 11:00:00', '2026-01-18 15:00:00', '2026-01-18 17:00:00', 2, 'confirmed', 44),
(10, 12, 12, 9, '2026-01-11 09:00:00', '2026-01-19 14:00:00', '2026-01-19 16:00:00', 4, 'completed', 34),
(11, 13, 4, 5, '2026-01-12 10:30:00', '2026-01-20 19:00:00', '2026-01-20 22:00:00', 10, 'completed', 135),
(12, 14, 5, 2, '2026-01-13 08:00:00', '2026-01-21 16:00:00', '2026-01-21 18:00:00', 8, 'confirmed', 76),
(13, 15, 10, 29, '2026-01-14 09:00:00', '2026-01-22 14:00:00', '2026-01-22 17:00:00', 4, 'completed', 90),
(14, 16, 9, 49, '2026-01-15 12:00:00', '2026-01-23 17:00:00', '2026-01-23 19:00:00', 6, 'completed', 36),
(15, 17, 6, 31, '2026-01-16 10:00:00', '2026-01-24 20:00:00', '2026-01-24 23:00:00', 10, 'cancelled', 84),
(16, 18, 11, 22, '2026-01-17 11:00:00', '2026-01-25 15:00:00', '2026-01-25 18:00:00', 2, 'completed', 60),
(17, 19, 8, 30, '2026-01-18 09:00:00', '2026-01-26 14:00:00', '2026-01-26 16:00:00', 4, 'confirmed', 44),
(18, 20, 4, 47, '2026-01-19 10:00:00', '2026-01-27 10:00:00', '2026-01-27 14:00:00', 1, 'completed', 180),
(19, 21, 12, 37, '2026-01-20 13:00:00', '2026-01-28 18:00:00', '2026-01-28 20:00:00', 3, 'completed', 34),
(20, 23, 7, 27, '2026-01-21 14:00:00', '2026-01-29 15:00:00', '2026-01-29 17:00:00', 2, 'completed', 70),
(21, 24, 5, 13, '2026-01-22 09:00:00', '2026-01-30 19:00:00', '2026-01-30 21:00:00', 6, 'confirmed', 76),
(22, 25, 10, 14, '2026-01-23 10:00:00', '2026-02-01 15:00:00', '2026-02-01 17:00:00', 2, 'completed', 60),
(23, 26, 6, 1, '2026-01-24 08:30:00', '2026-02-02 18:00:00', '2026-02-02 21:00:00', 14, 'completed', 84),
(24, 27, 8, 9, '2026-01-25 10:00:00', '2026-02-03 16:00:00', '2026-02-03 18:00:00', 4, 'confirmed', 44),
(25, 28, 4, 17, '2026-01-26 09:00:00', '2026-02-04 10:00:00', '2026-02-04 14:00:00', 10, 'completed', 180),
(26, 29, 11, 43, '2026-01-27 11:00:00', '2026-02-05 19:00:00', '2026-02-05 22:00:00', 1, 'completed', 60),
(27, 30, 9, 24, '2026-01-28 12:00:00', '2026-02-06 14:00:00', '2026-02-06 16:00:00', 10, 'cancelled', 36),
(28, 31, 12, 39, '2026-01-29 10:00:00', '2026-02-07 18:00:00', '2026-02-07 20:00:00', 2, 'completed', 34),
(29, 32, 7, 28, '2026-01-30 09:00:00', '2026-02-08 15:00:00', '2026-02-08 17:00:00', 1, 'confirmed', 70),
(30, 33, 4, 34, '2026-02-01 10:00:00', '2026-02-10 14:00:00', '2026-02-10 17:00:00', 30, 'completed', 135),
(31, 34, 5, 6, '2026-02-02 09:00:00', '2026-02-11 18:00:00', '2026-02-11 21:00:00', 10, 'completed', 114),
(32, 35, 8, 15, '2026-02-03 11:00:00', '2026-02-12 16:00:00', '2026-02-12 18:00:00', 2, 'confirmed', 44),
(33, 36, 10, 33, '2026-02-04 10:00:00', '2026-02-13 19:00:00', '2026-02-13 22:00:00', 10, 'completed', 90),
(34, 37, 6, 4, '2026-02-05 09:30:00', '2026-02-14 20:00:00', '2026-02-14 23:00:00', 16, 'completed', 84),
(35, 38, 11, 36, '2026-02-06 10:00:00', '2026-02-15 15:00:00', '2026-02-15 18:00:00', 1, 'completed', 60),
(36, 39, 9, 25, '2026-02-07 11:00:00', '2026-02-16 14:00:00', '2026-02-16 17:00:00', 10, 'cancelled', 54),
(37, 40, 4, 2, '2026-02-08 09:00:00', '2026-02-17 18:00:00', '2026-02-17 21:00:00', 10, 'completed', 135),
(38, 41, 12, 48, '2026-02-09 12:00:00', '2026-02-18 15:00:00', '2026-02-18 17:00:00', 4, 'confirmed', 34),
(39, 42, 7, 20, '2026-02-10 10:00:00', '2026-02-19 19:00:00', '2026-02-19 21:00:00', 4, 'completed', 70),
(40, 43, 5, 35, '2026-02-11 09:00:00', '2026-02-20 16:00:00', '2026-02-20 19:00:00', 10, 'completed', 114),
(41, 44, 10, 30, '2026-02-12 11:00:00', '2026-02-21 14:00:00', '2026-02-21 17:00:00', 8, 'confirmed', 90),
(42, 45, 6, 32, '2026-02-13 10:00:00', '2026-02-22 18:00:00', '2026-02-22 21:00:00', 10, 'completed', 84),
(43, 46, 8, 26, '2026-02-14 09:00:00', '2026-02-23 15:00:00', '2026-02-23 17:00:00', 4, 'completed', 70),
(44, 47, 11, 7, '2026-02-15 10:00:00', '2026-02-24 19:00:00', '2026-02-24 22:00:00', 1, 'completed', 60),
(45, 48, 4, 5, '2026-02-16 09:30:00', '2026-02-25 14:00:00', '2026-02-25 17:00:00', 10, 'pending', 135),
(46, 49, 12, 10, '2026-02-17 11:00:00', '2026-02-26 16:00:00', '2026-02-26 18:00:00', 6, 'confirmed', 34),
(47, 50, 9, 23, '2026-02-18 10:00:00', '2026-02-27 14:00:00', '2026-02-27 17:00:00', 10, 'completed', 54),
(48, 51, 4, 13, '2026-02-19 08:00:00', '2026-02-28 10:00:00', '2026-02-28 14:00:00', 6, 'completed', 180),
(49, 52, 10, 22, '2026-02-20 09:00:00', '2026-03-01 15:00:00', '2026-03-01 17:00:00', 2, 'completed', 60),
(50, 3, 6, 3, '2026-02-21 10:00:00', '2026-03-02 20:00:00', '2026-03-02 23:00:00', 15, 'pending', 84);

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
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`, `address`, `capacity`, `hourly_rate`, `description`, `status`) VALUES
(1, 'Alpha', '123 Anywhere Street', 6, 15.00, 'Salle cosy avec 2 TV 4K et canapés.', 'available'),
(2, 'Omega', '123 Anywhere St', 10, 20.00, '10 postes PC haute performance.', 'available'),
(4, 'ESpot Arena', '150 Rue de Rivoli, 75001 Paris', 50, 45.00, 'Salle e-sport profesionnelle face au Louvre, 20 PCs RTX 4090, écrans 240Hz, livestream setup.', 'available'),
(5, 'V.Hive Play', '12 Rue Saint-Merri, 75004 Paris', 24, 38.00, 'Espace Team Vitality : 24 stations PC haut de gamme, écran 130 pouces, régie son et lumière.', 'available'),
(6, 'eSportBox Sébasto', '31 Boulevard Sébastopol, 75001 Paris', 16, 28.00, 'Salles privatisables au cœur de Paris, 16 PCs, ambiance compétitive, idéal LAN party.', 'available'),
(7, 'BeGame VR Lounge', '3 Rue du Sergent Blandan, 93310 Le Pré-Saint-Gervais', 12, 35.00, 'Spécialiste VR et e-sport. Casques Meta Quest 3, simulateurs, PCs haut de gamme.', 'available'),
(8, '21 Street Gaming', '14 Avenue de Muret, 31300 Toulouse', 20, 22.00, 'Grande salle immersive à Toulouse : PS5, Xbox Series X, billard, baby-foot, bar inclus.', 'available'),
(9, 'Geek Room Arcade', '56 Rue des Bourguignons, 92600 Asnières-sur-Seine', 30, 18.00, 'Salle d\'arcade en freeplay : 45 machines, centaines de jeux rétro, ambiance pixel art.', 'available'),
(10, 'Maison de l\'Esport', '11 Rue Soleillet, 75020 Paris', 40, 30.00, 'Tiers-lieu parisien officiel dédié à l\'esport, arena 600m², régies techniques, consoles next-gen.', 'available'),
(11, 'GameRoom Lyon Sud', '2 Rue du Professeur Appleton, 69007 Lyon', 14, 20.00, 'Salle gaming à Lyon avec 8 PCs, 4 PS5, 2 Xbox Series X, ambiance néon cosy.', 'available'),
(12, 'NexusBox Bordeaux', '47 Cours d\'Alsace-et-Lorraine, 33000 Bordeaux', 10, 17.00, 'Petite salle premium à Bordeaux : PS5, Switch, décoration gaming rétro-futuriste.', 'available'),
(13, 'PixelHub Marseille', '9 Boulevard de Louvain, 13008 Marseille', 18, 19.00, 'Salle gaming en bord de mer : PCs gaming, PS5, ambiance lounge, boissons incluses.', 'maintenance');

-- --------------------------------------------------------

--
-- Structure de la table `room_game`
--

CREATE TABLE `room_game` (
  `room_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room_game`
--

INSERT INTO `room_game` (`room_id`, `game_id`) VALUES
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 13),
(4, 17),
(4, 33),
(4, 34),
(4, 35),
(4, 46),
(4, 47),
(5, 1),
(5, 2),
(5, 5),
(5, 6),
(5, 13),
(5, 17),
(5, 33),
(5, 35),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 31),
(6, 32),
(6, 40),
(6, 41),
(7, 26),
(7, 27),
(7, 28),
(7, 20),
(7, 7),
(7, 36),
(8, 9),
(8, 10),
(8, 14),
(8, 15),
(8, 22),
(8, 29),
(8, 30),
(8, 38),
(8, 48),
(9, 23),
(9, 24),
(9, 25),
(9, 49),
(9, 50),
(10, 1),
(10, 5),
(10, 9),
(10, 14),
(10, 26),
(10, 29),
(10, 30),
(10, 33),
(10, 34),
(11, 1),
(11, 9),
(11, 14),
(11, 21),
(11, 22),
(11, 29),
(11, 36),
(11, 43),
(12, 9),
(12, 10),
(12, 22),
(12, 29),
(12, 37),
(12, 39),
(12, 48),
(13, 9),
(13, 22),
(13, 29);

-- --------------------------------------------------------

--
-- Structure de la table `room_type_material`
--

CREATE TABLE `room_type_material` (
  `room_id` int(11) NOT NULL,
  `type_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room_type_material`
--

INSERT INTO `room_type_material` (`room_id`, `type_material_id`) VALUES
(4, 1),
(4, 6),
(4, 9),
(4, 10),
(4, 4),
(5, 1),
(5, 6),
(5, 9),
(6, 1),
(6, 6),
(7, 1),
(7, 3),
(7, 9),
(8, 2),
(8, 5),
(8, 7),
(8, 9),
(9, 8),
(9, 9),
(10, 1),
(10, 2),
(10, 5),
(10, 9),
(10, 10),
(11, 1),
(11, 2),
(11, 5),
(11, 7),
(12, 2),
(12, 5),
(12, 7),
(13, 1),
(13, 2),
(13, 5);

-- --------------------------------------------------------

--
-- Structure de la table `type_material`
--

CREATE TABLE `type_material` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_material`
--

INSERT INTO `type_material` (`id`, `name`) VALUES
(9, 'Barre de son'),
(8, 'Borne Arcade'),
(7, 'Canapé Gaming'),
(3, 'Casque VR'),
(2, 'Console'),
(6, 'Écran 240Hz'),
(1, 'PC Gaming'),
(10, 'Projecteur HD'),
(4, 'Siège Racing'),
(5, 'Télévision 4K');

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
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `last_name`, `age`, `password`, `role`, `registration_date`) VALUES
(1, 'j.bened@gmail.com', 'Julie', 'BENED', 15, '$2y$10$vM5X3uBf8vQ4Fj0Xv9mFTOfzB2RT2OpqH.awonfgtseJis1brDaPK', 'user', '2026-04-10 17:44:21'),
(2, 'j.benedd@gmail.com', 'Julie', 'BENED', 15, '$2y$10$sJWlWHEoenCPeIOt8oxyrOviSpDweH8dGRFBCOAEyWegGRBjnWiIy', 'user', '2026-04-10 17:46:37'),
(3, 'a.martin@gmail.com', 'Antoine', 'MARTIN', 28, '$2y$10$aAhashExample001aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-01 10:00:00'),
(4, 'c.dubois@hotmail.fr', 'Claire', 'DUBOIS', 34, '$2y$10$aAhashExample002aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-03 11:30:00'),
(5, 'l.bernard@gmail.com', 'Lucas', 'BERNARD', 22, '$2y$10$aAhashExample003aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-05 09:15:00'),
(6, 'm.thomas@yahoo.fr', 'Marie', 'THOMAS', 19, '$2y$10$aAhashExample004aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-07 14:00:00'),
(7, 'p.robert@gmail.com', 'Pierre', 'ROBERT', 45, '$2y$10$aAhashExample005aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-10 08:30:00'),
(8, 'e.richard@outlook.com', 'Emma', 'RICHARD', 25, '$2y$10$aAhashExample006aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-12 16:45:00'),
(9, 'n.petit@gmail.com', 'Nicolas', 'PETIT', 31, '$2y$10$aAhashExample007aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-14 12:00:00'),
(10, 'j.leroy@gmail.com', 'Julien', 'LEROY', 27, '$2y$10$aAhashExample008aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-16 10:20:00'),
(11, 's.moreau@hotmail.fr', 'Sophie', 'MOREAU', 23, '$2y$10$aAhashExample009aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-18 09:00:00'),
(12, 'r.simon@gmail.com', 'Romain', 'SIMON', 38, '$2y$10$aAhashExample010aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-20 17:30:00'),
(13, 'a.laurent@gmail.com', 'Alice', 'LAURENT', 21, '$2y$10$aAhashExample011aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-22 11:00:00'),
(14, 'k.lefebvre@yahoo.fr', 'Kevin', 'LEFEBVRE', 26, '$2y$10$aAhashExample012aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-24 15:00:00'),
(15, 'i.garcia@gmail.com', 'Inès', 'GARCIA', 29, '$2y$10$aAhashExample013aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-26 09:45:00'),
(16, 'b.martinez@outlook.com', 'Baptiste', 'MARTINEZ', 17, '$2y$10$aAhashExample014aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-09-28 13:00:00'),
(17, 'c.david@gmail.com', 'Chloé', 'DAVID', 33, '$2y$10$aAhashExample015aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-01 10:30:00'),
(18, 't.bertrand@hotmail.fr', 'Thomas', 'BERTRAND', 24, '$2y$10$aAhashExample016aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-03 14:20:00'),
(19, 'z.roux@gmail.com', 'Zoé', 'ROUX', 20, '$2y$10$aAhashExample017aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-05 11:00:00'),
(20, 'm.vincent@gmail.com', 'Maxime', 'VINCENT', 36, '$2y$10$aAhashExample018aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-07 09:00:00'),
(21, 'a.fournier@yahoo.fr', 'Anaïs', 'FOURNIER', 22, '$2y$10$aAhashExample019aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-09 16:00:00'),
(22, 'g.morel@gmail.com', 'Guillaume', 'MOREL', 40, '$2y$10$aAhashExample020aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'admin', '2025-10-11 08:00:00'),
(23, 'c.girard@outlook.com', 'Camille', 'GIRARD', 25, '$2y$10$aAhashExample021aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-13 10:00:00'),
(24, 'v.andre@gmail.com', 'Victor', 'ANDRE', 30, '$2y$10$aAhashExample022aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-15 13:45:00'),
(25, 'l.lefevre@hotmail.fr', 'Léa', 'LEFEVRE', 18, '$2y$10$aAhashExample023aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-17 12:00:00'),
(26, 'f.mercier@gmail.com', 'François', 'MERCIER', 50, '$2y$10$aAhashExample024aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-19 09:30:00'),
(27, 'j.dupont@gmail.com', 'Jade', 'DUPONT', 23, '$2y$10$aAhashExample025aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-21 15:00:00'),
(28, 'o.bonnet@yahoo.fr', 'Olivier', 'BONNET', 35, '$2y$10$aAhashExample026aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-23 11:30:00'),
(29, 'e.lambert@gmail.com', 'Eva', 'LAMBERT', 27, '$2y$10$aAhashExample027aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-25 14:00:00'),
(30, 's.fontaine@outlook.com', 'Simon', 'FONTAINE', 32, '$2y$10$aAhashExample028aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-27 09:00:00'),
(31, 'r.rousseau@gmail.com', 'Raphaël', 'ROUSSEAU', 19, '$2y$10$aAhashExample029aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-10-29 16:00:00'),
(32, 'n.blanc@hotmail.fr', 'Nina', 'BLANC', 26, '$2y$10$aAhashExample030aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-01 10:00:00'),
(33, 'q.guerin@gmail.com', 'Quentin', 'GUERIN', 22, '$2y$10$aAhashExample031aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-03 12:00:00'),
(34, 'a.chevalier@gmail.com', 'Alexia', 'CHEVALIER', 29, '$2y$10$aAhashExample032aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-05 09:00:00'),
(35, 'h.faure@yahoo.fr', 'Hugo', 'FAURE', 24, '$2y$10$aAhashExample033aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-07 14:30:00'),
(36, 'j.baudoin@gmail.com', 'Justine', 'BAUDOIN', 31, '$2y$10$aAhashExample034aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-09 11:00:00'),
(37, 'l.le-gall@hotmail.fr', 'Luc', 'LE GALL', 42, '$2y$10$aAhashExample035aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-11 08:45:00'),
(38, 'm.perrin@gmail.com', 'Mathilde', 'PERRIN', 21, '$2y$10$aAhashExample036aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-13 16:00:00'),
(39, 'c.renard@outlook.com', 'Clément', 'RENARD', 28, '$2y$10$aAhashExample037aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-15 10:00:00'),
(40, 's.morin@gmail.com', 'Sarah', 'MORIN', 35, '$2y$10$aAhashExample038aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-17 13:00:00'),
(41, 'a.bourgeois@yahoo.fr', 'Axel', 'BOURGEOIS', 20, '$2y$10$aAhashExample039aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-19 09:00:00'),
(42, 'l.caron@gmail.com', 'Laura', 'CARON', 25, '$2y$10$aAhashExample040aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-21 15:30:00'),
(43, 'f.picard@hotmail.fr', 'Florian', 'PICARD', 38, '$2y$10$aAhashExample041aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-23 11:00:00'),
(44, 'e.colin@gmail.com', 'Élise', 'COLIN', 23, '$2y$10$aAhashExample042aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-25 14:00:00'),
(45, 'a.henry@outlook.com', 'Adrien', 'HENRY', 30, '$2y$10$aAhashExample043aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-27 09:30:00'),
(46, 'j.garnier@gmail.com', 'Jeanne', 'GARNIER', 17, '$2y$10$aAhashExample044aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-11-29 16:00:00'),
(47, 'b.masse@yahoo.fr', 'Benjamin', 'MASSE', 33, '$2y$10$aAhashExample045aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-12-01 10:00:00'),
(48, 'c.bailly@gmail.com', 'Coralie', 'BAILLY', 27, '$2y$10$aAhashExample046aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-12-03 12:00:00'),
(49, 'r.pages@hotmail.fr', 'Rémi', 'PAGES', 22, '$2y$10$aAhashExample047aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-12-05 09:00:00'),
(50, 'v.adam@gmail.com', 'Victoria', 'ADAM', 29, '$2y$10$aAhashExample048aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-12-07 14:30:00'),
(51, 'n.gay@gmail.com', 'Nathan', 'GAY', 26, '$2y$10$aAhashExample049aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'admin', '2025-12-09 08:00:00'),
(52, 'o.maillard@yahoo.fr', 'Océane', 'MAILLARD', 24, '$2y$10$aAhashExample050aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user', '2025-12-11 11:00:00');

--
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `plateform`
--
ALTER TABLE `plateform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `type_material`
--
ALTER TABLE `type_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Contraintes pour les tables déchargées
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
