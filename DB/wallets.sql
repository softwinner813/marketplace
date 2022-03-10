/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - holdiver
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`holdiver` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `holdiver`;

/*Table structure for table `wallets` */

DROP TABLE IF EXISTS `wallets`;

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wallet_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(255) DEFAULT NULL,
  `wallet_type` int(5) NOT NULL DEFAULT 0,
  `user_type` int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

/*Data for the table `wallets` */

insert  into `wallets`(`id`,`wallet_name`,`address`,`createdAt`,`updatedAt`,`user_name`,`wallet_type`,`user_type`) values (3,'My Wallet3','0x4c79f067dd51069b1d8b062c3bda2fa432f25c54','2022-02-02 15:16:15','2022-02-02 15:16:15',NULL,0,0),(4,'Holdiver Wallet','0x7c1d5dDe71B34733e69943a8de226a78951f58Eb','2022-02-03 22:33:00','2022-02-05 08:05:46',NULL,0,0),(51,'Wallet1','0x3ec72ee0476fbab714acd8457e74f40470da3866','2022-02-07 15:34:08','2022-02-07 15:34:08',NULL,0,0),(52,'Wallet2','0xf81160e8cf6de44874e287a11352bc23518b49bb','2022-02-07 15:41:57','2022-02-07 15:41:57',NULL,0,0),(53,'HVR Wallet','0x3c3d5b7fd9e9fc3d4e58a8cc0700a504cc53e9d0','2022-02-07 17:34:55','2022-02-07 17:34:55',NULL,0,0),(54,'Test1','0x518aafd141d3e03e694b4f3fd2b4cd44a455c833','2022-02-10 22:33:40','2022-02-10 22:33:40',NULL,0,0),(55,'wallet1','0xe39142b8c78bd6f57c29ee88c1b83224f5ed2b0b','2022-02-13 17:24:39','2022-02-13 17:24:39',NULL,0,0),(56,'New Wallet','0x9c5ffa1dd2131acec64795880e3716f5bbd86ca2','2022-02-15 01:23:44','2022-02-15 01:23:44',NULL,0,0),(57,'New Wallet','0x8ce4811aeed886d355351286cfc448fa6ce9a0f4','2022-02-15 07:05:15','2022-02-15 07:05:15',NULL,0,0),(58,'new Wallet','0xbfacc2164ccb6377b28fe1ff9b8cb4b1774bfd2a','2022-02-17 02:44:01','2022-02-17 02:44:01',NULL,0,0),(59,'New Wallet','0x0cd8c190a507c3d652f91dedd5c2d58a96682537','2022-02-18 12:58:13','2022-02-18 12:58:13',NULL,0,0),(126,'main','0x094856291f08897905d8ee473610e6676ef7bde0',NULL,'2022-02-23 08:45:05',NULL,0,0),(127,'main','0x11e7941eb79d8dcdb3cec64720362beabcd8625f',NULL,'2022-02-23 08:45:12',NULL,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
