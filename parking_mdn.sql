-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Août 2019 à 14:48
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parking_mdn`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnes`
--

CREATE TABLE `abonnes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `code` varchar(255) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abonnes`
--

INSERT INTO `abonnes` (`id`, `nom`, `prenom`, `telephone`, `email`, `date_debut`, `date_fin`, `code`, `statut`) VALUES
(34, 'Tarik', 'Taleb', '5454', 'jul@gla.com', '2019-03-01 09:29:32', '2019-09-01 09:29:32', '1764375167', 0),
(32, 'Kazi', 'Malik', '45454', 'ded@gmail.com', '2019-03-04 09:29:32', '2019-08-09 09:29:32', '112117190121', 0),
(33, 'Achraf', 'Bemrah', '58895895', 'vvv@gmail.com', '2019-03-04 09:29:32', '2019-09-01 09:29:32', '14510212847', 0),
(30, 'bengudihhh', 'Anouare', '6555', 'anouar@gmail.com', '2019-03-08 09:29:32', '2019-08-15 09:29:32', '1472118336', 0),
(31, 'Kazi', 'Salim', '626484', 'salim@jj.com', '2019-03-08 09:29:32', '2019-10-09 09:29:32', '217141207131', 0);

-- --------------------------------------------------------

--
-- Structure de la table `controleurs`
--

