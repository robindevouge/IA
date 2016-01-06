-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: robindevouge.be.mysql:3306
-- Generation Time: Jan 06, 2016 at 11:33 AM
-- Server version: 5.5.47-MariaDB-1~wheezy
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `robindevouge_be`
--

-- --------------------------------------------------------

--
-- Table structure for table `ia_dictionary`
--

CREATE TABLE IF NOT EXISTS `ia_dictionary` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ia_dictionary`
--

INSERT INTO `ia_dictionary` (`ID`, `word`, `answer`) VALUES
(1, 'hello', 'Je l''ai dit en premier !'),
(2, 'bonjour', 'Tu t''es pas foulé !'),
(3, 'coucou', 'Beuh !'),
(4, 'kedis', 'On est de la tribu à ce que je vois !'),
(5, 'kikou', 'Pitié pas ça !'),
(6, 'konami', 'Facile : &uarr; &uarr; &darr; &darr; &larr; &rarr; &larr; &rarr; B A'),
(7, 'salut', 'On s''est déjà croisé quelque part ?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
