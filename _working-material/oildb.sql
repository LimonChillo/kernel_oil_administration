-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Nov 2014 um 14:04
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39522 ;

--
-- Daten für Tabelle `barrel`
--

INSERT INTO `barrel` (`ID`, `strainFK`, `fillLevel`, `pressingFK`, `date`) VALUES
(39342, 142, 24008, 1886, '2014-11-18'),
(39343, 142, 50000, 1886, '2014-11-18'),
(39344, 142, 50000, 1886, '2014-11-18'),
(39345, 142, 25510, 1886, '2014-11-18'),
(39346, 142, 39507, 1886, '2014-11-18'),
(39347, 142, 50000, 1886, '2014-11-18'),
(39348, 142, 50000, 1886, '2014-11-18'),
(39349, 142, 50000, 1886, '2014-11-18'),
(39350, 142, 50000, 1886, '2014-11-18'),
(39351, 142, 50000, 1886, '2014-11-18'),
(39352, 142, 50000, 1886, '2014-11-18'),
(39353, 142, 20646, 1886, '2014-11-18'),
(39354, 142, 50000, 1886, '2014-11-18'),
(39355, 142, 50000, 1886, '2014-11-18'),
(39356, 142, 50000, 1886, '2014-11-18'),
(39357, 143, 42981, 1887, '2014-11-18'),
(39358, 143, 50000, 1887, '2014-11-18'),
(39359, 143, 48308, 1887, '2014-11-18'),
(39360, 143, 50000, 1887, '2014-11-18'),
(39361, 143, 50000, 1887, '2014-11-18'),
(39362, 143, 50000, 1887, '2014-11-18'),
(39363, 143, 50000, 1887, '2014-11-18'),
(39364, 143, 50000, 1887, '2014-11-18'),
(39365, 143, 44680, 1887, '2014-11-18'),
(39366, 143, 34028, 1887, '2014-11-18'),
(39367, 143, 50000, 1887, '2014-11-18'),
(39368, 143, 50000, 1887, '2014-11-18'),
(39369, 143, 50000, 1887, '2014-11-18'),
(39370, 143, 44839, 1887, '2014-11-18'),
(39371, 143, 20075, 1887, '2014-11-18'),
(39372, 144, 49639, 1888, '2014-11-18'),
(39373, 144, 50000, 1888, '2014-11-18'),
(39374, 144, 21118, 1888, '2014-11-18'),
(39375, 144, 50000, 1888, '2014-11-18'),
(39376, 144, 50000, 1888, '2014-11-18'),
(39377, 144, 50000, 1888, '2014-11-18'),
(39378, 144, 50000, 1888, '2014-11-18'),
(39379, 144, 50000, 1888, '2014-11-18'),
(39380, 144, 20009, 1888, '2014-11-18'),
(39381, 144, 50000, 1888, '2014-11-18'),
(39382, 144, 20083, 1888, '2014-11-18'),
(39383, 144, 36687, 1888, '2014-11-18'),
(39384, 144, 35273, 1888, '2014-11-18'),
(39385, 144, 50000, 1888, '2014-11-18'),
(39386, 144, 50000, 1888, '2014-11-18'),
(39387, 145, 49411, 1889, '2014-11-18'),
(39388, 145, 50000, 1889, '2014-11-18'),
(39389, 145, 50000, 1889, '2014-11-18'),
(39390, 145, 50000, 1889, '2014-11-18'),
(39391, 145, 48230, 1889, '2014-11-18'),
(39392, 145, 23457, 1889, '2014-11-18'),
(39393, 145, 50000, 1889, '2014-11-18'),
(39394, 145, 47046, 1889, '2014-11-18'),
(39395, 145, 50000, 1889, '2014-11-18'),
(39396, 145, 50000, 1889, '2014-11-18'),
(39397, 145, 45227, 1889, '2014-11-18'),
(39398, 145, 50000, 1889, '2014-11-18'),
(39399, 145, 34148, 1889, '2014-11-18'),
(39400, 145, 50000, 1889, '2014-11-18'),
(39401, 145, 50000, 1889, '2014-11-18'),
(39402, 146, 50000, 1890, '2014-11-18'),
(39403, 146, 50000, 1890, '2014-11-18'),
(39404, 146, 50000, 1890, '2014-11-18'),
(39405, 146, 23801, 1890, '2014-11-18'),
(39406, 146, 48227, 1890, '2014-11-18'),
(39407, 146, 50000, 1890, '2014-11-18'),
(39408, 146, 50000, 1890, '2014-11-18'),
(39409, 146, 50000, 1890, '2014-11-18'),
(39410, 146, 50000, 1890, '2014-11-18'),
(39411, 146, 46228, 1890, '2014-11-18'),
(39412, 146, 50000, 1890, '2014-11-18'),
(39413, 146, 50000, 1890, '2014-11-18'),
(39414, 146, 50000, 1890, '2014-11-18'),
(39415, 146, 50000, 1890, '2014-11-18'),
(39416, 146, 29257, 1890, '2014-11-18'),
(39417, 147, 50000, 1891, '2014-11-18'),
(39418, 147, 50000, 1891, '2014-11-18'),
(39419, 147, 50000, 1891, '2014-11-18'),
(39420, 147, 50000, 1891, '2014-11-18'),
(39421, 147, 39074, 1891, '2014-11-18'),
(39422, 147, 50000, 1891, '2014-11-18'),
(39423, 147, 38152, 1891, '2014-11-18'),
(39424, 147, 50000, 1891, '2014-11-18'),
(39425, 147, 38752, 1891, '2014-11-18'),
(39426, 147, 50000, 1891, '2014-11-18'),
(39427, 147, 50000, 1891, '2014-11-18'),
(39428, 147, 36611, 1891, '2014-11-18'),
(39429, 147, 35774, 1891, '2014-11-18'),
(39430, 147, 23247, 1891, '2014-11-18'),
(39431, 147, 41570, 1891, '2014-11-18'),
(39432, 148, 50000, 1892, '2014-11-18'),
(39433, 148, 27639, 1892, '2014-11-18'),
(39434, 148, 50000, 1892, '2014-11-18'),
(39435, 148, 50000, 1892, '2014-11-18'),
(39436, 148, 45107, 1892, '2014-11-18'),
(39437, 148, 50000, 1892, '2014-11-18'),
(39438, 148, 25336, 1892, '2014-11-18'),
(39439, 148, 50000, 1892, '2014-11-18'),
(39440, 148, 36933, 1892, '2014-11-18'),
(39441, 148, 25900, 1892, '2014-11-18'),
(39442, 148, 42085, 1892, '2014-11-18'),
(39443, 148, 50000, 1892, '2014-11-18'),
(39444, 148, 50000, 1892, '2014-11-18'),
(39445, 148, 50000, 1892, '2014-11-18'),
(39446, 148, 39301, 1892, '2014-11-18'),
(39447, 149, 50000, 1893, '2014-11-18'),
(39448, 149, 50000, 1893, '2014-11-18'),
(39449, 149, 50000, 1893, '2014-11-18'),
(39450, 149, 50000, 1893, '2014-11-18'),
(39451, 149, 21755, 1893, '2014-11-18'),
(39452, 149, 50000, 1893, '2014-11-18'),
(39453, 149, 50000, 1893, '2014-11-18'),
(39454, 149, 45141, 1893, '2014-11-18'),
(39455, 149, 50000, 1893, '2014-11-18'),
(39456, 149, 50000, 1893, '2014-11-18'),
(39457, 149, 50000, 1893, '2014-11-18'),
(39458, 149, 28764, 1893, '2014-11-18'),
(39459, 149, 50000, 1893, '2014-11-18'),
(39460, 149, 50000, 1893, '2014-11-18'),
(39461, 149, 50000, 1893, '2014-11-18'),
(39462, 150, 22856, 1894, '2014-11-18'),
(39463, 150, 38991, 1894, '2014-11-18'),
(39464, 150, 50000, 1894, '2014-11-18'),
(39465, 150, 36936, 1894, '2014-11-18'),
(39466, 150, 50000, 1894, '2014-11-18'),
(39467, 150, 50000, 1894, '2014-11-18'),
(39468, 150, 47842, 1894, '2014-11-18'),
(39469, 150, 50000, 1894, '2014-11-18'),
(39470, 150, 32446, 1894, '2014-11-18'),
(39471, 150, 50000, 1894, '2014-11-18'),
(39472, 150, 23418, 1894, '2014-11-18'),
(39473, 150, 32697, 1894, '2014-11-18'),
(39474, 150, 22944, 1894, '2014-11-18'),
(39475, 150, 43572, 1894, '2014-11-18'),
(39476, 150, 20712, 1894, '2014-11-18'),
(39477, 151, 42844, 1895, '2014-11-18'),
(39478, 151, 50000, 1895, '2014-11-18'),
(39479, 151, 50000, 1895, '2014-11-18'),
(39480, 151, 27226, 1895, '2014-11-18'),
(39481, 151, 50000, 1895, '2014-11-18'),
(39482, 151, 50000, 1895, '2014-11-18'),
(39483, 151, 32927, 1895, '2014-11-18'),
(39484, 151, 50000, 1895, '2014-11-18'),
(39485, 151, 50000, 1895, '2014-11-18'),
(39486, 151, 50000, 1895, '2014-11-18'),
(39487, 151, 50000, 1895, '2014-11-18'),
(39488, 151, 50000, 1895, '2014-11-18'),
(39489, 151, 50000, 1895, '2014-11-18'),
(39490, 151, 24624, 1895, '2014-11-18'),
(39491, 151, 50000, 1895, '2014-11-18'),
(39492, 152, 50000, 1896, '2014-11-18'),
(39493, 152, 50000, 1896, '2014-11-18'),
(39494, 152, 50000, 1896, '2014-11-18'),
(39495, 152, 26413, 1896, '2014-11-18'),
(39496, 152, 50000, 1896, '2014-11-18'),
(39497, 152, 36233, 1896, '2014-11-18'),
(39498, 152, 38276, 1896, '2014-11-18'),
(39499, 152, 24763, 1896, '2014-11-18'),
(39500, 152, 50000, 1896, '2014-11-18'),
(39501, 152, 50000, 1896, '2014-11-18'),
(39502, 152, 50000, 1896, '2014-11-18'),
(39503, 152, 50000, 1896, '2014-11-18'),
(39504, 152, 39902, 1896, '2014-11-18'),
(39505, 152, 29494, 1896, '2014-11-18'),
(39506, 152, 33803, 1896, '2014-11-18'),
(39507, 153, 50000, 1897, '2014-11-18'),
(39508, 153, 50000, 1897, '2014-11-18'),
(39509, 153, 50000, 1897, '2014-11-18'),
(39510, 153, 50000, 1897, '2014-11-18'),
(39511, 153, 26374, 1897, '2014-11-18'),
(39512, 153, 31211, 1897, '2014-11-18'),
(39513, 153, 50000, 1897, '2014-11-18'),
(39514, 153, 50000, 1897, '2014-11-18'),
(39515, 153, 34099, 1897, '2014-11-18'),
(39516, 153, 50000, 1897, '2014-11-18'),
(39517, 153, 50000, 1897, '2014-11-18'),
(39518, 153, 39360, 1897, '2014-11-18'),
(39519, 153, 27917, 1897, '2014-11-18'),
(39520, 153, 49394, 1897, '2014-11-18'),
(39521, 153, 44143, 1897, '2014-11-18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=472 ;

--
-- Daten für Tabelle `bottle`
--

INSERT INTO `bottle` (`ID`, `name`, `ml`, `amount`) VALUES
(470, '100mlml', 100, 200),
(471, '250mlml', 250, 200);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=776 ;

--
-- Daten für Tabelle `bottling`
--

INSERT INTO `bottling` (`ID`, `pressingFK`, `bottleFK`, `date`, `amount`, `strainFK`) VALUES
(752, 1886, 471, '2014-11-18', 329750, NULL),
(753, 1886, 470, '2014-11-18', 329900, NULL),
(754, 1887, 471, '2014-11-18', 342250, NULL),
(755, 1887, 470, '2014-11-18', 342600, NULL),
(756, 1888, 471, '2014-11-18', 316250, NULL),
(757, 1888, 470, '2014-11-18', 316500, NULL),
(758, 1889, 471, '2014-11-18', 348750, NULL),
(759, 1889, 470, '2014-11-18', 348700, NULL),
(760, 1890, 471, '2014-11-18', 348750, NULL),
(761, 1890, 470, '2014-11-18', 348700, NULL),
(762, 1891, 471, '2014-11-18', 326500, NULL),
(763, 1891, 470, '2014-11-18', 326600, NULL),
(764, 1892, 471, '2014-11-18', 321000, NULL),
(765, 1892, 470, '2014-11-18', 321300, NULL),
(766, 1893, 471, '2014-11-18', 347750, NULL),
(767, 1893, 470, '2014-11-18', 347900, NULL),
(768, 1894, 471, '2014-11-18', 286000, NULL),
(769, 1894, 470, '2014-11-18', 286400, NULL),
(770, 1895, 471, '2014-11-18', 338750, NULL),
(771, 1895, 470, '2014-11-18', 338800, NULL),
(772, 1896, 471, '2014-11-18', 314250, NULL),
(773, 1896, 470, '2014-11-18', 314600, NULL),
(774, 1897, 471, '2014-11-18', 326000, NULL),
(775, 1897, 470, '2014-11-18', 326400, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=453 ;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`ID`, `firstname`, `lastname`, `company`, `road`, `zip`, `city`, `country`) VALUES
(443, 'Jaqueline', 'Bierfeld', NULL, 'Christina-Ebner-Gasse 160', '7000', 'Eisenstadt', 'Österreich'),
(444, 'Max', 'Mayr', NULL, 'Andreas-Wieser-Weg 92', '9020', 'Klagenfurt', 'Österreich'),
(445, 'Charlotte', 'Zwinger', NULL, 'Marcel-Scherndl-Allee 60', '9020', 'Klagenfurt', 'Österreich'),
(446, 'Lisa', 'Bierfeld', NULL, 'David-Rettenbacher-Gasse 40', '6900', 'Bregenz', 'Österreich'),
(447, 'Gudrun', 'Sprinz', NULL, 'Gandalf-Höfner-Gasse 36', '3100', 'St.Pölten', 'Österreich'),
(448, 'Stefanie', 'Rettner', NULL, 'Jaqueline-Frauenlob-Allee 88', '8011', 'Graz', 'Österreich'),
(449, 'David', 'Eglseer', NULL, 'Simon-Marx-Weg 133', '6900', 'Bregenz', 'Österreich'),
(450, 'Ursula', 'Armstorfer', NULL, 'Peter-Wesenauer-Straße 73', '5020', 'Salzburg', 'Österreich'),
(451, 'Franka', 'Riedl', NULL, 'Frank-Moser-Weg 145', '4010', 'Linz', 'Österreich'),
(452, 'Fabian', 'Maier', NULL, 'Harald-Sturm-Weg 154', '8011', 'Graz', 'Österreich');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3761 ;

--
-- Daten für Tabelle `label`
--

INSERT INTO `label` (`ID`, `name`, `bottleFK`, `strainFK`, `amount`) VALUES
(3735, 'Rückettikett 100mlml', 470, NULL, 0),
(3736, 'Rückettikett 250mlml', 471, NULL, 0),
(3737, '100mlml Chardonnay', 470, 142, 200),
(3738, '250mlml Chardonnay', 471, 142, 200),
(3739, '100mlml Sauvignon Blanc', 470, 143, 200),
(3740, '250mlml Sauvignon Blanc', 471, 143, 200),
(3741, '100mlml Merlot', 470, 144, 200),
(3742, '250mlml Merlot', 471, 144, 200),
(3743, '100mlml  Grauburgunder', 470, 145, 200),
(3744, '250mlml  Grauburgunder', 471, 145, 200),
(3745, '100mlml Spätburgunder', 470, 146, 200),
(3746, '250mlml Spätburgunder', 471, 146, 200),
(3747, '100mlml Gamay', 470, 147, 200),
(3748, '250mlml Gamay', 471, 147, 200),
(3749, '100mlml Chenin', 470, 148, 200),
(3750, '250mlml Chenin', 471, 148, 200),
(3751, '100mlml Riesling', 470, 149, 200),
(3752, '250mlml Riesling', 471, 149, 200),
(3753, '100mlml Grenache', 470, 150, 200),
(3754, '250mlml Grenache', 471, 150, 200),
(3755, '100mlml Grüner Veltliner', 470, 151, 200),
(3756, '250mlml Grüner Veltliner', 471, 151, 200),
(3757, '100mlml Weißburgunder', 470, 152, 200),
(3758, '250mlml Weißburgunder', 471, 152, 200),
(3759, '100mlml Welschriesling', 470, 153, 200),
(3760, '250mlml Welschriesling', 471, 153, 200);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1898 ;

--
-- Daten für Tabelle `pressing`
--

INSERT INTO `pressing` (`ID`, `date`, `amount`, `bottled`) VALUES
(1886, '2014-11-18', 659671, 1),
(1887, '2014-11-18', 684911, 1),
(1888, '2014-11-18', 632809, 1),
(1889, '2014-11-18', 697519, 1),
(1890, '2014-11-18', 697513, 1),
(1891, '2014-11-18', 653180, 1),
(1892, '2014-11-18', 642301, 1),
(1893, '2014-11-18', 695660, 1),
(1894, '2014-11-18', 572414, 1),
(1895, '2014-11-18', 677621, 1),
(1896, '2014-11-18', 628884, 1),
(1897, '2014-11-18', 652498, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=76 ;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`ID`, `strainFK`, `bottleFK`, `amount`) VALUES
(52, 153, 471, 1319),
(53, 153, 470, 3299),
(54, 153, 471, 1369),
(55, 153, 470, 3426),
(56, 153, 471, 1265),
(57, 153, 470, 3165),
(58, 153, 471, 1395),
(59, 153, 470, 3487),
(60, 153, 471, 1395),
(61, 153, 470, 3487),
(62, 153, 471, 1306),
(63, 153, 470, 3266),
(64, 153, 471, 1284),
(65, 153, 470, 3213),
(66, 153, 471, 1391),
(67, 153, 470, 3479),
(68, 153, 471, 1144),
(69, 153, 470, 2864),
(70, 153, 471, 1355),
(71, 153, 470, 3388),
(72, 153, 471, 1257),
(73, 153, 470, 3146),
(74, 153, 471, 1304),
(75, 153, 470, 3264);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=72 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `is_admin`) VALUES
(1, 'wAndexer', 'abc', 'Wilfried@Andexer.at', 1),
(70, 'gMoser', 'abc', 'Gudrun@Moser.at', 0),
(71, 'mHartl', 'abc', 'Martha@Hartl.at', 0);

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
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`strainFK`) REFERENCES `strain` (`ID`);

--
-- Constraints der Tabelle `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`customerFK`) REFERENCES `customer` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `shipmentitem`
--
ALTER TABLE `shipmentitem`
  ADD CONSTRAINT `shipmentitem_ibfk_2` FOREIGN KEY (`shipmentFK`) REFERENCES `shipment` (`ID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipmentitem_ibfk_1` FOREIGN KEY (`productFK`) REFERENCES `product` (`ID`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
