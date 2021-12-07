-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 déc. 2021 à 07:21
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
-- Base de données : `cafet`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'LEGRAND', 'julien', 'julienlgd01@gmail.com'),
(2, 'kevin', 'debruyne', 'julien87@gmail.com'),
(3, 'benjamin', 'benhamou', 'benben@gmail.com'),
(4, 'luc', 'skywalker', 'skywy@gmail.com'),
(5, 'jul', 'jul', 'jul@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `produitduclient`
--

DROP TABLE IF EXISTS `produitduclient`;
CREATE TABLE IF NOT EXISTS `produitduclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_produits` (`id_produits`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `prix`, `image`) VALUES
(1, 'coca-cola', 9, '75097_canettes-coca-cola.jpg'),
(2, 'reb', 98, '47027_canettes-coca-cola.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produitduclient`
--
ALTER TABLE `produitduclient`
  ADD CONSTRAINT `produitduclient_ibfk_1` FOREIGN KEY (`id_produits`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `produitduclient_ibfk_2` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
