/*
SQLyog Ultimate v12.2.1 (64 bit)
MySQL - 5.6.17 : Database - enchan_crm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`enchan_crm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `enchan_crm`;

/*Table structure for table `enchan_accounts` */

DROP TABLE IF EXISTS `enchan_accounts`;

CREATE TABLE `enchan_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` longtext COLLATE utf8_unicode_ci,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `billing_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employees` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `same_as_billing` tinyint(1) DEFAULT NULL,
  `annual_revenue` decimal(15,2) DEFAULT NULL,
  `member_of` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry_type` int(10) unsigned NOT NULL,
  `account_type` int(10) unsigned NOT NULL,
  `campaign_id` int(10) unsigned NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accounts_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `accounts_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_accounts` */

insert  into `enchan_accounts`(`id`,`name`,`website`,`office_phone`,`office_fax`,`description`,`billing_street`,`billing_city`,`billing_state`,`billing_postal`,`billing_country`,`shipping_street`,`shipping_city`,`shipping_state`,`shipping_postal`,`shipping_country`,`employees`,`same_as_billing`,`annual_revenue`,`member_of`,`industry_type`,`account_type`,`campaign_id`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Della La Salle  University','dlsu.edu.ph','584-3535','584-3535','Lorem Ipsum ','B9 L14 P1 Marco Polo Place, Tagapo','Sta. Rosa','LAG','4026','Philippines',NULL,NULL,NULL,NULL,NULL,'600',1,'15000000.00','',8,4,1,1,0,'2016-05-27 09:16:55','2016-08-08 16:24:19',NULL),
(2,'Account Test','http://www.burgerde.com.ph','','','','','','','','',NULL,NULL,NULL,NULL,NULL,'',1,'0.00','',1,1,2,3,1,'2016-05-30 05:05:23','2016-08-30 11:48:56','2016-08-30 11:48:56'),
(3,'Concentrix','www.concentrix.com','584-3535','584-3535','Description','Primary Street','Primary City','Primary State','Primary Postal','Primary Country','Street','City','State','postal','counter','500',1,'50000000.00','BPO',30,3,2,2,1,'2016-06-10 07:24:11','2016-07-05 07:54:04',NULL),
(4,'Coca Cola Bottlers','coca-cola.com/test','535-3535','535-3553','','','','','','',NULL,NULL,NULL,NULL,NULL,'',1,'0.00','',1,1,2,1,0,'2016-08-30 11:06:23','2016-08-30 11:48:31',NULL);

/*Table structure for table `enchan_calendars` */

DROP TABLE IF EXISTS `enchan_calendars`;

CREATE TABLE `enchan_calendars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `backgroundColor` text COLLATE utf8_unicode_ci NOT NULL,
  `borderColor` text COLLATE utf8_unicode_ci NOT NULL,
  `allDay` tinyint(1) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_calendars` */

insert  into `enchan_calendars`(`id`,`title`,`description`,`start`,`end`,`backgroundColor`,`borderColor`,`allDay`,`url`,`assigned_to`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'TEST 1','Description','2016-08-17 00:00:00','2016-08-17 00:00:00','#ea0e0e','#000000',1,'http://localhost:8000/calendars/1/edit','2;3;4','2016-08-17 11:35:24','2016-08-18 11:10:50',NULL),
(2,'TEST 2','Description','2016-08-18 00:00:00','2016-08-18 00:00:00','','',1,'http://localhost:8000/calendars/2/edit','3;5','2016-08-17 12:06:27','2016-08-18 11:10:40',NULL),
(3,'TEST 3','Description','2016-08-18 00:00:00','2016-08-18 00:00:00','','',1,'http://localhost:8000/calendars/3/edit','4;5','2016-08-17 12:07:13','2016-08-18 09:57:14',NULL),
(4,'','','0000-00-00 00:00:00','0000-00-00 00:00:00','','',0,'','',NULL,NULL,NULL);

/*Table structure for table `enchan_calls` */

DROP TABLE IF EXISTS `enchan_calls`;

CREATE TABLE `enchan_calls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `status2` text COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `related_to` text COLLATE utf8_unicode_ci NOT NULL,
  `related_results` int(10) unsigned NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calls_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `calls_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_calls` */