CREATE TABLE `controleurs` (
  `id` int(10) NOT NULL,
  `adresse_ip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `controleurs`
--

INSERT INTO `controleurs` (`id`, `adresse_ip`, `type`, `id_niveau`) VALUES
(1, '192.168.1.101', 'entrée', 6),
(4, '192.168.1.102', '5', 6),
(13, '192.168.1.109', 'sortie', 7),
(10, '192.168.1.55', 'E', 7),
(11, '192.168.1.54', 'E', 14),
(12, '192.168.1.108', 'S', 5);

-- --------------------------------------------------------

--
-- Structure de la table `ecran`
--

CREATE TABLE `ecran` (
  `ID` int(11) NOT NULL,
  `ID_NIVEAU` int(11) NOT NULL,
  `LIBELLE_ECRAN` varchar(255) NOT NULL,
  `ADRESSE_IP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecran`
--

INSERT INTO `ecran` (`ID`, `ID_NIVEAU`, `LIBELLE_ECRAN`, `ADRESSE_IP`) VALUES
(1, 3, 'PC01', '192.168.1.201'),
(2, 1, 'PC02', '192.168.1.202'),
(3, 7, 'PC03', '192.168.1.203'),
(4, 5, 'PC04', '192.168.1.204'),
(5, 2, 'PC05', '192.168.1.205'),
(6, 4, 'PC06', '192.168.1.206'),
(7, 10, 'PC07', '192.168.1.207'),
(8, 11, 'PC08', '192.168.1.208'),
(9, 12, 'PC09', '192.168.1.209'),
(10, 1, 'PC10', '192.168.1.210'),
(11, 9, 'PC11', '192.168.1.211'),
(12, 8, 'PC12', '192.168.1.212'),
(13, 6, 'PC13', '192.168.1.213'),
(14, 4, 'PC14', '192.168.1.214');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `ID` int(11) NOT NULL,
  `EMITEUR` varchar(255) NOT NULL,
  `COUNT` int(11) NOT NULL,
  `MESSAGE` varchar(255) NOT NULL,
  `DISPO_DESTINATION` int(11) NOT NULL,
  `DISPO_SOURCE` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`ID`, `EMITEUR`, `COUNT`, `MESSAGE`, `DISPO_DESTINATION`, `DISPO_SOURCE`, `DATE`) VALUES
(1, 'E3', 1, 'E;2;1;1;E3', 10, 7, '2019-02-12 10:47:59'),
(2, 'E3', 1, 'E;2;1;1;E3', 9, 8, '2019-03-04 12:00:17'),
(3, 'E3', 1, 'E;2;1;1;E3', 8, 9, '2019-03-04 12:00:25'),
(4, 'E3', 1, 'E;2;1;1;E3', 7, 10, '2019-03-04 12:00:27'),
(5, 'E3', 1, 'S;1;2;1;E3', 9, 8, '2019-03-04 12:02:52'),
(6, 'E3', 1, 'S;1;2;1;E3', 8, 9, '2019-03-04 12:02:54'),
(7, 'E3', 1, 'S;1;2;1;E3', 7, 10, '2019-03-04 12:02:56'),
(8, 'E3', 1, 'S;1;2;1;E3', 6, 11, '2019-03-04 12:02:57'),
(9, 'E3', 1, 'S;1;2;1;E3', 5, 12, '2019-03-04 12:02:57'),
(10, 'E3', 1, 'S;1;2;1;E3', 4, 13, '2019-03-04 12:02:57'),
(11, 'E3', 1, 'S;1;2;1;E3', 3, 14, '2019-03-04 12:02:57'),
(12, 'E3', 1, 'S;1;2;1;E3', 2, 15, '2019-03-04 12:02:58'),
(13, 'E3', 1, 'S;1;2;1;E3', 1, 16, '2019-03-04 12:02:58'),
(14, 'E3', 1, 'S;1;2;1;E3', 0, 17, '2019-03-04 12:02:58'),
(15, 'E3', 1, 'S;1;2;1;E3', -1, 18, '2019-03-04 12:02:58'),
(16, 'E3', 1, 'S;1;2;1;E3', -2, 19, '2019-03-04 12:02:58'),
(17, 'E3', 1, 'S;1;2;1;E3', -3, 20, '2019-03-04 12:02:58'),
(18, 'E3', 1, 'S;1;2;1;E3', -4, 21, '2019-03-04 12:03:02'),
(19, 'E3', 1, 'S;1;2;1;E3', -5, 22, '2019-03-04 12:03:02'),
(20, 'E3', 1, 'S;1;2;1;E3', -6, 23, '2019-03-04 12:03:02'),
(21, 'E3', 1, 'S;1;2;1;E3', -7, 24, '2019-03-04 12:03:02'),
(22, 'E3', 1, 'S;1;2;1;E3', -8, 25, '2019-03-04 12:03:02'),
(23, 'E3', 1, 'S;1;2;1;E3', -9, 26, '2019-03-04 12:03:02'),
(24, 'E3', 1, 'S;1;2;1;E3', -10, 27, '2019-03-04 12:03:05'),
(25, 'E3', 1, 'S;1;2;1;E3', -11, 28, '2019-03-04 12:03:05'),
(26, 'E3', 1, 'S;1;2;1;E3', -12, 29, '2019-03-04 12:03:10'),
(27, 'E3', 1, 'S;1;2;1;E3', -13, 30, '2019-03-04 12:03:10'),
(28, 'E3', 1, 'S;1;2;1;E3', -14, 31, '2019-03-04 12:03:10'),
(29, 'E3', 1, 'S;1;2;1;E3', -15, 32, '2019-03-04 12:03:11'),
(30, 'E3', 1, 'S;1;2;1;E3', -16, 33, '2019-03-04 12:03:11'),
(31, 'E3', 1, 'S;1;2;1;E3', -17, 34, '2019-03-04 12:03:11'),
(32, 'E3', 1, 'S;1;2;1;E3', -18, 35, '2019-03-04 12:03:11'),
(33, 'E3', 1, 'S;1;2;1;E3', -19, 36, '2019-03-04 12:03:11'),
(34, 'E3', 1, 'S;1;2;1;E3', -20, 37, '2019-03-04 12:03:11'),
(35, 'E3', 1, 'S;1;2;1;E3', -21, 38, '2019-03-04 12:03:12'),
(36, 'E3', 1, 'S;1;2;1;E3', -22, 39, '2019-03-04 12:16:21');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `date_scan` datetime NOT NULL,
  `type_scan` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `code`, `statut`, `date_scan`, `type_scan`) VALUES
(86, '14510212847', 1, '2019-08-13 16:00:23', 'entree'),
(85, '14510212847', 1, '2019-08-13 15:43:45', 'entree'),
(84, '14510212847', 1, '2019-08-07 16:36:19', 'entree'),
(83, '14510212847', 1, '2019-08-07 15:38:05', 'entree'),
(82, '14510212847', 1, '2019-08-07 15:36:41', 'entree'),
(81, '14510212847', 0, '2019-08-07 15:32:16', 'sortie'),
(80, '14510212847', 1, '2019-08-07 14:14:21', 'entree'),
(79, '14510212847', 1, '2019-08-07 14:03:12', 'entree'),
(78, '14510212847', 1, '2019-08-07 12:20:20', 'entree'),
(77, '14510212847', 1, '2019-08-07 12:08:25', 'entree'),
(76, '1764375167', 1, '2019-08-07 11:46:13', 'entree'),
(75, '1472118336', 1, '2019-08-07 11:45:38', 'entree'),
(74, '1472118336', 0, '2019-08-07 10:13:42', 'sortie'),
(73, '1472118336', 1, '2019-08-07 10:13:23', 'entree'),
(72, '1472118336', 0, '2019-08-07 10:13:17', 'sortie'),
(71, '1472118336', 0, '2019-08-07 10:12:20', 'sortie'),
(70, '1472118336', 1, '2019-08-07 10:09:03', 'entree'),
(93, '14510212847', 1, '2019-08-15 09:55:12', 'entree'),
(92, '14510212847', 1, '2019-08-15 09:49:29', 'entree'),
(91, '14510212847', 1, '2019-08-15 09:40:01', 'entree'),
(90, '14510212847', 1, '2019-08-15 09:38:41', 'entree'),
(89, '14510212847', 1, '2019-08-15 09:34:26', 'entree'),
(88, '14510212847', 1, '2019-08-15 09:31:19', 'entree'),
(87, '14510212847', 1, '2019-08-15 09:25:32', 'entree'),
(69, '1472118336', 1, '2019-08-07 10:05:11', 'entree'),
(68, '1472118336', 1, '2019-08-07 10:04:40', 'entree'),
(67, '1472118336', 1, '2019-08-07 10:01:03', 'entree'),
(94, '14510212847', 1, '2019-08-15 10:38:05', 'entree'),
(95, '14510212847', 1, '2019-08-15 10:56:14', 'entree'),
(96, '14510212847', 1, '2019-08-15 11:22:20', 'entree'),
(97, '14510212847', 1, '2019-08-15 11:26:35', 'entree'),
(98, '14510212847', 1, '2019-08-15 16:06:11', 'entree'),
(99, '14510212847', 1, '2019-08-18 14:12:58', 'entree'),
(100, '14510212847', 0, '2019-08-18 14:13:16', 'sortie'),
(101, '14510212847', 1, '2019-08-18 14:25:28', 'entree'),
(102, '14510212847', 1, '2019-08-18 14:38:35', 'entree');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `ID` int(11) NOT NULL,
  `LIBELLE_NIVEAU` varchar(255) NOT NULL,
  `NB_PLACES_MAX` int(11) NOT NULL,
  `NB_PLACES_DISPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`ID`, `LIBELLE_NIVEAU`, `NB_PLACES_MAX`, `NB_PLACES_DISPO`) VALUES
