-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rumc_spo
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catalogs`
--

DROP TABLE IF EXISTS `catalogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogs` (
  `idCatalog` int NOT NULL AUTO_INCREMENT,
  `globalCatalog` varchar(100) NOT NULL,
  `nameCatalog` varchar(100) NOT NULL,
  `author` int NOT NULL,
  PRIMARY KEY (`idCatalog`),
  UNIQUE KEY `nameCatalog_UNIQUE` (`nameCatalog`),
  KEY `fk_idAuthor_idx` (`author`),
  CONSTRAINT `fk_idAuthor` FOREIGN KEY (`author`) REFERENCES `users` (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogs`
--

LOCK TABLES `catalogs` WRITE;
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` VALUES (111,'basicinfo','Методические материалы',5),(113,'basicinfo','Типовые документы',5),(114,'basicinfo','Положения',5),(115,'basicinfo','Приказы',5),(116,'basicinfo','Постановления и Распоряжения',5),(117,'basicinfo','Федеральные законы',5),(118,'basicinfo','Указы Президента',5),(124,'docsProf','Атлас доступных профессий',3);
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `idEvent` int NOT NULL AUTO_INCREMENT,
  `tittle` varchar(100) NOT NULL,
  `eventText` varchar(800) NOT NULL,
  `dateEvent` date NOT NULL,
  `datePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tittleImage` varchar(255) NOT NULL,
  `idUsers` int NOT NULL,
  `idType` int NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `fk_Event_Users_idx` (`idUsers`),
  KEY `fk_Type_event_idx` (`idType`),
  CONSTRAINT `fk_Event_Users` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`),
  CONSTRAINT `fk_Type_event` FOREIGN KEY (`idType`) REFERENCES `type_event` (`idtype_event`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (38,'Порядок создания и функционирования психолого-педагогического консилиума профессиональной образовате','12312312','2026-05-25','2026-05-15 12:10:21','images/eventIMG/tittles/1778847021OE-BMW-E36-E46-M43-BAGNET-MIARKA-POZIOMU-OLEJU-Numer-katalogowy-czesci-11431247530.jpeg',2,2);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_photos`
--

DROP TABLE IF EXISTS `event_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_photos` (
  `idevent_photos` int NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `idevent` int NOT NULL,
  PRIMARY KEY (`idevent_photos`),
  UNIQUE KEY `path_UNIQUE` (`path`),
  KEY `fk_idevent_idx` (`idevent`),
  CONSTRAINT `fk_idevent` FOREIGN KEY (`idevent`) REFERENCES `event` (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_photos`
--

LOCK TABLES `event_photos` WRITE;
/*!40000 ALTER TABLE `event_photos` DISABLE KEYS */;
INSERT INTO `event_photos` VALUES (73,'images/eventIMG/Порядок создания и функционирования психологопедагогического консилиума профессиональной образовате/177884702161275286_zaschita-dvigatelya-bmw-3-e46-51718260810.jpg',38),(74,'images/eventIMG/Порядок создания и функционирования психологопедагогического консилиума профессиональной образовате/1778847021OE-BMW-E36-E46-M43-BAGNET-MIARKA-POZIOMU-OLEJU-Numer-katalogowy-czesci-11431247530.jpeg',38);
/*!40000 ALTER TABLE `event_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_video`
--

DROP TABLE IF EXISTS `event_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_video` (
  `idevent_video` int NOT NULL AUTO_INCREMENT,
  `path` varchar(700) NOT NULL,
  `idevent` int NOT NULL,
  PRIMARY KEY (`idevent_video`),
  KEY `fk_ideventvid_idx` (`idevent`),
  CONSTRAINT `fk_ideventvid` FOREIGN KEY (`idevent`) REFERENCES `event` (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_video`
--

LOCK TABLES `event_video` WRITE;
/*!40000 ALTER TABLE `event_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kursi`
--

DROP TABLE IF EXISTS `kursi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kursi` (
  `idkursi` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `type` enum('Базовый уровень','Продвинутый уровень','') DEFAULT NULL,
  `status` enum('закрыт','открыт') NOT NULL DEFAULT 'закрыт',
  `dateStart` varchar(20) DEFAULT '-',
  `dateClose` varchar(20) DEFAULT '-',
  `link` varchar(300) DEFAULT NULL,
  `author` int NOT NULL,
  PRIMARY KEY (`idkursi`),
  KEY `fk_authorKursi_idx` (`author`),
  CONSTRAINT `fk_authorKursi` FOREIGN KEY (`author`) REFERENCES `users` (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kursi`
--

LOCK TABLES `kursi` WRITE;
/*!40000 ALTER TABLE `kursi` DISABLE KEYS */;
INSERT INTO `kursi` VALUES (23,'Подготовка экспертов чемпионатов по профессиональному мастерству «Абилимпикс» по компетенции',NULL,'images/courses/2.jpg',NULL,'открыт','-','-',NULL,2),(24,'Содержательно-методические основы организации и проведения чемпионатов «Абилимпикс» на региональном уровне',NULL,'images/courses/1.jpg',NULL,'закрыт','-','-',NULL,2),(25,'Дополнительная профессиональная программа повышения квалификации педагогических работников по освоению компетенций, необходимых для работы с обучающимися с инвалидностью и ограниченными возможностями здоровья',NULL,'images/courses/7.jpg',NULL,'открыт','-','-',NULL,2),(26,'Технологии работы преподавателя с обучающимися с особыми образовательными потребностями в условиях инклюзивного образования',NULL,'images/courses/8.jpg',NULL,'закрыт','-','-',NULL,2),(27,'Порядок создания и функционирования психолого-педагогического консилиума профессиональной образовательной организации',NULL,'images/courses/5.jpg',NULL,'открыт','-','-',NULL,2),(28,'Разработка примерных адаптированных образовательных программ среднего профессионального образования',NULL,'images/courses/6.jpg',NULL,'закрыт','-','-',NULL,2),(29,'Профессиональное копинг-поведение педагогов инклюзивного образования – модель и технологии сопровождения',NULL,'images/courses/9.jpg',NULL,'открыт','-','-',NULL,2),(30,'Инклюзивное профессиональное образование в условиях его цифровизации',NULL,'images/courses/3.jpg',NULL,'закрыт','-','-',NULL,2),(31,'Межведомственное взаимодействие с целью удовлетворения потребностей инвалидов и лиц с ОВЗ в профессиональной адаптации',NULL,'images/courses/10.jpg',NULL,'открыт','-','-',NULL,2),(32,'Межведомственное взаимодействие с целью удовлетворения потребностей инвалидов и лиц с ОВЗ в профобразовании',NULL,'images/courses/4.jpg',NULL,'закрыт','-','-',NULL,2),(33,'Межведомственное взаимодействие с целью удовлетворения потребностей инвалидов и лиц с ОВЗ в трудоустройстве',NULL,'images/courses/11.jpg',NULL,'открыт','-','-',NULL,2);
/*!40000 ALTER TABLE `kursi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_event`
--

DROP TABLE IF EXISTS `type_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_event` (
  `idtype_event` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idtype_event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_event`
--

LOCK TABLES `type_event` WRITE;
/*!40000 ALTER TABLE `type_event` DISABLE KEYS */;
INSERT INTO `type_event` VALUES (1,'Мероприятие'),(2,'Вебинар'),(3,'Другое');
/*!40000 ALTER TABLE `type_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `idUsers` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `verif` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Admin1','Admin','Admin1','123',1),(3,'Admin2','Admin','Admin2','123',1),(5,'Admin3','Admin','Admin3','123',1);
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

-- Dump completed on 2026-06-18 13:00:33
