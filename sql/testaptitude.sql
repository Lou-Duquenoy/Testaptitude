-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 nov. 2021 à 22:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testaptitude`
--

-- --------------------------------------------------------

--
-- Structure de la table `password_recover`
--
CREATE DATABASE testaptitude;

USE testaptitude;

DROP TABLE IF EXISTS `password_recover`;
CREATE TABLE IF NOT EXISTS `password_recover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token_user` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `date_recover` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon_url` text NOT NULL,
  `poids` text NOT NULL,
  `prix` text NOT NULL,
  `date_de_peremption` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `icon_url`, `poids`, `prix`, `date_de_peremption`) VALUES
(1, 'greenbean.jpg', '80g', '3€', '2020-04-05'),
(2, 'fruit-paste.png', '20g', '2€', '2021-06-07'),
(3, 'chocolate.jpg', '30g', '8€', '2021-10-09'),
(4, 'salmon.jpg', '65g', '25€', '2021-09-07'),
(5, 'foiegras.jpg', '20g', '20€', '2021-12-12'),
(6, 'gnocchi.jpg', '10g', '2€', '2021-09-06'),
(7, 'monster-munch.jpg', '10g', '1€', '2021-04-06'),
(8, 'sirop-cerise.jpg', '10g', '1€', '2021-07-03'),
(9, 'cabillaud.jpg', '15g', '12€', '2022-09-15'),
(10, 'jambon.png', '5g', '2€', '2021-07-14');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_inscription` date DEFAULT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `ip`, `date_inscription`, `token`) VALUES
(1, 'Lou', 'lou.duquenoy@gmail.com', '07e1725076d669b421d2991c1c67f9dceb84631ca9c66c84cab7cfd9201344fc', '::1', NULL, ''),
(3, 'Lou', 'lou.duquenoy3@gmail.com', '07e1725076d669b421d2991c1c67f9dceb84631ca9c66c84cab7cfd9201344fc', '::1', NULL, '415c3c769a18f3c41810fde534053764c6c961efd0b76d12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
