-- MySQL dump 10.11
--
-- Host: localhost    Database: edenapps
-- ------------------------------------------------------
-- Server version	5.0.51a-3ubuntu5.8

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
-- Table structure for table `box`
--

DROP TABLE IF EXISTS `box`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `box` (
  `id` bigint(20) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `description` longtext,
  `picture` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `box`
--

LOCK TABLES `box` WRITE;
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` VALUES (1,'Pure Blonde','Test Description Hello James','d08d68452a88628479e17c907c1151802e3399ac.jpg');
/*!40000 ALTER TABLE `box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `members` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `level` varchar(255) default 'Bronze',
  `email` varchar(255) default NULL,
  `last_login` datetime default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Zuhair','Staff','hi.zuhair@gmail.com',NULL,'2010-12-26 05:06:05','2010-12-27 07:05:06'),(2,'James Eden','Gold','james@thecarlton.com.au','2011-01-01 07:02:00','2011-01-08 07:02:59','2011-05-17 13:38:48');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `menu_item` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `description` longtext,
  `picture` varchar(255) default NULL,
  `parent_id` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `parent_id_idx` (`parent_id`),
  CONSTRAINT `menu_item_parent_id_menu_item_id` FOREIGN KEY (`parent_id`) REFERENCES `menu_item` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `menu_item`
--

LOCK TABLES `menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item` DISABLE KEYS */;
INSERT INTO `menu_item` VALUES (1,'Food','Food','','',NULL),(2,'specials','Weekly Specials','','',1),(3,'Mondays','Mondays ~ $15 Parma & a Pot','Vote #1 Best Parma in town!','dfaf5775e80854f864c3aa03e96debc2662a1fdc.jpg',2),(4,'Tuesdays','Tuesdays ~ $14 Steak Night','A 200gm premium Porterhouse steak, cooked to your liking, with chips & salad\r\n\r\nall for only $14... \r\n\r\nCan\'t beat that!','3ee05cfca1063251d3ffc076a7f8211b1cceda0d.jpg',2),(5,'Wine','Wine','',NULL,NULL),(6,'Champagne and Sparkling','Champagne and Sparkling ','',NULL,5),(7,'White Wine','White Wine','',NULL,5),(8,'Rose','Rose','',NULL,5),(9,'Red Wines','Red Wines','',NULL,5),(10,'Dessert Wines','Dessert Wines','',NULL,5),(11,'Pierre de Ville Brut Reserve, NV France','Pierre de Ville Brut Reserve Glass $7.50','Pierre de Ville Brut Reserve, NV France.\r\n\r\nGlass $7.50  \r\n\r\nBottle $32.00','a5e9b21325f3a05854e05e4f842c1749ee371904.jpg',6),(12,'Rocky Gully Riesling, 2009 Frankland River, WA','Rocky Gully Riesling, 2009  Glass $8','Rocky Gully Riesling, 2009 \r\nFrankland River, WA\r\n\r\nGlass $8\r\n\r\nBottle $37','63247da8814bcbdb5fd1b150ff5ed8579c066477.jpg',7),(13,'Wirra Wirra \'Mrs Wrigley\' Rose, 2009 McLaren Vale, SA','Wirra Wirra \'Mrs Wrigley\' Rose, 2009 McLaren Vale, SA','Wirra Wirra \'Mrs Wrigley\' Rose, 2009 McLaren Vale, SA',NULL,8),(14,'Waipara Hills ‘Soul of the South’ Pinot Noir, Waipara, NZ','Waipara Hills ‘Soul of the South’ Pinot Noir, Waipara, NZ','Waipara Hills ‘Soul of the South’ Pinot Noir, Waipara, NZ','0d5d91565c99cc1c5000663e99b6006b5b53b1c3.jpg',9),(15,'Cookoothama Botrytis Semillon, 2007 (375ml) Riverin','Cookoothama Botrytis Semillon, 2007 (375ml) Riverin','Cookoothama Botrytis Semillon, 2007 (375ml) Riverin','950e6323e19c457a4766fe930bdb3ef633d20c5a.jpg',10),(16,'Jansz Brut \'Premium\', NV Pipers River, Tas','Jansz Brut \'Premium\'  Glass $12.50','Jansz Brut \'Premium\', NV Pipers River, Tas\r\n\r\nGlass $8.00    \r\n\r\nBottle $53.00','309abe9256f2188dd78ae197c3d72abe12ed1e5f.jpg',6),(17,'Carpene Malvolti Prosecco DOC, NV Conegliano, Italy','Carpene Malvolti Prosecco DOC Glass $9.00','Carpene Malvolti Prosecco DOC, NV Conegliano, Italy\r\n\r\nGlass $9.00\r\n\r\nBottle $45.00','8962a9983889575cbfc6fdc70eef84f511505efd.jpg',6),(18,'Bar Snacks','Bar Snacks','',NULL,1),(19,'Smoked almonds $5','Smoked almonds $5','Smoked almonds $5','2e7fc533bd73360212b55d2599f28e02969ff764.jpg',18),(20,'Marinated olives $6','Marinated olives $6','Marinated olives $6','04c9ead1a37049438f0a929c4c39385c6ef25392.jpg',18),(21,'Moët & Chandon Brut Imperial, NV Epernay, France $150','Moët & Chandon Brut Imperial','Moët & Chandon Brut Imperial, \r\nNV Epernay, France\r\n\r\nBottle $150','b1b75700920f41ef18e050869f7944213794d955.jpg',6),(22,'Moët & Chandon Brut Rose, 2003 Epernay, France 	  190','Moët & Chandon Brut Rose, 2003','Moët & Chandon Brut Rose, 2003 Epernay, France\r\n\r\nBottle $190','19da17bdde9626c408905b2d00758ab22e3aaac2.jpg',6),(23,'Bollinger \'Special Cuvee\', NV Ay, France          	  200','Bollinger \'Special Cuvee\'','Bollinger \'Special Cuvee\', NV Ay, France         \r\n	\r\nBottle $200','4d495bec0780fb05e5019219f560390cc0727f1b.jpg',6),(24,'Dining Room','Dining Room','',NULL,1),(25,'Oysters natural  - shucked to order  (½ dozen) $14 ','Oysters natural  -  (½ dozen) $14','Oysters natural  - shucked to order  \r\n(½ dozen) \r\n\r\n$14',NULL,24),(26,'Half shell spring bay scallops baked with potato aioli and breadcrumbs $13','Half shell spring bay scallops $13','Half shell spring bay scallops baked with potato aioli and breadcrumbs \r\n\r\n$13',NULL,24),(27,'Oysters natural - shucked to order (½ dozen) $14 ','Oysters natural - (½ dozen) $14 ','Oysters natural - shucked to order (½ dozen) \r\n\r\n$14 ','f9c8bcd07fba08784e61dd50a873de5e11726654.jpg',18),(28,'Ginger and soy glazed chicken wings with wasabi mayo $9','Ginger and soy glazed chicken wings $9','Ginger and soy glazed chicken wings with wasabi mayo \r\n\r\n$9',NULL,18),(29,'Calabrese salami with olives $8','Calabrese salami with olives $8','Calabrese salami with olives \r\n\r\n$8','0038bb382b092bd1516abafd67458712e94ea7d2.jpg',18),(30,'Chicken liver pate with candied walnuts, sauternes jelly and brioche $8.50','Chicken liver pate $8.50','Chicken liver pate with candied walnuts, sauternes jelly and brioche \r\n\r\n$8.50',NULL,18),(31,'Spiced calamari and piperade $12','Spiced calamari and piperade $12','Spiced calamari and piperade \r\n\r\n$12','7a046aee149308b1662d2d8c735b9a312e61a4d8.jpg',18),(32,'Crispy pork with aioli and salsa verde $9','Crispy pork with aioli $9','Crispy pork with aioli and salsa verde \r\n\r\n$9','1673776edd3e0e9cd1266aa5fc02c449f2d24c14.jpg',18),(33,'Crawford River Riesling, 2008 Western District, VIC 	  66','Crawford River Riesling, 2008  Glass $9','Crawford River Riesling, 2008 \r\nWestern District, VIC\r\n	\r\nGlass $9\r\n\r\nBottle $66','920e2eded72f220324a5c016e7fd93cd6f56d6f6.jpg',7),(34,'Lucky Cat Pinot Grigio, King Valley, Vic   	  40','Lucky Cat Pinot Grigio  Glass $8','Lucky Cat Pinot Grigio, King Valley, Vic  \r\n\r\nGlass $8	\r\n\r\nBottle $40','3729856cbff9d80d375177877d2ae21c68e0e6f2.jpg',7),(35,'Spirits','Spirits','',NULL,NULL),(36,'42Below','42 Below Vodka click to find out more...','Like it?  Click to Share and earn points.\r\n\r\nSome facts about 42 Below Vodka:\r\n\r\nThe water used to make 42 Below Vodka comes from beneath an extinct volcano and gets the highest purity rating available.\r\n\r\n42 Below is a little stronger than most other vodkas (84 proof). It uses a process that is closest to the grain (wheat) based vodka of Scandinavia. \r\n\r\n42 Below is made from GE-free wheat.',NULL,35);
/*!40000 ALTER TABLE `menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roster`
--

DROP TABLE IF EXISTS `roster`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `roster` (
  `id` bigint(20) NOT NULL auto_increment,
  `member_id` bigint(20) default NULL,
  `monday` varchar(255) default NULL,
  `tuesday` varchar(255) default NULL,
  `wednesday` varchar(255) default NULL,
  `thursday` varchar(255) default NULL,
  `friday` varchar(255) default NULL,
  `saturday` varchar(255) default NULL,
  `sunday` varchar(255) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `member_id_idx` (`member_id`),
  CONSTRAINT `roster_member_id_members_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `roster`
--

LOCK TABLES `roster` WRITE;
/*!40000 ALTER TABLE `roster` DISABLE KEYS */;
INSERT INTO `roster` VALUES (1,1,'1pm - 9pm','1pm - 9pm','Off','Off','4pm - 12am','4pm - 12am','8am - 4pm','2010-12-28 08:00:42','2011-01-08 07:14:33');
/*!40000 ALTER TABLE `roster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_forgot_password`
--

DROP TABLE IF EXISTS `sf_guard_forgot_password`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) default NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_forgot_password`
--

LOCK TABLES `sf_guard_forgot_password` WRITE;
/*!40000 ALTER TABLE `sf_guard_forgot_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_forgot_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group`
--

DROP TABLE IF EXISTS `sf_guard_group`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

DROP TABLE IF EXISTS `sf_guard_group_permission`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL default '0',
  `permission_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

DROP TABLE IF EXISTS `sf_guard_permission`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

DROP TABLE IF EXISTS `sf_guard_remember_key`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) default NULL,
  `remember_key` varchar(32) default NULL,
  `ip_address` varchar(50) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
INSERT INTO `sf_guard_remember_key` VALUES (2,1,'a8pdlni6ue8k4gwog8wog8w8sc8oso8','180.148.179.7','2011-05-13 01:46:59','2011-05-13 01:46:59');
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

DROP TABLE IF EXISTS `sf_guard_user`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `first_name` varchar(255) default NULL,
  `last_name` varchar(255) default NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL default 'sha1',
  `salt` varchar(128) default NULL,
  `password` varchar(128) default NULL,
  `is_active` tinyint(1) default '1',
  `is_super_admin` tinyint(1) default '0',
  `last_login` datetime default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (1,NULL,NULL,'james@deepeast.com.au','james','sha1','74096d1a7042bef55701fed6981b633c','45d216f94c78210177bc5ac30bb8dcb62c9ea4d3',1,0,'2011-05-17 13:30:53','2010-12-04 17:43:11','2011-05-17 13:30:53');
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

DROP TABLE IF EXISTS `sf_guard_user_group`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL default '0',
  `group_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

DROP TABLE IF EXISTS `sf_guard_user_permission`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL default '0',
  `permission_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shits_me_list`
--

DROP TABLE IF EXISTS `shits_me_list`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `shits_me_list` (
  `id` bigint(20) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `shits_me_list`
--

LOCK TABLES `shits_me_list` WRITE;
/*!40000 ALTER TABLE `shits_me_list` DISABLE KEYS */;
INSERT INTO `shits_me_list` VALUES (1,'Dont offer water','Serve water only if asked, don\'t proactively ask them if they want coz they will always say yes even if they dont really want any.'),(2,'Kitchen Stinks','Please throw the rotting ham away!'),(3,'Music too tacky','Not sure who\'s ipod we\'re playing of but most tracks from it sound like 70s porn theme songs..');
/*!40000 ALTER TABLE `shits_me_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-06-04  9:43:18
