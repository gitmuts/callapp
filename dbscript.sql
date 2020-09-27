-- MySQL dump 10.13  Distrib 8.0.17, for Linux (x86_64)
--
-- Host: localhost    Database: snowbros_chessy
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `email_log`
--

DROP TABLE IF EXISTS `email_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` mediumtext NOT NULL,
  `sent_email_id` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_log`
--

LOCK TABLES `email_log` WRITE;
/*!40000 ALTER TABLE `email_log` DISABLE KEYS */;
INSERT INTO `email_log` VALUES (1,'1234','N/A','2020-01-16 21:02:10');
/*!40000 ALTER TABLE `email_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_sent`
--

DROP TABLE IF EXISTS `email_sent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_sent` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` mediumtext NOT NULL,
  `sent_email_id` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_sent`
--

LOCK TABLES `email_sent` WRITE;
/*!40000 ALTER TABLE `email_sent` DISABLE KEYS */;
INSERT INTO `email_sent` VALUES (1,'check bulk email','','2020-01-16 06:11:39');
/*!40000 ALTER TABLE `email_sent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_data`
--

DROP TABLE IF EXISTS `table_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) DEFAULT NULL,
  `body` text,
  `date_time` datetime DEFAULT NULL,
  `sending_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10777 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_data`
--

