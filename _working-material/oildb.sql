-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Nov 2014 um 12:22
-- Server Version: 5.6.16
-- PHP-Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `oildb`
--
CREATE DATABASE IF NOT EXISTS `oildb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oildb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `barrel`
--

CREATE TABLE IF NOT EXISTS `barrel` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `strainFK` int(255) NOT NULL,
  `fillLevel` int(255) NOT NULL,
  `pressingFK` int(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `strainID` (`strainFK`),
  KEY `pressingFK` (`pressingFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=33 ;

--
-- Daten für Tabelle `barrel`
--

INSERT INTO `barrel` (`ID`, `strainFK`, `fillLevel`, `pressingFK`, `date`) VALUES
(1, 1, 100, 4, '2014-10-09'),
(2, 6, 100, NULL, '2014-09-20'),
(3, 6, 80, 2, '2014-11-06'),
(4, 5, 60, 1, '2014-10-02'),
(5, 5, 100, 1, '2014-10-20'),
(6, 5, 100, NULL, '2014-09-27'),
(7, 4, 100, 3, '2014-08-08'),
(8, 3, 75, NULL, '2014-11-11'),
(9, 2, 100, NULL, '2014-09-18'),
(10, 2, 100, 5, '2014-08-01'),
(11, 3, 100, NULL, '2014-09-11'),
(12, 6, 100, 2, '2014-11-06'),
(13, 3, 100, NULL, '2014-09-12'),
(14, 4, 100, 3, '2014-08-24'),
(15, 6, 100, NULL, '2014-09-18'),
(16, 2, 100, 5, '2014-09-13'),
(17, 6, 100, NULL, '2014-06-12'),
(18, 5, 100, NULL, '2013-08-07'),
(19, 5, 65, NULL, '2014-10-01'),
(20, 1, 100, 4, '2014-09-10'),
(21, 1, 40, NULL, '2014-06-17'),
(22, 1, 100, NULL, '2014-11-13'),
(23, 6, 100, NULL, '2014-08-23'),
(24, 4, 100, NULL, '2014-11-20'),
(25, 3, 85, NULL, '2014-09-18'),
(26, 5, 100, NULL, '2014-08-21'),
(27, 5, 100, NULL, '2014-08-22'),
(28, 4, 100, NULL, '2014-10-31'),
(29, 2, 100, NULL, '2014-09-11'),
(30, 3, 75, NULL, '2014-08-22'),
(31, 1, 100, NULL, '2014-08-22'),
(32, 4, 100, NULL, '2014-08-22');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bottle`
--

CREATE TABLE IF NOT EXISTS `bottle` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ml` int(255) NOT NULL,
  `amount` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `bottle`
--

INSERT INTO `bottle` (`ID`, `name`, `ml`, `amount`) VALUES
(1, '100ml', 100, 1865),
(2, '250ml', 250, 2906);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bottling`
--

CREATE TABLE IF NOT EXISTS `bottling` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `pressingFK` int(255) NOT NULL,
  `bottleFK` int(255) NOT NULL,
  `date` date NOT NULL,
  `amount` int(255) NOT NULL,
  `strainFK` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `bottleFK` (`bottleFK`),
  KEY `pressingFK` (`pressingFK`),
  KEY `strainFK` (`strainFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `bottling`
--

