/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB : Database - blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `blog`;

/*Table structure for table `bids` */

DROP TABLE IF EXISTS `bids`;

CREATE TABLE `bids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `bid_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bids` */

insert  into `bids`(`id`,`user_id`,`bid_name`,`content`,`record_time`,`created_at`,`updated_at`) values 
(34,11,'Hello','Hi,\n\nHello there\n\nGreetings!\n\n Hi, Greetings of the day!\n\nDear Client\n\nI came across your requirements and believe that I will be an ideal match for you.\n\n I have enough time to do your project and can start right now.\n\n Along with your project requirement, I\'ll provide you clean source code with free bug fixing and maintenance.','2021-08-02 20:07:24','2021-08-02 23:29:43','2021-08-03 03:07:24'),
(35,11,'Introduction & Career','I am a full-stack developer with great experience and deep knowledge of developing Laravel project for 6+ years,Web 3+ Years, Design 5+ Years.\r\n\r\nI have more than 5+ years of experience in PHP ,laravel website,\r\n\r\nI have strong experience in PHP-Laravel development. I have more than 8 years of experience in PHP web development.\r\n\r\nI also worked on HTML5, CSS3, JavaScript, used databases like MySQL,MongoDB etc. \r\n\r\nI can develop Laravel Project','2021-08-02 17:41:33','2021-08-02 23:41:02','2021-08-03 00:36:32'),
(36,11,'Ability','I have good knowledge in laravel\r\n\r\nI have more than 5+ years of experience in PHP ,laravel website, I can make it for you as per your requirements , kindly message me for further discussion.\r\n\r\nAlso use reactJs, VueJs, AngularJs, Nodejs in my projects.\r\n\r\nI am available to discuss now.','2021-08-02 17:41:34','2021-08-02 23:42:04','2021-08-03 00:27:47'),
(37,11,'Expertise','Expertise Skills in Laravel:-\nHTML | Bootstrap | CSS | SCSS | Sass | PHP | Auth & Sentinal | API Development | Social Login | MySQL | MongoDB | CMS etc.','2021-08-02 19:01:25','2021-08-02 23:44:03','2021-08-03 02:01:25'),
(39,11,'want','I just want to discuss few more things.\r\n\r\nI am looking for a long term relationship and ongoing work.\r\n\r\nI am looking forward to working with you!','2021-08-02 17:41:35','2021-08-03 00:22:46','2021-08-03 00:25:58'),
(40,11,'footer','I can start immediately. \n\nI am ready to start work immediately and ensure high-quality results. We can discuss over chat/voice Interview.\n\nLets connect and discuss.\n\nWaiting for your response.\n\nBest Regards\n\nThanks','2021-08-02 19:01:34','2021-08-03 00:24:28','2021-08-03 02:01:34');

/*Table structure for table `eleclib_sorts` */

DROP TABLE IF EXISTS `eleclib_sorts`;

CREATE TABLE `eleclib_sorts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `sort_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `eleclib_sorts` */

insert  into `eleclib_sorts`(`id`,`parent_id`,`sort_name`,`created_at`,`updated_at`) values 
(1,NULL,'Social',NULL,NULL),
(2,NULL,'Natural',NULL,NULL),
(3,NULL,'Cultural',NULL,NULL),
(4,1,'Country',NULL,NULL),
(5,1,'Economic',NULL,NULL),
(6,2,'Computer',NULL,NULL),
(7,2,'Maths',NULL,NULL),
(8,2,'Hardware',NULL,NULL),
(9,2,'Chemical',NULL,NULL),
(10,2,'Physical',NULL,NULL),
(11,3,'Film',NULL,NULL),
(12,3,'Novel',NULL,NULL),
(13,3,'Sport',NULL,NULL),
(14,3,'Music',NULL,NULL),
(15,1,'News',NULL,NULL);

/*Table structure for table `eleclibs` */

DROP TABLE IF EXISTS `eleclibs`;

CREATE TABLE `eleclibs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(9) DEFAULT NULL,
  `booknumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` int(9) DEFAULT NULL,
  `read_cnt` int(9) DEFAULT NULL,
  `download_cnt` int(9) DEFAULT NULL,
  `public_year` int(9) DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `eleclibs` */

/*Table structure for table `inboxes` */

DROP TABLE IF EXISTS `inboxes`;

