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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values 
(3,'yogap','$2y$10$.HZlGyfyq7kbuHvm8iwyIOyGadfH4vlfQrUvBtaX/lwWRr09/hbVm','yoga','fotoadmin\\netos10.jpg','08787878888',NULL,'2020-05-12 14:15:13','2020-05-12 14:15:13'),
(4,'diahp','$2y$10$zX16V0IkYiiBzYZvjRrNV.g/TThdbnRsVPY/ObuINLekZGprMHfZq','diah','fotoadmin\\C:\\xampp\\tmp\\phpD8A6.tmp','0812345678',NULL,'2020-05-12 17:37:08','2020-05-12 17:37:08'),
(5,'feriksan','$2y$10$IOzTCwAwKSqlJIxsYZThQ.g6yrdcOrEAg8oJvf55A1wmXudCU9lG.','feriksan','fotoadmin\\C:\\xampp\\tmp\\php78C9.tmp','324222423242',NULL,'2020-05-17 03:36:42','2020-05-17 03:36:42'),
(6,'aaaa','$2y$10$pzzW.uhYV6krCRWWU4UlVOfpkkg6ej0F0z1J7bh60MQYoVv1coLEK','admin1','fotoadmin\\C:\\xampp\\tmp\\php593C.tmp','089532280974',NULL,'2020-06-16 20:38:10','2020-06-16 20:38:10');

/*Table structure for table `alamat_user` */

DROP TABLE IF EXISTS `alamat_user`;

CREATE TABLE `alamat_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `nama_jalan` varchar(255) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_userrr` (`user_id`),
  CONSTRAINT `id_userrr` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `alamat_user` */

