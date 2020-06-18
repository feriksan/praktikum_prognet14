/*
SQLyog Community v13.0.1 (32 bit)
MySQL - 10.4.11-MariaDB : Database - db_paktikum_prognet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_paktikum_prognet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_paktikum_prognet`;

/*Table structure for table `admin_notifications` */

DROP TABLE IF EXISTS `admin_notifications`;

CREATE TABLE `admin_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `admin_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_notifications` */

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values 
(3,'yogap','$2y$10$.HZlGyfyq7kbuHvm8iwyIOyGadfH4vlfQrUvBtaX/lwWRr09/hbVm','yoga','fotoadmin\\netos10.jpg','08787878888',NULL,'2020-05-12 14:15:13','2020-05-12 14:15:13'),
(4,'diahp','$2y$10$zX16V0IkYiiBzYZvjRrNV.g/TThdbnRsVPY/ObuINLekZGprMHfZq','diah','fotoadmin\\C:\\xampp\\tmp\\phpD8A6.tmp','0812345678',NULL,'2020-05-12 17:37:08','2020-05-12 17:37:08'),
(5,'feriksan','$2y$10$IOzTCwAwKSqlJIxsYZThQ.g6yrdcOrEAg8oJvf55A1wmXudCU9lG.','feriksan','fotoadmin\\C:\\xampp\\tmp\\php78C9.tmp','324222423242',NULL,'2020-05-17 03:36:42','2020-05-17 03:36:42');

/*Table structure for table `alamat_user` */

DROP TABLE IF EXISTS `alamat_user`;

CREATE TABLE `alamat_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `nama_jalan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_userrr` (`user_id`),
  CONSTRAINT `id_userrr` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alamat_user` */

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('checkedout','notyet','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`product_id`,`qty`,`created_at`,`updated_at`,`status`) values 
(54,1,5,1,'2020-05-23 03:53:54','2020-05-24 02:35:32','checkedout'),
(55,1,6,10,'2020-05-23 03:53:59','2020-05-24 02:35:32','checkedout'),
(56,1,6,10,'2020-05-23 03:54:02','2020-05-24 02:35:32','checkedout'),
(57,1,7,4,'2020-05-23 03:54:07','2020-05-24 02:35:32','checkedout'),
(58,1,5,1,'2020-05-23 04:13:02','2020-05-24 02:35:32','checkedout'),
(59,1,5,1,'2020-05-23 05:06:34','2020-05-24 02:35:32','checkedout'),
(60,1,5,8,'2020-05-23 05:16:05','2020-05-24 02:35:32','checkedout'),
(61,1,5,2,'2020-05-24 02:29:36','2020-05-24 02:35:32','checkedout'),
(62,1,5,3,'2020-05-24 02:35:06','2020-05-24 02:35:32','checkedout');

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values 
(1,'JNE','2020-04-19 07:57:00','2020-04-19 07:57:00'),
(2,'TIKI','2020-04-19 07:57:04','2020-04-19 07:57:04'),
(4,'siCepat','2020-05-12 20:19:35','2020-05-12 20:19:35'),
(5,'TiKi','2020-05-12 20:19:45','2020-05-12 20:19:45');

/*Table structure for table `discounts` */

DROP TABLE IF EXISTS `discounts`;

CREATE TABLE `discounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned DEFAULT NULL,
  `percentage` int(3) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `discounts` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values 
(4,'Sepatu Canvas','2020-05-12 20:21:50','2020-05-12 20:21:50'),
(5,'Sepatu Kulit','2020-05-12 20:22:01','2020-05-12 20:22:01'),
(6,'Sepatu Suede','2020-05-13 11:32:32','2020-05-13 11:32:39');

/*Table structure for table `product_category_details` */

DROP TABLE IF EXISTS `product_category_details`;