(0, 'ZONE 0', 7, 7),
(12, 'ZONE 1', 100, 100);

-- --------------------------------------------------------

--
-- Structure de la table `plageabonne`
--

CREATE TABLE `plageabonne` (
  `id` int(11) NOT NULL,
  `jour` int(1) NOT NULL,
  `heure_debut` time DEFAULT '00:00:00',
  `heure_fin` time DEFAULT '00:00:00',
  `acces` tinyint(1) NOT NULL,
  `id_abonne` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plageabonne`
--

INSERT INTO `plageabonne` (`id`, `jour`, `heure_debut`, `heure_fin`, `acces`, `id_abonne`) VALUES
(45, 5, '08:00:00', '17:00:00', 1, 25),
(44, 4, '08:00:00', '17:00:00', 1, 25),
(43, 3, '08:00:00', '17:00:00', 1, 25),
(42, 2, '08:00:00', '17:00:00', 1, 25),
(41, 1, '08:00:00', '17:00:00', 1, 25),
(40, 0, '00:00:00', '00:00:00', 0, 25),
(46, 6, '00:00:00', '00:00:00', 0, 25),
(47, 0, '00:00:00', '00:00:00', 0, 26),
(48, 1, '00:00:00', '00:00:00', 0, 26),
(49, 2, '00:00:00', '00:00:00', 0, 26),
(50, 3, '00:00:00', '00:00:00', 0, 26),
(51, 4, '00:00:00', '00:00:00', 0, 26),
(52, 5, '00:00:00', '00:00:00', 0, 26),
(53, 6, '00:00:00', '00:00:00', 1, 26),
(54, 0, '00:00:00', '00:00:00', 0, 27),
(55, 1, '00:00:00', '00:00:00', 0, 27),
(56, 2, '00:00:00', '00:00:00', 0, 27),
(57, 3, '00:00:00', '00:00:00', 0, 27),
(58, 4, '00:00:00', '00:00:00', 0, 27),
(59, 5, '00:00:00', '00:00:00', 0, 27),
(60, 6, '00:00:00', '00:00:00', 0, 27),
(61, 0, '00:00:00', '00:00:00', 0, 28),
(62, 1, '00:00:00', '00:00:00', 0, 28),
(63, 2, '00:00:00', '00:00:00', 0, 28),
(64, 3, '00:00:00', '00:00:00', 0, 28),
(65, 4, '00:00:00', '00:00:00', 0, 28),
(66, 5, '00:00:00', '00:00:00', 0, 28),
(67, 6, '12:00:00', '18:00:00', 1, 28),
(68, 0, '00:00:00', '00:00:00', 0, 29),
(69, 1, '00:00:00', '00:00:00', 0, 29),
(70, 2, '00:00:00', '00:00:00', 0, 29),
(71, 3, '00:00:00', '00:00:00', 0, 29),
(72, 4, '00:00:00', '00:00:00', 0, 29),
(73, 5, '00:00:00', '00:00:00', 0, 29),
(74, 6, '00:00:00', '00:00:00', 0, 29),
(75, 0, '08:00:00', '19:00:00', 0, 30),
(76, 1, '09:00:00', '17:00:00', 1, 30),
(77, 2, '13:00:00', '19:00:00', 1, 30),
(78, 3, '08:00:00', '19:00:00', 1, 30),
(79, 4, '08:00:00', '16:00:00', 1, 30),
(80, 5, '08:00:00', '20:00:00', 1, 30),
(81, 6, '15:00:00', '18:00:00', 1, 30),
(82, 0, '09:00:00', '17:00:00', 1, 31),
(83, 1, '09:00:00', '17:00:00', 1, 31),
(84, 2, '09:00:00', '17:00:00', 1, 31),
(85, 3, '09:00:00', '17:00:00', 1, 31),
(86, 4, '09:00:00', '17:00:00', 1, 31),
(87, 5, '00:00:00', '00:00:00', 0, 31),
(88, 6, '00:00:00', '00:00:00', 0, 31),
(89, 0, '08:00:00', '17:00:00', 1, 32),
(90, 1, '08:00:00', '13:00:00', 1, 32),
(91, 2, '08:00:00', '12:00:00', 1, 32),
(92, 3, '00:00:00', '00:00:00', 0, 32),
(93, 4, '00:00:00', '00:00:00', 0, 32),
(94, 5, '00:00:00', '00:00:00', 0, 32),
(95, 6, '00:00:00', '00:00:00', 0, 32),
(96, 0, '00:00:00', '00:00:00', 0, 33),
(97, 1, '00:00:00', '00:00:00', 0, 33),
(98, 2, '09:00:00', '17:00:00', 1, 33),
(99, 3, '09:00:00', '17:00:00', 1, 33),
(100, 4, '09:00:00', '17:00:00', 1, 33),
(101, 5, '00:00:00', '00:00:00', 0, 33),
(102, 6, '00:00:00', '00:00:00', 0, 33),
(103, 0, '00:00:00', '00:00:00', 0, 34),
(104, 1, '08:00:00', '17:00:00', 1, 34),
(105, 2, '08:00:00', '17:00:00', 1, 34),
(106, 3, '00:00:00', '00:00:00', 0, 34),
(107, 4, '00:00:00', '00:00:00', 0, 34),
(108, 5, '00:00:00', '00:00:00', 0, 34),
(109, 6, '00:00:00', '00:00:00', 0, 34),
(110, 0, '00:00:00', '00:00:00', 0, 35),
(111, 1, '08:00:00', '19:00:00', 1, 35),
(112, 2, '08:30:00', '18:00:00', 1, 35),
(113, 3, '09:00:00', '16:00:00', 1, 35),
(114, 4, '00:00:00', '00:00:00', 0, 35),
(115, 5, '00:00:00', '00:00:00', 0, 35),
(116, 6, '00:00:00', '00:00:00', 0, 35);

-- --------------------------------------------------------

--
-- Structure de la table `plagehoraire`
--

CREATE TABLE `plagehoraire` (
  `id` int(11) NOT NULL,
  `libelle_plage_horaire` varchar(255) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `tarif` int(11) NOT NULL,
  `excedant` tinyint(1) NOT NULL,
  `tarif_supp` int(11) DEFAULT NULL,
  `type_plage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `plagehoraire`
--

INSERT INTO `plagehoraire` (`id`, `libelle_plage_horaire`, `heure_debut`, `heure_fin`, `tarif`, `excedant`, `tarif_supp`, `type_plage`) VALUES
(13, 'plageExcdnt', '04:00:00', '24:00:00', 200, 1, 20, 'h'),
(9, 'plage1', '00:30:00', '01:00:00', 50, 0, 0, 'h'),
(8, 'plageGrat', '00:00:00', '00:00:00', 0, 0, 0, 'h'),
(11, 'plageJour', '00:00:00', '00:00:00', 500, 0, 0, 'j'),
(14, 'plage2', '01:00:00', '03:00:00', 100, 0, 0, 'h');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idProfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `telephone`, `email`, `login`, `password`, `idProfil`) VALUES
(1, 'Admin', 'Admin', '0777889966', 'admin@parking.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Benguedih', 'Anouar', '47848384', 'anouar@gmail.com', 'anouar', '00703c533952083c79ec80864b939599', 2);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date_entree` datetime NOT NULL,
  `date_sortie` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnes`
--
ALTER TABLE `abonnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `controleurs`
--
ALTER TABLE `controleurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecran`
--
ALTER TABLE `ecran`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `plageabonne`
--
ALTER TABLE `plageabonne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plagehoraire`
--
ALTER TABLE `plagehoraire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnes`
--
ALTER TABLE `abonnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `controleurs`
--
ALTER TABLE `controleurs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `ecran`
--
ALTER TABLE `ecran`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `plageabonne`
--
ALTER TABLE `plageabonne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT pour la table `plagehoraire`
--
ALTER TABLE `plagehoraire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
