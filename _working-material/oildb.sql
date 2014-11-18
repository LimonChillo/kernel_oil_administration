-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Nov 2014 um 11:35
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
  `fillLevel` int(255) NOT NULL,
  `pressingFK` int(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `strainID` (`strainFK`),
  KEY `pressingFK` (`pressingFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38262 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bottle`
--

CREATE TABLE IF NOT EXISTS `bottle` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ml` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=456 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=700 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=423 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gen_firstnames`
--

CREATE TABLE IF NOT EXISTS `gen_firstnames` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=64 ;

--
-- Daten für Tabelle `gen_firstnames`
--

INSERT INTO `gen_firstnames` (`ID`, `firstname`) VALUES
(1, 'Bernhard'),
(2, 'Franz'),
(3, 'Frank'),
(4, 'Max'),
(5, 'Alexandra'),
(6, 'Martha'),
(7, 'Paula'),
(8, 'Paulina'),
(9, 'Viktoria'),
(10, 'Linda'),
(11, 'Eva'),
(12, 'Berta'),
(13, 'Franka'),
(14, 'Lisa'),
(15, 'Liselotte'),
(16, 'Gudrun'),
(17, 'Natalie'),
(18, 'Marion'),
(19, 'Anna'),
(20, 'Lena'),
(21, 'Julia'),
(22, 'Jaqueline'),
(23, 'Christina'),
(24, 'Sophie'),
(25, 'Melanie'),
(26, 'Stephanie'),
(27, 'Stefanie'),
(28, 'Jakob'),
(29, 'Andreas'),
(30, 'Michael'),
(31, 'Christian'),
(32, 'Julian'),
(33, 'Ivan'),
(34, 'Paul'),
(35, 'Peter'),
(36, 'Gandalf'),
(37, 'Harald'),
(38, 'Simon'),
(39, 'Marcel'),
(40, 'David'),
(41, 'Fabian'),
(42, 'Fabio'),
(43, 'Konstantin'),
(44, 'Wilhelm'),
(45, 'Gernot'),
(46, 'Ursula'),
(51, 'Charlotte'),
(52, 'Ilse'),
(53, 'Golda'),
(54, 'Annabelle'),
(55, 'Werner'),
(56, 'Marius'),
(57, 'Manfred'),
(59, 'Rüdiger'),
(62, 'Petra'),
(63, 'Sigrun');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gen_lastnames`
--

CREATE TABLE IF NOT EXISTS `gen_lastnames` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=151 ;

--
-- Daten für Tabelle `gen_lastnames`
--

INSERT INTO `gen_lastnames` (`ID`, `lastname`) VALUES
(1, 'Kranewitter'),
(2, 'Hintersonnleitner'),
(4, 'Hoffmann'),
(6, 'Leitner'),
(7, 'Tscherne'),
(8, 'Sögner'),
(9, 'Hartl'),
(10, 'Sattler'),
(11, 'Treiber'),
(12, 'Mösenbichler'),
(13, 'Höfner'),
(14, 'Rudek'),
(15, 'Steinwender'),
(16, 'Ebner'),
(17, 'Bammer'),
(18, 'Lettner'),
(19, 'Zotter'),
(20, 'Zangerle'),
(21, 'Poschacher'),
(22, 'Auer'),
(23, 'Müller'),
(24, 'Mayr'),
(25, 'Maier'),
(26, 'Huber'),
(27, 'Schröger'),
(28, 'Schultheis'),
(29, 'Zillner'),
(30, 'Haidinger'),
(31, 'Berger'),
(32, 'Grübl'),
(33, 'Bönnemann'),
(34, 'Schauer'),
(35, 'Wesenauer'),
(36, 'Richter'),
(37, 'eiter'),
(38, 'Bachleitner'),
(39, 'Meburger'),
(40, 'Zangerl'),
(41, 'Rittinger'),
(42, 'Reiter'),
(43, 'Rettner'),
(44, 'Graf'),
(45, 'Genner'),
(46, 'Sillner'),
(47, 'Walkner'),
(48, 'Sonnleitner'),
(49, 'Schönswetter'),
(50, 'Forsthuber'),
(51, 'Nindl'),
(52, 'Zahn'),
(53, 'Gassner'),
(54, 'Froschauer'),
(55, 'Überei'),
(56, 'Hauser'),
(57, 'Moik'),
(58, 'Gruber'),
(59, 'Schneider'),
(60, 'Schörghofer'),
(61, 'Armstorfer'),
(62, 'Nußbaumer'),
(63, 'Sturm'),
(64, 'Pföss'),
(65, 'Stieglbauer'),
(66, 'Moser'),
(67, 'Schmidt'),
(68, 'Steger'),
(69, 'Flock'),
(70, 'Freinbichler'),
(71, 'Stöckl'),
(72, 'Stockinger'),
(73, 'Sprinz'),
(74, 'Schwendinger'),
(75, 'Bauer'),
(76, 'Schober'),
(77, 'Kinleburg'),
(78, 'Kienast'),
(79, 'Leitl'),
(80, 'Goiginger'),
(81, 'Brandstätter'),
(82, 'Geier'),
(83, 'Wieser'),
(84, 'Eglseer'),
(85, 'Weingartner'),
(86, 'Bierfeld'),
(87, 'Bauernfeind'),
(88, 'Ausweger'),
(89, 'Raudschus'),
(90, 'Winter'),
(91, 'Sommer'),
(92, 'Roth'),
(93, 'Rothauer'),
(94, 'Foisner'),
(95, 'Brunner'),
(96, 'Schaffenrath'),
(97, 'Habersatter'),
(98, 'Schlager'),
(99, 'Stelzer'),
(100, 'Mayer'),
(101, 'Lienbacher'),
(102, 'Bacher'),
(103, 'Gatterbauer'),
(104, 'Wallner'),
(105, 'Pfeil'),
(106, 'Niedermüller'),
(107, 'Maislinger'),
(108, 'Luginger'),
(109, 'Luger'),
(110, 'Ortner'),
(111, 'Meißnitzer'),
(112, 'Marx'),
(113, 'Rettenbacher'),
(114, 'Rettenpacher'),
(115, 'Scherndl'),
(116, 'Löw'),
(117, 'Kohler'),
(118, 'Frauenhuber'),
(119, 'Frauenschuh'),
(120, 'Frauenlob'),
(121, 'Krall'),
(122, 'Holzinger'),
(123, 'Schmidinger'),
(124, 'Trehbuch'),
(125, 'Riedl'),
(126, 'Liegle'),
(127, 'Winkelmann'),
(128, 'Haas'),
(129, 'Strasser'),
(130, 'Kaschnitz'),
(131, 'Steinbauer'),
(132, 'Buschmann'),
(133, 'Dittlbacher'),
(134, 'Rohrmoser'),
(135, 'Vetter'),
(136, 'Reindl'),
(137, 'Höfinger'),
(138, 'Wild'),
(139, 'Fuchs'),
(140, 'Wolff'),
(141, 'Schöfegger'),
(142, 'Schatteiner'),
(143, 'Pacher'),
(144, 'Zwinger'),
(145, 'Lang'),
(146, 'Linhart'),
(147, 'Grall'),
(148, 'Pöschl'),
(149, 'Huck'),
(150, 'Braschel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `bottleFK` int(255) DEFAULT NULL,
  `strainFK` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `strainFK` (`strainFK`),
  KEY `bottleFK` (`bottleFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3577 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1814 ;

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
  `customerFK` int(255) DEFAULT NULL,
  `date` date NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=154 ;

--
-- Daten für Tabelle `strain`
--

INSERT INTO `strain` (`ID`, `name`) VALUES
(142, 'Chardonnay'),
(143, 'Sauvignon Blanc'),
(144, 'Merlot'),
(145, ' Grauburgunder'),
(146, 'Spätburgunder'),
(147, 'Gamay'),
(148, 'Chenin'),
(149, 'Riesling'),
(150, 'Grenache'),
(151, 'Grüner Veltliner'),
(152, 'Weißburgunder'),
(153, 'Welschriesling');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=66 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `is_admin`) VALUES
(1, 'wAndexer', 'abc', 'Wilfried@Andexer.at', 1);

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
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`bottleFK`) REFERENCES `bottle` (`ID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`ID`) REFERENCES `shipmentitem` (`productFK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `shipmentitem` (`shipmentFK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`customerFK`) REFERENCES `customer` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
