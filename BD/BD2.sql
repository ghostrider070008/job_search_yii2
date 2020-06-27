-- MySQL dump 10.13  Distrib 8.0.14, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: job_search_db
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',1,'Администратор',NULL,NULL,1592236626,1592236626),('manager',1,'менеджер',NULL,NULL,1592236626,1592236626),('vacant',1,'Соискатель',NULL,NULL,1592236626,1592236626),('work',1,'Работадатель',NULL,NULL,1592236626,1592236626);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_region` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-cities-id_region` (`id_region`),
  CONSTRAINT `fk-cities-id_region` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,1,'Муром');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citizenship`
--

DROP TABLE IF EXISTS `citizenship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `citizenship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizenship`
--

LOCK TABLES `citizenship` WRITE;
/*!40000 ALTER TABLE `citizenship` DISABLE KEYS */;
INSERT INTO `citizenship` VALUES (1,'Российская федерация');
/*!40000 ALTER TABLE `citizenship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companyes`
--

DROP TABLE IF EXISTS `companyes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `companyes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk-companyes_user_id` (`user_id`),
  CONSTRAINT `fk-companyes_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companyes`
--

LOCK TABLES `companyes` WRITE;
/*!40000 ALTER TABLE `companyes` DISABLE KEYS */;
INSERT INTO `companyes` VALUES (1,1,'ООО \"Русь-Инфо\"','+7 (900) 000-00-00','my-test@mail.ru','2020-06-16 09:51:04'),(2,1,'ООО \"Вторая компания\"','+7 (900) 000-00-00','my@mail.ru','2020-06-16 12:53:05');
/*!40000 ALTER TABLE `companyes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrys`
--

DROP TABLE IF EXISTS `countrys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `countrys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrys`
--

LOCK TABLES `countrys` WRITE;
/*!40000 ALTER TABLE `countrys` DISABLE KEYS */;
INSERT INTO `countrys` VALUES (1,'Российская Федерация');
/*!40000 ALTER TABLE `countrys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educations`
--

LOCK TABLES `educations` WRITE;
/*!40000 ALTER TABLE `educations` DISABLE KEYS */;
INSERT INTO `educations` VALUES (1,'Высшее'),(2,'Среднее'),(3,'средне-техническое'),(4,'Неоконченное высшее');
/*!40000 ALTER TABLE `educations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employment`
--

DROP TABLE IF EXISTS `employment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `employment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employment`
--

LOCK TABLES `employment` WRITE;
/*!40000 ALTER TABLE `employment` DISABLE KEYS */;
INSERT INTO `employment` VALUES (1,'Полный день');
/*!40000 ALTER TABLE `employment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journalizations`
--

DROP TABLE IF EXISTS `journalizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `journalizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_operations` int(11) NOT NULL,
  `id_tables` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_journalizations_table_id` (`id_tables`),
  KEY `fk_journalizations_users_id` (`id_users`),
  KEY `fk_journalizations_id_operations` (`id_operations`),
  CONSTRAINT `fk_journalizations_id_operations` FOREIGN KEY (`id_operations`) REFERENCES `operations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_journalizations_table_id` FOREIGN KEY (`id_tables`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_journalizations_users_id` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journalizations`
--

LOCK TABLES `journalizations` WRITE;
/*!40000 ALTER TABLE `journalizations` DISABLE KEYS */;
INSERT INTO `journalizations` VALUES (1,1,21,15,'2020-06-17 16:32:09'),(2,1,17,1,'2020-06-21 03:28:27'),(3,1,17,1,'2020-06-21 03:28:49'),(4,1,17,1,'2020-06-21 03:29:26'),(5,1,17,1,'2020-06-21 03:55:25'),(6,1,17,1,'2020-06-21 03:58:05'),(7,1,17,1,'2020-06-21 03:58:37'),(8,1,17,1,'2020-06-21 03:59:36'),(9,1,17,1,'2020-06-21 03:59:52'),(10,1,17,1,'2020-06-21 04:00:18'),(11,1,17,1,'2020-06-21 04:00:54'),(12,1,17,1,'2020-06-21 04:04:05'),(13,1,17,12,'2020-06-21 09:52:43'),(14,1,13,12,'2020-06-23 10:22:03'),(15,1,13,12,'2020-06-23 10:31:26'),(16,2,13,1,'2020-06-24 13:49:16'),(17,1,22,1,'2020-06-24 15:42:07');
/*!40000 ALTER TABLE `journalizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users_sender` int(11) DEFAULT NULL,
  `id_users_recipient` int(11) DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_messages_user_id` (`id_users_sender`),
  KEY `fk_messages_user_id_recipient` (`id_users_recipient`),
  CONSTRAINT `fk_messages_user_id` FOREIGN KEY (`id_users_sender`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_messages_user_id_recipient` FOREIGN KEY (`id_users_recipient`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,1,2,'Второе сообщение','2020-06-16 16:49:16'),(3,3,1,'Мое сообщение от Михаила','2020-06-17 10:59:41'),(4,12,NULL,'Привет','2020-06-23 10:22:03'),(5,12,1,'Привет 2','2020-06-23 10:31:26');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1592236516),('m140506_102106_rbac_init',1592236574),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1592236574),('m180523_151638_rbac_updates_indexes_without_prefix',1592236574),('m200409_110543_rbac_update_mssql_trigger',1592236574),('m200608_063357_create_cities_table',1592236518),('m200608_064842_create_regions_table',1592236518),('m200608_065024_create_countrys_table',1592236518),('m200608_070800_add_fk_cities_id_region_ForeignKey',1592236518),('m200608_071110_create_FkRegionsIdCountrys_ForeignKey',1592236518),('m200608_091306_create_position_table',1592236518),('m200608_091427_create_educations_table',1592236518),('m200608_091637_create_companyes_table',1592236518),('m200608_092701_create_messages_table',1592236518),('m200608_094049_create_employment_table',1592236518),('m200608_094212_create_schedule_table',1592236518),('m200608_094312_create_citizenship_table',1592236518),('m200608_094404_create_gender_table',1592236518),('m200608_094425_create_status_table',1592236518),('m200608_102235_create_vacancy_table',1592236518),('m200608_163946_create_operations_table',1592236518),('m200608_164409_create_journalizations_table',1592236519),('m200608_171452_create_resumes_table',1592236519),('m200608_182117_create_FK_resume_id_city_ForeignKey',1592236519),('m200608_182535_create_FK_resume_id_citizenship_ForeignKey',1592236519),('m200608_182808_create_FK_resume_id_education_ForeignKey',1592236519),('m200608_183120_create_FK_resume_id_status_ForeignKey',1592236519),('m200609_184338_create_fk_vacancy_id_company',1592236519),('m200609_185123_create_fk_vacancy_id_status',1592236519),('m200609_185438_create_fk_vacancy_id_cities',1592236519),('m200609_185705_create_fk_vacancy_id_positions',1592236519),('m200609_190658_create_fk_vacancy_id_educations',1592236519),('m200609_191008_create_fk_vacancy_id_schedules',1592236519),('m200609_191317_create_fk_journalizations_id_operations',1592236519),('m200613_072111_create_users_table',1592236520),('m200615_125351_create_fk_resumes_user_id',1592236520),('m200616_105522_create_fk_companyes_user_id',1592305069),('m200616_205944_create_fk_messages_id_user_sender',1592341401),('m200616_210159_create_fk_messages_id_user_recipient',1592341401),('m200617_190345_drop_table_journalizations',1592421187),('m200617_190534_create_table_journalizations',1592421187),('m200617_190807_create_table_tables',1592421187),('m200617_191052_fk_journalizations_table_id',1592421187),('m200617_204556_create_fk_journalizations_users_id',1592421187),('m200618_042651_create_fk_journalizations_id_operations',1592454498);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operations`
--

DROP TABLE IF EXISTS `operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operations`
--

LOCK TABLES `operations` WRITE;
/*!40000 ALTER TABLE `operations` DISABLE KEYS */;
INSERT INTO `operations` VALUES (1,'Добавление'),(2,'Удаление'),(3,'Обновление');
/*!40000 ALTER TABLE `operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'Системный администратор'),(2,'Бухгалтер'),(3,'Слесарь'),(4,'Сантехник');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-regions-id_country` (`id_country`),
  CONSTRAINT `fk-regions-id_country` FOREIGN KEY (`id_country`) REFERENCES `countrys` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,1,'Владимирская область');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumes`
--

DROP TABLE IF EXISTS `resumes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `family` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronomic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_citi` int(11) DEFAULT NULL,
  `id_citizenship` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `id_education` int(11) DEFAULT NULL,
  `experience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `education` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `personal_qualities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-resume-id-city` (`id_citi`),
  KEY `fk-resume-id_citizenship` (`id_citizenship`),
  KEY `fk-resume-id-education` (`id_education`),
  KEY `fk-resume-id-status` (`id_status`),
  KEY `fk-resumes-user_id` (`id_user`),
  CONSTRAINT `fk-resume-id-city` FOREIGN KEY (`id_citi`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-resume-id-education` FOREIGN KEY (`id_education`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-resume-id-status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-resume-id_citizenship` FOREIGN KEY (`id_citizenship`) REFERENCES `citizenship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-resumes-user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumes`
--

LOCK TABLES `resumes` WRITE;
/*!40000 ALTER TABLE `resumes` DISABLE KEYS */;
INSERT INTO `resumes` VALUES (1,1,'Иванов','Иван','Иванович',1,30000,'+7 (999) 999-99-99','my@mail.ru',1,1,'2001-06-20',1,'123','123','123',1,1592252656,1592252656),(2,1,'Иванов','Иван','Иванович',1,30000,'+7 (999) 999-99-99','my@mail.ru',1,1,'2001-06-20',1,'123','123','123',1,1592252669,1592252741),(3,1,'Васильев','Николай','Александрович',1,20554,'+7 (900) 000-00-00','my@mail.ru',1,1,'2024-06-20',1,'Мой опыт работы','Мое образование','Мои личные качества',1,1592310788,1592310788),(7,1,'','','',NULL,NULL,'','',NULL,NULL,'2027-05-20',NULL,'','','',NULL,1592722525,1592722525),(8,1,'','','',NULL,NULL,'','',NULL,NULL,'1970-01-01',NULL,'','','',NULL,1592722685,1592722685),(9,1,'','','',NULL,NULL,'','',NULL,NULL,'1970-01-01',NULL,'','','',NULL,1592722717,1592722717),(10,1,'','','',NULL,NULL,'','',NULL,NULL,'2006-05-20',NULL,'','','',NULL,1592722776,1592722776),(11,1,'Николаев','Максим','Игорьевич',1,NULL,'','',NULL,NULL,'2006-05-20',NULL,'','','',NULL,1592722792,1592722792),(12,1,'Николаев','Максим','Игорьевич',1,30547,'+7 (900) 000-00-00','nikolay@mail.ru',1,1,'2006-05-20',2,'','','',NULL,1592722818,1592722818),(13,1,'Николаев','Максим','Игорьевич',1,30547,'+7 (900) 000-00-00','nikolay@mail.ru',1,1,'2006-05-20',2,'Проработал на СЗТА 5 лет слесарем','11 классов','',1,1592722854,1592722854),(14,1,'','','',NULL,NULL,'+7 (900) 000-00-00','',NULL,NULL,'2024-06-20',NULL,'','','',NULL,1592723045,1592723045),(15,12,'Николаев','2334','234',4,2347876,'+7 (900) 000-00-00','',NULL,NULL,NULL,NULL,'','','',1,1592743963,1592743963);
/*!40000 ALTER TABLE `resumes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'Полный день');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Активное'),(2,'Нашли работу/ Нашли работника'),(3,'Архивное');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (1,'auth_assignment'),(2,'auth_item'),(3,'auth_item_child'),(4,'auth_rule'),(5,'cities'),(6,'citizenship'),(7,'companyes'),(8,'countrys'),(9,'educations'),(10,'employment'),(11,'gender'),(12,'journalizations'),(13,'messages'),(14,'migrations'),(15,'operations'),(16,'positions'),(17,'resumes'),(18,'schedule'),(19,'status'),(20,'tables'),(21,'users'),(22,'vacancy');
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','1_veQuWbnLGGXfvKA80quJSWqe84dT3B','$2y$13$4GicD0BMXggQhlgRIeNVa.wgAqsQbQyJuhxHx07he4Ny7aa9WmpTm','admin@mail.ru',10,1592236646,1592236646),(2,'work','work','ziJp8rGEh4DpVJwEfsUHYFXMVx-MRj94','$2y$13$RMGAVoQn2IdneVs9/F5TpuW92j3syllQUIiDQvG4F6MOrSbDUh6Bq','work@mail.ru',10,1592334389,1592334389),(3,'work','mihail','8FRSs-EzMuPwxTAtZx4qqfukITyZtf0V','$2y$13$T4spVHNxNJQpE3JxZgXIe.J25yBEZOqFoYJaZ0KZxJr.IsqLDrDtW','mihail@mail.ru',10,1592402320,1592402320),(12,'vacant','admin1','lVcWMHfqTZph1y4uqLI262SoD6KsbMDH','$2y$13$a9ti0y8Np2ZA2M9wupAN3umNlUWk46c7Om0ezq1HbYF04H9GzMBNG','adm@mail.ru',10,1592415955,1592415955),(13,'vacant','adm2','8ozGzSkLNK8W6ILvpjzeDI3gDPwPtZ_-','$2y$13$bhj9aTtOWrlqZstztZ34EumslfvZJnDuxfKb5ae9ORhzcGD5vyLfi','adm2@mail.ru',10,1592415994,1592415994),(14,'work','admin123','xsXy2lZQznCYMTGVxgRtF7VSVvPpXz9a','$2y$13$DIBm9iYlHWozQLdZzMHlmO.aIyWp/FPdSUBO10.GTIqhGjX.4xm8e','123@mail.ru',10,1592421939,1592421939),(15,'work','admin123456','8OWOOlFMEgUFVMP_ZNtKESUCn5QgNZu2','$2y$13$R6lpTHP68zTlusmBD1cmuuCNFmZxrDhRYwhXqRpXUXJxgmDAvsCrW','456@mail.ru',10,1592422329,1592422329);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersi`
--

DROP TABLE IF EXISTS `usersi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usersi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `hash_passw` varchar(255) DEFAULT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersi`
--

LOCK TABLES `usersi` WRITE;
/*!40000 ALTER TABLE `usersi` DISABLE KEYS */;
INSERT INTO `usersi` VALUES (1,'admin','$2y$13$G/UVztK48VnX9AEi8M7Ou.3YJw2nDPNEYl/YPMrNSwkGigYxpvSd6','admin@mail.ru','2020-06-12 11:11:25',NULL),(2,'admin','$2y$13$6jaGXJAXxmfs5VFyEYhQ3u5mL1noDoIEAcHO3ay6IMshwzucvA22G','admin@mail.ru','2020-06-13 06:54:16',NULL),(3,'admin','$2y$13$z2I5TWW6dOxvwtqLgvD.cOCD6MdDaMq7IHR3VJG/fKKOm5dXpa1dC','admin@mail.ru','2020-06-20 16:46:31',NULL),(4,'admin','$2y$13$2c460FEw3wF6lcnbISsAweEpaB8RuR4lDs8rSOdfhpbKGx4p4DIZm','admin@mail.ru','2020-06-23 11:48:38',NULL),(5,'admin','$2y$13$9RLPr8PLTIYzfF5smElFr.WRqpYLYalUqRtzxKpOANrQIuNCdbEem','admin@mail.ru','2020-06-24 06:28:40',NULL);
/*!40000 ALTER TABLE `usersi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_companyes` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_cities` int(11) NOT NULL,
  `id_positions` int(11) DEFAULT NULL,
  `id_educations` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `id_schedules` int(11) DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk-vacancy-id-company` (`id_companyes`),
  KEY `fk-vacancy-id-status` (`id_status`),
  KEY `fk-vacancy-id-cities` (`id_cities`),
  KEY `fk-vacancy-id-positions` (`id_positions`),
  KEY `fk-vacancy-id-educations` (`id_educations`),
  KEY `fk-vacancy-id-schedules` (`id_schedules`),
  CONSTRAINT `fk-vacancy-id-cities` FOREIGN KEY (`id_cities`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-vacancy-id-company` FOREIGN KEY (`id_companyes`) REFERENCES `companyes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-vacancy-id-educations` FOREIGN KEY (`id_educations`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-vacancy-id-positions` FOREIGN KEY (`id_positions`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-vacancy-id-schedules` FOREIGN KEY (`id_schedules`) REFERENCES `schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-vacancy-id-status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancy`
--

LOCK TABLES `vacancy` WRITE;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` VALUES (1,1,1,1,1,1,30000,1,'12324','+7 (900) 000-00-00','my@mail.ru','2020-06-17 14:50:32'),(2,2,1,1,3,1,50000,1,'Обязанности:\r\nРазборка, ремонт, сборка и испытание узлов и механизмов оборудования;\r\nРемонт простого оборудования;\r\nПромывка, чистка, смазка деталей.\r\nДолжен знать:\r\n\r\n- Основные приемы выполнения работ по разборке, ремонту и сборке простых узлов и механизмов оборудования\r\n\r\nООО \"Муромский завод трубопроводной арматуры\" - динамично развивающееся предприятие. Мы обеспечиваем своевременную выплату заработной платы, гарантируем полный соцпакет, соблюдение трудового законодательства. На предприятии предусмотрено обучение по различным программам и повышение квалификации персонала.','+7 (900) 000-00-00','my-email@mail.ru','2020-06-24 15:42:07');
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-25 11:09:40
