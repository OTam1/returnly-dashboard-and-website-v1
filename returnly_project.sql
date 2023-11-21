-- MySQL dump 10.13  Distrib 5.7.23-23, for Linux (x86_64)
--
-- Host: localhost    Database: returnly_project
-- ------------------------------------------------------
-- Server version	5.7.23-23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Current Database: `returnly_project`
--


--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_user_id_foreign` (`user_id`),
  CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `user_id`, `category_name_en`, `category_name_ar`, `status`, `created_at`, `updated_at`) VALUES (1,1,'Books Stationary','الكتب والقرطاسية',1,'2023-08-20 11:58:55','2023-10-22 15:58:17'),(2,1,'Clothing and Accessories','الملابس والاكسسوارات',1,'2023-08-20 12:02:58','2023-08-20 12:02:58'),(3,1,'Currency, Money','العملة، المال',1,'2023-08-20 12:02:58','2023-08-20 12:02:58'),(4,1,'Documents Cards Ids Tickets\r\n','المستندات والبطاقات والهويات والتذاكر',1,'2023-08-20 12:02:58','2023-08-20 12:02:58'),(5,1,'Electronics','الالكترونيات',1,'2023-11-16 14:20:00','2023-11-16 14:20:00'),(6,1,'Eyewear','نظارات',1,'2023-11-16 14:20:29','2023-11-16 14:20:29'),(7,1,'Home furnishing, decoration','أثاث المنزل، الديكور',1,'2023-11-16 14:20:58','2023-11-16 14:20:58'),(8,1,'Jewellery','مجوهرات',1,'2023-11-16 14:21:15','2023-11-16 14:21:15'),(9,1,'Keys','مفاتيح',1,'2023-11-16 14:21:40','2023-11-16 14:21:40'),(10,1,'Luggage Or Bags','الأمتعة أو الحقائب',1,'2023-11-16 14:21:59','2023-11-16 14:21:59'),(11,1,'Medical','أدوات طبية',1,'2023-11-16 14:23:10','2023-11-16 14:23:10'),(12,1,'Mobile Phones','الهواتف المحمولة',1,'2023-11-16 14:23:54','2023-11-16 14:23:54'),(13,1,'Musical Equipment','المعدات الموسيقية',1,'2023-11-16 14:24:12','2023-11-16 14:24:12'),(14,1,'Number plates, spare parts, vehicles and tools','لوحات الأرقام وقطع الغيار والمركبات والأدوات',1,'2023-11-16 14:24:26','2023-11-16 14:24:26'),(15,1,'Personal Accessories','الملحقات الشخصية',1,'2023-11-16 14:24:46','2023-11-16 14:24:46'),(16,1,'Pets and Plants','الحيوانات الأليفة والنباتات',1,'2023-11-16 14:24:59','2023-11-16 14:24:59'),(17,1,'Sports Equipment','ادوات رياضية',1,'2023-11-16 14:25:12','2023-11-16 14:25:12'),(18,1,'Toys-Hobbies, Entertainment','ألعاب, ترفيه',1,'2023-11-16 14:25:38','2023-11-16 14:25:38'),(19,1,'Wallet','محفظة',1,'2023-11-16 14:25:56','2023-11-16 14:25:56'),(20,1,'Watches','ساعات',1,'2023-11-16 14:26:09','2023-11-16 14:26:09');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `city_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_user_id_foreign` (`user_id`),
  CONSTRAINT `cities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `user_id`, `city_name_en`, `city_name_ar`, `status`, `created_at`, `updated_at`) VALUES (1,1,'Dammam','الدمام',1,'2023-08-20 11:13:07','2023-08-21 11:29:50'),(3,1,'Riyadh','الرياض',1,'2023-08-20 11:19:17','2023-08-20 11:22:10'),(4,1,'Jeddah','جدة',1,'2023-08-21 14:52:14','2023-08-21 14:52:14');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(11) NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'item_images/default.png',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `user_id`, `item_name`, `color`, `city_id`, `city`, `place_id`, `place`, `category_id`, `category`, `sub_category_id`, `sub_category`, `image`, `status`, `date`, `time`, `description`, `created_at`, `updated_at`) VALUES (1,3,'Wallet','Black',1,'Dammam',1,'King Fahd International Airport',1,'Pocket Items',1,'Wallets','item_images/JoEtyIjSJqjsGCuKOcpVkScUTlsena7fcqLGgbWD.png','Cancelled','2018-11-23','10:30:00','Lost','2023-08-15 12:25:52','2023-08-23 20:39:29'),(2,3,'Wallet','Red',1,'Dammam',1,'King Fahd International Airport',1,'Pocket Items',1,'Wallets','item_images/mVQupTpYOvNxcgaDTsedjowPehWm2sv4vHKEcedB.png','Waiting for payment','2018-11-23','10:30:00','Lost in street','2023-08-15 12:26:17','2023-08-15 12:26:17'),(3,1,'Wallet','Orange',1,'Dammam',1,'King Fahd International Airport',1,'Pocket Items',1,'Wallets','item_images/YronPp72fBAH8jv83enFUCTLmgh3FVIXRWt4t3LF.png','Pending','2023-08-15','03:32:00','Lost it in front of the resturant','2023-08-16 11:29:51','2023-08-16 11:29:51'),(4,5,'Wallet','Orange',1,'Dammam',1,'King Fahd International Airport',1,'Pocket Items',1,'Wallets','item_images/JoEtyIjSJqjsGCuKOcpVkScUTlsena7fcqLGgbWD.png','Pending','2023-12-31','12:59:00','Lost','2023-08-16 14:10:33','2023-08-16 14:10:33'),(5,1,'Wallet','Black',1,'Dammam',1,'King Fahd International Airport',1,'Pocket Items',1,'Wallets','item_images/mVQupTpYOvNxcgaDTsedjowPehWm2sv4vHKEcedB.png','Pending','2023-07-31','12:59:00','LOST','2023-08-16 14:14:50','2023-08-16 14:14:50'),(7,3,'Wallet','Black',1,'Dammam',2,'King Fahad Airpot',1,'Electronics',1,'Airpods','item_images/YronPp72fBAH8jv83enFUCTLmgh3FVIXRWt4t3LF.png','Delivered','2023-12-01','12:59:00','LOST','2023-08-21 11:40:55','2023-08-24 19:44:38'),(8,5,'Airpods Pro','Gold',1,'Dammam',2,'King Fahad Airpot',1,'Electronics',1,'Airpods','item_images/bfkL5heol1J55p0pQlX0xBmM3vXbIbp8zSgxRzXm.webp','Pending','2023-01-01','12:59:00','Lost','2023-08-24 18:53:45','2023-08-24 18:53:45'),(9,11,'calculator','black',1,'Dammam',2,'King Fahad Airpot',1,'Electronics',1,'Airpods','item_images/W9ZBOzBRqU4KHtHAxXIO8IyUXeMfAF0eccZFQkKN.heic','Pending','2023-09-15','11:00:00','black','2023-09-17 14:03:48','2023-09-17 14:03:48'),(10,5,'Iphone 15','Black',1,'Dammam',2,'King Fahad Airpot',1,'Electronics',1,'Airpods','item_images/default.png','Pending','2023-01-01','01:00:00','Lost it','2023-10-23 17:25:30','2023-10-23 17:25:30'),(11,5,'Keys','silver',1,'Dammam',2,'King Fahad Airpot',1,'Electronics',1,'Airpods','item_images/default.png','Pending','2023-10-23','15:44:00','Lost it','2023-10-23 17:45:07','2023-10-23 17:45:07'),(12,12,'phone','black',1,'Dammam',2,'King Fahad Airpot',1,'Electronics',1,'Airpods','item_images/default.png','Pending','2023-10-21','14:00:00','black phone','2023-10-24 14:34:09','2023-10-24 14:34:09');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_07_26_092347_create_roles_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `city_id` bigint(20) unsigned NOT NULL,
  `place_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `places_user_id_foreign` (`user_id`),
  KEY `places_city_id_foreign` (`city_id`),
  CONSTRAINT `places_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  CONSTRAINT `places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` (`id`, `user_id`, `city_id`, `place_name_en`, `place_name_ar`, `status`, `created_at`, `updated_at`) VALUES (2,2,1,'King Fahad Airpot','مطار الملك فهد',1,'2023-08-20 11:33:32','2023-08-23 17:21:01');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'admin','2023-07-26 07:24:12','2023-07-26 07:24:12'),(2,'corporates','2023-07-26 07:24:12','2023-07-26 07:24:12'),(3,'users','2023-07-26 07:24:12','2023-07-26 07:24:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `sub_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_user_id_foreign` (`user_id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `sub_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` (`id`, `user_id`, `category_id`, `sub_category_name_en`, `sub_category_name_ar`, `status`, `created_at`, `updated_at`) VALUES (2,1,1,'Arts and Crafts','الفنون والحرف اليدوية',1,'2023-11-16 14:27:12','2023-11-16 14:27:12'),(3,1,1,'Book Hard Cover','غلاف كتاب صلب',1,'2023-11-16 14:29:00','2023-11-16 14:29:00'),(4,1,1,'Book Paper Back','ورقة ظهر كتاب',1,'2023-11-16 14:29:49','2023-11-16 14:29:49'),(5,1,1,'Diary-Address Book','دفتر العناوين',1,'2023-11-16 14:30:23','2023-11-16 14:30:23'),(6,1,1,'Envelope','ظرف',1,'2023-11-16 14:30:40','2023-11-16 14:30:40'),(7,1,1,'Folder','مجلد',1,'2023-11-16 14:30:59','2023-11-16 14:30:59'),(8,1,1,'Pen-Pencils-Writing','قلم-أقلام الرصاص-الكتابة',1,'2023-11-16 14:31:14','2023-11-16 14:31:14'),(9,1,1,'Photo Album','إلبوم الصور',1,'2023-11-16 14:31:31','2023-11-16 14:31:31'),(10,1,1,'Praying Rug','سجادة الصلاة',1,'2023-11-16 14:31:48','2023-11-16 14:31:48'),(11,1,1,'Quran Book','كتاب القرآن',1,'2023-11-16 14:32:04','2023-11-16 14:32:04'),(12,1,1,'Rosary','مسبحة',1,'2023-11-16 14:32:24','2023-11-16 14:32:24'),(13,1,1,'School Material','المواد المدرسية',1,'2023-11-16 14:32:42','2023-11-16 14:32:42'),(14,1,2,'Abaya','عباية',1,'2023-11-16 14:33:04','2023-11-16 14:33:04'),(15,1,2,'Belt','حزام',1,'2023-11-16 14:33:21','2023-11-16 14:33:21'),(16,1,2,'Blouse T-shirt','بلوزة تي شيرت',1,'2023-11-16 14:33:40','2023-11-16 14:33:40'),(17,1,2,'Boots','أحذية',1,'2023-11-16 14:34:35','2023-11-16 14:34:35'),(18,1,2,'Coat Jacket','سترة معطف',1,'2023-11-16 14:34:58','2023-11-16 14:34:58'),(19,1,2,'Dress','فستان',1,'2023-11-16 14:35:14','2023-11-16 14:35:14'),(20,1,2,'Gloves','قفازات',1,'2023-11-16 14:35:33','2023-11-16 14:35:33'),(21,1,2,'Hair Clip','مشبك شعر',1,'2023-11-16 14:35:55','2023-11-16 14:35:55'),(22,1,2,'Hat','قبعة',1,'2023-11-16 14:36:13','2023-11-16 14:36:13'),(23,1,2,'Nightwear','ملابس نوم',1,'2023-11-16 14:36:29','2023-11-16 14:36:29'),(24,1,2,'Pants trousers short Skirt','بنطلون بنطلون تنورة قصيرة',1,'2023-11-16 14:36:52','2023-11-16 14:36:52'),(25,1,2,'Sandals Slippers','صنادل شباشب',1,'2023-11-16 14:37:07','2023-11-16 14:37:07'),(26,1,2,'Scarf','وشاح',1,'2023-11-16 14:37:28','2023-11-16 14:37:28'),(27,1,2,'Shirt','قميص',1,'2023-11-16 14:37:42','2023-11-16 14:37:42'),(28,1,2,'Shoes Sneakers','أحذية رياضية',1,'2023-11-16 14:38:02','2023-11-16 14:38:02'),(29,1,2,'Socks','جوارب',1,'2023-11-16 14:38:16','2023-11-16 14:38:16'),(30,1,2,'Suit','بدلة',1,'2023-11-16 14:38:36','2023-11-16 14:38:36'),(31,1,2,'Sweater','سترة',1,'2023-11-16 14:39:11','2023-11-16 14:39:11'),(32,1,2,'Swimsuit','ملابس السباحة',1,'2023-11-16 14:39:25','2023-11-16 14:39:25'),(33,1,2,'Ties','ربطات العنق',1,'2023-11-16 14:39:46','2023-11-16 14:39:46'),(34,1,2,'Umbrella','مظلة',1,'2023-11-16 14:40:00','2023-11-16 14:40:00'),(35,1,2,'Walking Cane','عصا المشي',1,'2023-11-16 14:40:18','2023-11-16 14:40:18'),(36,1,3,'Cheque Book','دفتر شيكات',1,'2023-11-16 14:40:44','2023-11-16 14:40:44'),(37,1,3,'Credit Debit card','بطاقة الائتمان',1,'2023-11-16 14:41:25','2023-11-16 14:41:25'),(38,1,3,'Currency','عملة',1,'2023-11-16 14:42:14','2023-11-16 14:42:14'),(39,1,3,'Gift Card - Cash Card','بطاقة الهدايا - البطاقة النقدية',1,'2023-11-16 14:42:32','2023-11-16 14:42:32'),(40,1,3,'Personal Company Cheque','شيكات الشركات الخاصة',1,'2023-11-16 14:43:10','2023-11-16 14:43:10'),(41,1,3,'Traveller Cheque','شيكات المسافر',1,'2023-11-16 14:43:24','2023-11-16 14:43:24'),(42,1,4,'KSA Family Book','دفتر العائلة السعودي',1,'2023-11-16 14:43:49','2023-11-16 14:43:49'),(43,1,4,'Airplane - Flying Tickets','طائرة - تذاكر الطيران',1,'2023-11-16 14:48:16','2023-11-16 14:48:16'),(44,1,4,'Badge','شارة',1,'2023-11-16 14:48:47','2023-11-16 14:48:47'),(45,1,4,'Birth certificate','شهادة الميلاد',1,'2023-11-16 14:49:03','2023-11-16 14:49:03'),(46,1,4,'Boat Cancelation Document','وثيقة إلغاء القارب',1,'2023-11-16 14:50:00','2023-11-16 14:50:00'),(47,1,4,'Boat registration card','بطاقة تسجيل القارب',1,'2023-11-16 14:50:24','2023-11-16 14:50:24'),(48,1,4,'Car Registration Card','بطاقة تسجيل السيارة',1,'2023-11-16 14:51:34','2023-11-16 14:51:34'),(49,1,4,'Certificate of Incorporation','شهادة التأسيس',1,'2023-11-16 14:52:01','2023-11-16 14:52:01'),(50,1,4,'Certificate or Paper file','شهادة أو ملف ورقي',1,'2023-11-16 14:52:22','2023-11-16 14:52:22'),(51,1,4,'Cinema Tickets','تذاكر السينما',1,'2023-11-16 18:03:55','2023-11-16 18:04:01'),(52,1,4,'Death certificate','شهادة الوفاة',1,'2023-11-16 18:04:07','2023-11-16 18:04:12'),(53,1,4,'Drivers License','رخصة القيادة',1,'2023-11-16 18:04:15','2023-11-16 18:04:19'),(54,1,4,'E-Signature','التوقيع الإلكتروني',1,'2023-11-16 18:04:27','2023-11-16 18:04:32'),(55,1,4,'Saudi ID','الهوية السعودية',1,'2023-11-16 18:04:36','2023-11-16 18:04:40'),(56,1,4,'Employment Card','بطاقة التوظيف',1,'2023-11-16 18:04:46','2023-11-16 18:04:49'),(57,1,4,'Facility Card','بطاقة المنشأة',1,'2023-11-16 18:04:53','2023-11-16 18:04:56'),(58,1,4,'Family Book','السجل العائلي',1,'2023-11-16 18:05:06','2023-11-16 18:05:10'),(59,1,4,'Fine Ticket','تذكرة الغرامة',1,'2023-11-16 18:05:14','2023-11-16 18:05:18'),(60,1,4,'Insurance Card','بطاقة التأمين',1,'2023-11-16 18:05:22','2023-11-16 18:05:25'),(61,1,4,'License Card Permit','رخصة البطاقة',1,'2023-11-16 18:05:29','2023-11-16 18:05:33'),(62,1,4,'Loyalty Card','بطاقة الولاء',1,'2023-11-16 18:05:37','2023-11-16 18:05:41'),(63,1,4,'Marriage Card','بطاقة الزواج',1,'2023-11-16 18:05:45','2023-11-16 18:05:49'),(64,1,4,'Memorandum of Association','مذكرة التأسيس',1,'2023-11-16 18:05:54','2023-11-16 18:05:59'),(65,1,4,'Official Stamp','الختم الرسمي',1,'2023-11-16 18:06:04','2023-11-16 18:06:08'),(66,1,4,'Opera Tickets','تذاكر الأوبرا',1,'2023-11-16 18:06:12','2023-11-16 18:06:17'),(67,1,4,'Passport','جواز السفر',1,'2023-11-16 18:06:22','2023-11-16 18:06:27'),(68,1,4,'Personal ID Card','بطاقة الهوية الشخصية',1,'2023-11-16 18:06:32','2023-11-16 18:06:38'),(69,1,4,'Pleasure Boat Certificate','شهادة القارب الترفيهي',1,'2023-11-16 18:06:42','2023-11-16 18:06:46'),(70,1,4,'Practice Permit','تصريح الممارسة',1,'2023-11-16 18:06:50','2023-11-16 18:06:57'),(71,1,4,'Recruitment Card','بطاقة التوظيف',1,'2023-11-16 18:06:59','2023-11-16 18:07:03'),(72,1,4,'Sale Contract','عقد البيع',1,'2023-11-16 18:07:06','2023-11-16 18:07:09'),(73,1,4,'School ID','بطاقة المدرسة',1,'2023-11-16 18:07:12','2023-11-16 18:07:16'),(74,1,4,'Sports Tickets','تذاكر الرياضة',1,'2023-11-16 18:07:20','2023-11-16 18:07:23'),(75,1,4,'Stock certificate','شهادة الأسهم',1,'2023-11-16 18:07:26','2023-11-16 18:07:30'),(76,1,4,'Surety Bond','سند الضمان',1,'2023-11-16 18:07:34','2023-11-16 18:07:39'),(77,1,4,'Transport Card','بطاقة النقل',1,'2023-11-16 18:07:49','2023-11-16 18:07:59'),(78,1,4,'University Pass','تصريح الجامعة',1,'2023-11-16 18:08:03','2023-11-16 18:08:06'),(79,1,4,'Visa Document','وثيقة التأشيرة',1,'2023-11-16 18:08:09','2023-11-16 18:08:12'),(80,1,5,'Alarm Clock','منبه',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(81,1,5,'Cable, adapter, chargers','كابل، محول، شواحن',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(82,1,5,'Calculator','آلة حاسبة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(83,1,5,'Camera Lens-Case-Tripod','عدسة الكاميرا-حافظة-ثلاثي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(84,1,5,'CD-DVD Player','مشغل أقراص CD-DVD',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(85,1,5,'Computer Laptop','حاسوب محمول',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(86,1,5,'Computer Mouse','فأر الكمبيوتر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(87,1,5,'Drone','طائرة بدون طيار',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(88,1,5,'e-book reader','قارئ الكتب الإلكتروني',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(89,1,5,'Earphone Speakers','سماعات الأذن',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(90,1,5,'Flash Light','مصباح فلاش',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(91,1,5,'Harddrive','قرص صلب',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(92,1,5,'Keyboards','لوحات المفاتيح',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(93,1,5,'Microphone','ميكروفون',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(94,1,5,'MP3 Player','مشغل MP3',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(95,1,5,'Photo-Video Camera','كاميرا الصور والفيديو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(96,1,5,'Power Bank','بنك الطاقة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(97,1,5,'Printer','طابعة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(98,1,5,'Radio','راديو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(99,1,5,'Remote Control','جهاز التحكم عن بعد',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(100,1,5,'Router','جهاز التوجيه',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(101,1,5,'Smart Device','جهاز ذكي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(102,1,5,'Speaker','مكبر الصوت',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(103,1,5,'Tablet','جهاز لوحي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(104,1,5,'Tetra wireless device','جهاز الاتصال اللاسلكي Tetra',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(105,1,5,'TV','تلفزيون',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(106,1,5,'USB Drive','قرص USB',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(107,1,5,'Video Games','ألعاب الفيديو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(108,1,5,'Wearable','الأجهزة القابلة للارتداء',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(109,1,6,'Eye glasses','نظارات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(110,1,6,'Contact lenses','عدسات لاصقة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(111,1,6,'Eyeglass case','حافظة نظارات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(112,1,6,'Sunglasses','نظارات شمسية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(113,1,7,'Appliances','أجهزة منزلية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(114,1,7,'Artwork','أعمال فنية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(115,1,7,'Cleaning Material','مواد تنظيف',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(116,1,7,'Clothes hanger','علاقة ملابس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(117,1,7,'Cluttery','أشياء متناثرة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(118,1,7,'Container','حاوية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(119,1,7,'Dishwear','أدوات المائدة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(120,1,7,'Kitchen Accessories','إكسسوارات المطبخ',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(121,1,7,'Linen','أقمشة المنزل',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(122,1,7,'Mattress','فراش',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(123,1,7,'Mirror','مرآة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(124,1,7,'Office accessories','إكسسوارات المكتب',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(125,1,7,'Ornaments','حلي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(126,1,7,'safebox','صندوق آمن',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(127,1,7,'Souvenir','هدية تذكارية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(128,1,7,'Trash bin','سلة المهملات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(129,1,7,'Water container','حاوية ماء',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(130,1,8,'Belly Chain','حلق البطن',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(131,1,8,'Bracelet','سوار',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(132,1,8,'Brooch','بروش',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(133,1,8,'Circlet, Tiara, Diadem','تاج أو تيارا',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(134,1,8,'Cufflinks','أزرار الكم',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(135,1,8,'Earrings, Pendant','أقراط، قلادة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(136,1,8,'Foot Anklet','سلسلة للقدم',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(137,1,8,'Gemstone','حجر كريم',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(138,1,8,'Gold Set','مجموعة ذهبية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(139,1,8,'Necklace','قلادة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(140,1,8,'Pin','دبوس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(141,1,8,'Ring','خاتم',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(142,1,8,'Tie Clip','مشبك الربطة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(143,1,8,'Valuable Bars','أعواد قيمة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(144,1,9,'Car Keys','مفاتيح السيارة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(145,1,9,'Digital Pass','تصريح رقمي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(146,1,9,'Electronic Entry Permit','تصريح دخول إلكتروني',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(147,1,9,'House Keys','مفاتيح المنزل',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(148,1,9,'Key Ring','حلقة المفاتيح',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(149,1,9,'Safe Keys','مفاتيح الخزنة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(150,1,10,'Back Pack','حقيبة ظهر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(151,1,10,'Briefcase','حقيبة ملفات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(152,1,10,'Duffle Bag','حقيبة رياضية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(153,1,10,'Handbag Purse','حقيبة يد',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(154,1,10,'Laptop Tablet Bag','حقيبة لابتوب وتابلت',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(155,1,10,'Messenger Bag','حقيبة رسائل',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(156,1,10,'Shopping Bag','حقيبة تسوق',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(157,1,10,'Shoulder Bag','حقيبة كتف',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(158,1,10,'Suit Bag','حقيبة لباس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(159,1,10,'Suitcase','حقيبة سفر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(160,1,10,'Waistpack','حقيبة خصر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(161,1,11,'Blood Pressure meter','جهاز قياس ضغط الدم',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(162,1,11,'Cane','عكاز',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(163,1,11,'Diabetic tester','جهاز فحص السكر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(164,1,11,'Glucose meter','جهاز قياس الجلوكوز',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(165,1,11,'Insulin pump','مضخة الأنسولين',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(166,1,11,'Medical Gloves','قفازات طبية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(167,1,11,'Medical Masks','أقنعة طبية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(168,1,11,'Medication','أدوية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(169,1,11,'Pharmacy items','مستلزمات صيدلية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(170,1,11,'Walker','مشاية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(171,1,11,'Wheelchair','كرسي متحرك',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(172,1,11,'X-rays','أشعة سينية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(173,1,13,'Electronic Instruments','الآلات الإلكترونية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(174,1,13,'Percussion Instruments','آلات الإيقاع',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(175,1,13,'Stringed Instruments','آلات الوتر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(176,1,13,'Wind Instruments','آلات النفخ',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(177,1,14,'Car seat','مقعد السيارة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(178,1,14,'Driller','مثقاب',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(179,1,14,'Ladder','سلم',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(180,1,14,'Lock','قفل',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(181,1,14,'Paints','ألوان',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(182,1,14,'Repair Tools','أدوات الإصلاح',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(183,1,14,'Stroller','عربة أطفال',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(184,1,14,'Tool Box','صندوق الأدوات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(185,1,14,'Vehicle','مركبة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(186,1,14,'Vehicle parts','قطع غيار المركبات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(187,1,14,'Vehicle Plate','لوحة المركبة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(188,1,15,'Shaving Tools','أدوات الحلاقة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(189,1,15,'baby stroller','عربة أطفال',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(190,1,15,'babyhug vest','سترة الطفل هاغ',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(191,1,15,'Bukhoor','بخور',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(192,1,15,'Dental Set','مجموعة الأسنان',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(193,1,15,'Gift Box','صندوق الهدايا',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(194,1,15,'Glasses Hanger','حامل النظارات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(195,1,15,'Hair handle','مقبض الشعر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(196,1,15,'Hairdresser','كوافير',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(197,1,15,'Hearing device','جهاز السمع',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(198,1,15,'Knife','سكين',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(199,1,15,'Makeup','مكياج',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(200,1,15,'Money Box','صندوق النقود',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(201,1,15,'Perfume','عطر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(202,1,15,'Razor','موس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(203,1,15,'Sisha','الشيشة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(204,1,15,'Smoking accessories','إكسسوارات التدخين',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(205,1,15,'Telescope','تلسكوب',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(206,1,15,'Thermometer','ميزان الحرارة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(207,1,15,'Toiletries','مستلزمات الحمام',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(208,1,15,'Towel','منشفة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(209,1,15,'Wig','باروكة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(210,1,16,'Bird','طائر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(211,1,16,'Cat','قط',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(212,1,16,'Dog','كلب',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(213,1,16,'Garden Plants','نباتات الحديقة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(214,1,16,'Pet animal','حيوان أليف',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(215,1,16,'Pet product','منتجات الحيوانات الأليفة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(216,1,17,'Ball','كرة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(217,1,17,'Bicycle','دراجة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(218,1,17,'Cricket-Baseball Bat','مضرب كريكيت-بيسبول',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(219,1,17,'Golf Accessories','اكسسوارات الجولف',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(220,1,17,'Golf Bag','حقيبة الجولف',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(221,1,17,'Golf Clubs','أعضاء الجولف',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(222,1,17,'Horse Camel Riding Article','مقال ركوب الخيل والجمال',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(223,1,17,'Protectives','مواد واقية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(224,1,17,'Racket-Tennis-Badmin-Pad','مضرب تنس-بادمنتون-باد',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(225,1,17,'Scooter','سكوتر',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(226,1,17,'Skateboard','لوح التزلج',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(227,1,17,'Ski-Ski boots','تزلج-أحذية تزلج',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(228,1,17,'Surfboard','لوح التزلج على الامواج',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(229,1,17,'Table tennis set','مجموعة تنس الطاولة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(230,1,17,'Wakeboard','ويك بورد',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(231,1,18,'Bike-Walker-Moto','دراجة - مشاية - موتو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(232,1,18,'Car Toy','لعبة سيارة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(233,1,18,'Chess Game','لعبة الشطرنج',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(234,1,18,'Computer Games','ألعاب الحاسوب',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(235,1,18,'Doll','دمية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(236,1,18,'Domino Game','لعبة الدومينو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(237,1,18,'Electronic Toy','لعبة إلكترونية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(238,1,18,'Figurine','تمثال',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(239,1,18,'Gun Toy','لعبة مسدس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(240,1,18,'Model and Bricks','نموذج وقطع بناء',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(241,1,18,'Movie Discs','أقراص الأفلام',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(242,1,18,'Outdoor fun','مرح خارجي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(243,1,18,'Puzzle Game','لعبة الألغاز',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(244,1,18,'Sport Toy','لعبة رياضية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(245,1,18,'Stuffed pluse','لعبة محشوة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(246,1,18,'Table Game','لعبة الطاولة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(247,1,19,'Card holder','حامل بطاقات',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(248,1,19,'Coin purse','محفظة نقود',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(249,1,19,'Key wallet','محفظة مفاتيح',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(250,1,19,'Wallet','محفظة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(251,1,20,'Analog Watch','ساعة تناظرية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(252,1,20,'Digital Watch','ساعة رقمية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(253,1,20,'Diving Watch','ساعة غوص',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(254,1,20,'Luxury Watch','ساعة فاخرة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(255,1,20,'Smart Watch','ساعة ذكية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(256,1,20,'Sports Watch','ساعة رياضية',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(257,1,20,'Watch Part','قطعة ساعة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(258,1,12,'Apple','تفاحة',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(259,1,12,'Samsung','سامسونج',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(260,1,12,'Huawei','هواوي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(261,1,12,'Xiaomi','شاومي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(262,1,12,'Oppo','أوبو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(263,1,12,'Vivo','فيفو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(264,1,12,'Lenovo','لينوفو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(265,1,12,'LG','إل جي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(266,1,12,'Sony','سوني',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(267,1,12,'Nokia','نوكيا',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(268,1,12,'Motorola','موتورولا',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(269,1,12,'HTC','إتش تي سي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(270,1,12,'Google','جوجل',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(271,1,12,'OnePlus','وان بلس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(272,1,12,'BlackBerry','بلاكبيري',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(273,1,12,'Asus','أسوس',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(274,1,12,'ZTE','زد تي إي',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(275,1,12,'Alcatel','ألكاتيل',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(276,1,12,'Meizu','مايزو',1,'2023-11-16 18:07:49','2023-11-16 18:07:49'),(277,1,12,'Honor','هونر',1,'2023-11-16 18:07:49','2023-11-21 13:46:34');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `password`, `phone`, `location`, `about_me`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Tam Admin','Tam@revival.sa',1,'$2y$10$uSMEqFokLptmgq9s5NkLNOPLOEoOgLgDG2np0JKps6WcCHq0CqG2K',966549101520,'Dhahran',NULL,1,'6Hzkqq60LSMXpVTwYL4KUcfzWDAHdLbXFyo9Et9lolDHrCa7I6mVz0Y2hQm4','2023-07-26 07:23:11','2023-08-23 20:37:45'),(2,'Tam (corporators)','Tam2@revival.sa',2,'$2y$10$uSMEqFokLptmgq9s5NkLNOPLOEoOgLgDG2np0JKps6WcCHq0CqG2K',NULL,NULL,NULL,1,NULL,'2023-07-26 07:24:12','2023-08-24 19:44:49'),(3,'Hezam','Hezam@gmail.com',3,'$2y$10$NlaTrYjuneKHCi6ZsSjTBOL6Xm5ARnobctgzJrnx/POjJq/0ln0WG',NULL,NULL,NULL,1,NULL,'2023-08-08 17:07:40','2023-10-14 19:12:10'),(4,'Mohammed AbuShamleh','m.emad@iitech.com.sa',3,'$2y$10$S0hXxd39ubTgiVVGByjYiuy.QMF/A8kNjch4OBNgbTv9X0yUZXamm',NULL,NULL,NULL,1,'eSEPy8iyfn70KrLx9MQYoXSgFGItq4hjAFnOjxXNlpj9eAOOYeEsXc6dAqba','2023-08-09 15:01:40','2023-09-26 15:44:31'),(5,'Tam User','Tam3@revival.sa',3,'$2y$10$uSMEqFokLptmgq9s5NkLNOPLOEoOgLgDG2np0JKps6WcCHq0CqG2K',966549101520,'Dammam','TEST',1,NULL,'2023-08-17 14:56:43','2023-08-24 18:53:57'),(8,'Admin','Admin@return-ly.com',1,'$2y$10$WKUwwhvaKL9NwWEiaVWVLOAYclvpSR/KKOfmbJHJ2./yhvwU.161.',NULL,NULL,NULL,1,NULL,'2023-08-24 19:00:05','2023-08-24 19:00:05'),(9,'Mohammed','m.maghlouth@revival.sa',2,'$2y$10$AyRu1nHWUqR5IOKkfbX0JuNRdN77FfJdQK3RTfn4am4TbgL5l0Meu',505971089,'Riyadh',NULL,1,NULL,'2023-08-27 01:23:20','2023-08-27 01:23:20'),(10,'Mohammed','m.maghlouth@fintactics.ventures',3,'$2y$10$G6HJL7GxIM7UjMjWuzH/Iuj4lSYjCHFs6R6nIIiYRyqCkBjuw7pae',NULL,NULL,NULL,1,NULL,'2023-08-27 01:25:36','2023-08-27 01:25:36'),(11,'Turki Al Nabet','t.alnabet@iitech.com.sa',3,'$2y$10$1U6C1Zez6C3qQRfMKzQfH.pb2MY0FylQj1znczisYGV67ppC6mzvW',NULL,NULL,NULL,1,NULL,'2023-09-17 13:56:34','2023-09-17 13:56:34'),(12,'Hezam','hezam@iitech.com.sa',3,'$2y$10$JI./aQEam.hQNbaoVdggg.JxqcmSuDHd.zAkqwYLx67DgXXhiKcWm',NULL,NULL,NULL,1,'WLXFTVUWdSjmAYiLq1UOXokOkhDw6i2t12oB8ORUnE7taL3A0OPNi9sayhWx','2023-10-22 15:40:34','2023-11-09 18:20:12'),(13,'Abdo','kabodah@gmail.com',3,'$2y$10$XIGywK/.SEWR7PkSljZEkOdKJC2agt7e2QHUfsGTGEXrYX6u.oriy',NULL,NULL,NULL,1,NULL,'2023-10-29 23:21:21','2023-10-29 23:21:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'returnly_project'
--

--
-- Dumping routines for database 'returnly_project'
--
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-21  1:51:11
