-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gemmes
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conversation` (
  `conversationId` int NOT NULL AUTO_INCREMENT,
  `conversationType` enum('binaire','groupe') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`conversationId`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation`
--

LOCK TABLES `conversation` WRITE;
/*!40000 ALTER TABLE `conversation` DISABLE KEYS */;
INSERT INTO `conversation` VALUES (1,'groupe'),(2,'groupe'),(3,'binaire'),(4,'binaire'),(5,'binaire'),(6,'binaire'),(7,'binaire'),(8,'binaire'),(9,'binaire'),(10,'binaire'),(11,'binaire'),(12,'groupe'),(13,'groupe'),(14,'binaire'),(15,'binaire'),(16,'binaire'),(17,'binaire'),(18,'binaire'),(19,'binaire'),(20,'binaire'),(21,'binaire'),(22,'binaire'),(23,'binaire'),(24,'groupe'),(25,'groupe'),(26,'binaire'),(27,'binaire'),(28,'binaire'),(29,'binaire'),(30,'binaire'),(31,'groupe'),(32,'groupe'),(33,'groupe'),(34,'binaire'),(35,'groupe'),(36,'groupe'),(37,'groupe'),(38,'groupe');
/*!40000 ALTER TABLE `conversation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gemmes`
--

DROP TABLE IF EXISTS `gemmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gemmes` (
  `gemmesID` int NOT NULL AUTO_INCREMENT,
  `gemmesNom` varchar(255) NOT NULL,
  `gemmesPrix` int NOT NULL,
  `gemmesLieu` varchar(255) NOT NULL,
  `gemmesDescription` text NOT NULL,
  `gemmesImage` varchar(255) NOT NULL,
  `rareteID` int DEFAULT NULL,
  `utilisateurID` int DEFAULT NULL,
  PRIMARY KEY (`gemmesID`),
  KEY `rareteID` (`rareteID`),
  KEY `FK_gemmes_utilisateurID` (`utilisateurID`),
  CONSTRAINT `FK_gemmes_utilisateur` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`),
  CONSTRAINT `FK_gemmes_utilisateurID` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`),
  CONSTRAINT `gemmes_ibfk_1` FOREIGN KEY (`rareteID`) REFERENCES `rarete` (`rareteID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gemmes`
--

LOCK TABLES `gemmes` WRITE;
/*!40000 ALTER TABLE `gemmes` DISABLE KEYS */;
INSERT INTO `gemmes` VALUES (1,'Diamant',1000,'Australie','pierre précieuse très dure et très brillante, composée de carbone cristallisé.','https://www.bracelet-chakra-blog.fr/wp-content/uploads/2019/09/Pierre-Diamant-978x800.jpg',4,NULL),(2,'Saphir',500,'Madagascar','pierre précieuse souvent bleue, bien que sa couleur puisse varier du violet au rose.','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/saphirs/saphir-ceylon.jpg',3,NULL),(3,'Rubis',100,'Birmanie','une pierre précieuse rouge profond','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/rubis.jpg',3,NULL),(4,'Emeraude',500,'Madagascar','pierre précieuse verte','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/emeraude.jpg',3,NULL),(5,'Aigue-marine',50,'Brésil','pierre précieuse bleu clair','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/aigue-marine-aaa.jpg',2,NULL),(6,'Grenat',20,'Inde','pierre rouge foncé','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/grenat-mozambique.jpg',2,NULL),(7,'Citrine',50,'Brésil','pierre jaune clair','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/citrine-madarine.jpg',1,NULL),(8,'Topaze',20,'Mexique','pierre multicolore qui peut présenter une grande variété de couleurs, notamment le bleu, le rose et le jaune','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/topaze-marambaia.jpg',1,NULL),(9,'Perle',10,'Madagascar','pierre organique produite par des mollusques','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/perle-doree.jpg',1,NULL),(10,'Améthyste',10,'Uruguay','pierre violet clair','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/amethyste-aaa.jpg',1,NULL),(44,'Obsidienne',100,'Minecraft','Bloc de roche violette tr&egrave;s r&eacute;sistante, elle se forme lors de la rencontre d&#039;un lac de lave avec de l&#039;eau. Cette roche ne peut &ecirc;tre min&eacute;e qu&#039;avec une pioche en diamant. C&#039;est la roche la plus dure (apr&egrave;s la bedrock) utilisable dans Minecraft.','https://fr-minecraft.net/img/blocs2/049-obsidienne.png',1,17),(45,'Lapis Lazuli',50,'Minecraft','Le lapis-lazuli (nom anglais : lapis lazuli) est un objet principalement obtenu en minant du minerai de lapis-lazuli. Il est utilisé pour créer de la teinture bleue et est nécessaire pour les enchantements d\'armures, d\'armes, d\'outils et de livres.','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRooWFTTwr3kqomqpXdU1Hd8dBoYR-gt6Vg7huirqjI43HkF3K9FKlWpSeO4v_ggA6qmhI&usqp=CAU',1,17);
/*!40000 ALTER TABLE `gemmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gemmes_type`
--

DROP TABLE IF EXISTS `gemmes_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gemmes_type` (
  `gemmesTypeId` int NOT NULL AUTO_INCREMENT,
  `gemmesID` int DEFAULT NULL,
  `typeID` int DEFAULT NULL,
  PRIMARY KEY (`gemmesTypeId`),
  KEY `gemmesID` (`gemmesID`),
  KEY `typeID` (`typeID`),
  CONSTRAINT `gemmes_type_ibfk_2` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gemmes_type`
--

LOCK TABLES `gemmes_type` WRITE;
/*!40000 ALTER TABLE `gemmes_type` DISABLE KEYS */;
INSERT INTO `gemmes_type` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,2),(6,6,4),(7,7,1),(8,8,3),(9,9,2),(10,10,2),(11,16,NULL),(12,17,NULL),(13,18,NULL),(14,19,NULL),(15,20,NULL),(16,21,NULL),(17,22,NULL),(18,27,1),(19,28,1),(20,29,1),(21,30,1),(22,31,1),(23,32,1),(24,33,1),(25,34,1),(26,35,1),(27,36,2),(28,37,3),(29,38,1),(30,39,3),(31,40,2),(32,41,2),(33,42,1),(34,NULL,NULL),(35,NULL,NULL),(36,NULL,1),(37,NULL,1),(38,NULL,1),(39,NULL,1),(40,NULL,1),(41,43,1),(42,NULL,1),(43,NULL,1),(44,NULL,1),(45,44,2),(46,NULL,1),(47,NULL,1),(48,45,1),(49,NULL,1),(50,46,1),(51,47,1),(52,48,1),(53,49,1),(54,50,1),(55,51,1),(56,52,1),(57,53,1),(58,54,1),(59,55,1);
/*!40000 ALTER TABLE `gemmes_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magasins`
--

DROP TABLE IF EXISTS `magasins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `magasins` (
  `magasinsID` int NOT NULL AUTO_INCREMENT,
  `magasinsNom` varchar(255) NOT NULL,
  `magasinsLieu` varchar(255) NOT NULL,
  PRIMARY KEY (`magasinsID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magasins`
--

LOCK TABLES `magasins` WRITE;
/*!40000 ALTER TABLE `magasins` DISABLE KEYS */;
INSERT INTO `magasins` VALUES (1,'Gemstones Express','Anvers'),(2,'GemmArt','Bruxelles'),(3,'Precious Traders','Gand'),(4,'Diamond Oasis','Liège'),(5,'Emerald Junction','Namur');
/*!40000 ALTER TABLE `magasins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `messageId` int NOT NULL AUTO_INCREMENT,
  `messageText` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `messageDate` date DEFAULT NULL,
  `messageHeure` time DEFAULT NULL,
  `utilisateurID` int DEFAULT NULL,
  `conversationId` int DEFAULT NULL,
  PRIMARY KEY (`messageId`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `conversationId` (`conversationId`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`conversationId`) REFERENCES `conversation` (`conversationId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,NULL,'2023-06-28','19:46:05',17,9),(3,'saaaa','2023-06-28','20:00:31',17,13),(4,'oui','2023-06-28','20:02:15',17,15),(12,'bonjour','2023-06-28','21:45:35',17,24),(18,'salu','2023-06-28','22:04:32',17,32),(19,'Ce message a été supprimé.','2023-06-28','22:51:15',17,27),(20,'Ce message a été supprimé.','2023-06-28','22:51:25',17,25),(21,'salut','2023-06-28','22:51:40',17,36),(22,'Ce message a été supprimé.','2023-06-28','22:53:28',17,38),(24,'oui salut','2023-06-28','22:55:14',1,38);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rarete`
--

DROP TABLE IF EXISTS `rarete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rarete` (
  `rareteID` int NOT NULL AUTO_INCREMENT,
  `raretelevel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rareteID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rarete`
--

LOCK TABLES `rarete` WRITE;
/*!40000 ALTER TABLE `rarete` DISABLE KEYS */;
INSERT INTO `rarete` VALUES (1,'Commun'),(2,'Peu commun'),(3,'Rare'),(4,'Epique'),(5,'Légendaire');
/*!40000 ALTER TABLE `rarete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `typeID` int NOT NULL AUTO_INCREMENT,
  `typeNom` varchar(255) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Gemmes Précieuses'),(2,'Gemmes Semi-Précieuses'),(3,'Gemmes Transparentes'),(4,'Gemmes Nacrées');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `utilisateurID` int NOT NULL AUTO_INCREMENT,
  `utilisateurLastname` varchar(100) DEFAULT NULL,
  `utilisateurSurname` varchar(100) DEFAULT NULL,
  `utilisateurEmail` varchar(255) DEFAULT NULL,
  `utilisateurMdp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`utilisateurID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,' Marc ',' Feure ','feur@site.asty-moulin.be',' marcmarc123 '),(2,'Adam',' Essalhi             ','200537@site.asty-moulin.be','   adamadam1234            '),(3,'Maxime','Pourquoi','Max@site.asty-moulin.be','maxmax123'),(4,'Ali','Albaba','200537@site.asty-moulin.be','aliali123'),(5,'Youssef','Alkattab','Youssef@site.asty-moulin.be','youyou123'),(17,'test','test','test@live.be','test'),(18,'Test2','Test2','test2@live.be','test2');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur_conversation`
--

DROP TABLE IF EXISTS `utilisateur_conversation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur_conversation` (
  `utilisateurConversationID` int NOT NULL AUTO_INCREMENT,
  `conversationId` int DEFAULT NULL,
  `utilisateurID` int DEFAULT NULL,
  PRIMARY KEY (`utilisateurConversationID`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `conversationId` (`conversationId`),
  CONSTRAINT `utilisateur_conversation_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`),
  CONSTRAINT `utilisateur_conversation_ibfk_2` FOREIGN KEY (`conversationId`) REFERENCES `conversation` (`conversationId`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur_conversation`
--

LOCK TABLES `utilisateur_conversation` WRITE;
/*!40000 ALTER TABLE `utilisateur_conversation` DISABLE KEYS */;
INSERT INTO `utilisateur_conversation` VALUES (1,3,17),(2,3,NULL),(3,4,17),(4,4,NULL),(5,5,17),(6,5,NULL),(7,6,17),(8,6,NULL),(9,7,17),(10,7,NULL),(11,8,17),(12,8,NULL),(13,9,17),(14,9,NULL),(15,10,17),(16,10,NULL),(17,11,17),(18,11,NULL),(19,14,17),(20,14,NULL),(21,15,17),(22,15,NULL),(23,16,17),(24,16,NULL),(25,17,17),(26,17,NULL),(27,18,17),(28,18,NULL),(29,19,17),(30,19,NULL),(31,20,17),(32,20,NULL),(33,21,17),(34,21,2),(35,22,17),(36,22,1),(37,23,17),(38,26,17),(39,27,17),(40,27,3),(41,28,17),(42,29,17),(43,29,4),(44,30,17),(45,30,18),(46,34,17),(47,34,5);
/*!40000 ALTER TABLE `utilisateur_conversation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs_gemmes_magasins`
--

DROP TABLE IF EXISTS `utilisateurs_gemmes_magasins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs_gemmes_magasins` (
  `utilisateurGemmesMagasinsID` int NOT NULL AUTO_INCREMENT,
  `gemmesID` int DEFAULT NULL,
  `utilisateurID` int DEFAULT NULL,
  `magasinsID` int DEFAULT NULL,
  PRIMARY KEY (`utilisateurGemmesMagasinsID`),
  KEY `gemmesID` (`gemmesID`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `magasinsID` (`magasinsID`),
  CONSTRAINT `utilisateurs_gemmes_magasins_ibfk_	1` FOREIGN KEY (`gemmesID`) REFERENCES `gemmes` (`gemmesID`),
  CONSTRAINT `utilisateurs_gemmes_magasins_ibfk_2` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`),
  CONSTRAINT `utilisateurs_gemmes_magasins_ibfk_3` FOREIGN KEY (`magasinsID`) REFERENCES `magasins` (`magasinsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs_gemmes_magasins`
--

LOCK TABLES `utilisateurs_gemmes_magasins` WRITE;
/*!40000 ALTER TABLE `utilisateurs_gemmes_magasins` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateurs_gemmes_magasins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-29  1:00:25
