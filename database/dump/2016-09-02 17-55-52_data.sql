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

/*Data for the table `enchan_accounts` */

/*Data for the table `enchan_calendars` */

/*Data for the table `enchan_calls` */

/*Data for the table `enchan_campaigns` */

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

/*Data for the table `enchan_contacts` */

insert  into `enchan_contacts`(`id`,`salutation`,`first_name`,`mi`,`last_name`,`full_name`,`office_phone`,`position`,`mobile`,`department`,`fax`,`website`,`description`,`primary_street`,`primary_city`,`primary_state`,`primary_postal`,`primary_country`,`same_address`,`secondary_street`,`secondary_city`,`secondary_state`,`secondary_postal`,`secondary_country`,`email_address`,`lead_source`,`campaign_id`,`assigned_to`,`account_id`,`notifications`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mr','Angelo','V','Escasio','Angelo V. Escasio','(002)584-3535','Section Head','(5843)535-____','','','','','','','','','',1,'','','','','','','1',0,1,0,1,'2016-08-31 14:08:11','2016-08-31 14:10:06','2016-08-31 14:10:06');

/*Data for the table `enchan_departments` */

/*Data for the table `enchan_leads` */

/*Data for the table `enchan_meetings` */

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

/*Data for the table `enchan_opportunities` */

/*Data for the table `enchan_password_resets` */

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

/*Data for the table `enchan_projects` */

/*Data for the table `enchan_role_user` */

insert  into `enchan_role_user`(`user_id`,`role_id`) values 
(1,1),
(2,1),
(3,2),
(4,3),
(2,4);

/*Data for the table `enchan_roles` */

insert  into `enchan_roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values 
(1,'admin','Administrators','Can access all','2016-05-30 07:36:25','2016-05-30 07:36:25'),
(2,'sales','Sales Role','Can access sales modules only','2016-05-30 07:36:25','2016-05-30 07:36:25'),
(3,'marketing','Marketing Role','Can access marketing modules','2016-05-30 07:36:25','2016-05-30 07:36:25'),
(4,'developer','Developer','Developer use only','2016-06-09 02:37:25','2016-08-01 09:22:18');

/*Data for the table `enchan_targets` */

/*Data for the table `enchan_tasks` */

/*Data for the table `enchan_tests` */

/*Data for the table `enchan_users` */

insert  into `enchan_users`(`id`,`nick_name`,`email`,`password`,`full_name`,`first_name`,`middle_initial`,`last_name`,`role_id`,`status`,`photo`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator','admin@email.com','$2y$10$FH9J/br5.7T9gdIYIjwPzudJahpNqEdTvtbifnKVM.RqRa4M6JvZy','NA . NA','Administrator','A','Administrator',0,1,'eklogo.png','ArmQuEmSj89w6AweqIQrXYymdoblTmJvLA6jubpWzJiEUyEWSQHliBJg3dfP','2016-05-30 16:41:44','2016-08-24 17:30:09'),
(2,'gelo','avescasio@enchantkingdom.com','$2y$10$itLdHjPajrAAnAtG1DDVYelSxgHNFLZcxk9Zsd6Y1W6B1UeKNyqNW','Angelo V. Escasio','Angelo','V','Escasio',0,1,NULL,'9k9vzZBxBBuVYFsQLsIajcqfttRPs4nh1BFiEPU1Guy1B4qDALCDeI6cla74','2016-05-30 07:36:01','2016-08-22 10:26:54'),
(3,'sales','sales@email.com','$2y$10$LdzrirKwsblQGwwJ5AFWwe2SAWcFu7VcLIUpvUN1PppPSNT7P8SVG','Sales User','Sales','','User',0,1,'eldar.png','zE5T977ng6Zu4S3DCIJWOLhtAEClDnnzyw2fqGSlfMUVUVxpthJip5mxPAL2','2016-05-30 07:36:01','2016-08-24 15:13:08'),
(4,'marketing','marketing@email.com','$2y$10$U.1z/4kzOsVUb8PwEt4H5OTREuPWhnGb7uhue.AhHodMuDTJhwjhm','Marketing User','Marketing','','User',0,1,NULL,'rNTTeJpVdnOKGKKFUHOw3bw7I0PhexUH8Heineq0fYFHvEjnltO2jmbarxXL','2016-05-30 07:36:01','2016-08-17 17:00:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