insert  into `alamat_user`(`id`,`user_id`,`provinsi`,`kota`,`nama_jalan`,`status`,`updated_at`,`created_at`,`deleted_at`) values 
(3,1,'4','39','hhhh',NULL,'2020-05-30 09:55:34','2020-05-30 09:55:34',NULL),
(4,1,'8','103','jl.resimuka',NULL,'2020-05-31 06:08:17','2020-05-31 06:08:17',NULL),
(5,1,'4','1','JL.Batukaru',NULL,'2020-06-01 06:54:26','2020-06-01 06:54:26',NULL);

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('checkedout','notyet','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`product_id`,`qty`,`created_at`,`updated_at`,`deleted_at`,`status`) values 
(89,1,5,5,'2020-06-01 06:25:06','2020-06-10 20:49:46','2020-06-15 23:52:30','checkedout'),
(90,1,8,6,'2020-06-03 03:50:28','2020-06-10 20:49:46','2020-06-15 23:52:32','checkedout'),
(91,1,8,4,'2020-06-03 04:50:55','2020-06-10 20:49:46','2020-06-15 23:52:36','checkedout'),
(92,1,6,8,'2020-06-03 05:57:19','2020-06-10 20:49:46','2020-06-15 23:52:37','checkedout'),
(93,1,6,6,'2020-06-04 04:08:42','2020-06-10 20:49:46','2020-06-15 23:52:39','checkedout'),
(94,1,5,5,'2020-06-04 04:12:59','2020-06-10 20:49:46','2020-06-15 23:52:40','checkedout'),
(95,1,6,10,'2020-06-04 04:13:21','2020-06-10 20:49:46','2020-06-15 23:52:41','checkedout'),
(96,1,6,4,'2020-06-04 04:20:02','2020-06-10 20:49:46','2020-06-15 23:52:43','checkedout'),
(97,1,8,1,'2020-06-04 04:20:05','2020-06-10 20:49:46','2020-06-15 23:52:44','checkedout'),
(98,1,5,1,'2020-06-04 04:20:08','2020-06-10 20:49:46','2020-06-15 23:52:45','checkedout'),
(99,1,5,1,'2020-06-04 04:25:12','2020-06-10 20:49:46','2020-06-15 23:52:46','checkedout'),
(100,1,6,1,'2020-06-04 04:25:40','2020-06-10 20:49:46','2020-06-15 23:52:49','checkedout'),
(101,1,5,1,'2020-06-04 04:26:33','2020-06-10 20:49:46','2020-06-15 23:52:51','checkedout'),
(102,1,6,1,'2020-06-05 01:02:32','2020-06-10 20:49:46','2020-06-15 23:52:53','checkedout'),
(103,1,5,1,'2020-06-05 01:02:34','2020-06-10 20:49:46','2020-06-15 23:52:54','checkedout'),
(104,1,5,1,'2020-06-05 03:53:03','2020-06-10 20:49:46','2020-06-15 23:52:55','checkedout'),
(105,1,6,1,'2020-06-05 03:53:06','2020-06-10 20:49:46','2020-06-15 23:52:56','checkedout'),
(106,1,6,1,'2020-06-05 03:53:13','2020-06-10 20:49:46','2020-06-15 23:52:57','checkedout'),
(107,1,6,1,'2020-06-05 03:53:54','2020-06-10 20:49:46','2020-06-15 23:52:59','checkedout'),
(108,1,8,1,'2020-06-05 03:53:56','2020-06-10 20:49:46','2020-06-15 23:53:03','checkedout'),
(109,1,5,1,'2020-06-05 03:53:58','2020-06-10 20:49:46','2020-06-15 23:53:04','checkedout'),
(110,1,5,1,'2020-06-05 03:54:52','2020-06-10 20:49:46','2020-06-15 23:53:06','checkedout'),
(111,1,6,1,'2020-06-05 03:54:55','2020-06-10 20:49:46','2020-06-15 23:53:07','checkedout'),
(112,1,8,1,'2020-06-05 03:54:57','2020-06-10 20:49:46',NULL,'checkedout'),
(113,1,5,1,'2020-06-05 03:59:04','2020-06-10 20:49:46',NULL,'checkedout'),
(114,1,6,1,'2020-06-05 03:59:07','2020-06-10 20:49:46',NULL,'checkedout'),
(115,1,6,1,'2020-06-05 04:17:10','2020-06-10 20:49:46',NULL,'checkedout'),
(116,1,5,1,'2020-06-05 04:17:12','2020-06-10 20:49:46',NULL,'checkedout'),
(119,1,5,9,'2020-06-07 03:49:14','2020-06-10 20:49:46',NULL,'checkedout'),
(120,1,5,1,'2020-06-07 12:24:54','2020-06-10 20:49:46',NULL,'checkedout'),
(121,1,5,1,'2020-06-07 12:25:38','2020-06-10 20:49:46',NULL,'checkedout'),
(122,1,5,1,'2020-06-10 20:43:58','2020-06-10 20:49:46',NULL,'checkedout'),
(123,3,5,1,'2020-06-10 20:54:39','2020-06-16 23:13:44',NULL,'checkedout'),
(124,1,6,1,'2020-06-10 20:57:19','2020-06-10 21:02:13','2020-06-10 21:02:13','checkedout'),
(125,3,6,1,'2020-06-10 21:31:39','2020-06-16 23:13:44',NULL,'checkedout'),
(126,3,6,1,'2020-06-10 22:45:08','2020-06-16 23:13:44',NULL,'checkedout'),
(127,3,6,1,'2020-06-10 22:50:48','2020-06-16 23:13:44',NULL,'checkedout'),
(128,3,6,1,'2020-06-10 22:59:51','2020-06-16 23:13:44',NULL,'checkedout'),
(129,4,6,1,'2020-06-11 00:08:53','2020-06-16 23:21:37',NULL,'checkedout'),
(130,3,5,1,'2020-06-11 03:13:55','2020-06-16 23:13:44',NULL,'checkedout'),
(131,4,6,1,'2020-06-11 03:14:48','2020-06-16 23:21:37',NULL,'checkedout'),
(132,3,5,1,'2020-06-11 23:02:21','2020-06-16 23:13:44',NULL,'checkedout'),
(133,3,5,1,'2020-06-12 04:45:46','2020-06-16 23:13:44',NULL,'checkedout'),
(134,3,6,1,'2020-06-14 03:51:52','2020-06-16 23:13:44',NULL,'checkedout'),
(135,3,5,1,'2020-06-14 04:00:01','2020-06-16 23:13:44',NULL,'checkedout'),
(136,3,6,1,'2020-06-14 04:03:35','2020-06-16 23:13:44',NULL,'checkedout'),
(137,3,8,1,'2020-06-15 04:40:34','2020-06-16 23:13:44',NULL,'checkedout'),
(138,3,6,1,'2020-06-15 06:01:38','2020-06-16 23:13:44',NULL,'checkedout'),
(139,3,5,0,'2020-06-15 06:15:11','2020-06-16 23:13:44',NULL,'checkedout'),
(140,3,6,0,'2020-06-15 06:15:31','2020-06-16 23:13:44',NULL,'checkedout'),
(141,3,8,0,'2020-06-15 06:15:36','2020-06-16 23:13:44',NULL,'checkedout'),
(142,3,5,1,'2020-06-16 03:34:11','2020-06-16 23:13:44',NULL,'checkedout'),
(143,3,5,1,'2020-06-16 03:36:02','2020-06-16 23:13:44',NULL,'checkedout'),
(144,3,5,1,'2020-06-16 04:01:02','2020-06-16 23:13:44',NULL,'checkedout'),
(145,3,8,1,'2020-06-16 04:03:18','2020-06-16 23:13:44',NULL,'checkedout'),
(146,3,6,1,'2020-06-16 05:30:08','2020-06-16 23:13:44',NULL,'checkedout'),
(147,4,5,1,'2020-06-16 05:32:37','2020-06-16 23:21:37',NULL,'checkedout'),
(148,3,5,1,'2020-06-16 06:02:27','2020-06-16 23:13:44',NULL,'checkedout'),
(149,3,8,1,'2020-06-16 06:05:58','2020-06-16 23:13:44',NULL,'checkedout'),
(150,3,5,1,'2020-06-16 06:09:33','2020-06-16 23:13:44',NULL,'checkedout'),
(151,3,6,2,'2020-06-16 06:10:19','2020-06-16 23:13:44',NULL,'checkedout'),
(152,3,8,1,'2020-06-16 06:31:41','2020-06-16 23:13:44',NULL,'checkedout'),
(153,3,6,1,'2020-06-16 06:40:04','2020-06-16 23:13:44',NULL,'checkedout'),
(154,3,5,1,'2020-06-16 06:41:39','2020-06-16 23:13:44',NULL,'checkedout'),
(155,4,8,2,'2020-06-16 06:49:27','2020-06-16 23:21:37',NULL,'checkedout'),
(156,4,8,2,'2020-06-16 06:50:58','2020-06-16 06:51:50','2020-06-16 06:51:50','checkedout'),
(157,4,5,2,'2020-06-16 06:51:54','2020-06-16 23:21:37',NULL,'checkedout'),
(158,4,6,3,'2020-06-16 06:54:27','2020-06-16 23:21:37',NULL,'checkedout'),
(159,4,6,1,'2020-06-16 06:59:11','2020-06-16 23:21:37',NULL,'checkedout'),
(160,4,8,1,'2020-06-16 07:01:54','2020-06-16 23:21:37',NULL,'checkedout'),
(161,3,6,1,'2020-06-16 20:13:12','2020-06-16 23:13:44',NULL,'checkedout'),
(162,3,6,1,'2020-06-16 22:18:23','2020-06-16 23:08:39','2020-06-16 23:08:39','notyet'),
(163,3,6,1,'2020-06-16 23:08:30','2020-06-16 23:08:41','2020-06-16 23:08:41','notyet'),
(164,3,6,1,'2020-06-16 23:11:38','2020-06-16 23:12:18','2020-06-16 23:12:18','notyet'),
(165,3,5,1,'2020-06-16 23:11:44','2020-06-16 23:12:20','2020-06-16 23:12:20','notyet'),
(166,3,5,1,'2020-06-16 23:12:51','2020-06-16 23:13:44',NULL,'checkedout'),
(167,4,8,1,'2020-06-16 23:15:40','2020-06-16 23:21:37',NULL,'checkedout'),
(168,4,5,1,'2020-06-16 23:21:19','2020-06-16 23:21:37',NULL,'checkedout');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` bigint(20) unsigned NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`province_id`,`city_name`,`postal_code`,`created_at`,`updated_at`) values 
(1,21,'Aceh Barat','23681',NULL,NULL),
(2,21,'Aceh Barat Daya','23764',NULL,NULL),
(3,21,'Aceh Besar','23951',NULL,NULL),
(4,21,'Aceh Jaya','23654',NULL,NULL),
(5,21,'Aceh Selatan','23719',NULL,NULL),
(6,21,'Aceh Singkil','24785',NULL,NULL),
(7,21,'Aceh Tamiang','24476',NULL,NULL),
(8,21,'Aceh Tengah','24511',NULL,NULL),
(9,21,'Aceh Tenggara','24611',NULL,NULL),
(10,21,'Aceh Timur','24454',NULL,NULL),
(11,21,'Aceh Utara','24382',NULL,NULL),
(12,32,'Agam','26411',NULL,NULL),
(13,23,'Alor','85811',NULL,NULL),
(14,19,'Ambon','97222',NULL,NULL),
(15,34,'Asahan','21214',NULL,NULL),
(16,24,'Asmat','99777',NULL,NULL),
(17,1,'Badung','80351',NULL,NULL),
(18,13,'Balangan','71611',NULL,NULL),
(19,15,'Balikpapan','76111',NULL,NULL),
(20,21,'Banda Aceh','23238',NULL,NULL),
(21,18,'Bandar Lampung','35139',NULL,NULL),
(22,9,'Bandung','40311',NULL,NULL),
(23,9,'Bandung','40111',NULL,NULL),
(24,9,'Bandung Barat','40721',NULL,NULL),
(25,29,'Banggai','94711',NULL,NULL),
(26,29,'Banggai Kepulauan','94881',NULL,NULL),
(27,2,'Bangka','33212',NULL,NULL),
(28,2,'Bangka Barat','33315',NULL,NULL),
(29,2,'Bangka Selatan','33719',NULL,NULL),
(30,2,'Bangka Tengah','33613',NULL,NULL),
(31,11,'Bangkalan','69118',NULL,NULL),
(32,1,'Bangli','80619',NULL,NULL),
(33,13,'Banjar','70619',NULL,NULL),
(34,9,'Banjar','46311',NULL,NULL),
(35,13,'Banjarbaru','70712',NULL,NULL),
(36,13,'Banjarmasin','70117',NULL,NULL),
(37,10,'Banjarnegara','53419',NULL,NULL),
(38,28,'Bantaeng','92411',NULL,NULL),
(39,5,'Bantul','55715',NULL,NULL),
(40,33,'Banyuasin','30911',NULL,NULL),
(41,10,'Banyumas','53114',NULL,NULL),
(42,11,'Banyuwangi','68416',NULL,NULL),
(43,13,'Barito Kuala','70511',NULL,NULL),
(44,14,'Barito Selatan','73711',NULL,NULL),
(45,14,'Barito Timur','73671',NULL,NULL),
(46,14,'Barito Utara','73881',NULL,NULL),
(47,28,'Barru','90719',NULL,NULL),
(48,17,'Batam','29413',NULL,NULL),
(49,10,'Batang','51211',NULL,NULL),
(50,8,'Batang Hari','36613',NULL,NULL),
(51,11,'Batu','65311',NULL,NULL),
(52,34,'Batu Bara','21655',NULL,NULL),
(53,30,'Bau-Bau','93719',NULL,NULL),
(54,9,'Bekasi','17837',NULL,NULL),
(55,9,'Bekasi','17121',NULL,NULL),
(56,2,'Belitung','33419',NULL,NULL),
(57,2,'Belitung Timur','33519',NULL,NULL),
(58,23,'Belu','85711',NULL,NULL),
(59,21,'Bener Meriah','24581',NULL,NULL),
(60,26,'Bengkalis','28719',NULL,NULL),
(61,12,'Bengkayang','79213',NULL,NULL),
(62,4,'Bengkulu','38229',NULL,NULL),
(63,4,'Bengkulu Selatan','38519',NULL,NULL),
(64,4,'Bengkulu Tengah','38319',NULL,NULL),
(65,4,'Bengkulu Utara','38619',NULL,NULL),
(66,15,'Berau','77311',NULL,NULL),
(67,24,'Biak Numfor','98119',NULL,NULL),
(68,22,'Bima','84171',NULL,NULL),
(69,22,'Bima','84139',NULL,NULL),
(70,34,'Binjai','20712',NULL,NULL),
(71,17,'Bintan','29135',NULL,NULL),
(72,21,'Bireuen','24219',NULL,NULL),
(73,31,'Bitung','95512',NULL,NULL),
(74,11,'Blitar','66171',NULL,NULL),
(75,11,'Blitar','66124',NULL,NULL),
(76,10,'Blora','58219',NULL,NULL),
(77,7,'Boalemo','96319',NULL,NULL),
(78,9,'Bogor','16911',NULL,NULL),
(79,9,'Bogor','16119',NULL,NULL),
(80,11,'Bojonegoro','62119',NULL,NULL),
(81,31,'Bolaang Mongondow (Bolmong)','95755',NULL,NULL),
(82,31,'Bolaang Mongondow Selatan','95774',NULL,NULL),
(83,31,'Bolaang Mongondow Timur','95783',NULL,NULL),
(84,31,'Bolaang Mongondow Utara','95765',NULL,NULL),
(85,30,'Bombana','93771',NULL,NULL),
(86,11,'Bondowoso','68219',NULL,NULL),
(87,28,'Bone','92713',NULL,NULL),
(88,7,'Bone Bolango','96511',NULL,NULL),
(89,15,'Bontang','75313',NULL,NULL),
(90,24,'Boven Digoel','99662',NULL,NULL),
(91,10,'Boyolali','57312',NULL,NULL),
(92,10,'Brebes','52212',NULL,NULL),
(93,32,'Bukittinggi','26115',NULL,NULL),
(94,1,'Buleleng','81111',NULL,NULL),
(95,28,'Bulukumba','92511',NULL,NULL),
(96,16,'Bulungan (Bulongan)','77211',NULL,NULL),
(97,8,'Bungo','37216',NULL,NULL),
(98,29,'Buol','94564',NULL,NULL),
(99,19,'Buru','97371',NULL,NULL),
(100,19,'Buru Selatan','97351',NULL,NULL),
(101,30,'Buton','93754',NULL,NULL),
(102,30,'Buton Utara','93745',NULL,NULL),
(103,9,'Ciamis','46211',NULL,NULL),
(104,9,'Cianjur','43217',NULL,NULL),
(105,10,'Cilacap','53211',NULL,NULL),
(106,3,'Cilegon','42417',NULL,NULL),
(107,9,'Cimahi','40512',NULL,NULL),
(108,9,'Cirebon','45611',NULL,NULL),
(109,9,'Cirebon','45116',NULL,NULL),
(110,34,'Dairi','22211',NULL,NULL),
(111,24,'Deiyai (Deliyai)','98784',NULL,NULL),
(112,34,'Deli Serdang','20511',NULL,NULL),
(113,10,'Demak','59519',NULL,NULL),
(114,1,'Denpasar','80227',NULL,NULL),
(115,9,'Depok','16416',NULL,NULL),
(116,32,'Dharmasraya','27612',NULL,NULL),
(117,24,'Dogiyai','98866',NULL,NULL),
(118,22,'Dompu','84217',NULL,NULL),
(119,29,'Donggala','94341',NULL,NULL),
(120,26,'Dumai','28811',NULL,NULL),
(121,33,'Empat Lawang','31811',NULL,NULL),
(122,23,'Ende','86351',NULL,NULL),
(123,28,'Enrekang','91719',NULL,NULL),
(124,25,'Fakfak','98651',NULL,NULL),
(125,23,'Flores Timur','86213',NULL,NULL),
(126,9,'Garut','44126',NULL,NULL),
(127,21,'Gayo Lues','24653',NULL,NULL),
(128,1,'Gianyar','80519',NULL,NULL),
(129,7,'Gorontalo','96218',NULL,NULL),
(130,7,'Gorontalo','96115',NULL,NULL),
(131,7,'Gorontalo Utara','96611',NULL,NULL),
(132,28,'Gowa','92111',NULL,NULL),
(133,11,'Gresik','61115',NULL,NULL),
(134,10,'Grobogan','58111',NULL,NULL),
(135,5,'Gunung Kidul','55812',NULL,NULL),
(136,14,'Gunung Mas','74511',NULL,NULL),
(137,34,'Gunungsitoli','22813',NULL,NULL),
(138,20,'Halmahera Barat','97757',NULL,NULL),
(139,20,'Halmahera Selatan','97911',NULL,NULL),
(140,20,'Halmahera Tengah','97853',NULL,NULL),
(141,20,'Halmahera Timur','97862',NULL,NULL),
(142,20,'Halmahera Utara','97762',NULL,NULL),
(143,13,'Hulu Sungai Selatan','71212',NULL,NULL),
(144,13,'Hulu Sungai Tengah','71313',NULL,NULL),
(145,13,'Hulu Sungai Utara','71419',NULL,NULL),
(146,34,'Humbang Hasundutan','22457',NULL,NULL),
(147,26,'Indragiri Hilir','29212',NULL,NULL),
(148,26,'Indragiri Hulu','29319',NULL,NULL),
(149,9,'Indramayu','45214',NULL,NULL),
(150,24,'Intan Jaya','98771',NULL,NULL),
(151,6,'Jakarta Barat','11220',NULL,NULL),
(152,6,'Jakarta Pusat','10540',NULL,NULL),
(153,6,'Jakarta Selatan','12230',NULL,NULL),
(154,6,'Jakarta Timur','13330',NULL,NULL),
(155,6,'Jakarta Utara','14140',NULL,NULL),
(156,8,'Jambi','36111',NULL,NULL),
(157,24,'Jayapura','99352',NULL,NULL),
(158,24,'Jayapura','99114',NULL,NULL),
(159,24,'Jayawijaya','99511',NULL,NULL),
(160,11,'Jember','68113',NULL,NULL),
(161,1,'Jembrana','82251',NULL,NULL),
(162,28,'Jeneponto','92319',NULL,NULL),
(163,10,'Jepara','59419',NULL,NULL),
(164,11,'Jombang','61415',NULL,NULL),
(165,25,'Kaimana','98671',NULL,NULL),
(166,26,'Kampar','28411',NULL,NULL),
(167,14,'Kapuas','73583',NULL,NULL),
(168,12,'Kapuas Hulu','78719',NULL,NULL),
(169,10,'Karanganyar','57718',NULL,NULL),
(170,1,'Karangasem','80819',NULL,NULL),
(171,9,'Karawang','41311',NULL,NULL),
(172,17,'Karimun','29611',NULL,NULL),
(173,34,'Karo','22119',NULL,NULL),
(174,14,'Katingan','74411',NULL,NULL),
(175,4,'Kaur','38911',NULL,NULL),
(176,12,'Kayong Utara','78852',NULL,NULL),
(177,10,'Kebumen','54319',NULL,NULL),
(178,11,'Kediri','64184',NULL,NULL),
(179,11,'Kediri','64125',NULL,NULL),
(180,24,'Keerom','99461',NULL,NULL),
(181,10,'Kendal','51314',NULL,NULL),
(182,30,'Kendari','93126',NULL,NULL),
(183,4,'Kepahiang','39319',NULL,NULL),
(184,17,'Kepulauan Anambas','29991',NULL,NULL),
(185,19,'Kepulauan Aru','97681',NULL,NULL),
(186,32,'Kepulauan Mentawai','25771',NULL,NULL),
(187,26,'Kepulauan Meranti','28791',NULL,NULL),
(188,31,'Kepulauan Sangihe','95819',NULL,NULL),
(189,6,'Kepulauan Seribu','14550',NULL,NULL),
(190,31,'Kepulauan Siau Tagulandang Biaro (Sitaro)','95862',NULL,NULL),
(191,20,'Kepulauan Sula','97995',NULL,NULL),
(192,31,'Kepulauan Talaud','95885',NULL,NULL),
(193,24,'Kepulauan Yapen (Yapen Waropen)','98211',NULL,NULL),
(194,8,'Kerinci','37167',NULL,NULL),
(195,12,'Ketapang','78874',NULL,NULL),
(196,10,'Klaten','57411',NULL,NULL),
(197,1,'Klungkung','80719',NULL,NULL),
(198,30,'Kolaka','93511',NULL,NULL),
(199,30,'Kolaka Utara','93911',NULL,NULL),
(200,30,'Konawe','93411',NULL,NULL),
(201,30,'Konawe Selatan','93811',NULL,NULL),
(202,30,'Konawe Utara','93311',NULL,NULL),
(203,13,'Kotabaru','72119',NULL,NULL),
(204,31,'Kotamobagu','95711',NULL,NULL),
(205,14,'Kotawaringin Barat','74119',NULL,NULL),
(206,14,'Kotawaringin Timur','74364',NULL,NULL),
(207,26,'Kuantan Singingi','29519',NULL,NULL),
(208,12,'Kubu Raya','78311',NULL,NULL),
(209,10,'Kudus','59311',NULL,NULL),
(210,5,'Kulon Progo','55611',NULL,NULL),
(211,9,'Kuningan','45511',NULL,NULL),
(212,23,'Kupang','85362',NULL,NULL),
(213,23,'Kupang','85119',NULL,NULL),
(214,15,'Kutai Barat','75711',NULL,NULL),
(215,15,'Kutai Kartanegara','75511',NULL,NULL),
(216,15,'Kutai Timur','75611',NULL,NULL),
(217,34,'Labuhan Batu','21412',NULL,NULL),
(218,34,'Labuhan Batu Selatan','21511',NULL,NULL),
(219,34,'Labuhan Batu Utara','21711',NULL,NULL),
(220,33,'Lahat','31419',NULL,NULL),
(221,14,'Lamandau','74611',NULL,NULL),
(222,11,'Lamongan','64125',NULL,NULL),
(223,18,'Lampung Barat','34814',NULL,NULL),
(224,18,'Lampung Selatan','35511',NULL,NULL),
(225,18,'Lampung Tengah','34212',NULL,NULL),
(226,18,'Lampung Timur','34319',NULL,NULL),
(227,18,'Lampung Utara','34516',NULL,NULL),
(228,12,'Landak','78319',NULL,NULL),
(229,34,'Langkat','20811',NULL,NULL),
(230,21,'Langsa','24412',NULL,NULL),
(231,24,'Lanny Jaya','99531',NULL,NULL),
(232,3,'Lebak','42319',NULL,NULL),
(233,4,'Lebong','39264',NULL,NULL),
(234,23,'Lembata','86611',NULL,NULL),
(235,21,'Lhokseumawe','24352',NULL,NULL),
(236,32,'Lima Puluh Koto/Kota','26671',NULL,NULL),
(237,17,'Lingga','29811',NULL,NULL),
(238,22,'Lombok Barat','83311',NULL,NULL),
(239,22,'Lombok Tengah','83511',NULL,NULL),
(240,22,'Lombok Timur','83612',NULL,NULL),
(241,22,'Lombok Utara','83711',NULL,NULL),
(242,33,'Lubuk Linggau','31614',NULL,NULL),
(243,11,'Lumajang','67319',NULL,NULL),
(244,28,'Luwu','91994',NULL,NULL),
(245,28,'Luwu Timur','92981',NULL,NULL),
(246,28,'Luwu Utara','92911',NULL,NULL),
(247,11,'Madiun','63153',NULL,NULL),
(248,11,'Madiun','63122',NULL,NULL),
(249,10,'Magelang','56519',NULL,NULL),
(250,10,'Magelang','56133',NULL,NULL),
(251,11,'Magetan','63314',NULL,NULL),
(252,9,'Majalengka','45412',NULL,NULL),
(253,27,'Majene','91411',NULL,NULL),
(254,28,'Makassar','90111',NULL,NULL),
(255,11,'Malang','65163',NULL,NULL),
(256,11,'Malang','65112',NULL,NULL),
(257,16,'Malinau','77511',NULL,NULL),
(258,19,'Maluku Barat Daya','97451',NULL,NULL),
(259,19,'Maluku Tengah','97513',NULL,NULL),
(260,19,'Maluku Tenggara','97651',NULL,NULL),
(261,19,'Maluku Tenggara Barat','97465',NULL,NULL),
(262,27,'Mamasa','91362',NULL,NULL),
(263,24,'Mamberamo Raya','99381',NULL,NULL),
(264,24,'Mamberamo Tengah','99553',NULL,NULL),
(265,27,'Mamuju','91519',NULL,NULL),
(266,27,'Mamuju Utara','91571',NULL,NULL),
(267,31,'Manado','95247',NULL,NULL),
(268,34,'Mandailing Natal','22916',NULL,NULL),
(269,23,'Manggarai','86551',NULL,NULL),
(270,23,'Manggarai Barat','86711',NULL,NULL),
(271,23,'Manggarai Timur','86811',NULL,NULL),
(272,25,'Manokwari','98311',NULL,NULL),
(273,25,'Manokwari Selatan','98355',NULL,NULL),
(274,24,'Mappi','99853',NULL,NULL),
(275,28,'Maros','90511',NULL,NULL),
(276,22,'Mataram','83131',NULL,NULL),
(277,25,'Maybrat','98051',NULL,NULL),
(278,34,'Medan','20228',NULL,NULL),
(279,12,'Melawi','78619',NULL,NULL),
(280,8,'Merangin','37319',NULL,NULL),
(281,24,'Merauke','99613',NULL,NULL),
(282,18,'Mesuji','34911',NULL,NULL),
(283,18,'Metro','34111',NULL,NULL),
(284,24,'Mimika','99962',NULL,NULL),
(285,31,'Minahasa','95614',NULL,NULL),
(286,31,'Minahasa Selatan','95914',NULL,NULL),
(287,31,'Minahasa Tenggara','95995',NULL,NULL),
(288,31,'Minahasa Utara','95316',NULL,NULL),
(289,11,'Mojokerto','61382',NULL,NULL),
(290,11,'Mojokerto','61316',NULL,NULL),
(291,29,'Morowali','94911',NULL,NULL),
(292,33,'Muara Enim','31315',NULL,NULL),
(293,8,'Muaro Jambi','36311',NULL,NULL),
(294,4,'Muko Muko','38715',NULL,NULL),
(295,30,'Muna','93611',NULL,NULL),
(296,14,'Murung Raya','73911',NULL,NULL),
(297,33,'Musi Banyuasin','30719',NULL,NULL),
(298,33,'Musi Rawas','31661',NULL,NULL),
(299,24,'Nabire','98816',NULL,NULL),
(300,21,'Nagan Raya','23674',NULL,NULL),
(301,23,'Nagekeo','86911',NULL,NULL),
(302,17,'Natuna','29711',NULL,NULL),
(303,24,'Nduga','99541',NULL,NULL),
(304,23,'Ngada','86413',NULL,NULL),
(305,11,'Nganjuk','64414',NULL,NULL),
(306,11,'Ngawi','63219',NULL,NULL),
(307,34,'Nias','22876',NULL,NULL),
(308,34,'Nias Barat','22895',NULL,NULL),
(309,34,'Nias Selatan','22865',NULL,NULL),
(310,34,'Nias Utara','22856',NULL,NULL),
(311,16,'Nunukan','77421',NULL,NULL),
(312,33,'Ogan Ilir','30811',NULL,NULL),
(313,33,'Ogan Komering Ilir','30618',NULL,NULL),
(314,33,'Ogan Komering Ulu','32112',NULL,NULL),
(315,33,'Ogan Komering Ulu Selatan','32211',NULL,NULL),
(316,33,'Ogan Komering Ulu Timur','32312',NULL,NULL),
(317,11,'Pacitan','63512',NULL,NULL),
(318,32,'Padang','25112',NULL,NULL),
(319,34,'Padang Lawas','22763',NULL,NULL),
(320,34,'Padang Lawas Utara','22753',NULL,NULL),
(321,32,'Padang Panjang','27122',NULL,NULL),
(322,32,'Padang Pariaman','25583',NULL,NULL),
(323,34,'Padang Sidempuan','22727',NULL,NULL),
(324,33,'Pagar Alam','31512',NULL,NULL),
(325,34,'Pakpak Bharat','22272',NULL,NULL),
(326,14,'Palangka Raya','73112',NULL,NULL),
(327,33,'Palembang','30111',NULL,NULL),
(328,28,'Palopo','91911',NULL,NULL),
(329,29,'Palu','94111',NULL,NULL),
(330,11,'Pamekasan','69319',NULL,NULL),
(331,3,'Pandeglang','42212',NULL,NULL),
(332,9,'Pangandaran','46511',NULL,NULL),
(333,28,'Pangkajene Kepulauan','90611',NULL,NULL),
(334,2,'Pangkal Pinang','33115',NULL,NULL),
(335,24,'Paniai','98765',NULL,NULL),
(336,28,'Parepare','91123',NULL,NULL),
(337,32,'Pariaman','25511',NULL,NULL),
(338,29,'Parigi Moutong','94411',NULL,NULL),
(339,32,'Pasaman','26318',NULL,NULL),
(340,32,'Pasaman Barat','26511',NULL,NULL),
(341,15,'Paser','76211',NULL,NULL),
(342,11,'Pasuruan','67153',NULL,NULL),
(343,11,'Pasuruan','67118',NULL,NULL),
(344,10,'Pati','59114',NULL,NULL),
(345,32,'Payakumbuh','26213',NULL,NULL),
(346,25,'Pegunungan Arfak','98354',NULL,NULL),
(347,24,'Pegunungan Bintang','99573',NULL,NULL),
(348,10,'Pekalongan','51161',NULL,NULL),
(349,10,'Pekalongan','51122',NULL,NULL),
(350,26,'Pekanbaru','28112',NULL,NULL),
(351,26,'Pelalawan','28311',NULL,NULL),
(352,10,'Pemalang','52319',NULL,NULL),
(353,34,'Pematang Siantar','21126',NULL,NULL),
(354,15,'Penajam Paser Utara','76311',NULL,NULL),
(355,18,'Pesawaran','35312',NULL,NULL),
(356,18,'Pesisir Barat','35974',NULL,NULL),
(357,32,'Pesisir Selatan','25611',NULL,NULL),
(358,21,'Pidie','24116',NULL,NULL),
(359,21,'Pidie Jaya','24186',NULL,NULL),
(360,28,'Pinrang','91251',NULL,NULL),
(361,7,'Pohuwato','96419',NULL,NULL),
(362,27,'Polewali Mandar','91311',NULL,NULL),
(363,11,'Ponorogo','63411',NULL,NULL),
(364,12,'Pontianak','78971',NULL,NULL),
(365,12,'Pontianak','78112',NULL,NULL),
(366,29,'Poso','94615',NULL,NULL),
(367,33,'Prabumulih','31121',NULL,NULL),
(368,18,'Pringsewu','35719',NULL,NULL),
(369,11,'Probolinggo','67282',NULL,NULL),
(370,11,'Probolinggo','67215',NULL,NULL),
(371,14,'Pulang Pisau','74811',NULL,NULL),
(372,20,'Pulau Morotai','97771',NULL,NULL),
(373,24,'Puncak','98981',NULL,NULL),
(374,24,'Puncak Jaya','98979',NULL,NULL),
(375,10,'Purbalingga','53312',NULL,NULL),
(376,9,'Purwakarta','41119',NULL,NULL),
(377,10,'Purworejo','54111',NULL,NULL),
(378,25,'Raja Ampat','98489',NULL,NULL),
(379,4,'Rejang Lebong','39112',NULL,NULL),
(380,10,'Rembang','59219',NULL,NULL),
(381,26,'Rokan Hilir','28992',NULL,NULL),
(382,26,'Rokan Hulu','28511',NULL,NULL),
(383,23,'Rote Ndao','85982',NULL,NULL),
(384,21,'Sabang','23512',NULL,NULL),
(385,23,'Sabu Raijua','85391',NULL,NULL),
(386,10,'Salatiga','50711',NULL,NULL),
(387,15,'Samarinda','75133',NULL,NULL),
(388,12,'Sambas','79453',NULL,NULL),
(389,34,'Samosir','22392',NULL,NULL),
(390,11,'Sampang','69219',NULL,NULL),
(391,12,'Sanggau','78557',NULL,NULL),
(392,24,'Sarmi','99373',NULL,NULL),
(393,8,'Sarolangun','37419',NULL,NULL),
(394,32,'Sawah Lunto','27416',NULL,NULL),
(395,12,'Sekadau','79583',NULL,NULL),
(396,28,'Selayar (Kepulauan Selayar)','92812',NULL,NULL),
(397,4,'Seluma','38811',NULL,NULL),
(398,10,'Semarang','50511',NULL,NULL),
(399,10,'Semarang','50135',NULL,NULL),
(400,19,'Seram Bagian Barat','97561',NULL,NULL),
(401,19,'Seram Bagian Timur','97581',NULL,NULL),
(402,3,'Serang','42182',NULL,NULL),
(403,3,'Serang','42111',NULL,NULL),
(404,34,'Serdang Bedagai','20915',NULL,NULL),
(405,14,'Seruyan','74211',NULL,NULL),
(406,26,'Siak','28623',NULL,NULL),
(407,34,'Sibolga','22522',NULL,NULL),
(408,28,'Sidenreng Rappang/Rapang','91613',NULL,NULL),
(409,11,'Sidoarjo','61219',NULL,NULL),
(410,29,'Sigi','94364',NULL,NULL),
(411,32,'Sijunjung (Sawah Lunto Sijunjung)','27511',NULL,NULL),
(412,23,'Sikka','86121',NULL,NULL),
(413,34,'Simalungun','21162',NULL,NULL),
(414,21,'Simeulue','23891',NULL,NULL),
(415,12,'Singkawang','79117',NULL,NULL),
(416,28,'Sinjai','92615',NULL,NULL),
(417,12,'Sintang','78619',NULL,NULL),
(418,11,'Situbondo','68316',NULL,NULL),
(419,5,'Sleman','55513',NULL,NULL),
(420,32,'Solok','27365',NULL,NULL),
(421,32,'Solok','27315',NULL,NULL),
(422,32,'Solok Selatan','27779',NULL,NULL),
(423,28,'Soppeng','90812',NULL,NULL),
(424,25,'Sorong','98431',NULL,NULL),
(425,25,'Sorong','98411',NULL,NULL),
(426,25,'Sorong Selatan','98454',NULL,NULL),
(427,10,'Sragen','57211',NULL,NULL),
(428,9,'Subang','41215',NULL,NULL),
(429,21,'Subulussalam','24882',NULL,NULL),
(430,9,'Sukabumi','43311',NULL,NULL),
(431,9,'Sukabumi','43114',NULL,NULL),
(432,14,'Sukamara','74712',NULL,NULL),
(433,10,'Sukoharjo','57514',NULL,NULL),
(434,23,'Sumba Barat','87219',NULL,NULL),
(435,23,'Sumba Barat Daya','87453',NULL,NULL),
(436,23,'Sumba Tengah','87358',NULL,NULL),
(437,23,'Sumba Timur','87112',NULL,NULL),
(438,22,'Sumbawa','84315',NULL,NULL),
(439,22,'Sumbawa Barat','84419',NULL,NULL),
(440,9,'Sumedang','45326',NULL,NULL),
(441,11,'Sumenep','69413',NULL,NULL),
(442,8,'Sungaipenuh','37113',NULL,NULL),
(443,24,'Supiori','98164',NULL,NULL),
(444,11,'Surabaya','60119',NULL,NULL),
(445,10,'Surakarta (Solo)','57113',NULL,NULL),
(446,13,'Tabalong','71513',NULL,NULL),
(447,1,'Tabanan','82119',NULL,NULL),
(448,28,'Takalar','92212',NULL,NULL),
(449,25,'Tambrauw','98475',NULL,NULL),
(450,16,'Tana Tidung','77611',NULL,NULL),
(451,28,'Tana Toraja','91819',NULL,NULL),
(452,13,'Tanah Bumbu','72211',NULL,NULL),
(453,32,'Tanah Datar','27211',NULL,NULL),
(454,13,'Tanah Laut','70811',NULL,NULL),
(455,3,'Tangerang','15914',NULL,NULL),
(456,3,'Tangerang','15111',NULL,NULL),
(457,3,'Tangerang Selatan','15332',NULL,NULL),
(458,18,'Tanggamus','35619',NULL,NULL),
(459,34,'Tanjung Balai','21321',NULL,NULL),
(460,8,'Tanjung Jabung Barat','36513',NULL,NULL),
(461,8,'Tanjung Jabung Timur','36719',NULL,NULL),
(462,17,'Tanjung Pinang','29111',NULL,NULL),
(463,34,'Tapanuli Selatan','22742',NULL,NULL),
(464,34,'Tapanuli Tengah','22611',NULL,NULL),
(465,34,'Tapanuli Utara','22414',NULL,NULL),
(466,13,'Tapin','71119',NULL,NULL),
(467,16,'Tarakan','77114',NULL,NULL),
(468,9,'Tasikmalaya','46411',NULL,NULL),
(469,9,'Tasikmalaya','46116',NULL,NULL),
(470,34,'Tebing Tinggi','20632',NULL,NULL),
(471,8,'Tebo','37519',NULL,NULL),
(472,10,'Tegal','52419',NULL,NULL),
(473,10,'Tegal','52114',NULL,NULL),
(474,25,'Teluk Bintuni','98551',NULL,NULL),
(475,25,'Teluk Wondama','98591',NULL,NULL),
(476,10,'Temanggung','56212',NULL,NULL),
(477,20,'Ternate','97714',NULL,NULL),
(478,20,'Tidore Kepulauan','97815',NULL,NULL),
(479,23,'Timor Tengah Selatan','85562',NULL,NULL),
(480,23,'Timor Tengah Utara','85612',NULL,NULL),
(481,34,'Toba Samosir','22316',NULL,NULL),
(482,29,'Tojo Una-Una','94683',NULL,NULL),
(483,29,'Toli-Toli','94542',NULL,NULL),
(484,24,'Tolikara','99411',NULL,NULL),
(485,31,'Tomohon','95416',NULL,NULL),
(486,28,'Toraja Utara','91831',NULL,NULL),
(487,11,'Trenggalek','66312',NULL,NULL),
(488,19,'Tual','97612',NULL,NULL),
(489,11,'Tuban','62319',NULL,NULL),
(490,18,'Tulang Bawang','34613',NULL,NULL),
(491,18,'Tulang Bawang Barat','34419',NULL,NULL),
(492,11,'Tulungagung','66212',NULL,NULL),
(493,28,'Wajo','90911',NULL,NULL),
(494,30,'Wakatobi','93791',NULL,NULL),
(495,24,'Waropen','98269',NULL,NULL),
(496,18,'Way Kanan','34711',NULL,NULL),
(497,10,'Wonogiri','57619',NULL,NULL),
(498,10,'Wonosobo','56311',NULL,NULL),
(499,24,'Yahukimo','99041',NULL,NULL),
(500,24,'Yalimo','99481',NULL,NULL),
(501,5,'Yogyakarta','55111',NULL,NULL);

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
(1,'jne','2020-04-19 07:57:00','2020-04-19 07:57:00'),
(2,'tiki','2020-04-19 07:57:04','2020-04-19 07:57:04'),
(4,'posindonesia','2020-05-12 20:19:35','2020-05-12 20:19:35');

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

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2020_06_07_040827_create_notifications_table',1);

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

insert  into `notifications`(`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) values 
('00a96567-0bcc-4a08-830d-5c16d7932d47','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"gaaaa\",\"produk\":\"keyboard\",\"rate\":5,\"content\":\"Bagus sEKALI\"}',NULL,'2020-06-16 23:16:30','2020-06-16 23:16:30'),
('0292c4b9-1e65-4208-a275-a1ae4f2a10c8','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":78}','2020-06-12 00:52:40','2020-06-11 23:03:09','2020-06-12 00:52:40'),
('06c121dc-d492-4d2f-8ca4-dfd3d7230545','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"yoyo\",\"rate\":1,\"content\":\"TOLOL ANDA\"}','2020-06-12 01:03:29','2020-06-11 23:01:03','2020-06-12 01:03:29'),
('0c75a4cb-b701-4385-a8d3-519bc15f65fc','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"JL.Batukaru\",\"total\":402000}','2020-06-15 06:10:27','2020-06-10 22:58:01','2020-06-15 06:10:27'),
('0cb5575a-c4ec-4d58-9443-1c3e11a06022','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":60,\"status\":\"delivered\",\"user\":1,\"created_at\":\"2020-06-10T20:44:20.000000Z\",\"updated_at\":\"2020-06-10T22:26:03.000000Z\"}','2020-06-15 06:10:27','2020-06-10 22:26:03','2020-06-15 06:10:27'),
('12c276e3-ddac-4edc-a8dc-0b6d62351925','App\\Notifications\\ulasan_admin','App\\Admin',5,'{\"user\":3,\"ulasan\":\"anjeng\"}','2020-06-15 06:10:27','2020-06-10 21:53:20','2020-06-15 06:10:27'),
('16d92178-0424-4f47-9c52-536c6f0d4097','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":91,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-08-01T06:10:37.000000Z\",\"updated_at\":\"2020-06-16T06:31:25.000000Z\"}','2020-06-16 06:46:15','2020-06-16 06:31:25','2020-06-16 06:46:15'),
('1af6a644-c923-49d3-8836-626ea6d8c24f','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":88000}','2020-06-16 06:59:02','2020-06-16 06:40:36','2020-06-16 06:59:02'),
('1de128cb-9b87-4833-ac13-601f15c894b8','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"JL.Batukaru\",\"total\":402000}','2020-06-15 06:10:27','2020-06-10 22:59:06','2020-06-15 06:10:27'),
('21a96dea-5fb7-4ac0-9007-c54e15f4cb8f','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"gaaaa\",\"produk\":\"yoyo\",\"rate\":3,\"content\":\"Bagus Sekali\"}','2020-06-16 06:10:03','2020-06-16 05:33:36','2020-06-16 06:10:03'),
('2420b831-09d5-496e-9c8f-e37b8d1a8a8e','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":92,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T06:31:59.000000Z\",\"updated_at\":\"2020-06-16T06:47:20.000000Z\"}',NULL,'2020-06-16 06:47:20','2020-06-16 06:47:20'),
('2443e2ff-3364-4478-8f09-30567c88f6bd','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":364444}','2020-06-16 06:10:03','2020-06-16 04:00:52','2020-06-16 06:10:03'),
('25ea957b-327d-48c2-968d-212f0e0d6813','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":98,\"status\":\"verified\",\"user\":3,\"created_at\":\"2020-06-16T23:10:12.000000Z\",\"updated_at\":\"2020-06-16T23:11:24.000000Z\"}',NULL,'2020-06-16 23:11:24','2020-06-16 23:11:24'),
('26f10c36-d8a4-4802-8df1-640b2f96fcb6','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"jl.resimuka\",\"total\":85012}',NULL,'2020-06-16 23:21:37','2020-06-16 23:21:37'),
('28b4277a-4416-485d-a5f0-49fc4fffc1d8','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"jl.resimuka\",\"total\":102000}',NULL,'2020-06-16 07:02:22','2020-06-16 07:02:22'),
('293c8a2f-a9f8-4b46-9089-9fc5341c0773','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":65,\"status\":\"delivered\",\"user\":3,\"created_at\":\"2020-06-10T21:33:08.000000Z\",\"updated_at\":\"2020-06-10T21:38:14.000000Z\"}','2020-06-15 06:10:27','2020-06-10 21:38:14','2020-06-15 06:10:27'),
('29bf3877-4571-495d-8d90-3dbbfda15335','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":96,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T06:59:47.000000Z\",\"updated_at\":\"2020-06-16T07:00:22.000000Z\"}','2020-06-16 23:15:16','2020-06-16 07:00:22','2020-06-16 23:15:16'),
('2db1d325-885b-44cb-8426-6fa5f9d1f872','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":88}','2020-06-16 06:10:03','2020-06-16 06:03:25','2020-06-16 06:10:03'),
('323248c1-98ac-4f92-88a9-e2c946c77ddb','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":82,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-15T04:40:58.000000Z\",\"updated_at\":\"2020-06-15T05:03:58.000000Z\"}','2020-06-15 06:10:33','2020-06-15 05:03:58','2020-06-15 06:10:33'),
('366348ef-8288-4215-bcee-ad5f63558660','App\\Notifications\\ulasan_admin','App\\Admin',5,'{\"user\":2,\"ulasan\":\"goblok\"}','2020-06-15 06:10:27','2020-06-10 22:24:04','2020-06-15 06:10:27'),
('37e5fac9-82bc-4c93-82d1-8bc137aee6c2','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":76,\"status\":\"delivered\",\"user\":3,\"created_at\":\"2020-06-11T03:14:15.000000Z\",\"updated_at\":\"2020-06-11T23:00:44.000000Z\"}','2020-06-15 06:10:27','2020-06-11 23:00:45','2020-06-15 06:10:27'),
('37f6be8d-a821-4bac-bf2b-97175535152e','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":98,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T23:10:12.000000Z\",\"updated_at\":\"2020-06-16T23:13:57.000000Z\"}',NULL,'2020-06-16 23:13:57','2020-06-16 23:13:57'),
('3dcc1423-2c99-4034-945f-2f8407053d5a','App\\Notifications\\ulasan_admin','App\\User',4,'{\"user\":4,\"ulasan\":\"Terimakasih\"}',NULL,'2020-06-16 23:23:15','2020-06-16 23:23:15'),
('3e063417-f463-4d3e-a608-1dcf0ce71439','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":82}','2020-06-15 06:10:26','2020-06-15 04:43:11','2020-06-15 06:10:26'),
('3fca6646-95d0-40dc-b209-a5c7de341bb6','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":89,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-08-01T06:09:16.000000Z\",\"updated_at\":\"2020-06-16T06:31:28.000000Z\"}','2020-06-16 06:46:15','2020-06-16 06:31:28','2020-06-16 06:46:15'),
('435e0809-d6b2-4713-a316-6b1007cba7be','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"gaaaa\",\"id_transaksi\":96}',NULL,'2020-06-16 07:00:14','2020-06-16 07:00:14'),
('45122351-d409-4882-94b7-11720e01249c','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":94,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T06:50:54.000000Z\",\"updated_at\":\"2020-06-16T06:56:24.000000Z\"}','2020-06-16 23:15:16','2020-06-16 06:56:24','2020-06-16 23:15:16'),
('470f03bd-abc7-419f-97d3-0bbf3e296a41','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":102012}','2020-06-16 06:10:03','2020-06-16 06:09:52','2020-06-16 06:10:03'),
('4d89f7b1-c49f-4056-a34b-d99a0acff5ac','App\\Notifications\\upload_bukti','App\\User',3,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":67}','2020-06-12 00:27:15','2020-06-10 23:54:21','2020-06-12 00:27:15'),
('501afea7-875a-4d71-95db-a3dc4076b239','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"JL.Batukaru\",\"total\":402000}','2020-06-15 06:10:27','2020-06-10 22:58:33','2020-06-15 06:10:27'),
('54cdcd9c-1529-40ef-8e66-4ac857441343','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"jl.resimuka\",\"total\":158000}',NULL,'2020-06-16 06:59:47','2020-06-16 06:59:47'),
('54e9253d-b3f4-43a7-b14b-945c928f85b8','App\\Notifications\\upload_bukti','App\\User',3,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":67}','2020-06-12 00:27:15','2020-06-10 23:53:51','2020-06-12 00:27:15'),
('55f1c913-c95c-45b1-942e-8f475c338be7','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"keyboard\",\"rate\":5,\"content\":\"ssasasaass\"}','2020-06-16 06:59:02','2020-06-16 06:32:54','2020-06-16 06:59:02'),
('56525e52-95ee-45ef-8b6f-3c43c62e7f0b','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"yoyo\",\"rate\":3,\"content\":\"JELEK\"}','2020-06-15 06:10:26','2020-06-15 04:44:05','2020-06-15 06:10:26'),
('60d16320-6966-4977-8c62-2ad37907d71b','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"Ventela Public\",\"rate\":2,\"content\":\"sasas\"}','2020-06-15 06:10:26','2020-06-15 04:54:32','2020-06-15 06:10:26'),
('6202ce75-4c2c-4358-8265-c4bf70226bbd','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":79,\"status\":\"delivered\",\"user\":3,\"created_at\":\"2020-05-01T04:46:17.000000Z\",\"updated_at\":\"2020-06-12T06:00:36.000000Z\"}','2020-06-12 06:00:44','2020-06-12 06:00:36','2020-06-12 06:00:44'),
('65aac300-c600-472e-be20-0f37725290a6','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"gaaaa\",\"id_transaksi\":97}',NULL,'2020-06-16 07:03:08','2020-06-16 07:03:08'),
('682f0fb3-54f6-4dff-9022-e0d9fbb81fac','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":88,\"status\":\"verified\",\"user\":3,\"created_at\":\"2020-06-16T06:02:50.000000Z\",\"updated_at\":\"2020-06-16T06:03:32.000000Z\"}','2020-06-16 06:46:15','2020-06-16 06:03:32','2020-06-16 06:46:15'),
('6b7a6310-1638-4661-a419-bf802684d956','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":51,\"status\":\"verified\",\"user\":1,\"created_at\":\"2020-06-07T03:49:57.000000Z\",\"updated_at\":\"2020-06-10T20:24:33.000000Z\"}','2020-06-15 06:10:27','2020-06-10 20:24:33','2020-06-15 06:10:27'),
('6f042642-ef27-48c1-a83c-22f914d03591','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":64,\"status\":\"verified\",\"user\":1,\"created_at\":\"2020-06-10T20:49:46.000000Z\",\"updated_at\":\"2020-06-10T21:34:40.000000Z\"}','2020-06-15 06:10:27','2020-06-10 21:34:40','2020-06-15 06:10:27'),
('73462ecc-296f-4cbb-8cf0-82b3ff7ca4c6','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":76,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-11T03:14:15.000000Z\",\"updated_at\":\"2020-06-11T23:00:49.000000Z\"}','2020-06-15 06:10:26','2020-06-11 23:00:49','2020-06-15 06:10:26'),
('736a0064-5b8d-44ae-972b-515a2f4010d8','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"saasffff\",\"total\":384000}','2020-06-15 06:10:26','2020-06-14 03:55:30','2020-06-15 06:10:26'),
('74e4e302-9eb5-4904-95b9-3d6c13715f15','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"jl.resimuka\",\"total\":116000}','2020-06-16 06:59:02','2020-06-16 06:55:04','2020-06-16 06:59:02'),
('75cba683-d9ff-4470-9c59-754cfa2bdc3a','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":83,\"status\":\"delivered\",\"user\":3,\"created_at\":\"2020-06-15T04:42:34.000000Z\",\"updated_at\":\"2020-06-15T04:43:43.000000Z\"}','2020-06-15 06:10:34','2020-06-15 04:43:43','2020-06-15 06:10:34'),
('79128e04-d776-4839-9bd6-fafcbb014840','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":46000}','2020-06-16 06:59:02','2020-06-16 06:31:59','2020-06-16 06:59:02'),
('7c2d2a86-1c36-4ccb-8e2a-0cecec48673b','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"saasffff\",\"total\":646000}','2020-06-15 06:10:26','2020-06-15 04:42:34','2020-06-15 06:10:26'),
('7d6d806d-ad18-47a2-a374-4fe907d43a98','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"jl.resimuka\",\"total\":36012}','2020-06-16 06:10:03','2020-06-16 05:33:05','2020-06-16 06:10:03'),
('7df79ac3-b598-4669-b387-fe8bcb1cad20','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":80222}','2020-06-15 06:10:26','2020-06-14 04:03:10','2020-06-15 06:10:26'),
('7e05d74d-970d-4412-ae76-34fab98854b9','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"yoyo\",\"rate\":4,\"content\":\"Sangat Puas\"}','2020-06-16 06:10:03','2020-06-16 06:04:19','2020-06-16 06:10:03'),
('7e3b57ef-81df-4bc2-9c59-4454fa33074f','App\\Notifications\\transaksi_baru','App\\User',4,'{\"user\":\"gaaaa\",\"address\":\"JL.Batukaru\",\"total\":402000}','2020-06-16 23:15:16','2020-06-11 00:09:18','2020-06-16 23:15:16'),
('8221ef57-4be6-429f-8885-bffaf45de1dc','App\\Notifications\\ulasan_admin','App\\Admin',5,'{\"user\":3,\"ulasan\":\"GOBLOK ANDA\"}','2020-06-15 06:10:27','2020-06-10 22:38:34','2020-06-15 06:10:27'),
('84f3fad1-4262-4dbc-971c-209bc1a95d2f','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":65,\"status\":\"delivered\",\"user\":3,\"created_at\":\"2020-06-10T21:33:08.000000Z\",\"updated_at\":\"2020-06-10T22:37:43.000000Z\"}','2020-06-15 06:10:27','2020-06-10 22:37:43','2020-06-15 06:10:27'),
('85a1fa39-f3c2-4e1a-a68f-ffd42514f71b','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":100,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T23:15:59.000000Z\",\"updated_at\":\"2020-06-16T23:16:09.000000Z\"}',NULL,'2020-06-16 23:16:09','2020-06-16 23:16:09'),
('87b943bf-c54c-49ee-bdb7-3a57dfca614d','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"saasffff\",\"total\":124222}','2020-06-15 06:10:26','2020-06-12 04:46:17','2020-06-15 06:10:26'),
('889c5309-8ce1-43e9-b6af-6ef565a3a37f','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"JL.Batukaru\",\"total\":124222}','2020-06-15 06:10:27','2020-06-11 03:14:15','2020-06-15 06:10:27'),
('89b3b7bf-8085-4594-ad6a-e9df8ddd3536','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":87,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T05:33:05.000000Z\",\"updated_at\":\"2020-06-16T05:33:25.000000Z\"}','2020-06-16 23:15:16','2020-06-16 05:33:25','2020-06-16 23:15:16'),
('8adcf388-a0e3-479e-b5cb-adec728d424e','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":99,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T23:13:44.000000Z\",\"updated_at\":\"2020-06-16T23:30:44.000000Z\"}',NULL,'2020-06-16 23:30:44','2020-06-16 23:30:44'),
('9236d224-033f-4126-a3f6-c9e1b3902595','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":88,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T06:02:50.000000Z\",\"updated_at\":\"2020-06-16T06:03:42.000000Z\"}','2020-06-16 06:46:15','2020-06-16 06:03:42','2020-06-16 06:46:15'),
('92cae040-8867-4698-a9c2-9902b1989788','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":86,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T05:30:47.000000Z\",\"updated_at\":\"2020-06-16T05:31:01.000000Z\"}','2020-06-16 06:46:15','2020-06-16 05:31:01','2020-06-16 06:46:15'),
('95142c0d-43a4-4ff9-8225-504077fef55e','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":79,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-12T04:46:17.000000Z\",\"updated_at\":\"2020-06-12T04:47:36.000000Z\"}','2020-06-12 04:48:46','2020-06-12 04:47:36','2020-06-12 04:48:46'),
('958f4a8d-39bb-47f2-b61d-40797dccea27','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":85,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T04:04:59.000000Z\",\"updated_at\":\"2020-06-16T04:06:57.000000Z\"}','2020-06-16 06:46:15','2020-06-16 04:06:57','2020-06-16 06:46:15'),
('96433970-a8aa-471a-8843-5181ee398059','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":93,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-16T06:40:36.000000Z\",\"updated_at\":\"2020-06-16T06:40:56.000000Z\"}','2020-06-16 06:46:15','2020-06-16 06:40:56','2020-06-16 06:46:15'),
('9761c1e1-f54d-4cc7-af30-daee09a75908','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":124222}','2020-06-12 00:54:33','2020-06-11 23:02:44','2020-06-12 00:54:33'),
('98d74f25-715b-4ad8-ab88-93401ea26551','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"saasffff\",\"total\":87012}','2020-06-16 06:10:03','2020-06-16 04:04:59','2020-06-16 06:10:03'),
('9950414b-d7b1-4554-8dde-87d4992bf3b0','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"Jl.Batukaru\",\"total\":22012}',NULL,'2020-06-16 23:13:44','2020-06-16 23:13:44'),
('997e8a05-a80b-44d9-ad69-b94ee063c398','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"gaaaa\",\"produk\":\"Ventela Public\",\"rate\":4,\"content\":\"JELEK\"}','2020-06-16 06:10:03','2020-06-16 05:34:16','2020-06-16 06:10:03'),
('9d558676-e8f0-4365-8196-0e3df57cbc28','App\\Notifications\\notif','App\\User',3,'{\"user\":\"ferdi ansyah\",\"produk\":\"yoyo\",\"rate\":0,\"content\":\"TOLOL ANJNG\"}','2020-06-12 00:27:15','2020-06-10 23:35:53','2020-06-12 00:27:15'),
('9d98e5af-b0b5-4d1d-bcb4-75e1a5751a0f','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":92000}',NULL,'2020-06-16 23:10:13','2020-06-16 23:10:13'),
('9f5eb50b-48d2-49eb-abc0-2004368db883','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":96000}','2020-06-16 06:59:02','2020-06-16 06:10:37','2020-06-16 06:59:02'),
('a20d20dc-60e4-485f-8f36-50e000256716','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"saasffff\",\"total\":402000}','2020-06-15 06:10:27','2020-06-11 03:15:05','2020-06-15 06:10:27'),
('a22552c0-a328-4365-bcb4-35548a7c3b46','App\\Notifications\\respon_admin','App\\Admin',5,'{\"id\":65,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-10T21:33:08.000000Z\",\"updated_at\":\"2020-06-10T22:38:01.000000Z\"}','2020-06-15 06:10:27','2020-06-10 22:38:01','2020-06-15 06:10:27'),
('a371c50b-d04e-4bd4-9112-ef9dfe5f2cba','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":83}','2020-06-15 06:10:26','2020-06-15 04:43:25','2020-06-15 06:10:26'),
('a6991bf0-3db6-4d39-b7e2-ac2cad14dc90','App\\Notifications\\ulasan_admin','App\\User',3,'{\"user\":3,\"ulasan\":\"Bagus\"}',NULL,'2020-06-16 23:19:15','2020-06-16 23:19:15'),
('a6b58cb3-af61-4869-acc8-55da4e58e31b','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"yoyo\",\"rate\":4,\"content\":\"GOBLOK ASU\"}','2020-06-15 06:10:26','2020-06-12 04:48:07','2020-06-15 06:10:26'),
('a8e55adb-7564-429b-b72a-27b0a22188d6','App\\Notifications\\transaksi_baru','App\\User',3,'{\"user\":\"ferdi ansyah\",\"address\":\"saasffff\",\"total\":402000}','2020-06-12 00:27:15','2020-06-10 23:00:12','2020-06-12 00:27:15'),
('a8ec5821-36d6-4861-bfdd-183b405f2805','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":95,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T06:55:04.000000Z\",\"updated_at\":\"2020-06-16T06:55:51.000000Z\"}','2020-06-16 23:15:16','2020-06-16 06:55:51','2020-06-16 23:15:16'),
('acb85b93-97d8-4019-b519-9fba19cb8c29','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":202222}','2020-06-16 06:10:03','2020-06-16 06:02:51','2020-06-16 06:10:03'),
('b1a35c40-0350-43e8-bb8b-f621f60f7f60','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":90,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-04-01T06:09:52.000000Z\",\"updated_at\":\"2020-06-16T06:31:30.000000Z\"}','2020-06-16 06:46:15','2020-06-16 06:31:30','2020-06-16 06:46:15'),
('b1b8313d-da84-473e-b734-6d34c56aeab1','App\\Notifications\\ulasan_admin','App\\User',3,'{\"user\":4,\"ulasan\":\"Terimakasih\"}',NULL,'2020-06-16 23:20:01','2020-06-16 23:20:01'),
('b357a52b-7e71-4c39-ac1f-2da4a09c3b4c','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"Jl.Monang Maning\",\"total\":60012}','2020-06-16 06:59:02','2020-06-16 06:50:54','2020-06-16 06:59:02'),
('b5b0e0c2-0990-4398-97db-1cbc0b2c24ae','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":101,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T23:21:37.000000Z\",\"updated_at\":\"2020-06-16T23:21:45.000000Z\"}',NULL,'2020-06-16 23:21:45','2020-06-16 23:21:45'),
('b602b257-ce37-4949-957a-0bcf7c07a286','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"gaaaa\",\"produk\":\"yoyo\",\"rate\":4,\"content\":\"Bagus Sangat\"}',NULL,'2020-06-16 23:22:06','2020-06-16 23:22:06'),
('bbd86983-f6ad-4240-9262-73eabb7be9f5','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":85}','2020-06-16 06:10:03','2020-06-16 04:05:37','2020-06-16 06:10:03'),
('c2e9af55-1e4b-4a70-b518-3b106b3c2461','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":83,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-15T04:42:34.000000Z\",\"updated_at\":\"2020-06-15T04:43:51.000000Z\"}','2020-06-15 06:10:33','2020-06-15 04:43:51','2020-06-15 06:10:33'),
('c682f3d8-d69b-453f-bada-28d9d24ed814','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"gaaaa\",\"id_transaksi\":87}','2020-06-16 06:10:03','2020-06-16 05:33:18','2020-06-16 06:10:03'),
('c902e3af-ca27-4c90-9427-055537c958a8','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":83,\"status\":\"verified\",\"user\":3,\"created_at\":\"2020-06-15T04:42:34.000000Z\",\"updated_at\":\"2020-06-15T04:43:35.000000Z\"}','2020-06-15 06:10:34','2020-06-15 04:43:35','2020-06-15 06:10:34'),
('ccb9cf33-af45-4eca-bd33-6dcb3e399d71','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"produk\":\"Ventela Public\",\"rate\":5,\"content\":\"Naice\"}','2020-06-16 06:59:02','2020-06-16 06:43:54','2020-06-16 06:59:02'),
('e19e1b6e-21b0-4dd5-a1ff-b9f0e9125c77','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":80,\"status\":\"success\",\"user\":3,\"created_at\":\"2020-06-14T03:55:30.000000Z\",\"updated_at\":\"2020-06-14T04:18:59.000000Z\"}','2020-06-15 06:10:34','2020-06-14 04:18:59','2020-06-15 06:10:34'),
('e2b7e5b1-06de-43b1-aa7d-1f577fd044e2','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":85,\"status\":\"verified\",\"user\":3,\"created_at\":\"2020-06-16T04:04:59.000000Z\",\"updated_at\":\"2020-06-16T04:05:47.000000Z\"}','2020-06-16 06:46:15','2020-06-16 04:05:47','2020-06-16 06:46:15'),
('e2f89a8e-e62c-442a-b7c3-6f0c73bd5914','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":104000}','2020-06-16 06:10:03','2020-06-16 06:09:16','2020-06-16 06:10:03'),
('e31d7aa9-30dc-4855-ac5f-bf59c1f8b200','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"address\":\"jl.resimuka\",\"total\":102000}','2020-06-16 06:10:03','2020-06-16 05:30:47','2020-06-16 06:10:03'),
('ea7fdcd8-4da7-4479-b956-1e2351929692','App\\Notifications\\notif','App\\Admin',5,'{\"user\":\"gaaaa\",\"produk\":\"Ventela Public\",\"rate\":1,\"content\":\"Jelek\"}',NULL,'2020-06-16 07:00:57','2020-06-16 07:00:57'),
('ee5def8d-36e3-4bd6-b4ef-60f798cb33ed','App\\Notifications\\transaksi_baru','App\\Admin',5,'{\"user\":\"gaaaa\",\"address\":\"JL.Batukaru\",\"total\":36000}',NULL,'2020-06-16 23:15:59','2020-06-16 23:15:59'),
('efd4a403-47ef-44e3-abea-b2a14fce0636','App\\Notifications\\ulasan_admin','App\\User',4,'{\"user\":3,\"ulasan\":\"Terimakasih\"}',NULL,'2020-06-16 23:17:38','2020-06-16 23:17:38'),
('f61768c0-119e-4841-b8a3-307ac9074e00','App\\Notifications\\upload_bukti','App\\Admin',5,'{\"user\":\"ferdi ansyah\",\"id_transaksi\":98}',NULL,'2020-06-16 23:11:10','2020-06-16 23:11:10'),
('fb866b9b-268f-4087-af83-c947d48733c6','App\\Notifications\\respon_admin','App\\User',4,'{\"id\":97,\"status\":\"success\",\"user\":4,\"created_at\":\"2020-06-16T07:02:22.000000Z\",\"updated_at\":\"2020-06-16T07:03:15.000000Z\"}','2020-06-16 23:15:16','2020-06-16 07:03:15','2020-06-16 23:15:16'),
('fce98f66-f216-4685-896a-28989f25e43a','App\\Notifications\\respon_admin','App\\User',3,'{\"id\":79,\"status\":\"verified\",\"user\":3,\"created_at\":\"2020-06-12T04:46:17.000000Z\",\"updated_at\":\"2020-06-12T04:47:24.000000Z\"}','2020-06-12 04:48:56','2020-06-12 04:47:24','2020-06-12 04:48:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

insert  into `product_category_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values 
(6,6,4,'2020-05-12 20:24:34','2020-05-12 20:24:34'),
(7,7,4,'2020-05-13 11:32:12','2020-05-13 11:32:12'),
(8,4,6,'2020-05-15 23:42:13','1970-01-28 00:00:00'),
(9,5,6,'2020-05-15 23:42:01','1970-01-23 00:00:00'),
(10,8,4,'2020-06-03 03:44:52','2020-06-03 03:44:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values 
(4,4,'kernel.png','2020-05-11 12:07:31','2020-05-11 12:07:31'),
(5,5,'netos11.jpg','2020-05-12 14:28:02','2020-05-12 14:28:02'),
(6,6,'tanaman4.jpg','2020-05-12 20:24:34','2020-05-12 20:24:34'),
(7,7,'tanaman2.jpg','2020-05-13 11:32:12','2020-05-13 11:32:12'),
(8,8,'cannyaaaa.PNG','2020-06-03 03:44:53','2020-06-03 03:44:53');

/*Table structure for table `product_revie` */

DROP TABLE IF EXISTS `product_revie`;

CREATE TABLE `product_revie` (
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
  CONSTRAINT `product_revie_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_revie_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_revie` */

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `rate_id` (`rate`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_reviews_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`product_id`,`user_id`,`rate`,`content`,`created_at`,`updated_at`,`deleted_at`) values 
(7,5,1,5,'kamu gila','2020-05-25 08:27:23','2020-05-25 08:27:23','2020-06-15 23:01:43'),
(8,5,1,1,'ssasasaass','2020-05-29 02:13:13','2020-05-29 02:13:13','2020-06-15 23:01:53'),
(9,5,1,2,'ssasasaass','2020-05-29 02:13:13','2020-05-29 02:13:13','2020-06-15 23:01:55'),
(10,5,1,5,'aku','2020-05-29 02:14:17','2020-05-29 02:14:17','2020-06-15 23:01:56'),
(11,5,3,2,'Barang Bagus','2020-05-31 06:00:29','2020-05-31 06:00:29','2020-06-15 23:01:57'),
(15,5,3,1,'ssasasaass','2020-06-10 23:26:17','2020-06-10 23:26:17','2020-06-15 23:01:59'),
(19,5,3,0,'TOLOL ANJNG','2020-06-10 23:35:53','2020-06-10 23:35:53','2020-06-15 23:00:39'),
(20,5,3,1,'TOLOL ANDA','2020-06-11 23:01:03','2020-06-11 23:01:03','2020-06-15 23:00:41'),
(21,5,3,4,'GOBLOK ASU','2020-06-12 04:48:07','2020-06-12 04:48:07','2020-06-15 23:00:44'),
(22,5,3,3,'JELEK','2020-06-15 04:44:05','2020-06-15 04:44:05','2020-06-15 23:02:01'),
(25,6,2,0,'','2020-06-15 23:02:14','2020-06-15 23:02:15','2020-06-15 23:02:02'),
(27,6,3,2,'sasas','2020-06-15 04:54:32','2020-06-15 04:54:32','2020-06-15 23:02:03'),
(28,6,3,3,'sasa','2020-06-15 04:56:43','2020-06-15 04:56:43','2020-06-15 23:02:04'),
(29,6,3,3,'sasa','2020-06-15 04:58:14','2020-06-15 04:58:14','2020-06-15 23:02:06'),
(30,8,1,1,'sasass','2020-06-14 22:57:57','2020-06-14 22:57:59','2020-06-15 23:02:07'),
(31,5,4,3,'Bagus Sekali','2020-06-16 05:33:35','2020-06-16 05:33:35','2020-06-15 23:02:08'),
(32,6,4,4,'JELEK','2020-06-16 05:34:16','2020-06-16 05:34:16','2020-06-15 23:02:11'),
(33,5,3,4,'Sangat Puas','2020-06-16 06:04:19','2020-06-16 06:04:19',NULL),
(34,8,3,5,'ssasasaass','2020-06-16 06:32:54','2020-06-16 06:32:54','2020-06-15 23:45:19'),
(35,6,2,3,'Hai','2020-06-15 23:39:32','2020-06-15 23:39:34',NULL),
(36,6,3,5,'Naice','2020-06-16 06:43:54','2020-06-16 06:43:54',NULL),
(37,8,1,1,'Suka','2020-06-15 23:46:00','2020-06-15 23:46:02',NULL),
(38,6,4,1,'Jelek','2020-06-16 07:00:57','2020-06-16 07:00:57',NULL),
(39,8,4,5,'Bagus sEKALI','2020-06-16 23:16:30','2020-06-16 23:16:30',NULL),
(40,5,4,4,'Bagus Sangat','2020-06-16 23:22:06','2020-06-16 23:22:06',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`price`,`discount`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values 
(4,'yaya',454,12,'asdasdasdas',3,'2020-05-11 12:07:31','2020-05-11 12:07:40',10,NULL,'2020-05-11 12:07:40'),
(5,'yoyo',2222,12,'asdasdasdas',3,'2020-05-12 14:28:02','2020-05-12 14:28:02',11,NULL,NULL),
(6,'Ventela Public',280000,12000,'mantappp',4,'2020-05-12 20:24:34','2020-05-13 11:31:22',20,NULL,NULL),
(7,'Sepatu Saba',210000,20000,'saba',3,'2020-05-13 11:32:11','2020-06-03 01:01:23',30,NULL,'2020-06-03 01:01:23'),
(8,'keyboard',200000,2000,'keyboard berkualitas',3,'2020-06-03 03:44:52','2020-06-03 03:44:52',10,NULL,NULL);

/*Table structure for table `provinces` */

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `provinces` */

insert  into `provinces`(`id`,`province`,`created_at`,`updated_at`) values 
(1,'Bali',NULL,NULL),
(2,'Bangka Belitung',NULL,NULL),
(3,'Banten',NULL,NULL),
(4,'Bengkulu',NULL,NULL),
(5,'DI Yogyakarta',NULL,NULL),
(6,'DKI Jakarta',NULL,NULL),
(7,'Gorontalo',NULL,NULL),
(8,'Jambi',NULL,NULL),
(9,'Jawa Barat',NULL,NULL),
(10,'Jawa Tengah',NULL,NULL),
(11,'Jawa Timur',NULL,NULL),
(12,'Kalimantan Barat',NULL,NULL),
(13,'Kalimantan Selatan',NULL,NULL),
(14,'Kalimantan Tengah',NULL,NULL),
(15,'Kalimantan Timur',NULL,NULL),
(16,'Kalimantan Utara',NULL,NULL),
(17,'Kepulauan Riau',NULL,NULL),
(18,'Lampung',NULL,NULL),
(19,'Maluku',NULL,NULL),
(20,'Maluku Utara',NULL,NULL),
(21,'Nanggroe Aceh Darussalam (NAD)',NULL,NULL),
(22,'Nusa Tenggara Barat (NTB)',NULL,NULL),
(23,'Nusa Tenggara Timur (NTT)',NULL,NULL),
(24,'Papua',NULL,NULL),
(25,'Papua Barat',NULL,NULL),
(26,'Riau',NULL,NULL),
(27,'Sulawesi Barat',NULL,NULL),
(28,'Sulawesi Selatan',NULL,NULL),
(29,'Sulawesi Tengah',NULL,NULL),
(30,'Sulawesi Tenggara',NULL,NULL),
(31,'Sulawesi Utara',NULL,NULL),
(32,'Sumatera Barat',NULL,NULL),
(33,'Sumatera Selatan',NULL,NULL),
(34,'Sumatera Utara',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `response` */

insert  into `response`(`id`,`review_id`,`admin_id`,`content`,`created_at`,`updated_at`) values 
(2,7,3,'tolol anjeng','2020-06-07 12:06:25','2020-06-07 12:06:25'),
(3,8,3,'anjeng gobliok','2020-06-07 12:13:20','2020-06-07 12:13:20'),
(4,8,3,'anjeng gobliok','2020-06-07 12:15:54','2020-06-07 12:15:54'),
(5,8,3,'anjeng gobliok','2020-06-07 12:17:03','2020-06-07 12:17:03'),
(6,8,3,'anjeng gobliok','2020-06-07 12:17:40','2020-06-07 12:17:40'),
(7,7,3,'goblok anjing','2020-06-07 12:34:00','2020-06-07 12:34:00'),
(8,7,3,'goblok anjing','2020-06-07 12:35:43','2020-06-07 12:35:43'),
(9,7,3,'tolol','2020-06-10 19:24:43','2020-06-10 19:24:43'),
(10,7,3,'tolol lu','2020-06-10 21:48:14','2020-06-10 21:48:14'),
(11,7,3,'anjeng','2020-06-10 21:53:20','2020-06-10 21:53:20'),
(12,8,3,'goblok lu','2020-06-10 22:16:04','2020-06-10 22:16:04'),
(13,8,3,'goblok lu','2020-06-10 22:18:33','2020-06-10 22:18:33'),
(14,7,3,'goblok','2020-06-10 22:21:27','2020-06-10 22:21:27'),
(15,7,3,'goblok','2020-06-10 22:21:53','2020-06-10 22:21:53'),
(16,7,3,'goblok','2020-06-10 22:23:20','2020-06-10 22:23:20'),
(17,7,3,'goblok','2020-06-10 22:23:25','2020-06-10 22:23:25'),
(18,7,3,'goblok','2020-06-10 22:24:04','2020-06-10 22:24:04'),
(19,11,3,'GOBLOK ANDA','2020-06-10 22:38:34','2020-06-10 22:38:34'),
(20,33,3,'Terimakasih','2020-06-16 23:17:37','2020-06-16 23:17:37'),
(21,36,3,'Bagus','2020-06-16 23:19:14','2020-06-16 23:19:14'),
(22,38,3,'Terimakasih','2020-06-16 23:20:01','2020-06-16 23:20:01'),
(23,40,3,'Terimakasih','2020-06-16 23:23:15','2020-06-16 23:23:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`id`,`transaction_id`,`product_id`,`qty`,`discount`,`selling_price`,`created_at`,`updated_at`) values 
(1,48,5,0,NULL,NULL,'2020-06-05 03:55:37','2020-06-05 03:55:37'),
(2,48,6,0,NULL,NULL,'2020-06-05 03:55:37','2020-06-05 03:55:37'),
(3,48,8,0,NULL,NULL,'2020-06-05 03:55:37','2020-06-05 03:55:37'),
(4,50,6,1,12000,280000,'2020-06-05 06:08:37','2020-06-05 06:08:37'),
(5,50,5,1,12,2222,'2020-06-05 06:08:37','2020-06-05 06:08:37'),
(6,51,5,9,12,2222,'2020-06-07 03:49:57','2020-06-07 03:49:57'),
(7,65,6,1,12000,280000,'2020-06-10 21:33:08','2020-06-10 21:33:08'),
(8,65,5,1,12,2222,'2020-06-10 21:33:08','2020-06-10 21:33:08'),
(9,66,6,1,12000,280000,'2020-06-10 22:45:24','2020-06-10 22:45:24'),
(10,67,6,1,12000,280000,'2020-06-10 22:51:32','2020-06-10 22:51:32'),
(11,73,6,1,12000,280000,'2020-06-10 22:59:06','2020-06-10 22:59:06'),
(12,74,6,1,12000,280000,'2020-06-10 23:00:12','2020-06-10 23:00:12'),
(13,75,6,1,12000,280000,'2020-06-11 00:09:18','2020-06-11 00:09:18'),
(14,76,5,1,12,2222,'2020-06-11 03:14:15','2020-06-11 03:14:15'),
(15,77,6,1,12000,280000,'2020-06-11 03:15:06','2020-06-11 03:15:06'),
(16,78,5,1,12,2222,'2020-06-11 23:02:44','2020-06-11 23:02:44'),
(17,79,5,1,12,2222,'2020-06-12 04:46:17','2020-06-12 04:46:17'),
(18,80,6,1,12000,280000,'2020-06-14 03:55:30','2020-06-14 03:55:30'),
(19,81,5,1,12,2222,'2020-06-14 04:03:11','2020-06-14 04:03:11'),
(20,83,6,1,12000,280000,'2020-06-15 04:42:34','2020-06-15 04:42:34'),
(21,83,8,1,2000,200000,'2020-06-15 04:42:34','2020-06-15 04:42:34'),
(22,84,6,1,12000,280000,'2020-06-16 04:00:52','2020-06-16 04:00:52'),
(23,84,6,0,12000,280000,'2020-06-16 04:00:52','2020-06-16 04:00:52'),
(24,84,5,0,12,2222,'2020-06-16 04:00:52','2020-06-16 04:00:52'),
(25,84,5,1,12,2222,'2020-06-16 04:00:52','2020-06-16 04:00:52'),
(26,84,5,1,12,2222,'2020-06-16 04:00:52','2020-06-16 04:00:52'),
(27,84,8,0,2000,200000,'2020-06-16 04:00:52','2020-06-16 04:00:52'),
(28,85,5,1,12,2222,'2020-06-16 04:04:59','2020-06-16 04:04:59'),
(29,85,8,1,2000,200000,'2020-06-16 04:04:59','2020-06-16 04:04:59'),
(30,86,6,1,12000,280000,'2020-06-16 05:30:47','2020-06-16 05:30:47'),
(31,87,5,1,12,2222,'2020-06-16 05:33:05','2020-06-16 05:33:05'),
(32,88,5,1,12,2222,'2020-06-16 06:02:51','2020-06-16 06:02:51'),
(33,89,8,1,2000,200000,'2020-06-16 06:09:16','2020-06-16 06:09:16'),
(34,90,5,1,12,2222,'2020-06-16 06:09:52','2020-06-16 06:09:52'),
(35,91,6,2,12000,280000,'2020-06-16 06:10:37','2020-06-16 06:10:37'),
(36,92,8,1,2000,200000,'2020-06-16 06:32:00','2020-06-16 06:32:00'),
(37,93,6,1,12000,280000,'2020-06-16 06:40:37','2020-06-16 06:40:37'),
(38,94,5,1,12,2222,'2020-06-16 06:50:54','2020-06-16 06:50:54'),
(39,94,8,2,2000,200000,'2020-06-16 06:50:54','2020-06-16 06:50:54'),
(40,95,6,3,12000,280000,'2020-06-16 06:55:04','2020-06-16 06:55:04'),
(41,96,6,1,12000,280000,'2020-06-16 06:59:47','2020-06-16 06:59:47'),
(42,97,8,1,2000,200000,'2020-06-16 07:02:22','2020-06-16 07:02:22'),
(43,98,6,1,12000,280000,'2020-06-16 23:10:13','2020-06-16 23:10:13'),
(44,99,5,1,12,2222,'2020-06-16 23:13:44','2020-06-16 23:13:44'),
(45,100,8,1,2000,200000,'2020-06-16 23:15:59','2020-06-16 23:15:59'),
(46,101,5,1,12,2222,'2020-06-16 23:21:37','2020-06-16 23:21:37');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('unverified','verified','delivered','success','expired','canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_id` (`courier_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`timeout`,`address`,`regency`,`province`,`total`,`shipping_cost`,`sub_total`,`user_id`,`courier_id`,`proof_of_payment`,`created_at`,`updated_at`,`deleted_at`,`status`) values 
(48,'2020-06-06 03:55:37','saasffff','15','14',584222.00,102000.00,482222.00,1,1,NULL,'2020-06-05 03:55:37','2020-06-07 03:28:36','2020-06-07 03:28:36','expired'),
(50,'2020-06-06 06:08:37','saasffff','1','1',404222.00,122000.00,282222.00,1,1,NULL,'2020-06-05 06:08:37','2020-06-07 03:28:38','2020-06-07 03:28:38','expired'),
(51,'2020-06-08 03:49:57','JL.Batukaru','11','11',123998.00,104000.00,19998.00,1,4,NULL,'2020-06-07 03:49:57','2020-06-10 21:34:01','2020-06-10 21:34:01','success'),
(52,'2020-06-09 01:15:36','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:15:36','2020-06-10 21:34:03','2020-06-10 21:34:03','expired'),
(53,'2020-06-09 01:16:18','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:16:18','2020-06-10 21:34:05','2020-06-10 21:34:05','expired'),
(54,'2020-06-09 01:16:40','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:16:40','2020-06-10 21:34:07','2020-06-10 21:34:07','expired'),
(55,'2020-06-09 01:17:26','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:17:26','2020-06-10 21:34:09','2020-06-10 21:34:09','expired'),
(56,'2020-06-09 01:18:08','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:18:08','2020-06-10 21:34:11','2020-06-10 21:34:11','expired'),
(57,'2020-06-09 01:18:16','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:18:16','2020-06-10 21:34:12','2020-06-10 21:34:12','expired'),
(58,'2020-06-09 01:18:44','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:18:44','2020-06-10 21:34:14','2020-06-10 21:34:14','expired'),
(59,'2020-06-09 01:19:23','saasffff','11','16',126444.00,122000.00,4444.00,1,1,NULL,'2020-06-08 01:19:23','2020-06-10 21:34:16','2020-06-10 21:34:16','expired'),
(60,'2020-06-11 20:44:20','111','14','13',166222.00,164000.00,2222.00,1,1,NULL,'2020-06-10 20:44:20','2020-06-14 04:18:28','2020-06-14 04:18:28','expired'),
(61,'2020-06-11 20:45:34','111','14','13',166222.00,164000.00,2222.00,1,1,NULL,'2020-06-10 20:45:34','2020-06-14 04:18:31','2020-06-14 04:18:31','expired'),
(62,'2020-06-11 20:47:10','111','14','13',166222.00,164000.00,2222.00,1,1,NULL,'2020-06-10 20:47:10','2020-06-14 04:18:32','2020-06-14 04:18:32','expired'),
(63,'2020-06-11 20:49:41','111','14','13',166222.00,164000.00,2222.00,1,1,NULL,'2020-06-10 20:49:41','2020-06-14 04:18:33','2020-06-14 04:18:33','expired'),
(64,'2020-06-11 20:49:46','111','14','13',166222.00,164000.00,2222.00,1,1,NULL,'2020-06-10 20:49:46','2020-06-14 04:18:34','2020-06-14 04:18:34','expired'),
(65,'2020-06-11 21:33:08','saasffff','1','1',404222.00,122000.00,282222.00,3,1,NULL,'2020-06-10 21:33:08','2020-06-14 04:18:35','2020-06-14 04:18:35','expired'),
(66,'2020-06-11 22:45:24','JL.Batukaru','9','14',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:45:24','2020-06-14 04:18:36','2020-06-14 04:18:36','expired'),
(67,'2020-06-11 22:51:32','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,'bins.PNG','2020-06-10 22:51:32','2020-06-14 04:18:38','2020-06-14 04:18:38','expired'),
(68,'2020-06-11 22:52:50','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:52:50','2020-06-14 04:18:39','2020-06-14 04:18:39','expired'),
(69,'2020-06-11 22:53:30','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:53:30','2020-06-14 04:18:40','2020-06-14 04:18:40','expired'),
(70,'2020-06-11 22:56:07','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:56:07','2020-06-14 04:18:41','2020-06-14 04:18:41','expired'),
(71,'2020-06-11 22:58:01','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:58:01','2020-06-14 04:18:42','2020-06-14 04:18:42','expired'),
(72,'2020-06-11 22:58:33','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:58:33','2020-06-14 04:18:43','2020-06-14 04:18:43','expired'),
(73,'2020-06-11 22:59:06','JL.Batukaru','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 22:59:06','2020-06-14 04:18:44','2020-06-14 04:18:44','expired'),
(74,'2020-06-11 23:00:12','saasffff','1','1',402000.00,122000.00,280000.00,3,1,NULL,'2020-06-10 23:00:12','2020-06-14 04:18:45','2020-06-14 04:18:45','expired'),
(75,'2020-06-12 00:09:18','JL.Batukaru','1','14',402000.00,122000.00,280000.00,4,1,NULL,'2020-04-01 00:09:18','2020-06-14 04:18:46','2020-06-14 04:18:46','expired'),
(76,'2020-06-12 03:14:15','JL.Batukaru','1','1',124222.00,122000.00,2222.00,3,1,NULL,'2020-06-11 03:14:15','2020-06-14 04:18:47','2020-06-14 04:18:47','expired'),
(77,'2020-06-12 03:15:05','saasffff','1','1',402000.00,122000.00,280000.00,4,1,NULL,'2020-06-11 03:15:05','2020-06-14 04:18:47','2020-06-14 04:18:47','expired'),
(78,'2020-06-12 23:02:43','jl.resimuka','1','1',124222.00,122000.00,2222.00,3,1,'buku 2.PNG','2020-04-01 23:02:44','2020-06-14 04:18:48','2020-06-14 04:18:48','expired'),
(79,'2020-06-13 04:46:17','saasffff','1','1',124222.00,122000.00,2222.00,3,1,NULL,'2020-05-01 04:46:17','2020-06-14 04:18:49','2020-06-14 04:18:49','expired'),
(80,'2020-06-15 03:55:30','saasffff','29','2',384000.00,104000.00,280000.00,3,2,NULL,'2020-06-14 03:55:30','2020-06-16 05:56:39','2020-06-15 23:00:02','expired'),
(81,'2020-06-15 04:03:10','jl.resimuka','Muaro Jambi','Jambi',80222.00,78000.00,2222.00,3,4,NULL,'2020-06-14 04:03:10','2020-06-16 05:56:39','2020-06-15 23:00:04','expired'),
(82,'2020-06-16 04:40:58','saasffff','Gorontalo Utara','Gorontalo',646000.00,166000.00,480000.00,3,1,'1588175145530.jpg','2020-06-15 04:40:58','2020-06-16 05:56:39','2020-06-15 23:00:06','expired'),
(83,'2020-06-16 04:42:34','saasffff','Gorontalo Utara','Gorontalo',646000.00,166000.00,480000.00,3,1,'messageImage_1581086224404_0.jpg','2020-06-15 04:42:34','2020-06-16 05:56:39','2020-06-15 23:00:07','expired'),
(84,'2020-06-17 04:00:51','jl.resimuka','Karangasem','Bali',364444.00,80000.00,284444.00,3,1,NULL,'2020-06-16 04:00:51','2020-06-16 04:04:22','2020-06-15 23:00:08','canceled'),
(85,'2020-06-17 04:04:59','saasffff','Bangka Selatan','Bangka Belitung',87012.00,85000.00,2012.00,3,4,'USE KACE.PNG','2020-06-16 04:04:59','2020-06-16 05:56:22','2020-06-15 23:00:11','canceled'),
(86,'2020-06-17 05:30:47','jl.resimuka','Lebak','Banten',102000.00,90000.00,12000.00,3,2,NULL,'2020-06-16 05:30:47','2020-06-16 05:56:19','2020-06-15 23:00:12','canceled'),
(87,'2020-06-17 05:33:05','jl.resimuka','Lamongan','Jawa Timur',36012.00,36000.00,12.00,4,2,'NameTag.jpg','2020-06-16 05:33:05','2020-06-16 05:33:25','2020-06-15 23:00:55','success'),
(88,'2020-06-17 06:02:50','jl.resimuka','Bone Bolango','Gorontalo',202222.00,200000.00,2222.00,3,2,'USE KACE.PNG','2020-05-01 06:02:50','2020-06-16 06:03:42','2020-06-15 23:56:52','success'),
(89,'2020-06-17 06:09:16','jl.resimuka','Bangka Barat','Bangka Belitung',104000.00,102000.00,2000.00,3,1,NULL,'2020-08-01 06:09:16','2020-06-16 06:31:28','2020-06-15 23:56:54','success'),
(90,'2020-06-17 06:09:52','jl.resimuka','Bangka Selatan','Bangka Belitung',102012.00,102000.00,12.00,3,1,NULL,'2020-04-01 06:09:52','2020-06-16 06:31:30','2020-06-15 23:56:55','success'),
(91,'2020-06-17 06:10:37','jl.resimuka','Tangerang','Banten',96000.00,72000.00,24000.00,3,2,NULL,'2020-08-01 06:10:37','2020-06-16 06:31:25','2020-06-15 23:56:56','success'),
(92,'2020-06-17 06:31:59','jl.resimuka','Pandeglang','Banten',46000.00,44000.00,2000.00,3,1,NULL,'2020-06-16 06:31:59','2020-06-16 06:47:20','2020-06-15 23:56:57','success'),
(93,'2020-06-17 06:40:36','jl.resimuka','Serang','Banten',88000.00,76000.00,12000.00,3,2,NULL,'2020-06-16 06:40:36','2020-06-16 06:40:56','2020-06-15 23:57:00','success'),
(94,'2020-06-17 06:50:54','Jl.Monang Maning','Denpasar','Bali',60012.00,56000.00,4012.00,4,1,NULL,'2020-06-16 06:50:54','2020-06-16 06:56:24','2020-06-15 23:57:01','success'),
(95,'2020-06-17 06:55:04','jl.resimuka','Denpasar','Bali',116000.00,80000.00,36000.00,4,2,NULL,'2020-06-16 06:55:04','2020-06-16 06:55:51','2020-06-15 23:57:02','success'),
(96,'2020-06-17 06:59:47','jl.resimuka','Gorontalo','Gorontalo',158000.00,146000.00,12000.00,4,2,'messageImage_1581086224404_0.jpg','2020-06-16 06:59:47','2020-06-16 07:00:22',NULL,'success'),
(97,'2020-06-17 07:02:22','jl.resimuka','Bangka Tengah','Bangka Belitung',102000.00,100000.00,2000.00,4,2,'NameTag.jpg','2020-05-01 07:02:22','2020-06-16 07:03:15',NULL,'success'),
(98,'2020-06-17 23:10:12','jl.resimuka','Denpasar','Bali',92000.00,80000.00,12000.00,3,2,'Capture.PNG','2020-06-16 23:10:12','2020-06-16 23:13:57',NULL,'success'),
(99,'2020-06-17 23:13:44','Jl.Batukaru','Sleman','DI Yogyakarta',22012.00,22000.00,12.00,3,2,NULL,'2020-06-16 23:13:44','2020-06-16 23:30:44',NULL,'success'),
(100,'2020-06-17 23:15:59','JL.Batukaru','Serang','Banten',36000.00,34000.00,2000.00,4,4,NULL,'2020-06-16 23:15:59','2020-06-16 23:16:09',NULL,'success'),
(101,'2020-06-17 23:21:37','jl.resimuka','Bangka Selatan','Bangka Belitung',85012.00,85000.00,12.00,4,4,NULL,'2020-06-16 23:21:37','2020-06-16 23:21:45',NULL,'success');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'yuniaswandewi','yuniaswandewi2015@gmail.com','NULL','NULL','2020-04-19 19:40:03','$2y$10$kB.ONWE3jB/vlFTyRwDHRuP1m1oar9UmWTmFte5c8xFT6PzJ/Q/Vq',NULL,'2020-04-19 11:27:06','2020-04-19 11:27:06'),
(2,'lala','lala@gmail.com','fotouser\\server.jpg','apa','2020-05-12 22:30:08','$2y$10$QZKu6c70qh4byKizXmQc4ODFdFzoM.T1HN3rYBCp5wTppMxr37d6m',NULL,'2020-05-12 14:29:45','2020-05-12 14:29:45'),
(3,'ferdi ansyah','ferdicool95@gmail.com','fotouser\\cannyaaaa.PNG','sas','2020-05-28 19:11:55','$2y$10$DrPFfIU2kKvU45xGInHOv.AdZvTqtxDi1k8Wo02pXoggQQf5Fz6KG',NULL,'2020-05-29 02:11:30','2020-05-29 02:11:30'),
(4,'gaaaa','ferdanikun@gmail.com','fotouser\\cannyaaaa.PNG','sasas','2020-06-10 17:08:21','$2y$10$zUp.0IJ8q2nkebnJum..XuMcaXqF/n28YDMno7Jv/M5qOxPhb72sm',NULL,'2020-06-11 00:07:38','2020-06-11 00:07:38'),
(5,'feriksan','ikhsan_ferdiansyah@student.unud.ac.id','fotouser\\Gambaran Umum Game.PNG','abc',NULL,'$2y$10$dNsvyaeXgxSiNWS2EhLQFOwi.ftbYwbkpNqEdjHCc/2qywiUp9hFW',NULL,'2020-06-16 20:36:47','2020-06-16 20:36:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