CREATE TABLE `inboxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `send_time` datetime DEFAULT NULL,
  `receive_time` datetime DEFAULT NULL,
  `read_time` datetime DEFAULT NULL,
  `msg_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_method` enum('show','delete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inboxes` */

insert  into `inboxes`(`id`,`sender_id`,`receiver_id`,`send_time`,`receive_time`,`read_time`,`msg_content`,`view_method`,`created_at`,`updated_at`) values 
(1,1,2,'2021-09-12 23:06:55','2021-09-12 23:06:59','2021-09-12 23:07:02','sdfasfwerfsdaf','show',NULL,NULL),
(2,2,1,'2021-09-12 23:08:19','2021-09-12 23:08:22','2021-09-12 23:08:24','sadfasdfrwerwf','show',NULL,NULL);

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `languages` */

insert  into `languages`(`id`,`sort_id`,`alias`,`language_name`,`created_at`,`updated_at`) values 
(1,'','EN','Enlish',NULL,NULL),
(2,'','KO','Korean',NULL,NULL),
(3,'','CH','Chinese',NULL,NULL),
(4,'','RU','Russian',NULL,NULL),
(5,'','JA','Japan',NULL,NULL),
(6,'','FR','France',NULL,NULL),
(7,'','US','USA',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(2,'2014_10_12_100000_create_password_resets_table',1),
(5,'2021_07_13_025506_create_user_roles_table',1),
(6,'2021_07_14_011236_create_role_assigns_table',1),
(7,'2014_10_12_000000_create_users_table',2),
(8,'2021_07_16_015222_add_new_colum_to_table_name_table',3),
(9,'2021_07_16_093136_create_forms_table',4),
(10,'2021_07_16_233509_add_photo_colum',5),
(11,'2021_07_17_004211_create_items_table',6),
(12,'2021_07_17_081256_create_eleclib_sorts_table',7),
(13,'2021_07_10_062526_create_eleclibs_table',8),
(14,'2021_07_17_084200_create_languages_table',9),
(15,'2021_08_02_160941_create_bids_table',10),
(16,'2021_08_02_162133_create_bids_table',11),
(17,'2021_09_01_104843_create_inboxes_table',12);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `role_assigns` */

DROP TABLE IF EXISTS `role_assigns`;

CREATE TABLE `role_assigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` mediumint(9) DEFAULT NULL,
  `user_id` mediumint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_assigns` */

insert  into `role_assigns`(`id`,`role_id`,`user_id`,`created_at`,`updated_at`) values 
(12,10,1,'2021-07-15 22:09:31','2021-07-15 22:09:31'),
(13,11,1,'2021-07-15 22:09:32','2021-07-15 22:09:32'),
(14,12,1,'2021-07-15 22:09:33','2021-07-15 22:09:33'),
(15,13,1,'2021-07-15 22:09:33','2021-07-15 22:09:33'),
(16,14,1,'2021-07-15 22:09:34','2021-07-15 22:09:34'),
(17,15,1,'2021-07-15 22:09:34','2021-07-15 22:09:34'),
(18,16,1,'2021-07-15 22:09:35','2021-07-15 22:09:35'),
(38,21,1,'2021-07-15 23:54:18','2021-07-15 23:54:18'),
(58,24,1,'2021-07-15 21:49:26','2021-07-15 21:49:28'),
(62,7,3,'2021-07-16 05:33:59','2021-07-16 05:33:59'),
(63,8,3,'2021-07-16 05:34:00','2021-07-16 05:34:00'),
(64,9,3,'2021-07-16 05:34:01','2021-07-16 05:34:01'),
(65,10,3,'2021-07-16 05:34:01','2021-07-16 05:34:01'),
(66,11,3,'2021-07-16 05:34:02','2021-07-16 05:34:02'),
(67,12,3,'2021-07-16 05:34:03','2021-07-16 05:34:03'),
(69,7,2,'2021-07-16 05:34:36','2021-07-16 05:34:36'),
(70,8,2,'2021-07-16 05:34:37','2021-07-16 05:34:37'),
(71,9,2,'2021-07-16 05:34:38','2021-07-16 05:34:38'),
(72,10,2,'2021-07-16 05:34:39','2021-07-16 05:34:39'),
(73,11,2,'2021-07-16 05:34:39','2021-07-16 05:34:39'),
(74,12,2,'2021-07-16 05:34:40','2021-07-16 05:34:40'),
(75,7,4,'2021-07-16 05:34:49','2021-07-16 05:34:49'),
(76,8,4,'2021-07-16 05:34:50','2021-07-16 05:34:50'),
(77,9,4,'2021-07-16 05:34:50','2021-07-16 05:34:50'),
(78,10,4,'2021-07-16 05:34:51','2021-07-16 05:34:51'),
(79,11,4,'2021-07-16 05:34:51','2021-07-16 05:34:51'),
(80,12,4,'2021-07-16 05:34:52','2021-07-16 05:34:52'),
(81,9,1,'2021-07-16 06:52:37','2021-07-16 06:52:37'),
(82,8,1,'2021-07-16 06:52:38','2021-07-16 06:52:38'),
(83,7,1,'2021-07-16 06:52:39','2021-07-16 06:52:39'),
(92,7,6,'2021-07-16 23:59:11','2021-07-16 23:59:11'),
(93,8,6,'2021-07-16 23:59:12','2021-07-16 23:59:12'),
(94,9,6,'2021-07-16 23:59:14','2021-07-16 23:59:14'),
(95,10,6,'2021-07-16 23:59:14','2021-07-16 23:59:14'),
(96,11,6,'2021-07-16 23:59:15','2021-07-16 23:59:15'),
(97,12,6,'2021-07-16 23:59:15','2021-07-16 23:59:15'),
(99,7,7,'2021-07-17 05:44:23','2021-07-17 05:44:23'),
(100,8,7,'2021-07-17 05:44:23','2021-07-17 05:44:23'),
(101,9,7,'2021-07-17 05:44:25','2021-07-17 05:44:25'),
(102,10,7,'2021-07-17 05:44:26','2021-07-17 05:44:26'),
(103,11,7,'2021-07-17 05:44:27','2021-07-17 05:44:27'),
(104,12,7,'2021-07-17 05:44:28','2021-07-17 05:44:28'),
(105,32,1,'2021-07-17 06:40:30','2021-07-17 06:40:30'),
(107,35,1,'2021-07-25 18:44:36','2021-07-25 18:44:36');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(9) DEFAULT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_display` enum('logo','none','sidebar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`parent_id`,`menu_name`,`url`,`sort_display`,`created_at`,`updated_at`) values 
(1,NULL,'User Manage',NULL,'sidebar','2021-07-14 18:20:16','2021-07-14 18:20:56'),
(2,NULL,'Library Manage',NULL,'sidebar','2021-07-14 18:20:47','2021-07-14 18:21:00'),
(3,NULL,'System',NULL,'sidebar','2021-07-14 18:20:50','2021-07-14 18:21:02'),
(6,NULL,'Profiles',NULL,'sidebar','2021-07-14 18:20:53','2021-07-14 18:21:06'),
(7,6,'My Profile','/profiles/my_profile','sidebar','2021-07-15 01:08:03','2021-07-16 05:43:56'),
(8,6,'My Account','/profiles/my_account','sidebar','2021-07-15 01:08:32','2021-07-16 05:48:47'),
(9,6,'My Calendar','/profiles/my_calendar','sidebar','2021-07-15 01:08:53','2021-07-16 05:48:52'),
(10,6,'My Inbox','/profiles/my_inbox','sidebar','2021-07-15 01:09:11','2021-07-16 05:48:57'),
(11,6,'My Tasks','/profiles/my_tasks','sidebar','2021-07-15 01:09:26','2021-07-16 05:49:03'),
(12,3,'Lock Screen','/system/lock_screen','logo','2021-07-15 01:09:49','2021-07-16 05:50:49'),
(13,2,'Book Manage','/library_manage/book_manage','sidebar','2021-07-15 01:11:07','2021-07-25 14:30:13'),
(14,1,'Role Manage','/user_manage/role_manage','sidebar','2021-07-15 01:12:20','2021-07-16 05:54:33'),
(15,1,'Role Assign','/user_manage/role_assign','sidebar','2021-07-15 01:12:54','2021-07-16 05:53:07'),
(16,1,'Sys Users','/user_manage/sys_users','sidebar','2021-07-15 01:13:13','2021-07-16 05:53:13'),
(22,NULL,'History Manage',NULL,'none',NULL,NULL),
(24,1,'Role Assign User','/user_manage/role_assign_user','none','2021-07-16 04:48:06','2021-07-16 05:53:19'),
(32,3,'Password','/system/password','sidebar','2021-07-17 06:40:17','2021-07-17 06:40:17'),
(33,NULL,NULL,NULL,'none',NULL,NULL),
(35,3,'Download','/system/download','sidebar','2021-07-25 18:44:27','2021-07-25 18:44:27'),
(36,6,'Bid Manage','/profiles/bid_edit','sidebar','2021-07-31 22:27:34','2021-07-31 22:27:34');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('apply','stop','allow') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile_Number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Interests` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `About` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Website_Url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logged` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`status`,`Mobile_Number`,`Interests`,`Occupation`,`About`,`Website_Url`,`remember_token`,`created_at`,`updated_at`,`photo`,`logged`) values 
(1,'Admin','admin@email.com','$2y$10$QVwv808Se6wlAJhoKJwGgeFnkKsCeZDEsFwk/Uwfa0eGPBYiJMS2q','allow','1915968578','web design','freelancer','i love my job','freelancer.com','3op86p2FTp8gTgKrcGURoWiVD87rbUHKMFgL1w5xYNRNsJ8ZSrYMMaW2n7B2','2021-07-20 01:19:28','2021-09-12 14:16:03','OgmBTv8qhi2toofKGijyK7czVRmRL4.jpeg',1),
(2,'Andrei','Andrei@email.com','$2y$10$jjRb5nKjQpQJs.tcq5vP/e3Xfr75werRREUtz4arBQ7RKRr7f5NvK','apply',NULL,NULL,NULL,NULL,NULL,'YWntrOzWjZAhrKkmPqnBKpqDX8ky4VAQfWHfTfAZkNF7UVTFj3YYp5jKD396','2021-07-17 05:55:14','2021-07-17 05:55:53','tvgfWp1J1H8YlbIe5U8eTvrxtjdBDz.jpeg',NULL),
(3,'Bell','Bell@email.com','$2y$10$OITiKT/T0MydSU.Pt7HyC.6E7Sb97/WyCWTLUE4qNwfe/3lbmFB/C','allow',NULL,NULL,NULL,NULL,NULL,'K9jruMVeEFKbSlzZbqyt1BSLovzKlZeWB3DngNXtjTxHITh39s3jy4UNcb1w','2021-07-15 23:57:33','2021-07-17 05:49:49','VqAS5sDq3erkpORzk7LI0EUmcoADEq.jpeg',NULL),
(4,'Ronaldo','Ronaldo@email.com','$2y$10$1TZfGv/3jat4Os/s9TrgcexS7v0GFkRuV7ltJjSVIT9rfp2mRc2jO','allow',NULL,NULL,NULL,NULL,NULL,'TAkAxrz7tIAx6ZLKzJHnQxLAUJKsoxSXm4op8RQDH8hYwMZsTfWvEIgEjp0a','2021-07-15 23:59:42','2021-07-17 05:57:16','gOne5Q8iTsfvpq7ucILm9dFV42mqSX.jpeg',NULL),
(6,'Susan','Susan@email.com','$2y$10$B2sd4w8WYZSYXscvNm5B3u9z6tlXeGNyTi/K8pQbffY1q.VZq0p4K','allow',NULL,NULL,NULL,NULL,NULL,'Me86vGyPKdFnFWr05xY4OZSuV1UfGjngUlwJ6TLTtlmCYi17HqwHWfypcuqq','2021-07-16 23:58:18','2021-07-17 05:58:22','mwLMdpJCZp8XyBXnaXH3kIDQ0kiiaX.jpeg',NULL),
(7,'Sue','Sue@email.com','$2y$10$AflXj4c07cEc8B96J6YZBux6MUNnHXk.Bx6EkM2oZlQK/8QKIhICO','allow',NULL,NULL,NULL,NULL,NULL,'AL9wqC9ELErpVb2eaRAZZo5yo2pcOJ9SajrdFAu2aFq6lOCYkItwt0ClmnxD','2021-07-17 03:49:19','2021-07-17 05:44:50','ZJchuRI2s92tW04UMXALz3HjfRSa5c.jpeg',NULL),
(11,'Bids','bids@email.com','$2y$10$CP.f0vt2uXTp1xI0HOMXTu3/Eeke.AFT/cUmc01yv9I4.Sisod3zG','allow',NULL,NULL,NULL,NULL,NULL,'s4mo8PCjvgmbGW6sMUl6S69f8oGwfkvBtrUF09JBREwTzLC5asaFkCBYJn5t','2021-08-03 00:38:02','2021-08-03 02:37:34','NsS16iWfIDn86A9sPBKRfrGoO9KWMv.jpeg',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