INSERT INTO `bottling` (`ID`, `pressingFK`, `bottleFK`, `date`, `amount`, `strainFK`) VALUES
(1, 1, 1, '2014-11-26', 85, 5),
(2, 1, 2, '2014-11-26', 34, 5),
(3, 2, 1, '2014-11-27', 50, 6),
(4, 2, 2, '2014-11-27', 60, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `company` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `road` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `country` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`ID`, `firstname`, `lastname`, `company`, `road`, `zip`, `city`, `country`) VALUES
(1, 'Ralf', 'Nadel', 'Monit', 'An Der Bundesstrasse 73', '8830', 'HINTERREITH', 'Österreich'),
(2, 'Sabrina', 'Köhler', 'Grossman''s', 'An Der Schütt 95', '3729', 'SCHAUMBERG', 'Österreich'),
(3, 'Doreen', 'Gruenewald', 'Crandall''s Fine Furniture', 'Sankt Georgener Hauptstrasse 50', '2874', 'UNTERGREITH', 'Österreich'),
(4, 'Michael', 'Wirth', 'Camelot Musik', 'Traunuferstrasse 93', '3862', 'BRUNNWIES', 'Österreich'),
(5, 'Eric', 'Fleischer', 'Kent''s', 'Ruster Strasse 94', '3872', 'PASSAIL', 'Österreich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `bottleFK` int(255) DEFAULT NULL,
  `strainFK` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `strainFK` (`strainFK`),
  KEY `bottleFK` (`bottleFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=41 ;

--
-- Daten für Tabelle `label`
--

INSERT INTO `label` (`ID`, `name`, `bottleFK`, `strainFK`, `amount`) VALUES
(13, '100ml Rücketikette', 1, 0, 865),
(14, '100ml Welschriesling', 1, 1, 1000),
(15, '100ml Muskateller', 1, 2, 66),
(16, '100ml Sauvignon Blanc', 1, 3, 1000),
(17, '100ml Chardonnay', 1, 4, 1000),
(18, '100ml Weißburgunder', 1, 5, 915),
(19, '100ml Sämling', 1, 6, 950),
(20, '250ml Rücketikette', 2, 0, 906),
(21, '250ml Welschriesling', 2, 1, 1000),
(22, '250ml Muskateller', 2, 2, 1000),
(23, '250ml Sauvignon Blanc', 2, 3, 1000),
(24, '250ml Chardonnay', 2, 4, 1000),
(25, '250ml Weißburgunder', 2, 5, 966),
(26, '250ml Sämling', 2, 6, 940);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pressing`
--

CREATE TABLE IF NOT EXISTS `pressing` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` int(255) NOT NULL,
  `bottled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `pressing`
--

INSERT INTO `pressing` (`ID`, `date`, `amount`, `bottled`) VALUES
(1, '2014-11-26', 17, 1),
(2, '2014-11-27', 20, 1),
(3, '2014-11-27', 12, 0),
(4, '2014-11-27', 205, 0),
(5, '2014-11-27', 189, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `strainFK` int(255) NOT NULL,
  `bottleFK` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `strainFK` (`strainFK`),
  KEY `bottleFK` (`bottleFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`ID`, `strainFK`, `bottleFK`, `amount`, `date`) VALUES
(1, 5, 1, 75, '2014-11-27 11:27:22'),
(2, 5, 2, 34, '2014-11-27 11:08:36'),
(3, 6, 1, 50, '2014-11-27 11:13:24'),
(4, 6, 2, 50, '2014-11-27 11:27:22');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `customerFK` int(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `customerFK` (`customerFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `shipment`
--

INSERT INTO `shipment` (`ID`, `customerFK`, `date`) VALUES
(2, 1, '2014-11-27');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shipmentitem`
--

CREATE TABLE IF NOT EXISTS `shipmentitem` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `productFK` int(255) NOT NULL,
  `shipmentFK` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `productFK` (`productFK`),
  KEY `shipmentFK` (`shipmentFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `shipmentitem`
--

INSERT INTO `shipmentitem` (`ID`, `productFK`, `shipmentFK`, `amount`) VALUES
(1, 1, 2, 10),
(2, 4, 2, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `strain`
--

CREATE TABLE IF NOT EXISTS `strain` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `strain`
--

INSERT INTO `strain` (`ID`, `name`) VALUES
(0, 'Rücketikette'),
(1, 'Welschriesling'),
(2, 'Muskateller'),
(3, 'Sauvignon Blanc'),
(4, 'Chardonnay'),
(5, 'Weißburgunder'),
(6, 'Sämling');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `admin`) VALUES
(1, 'admin', 'sql', 'wilfried@andexer.at', 1),
(2, 'bioebner', 'bio', 'ebner@bio.at', 0);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `barrel`
--
ALTER TABLE `barrel`
  ADD CONSTRAINT `barrel_ibfk_1` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`),
  ADD CONSTRAINT `barrel_ibfk_2` FOREIGN KEY (`pressingFK`) REFERENCES `pressing` (`ID`);

--
-- Constraints der Tabelle `bottling`
--
ALTER TABLE `bottling`
  ADD CONSTRAINT `bottling_ibfk_3` FOREIGN KEY (`pressingFK`) REFERENCES `pressing` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bottling_ibfk_4` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `bottling_ibfk_5` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `bottling_ibfk_7` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`) ON DELETE SET NULL;

--
-- Constraints der Tabelle `label`
--
ALTER TABLE `label`
  ADD CONSTRAINT `label_ibfk_2` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `label_ibfk_3` FOREIGN KEY (`bottleFK`) REFERENCES `bottle` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`bottleFK`) REFERENCES `bottle` (`ID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`customerFK`) REFERENCES `customer` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `shipmentitem`
--
ALTER TABLE `shipmentitem`
  ADD CONSTRAINT `shipmentitem_ibfk_1` FOREIGN KEY (`productFK`) REFERENCES `product` (`ID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipmentitem_ibfk_2` FOREIGN KEY (`shipmentFK`) REFERENCES `shipment` (`ID`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
