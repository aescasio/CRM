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

/*Table structure for table `enchan_migrations` */

DROP TABLE IF EXISTS `enchan_migrations`;

CREATE TABLE `enchan_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

/*Table structure for table `enchan_password_resets` */

DROP TABLE IF EXISTS `enchan_password_resets`;

CREATE TABLE `enchan_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4,3),
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
(4,'marketing','marketing@email.com','$2y$10$U.1z/4kzOsVUb8PwEt4H5OTREuPWhnGb7uhue.AhHodMuDTJhwjhm','Marketing User','Marketing','','User',0,1,NULL,'rNTTeJpVdnOKGKKFUHOw3bw7I0PhexUH8Heineq0fYFHvEjnltO2jmbarxXL','2016-05-30 07:36:01','2016-08-17 17:00:43')