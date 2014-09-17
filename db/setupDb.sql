CREATE DATABASE  IF NOT EXISTS `Gt` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Gt`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 192.168.1.14    Database: Gt
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `category_parent_id` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `type` char(45) NOT NULL,
  `gestionId` int(11) NOT NULL,
  `pge` float DEFAULT NULL,
  `pge_percent` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,'ADMINISTRACION CENTRAL',0,0,'organizational',1,18369300,59.26),(4,'COFINANCIAMIENTO REGIONAL',0,1,'organizational',1,518870,1.67),(5,'ADMINISTRACION DEPARTAMENTAL',0,2,'organizational',1,4973620,16.04),(6,'ADMINISTRACION LOCAL',0,3,'organizational',1,7138240,23.03),(7,'Ministerios',3,0,'organizational',1,3407760,10.99),(8,'Entidades Descentralizadas',3,1,'organizational',1,5739020,18.51),(9,'Empresas Nacionales',3,2,'organizational',1,9222540,29.75),(10,'Fondos de Inversión',4,0,'organizational',1,518870,1.67),(11,'Gobiernos Autónomos Departamentales',5,0,'organizational',1,4754370,15.34),(12,'Empresas Regionales',5,1,'organizational',1,219246,0.71),(13,'Empresas Locales',6,0,'organizational',1,101532,0.33),(14,'Universidades',6,1,'organizational',1,704287,2.27),(15,'Municipios Grandes',6,2,'organizational',1,4360470,14.07),(16,'Municipios Pequeños',6,3,'organizational',1,1971950,6.36),(17,'Municipio de La Paz',15,0,'organizational',1,NULL,NULL),(18,'Municipio de El Alto',15,1,'organizational',1,NULL,NULL),(19,'PRODUCTIVOS',0,0,'sector',1,10498000,33.86),(20,'INFRAESTRUCTURA',0,1,'sector',1,11628100,37.51),(21,'SOCIALES',0,2,'sector',1,7848780,25.32),(22,'MULTISECTORIALES',0,3,'sector',1,1025180,3.31),(23,'AGROPECUARIO',19,0,'sector',1,1725990,5.57),(24,'MINERO',19,1,'sector',1,649863,2.1),(25,'NDUSTRIA Y TURISMO',19,2,'sector',1,900787,2.91),(26,'HIDROCARBUROS',19,3,'sector',1,7221360,23.29),(27,'ENERGIA',20,0,'sector',1,1317580,4.25),(28,'TRANSPORTES',20,1,'sector',1,9567900,30.86),(29,'COMUNICACIONES',20,2,'sector',1,120488,0.39),(30,'RECURSOS HIDRICOS',20,3,'sector',1,622110,2.01),(31,'SALUD Y SEGURIDAD SOCIAL',21,0,'sector',1,1255700,4.05),(32,'EDUCACION Y CULTURA',21,1,'sector',1,2074260,6.69),(33,'SANEAMIENTO BASICO',21,2,'sector',1,1367310,4.41),(34,'URBANISMO Y VIVIENDA',21,3,'sector',1,3151520,10.17),(35,'COMERCIO Y FINANZAS',22,0,'sector',1,67274,0.22),(36,'ADMINISTRACION GENERAL',22,1,'sector',1,152748,0.49),(37,'JUSTICIA Y POLICIA',22,2,'sector',1,232193,0.75),(38,'DEFENSA NACIONAL',22,3,'sector',1,48704,0.16),(39,'RECURSOS NATURALES Y MEDIO AMBIENTE',22,4,'sector',1,284617,0.92),(40,'MULTISECTORIAL ',22,5,'sector',1,239639,0.77);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_institutions`
--

DROP TABLE IF EXISTS `financial_institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financial_institutions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_institutions`
--

LOCK TABLES `financial_institutions` WRITE;
/*!40000 ALTER TABLE `financial_institutions` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestions`
--

DROP TABLE IF EXISTS `gestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` text,
  `budget_bs` float DEFAULT '0',
  `budget_sus` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestions`
--

LOCK TABLES `gestions` WRITE;
/*!40000 ALTER TABLE `gestions` DISABLE KEYS */;
INSERT INTO `gestions` VALUES (1,'2014',NULL,31000000,4518960);
/*!40000 ALTER TABLE `gestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_type`
--

DROP TABLE IF EXISTS `project_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_type`
--

LOCK TABLES `project_type` WRITE;
/*!40000 ALTER TABLE `project_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `investment` float DEFAULT '0',
  `gestionId` int(11) NOT NULL,
  `categoryOrganizationalId` int(11) DEFAULT NULL,
  `categorySectorId` int(11) DEFAULT NULL,
  `departamento` varchar(45) NOT NULL,
  `city` varchar(100) NOT NULL,
  `executionStartDate` datetime DEFAULT NULL,
  `executionEndDate` datetime DEFAULT NULL,
  `projectTypeId` int(11) DEFAULT NULL,
  `finalcialInstitutionId` int(11) DEFAULT NULL,
  `socialImpact` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'new project','this is a test',12313,0,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_blogs`
--

DROP TABLE IF EXISTS `projects_blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_blogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_blogs`
--

LOCK TABLES `projects_blogs` WRITE;
/*!40000 ALTER TABLE `projects_blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_categories`
--

DROP TABLE IF EXISTS `projects_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_categories`
--

LOCK TABLES `projects_categories` WRITE;
/*!40000 ALTER TABLE `projects_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `similar_projects`
--

DROP TABLE IF EXISTS `similar_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `similar_projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `similar_project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `similar_projects`
--

LOCK TABLES `similar_projects` WRITE;
/*!40000 ALTER TABLE `similar_projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `similar_projects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-17 12:11:54
