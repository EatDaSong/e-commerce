-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 août 2018 à 15:01
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
(1, 'test', 'test', '2018-07-11 00:00:00', 10, 'teeshirt.jpg', 1),
(2, 'test', 'test', '2018-07-11 00:00:00', 0, 'je-peux-pas-j-ai-apero.jpg', 0),
(3, 'test', 'test', '2018-07-11 00:00:00', 0, 'telechargement.jpg', 0),
(5, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 0),
(6, 'test', 'test', '2018-07-11 00:00:00', 0, 'je-peux-pas-j-ai-apero.jpg', 0),
(7, 'test', 'test', '2018-07-11 00:00:00', 0, 'telechargement.jpg', 0),
(8, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 0),
(9, 'test', 'test', '2018-07-11 00:00:00', 0, 'je-peux-pas-j-ai-apero.jpg', 0),
(10, 'test', 'test', '2018-07-11 00:00:00', 0, 'telechargement.jpg', 0),
(11, 'test', 'test', '2018-07-11 00:00:00', 0, 'teeshirt.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `dispose_de`
--

DROP TABLE IF EXISTS `dispose_de`;
CREATE TABLE IF NOT EXISTS `dispose_de` (
  `id_dispose` int(11) NOT NULL AUTO_INCREMENT,
  `id_droits` int(11) NOT NULL,
  `id_membres` int(11) NOT NULL,
  PRIMARY KEY (`id_dispose`),
  KEY `id_droits` (`id_droits`),
  KEY `id_membres` (`id_membres`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id_droit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_droit`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id_droit`, `nom`, `description`) VALUES
(1, 'administrateur', 'Permet d\'administrer le site, modifier les articles et en ajouter'),
(2, 'membre', 'Permet d\'effectuer des achats et de visiter le site.');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `pays` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `url_avatar` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `mot_de_passe`, `nom`, `prenom`, `email`, `sexe`, `date_de_naissance`, `adresse`, `ville`, `code_postal`, `pays`, `url_avatar`, `admin`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'steph2608@gmai.com', '1', '1996-08-26', 'test', 'test', '13006', 'france', '', 0),
(4, 'testaze', '57ac27c6dc27bfabe19dd3135728ea51', 'testaze', 'testaze', 'steph2aze608@gmai.com', '1', '1996-08-26', 'testaze', 'testaze', '13006', 'france', '', 0),
(6, 'BouffeMaDub', '4c4fe97fa74afaae3eb34c4e85ac0daf', 'LAVIGNE', 'stÃ©phane', 'stephane.lavigne2608@gmail.com', '1', '1996-08-26', '49, rue des bons enfants', 'Marseille', '13006', 'france', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
