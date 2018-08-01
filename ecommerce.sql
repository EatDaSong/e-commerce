-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 août 2018 à 11:24
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `image` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `prix_htc` int(11) NOT NULL,
  `image_principale` varchar(500) NOT NULL,
  `categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `image`, `date`, `prix_htc`, `image_principale`, `categorie`) VALUES
(1, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 1),
(2, 'test', 'test', '2018-07-11 00:00:00', 0, 'je-peux-pas-j-ai-apero.jpg', 0),
(3, 'test', 'test', '2018-07-11 00:00:00', 0, 'telechargement.jpg', 0),
(5, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 0),
(6, 'test', 'test', '2018-07-11 00:00:00', 0, 'je-peux-pas-j-ai-apero.jpg', 0),
(7, 'test', 'test', '2018-07-11 00:00:00', 0, 'telechargement.jpg', 0),
(8, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 0),
(9, 'test', 'test', '2018-07-11 00:00:00', 0, 'je-peux-pas-j-ai-apero.jpg', 0),
(10, 'test', 'test', '2018-07-11 00:00:00', 0, 'telechargement.jpg', 0),
(11, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
