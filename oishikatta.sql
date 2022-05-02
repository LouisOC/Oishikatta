-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 avr. 2022 à 16:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `oishikatta`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `email`, `password`) VALUES
(1, 'Tran Louis', 'tranlouis@msn.com', 'tranlouis@msn.com1');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) DEFAULT NULL,
  `nom_image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `titre`, `nom_image`, `description`) VALUES
(1, 'Entrées', 'gyoza.jpg', 'Rien n\'est meilleur qu\'une mise en bouche pour commencer le voyage.'),
(2, 'Plats', 'ramen.jpg', 'Une multitude de plats pour vous faire planer au pays du soleil levant'),
(3, 'Desserts', 'mochi.jpg', 'Une petite douceur pour atterrir en toute tranquillité.');

-- --------------------------------------------------------

--
-- Structure de la table `horaires_ouverture`
--

DROP TABLE IF EXISTS `horaires_ouverture`;
CREATE TABLE IF NOT EXISTS `horaires_ouverture` (
  `Id_horaires_ouverture` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  `heure_ouverture` decimal(15,2) DEFAULT NULL,
  `heure_fermeture` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_horaires_ouverture`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaires_ouverture`
--

INSERT INTO `horaires_ouverture` (`Id_horaires_ouverture`, `nom`, `heure_ouverture`, `heure_fermeture`) VALUES
(1, 'Lundi', '12.00', '23.00'),
(2, 'Mardi', '12.00', '23.00'),
(3, 'Mercredi', '12.00', '23.00'),
(4, 'Jeudi', '12.00', '23.00'),
(5, 'Vendredi', '12.00', '23.00'),
(6, 'Samedi', '12.00', '23.00'),
(7, 'Dimanche', '12.00', '23.00');

-- --------------------------------------------------------

--
-- Structure de la table `kimono`
--

DROP TABLE IF EXISTS `kimono`;
CREATE TABLE IF NOT EXISTS `kimono` (
  `id_kimono` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `image_kimono` varchar(150) NOT NULL,
  PRIMARY KEY (`id_kimono`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kimono`
--

INSERT INTO `kimono` (`id_kimono`, `titre`, `image_kimono`) VALUES
(1, 'Kimono1', 'kimono1.jpg'),
(2, 'Kimono2', 'kimono2.jpg'),
(3, 'Kimono3', 'kimono3.jpg'),
(4, 'Kimono4', 'kimono4.jpg'),
(5, 'Kimono5', 'kimono5.jpg'),
(6, 'Kimono6', 'kimono6.jpg'),
(7, 'Kimono7', 'kimono7.jpg'),
(8, 'Kimono8', 'kimono8.jpg'),
(9, 'Kimono9', 'kimono9.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id_plat` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `description` text,
  `prix` decimal(5,2) NOT NULL,
  `image_plat` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_plat`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `titre`, `description`, `prix`, `image_plat`, `id_categorie`) VALUES
(1, 'Gyozas au poulet/végétarien', '3 raviolis japonais vapeurs faits maisons très fondants, au poulet ou végétarien. Accompagné de leur sauce au Yuzu', '5.00', 'gyoza.jpg', 1),
(2, 'Soupe Miso', 'Nous utilisons du miso blanc pour sa douceur, et du miso rouge pour son goût prononcé. ', '3.00', 'miso.jpg', 1),
(3, 'Karaage', 'Poulet frit à la japonaise. Mariné plusieurs heures dans du soja et du gingembre avant d\'être recouvert de chapelure japonaise \"panko\". Très très croustillant.', '6.00', 'karaage.jpg', 1),
(4, 'Shio Ramen - Bouillon de Poulet', 'Un ramen avec un bouillon de poulet délicat, léger et pas du tout gras. Avec 3 tranches de suprême de poulet bio et fermier mariné, des herbes fraîches et de l\'huile de sésame noir.', '10.50', 'ramen2.jpg', 2),
(5, 'Mochi', 'Mochi', '5.00', 'mochi', 3);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `Id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nom` char(150) DEFAULT NULL,
  `jour` varchar(50) DEFAULT NULL,
  `heure` varchar(50) DEFAULT NULL,
  `tel` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Id_reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Id_reservation`, `nombre`, `email`, `nom`, `jour`, `heure`, `tel`) VALUES
(2, 6, 'ibratvsenegal@free.fr', 'Ibrahim', '2022-04-21', '15h00', '612543210');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