insert  into `enchan_calls`(`id`,`subject`,`status`,`status2`,`date_time`,`related_to`,`related_results`,`description`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr. Lope Auxillos Inquiries','Inbound','Held','2016-07-16 09:45:00','tasks',1,'Description',2,1,'2016-07-13 08:49:40','2016-07-21 11:16:37',NULL),
(2,'Test','Inbound','Planned','2016-07-30 17:05:00','opportunities',3,'Description',1,0,'2016-07-13 09:02:57','2016-08-09 15:13:19',NULL);

/*Table structure for table `enchan_campaigns` */

DROP TABLE IF EXISTS `enchan_campaigns`;

CREATE TABLE `enchan_campaigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `impressions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actual_cost` decimal(15,2) NOT NULL,
  `expected_cost` decimal(15,2) NOT NULL,
  `expected_revenue` decimal(15,2) NOT NULL,
  `objective` text COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaigns_name_unique` (`name`),
  KEY `campaigns_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `campaigns_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_campaigns` */

insert  into `enchan_campaigns`(`id`,`name`,`status`,`type`,`start_date`,`end_date`,`description`,`budget`,`currency`,`impressions`,`actual_cost`,`expected_cost`,`expected_revenue`,`objective`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Campaign1','Active','Email','2016-06-10','2016-06-10','Description ','1000000.00','P','Impressions','900000.00','1000000.00','1500000.00','Objective',2,1,'2016-06-10 07:18:04','2016-06-10 07:18:04',NULL),
(2,'Campaign2','Planning','Newsletter','2016-06-30','2016-07-31','Description','150000.00','P','Impressions','125000.00','130000.00','1000000.00','Objective',4,1,'2016-06-29 01:03:15','2016-06-29 01:03:15',NULL);

/*Table structure for table `enchan_codelookups` */

DROP TABLE IF EXISTS `enchan_codelookups`;

CREATE TABLE `enchan_codelookups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` smallint(5) unsigned DEFAULT NULL,
  `value` double DEFAULT NULL,
  `string` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value2` double DEFAULT NULL,
  `string2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `binary` blob,
  `memo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `bool` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_codelookups` */

insert  into `enchan_codelookups`(`id`,`typename`,`description`,`code`,`value`,`string`,`value2`,`string2`,`binary`,`memo`,`bool`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'INDUSTYPE','Industry Type',1,NULL,'Apparel',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(2,'INDUSTYPE','Industry Type',2,NULL,'Banking',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(3,'INDUSTYPE','Industry Type',3,NULL,'Biotechnology',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(4,'INDUSTYPE','Industry Type',4,NULL,'Chemicals',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(5,'INDUSTYPE','Industry Type',5,NULL,'Communications',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(6,'INDUSTYPE','Industry Type',6,NULL,'Construction',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(7,'INDUSTYPE','Industry Type',7,NULL,'Consulting',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(8,'INDUSTYPE','Industry Type',8,NULL,'Education',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(9,'INDUSTYPE','Industry Type',9,NULL,'Electronics',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(10,'INDUSTYPE','Industry Type',10,NULL,'Energy',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(11,'INDUSTYPE','Industry Type',11,NULL,'Engineering',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(12,'INDUSTYPE','Industry Type',12,NULL,'Entertainment',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(13,'INDUSTYPE','Industry Type',13,NULL,'Environmental',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(14,'INDUSTYPE','Industry Type',14,NULL,'Finance',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(15,'INDUSTYPE','Industry Type',15,NULL,'Government',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(16,'INDUSTYPE','Industry Type',16,NULL,'Healthcare',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(17,'INDUSTYPE','Industry Type',17,NULL,'Hospitality',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(18,'INDUSTYPE','Industry Type',18,NULL,'Insurance',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(19,'INDUSTYPE','Industry Type',19,NULL,'Machinery',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(20,'INDUSTYPE','Industry Type',20,NULL,'Manufacturing',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(21,'INDUSTYPE','Industry Type',21,NULL,'Media',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(22,'INDUSTYPE','Industry Type',22,NULL,'Not for Profit',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(23,'INDUSTYPE','Industry Type',23,NULL,'Retail',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(24,'INDUSTYPE','Industry Type',24,NULL,'Shipping',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(25,'INDUSTYPE','Industry Type',25,NULL,'Technology',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(26,'INDUSTYPE','Industry Type',26,NULL,'Telecommunications',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(27,'INDUSTYPE','Industry Type',27,NULL,'Transportation',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(28,'INDUSTYPE','Industry Type',28,NULL,'Utilities',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(29,'INDUSTYPE','Industry Type',29,NULL,'School',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(30,'INDUSTYPE','Industry Type',30,NULL,'Other',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(31,'ACCTTYPE','Account Type',1,NULL,'Analyst',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(32,'ACCTTYPE','Account Type',2,NULL,'Competitor',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(33,'ACCTTYPE','Account Type',3,NULL,'Customer',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(34,'ACCTTYPE','Account Type',4,NULL,'Integrator',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(35,'ACCTTYPE','Account Type',5,NULL,'Investor',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(36,'ACCTTYPE','Account Type',6,NULL,'Partner',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(37,'ACCTTYPE','Account Type',7,NULL,'Press',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(38,'ACCTTYPE','Account Type',8,NULL,'Prospect',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(39,'ACCTTYPE','Account Type',9,NULL,'Reseller',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(40,'ACCTTYPE','Account Type',10,NULL,'Other',NULL,NULL,NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(41,'CMPGNSTAT','Campaign Status',1,NULL,'Planning',NULL,'Planning',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(42,'CMPGNSTAT','Campaign Status',2,NULL,'Active',NULL,'Active',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(43,'CMPGNSTAT','Campaign Status',3,NULL,'Inactive',NULL,'Inactive',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(44,'CMPGNSTAT','Campaign Status',4,NULL,'Complete',NULL,'Complete',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(45,'CMPGNSTAT','Campaign Status',5,NULL,'In-Queue',NULL,'In-Queue',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(46,'CMPGNSTAT','Campaign Status',6,NULL,'Sending',NULL,'Sending',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(47,'CMPGNTYPE','Campaign Type',1,NULL,'Telesales',NULL,'Telesales',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(48,'CMPGNTYPE','Campaign Type',2,NULL,'Mail',NULL,'Mail',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(49,'CMPGNTYPE','Campaign Type',3,NULL,'Email',NULL,'Email',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(50,'CMPGNTYPE','Campaign Type',4,NULL,'Print',NULL,'Print',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(51,'CMPGNTYPE','Campaign Type',5,NULL,'Web',NULL,'Web',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(52,'CMPGNTYPE','Campaign Type',6,NULL,'Radio',NULL,'Radio',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(53,'CMPGNTYPE','Campaign Type',7,NULL,'Television',NULL,'Television',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(54,'CMPGNTYPE','Campaign Type',8,NULL,'Newsletter',NULL,'Newsletter',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(55,'IMTYPE','Instant Messenger',1,NULL,'Yahoo',NULL,'Yahoo',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(56,'IMTYPE','Instant Messenger',2,NULL,'Google',NULL,'Google',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(57,'IMTYPE','Instant Messenger',3,NULL,'Skype',NULL,'Skype',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(58,'IMTYPE','Instant Messenger',4,NULL,'Facebook',NULL,'Facebook',NULL,'',NULL,'2016-05-30 07:36:25','2016-05-30 07:36:25',NULL),
(59,'LEADSOURCE','Lead Source',1,NULL,'Cold Call',NULL,'Cold Call',NULL,'',NULL,NULL,NULL,NULL),
(60,'LEADSOURCE','Lead Source',2,NULL,'Existing Customer',NULL,'Existing Customer',NULL,'',NULL,NULL,NULL,NULL),
(61,'LEADSOURCE','Lead Source',3,NULL,'Self Generated',NULL,'Self Generated',NULL,'',NULL,NULL,NULL,NULL),
(62,'LEADSOURCE','Lead Source',4,NULL,'Employee',NULL,'Employee',NULL,'',NULL,NULL,NULL,NULL),
(63,'LEADSOURCE','Lead Source',5,NULL,'Partner',NULL,'Partner',NULL,'',NULL,NULL,NULL,NULL),
(64,'LEADSOURCE','Lead Source',6,NULL,'Public Relations',NULL,'Public Relations',NULL,'',NULL,NULL,NULL,NULL),
(65,'LEADSOURCE','Lead Source',7,NULL,'Direct Mail',NULL,'Direct Mail',NULL,'',NULL,NULL,NULL,NULL),
(66,'LEADSOURCE','Lead Source',8,NULL,'Conference',NULL,'Conference',NULL,'',NULL,NULL,NULL,NULL),
(67,'LEADSOURCE','Lead Source',9,NULL,'Trade Show',NULL,'Trade Show',NULL,'',NULL,NULL,NULL,NULL),
(68,'LEADSOURCE','Lead Source',10,NULL,'Website',NULL,'Website',NULL,'',NULL,NULL,NULL,NULL),
(69,'LEADSOURCE','Lead Source',11,NULL,'Word of mouth',NULL,'Word of mouth',NULL,'',NULL,NULL,NULL,NULL),
(70,'LEADSOURCE','Lead Source',12,NULL,'Email',NULL,'Email',NULL,'',NULL,NULL,NULL,NULL),
(71,'LEADSOURCE','Lead Source',13,NULL,'Campaign',NULL,'Campaign',NULL,'',NULL,NULL,NULL,NULL),
(72,'LEADSOURCE','Lead Source',14,NULL,'Other',NULL,'Other',NULL,'',NULL,NULL,NULL,NULL);

/*Table structure for table `enchan_contacts` */

DROP TABLE IF EXISTS `enchan_contacts`;

CREATE TABLE `enchan_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mi` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `primary_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `same_address` tinyint(1) NOT NULL,
  `secondary_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` text COLLATE utf8_unicode_ci NOT NULL,
  `lead_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `campaign_id` int(10) unsigned NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_assigned_to_foreign` (`assigned_to`),
  KEY `contacts_account_id_foreign` (`account_id`),
  KEY `contacts_campaign_id_foreign` (`campaign_id`),
  CONSTRAINT `contacts_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `enchan_accounts` (`id`),
  CONSTRAINT `contacts_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`),
  CONSTRAINT `contacts_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `enchan_campaigns` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_contacts` */

insert  into `enchan_contacts`(`id`,`salutation`,`first_name`,`mi`,`last_name`,`full_name`,`office_phone`,`position`,`mobile`,`department`,`fax`,`website`,`description`,`primary_street`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_street`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email_address`,`lead_source`,`campaign_id`,`assigned_to`,`account_id`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr','Angelo','V','Escasios','Angelo V. Escasio','(584)353-5353','Section Head','(6349)543-2647','ITS','(584)353-5___','www.burgerde.com.ph','Description','Street','City','State','0','Country',1,'','','','','','avescasio@gmail.com','Cold Call',1,5,1,1,'2016-07-05 02:32:11','2016-08-30 13:30:14',NULL),
(4,'Mr','John Ranier','S','Voluntad','John Ranier S. Voluntad','(002)584-3535','System Admin','','','','','','','','','','',1,'','','','','','','4',2,1,4,1,'2016-08-30 13:34:36','2016-08-30 13:34:36',NULL);

/*Table structure for table `enchan_departments` */

DROP TABLE IF EXISTS `enchan_departments`;

CREATE TABLE `enchan_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_departments` */

/*Table structure for table `enchan_leads` */

DROP TABLE IF EXISTS `enchan_leads`;

CREATE TABLE `enchan_leads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `primary_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `same_address` tinyint(1) NOT NULL,
  `secondary_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `lead_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lead_source_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `opportunity_amount` double(12,2) NOT NULL,
  `referred_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `campaign_id` int(10) unsigned NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leads_campaign_id_foreign` (`campaign_id`),
  KEY `leads_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `leads_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`),
  CONSTRAINT `leads_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `enchan_campaigns` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_leads` */

