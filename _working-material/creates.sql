-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Nov 2014 um 17:19
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `barrel`
--

CREATE TABLE IF NOT EXISTS `barrel` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `strainFK` int(255) NOT NULL,
  `fillLevel` int(255) DEFAULT NULL,
  `pressingFK` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `strainID` (`strainFK`),
  KEY `pressingFK` (`pressingFK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bottle`
--

CREATE TABLE IF NOT EXISTS `bottle` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bottling`
--

CREATE TABLE IF NOT EXISTS `bottling` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `pressingFK` int(255) NOT NULL,
  `bottleFK` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `strain_fk` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `bottleFK` (`bottleFK`),
  KEY `pressingFK` (`pressingFK`),
  KEY `strain_fk` (`strain_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `bottleFK` int(255) NOT NULL,
  `strainFK` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `bottleFK` (`bottleFK`),
  KEY `strainFK` (`strainFK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pressing`
--

CREATE TABLE IF NOT EXISTS `pressing` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `strainFK` int(255) NOT NULL,
  `bottleFK` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `bottleFK` (`bottleFK`),
  KEY `strainFK` (`strainFK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `customerFK` int(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `customerFK` (`customerFK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `strain`
--

CREATE TABLE IF NOT EXISTS `strain` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL,
  `username` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  ADD CONSTRAINT `bottling_ibfk_4` FOREIGN KEY (`strain_fk`) REFERENCES `strain` (`ID`),
  ADD CONSTRAINT `bottling_ibfk_2` FOREIGN KEY (`bottleFK`) REFERENCES `bottle` (`ID`),
  ADD CONSTRAINT `bottling_ibfk_3` FOREIGN KEY (`pressingFK`) REFERENCES `pressing` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `label`
--
ALTER TABLE `label`
  ADD CONSTRAINT `label_ibfk_1` FOREIGN KEY (`bottleFK`) REFERENCES `bottle` (`ID`),
  ADD CONSTRAINT `label_ibfk_2` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`);

--
-- Constraints der Tabelle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`bottleFK`) REFERENCES `bottle` (`ID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`);

--
-- Constraints der Tabelle `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`customerFK`) REFERENCES `customer` (`ID`);

--
-- Constraints der Tabelle `shipmentitem`
--
ALTER TABLE `shipmentitem`
  ADD CONSTRAINT `shipmentitem_ibfk_1` FOREIGN KEY (`productFK`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `shipmentitem_ibfk_2` FOREIGN KEY (`shipmentFK`) REFERENCES `shipment` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