LOCK TABLES `table_data` WRITE;
/*!40000 ALTER TABLE `table_data` DISABLE KEYS */;
INSERT INTO `table_data` VALUES (10768,'254717746565','Test','2020-09-25 09:09:56','S'),(10769,'254717746565','Test','2020-09-25 09:24:34','R'),(10770,'254717746565','hello','2020-09-25 09:25:14','S'),(10771,'254717746565','Can\'t talk now. What\'s up?','2020-09-25 09:58:44','R'),(10772,'254717746565','I\'ll call you right back.','2020-09-25 11:58:01','R'),(10773,'254717746565','Testing bulk','2020-09-25 12:05:24','S'),(10774,'254717746565','Testing bulk','2020-09-25 12:05:25','S'),(10775,'254717746565','I\'ll call you later.','2020-09-25 21:20:50','R'),(10776,'254717746565','tezt','2020-09-26 18:46:13','S');
/*!40000 ALTER TABLE `table_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_blacklist`
--

DROP TABLE IF EXISTS `tapp_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_blacklist` (
  `number` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_blacklist`
--

LOCK TABLES `tapp_blacklist` WRITE;
/*!40000 ALTER TABLE `tapp_blacklist` DISABLE KEYS */;
INSERT INTO `tapp_blacklist` VALUES ('17802985832','','2020-03-20 23:55:59',2),('16474487402','','2020-03-21 01:06:00',3),('16477054923','','2020-03-21 01:06:45',4),('16472717753','','2020-03-21 01:07:31',5),('14169669767','','2020-03-21 01:19:02',6),('14169909390','','2020-03-25 17:46:09',7),('12899873291','','2020-03-25 17:48:26',8),('16478219961','','2020-03-25 18:14:30',9),('15147162727','','2020-03-25 18:14:59',10),('16135813324','','2020-03-25 18:15:39',11),('13065877531','','2020-03-30 22:51:00',12);
/*!40000 ALTER TABLE `tapp_blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_bulk_sms`
--

DROP TABLE IF EXISTS `tapp_bulk_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_bulk_sms` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(50) NOT NULL,
  `mobile_number` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_bulk_sms`
--

LOCK TABLES `tapp_bulk_sms` WRITE;
/*!40000 ALTER TABLE `tapp_bulk_sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_bulk_sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_call_forward`
--

DROP TABLE IF EXISTS `tapp_call_forward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_call_forward` (
  `id` int(11) NOT NULL,
  `caller` varchar(100) DEFAULT NULL,
  `reciever` varchar(100) DEFAULT NULL,
  `record` text,
  `duration` text,
  `date_time` text,
  `call_sid` text,
  `call_status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_call_forward`
--

LOCK TABLES `tapp_call_forward` WRITE;
/*!40000 ALTER TABLE `tapp_call_forward` DISABLE KEYS */;
INSERT INTO `tapp_call_forward` VALUES (0,'16476915145','923006446577','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE6adb73ac8ebcc2cd883cf3e4179e2e88.mp3','N/A','2020-06-23 23:14:59','N/A','N/A'),(0,' 16476915145',' 923006446577','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REd2571ff88b04a2e830acc3c54b04ff56.mp3','N/A','2020-06-23 23:59:22','N/A','N/A'),(0,' 16476915145',' 923006446577','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE070837a4d406803283904f743d4f1725.mp3','N/A','2020-06-24 00:05:33','N/A','N/A'),(0,' 923006446577',' 16476915145','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE5e7934f19ea8f67c3b779458f17a235b.mp3','N/A','2020-06-24 00:07:55','N/A','N/A'),(0,'16476915145','923006446577','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE42d045db66a9646a3e58594ba2f580d2.mp3','N/A','2020-06-24 00:18:20','N/A','N/A'),(0,' 923006446577',' 16476915145','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE1c294e254fd6e059227a740e9367abac.mp3','N/A','2020-06-24 00:18:47','N/A','N/A'),(0,'16477243933','8801764958940','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE1c9b33933c985fab2c2a4cbde0253f53.mp3','N/A','2020-06-24 18:24:38','N/A','N/A'),(0,'16477243933','923006446577','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REe3e83dd800d2f33cf4d5834a49797e51.mp3','N/A','2020-06-24 19:11:56','N/A','N/A'),(0,' 14166706589',' 16477243933','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE07921ee5395f9df48555e92cff4cdc14.mp3','N/A','2020-06-24 20:09:56','N/A','N/A'),(0,' 14802233901',' 19284332642','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE9563015869acb11cc82170b0c6db8ec5.mp3','N/A','2020-06-26 00:53:04','N/A','N/A'),(0,' 16477206031',' 16477243933','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE6c160b5e157d78a34aded209900e8e13.mp3','N/A','2020-07-03 21:04:05','N/A','N/A'),(0,' 17025180699',' 16477243933','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REac464927d8e1a5397e8246082340b270.mp3','N/A','2020-07-03 21:55:41','N/A','N/A'),(0,'16477243933','14162867800','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REa91297e179bea061459962f4c9207ac6.mp3','N/A','2020-07-08 19:20:50','N/A','N/A'),(0,'16477243933','14164100320','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE87cd664225f1e266a5fcbac5cbc50312.mp3','N/A','2020-07-08 19:21:58','N/A','N/A'),(0,'16477243933','16475609185','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE0a871c0e5e1c3c847d989d7712909abb.mp3','N/A','2020-07-08 19:22:49','N/A','N/A'),(0,'16477243933','16475599636','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE29cb69ad5b0bdd457c1fbd0afd075ac7.mp3','N/A','2020-07-08 19:23:36','N/A','N/A'),(0,'16477243933','14162713503','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE9f8d4ae4ea97bf994ca9193a5c3af308.mp3','N/A','2020-07-08 19:25:07','N/A','N/A'),(0,'16477243933','18667763336','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE44f5f5902794c564930c3d8055b87be3.mp3','N/A','2020-07-08 19:26:29','N/A','N/A'),(0,' 16472607344',' 16477243933','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REa97f548987ecfdeb2db631cd0c2abce9.mp3','N/A','2020-07-14 17:06:32','N/A','N/A'),(0,'16477243933','16472607344','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REf8b009ca41a7b78df1866ed335b5bd05.mp3','N/A','2020-07-14 19:14:24','N/A','N/A'),(0,'16477243933','16472607344','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE87661b3bd7d0be83c906d58703784833.mp3','N/A','2020-07-14 19:14:50','N/A','N/A'),(0,'16476915145','16472607344','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REf9d826c132acbc8633cae80af0d0046c.mp3','N/A','2020-07-14 19:15:21','N/A','N/A'),(0,'16477243933','16472607344','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REc4d7ffebf252a509c3c031dffadcc12e.mp3','N/A','2020-07-14 19:23:54','N/A','N/A'),(0,' 16474998106',' 16477243933','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REc3f9402ddcccc97bcd5c92c1f02bb2dd.mp3','N/A','2020-07-14 19:48:28','N/A','N/A'),(0,' 16477760422',' 16477243933','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REf96b637ba2950ade176f168cdff4365d.mp3','N/A','2020-07-23 01:31:28','N/A','N/A'),(0,'16477243933','14166179789','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REb8d732871e6d9a50423f5b466dcb0067.mp3','N/A','2020-07-28 20:19:46','N/A','N/A'),(0,'16477243933','14166179789','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE4afe8aaf7063d32fe8ac0e95fd28e5f9.mp3','N/A','2020-07-28 20:31:45','N/A','N/A'),(0,'16477243933','8801714204400','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE98b3b85bbe89828e994cc4f366e11ceb.mp3','N/A','2020-08-03 18:52:52','N/A','N/A'),(0,'16477243933','1014166179789','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REd58146f362a21774cb21812940929e00.mp3','N/A','2020-08-03 19:00:53','N/A','N/A'),(0,'16477243933','1014166179789','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE3c92603d8eafa8bf0f66c25f19718f44.mp3','N/A','2020-08-03 19:03:09','N/A','N/A'),(0,'16477243933','14166179789','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/REe56d1f55b00f3ae5284c956e9854bef2.mp3','N/A','2020-08-03 19:05:40','N/A','N/A'),(0,'16477243933','16476173608','https://api.twilio.com/2010-04-01/Accounts/AC8ac11ccf6953275a8023f63c44644a43/Recordings/RE62f591a2b9dcb51d520446061b094de6.mp3','N/A','2020-08-03 19:07:42','N/A','N/A');
/*!40000 ALTER TABLE `tapp_call_forward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_countries`
--

DROP TABLE IF EXISTS `tapp_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_countries` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sortname` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_countries`
--

LOCK TABLES `tapp_countries` WRITE;
/*!40000 ALTER TABLE `tapp_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_drft_msg`
--

DROP TABLE IF EXISTS `tapp_drft_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_drft_msg` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_drft_msg`
--

LOCK TABLES `tapp_drft_msg` WRITE;
/*!40000 ALTER TABLE `tapp_drft_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_drft_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_email_configuaration`
--

DROP TABLE IF EXISTS `tapp_email_configuaration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_email_configuaration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host_type` varchar(200) NOT NULL,
  `host_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `add_reply_to` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_email_configuaration`
--

LOCK TABLES `tapp_email_configuaration` WRITE;
/*!40000 ALTER TABLE `tapp_email_configuaration` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_email_configuaration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_groups`
--

DROP TABLE IF EXISTS `tapp_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_groups` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(500) NOT NULL,
  `number` varchar(1000) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `g_inx` (`group_name`),
  KEY `fi_name` (`first_name`),
  KEY `li_name` (`last_name`)
) ENGINE=MyISAM AUTO_INCREMENT=1030 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_groups`
--

LOCK TABLES `tapp_groups` WRITE;
/*!40000 ALTER TABLE `tapp_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_groups_log`
--

DROP TABLE IF EXISTS `tapp_groups_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_groups_log` (
  `id` int(100) unsigned NOT NULL DEFAULT '0',
  `group_name` varchar(500) NOT NULL,
  `number` varchar(1000) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `unsub_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_groups_log`
--

LOCK TABLES `tapp_groups_log` WRITE;
/*!40000 ALTER TABLE `tapp_groups_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_groups_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_keywords`
--

DROP TABLE IF EXISTS `tapp_keywords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_keywords` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(1000) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `client_email` varchar(500) NOT NULL,
  `client_address` varchar(100) DEFAULT NULL,
  `num_of_times` varchar(500) NOT NULL,
  `expiry_dates` date NOT NULL,
  `twilio_num` varchar(500) NOT NULL,
  `left_msg` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_keywords`
--

LOCK TABLES `tapp_keywords` WRITE;
/*!40000 ALTER TABLE `tapp_keywords` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_keywords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_list`
--

DROP TABLE IF EXISTS `tapp_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_list` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(50) NOT NULL,
  `number` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `list_name` (`list_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_list`
--

LOCK TABLES `tapp_list` WRITE;
/*!40000 ALTER TABLE `tapp_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_list_numbers`
--

DROP TABLE IF EXISTS `tapp_list_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_list_numbers` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(50) NOT NULL,
  `number` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_list_numbers`
--

LOCK TABLES `tapp_list_numbers` WRITE;
/*!40000 ALTER TABLE `tapp_list_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_list_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_message_newsletter`
--

DROP TABLE IF EXISTS `tapp_message_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_message_newsletter` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  `message_date` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_message_newsletter`
--

LOCK TABLES `tapp_message_newsletter` WRITE;
/*!40000 ALTER TABLE `tapp_message_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_message_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_msg_receive`
--

DROP TABLE IF EXISTS `tapp_msg_receive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_msg_receive` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) DEFAULT NULL,
  `body` text,
  `date_time` datetime DEFAULT NULL,
  `read_status` varchar(100) DEFAULT NULL,
  `mediaUrl` varchar(500) NOT NULL,
  `msg_read` varchar(100) DEFAULT NULL,
  `twilio_num` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1040 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_msg_receive`
--

LOCK TABLES `tapp_msg_receive` WRITE;
/*!40000 ALTER TABLE `tapp_msg_receive` DISABLE KEYS */;
INSERT INTO `tapp_msg_receive` VALUES (1036,'254717746565','Test','2020-09-25 02:24:34','Y','','0','12513068772'),(1037,'254717746565','Can\'t talk now. What\'s up?','2020-09-25 02:58:44','N','','0','12513068772'),(1038,'254717746565','I\'ll call you right back.','2020-09-25 04:58:01','N','','0','12513068772'),(1039,'254717746565','I\'ll call you later.','2020-09-25 14:20:50','N','','0','12513068772');
/*!40000 ALTER TABLE `tapp_msg_receive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_newletter_log`
--

DROP TABLE IF EXISTS `tapp_newletter_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_newletter_log` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(1000) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `mode` varchar(500) DEFAULT NULL,
  `unsub_date` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_newletter_log`
--

LOCK TABLES `tapp_newletter_log` WRITE;
/*!40000 ALTER TABLE `tapp_newletter_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_newletter_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_newsletter`
--

DROP TABLE IF EXISTS `tapp_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_newsletter` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(1000) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_newsletter`
--

LOCK TABLES `tapp_newsletter` WRITE;
/*!40000 ALTER TABLE `tapp_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_newsletter_log`
--

DROP TABLE IF EXISTS `tapp_newsletter_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_newsletter_log` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(1000) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `unsub_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_newsletter_log`
--

LOCK TABLES `tapp_newsletter_log` WRITE;
/*!40000 ALTER TABLE `tapp_newsletter_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_newsletter_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_poll`
--

DROP TABLE IF EXISTS `tapp_poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_poll` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `poll_name` varchar(1000) NOT NULL,
  `sms_number` varchar(500) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_poll`
--

LOCK TABLES `tapp_poll` WRITE;
/*!40000 ALTER TABLE `tapp_poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_poll_msg`
--

DROP TABLE IF EXISTS `tapp_poll_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_poll_msg` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `sms_number` varchar(1000) NOT NULL,
  `message` varchar(500) NOT NULL,
  `scheduled_for` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_poll_msg`
--

LOCK TABLES `tapp_poll_msg` WRITE;
/*!40000 ALTER TABLE `tapp_poll_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_poll_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_poll_msg_log`
--

DROP TABLE IF EXISTS `tapp_poll_msg_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_poll_msg_log` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `sms_number` varchar(1000) NOT NULL,
  `message` varchar(500) NOT NULL,
  `scheduled_for` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `msg_sent_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_poll_msg_log`
--

LOCK TABLES `tapp_poll_msg_log` WRITE;
/*!40000 ALTER TABLE `tapp_poll_msg_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_poll_msg_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_predrafted_message`
--

DROP TABLE IF EXISTS `tapp_predrafted_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_predrafted_message` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  `keywords` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_predrafted_message`
--

LOCK TABLES `tapp_predrafted_message` WRITE;
/*!40000 ALTER TABLE `tapp_predrafted_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_predrafted_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_received_responses`
--

DROP TABLE IF EXISTS `tapp_received_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_received_responses` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(1000) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  `Poll_Name` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_received_responses`
--

LOCK TABLES `tapp_received_responses` WRITE;
/*!40000 ALTER TABLE `tapp_received_responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_received_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_recevied_msg`
--

DROP TABLE IF EXISTS `tapp_recevied_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_recevied_msg` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `service_type` varchar(100) DEFAULT NULL,
  `sms_number` varchar(1000) NOT NULL,
  `twilio_num` varchar(500) NOT NULL,
  `msg_type` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_recevied_msg`
--

LOCK TABLES `tapp_recevied_msg` WRITE;
/*!40000 ALTER TABLE `tapp_recevied_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_recevied_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_reset_pass`
--

DROP TABLE IF EXISTS `tapp_reset_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_reset_pass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `unique_key` varchar(300) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_reset_pass`
--

LOCK TABLES `tapp_reset_pass` WRITE;
/*!40000 ALTER TABLE `tapp_reset_pass` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_reset_pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_reviews`
--

DROP TABLE IF EXISTS `tapp_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_reviews` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(10) DEFAULT NULL,
  `feedback` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_reviews`
--

LOCK TABLES `tapp_reviews` WRITE;
/*!40000 ALTER TABLE `tapp_reviews` DISABLE KEYS */;
INSERT INTO `tapp_reviews` VALUES ('Jassa','jassa@gmail.com',4,'great work!','2019-07-23 00:30:23');
/*!40000 ALTER TABLE `tapp_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_sent_email`
--

DROP TABLE IF EXISTS `tapp_sent_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_sent_email` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `service_type` varchar(100) DEFAULT NULL,
  `email` varchar(1000) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `twilio_num` varchar(100) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_sent_email`
--

LOCK TABLES `tapp_sent_email` WRITE;
/*!40000 ALTER TABLE `tapp_sent_email` DISABLE KEYS */;
INSERT INTO `tapp_sent_email` VALUES (17,'twilio','matharu.jassasingh4@gmail.com','check bulk email','1','','2020-01-16 06:11:39'),(18,'twilio','matharu.jassasingh4@gmail.com','check bulk email','1','','2020-01-16 06:11:39');
/*!40000 ALTER TABLE `tapp_sent_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_sent_email_log`
--

DROP TABLE IF EXISTS `tapp_sent_email_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_sent_email_log` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(1000) NOT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `twilio_num` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `scheduled_for` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_sent_email_log`
--

LOCK TABLES `tapp_sent_email_log` WRITE;
/*!40000 ALTER TABLE `tapp_sent_email_log` DISABLE KEYS */;
INSERT INTO `tapp_sent_email_log` VALUES (1,'usmanchattha1996@gmail.com','','','Hey',NULL,NULL,NULL,'2020-01-13 07:15:02'),(2,'usmanchatha1996@gmail.com','','','Hey',NULL,NULL,NULL,'2020-01-13 07:15:02'),(3,'usmanchattha1996@gmail.com','','','hey this is usman',NULL,NULL,NULL,'2020-01-13 07:40:02'),(4,'usmanchatha1996@gmail.com','','','hey this is usman',NULL,NULL,NULL,'2020-01-13 07:40:02'),(5,'usmanchatha1996@gmail.com','','','usman',NULL,NULL,NULL,'2020-01-14 04:30:02'),(6,'usmanchattha1996@gmail.com','','','usman',NULL,NULL,NULL,'2020-01-14 04:30:02'),(7,'usmanchatha1996@gmail.com','','','hey',NULL,NULL,NULL,'2020-01-14 04:30:03'),(8,'usmanchattha1996@gmail.com','','','hey',NULL,NULL,NULL,'2020-01-14 04:30:03'),(9,'usmanchatha1996@gmail.com','','','hy',NULL,NULL,NULL,'2020-01-14 04:40:02'),(10,'usmanchattha1996@gmail.com','','','hy',NULL,NULL,NULL,'2020-01-14 04:40:02'),(11,'usmanchatha1996@gmail.com','','','hey',NULL,NULL,NULL,'2020-01-15 03:05:01'),(12,'usmanchatha1996@gmail.com','','','hey',NULL,NULL,NULL,'2020-01-15 03:05:02'),(13,'matharu.jassasingh4@gmail.com',' ',' ','',NULL,NULL,NULL,'2020-01-16 05:52:42'),(14,'usmanchatha1996@gmail.com',' ',' ','1',NULL,NULL,NULL,'2020-01-16 21:02:10');
/*!40000 ALTER TABLE `tapp_sent_email_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_sent_msg`
--

DROP TABLE IF EXISTS `tapp_sent_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_sent_msg` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `service_type` varchar(100) DEFAULT NULL,
  `sms_number` varchar(1000) NOT NULL,
  `message` varchar(500) NOT NULL,
  `twilio_num` varchar(100) DEFAULT NULL,
  `images` varchar(300) NOT NULL,
  `bulk_name` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `scheduled_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11835 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_sent_msg`
--

LOCK TABLES `tapp_sent_msg` WRITE;
/*!40000 ALTER TABLE `tapp_sent_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_sent_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_sent_msg_failed`
--

DROP TABLE IF EXISTS `tapp_sent_msg_failed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_sent_msg_failed` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `service_type` varchar(100) DEFAULT NULL,
  `sms_number` varchar(1000) NOT NULL,
  `twilio_num` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `bulk_name` varchar(200) NOT NULL,
  `scheduled_for` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=934 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_sent_msg_failed`
--

LOCK TABLES `tapp_sent_msg_failed` WRITE;
/*!40000 ALTER TABLE `tapp_sent_msg_failed` DISABLE KEYS */;
INSERT INTO `tapp_sent_msg_failed` VALUES (932,NULL,'25417746565','12513068772','Hello there',NULL,'','unique_id5f6db3ae64148',NULL,'2020-09-25 09:09:03'),(933,NULL,'972523866630','12513068772','xzcfvs\rfdbdfb',NULL,'','unique_id5f6e1b1da6050',NULL,'2020-09-25 16:30:22');
/*!40000 ALTER TABLE `tapp_sent_msg_failed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_sent_msg_log`
--

DROP TABLE IF EXISTS `tapp_sent_msg_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_sent_msg_log` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `sms_number` varchar(1000) NOT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `twilio_num` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `bulk_name` varchar(200) NOT NULL,
  `scheduled_for` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8924 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_sent_msg_log`
--

LOCK TABLES `tapp_sent_msg_log` WRITE;
/*!40000 ALTER TABLE `tapp_sent_msg_log` DISABLE KEYS */;
INSERT INTO `tapp_sent_msg_log` VALUES (8920,'254717746565',NULL,'12513068772','Test',NULL,'','unique_id5f6db3e463082',NULL,'2020-09-25 09:09:56'),(8921,'254717746565',NULL,'12513068772','Testing bulk',NULL,'','sample_bulk.xlsx',NULL,'2020-09-25 12:05:24'),(8922,'254717746565',NULL,'12513068772','Testing bulk',NULL,'','sample_bulk.xlsx',NULL,'2020-09-25 12:05:25'),(8923,'254717746565',NULL,'12513068772','tezt',NULL,'','unique_id5f6f8c7540084',NULL,'2020-09-26 18:46:13');
/*!40000 ALTER TABLE `tapp_sent_msg_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_single_msg`
--

DROP TABLE IF EXISTS `tapp_single_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_single_msg` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `sms_number` varchar(1000) NOT NULL,
  `message` varchar(500) NOT NULL,
  `images` varchar(500) DEFAULT NULL,
  `scheduled_for` datetime DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_single_msg`
--

LOCK TABLES `tapp_single_msg` WRITE;
/*!40000 ALTER TABLE `tapp_single_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_single_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_stored_numbers`
--

DROP TABLE IF EXISTS `tapp_stored_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_stored_numbers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `sms_number` varchar(1000) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_stored_numbers`
--

LOCK TABLES `tapp_stored_numbers` WRITE;
/*!40000 ALTER TABLE `tapp_stored_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_stored_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_suscribers_list`
--

DROP TABLE IF EXISTS `tapp_suscribers_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_suscribers_list` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `list_name` varchar(1000) NOT NULL,
  `description` varchar(500) NOT NULL,
  `numbers` varchar(500) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_suscribers_list`
--

LOCK TABLES `tapp_suscribers_list` WRITE;
/*!40000 ALTER TABLE `tapp_suscribers_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_suscribers_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_table_data`
--

DROP TABLE IF EXISTS `tapp_table_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_table_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) DEFAULT NULL,
  `body` text,
  `date_time` datetime DEFAULT NULL,
  `sending_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_table_data`
--

LOCK TABLES `tapp_table_data` WRITE;
/*!40000 ALTER TABLE `tapp_table_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_table_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_tbl_clients`
--

DROP TABLE IF EXISTS `tapp_tbl_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_tbl_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) DEFAULT NULL,
  `body` text,
  `date_time` datetime DEFAULT NULL,
  `lead_date` date NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_location` text NOT NULL,
  `interest_level` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `twilio_num` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` text,
  `postal_code` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_tbl_clients`
--

LOCK TABLES `tapp_tbl_clients` WRITE;
/*!40000 ALTER TABLE `tapp_tbl_clients` DISABLE KEYS */;
INSERT INTO `tapp_tbl_clients` VALUES (5,'+8801714204400',NULL,'2020-03-05 20:32:15','0000-00-00','','','','','',NULL,'Golam Mostofa','','gmkhan41@gmail.com','','Dhaka, Bangladesh',0),(19,'14036153833',NULL,'2020-03-17 16:24:19','0000-00-00','','','','','',NULL,'Nirmal Hayer','','nirmalhayer@icloud.com','','Calgary-GarageDoor-AKAL',0),(18,'15614595531',NULL,'2020-03-16 23:52:26','0000-00-00','','','','','',NULL,'Kevin','','mr.hallkevin@gmail.com','','Canada',0),(17,'16475342617',NULL,'2020-03-16 23:44:30','0000-00-00','','','','','',NULL,'harold johnson','','info@phase-quest.com','','Canada',0),(16,'+15194003838',NULL,'2020-03-11 07:16:17','0000-00-00','','','','','',NULL,'Arun Joshi','','ajoshi2010@yahoo.com','','Guelph',0),(20,'254717746565',NULL,'2020-09-25 09:10:38','2020-09-25','1','1','1','1','1',NULL,'Gideon Mutai','1','gideonmutai98@gmail.com','1','69',1);
/*!40000 ALTER TABLE `tapp_tbl_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_tbl_leads`
--

DROP TABLE IF EXISTS `tapp_tbl_leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_tbl_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) DEFAULT NULL,
  `body` text,
  `date_time` datetime DEFAULT NULL,
  `lead_date` date NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_location` text NOT NULL,
  `interest_level` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `twilio_num` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` text,
  `postal_code` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_tbl_leads`
--

LOCK TABLES `tapp_tbl_leads` WRITE;
/*!40000 ALTER TABLE `tapp_tbl_leads` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_tbl_leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_template_msg`
--

DROP TABLE IF EXISTS `tapp_template_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_template_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `temp_type` varchar(200) NOT NULL,
  `date_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_template_msg`
--

LOCK TABLES `tapp_template_msg` WRITE;
/*!40000 ALTER TABLE `tapp_template_msg` DISABLE KEYS */;
INSERT INTO `tapp_template_msg` VALUES (1,'Urget Required','HI Please contact for urgent required.','SMS','2019-06-26'),(2,'10 day to expiration','Your Loan(s) will expire in 10 days','SMS','2019-07-11'),(3,'francis','Bonjour, jâ€™ai vu votre propriÃ©tÃ© sur Duproprio. Avez-vous pensÃ© Ã  lâ€™afficher aussi sur Centris sans frais afin de maximiser votre visibilitÃ©? Vous pouvez Ãªtre Ã  la fois sur Duproprio et sur Centris. Cela double votre visibilitÃ© et augmente vos chances de vendre plus rapidement. Lâ€™important est dâ€™obtenir le montant que vous dÃ©sirez dans vos poches. Si Ã§a vous intÃ©resse, contactez-moi au (514) 824-9190, Francis Rose, RE/MAX 2001 (Ne pas considÃ©rer lâ€™offre si vous avez dÃ©jÃ  un courtier).','SMS','2020-01-17'),(4,'FRANK2','Bonjour, jâ€™ai vu votre propriÃ©tÃ© sur Duproprio. Avez-vous pensÃ© Ã  lâ€™afficher aussi sur Centris sans frais afin de maximiser votre visibilitÃ©? Vous pouvez Ãªtre Ã  la fois sur Duproprio et sur Centris. Cela double votre visibilitÃ© et augmente vos chances de vendre plus rapidement. Lâ€™important est dâ€™obtenir le montant que vous dÃ©sirez dans vos poches. Si Ã§a vous intÃ©resse, contactez-moi (514) 824-9190, Francis Rose, REMAX 2001. Ne pas considÃ©rer si vous avez dÃ©jÃ  un courtier.','SMS','2020-01-20'),(5,'Frank(NEW)','Bonjour, jâ€™ai vu votre propriÃ©tÃ© sur Duproprio. Avez-vous pensÃ© Ã  la visibilitÃ© et Ã  la tonne dâ€™acheteur potentiel quâ€™un courtier pourrait vous apporter? Vous pouvez Ãªtre sur Duproprio et sur Centris. Cela double votre visibilitÃ© et augmente vos chances de vendre plus rapidement. Lâ€™important est dâ€™obtenir le montant que vous dÃ©sirez dans vos poches. Si Ã§a vous intÃ©resse, 514-824-9190, Francis Rose, RE/MAX. Ne pas considÃ©rer lâ€™offre si vous avez dÃ©jÃ  un courtier.','SMS','2020-02-17'),(6,'General Massage','HI, We are Providing Kijiji Ad Posting Service. Our Price Very reasonable and affordable. If you are Interested you can reply to us or can call me. Thanks ','SMS','2020-03-05'),(7,'CleanersCleaning-Kijiji','Are you looking for someone for your daily Kijiji Ad Posting Task? Look no further! We Proadpost.com here to assist you. ** WHAT YOU WILL GET WITH OUR SERVICE ** -->> ((a)) Interval Posting/Reposting (like every 30 min or every 1 hour, or any variation) ((b)) Able to advertise multiple Ads in Multiple Cities/Categories ((c)) Schedule Posting Support available for 24 Hours and 7 Days a Week ((d)) Real-Time Reporting (Able to Track Every Posting) ((e)) Ensuring BEST plan and PRICE to keep your ads always at the top of the search in Kijiji. For more information, you can visit our website: proadpost.com. or you can reply or call us to 6477243933','SMS','2020-03-09'),(8,'Call Massage','Are you looking for someone for your daily Kijiji Ad Posting Task? We PROADPOST.COM here to assist you. ** FOUR REASONS TO CHOOSE OUR SERVICE ** -->> 1. Always ensuring your ads on the first page. 2. Nationwide Posting with multiple categories 3. Posting service available for 24 Hours and 7 Days a Week 4. Get a Real-Time posting report. If you are interested you can reply or call us to 6477243933','SMS','2020-03-20');
/*!40000 ALTER TABLE `tapp_template_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_test`
--

DROP TABLE IF EXISTS `tapp_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_test` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `sms_number` varchar(1000) NOT NULL,
  `twilio_num` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_test`
--

LOCK TABLES `tapp_test` WRITE;
/*!40000 ALTER TABLE `tapp_test` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_twilio_account`
--

DROP TABLE IF EXISTS `tapp_twilio_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_twilio_account` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `service_type` varchar(150) DEFAULT NULL,
  `twilio_sid` varchar(500) NOT NULL,
  `twilio_token` varchar(1000) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_twilio_account`
--

LOCK TABLES `tapp_twilio_account` WRITE;
/*!40000 ALTER TABLE `tapp_twilio_account` DISABLE KEYS */;
INSERT INTO `tapp_twilio_account` VALUES (24,'twilio','ACcb70c406d4ff4714f00df187a122a31c','40823e6ac0f4a57b870a9775e0a3bf78','2018-05-23 00:00:00');
/*!40000 ALTER TABLE `tapp_twilio_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_twilio_number`
--

DROP TABLE IF EXISTS `tapp_twilio_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_twilio_number` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `service_type` varchar(150) DEFAULT NULL,
  `client_name` varchar(500) DEFAULT NULL,
  `number` varchar(1000) NOT NULL,
  `twilio_sid` varchar(200) DEFAULT NULL,
  `twilio_token` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `is_default` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_twilio_number`
--

LOCK TABLES `tapp_twilio_number` WRITE;
/*!40000 ALTER TABLE `tapp_twilio_number` DISABLE KEYS */;
INSERT INTO `tapp_twilio_number` VALUES (6,'twilio',NULL,'12513068772','ACcb70c406d4ff4714f00df187a122a31c','40823e6ac0f4a57b870a9775e0a3bf78','admin@gmail.com','','2020-09-25 09:07:54');
/*!40000 ALTER TABLE `tapp_twilio_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_unsub_keywords`
--

DROP TABLE IF EXISTS `tapp_unsub_keywords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_unsub_keywords` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(1000) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_unsub_keywords`
--

LOCK TABLES `tapp_unsub_keywords` WRITE;
/*!40000 ALTER TABLE `tapp_unsub_keywords` DISABLE KEYS */;
INSERT INTO `tapp_unsub_keywords` VALUES (1,'HELLO','Hi, thanks for your contact with Proadpost.com. We received your inquiry. We will get back to you as soon as possible','2020-03-31 16:28:24'),(2,'HI','Hi, thanks for your contact with Proadpost.com. We received your inquiry. We will get back to you as soon as possible','2020-03-31 16:28:38'),(3,'HOW MUCH','Hi, thanks for your contact with Proadpost.com. We received your inquiry. We will get back to you as soon as possible','2020-03-31 16:28:54'),(4,'RATES','Hi, thanks for your contact with Proadpost.com. We received your inquiry. We will get back to you as soon as possible','2020-03-31 16:29:10'),(5,'CHARGE','Hi, thanks for your contact with Proadpost.com. We received your inquiry. We will get back to you as soon as possible.','2020-03-31 16:29:36'),(6,'INTERESTED','Hi, thanks for your contact with Proadpost.com. We received your inquiry. We will get back to you as soon as possible','2020-03-31 16:30:22');
/*!40000 ALTER TABLE `tapp_unsub_keywords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_url_count`
--

DROP TABLE IF EXISTS `tapp_url_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_url_count` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(500) DEFAULT NULL,
  `link_id` int(10) unsigned NOT NULL,
  `link_count` varchar(500) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_url_count`
--

LOCK TABLES `tapp_url_count` WRITE;
/*!40000 ALTER TABLE `tapp_url_count` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_url_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_url_id`
--

DROP TABLE IF EXISTS `tapp_url_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_url_id` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_url_id`
--

LOCK TABLES `tapp_url_id` WRITE;
/*!40000 ALTER TABLE `tapp_url_id` DISABLE KEYS */;
/*!40000 ALTER TABLE `tapp_url_id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_user_login`
--

DROP TABLE IF EXISTS `tapp_user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_user_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `profile_image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_user_login`
--

LOCK TABLES `tapp_user_login` WRITE;
/*!40000 ALTER TABLE `tapp_user_login` DISABLE KEYS */;
INSERT INTO `tapp_user_login` VALUES (34,'admin','admin@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','super admin','2020-09-25 17:43:12','Capture.PNG');
/*!40000 ALTER TABLE `tapp_user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_voice_broadcast`
--

DROP TABLE IF EXISTS `tapp_voice_broadcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_voice_broadcast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `twilio_number` varchar(100) NOT NULL,
  `user_number` varchar(100) NOT NULL,
  `voice_file` text NOT NULL,
  `agent_number` varchar(100) NOT NULL,
  `readyToCall` varchar(100) DEFAULT 'ready',
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_voice_broadcast`
--

LOCK TABLES `tapp_voice_broadcast` WRITE;
/*!40000 ALTER TABLE `tapp_voice_broadcast` DISABLE KEYS */;
INSERT INTO `tapp_voice_broadcast` VALUES (18,'12513068772','972523866630','http://gitmuts.me/voice_upload/1601051353.mp3','0000000','ready','2020-09-25 16:29:12'),(19,'12513068772','972523866630','http://gitmuts.me/voice_upload/1601051394.mp3','0000000','ready','2020-09-25 16:29:54');
/*!40000 ALTER TABLE `tapp_voice_broadcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tapp_voice_broadcast_logs`
--

DROP TABLE IF EXISTS `tapp_voice_broadcast_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tapp_voice_broadcast_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `twilio_number` varchar(100) NOT NULL,
  `user_number` varchar(100) NOT NULL,
  `voice_file` text NOT NULL,
  `recording_url` text NOT NULL,
  `agent_number` varchar(100) NOT NULL,
  `is_called` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tapp_voice_broadcast_logs`
--

LOCK TABLES `tapp_voice_broadcast_logs` WRITE;
/*!40000 ALTER TABLE `tapp_voice_broadcast_logs` DISABLE KEYS */;
INSERT INTO `tapp_voice_broadcast_logs` VALUES (185,'12513068772','972548083989','','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REa036f3f868e700d361116b98b6c50785','','yes','2020-09-25 19:42:05'),(186,'12513068772','972548083989','','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE1f2f17c8f1e80eca738eac88036360cb','','yes','2020-09-25 19:42:44'),(187,'12513068772','9720548083989','','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REb846824ef8b57b1a15067c2e87251c45','','yes','2020-09-25 19:43:51'),(188,'12513068772','254717746565','','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE97c2fe71dbdcf9c7f70618a7d495d375','','yes','2020-09-25 19:49:02'),(189,'12513068772','254717746565','','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE3cc49d4f859dee1f90e57777dab81d3a','','yes','2020-09-25 19:50:08'),(190,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE0301e54e58f15d3a794278b68264abbf','','yes','2020-09-25 20:28:01'),(191,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REc6d494ed8ad5f722acf3bc56a535a0bb','','yes','2020-09-25 21:17:26'),(192,'12513068772','254717746565','busy','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE8e9abe8e0d89b87d2f7f4b974a9b1f56','','yes','2020-09-25 21:20:27'),(193,'12513068772','254717746565','completed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE7ca59a55e3059dec1a39061ef28d346e','','yes','2020-09-25 21:22:11'),(194,'12513068772','254717746565','busy','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE5d7a547c315fd7ebdd1fc0ec3a59cc59','','yes','2020-09-25 21:34:11'),(195,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REd5301023e3918bf3bbb8435dfb714ae9','','yes','2020-09-25 21:37:04'),(196,'12513068772','254717746565','completed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REe66d2e2c5e0ad70645aaaf5f68ac7432','','yes','2020-09-25 21:37:54'),(197,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REea5286d43c8f075b2160290c4d36bd28','','yes','2020-09-25 21:38:29'),(198,'12513068772','254717746565','busy','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REc9c29f68a98e7c5ddeb5adf546884742','','yes','2020-09-25 21:40:54'),(199,'12513068772','254717746565','busy','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REda936cb1626ac6ccf9e514e0ae8eeccd','','yes','2020-09-25 21:42:08'),(200,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REae416433008abf4b6605a77eb032eda8','','yes','2020-09-25 21:42:11'),(201,'12513068772','254717746565','completed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE97fcd2ee7e16141695fdc0dc0294814a','','yes','2020-09-25 21:43:21'),(202,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE0d87c913e3633ef8b62713f3fc70cd56','','yes','2020-09-25 21:44:17'),(203,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REf25d4be7baca7b46302a3db564fb3231','','yes','2020-09-25 21:46:18'),(204,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE801f5a72185a405ad528034fe874d5a8','','yes','2020-09-25 21:47:15'),(205,'12513068772','923006446577','no-answer','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE3ec7173cd463f32491e6bfcba0e89c4a','','yes','2020-09-25 21:48:07'),(206,'12513068772','972523288662','completed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REdee36a4694bd8c8c2eb4fba7034fb480','','yes','2020-09-26 09:29:43'),(207,'12513068772','972508340012','completed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REb0902fd72b81bd2c0618447a8a25cd46','','yes','2020-09-26 17:08:10'),(208,'12513068772','8801642366464','failed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE779ac5792bcff86debf3338180e8c369','','yes','2020-09-26 19:43:47'),(209,'12513068772','01642366464','failed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/REf0d1a73059b942d41e1da2ab5b1157e1','','yes','2020-09-26 19:44:38'),(210,'12513068772','880 1642-366464','failed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE06a3afda9a4ac0c1f39dd40d190aacde','','yes','2020-09-26 23:46:42'),(211,'12513068772','880 1642-366464','failed','https://api.twilio.com/2010-04-01/Accounts/ACcb70c406d4ff4714f00df187a122a31c/Recordings/RE90663491d84394720bdadce4e741027c','','yes','2020-09-26 23:47:08');
/*!40000 ALTER TABLE `tapp_voice_broadcast_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-27  5:53:56
