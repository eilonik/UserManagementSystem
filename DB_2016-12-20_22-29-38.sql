-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: DB
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `email` varchar(50) DEFAULT NULL,
  `timestamp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES ('as@s','2016-12-19 05:08:10pm'),('eilonik@gmail.com','2016-12-20 05:07:03pm'),('da@vid.com','2016-12-20 07:23:49pm'),('da@vid.com','2016-12-20 07:29:26pm'),('da@vid.com','2016-12-20 07:35:42pm'),('me@ir.com','2016-12-20 07:41:57pm'),('it@zik.com','2016-12-20 07:42:32pm'),('admin@admin','2016-12-20 07:46:23pm'),('admin@admin','2016-12-20 08:02:07pm'),('admin@admin','2016-12-20 08:07:45pm'),('admin@admin','2016-12-20 08:12:58pm'),('admin@admin','2016-12-20 08:14:52pm'),('admin@admin','2016-12-20 08:15:26pm'),('admin@admin','2016-12-20 08:17:25pm'),('admin@admin','2016-12-20 08:21:29pm'),('admin@admin','2016-12-20 08:22:08pm'),('admin@admin','2016-12-20 08:25:41pm'),('admin@admin','2016-12-20 08:26:36pm'),('admin@admin','2016-12-20 08:27:18pm'),('admin@admin','2016-12-20 08:27:49pm'),('admin@admin','2016-12-20 08:33:09pm'),('admin@admin','2016-12-20 08:35:19pm'),('admin@admin','2016-12-20 08:37:33pm'),('admin@admin','2016-12-20 08:38:38pm'),('admin@admin','2016-12-20 08:39:20pm'),('admin@admin','2016-12-20 08:39:50pm'),('admin@admin','2016-12-20 08:41:08pm'),('admin@admin','2016-12-20 08:42:13pm'),('admin@admin','2016-12-20 08:44:52pm'),('admin@admin','2016-12-20 08:48:14pm'),('admin@admin','2016-12-20 08:49:13pm'),('admin@admin','2016-12-20 08:50:49pm'),('admin@admin','2016-12-20 08:51:11pm'),('admin@admin','2016-12-20 09:01:53pm'),('admin@admin','2016-12-20 09:05:13pm'),('admin@admin','2016-12-20 09:08:33pm'),('da@vid.com','2016-12-20 09:56:20pm'),('da@vid.com','2016-12-20 09:56:46pm'),('admin@admin','2016-12-20 10:22:54pm'),('admin@admin','2016-12-20 10:23:16pm'),('da@vid.com','2016-12-20 10:24:45pm'),('da@vid.com','2016-12-20 10:25:49pm'),('da@vid.com','2016-12-20 10:26:23pm'),('da@vid.com','2016-12-20 10:28:16pm'),('admin@admin','2016-12-20 10:28:29pm');
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin@admin','admin','f1891cea80fc05e433c943254c6bdabc159577a02a7395dfebbfbc4f7661d4af56f2d372131a45936de40160007368a56ef216a30cb202c66d3145fd24380906'),('da@vid.com','david','a917d01789b58dfd3a702c715496269886f5d363d7445f42ee7b963e9de2a1da7dfbf0b88248ca648e69927353c0a76aaccd1d9b2ef1e32a7fe18ca3710f8929');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-20 22:29:38
