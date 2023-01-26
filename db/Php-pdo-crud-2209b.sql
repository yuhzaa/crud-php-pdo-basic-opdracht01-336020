-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 10 nov 2022 om 14:04
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Php-pdo-crud-2209B`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Persoon`
--

DROP TABLE IF EXISTS `Persoon`;
CREATE TABLE IF NOT EXISTS `Persoon` (
  `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(255) NOT NULL,
  `Tussenvoegsel` varchar(255) DEFAULT NULL,
  `Achternaam` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Persoon`
--

INSERT INTO `Persoon` (`ID`, `Voornaam`, `Tussenvoegsel`, `Achternaam`) VALUES
(1, 'Job', NULL, 'Schaap'),
(2, 'Wybren', NULL, 'Puister'),
(3, 'Jasper', NULL, 'Duijverman');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
