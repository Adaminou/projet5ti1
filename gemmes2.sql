CREATE DATABASE  IF NOT EXISTS `gemmes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gemmes`;
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
INSERT INTO `gemmes` VALUES (1,'Diamant',1000,'Australie','pierre précieuse très dure et très brillante, composée de carbone cristallisé.','https://www.bracelet-chakra-blog.fr/wp-content/uploads/2019/09/Pierre-Diamant-978x800.jpg',4,NULL),(2,'Saphir',500,'Madagascar','pierre précieuse souvent bleue, bien que sa couleur puisse varier du violet au rose.','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/saphirs/saphir-ceylon.jpg',3,NULL),(3,'Rubis',100,'Birmanie','une pierre précieuse rouge profond','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/rubis.jpg',3,NULL),(4,'Emeraude',500,'Madagascar','pierre précieuse verte','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/emeraude.jpg',3,NULL),(5,'Aigue-marine',50,'Brésil','pierre précieuse bleu clair','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/aigue-marine-aaa.jpg',2,NULL),(6,'Grenat',20,'Inde','pierre rouge foncé','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/grenat-mozambique.jpg',2,NULL),(7,'Citrine',50,'Brésil','pierre jaune clair','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/citrine-madarine.jpg',1,NULL),(8,'Topaze',20,'Mexique','pierre multicolore qui peut présenter une grande variété de couleurs, notamment le bleu, le rose et le jaune','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/topaze-marambaia.jpg',1,NULL),(9,'Perle',10,'Madagascar','pierre organique produite par des mollusques','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/perle-doree.jpg',1,NULL),(10,'Améthyste',10,'Uruguay','pierre violet clair','https://www.juwelo.fr/media/wysiwyg/guide-des-pierres/amethyste-aaa.jpg',1,NULL),(44,'Obsidienne',100,'Minecraft','Bloc de roche violette très résistante, elle se forme lors de la rencontre d\'un lac de lave avec de l\'eau. Cette roche ne peut être minée qu\'avec une pioche en diamant. C\'est la roche la plus dure (après la bedrock) utilisable dans Minecraft.','https://fr-minecraft.net/img/blocs2/049-obsidienne.png',1,17),(45,'Lapis Lazuli',50,'Minecraft','Le lapis-lazuli (nom anglais : lapis lazuli) est un objet principalement obtenu en minant du minerai de lapis-lazuli. Il est utilisé pour créer de la teinture bleue et est nécessaire pour les enchantements d\'armures, d\'armes, d\'outils et de livres.','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRooWFTTwr3kqomqpXdU1Hd8dBoYR-gt6Vg7huirqjI43HkF3K9FKlWpSeO4v_ggA6qmhI&usqp=CAU',1,17);
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

-- Dump completed on 2023-06-08  4:31:59
