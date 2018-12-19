-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 19 Décembre 2018 à 18:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `oclocktest`
--

-- --------------------------------------------------------

--
-- Structure de la table `stormtroopers`
--

CREATE TABLE IF NOT EXISTS `stormtroopers` (
  `Name` varchar(28) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Age` int(11) NOT NULL,
  `Origine` varchar(28) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Abilities` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_2` (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `stormtroopers`
--

INSERT INTO `stormtroopers` (`Name`, `ID`, `Age`, `Origine`, `Abilities`) VALUES
('Darth Vader', 1, 45, 'Tatooine', 'Armure mécanique, Hyper sensible à la force'),
('Obi-Wan Kenobi', 2, 51, 'Stewjon', 'Calme olympien'),
('Ben Solo', 3, 27, 'Chandrila', 'Jeune suprême leader');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
