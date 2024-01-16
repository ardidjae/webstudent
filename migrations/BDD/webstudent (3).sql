-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 16 jan. 2024 à 23:18
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webstudent`
--

-- --------------------------------------------------------

--
-- Structure de la table `baguette`
--

DROP TABLE IF EXISTS `baguette`;
CREATE TABLE IF NOT EXISTS `baguette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `baguette`
--

INSERT INTO `baguette` (`id`, `nom`, `taille`) VALUES
(1, 'Vigne', '27,3 centimètres'),
(2, 'Saule', '35,6 centimètres'),
(3, 'Sureau', '40 centimètres'),
(4, 'If', '34,3 centimètres'),
(5, 'Frêne', '25,4 centimètres'),
(6, 'D\'aubépine', '28 centimètres');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `nb_etudiants_max` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `code`, `libelle`, `nb_etudiants_max`) VALUES
(1, 'PLS', 'Parler la Langue des Serpents', '50'),
(2, 'PPC', 'Produire un Patronus Corporel', '30'),
(3, 'TPQ', 'Talent Pour le Quidditch', '100'),
(4, 'MSD', 'Maîtrise des Sortilèges de Défense', '80'),
(5, 'CEO', 'Compétence En Occlumancie', '20'),
(6, 'CEL', 'Capacité En Légilimancie', '40'),
(7, 'MDM', 'Maîtrise De la Métamorphose', '60'),
(8, 'ESP', 'Excellence en Sortilèges de Potions', '25'),
(9, 'MSC', 'Maîtrise des Sortilèges de Charme', '45'),
(10, 'CFM', 'Capacité à Former des amitiés Magiques', '75');

-- --------------------------------------------------------

--
-- Structure de la table `competence_etudiant`
--

DROP TABLE IF EXISTS `competence_etudiant`;
CREATE TABLE IF NOT EXISTS `competence_etudiant` (
  `competence_id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  PRIMARY KEY (`competence_id`,`etudiant_id`),
  KEY `IDX_AAD1A38A15761DAB` (`competence_id`),
  KEY `IDX_AAD1A38ADDEAB1A3` (`etudiant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence_etudiant`
--

INSERT INTO `competence_etudiant` (`competence_id`, `etudiant_id`) VALUES
(1, 2),
(1, 10),
(2, 2),
(2, 4),
(2, 10),
(3, 4),
(3, 5),
(4, 5),
(5, 6),
(6, 6),
(6, 7),
(7, 7),
(8, 8),
(9, 8),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Structure de la table `competence_professeur`
--

DROP TABLE IF EXISTS `competence_professeur`;
CREATE TABLE IF NOT EXISTS `competence_professeur` (
  `competence_id` int(11) NOT NULL,
  `professeur_id` int(11) NOT NULL,
  PRIMARY KEY (`competence_id`,`professeur_id`),
  KEY `IDX_3925EA6E15761DAB` (`competence_id`),
  KEY `IDX_3925EA6EBAB22EE9` (`professeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence_professeur`
--

INSERT INTO `competence_professeur` (`competence_id`, `professeur_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 3),
(6, 2),
(6, 3),
(7, 4),
(8, 2),
(9, 3),
(9, 4),
(10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231105133401', '2023-11-05 13:36:31', 16),
('DoctrineMigrations\\Version20231105135523', '2023-11-05 13:55:53', 11),
('DoctrineMigrations\\Version20231105141756', '2023-11-05 14:18:16', 10),
('DoctrineMigrations\\Version20231105141952', '2023-11-05 14:20:16', 38),
('DoctrineMigrations\\Version20231105151127', '2023-11-05 15:11:55', 9),
('DoctrineMigrations\\Version20231105151440', '2023-11-05 15:14:59', 8),
('DoctrineMigrations\\Version20231105151711', '2023-11-05 15:17:51', 39),
('DoctrineMigrations\\Version20231105152213', '2023-11-05 15:22:28', 8),
('DoctrineMigrations\\Version20231105152448', '2023-11-05 15:25:08', 35),
('DoctrineMigrations\\Version20231105152632', '2023-11-05 15:27:12', 35),
('DoctrineMigrations\\Version20231111071445', '2023-11-11 07:15:10', 61),
('DoctrineMigrations\\Version20231111071702', '2023-11-11 07:17:09', 68),
('DoctrineMigrations\\Version20231111075439', '2023-11-11 07:54:46', 9),
('DoctrineMigrations\\Version20231111080029', '2023-11-11 08:00:34', 52),
('DoctrineMigrations\\Version20231111085417', '2023-11-11 08:54:23', 40),
('DoctrineMigrations\\Version20231111164228', '2023-11-11 16:43:04', 18),
('DoctrineMigrations\\Version20231111170657', '2023-11-11 17:07:16', 11),
('DoctrineMigrations\\Version20231116201702', '2023-11-16 20:19:13', 76),
('DoctrineMigrations\\Version20231116210715', '2023-11-16 21:08:47', 51);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL,
  `ville` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `copos` varchar(5) NOT NULL,
  `surnom` varchar(50) NOT NULL,
  `maison_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `baguette_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_717E22E39D67D8AF` (`maison_id`),
  KEY `IDX_717E22E3139DF194` (`promotion_id`),
  KEY `IDX_717E22E3513FF34B` (`baguette_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `date_naiss`, `ville`, `rue`, `copos`, `surnom`, `maison_id`, `promotion_id`, `baguette_id`) VALUES
