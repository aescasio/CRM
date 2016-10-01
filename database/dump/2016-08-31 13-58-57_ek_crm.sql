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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
