-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: db_pondokit
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `tb_akun`
--

DROP TABLE IF EXISTS `tb_akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_akun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_USER` (`id_user`),
  CONSTRAINT `FK_USER` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_akun`
--

LOCK TABLES `tb_akun` WRITE;
/*!40000 ALTER TABLE `tb_akun` DISABLE KEYS */;
INSERT INTO `tb_akun` VALUES (1,'ilahana','$2y$10$Inpz6u1xXA37u2nAAnVlleAf2JZu1/UkJTGoFfiePdhR1Qt0kq2tm',1);
/*!40000 ALTER TABLE `tb_akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_artikel`
--

DROP TABLE IF EXISTS `tb_artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_artikel` (
  `id_artikel` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `artikel` text,
  `tgl_post` date DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `id_kategori` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_artikel`),
  KEY `FK_USER2` (`id_user`),
  KEY `FK_KATEGORI` (`id_kategori`),
  CONSTRAINT `FK_KATEGORI` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  CONSTRAINT `FK_USER2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_artikel`
--

LOCK TABLES `tb_artikel` WRITE;
/*!40000 ALTER TABLE `tb_artikel` DISABLE KEYS */;
INSERT INTO `tb_artikel` VALUES (2,'teknologi','sekarang hp bisa buat foto sama video sama main game seruu','2021-02-24','1552452360_img2.jpg',2,1),(3,'film','anime is the best','2021-02-24','181478080_bg-profile.jpg',3,1),(4,'Truk','aku pernah naik truk bagus banget udah itu aja','2021-02-24','849875042_img6.jpg',4,1),(5,'light novel','semenjak saya jadi wibu, saya suka baca light novel dan manga','2021-02-24','393770572_No_Game_No_Life_light_novel_vol_1.jpg',5,1);
/*!40000 ALTER TABLE `tb_artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` VALUES (1,'Sejarah'),(2,'Teknologi'),(3,'Film'),(4,'Transportasi'),(5,'Buku');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jns_kel` enum('','L','P') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'ilahana','L');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-25 10:10:45
