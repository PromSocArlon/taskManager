/*Final*/
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: taskmanager
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `tbl_days`
--

DROP TABLE IF EXISTS `tbl_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_days` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_days`
--

LOCK TABLES `tbl_days` WRITE;
/*!40000 ALTER TABLE `tbl_days` DISABLE KEYS */;
INSERT INTO `tbl_days` VALUES (1,'monday'),(2,'tuesday'),(3,'wednesday'),(4,'thursday'),(5,'friday'),(6,'saturday'),(7,'sunday');
/*!40000 ALTER TABLE `tbl_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `tbl_member` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `teamleader` boolean DEFAULT NULL,
  `idTeam` smallint(6) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idTeam` (`idTeam`),
  CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`idTeam`) REFERENCES `tbl_team` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_member`
--

LOCK TABLES `tbl_member` WRITE;
/*!40000 ALTER TABLE `tbl_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tasks`
--

DROP TABLE IF EXISTS `tbl_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tasks` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `priority` tinyint(4) DEFAULT NULL,
  `description` text,
  `status` varchar(20) DEFAULT NULL,
  `subtasks` tinyint(4) DEFAULT NULL,
  `day` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `day` (`day`),
  CONSTRAINT `tbl_tasks_ibfk_1` FOREIGN KEY (`day`) REFERENCES `tbl_days` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tasks`
--

LOCK TABLES `tbl_tasks` WRITE;
/*!40000 ALTER TABLE `tbl_tasks` DISABLE KEYS */;
INSERT INTO `tbl_tasks` VALUES (1,'Dormir',1,NULL,NULL,NULL,1),(2,'Gogo',1,NULL,NULL,NULL,1),(3,'Manger',1,NULL,NULL,NULL,5),(4,'Faire le menage',1,NULL,NULL,NULL,7),(5,'Test42',42,NULL,NULL,NULL,7),(6,'Testsync',127,NULL,NULL,NULL,7);
/*!40000 ALTER TABLE `tbl_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team`
--

DROP TABLE IF EXISTS `tbl_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_team` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team`
--

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;
INSERT INTO `tbl_team` VALUES (1,'team1'),(2,'team2'),(3,'team3'),(4,'team4'),(5,'team5');
/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `tbl_interTaskMember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_interTaskMember` (
  `idTask` smallint(6) NOT NULL ,
   `idMember` smallint(6) NOT NULL ,
  PRIMARY KEY (`idTask`,`idMember`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;





--
-- Dumping events for database 'taskmanager'
--

--
-- Dumping routines for database 'taskmanager'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-28 17:01:51