(2, 'Potter', 'Harry', '1980-07-31', 'Surrey', '4 Privet Drive', '50107', 'Le ballafré', 1, 2, 6),
(4, 'Hermione', 'Granger', '2023-10-05', 'Surrey', '8 rue Bao', '14000', 'Watson', 2, 1, 1),
(5, 'Ron', 'Weasley', '2023-09-01', 'Surrey', '54 rue Gala', '14000', 'Grint', 3, 1, 2),
(6, 'Lord', 'Voldemort', '2023-08-05', 'Surrey', '10 rue Fafa', '14000', 'Fiennes', 4, 1, 3),
(7, 'Severus', 'Rogue', '2023-07-01', 'Surrey', '15 rue Magnum', '14000', 'Rickman', 1, 1, 4),
(8, 'Minerva', 'McGonagall', '2023-06-03', 'Surrey', '20 rue Magnum', '14000', 'Smith', 2, 1, 5),
(9, 'Rubeuse', 'Hagride', '2023-05-05', 'Surrey', '20 rue Magnum', '14000', 'Coltrane', 3, 1, 6),
(10, 'Ginny', 'Weasley', '2023-04-01', 'Surrey', '20 rue Magnum', '14000', 'Wright', 4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id`, `code`, `nom`) VALUES
(1, 'GFD', 'Griffondor'),
(2, 'SPT', 'Serpentard '),
(3, 'PSF', 'Poufsouffle'),
(4, 'SDG', 'Serdaigle ');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `nb_eleves_max` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `libelle`, `nb_eleves_max`) VALUES
(1, 'Potions', ''),
(2, 'Sortilèges ', ''),
(3, 'Défense contre les forces du Mal', ''),
(4, 'Métamorphose ', ''),
(5, 'Astronomie ', ''),
(6, 'Histoire de la magie', ''),
(7, 'Soins aux créatures magiques', ''),
(8, 'Herbologie ', ''),
(9, 'Vol sur balai', ''),
(10, 'Divination ', '');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_note` date NOT NULL,
  `note` varchar(5) NOT NULL,
  `etudiant_id` int(11) DEFAULT NULL,
  `competence_id` int(11) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFBDFA14DDEAB1A3` (`etudiant_id`),
  KEY `IDX_CFBDFA1415761DAB` (`competence_id`),
  KEY `IDX_CFBDFA14F46CD258` (`matiere_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `date_note`, `note`, `etudiant_id`, `competence_id`, `matiere_id`) VALUES
(1, '2023-11-01', '15/20', 2, 1, 1),
(2, '2023-11-02', '20/20', 4, 2, 2),
(5, '2023-11-16', '20', 8, 8, 8),
(6, '2023-11-17', '18', 4, 6, 6),
(7, '2023-11-20', '15', 9, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom`, `prenom`, `date_naiss`) VALUES
(1, 'Dumbledore', 'Albus', '1881-08-01'),
(2, 'Snape', 'Severus', '1960-01-09'),
(3, 'Flitwick', 'Filius', '1958-08-01'),
(4, 'Sprout', 'Pomona', '1941-09-01');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `code`, `libelle`) VALUES
(1, 'A23', 'Promotion 2023'),
(2, 'A80', 'Promotion 1980');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `roles`, `is_verified`) VALUES
(12, 'dodo', 'dodo', 'dodo@gmail.com', '$2y$13$mMHxOJx9vBitsBJgIz.2PO6j.QSvoAsCK1os/ckDhkptRqrb8b/KS', '[\"ROLE_USER\"]', 0),
(14, 'soso', 'soso', 'soso@gmail.com', '$2y$13$7ySnD6TuiEePmo40J51/zOf8Ec9tQPuVI3PTDsHTOHUtbIlP45gb6', '[\"ROLE_PROFESSEUR\"]', 0),
(15, 'fafa', 'fafa', 'fafa@gmail.com', '$2y$13$YV7J3bWSfPTOldKytVsRkOLGTmw49SIULxqmpG6s9IS6qZw7xbgGW', '[\"ROLE_ADMIN\"]', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competence_etudiant`
--
ALTER TABLE `competence_etudiant`
  ADD CONSTRAINT `FK_AAD1A38A15761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AAD1A38ADDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `competence_professeur`
--
ALTER TABLE `competence_professeur`
  ADD CONSTRAINT `FK_3925EA6E15761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3925EA6EBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E3139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_717E22E3513FF34B` FOREIGN KEY (`baguette_id`) REFERENCES `baguette` (`id`),
  ADD CONSTRAINT `FK_717E22E39D67D8AF` FOREIGN KEY (`maison_id`) REFERENCES `maison` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1415761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14DDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
