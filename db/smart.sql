-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: smart
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

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
-- Table structure for table `calon`
--

DROP TABLE IF EXISTS `calon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keluarga` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `submit_by` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `submit_by` (`submit_by`),
  CONSTRAINT `calon_ibfk_1` FOREIGN KEY (`submit_by`) REFERENCES `pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calon`
--

LOCK TABLES `calon` WRITE;
/*!40000 ALTER TABLE `calon` DISABLE KEYS */;
INSERT INTO `calon` VALUES (14,'Keluarga1','Naruto',1),(125,'awdadwdawd','adwaaddw',1),(129,'awd2wa','adawwad',1),(130,'wadwadawdaw','awdwadaw',1);
/*!40000 ALTER TABLE `calon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calon_subkriteria`
--

DROP TABLE IF EXISTS `calon_subkriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calon_subkriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_id` int(11) DEFAULT NULL,
  `subkriteria_id` int(11) DEFAULT NULL,
  `value` float NOT NULL,
  `utility_score` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `calon_id` (`calon_id`),
  KEY `subkriteria_id` (`subkriteria_id`),
  CONSTRAINT `FK__calon` FOREIGN KEY (`calon_id`) REFERENCES `calon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__subkriteria` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=958 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calon_subkriteria`
--

LOCK TABLES `calon_subkriteria` WRITE;
/*!40000 ALTER TABLE `calon_subkriteria` DISABLE KEYS */;
INSERT INTO `calon_subkriteria` VALUES (1,14,1,5,1),(2,14,3,5,1),(3,14,7,4,0.75),(4,14,12,1,0),(5,14,15,3,0.5),(7,14,27,2,0.25),(8,14,20,3,0.5),(9,14,34,5,1),(10,14,38,3,0.5),(11,14,44,2,0.25),(12,14,47,4,0.75),(13,14,54,2,0.25),(14,14,58,3,0.5),(915,125,1,5,1),(916,125,3,5,1),(917,125,6,5,1),(918,125,11,5,1),(919,125,13,5,1),(920,125,18,5,1),(921,125,25,4,0.75),(922,125,28,5,1),(923,125,35,1,0),(924,125,36,5,1),(925,125,42,4,0.75),(926,125,46,5,1),(927,125,51,5,1),(928,125,59,2,0.25),(929,14,28,5,1),(930,129,1,5,1),(931,129,3,5,1),(932,129,7,4,0.75),(933,129,12,1,0),(934,129,14,4,0.75),(935,129,19,4,0.75),(936,129,24,5,1),(937,129,28,5,1),(938,129,34,5,1),(939,129,37,4,0.75),(940,129,41,5,1),(941,129,47,4,0.75),(942,129,51,5,1),(943,129,56,5,1),(944,130,1,5,1),(945,130,3,5,1),(946,130,6,5,1),(947,130,11,5,1),(948,130,13,5,1),(949,130,18,5,1),(950,130,25,4,0.75),(951,130,28,5,1),(952,130,34,5,1),(953,130,36,5,1),(954,130,43,3,0.5),(955,130,47,4,0.75),(956,130,51,5,1),(957,130,58,3,0.5);
/*!40000 ALTER TABLE `calon_subkriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hasil_seleksi`
--

DROP TABLE IF EXISTS `hasil_seleksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasil_seleksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(11) NOT NULL,
  `program_bantuan_id` int(11) NOT NULL,
  `calon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program_bantuan_id` (`program_bantuan_id`),
  KEY `calon_id` (`calon_id`),
  CONSTRAINT `hasil_seleksi_ibfk_1` FOREIGN KEY (`program_bantuan_id`) REFERENCES `program_bantuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hasil_seleksi_ibfk_2` FOREIGN KEY (`calon_id`) REFERENCES `calon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasil_seleksi`
--

LOCK TABLES `hasil_seleksi` WRITE;
/*!40000 ALTER TABLE `hasil_seleksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `hasil_seleksi` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` VALUES (3,'Memiliki Perhiasan minimal 10 gr',0.120481928),(4,'Status Rumah',0.108433735),(5,'Listrik',0.096385542),(6,'Jenis Kelamin KRT',0.084337349),(7,'Luas lantai rumah (m2)',0.084337349),(8,'Jenis Atap',0.084337349),(9,'Jenis Dinding',0.084337349),(10,'Jenis Lantai',0.084337349),(11,'TV layar datar minimal 30 inchi',0.072289157),(12,'Bahan Bakar Masak',0.060240964),(13,'Sumber Air',0.048192771),(14,'Umur',0.036144578),(15,'Pendidikan Akhir',0.024096386),(16,'Status Nikah',0.012048193);
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
-- 

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (1,'Administrator','admin@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3','superadmin'),(2,'User1','user1@gmail.com','user','1234','pustakawan'), (3,'User2','user2@gmail.com','user2','user2','pustakawan'), (4,'User3','user3@gmail.com','user3','user3','pustakawan');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subkriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(11) DEFAULT 0,
  `nama` varchar(50) DEFAULT '0',
  `bobot` double DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `kriteria_id` (`kriteria_id`),
  CONSTRAINT `FK_subkriteria_kriteria` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subkriteria`
--

LOCK TABLES `subkriteria` WRITE;
/*!40000 ALTER TABLE `subkriteria` DISABLE KEYS */;
INSERT INTO `subkriteria` VALUES (1,3,'Tidak',5),(2,3,'Ya',1),(3,4,'Bebas sewa',5),(4,4,'Kontrak/sewa',3),(5,4,'Milik sendiri',1),(6,5,'450',5),(7,5,'900',4),(8,5,'1300',3),(9,5,'2200',2),(10,5,'>2200',1),(11,6,'Perempuan',5),(12,6,'Laki-laki',1),(13,7,'16 - 102,8',5),(14,7,'102,8 - 189,6',4),(15,7,'189,6 - 276,8',3),(16,7,'276,8 - 363,2',2),(17,7,'363,2 - 450',1),(18,8,'Bambu',5),(19,8,'Kayu/Sirap',4),(20,8,'Seng',3),(21,8,'Asbes',2),(22,8,'Genteng',1),(23,8,'Beton',1),(24,9,'Anyaman Bambu',5),(25,9,'Batang Kayu',4),(26,9,'Kayu Papan',3),(27,9,'Tembok',2),(28,10,'Kayu/papan',5),(29,10,'Semen/bata merah',4),(30,10,'Ubin',3),(31,10,'Keramik',2),(32,10,'Marmer/ granit',1),(33,10,'Karpet',1),(34,11,'Tidak',5),(35,11,'Ya',1),(36,12,'Kayu Bakar',5),(37,12,'Minyak Tanah',4),(38,12,'Elpiji 3 kg',3),(39,12,'Elpiji 12 kg',2),(40,12,'Tidak memasak dirumah',1),(41,13,'Air Hujan',5),(42,13,'Air Sungai dll',4),(43,13,'Sumur Bor Pompa',3),(44,13,'Sumur Terlindung',2),(45,13,'Leding',1),(46,14,'75 - 89',5),(47,14,'61 - 75',4),(48,14,'47 - 61',3),(49,14,'33 - 47',2),(50,14,'20 - 33',1),(51,15,'Tidak Punya Ijazah',5),(52,15,'SD',4),(53,15,'SMP',3),(54,15,'SMA/SMK',2),(55,15,'S1/S2/S3',1),(56,16,'Cerai Mati',5),(57,16,'Cerai Hidup',4),(58,16,'Kawin',3),(59,16,'Lajang',2);
/*!40000 ALTER TABLE `subkriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'smart'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-21 21:36:29
