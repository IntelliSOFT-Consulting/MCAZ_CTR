-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: mcazctr_v2
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.16.04.1

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
-- Table structure for table `quality_assessments`
--

DROP TABLE IF EXISTS `quality_assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_assessments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `quality_workspace` longtext,
  `gmp_smpc` tinyint(1) DEFAULT NULL,
  `gmp_included` tinyint(1) DEFAULT NULL,
  `labelling` varchar(255) DEFAULT NULL,
  `labelling_comments` longtext,
  `blinding_workspace` longtext,
  `blinding_comments` longtext,
  `acceptable` varchar(255) DEFAULT NULL,
  `supplementary_need` varchar(255) DEFAULT NULL,
  `overall_comments` longtext,
  `submitted` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  `drug_eur` tinyint(1) DEFAULT NULL,
  `drug_usp` tinyint(1) DEFAULT NULL,
  `drug_none` tinyint(1) DEFAULT NULL,
  `drug_authorised` varchar(255) DEFAULT NULL,
  `drug_ssection` longtext,
  `nomen_workspace` longtext,
  `noment_comment` longtext,
  `str_subsection` varchar(255) DEFAULT NULL,
  `str_workspace` longtext,
  `str_comment` longtext,
  `gen_prop_adequately` varchar(255) DEFAULT NULL,
  `gen_prop_workspace` longtext,
  `gen_prop_comment` longtext,
  `manu_identified` varchar(255) DEFAULT NULL,
  `process_described` varchar(255) DEFAULT NULL,
  `gen_manu_comment` longtext,
  `process_workspace` longtext,
  `workspace_comment` longtext,
  `control_described` varchar(255) DEFAULT NULL,
  `control_workspace` longtext,
  `control_comment` longtext,
  `control_steps_described` varchar(255) DEFAULT NULL,
  `control_steps_comments` longtext,
  `validation_described` varchar(255) DEFAULT NULL,
  `validation_comments` longtext,
  `manufacturing_described` varchar(255) DEFAULT NULL,
  `manufacturing_workspace` longtext,
  `manufacturing_comments` longtext,
  `substance_described` varchar(255) DEFAULT NULL,
  `substance_workspace` longtext,
  `substance_comments` longtext,
  `impurities_characterised` varchar(255) DEFAULT NULL,
  `impurities_workspace` longtext,
  `impurities_comments` longtext,
  `specifications_appropriate` varchar(255) DEFAULT NULL,
  `specifications_workspace` longtext,
  `specifications_comments` longtext,
  `analytical_described` varchar(255) DEFAULT NULL,
  `analytical_comments` longtext,
  `acceptance_presented` varchar(255) DEFAULT NULL,
  `suitability_explained` varchar(255) DEFAULT NULL,
  `validation_procedures_comments` longtext,
  `batch_provided` varchar(255) DEFAULT NULL,
  `batch_workspace` longtext,
  `batch_comments` longtext,
  `justification_acceptable` varchar(255) DEFAULT NULL,
  `justification_workspace` longtext,
  `justification_comments` longtext,
  `reference_described` varchar(255) DEFAULT NULL,
  `reference_comments` longtext,
  `container_suitable` varchar(255) DEFAULT NULL,
  `container_comments` longtext,
  `stability_satisfactory` varchar(255) DEFAULT NULL,
  `stability_workspace` longtext,
  `medical_product` varchar(255) DEFAULT NULL,
  `medical_product_workspace` longtext,
  `medical_product_comments` longtext,
  `agents_adequate` varchar(255) DEFAULT NULL,
  `agents_workspace` longtext,
  `agents_comments` longtext,
  `novel_excipients` varchar(255) DEFAULT NULL,
  `novel_workspace` longtext,
  `novel_comments` longtext,
  `solvents_info` varchar(255) DEFAULT NULL,
  `solvents_workspace` longtext,
  `solvents_comments` longtext,
  `placebo` varchar(255) DEFAULT NULL,
  `placebo_workspace` longtext,
  `placebo_comments` longtext,
  `auxiliary` varchar(255) DEFAULT NULL,
  `auxiliary_workspace` longtext,
  `auxiliary_comments` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_assessments`
--

LOCK TABLES `quality_assessments` WRITE;
/*!40000 ALTER TABLE `quality_assessments` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_assessments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-05 14:20:53
