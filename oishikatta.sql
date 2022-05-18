-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 mai 2022 à 22:17
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `email`, `password`) VALUES
(27, 'Deathmask', 'deathmask@msn.com', '250e9b7fe781f28a8b0b0ac8a48563a4e4871300f4ac3cf18303d2f1c38fe85542e70497559dd8722fe140efdd21feee331674bff69811fcbf3e50ecebedb50a'),
(28, 'Tran Louis', 'tranlouis@msn.com', '46ad87aca583bee2e78ac07230e6ad0dd70beea0b3e4d0836cbc04facb0ecac76f39f9aa23839eefbb7fb82dc585c1c8ece337ce2a6e11268746521a731ea46a'),
(29, 'Son Goku', 'goku@msn.com', '93d2d64105b593fe258689ba932ad8b179b8f75efce784bd98cf8cd4cd92f5ba0d0a36db31411b27112f7bcd0605742da70f4d3320d552d8d6c994f1612f0784'),
(30, 'Vegeta', 'vegeta@msn.com', 'fe3eafbe213da56e4899944dd121bc5cb19eb9f323d9e9438693abbcf65e78bf0085fdabffdbc188e7116849bc11fcb1eaa1e5514e632da8a88b267d10b1aa53');

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
  `heure_ouverture` varchar(50) DEFAULT NULL,
  `heure_fermeture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_horaires_ouverture`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaires_ouverture`
--

INSERT INTO `horaires_ouverture` (`Id_horaires_ouverture`, `nom`, `heure_ouverture`, `heure_fermeture`) VALUES
(1, 'Lundi', '12h00', '22h00'),
(2, 'Mardi', '12h00', '22h00'),
(3, 'Mercredi', '12h00', '22h00'),
(4, 'Jeudi', '12h00', '22h00'),
(5, 'Vendredi', '12h00', '22h00'),
(6, 'Samedi', '12h00', '22h00'),
(7, 'Dimanche', '12h00', '22h00');

-- --------------------------------------------------------

--
-- Structure de la table `kimono`
--

DROP TABLE IF EXISTS `kimono`;
CREATE TABLE IF NOT EXISTS `kimono` (
  `id_kimono` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `image_kimono` text NOT NULL,
  PRIMARY KEY (`id_kimono`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kimono`
--

INSERT INTO `kimono` (`id_kimono`, `titre`, `image_kimono`) VALUES
(1, 'Kimono1', 'public\\kimonos\\kimono1.jpg'),
(2, 'Kimono2', 'public\\kimonos\\kimono2.jpg'),
(3, 'Kimono3', 'public\\kimonos\\kimono3.jpg'),
(4, 'Kimono4', 'public\\kimonos\\kimono4.jpg'),
(5, 'Kimono5', 'public\\kimonos\\kimono5.jpg'),
(6, 'Kimono6', 'public\\kimonos\\kimono6.jpg'),
(7, 'Kimono7', 'public\\kimonos\\kimono7.jpg'),
(8, 'Kimono8', 'public\\kimonos\\kimono8.jpg'),
(9, 'Kimono9', 'public\\kimonos\\kimono9.jpg');

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
  `image_plat` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_plat`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `titre`, `description`, `prix`, `image_plat`, `id_categorie`) VALUES
(1, 'Gyozas au poulet/v&eacute;g&eacute;tarien', '3 raviolis japonais vapeurs faits maisons tr&egrave;s fondants, au poulet ou v&eacute;g&eacute;tarien. Accompagn&eacute; de leur sauce au Yuzu', '5.00', 'public/images/plats/gyoza2.jpg', 1),
(2, 'Soupe Miso', 'Nous utilisons du miso blanc pour sa douceur, et du miso rouge pour son goût prononcé. ', '3.00', 'public/images/plats/miso.jpg', 1),
(3, 'Karaage', 'Poulet frit à la japonaise. Mariné plusieurs heures dans du soja et du gingembre avant d\'être recouvert de chapelure japonaise \"panko\". Très très croustillant.', '6.00', 'public/images/plats/karaage.jpg', 1),
(4, 'Shio Ramen - Bouillon de Poulet', 'Un ramen avec un bouillon de poulet délicat, léger et pas du tout gras. Avec 3 tranches de suprême de poulet bio et fermier mariné, des herbes fraîches et de l\'huile de sésame noir.', '10.50', 'public/images/plats/ramen2.jpg', 2),
(5, 'Mochi', 'Le mochi se d&eacute;finit par sa composition. C&#039;est une pr&eacute;paration &agrave; base de riz gluant, qui peut prendre diff&eacute;rentes formes, avant tout sucr&eacute;es et quelques fois sal&eacute;es. Le mochi peut &ecirc;tre fourr&eacute; avec une p&acirc;te de haricots rouges ou de la glace.', '5.00', 'public/images/plats/mochi', 3),
(12, 'Toridon', 'Le toridon est un mets de la cuisine japonaise qui consiste en un bol de riz chaud surmont&eacute; de Tori Katsu : une tranche de poulet d&#039;abord pan&eacute;e enrob&eacute;e de panko, puis cuite avec un &oelig;uf battu.', '15.00', 'public/images/uploads/1652909943380837427354543167.jpg', 2);

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
  `tel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id_reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Id_reservation`, `nombre`, `email`, `nom`, `jour`, `heure`, `tel`) VALUES
(19, 3, 'pikachu@msn.com', 'Pikachu', '2022-06-04', '15h00', '0632451230');

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
