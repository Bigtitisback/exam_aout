-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 août 2018 à 18:44
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `users`
--

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `race` varchar(64) CHARACTER SET utf8 NOT NULL,
  `job` varchar(64) CHARACTER SET utf8 NOT NULL,
  `strength` int(11) NOT NULL,
  `mana` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `owner` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `characters`
--

INSERT INTO `characters` (`id`, `name`, `race`, `job`, `strength`, `mana`, `agility`, `owner`) VALUES
(19, 'caca', 'human', 'warrior', 0, 0, 0, 'titi'),
(20, 'kikou', 'human', 'warrior', 0, 0, 0, 'titi'),
(16, 'blop', 'human', 'warrior', 0, 0, 0, 'titi'),
(21, 'floflo', 'werewolf', 'thief', 2, 6, 2, 'flo'),
(18, 'relou', 'human', 'warrior', 0, 0, 0, 'titi');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'titi', 'titouanmiart@gmail.com', '$2y$10$nXS0BmaVTscgEis5vxlI5eMlZgP.nkLXcS4Sr5KL8fnTcPJTRI.s.'),
(2, 'yoyo', 'fifou', '$2y$10$L6nHT/e7AlEat9NW119mqO7qM3BvPPXE2Rl.HqJZ7QRrgATLVjf4i'),
(3, 'flo', 'floflo@floflo.com', '$2y$10$D.1LLn2DfTfkRobC6X.B4O8X/y/WsJA1bNwsJOFLNpCZ3H3.mV05q'),
(5, 'floflo', 'ff', '$2y$10$JEWHYH4.xEz3nj1gNA7LK.ynHZjGM0miRoXcL0p4auDYe6fuTtOWa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
