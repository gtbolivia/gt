# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Database: Gt
# Generation Time: 2014-07-09 13:16:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `category_parent_id` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `category_parent_id`, `weight`)
VALUES
	(3,'administracion central',0,0),
	(4,'cofinanciamiento regional',0,1),
	(5,'administracion departamental',0,2),
	(6,'administracion local',0,3),
	(7,'ministerios',3,0),
	(8,'entidades descentralizadas',3,1),
	(9,'empresas nacionales',3,2),
	(10,'fondos de inversion',4,0),
	(11,'gobernaturas - GAD',5,0),
	(12,'empresas regionales',5,1),
	(13,'empresas locales',6,0),
	(14,'universidades',6,1),
	(15,'municipios grandes',6,2),
	(16,'municipios pequeÃ±os',6,3);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table financial_institutions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `financial_institutions`;

CREATE TABLE `financial_institutions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gestions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gestions`;

CREATE TABLE `gestions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` text,
  `budget` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table project_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_type`;

CREATE TABLE `project_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `investment` float DEFAULT '0',
  `implementation_period` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `name`, `description`, `investment`, `implementation_period`)
VALUES
	(1,'new project','this is a test',12313,'2014');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects_blogs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects_blogs`;

CREATE TABLE `projects_blogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table projects_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects_categories`;

CREATE TABLE `projects_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table similar_projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `similar_projects`;

CREATE TABLE `similar_projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `similar_project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
