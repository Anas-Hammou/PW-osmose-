-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 nov. 2021 à 14:40
-- Version du serveur : 5.7.31
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_utilisateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `tel_user` int(11) NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `role_user` varchar(50) NOT NULL,
  `confirmation_key` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `tel_user`, `adresse_user`, `username`, `password_user`, `role_user`, `confirmation_key`, `confirme`) VALUES
(1, 'test', 'test', 'test@gmail.com', 12345678, 'Tunis', 'test', 'test', 'Administrateur', '86521005274785', 1),
(2, 'yoser', 'yoser', 'yoser@esprit.tn', 21543876, 'ariana', 'yoser', 'yoser', 'Utilisateur', '21390574971988', 1),
(3, 'ahmed', 'ahmed', 'ahmed@gmail.tn', 70250000, 'soukra', 'ahmed', 'ahmed', 'Utilisateur', '09007077663508', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
