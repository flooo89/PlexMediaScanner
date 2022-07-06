-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: database-5009270948.webspace-host.com    Database: dbs7854396
-- ------------------------------------------------------
-- Server version	5.7.38-log

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
-- Table structure for table `bibliothek`
--

DROP TABLE IF EXISTS `bibliothek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bibliothek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plkey` int(11) DEFAULT NULL,
  `title` text,
  `pltype` varchar(255) DEFAULT NULL,
  `scanner` text,
  `agent` text,
  `composite` text,
  `contentChangedAt` text,
  `updatedAt` text,
  `createdAt` text,
  `pllanguage` text,
  `plxml` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=323 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bibliothek`
--

LOCK TABLES `bibliothek` WRITE;
/*!40000 ALTER TABLE `bibliothek` DISABLE KEYS */;
/*!40000 ALTER TABLE `bibliothek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ratingKey` text,
  `plkey` text,
  `plguid` text,
  `studio` text,
  `pltype` text,
  `title` text,
  `titleSort` text,
  `originalTitle` text,
  `contentRating` text,
  `summary` text,
  `audienceRating` text,
  `year` text,
  `thumb` text,
  `art` text,
  `duration` text,
  `originallyAvailableAt` text,
  `addedAt` text,
  `updatedAt` text,
  `audienceRatingImage` text,
  `chapterSource` text,
  `Media_ID` text,
  `Media_bitrate` text,
  `Media_width` text,
  `Media_height` text,
  `Media_aspectRatio` text,
  `Media_audioChannels` text,
  `Media_audioCodec` text,
  `Media_videoCodec` text,
  `Media_videoResolution` text,
  `Media_container` text,
  `Media_videoFrameRate` text,
  `Media_videoProfile` text,
  `Media_duration` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3221 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-06 17:14:04