insert  into `enchan_leads`(`id`,`salutation`,`first_name`,`last_name`,`office_phone`,`position`,`mobile`,`department`,`fax`,`account_name`,`website`,`description`,`primary_street`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_street`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email_address`,`status`,`status_remarks`,`lead_source`,`lead_source_remarks`,`opportunity_amount`,`referred_by`,`campaign_id`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr','Arwin','Flores','495432647','Chief Justice','495432647','Janitorial Services','495432647','Burger Devices','http://burgerde.com.ph','Description','Street','City','State','4026','Philippines',1,'','','','','','arflores@burgerde.com.ph','New','Status Description','Existing Customer','Leadsource Remarks',999999.99,'Enye',2,10,1,'2016-06-29 04:14:03','2016-06-29 04:14:03',NULL),
(2,'Mrs','Teresita','Garcia','(002)584-3535','Owner','(0920) 977-7273','Accounting','(049)536-7859','Garcia\'s Furniture','https://garciafurnitures.com','Long Description','Street','City','State','4026','Philippines',1,'','','','','','test@gmail.com','Assigned','Status Decription','Email','Lead Source Description',1500500.50,'Lilian Casacop',2,1,1,'2016-06-30 03:01:34','2016-07-01 02:16:24',NULL),
(3,'Mr','Jhun','Dela Cruz','5843535','Department Head','09209777273','Audit','495432647','Jhun Dela Cruz','http://test.com.ph','Description','Street','City','State','4026','Philippines',1,'','','','','','test@email.com',' Dead','Status Description','Cold Call','',999999.99,'Sally Gonzales',2,3,1,'2016-06-30 03:28:08','2016-06-30 03:28:17',NULL);

/*Table structure for table `enchan_meetings` */

DROP TABLE IF EXISTS `enchan_meetings`;

CREATE TABLE `enchan_meetings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `related_to` text COLLATE utf8_unicode_ci NOT NULL,
  `related_result` int(10) unsigned NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetings_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `meetings_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_meetings` */

insert  into `enchan_meetings`(`id`,`subject`,`status`,`location`,`start_date`,`end_date`,`description`,`related_to`,`related_result`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Test Meeting 1','Planned','Board Room','2016-07-22 16:00:00','2016-07-22 17:00:00','Descriptions','tasks',1,2,1,'2016-07-22 13:41:29','2016-07-27 17:33:40',NULL),
(2,'Executive Planning','Held','Board Room','2016-07-26 11:00:00','2016-07-26 12:30:00','Description Fied, test if save.','accounts',3,20,1,'2016-07-26 10:34:05','2016-07-26 10:34:05',NULL),
(3,'Test Meeting','Planned','Board Room','2016-08-05 11:00:00','2016-08-05 13:05:00','Test......\r\nljdfljadsfljl\r\nlsdfjsajfdle','targets',3,3,1,'2016-08-02 11:09:26','2016-08-02 11:10:17',NULL);

/*Table structure for table `enchan_migrations` */

DROP TABLE IF EXISTS `enchan_migrations`;

CREATE TABLE `enchan_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_migrations` */

insert  into `enchan_migrations`(`migration`,`batch`) values 
('2014_10_12_000000_create_users_table',1),
('2014_10_12_100000_create_password_resets_table',1),
('2016_04_12_070546_create_accounts_table',1),
('2016_04_15_090621_create_departments_table',1),
('2016_04_22_024546_create_codelookups_table',1),
('2016_04_28_083911_create_tests_table',1),
('2016_05_23_073534_entrust_setup_tables',2),
('2016_05_04_033242_create_campaigns_and_dependencies_table',3),
('2016_06_23_020322_create_opportunities_table',4),
('2016_07_07_015137_create_targets_table',5),
('2016_07_12_061721_create_calls_table',6),
('2016_07_15_084434_create_tasks_table',7),
('2016_07_18_165542_create_projects_table',8),
('2016_07_21_120644_create_meetings_table',9),
('2016_08_10_135734_create_calendars_table',10);

/*Table structure for table `enchan_opportunities` */

DROP TABLE IF EXISTS `enchan_opportunities`;

CREATE TABLE `enchan_opportunities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `closed_date` date NOT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_stage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lead_source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `probability` int(10) unsigned DEFAULT NULL,
  `next_step` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `campaign_id` int(10) unsigned NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opportunities_assigned_to_foreign` (`assigned_to`),
  KEY `opportunities_campaign_id_foreign` (`campaign_id`),
  KEY `opportunities_account_id_foreign` (`account_id`),
  CONSTRAINT `opportunities_account_id_foereign` FOREIGN KEY (`account_id`) REFERENCES `enchan_accounts` (`id`),
  CONSTRAINT `opportunities_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`),
  CONSTRAINT `opportunities_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `enchan_campaigns` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_opportunities` */

insert  into `enchan_opportunities`(`id`,`name`,`currency`,`closed_date`,`amount`,`type`,`sales_stage`,`lead_source`,`probability`,`next_step`,`description`,`campaign_id`,`account_id`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(3,'Opportunity 1','Peso','2016-07-30','1000000.00','Existing Business','Need Analysis','Cold Call',80,'Next Step','Description',1,1,5,1,'2016-07-05 07:04:08','2016-07-05 07:14:36',NULL);

/*Table structure for table `enchan_password_resets` */

DROP TABLE IF EXISTS `enchan_password_resets`;

CREATE TABLE `enchan_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_password_resets` */

insert  into `enchan_password_resets`(`email`,`token`,`created_at`) values 
('avescasio@enchantkingdom.com','8d601e8af82f4f6f40d60d9c4ec767e4adeb8bd1de950271a1d15b08df2eb637','2016-05-27 07:14:32');

/*Table structure for table `enchan_permission_role` */

DROP TABLE IF EXISTS `enchan_permission_role`;

CREATE TABLE `enchan_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `enchan_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `enchan_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_permission_role` */

insert  into `enchan_permission_role`(`permission_id`,`role_id`) values 
(1,1),
(7,2),
(9,2),
(10,2),
(11,2),
(12,2),
(7,3),
(9,3),
(10,3),
(11,3),
(12,3),
(1,4),
(13,4);

/*Table structure for table `enchan_permissions` */

DROP TABLE IF EXISTS `enchan_permissions`;

CREATE TABLE `enchan_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_permissions` */

insert  into `enchan_permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values 
(1,'global-permission','Create User Account','Create User Account','2016-05-30 07:36:26','2016-05-30 07:36:26'),
(2,'user-permission','Access User Account','Access to user account','2016-05-30 07:36:26','2016-05-30 07:36:26'),
(3,'user-create','Create User Account','Create a user account','2016-05-30 07:36:26','2016-05-30 07:36:26'),
(4,'user-update','Update User Account','Update a specific user account','2016-05-30 07:36:26','2016-05-30 07:36:26'),
(5,'user-delete','Delete User Account','Delete a specific user account','2016-05-30 07:36:26','2016-05-30 07:36:26'),
(6,'role-permission','Access Roles','Access the model role','2016-05-30 07:36:26','2016-05-30 07:36:26'),
(7,'create-new','Create New Records','Show the create form, were the user inputs data.','2016-07-27 13:43:15','2016-07-28 09:54:21'),
(8,'delete-record','Delete Record','Able to delete a particular record','2016-07-27 16:53:34','2016-07-27 16:53:34'),
(9,'edit-record','Edit Record','Able to edit particular record','2016-07-27 17:06:31','2016-07-27 17:06:31'),
(10,'show-record','Show Record','Show Detailed record as read only','2016-07-28 09:49:18','2016-07-28 09:49:18'),
(11,'update-record','Update Record','Allow to update the edited record','2016-07-28 09:51:02','2016-07-28 09:56:17'),
(12,'store-record','Store Record','Allow to store the created records.','2016-07-28 09:57:30','2016-07-28 09:57:30'),
(13,'dev','Developer use','Developer Use Only','2016-08-01 09:21:43','2016-08-01 09:21:43');

/*Table structure for table `enchan_projects` */

DROP TABLE IF EXISTS `enchan_projects`;

CREATE TABLE `enchan_projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `project_manager` int(10) unsigned DEFAULT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_project_manager_foreign` (`project_manager`),
  CONSTRAINT `projects_project_manager_foreign` FOREIGN KEY (`project_manager`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_projects` */

insert  into `enchan_projects`(`id`,`name`,`status`,`priority`,`start_date`,`end_date`,`notes`,`project_manager`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'EKCITE','Draft','Medium','2016-07-20','2016-07-21','Notes',2,1,'2016-07-21 09:29:03','2016-08-03 14:42:32',NULL),
(2,'Network Rehabilitation','Draft','High','2015-07-01','2016-07-21','Notes and some remarks over here.',2,1,'2016-07-21 09:36:46','2016-07-21 09:36:46',NULL);

/*Table structure for table `enchan_role_user` */

DROP TABLE IF EXISTS `enchan_role_user`;

CREATE TABLE `enchan_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `enchan_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `enchan_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_role_user` */

insert  into `enchan_role_user`(`user_id`,`role_id`) values 
(1,1),
(2,1),
(3,2),
(6,2),
(4,3),
(5,3),
(2,4);

/*Table structure for table `enchan_roles` */

DROP TABLE IF EXISTS `enchan_roles`;

CREATE TABLE `enchan_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_roles` */

insert  into `enchan_roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values 
(1,'admin','Administrators','Can access all','2016-05-30 07:36:25','2016-05-30 07:36:25'),
(2,'sales','Sales Role','Can access sales modules only','2016-05-30 07:36:25','2016-05-30 07:36:25'),
(3,'marketing','Marketing Role','Can access marketing modules','2016-05-30 07:36:25','2016-05-30 07:36:25'),
(4,'developer','Developer','Developer use only','2016-06-09 02:37:25','2016-08-01 09:22:18');

/*Table structure for table `enchan_targets` */

DROP TABLE IF EXISTS `enchan_targets`;

CREATE TABLE `enchan_targets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` text COLLATE utf8_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `department` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_office` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_fax` text COLLATE utf8_unicode_ci NOT NULL,
  `primary_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `primary_city` text COLLATE utf8_unicode_ci NOT NULL,
  `primary_state` text COLLATE utf8_unicode_ci NOT NULL,
  `primary_postal` text COLLATE utf8_unicode_ci NOT NULL,
  `primary_country` text COLLATE utf8_unicode_ci NOT NULL,
  `same_address` tinyint(1) NOT NULL,
  `secondary_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `secondary_city` text COLLATE utf8_unicode_ci NOT NULL,
  `secondary_state` text COLLATE utf8_unicode_ci NOT NULL,
  `secondary_postal` text COLLATE utf8_unicode_ci NOT NULL,
  `secondary_country` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` int(10) unsigned DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `targets_assigned_to_foreign` (`assigned_to`),
  KEY `targets_account_id_foreign` (`account_id`),
  CONSTRAINT `targets_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `enchan_accounts` (`id`),
  CONSTRAINT `targets_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_targets` */

insert  into `enchan_targets`(`id`,`salutation`,`first_name`,`last_name`,`title`,`department`,`contact_office`,`contact_mobile`,`contact_fax`,`primary_address`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_address`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email`,`description`,`assigned_to`,`account_id`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'','Escasio','Angelo','','','','+63495432647','','','Sta. Rosa','LAG','4026','Philippines',0,'','','','','','','',2,3,1,'2016-07-08 01:45:36','2016-07-08 06:04:29','2016-07-08 06:04:29'),
(2,'Mr','Escasio','Angelo','Section Head','ITS System Design and Development','5843535','+63495432647','5843535','B9 L14 P1 Marco Polo Place, Tagapo','Sta. Rosa','LAG','4026','Philippines',1,'','','','','','avescasio@gmail.com','Description',4,3,1,'2016-07-08 05:03:14','2016-07-08 05:10:41',NULL),
(3,'Mr','Escasio','Angelo','Section Head','ITS System Design and Development','5843535','+63495432647','5843535','B9 L14 P1 Marco Polo Place, Tagapo','Sta. Rosa','LAG','4026','Philippines',0,'B9 L14 P1 Marco Polo Place, Tagapo','Sta. Rosa','LAG','4026','Philippines','avescasio@gmail.com','Description',65,3,1,'2016-07-08 05:19:19','2016-07-08 05:19:19',NULL);

/*Table structure for table `enchan_tasks` */

DROP TABLE IF EXISTS `enchan_tasks`;

CREATE TABLE `enchan_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `related_to` text COLLATE utf8_unicode_ci NOT NULL,
  `related_result` int(11) unsigned NOT NULL,
  `contact_id` int(11) unsigned NOT NULL,
  `priority` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` int(10) unsigned DEFAULT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_assigned_to_foreign` (`assigned_to`),
  KEY `tasks_contact_id_foreign` (`contact_id`),
  CONSTRAINT `tasks_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`),
  CONSTRAINT `tasks_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `enchan_contacts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_tasks` */

insert  into `enchan_tasks`(`id`,`subject`,`status`,`start_date`,`due_date`,`related_to`,`related_result`,`contact_id`,`priority`,`description`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Test date time','Not Started','2016-07-20 09:44:00','2016-07-21 09:50:00','projects',2,1,'Low','Descriptions',2,1,'2016-07-20 09:48:14','2016-07-27 16:01:00',NULL),
(2,'Tasks 2','In Progress','2016-07-27 08:30:00','2016-07-27 17:30:00','accounts',3,1,'Low','Descriptions',2,1,'2016-07-27 16:03:15','2016-07-27 16:03:15',NULL),
(3,'Task 3','Not Started','2016-07-27 16:45:00','2016-07-27 16:49:00','accounts',3,1,'Low','Description',3,1,'2016-07-27 16:49:59','2016-07-27 16:49:59',NULL);

/*Table structure for table `enchan_tests` */

DROP TABLE IF EXISTS `enchan_tests`;

CREATE TABLE `enchan_tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_tests` */

/*Table structure for table `enchan_users` */

DROP TABLE IF EXISTS `enchan_users`;

CREATE TABLE `enchan_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(161) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `middle_initial` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_users` */

insert  into `enchan_users`(`id`,`nick_name`,`email`,`password`,`full_name`,`first_name`,`middle_initial`,`last_name`,`role_id`,`status`,`photo`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator','admin@email.com','$2y$10$FH9J/br5.7T9gdIYIjwPzudJahpNqEdTvtbifnKVM.RqRa4M6JvZy','NA . NA','Administrator','A','Administrator',0,1,'eklogo.png','ArmQuEmSj89w6AweqIQrXYymdoblTmJvLA6jubpWzJiEUyEWSQHliBJg3dfP','2016-05-30 16:41:44','2016-08-24 17:30:09'),
(2,'gelo','avescasio@enchantkingdom.com','$2y$10$itLdHjPajrAAnAtG1DDVYelSxgHNFLZcxk9Zsd6Y1W6B1UeKNyqNW','Angelo V. Escasio','Angelo','V','Escasio',0,1,NULL,'9k9vzZBxBBuVYFsQLsIajcqfttRPs4nh1BFiEPU1Guy1B4qDALCDeI6cla74','2016-05-30 07:36:01','2016-08-22 10:26:54'),
(3,'sales','sales@email.com','$2y$10$LdzrirKwsblQGwwJ5AFWwe2SAWcFu7VcLIUpvUN1PppPSNT7P8SVG','Sales User','Sales','','User',0,1,'eldar.png','zE5T977ng6Zu4S3DCIJWOLhtAEClDnnzyw2fqGSlfMUVUVxpthJip5mxPAL2','2016-05-30 07:36:01','2016-08-24 15:13:08'),
(4,'marketing','marketing@email.com','$2y$10$U.1z/4kzOsVUb8PwEt4H5OTREuPWhnGb7uhue.AhHodMuDTJhwjhm','Marketing User','Marketing','','User',0,1,NULL,'rNTTeJpVdnOKGKKFUHOw3bw7I0PhexUH8Heineq0fYFHvEjnltO2jmbarxXL','2016-05-30 07:36:01','2016-08-17 17:00:43'),
(5,'bins.kenna','demario.gleichner@gmail.com','[\"$2y$10$FZ7Q4YqGy.M30PZysbm69evAvbC74RbBmQIYWQCzgPaCJ5SC5f5','Haskell M. Kris','Haskell','M','Kris',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-08-04 15:01:40'),
(6,'wdurgan','kelsie.tremblay@gmail.com','[\"$2y$10$rZKzhHLQykpHtCovIhaq6useiq\\/.d\\/tcmQfSM8ZPyJ5k8Bdtt','Sanford Z. Zemlak','Sanford','Z','Zemlak',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-08-04 15:02:14'),
(7,'slabadie','collier.teagan@gmail.com','$2y$10$v2rqhnhBqIV6fNVP62OCXuz5bU.3w7iowu7ZiEYUg96q0BMbEK6.2','Trisha D. Bernier','Trisha','D','Bernier',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-05-30 07:36:02'),
(8,'diana.koepp','benton75@stamm.com','$2y$10$S0dIBF8pSmZPAouZzn4ytuNoT2M.iXOe99kNaI3UMwYo61joqcXwi','Jay K. Willms','Jay','K','Willms',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-05-30 07:36:02'),
(9,'gbogan','feeney.earline@gmail.com','$2y$10$6uJ..jZZ8dAlkoU9FnJJI.vv9sDTngGdh.nwpSzaHpzRbn2TiMjCC','Shanelle L. Ryan','Shanelle','L','Ryan',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-05-30 07:36:02'),
(10,'brannon.champlin','mckenzie.mara@stokes.net','$2y$10$wVitN4vpspbZaz2knLiiZ.H86d909ITUntoVDaoFYgpiLSEVKPSxi','Ayana L. Gleason','Ayana','L','Gleason',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-05-30 07:36:02'),
(11,'legros.trycia','nicolas.modesto@kilback.com','$2y$10$Xe05cdwZO0A4YRzTEc3q9e.tq30ZvXgh2cu010/pbiEcR.iLbmf0W','Ahmad L. Schoen','Ahmad','L','Schoen',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-05-30 07:36:02'),
(12,'beer.kenna','lottie81@gmail.com','$2y$10$4aNmu8xEQmrN65CnUnbgdeixkSS9G8msylG6FBM1V4rkrRlnQLHXu','Vernon C. Stoltenberg','Vernon','C','Stoltenberg',0,1,NULL,NULL,'2016-05-30 07:36:02','2016-05-30 07:36:02'),
(13,'leslie48','barrows.cassidy@yahoo.com','$2y$10$5nzUiVwWyx/LVRjnsIf8Pek68WgBscLV4j1TL7im/oHXta.Bcj5tq','Reginald M. Stamm','Reginald','M','Stamm',0,1,NULL,NULL,'2016-05-30 07:36:03','2016-05-30 07:36:03'),
(14,'sabrina.ledner','kglover@gmail.com','$2y$10$GtE.pMdBDBy8dXdtY7GROuj7uhNmaMtcWxAnOebpO6EngnB00gX5u','Freddy M. Lind','Freddy','M','Lind',0,1,NULL,NULL,'2016-05-30 07:36:03','2016-05-30 07:36:03'),
(15,'kiehn.lea','konopelski.annalise@yahoo.com','$2y$10$UJqiwnIKK.MmHQh5.ntBh.65bwiQ8IJwWP/kP.4JG/5T8z/tdSGPe','Cornell V. Conroy','Cornell','V','Conroy',0,1,NULL,NULL,'2016-05-30 07:36:04','2016-05-30 07:36:04'),
(16,'marley81','nadia28@cartwright.com','$2y$10$v1sLEa14FnDzwF6s75wS4e1SoxoK6Jagrrtb4v3CzBzh.f/DowI0K','Raina K. Wilderman','Raina','K','Wilderman',0,1,NULL,NULL,'2016-05-30 07:36:04','2016-05-30 07:36:04'),
(17,'tillman.eduardo','vgutkowski@gmail.com','$2y$10$mJ.hTb8gobt1Ls7i3V4CjehhTrmo4P7axLagqdVBfIomW5iMEm8NS','Ahmed F. Zulauf','Ahmed','F','Zulauf',0,1,NULL,NULL,'2016-05-30 07:36:04','2016-05-30 07:36:04'),
(18,'maya.waters','bryce.barton@gmail.com','$2y$10$pZ1SZmCFXGUr4sndm818G.Fof3oYinOsNbpD94TqfwOmlCZDM/g8e','Hunter O. Wuckert','Hunter','O','Wuckert',0,1,NULL,NULL,'2016-05-30 07:36:04','2016-05-30 07:36:04'),
(19,'heller.luisa','floy79@parker.info','$2y$10$pU46rjMhwU6hWZtUpVhY8uefigunAEfaBkG91rzRgQ9ZXAl/.Z9BK','Charley Z. O\'Connell','Charley','Z','O\'Connell',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(20,'mia67','ghartmann@waters.org','$2y$10$Fwi3oQ75WYCIE/Gfo4emWOI9wtKYY.y1dOhUPN8bi2kLvlWsVjhha','Brittany D. Stark','Brittany','D','Stark',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(21,'vbreitenberg','yolanda97@yahoo.com','$2y$10$nDJIqRFdjSAlqy7uws2B9usLtM0DJ31e0fg2K3CSVyARI6VmDqBGu','Brian Q. Romaguera','Brian','Q','Romaguera',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(22,'raina56','mfranecki@marquardt.net','$2y$10$MoCnJEaeBfpL2WJB5e3fHuyCJ4MUs97E8li5a37abp3wwI2ie3KZm','Marcelo H. Jerde','Marcelo','H','Jerde',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(23,'hconsidine','barrett50@stokes.com','$2y$10$Jt4jZ33Ipv3w87/HeyaD4eewXKhbIHqAZBxfdToV.odG8S0y3YLPK','Eden B. Schroeder','Eden','B','Schroeder',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(24,'raheem69','soreilly@gmail.com','$2y$10$0xAueB9PzidjD.b6jAhyYeC/ax8t2piTsQ9ZOmmgSlF0i7Lpa.sT6','Julian R. Legros','Julian','R','Legros',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(25,'kwilliamson','rkessler@hotmail.com','$2y$10$L4BbdxoardnyGLOKGZ2qbOZAUUbwOimdPc2qf/n1rD.2.sgSkO2be','Shemar G. Greenholt','Shemar','G','Greenholt',0,1,NULL,NULL,'2016-05-30 07:36:05','2016-05-30 07:36:05'),
(26,'loyal.braun','wyatt62@hotmail.com','$2y$10$nvY3xeJwWDdpA477rXU5heBiQw49NMo5pWb3qjm3qrxGpjvC/rTpe','Pablo U. Lowe','Pablo','U','Lowe',0,1,NULL,NULL,'2016-05-30 07:36:06','2016-05-30 07:36:06'),
(27,'watson53','ncrist@yahoo.com','$2y$10$jne4Xa0ekXdvENyVaA.zAeFCnNKAA.hqwVbvMoU/xlY3OTbS44Zsa','Kirsten Y. Welch','Kirsten','Y','Welch',0,1,NULL,NULL,'2016-05-30 07:36:06','2016-05-30 07:36:06'),
(28,'reinhold.hand','edmond.schamberger@abbott.net','$2y$10$gVi6JfV.jjTKOCwH3nI0S.kBBVFuYYfyD7Rq/J.hWLR6ZLqgd8o.e','Terrell Y. Franecki','Terrell','Y','Franecki',0,1,NULL,NULL,'2016-05-30 07:36:07','2016-05-30 07:36:07'),
(29,'hermann41','wgreenfelder@mayert.com','$2y$10$r5sx.8o1UZEq9YqMAqookedpY0mPFHW9sZWS38AUAntQF59EUlQxi','Amira Y. Cremin','Amira','Y','Cremin',0,1,NULL,NULL,'2016-05-30 07:36:07','2016-05-30 07:36:07'),
(30,'jabari56','jessyca.reynolds@gerlach.com','$2y$10$0MGVcvp/vbFyfnR68/EKbeWDjNSCUffMp27UXDBHZb4pNVJwDq5Sy','Shania Z. Maggio','Shania','Z','Maggio',0,1,NULL,NULL,'2016-05-30 07:36:07','2016-05-30 07:36:07'),
(31,'icollier','enrique.upton@feeney.com','$2y$10$kw8ANM/NW5q/R8/.50F2uudfO3T0zzxNBkstLgfJ6n14zyifaC6Q6','Yolanda D. Hoeger','Yolanda','D','Hoeger',0,1,NULL,NULL,'2016-05-30 07:36:07','2016-05-30 07:36:07'),
(32,'fkeebler','edythe46@gmail.com','$2y$10$RR5OcbawjxszzvOZOBx5t.B.WMFO/uk0VnooTMDsfklk89xxHqV76','Filomena D. Waelchi','Filomena','D','Waelchi',0,1,NULL,NULL,'2016-05-30 07:36:07','2016-05-30 07:36:07'),
(33,'little.alejandrin','lesch.olen@koepp.net','$2y$10$0K8E8NRa5JWM8rl22EbGv.ZrOiZzEClEy5RLIJgDUzVIMjsu4pRH.','Ethel B. Conroy','Ethel','B','Conroy',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(34,'zgaylord','qoconnell@gmail.com','$2y$10$3Mvytx0bA5ck.h7OqgRqFubb5eLz.NzV8Zobvq/rZ5U4Y.P5I7fd.','Bart N. Hodkiewicz','Bart','N','Hodkiewicz',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(35,'christa.littel','veda.wisoky@yahoo.com','$2y$10$d47sBawH0tnJEZzt0BWLoeUauUMlXnJ/hwIbp5GtJ6BxbnIm0GK8i','Tina I. Douglas','Tina','I','Douglas',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(36,'carmel.ziemann','braxton70@steuber.com','$2y$10$1prKpj9CVQrRlfczdg7PLOwhHeJexTCMt6iBUQWWXi64LDaEvVikW','Matilda T. Hessel','Matilda','T','Hessel',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(37,'anthony.reichel','cristian20@windler.com','$2y$10$nTC2/4SnOM9rjZbL1ghVbeLC3DM4NSuPDW9facW4iT7uwoLynkVXO','Marquise R. Borer','Marquise','R','Borer',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(38,'kelvin.hauck','von.madisyn@yahoo.com','$2y$10$el/cNrEmW9SAVngrBUQESe05l2xl1DgqipjgDNVslyc/tO.gZ3Niq','Malinda I. Spencer','Malinda','I','Spencer',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(39,'konopelski.lenny','pmccullough@zieme.com','$2y$10$50CFTKp6wuxRI2C.J.WfkOim3rSQVgcz1MeCy2RxH4f7HnCN8N.e2','Maxwell Q. Thompson','Maxwell','Q','Thompson',0,1,NULL,NULL,'2016-05-30 07:36:08','2016-05-30 07:36:08'),
(40,'christian.reilly','hayes.heath@blick.com','$2y$10$lZP429BF/OEdP4EAXi8ktexzkXhSFeB9s5k.UW.qArtN28Y545CN2','Connie B. Witting','Connie','B','Witting',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(41,'matilda.stoltenberg','ebert.leonel@hotmail.com','$2y$10$w/lUuHzlKmDu59YOswKzx.HMuN.wZAGnDPj93/9Rm.eVgUlEhGlgm','Mikayla B. Lakin','Mikayla','B','Lakin',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(42,'lschaefer','bbaumbach@hotmail.com','$2y$10$8VWjZU5sjDda68A6JP1tQ..mZma5E39O0/lNRX9RPit7QElyhBedq','Megane Q. Wunsch','Megane','Q','Wunsch',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(43,'kuhic.ada','nathan.gibson@yahoo.com','$2y$10$Qsjl3vMeklZUzzoYqoX78.0PyEthJcxkv5ITu/jYzRGb2FQWtWzqu','Marguerite J. Huel','Marguerite','J','Huel',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(44,'alivia.gusikowski','demario43@price.com','$2y$10$om7II2im3DYJtCgDel8dw.EXhuWmYSl0WM/YRqItLunshN1W5G4PC','Eino U. Goodwin','Eino','U','Goodwin',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(45,'larkin.gwendolyn','monahan.andy@gmail.com','$2y$10$6SgznxRVKF2dET.PygEPI.MSTFgORtOdNXuT4puL8qep3zD2z/y6K','Rudolph P. Schinner','Rudolph','P','Schinner',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(46,'macey.thiel','aileen28@kling.com','$2y$10$dJXf9sdMcjTgc0/jwATfA.FptdsN5Hx19xj371E0ARgI3aSEjqNly','Gerry H. Hauck','Gerry','H','Hauck',0,1,NULL,NULL,'2016-05-30 07:36:09','2016-05-30 07:36:09'),
(47,'swyman','meda.wehner@mcdermott.com','$2y$10$LqYCQL3To9wh1oI7y9Rbyuh0DyII6B0tjNR7TupGzS1iytBzjUdje','Andy W. Blick','Andy','W','Blick',0,1,NULL,NULL,'2016-05-30 07:36:10','2016-05-30 07:36:10'),
(48,'eschimmel','rodrick01@hotmail.com','$2y$10$m8DwfdAIeMWrFLxd.1HJqewUwCxBQ4vLc7cmDJsTrrNdRFGMKSNnG','Braeden G. Cummerata','Braeden','G','Cummerata',0,1,NULL,NULL,'2016-05-30 07:36:10','2016-05-30 07:36:10'),
(49,'leopold.howe','rconn@bosco.com','$2y$10$arMt0c4hqgrGfnJKckmVKO6X/CcfcYNZDQKqQbvBIulqDuHWwnDJW','Lizeth F. Pfeffer','Lizeth','F','Pfeffer',0,1,NULL,NULL,'2016-05-30 07:36:10','2016-05-30 07:36:10'),
(50,'christophe.hyatt','austyn44@fritsch.biz','$2y$10$rETLMEJeo2TFuU5yD7Pt4uCM8t.4a1dCDmImyA1AbYDg9/9G3364y','Leatha F. Monahan','Leatha','F','Monahan',0,1,NULL,NULL,'2016-05-30 07:36:10','2016-05-30 07:36:10'),
(51,'verna.kovacek','annie.schmeler@bogisich.biz','$2y$10$8XSo9md5nMFNG.k4s8eRp.z8G6jSshgdU9xw5dbpNrbIbWZT.n.n6','Larissa C. Frami','Larissa','C','Frami',0,1,NULL,NULL,'2016-05-30 07:36:10','2016-05-30 07:36:10'),
(52,'devan.schultz','chauncey04@stoltenberg.com','$2y$10$iy0gSw7Wa3Oo2zm2HT83IulIOFwY/IlyIWemn5EeBc5PTELIVUhkS','Ottis Z. Watsica','Ottis','Z','Watsica',0,1,NULL,NULL,'2016-05-30 07:36:11','2016-05-30 07:36:11'),
(53,'margarett56','pouros.bianka@hotmail.com','$2y$10$VY7SP.K1a6SsT0c.3mAZ4eenn9aM2lTL4nO7zsxm5Brfrsc0xRHnu','Craig T. Lynch','Craig','T','Lynch',0,1,NULL,NULL,'2016-05-30 07:36:11','2016-05-30 07:36:11'),
(54,'douglas.chelsie','regan52@yahoo.com','$2y$10$jEqaOWatAvFh7c9usen2pesOmj6sfnpcPi4SmkAyx/CD6ATe3su5S','Mallie R. Kirlin','Mallie','R','Kirlin',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(55,'daija04','cruickshank.ova@turner.org','$2y$10$aCptJoy9wQqzEMa6s7iFhO/0Drbdo9CmHT0D4BuzImI3JEefXDUJG','Abagail G. Wilkinson','Abagail','G','Wilkinson',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(56,'destinee.west','abergnaum@hotmail.com','$2y$10$1JylcJ3fa9z.LiQ94v38Pud3Glob.N3T1jtSvGn3XDW7dofLlZcye','Nya T. Dickens','Nya','T','Dickens',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(57,'friedrich.lemke','frami.watson@ward.com','$2y$10$UbFLGD/5H.MQEjPgKHiXvOSeJg8aN4LTlOHFYchTfvXYLWpXnOq/G','Seth O. Kulas','Seth','O','Kulas',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(58,'yspencer','lilliana88@hotmail.com','$2y$10$YUpe87X1Y3kgD12PHDWAr.Klrpg4GVlr0Xn3mpwv/7NSNfOGx18qW','Olga Z. Denesik','Olga','Z','Denesik',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(59,'prosacco.dortha','halle50@yahoo.com','$2y$10$wuxfChO/o3q9IsX5aE7e.u.W2qBqXlxUh/mO8wuROtBVpShMbkUXy','Geraldine G. Schuster','Geraldine','G','Schuster',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(60,'giovanny.waters','alfreda.bernier@beatty.com','$2y$10$2RJ8yADRy9nsFYBK6IMh0.v2dPrG2PzPTmu6aV6rGa.stHcAtHNVq','Kaitlin G. Gleichner','Kaitlin','G','Gleichner',0,1,NULL,NULL,'2016-05-30 07:36:12','2016-05-30 07:36:12'),
(61,'walter.triston','bgreen@krajcik.biz','$2y$10$Z9EXe.ZCSwivobcdDkHzBOkqNoQPeqqr8NcF5ko3DWkwMads8Tbwu','Vivien W. Quigley','Vivien','W','Quigley',0,1,NULL,NULL,'2016-05-30 07:36:13','2016-05-30 07:36:13'),
(62,'bschneider','lucius.douglas@gmail.com','$2y$10$0T.6s/hqWy5QE.ZTU/tLnOsFE4W9fxq/li94L53U0xMYH.QbARZhS','Gwendolyn A. Nader','Gwendolyn','A','Nader',0,1,NULL,NULL,'2016-05-30 07:36:13','2016-05-30 07:36:13'),
(63,'bechtelar.laron','arely22@little.com','$2y$10$ie.oe2BdIQsvr6m.MAY0VewCvmBzXwK4eTXQdjLBC3TFcIdx9ZCgm','Maiya M. Hand','Maiya','M','Hand',0,1,NULL,NULL,'2016-05-30 07:36:13','2016-05-30 07:36:13'),
(64,'edouglas','orlando.larson@rogahn.com','$2y$10$juPVMNpjPxQW7SLJdtyRuuyJMVjWs.8fXHGMPx2KH2piWY.2IJnDq','Pierre L. Eichmann','Pierre','L','Eichmann',0,1,NULL,NULL,'2016-05-30 07:36:13','2016-05-30 07:36:13'),
(65,'gmarvin','ernestina.nicolas@stokes.com','$2y$10$mriwVqtPEoMyfyegj4lDq.Ztpr7lcQTfFykSZhQsTcLARKXFpF3AC','Elvie X. Schaefer','Elvie','X','Schaefer',0,1,NULL,NULL,'2016-05-30 07:36:14','2016-05-30 07:36:14'),
(66,'zgutkowski','alia95@hotmail.com','$2y$10$eEQohPTq6OWhIu5oaCMuyuNKp8KtERpPJpW5Yc/.0xWvdaP9iBS7C','Newton C. Pollich','Newton','C','Pollich',0,1,NULL,NULL,'2016-05-30 07:36:14','2016-05-30 07:36:14'),
(67,'oconnell.jan','oeichmann@farrell.com','$2y$10$4h1sAiIROT1WwS76T0Fp4eY4WkazyVeE0pl3Xg6qWFYQZTB72VMYm','Helmer Y. Farrell','Helmer','Y','Farrell',0,1,NULL,NULL,'2016-05-30 07:36:14','2016-05-30 07:36:14'),
(68,'ally70','wdicki@dare.com','$2y$10$Nf6UzKZPfFjIFu5lRB/3muYd0XTQjmcE9WGkxot7Hd1Vle18U8Qqy','Lemuel E. Monahan','Lemuel','E','Monahan',0,1,NULL,NULL,'2016-05-30 07:36:15','2016-05-30 07:36:15'),
(69,'sophia75','alba.hessel@yahoo.com','$2y$10$cQhxG1Jz.cIolvabc9piWOK5w8B45v5xOj98U3Bsal1ECLbX7Hp9a','Greta A. Homenick','Greta','A','Homenick',0,1,NULL,NULL,'2016-05-30 07:36:15','2016-05-30 07:36:15'),
(70,'kulas.carlee','alanna.bins@king.com','$2y$10$QOxJpn4uuZdezwgwJDlVXe7IgyuLweJpzOR00jnZ1j1/4mizV.SeC','Edwin R. Ward','Edwin','R','Ward',0,1,NULL,NULL,'2016-05-30 07:36:15','2016-05-30 07:36:15'),
(71,'bruen.zakary','ona.ritchie@connelly.com','$2y$10$Myui6NmQqhKQws5GPxs2I.lUz2swUIBgh6iA8LuTYXDib4uZ7NGl6','Brent D. Hackett','Brent','D','Hackett',0,1,NULL,NULL,'2016-05-30 07:36:15','2016-05-30 07:36:15'),
(72,'nwiegand','xtrantow@johnston.biz','$2y$10$ry2LelmgdjFnZIVkC1VWS.Vj10Gs7y7B8A631.raBccxjlv/sE2hS','Shanelle D. Hirthe','Shanelle','D','Hirthe',0,1,NULL,NULL,'2016-05-30 07:36:15','2016-05-30 07:36:15'),
(73,'ima63','mariano.pfannerstill@casper.biz','$2y$10$wlrE.k1aB/nB7XAN5KhYa.7sHKXVpxNns/4LoV3DXOqcsCiCloNnS','Roxane T. Rogahn','Roxane','T','Rogahn',0,1,NULL,NULL,'2016-05-30 07:36:15','2016-05-30 07:36:15'),
(74,'xhoeger','smitham.chloe@oconner.net','$2y$10$0Xg4bosHIv8/sbRbl/mszO2h9UVnv49BsS8N3yM.JFIwkKIW7SVkK','Gussie P. Cartwright','Gussie','P','Cartwright',0,1,NULL,NULL,'2016-05-30 07:36:16','2016-05-30 07:36:16'),
(75,'newell.mills','efrain90@hotmail.com','$2y$10$YyZWWAj.UYyxmITfgYwFsuXGOOBPNQmUxqorb5eRPlrx/xw.o425.','Malika K. Batz','Malika','K','Batz',0,1,NULL,NULL,'2016-05-30 07:36:16','2016-05-30 07:36:16'),
(76,'richard.heidenreich','lola.feil@gmail.com','$2y$10$XsMLGNySzwcLm05ZFVo1weh3uwARC3G3KjLCFxpQ3mYXirHkvejnS','Kathleen C. Cummings','Kathleen','C','Cummings',0,1,NULL,NULL,'2016-05-30 07:36:16','2016-05-30 07:36:16'),
(77,'umarquardt','hirthe.amiya@gmail.com','$2y$10$j63Fbyc.tEps0dx9y5/99eUvde2STpPhMdRPf9JPgnIt9QFPWkQUu','Christiana D. Kirlin','Christiana','D','Kirlin',0,1,NULL,NULL,'2016-05-30 07:36:16','2016-05-30 07:36:16'),
(78,'curtis93','kameron67@torphy.com','$2y$10$POtiLlAq.gPtpsvp/6oQsO.88hC4T3TPjtqnlYk0QG0NbKsKSfKX2','Dora J. Runolfsdottir','Dora','J','Runolfsdottir',0,1,NULL,NULL,'2016-05-30 07:36:17','2016-05-30 07:36:17'),
(79,'weber.thomas','cathrine12@schneider.com','$2y$10$u/XziGQibObUbSxWVvsJxu5HQspb./3XWoDQl6ynzhoiJoxS6PSIu','Ulices J. Harris','Ulices','J','Harris',0,1,NULL,NULL,'2016-05-30 07:36:17','2016-05-30 07:36:17'),
(80,'mosciski.giuseppe','jazlyn31@turcotte.com','$2y$10$qS0LUYC/S7mtvoF8cZbp8uVdGUwL9DS4x7eGt6pqD0sGhF83HEfrO','Lucy I. Luettgen','Lucy','I','Luettgen',0,1,NULL,NULL,'2016-05-30 07:36:17','2016-05-30 07:36:17'),
(81,'maverick47','evelyn49@hotmail.com','$2y$10$2LCSka86MGeTOebrznOOB.9RUCFe.hG7.IRZRe3GntouMezFpbjVy','Chelsea G. Schuppe','Chelsea','G','Schuppe',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(82,'sheridan.torphy','ekohler@hotmail.com','$2y$10$xTlhKjdTp7Yf65ZBBBZ70.2z7/IyAYIUO6TZcMTGIgOggC1P7tVmC','Name U. O\'Conner','Name','U','O\'Conner',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(83,'leo.green','brook.franecki@hills.biz','$2y$10$mR8smBZCCw5WR82.mMHgYufYJ5xqILR5h8cgojSHEhc//siR7CxYu','Okey E. Kuphal','Okey','E','Kuphal',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(84,'glakin','destiny60@hotmail.com','$2y$10$xb.XvGYkX8CNCuKikAEe7ucmdLejdrCsQHUNmP1IPdNyVqUOwf736','Gerda X. McClure','Gerda','X','McClure',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(85,'tledner','pkoss@kovacek.biz','$2y$10$qGU6MrsmkAZqUj08SakyxOOfgVlQZTFdQsZsJB39E1UX0KXreP5x.','Ardith F. Romaguera','Ardith','F','Romaguera',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(86,'evert57','abbott.brook@okuneva.info','$2y$10$6nReuhBXoJxPgWBLJihxXObcfE/ZPzgx8WjoRRjJJ.TFvZ/nEc/nK','Maxine P. Kshlerin','Maxine','P','Kshlerin',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(87,'renner.adrien','lula.fritsch@dickens.com','$2y$10$4Q3qqkTWtoueTz8aiKwWdeWVU7B1FwiTdTa47zOLW5r1U5e1MR1i2','Caitlyn D. Bechtelar','Caitlyn','D','Bechtelar',0,1,NULL,NULL,'2016-05-30 07:36:18','2016-05-30 07:36:18'),
(88,'langosh.simeon','mackenzie.kris@hotmail.com','$2y$10$QRX7yV2WR5GdBmb.dvkFAOWVWNRVzstvHyCP7Xu8nfnbmE4okf7l2','Brigitte N. Heathcote','Brigitte','N','Heathcote',0,1,NULL,NULL,'2016-05-30 07:36:19','2016-05-30 07:36:19'),
(89,'gregg51','christiansen.hollie@hotmail.com','$2y$10$cxQT9K/FcmXc4hgl9xMc.uJvq9CCQTaUBY4lHjVN1Uqpci8H1SJai','Ricky J. Dickinson','Ricky','J','Dickinson',0,1,NULL,NULL,'2016-05-30 07:36:19','2016-05-30 07:36:19'),
(90,'wilkinson.zelma','rbeier@gmail.com','$2y$10$ZAKPf1ERRon5QrqEgbqLFuLBIBSHFnBwLjUzhuAOkXu6gna6g0gji','Sam I. Thiel','Sam','I','Thiel',0,1,NULL,NULL,'2016-05-30 07:36:19','2016-05-30 07:36:19'),
(91,'bode.reyna','kamille23@spencer.biz','$2y$10$S64vEqMcd.7gHwRho91qvO2puFAhXQn6gi.IqyOCp4h1ecF6shJmK','Elody U. Kris','Elody','U','Kris',0,1,NULL,NULL,'2016-05-30 07:36:19','2016-05-30 07:36:19'),
(92,'tmueller','mkonopelski@gmail.com','$2y$10$2DCyFGx4tppvW/FMYvd2IO0FAfeq7NVMOKEM60G8Wbl70jQ2IZM.S','Claude B. Hayes','Claude','B','Hayes',0,1,NULL,NULL,'2016-05-30 07:36:20','2016-05-30 07:36:20'),
(93,'braun.judd','hagenes.olin@ledner.net','$2y$10$86OoOWoab9QWEMxaSpmNf.ioqUO5O5n4U/1W7FOJWCoJAouNaDUHm','Deonte U. Treutel','Deonte','U','Treutel',0,1,NULL,NULL,'2016-05-30 07:36:20','2016-05-30 07:36:20'),
(94,'gillian.padberg','flo.turner@hyatt.org','$2y$10$Bz/fEVeYGVegJoVuK.b.6uExHRO8u6XP1jXc/KnEuDuDO/qa5yqNS','Buddy S. Corkery','Buddy','S','Corkery',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(95,'obie.brown','metz.abelardo@abbott.com','$2y$10$6Ti5btDtyRgHkim.DqrzDOkb6VrB9FXbNm3a/cq2YvYGueBeOrGea','Braeden C. Cole','Braeden','C','Cole',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(96,'bergstrom.jaleel','fabian61@gmail.com','$2y$10$lA5gZMZkn327M2HPeMmn7u2DgLbEwhlku6FTNIBjpWa/AwVq8A5lq','Quincy B. Hand','Quincy','B','Hand',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(97,'sonya.welch','taurean66@hotmail.com','$2y$10$a4kOR2P0lMRI12b.mwcw2uF4swEFFiJPsoteFSg15Wse6ZVOhiLge','Maxwell G. Sawayn','Maxwell','G','Sawayn',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(98,'edwardo46','janelle72@sanford.com','$2y$10$I4NLQkRfuBxYWVvEZPZvAOQpM.CRVw4Hl1TcqyBKwAiGX2tef1Lt6','Quinn K. Carroll','Quinn','K','Carroll',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(99,'ludie66','stroman.kassandra@hotmail.com','$2y$10$eMkKkSFa6b96t/ioF/NmFuQoK7H.JYXdxabbY3JRwAjNm8sMF5DVm','Sabina L. Schiller','Sabina','L','Schiller',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(100,'yoshiko90','conroy.beulah@hotmail.com','$2y$10$4NO46f73frBm5vpjGcvYuelDaujqCIPjEJXYc2j76dHDQaIMnxwra','Percy K. Gorczany','Percy','K','Gorczany',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(101,'gbalistreri','orogahn@barton.net','$2y$10$Wof.V21rZOgu2JtgTlmrD.kM.qWYqKE/CGkBiiz/tJIpTs.BLg8Fy','Nasir B. Powlowski','Nasir','B','Powlowski',0,1,NULL,NULL,'2016-05-30 07:36:21','2016-05-30 07:36:21'),
(102,'tillman.ardella','lizzie.walter@prohaska.com','$2y$10$m8vK/doA9LPt28K.OliMze.jhvF4Mdoki.jHIcJlOcTKGoJTeq64.','Kimberly Z. Swift','Kimberly','Z','Swift',0,1,NULL,NULL,'2016-05-30 07:36:22','2016-05-30 07:36:22'),
(103,'nwaelchi','xrowe@treutel.org','$2y$10$tsM1d9sp2TpAq5DtUODX5Or3PAF53j4MOfXXuC0ELtk/usNDsz3F2','Jarvis X. Boyer','Jarvis','X','Boyer',0,1,NULL,NULL,'2016-05-30 07:36:22','2016-05-30 07:36:22'),
(104,'','test1@mail.com','$2y$10$VMJ6N66cNc9yAvzg6srVHeNJrprQIgIzXyPENp24WrpvF59q2D9mG','Angelo V. Escasio','Angelo','V','Escasio',0,1,'comodod.jpg',NULL,'2016-08-24 14:07:12','2016-08-24 14:07:12'),
(105,'','test2@mail.com','$2y$10$d8Fn8W6V22aNGZrPWCWK/.mAAIeLPlZ6OZqlGu9CCpgnpfkRU.SRS','Angelo V. Escasio','Angelo','V','Escasio',0,1,'stanmarsh.jpg','8xaOnGtEhMHRHtM5pswQj2046zvSqKnNj84t6c7BH6seqgdQIszSD9flCyFX','2016-08-24 17:31:07','2016-08-24 17:36:14'),
(106,'gelo','test3@mail.com','$2y$10$b8EVdHosbT4X1bTloOTUkuS3DHCzDM1ZBqJ.TPR5NwK3pZDP28nQ6','First M. Last','First','M','Last',0,1,'stanmarsh.jpg','ImMFoZ4mIKDGIgD0g98D3GBNinNgDKLacU3YpH1s4PHVLE7Q3VfFzjaxKcgv','2016-08-30 09:54:37','2016-08-30 09:55:22'),
(107,'gelo','test4@mail.com','$2y$10$fBcWUd2W91ijcVTT2bWgy.9z3f6Lq.xVPou7tR5al1JF6UVqsai2K','First M. Last','First','M','Last',0,1,NULL,'y16ZrOLBc8R4xjPCGzPKu9cSPSdiiLYxuN1bhX5xmKnHwHeEPzZCmMIsJ09k','2016-08-30 10:12:16','2016-08-30 10:35:34'),
(108,'Test 5','test5@mail.com','$2y$10$qCY7QQD6YBBI/5ZLZWb7wuNYIlJnZGedZE3R2bkj8oTfG9EzZdBEO','First M. Last','First','M','Last',0,1,'comodod.jpg','LpcbDOsAieDfnDiz3rNOhIu8ifSxBVHdqNDj668NqCyuUGxY2L1jQO55WhRf','2016-08-30 10:42:11','2016-08-30 10:42:19');

/* Trigger structure for table `enchan_users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `concat_first_middle_last_name` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `concat_first_middle_last_name` BEFORE INSERT ON `enchan_users` FOR EACH ROW BEGIN
	SET NEW.full_name = CONCAT(NEW.first_name,' ', New.middle_initial,'. ', NEW.last_name);
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
