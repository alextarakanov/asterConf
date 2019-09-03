-- MySQL dump 10.13  Distrib 5.1.73, for unknown-linux-gnu (x86_64)
--
-- Host: localhost    Database: schedule
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `gen_aNumber`
--

DROP TABLE IF EXISTS `gen_aNumber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_aNumber` (
  `aNumber` bigint(14) NOT NULL COMMENT 'we will call from this number',
  `bNumber` bigint(14) DEFAULT NULL COMMENT 'we will call to this number',
  `sim_name` int(11) DEFAULT NULL,
  `stateALeg` varchar(50) DEFAULT 'IDLE',
  `stateBLeg` varchar(50) DEFAULT 'NONE',
  `uniqueidA` varchar(50) DEFAULT NULL,
  `uniqueidB` varchar(50) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `aNumberEnable` tinyint(1) DEFAULT '1',
  `setMinutePerDay` int(11) DEFAULT '500',
  `usedSecondPerDay` int(11) DEFAULT '0',
  `usedMinutePerDay` int(11) DEFAULT '0',
  `usedSecondPerMonth` int(11) DEFAULT '0',
  `usedMinutePerMonth` int(11) DEFAULT '0',
  `usedTotalSecond` int(11) DEFAULT '0',
  `usedTotalMinute` int(11) DEFAULT '0',
  `usedCountRepeatErrorPerDay` int(11) DEFAULT '0',
  `usedCountRepeatErrorTotal` int(11) DEFAULT '0',
  `usedCountAnsweredCallPerDay` int(11) DEFAULT '0',
  `usedCountAnsweredCallPerMonth` int(11) DEFAULT '0',
  `usedCountAnsweredCallTotal` int(11) DEFAULT '0',
  `lastTryDatetime` datetime DEFAULT NULL,
  `lastSuccessDatetime` datetime DEFAULT NULL,
  `createDatetime` datetime DEFAULT NULL,
  `describe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aNumber`),
  KEY `fk_gen_bNumber_1_idx` (`projectId`),
  CONSTRAINT `fk_gen_aNumber_2` FOREIGN KEY (`projectId`) REFERENCES `gen_project` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gen_bNumber`
--

DROP TABLE IF EXISTS `gen_bNumber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_bNumber` (
  `bNumber` bigint(14) NOT NULL COMMENT 'we will call to this number',
  `aNumber` bigint(14) DEFAULT NULL COMMENT 'we will call from this number',
  `sim_name` int(11) DEFAULT NULL,
  `stateALeg` varchar(50) DEFAULT 'NONE',
  `stateBLeg` varchar(50) DEFAULT 'IDLE',
  `uniqueidA` varchar(50) DEFAULT NULL,
  `uniqueidB` varchar(50) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `bNumberEnable` tinyint(1) DEFAULT '1',
  `setMinutePerDay` int(11) DEFAULT '500',
  `usedSecondPerDay` int(11) DEFAULT '0',
  `usedMinutePerDay` int(11) DEFAULT '0',
  `usedSecondPerMonth` int(11) DEFAULT '0',
  `usedMinutePerMonth` int(11) DEFAULT '0',
  `usedTotalSecond` int(11) DEFAULT '0',
  `usedTotalMinute` int(11) DEFAULT '0',
  `usedCountRepeatErrorPerDay` int(11) DEFAULT '0',
  `usedCountRepeatErrorTotal` int(11) DEFAULT '0',
  `usedCountAnsweredCallPerDay` int(11) DEFAULT '0',
  `usedCountAnsweredCallPerMonth` int(11) DEFAULT '0',
  `usedCountAnsweredCallTotal` int(11) DEFAULT '0',
  `lastTryDatetime` datetime DEFAULT NULL,
  `lastSuccessDatetime` datetime DEFAULT NULL,
  `createDatetime` datetime DEFAULT NULL,
  `describe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bNumber`),
  KEY `fk_gen_bNumber_1_idx` (`projectId`),
  CONSTRAINT `fk_gen_bNumber_1` FOREIGN KEY (`projectId`) REFERENCES `gen_project` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gen_project`
--

