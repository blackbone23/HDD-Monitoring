-- MySQL dump 10.13  Distrib 5.1.61, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: hdd_monitor
-- ------------------------------------------------------
-- Server version	5.1.61-0ubuntu0.11.04.1

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
-- Table structure for table `harddisk`
--

DROP TABLE IF EXISTS `harddisk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `harddisk` (
  `id_harddisk` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `IP` varchar(45) DEFAULT NULL,
  `username_hdd` varchar(45) DEFAULT NULL,
  `password_hdd` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_harddisk`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `harddisk`
--

LOCK TABLES `harddisk` WRITE;
/*!40000 ALTER TABLE `harddisk` DISABLE KEYS */;
INSERT INTO `harddisk` VALUES (2,1,'192.168.11.31','rully','slamdunk'),(3,1,'192.168.11.32','rully','tr4c3r');
/*!40000 ALTER TABLE `harddisk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hdd_device`
--

DROP TABLE IF EXISTS `hdd_device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hdd_device` (
  `id_dev` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(45) DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `filetype` varchar(45) DEFAULT NULL,
  `mount_on` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_dev`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hdd_device`
--

LOCK TABLES `hdd_device` WRITE;
/*!40000 ALTER TABLE `hdd_device` DISABLE KEYS */;
INSERT INTO `hdd_device` VALUES (5,'192.168.11.31','/dev/sda6','ext4','/'),(6,'192.168.11.32','/dev/sda13','ext4','/dummy'),(7,'192.168.11.31','/dev/sda7','ext4','/home');
/*!40000 ALTER TABLE `hdd_device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hdd_status`
--

DROP TABLE IF EXISTS `hdd_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hdd_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(45) DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `filetype` varchar(45) DEFAULT NULL,
  `mount_on` varchar(45) DEFAULT NULL,
  `used` varchar(45) DEFAULT NULL,
  `free` varchar(45) DEFAULT NULL,
  `percent` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  `month` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hdd_status`
--

LOCK TABLES `hdd_status` WRITE;
/*!40000 ALTER TABLE `hdd_status` DISABLE KEYS */;
INSERT INTO `hdd_status` VALUES (88,'192.168.11.31','/dev/sda6','ext4','/','5358919680','3874504704','55.1','9727565824','21:55:01','27','04','2012'),(89,'192.168.11.31','/dev/sda6','ext4','/','5359013888','3874410496','55.1','9727565824','22:00:01','28','04','2012'),(90,'192.168.11.31','/dev/sda6','ext4','/','5359349760','3874074624','55.1','9727565824','22:05:01','29','04','2012'),(91,'192.168.11.31','/dev/sda6','ext4','/','5358698496','3874725888','55.1','9727565824','22:10:01','30','04','2012'),(92,'192.168.11.31','/dev/sda6','ext4','/','5358997504','3874426880','55.1','9727565824','22:15:02','01','05','2012'),(93,'192.168.11.31','/dev/sda6','ext4','/','5359792128','3873632256','55.1','9727565824','22:20:01','02','05','2012'),(94,'192.168.11.31','/dev/sda6','ext4','/','5360852992','3872571392','55.1','9727565824','22:25:01','03','05','2012'),(95,'192.168.11.31','/dev/sda6','ext4','/','5360590848','3872833536','55.1','9727565824','22:30:01','04','05','2012'),(96,'192.168.11.31','/dev/sda6','ext4','/','5360607232','3872817152','55.1','9727565824','22:35:01','05','05','2012'),(97,'192.168.11.31','/dev/sda6','ext4','/','5360558080','3872866304','55.1','9727565824','22:40:01','06','05','2012'),(98,'192.168.11.31','/dev/sda6','ext4','/','5378031616','3855392768','55.3','9727565824','22:45:02','07','05','2012'),(99,'192.168.11.31','/dev/sda6','ext4','/','5392785408','3840638976','55.4','9727565824','22:50:01','08','05','2012'),(100,'192.168.11.31','/dev/sda6','ext4','/','5406777344','3826647040','55.6','9727565824','22:55:01','09','05','2012'),(101,'192.168.11.31','/dev/sda6','ext4','/','5420900352','3812524032','55.7','9727565824','23:00:01','10','05','2012'),(102,'192.168.11.31','/dev/sda6','ext4','/','5432815616','3800608768','55.8','9727565824','23:05:02','11','05','2012'),(103,'192.168.11.31','/dev/sda6','ext4','/','5448478720','3784945664','56.0','9727565824','23:10:01','12','05','2012'),(104,'192.168.11.31','/dev/sda6','ext4','/','5451493376','3781931008','56.0','9727565824','23:15:06','13','05','2012'),(105,'192.168.11.31','/dev/sda6','ext4','/','5468766208','3764658176','56.2','9727565824','23:20:01','14','05','2012'),(106,'192.168.11.31','/dev/sda6','ext4','/','5477404672','3756019712','56.3','9727565824','23:25:02','15','05','2012'),(107,'192.168.11.31','/dev/sda6','ext4','/','5477703680','3755720704','56.3','9727565824','23:30:01','16','05','2012'),(108,'192.168.11.31','/dev/sda6','ext4','/','5477711872','3755712512','56.3','9727565824','23:35:01','17','05','2012'),(109,'192.168.11.31','/dev/sda6','ext4','/','5477756928','3755667456','56.3','9727565824','23:40:01','18','05','2012'),(110,'192.168.11.31','/dev/sda6','ext4','/','5481172992','3752251392','56.3','9727565824','23:45:01','19','05','2012'),(111,'192.168.11.31','/dev/sda6','ext4','/','5487198208','3746226176','56.4','9727565824','23:50:02','20','05','2012'),(112,'192.168.11.31','/dev/sda6','ext4','/','5486092288','3747332096','56.4','9727565824','14:45:01','21','05','2012'),(113,'192.168.11.31','/dev/sda6','ext4','/','5491621888','3741802496','56.5','9727565824','14:50:01','22','05','2012'),(114,'192.168.11.31','/dev/sda6','ext4','/','5495259136','3738165248','56.5','9727565824','15:05:02','23','05','2012'),(115,'192.168.11.31','/dev/sda6','ext4','/','5495472128','3737952256','56.5','9727565824','15:10:01','24','05','2012'),(116,'192.168.11.31','/dev/sda6','ext4','/','5496311808','3737112576','56.5','9727565824','15:15:01','25','05','2012'),(117,'192.168.11.31','/dev/sda6','ext4','/','5509607424','3723816960','56.6','9727565824','15:20:01','26','05','2012'),(118,'192.168.11.31','/dev/sda6','ext4','/','5527351296','3706073088','56.8','9727565824','15:25:01','27','05','2012'),(119,'192.168.11.31','/dev/sda6','ext4','/','5543833600','3689590784','57.0','9727565824','15:30:01','28','05','2012'),(120,'192.168.11.31','/dev/sda6','ext4','/','5558222848','3675201536','57.1','9727565824','15:35:01','29','05','2012'),(121,'192.168.11.31','/dev/sda6','ext4','/','5573103616','3660320768','57.3','9727565824','15:40:02','30','05','2012'),(122,'192.168.11.31','/dev/sda6','ext4','/','5582233600','3651190784','57.4','9727565824','15:45:01','31','05','2012'),(123,'192.168.11.31','/dev/sda7','ext4','/home','564654212','23122315','12.3','5465654564','21:53:12','31','05','2012'),(124,'192.168.11.31','/dev/sda7','ext4','/home','445646456454','545645215','33.1','45649875454','21:55:01','2','05','2012');
/*!40000 ALTER TABLE `hdd_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Rully','rully','rully','rully.lukman@gmail.com','2'),(2,'Ryan','ryan ','ryan',NULL,'2'),(3,'Sysadmin','sysadmin','admin123','','1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-19 19:13:22
