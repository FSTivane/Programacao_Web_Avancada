-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: aulas_db
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
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aulas` (
  `aula_id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `turma` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `id_professor` int NOT NULL,
  PRIMARY KEY (`aula_id`),
  KEY `fk_id_professor` (`id_professor`),
  CONSTRAINT `fk_id_professor` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (3,'Diagrama de Actividades','2023-05-19','ETSI 3ano PL','ADOO',4),(4,'Diagrama de Estados','2023-05-17','ETSI 3ano PL','ADOO',4),(6,'Mother board','2020-03-10','ETSI 1ano PL','II',2),(8,'Infraestrutura TI','2023-05-25','ETSI 3ano PL','Seguranca de Redes',2),(9,'Introducao a Javascript','2023-06-07','ETSI 2ano PL','Programacao Web',1),(15,'dxc','2023-06-02','EFED','Seguranca de Redes',2),(16,'dxcx','2023-06-02','dcxcc','xcc',2),(17,'Infraestrutura TI','2023-06-02','ETSI 4ano PL','ccs',2),(18,'kkkkkkkkkkkkk','2023-06-02','ETSI 3ano PL','Seguranca de Redes',2),(19,'Infraestrutura TI','2023-06-02','ETSI 3ano PL','ADOO',4),(20,'Defesa dos trabalhos','2023-05-31','ETSI 4ano PL','ADOO',4),(21,'Infraestrutura TI','2023-06-02','ETSI 2o ano L','Introducao a Redes',3),(22,'Sistemas de Ficheiros','2023-05-31','ETSI 1o ano L','Sistemas Operativos',3),(23,'Miniteste 1','2023-06-02','ETSI 2ano PL','Programacao Web',1),(24,'Miniteste 1','2023-06-02','ETSI 2ano L','Programacao Web',1),(25,'Array Indexado','2023-06-05','ETSI 3ano PL','PWA',1),(26,'Conexao com PDO','2023-06-05','ETSI 3ano L','PWA',1);
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Manuel Gerson','mg@aulas.co.mz','mg2023'),(2,'Cristovao Uaciquete','cu@aulas.co.mz','cu2023'),(3,'Anubal Faiane','af@aulas.co.mz','af2023'),(4,'Edvaldo Maesh','em@aulas.co.mz','em2023');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-02 23:58:50
