-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laravel`;

-- Listage de la structure de la table laravel. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `uid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table laravel.admin : ~0 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`uid`) VALUES
	('wagner228u');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table laravel. assoblog
CREATE TABLE IF NOT EXISTS `assoblog` (
  `nomdestination` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `lien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table laravel.assoblog : ~1 rows (environ)
/*!40000 ALTER TABLE `assoblog` DISABLE KEYS */;
INSERT INTO `assoblog` (`nomdestination`, `nom`, `lien`) VALUES
	('Test 1', 'blog blog', 'https://google.fr');
/*!40000 ALTER TABLE `assoblog` ENABLE KEYS */;

-- Listage de la structure de la table laravel. assocours
CREATE TABLE IF NOT EXISTS `assocours` (
  `nomdestination` varchar(50) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `ects` int(11) DEFAULT NULL,
  `nombre` int(11) DEFAULT NULL,
  `contenu` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table laravel.assocours : ~2 rows (environ)
/*!40000 ALTER TABLE `assocours` DISABLE KEYS */;
INSERT INTO `assocours` (`nomdestination`, `semestre`, `code`, `titre`, `ects`, `nombre`, `contenu`) VALUES
	('Test 1', 7, '888888', 'Test zgjzoeg', 5, 42, 'Test de cours'),
	('Test 1', 78, '6546541615', 'Test ergohjrhjqez', 12, 38, 'Autre test de cours'),
	('Test 2', 8, 'zegzegze', 'testcours', 5, 42, 'Test contenu de cours relativement long afin d\'observer l\'adaptation.<br />\r\nTest retour à la ligne');
/*!40000 ALTER TABLE `assocours` ENABLE KEYS */;

-- Listage de la structure de la table laravel. assoimage
CREATE TABLE IF NOT EXISTS `assoimage` (
  `nom` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table laravel.assoimage : ~3 rows (environ)
/*!40000 ALTER TABLE `assoimage` DISABLE KEYS */;
INSERT INTO `assoimage` (`nom`, `categorie`, `url`) VALUES
	('Test 1', 'intro', 'img/destinations/Test 10.jpeg'),
	('Test 1', 'intro', 'img/destinations/Test 11.jpg'),
	('Test 1', 'temoignages', 'img/destinations/Test 12.png');
/*!40000 ALTER TABLE `assoimage` ENABLE KEYS */;

-- Listage de la structure de la table laravel. assolien
CREATE TABLE IF NOT EXISTS `assolien` (
  `nomdestination` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `lien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table laravel.assolien : ~1 rows (environ)
/*!40000 ALTER TABLE `assolien` DISABLE KEYS */;
INSERT INTO `assolien` (`nomdestination`, `nom`, `lien`) VALUES
	('Test 1', 'lien pas utile', 'https://google.fr');
/*!40000 ALTER TABLE `assolien` ENABLE KEYS */;

-- Listage de la structure de la table laravel. destination
CREATE TABLE IF NOT EXISTS `destination` (
  `nom` varchar(50) DEFAULT NULL,
  `intro` text,
  `temoignages` text,
  `astucesinfos` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table laravel.destination : ~3 rows (environ)
/*!40000 ALTER TABLE `destination` DISABLE KEYS */;
INSERT INTO `destination` (`nom`, `intro`, `temoignages`, `astucesinfos`) VALUES
	('Test 1', 'Cette destination sert de test.<br />\r\nTest retour à la ligne.', 'Un élève témoigne', 'Boire de l\'eau c est bon pour la santé'),
	('Test 2', 'blabla<br />\r\nretour à la ligne<br />\r\ndeuxieme retour à la ligne', 'Témoignage<br />\r\nTémoignage ligne 2', 'Astuce<br />\r\nAstuce ligne 2');
/*!40000 ALTER TABLE `destination` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
