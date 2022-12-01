-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 nov. 2022 à 11:06
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
-- Base de données : `hopital_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

DROP TABLE IF EXISTS `motifs`;
CREATE TABLE IF NOT EXISTS `motifs` (
  `Code` int(11) NOT NULL AUTO_INCREMENT,
  `Libellé` text NOT NULL,
  PRIMARY KEY (`Code`),
  UNIQUE KEY `Code_motif` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motifs`
--

INSERT INTO `motifs` (`Code`, `Libellé`) VALUES
(1, 'Consultation libre'),
(2, 'Urgence'),
(3, 'Prescription');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `Code` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Sexe` varchar(1) NOT NULL,
  `Date Naissance` date DEFAULT NULL,
  `Numéro SécSoc` text,
  `Code Pays` varchar(2) NOT NULL,
  `Date 1° entrée` date DEFAULT NULL,
  `Code Motif` int(11) NOT NULL,
  PRIMARY KEY (`Code`),
  UNIQUE KEY `Code_patient` (`Code`),
  KEY `sexe` (`Sexe`),
  KEY `pays` (`Code Pays`),
  KEY `motif` (`Code Motif`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`Code`, `Nom`, `Prénom`, `Sexe`, `Date Naissance`, `Numéro SécSoc`, `Code Pays`, `Date 1° entrée`, `Code Motif`) VALUES
(1, 'SY', 'Omar', 'M', '1978-01-20', '178017830240455', 'FR', '2022-02-01', 1),
(2, 'DEPARDIEU', 'Gérard', 'M', '1948-12-27', '148127504406759', 'FR', '2022-04-05', 2),
(3, 'DUJARDIN', 'Jean', 'M', '1972-06-19', '172065903800855', 'FR', '2022-06-12', 3),
(4, 'RENO', 'Jean', 'M', '1948-07-30', '', 'MA', '2022-08-18', 1),
(5, 'COTILLARD', 'Marion', 'F', '1975-09-30', '275097503200542', 'FR', '2022-09-26', 1),
(6, 'CASSEL', 'Vincent', 'M', '1966-11-23', '166117500600711', 'FR', '2022-01-01', 3),
(7, 'GREEN ', 'Eva', 'F', '1980-06-17', '280067500400733', 'FR', '2022-11-15', 2),
(8, 'EFIRA', 'Virgine', 'F', '1977-05-05', '', 'BE', '2022-10-30', 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `Code` varchar(2) NOT NULL,
  `Libellé` text NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`Code`, `Libellé`) VALUES
('BE', 'Belgique'),
('DZ', 'Algérie'),
('FR', 'France'),
('MA', 'Maroc'),
('TN', 'Tunisie');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `Code` varchar(1) NOT NULL,
  `Libellé` text NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`Code`, `Libellé`) VALUES
('F', 'Féminin'),
('M', 'Masculin'),
('N', 'Ne se prononce pas');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `motif` FOREIGN KEY (`Code Motif`) REFERENCES `motifs` (`Code`),
  ADD CONSTRAINT `pays` FOREIGN KEY (`Code Pays`) REFERENCES `pays` (`Code`),
  ADD CONSTRAINT `sexe` FOREIGN KEY (`Sexe`) REFERENCES `sexe` (`Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
