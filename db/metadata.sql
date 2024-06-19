CREATE DATABASE  IF NOT EXISTS `agyw` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `agyw`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: agyw
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `child`
--

DROP TABLE IF EXISTS `child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `child` (
  `child_id` int NOT NULL AUTO_INCREMENT,
  `given_name` varchar(45) DEFAULT NULL,
  `family_name` varchar(45) DEFAULT NULL,
  `hcc_number` varchar(45) DEFAULT NULL,
  `arv_number` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `guardian_id` int DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `changed_by` int DEFAULT NULL,
  `date_changed` datetime DEFAULT NULL,
  `voided` varchar(45) DEFAULT NULL,
  `voided_by` int DEFAULT NULL,
  `date_voided` datetime DEFAULT NULL,
  `void_reason` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`child_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `child_visit`
--

DROP TABLE IF EXISTS `child_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `child_visit` (
  `visit_id` int NOT NULL AUTO_INCREMENT,
  `meeting_date` date NOT NULL,
  `child_id` int NOT NULL,
  `age_at_visit` int NOT NULL,
  `nevirapine` varchar(3) DEFAULT NULL,
  `bactrim` varchar(3) DEFAULT NULL,
  `immunization` varchar(3) DEFAULT NULL,
  `dbs_hiv_test` varchar(3) DEFAULT NULL,
  `rapid_hiv_test` varchar(3) DEFAULT NULL,
  `age_at_test` int DEFAULT NULL,
  `type_of_vaccine` varchar(100) DEFAULT NULL,
  `hiv_status` varchar(45) DEFAULT NULL,
  `height_cm` double DEFAULT NULL,
  `weight_kg` double DEFAULT NULL,
  `muac_cm` double DEFAULT NULL,
  `feeding_type` varchar(45) DEFAULT NULL,
  `malnutrition_status` varchar(45) DEFAULT NULL,
  `outcome` varchar(45) DEFAULT NULL,
  `outcome_date` date DEFAULT NULL,
  `comment` longtext,
  `created_by` int DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `changed_by` int DEFAULT NULL,
  `date_changed` datetime DEFAULT NULL,
  `voided` int DEFAULT '0',
  `voided_by` int DEFAULT NULL,
  `date_voided` datetime DEFAULT NULL,
  `void_reason` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inclusion_criteria`
--

DROP TABLE IF EXISTS `inclusion_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inclusion_criteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `criteria_type` varchar(45) NOT NULL,
  `criteria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parent` (
  `parent_id` int NOT NULL AUTO_INCREMENT,
  `given_name` varchar(45) DEFAULT NULL,
  `family_name` varchar(45) DEFAULT NULL,
  `arv_number` varchar(45) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `age` int DEFAULT NULL,
  `place_of_residence` varchar(100) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `inclusion_criteria` varchar(45) DEFAULT NULL,
  `inclusion_criteria_2` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `parent_partner_name` varchar(100) DEFAULT NULL,
  `parent_partner_phone_number` varchar(45) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `changed_by` int DEFAULT NULL,
  `date_changed` datetime DEFAULT NULL,
  `voided` int DEFAULT '0',
  `voided_by` int DEFAULT NULL,
  `date_voided` int DEFAULT NULL,
  `void_reason` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `parent_visit`
--

DROP TABLE IF EXISTS `parent_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parent_visit` (
  `visit_id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `meeting_date` varchar(45) DEFAULT NULL,
  `service` varchar(45) DEFAULT NULL,
  `adherence` int DEFAULT NULL,
  `eligible_for_vl` varchar(3) DEFAULT NULL,
  `date_of_vl_test` date DEFAULT NULL,
  `vl_result` varchar(45) DEFAULT NULL,
  `iac_conducted` varchar(3) DEFAULT NULL,
  `second_vl_conducted` varchar(3) DEFAULT NULL,
  `second_vl_result` varchar(45) DEFAULT NULL,
  `second_vl_decision` varchar(100) DEFAULT NULL,
  `malnutrition_status` varchar(45) DEFAULT NULL,
  `return_to_school` varchar(3) DEFAULT NULL,
  `outcome` varchar(45) DEFAULT NULL,
  `outcome_date` date DEFAULT NULL,
  `comment` longtext,
  `created_by` int DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `changed_by` int DEFAULT NULL,
  `date_changed` datetime DEFAULT NULL,
  `voided` int DEFAULT '0',
  `voided_by` int DEFAULT NULL,
  `date_voided` datetime DEFAULT NULL,
  `void_reason` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `services_accessed`
--

DROP TABLE IF EXISTS `services_accessed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services_accessed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visit_id` int NOT NULL,
  `service` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-19 13:29:15