CREATE TABLE `product_category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_category_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_category_details_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

insert  into `product_category_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values 
(6,6,4,'2020-05-12 20:24:34','2020-05-12 20:24:34'),
(7,7,4,'2020-05-13 11:32:12','2020-05-13 11:32:12'),
(8,4,6,'2020-05-15 23:42:13','1970-01-28 00:00:00'),
(9,5,6,'2020-05-15 23:42:01','1970-01-23 00:00:00');

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values 
(4,4,'kernel.png','2020-05-11 12:07:31','2020-05-11 12:07:31'),
(5,5,'netos11.jpg','2020-05-12 14:28:02','2020-05-12 14:28:02'),
(6,6,'tanaman4.jpg','2020-05-12 20:24:34','2020-05-12 20:24:34'),
(7,7,'tanaman2.jpg','2020-05-13 11:32:12','2020-05-13 11:32:12');

/*Table structure for table `product_reviews` */

DROP TABLE IF EXISTS `product_reviews`;

CREATE TABLE `product_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rate` int(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `rate_id` (`rate`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_reviews_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`product_id`,`user_id`,`rate`,`content`,`created_at`,`updated_at`) values 
(1,4,2,4,'sasasasasasasasas',NULL,NULL),
(2,5,2,3,'aaaaaaaaaaaaaaa',NULL,NULL),
(3,6,1,4,'DSDSDSDDSDSD',NULL,NULL),
(4,7,2,5,'DFDFDFDFDFD',NULL,NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`price`,`discount`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values 
(4,'yaya',454,12,'asdasdasdas',3,'2020-05-11 12:07:31','2020-05-11 12:07:40',10,NULL,'2020-05-11 12:07:40'),
(5,'yoyo',2222,12,'asdasdasdas',3,'2020-05-12 14:28:02','2020-05-12 14:28:02',11,NULL,NULL),
(6,'Ventela Public',280000,12000,'mantappp',4,'2020-05-12 20:24:34','2020-05-13 11:31:22',20,NULL,NULL),
(7,'Sepatu Saba',210000,20000,'saba',3,'2020-05-13 11:32:11','2020-05-13 11:32:11',30,NULL,NULL);

/*Table structure for table `response` */

DROP TABLE IF EXISTS `response`;

CREATE TABLE `response` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `review_id` (`review_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `response_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`),
  CONSTRAINT `response_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `response` */

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaction` (`transaction_id`),
  KEY `id_product` (`product_id`),
  CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timeout` datetime NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(12,2) NOT NULL,
  `shipping_cost` double(12,2) NOT NULL,
  `sub_total` double(12,2) NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  `courier_id` int(10) unsigned NOT NULL,
  `proof_of_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unverified','verified','delivered','success','expired','canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_id` (`courier_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`timeout`,`address`,`regency`,`province`,`total`,`shipping_cost`,`sub_total`,`user_id`,`courier_id`,`proof_of_payment`,`created_at`,`updated_at`,`status`) values 
(7,'2020-05-24 05:06:53','JL.bbb','AAAA','AAAA',58222.00,56000.00,2222.00,1,1,NULL,'2020-05-23 05:06:53','2020-05-23 22:33:28','canceled'),
(9,'2020-05-24 05:16:17','JL.bbb','AAAA','AAAA',73776.00,56000.00,17776.00,1,1,'bukti_pembayaran\\buku 3.PNG','2020-05-23 05:16:17','2020-05-23 22:38:18','unverified'),
(10,'2020-05-25 02:35:32','JL.bbb','AAAA','AAAA',67110.00,56000.00,11110.00,1,1,NULL,'2020-05-24 02:35:32','2020-05-24 02:35:32','unverified');

/*Table structure for table `user_notifications` */

DROP TABLE IF EXISTS `user_notifications`;

CREATE TABLE `user_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(11) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_notifications` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'yuniaswandewi','yuniaswandewi2015@gmail.com','NULL','NULL','2020-04-19 19:40:03','$2y$10$kB.ONWE3jB/vlFTyRwDHRuP1m1oar9UmWTmFte5c8xFT6PzJ/Q/Vq',NULL,'2020-04-19 11:27:06','2020-04-19 11:27:06'),
(2,'lala','lala@gmail.com','fotouser\\server.jpg','apa','2020-05-12 22:30:08','$2y$10$QZKu6c70qh4byKizXmQc4ODFdFzoM.T1HN3rYBCp5wTppMxr37d6m',NULL,'2020-05-12 14:29:45','2020-05-12 14:29:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
