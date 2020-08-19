-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: dbakademik
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `angkatan`
--

DROP TABLE IF EXISTS `angkatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `angkatan` (
  `Id_angkatan` char(8) NOT NULL,
  `Nim` char(8) NOT NULL,
  `Id_jurusan` char(8) NOT NULL,
  `tahun` year DEFAULT NULL,
  PRIMARY KEY (`Id_angkatan`),
  KEY `Nim` (`Nim`),
  KEY `Id_jurusan` (`Id_jurusan`),
  CONSTRAINT `angkatan_ibfk_1` FOREIGN KEY (`Nim`) REFERENCES `mahasiswa` (`Nim`),
  CONSTRAINT `angkatan_ibfk_2` FOREIGN KEY (`Id_jurusan`) REFERENCES `jurusan` (`Id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `angkatan`
--

LOCK TABLES `angkatan` WRITE;
/*!40000 ALTER TABLE `angkatan` DISABLE KEYS */;
INSERT INTO `angkatan` VALUES ('AK046','10118045','JS001',2019);
/*!40000 ALTER TABLE `angkatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `Nip` char(8) NOT NULL,
  `nama_dosen` varchar(30) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES ('DS001','Reza','1981-02-24','L','Jl. borobudur'),('DS002','Taufik','1984-08-15','L','Jl. Merdeka');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal` (
  `Id_jdwl` char(8) NOT NULL,
  `Nip` char(8) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `kode_mk` char(8) NOT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`Id_jdwl`),
  KEY `Nip` (`Nip`),
  KEY `kode_mk` (`kode_mk`),
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Nip`) REFERENCES `dosen` (`Nip`),
  CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `mk` (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES ('00001','DS001','Senin','MK001','12:30:00');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jurusan` (
  `Id_jurusan` char(8) NOT NULL,
  `nama_jurusan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES ('JS001','Teknik Informatika'),('JS002','Sastra Jepang');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `Nim` char(8) NOT NULL,
  `Id_jurusan` char(8) NOT NULL,
  `nama_mhs` varchar(30) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Nim`),
  KEY `Id_jurusan` (`Id_jurusan`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`Id_jurusan`) REFERENCES `jurusan` (`Id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES ('10118010','JS002','iciw','2001-11-28','L','Jl. Mendut Raya M.70'),('10118045','JS001','M. Ilham','2000-04-18','L','Jl. Mendut 4');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mk`
--

DROP TABLE IF EXISTS `mk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mk` (
  `kode_mk` char(8) NOT NULL,
  `nama_mk` varchar(30) DEFAULT NULL,
  `sks` smallint DEFAULT NULL,
  `semester` smallint DEFAULT NULL,
  PRIMARY KEY (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mk`
--

LOCK TABLES `mk` WRITE;
/*!40000 ALTER TABLE `mk` DISABLE KEYS */;
INSERT INTO `mk` VALUES ('MK001','Sistem Operasi',4,4),('MK002','Basis Data',8,3);
/*!40000 ALTER TABLE `mk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilai` (
  `Nim` char(8) NOT NULL,
  `nama_mhs` varchar(30) DEFAULT NULL,
  `kode_mk` char(8) NOT NULL,
  `nama_mk` varchar(30) DEFAULT NULL,
  `uts` smallint DEFAULT NULL,
  `uas` smallint DEFAULT NULL,
  `na` float DEFAULT NULL,
  `hm` char(1) DEFAULT 'T',
  PRIMARY KEY (`Nim`,`kode_mk`),
  KEY `kode_mk` (`kode_mk`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`Nim`) REFERENCES `mahasiswa` (`Nim`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `mk` (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` VALUES ('10118045','M. Ilham','MK001','Sistem Operasi',80,80,80,'A');
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-19 12:07:07
