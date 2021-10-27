-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cbs
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `bookingNumber` varchar(255) NOT NULL,
  `ticketNumber` int NOT NULL,
  `movieTitle` varchar(255) NOT NULL,
  `showDate` varchar(255) NOT NULL,
  `showTime` varchar(255) NOT NULL,
  `promotionId` int DEFAULT NULL,
  `cardId` int DEFAULT NULL,
  `userId` varchar(255) NOT NULL,
  PRIMARY KEY (`bookingNumber`),
  KEY `ticketNumber` (`ticketNumber`),
  KEY `promotionId` (`promotionId`),
  KEY `movieTitle` (`movieTitle`),
  KEY `cardId` (`cardId`),
  KEY `userId` (`userId`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ticketNumber`) REFERENCES `ticket` (`ticketNumber`),
  CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`promotionId`) REFERENCES `promotion` (`id`),
  CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`movieTitle`) REFERENCES `movie` (`title`),
  CONSTRAINT `booking_ibfk_6` FOREIGN KEY (`cardId`) REFERENCES `payment_card` (`cardId`),
  CONSTRAINT `booking_ibfk_7` FOREIGN KEY (`userId`) REFERENCES `customer` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-26 21:49:46
