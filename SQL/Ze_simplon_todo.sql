-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 13 Juin 2016 à 15:32
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Ze_simplon_todo`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID_CAT` int(5) NOT NULL AUTO_INCREMENT,
  `CATEGORIE` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_CAT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ID_CAT`, `CATEGORIE`) VALUES
(1, 'PHP');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `ID_TACHE` int(11) NOT NULL AUTO_INCREMENT,
  `TACHE` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DATE_PUBLICATION` date NOT NULL,
  `DATE_LIMITE` date NOT NULL,
  `CATEGORIE` int(11) NOT NULL,
  `PRIORITE` int(1) NOT NULL,
  PRIMARY KEY (`ID_TACHE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`ID_TACHE`, `TACHE`, `DESCRIPTION`, `DATE_PUBLICATION`, `DATE_LIMITE`, `CATEGORIE`, `PRIORITE`) VALUES
(1, 'Coder Ze Simplon Todo-List', 'CrÃ©ation de l''application', '2016-06-13', '2016-06-13', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
