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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_accounts` */

insert  into `enchan_accounts`(`id`,`name`,`website`,`office_phone`,`office_fax`,`description`,`billing_street`,`billing_city`,`billing_state`,`billing_postal`,`billing_country`,`shipping_street`,`shipping_city`,`shipping_state`,`shipping_postal`,`shipping_country`,`employees`,`same_as_billing`,`annual_revenue`,`member_of`,`industry_type`,`account_type`,`campaign_id`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(5,'Coca Cola Bottlers','www.cc.com','584-3535','584-3535','DEscription','billing Stree','City','State','345678','Country',NULL,NULL,NULL,NULL,NULL,'6000',1,'1500000.00','Memberof',4,1,0,3,1,'2016-09-05 11:16:31','2016-09-05 11:16:31',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_calendars` */

insert  into `enchan_calendars`(`id`,`title`,`description`,`start`,`end`,`backgroundColor`,`borderColor`,`allDay`,`url`,`assigned_to`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Test Event','This is a long description','2016-09-20 00:00:00','2016-09-20 00:00:00','#f40c0c','#1f0edb',1,'http://localhost:8000/calendars/1/edit','3;4','2016-09-19 11:27:05','2016-09-19 11:27:05',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_calls` */

insert  into `enchan_calls`(`id`,`subject`,`status`,`status2`,`date_time`,`related_to`,`related_results`,`description`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(3,'Follow up call','Outbound','Planned','2016-09-07 11:30:00','accounts',5,'Description',3,0,'2016-09-06 11:35:53','2016-09-06 11:36:40',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_campaigns` */

insert  into `enchan_campaigns`(`id`,`name`,`status`,`type`,`start_date`,`end_date`,`description`,`budget`,`currency`,`impressions`,`actual_cost`,`expected_cost`,`expected_revenue`,`objective`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Campaign 1 - Test Update','Complete','Active','2016-09-06','2016-09-06','Description','100000.00','P','Test Impression','80000.00','90000.00','500000.00','Campaign Objective here.',3,1,'2016-09-06 09:59:17','2016-09-06 10:30:08',NULL);

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
  CONSTRAINT `contacts_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_contacts` */

insert  into `enchan_contacts`(`id`,`salutation`,`first_name`,`mi`,`last_name`,`full_name`,`office_phone`,`position`,`mobile`,`department`,`fax`,`website`,`description`,`primary_street`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_street`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email_address`,`lead_source`,`campaign_id`,`assigned_to`,`account_id`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr','Lope','','Auxillos','Lope . Auxillos','(002)584-3535','Consultant','(0920)977-7273','Freelancer','(002)584-3535','www.test.com.ph','Descriptions','Street','City','State','234578','Philippines',1,'','','','','','lauxillos@test.com','Cold Call',0,2,0,1,'2016-09-05 10:04:34','2016-09-05 10:21:40','2016-09-05 10:21:40');

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
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `campaign_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leads_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `leads_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_leads` */

insert  into `enchan_leads`(`id`,`salutation`,`first_name`,`last_name`,`office_phone`,`position`,`mobile`,`department`,`fax`,`company_name`,`website`,`description`,`primary_street`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_street`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email_address`,`status`,`status_remarks`,`lead_source`,`lead_source_remarks`,`opportunity_amount`,`referred_by`,`campaign_id`,`campaign_name`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr','John','Doe','(002)584-3535','HR Manager','(0920) 977-7273','Human Resource','(002)584-3535','Convergies Alabang','convergies.com','Description','Street','City','State','4026','Philippines',1,'','','','','','jdoe@mail.com','New','Status Remarks','Cold Call','Leadsource remarks',1500000.00,'Federico Manalang',0,'Test Campaign',1,0,'2016-09-06 09:35:12','2016-09-06 10:26:51',NULL),
(2,'Mr','Delete','Test','','Position','','','','','test.com.ph','','Street','City','State','4026','Philippines',1,'','','','','','','New','','Cold Call','',0.00,'',0,'',1,1,'2016-09-06 09:48:53','2016-09-06 09:49:02','2016-09-06 09:49:02');

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
  `related_result_id` int(10) NOT NULL,
  `related_result` text COLLATE utf8_unicode_ci NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetings_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `meetings_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_meetings` */

insert  into `enchan_meetings`(`id`,`subject`,`status`,`location`,`start_date`,`end_date`,`description`,`related_to`,`related_result_id`,`related_result`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Subject','Planned','Board Room','2016-09-07 14:30:00','2016-09-07 12:00:00','Description','',0,'Coca Cola Bottlerss',3,1,'2016-09-06 14:33:44','2016-09-06 14:51:04',NULL);

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
  KEY `opportunities_account_id_foreign` (`account_id`),
  CONSTRAINT `opportunities_account_id_foereign` FOREIGN KEY (`account_id`) REFERENCES `enchan_accounts` (`id`),
  CONSTRAINT `opportunities_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_opportunities` */

insert  into `enchan_opportunities`(`id`,`name`,`currency`,`closed_date`,`amount`,`type`,`sales_stage`,`lead_source`,`probability`,`next_step`,`description`,`campaign_id`,`account_id`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Coca Cola Bottlers','Peso','2016-09-30','1500000.00','Existing Business','Prospecting','Campaign',80,'Next Step','Descriptions',0,5,3,1,'2016-09-05 11:19:14','2016-09-05 11:23:23',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_projects` */

insert  into `enchan_projects`(`id`,`name`,`status`,`priority`,`start_date`,`end_date`,`notes`,`project_manager`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(3,'EKCITE','Draft','Medium','2016-09-06','2017-09-05','Notes test test test',3,1,'2016-09-06 17:33:59','2016-09-06 17:34:37',NULL);

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
  `company_name` text COLLATE utf8_unicode_ci,
  `notifications` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `targets_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `targets_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_targets` */

insert  into `enchan_targets`(`id`,`salutation`,`first_name`,`last_name`,`title`,`department`,`contact_office`,`contact_mobile`,`contact_fax`,`primary_address`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_address`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email`,`description`,`assigned_to`,`account_id`,`company_name`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr','Test 1 - First Name','Last name','Title','Department','(002)584-3535','(0929)437-3787','(002)584-3535','B9 L14 P1 Marco Polo Place, Tagapo','Sta. Rosa','LAG','4026','Philippines',0,'B9 L14 P1 Marco Polo Place, Tagapo','Sta. Rosa','LAG','4026','Philippines','test@email.com','Description',3,0,'Test Company',1,'2016-09-06 11:05:55','2016-09-06 11:32:33',NULL);

/*Table structure for table `enchan_tasks` */

DROP TABLE IF EXISTS `enchan_tasks`;

CREATE TABLE `enchan_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `related_to` text COLLATE utf8_unicode_ci NOT NULL,
  `related_result` text COLLATE utf8_unicode_ci NOT NULL,
  `related_result_id` int(11) NOT NULL,
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
  CONSTRAINT `tasks_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `enchan_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_tasks` */

insert  into `enchan_tasks`(`id`,`subject`,`status`,`start_date`,`due_date`,`related_to`,`related_result`,`related_result_id`,`contact_id`,`priority`,`description`,`assigned_to`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Subject','In Progress','2016-09-07 15:40:00','2016-09-07 15:44:00','accounts','Coca Cola Bottlers',5,0,'Medium','Descriptions',3,1,'2016-09-06 15:45:39','2016-09-06 16:44:14',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `enchan_users` */

insert  into `enchan_users`(`id`,`nick_name`,`email`,`password`,`full_name`,`first_name`,`middle_initial`,`last_name`,`role_id`,`status`,`photo`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator','admin@email.com','$2y$10$FH9J/br5.7T9gdIYIjwPzudJahpNqEdTvtbifnKVM.RqRa4M6JvZy','NA . NA','Administrator','A','Administrator',0,1,'eklogo.png','iEpsThTttDNIoXSG9pmrtXwzzVvnMt0ZIppXYhfOSYpFii2WFPQzcrp4izC4','2016-05-30 16:41:44','2016-09-21 10:08:13'),
(2,'gelo','avescasio@enchantkingdom.com','$2y$10$itLdHjPajrAAnAtG1DDVYelSxgHNFLZcxk9Zsd6Y1W6B1UeKNyqNW','Angelo V. Escasio','Angelo','V','Escasio',0,1,NULL,'S9JCEPmb9K9i0pofnFJBOV86qZCCZC15JbOsIBDQ0KfpfsjyWazHx1WAgv92','2016-05-30 07:36:01','2016-09-19 11:36:43'),
(3,'sales','sales@email.com','$2y$10$LdzrirKwsblQGwwJ5AFWwe2SAWcFu7VcLIUpvUN1PppPSNT7P8SVG','Sales User','Sales','','User',0,1,'eldar.png','zE5T977ng6Zu4S3DCIJWOLhtAEClDnnzyw2fqGSlfMUVUVxpthJip5mxPAL2','2016-05-30 07:36:01','2016-08-24 15:13:08'),
(4,'marketing','marketing@email.com','$2y$10$U.1z/4kzOsVUb8PwEt4H5OTREuPWhnGb7uhue.AhHodMuDTJhwjhm','Marketing User','Marketing','','User',0,1,NULL,'rNTTeJpVdnOKGKKFUHOw3bw7I0PhexUH8Heineq0fYFHvEjnltO2jmbarxXL','2016-05-30 07:36:01','2016-08-17 17:00:43');

/* Trigger structure for table `enchan_users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `fullname` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `fullname` BEFORE INSERT ON `enchan_users` FOR EACH ROW 
    
    BEGIN
	SET NEW.full_name = CONCAT(NEW.first_name,' ' , NEW.middle_initial,'.',' ',NEW.last_name);
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