DROP TABLE IF EXISTS `gen_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_project` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(100) DEFAULT NULL,
  `projectNameDescribe` varchar(100) DEFAULT NULL,
  `enableProject` tinyint(1) DEFAULT '1',
  `setMinimumConnectSecond` int(11) DEFAULT '300',
  `setMaximumConnectSecond` int(11) DEFAULT '600',
  `setMinimumMinutePerDay` int(11) DEFAULT '500',
  `setMaximumMinutePerDay` int(11) DEFAULT '1000',
  `setMinutePerMonth` int(11) DEFAULT '40000',
  `setCountRepeatErrorPerDay` int(11) DEFAULT '30',
  `setCountAnsweredCallPerDay` int(11) DEFAULT '100',
  `setCountAnsweredCallPerMonth` int(11) DEFAULT '10000',
  `setTimeSuccessCallSeconds` int(11) DEFAULT '15',
  `setSoundDir` varchar(150) DEFAULT NULL,
  `restMinuteEveryDay` tinyint(1) DEFAULT '1',
  `restMinuteEveryMonth` tinyint(1) DEFAULT '1',
  `usedCallLimitNow` int(11) DEFAULT '0',
  `setOutgoingSchedulerTrunk` tinyint(1) DEFAULT '0',
  `setSchedulerGroupId` int(11) DEFAULT NULL,
  `createDatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`projectId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gen_sched`
--

DROP TABLE IF EXISTS `gen_sched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_sched` (
  `projectId` int(11) NOT NULL,
  `00b30` int(11) NOT NULL DEFAULT '0',
  `00a30` int(11) NOT NULL DEFAULT '0',
  `01b30` int(11) NOT NULL DEFAULT '0',
  `01a30` int(11) NOT NULL DEFAULT '0',
  `02b30` int(11) NOT NULL DEFAULT '0',
  `02a30` int(11) NOT NULL DEFAULT '0',
  `03b30` int(11) NOT NULL DEFAULT '0',
  `03a30` int(11) NOT NULL DEFAULT '0',
  `04b30` int(11) NOT NULL DEFAULT '0',
  `04a30` int(11) NOT NULL DEFAULT '0',
  `05b30` int(11) NOT NULL DEFAULT '0',
  `05a30` int(11) NOT NULL DEFAULT '0',
  `06b30` int(11) NOT NULL DEFAULT '0',
  `06a30` int(11) NOT NULL DEFAULT '0',
  `07b30` int(11) NOT NULL DEFAULT '0',
  `07a30` int(11) NOT NULL DEFAULT '0',
  `08b30` int(11) NOT NULL DEFAULT '0',
  `08a30` int(11) NOT NULL DEFAULT '0',
  `09b30` int(11) NOT NULL DEFAULT '0',
  `09a30` int(11) NOT NULL DEFAULT '0',
  `10b30` int(11) NOT NULL DEFAULT '0',
  `10a30` int(11) NOT NULL DEFAULT '0',
  `11b30` int(11) NOT NULL DEFAULT '0',
  `11a30` int(11) NOT NULL DEFAULT '0',
  `12b30` int(11) NOT NULL DEFAULT '0',
  `12a30` int(11) NOT NULL DEFAULT '0',
  `13b30` int(11) NOT NULL DEFAULT '0',
  `13a30` int(11) NOT NULL DEFAULT '0',
  `14b30` int(11) NOT NULL DEFAULT '0',
  `14a30` int(11) NOT NULL DEFAULT '0',
  `15b30` int(11) NOT NULL DEFAULT '0',
  `15a30` int(11) NOT NULL DEFAULT '0',
  `16b30` int(11) NOT NULL DEFAULT '0',
  `16a30` int(11) NOT NULL DEFAULT '0',
  `17b30` int(11) NOT NULL DEFAULT '0',
  `17a30` int(11) NOT NULL DEFAULT '0',
  `18b30` int(11) NOT NULL DEFAULT '0',
  `18a30` int(11) NOT NULL DEFAULT '0',
  `19b30` int(11) NOT NULL DEFAULT '0',
  `19a30` int(11) NOT NULL DEFAULT '0',
  `20b30` int(11) NOT NULL DEFAULT '0',
  `20a30` int(11) NOT NULL DEFAULT '0',
  `21b30` int(11) NOT NULL DEFAULT '0',
  `21a30` int(11) NOT NULL DEFAULT '0',
  `22b30` int(11) NOT NULL DEFAULT '0',
  `22a30` int(11) NOT NULL DEFAULT '0',
  `23b30` int(11) NOT NULL DEFAULT '0',
  `23a30` int(11) NOT NULL DEFAULT '0',
  `24b30` int(11) NOT NULL DEFAULT '0',
  `24a30` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`projectId`),
  CONSTRAINT `fk_gen_sched_1` FOREIGN KEY (`projectId`) REFERENCES `gen_project` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-11 11:15:12
