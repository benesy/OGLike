-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 déc. 2019 à 13:42
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ogamelike`
--
CREATE DATABASE IF NOT EXISTS `ogamelike` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ogamelike`;

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE IF NOT EXISTS `building` (
  `id` int(11) NOT NULL,
  `resource` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL,
  `prod` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `building`
--

INSERT INTO `building` (`id`, `resource`, `name`, `lvl`, `prod`, `cost`) VALUES
(1, 0, 'Mine de Diament', 0, 0, 0),
(1, 0, 'Mine de Diament', 1, 1, 10),
(1, 0, 'Mine de Diament', 2, 2, 20),
(1, 0, 'Mine de Diament', 3, 4, 30),
(1, 0, 'Mine de Diament', 4, 8, 40),
(1, 0, 'Mine de Diament', 5, 16, 50);

-- --------------------------------------------------------

--
-- Structure de la table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `userId` int(11) NOT NULL,
  `lastUpdate` timestamp NOT NULL,
  `amount` int(11) NOT NULL,
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `resources`
--

INSERT INTO `resources` (`userId`, `lastUpdate`, `amount`) VALUES
(1, '2019-12-11 13:41:26', 1),
(2, '2019-12-11 13:41:59', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `pts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `pwd`, `pts`) VALUES
(1, 'player1', '912af0dff974604f1321254ca8ff38b6', 0),
(2, 'player2', '912af0dff974604f1321254ca8ff38b6', 0);

-- --------------------------------------------------------

--
-- Structure de la table `userbuildings`
--

DROP TABLE IF EXISTS `userbuildings`;
CREATE TABLE IF NOT EXISTS `userbuildings` (
  `userId` int(11) NOT NULL,
  `buildingId` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `userbuildings`
--

INSERT INTO `userbuildings` (`userId`, `buildingId`, `lvl`) VALUES
(1, 1, 1),
(1, 1, 1),
(2, 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
