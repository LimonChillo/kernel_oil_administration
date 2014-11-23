-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Nov 2014 um 23:47
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39882 ;

--
-- Daten für Tabelle `barrel`
--

INSERT INTO `barrel` (`ID`, `strainFK`, `fillLevel`, `pressingFK`, `date`) VALUES
(39702, 142, 50000, 1910, '2014-11-18'),
(39703, 142, 50000, 1910, '2014-11-18'),
(39704, 142, 50000, 1910, '2014-11-18'),
(39705, 142, 44394, 1910, '2014-11-18'),
(39706, 142, 50000, 1910, '2014-11-18'),
(39707, 142, 50000, 1910, '2014-11-18'),
(39708, 142, 40329, 1910, '2014-11-18'),
(39709, 142, 47314, 1910, '2014-11-18'),
(39710, 142, 42414, 1910, '2014-11-18'),
(39711, 142, 50000, 1910, '2014-11-18'),
(39712, 142, 50000, 1910, '2014-11-18'),
(39713, 142, 50000, 1910, '2014-11-18'),
(39714, 142, 40530, 1910, '2014-11-18'),
(39715, 142, 50000, 1910, '2014-11-18'),
(39716, 142, 35935, 1910, '2014-11-18'),
(39717, 143, 50000, 1911, '2014-11-18'),
(39718, 143, 50000, 1911, '2014-11-18'),
(39719, 143, 50000, 1911, '2014-11-18'),
(39720, 143, 50000, 1911, '2014-11-18'),
(39721, 143, 50000, 1911, '2014-11-18'),
(39722, 143, 31291, 1911, '2014-11-18'),
(39723, 143, 29663, 1911, '2014-11-18'),
(39724, 143, 50000, 1911, '2014-11-18'),
(39725, 143, 50000, 1911, '2014-11-18'),
(39726, 143, 50000, 1911, '2014-11-18'),
(39727, 143, 48130, 1911, '2014-11-18'),
(39728, 143, 50000, 1911, '2014-11-18'),
(39729, 143, 50000, 1911, '2014-11-18'),
(39730, 143, 50000, 1911, '2014-11-18'),
(39731, 143, 34565, 1911, '2014-11-18'),
(39732, 144, 50000, 1912, '2014-11-18'),
(39733, 144, 30927, 1912, '2014-11-18'),
(39734, 144, 50000, 1912, '2014-11-18'),
(39735, 144, 50000, 1912, '2014-11-18'),
(39736, 144, 32839, 1912, '2014-11-18'),
(39737, 144, 50000, 1912, '2014-11-18'),
(39738, 144, 40940, 1912, '2014-11-18'),
(39739, 144, 50000, 1912, '2014-11-18'),
(39740, 144, 50000, 1912, '2014-11-18'),
(39741, 144, 32548, 1912, '2014-11-18'),
(39742, 144, 50000, 1912, '2014-11-18'),
(39743, 144, 50000, 1912, '2014-11-18'),
(39744, 144, 26257, 1912, '2014-11-18'),
(39745, 144, 50000, 1912, '2014-11-18'),
(39746, 144, 50000, 1912, '2014-11-18'),
(39747, 145, 50000, 1913, '2014-11-18'),
(39748, 145, 50000, 1913, '2014-11-18'),
(39749, 145, 50000, 1913, '2014-11-18'),
(39750, 145, 50000, 1913, '2014-11-18'),
(39751, 145, 28774, 1913, '2014-11-18'),
(39752, 145, 50000, 1913, '2014-11-18'),
(39753, 145, 50000, 1913, '2014-11-18'),
(39754, 145, 50000, 1913, '2014-11-18'),
(39755, 145, 20522, 1913, '2014-11-18'),
(39756, 145, 50000, 1913, '2014-11-18'),
(39757, 145, 46416, 1913, '2014-11-18'),
(39758, 145, 50000, 1913, '2014-11-18'),
(39759, 145, 50000, 1913, '2014-11-18'),
(39760, 145, 50000, 1913, '2014-11-18'),
(39761, 145, 44179, 1913, '2014-11-18'),
(39762, 146, 50000, 1914, '2014-11-18'),
(39763, 146, 50000, 1914, '2014-11-18'),
(39764, 146, 50000, 1914, '2014-11-18'),
(39765, 146, 50000, 1914, '2014-11-18'),
(39766, 146, 50000, 1914, '2014-11-18'),
(39767, 146, 28579, 1914, '2014-11-18'),
(39768, 146, 50000, 1914, '2014-11-18'),
(39769, 146, 37363, 1914, '2014-11-18'),
(39770, 146, 50000, 1914, '2014-11-18'),
(39771, 146, 50000, 1914, '2014-11-18'),
(39772, 146, 47673, 1914, '2014-11-18'),
(39773, 146, 47783, 1914, '2014-11-18'),
(39774, 146, 50000, 1914, '2014-11-18'),
(39775, 146, 36294, 1914, '2014-11-18'),
(39776, 146, 50000, 1914, '2014-11-18'),
(39777, 147, 37422, 1915, '2014-11-18'),
(39778, 147, 50000, 1915, '2014-11-18'),
(39779, 147, 50000, 1915, '2014-11-18'),
(39780, 147, 50000, 1915, '2014-11-18'),
(39781, 147, 33779, 1915, '2014-11-18'),
(39782, 147, 50000, 1915, '2014-11-18'),
(39783, 147, 50000, 1915, '2014-11-18'),
(39784, 147, 28972, 1915, '2014-11-18'),
(39785, 147, 24355, 1915, '2014-11-18'),
(39786, 147, 50000, 1915, '2014-11-18'),
(39787, 147, 41382, 1915, '2014-11-18'),
(39788, 147, 50000, 1915, '2014-11-18'),
(39789, 147, 36650, 1915, '2014-11-18'),
(39790, 147, 20031, 1915, '2014-11-18'),
(39791, 147, 47348, 1915, '2014-11-18'),
(39792, 148, 50000, 1916, '2014-11-18'),
(39793, 148, 50000, 1916, '2014-11-18'),
(39794, 148, 30022, 1916, '2014-11-18'),
(39795, 148, 50000, 1916, '2014-11-18'),
(39796, 148, 32614, 1916, '2014-11-18'),
(39797, 148, 36396, 1916, '2014-11-18'),
(39798, 148, 42356, 1916, '2014-11-18'),
(39799, 148, 50000, 1916, '2014-11-18'),
(39800, 148, 50000, 1916, '2014-11-18'),
(39801, 148, 38847, 1916, '2014-11-18'),
(39802, 148, 50000, 1916, '2014-11-18'),
(39803, 148, 23061, 1916, '2014-11-18'),
(39804, 148, 50000, 1916, '2014-11-18'),
(39805, 148, 50000, 1916, '2014-11-18'),
(39806, 148, 24055, 1916, '2014-11-18'),
(39807, 149, 25903, 1917, '2014-11-18'),
(39808, 149, 50000, 1917, '2014-11-18'),
(39809, 149, 26406, 1917, '2014-11-18'),
(39810, 149, 28420, 1917, '2014-11-18'),
(39811, 149, 50000, 1917, '2014-11-18'),
(39812, 149, 50000, 1917, '2014-11-18'),
(39813, 149, 26513, 1917, '2014-11-18'),
(39814, 149, 25129, 1917, '2014-11-18'),
(39815, 149, 50000, 1917, '2014-11-18'),
(39816, 149, 50000, 1917, '2014-11-18'),
(39817, 149, 50000, 1917, '2014-11-18'),
(39818, 149, 50000, 1917, '2014-11-18'),
(39819, 149, 50000, 1917, '2014-11-18'),
(39820, 149, 36931, 1917, '2014-11-18'),
(39821, 149, 50000, 1917, '2014-11-18'),
(39822, 150, 25578, 1918, '2014-11-18'),
(39823, 150, 50000, 1918, '2014-11-18'),
(39824, 150, 50000, 1918, '2014-11-18'),
(39825, 150, 22148, 1918, '2014-11-18'),
(39826, 150, 50000, 1918, '2014-11-18'),
(39827, 150, 50000, 1918, '2014-11-18'),
(39828, 150, 50000, 1918, '2014-11-18'),
(39829, 150, 50000, 1918, '2014-11-18'),
(39830, 150, 50000, 1918, '2014-11-18'),
(39831, 150, 22797, 1918, '2014-11-18'),
(39832, 150, 50000, 1918, '2014-11-18'),
(39833, 150, 50000, 1918, '2014-11-18'),
(39834, 150, 50000, 1918, '2014-11-18'),
(39835, 150, 50000, 1918, '2014-11-18'),
(39836, 150, 50000, 1918, '2014-11-18'),
(39837, 151, 50000, 1919, '2014-11-18'),
(39838, 151, 24602, 1919, '2014-11-18'),
(39839, 151, 45513, 1919, '2014-11-18'),
(39840, 151, 28523, 1919, '2014-11-18'),
(39841, 151, 45390, 1919, '2014-11-18'),
(39842, 151, 50000, 1919, '2014-11-18'),
(39843, 151, 20073, 1919, '2014-11-18'),
(39844, 151, 50000, 1919, '2014-11-18'),
(39845, 151, 49248, 1919, '2014-11-18'),
(39846, 151, 50000, 1919, '2014-11-18'),
(39847, 151, 20102, 1919, '2014-11-18'),
(39848, 151, 28816, 1919, '2014-11-18'),
(39849, 151, 50000, 1919, '2014-11-18'),
(39850, 151, 38479, 1919, '2014-11-18'),
(39851, 151, 50000, 1919, '2014-11-18'),
(39852, 152, 50000, 1920, '2014-11-18'),
(39853, 152, 27119, 1920, '2014-11-18'),
(39854, 152, 21125, 1920, '2014-11-18'),
(39855, 152, 50000, 1920, '2014-11-18'),
(39856, 152, 43484, 1920, '2014-11-18'),
(39857, 152, 50000, 1920, '2014-11-18'),
(39858, 152, 50000, 1920, '2014-11-18'),
(39859, 152, 48003, 1920, '2014-11-18'),
(39860, 152, 24958, 1920, '2014-11-18'),
(39861, 152, 50000, 1920, '2014-11-18'),
(39862, 152, 38449, 1920, '2014-11-18'),
(39863, 152, 50000, 1920, '2014-11-18'),
(39864, 152, 50000, 1920, '2014-11-18'),
(39865, 152, 50000, 1920, '2014-11-18'),
(39866, 152, 28127, 1920, '2014-11-18'),
(39867, 153, 24780, 1921, '2014-11-18'),
(39868, 153, 23689, 1921, '2014-11-18'),
(39869, 153, 33486, 1921, '2014-11-18'),
(39870, 153, 50000, 1921, '2014-11-18'),
(39871, 153, 50000, 1921, '2014-11-18'),
(39872, 153, 35945, 1921, '2014-11-18'),
(39873, 153, 50000, 1921, '2014-11-18'),
(39874, 153, 50000, 1921, '2014-11-18'),
(39875, 153, 50000, 1921, '2014-11-18'),
(39876, 153, 50000, 1921, '2014-11-18'),
(39877, 153, 21982, 1921, '2014-11-18'),
(39878, 153, 50000, 1921, '2014-11-18'),
(39879, 153, 50000, 1921, '2014-11-18'),
(39880, 153, 50000, 1921, '2014-11-18'),
(39881, 153, 43808, 1921, '2014-11-18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=492 ;

--
-- Daten für Tabelle `bottle`
--

INSERT INTO `bottle` (`ID`, `name`, `ml`, `amount`) VALUES
(491, '100ml', 100, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=824 ;

--
-- Daten für Tabelle `bottling`
--

INSERT INTO `bottling` (`ID`, `pressingFK`, `bottleFK`, `date`, `amount`, `strainFK`) VALUES
(800, 1910, 475, '2014-11-18', 350250, NULL),
(801, 1910, 474, '2014-11-18', 350600, NULL),
(802, 1911, 475, '2014-11-18', 346750, NULL),
(803, 1911, 474, '2014-11-18', 346800, NULL),
(804, 1912, 475, '2014-11-18', 331750, NULL),
(805, 1912, 474, '2014-11-18', 331700, NULL),
(806, 1913, 475, '2014-11-18', 344750, NULL),
(807, 1913, 474, '2014-11-18', 345100, NULL),
(808, 1914, 475, '2014-11-18', 348750, NULL),
(809, 1914, 474, '2014-11-18', 348900, NULL),
(810, 1915, 475, '2014-11-18', 309750, NULL),
(811, 1915, 474, '2014-11-18', 310100, NULL),
(812, 1916, 475, '2014-11-18', 313500, NULL),
(813, 1916, 474, '2014-11-18', 313800, NULL),
(814, 1917, 475, '2014-11-18', 309500, NULL),
(815, 1917, 474, '2014-11-18', 309800, NULL),
(816, 1918, 475, '2014-11-18', 335250, NULL),
(817, 1918, 474, '2014-11-18', 335200, NULL),
(818, 1919, 475, '2014-11-18', 300250, NULL),
(819, 1919, 474, '2014-11-18', 300400, NULL),
(820, 1920, 475, '2014-11-18', 315500, NULL),
(821, 1920, 474, '2014-11-18', 315700, NULL),
(822, 1921, 475, '2014-11-18', 316750, NULL),
(823, 1921, 474, '2014-11-18', 316900, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=480 ;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`ID`, `firstname`, `lastname`, `company`, `road`, `zip`, `city`, `country`) VALUES
(463, 'Melanie', 'Walkner', '', 'Sophie-Ebner-Allee 128', '8011', 'Graz', 'Österreich'),
(464, 'Liselotte', 'Sögner', NULL, 'Anna-Nindl-Gasse 104', '6020', 'Innsbruck', 'Österreich'),
(465, 'Viktoria', 'Wieser', NULL, 'Lisa-Schaffenrath-Gasse 172', '7000', 'Eisenstadt', 'Österreich'),
(466, 'Manfred', 'Schröger', NULL, 'Marius-Riedl-Allee 58', '1010', 'Wien', 'Österreich'),
(467, 'Paula', 'Krall', NULL, 'Peter-Auer-Platz 13', '8011', 'Graz', 'Österreich'),
(468, 'Stefanie', 'Brandstätter', NULL, 'Charlotte-Richter-Allee 19', '7000', 'Eisenstadt', 'Österreich'),
(469, 'Stefanie', 'Winkelmann', NULL, 'Marcel-Marx-Weg 12', '4010', 'Linz', 'Österreich'),
(470, 'Ivan', 'Rohrmoser', NULL, 'Marius-Nindl-Straße 2', '4010', 'Linz', 'Österreich'),
(471, 'Ursula', 'Kinleburg', NULL, 'Golda-Stockinger-Straße 54', '7000', 'Eisenstadt', 'Österreich'),
(472, 'Anna', 'Schwendinger', '', 'Eva-Mayr-Straße 20', '5020', 'Salzburg', 'Österreich'),
(479, 'Fabian', 'Hoffmann', '', 'asd', '5020', 'Salzburg', 'Österreich');

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
  `amount` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `strainFK` (`strainFK`),
  KEY `bottleFK` (`bottleFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3843 ;

--
-- Daten für Tabelle `label`
--

INSERT INTO `label` (`ID`, `name`, `bottleFK`, `strainFK`, `amount`) VALUES
(3828, '100ml Rückettikett', 491, 0, 0),
(3829, '100ml Chardonnay', 491, 142, 0),
(3830, '100ml Sauvignon Blanc', 491, 143, 0),
(3831, '100ml Merlot', 491, 144, 0),
(3832, '100ml  Grauburgunder', 491, 145, 0),
(3833, '100ml Spätburgunder', 491, 146, 0),
(3834, '100ml Gamayz', 491, 147, 0),
(3835, '100ml Chenin', 491, 148, 0),
(3836, '100ml Riesling', 491, 149, 0),
(3837, '100ml Grenache', 491, 150, 0),
(3838, '100ml Grüner Veltliner', 491, 151, 0),
(3839, '100ml Weißburgunder', 491, 152, 0),
(3840, '100ml Welschriesling', 491, 153, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1922 ;

--
-- Daten für Tabelle `pressing`
--

INSERT INTO `pressing` (`ID`, `date`, `amount`, `bottled`) VALUES
(1910, '2014-11-18', 700916, 1),
(1911, '2014-11-18', 693649, 1),
(1912, '2014-11-18', 663511, 1),
(1913, '2014-11-18', 689891, 1),
(1914, '2014-11-18', 697692, 1),
(1915, '2014-11-18', 619939, 1),
(1916, '2014-11-18', 627351, 1),
(1917, '2014-11-18', 619302, 1),
(1918, '2014-11-18', 670523, 1),
(1919, '2014-11-18', 600746, 1),
(1920, '2014-11-18', 631265, 1),
(1921, '2014-11-18', 633690, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `strainFK` int(255) NOT NULL,
  `bottleFK` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `strainFK` (`strainFK`),
  KEY `bottleFK` (`bottleFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=124 ;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`ID`, `strainFK`, `bottleFK`, `amount`) VALUES
(100, 153, NULL, 1401),
(101, 153, NULL, 3506),
(102, 153, NULL, 1387),
(103, 153, NULL, 3468),
(104, 153, NULL, 1327),
(105, 153, NULL, 3317),
(106, 153, NULL, 1379),
(107, 153, NULL, 3451),
(108, 153, NULL, 1395),
(109, 153, NULL, 3489),
(110, 153, NULL, 1239),
(111, 153, NULL, 3101),
(112, 153, NULL, 1254),
(113, 153, NULL, 3138),
(114, 153, NULL, 1238),
(115, 153, NULL, 3098),
(116, 153, NULL, 1341),
(117, 153, NULL, 3352),
(118, 153, NULL, 1201),
(119, 153, NULL, 3004),
(120, 153, NULL, 1262),
(121, 153, NULL, 3157),
(122, 153, NULL, 1267),
(123, 153, NULL, 3169);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=159 ;

--
-- Daten für Tabelle `strain`
--

INSERT INTO `strain` (`ID`, `name`) VALUES
(0, 'Rücketikett'),
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
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=92 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `admin`) VALUES
(90, 'wandexer', 'a', 'a@a.at', 0),
(91, 'fabi', 'asdf', 'asdf@a.at', 0);

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
