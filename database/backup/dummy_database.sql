-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: fitnes
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_translations`
--

DROP TABLE IF EXISTS `about_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `about_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `about_us_button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `choose_us_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `choose_us_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `choose_us_button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_us_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_us_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `support_us_button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exercise_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exercise_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `team_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `about_translations_about_id_foreign` (`about_id`),
  CONSTRAINT `about_translations_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `about_translations`
--

LOCK TABLES `about_translations` WRITE;
/*!40000 ALTER TABLE `about_translations` DISABLE KEYS */;
INSERT INTO `about_translations` VALUES (1,1,'en','Fitnes','ABOUT FITNES','<p>With over 4100 online GYM Training videos and meditations, you&rsquo;ll find something to match your mood.</p>\r\n<p>With over 4100 online GYM Training videos and meditations, you&rsquo;ll find something to match your mood, schedule and energy. Stay flexible with a monthly membership &ndash; your first 04 days are free Or save with an annual membership.</p>',NULL,'WHY CHOOSE US?','<p>Ditch the ordinary, sculpt your extraordinary. Choose Fitnes. Unleash your potential with expert trainers, top-tier equipment, and a thriving community.</p>','More Details','FITNES SUPPORT YOU','<p>With over 4100 online GYM Training videos and meditations, you&rsquo;ll find something to match your mood.</p>\r\n<p>With over 4100 online GYM Training videos and meditations, you&rsquo;ll find something to match your mood, schedule and energy. Stay flexible with a monthly membership &ndash; your first 04 days are free Or save with an annual membership.</p>','More Details','EXERCISING  BODY & MIND','<p>Ditch the ordinary, sculpt your extraordinary. Choose Fitnes. Unleash your potential with expert trainers, top-tier equipment, and a thriving community.</p>','START TRAINING WITH ME','2024-06-05 21:35:11','2024-06-06 00:00:44'),(2,1,'bn','ফিটনেস','ফিটনেস সম্পর্কে','<p>৪১০০টিরও বেশি অনলাইন জিম ট্রেনিং ভিডিও এবং মেডিটেশন নিয়ে, আপনি আপনার মেজাজের সাথে মানানসই কিছু খুঁজে পাবেন।</p>\r\n<p>৪১০০টিরও বেশি অনলাইন জিম ট্রেনিং ভিডিও এবং মেডিটেশন নিয়ে, আপনি আপনার মেজাজ, সময়সূচি এবং শক্তির সাথে মানানসই কিছু খুঁজে পাবেন। মাসিক সদস্যতার মাধ্যমে নমনীয় থাকুন &ndash; প্রথম ৪ দিন বিনামূল্যে। অথবা বার্ষিক সদস্যতার মাধ্যমে সাশ্রয় করুন।</p>','আরো বিস্তারিত','কেন আমাদের চয়ন?','<p>সাধারণকে ছেড়ে দিন, গড়ুন আপনার অসাধারণ। ফিটনেস বেছে নিন। বিশেষজ্ঞ প্রশিক্ষক, শীর্ষ মানের সরঞ্জাম এবং একটি সমৃদ্ধশালী কমিউনিটির সঙ্গে আপনার সম্ভাবনা উন্মোচন করুন।</p>','আরো বিস্তারিত','ফিটনেস আপনাকে সমর্থন করে','<p>৪১০০টিরও বেশি অনলাইন জিম ট্রেনিং ভিডিও এবং মেডিটেশন নিয়ে, আপনি আপনার মেজাজের সাথে মানানসই কিছু খুঁজে পাবেন।</p>\r\n<p>৪১০০টিরও বেশি অনলাইন জিম ট্রেনিং ভিডিও এবং মেডিটেশন নিয়ে, আপনি আপনার মেজাজ, সময়সূচি এবং শক্তির সাথে মানানসই কিছু খুঁজে পাবেন। মাসিক সদস্যতার মাধ্যমে নমনীয় থাকুন &ndash; প্রথম ৪ দিন বিনামূল্যে। অথবা বার্ষিক সদস্যতার মাধ্যমে সাশ্রয় করুন।</p>','আরো বিস্তারিত','শরীর ও মনের ব্যায়াম','<p>সাধারণকে ছেড়ে দিন, গড়ুন আপনার অসাধারণ। ফিটনেস বেছে নিন। বিশেষজ্ঞ প্রশিক্ষক, শীর্ষ মানের সরঞ্জাম এবং একটি সমৃদ্ধশালী কমিউনিটির সঙ্গে আপনার সম্ভাবনা উন্মোচন করুন।</p>','আমার সাথে প্রশিক্ষণ শুরু করুন','2024-06-05 21:35:11','2024-11-03 00:26:57'),(3,1,'ar','فيتنس','حول اللياقة البدنية','<p>مع أكثر من 4100 مقطع فيديو وتأملات لتدريب GYM عبر الإنترنت، ستجد شيئًا يناسب حالتك المزاجية.</p>\r\n<p>مع أكثر من 4100 مقطع فيديو وتأملات لتدريب GYM عبر الإنترنت، ستجد شيئًا يناسب حالتك المزاجية وجدولك الزمني وطاقتك. كن مرنًا مع العضوية الشهرية - أول 04 أيام لك مجانية أو وفّر من خلال العضوية السنوية.</p>','مزيد من التفاصيل','لماذا تختارنا؟','<p>تخلص من المألوف، وانحت ما هو غير عادي. اختر فيتنس. أطلق العنان لإمكانياتك مع مدربين خبراء ومعدات عالية المستوى ومجتمع مزدهر.</p>','مزيد من التفاصيل','اللياقة البدنية تدعمك','<p>مع أكثر من 4100 مقطع فيديو وتأملات لتدريب GYM عبر الإنترنت، ستجد شيئًا يناسب حالتك المزاجية.</p>\r\n<p>مع أكثر من 4100 مقطع فيديو وتأملات لتدريب GYM عبر الإنترنت، ستجد شيئًا يناسب حالتك المزاجية وجدولك الزمني وطاقتك. كن مرنًا مع العضوية الشهرية - أول 04 أيام لك مجانية أو وفّر من خلال العضوية السنوية.</p>','مزيد من التفاصيل','ممارسة  الجسم والعقل ','<p>تخلص من المألوف، وانحت ما هو غير عادي. اختر فيتنس. أطلق العنان لإمكانياتك مع مدربين خبراء ومعدات عالية المستوى ومجتمع مزدهر.</p>','ابدأ التدريب معي ','2024-08-26 01:01:41','2024-08-26 07:35:29');
/*!40000 ALTER TABLE `about_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `about_us_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `choose_us_image_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `choose_us_image_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `choose_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `choose_us_button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_us_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_us_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_us_button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `exercise_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exercise_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `team_status` tinyint(1) NOT NULL DEFAULT '1',
  `team_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `testimonial_status` tinyint(1) NOT NULL DEFAULT '1',
  `testimonial_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'uploads/custom-images/wsus-img-2024-06-06-03-35-12-4629.png',NULL,1,'uploads/custom-images/wsus-img-2024-06-06-03-44-43-7415.png',NULL,1,NULL,'uploads/custom-images/wsus-img-2024-06-06-03-47-13-5227.jpg','https://youtu.be/dOFZq66cGBs?si=TtJ4iKjmYRuaexyt','#',1,'uploads/custom-images/wsus-img-2024-06-06-03-48-23-5008.png',1,1,'uploads/custom-images/wsus-img-2024-06-06-03-49-37-7372.jpg',1,'uploads/custom-images/wsus-img-2024-06-06-03-51-33-7681.png','2024-06-05 21:35:11','2024-06-06 00:06:59');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'2024-06-03 21:38:53','2024-06-03 21:38:53'),(2,'2024-06-03 21:39:19','2024-06-03 21:39:19'),(3,'2024-08-15 01:04:50','2024-08-15 01:04:50'),(4,'2024-08-15 01:05:08','2024-08-15 01:05:08'),(5,'2024-08-15 01:05:25','2024-08-15 01:05:25'),(6,'2024-08-15 01:05:43','2024-08-15 01:05:43'),(7,'2024-08-15 01:06:02','2024-08-15 01:06:02'),(8,'2024-08-15 01:06:37','2024-08-15 01:06:37'),(9,'2024-08-15 01:06:57','2024-08-15 01:06:57'),(10,'2024-08-15 01:07:26','2024-08-15 01:07:26'),(11,'2024-08-15 01:07:52','2024-08-15 01:07:52'),(12,'2024-08-15 01:08:32','2024-08-15 01:08:32'),(13,'2024-08-15 01:08:57','2024-08-15 01:08:57'),(14,'2024-08-15 01:09:19','2024-08-15 01:09:19'),(15,'2024-08-15 01:09:43','2024-08-15 01:09:43'),(16,'2024-08-15 01:10:20','2024-08-15 01:10:20');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_translations`
--

DROP TABLE IF EXISTS `activity_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_translations_activity_id_foreign` (`activity_id`),
  CONSTRAINT `activity_translations_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `activity_translations`
--

LOCK TABLES `activity_translations` WRITE;
/*!40000 ALTER TABLE `activity_translations` DISABLE KEYS */;
INSERT INTO `activity_translations` VALUES (1,1,'en','Push up','2024-06-03 21:38:53','2024-06-03 21:38:53'),(2,1,'bn','পুশ আপ','2024-06-03 21:38:54','2024-11-02 22:36:34'),(3,2,'en','Workout','2024-06-03 21:39:19','2024-06-03 21:39:19'),(4,2,'bn','ওয়ার্কআউট','2024-06-03 21:39:19','2024-11-02 22:37:03'),(5,3,'en','Jogging','2024-08-15 01:04:50','2024-08-15 01:04:50'),(6,3,'bn','জগিং','2024-08-15 01:04:50','2024-11-02 22:37:36'),(7,4,'en','Cycling','2024-08-15 01:05:08','2024-08-15 01:05:08'),(8,4,'bn','সাইক্লিং','2024-08-15 01:05:08','2024-11-02 22:37:55'),(9,5,'en','Swimming','2024-08-15 01:05:25','2024-08-15 01:05:25'),(10,5,'bn','সাঁতার','2024-08-15 01:05:25','2024-11-02 22:38:13'),(11,6,'en','Rowing','2024-08-15 01:05:43','2024-08-15 01:05:43'),(12,6,'bn','রোয়িং','2024-08-15 01:05:43','2024-11-02 22:38:34'),(13,7,'en','Jump Rope','2024-08-15 01:06:02','2024-08-15 01:06:02'),(14,7,'bn','দড়ি লাফ','2024-08-15 01:06:02','2024-11-02 22:39:31'),(15,8,'en','Elliptical Training','2024-08-15 01:06:37','2024-08-15 01:06:37'),(16,8,'bn','উপবৃত্তাকার প্রশিক্ষণ','2024-08-15 01:06:37','2024-11-02 22:44:21'),(17,9,'en','Stair Climbing','2024-08-15 01:06:57','2024-08-15 01:06:57'),(18,9,'bn','সিঁড়ি আরোহণ','2024-08-15 01:06:57','2024-11-02 22:44:40'),(19,10,'en','Zumba','2024-08-15 01:07:26','2024-08-15 01:07:26'),(20,10,'bn','জুম্বা','2024-08-15 01:07:26','2024-11-02 22:45:00'),(21,11,'en','Weightlifting','2024-08-15 01:07:52','2024-08-15 01:07:52'),(22,11,'bn','ভারোত্তোলন','2024-08-15 01:07:52','2024-11-02 22:45:21'),(23,12,'en','Bodyweight','2024-08-15 01:08:32','2024-08-15 01:08:32'),(24,12,'bn','শরীরের ওজন','2024-08-15 01:08:32','2024-11-02 22:45:38'),(25,13,'en','Kettlebell','2024-08-15 01:08:57','2024-08-15 01:08:57'),(26,13,'bn','কেটলবেল','2024-08-15 01:08:57','2024-11-02 22:45:58'),(27,14,'en','CrossFit','2024-08-15 01:09:19','2024-08-15 01:09:19'),(28,14,'bn','ক্রসফিট','2024-08-15 01:09:19','2024-11-02 22:46:13'),(29,15,'en','Rock Climbing','2024-08-15 01:09:43','2024-08-15 01:09:43'),(30,15,'bn','রক ক্লাইম্বিং','2024-08-15 01:09:43','2024-11-02 22:46:28'),(31,16,'en','Breathing Exercises','2024-08-15 01:10:20','2024-08-15 01:10:20'),(32,16,'bn','শ্বাস-প্রশ্বাসের ব্যায়াম','2024-08-15 01:10:20','2024-11-02 22:46:51'),(33,1,'ar','تمرين الضغط','2024-08-26 01:01:40','2024-08-26 02:29:43'),(34,2,'ar','التمارين','2024-08-26 01:01:40','2024-08-26 02:30:24'),(35,3,'ar','الجري الخفيف','2024-08-26 01:01:40','2024-08-26 02:31:05'),(36,4,'ar','ركوب الدراجات','2024-08-26 01:01:40','2024-08-26 02:31:39'),(37,5,'ar','السباحة','2024-08-26 01:01:40','2024-08-26 02:32:14'),(38,6,'ar','التجديف','2024-08-26 01:01:40','2024-08-26 02:33:28'),(39,7,'ar','ط الحبل','2024-08-26 01:01:40','2024-08-26 02:34:03'),(40,8,'ar','التدريب على جهاز المشي البيضاوي','2024-08-26 01:01:40','2024-08-26 02:34:56'),(41,9,'ar','صعود الدرج','2024-08-26 01:01:40','2024-08-26 02:35:49'),(42,10,'ar','رقص الزومبا','2024-08-26 01:01:40','2024-08-26 02:36:31'),(43,11,'ar','رفع الأثقال','2024-08-26 01:01:40','2024-08-26 02:37:09'),(44,12,'ar','وزن الجسم','2024-08-26 01:01:40','2024-08-26 02:37:45'),(45,13,'ar','دمبل الجرس','2024-08-26 01:01:40','2024-08-26 02:38:37'),(46,14,'ar','تمارين كروس فيت','2024-08-26 01:01:40','2024-08-26 02:39:13'),(47,15,'ar','تسلق الصخور','2024-08-26 01:01:40','2024-08-26 02:39:50'),(48,16,'ar','تمارين التنفس','2024-08-26 01:01:40','2024-08-26 02:40:25');
/*!40000 ALTER TABLE `activity_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `walk_in_customer` tinyint(1) DEFAULT NULL,
  `type` enum('home','office') DEFAULT 'home',
  `default` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (3,2,'600 E Northern Lights Blvd','Zia','Avery','+1 (511) 943-9004','kewimy@mailinator.com','1','1',NULL,'86777',NULL,'office',NULL,'2024-06-03 03:48:42','2024-10-28 00:25:21'),(4,22,'Park Street','User','Name','+1 (646) 834-7059',NULL,'1','1',NULL,'19990',NULL,'office',NULL,'2024-08-25 22:08:26','2024-08-25 22:08:26'),(5,22,'Park Street 2','Dara','Silva','+1 (424) 972-3164',NULL,'1','1',NULL,'81358',NULL,'home',NULL,'2024-08-25 22:10:17','2024-08-25 22:10:17'),(6,22,'3, Park Street','Devin','Hunter','+1 (726) 773-1883',NULL,'1','1',NULL,'28946',NULL,'office',NULL,'2024-08-25 22:11:42','2024-08-25 22:11:42'),(7,22,'4, Jhon Street','Renee','Hutchinson','+1 (821) 684-7435',NULL,'1','1',NULL,'45581',NULL,'office',NULL,'2024-08-25 22:12:29','2024-08-25 22:12:29'),(8,3,'3594 Havanna Street','Rachel','Hull','+1 (564) 205-2579','gityc@mailinator.com','1','1',NULL,'68797',NULL,'home',NULL,'2024-08-26 01:11:52','2024-08-26 01:11:52'),(9,3,'2408 Tenmile Road','Vielka','Frazier','+1 (122) 142-4725',NULL,'1','1',NULL,'80427',NULL,'home',NULL,'2024-08-26 01:12:24','2024-08-26 01:12:24'),(10,3,'4123 Tecumsah Lane','Rina','Herring','+1 (641) 329-4033',NULL,'1','1',NULL,'32399',NULL,'home',NULL,'2024-08-26 01:12:56','2024-08-26 01:12:56'),(11,3,'1090 Lilac Lane','Griffith','Reynolds','+1 (755) 976-9676',NULL,'1','1',NULL,'66627',NULL,'home',NULL,'2024-08-26 01:13:57','2024-08-26 01:13:57'),(12,24,'4275 Hide A Way Road','Garth','Vernon','407-968-4829',NULL,'1','1',NULL,NULL,NULL,'home',NULL,'2024-10-09 02:05:20','2024-10-09 02:05:20');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_super_admin` tinyint(1) DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forget_password_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com',1,'uploads/website-images/admin.jpg','$2y$12$UaVLrVxMH2jaLS1qiN.qRumjdfrACf4rN4aGWpyiWVp.6CGjj/Dpe','active','2024-06-02 05:31:06','2024-11-23 00:07:57','ImOSGR8U2O05nj790sLNnnMDEO38pzIOF40JOzgNWmDTLZfuWFfPbXAS4P2hxWARXLorbDsG9zKwliry1vyTt8YiRGnBwfkZ48j4','wNe7BjkLdn9ntorCbMxiO9uOavH6iGcXxUsAibf6RSRMUnUmAppHa88F6ppy'),(2,'New Staff','staff@gmail.com',0,NULL,'$2y$12$6Vu4/k0e7.qdPo5jEjWySe/I1MsqIpNwvOuvgCCJu6/XnPFSZEuVW','active','2024-10-16 22:04:04','2024-10-16 22:04:04',NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint unsigned DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent','late') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` VALUES (1,1,NULL,NULL,'2024-11-28','absent','2024-11-28 07:03:37','2024-11-28 07:08:56'),(2,2,NULL,NULL,'2024-11-28','present','2024-11-28 07:06:16','2024-11-28 07:06:16'),(3,1,NULL,NULL,'2024-12-01','absent','2024-11-30 21:31:39','2024-12-01 06:36:19'),(4,2,NULL,NULL,'2024-12-01','absent','2024-11-30 21:31:45','2024-12-01 04:55:40'),(5,3,NULL,NULL,'2024-12-01','absent','2024-11-30 21:32:09','2024-12-01 04:55:40'),(6,5,NULL,NULL,'2024-12-01','absent','2024-11-30 21:47:21','2024-12-01 04:55:40'),(7,6,NULL,NULL,'2024-12-01','absent','2024-11-30 21:47:21','2024-12-01 04:55:40'),(8,7,NULL,NULL,'2024-12-01','absent','2024-11-30 21:47:21','2024-12-01 04:55:40'),(9,8,NULL,NULL,'2024-12-01','absent','2024-11-30 21:48:02','2024-12-01 04:55:40'),(10,9,NULL,NULL,'2024-12-01','absent','2024-11-30 21:48:02','2024-12-01 04:55:40'),(11,10,NULL,NULL,'2024-12-01','absent','2024-11-30 21:48:02','2024-12-01 04:55:40'),(12,11,NULL,NULL,'2024-12-01','absent','2024-11-30 21:48:02','2024-12-01 04:55:40'),(13,13,NULL,NULL,'2024-12-01','absent','2024-11-30 21:48:02','2024-12-01 04:55:40'),(14,14,NULL,NULL,'2024-12-01','absent','2024-11-30 21:48:02','2024-12-01 04:55:40'),(15,1,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(16,2,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(17,3,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(18,5,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(19,6,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(20,7,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(21,8,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(22,9,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(23,10,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(24,11,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(25,13,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(26,14,NULL,NULL,'2024-11-03','present','2024-12-01 00:06:38','2024-12-01 00:06:38'),(27,1,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(28,2,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(29,3,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(30,5,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(31,6,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(32,7,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(33,8,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(34,9,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(35,10,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:05','2024-12-01 00:07:20'),(36,11,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:06','2024-12-01 00:07:20'),(37,13,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:06','2024-12-01 00:07:20'),(38,14,NULL,NULL,'2024-11-04','absent','2024-12-01 00:07:06','2024-12-01 00:07:20'),(39,1,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(40,2,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(41,3,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(42,5,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(43,6,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(44,7,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(45,8,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(46,9,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(47,10,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(48,11,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(49,13,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(50,14,NULL,NULL,'2024-11-05','present','2024-12-01 00:07:42','2024-12-01 00:07:42'),(51,1,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(52,2,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(53,3,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(54,5,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(55,6,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(56,7,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(57,8,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(58,9,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(59,10,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(60,11,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(61,13,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(62,14,NULL,NULL,'2024-11-06','present','2024-12-01 00:07:59','2024-12-01 00:07:59'),(63,1,NULL,NULL,'2024-11-02','present','2024-12-01 00:41:49','2024-12-01 00:41:49'),(64,2,NULL,NULL,'2024-11-02','present','2024-12-01 00:45:25','2024-12-01 00:45:25'),(65,3,NULL,NULL,'2024-11-02','present','2024-12-01 00:59:28','2024-12-01 00:59:28'),(66,5,NULL,NULL,'2024-11-02','present','2024-12-01 01:01:37','2024-12-01 01:01:37'),(67,6,NULL,NULL,'2024-11-02','present','2024-12-01 01:01:50','2024-12-01 01:01:50'),(68,1,NULL,NULL,'2024-12-02','absent','2024-12-01 01:19:17','2024-12-01 01:19:32'),(69,1,NULL,NULL,'2024-11-07','present','2024-12-01 06:38:42','2024-12-01 06:38:42'),(70,11,NULL,NULL,'2024-11-10','present','2024-12-01 06:38:54','2024-12-01 06:38:54'),(71,6,NULL,NULL,'2024-11-08','present','2024-12-01 06:43:47','2024-12-01 06:43:47');
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_values`
--

DROP TABLE IF EXISTS `attribute_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `has_thumbnail` tinyint(1) DEFAULT '0',
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `attribute_id` bigint unsigned NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_values_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `attribute_values`
--

LOCK TABLES `attribute_values` WRITE;
/*!40000 ALTER TABLE `attribute_values` DISABLE KEYS */;
INSERT INTO `attribute_values` VALUES (1,'Red',0,NULL,1,1,NULL,'2024-06-02 22:35:07','2024-06-02 22:35:07'),(2,'Green',0,NULL,1,1,NULL,'2024-06-02 22:35:07','2024-06-02 22:35:07'),(3,'Blue',0,NULL,1,1,NULL,'2024-06-02 22:35:07','2024-06-02 22:35:07'),(4,'xs',0,NULL,2,1,NULL,'2024-06-02 22:36:05','2024-06-02 22:36:05'),(5,'sm',0,NULL,2,1,NULL,'2024-06-02 22:36:05','2024-06-02 22:36:05'),(6,'md',0,NULL,2,1,NULL,'2024-06-02 22:36:05','2024-06-02 22:36:05'),(7,'lg',0,NULL,2,1,NULL,'2024-06-02 22:36:05','2024-06-02 22:36:05');
/*!40000 ALTER TABLE `attribute_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'Color','color',1,'2024-06-02 22:35:07','2024-06-02 22:35:07',NULL),(2,'Size','size',1,'2024-06-02 22:36:05','2024-06-02 22:36:05',NULL);
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `awards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date NOT NULL,
  `type` enum('winner','runner_up','participation') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `awards`
--

LOCK TABLES `awards` WRITE;
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
INSERT INTO `awards` VALUES (1,'Fitness Achievement Awards',NULL,'128','2024-08-13','winner',1,1,'2024-08-15 04:09:38','2024-08-15 04:09:38'),(2,'Participation and Engagement Awards',NULL,'129','2024-05-08','participation',1,1,'2024-08-15 04:10:50','2024-08-15 04:10:50'),(3,'Ironman Award',NULL,'142','2023-05-14','winner',1,1,'2024-09-05 22:14:44','2024-09-05 22:14:44'),(4,'Endurance Champion',NULL,'143','2020-06-16','runner_up',1,1,'2024-09-05 22:16:08','2024-09-05 22:16:08'),(5,'Gym Enthusiast of the Year',NULL,'144','2022-04-01','winner',1,1,'2024-09-05 22:17:07','2024-09-05 22:17:07');
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banned_histories`
--

DROP TABLE IF EXISTS `banned_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banned_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reasone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `banned_histories`
--

LOCK TABLES `banned_histories` WRITE;
/*!40000 ALTER TABLE `banned_histories` DISABLE KEYS */;
INSERT INTO `banned_histories` VALUES (1,2,'Vitae aliquip nobis','for_banned','Sint nihil et simili','2024-06-04 06:12:43','2024-06-04 06:12:43'),(2,2,NULL,'for_unbanned',NULL,'2024-06-04 06:39:39','2024-06-04 06:39:39');
/*!40000 ALTER TABLE `banned_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basic_payments`
--

DROP TABLE IF EXISTS `basic_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basic_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `basic_payments`
--

LOCK TABLES `basic_payments` WRITE;
/*!40000 ALTER TABLE `basic_payments` DISABLE KEYS */;
INSERT INTO `basic_payments` VALUES (1,'stripe_key','pk_test_33mdngCLuLsmECXOe8mbde9f00pZGT4uu9','2024-06-02 05:30:39','2024-12-01 03:21:41'),(2,'stripe_secret','sk_test_MroTZzRZRv2KJ9Hmaro73SE800UOR90Q9u','2024-06-02 05:30:39','2024-12-01 03:21:41'),(3,'stripe_currency_id','1','2024-06-02 05:30:39','2024-12-01 03:21:41'),(4,'stripe_status','active','2024-06-02 05:30:39','2024-12-01 03:21:41'),(5,'stripe_charge','0','2024-06-02 05:30:39','2024-12-01 03:21:41'),(6,'stripe_image','uploads/website-images/stripe.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(7,'paypal_client_id','AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy','2024-06-02 05:30:39','2024-12-01 03:21:18'),(8,'paypal_secret_key','EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn','2024-06-02 05:30:39','2024-12-01 03:21:18'),(9,'paypal_account_mode','sandbox','2024-06-02 05:30:39','2024-12-01 03:21:18'),(10,'paypal_currency_id','1','2024-06-02 05:30:39','2024-12-01 03:21:18'),(11,'paypal_charge','0','2024-06-02 05:30:39','2024-12-01 03:21:18'),(12,'paypal_status','active','2024-06-02 05:30:39','2024-12-01 03:21:18'),(13,'paypal_image','uploads/website-images/paypal.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(14,'bank_information','Bank Name => Your bank name\r\nAccount Number =>  Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','2024-06-02 05:30:39','2024-12-01 03:22:04'),(15,'bank_status','active','2024-06-02 05:30:39','2024-12-01 03:22:04'),(16,'bank_image','uploads/website-images/bank-pay.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(17,'bank_charge','0','2024-06-02 05:30:39','2024-12-01 03:22:04'),(18,'bank_currency_id','1','2024-06-02 05:30:39','2024-12-01 03:22:04'),(19,'paypal_app_id','paypal_app_id',NULL,NULL);
/*!40000 ALTER TABLE `basic_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `parent_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'workout-plans',1,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(2,'healthy-eating',2,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(3,'mental-toughness',3,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(4,'weight-loss',4,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(5,'strength-training',5,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(6,'beginner-fitness',6,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(7,'yoga-practice',7,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(8,'sports-conditioning',8,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(9,'injury-prevention',9,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(10,'fitness-tech',10,NULL,1,'2024-08-13 02:51:18','2024-08-13 02:51:18');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_category_translations`
--

DROP TABLE IF EXISTS `blog_category_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_category_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_category_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_category_translations_blog_category_id_foreign` (`blog_category_id`),
  CONSTRAINT `blog_category_translations_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_category_translations`
--

LOCK TABLES `blog_category_translations` WRITE;
/*!40000 ALTER TABLE `blog_category_translations` DISABLE KEYS */;
INSERT INTO `blog_category_translations` VALUES (1,1,'en','Workout Plans',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(2,1,'bn','ওয়ার্কআউট পরিকল্পনা',NULL,'2024-08-13 02:51:18','2024-11-03 00:32:05'),(3,2,'en','Healthy Eating',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(4,2,'bn','স্বাস্থ্যকর খাওয়া',NULL,'2024-08-13 02:51:18','2024-11-03 00:32:21'),(5,3,'en','Mental Toughness',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(6,3,'bn','মানসিক দৃঢ়তা',NULL,'2024-08-13 02:51:18','2024-11-03 00:32:38'),(7,4,'en','Weight Loss',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(8,4,'bn','ওজন হ্রাস',NULL,'2024-08-13 02:51:18','2024-11-03 00:33:00'),(9,5,'en','Strength Training',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(10,5,'bn','স্ট্রেংথ ট্রেনিং',NULL,'2024-08-13 02:51:18','2024-11-03 00:33:18'),(11,6,'en','Beginner Fitness',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(12,6,'bn','শিক্ষানবিস ফিটনেস',NULL,'2024-08-13 02:51:18','2024-11-03 00:33:35'),(13,7,'en','Yoga Practice',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(14,7,'bn','যোগব্যায়াম অনুশীলন',NULL,'2024-08-13 02:51:18','2024-11-03 00:34:01'),(15,8,'en','Sports Conditioning',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(16,8,'bn','ক্রীড়া কন্ডিশনিং',NULL,'2024-08-13 02:51:18','2024-11-03 00:34:21'),(17,9,'en','Injury Prevention',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(18,9,'bn','আঘাত প্রতিরোধ',NULL,'2024-08-13 02:51:18','2024-11-03 00:34:40'),(19,10,'en','Fitness Tech',NULL,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(20,10,'bn','ফিটনেস টেক',NULL,'2024-08-13 02:51:18','2024-11-03 00:34:58'),(21,1,'ar','Workout Plans',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(22,2,'ar','Healthy Eating',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(23,3,'ar','Mental Toughness',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(24,4,'ar','Weight Loss',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(25,5,'ar','Strength Training',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(26,6,'ar','Beginner Fitness',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(27,7,'ar','Yoga Practice',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(28,8,'ar','Sports Conditioning',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(29,9,'ar','Injury Prevention',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38'),(30,10,'ar','Fitness Tech',NULL,'2024-08-26 01:01:38','2024-08-26 01:01:38');
/*!40000 ALTER TABLE `blog_category_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_translations`
--

DROP TABLE IF EXISTS `blog_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_translations`
--

LOCK TABLES `blog_translations` WRITE;
/*!40000 ALTER TABLE `blog_translations` DISABLE KEYS */;
INSERT INTO `blog_translations` VALUES (1,1,'en','Full-Body Circuit Workout','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Full-Body Circuit Workout','Full-Body Circuit Workout','2024-08-13 02:51:18','2024-10-29 04:13:35'),(2,1,'bn','ফুল-বডি সার্কিট ওয়ার্কআউট','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','ফুল-বডি সার্কিট ওয়ার্কআউট','ফুল-বডি সার্কিট ওয়ার্কআউট','2024-08-13 02:51:18','2024-11-03 00:39:58'),(3,2,'en','Bodyweight Strength Training','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Bodyweight Strength Training','Bodyweight Strength Training','2024-08-13 02:51:18','2024-10-29 04:13:19'),(4,2,'bn','বডিওয়েট স্ট্রেংথ ট্রেনিং','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','বডিওয়েট স্ট্রেংথ ট্রেনিং','বডিওয়েট স্ট্রেংথ ট্রেনিং','2024-08-13 02:51:18','2024-11-03 00:39:31'),(5,3,'en','Beginner’s Cardio Routine','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Beginner’s Cardio Routine','Beginner’s Cardio Routine','2024-08-13 02:51:18','2024-10-29 04:13:02'),(6,3,'bn','শিক্ষানবিস কার্ডিও রুটিন','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','শিক্ষানবিস কার্ডিও রুটিন','শিক্ষানবিস কার্ডিও রুটিন','2024-08-13 02:51:18','2024-11-03 00:38:54'),(7,4,'en','Beginner’s Strength Training Routine','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Beginner’s Strength Training Routine','Beginner’s Strength Training Routine','2024-08-13 02:51:18','2024-10-29 04:12:37'),(8,4,'bn','শিক্ষানবিস স্ট্রেংথ ট্রেনিং রুটিন','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','শিক্ষানবিস স্ট্রেংথ ট্রেনিং রুটিন','শিক্ষানবিস স্ট্রেংথ ট্রেনিং রুটিন','2024-08-13 02:51:18','2024-11-03 00:38:19'),(9,5,'en','Beginner’s Strength Training with Dumbbells','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Beginner’s Strength Training with Dumbbells','Beginner’s Strength Training with Dumbbells','2024-08-13 02:51:18','2024-10-29 04:12:19'),(10,5,'bn','ডাম্বেলের সাথে শিক্ষানবিস স্ট্রেংথ ট্রেনিং','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','ডাম্বেলের সাথে শিক্ষানবিস স্ট্রেংথ ট্রেনিং','ডাম্বেলের সাথে শিক্ষানবিস স্ট্রেংথ ট্রেনিং','2024-08-13 02:51:18','2024-11-03 00:37:57'),(11,6,'en','Beginner’s Strength Training with Kettlebells','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Beginner’s Strength Training with Kettlebells','Beginner’s Strength Training with Kettlebells','2024-08-13 02:51:18','2024-10-29 04:12:03'),(12,6,'bn','Kettlebells সঙ্গে শিক্ষানবিস শক্তি প্রশিক্ষণ','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','Kettlebells সঙ্গে শিক্ষানবিস শক্তি প্রশিক্ষণ','Kettlebells সঙ্গে শিক্ষানবিস শক্তি প্রশিক্ষণ','2024-08-13 02:51:18','2024-11-03 00:37:36'),(13,7,'en','Fuel Your Body for Optimal Health','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Fuel Your Body for Optimal Health','Fuel Your Body for Optimal Health','2024-08-13 02:51:19','2024-10-29 04:11:48'),(14,7,'bn','সর্বোত্তম স্বাস্থ্যের জন্য আপনার শরীরকে জ্বালানী দিন','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','সর্বোত্তম স্বাস্থ্যের জন্য আপনার শরীরকে জ্বালানী দিন','সর্বোত্তম স্বাস্থ্যের জন্য আপনার শরীরকে জ্বালানী দিন','2024-08-13 02:51:19','2024-11-03 00:37:11'),(15,8,'en','Understanding the Role of Fiber','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Understanding the Role of Fiber in a Healthy Diet','Understanding the Role of Fiber in a Healthy Diet','2024-08-13 02:51:19','2024-10-29 04:10:16'),(16,8,'bn','একটি স্বাস্থ্যকর ডায়েটে ফাইবারের ভূমিকা বোঝা','<p>ফাইবারকে প্রায়ই একটি স্বাস্থ্যকর খাদ্যের মূল উপাদান হিসেবে বিবেচনা করা হয়, তবুও অনেকেই এর উপকারিতা এবং দৈনন্দিন খাবারে কীভাবে এটি অন্তর্ভুক্ত করবেন তা সম্পর্কে স্পষ্ট নন। এই অপরিহার্য পুষ্টি উপাদানটি হজম স্বাস্থ্যে, ওজন নিয়ন্ত্রণে, এবং সামগ্রিক সুস্থতায় গুরুত্বপূর্ণ ভূমিকা পালন করে। এই ব্লগে, আমরা বিভিন্ন ধরণের ফাইবার, তাদের উপকারিতা, এবং ফাইবারের পরিমাণ বাড়ানোর কিছু কার্যকরী উপায় নিয়ে আলোচনা করবো।</p>\r\n<p>ফাইবারকে প্রধানত দুই ধরনের ভাগে ভাগ করা হয়েছে: দ্রবণীয় এবং অদ্রবণীয়, প্রতিটির নিজস্ব কিছু বিশেষ উপকারিতা রয়েছে। দ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয়ে জেল-এর মতো একটি পদার্থ তৈরি করে। এটি রক্তে কোলেস্টেরল কমাতে এবং রক্তের শর্করা স্থিতিশীল রাখতে সহায়তা করতে পারে। এর সাধারণ উৎসের মধ্যে রয়েছে ওটস, বার্লি, বিনস, ডাল, আপেল, কমলা, এবং গাজর।</p>\r\n<p>অদ্রবণীয় ফাইবার পানিতে দ্রবীভূত হয় না। এটি মলের পরিমাণ বাড়ায় এবং খাবার হজমপথ দিয়ে চলতে সহায়তা করে। এর উৎসের মধ্যে রয়েছে সম্পূর্ণ শস্য, গমের ভূষি, বাদাম, এবং ফুলকপি ও আলু সহ বিভিন্ন শাকসবজি।</p>','একটি স্বাস্থ্যকর ডায়েটে ফাইবারের ভূমিকা বোঝা','একটি স্বাস্থ্যকর ডায়েটে ফাইবারের ভূমিকা বোঝা','2024-08-13 02:51:19','2024-11-03 00:36:45'),(17,9,'en','A Guide to Making Healthier Choices','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','A Guide to Making Healthier Choices','A Guide to Making Healthier Choices','2024-08-13 02:51:19','2024-10-29 04:10:37'),(18,9,'bn','A Guide to Making Healthier Choices','\n                Introduction\nFood labels can be a valuable tool in making informed dietary choices, but they can also be confusing with their technical jargon and numbers. Understanding how to read and interpret food labels is crucial for maintaining a healthy diet and making better food choices. This guide will break down the essential components of food labels and offer tips for navigating them effectively.\n\nKey Components of Food Labels\nServing Size\n\nDefinition: The serving size indicates the amount of food that is considered one serving. It is crucial for understanding nutritional information.\nTip: Compare the serving size to the amount you actually consume to gauge the calories and nutrients you’re ingesting.\nCalories\n\nDefinition: Calories represent the amount of energy provided by one serving of the food.\nTip: Pay attention to the number of calories per serving to manage your energy intake. Be mindful of portion sizes to avoid overconsumption.\nNutritional Breakdown\n\nFats:\nTypes: Labels typically list total fat, saturated fat, and trans fat.\nTip: Choose products with lower saturated and trans fats to promote heart health.\nCholesterol:\nDefinition: Cholesterol is a type of fat found in animal products.\nTip: Opt for foods lower in cholesterol to maintain healthy blood cholesterol levels.\nSodium:\nDefinition: Sodium is a component of salt that can impact blood pressure.\nTip: Limit sodium intake to support cardiovascular health. Aim for less than 2,300 mg of sodium per day.\nCarbohydrates:\nTypes: Labels often list total carbohydrates, dietary fiber, and sugars.\nTip: Choose foods high in fiber and low in added sugars to support digestive health and stable blood sugar levels.\nProteins:\nDefinition: Proteins are essential for muscle repair and overall bodily functions.\nTip: Include a variety of protein sources, such as lean meats, dairy, legumes, and nuts.\nVitamins and Minerals\n\nDefinition: Labels list vitamins and minerals like vitamin A, vitamin C, calcium, and iron.\nTip: Ensure you’re getting adequate amounts of these essential nutrients to support overall health.\nIngredients List\n\nDefinition: The ingredients list shows all the components of the food product in descending order by weight.\nTip: Look for whole, recognizable ingredients. Avoid products with excessive added sugars, artificial additives, and preservatives.\nPercent Daily Values (%DV)\n\nDefinition: %DV shows how much a nutrient in a serving of food contributes to a daily diet based on a 2,000-calorie reference.\nTip: Use %DV to determine if a food product is high or low in specific nutrients. For example, a %DV of 20% or more is considered high.\nTips for Making Healthier Choices\nFocus on Whole Foods\n\nPreference: Opt for foods with minimal processing and natural ingredients. Whole fruits, vegetables, grains, and lean proteins are healthier choices.\nBeware of Health Claims\n\nUnderstanding Claims: Be cautious of labels with claims such as “low fat” or “sugar-free,” as they may still contain unhealthy ingredients. Always check the full nutritional information.\nCompare Products\n\nComparison: When shopping, compare different brands and products to find the one with the best nutritional profile.\nPortion Control\n\nServing Size Awareness: Be aware of the serving size to avoid consuming more calories or nutrients than you intended.\nEducate Yourself\n\nNutritional Knowledge: Take time to learn about different nutrients and their roles in your diet. This knowledge will help you make more informed food choices.\nBalance and Moderation\n\nHealthy Eating: Focus on balancing your diet with a variety of foods. Moderation is key to maintaining a healthy eating pattern without depriving yourself.','A Guide to Making Healthier Choices','A Guide to Making Healthier Choices','2024-08-13 02:51:19','2024-08-13 02:51:19'),(19,10,'en','Why You Should Incorporate It','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Why You Should Incorporate It Into Your Routine','Why You Should Incorporate It Into Your Routine','2024-08-13 02:51:19','2024-10-29 04:10:53'),(20,10,'bn','Why You Should Incorporate It Into Your Routine','\n                    Introduction\nHigh-Intensity Interval Training (HIIT) has gained immense popularity in recent years, and for good reason. This form of exercise alternates between short bursts of intense activity and periods of rest or low-intensity activity. HIIT is known for its efficiency, allowing you to burn calories, improve cardiovascular health, and build strength in a shorter amount of time than traditional workouts. In this blog, we’ll delve into the benefits of HIIT, how it works, and tips for getting started.\n\nWhat is High-Intensity Interval Training (HIIT)?\nHIIT is a type of cardiovascular exercise strategy that involves short, intense bursts of anaerobic exercise followed by recovery periods. These workouts typically last between 10 to 30 minutes, making them ideal for those with busy schedules. The intensity and variability of HIIT not only make it an effective workout but also keep it engaging.\n\nThe Science Behind HIIT\nHIIT is effective due to the high demand it places on the body during short bursts of intense exercise. During these bursts, your heart rate increases significantly, and your body taps into anaerobic energy systems, which do not require oxygen but rather glycogen stored in muscles for energy. This process helps to burn a significant amount of calories, both during and after the workout, due to the excess post-exercise oxygen consumption (EPOC) effect, often referred to as the \"afterburn.\"\n\nBenefits of HIIT\nTime Efficiency\n\nShort Workouts, Big Results: One of the most significant benefits of HIIT is its efficiency. You can achieve substantial fitness gains in as little as 20 minutes. This is especially appealing for those with tight schedules who struggle to find time for longer workouts.\nFlexibility: HIIT can be done almost anywhere and with minimal equipment. Whether you’re at home, in a gym, or even outdoors, you can customize your HIIT routine to fit your environment.\nCalorie and Fat Burning\n\nHigh Caloric Burn: HIIT is incredibly effective for burning calories in a short amount of time. The intense bursts of activity elevate your heart rate and metabolism, leading to higher calorie expenditure during the workout.\nAfterburn Effect: The EPOC effect ensures that your body continues to burn calories even after the workout has ended. This prolonged calorie burn can aid in fat loss, making HIIT a powerful tool for those looking to lose weight.\nImproved Cardiovascular Health\n\nHeart Health: HIIT has been shown to improve cardiovascular health by increasing both aerobic and anaerobic endurance. The intense nature of the intervals challenges the heart and lungs, leading to better heart function and circulation.\nLowered Blood Pressure: Regular HIIT workouts can help lower blood pressure, improving overall cardiovascular health and reducing the risk of heart disease.\nIncreased Metabolic Rate\n\nBoosted Metabolism: The high intensity of HIIT workouts can increase your metabolic rate for hours after the workout. This means your body continues to burn calories even at rest, aiding in weight management and fat loss.\nImproved Insulin Sensitivity: HIIT has been shown to improve insulin sensitivity, which helps the muscles better use glucose for energy and reduces the risk of developing type 2 diabetes.\nMuscle Building and Retention\n\nPreservation of Lean Muscle Mass: Unlike steady-state cardio, which can sometimes lead to muscle loss, HIIT helps preserve and even build lean muscle mass while reducing body fat. The high-intensity intervals engage multiple muscle groups, promoting strength and endurance.\nFunctional Fitness: HIIT often involves compound movements like squats, lunges, and push-ups, which mimic everyday activities and improve functional fitness.\nMental Health Benefits\n\nEndorphin Boost: The intensity of HIIT workouts can lead to the release of endorphins, often referred to as the \"feel-good\" hormones. This can result in improved mood and reduced feelings of stress and anxiety.\nMental Toughness: Pushing through the intense intervals of HIIT can also help build mental resilience and discipline, which can translate to other areas of life.\n                ','Why You Should Incorporate It Into Your Routine','Why You Should Incorporate It Into Your Routine','2024-08-13 02:51:19','2024-08-13 02:51:19'),(21,11,'en','Stretch Your Way to Better Health','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','Stretch Your Way to Better Health','Stretch Your Way to Better Health','2024-08-13 02:51:19','2024-10-29 04:11:08'),(22,11,'bn','Stretch Your Way to Better Health','Flexibility training is often overlooked in fitness routines, yet it is an essential component of overall health and wellness. Stretching not only improves your range of motion but also enhances muscle coordination, reduces the risk of injury, and promotes relaxation. Whether you’re an athlete or someone looking to improve their daily function, incorporating flexibility exercises into your routine can yield significant benefits. In this blog, we’ll explore the importance of flexibility training, different types of stretching, and how to incorporate it into your fitness regimen.\n\nWhat is Flexibility?\nFlexibility refers to the ability of your muscles and joints to move through their full range of motion. Good flexibility allows for ease of movement, reduces muscle stiffness, and helps prevent injuries. Flexibility can vary between individuals based on factors like age, gender, and physical activity levels, but it can be improved with consistent practice.\n\nTypes of Stretching\nThere are several types of stretching, each with its own benefits and appropriate uses:\n\nStatic Stretching\n\nDefinition: Static stretching involves holding a stretch for an extended period, usually 15 to 60 seconds, without movement.\nBenefits: This type of stretching is effective for increasing flexibility and is best performed after a workout when muscles are warm.\nExamples: Forward fold, hamstring stretch, and shoulder stretch.\nDynamic Stretching\n\nDefinition: Dynamic stretching involves moving parts of your body through a full range of motion in a controlled manner, gradually increasing the reach or speed of the movement.\nBenefits: Dynamic stretching is ideal for warming up before exercise as it prepares the muscles for activity and improves joint flexibility.\nExamples: Leg swings, arm circles, and walking lunges.\nBallistic Stretching\n\nDefinition: Ballistic stretching involves using momentum to force a body part beyond its normal range of motion.\nCaution: This type of stretching can lead to injury if not done correctly and is generally not recommended for beginners or those with limited flexibility.\nExamples: Bouncing toe touches and rapid arm swings.\nPNF Stretching (Proprioceptive Neuromuscular Facilitation)\n\nDefinition: PNF stretching involves a combination of passive stretching and isometric contractions. Typically, a muscle is stretched, contracted, and then stretched further.\nBenefits: PNF is highly effective for increasing flexibility and is often used in rehabilitation settings.\nExamples: Partner hamstring stretch where one person pushes against the other’s resistance.','Stretch Your Way to Better Health','Stretch Your Way to Better Health','2024-08-13 02:51:19','2024-08-13 02:51:19'),(23,1,'ar','تجريب دائرة كامل الجسم','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Full-Body Circuit Workout','Full-Body Circuit Workout','2024-08-26 01:01:38','2024-10-09 03:09:04'),(24,2,'ar','تدريب قوة وزن الجسم','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Bodyweight Strength Training','Bodyweight Strength Training','2024-08-26 01:01:38','2024-10-09 03:09:35'),(25,3,'ar','روتين القلب للمبتدئين','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Beginner’s Cardio Routine','Beginner’s Cardio Routine','2024-08-26 01:01:38','2024-10-09 03:10:09'),(26,4,'ar','روتين تدريب القوة للمبتدئين','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Beginner’s Strength Training Routine','Beginner’s Strength Training Routine','2024-08-26 01:01:38','2024-10-09 03:10:43'),(27,5,'ar','تدريب القوة للمبتدئين باستخدام الدمبل','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Beginner’s Strength Training with Dumbbells','Beginner’s Strength Training with Dumbbells','2024-08-26 01:01:38','2024-10-09 03:11:06'),(28,6,'ar','تدريب القوة للمبتدئين باستخدام Kettlebells','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Beginner’s Strength Training with Kettlebells','Beginner’s Strength Training with Kettlebells','2024-08-26 01:01:38','2024-10-09 03:17:01'),(29,7,'ar','قم بتغذية جسمك من أجل الصحة المثالية','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Fuel Your Body for Optimal Health','Fuel Your Body for Optimal Health','2024-08-26 01:01:38','2024-10-09 03:17:30'),(30,8,'ar','فهم دور الألياف في النظام الغذائي الصحي','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Understanding the Role of Fiber in a Healthy Diet','Understanding the Role of Fiber in a Healthy Diet','2024-08-26 01:01:38','2024-10-09 03:07:16'),(31,9,'ar','دليل لاتخاذ خيارات صحية','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','A Guide to Making Healthier Choices','A Guide to Making Healthier Choices','2024-08-26 01:01:38','2024-10-09 03:18:19'),(32,10,'ar','لماذا يجب عليك دمجها في روتينك؟','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Why You Should Incorporate It Into Your Routine','Why You Should Incorporate It Into Your Routine','2024-08-26 01:01:38','2024-10-09 03:22:16'),(33,11,'ar','تمديد طريقك إلى صحة أفضل','<p>Whether you\'re a fitness enthusiast or someone just starting their journey toward a healthier lifestyle, choosing the right gym can make a huge difference in achieving your goals. With so many options available, it&rsquo;s important to know what to look for. This guide will help you navigate the process and find the perfect gym that aligns with your needs.</p>\r\n<h4><strong>1. Location and Accessibility</strong></h4>\r\n<p>One of the most important factors to consider when selecting a gym is its location. A gym close to your home or workplace makes it more likely you\'ll stay consistent with your workouts.</p>\r\n<p><strong>Pro Tip:</strong> Look for a gym that&rsquo;s either near your daily commute or within walking distance, as this increases the chances of sticking to your fitness routine.</p>\r\n<h4><strong>2. Gym Hours</strong></h4>\r\n<p>Having access to a gym that fits your schedule is crucial. Whether you&rsquo;re an early bird or a night owl, check the gym&rsquo;s operating hours to ensure it aligns with your lifestyle.</p>\r\n<p><strong>Questions to Ask:</strong></p>\r\n<ul>\r\n<li>Does the gym offer 24/7 access?</li>\r\n<li>Are they open on weekends or holidays?</li>\r\n<li>Do they provide early morning or late evening classes?</li>\r\n</ul>\r\n<h4><strong>3. Equipment Variety</strong></h4>\r\n<p>A well-equipped gym should cater to various workout styles, including strength training, cardio, functional fitness, and more. Make sure the gym has a variety of equipment that matches your workout needs.</p>\r\n<p><strong>Must-Have Equipment:</strong></p>\r\n<ul>\r\n<li>Free weights (dumbbells, barbells)</li>\r\n<li>Resistance machines</li>\r\n<li>Cardio machines (treadmills, ellipticals, bikes)</li>\r\n<li>Functional training areas (battle ropes, kettlebells, medicine balls)</li>\r\n</ul>\r\n<h4><strong>4. Group Fitness Classes</strong></h4>\r\n<p>Many gyms offer a range of group classes, which can be a great way to stay motivated and add variety to your workout. From yoga and Pilates to high-intensity interval training (HIIT), spinning, or Zumba, explore the class schedule to see if they offer what you&rsquo;re looking for.</p>\r\n<p><strong>Why Group Classes?</strong></p>\r\n<ul>\r\n<li>They provide structure and a sense of community.</li>\r\n<li>You can learn new workout techniques.</li>\r\n<li>It&rsquo;s easier to stay motivated in a group setting.</li>\r\n</ul>\r\n<h4><strong>5. Personal Trainers and Staff Support</strong></h4>\r\n<p>Having access to certified personal trainers can make a significant impact on your fitness progress. Trainers can guide you with personalized workout plans and ensure you\'re using equipment correctly to avoid injuries.</p>\r\n<p><strong>What to Look for:</strong></p>\r\n<ul>\r\n<li>Are the trainers certified?</li>\r\n<li>Do they offer free consultation sessions?</li>\r\n<li>What&rsquo;s their approach to fitness?</li>\r\n</ul>\r\n<h4><strong>6. Cleanliness and Hygiene</strong></h4>\r\n<p>Hygiene has become more important than ever, and a clean gym is essential for a comfortable workout environment. Take note of how frequently the gym is cleaned, whether equipment is sanitized between uses, and if hand sanitizers or wipes are readily available.</p>\r\n<p><strong>Check for:</strong></p>\r\n<ul>\r\n<li>Clean locker rooms, showers, and changing areas</li>\r\n<li>Regularly sanitized equipment</li>\r\n<li>Proper ventilation</li>\r\n</ul>\r\n<h4><strong>7. Membership Costs and Contracts</strong></h4>\r\n<p>Understanding the membership options is key to ensuring you&rsquo;re getting value for your money. Look out for hidden fees, contract lengths, and cancellation policies.</p>\r\n<p><strong>Ask About:</strong></p>\r\n<ul>\r\n<li>Monthly vs. yearly membership plans</li>\r\n<li>Free trial periods</li>\r\n<li>Additional fees for classes or amenities</li>\r\n</ul>\r\n<h4><strong>8. Amenities</strong></h4>\r\n<p>Consider what additional amenities the gym offers that could enhance your experience. These extras can make your workouts more enjoyable and convenient.</p>\r\n<p><strong>Popular Amenities:</strong></p>\r\n<ul>\r\n<li>Sauna or steam room</li>\r\n<li>Swimming pool</li>\r\n<li>Juice bar or caf&eacute;</li>\r\n<li>Free parking</li>\r\n<li>Childcare services</li>\r\n</ul>\r\n<h4><strong>9. Atmosphere and Culture</strong></h4>\r\n<p>The vibe of a gym can have a big impact on your motivation. Whether you prefer a gym with a high-energy, social atmosphere or a more laid-back, private environment, make sure it matches your preferences.</p>\r\n<p><strong>Tips:</strong></p>\r\n<ul>\r\n<li>Visit the gym during your usual workout times to see the crowd.</li>\r\n<li>Pay attention to the music, lighting, and overall ambiance.</li>\r\n<li>See if the gym community is supportive and welcoming.</li>\r\n</ul>\r\n<h4><strong>10. Trial Period or Day Pass</strong></h4>\r\n<p>Before committing to a gym, take advantage of trial periods or day passes. This will give you the opportunity to experience the gym firsthand and determine if it&rsquo;s the right fit for you.</p>','Stretch Your Way to Better Health','Stretch Your Way to Better Health','2024-08-26 01:01:38','2024-10-09 03:22:51');
/*!40000 ALTER TABLE `blog_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint unsigned NOT NULL DEFAULT '0',
  `blog_category_id` bigint unsigned NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `views` bigint NOT NULL DEFAULT '0',
  `show_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,1,3,'full-body-circuit-workout','website/images/blog_details_img_1.jpg',835,1,1,'\"[{\\\"value\\\":\\\"Bodybuilding\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(2,1,4,'bodyweight-strength-training','website/images/blog_details_img_2.jpg',436,1,1,'\"[{\\\"value\\\":\\\"Workout\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(3,1,6,'beginners-cardio-routine','website/images/blog_details_img_3.jpg',190,1,1,'\"[{\\\"value\\\":\\\"Yoga\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(4,1,1,'beginners-strength-training-routine','website/images/blog_details_img_4.jpg',483,1,1,'\"[{\\\"value\\\":\\\"Health\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(5,1,5,'beginners-strength-training-with-dumbbells','website/images/blog_details_img_5.jpg',221,1,1,'\"[{\\\"value\\\":\\\"Meditation\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(6,1,3,'beginners-strength-training-with-kettlebells','website/images/blog_details_img_6.jpg',866,1,1,'\"[{\\\"value\\\":\\\"Meditation\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:18'),(7,1,7,'fuel-your-body-for-optimal-health','website/images/blog_details_img_7.jpg',608,1,1,'\"[{\\\"value\\\":\\\"Training\\\"}]\"',1,'2024-08-13 02:51:18','2024-08-13 02:51:19'),(8,1,2,'understanding-the-role-of-fiber','website/images/blog_details_img_8.jpg',728,1,1,'\"[{\\\"value\\\":\\\"Training\\\"}]\"',1,'2024-08-13 02:51:19','2024-09-08 04:24:09'),(9,1,3,'a-guide-to-making-healthier-choices','website/images/blog_details_img_9.jpg',451,1,1,'\"[{\\\"value\\\":\\\"Swimming\\\"}]\"',1,'2024-08-13 02:51:19','2024-08-13 02:51:19'),(10,1,6,'why-you-should-incorporate-it','website/images/blog_details_img_10.jpg',952,1,1,'\"[{\\\"value\\\":\\\"Swimming\\\"}]\"',1,'2024-08-13 02:51:19','2024-09-08 04:25:11'),(11,1,3,'stretch-your-way-to-better-health','website/images/blog_details_img_11.jpg',122,1,1,'\"[{\\\"value\\\":\\\"Training\\\"}]\"',1,'2024-08-13 02:51:19','2024-08-13 02:51:19');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'strength-training','1',NULL,1,'2024-06-02 05:31:17','2024-10-08 05:10:16'),(2,'resistance-training','1',NULL,1,'2024-06-02 05:31:17','2024-08-12 01:39:44'),(3,'yoga-pilates','1',NULL,1,'2024-06-02 05:31:17','2024-08-12 01:40:39'),(4,'strength-equipment','1',NULL,1,'2024-06-02 05:31:17','2024-08-12 01:43:35'),(5,'cardio-training',NULL,NULL,1,'2024-08-12 01:41:47','2024-08-12 01:41:47'),(6,'cardio-machines',NULL,NULL,1,'2024-08-12 01:42:53','2024-08-12 01:42:53'),(7,'gym-supplies',NULL,NULL,1,'2024-08-12 01:43:56','2024-08-12 01:43:56'),(8,'athletic-shoes',NULL,NULL,0,'2024-08-13 03:23:07','2024-10-08 04:13:39');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_state_id_foreign` (`state_id`),
  CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'New York City',1,'2024-06-03 01:55:00','2024-10-08 05:32:02');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_activities`
--

DROP TABLE IF EXISTS `class_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `class_id` bigint unsigned NOT NULL,
  `activity_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_activities_class_id_foreign` (`class_id`),
  KEY `class_activities_activity_id_foreign` (`activity_id`),
  CONSTRAINT `class_activities_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `class_activities_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `class_activities`
--

LOCK TABLES `class_activities` WRITE;
/*!40000 ALTER TABLE `class_activities` DISABLE KEYS */;
INSERT INTO `class_activities` VALUES (7,6,2,'2024-08-11 03:39:46','2024-08-11 03:39:46'),(8,7,1,'2024-08-11 03:41:46','2024-08-11 03:41:46'),(9,7,2,'2024-08-11 03:41:46','2024-08-11 03:41:46'),(10,8,2,'2024-08-11 03:43:12','2024-08-11 03:43:12'),(16,2,2,'2024-08-26 01:20:31','2024-08-26 01:20:31'),(17,3,2,'2024-08-26 01:20:54','2024-08-26 01:20:54'),(18,4,2,'2024-08-26 01:21:17','2024-08-26 01:21:17'),(19,5,1,'2024-08-26 01:21:49','2024-08-26 01:21:49'),(22,1,1,'2024-11-03 23:52:19','2024-11-03 23:52:19'),(23,1,2,'2024-11-03 23:52:19','2024-11-03 23:52:19');
/*!40000 ALTER TABLE `class_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_trainers`
--

DROP TABLE IF EXISTS `class_trainers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_trainers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `class_id` bigint unsigned NOT NULL,
  `trainer_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_trainers_class_id_foreign` (`class_id`),
  KEY `class_trainers_trainer_id_foreign` (`trainer_id`),
  CONSTRAINT `class_trainers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `class_trainers_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `class_trainers`
--

LOCK TABLES `class_trainers` WRITE;
/*!40000 ALTER TABLE `class_trainers` DISABLE KEYS */;
INSERT INTO `class_trainers` VALUES (11,6,1,'2024-08-11 03:39:46','2024-08-11 03:39:46'),(12,7,1,'2024-08-11 03:41:46','2024-08-11 03:41:46'),(13,7,3,'2024-08-11 03:41:46','2024-08-11 03:41:46'),(14,8,1,'2024-08-11 03:43:12','2024-08-11 03:43:12'),(15,8,4,'2024-08-11 03:43:12','2024-08-11 03:43:12'),(23,2,1,'2024-08-26 01:20:31','2024-08-26 01:20:31'),(24,2,2,'2024-08-26 01:20:31','2024-08-26 01:20:31'),(25,2,3,'2024-08-26 01:20:31','2024-08-26 01:20:31'),(26,3,1,'2024-08-26 01:20:54','2024-08-26 01:20:54'),(27,3,2,'2024-08-26 01:20:54','2024-08-26 01:20:54'),(28,4,1,'2024-08-26 01:21:17','2024-08-26 01:21:17'),(29,5,1,'2024-08-26 01:21:49','2024-08-26 01:21:49'),(30,5,4,'2024-08-26 01:21:49','2024-08-26 01:21:49'),(33,1,1,'2024-11-03 23:52:19','2024-11-03 23:52:19'),(34,1,3,'2024-11-03 23:52:19','2024-11-03 23:52:19');
/*!40000 ALTER TABLE `class_trainers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_translations`
--

DROP TABLE IF EXISTS `class_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `class_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_translations_class_id_foreign` (`class_id`),
  CONSTRAINT `class_translations_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `class_translations`
--

LOCK TABLES `class_translations` WRITE;
/*!40000 ALTER TABLE `class_translations` DISABLE KEYS */;
INSERT INTO `class_translations` VALUES (4,1,'en','Strength Training','<p>Strength training is a form of exercise that focuses on building muscle strength and endurance by using resistance, such as weights, resistance bands, or body weight. This type of training is essential for improving muscle tone, enhancing joint stability, and increasing overall body strength. Regular strength training not only helps to boost metabolism but also improves bone density, which can help reduce the risk of osteoporosis. Additionally, it enhances balance, coordination, and mental resilience, making it a beneficial exercise for people of all ages and fitness levels. By challenging the muscles through various movements, strength training promotes long-term health, supporting an active lifestyle and better physical performance.</p>','2024-10-07 16:26:15','2024-11-03 23:52:19'),(5,2,'en','Muscle Hypertrophy',NULL,'2024-10-07 16:30:11','2024-10-07 16:30:11'),(6,3,'en','Cardiovascular Fitness',NULL,'2024-10-07 16:34:28','2024-10-07 16:34:28'),(7,4,'en','Nutrition and Diet',NULL,'2024-10-07 16:35:08','2024-10-07 16:35:08'),(8,5,'en','Recovery Techniques',NULL,'2024-10-07 16:35:26','2024-10-07 16:35:26'),(9,6,'en','Advanced Techniques',NULL,'2024-10-07 16:35:46','2024-10-07 16:35:46'),(10,7,'en','Recovery Techniques',NULL,'2024-10-07 16:36:00','2024-10-07 16:36:00'),(11,8,'en','Strength Training',NULL,'2024-10-07 16:36:16','2024-10-07 16:36:16'),(12,1,'bn','স্ট্রেংথ ট্রেনিং','<p>শক্তি প্রশিক্ষণ হল এমন এক ধরনের ব্যায়াম যা ওজন, রেজিস্ট্যান্স ব্যান্ড বা শরীরের ওজনের মতো প্রতিরোধের ব্যবহার করে পেশীর শক্তি এবং সহনশীলতা তৈরিতে ফোকাস করে। পেশীর স্বর উন্নত করতে, জয়েন্টের স্থায়িত্ব বাড়ানো এবং শরীরের সামগ্রিক শক্তি বৃদ্ধির জন্য এই ধরনের প্রশিক্ষণ অপরিহার্য। নিয়মিত শক্তি প্রশিক্ষণ শুধুমাত্র বিপাক বৃদ্ধিতে সাহায্য করে না বরং হাড়ের ঘনত্বও উন্নত করে, যা অস্টিওপরোসিসের ঝুঁকি কমাতে সাহায্য করতে পারে। উপরন্তু, এটি ভারসাম্য, সমন্বয় এবং মানসিক স্থিতিস্থাপকতা বাড়ায়, এটি সব বয়সের এবং ফিটনেস স্তরের মানুষের জন্য একটি উপকারী ব্যায়াম করে তোলে। বিভিন্ন নড়াচড়ার মাধ্যমে পেশীগুলিকে চ্যালেঞ্জ করে, শক্তি প্রশিক্ষণ দীর্ঘমেয়াদী স্বাস্থ্যের প্রচার করে, একটি সক্রিয় জীবনধারাকে সমর্থন করে এবং আরও ভাল শারীরিক কর্মক্ষমতা।</p>','2024-11-02 22:59:22','2024-11-03 23:53:36'),(13,2,'bn','Muscle Hypertrophy',NULL,'2024-11-02 23:00:00','2024-11-02 23:00:00'),(14,3,'bn','কার্ডিওভাসকুলার ফিটনেস',NULL,'2024-11-02 23:00:48','2024-11-02 23:00:48'),(15,4,'bn','পুষ্টি এবং খাদ্য',NULL,'2024-11-02 23:01:34','2024-11-02 23:01:34'),(16,5,'bn','পুনরুদ্ধারের কৌশল',NULL,'2024-11-02 23:02:14','2024-11-02 23:02:14'),(17,6,'bn','উন্নত প্রযুক্তি',NULL,'2024-11-02 23:03:01','2024-11-02 23:03:01'),(18,7,'bn','পুনরুদ্ধারের কৌশল',NULL,'2024-11-02 23:03:30','2024-11-02 23:03:30'),(19,8,'bn','স্ট্রেংথ ট্রেনিং',NULL,'2024-11-02 23:04:01','2024-11-02 23:04:01'),(20,1,'ar','تدريب القوة','<p>تدريب القوة هو شكل من أشكال التمارين التي تركز على بناء قوة العضلات وقدرتها على التحمل باستخدام المقاومة، مثل الأوزان أو أشرطة المقاومة أو وزن الجسم. يعد هذا النوع من التدريب ضروريًا لتحسين قوة العضلات وتعزيز استقرار المفاصل وزيادة قوة الجسم بشكل عام. لا يساعد تدريب القوة المنتظم على تعزيز عملية التمثيل الغذائي فحسب، بل يعمل أيضًا على تحسين كثافة العظام، مما قد يساعد في تقليل خطر الإصابة بهشاشة العظام. بالإضافة إلى ذلك، فهو يعزز التوازن والتنسيق والمرونة العقلية، مما يجعله تمرينًا مفيدًا للأشخاص من جميع الأعمار ومستويات اللياقة البدنية. من خلال تحدي العضلات من خلال حركات مختلفة، تعمل تدريبات القوة على تعزيز الصحة على المدى الطويل، ودعم نمط حياة نشط وأداء بدني أفضل.</p>','2024-11-03 23:54:12','2024-11-03 23:54:45');
/*!40000 ALTER TABLE `class_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_workout_id_foreign` (`workout_id`),
  CONSTRAINT `classes_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,2,'2024-12-28','10:30:00','11:30:00','Saturday','101','1','2024-08-11 02:34:34','2024-10-31 07:01:45'),(2,2,'2024-08-27','11:30:00','12:30:00','Tuesday',NULL,'1','2024-08-11 02:35:48','2024-08-26 01:20:31'),(3,2,'2024-08-28','13:30:00','14:30:00','Wednesday',NULL,'1','2024-08-11 02:37:00','2024-08-26 01:20:54'),(4,2,'2024-08-29','15:30:00','16:30:00','Thursday',NULL,'1','2024-08-11 03:24:43','2024-08-26 01:21:17'),(5,2,'2024-08-30','15:30:00','16:30:00','Friday',NULL,'0','2024-08-11 03:27:04','2024-09-29 01:37:27'),(6,2,'2024-08-11','16:30:00','17:30:00','Sunday',NULL,'0','2024-08-11 03:39:46','2024-09-29 01:37:23'),(7,2,'2024-08-12','15:30:00','16:30:00','Monday',NULL,'0','2024-08-11 03:41:46','2024-09-29 01:37:21'),(8,4,'2024-08-11','16:30:00','17:30:00','Sunday',NULL,'1','2024-08-11 03:43:12','2024-08-11 03:43:12');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configurations`
--

DROP TABLE IF EXISTS `configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configurations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `config` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `configurations`
--

LOCK TABLES `configurations` WRITE;
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` VALUES (1,'setup_complete','0','2024-06-02 05:31:17','2024-11-23 00:08:31'),(2,'setup_stage','1','2024-06-02 05:31:17','2024-11-23 00:08:31');
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_page_translations`
--

DROP TABLE IF EXISTS `contact_page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_page_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contact_page_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_page_translations_contact_page_id_foreign` (`contact_page_id`),
  CONSTRAINT `contact_page_translations_contact_page_id_foreign` FOREIGN KEY (`contact_page_id`) REFERENCES `contact_pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `contact_page_translations`
--

LOCK TABLES `contact_page_translations` WRITE;
/*!40000 ALTER TABLE `contact_page_translations` DISABLE KEYS */;
INSERT INTO `contact_page_translations` VALUES (1,1,'en','Ask your QUESTION HERE',NULL,'2024-06-05 21:57:00','2024-06-05 21:57:00'),(2,1,'bn','এখানে আপনার প্রশ্ন জিজ্ঞাসা করুন',NULL,'2024-06-05 21:57:00','2024-11-03 00:21:11'),(3,1,'ar','اطرح سؤالك هنا',NULL,'2024-08-26 01:01:41','2024-08-26 06:34:12');
/*!40000 ALTER TABLE `contact_page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_pages`
--

DROP TABLE IF EXISTS `contact_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `contact_pages`
--

LOCK TABLES `contact_pages` WRITE;
/*!40000 ALTER TABLE `contact_pages` DISABLE KEYS */;
INSERT INTO `contact_pages` VALUES (1,'7232 Broadway 308, Jackson Heights, 11372,','fitnes@mail.com\r\ntraining@mail.com','123-456-7890\r\n123-456-7890','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.6811392045543!2d-73.89520842481936!3d40.7470412713884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f01328248b3%3A0x62300784dd275f96!2s7232%20Broadway%20%23%20308%2C%20Flushing%2C%20NY%2011372%2C%20USA!5e0!3m2!1sen!2sbd!4v1717646173942!5m2!1sen!2sbd','uploads/custom-images/wsus-img-2024-06-06-03-57-00-7044.jpg','2024-06-05 21:57:00','2024-10-09 02:14:06');
/*!40000 ALTER TABLE `contact_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counter_translations`
--

DROP TABLE IF EXISTS `counter_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counter_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `counter_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `counter_translations_counter_id_foreign` (`counter_id`),
  CONSTRAINT `counter_translations_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `counter_translations`
--

LOCK TABLES `counter_translations` WRITE;
/*!40000 ALTER TABLE `counter_translations` DISABLE KEYS */;
INSERT INTO `counter_translations` VALUES (1,1,'en','148 Gym','2024-06-05 22:07:51','2024-06-05 22:07:51'),(2,1,'bn','148 জিম','2024-06-05 22:07:51','2024-11-03 00:08:02'),(3,2,'en','32 Cities','2024-06-05 22:09:57','2024-06-05 22:09:57'),(4,2,'bn','32টি শহর','2024-06-05 22:09:57','2024-11-03 00:08:20'),(5,3,'en','Equipment','2024-06-05 22:10:26','2024-06-05 22:10:26'),(6,3,'bn','যন্ত্রপাতি','2024-06-05 22:10:26','2024-11-03 00:08:37'),(7,4,'en','Program','2024-06-05 22:10:54','2024-06-05 22:10:54'),(8,4,'bn','প্রোগ্রাম','2024-06-05 22:10:54','2024-11-03 00:08:55'),(9,5,'en','YEARS OF EXPERIENCE','2024-07-11 03:29:22','2024-07-11 03:29:22'),(10,5,'bn','অভিজ্ঞতার বছর','2024-07-11 03:29:22','2024-11-03 00:09:48'),(11,6,'en','SKILLED TRAINER','2024-07-11 03:29:42','2024-07-11 03:29:42'),(12,6,'bn','দক্ষ প্রশিক্ষক','2024-07-11 03:29:42','2024-11-03 00:10:18'),(13,7,'en','Worksout','2024-07-11 03:30:13','2024-07-11 03:31:33'),(14,7,'bn','20','2024-07-11 03:30:13','2024-07-11 03:30:13'),(15,8,'en','Products','2024-07-11 03:30:52','2024-07-11 03:30:52'),(16,8,'bn','পণ্য','2024-07-11 03:30:52','2024-11-03 00:10:43'),(17,1,'ar','148 رياضية','2024-08-26 01:01:40','2024-10-23 02:03:34'),(18,2,'ar','32 مدينة','2024-08-26 01:01:40','2024-08-26 05:48:15'),(19,3,'ar','معدات','2024-08-26 01:01:40','2024-08-26 05:49:26'),(20,4,'ar','برنامج','2024-08-26 01:01:40','2024-08-26 05:50:48'),(21,5,'ar','سنوات من الخبرة','2024-08-26 01:01:40','2024-08-26 05:21:16'),(22,6,'ar','مدرب ماهر','2024-08-26 01:01:40','2024-08-26 05:27:57'),(23,7,'ar','تمارين','2024-08-26 01:01:40','2024-08-26 05:28:36'),(24,8,'ar','المنتجات','2024-08-26 01:01:40','2024-08-26 05:29:16');
/*!40000 ALTER TABLE `counter_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counters`
--

DROP TABLE IF EXISTS `counters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `home` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `counters`
--

LOCK TABLES `counters` WRITE;
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
INSERT INTO `counters` VALUES (1,'uploads/custom-images/counter/wsus-img-2024-06-06-04-09-12-8241.png','2',NULL,1,'2024-06-05 22:07:51','2024-06-05 22:09:12'),(2,'uploads/custom-images/counter/wsus-img-2024-06-06-04-09-57-2829.png','2',NULL,1,'2024-06-05 22:09:57','2024-06-05 22:09:57'),(3,'uploads/custom-images/counter/wsus-img-2024-06-06-04-10-26-9925.png','2',NULL,1,'2024-06-05 22:10:26','2024-06-05 22:10:26'),(4,'uploads/custom-images/counter/wsus-img-2024-06-06-04-10-54-2467.png','2',NULL,1,'2024-06-05 22:10:54','2024-06-05 22:10:54'),(5,NULL,'1',12,1,'2024-07-11 03:29:22','2024-08-26 05:25:54'),(6,NULL,'1',6,1,'2024-07-11 03:29:42','2024-07-11 03:29:42'),(7,NULL,'1',20,1,'2024-07-11 03:30:13','2024-07-11 03:31:33'),(8,NULL,'1',100,1,'2024-07-11 03:30:52','2024-07-11 03:30:52');
/*!40000 ALTER TABLE `counters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_histories`
--

DROP TABLE IF EXISTS `coupon_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `coupon_id` int NOT NULL,
  `discount_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `coupon_histories`
--

LOCK TABLES `coupon_histories` WRITE;
/*!40000 ALTER TABLE `coupon_histories` DISABLE KEYS */;
INSERT INTO `coupon_histories` VALUES (1,0,22,'FREE',1,170.00,'2024-08-25 22:22:09','2024-08-25 22:22:09'),(2,0,22,'FREE',1,25.50,'2024-08-25 22:54:20','2024-08-25 22:54:20'),(3,0,22,'FREE',1,2.00,'2024-08-25 23:19:26','2024-08-25 23:19:26'),(4,0,22,'FREE',1,50.00,'2024-08-25 23:21:45','2024-08-25 23:21:45');
/*!40000 ALTER TABLE `coupon_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint unsigned DEFAULT NULL,
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expired_date` date NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `min_price` decimal(8,2) DEFAULT NULL,
  `offer_type` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '1=Percentage, 2=Flat',
  `max_quantity` int NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,0,'FREE','2024-12-20',10.00,NULL,'1',20,'active','2024-08-25 22:17:19','2024-08-25 22:17:19');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_addons`
--

DROP TABLE IF EXISTS `custom_addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_addons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `description` text,
  `author` json DEFAULT NULL,
  `options` json DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `minimum_version` varchar(45) DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `custom_addons_name_index` (`name`),
  KEY `idx_custom_addons_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `custom_codes`
--

DROP TABLE IF EXISTS `custom_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `css` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `javascript` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `header_javascript` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_codes`
--

LOCK TABLES `custom_codes` WRITE;
/*!40000 ALTER TABLE `custom_codes` DISABLE KEYS */;
INSERT INTO `custom_codes` VALUES (1,NULL,'//write your javascript here without the script tag','2024-11-09 21:17:05','2024-11-19 23:06:36','//write your javascript here without the script tag');
/*!40000 ALTER TABLE `custom_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_page_translations`
--

DROP TABLE IF EXISTS `custom_page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_page_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `custom_page_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_page_translations`
--

LOCK TABLES `custom_page_translations` WRITE;
/*!40000 ALTER TABLE `custom_page_translations` DISABLE KEYS */;
INSERT INTO `custom_page_translations` VALUES (1,1,'en','Privacy Policy','<h2>1. Our Privacy</h2>\r\n<p>At Gridex, we are committed to protecting your privacy and personal information. This privacy policy explains how we collect, use, and share your information when you use our services. By using our services, you agree to the terms of this privacy policy.</p>\r\n<p>We take your privacy seriously and are committed to protecting your personal information. This privacy policy explains how we collect, use, and share your information when you use our services.</p>\r\n<h2>2. Information We Collect</h2>\r\n<p>We may collect information about you when you use our services, such as your name, email address, postal address, phone number, and payment information. We may also collect information about your device and how you use our services, including your IP address, browser type, and operating system.</p>\r\n<p>3.1 We collect this information in several ways, including when you provide it to us directly, when you use our services, and when we obtain it from third-party sources. We may also use cookies and similar technologies to collect information about your browsing behavior and preferences.</p>\r\n<p>3.2 When you use our services, and when we obtain it from third-party sources. We may also use cookies and similar technologies to collect information about your browsing behavior.</p>\r\n<p>3.3 Including when you provide it to us directly, when you use our services, and when we obtain it from third-party sources. We may also use cookies and similar technologies to collect information about your browsing behavior and preferences.</p>\r\n<h2>3. How We Use Your Information</h2>\r\n<p>We use your information to provide and improve our services, to communicate with you, and to personalize your experience. Specifically, we may use your information for the following purposes:</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>4. How We Share Your Information</h2>\r\n<p>We may share your information with third-party service providers who help us provide our services, such as payment processors and customer support providers. We may also share your information with our partners and affiliates for marketing purposes. In some cases, we may share your information with government authorities or law enforcement agencies to comply with legal requirements or protect our rights and property.</p>\r\n<p>We will never sell your information to third parties.</p>\r\n<h2>5. How we protect your information</h2>\r\n<p>We take reasonable measures to protect your information from unauthorized access, disclosure, alteration, and destruction. Specifically, we implement physical, technical, and administrative safeguards to protect your information. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee the security of your information.</p>\r\n<h2>6. Your Rights and reservation</h2>\r\n<p>You have certain rights regarding your personal information, including the right to access and correct your information, the right to request that we delete your information, and the right to opt-out of receiving marketing communications from us. If you wish to exercise any of these rights, please contact us at [contact email].</p>\r\n<h2>7. Updates to This Policy</h2>\r\n<p>We may update this privacy policy from time to time. We will notify you of any material changes by posting the updated policy on our website. We encourage you to review this policy periodically to stay informed about how we are protecting your information.</p>\r\n<h2>8. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../../contact\">[Contact Us]</a>.</p>','2024-06-01 23:31:06','2024-10-23 03:00:00'),(2,2,'en','Terms & Conditions','<h2>1. Use of Service</h2>\r\n<p>You are granted a non-exclusive, non-transferable, revocable license to use the Service for your personal or commercial use. You agree to use the Service only for lawful purposes and in a way that does not infringe on the rights of others. looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus</p>\r\n<h2>2. Your Account</h2>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriatenes.</p>\r\n<p>Some parts of the Service are billed on a subscription basis. You will be billed in advance on a recurring subscription that you choose.</p>\r\n<h2>3. Payment And Subscription</h2>\r\n<p>Some parts of the Service may require payment before access is granted. If you choose to subscribe to any of our paid services, you agree to pay all fees associated with the subscription. Payment may be made through a third- party payment processor, and you agree to provide accurate payment information.</p>\r\n<p>Taxes: If you wish to purchase any product or service made available through the Service (\"Purchase\"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your name, address, and payment information.</p>\r\n<p>Charges: Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material.</p>\r\n<h2>4. Intellectual Property</h2>\r\n<p>All content on the Service, including but not limited to text, graphics, logos, images, and software, is the property of [Your Company] or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or create derivative works based on the content without our prior written consent.</p>\r\n<ul>\r\n<li>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\").</li>\r\n<li>You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</li>\r\n<li>For any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</li>\r\n</ul>\r\n<h2>5. User content</h2>\r\n<p>You are solely responsible for any content you upload, submit, or otherwise make available on the Service (\"User Content\"). You agree not to post User Content that is illegal, defamatory, or infringes on the rights of others. We reserve the right to remove any User Content that violates these Terms.</p>\r\n<h2>6. Limitation of Liability</h2>\r\n<p>In no event shall [Your Company] be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of the Service, including but not limited to lost profits, loss of data, or any other damages, whether based on contract, tort, strict liability, or any other theory of liability.</p>\r\n<h2>7. our Termination</h2>\r\n<p>We reserve the right to terminate or suspend your access to the Service at any time, with or without cause, without prior notice or liability.</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>8. country Governing Law</h2>\r\n<p>These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions. the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that [Your Company] shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services</p>\r\n<h2>9. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../../contact\">[Contact Us]</a>.</p>','2024-06-01 23:31:06','2024-10-23 03:13:41'),(3,1,'ar','سياسة الخصوصية','<h2>1. Our Privacy</h2>\r\n<p>At Gridex, we are committed to protecting your privacy and personal information. This privacy policy explains how we collect, use, and share your information when you use our services. By using our services, you agree to the terms of this privacy policy.</p>\r\n<p>We take your privacy seriously and are committed to protecting your personal information. This privacy policy explains how we collect, use, and share your information when you use our services.</p>\r\n<h2>2. Information We Collect</h2>\r\n<p>We may collect information about you when you use our services, such as your name, email address, postal address, phone number, and payment information. We may also collect information about your device and how you use our services, including your IP address, browser type, and operating system.</p>\r\n<p>3.1 We collect this information in several ways, including when you provide it to us directly, when you use our services, and when we obtain it from third-party sources. We may also use cookies and similar technologies to collect information about your browsing behavior and preferences.</p>\r\n<p>3.2 When you use our services, and when we obtain it from third-party sources. We may also use cookies and similar technologies to collect information about your browsing behavior.</p>\r\n<p>3.3 Including when you provide it to us directly, when you use our services, and when we obtain it from third-party sources. We may also use cookies and similar technologies to collect information about your browsing behavior and preferences.</p>\r\n<h2>3. How We Use Your Information</h2>\r\n<p>We use your information to provide and improve our services, to communicate with you, and to personalize your experience. Specifically, we may use your information for the following purposes:</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>4. How We Share Your Information</h2>\r\n<p>We may share your information with third-party service providers who help us provide our services, such as payment processors and customer support providers. We may also share your information with our partners and affiliates for marketing purposes. In some cases, we may share your information with government authorities or law enforcement agencies to comply with legal requirements or protect our rights and property.</p>\r\n<p>We will never sell your information to third parties.</p>\r\n<h2>5. How we protect your information</h2>\r\n<p>We take reasonable measures to protect your information from unauthorized access, disclosure, alteration, and destruction. Specifically, we implement physical, technical, and administrative safeguards to protect your information. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee the security of your information.</p>\r\n<h2>6. Your Rights and reservation</h2>\r\n<p>You have certain rights regarding your personal information, including the right to access and correct your information, the right to request that we delete your information, and the right to opt-out of receiving marketing communications from us. If you wish to exercise any of these rights, please contact us at [contact email].</p>\r\n<h2>7. Updates to This Policy</h2>\r\n<p>We may update this privacy policy from time to time. We will notify you of any material changes by posting the updated policy on our website. We encourage you to review this policy periodically to stay informed about how we are protecting your information.</p>\r\n<h2>8. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../../contact\">[Contact Us]</a>.</p>','2024-10-23 03:02:45','2024-10-23 03:09:33'),(4,2,'ar','الشروط والأحكام','<h2>1. Use of Service</h2>\r\n<p>You are granted a non-exclusive, non-transferable, revocable license to use the Service for your personal or commercial use. You agree to use the Service only for lawful purposes and in a way that does not infringe on the rights of others. looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus</p>\r\n<h2>2. Your Account</h2>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriatenes.</p>\r\n<p>Some parts of the Service are billed on a subscription basis. You will be billed in advance on a recurring subscription that you choose.</p>\r\n<h2>3. Payment And Subscription</h2>\r\n<p>Some parts of the Service may require payment before access is granted. If you choose to subscribe to any of our paid services, you agree to pay all fees associated with the subscription. Payment may be made through a third- party payment processor, and you agree to provide accurate payment information.</p>\r\n<p>Taxes: If you wish to purchase any product or service made available through the Service (\"Purchase\"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your name, address, and payment information.</p>\r\n<p>Charges: Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material.</p>\r\n<h2>4. Intellectual Property</h2>\r\n<p>All content on the Service, including but not limited to text, graphics, logos, images, and software, is the property of [Your Company] or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or create derivative works based on the content without our prior written consent.</p>\r\n<ul>\r\n<li>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\").</li>\r\n<li>You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</li>\r\n<li>For any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</li>\r\n</ul>\r\n<h2>5. User content</h2>\r\n<p>You are solely responsible for any content you upload, submit, or otherwise make available on the Service (\"User Content\"). You agree not to post User Content that is illegal, defamatory, or infringes on the rights of others. We reserve the right to remove any User Content that violates these Terms.</p>\r\n<h2>6. Limitation of Liability</h2>\r\n<p>In no event shall [Your Company] be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of the Service, including but not limited to lost profits, loss of data, or any other damages, whether based on contract, tort, strict liability, or any other theory of liability.</p>\r\n<h2>7. our Termination</h2>\r\n<p>We reserve the right to terminate or suspend your access to the Service at any time, with or without cause, without prior notice or liability.</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>8. country Governing Law</h2>\r\n<p>These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions. the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that [Your Company] shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services</p>\r\n<h2>9. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../../contact\">[Contact Us]</a>.</p>','2024-10-23 03:14:29','2024-10-23 03:14:49'),(5,3,'en','Cookie Policy','<h2>1. Use of Service</h2>\r\n<p>You are granted a non-exclusive, non-transferable, revocable license to use the Service for your personal or commercial use. You agree to use the Service only for lawful purposes and in a way that does not infringe on the rights of others. looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus</p>\r\n<h2>2. Your Account</h2>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriatenes.</p>\r\n<p>Some parts of the Service are billed on a subscription basis. You will be billed in advance on a recurring subscription that you choose.</p>\r\n<h2>3. Payment And Subscription</h2>\r\n<p>Some parts of the Service may require payment before access is granted. If you choose to subscribe to any of our paid services, you agree to pay all fees associated with the subscription. Payment may be made through a third- party payment processor, and you agree to provide accurate payment information.</p>\r\n<p>Taxes: If you wish to purchase any product or service made available through the Service (\"Purchase\"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your name, address, and payment information.</p>\r\n<p>Charges: Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material.</p>\r\n<h2>4. Intellectual Property</h2>\r\n<p>All content on the Service, including but not limited to text, graphics, logos, images, and software, is the property of [Your Company] or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or create derivative works based on the content without our prior written consent.</p>\r\n<ul>\r\n<li>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\").</li>\r\n<li>You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</li>\r\n<li>For any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</li>\r\n</ul>\r\n<h2>5. User content</h2>\r\n<p>You are solely responsible for any content you upload, submit, or otherwise make available on the Service (\"User Content\"). You agree not to post User Content that is illegal, defamatory, or infringes on the rights of others. We reserve the right to remove any User Content that violates these Terms.</p>\r\n<h2>6. Limitation of Liability</h2>\r\n<p>In no event shall [Your Company] be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of the Service, including but not limited to lost profits, loss of data, or any other damages, whether based on contract, tort, strict liability, or any other theory of liability.</p>\r\n<h2>7. our Termination</h2>\r\n<p>We reserve the right to terminate or suspend your access to the Service at any time, with or without cause, without prior notice or liability.</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>8. country Governing Law</h2>\r\n<p>These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions. the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that [Your Company] shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services</p>\r\n<h2>9. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../contact\">[Contact Us]</a>.</p>','2024-10-27 05:05:49','2024-10-27 05:05:49'),(6,3,'bn','কুকি নীতি','<h2>1. Use of Service</h2>\r\n<p>You are granted a non-exclusive, non-transferable, revocable license to use the Service for your personal or commercial use. You agree to use the Service only for lawful purposes and in a way that does not infringe on the rights of others. looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus</p>\r\n<h2>2. Your Account</h2>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriatenes.</p>\r\n<p>Some parts of the Service are billed on a subscription basis. You will be billed in advance on a recurring subscription that you choose.</p>\r\n<h2>3. Payment And Subscription</h2>\r\n<p>Some parts of the Service may require payment before access is granted. If you choose to subscribe to any of our paid services, you agree to pay all fees associated with the subscription. Payment may be made through a third- party payment processor, and you agree to provide accurate payment information.</p>\r\n<p>Taxes: If you wish to purchase any product or service made available through the Service (\"Purchase\"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your name, address, and payment information.</p>\r\n<p>Charges: Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material.</p>\r\n<h2>4. Intellectual Property</h2>\r\n<p>All content on the Service, including but not limited to text, graphics, logos, images, and software, is the property of [Your Company] or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or create derivative works based on the content without our prior written consent.</p>\r\n<ul>\r\n<li>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\").</li>\r\n<li>You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</li>\r\n<li>For any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</li>\r\n</ul>\r\n<h2>5. User content</h2>\r\n<p>You are solely responsible for any content you upload, submit, or otherwise make available on the Service (\"User Content\"). You agree not to post User Content that is illegal, defamatory, or infringes on the rights of others. We reserve the right to remove any User Content that violates these Terms.</p>\r\n<h2>6. Limitation of Liability</h2>\r\n<p>In no event shall [Your Company] be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of the Service, including but not limited to lost profits, loss of data, or any other damages, whether based on contract, tort, strict liability, or any other theory of liability.</p>\r\n<h2>7. our Termination</h2>\r\n<p>We reserve the right to terminate or suspend your access to the Service at any time, with or without cause, without prior notice or liability.</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>8. country Governing Law</h2>\r\n<p>These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions. the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that [Your Company] shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services</p>\r\n<h2>9. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../contact\">[Contact Us]</a>.</p>','2024-10-27 05:05:49','2024-11-03 00:43:01'),(7,3,'ar','Cookie Policy','<h2>1. Use of Service</h2>\r\n<p>You are granted a non-exclusive, non-transferable, revocable license to use the Service for your personal or commercial use. You agree to use the Service only for lawful purposes and in a way that does not infringe on the rights of others. looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus</p>\r\n<h2>2. Your Account</h2>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriatenes.</p>\r\n<p>Some parts of the Service are billed on a subscription basis. You will be billed in advance on a recurring subscription that you choose.</p>\r\n<h2>3. Payment And Subscription</h2>\r\n<p>Some parts of the Service may require payment before access is granted. If you choose to subscribe to any of our paid services, you agree to pay all fees associated with the subscription. Payment may be made through a third- party payment processor, and you agree to provide accurate payment information.</p>\r\n<p>Taxes: If you wish to purchase any product or service made available through the Service (\"Purchase\"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your name, address, and payment information.</p>\r\n<p>Charges: Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material.</p>\r\n<h2>4. Intellectual Property</h2>\r\n<p>All content on the Service, including but not limited to text, graphics, logos, images, and software, is the property of [Your Company] or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or create derivative works based on the content without our prior written consent.</p>\r\n<ul>\r\n<li>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\").</li>\r\n<li>You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</li>\r\n<li>For any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</li>\r\n</ul>\r\n<h2>5. User content</h2>\r\n<p>You are solely responsible for any content you upload, submit, or otherwise make available on the Service (\"User Content\"). You agree not to post User Content that is illegal, defamatory, or infringes on the rights of others. We reserve the right to remove any User Content that violates these Terms.</p>\r\n<h2>6. Limitation of Liability</h2>\r\n<p>In no event shall [Your Company] be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of the Service, including but not limited to lost profits, loss of data, or any other damages, whether based on contract, tort, strict liability, or any other theory of liability.</p>\r\n<h2>7. our Termination</h2>\r\n<p>We reserve the right to terminate or suspend your access to the Service at any time, with or without cause, without prior notice or liability.</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>8. country Governing Law</h2>\r\n<p>These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions. the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that [Your Company] shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services</p>\r\n<h2>9. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../contact\">[Contact Us]</a>.</p>','2024-10-27 05:05:49','2024-10-27 05:05:49'),(8,1,'bn','গোপনীয়তা নীতি','<h2>1. আমাদের গোপনীয়তা</h2>\r\n<p>Gridex-এ, আমরা আপনার গোপনীয়তা এবং ব্যক্তিগত তথ্য রক্ষা করতে প্রতিশ্রুতিবদ্ধ। এই গোপনীয়তা নীতি ব্যাখ্যা করে যে আপনি যখন আমাদের পরিষেবাগুলি ব্যবহার করেন তখন আমরা কীভাবে আপনার তথ্য সংগ্রহ করি, ব্যবহার করি এবং ভাগ করি। আমাদের পরিষেবাগুলি ব্যবহার করে, আপনি এই গোপনীয়তা নীতির শর্তাবলীতে সম্মত হন৷</p>\r\n<p>আমরা আপনার গোপনীয়তাকে গুরুত্ব সহকারে নিই এবং আপনার ব্যক্তিগত তথ্য সুরক্ষিত রাখতে প্রতিশ্রুতিবদ্ধ। এই গোপনীয়তা নীতি ব্যাখ্যা করে যে আপনি যখন আমাদের পরিষেবাগুলি ব্যবহার করেন তখন আমরা কীভাবে আপনার তথ্য সংগ্রহ করি, ব্যবহার করি এবং ভাগ করি৷</p>\r\n<h2>2. তথ্য আমরা সংগ্রহ করি</h2>\r\n<p>আপনি যখন আমাদের পরিষেবাগুলি ব্যবহার করেন তখন আমরা আপনার সম্পর্কে তথ্য সংগ্রহ করতে পারি, যেমন আপনার নাম, ইমেল ঠিকানা, ডাক ঠিকানা, ফোন নম্বর এবং অর্থপ্রদানের তথ্য। আমরা আপনার আইপি ঠিকানা, ব্রাউজারের ধরন এবং অপারেটিং সিস্টেম সহ আপনার ডিভাইস এবং আপনি কীভাবে আমাদের পরিষেবাগুলি ব্যবহার করেন সে সম্পর্কেও তথ্য সংগ্রহ করতে পারি৷</p>\r\n<p>3.1 আমরা এই তথ্যটি বিভিন্ন উপায়ে সংগ্রহ করি, যখন আপনি এটি আমাদের সরাসরি প্রদান করেন, যখন আপনি আমাদের পরিষেবাগুলি ব্যবহার করেন এবং যখন আমরা তৃতীয় পক্ষের উত্স থেকে এটি পাই৷ আমরা আপনার ব্রাউজিং আচরণ এবং পছন্দ সম্পর্কে তথ্য সংগ্রহ করতে কুকিজ এবং অনুরূপ প্রযুক্তি ব্যবহার করতে পারি।</p>\r\n<p>3.2 আপনি যখন আমাদের পরিষেবাগুলি ব্যবহার করেন এবং যখন আমরা তৃতীয় পক্ষের উত্স থেকে এটি পাই৷ আমরা আপনার ব্রাউজিং আচরণ সম্পর্কে তথ্য সংগ্রহ করতে কুকিজ এবং অনুরূপ প্রযুক্তি ব্যবহার করতে পারি।</p>\r\n<p>3.3 আপনি কখন এটি আমাদের সরাসরি প্রদান করেন, যখন আপনি আমাদের পরিষেবাগুলি ব্যবহার করেন এবং যখন আমরা এটি তৃতীয় পক্ষের উত্স থেকে পাই তা সহ। আমরা আপনার ব্রাউজিং আচরণ এবং পছন্দ সম্পর্কে তথ্য সংগ্রহ করতে কুকিজ এবং অনুরূপ প্রযুক্তি ব্যবহার করতে পারি।</p>\r\n<h2>3. আমরা কিভাবে আপনার তথ্য ব্যবহার করি</h2>\r\n<p>আমরা আমাদের পরিষেবাগুলি প্রদান এবং উন্নত করতে, আপনার সাথে যোগাযোগ করতে এবং আপনার অভিজ্ঞতাকে ব্যক্তিগতকৃত করতে আপনার তথ্য ব্যবহার করি। বিশেষত, আমরা নিম্নলিখিত উদ্দেশ্যে আপনার তথ্য ব্যবহার করতে পারি:</p>\r\n<ul>\r\n<li>আপনার লেনদেন প্রক্রিয়া করতে এবং গ্রাহক সহায়তা প্রদান করতে</li>\r\n<li>আপনাকে নিউজলেটার, প্রচার, এবং অন্যান্য বিপণন যোগাযোগ পাঠাতে</li>\r\n<li>আপনার অভিজ্ঞতাকে ব্যক্তিগতকৃত করতে এবং আপনার আগ্রহ এবং পছন্দের উপর ভিত্তি করে পণ্য এবং পরিষেবাগুলির সুপারিশ করতে</li>\r\n<li>আমাদের পরিষেবা এবং অফারগুলি উন্নত করার জন্য গবেষণা এবং বিশ্লেষণ পরিচালনা করা</li>\r\n<li>আইনি এবং নিয়ন্ত্রক প্রয়োজনীয়তা মেনে চলার জন্য</li>\r\n</ul>\r\n<h2>4. কিভাবে আমরা আপনার তথ্য শেয়ার করি</h2>\r\n<p>আমরা আপনার তথ্য তৃতীয় পক্ষের পরিষেবা প্রদানকারীদের সাথে শেয়ার করতে পারি যারা আমাদের পরিষেবা প্রদান করতে সাহায্য করে, যেমন পেমেন্ট প্রসেসর এবং গ্রাহক সহায়তা প্রদানকারী। আমরা বিপণনের উদ্দেশ্যে আমাদের অংশীদার এবং সহযোগীদের সাথে আপনার তথ্য শেয়ার করতে পারি। কিছু ক্ষেত্রে, আইনি প্রয়োজনীয়তা মেনে চলতে বা আমাদের অধিকার ও সম্পত্তি রক্ষা করতে আমরা আপনার তথ্য সরকারি কর্তৃপক্ষ বা আইন প্রয়োগকারী সংস্থার সাথে শেয়ার করতে পারি।</p>\r\n<p>আমরা কখনই তৃতীয় পক্ষের কাছে আপনার তথ্য বিক্রি করব না।</p>\r\n<h2>5. কিভাবে আমরা আপনার তথ্য রক্ষা করি</h2>\r\n<p>আমরা আপনার তথ্যকে অননুমোদিত অ্যাক্সেস, প্রকাশ, পরিবর্তন এবং ধ্বংস থেকে রক্ষা করার জন্য যুক্তিসঙ্গত ব্যবস্থা গ্রহণ করি। বিশেষ করে, আমরা আপনার তথ্য সুরক্ষিত করার জন্য শারীরিক, প্রযুক্তিগত, এবং প্রশাসনিক সুরক্ষা প্রয়োগ করি। যাইহোক, ইন্টারনেট বা ইলেকট্রনিক স্টোরেজের মাধ্যমে ট্রান্সমিশনের কোনো পদ্ধতিই 100% নিরাপদ নয় এবং আমরা আপনার তথ্যের নিরাপত্তার নিশ্চয়তা দিতে পারি না।</p>\r\n<h2>6. আপনার অধিকার এবং সংরক্ষণ</h2>\r\n<p>আপনার ব্যক্তিগত তথ্য সম্পর্কিত কিছু অধিকার রয়েছে, যার মধ্যে রয়েছে আপনার তথ্য অ্যাক্সেস করার এবং সংশোধন করার অধিকার, অনুরোধ করার অধিকার যে আমরা আপনার তথ্য মুছে ফেলি এবং আমাদের কাছ থেকে বিপণন যোগাযোগ প্রাপ্তির অপ্ট-আউট করার অধিকার। আপনি যদি এই অধিকারগুলির কোনটি ব্যবহার করতে চান তবে অনুগ্রহ করে আমাদের সাথে [যোগাযোগ ইমেল] এ যোগাযোগ করুন৷</p>\r\n<h2>7. এই নীতির আপডেট</h2>\r\n<p>আমরা সময়ে সময়ে এই গোপনীয়তা নীতি আপডেট করতে পারি। আমরা আমাদের ওয়েবসাইটে আপডেট করা নীতি পোস্ট করে কোনো উপাদান পরিবর্তন সম্পর্কে আপনাকে অবহিত করব। আমরা কীভাবে আপনার তথ্য রক্ষা করছি সে সম্পর্কে অবগত থাকার জন্য আমরা আপনাকে পর্যায়ক্রমে এই নীতি পর্যালোচনা করতে উত্সাহিত করি৷</p>\r\n<h2>8. আমাদের সাথে যোগাযোগ করুন</h2>\r\n<p>এই শর্তাবলী সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে <a href=\"../../../contact\">[আমাদের সাথে যোগাযোগ করুন]</a> এ যোগাযোগ করুন।</p>','2024-11-03 00:41:28','2024-11-03 22:57:06'),(9,2,'bn','শর্তাবলী','<h2>1. Use of Service</h2>\r\n<p>You are granted a non-exclusive, non-transferable, revocable license to use the Service for your personal or commercial use. You agree to use the Service only for lawful purposes and in a way that does not infringe on the rights of others. looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus</p>\r\n<h2>2. Your Account</h2>\r\n<p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriatenes.</p>\r\n<p>Some parts of the Service are billed on a subscription basis. You will be billed in advance on a recurring subscription that you choose.</p>\r\n<h2>3. Payment And Subscription</h2>\r\n<p>Some parts of the Service may require payment before access is granted. If you choose to subscribe to any of our paid services, you agree to pay all fees associated with the subscription. Payment may be made through a third- party payment processor, and you agree to provide accurate payment information.</p>\r\n<p>Taxes: If you wish to purchase any product or service made available through the Service (\"Purchase\"), you may be asked to supply certain information relevant to your Purchase including, without limitation, your name, address, and payment information.</p>\r\n<p>Charges: Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material.</p>\r\n<h2>4. Intellectual Property</h2>\r\n<p>All content on the Service, including but not limited to text, graphics, logos, images, and software, is the property of [Your Company] or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or create derivative works based on the content without our prior written consent.</p>\r\n<ul>\r\n<li>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (\"Content\").</li>\r\n<li>You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.</li>\r\n<li>For any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</li>\r\n</ul>\r\n<h2>5. User content</h2>\r\n<p>You are solely responsible for any content you upload, submit, or otherwise make available on the Service (\"User Content\"). You agree not to post User Content that is illegal, defamatory, or infringes on the rights of others. We reserve the right to remove any User Content that violates these Terms.</p>\r\n<h2>6. Limitation of Liability</h2>\r\n<p>In no event shall [Your Company] be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of the Service, including but not limited to lost profits, loss of data, or any other damages, whether based on contract, tort, strict liability, or any other theory of liability.</p>\r\n<h2>7. our Termination</h2>\r\n<p>We reserve the right to terminate or suspend your access to the Service at any time, with or without cause, without prior notice or liability.</p>\r\n<ul>\r\n<li>To process your transactions and provide customer support</li>\r\n<li>To send you newsletters, promotions, and other marketing communications</li>\r\n<li>To personalize your experience and recommend products and services based on your interests and preferences</li>\r\n<li>To conduct research and analysis to improve our services and offerings</li>\r\n<li>To comply with legal and regulatory requirements</li>\r\n</ul>\r\n<h2>8. country Governing Law</h2>\r\n<p>These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions. the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that [Your Company] shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services</p>\r\n<h2>9. Contact Us</h2>\r\n<p>If you have any questions about these Terms, please contact us at <a href=\"../../../contact\">[Contact Us]</a>.</p>','2024-11-03 00:42:07','2024-11-03 00:42:07'),(10,4,'en','Test','<p>Lorem ipsum dolor sit amet consectetur adipiscing elit et integer habitasse, vestibulum condimentum egestas inceptos vel senectus consequat lacus hac facilisis, porta class mattis montes ligula dis libero vulputate sollicitudin. Porta tempor curabitur suspendisse a venenatis nulla consequat massa nam vivamus habitasse tortor dapibus, lobortis auctor ridiculus sodales ultrices nec morbi erat pulvinar arcu metus. Blandit mollis primis porta sociosqu augue suspendisse felis rhoncus natoque, habitasse convallis lobortis nunc tristique nostra rutrum himenaeos sodales, suscipit fames sagittis class et eros faucibus nisl.</p>\r\n<p>Pulvinar metus platea sociis congue gravida nostra sagittis vehicula, mollis commodo taciti molestie cum libero ac risus, nibh laoreet erat litora purus ridiculus magna. Imperdiet maecenas cum massa diam nunc lacinia taciti habitant, habitasse porta platea phasellus quisque porttitor molestie velit, blandit pharetra mus arcu dui vehicula leo. Facilisis vestibulum curabitur volutpat augue lectus bibendum torquent quam ultricies eget ornare dui commodo eleifend, lacus tempor cum vulputate nisi habitant ligula fringilla etiam sociosqu fusce platea.</p>','2024-11-09 22:26:05','2024-11-09 22:26:05'),(11,4,'bn','Test','<p>Lorem ipsum dolor sit amet consectetur adipiscing elit et integer habitasse, vestibulum condimentum egestas inceptos vel senectus consequat lacus hac facilisis, porta class mattis montes ligula dis libero vulputate sollicitudin. Porta tempor curabitur suspendisse a venenatis nulla consequat massa nam vivamus habitasse tortor dapibus, lobortis auctor ridiculus sodales ultrices nec morbi erat pulvinar arcu metus. Blandit mollis primis porta sociosqu augue suspendisse felis rhoncus natoque, habitasse convallis lobortis nunc tristique nostra rutrum himenaeos sodales, suscipit fames sagittis class et eros faucibus nisl.</p>\r\n<p>Pulvinar metus platea sociis congue gravida nostra sagittis vehicula, mollis commodo taciti molestie cum libero ac risus, nibh laoreet erat litora purus ridiculus magna. Imperdiet maecenas cum massa diam nunc lacinia taciti habitant, habitasse porta platea phasellus quisque porttitor molestie velit, blandit pharetra mus arcu dui vehicula leo. Facilisis vestibulum curabitur volutpat augue lectus bibendum torquent quam ultricies eget ornare dui commodo eleifend, lacus tempor cum vulputate nisi habitant ligula fringilla etiam sociosqu fusce platea.</p>','2024-11-09 22:26:05','2024-11-09 22:26:05'),(12,4,'ar','Test','<p>Lorem ipsum dolor sit amet consectetur adipiscing elit et integer habitasse, vestibulum condimentum egestas inceptos vel senectus consequat lacus hac facilisis, porta class mattis montes ligula dis libero vulputate sollicitudin. Porta tempor curabitur suspendisse a venenatis nulla consequat massa nam vivamus habitasse tortor dapibus, lobortis auctor ridiculus sodales ultrices nec morbi erat pulvinar arcu metus. Blandit mollis primis porta sociosqu augue suspendisse felis rhoncus natoque, habitasse convallis lobortis nunc tristique nostra rutrum himenaeos sodales, suscipit fames sagittis class et eros faucibus nisl.</p>\r\n<p>Pulvinar metus platea sociis congue gravida nostra sagittis vehicula, mollis commodo taciti molestie cum libero ac risus, nibh laoreet erat litora purus ridiculus magna. Imperdiet maecenas cum massa diam nunc lacinia taciti habitant, habitasse porta platea phasellus quisque porttitor molestie velit, blandit pharetra mus arcu dui vehicula leo. Facilisis vestibulum curabitur volutpat augue lectus bibendum torquent quam ultricies eget ornare dui commodo eleifend, lacus tempor cum vulputate nisi habitant ligula fringilla etiam sociosqu fusce platea.</p>','2024-11-09 22:26:05','2024-11-09 22:26:05');
/*!40000 ALTER TABLE `custom_page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_pages`
--

DROP TABLE IF EXISTS `custom_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_pages`
--

LOCK TABLES `custom_pages` WRITE;
/*!40000 ALTER TABLE `custom_pages` DISABLE KEYS */;
INSERT INTO `custom_pages` VALUES (1,'privacy-policy',1,'2024-06-01 23:31:06','2024-06-01 23:31:06'),(2,'terms-conditions',1,'2024-06-01 23:31:06','2024-06-01 23:31:06'),(3,'cookie-policy',1,'2024-10-27 05:05:49','2024-10-27 05:05:49');
/*!40000 ALTER TABLE `custom_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_paginations`
--

DROP TABLE IF EXISTS `custom_paginations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_paginations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_qty` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_paginations`
--

LOCK TABLES `custom_paginations` WRITE;
/*!40000 ALTER TABLE `custom_paginations` DISABLE KEYS */;
INSERT INTO `custom_paginations` VALUES (1,'Blog List',9,'2024-08-13 03:06:10','2024-08-13 03:06:10'),(2,'Blog Comment',10,'2024-08-13 03:06:10','2024-08-13 03:06:10'),(3,'Language List',100,'2024-08-13 03:06:10','2024-08-13 03:06:10'),(4,'Media List',9,'2024-08-13 03:06:10','2024-09-08 04:42:28'),(5,'Product List',9,'2024-08-13 03:06:10','2024-08-13 03:06:10'),(6,'Workout List',9,'2024-08-13 03:06:10','2024-08-13 03:06:10'),(7,'Trainer List',8,'2024-08-13 03:06:10','2024-08-22 06:26:22'),(8,'Service List',9,'2024-08-13 03:06:10','2024-08-13 03:06:10'),(9,'Award List',6,'2024-08-13 03:06:10','2024-08-13 03:06:10');
/*!40000 ALTER TABLE `custom_paginations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `email_templates`
--

LOCK TABLES `email_templates` WRITE;
/*!40000 ALTER TABLE `email_templates` DISABLE KEYS */;
INSERT INTO `email_templates` VALUES (1,'password_reset','Password Reset','<p>Dear {{user_name}},</p>\n                <p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(2,'contact_mail','Contact Email','<p>Hello there,</p>\n                <p>&nbsp;Mr. {{name}} has sent a new message. you can see the message details below.&nbsp;</p>\n                <p>Email: {{email}}</p>\n                <p>Phone: {{phone}}</p>\n                <p>Subject: {{subject}}</p>\n                <p>Message: {{message}}</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(3,'subscribe_notification','Subscribe Notification','<p>Hi there, Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you will not approve this link, you can not get any newsletter from us.</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(4,'user_verification','User Verification','<p>Dear {{user_name}},</p>\n                <p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(5,'approved_refund','Refund Request Approval','<p>Dear {{user_name}},</p>\n                <p>We are happy to say that, we have send {{refund_amount}} USD to your provided bank information. </p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(6,'new_refund','New Refund Request','<p>Hello websolutionus, </p>\n\n                <p>Mr. {{user_name}} has send a new refund request to you.</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(7,'pending_wallet_payment','Wallet Payment Approval','<p>Hello {{user_name}},</p>\n                <p>We have received your wallet payment request. we find your payment to our bank account.</p>\n                <p>Thanks &amp; Regards</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(8,'approved_withdraw','Withdraw Request Approval','<p>Dear {{user_name}},</p>\n                <p>We are happy to say that, we have send a withdraw amount to your provided bank information.</p>\n                <p>Thanks &amp; Regards</p>\n                <p>WebSolutionUs</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(9,'approved_withdraw','Withdraw Request Approval','<p>Dear {{user_name}},</p>\n                <p>We are happy to say that, we have send a withdraw amount to your provided bank information.</p>\n                <p>Thanks &amp; Regards</p>\n                <p>WebSolutionUs</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(10,'Order Successfully','Order Successfully','<p>Hi {{user_name}},</p>\n                <p> Thanks for your new order. Your order has been placed .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(11,'Admin Order Confirmation','New Order Confirmation - Order Placed','<p>Hello Admin,</p>\r\n<p>A new order has been successfully placed. Please find the details below:</p>\r\n<p><strong>Total Amount:</strong> {{total_amount}}</p>\r\n<p><strong>Payment Method:</strong> {{payment_method}}</p>\r\n<p><strong>Payment Status:</strong> {{payment_status}}</p>\r\n<p><strong>Order Status:</strong> {{order_status}}</p>\r\n<p><strong>Order Date:</strong> {{order_date}}</p>\r\n<p>Thank you for your attention.</p>','2024-11-10 21:29:17','2024-11-10 21:47:24'),(12,'Order Cancel','Order Cancel','<p>Hi {{user_name}},</p>\n                <p> Your order has been canceled .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(13,'Order Delivery','Order Delivery','<p>Hi {{user_name}},</p>\n                <p> Your order has been delivered .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(14,'Payment Success','Payment Success','<p>Hi {{user_name}},</p>\n                <p> Your payment has been successfully completed .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(15,'Workout Enrolled','Workout Enrolled','<p>Hi {{user_name}},</p>\n                <p> You have successfully enrolled in the workout .</p>\n                <p>Workout Name : {{workout_name}},</p>\n                <p>Workout Date : {{workout_date}},</p>\n                <p>Workout Time : {{workout_time}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(16,'Member Registration','Member Registration','<p>Hi {{user_name}},</p>\n                <p> Your registration has been successfully completed .</p>\n                <p>Member ID : {{member_id}},</p>\n                <p>Member Name : {{member_name}},</p>\n                <p>Member Email : {{member_email}},</p>\n                <p>Member Password : {{member_password}},</p>\n                <p>Member Phone : {{member_phone}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(17,'Subscription Success','Subscription Success','<p>Hi {{user_name}},</p>\n                <p> Your subscription has been successfully completed .</p>\n                <p>Subscription Start Date:{{subscription_start_date}},</p>\n                <p>Subscription End Date:{{subscription_end_date}},</p>\n                <p>Subscription Name : {{subscription_name}},</p>\n                <p>Subscription Price : {{subscription_price}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(18,'Trial Subscription','Trial Subscription','<p>Hi {{user_name}},</p>\n                <p> Your trial subscription has been Started.</p>\n                <p>Trial Start Date:{{subscription_start_date}},</p>\n                <p>Trial End Date:{{subscription_end_date}}</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(19,'Assign Locker','Assign Locker','<p>Hi {{user_name}},</p>\n                <p> Your locker has been successfully assigned.</p>\n                <p>Locker ID : {{locker_no}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(20,'Locker Status Change','Locker Status Change','<p>Hi {{user_name}},</p>\n                <p> Your locker status has been successfully changed.</p>\n                <p>Locker ID : {{locker_no}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(21,'Remove Assign Locker','Remove Assign Locker','<p>Hi {{user_name}},</p>\n                <p> Your locker has been successfully removed.</p>\n                <p>Locker ID : {{locker_no}},</p>','2024-11-10 21:29:17','2024-11-10 21:29:17'),(22,'Subscription Expire','Subscription Expire','<p>Hi {{ user_name }},</p>\n<p>We hope you’ve been enjoying your subscription!</p>\n<p>This is a reminder that your subscription will expire soon.</p>\n<p><strong>Details:</strong></p>\n<ul>\n    <li><strong>Start Date:</strong> {{ subscription_start_date }}</li>\n    <li><strong>Renew Date:</strong> {{ subscription_renew_date }}</li>\n</ul>\n<p>To continue enjoying uninterrupted access to our services, please consider renewing your subscription before it expires.</p>\n<p>If you have already renewed, please disregard this email.</p>\n<p>Thank you for choosing our services!</p>\n<p>Best regards,</p>\n<p><strong>{{ app_name }}</strong></p>',NULL,NULL);
/*!40000 ALTER TABLE `email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_translations`
--

DROP TABLE IF EXISTS `event_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_translations_event_id_foreign` (`event_id`),
  CONSTRAINT `event_translations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `event_translations`
--

LOCK TABLES `event_translations` WRITE;
/*!40000 ALTER TABLE `event_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `registration_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `organized_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('draft','published','unpublished') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'draft',
  `contributors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facilities_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_translations`
--

DROP TABLE IF EXISTS `facility_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `facility_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_translations_facility_id_foreign` (`facility_id`),
  CONSTRAINT `facility_translations_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `facility_translations`
--

LOCK TABLES `facility_translations` WRITE;
/*!40000 ALTER TABLE `facility_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `facility_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_translations`
--

DROP TABLE IF EXISTS `faq_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `faq_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `faq_translations`
--

LOCK TABLES `faq_translations` WRITE;
/*!40000 ALTER TABLE `faq_translations` DISABLE KEYS */;
INSERT INTO `faq_translations` VALUES (1,1,'en','How often should I exercise each week?','The ideal frequency of exercise depends on your fitness goals and current fitness level. For general health, the American Heart Association recommends at least 150 minutes of moderate-intensity aerobic exercise per week or 75 minutes of vigorous-intensity exercise, combined with muscle-strengthening activities on two or more days a week. ','2024-08-13 02:59:48','2024-08-13 02:59:48'),(2,2,'en','What is the best type of exercise for weight loss?','The most effective exercise for weight loss often combines both cardiovascular (cardio) and strength training. Cardio exercises like running, cycling, or swimming help burn calories and improve cardiovascular health. Strength training, such as weight lifting or bodyweight exercises, builds muscle, which in turn boosts your resting metabolic rate.','2024-08-13 02:59:48','2024-08-13 02:59:48'),(3,3,'en','How do I know if I’m drinking enough water?','A common guideline is to drink about 8 cups (64 ounces) of water a day, but individual needs can vary. To gauge if you’re well-hydrated, check the color of your urine—it should be light yellow. Darker urine can indicate dehydration. Other signs include feeling thirsty, dry mouth, or dizziness. If you\'re active or live in a hot climate, you may need to drink more. ','2024-08-13 02:59:48','2024-08-13 02:59:48'),(4,4,'en','What should I eat before and after a workout?','Before a Workout: Eat a balanced meal 1-3 hours before exercising. Focus on carbohydrates for energy and some protein for muscle support. Examples include oatmeal with fruit, a banana with peanut butter, or a yogurt parfait. Avoid heavy or greasy foods that might cause discomfort.Consume a meal or snack within 30-60 minutes post-exercise to aid recovery.','2024-08-13 02:59:48','2024-08-13 02:59:48'),(5,5,'en','How can I avoid injury while working out?','To avoid injury, prioritize proper form and technique in all exercises. Start with lighter weights or lower intensity to master the movements before progressing. Incorporate a warm-up before starting your workout and cool down afterward to prepare your muscles and help in recovery. Listen to your body—don’t push through pain. ','2024-08-13 02:59:48','2024-08-13 02:59:48'),(6,6,'en','How important is sleep for fitness?','Sleep is crucial for overall fitness and recovery. During sleep, the body repairs muscles, synthesizes proteins, and releases growth hormones. Inadequate sleep can impair your performance, hinder muscle growth, and increase the risk of injury. Aim for 7-9 hours of quality sleep per night to support optimal health and fitness. ','2024-08-13 02:59:48','2024-08-13 02:59:48'),(7,7,'en','Can I build muscle and lose fat at the same time?','Yes, it’s possible to build muscle and lose fat simultaneously, especially for beginners or those returning after a break. This process, known as body recomposition, involves a combination of resistance training and a carefully managed diet. To achieve this, focus on strength training to build muscle, maintain a slight caloric deficit .','2024-08-13 02:59:48','2024-08-13 02:59:48'),(8,1,'ar','كم مرة يجب أن أمارس الرياضة كل أسبوع؟','يعتمد التكرار المثالي للتمرين على أهداف لياقتك البدنية ومستوى لياقتك الحالي. بالنسبة للصحة العامة، توصي جمعية القلب الأمريكية بممارسة التمارين الرياضية متوسطة الشدة لمدة 150 دقيقة على الأقل أسبوعيًا أو 75 دقيقة من التمارين شديدة الشدة، جنبًا إلى جنب مع أنشطة تقوية العضلات لمدة يومين أو أكثر في الأسبوع.','2024-08-26 01:01:39','2024-10-23 02:52:29'),(9,2,'ar','ما هو أفضل نوع من التمارين الرياضية لإنقاص الوزن؟','غالبًا ما يجمع التمرين الأكثر فعالية لفقدان الوزن بين تمارين القلب والأوعية الدموية (القلب) وتدريب القوة. تساعد تمارين القلب مثل الجري أو ركوب الدراجات أو السباحة على حرق السعرات الحرارية وتحسين صحة القلب والأوعية الدموية. تعمل تدريبات القوة، مثل رفع الأثقال أو تمارين وزن الجسم، على بناء العضلات، مما يؤدي بدوره إلى زيادة معدل الأيض أثناء الراحة.','2024-08-26 01:01:39','2024-10-23 02:53:00'),(10,3,'ar','كيف أعرف إذا كنت أشرب كمية كافية من الماء؟','المبدأ التوجيهي الشائع هو شرب حوالي 8 أكواب (64 أونصة) من الماء يوميًا، لكن الاحتياجات الفردية يمكن أن تختلف. لقياس ما إذا كنت تعاني من رطوبة جيدة، تحقق من لون البول – يجب أن يكون أصفر فاتح. البول الداكن يمكن أن يشير إلى الجفاف. وتشمل العلامات الأخرى الشعور بالعطش أو جفاف الفم أو الدوخة. إذا كنت نشيطًا أو تعيش في مناخ حار، فقد تحتاج إلى شرب المزيد.','2024-08-26 01:01:39','2024-10-23 02:53:45'),(11,4,'ar','ماذا يجب أن آكل قبل وبعد التمرين؟','قبل التمرين: تناول وجبة متوازنة قبل 1-3 ساعات من التمرين. ركز على الكربوهيدرات للحصول على الطاقة وبعض البروتينات لدعم العضلات. تشمل الأمثلة دقيق الشوفان مع الفاكهة، أو الموز مع زبدة الفول السوداني، أو بارفيه الزبادي. تجنب الأطعمة الثقيلة أو الدهنية التي قد تسبب عدم الراحة. تناول وجبة أو وجبة خفيفة في غضون 30-60 دقيقة بعد التمرين للمساعدة في التعافي.','2024-08-26 01:01:39','2024-10-23 02:54:12'),(12,5,'ar','كيف يمكنني تجنب الإصابة أثناء التمرين؟','لتجنب الإصابة، قم بإعطاء الأولوية للشكل والأسلوب المناسبين في جميع التمارين. ابدأ بأوزان أخف أو كثافة أقل لإتقان الحركات قبل التقدم. قم بإجراء عملية الإحماء قبل بدء التمرين وتهدئة نفسك بعد ذلك لإعداد عضلاتك والمساعدة في التعافي. استمع إلى جسدك، ولا تضغط على الألم.','2024-08-26 01:01:39','2024-10-23 02:56:41'),(13,6,'ar','ما مدى أهمية النوم للياقة البدنية؟','النوم أمر بالغ الأهمية للياقة البدنية العامة والتعافي. أثناء النوم، يقوم الجسم بإصلاح العضلات، وتصنيع البروتينات، وإطلاق هرمونات النمو. النوم غير الكافي يمكن أن يضعف أدائك، ويعوق نمو العضلات، ويزيد من خطر الإصابة. استهدف الحصول على 7-9 ساعات من النوم الجيد كل ليلة لدعم الصحة واللياقة البدنية المثالية.','2024-08-26 01:01:39','2024-10-23 02:57:17'),(14,7,'ar','هل يمكنني بناء العضلات وخسارة الدهون في نفس الوقت؟','نعم، من الممكن بناء العضلات وفقدان الدهون في وقت واحد، خاصة للمبتدئين أو العائدين بعد فترة راحة. تتضمن هذه العملية، المعروفة باسم إعادة تكوين الجسم، مزيجًا من تدريبات المقاومة واتباع نظام غذائي مُدار بعناية. ولتحقيق ذلك، ركز على تدريب القوة لبناء العضلات، والحفاظ على نقص طفيف في السعرات الحرارية.','2024-08-26 01:01:39','2024-10-23 02:57:43'),(15,1,'bn','প্রতি সপ্তাহে আমার কতবার ব্যায়াম করা উচিত?','ব্যায়ামের আদর্শ ফ্রিকোয়েন্সি আপনার ফিটনেস লক্ষ্য এবং বর্তমান ফিটনেস স্তরের উপর নির্ভর করে। সাধারণ স্বাস্থ্যের জন্য, আমেরিকান হার্ট অ্যাসোসিয়েশন প্রতি সপ্তাহে কমপক্ষে 150 মিনিটের মাঝারি-তীব্রতার অ্যারোবিক ব্যায়াম বা 75 মিনিটের জোরালো-তীব্রতার ব্যায়াম, সপ্তাহে দুই বা তার বেশি দিনে পেশী-শক্তিশালী কার্যকলাপের সাথে মিলিত হওয়ার পরামর্শ দেয়।','2024-11-03 00:45:12','2024-11-03 00:45:12'),(16,2,'bn','ওজন কমানোর জন্য ব্যায়াম সেরা ধরনের কি?','ওজন কমানোর জন্য সবচেয়ে কার্যকর ব্যায়াম প্রায়শই কার্ডিওভাসকুলার (কার্ডিও) এবং শক্তি প্রশিক্ষণ উভয়কে একত্রিত করে। দৌড়ানো, সাইকেল চালানো বা সাঁতারের মতো কার্ডিও ব্যায়াম ক্যালোরি পোড়াতে এবং কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করতে সহায়তা করে। স্ট্রেংথ ট্রেনিং, যেমন ওয়েট লিফটিং বা বডিওয়েট ব্যায়াম, পেশী তৈরি করে, যা আপনার বিশ্রামের বিপাকীয় হারকে বাড়িয়ে তোলে।','2024-11-03 00:45:53','2024-11-03 00:45:53'),(17,3,'bn','আমি পর্যাপ্ত জল পান করছি কিনা তা আমি কীভাবে জানব?','একটি সাধারণ নির্দেশিকা হল দিনে প্রায় 8 কাপ (64 আউন্স) জল পান করা, তবে ব্যক্তিগত চাহিদা পরিবর্তিত হতে পারে। আপনি ভালভাবে হাইড্রেটেড কিনা তা নির্ধারণ করতে, আপনার প্রস্রাবের রঙ পরীক্ষা করুন - এটি হালকা হলুদ হওয়া উচিত। গাঢ় প্রস্রাব ডিহাইড্রেশন নির্দেশ করতে পারে। অন্যান্য লক্ষণগুলির মধ্যে রয়েছে তৃষ্ণা অনুভব করা, মুখ শুকনো বা মাথা ঘোরা। আপনি যদি সক্রিয় থাকেন বা গরম জলবায়ুতে থাকেন তবে আপনাকে আরও পান করতে হবে।','2024-11-03 00:46:28','2024-11-03 00:46:28'),(18,4,'bn','ওয়ার্কআউটের আগে এবং পরে আমার কী খাওয়া উচিত?','ওয়ার্কআউট করার আগে: ব্যায়াম করার 1-3 ঘন্টা আগে একটি সুষম খাবার খান। শক্তির জন্য কার্বোহাইড্রেট এবং পেশী সমর্থনের জন্য কিছু প্রোটিনের উপর ফোকাস করুন। উদাহরণগুলির মধ্যে রয়েছে ফলের সাথে ওটমিল, চিনাবাদাম মাখনের সাথে একটি কলা, বা দই পারফাইট। ভারী বা চর্বিযুক্ত খাবার এড়িয়ে চলুন যা অস্বস্তির কারণ হতে পারে। ব্যায়াম-পরবর্তী 30-60 মিনিটের মধ্যে পুনরুদ্ধারে সহায়তা করার জন্য একটি খাবার বা জলখাবার গ্রহণ করুন।','2024-11-03 00:47:01','2024-11-03 00:47:01'),(19,5,'bn','কাজ করার সময় আমি কীভাবে আঘাত এড়াতে পারি?','আঘাত এড়াতে, সমস্ত অনুশীলনে সঠিক ফর্ম এবং কৌশলকে অগ্রাধিকার দিন। অগ্রগতির আগে গতিবিধি আয়ত্ত করতে হালকা ওজন বা কম তীব্রতা দিয়ে শুরু করুন। আপনার ওয়ার্কআউট শুরু করার আগে একটি ওয়ার্ম-আপ অন্তর্ভুক্ত করুন এবং আপনার পেশী প্রস্তুত করতে এবং পুনরুদ্ধারে সহায়তা করার জন্য পরে ঠান্ডা করুন। আপনার শরীরের কথা শুনুন - ব্যথার মধ্য দিয়ে ধাক্কা দেবেন না।','2024-11-03 00:47:51','2024-11-03 00:47:51'),(20,6,'bn','ফিটনেসের জন্য ঘুম কতটা গুরুত্বপূর্ণ?','সামগ্রিক ফিটনেস এবং পুনরুদ্ধারের জন্য ঘুম অত্যন্ত গুরুত্বপূর্ণ। ঘুমের সময়, শরীর পেশী মেরামত করে, প্রোটিন সংশ্লেষণ করে এবং বৃদ্ধির হরমোন নিঃসরণ করে। অপর্যাপ্ত ঘুম আপনার কর্মক্ষমতা ব্যাহত করতে পারে, পেশী বৃদ্ধিতে বাধা দেয় এবং আঘাতের ঝুঁকি বাড়ায়। সর্বোত্তম স্বাস্থ্য এবং ফিটনেস সমর্থন করার জন্য প্রতি রাতে 7-9 ঘন্টা গুণমানের ঘুমের লক্ষ্য রাখুন।','2024-11-03 00:48:33','2024-11-03 00:48:33'),(21,7,'bn','আমি কি একই সময়ে পেশী তৈরি করতে পারি এবং চর্বি হারাতে পারি?','হ্যাঁ, পেশী তৈরি করা এবং একই সাথে চর্বি হ্রাস করা সম্ভব, বিশেষ করে নতুনদের জন্য বা যারা বিরতির পরে ফিরে আসছে তাদের জন্য। এই প্রক্রিয়া, শরীরের পুনর্গঠন হিসাবে পরিচিত, প্রতিরোধের প্রশিক্ষণ এবং একটি সাবধানে পরিচালিত খাদ্যের সংমিশ্রণ জড়িত। এটি অর্জন করতে, পেশী তৈরি করার জন্য শক্তি প্রশিক্ষণের উপর ফোকাস করুন, সামান্য ক্যালরির ঘাটতি বজায় রাখুন।','2024-11-03 00:49:08','2024-11-03 00:49:08');
/*!40000 ALTER TABLE `faq_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,1,'2024-08-13 02:59:48','2024-08-13 02:59:48'),(2,1,'2024-08-13 02:59:48','2024-08-13 02:59:48'),(3,1,'2024-08-13 02:59:48','2024-08-13 02:59:48'),(4,1,'2024-08-13 02:59:48','2024-08-13 02:59:48'),(5,1,'2024-08-13 02:59:48','2024-08-13 02:59:48'),(6,1,'2024-08-13 02:59:48','2024-08-13 02:59:48'),(7,1,'2024-08-13 02:59:48','2024-08-13 02:59:48');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_groups`
--

DROP TABLE IF EXISTS `gallery_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('image','video') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `gallery_groups`
--

LOCK TABLES `gallery_groups` WRITE;
/*!40000 ALTER TABLE `gallery_groups` DISABLE KEYS */;
INSERT INTO `gallery_groups` VALUES (1,'Personal Training','image',1,'2024-08-29 00:31:43','2024-08-29 00:31:43'),(2,'Personal Training','video',1,'2024-08-29 00:51:01','2024-08-29 00:51:01'),(3,'Workout Wonders','image',1,'2024-09-05 23:22:04','2024-09-05 23:22:04'),(4,'Workout Wonders','video',1,'2024-09-05 23:22:37','2024-09-05 23:22:37');
/*!40000 ALTER TABLE `gallery_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym_service_translations`
--

DROP TABLE IF EXISTS `gym_service_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gym_service_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gym_service_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gym_service_translations_gym_service_id_foreign` (`gym_service_id`),
  CONSTRAINT `gym_service_translations_gym_service_id_foreign` FOREIGN KEY (`gym_service_id`) REFERENCES `gym_services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `gym_service_translations`
--

LOCK TABLES `gym_service_translations` WRITE;
/*!40000 ALTER TABLE `gym_service_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `gym_service_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym_services`
--

DROP TABLE IF EXISTS `gym_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gym_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gym_services_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `gym_services`
--

LOCK TABLES `gym_services` WRITE;
/*!40000 ALTER TABLE `gym_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `gym_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_page_slider_translations`
--

DROP TABLE IF EXISTS `home_page_slider_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_page_slider_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `home_page_slider_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtitle_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_page_slider_translations_home_page_slider_id_foreign` (`home_page_slider_id`),
  CONSTRAINT `home_page_slider_translations_home_page_slider_id_foreign` FOREIGN KEY (`home_page_slider_id`) REFERENCES `home_page_sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_page_slider_translations`
--

LOCK TABLES `home_page_slider_translations` WRITE;
/*!40000 ALTER TABLE `home_page_slider_translations` DISABLE KEYS */;
INSERT INTO `home_page_slider_translations` VALUES (1,1,'en','Build Strength','Welcome to Fitnes','Whether you\'re here to build strength, improve endurance, or find balance, we have something for everyone.','Talk to a Specialist','2024-06-04 21:49:49','2024-10-30 01:33:44'),(2,1,'bn','জেন ফিট জিম স্টুডিও','ফিটনেস স্বাগতম','আপনি শক্তি তৈরি করতে, ধৈর্যের উন্নতি করতে বা ভারসাম্য খুঁজে পেতে এখানে থাকুন না কেন, আমাদের সবার জন্য কিছু না কিছু আছে।','একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-06-04 21:49:49','2024-11-03 00:05:27'),(3,2,'en','We Help to Grow your Fitness','Welcome to Fitnes','Whether you\'re here to build strength, improve endurance, or find balance, we have something for everyone. ','Talk to a Specialist','2024-06-05 06:06:24','2024-07-11 00:58:19'),(4,2,'bn','জেন ফিট জিম স্টুডিও','ফিটনেস স্বাগতম','আপনি শক্তি তৈরি করতে, ধৈর্যের উন্নতি করতে বা ভারসাম্য খুঁজে পেতে এখানে থাকুন না কেন, আমাদের সবার জন্য কিছু না কিছু আছে।','একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-06-05 06:06:24','2024-11-03 00:06:31'),(5,3,'en','Flex Flow  Fitness','Welcome to Fitnes','Whether you\'re here to build strength, improve endurance, or find balance, we have something for everyone.','Talk to a Specialist','2024-07-11 00:17:35','2024-10-30 01:33:44'),(6,3,'bn','ফ্লেক্স ফ্লো ফিটনেস','ফিটনেস স্বাগতম','আপনি শক্তি তৈরি করতে, ধৈর্যের উন্নতি করতে বা ভারসাম্য খুঁজে পেতে এখানে থাকুন না কেন, আমাদের সবার জন্য কিছু না কিছু আছে।','একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-07-11 00:17:35','2024-11-03 00:05:27'),(7,4,'en','Zen Fit Gym Studio','Welcome to Fitnes','Whether you\'re here to build strength, improve endurance, or find balance, we have something for everyone.','Talk to a Specialist','2024-07-11 00:21:03','2024-09-08 21:44:28'),(8,4,'bn','জেন ফিট জিম স্টুডিও','ফিটনেস স্বাগতম','আপনি শক্তি তৈরি করতে, ধৈর্যের উন্নতি করতে বা ভারসাম্য খুঁজে পেতে এখানে থাকুন না কেন, আমাদের সবার জন্য কিছু না কিছু আছে।','একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-07-11 00:21:03','2024-11-03 00:05:27'),(9,5,'en','Core Craft Gym Hub',NULL,NULL,'Talk  to a Specialist','2024-07-11 00:58:19','2024-07-14 02:06:02'),(10,5,'bn','কোর ক্রাফট জিম হাব।',NULL,NULL,'একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-07-11 00:58:19','2024-11-03 00:06:31'),(11,6,'en','It\'s Time To Get Stronger',NULL,NULL,'Talk to a Specialist','2024-07-11 01:08:18','2024-10-30 01:35:21'),(12,6,'bn','এটি আরও শক্তিশালী হওয়ার সময়',NULL,NULL,'একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-07-11 01:08:18','2024-11-03 00:07:15'),(13,7,'en','Tone Tech Fitness Cove',NULL,NULL,'Talk to a Specialist','2024-07-11 01:08:18','2024-07-11 01:08:18'),(14,7,'bn','টোন টেক ফিটনেস কোভ',NULL,NULL,'একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-07-11 01:08:18','2024-11-03 00:07:15'),(15,8,'en','Flex Zone Fitness Arena',NULL,NULL,'Talk to a Specialist','2024-07-11 01:08:18','2024-07-11 01:08:18'),(16,8,'bn','ফ্লেক্স জোন ফিটনেস এরিনা',NULL,NULL,'একজন বিশেষজ্ঞের সাথে কথা বলুন','2024-07-11 01:08:18','2024-11-03 00:07:15'),(17,1,'ar','بناء  لقوة','أهلاً بك في فيتنيس','\"سواء كنت هنا لبناء القوة، تحسين القدرة على التحمل، أو إيجاد التوازن، لدينا ما يناسب الجميع.\"','تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 04:59:43'),(18,2,'ar','نساعدك على تعزيز لياقتك البدنية','أهلاً بك في فيتنيس','سواء كنت هنا لبناء القوة، تحسين القدرة على التحمل، أو إيجاد التوازن، لدينا ما يناسب الجميع.','تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 05:04:58'),(19,3,'ar','مرونة التدفق اللياقة البدنية','أهلاً بك في فيتنيس','\"سواء كنت هنا لبناء القوة، تحسين القدرة على التحمل، أو إيجاد التوازن، لدينا ما يناسب الجميع.\"','تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 04:59:43'),(20,4,'ar','زين فيت استوديو الجيم','أهلاً بك في فيتنيس','\"سواء كنت هنا لبناء القوة، تحسين القدرة على التحمل، أو إيجاد التوازن، لدينا ما يناسب الجميع.\"','تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 04:59:43'),(21,5,'ar','كور كرافت <br> مركز الجيم','أهلاً بك في فيتنيس',NULL,'تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 05:03:45'),(22,6,'ar','حان الوقت لتصبح أقوى',NULL,NULL,'تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 05:13:23'),(23,7,'ar','تون تيك للياقة البدنية',NULL,NULL,'تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 05:13:23'),(24,8,'ar','ساحة مرونة للياقة البدنية',NULL,NULL,'تحدث مع متخصص','2024-08-26 01:01:40','2024-08-26 05:13:23');
/*!40000 ALTER TABLE `home_page_slider_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_page_sliders`
--

DROP TABLE IF EXISTS `home_page_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_page_sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'fab fa-whatsapp',
  `button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `home_page` tinyint NOT NULL,
  `order` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_page_sliders`
--

LOCK TABLES `home_page_sliders` WRITE;
/*!40000 ALTER TABLE `home_page_sliders` DISABLE KEYS */;
INSERT INTO `home_page_sliders` VALUES (1,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-06-53-48-9010.jpg',1,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp','callto:1234567890','1',1,1,'2024-06-04 21:49:49','2024-11-03 00:05:27'),(2,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-06-58-19-7844.jpg',2,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp','callto:1234567890','1',2,1,'2024-06-05 06:06:24','2024-11-03 00:06:31'),(3,'uploads/custom-images/home-page-slider/wsus-img-2024-09-09-03-44-28-6076.png',3,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp',NULL,'1',1,2,'2024-07-11 00:17:35','2024-11-03 00:05:27'),(4,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-06-53-48-2388.jpg',4,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp',NULL,'1',1,3,'2024-07-11 00:21:03','2024-11-03 00:05:27'),(5,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-06-58-19-4182.jpg',5,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp','callto:1234567890','1',2,3,'2024-07-11 00:58:19','2024-11-03 00:06:31'),(6,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-07-08-18-4881.jpg',6,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp','callto:1234567890','1',3,1,'2024-07-11 01:08:18','2024-11-03 00:07:15'),(7,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-07-08-18-4447.jpg',7,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp','callto:1234567890','1',3,2,'2024-07-11 01:08:18','2024-11-03 00:07:15'),(8,'uploads/custom-images/home-page-slider/wsus-img-2024-07-11-07-08-18-2102.jpg',8,'একজন বিশেষজ্ঞের সাথে কথা বলুন','fab fa-whatsapp','callto:1234567890','1',3,3,'2024-07-11 01:08:18','2024-11-03 00:07:15');
/*!40000 ALTER TABLE `home_page_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_page_translations`
--

DROP TABLE IF EXISTS `home_page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_page_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `home_page_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `about_us_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `pricing_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pricing_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `about_us_inner_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_description_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `about_us_button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `video_section_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_page_translations`
--

LOCK TABLES `home_page_translations` WRITE;
/*!40000 ALTER TABLE `home_page_translations` DISABLE KEYS */;
INSERT INTO `home_page_translations` VALUES (1,1,'en','Your Gym Dreams to Life',NULL,NULL,NULL,'IT’S TIME TO GET STRONGER','OUR MACHINES','[\"Provide a variety of modern and well-maintained fitness equipment.\",\"Weightlifting Equipment\",\"Including Cardio Machines and Functional Training Tools.\"]','More Details','START TRAINING WITH US',NULL,'IT’S TIME TO GET STRONGER','2024-06-09 01:55:35','2024-07-11 03:33:27'),(2,1,'bn','আপনার জিম লাইফ স্বপ্ন',NULL,NULL,NULL,'এটি আরও শক্তিশালী হওয়ার সময়','আমাদের মেশিন','[\"\\u09ac\\u09bf\\u09ad\\u09bf\\u09a8\\u09cd\\u09a8 \\u09a7\\u09b0\\u09a8\\u09c7\\u09b0 \\u0986\\u09a7\\u09c1\\u09a8\\u09bf\\u0995 \\u098f\\u09ac\\u0982 \\u09ad\\u09be\\u09b2\\u09ad\\u09be\\u09ac\\u09c7 \\u09b0\\u0995\\u09cd\\u09b7\\u09a3\\u09be\\u09ac\\u09c7\\u0995\\u09cd\\u09b7\\u09a3 \\u0995\\u09b0\\u09be \\u09ab\\u09bf\\u099f\\u09a8\\u09c7\\u09b8 \\u09b8\\u09b0\\u099e\\u09cd\\u099c\\u09be\\u09ae \\u09b8\\u09b0\\u09ac\\u09b0\\u09be\\u09b9 \\u0995\\u09b0\\u09c1\\u09a8\\u0964\",\"\\u09ad\\u09be\\u09b0\\u09cb\\u09a4\\u09cd\\u09a4\\u09cb\\u09b2\\u09a8 \\u09b8\\u09b0\\u099e\\u09cd\\u099c\\u09be\\u09ae\",\"\\u0995\\u09be\\u09b0\\u09cd\\u09a1\\u09bf\\u0993 \\u09ae\\u09c7\\u09b6\\u09bf\\u09a8 \\u098f\\u09ac\\u0982 \\u0995\\u09be\\u09b0\\u09cd\\u09af\\u0995\\u09b0\\u09c0 \\u09aa\\u09cd\\u09b0\\u09b6\\u09bf\\u0995\\u09cd\\u09b7\\u09a3 \\u09b8\\u09b0\\u099e\\u09cd\\u099c\\u09be\\u09ae \\u09b8\\u09b9\\u0964\"]','আরো বিস্তারিত','আমাদের সাথে প্রশিক্ষণ শুরু করুন',NULL,'এটি আরও শক্তিশালী হওয়ার সময়','2024-06-09 01:55:35','2024-11-03 00:15:53'),(3,2,'en','WELCOME TO OUR FITNES CLUB','With over 4100 online GYM Training videos and meditations, you’ll find something to match your mood, schedule and energy. Stay flexible with a monthly membership – your first 04 days are free Or save with an annual membership.','Find flexible Membership Plan','<ul>\r\n<li>The best equipment global brands</li>\r\n<li>The gym is open 24 hours a day, 7 days a week</li>\r\n<li>Two safe payment methods</li>\r\n<li>Group fitness classes in the price of the subscription</li>\r\n<li>No long-term contract, period</li>\r\n</ul>',NULL,NULL,NULL,'More Details',NULL,NULL,NULL,'2024-08-22 04:40:31','2024-08-22 04:47:04'),(4,2,'bn','আমাদের ফিটনেস ক্লাবে স্বাগতম','4100 টিরও বেশি অনলাইন জিওয়াইএম প্রশিক্ষণ ভিডিও এবং ধ্যানের সাথে, আপনি আপনার মেজাজ, সময়সূচী এবং শক্তির সাথে মেলে এমন কিছু খুঁজে পাবেন। একটি মাসিক সদস্যতার সাথে নমনীয় থাকুন - আপনার প্রথম 04 দিন বিনামূল্যে বা একটি বার্ষিক সদস্যতার সাথে সংরক্ষণ করুন৷','নমনীয় সদস্যতা পরিকল্পনা খুঁজুন','<ul>\r\n<li>বিশ্বের সেরা ব্র্যান্ডের সরঞ্জাম</li>\r\n<li>জিম খোলা থাকে ২৪ ঘণ্টা, সপ্তাহে ৭ দিন</li>\r\n<li>দুটি নিরাপদ পেমেন্ট পদ্ধতি</li>\r\n<li>গ্রুপ ফিটনেস ক্লাস সাবস্ক্রিপশনের মূল্যের অন্তর্ভুক্ত</li>\r\n<li>কোনও দীর্ঘমেয়াদী চুক্তি নেই, শুধুমাত্র নির্দিষ্ট সময়</li>\r\n</ul>',NULL,NULL,NULL,'আরো বিস্তারিত',NULL,NULL,NULL,'2024-08-22 04:40:31','2024-11-03 00:19:26'),(5,3,'en','Welcome to our Fitnes Club','With over 4100 online GYM Training videos and meditations, you’ll find something to match your mood, schedule and energy. Stay flexible with a monthly membership – your first 04 days are free Or save with an annual membership.',NULL,NULL,NULL,NULL,NULL,'More Details',NULL,NULL,NULL,'2024-08-22 04:51:30','2024-08-22 04:51:30'),(6,3,'bn','আমাদের ফিটনেস ক্লাবে স্বাগতম','4100 টিরও বেশি অনলাইন জিওয়াইএম প্রশিক্ষণ ভিডিও এবং ধ্যানের সাথে, আপনি আপনার মেজাজ, সময়সূচী এবং শক্তির সাথে মেলে এমন কিছু খুঁজে পাবেন। একটি মাসিক সদস্যতার সাথে নমনীয় থাকুন - আপনার প্রথম 04 দিন বিনামূল্যে বা একটি বার্ষিক সদস্যতার সাথে সংরক্ষণ করুন৷',NULL,NULL,NULL,NULL,NULL,'আরো বিস্তারিত',NULL,NULL,NULL,'2024-08-22 04:51:30','2024-11-03 00:20:26'),(7,1,'ar','أحلام صالتك الرياضية إلى الحياة',NULL,NULL,NULL,'حان الوقت لتصبح أقوى','آلاتنا','[\"\\u062a\\u0648\\u0641\\u064a\\u0631 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0645\\u062a\\u0646\\u0648\\u0639\\u0629 \\u0645\\u0646 \\u0645\\u0639\\u062f\\u0627\\u062a \\u0627\\u0644\\u0644\\u064a\\u0627\\u0642\\u0629 \\u0627\\u0644\\u0628\\u062f\\u0646\\u064a\\u0629 \\u0627\\u0644\\u062d\\u062f\\u064a\\u062b\\u0629 \\u0648\\u0627\\u0644\\u062a\\u064a \\u064a\\u062a\\u0645 \\u0635\\u064a\\u0627\\u0646\\u062a\\u0647\\u0627 \\u062c\\u064a\\u062f\\u064b\\u0627.\",\"\\u0645\\u0639\\u062f\\u0627\\u062a \\u0631\\u0641\\u0639 \\u0627\\u0644\\u0623\\u062b\\u0642\\u0627\\u0644\",\"\\u0628\\u0645\\u0627 \\u0641\\u064a \\u0630\\u0644\\u0643 \\u0622\\u0644\\u0627\\u062a \\u0627\\u0644\\u0642\\u0644\\u0628 \\u0648\\u0623\\u062f\\u0648\\u0627\\u062a \\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628 \\u0627\\u0644\\u0648\\u0638\\u064a\\u0641\\u064a.\"]','مزيد من التفاصيل','ابدأ التدريب معنا',NULL,'حان الوقت لتصبح أقوى','2024-08-26 01:01:41','2024-10-16 01:14:32'),(8,2,'ar','مرحبًا بكم في نادي اللياقة البدنية الخاص بنا','مع أكثر من 4100 مقطع فيديو وتأملات لتدريب GYM عبر الإنترنت، ستجد شيئًا يناسب حالتك المزاجية وجدولك الزمني وطاقتك. كن مرنًا مع العضوية الشهرية - أول 04 أيام لك مجانية أو وفّر من خلال العضوية السنوية.','ابحث عن خطة عضوية مرنة','<ul>\r\n<li>أفضل معدات من العلامات التجارية العالمية</li>\r\n<li>الصالة الرياضية مفتوحة على مدار 24 ساعة، 7 أيام في الأسبوع</li>\r\n<li>طريقتان آمنتان للدفع</li>\r\n<li>دروس لياقة جماعية ضمن سعر الاشتراك</li>\r\n<li>لا توجد عقود طويلة الأجل، نقطة على السطر</li>\r\n</ul>',NULL,NULL,NULL,'مزيد من التفاصيل',NULL,NULL,NULL,'2024-08-26 01:01:41','2024-08-26 06:22:03'),(9,3,'ar','مرحبا بكم في نادي اللياقة البدنية لدينا','مع أكثر من 4100 مقطع فيديو وتأملات لتدريب GYM عبر الإنترنت، ستجد شيئًا يناسب حالتك المزاجية وجدولك الزمني وطاقتك. كن مرنًا مع العضوية الشهرية - أول 04 أيام لك مجانية أو وفّر من خلال العضوية السنوية.',NULL,NULL,NULL,NULL,NULL,'مزيد من التفاصيل',NULL,NULL,NULL,'2024-08-26 01:01:41','2024-08-26 06:26:41');
/*!40000 ALTER TABLE `home_page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_pages`
--

DROP TABLE IF EXISTS `home_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `home` tinyint NOT NULL,
  `about_us_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `about_us_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_bg_shape_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_bg_shape_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us_button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pricing_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_bg_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `video_bg_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `video_button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `video_button_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `testimonial_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_pages`
--

LOCK TABLES `home_pages` WRITE;
/*!40000 ALTER TABLE `home_pages` DISABLE KEYS */;
INSERT INTO `home_pages` VALUES (1,1,'[\"uploads\\/custom-images\\/wsus-img-2024-07-11-09-23-38-7411.jpg\",\"uploads\\/custom-images\\/wsus-img-2024-07-11-09-23-38-3005.jpg\",\"uploads\\/custom-images\\/wsus-img-2024-07-11-09-23-38-7737.jpg\"]',NULL,'uploads/custom-images/wsus-img-2024-06-09-11-54-16-1532.png','uploads/custom-images/wsus-img-2024-06-09-11-54-51-8271.png','#',NULL,'uploads/custom-images/wsus-img-2024-07-11-09-33-27-3749.jpg',NULL,'uploads/custom-images/wsus-img-2024-06-09-07-55-35-8993.jpg','https://www.youtube.com/watch?v=R30JGe23A24&t=2s&pp=ygUHbWFuIGd5bQ%3D%3D',NULL,'uploads/custom-images/wsus-img-2024-07-11-09-48-02-9202.png','2024-06-09 01:55:35','2024-07-11 03:48:02'),(2,2,NULL,'uploads/custom-images/wsus-img-2024-08-22-10-47-03-2961.jpg',NULL,NULL,'/about-us','uploads/custom-images/wsus-img-2024-08-22-10-40-31-1333.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-22 04:40:31','2024-08-22 04:47:04'),(3,3,NULL,'uploads/custom-images/wsus-img-2024-08-22-10-51-30-9937.jpg',NULL,NULL,'/about-us',NULL,NULL,NULL,'uploads/custom-images/wsus-img-2024-08-22-11-25-27-2645.jpg','https://www.youtube.com/watch?v=R30JGe23A24&t=2s&pp=ygUHbWFuIGd5bQ%3D%3D',NULL,NULL,'2024-08-22 04:51:30','2024-08-22 05:25:27');
/*!40000 ALTER TABLE `home_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_galleries`
--

DROP TABLE IF EXISTS `image_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `image_galleries`
--

LOCK TABLES `image_galleries` WRITE;
/*!40000 ALTER TABLE `image_galleries` DISABLE KEYS */;
INSERT INTO `image_galleries` VALUES (1,1,'[\"138,130,132,133,134,126,125\"]',1,'2024-08-29 00:46:29','2024-10-23 02:45:17'),(2,3,'[\"132,130,140,133,131,125,126,141\"]',1,'2024-09-05 23:31:36','2024-09-05 23:31:36');
/*!40000 ALTER TABLE `image_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"uuid\":\"8ad651cf-9f54-40e5-a8c4-2d46a8467b5d\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:328:\\\"<p>Hi Rizvi Ahmed,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:03 Jun, 2024,<\\/p>\\n                <p>Subscription End Date:03 Jul, 2024,<\\/p>\\n                <p>Subscription Name : Standard Plan,<\\/p>\\n                <p>Subscription Price : 200.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:19:\\\"rizvi1316@gmail.com\\\";}\"}}',0,NULL,1717397981,1717397981),(2,'default','{\"uuid\":\"011474b7-704e-496c-9232-4092624dc958\",\"displayName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendUserBannedMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendUserBannedMailJob\",\"command\":\"O:47:\\\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendUserBannedMailJob\\\":3:{s:61:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendUserBannedMailJob\\u0000mail_subject\\\";s:19:\\\"Vitae aliquip nobis\\\";s:61:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendUserBannedMailJob\\u0000mail_message\\\";s:20:\\\"Sint nihil et simili\\\";s:58:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendUserBannedMailJob\\u0000user_info\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}',0,NULL,1717503164,1717503164),(3,'default','{\"uuid\":\"1bdd12f7-4130-4e25-a238-916b6757ad9d\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:194:\\\"<p>Hi Beck Tillman,<\\/p>\\n                <p> Your trial subscription has been Started.<\\/p>\\n                <p>Trial Start Date:12 Aug, 2024,<\\/p>\\n                <p>Trial End Date:14 Aug, 2024<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:18:\\\"Trial Subscription\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:15:\\\"user3@gmail.com\\\";}\"}}',0,NULL,1723432744,1723432744),(4,'default','{\"uuid\":\"16e4920e-b5ce-4eed-9d56-9fff6e058e06\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:194:\\\"<p>Hi Fiona Franco,<\\/p>\\n                <p> Your trial subscription has been Started.<\\/p>\\n                <p>Trial Start Date:12 Aug, 2024,<\\/p>\\n                <p>Trial End Date:14 Aug, 2024<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:18:\\\"Trial Subscription\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:20:\\\"user5@mailinator.com\\\";}\"}}',0,NULL,1723433123,1723433123),(5,'default','{\"uuid\":\"31500310-af2f-4273-addb-3e11b08b46e4\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:193:\\\"<p>Hi Lesley Wong,<\\/p>\\n                <p> Your trial subscription has been Started.<\\/p>\\n                <p>Trial Start Date:12 Aug, 2024,<\\/p>\\n                <p>Trial End Date:14 Aug, 2024<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:18:\\\"Trial Subscription\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:15:\\\"user6@gmail.com\\\";}\"}}',0,NULL,1723435073,1723435073),(6,'default','{\"uuid\":\"3dbe1a79-a133-4492-bd53-7a23dc1ebbc9\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:329:\\\"<p>Hi Devin Dillon,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:12 Aug, 2024,<\\/p>\\n                <p>Subscription End Date:11 Sep, 2024,<\\/p>\\n                <p>Subscription Name : Standard Plan,<\\/p>\\n                <p>Subscription Price : 200.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:20:\\\"user9@mailinator.com\\\";}\"}}',0,NULL,1723436507,1723436507),(7,'default','{\"uuid\":\"643503d5-8c8b-406e-93d7-12dad4ce96e5\",\"displayName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\MemberLockerJob\\\":3:{s:30:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000subject\\\";s:13:\\\"Assign Locker\\\";s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000message\\\";s:133:\\\"<p>Hi Pandora Moody,<\\/p>\\n                <p> Your locker has been successfully assigned.<\\/p>\\n                <p>Locker ID : L001,<\\/p>\\\";}\"}}',0,NULL,1723437545,1723437545),(8,'default','{\"uuid\":\"44427f74-9b3c-4215-aba9-386b5eb648c8\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:197:\\\"<p>Hi Russell Acevedo,<\\/p>\\n                <p> Your trial subscription has been Started.<\\/p>\\n                <p>Trial Start Date:12 Aug, 2024,<\\/p>\\n                <p>Trial End Date:14 Aug, 2024<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:18:\\\"Trial Subscription\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:21:\\\"user12@mailinator.com\\\";}\"}}',0,NULL,1723437690,1723437690),(9,'default','{\"uuid\":\"7355e9f1-b08c-4efb-990c-1b152bb5163b\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:193:\\\"<p>Hi Audra Lloyd,<\\/p>\\n                <p> Your trial subscription has been Started.<\\/p>\\n                <p>Trial Start Date:12 Aug, 2024,<\\/p>\\n                <p>Trial End Date:14 Aug, 2024<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:18:\\\"Trial Subscription\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:16:\\\"user15@gmail.com\\\";}\"}}',0,NULL,1723438372,1723438372),(10,'default','{\"uuid\":\"a901580a-640b-483d-b807-ab6a56d48257\",\"displayName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\MemberLockerJob\\\":3:{s:30:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000subject\\\";s:13:\\\"Assign Locker\\\";s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000message\\\";s:131:\\\"<p>Hi Audra Lloyd,<\\/p>\\n                <p> Your locker has been successfully assigned.<\\/p>\\n                <p>Locker ID : L003,<\\/p>\\\";}\"}}',0,NULL,1723438372,1723438372),(11,'default','{\"uuid\":\"716e58fa-89dc-4d77-a860-4d5e568f34b8\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:321:\\\"<p>Hi User,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:26 Aug, 2024,<\\/p>\\n                <p>Subscription End Date:25 Sep, 2024,<\\/p>\\n                <p>Subscription Name : Standard Plan,<\\/p>\\n                <p>Subscription Price : 200.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:14:\\\"user@gmail.com\\\";}\"}}',0,NULL,1724649030,1724649030),(12,'default','{\"uuid\":\"4a130dd1-fcb1-4e00-9a6b-ce7362167e41\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:320:\\\"<p>Hi User,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:26 Aug, 2024,<\\/p>\\n                <p>Subscription End Date:22 Feb, 2025,<\\/p>\\n                <p>Subscription Name : Premium Plan,<\\/p>\\n                <p>Subscription Price : 300.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:14:\\\"user@gmail.com\\\";}\"}}',0,NULL,1724649206,1724649206),(13,'default','{\"uuid\":\"c6781649-4919-4bfd-8415-d8364ae7546c\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:325:\\\"<p>Hi Audra Lloyd,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:08 Oct, 2024,<\\/p>\\n                <p>Subscription End Date:07 Nov, 2024,<\\/p>\\n                <p>Subscription Name : Basic Plan,<\\/p>\\n                <p>Subscription Price : 100.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:16:\\\"user15@gmail.com\\\";}\"}}',0,NULL,1728377953,1728377953),(14,'default','{\"uuid\":\"32c97e52-a179-413e-b89d-86ca69ec9014\",\"displayName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\MemberLockerJob\\\":3:{s:30:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000subject\\\";s:13:\\\"Assign Locker\\\";s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000message\\\";s:131:\\\"<p>Hi Audra Lloyd,<\\/p>\\n                <p> Your locker has been successfully assigned.<\\/p>\\n                <p>Locker ID : L001,<\\/p>\\\";}\"}}',0,NULL,1728377968,1728377968),(15,'default','{\"uuid\":\"15c444ab-d87f-4e47-8416-ed551ccc6fbd\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:328:\\\"<p>Hi Chloe Cooke,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:08 Oct, 2024,<\\/p>\\n                <p>Subscription End Date:07 Nov, 2024,<\\/p>\\n                <p>Subscription Name : Standard Plan,<\\/p>\\n                <p>Subscription Price : 200.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:15:\\\"user4@gmail.com\\\";}\"}}',0,NULL,1728379511,1728379511),(16,'default','{\"uuid\":\"0cf68923-3a2a-4219-91b7-61372507ff7e\",\"displayName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberLockerJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\MemberLockerJob\\\":3:{s:30:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000subject\\\";s:13:\\\"Assign Locker\\\";s:33:\\\"\\u0000App\\\\Jobs\\\\MemberLockerJob\\u0000message\\\";s:131:\\\"<p>Hi Chloe Cooke,<\\/p>\\n                <p> Your locker has been successfully assigned.<\\/p>\\n                <p>Locker ID : L002,<\\/p>\\\";}\"}}',0,NULL,1728379525,1728379525),(17,'default','{\"uuid\":\"5af10393-b09e-4ba4-9b5f-656d2bed4314\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:197:\\\"<p>Hi Aurora Martinez,<\\/p>\\n                <p> Your trial subscription has been Started.<\\/p>\\n                <p>Trial Start Date:01 Jan, 1970,<\\/p>\\n                <p>Trial End Date:01 Jan, 1970<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:18:\\\"Trial Subscription\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:16:\\\"user16@gmail.com\\\";}\"}}',0,NULL,1728380098,1728380098),(18,'default','{\"uuid\":\"99273490-20e2-41b5-bb21-9c489b556260\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:320:\\\"<p>Hi User,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:09 Oct, 2024,<\\/p>\\n                <p>Subscription End Date:07 Apr, 2025,<\\/p>\\n                <p>Subscription Name : Premium Plan,<\\/p>\\n                <p>Subscription Price : 300.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:14:\\\"user@gmail.com\\\";}\"}}',0,NULL,1728456648,1728456648),(19,'default','{\"uuid\":\"19d3d1c8-dba1-401c-b372-f1f088489474\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:321:\\\"<p>Hi User,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:09 Oct, 2024,<\\/p>\\n                <p>Subscription End Date:08 Nov, 2024,<\\/p>\\n                <p>Subscription Name : Standard Plan,<\\/p>\\n                <p>Subscription Price : 200.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:14:\\\"user@gmail.com\\\";}\"}}',0,NULL,1728457585,1728457585),(20,'default','{\"uuid\":\"73c18d0a-f2be-4c56-b2e3-ffb2d949bf03\",\"displayName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\MemberSubscriptionJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\MemberSubscriptionJob\\\":3:{s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000message\\\";s:318:\\\"<p>Hi User,<\\/p>\\n                <p> Your subscription has been successfully completed .<\\/p>\\n                <p>Subscription Start Date:20 Nov, 2024,<\\/p>\\n                <p>Subscription End Date:20 Dec, 2024,<\\/p>\\n                <p>Subscription Name : Basic Plan,<\\/p>\\n                <p>Subscription Price : 100.00,<\\/p>\\\";s:39:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000subject\\\";s:20:\\\"Subscription Success\\\";s:37:\\\"\\u0000App\\\\Jobs\\\\MemberSubscriptionJob\\u0000email\\\";s:14:\\\"user@gmail.com\\\";}\"}}',0,NULL,1732076245,1732076245);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'ltr',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `is_default` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_name_unique` (`name`),
  UNIQUE KEY `languages_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','en',NULL,'ltr','1','1','2024-06-02 05:30:38','2024-06-02 22:13:07'),(2,'Bangla','bn',NULL,'ltr','1','0','2024-06-02 21:53:10','2024-06-02 22:13:07'),(3,'Arabic','ar',NULL,'rtl','1','0','2024-08-26 01:01:38','2024-08-26 01:01:38');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_translations`
--

DROP TABLE IF EXISTS `location_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_translations_location_id_foreign` (`location_id`),
  CONSTRAINT `location_translations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `location_translations`
--

LOCK TABLES `location_translations` WRITE;
/*!40000 ALTER TABLE `location_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `location_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_created_by_foreign` (`created_by`),
  KEY `locations_updated_by_foreign` (`updated_by`),
  CONSTRAINT `locations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `locations_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locker_histories`
--

DROP TABLE IF EXISTS `locker_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locker_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `locker_id` bigint unsigned NOT NULL,
  `member_id` bigint unsigned NOT NULL,
  `assign_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locker_histories_locker_id_foreign` (`locker_id`),
  KEY `locker_histories_member_id_foreign` (`member_id`),
  KEY `locker_histories_created_by_foreign` (`created_by`),
  KEY `locker_histories_updated_by_foreign` (`updated_by`),
  CONSTRAINT `locker_histories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `locker_histories_locker_id_foreign` FOREIGN KEY (`locker_id`) REFERENCES `lockers` (`id`),
  CONSTRAINT `locker_histories_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  CONSTRAINT `locker_histories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `locker_histories`
--

LOCK TABLES `locker_histories` WRITE;
/*!40000 ALTER TABLE `locker_histories` DISABLE KEYS */;
INSERT INTO `locker_histories` VALUES (3,1,11,'2024-10-08',NULL,1,1,'2024-10-08 02:59:28','2024-10-08 02:59:28');
/*!40000 ALTER TABLE `locker_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lockers`
--

DROP TABLE IF EXISTS `lockers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lockers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `locker_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `availability` enum('available','occupied') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'available',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lockers_created_by_foreign` (`created_by`),
  KEY `lockers_updated_by_foreign` (`updated_by`),
  CONSTRAINT `lockers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `lockers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `lockers`
--

LOCK TABLES `lockers` WRITE;
/*!40000 ALTER TABLE `lockers` DISABLE KEYS */;
INSERT INTO `lockers` VALUES (1,'L001','occupied',1,1,1,NULL,'2024-06-02 05:31:17','2024-10-08 02:59:28'),(2,'L002','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-10-08 03:38:55'),(3,'L003','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-10-01 05:32:45'),(4,'L004','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-09-30 21:58:58'),(5,'L005','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-06-02 05:31:17'),(6,'L006','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-08-12 00:09:23'),(7,'L007','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-06-02 05:31:17'),(8,'L008','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-06-02 05:31:17'),(9,'L009','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-06-02 05:31:17'),(10,'L010','available',1,1,1,NULL,'2024-06-02 05:31:17','2024-10-01 22:45:54'),(11,'L011','available',1,1,NULL,NULL,'2024-10-01 22:49:50','2024-10-01 22:49:50');
/*!40000 ALTER TABLE `lockers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `height` int DEFAULT NULL,
  `width` int DEFAULT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (3,'trainer_img_2','uploads/media/media-trainer_img_2-1717417795-3134.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-03 06:29:55','2024-06-03 06:29:55'),(4,'trainer_img_1','uploads/media/media-trainer_img_1-1717418061-8226.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-03 06:34:21','2024-06-03 06:34:21'),(5,'gym','uploads/media/media-gym-1717471717-9318.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-06-03 21:28:37','2024-06-03 21:28:37'),(6,'gym product 2','uploads/media/media-gym-product-2-1717472113-8059.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-06-03 21:35:13','2024-06-03 21:35:13'),(7,'workout_img_1','uploads/media/media-workout_img_1-1717473742-7797.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-03 22:02:22','2024-06-03 22:02:22'),(8,'workout_img_3','uploads/media/media-workout_img_3-1717473742-7529.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-03 22:02:22','2024-06-03 22:02:22'),(9,'workout_img_4','uploads/media/media-workout_img_4-1717473742-4298.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-03 22:02:22','2024-06-03 22:02:22'),(10,'workout_img_5','uploads/media/media-workout_img_5-1717473742-4849.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-03 22:02:22','2024-06-03 22:02:22'),(11,'trainer_img_11','uploads/media/media-trainer_img_11-1717646574-7855.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-06-05 22:02:54','2024-06-05 22:02:54'),(12,'Life Fitness 1','uploads/media/media-Life-Fitness-1-1723450385-7240.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:13:05','2024-08-12 02:13:05'),(13,'technogym spa logo B676A4B74D seeklogo.com','uploads/media/media-technogym-spa-logo-B676A4B74D-seeklogo.com-1723450618-5370.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:16:58','2024-08-12 02:16:58'),(14,'cybex','uploads/media/media-cybex-1723450700-2221.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:18:20','2024-08-12 02:18:20'),(15,'Precor','uploads/media/media-Precor-1723450778-9586.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:19:38','2024-08-12 02:19:38'),(16,'TRUE_logo_4C_g','uploads/media/media-TRUE_logo_4C_g-1723450866-4305.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:21:06','2024-08-12 02:21:06'),(17,'NordicTrack','uploads/media/media-NordicTrack-1723451013-1333.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:23:33','2024-08-12 02:23:33'),(18,'9806964b959b9062327.76638887','uploads/media/media-9806964b959b9062327.76638887-1723451105-3418.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:25:05','2024-08-12 02:25:05'),(19,'Rogue BarBend Coupon 275x275','uploads/media/media-Rogue-BarBend-Coupon-275x275-1723451185-9226.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:26:25','2024-08-12 02:26:25'),(20,'acf.Logo   Star Trac','uploads/media/media-acf.Logo---Star-Trac-1723451524-2317.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:32:04','2024-08-12 02:32:04'),(21,'Escape+Logo','uploads/media/media-Escape+Logo-1723452023-8391.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:40:23','2024-08-12 02:40:23'),(23,'Escape Fitness','uploads/media/media-Escape-Fitness-1723452263-1355.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 02:44:23','2024-08-12 02:44:23'),(24,'tricep press machine 283x300','uploads/media/media-tricep-press-machine-283x300-1723452548-2065.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-12 02:49:08','2024-08-12 02:49:08'),(25,'hammer strength plate loaded seated dip 600x600','uploads/media/media-hammer-strength-plate-loaded-seated-dip-600x600-1723453518-5398.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-12 03:05:18','2024-08-12 03:05:18'),(26,'Adjustable Hand Grip','uploads/media/media-Adjustable Hand Grip-1723454425-5080.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-12 03:20:25','2024-08-12 03:20:25'),(27,'olympic flat bench 600x600','uploads/media/media-olympic-flat-bench-600x600-1723455318-2660.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-12 03:35:18','2024-08-12 03:35:18'),(28,'Adidas Logo','uploads/media/media-Adidas-Logo-1723540832-3925.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 03:20:32','2024-08-13 03:20:32'),(29,'product_6','uploads/media/media-product_6-1723541251-1699.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-13 03:27:31','2024-08-13 03:27:31'),(30,'product_11','uploads/media/media-product_11-1723541691-3914.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-13 03:34:51','2024-08-13 03:34:51'),(31,'ab building kit.blue1_600x600','uploads/media/media-ab-building-kit.blue1_600x600-1723542016-5583.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 03:40:16','2024-08-13 03:40:16'),(32,'01_2','uploads/media/media-01_2-1723542301-5589.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 03:45:01','2024-08-13 03:45:01'),(33,'GTBH FID_Inclined_1.2_1080x','uploads/media/media-GTBH-FID_Inclined_1.2_1080x-1723542805-4423.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 03:53:25','2024-08-13 03:53:25'),(34,'product_2','uploads/media/media-product_2-1723543176-7034.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-13 03:59:36','2024-08-13 03:59:36'),(35,'optimized   media_1287825_54513','uploads/media/media-optimized---media_1287825_54513-1723543528-1613.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 04:05:28','2024-08-13 04:05:28'),(36,'191730243512_1714x','uploads/media/media-191730243512_1714x-1723543789-5904.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 04:09:49','2024-08-13 04:09:49'),(37,'350 866 hs plate loaded seated dip l','uploads/media/media-350-866-hs-plate-loaded-seated-dip-l-1723543938-2832.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 04:12:18','2024-08-13 04:12:18'),(38,'p443 1200x849','uploads/media/media-p443-1200x849-1723544057-9472.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 04:14:17','2024-08-13 04:14:17'),(39,'bowflex max trainer m7 2','uploads/media/media-bowflex-max-trainer-m7-2-1723544442-7459.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 04:20:42','2024-08-13 04:20:42'),(40,'VC900 right rear 3_4_960','uploads/media/media-VC900-right-rear-3_4_960-1723606940-2194.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:42:21','2024-08-13 21:42:21'),(41,'T01 Chest Press2','uploads/media/media-T01-Chest-Press2-1723607751-2148.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(42,'SPL 0900 35 catalog 600x600','uploads/media/media-SPL-0900-35-catalog-600x600-1723607751-3776.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(43,'p441_principal 416x266','uploads/media/media-p441_principal-416x266-1723607751-1882.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(44,'p140 416x454','uploads/media/media-p140-416x454-1723607751-7636.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(45,'optimized   media_1287826_54885','uploads/media/media-optimized---media_1287826_54885-1723607751-6133.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(46,'1321_A250_SEATED_CHEST_PRESS Left_Three_Quarter cinv 1629768783138264','uploads/media/media-1321_A250_SEATED_CHEST_PRESS-Left_Three_Quarter-cinv-1629768783138264-1723607751-5931.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(47,'663d2a6ea411da3413d779a0_VERTICAL CHEST PRESS','uploads/media/media-663d2a6ea411da3413d779a0_VERTICAL CHEST PRESS-1723607751-5620.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 21:55:51','2024-08-13 21:55:51'),(48,'seated','uploads/media/media-seated-1723608725-3924.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:12:05','2024-08-13 22:12:05'),(49,'rock_tricep_dip 500x500','uploads/media/media-rock_tricep_dip-500x500-1723608725-7209.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:12:05','2024-08-13 22:12:05'),(50,'H6060ab36c3db42b8add1ad95a9ce8705n.png_300x300','uploads/media/media-H6060ab36c3db42b8add1ad95a9ce8705n.png_300x300-1723608725-1137.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:12:05','2024-08-13 22:12:05'),(51,'FFD PLSTDP 3__40754','uploads/media/media-FFD-PLSTDP-3__40754-1723608725-4456.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:12:06','2024-08-13 22:12:06'),(52,'FFD PLSTDP 2__35330','uploads/media/media-FFD-PLSTDP-2__35330-1723608726-9661.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:12:06','2024-08-13 22:12:06'),(53,'3070 2SeatedDip 3000x3000px_ISO_1200x1200','uploads/media/media-3070-2SeatedDip-3000x3000px_ISO_1200x1200-1723608726-1357.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:12:06','2024-08-13 22:12:06'),(54,'a589f0_2b31186cb82a45baaff74b6d96d6f1e7_mv2','uploads/media/media-a589f0_2b31186cb82a45baaff74b6d96d6f1e7_mv2-1723610173-3390.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:36:13','2024-08-13 22:36:13'),(55,'191730243512_1714x','uploads/media/media-191730243512_1714x-1723610173-4806.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:36:13','2024-08-13 22:36:13'),(56,'80610_1 600x806','uploads/media/media-80610_1-600x806-1723610173-3163.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:36:13','2024-08-13 22:36:13'),(57,'0038141_adjustable handgrip_500','uploads/media/media-0038141_adjustable-handgrip_500-1723610173-6218.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:36:13','2024-08-13 22:36:13'),(58,'5 60Kg Adjustable Heavy Gripper Fitness Hand Exerciser Grip FatGrip Wrist Increase Strength Spring Finger Pinch','uploads/media/media-5-60Kg-Adjustable-Heavy-Gripper-Fitness-Hand-Exerciser-Grip-FatGrip-Wrist-Increase-Strength-Spring-Finger-Pinch-1723610173-6521.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 22:36:13','2024-08-13 22:36:13'),(59,'revolution leverage bench press','uploads/media/media-revolution-leverage-bench-press-1723612198-4346.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:09:58','2024-08-13 23:09:58'),(60,'optimized   media_1328417_76001','uploads/media/media-optimized---media_1328417_76001-1723612198-8922.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:09:58','2024-08-13 23:09:58'),(61,'optimized   media_1287823_54514','uploads/media/media-optimized---media_1287823_54514-1723612198-8200.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:09:58','2024-08-13 23:09:58'),(62,'lvbp leverage bench press 520211_600x','uploads/media/media-lvbp-leverage-bench-press-520211_600x-1723612198-5910.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:09:58','2024-08-13 23:09:58'),(63,'flat bench press machine 500x500','uploads/media/media-flat-bench-press-machine-500x500-1723612198-8931.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:09:58','2024-08-13 23:09:58'),(64,'CS HSPL_ILHBP hero','uploads/media/media-CS-HSPL_ILHBP-hero-1723612198-9131.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:09:58','2024-08-13 23:09:58'),(70,'y bh9tjt','uploads/media/media-y-bh9tjt-1723613173-2230.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(71,'PowerLift Pro Dumbbells','uploads/media/media-PowerLift Pro Dumbbells-1723613173-4074.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(72,'pngtree isolated dumbbell concept fitness equipment for gym workout strength training bodybuilding png image_12258514','uploads/media/media-pngtree-isolated-dumbbell-concept-fitness-equipment-for-gym-workout-strength-training-bodybuilding-png-image_12258514-1723613173-4313.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(73,'img_v3_0289_796cb815 1656 4402 b858 fc366f5b900g','uploads/media/media-img_v3_0289_796cb815-1656-4402-b858-fc366f5b900g-1723613173-1842.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(74,'bstadbpr_imgl9319','uploads/media/media-bstadbpr_imgl9319-1723613173-9459.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(75,'10017','uploads/media/media-10017-1723613173-7180.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(76,'2_Types_of_Dumbell_480x480.png','uploads/media/media-2_Types_of_Dumbell_480x480.png-1723613173-2568.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-13 23:26:13','2024-08-13 23:26:13'),(77,'premium ab roller 252619_450x450 ezgif.com webp to png converter','uploads/media/media-premium-ab-roller-252619_450x450-ezgif.com-webp-to-png-converter-1723619744-6013.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:15:44','2024-08-14 01:15:44'),(78,'Image Throwdown Premium Abdominal Wheel TD ABW_web','uploads/media/media-Image-Throwdown-Premium-Abdominal-Wheel-TD-ABW_web-1723619744-2840.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:15:44','2024-08-14 01:15:44'),(79,'image removebg preview 2024 03 22T130012.033 ezgif.com webp to png converter','uploads/media/media-image-removebg-preview-2024-03-22T130012.033-ezgif.com-webp-to-png-converter-1723619744-3690.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:15:44','2024-08-14 01:15:44'),(80,'f14427fc 3436 4e34 994a e487e3b69db0','uploads/media/media-f14427fc-3436-4e34-994a-e487e3b69db0-1723619744-2469.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:15:44','2024-08-14 01:15:44'),(81,'e2f5cce2 a6e1 42f3 94bc 4db706b19987','uploads/media/media-e2f5cce2-a6e1-42f3-94bc-4db706b19987-1723619744-2486.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:15:44','2024-08-14 01:15:44'),(82,'pl138_2','uploads/media/media-pl138_2-1723620372-6164.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(83,'https___d1e00ek4ebabms.cloudfront.net_production_e4837b78 bf83 4d47 9357 be9a70391a74','uploads/media/media-https___d1e00ek4ebabms.cloudfront.net_production_e4837b78-bf83-4d47-9357-be9a70391a74-1723620372-6369.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(84,'Custom 015_76a2fd85 24d3 4b49 bed3 9a5a1d525003_800x800_crop_center','uploads/media/media-Custom-015_76a2fd85-24d3-4b49-bed3-9a5a1d525003_800x800_crop_center-1723620372-2904.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(85,'Custom 004_f6bbb8f9 61e9 4dbe b1db 09306552d177_800x800_crop_center','uploads/media/media-Custom-004_f6bbb8f9-61e9-4dbe-b1db-09306552d177_800x800_crop_center-1723620372-7225.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(86,'comp4 jump rope 275x275','uploads/media/media-comp4-jump-rope-275x275-1723620372-5123.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(87,'20220204_04085','uploads/media/media-20220204_04085-1723620372-2689.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(88,'01_2','uploads/media/media-01_2-1723620372-1946.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:26:12','2024-08-14 01:26:12'),(89,'23','uploads/media/media-23-1723620989-7220.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(90,'418060LP_web','uploads/media/media-418060LP_web-1723620989-6080.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(91,'banco_15','uploads/media/media-banco_15-1723620989-9524.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(92,'bs mab52','uploads/media/media-bs-mab52-1723620989-9492.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(93,'cr0f6 4g_300x300_crop_center','uploads/media/media-cr0f6-4g_300x300_crop_center-1723620989-7288.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(94,'flybird adjustable weight bench fb149 1','uploads/media/media-flybird-adjustable-weight-bench-fb149-1-1723620989-9957.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(95,'IMG_4276','uploads/media/media-IMG_4276-1723620989-7708.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(96,'swb 62 commercial flat incline decline bench 500x500','uploads/media/media-swb-62-commercial-flat-incline-decline-bench-500x500-1723620989-1011.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:36:29','2024-08-14 01:36:29'),(97,'watch_1','uploads/media/media-watch_1-1723621777-6667.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:37','2024-08-14 01:49:37'),(98,'watch_2','uploads/media/media-watch_2-1723621777-1741.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:37','2024-08-14 01:49:37'),(99,'watch_3','uploads/media/media-watch_3-1723621777-7979.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:37','2024-08-14 01:49:37'),(100,'watch_4','uploads/media/media-watch_4-1723621777-4151.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:37','2024-08-14 01:49:37'),(101,'watch_5','uploads/media/media-watch_5-1723621777-9525.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:37','2024-08-14 01:49:37'),(102,'watch_6','uploads/media/media-watch_6-1723621777-5101.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:38','2024-08-14 01:49:38'),(103,'watch_7','uploads/media/media-watch_7-1723621778-5033.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 01:49:38','2024-08-14 01:49:38'),(104,'elliptical 2','uploads/media/media-elliptical-2-1723624347-9726.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:32:27','2024-08-14 02:32:27'),(105,'elliptical 3','uploads/media/media-elliptical-3-1723624347-9135.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:32:27','2024-08-14 02:32:27'),(106,'elliptical 4','uploads/media/media-elliptical-4-1723624347-8917.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:32:27','2024-08-14 02:32:27'),(107,'elliptical 5','uploads/media/media-elliptical-5-1723624347-2121.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:32:27','2024-08-14 02:32:27'),(108,'elliptical 6','uploads/media/media-elliptical-6-1723624347-1902.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:32:27','2024-08-14 02:32:27'),(109,'elliptical 7','uploads/media/media-elliptical-7-1723624347-7285.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:32:27','2024-08-14 02:32:27'),(110,'stair_climber 1','uploads/media/media-stair_climber-1-1723625011-5478.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:43:31','2024-08-14 02:43:31'),(111,'stair_climber 2','uploads/media/media-stair_climber-2-1723625011-1334.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:43:31','2024-08-14 02:43:31'),(112,'stair_climber 3','uploads/media/media-stair_climber-3-1723625011-4571.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:43:31','2024-08-14 02:43:31'),(113,'stair_climber 4','uploads/media/media-stair_climber-4-1723625011-7372.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:43:31','2024-08-14 02:43:31'),(114,'stair_climber 5','uploads/media/media-stair_climber-5-1723625011-4261.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:43:31','2024-08-14 02:43:31'),(115,'stair_climber 6','uploads/media/media-stair_climber-6-1723625011-3089.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 02:43:31','2024-08-14 02:43:31'),(116,'shoe 6','uploads/media/media-shoe-6-1723626599-3911.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 03:09:59','2024-08-14 03:09:59'),(117,'shoe 5','uploads/media/media-shoe-5-1723626599-3112.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 03:09:59','2024-08-14 03:09:59'),(118,'shoe 4','uploads/media/media-shoe-4-1723626599-9016.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 03:09:59','2024-08-14 03:09:59'),(119,'shoe 3','uploads/media/media-shoe-3-1723626599-7423.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 03:09:59','2024-08-14 03:09:59'),(120,'shoe 2','uploads/media/media-shoe-2-1723626599-8479.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 03:09:59','2024-08-14 03:09:59'),(121,'shoe 1','uploads/media/media-shoe-1-1723626599-6449.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-14 03:09:59','2024-08-14 03:09:59'),(122,'trainer_img_1','uploads/media/media-trainer_img_1-1723696827-2629.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-14 22:40:27','2024-08-14 22:40:27'),(123,'trainer_img_2','uploads/media/media-trainer_img_2-1723697156-3654.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-14 22:45:56','2024-08-14 22:45:56'),(124,'trainer_img_3','uploads/media/media-trainer_img_3-1723698428-9722.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-14 23:07:08','2024-08-14 23:07:08'),(125,'trainer_img_4','uploads/media/media-trainer_img_4-1723703122-3758.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-15 00:25:22','2024-08-15 00:25:22'),(126,'trainer_img_5','uploads/media/media-trainer_img_5-1723703335-5018.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-15 00:28:55','2024-08-15 00:28:55'),(127,'trainer_img_6','uploads/media/media-trainer_img_6-1723703705-3329.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-15 00:35:05','2024-08-15 00:35:05'),(128,'Ladies Only Gym of the Year Certificate','uploads/media/media-Ladies-Only-Gym-of-the-Year-Certificate-1723716571-9069.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-15 04:09:31','2024-08-15 04:09:31'),(129,'certificate 1','uploads/media/media-certificate-1-1723716635-7078.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-08-15 04:10:35','2024-08-15 04:10:35'),(130,'program_2_img_2','uploads/media/media-program_2_img_2-1724313459-5354.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(131,'program_2_img_3','uploads/media/media-program_2_img_3-1724313459-4127.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(132,'program_2_img_4','uploads/media/media-program_2_img_4-1724313459-3354.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(133,'program_2_img_6','uploads/media/media-program_2_img_6-1724313459-7663.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(134,'program_2_img_7','uploads/media/media-program_2_img_7-1724313459-3986.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(135,'program_2_img_8','uploads/media/media-program_2_img_8-1724313459-3441.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(136,'program_2_img_9','uploads/media/media-program_2_img_9-1724313459-1487.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(137,'program_2_img_10','uploads/media/media-program_2_img_10-1724313459-7783.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 01:57:39','2024-08-22 01:57:39'),(138,'program_3_img_2','uploads/media/media-program_3_img_2-1724322504-1432.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 04:28:24','2024-08-22 04:28:24'),(139,'program_3_img_3','uploads/media/media-program_3_img_3-1724322504-8334.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-22 04:28:24','2024-08-22 04:28:24'),(140,'trainer_img_11','uploads/media/media-trainer_img_11-1724907874-9255.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-28 23:04:34','2024-08-28 23:04:34'),(141,'trainer_img_10','uploads/media/media-trainer_img_10-1724907970-8816.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-08-28 23:06:10','2024-08-28 23:06:10'),(142,'media long_service_award_certificate_sample_slide01 1725185092 8882','uploads/media/media-media-long_service_award_certificate_sample_slide01-1725185092-8882-1725596063-3839.jpg',NULL,NULL,NULL,NULL,'image/jpeg',NULL,'2024-09-05 22:14:23','2024-09-05 22:14:23'),(143,'media Creative Student Kids Certificate Template edit online 1725185596 4456','uploads/media/media-media-Creative-Student-Kids-Certificate-Template-edit-online-1725185596-4456-1725596161-1976.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-09-05 22:16:01','2024-09-05 22:16:01'),(144,'media award5 1725185288 5050','uploads/media/media-media-award5-1725185288-5050-1725596217-4583.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-09-05 22:16:57','2024-09-05 22:16:57'),(145,'photo_gallery_2','uploads/media/media-photo_gallery_2-1725615456-6454.png',NULL,NULL,NULL,NULL,'image/png',NULL,'2024-09-06 03:37:36','2024-09-06 03:37:36');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_subscriptions`
--

DROP TABLE IF EXISTS `member_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint unsigned NOT NULL,
  `subscription_plan_id` bigint unsigned DEFAULT NULL,
  `subscription_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `available_trial` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=yes, 0=no',
  `payment_status` enum('pending','success','due') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `due_at` timestamp NULL DEFAULT NULL,
  `due_amount` double DEFAULT '0',
  `is_trial` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=trial, 0=not trial',
  `trial_start_date` date DEFAULT NULL,
  `trial_end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_subscriptions_member_id_foreign` (`member_id`),
  CONSTRAINT `member_subscriptions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `member_subscriptions`
--

LOCK TABLES `member_subscriptions` WRITE;
/*!40000 ALTER TABLE `member_subscriptions` DISABLE KEYS */;
INSERT INTO `member_subscriptions` VALUES (1,3,0,0,0,'',NULL,0,1,'2024-08-12','2024-08-14',1,'2024-08-11 21:19:03','2024-08-11 21:19:03'),(3,5,0,0,0,'',NULL,0,1,'2024-08-12','2024-08-14',1,'2024-08-11 21:25:23','2024-08-11 21:25:23'),(4,6,0,0,0,'',NULL,0,1,'2024-08-12','2024-08-14',0,'2024-08-11 21:57:53','2024-08-11 21:57:53'),(5,10,0,0,0,'',NULL,0,1,'2024-08-12','2024-08-14',1,'2024-08-11 22:41:30','2024-08-11 22:41:30'),(6,11,0,0,0,'',NULL,0,1,'2024-08-12','2024-08-14',1,'2024-08-11 22:52:52','2024-08-11 22:52:52');
/*!40000 ALTER TABLE `member_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `member_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `locker_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `height` float DEFAULT NULL COMMENT 'in cm',
  `weight` float DEFAULT NULL COMMENT 'in kg',
  `chest` float DEFAULT NULL COMMENT 'in inch',
  `referred_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'A+, A-, B+, B-, AB+, AB-, O+, O-',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergency_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergency_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergency_relation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_user_id_foreign` (`user_id`),
  KEY `members_created_by_foreign` (`created_by`),
  KEY `members_updated_by_foreign` (`updated_by`),
  CONSTRAINT `members_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `members_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,1,'M-186419',NULL,'male','2000-01-02',NULL,NULL,NULL,'Margaret',1,NULL,'O+','01740497649',NULL,NULL,NULL,NULL,1,NULL,'2024-06-02 21:33:00','2024-10-08 03:01:11'),(2,2,'M-454322',NULL,NULL,NULL,125,NULL,NULL,NULL,1,NULL,'AB-',NULL,NULL,NULL,NULL,NULL,1,NULL,'2024-06-02 23:57:17','2024-10-28 01:10:37'),(3,7,'M-686404',NULL,'male','1999-07-15',26,98,42,'Linda',1,NULL,'A+','+1 (607) 859-5023','Isadora Chapman','+1 (492) 746-5711','Sister',NULL,1,NULL,'2024-08-11 21:19:03','2024-10-08 03:04:36'),(5,9,'M-745658',NULL,'female','2000-08-01',37,38,43,'Susan',1,NULL,'O+','+1 (253) 529-5954','Xerxes Rivers','+1 (102) 493-1411','Family member',NULL,1,NULL,'2024-08-11 21:25:23','2024-10-08 03:08:15'),(6,10,'M-793855',NULL,'male','2004-03-04',29,1,69,'Dennis',1,NULL,'AB+','+1 (611) 436-3333','Deacon Albert','+1 (108) 508-6094','Brother',NULL,1,NULL,'2024-08-11 21:57:53','2024-10-08 03:09:08'),(7,11,'M-300214',NULL,'female','2000-02-08',58,78,71,'Newton',1,NULL,'A-','+1 (483) 723-5294','Callum Valencia','+1 (242) 624-4417','Soulmate',NULL,1,NULL,'2024-08-11 21:59:49','2024-10-08 03:10:08'),(8,12,'M-999756',NULL,'male','2004-07-14',66,56,42,'Tiffany',1,NULL,'A+','+1 (579) 539-1018','Leslie Curtis','+1 (904) 418-4259','Uncle',NULL,1,NULL,'2024-08-11 22:13:52','2024-10-08 03:11:13'),(9,13,'M-210562',NULL,'female','2003-02-04',93,27,8,'Graham',1,NULL,'AB-','+1 (862) 205-4138','Silas Dominguez','+1 (509) 467-5099','Cousin',NULL,1,NULL,'2024-08-11 22:21:46','2024-10-08 03:11:59'),(10,14,'M-512390',NULL,'male','2002-05-14',31,44,45,'Joshua',1,NULL,'A+','+1 (402) 726-4282','Kelly Morse','+1 (705) 223-8746','Cousin',NULL,1,NULL,'2024-08-11 22:41:30','2024-10-08 03:12:53'),(11,15,'M-714384','L001','female','2000-03-01',44,30,28,'Pat C. Werner',1,NULL,'O+','+1 (365) 902-3912','Sophia Gross','+1 (972) 212-6774','Uncle',NULL,1,NULL,'2024-08-11 22:52:52','2024-10-08 03:13:49'),(13,23,'M-714385',NULL,'male',NULL,NULL,NULL,NULL,'Jennifer',1,NULL,'A+','+1 (535) 542-5466',NULL,NULL,NULL,NULL,1,NULL,'2024-10-08 03:34:58','2024-10-08 03:36:55'),(14,24,'M-714386',NULL,'male','2021-01-04',173.2,124.4,12.4,NULL,1,NULL,NULL,'+1 (972) 727-6741',NULL,NULL,NULL,NULL,1,NULL,'2024-10-09 00:50:47','2024-11-09 22:56:06');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_translations`
--

DROP TABLE IF EXISTS `menu_item_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_item_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_item_translations_menu_item_id_foreign` (`menu_item_id`),
  CONSTRAINT `menu_item_translations_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menu_item_translations`
--

LOCK TABLES `menu_item_translations` WRITE;
/*!40000 ALTER TABLE `menu_item_translations` DISABLE KEYS */;
INSERT INTO `menu_item_translations` VALUES (1,1,'en','Home','2024-08-10 22:31:36','2024-10-16 02:40:05'),(2,2,'en','About Us','2024-08-10 22:31:36','2024-08-10 22:31:36'),(3,3,'en','Pricing','2024-08-10 22:31:36','2024-08-10 22:31:36'),(4,4,'en','Pages','2024-08-10 22:31:36','2024-08-10 22:31:36'),(5,5,'en','Contact Us','2024-08-10 22:31:36','2024-08-10 22:31:36'),(6,6,'en','Shop','2024-08-10 22:31:37','2024-08-10 22:31:37'),(7,7,'en','Services','2024-08-10 22:31:37','2024-08-10 22:31:37'),(8,8,'en','Trainers','2024-08-10 22:31:37','2024-08-10 22:31:37'),(9,9,'en','Workouts','2024-08-10 22:31:37','2024-08-10 22:31:37'),(10,10,'en','Photo Gallery','2024-08-10 22:31:37','2024-08-10 22:31:37'),(11,11,'en','Video Gallery','2024-08-10 22:31:37','2024-08-10 22:31:37'),(12,12,'en','Awards','2024-08-10 22:31:37','2024-08-10 22:31:37'),(13,13,'en','FAQ','2024-08-10 22:31:37','2024-08-10 22:31:37'),(16,16,'en','Blog','2024-08-10 22:31:37','2024-08-10 22:31:37'),(17,17,'en','About Us','2024-08-10 22:31:37','2024-08-10 22:31:37'),(18,18,'en','Terms & Conditions','2024-08-10 22:31:37','2024-08-10 22:31:37'),(19,19,'en','Privacy Policy','2024-08-10 22:31:37','2024-08-10 22:31:37'),(20,20,'en','Services','2024-08-10 22:31:37','2024-08-10 22:31:37'),(21,21,'en','Pricing','2024-08-10 22:31:37','2024-08-10 22:31:37'),(22,22,'en','Workout','2024-08-10 22:31:37','2024-08-10 22:31:37'),(23,23,'en','Blog','2024-08-10 22:31:37','2024-08-10 22:31:37'),(24,24,'en','Contact Us','2024-08-10 22:31:37','2024-08-10 22:31:37'),(25,1,'ar','المنزل','2024-08-26 02:03:40','2024-08-26 02:03:40'),(26,2,'ar','من نحن','2024-08-26 02:04:13','2024-08-26 02:04:13'),(27,3,'ar','الأسعار','2024-08-26 02:04:36','2024-08-26 02:04:36'),(28,4,'ar','الصفحات','2024-08-26 02:05:07','2024-08-26 02:05:07'),(29,6,'ar','المنتج','2024-08-26 02:05:30','2024-08-26 02:05:30'),(30,5,'ar','اتصل بنا','2024-08-26 02:05:54','2024-08-26 02:05:54'),(31,7,'ar','الخدمات','2024-08-26 02:06:24','2024-08-26 02:06:24'),(32,8,'ar','المدربون','2024-08-26 02:06:40','2024-08-26 02:06:40'),(33,9,'ar','التمارين','2024-08-26 02:07:02','2024-08-26 02:07:02'),(34,10,'ar','معرض الصور','2024-08-26 02:07:25','2024-08-26 02:07:25'),(35,11,'ar','معرض الفيديو','2024-08-26 02:07:48','2024-08-26 02:07:48'),(36,12,'ar','الجوائز','2024-08-26 02:08:09','2024-08-26 02:08:09'),(37,13,'ar','الأسئلة المتكررة','2024-08-26 02:08:30','2024-08-26 02:08:30'),(40,16,'ar','مدونة','2024-08-26 02:09:35','2024-08-26 02:09:35'),(41,17,'ar','من نحن','2024-08-26 02:11:37','2024-08-26 02:11:37'),(42,19,'ar','سياسة الخصوصية','2024-08-26 02:12:09','2024-08-26 02:12:09'),(43,18,'ar','الشروط والأحكام','2024-08-26 02:12:24','2024-08-26 02:12:24'),(44,20,'ar','الخدمات','2024-08-26 02:12:40','2024-08-26 02:12:40'),(45,21,'ar','الأسعار','2024-08-26 02:13:24','2024-08-26 02:13:24'),(46,22,'ar','التمارين','2024-08-26 02:13:39','2024-08-26 02:13:39'),(47,23,'ar','مدونة','2024-08-26 02:13:56','2024-08-26 02:13:56'),(48,24,'ar','اتصل بنا','2024-08-26 02:14:12','2024-08-26 02:14:12'),(49,27,'en','Privacy Policy','2024-10-07 23:48:16','2024-10-07 23:48:16'),(50,27,'bn','গোপনীয়তা নীতি','2024-10-07 23:48:16','2024-10-16 02:52:46'),(51,27,'ar','سياسة الخصوصية','2024-10-07 23:48:16','2024-10-23 03:18:20'),(52,28,'en','Terms & Conditions','2024-10-07 23:49:25','2024-10-07 23:49:25'),(53,28,'bn','শর্তাবলী ও নিয়মাবলী','2024-10-07 23:49:25','2024-10-16 02:53:07'),(54,28,'ar','الشروط والأحكام','2024-10-07 23:49:25','2024-10-23 03:18:45'),(55,1,'bn','হোম','2024-10-16 02:44:06','2024-10-16 02:44:06'),(56,2,'bn','আমাদের সম্পর্কে','2024-10-16 02:44:35','2024-10-16 02:44:35'),(57,3,'bn','সদস্যপদ','2024-10-16 02:44:53','2024-10-16 02:44:53'),(58,6,'bn','শপ','2024-10-16 02:45:40','2024-10-16 02:45:40'),(59,4,'bn','পেজ','2024-10-16 02:46:40','2024-10-16 02:46:40'),(60,5,'bn','যোগাযোগ','2024-10-16 02:46:59','2024-10-16 02:46:59'),(61,7,'bn','সেবা','2024-10-16 02:47:19','2024-10-16 02:47:19'),(62,8,'bn','ট্রেনার','2024-10-16 02:48:03','2024-10-16 02:48:03'),(63,9,'bn','ওয়ার্কআউট','2024-10-16 02:49:09','2024-10-16 02:49:09'),(64,10,'bn','ইমেজ গ্যালারি','2024-10-16 02:49:53','2024-10-16 02:49:53'),(65,11,'bn','ভিডিও গ্যালারি','2024-10-16 02:50:21','2024-10-16 02:50:21'),(66,12,'bn','পুরস্কার','2024-10-16 02:52:00','2024-10-16 02:52:00'),(67,13,'bn','প্রশ্নোত্তর','2024-10-16 02:52:24','2024-10-16 02:52:24'),(68,16,'bn','ব্লগস','2024-10-16 02:53:26','2024-10-16 02:53:26'),(69,17,'bn','আমাদের সম্পর্কে','2024-11-03 00:54:29','2024-11-03 00:55:20'),(70,18,'bn','শর্তাবলী ও নিয়মাবলী','2024-11-03 00:55:42','2024-11-03 00:55:45'),(71,19,'bn','গোপনীয়তা নীতি','2024-11-03 00:56:17','2024-11-03 00:56:17'),(72,20,'bn','সেবা','2024-11-03 00:56:56','2024-11-03 00:56:56'),(73,21,'bn','মূল্য নির্ধারণ','2024-11-03 00:59:33','2024-11-03 00:59:33'),(74,22,'bn','ওয়ার্কআউট','2024-11-03 00:59:55','2024-11-03 00:59:55'),(75,23,'bn','ব্লগ','2024-11-03 01:00:18','2024-11-03 01:00:18'),(76,24,'bn','যোগাযোগ করুন','2024-11-03 01:00:51','2024-11-03 01:00:51');
/*!40000 ALTER TABLE `menu_item_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  `menu_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,'Home','/',0,1,1,'2024-08-10 22:31:36','2024-10-07 23:59:52'),(2,'About Us','/about-us',0,2,1,'2024-08-10 22:31:36','2024-10-07 23:59:52'),(3,'Pricing','/membership',0,3,1,'2024-08-10 22:31:36','2024-10-07 23:59:52'),(4,'Pages','#',0,5,1,'2024-08-10 22:31:36','2024-10-07 23:59:52'),(5,'Contact Us','/contact',4,1,1,'2024-08-10 22:31:36','2024-09-05 02:39:25'),(6,'Shop','/shop',0,4,1,'2024-08-10 22:31:37','2024-10-07 23:59:52'),(7,'Services','/service',4,2,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(8,'Trainers','/trainer',4,3,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(9,'Workouts','/workout',4,4,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(10,'Photo Gallery','/image-gallery',4,5,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(11,'Video Gallery','/video-gallery',4,6,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(12,'Awards','/award',4,7,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(13,'FAQ','/faqs',4,8,1,'2024-08-10 22:31:37','2024-09-05 02:39:25'),(16,'Blog','/blogs',0,6,1,'2024-08-10 22:31:37','2024-10-07 23:59:52'),(17,'About Us','/about-us',0,0,2,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(18,'Terms & Conditions','/terms-conditions',0,1,2,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(19,'Privacy Policy','/privacy-policy',0,2,2,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(20,'Services','/service',0,3,2,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(21,'Pricing','/membership',0,0,3,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(22,'Workout','/workout',0,1,3,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(23,'Blog','/blogs',0,2,3,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(24,'Contact Us','/contact',0,3,3,'2024-08-10 22:31:37','2024-08-10 22:31:37'),(27,'Privacy Policy','/pages/privacy-policy',4,9,1,'2024-10-07 23:48:16','2024-10-07 23:49:33'),(28,'Terms & Conditions','/pages/terms-conditions',4,11,1,'2024-10-07 23:49:25','2024-10-07 23:59:52');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_translations`
--

DROP TABLE IF EXISTS `menu_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_translations_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menu_translations`
--

LOCK TABLES `menu_translations` WRITE;
/*!40000 ALTER TABLE `menu_translations` DISABLE KEYS */;
INSERT INTO `menu_translations` VALUES (1,1,'en','Main Menu','2024-08-10 22:31:36','2024-08-10 22:31:36'),(2,2,'en','Useful Link','2024-08-10 22:31:37','2024-08-10 22:31:37'),(3,3,'en','Support Desk','2024-08-10 22:31:37','2024-08-10 22:31:37'),(4,1,'ar','Main Menu','2024-08-26 01:01:38','2024-08-26 01:01:38'),(5,2,'ar','رابط مفيد','2024-08-26 01:01:38','2024-08-26 02:18:09'),(6,3,'ar','دعم العملاء','2024-08-26 01:01:38','2024-08-26 02:16:58'),(7,2,'bn','দরকারী লিঙ্ক','2024-11-03 00:57:17','2024-11-03 00:57:17'),(8,1,'bn','প্রধান মেনু','2024-11-03 00:58:35','2024-11-03 00:58:35'),(9,3,'bn','সাপোর্ট ডেস্ক','2024-11-03 00:59:09','2024-11-03 00:59:09');
/*!40000 ALTER TABLE `menu_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Main Menu','main-menu','2024-08-10 22:31:36','2024-08-10 22:31:36'),(2,'رابط مفيد','footer-1-menu','2024-08-10 22:31:37','2024-08-26 02:18:09'),(3,'Support Desk','footer-2-menu','2024-08-10 22:31:37','2024-08-10 22:31:37');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_11_05_045432_create_admins_table',1),(6,'2023_11_05_114814_create_languages_table',1),(7,'2023_11_06_043247_create_settings_table',1),(8,'2023_11_06_054251_create_seo_settings_table',1),(9,'2023_11_06_094842_create_custom_paginations_table',1),(10,'2023_11_06_115856_create_email_templates_table',1),(11,'2023_11_07_051924_create_multi_currencies_table',1),(12,'2023_11_07_103108_create_basic_payments_table',1),(13,'2023_11_07_104315_create_blog_categories_table',1),(14,'2023_11_07_104328_create_blog_category_translations_table',1),(15,'2023_11_07_104336_create_blogs_table',1),(16,'2023_11_07_104343_create_blog_translations_table',1),(17,'2023_11_07_104546_create_blog_comments_table',1),(18,'2023_11_09_035236_create_payment_gateways_table',1),(19,'2023_11_09_100621_create_jobs_table',1),(20,'2023_11_12_052417_create_subscription_plans_table',1),(21,'2023_11_12_064847_create_subscription_histories_table',1),(24,'2023_11_16_035458_add_user_info_to_users',1),(25,'2023_11_16_061508_add_forget_info_to_users',1),(26,'2023_11_16_063639_add_phone_to_users',1),(28,'2023_11_19_055229_add_image_to_users',1),(29,'2023_11_19_064341_create_banned_histories_table',1),(32,'2023_11_21_043030_create_news_letters_table',1),(33,'2023_11_21_094702_create_contact_messages_table',1),(34,'2023_11_22_105539_create_permission_tables',1),(35,'2023_11_29_055540_create_orders_table',1),(36,'2023_11_29_095126_create_coupons_table',1),(37,'2023_11_29_104658_create_testimonials_table',1),(38,'2023_11_29_104704_create_testimonial_translations_table',1),(39,'2023_11_29_105234_create_coupon_histories_table',1),(40,'2023_11_30_041502_create_refund_requests_table',1),(41,'2023_11_30_044838_create_faqs_table',1),(42,'2023_11_30_044844_create_faq_translations_table',1),(43,'2023_11_30_095404_add_wallet_balance_to_users',1),(44,'2023_11_30_101249_create_wallet_histories_table',1),(45,'2023_12_03_052502_add_to_payment_status_wallet_histories',1),(46,'2023_12_04_071839_create_withraw_methods_table',1),(47,'2023_12_04_095319_create_withdraw_requests_table',1),(48,'2023_12_05_090256_create_our_teams_table',1),(49,'2024_01_01_054644_create_socialite_credentials_table',1),(50,'2024_01_03_092007_create_custom_codes_table',1),(51,'2024_01_06_110613_create_states_table',1),(52,'2024_01_06_110643_create_cities_table',1),(53,'2024_02_07_135537_create_contact_pages_table',1),(54,'2024_02_07_145716_create_contact_page_translations_table',1),(55,'2024_02_10_060044_create_configurations_table',1),(56,'2024_02_10_134337_create_pages_utilities_table',1),(57,'2024_02_10_134405_create_pages_utility_translations_table',1),(58,'2024_02_24_092128_add_map_column_to_contact_pages_table',1),(59,'2024_02_28_064128_add_forgot_info_to_admins',1),(60,'2024_02_29_084852_create_taxes_table',1),(61,'2024_03_02_105751_create_media_table',1),(62,'2024_03_04_062506_create_categories_table',1),(63,'2024_03_06_041659_create_specialists_table',1),(64,'2024_03_06_051704_create_trainers_table',1),(65,'2024_03_06_055051_create_members_table',1),(66,'2024_03_06_062121_create_lockers_table',1),(67,'2024_03_06_062435_create_attendances_table',1),(68,'2024_03_06_063355_create_workout_categories_table',1),(69,'2024_03_06_063856_create_tools_table',1),(70,'2024_03_06_064415_create_workouts_table',1),(71,'2024_03_06_071120_create_locations_table',1),(72,'2024_03_06_071146_create_workout_schedules_table',1),(73,'2024_03_06_104037_create_events_table',1),(74,'2024_03_06_105415_create_product_brands_table',1),(75,'2024_03_06_105424_create_products_table',1),(76,'2024_03_06_105447_create_product_attributes_table',1),(77,'2024_03_06_113019_create_facilities_table',1),(78,'2024_03_06_113313_create_gym_services_table',1),(79,'2024_03_07_081851_create_gym_service_translations_table',1),(80,'2024_03_07_081910_create_facility_translations_table',1),(81,'2024_03_07_081929_create_event_translations_table',1),(82,'2024_03_07_082007_create_location_translations_table',1),(83,'2024_03_07_082030_create_product_translations_table',1),(84,'2024_03_07_082045_create_product_brand_translations_table',1),(85,'2024_03_07_082104_create_product_category_translations_table',1),(86,'2024_03_07_082121_create_specialist_translations_table',1),(87,'2024_03_07_082140_create_tool_translations_table',1),(88,'2024_03_07_082158_create_workout_translations_table',1),(89,'2024_03_07_082224_create_workout_category_translations_table',1),(90,'2024_03_07_105225_create_attributes_table',1),(91,'2024_03_07_105405_create_product_categories_table',1),(92,'2024_03_07_105727_create_attribute_values_table',1),(93,'2024_03_07_111404_create_variants_table',1),(94,'2024_03_08_113747_create_workout_enrollments_table',1),(95,'2024_03_10_043027_create_subscription_options_table',1),(96,'2024_03_10_092529_create_locker_histories_table',1),(97,'2024_03_12_111630_create_member_subscriptions_table',1),(98,'2024_03_13_034051_create_payments_table',1),(99,'2024_04_04_071958_add_columns_to_products_table',1),(100,'2024_04_04_114745_create_order_details_table',1),(101,'2024_04_04_115619_create_related_products_table',1),(102,'2024_04_07_055856_create_variant_options_table',1),(103,'2024_04_07_063211_add_status_to_attributes_table',1),(104,'2024_04_21_060305_add_columns_to_orders_table',1),(105,'2024_04_21_070132_create_addresses_table',1),(106,'2024_04_24_091524_add_columns_to_users_table',1),(107,'2024_04_24_141358_create_shipping_methods_table',1),(108,'2024_04_25_074719_create_order_reviews_table',1),(109,'2024_05_07_041530_create_activities_table',1),(110,'2024_05_07_041613_create_activity_translations_table',1),(111,'2024_05_07_063114_add_user_type_column_to_users_table',1),(112,'2024_05_08_035219_create_classes_table',1),(113,'2024_05_08_040339_create_class_activities_table',1),(114,'2024_05_08_040735_create_class_trainers_table',1),(115,'2024_05_08_041045_create_workout_trainers_table',1),(116,'2024_05_08_115334_add_class_start_date_column_to_workouts_table',1),(117,'2024_05_09_050120_add_yearly_price_column_to_subscription_plans_table',1),(118,'2024_05_09_055050_add_free_trial_column_to_subscription_plans_table',1),(119,'2024_05_09_090616_add_columns_to_subscription_histories_table',1),(120,'2024_05_09_112213_add_invoice_id_column_to_subscription_histories_table',1),(121,'2024_05_12_041218_create_services_table',1),(122,'2024_05_12_041307_create_service_translations_table',1),(123,'2024_05_12_041904_create_service_faqs_table',1),(124,'2024_05_12_041951_create_service_faq_translations_table',1),(125,'2024_05_14_075441_create_awards_table',1),(126,'2024_05_15_062257_create_wishlists_table',1),(127,'2024_05_16_070511_create_image_galleries_table',1),(128,'2024_05_16_071655_create_gallery_groups_table',1),(129,'2024_05_16_102629_create_video_galleries_table',1),(130,'2024_05_19_093310_create_home_pages_table',1),(131,'2024_05_19_093347_create_home_page_translations_table',1),(132,'2024_05_19_093642_create_home_page_sliders_table',1),(133,'2024_05_19_093655_create_home_page_slider_translations_table',1),(134,'2024_05_19_110605_add_theme_column_to_home_page_sliders_table',1),(135,'2024_05_21_055741_create_partners_table',1),(136,'2024_05_21_074047_create_counters_table',1),(137,'2024_05_21_074146_create_counter_translations_table',1),(138,'2024_05_23_050404_create_abouts_table',1),(139,'2024_05_23_051514_create_about_translations_table',1),(140,'2024_06_05_070523_create_section_controls_table',2),(141,'2024_06_09_095312_create_section_contents_table',3),(142,'2024_06_09_095528_create_section_content_translations_table',3),(143,'2024_07_14_070356_create_website_utilities_table',4),(144,'2024_03_28_095207_create_menus_wp_table',5),(145,'2024_03_28_095208_create_menu_translations_table',5),(146,'2024_03_28_095209_create_menu_items_wp_table',5),(147,'2024_03_28_095210_create_menu_item_translations_table',5),(148,'2024_08_11_100217_create_workout_contacts_table',6),(149,'2024_03_28_095206_create_custom_addons_table',7),(150,'2024_05_27_045919_create_custom_pages_table',8),(151,'2024_05_27_050016_create_custom_page_translations_table',8),(152,'2024_10_08_034841_create_class_translations_table',9),(153,'2024_11_28_052029_create_attendances_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\Admin',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multi_currencies`
--

DROP TABLE IF EXISTS `multi_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multi_currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_default` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_rate` decimal(8,2) NOT NULL,
  `currency_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'before_price',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `multi_currencies`
--

LOCK TABLES `multi_currencies` WRITE;
/*!40000 ALTER TABLE `multi_currencies` DISABLE KEYS */;
INSERT INTO `multi_currencies` VALUES (1,'$-USD','US','USD','$','yes',1.00,'before_price','active','2024-06-02 05:30:38','2024-06-02 05:30:38'),(2,'₦-Naira','NG','NGN','₦','no',417.35,'before_price','active','2024-06-02 05:30:38','2024-06-02 05:30:38'),(3,'₹-Rupee','IN','INR','₹','no',74.66,'before_price','active','2024-06-02 05:30:38','2024-06-02 05:30:38'),(4,'₱-Peso','PH','PHP','₱','no',55.07,'before_price','active','2024-06-02 05:30:38','2024-06-02 05:30:38'),(5,'$-CAD','CA','CAD','$','no',1.27,'before_price','active','2024-06-02 05:30:38','2024-06-02 05:30:38'),(6,'৳-Taka','BD','BDT','৳','no',80.00,'before_price','active','2024-06-02 05:30:38','2024-06-02 05:30:38');
/*!40000 ALTER TABLE `multi_currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_letters`
--

DROP TABLE IF EXISTS `news_letters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_letters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'not_verified',
  `verify_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `news_letters`
--

LOCK TABLES `news_letters` WRITE;
/*!40000 ALTER TABLE `news_letters` DISABLE KEYS */;
INSERT INTO `news_letters` VALUES (1,'rizvi@gmail.com','not_verified','Dx7x6wkc9Zos8m225tPQoqO6ldYTXK142XvZYwemABxTfdtHwrdNWLO5w543UTTe25BOlK5T3QymqmXCmSLKRIzpdG9nSvviS4XB','2024-09-05 04:23:50','2024-09-05 04:23:50');
/*!40000 ALTER TABLE `news_letters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `variant_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(15,4) NOT NULL,
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (2,2,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-08-25 22:22:09','2024-08-25 22:22:09'),(3,2,11,'CardioMaster Elliptical Trainer','90238353',NULL,900.0000,1,900.0000,NULL,1,NULL,'2024-08-25 22:22:09','2024-08-25 22:22:09'),(4,3,10,'PulseFit Smart Watch','91622935',NULL,180.0000,1,180.0000,NULL,1,NULL,'2024-08-25 22:54:20','2024-08-25 22:54:20'),(5,3,7,'CoreMaster Ab Roller','24028981',NULL,75.0000,1,75.0000,NULL,1,NULL,'2024-08-25 22:54:20','2024-08-25 22:54:20'),(6,4,5,'Midnight Sneakers','42158258',NULL,100.0000,1,100.0000,NULL,1,NULL,'2024-08-25 22:57:40','2024-08-25 22:57:40'),(7,4,6,'PowerLift Pro Dumbbells','74042121',NULL,120.0000,1,120.0000,NULL,1,NULL,'2024-08-25 22:57:40','2024-08-25 22:57:40'),(8,5,4,'Bench Press','11273818',NULL,100.0000,1,100.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(9,5,7,'CoreMaster Ab Roller','24028981',NULL,75.0000,1,75.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(10,5,8,'Velocity Speed Jump Rope','67124283',NULL,80.0000,1,80.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(11,5,9,'Titan Strength Bench','35463664',NULL,500.0000,1,500.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(12,5,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(13,5,11,'CardioMaster Elliptical Trainer','90238353',NULL,900.0000,1,900.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(14,5,10,'PulseFit Smart Watch','91622935',NULL,180.0000,1,180.0000,NULL,1,NULL,'2024-08-25 23:08:18','2024-08-25 23:08:18'),(15,6,4,'Bench Press','11273818',NULL,100.0000,1,100.0000,NULL,1,NULL,'2024-08-26 01:16:18','2024-08-26 01:16:18'),(16,6,6,'PowerLift Pro Dumbbells','74042121',NULL,120.0000,1,120.0000,NULL,1,NULL,'2024-08-26 01:16:18','2024-08-26 01:16:18'),(17,6,5,'Midnight Sneakers','42158258',NULL,100.0000,1,100.0000,NULL,1,NULL,'2024-08-26 01:16:18','2024-08-26 01:16:18'),(18,7,11,'CardioMaster Elliptical Trainer','90238353',NULL,900.0000,1,900.0000,NULL,1,NULL,'2024-08-27 22:06:09','2024-08-27 22:06:09'),(19,8,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-10-27 00:51:43','2024-10-27 00:51:43'),(20,9,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-10-28 02:39:10','2024-10-28 02:39:10'),(21,12,10,'PulseFit Smart Watch','91622935',NULL,180.0000,1,180.0000,NULL,1,NULL,'2024-10-28 02:45:19','2024-10-28 02:45:19'),(22,13,4,'Bench Press','11273818',NULL,100.0000,1,100.0000,NULL,1,NULL,'2024-10-28 02:49:00','2024-10-28 02:49:00'),(23,14,3,'Adjustable Hand Grip','39531357',NULL,332.0000,1,332.0000,NULL,1,NULL,'2024-10-28 02:51:13','2024-10-28 02:51:13'),(24,15,8,'Velocity Speed Jump Rope','67124283',NULL,80.0000,1,80.0000,NULL,1,NULL,'2024-10-28 02:53:00','2024-10-28 02:53:00'),(25,18,7,'CoreMaster Ab Roller','24028981',NULL,75.0000,1,75.0000,NULL,1,NULL,'2024-10-28 03:02:23','2024-10-28 03:02:23'),(26,19,6,'PowerLift Pro Dumbbells','74042121',NULL,120.0000,1,120.0000,NULL,1,NULL,'2024-11-09 22:52:29','2024-11-09 22:52:29'),(27,20,8,'Velocity Speed Jump Rope','67124283',NULL,80.0000,1,80.0000,NULL,1,NULL,'2024-11-10 02:03:04','2024-11-10 02:03:04'),(28,21,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-11-19 05:13:20','2024-11-19 05:13:20'),(29,22,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-11-19 05:43:20','2024-11-19 05:43:20'),(30,23,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-11-19 21:29:48','2024-11-19 21:29:48'),(31,24,8,'Velocity Speed Jump Rope','67124283',NULL,80.0000,1,80.0000,NULL,1,NULL,'2024-11-19 21:52:04','2024-11-19 21:52:04'),(32,25,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-11-19 21:59:54','2024-11-19 21:59:54'),(33,26,12,'Stair Climber','71850976',NULL,800.0000,1,800.0000,NULL,1,NULL,'2024-11-19 22:01:04','2024-11-19 22:01:04'),(34,27,11,'CardioMaster Elliptical','90238353',NULL,900.0000,1,900.0000,NULL,1,NULL,'2024-11-19 22:07:10','2024-11-19 22:07:10');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_reviews`
--

DROP TABLE IF EXISTS `order_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `seller_id` bigint unsigned DEFAULT NULL,
  `rating` tinyint NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_reviews_order_id_foreign` (`order_id`),
  KEY `order_reviews_product_id_foreign` (`product_id`),
  KEY `order_reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `order_reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `order_reviews`
--

LOCK TABLES `order_reviews` WRITE;
/*!40000 ALTER TABLE `order_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `walk_in_customer` tinyint(1) DEFAULT NULL,
  `address_id` bigint unsigned DEFAULT NULL,
  `billing_id` bigint unsigned DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `order_delivery_date` date DEFAULT NULL,
  `payment_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `payment_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `order_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `total_amount` decimal(8,2) NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_status` enum('pending','success','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `order_status` enum('pending','success','rejected','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `delivery_method` int NOT NULL DEFAULT '1' COMMENT '1- Delivery, 2- Pickup',
  `delivery_status` int NOT NULL DEFAULT '1' COMMENT '1- Pending, 2- Accept, 3- Progress, 4- On the way, 5- Delivered, 6- Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_cancel_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `currency_rate` double(8,2) NOT NULL DEFAULT '0.00',
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `invoice_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,'129208215',22,0,6,6,200,0,170,NULL,'0',NULL,NULL,1730.00,'Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','Direct Bank',NULL,'success','success',1,5,'2024-08-25 22:22:09','2024-08-25 23:43:53',NULL,NULL,'1700',NULL,NULL,1.00,'$-USD','$',NULL),(3,'1257113025',22,0,NULL,7,NULL,0,25.5,NULL,'0',NULL,NULL,229.50,'txn_3PruwULdrMGLvvfW0ADJdEkI','Stripe',NULL,'success','success',2,5,'2024-08-25 22:54:20','2024-08-25 23:43:30',NULL,NULL,'255',NULL,NULL,1.00,'$-USD','$',NULL),(4,'831156036',22,0,6,6,100,0,NULL,NULL,'0',NULL,NULL,320.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','success',1,5,'2024-08-25 22:57:40','2024-08-25 23:40:48',NULL,NULL,'220',NULL,NULL,1.00,'$-USD','$',NULL),(5,'915240937',22,0,NULL,7,200,0,NULL,NULL,'0',NULL,NULL,2835.00,'txn_3PrvA1LdrMGLvvfW17BSBcEj','Stripe',NULL,'success','success',2,5,'2024-08-25 23:08:18','2024-08-25 23:40:26',NULL,NULL,'2635',NULL,NULL,1.00,'$-USD','$',NULL),(6,'178603814',3,0,10,10,NULL,0,NULL,NULL,'0',NULL,NULL,320.00,'txn_3Prx9uLdrMGLvvfW1J2SYnBd','Stripe',NULL,'success','pending',1,1,'2024-08-26 01:16:18','2024-08-26 01:16:18',NULL,NULL,'320',NULL,NULL,1.00,'$-USD','$',NULL),(7,'1703628737',1,0,NULL,NULL,0,0,0,NULL,'1',NULL,NULL,900.00,NULL,'paypal','1','success','success',2,2,'2024-08-27 22:06:08','2024-08-27 22:06:08',NULL,NULL,'900',NULL,NULL,1.00,'$-USD','$',NULL),(8,'1578047989',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,333880.00,'4314368746','Paystack',NULL,'success','pending',2,1,'2024-10-27 00:51:42','2024-10-27 00:51:42',NULL,NULL,'800',NULL,NULL,1.00,'$-USD','$',NULL),(9,'41753445',2,0,NULL,3,100,0,NULL,NULL,'0',NULL,NULL,333880.00,'4317913852','Paystack',NULL,'success','pending',2,1,'2024-10-28 02:39:09','2024-10-28 02:39:09',NULL,NULL,'800',NULL,NULL,1.00,'$-USD','$',NULL),(10,'1443290447',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,180.00,'pi_3QEoWJLdrMGLvvfW3xJtOQNQ','Stripe',NULL,'success','pending',2,1,'2024-10-28 02:41:57','2024-10-28 02:41:57',NULL,NULL,'180',NULL,NULL,1.00,'$-USD','$',NULL),(11,'1034969872',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,180.00,'pi_3QEoWJLdrMGLvvfW3xJtOQNQ','Stripe',NULL,'success','pending',2,1,'2024-10-28 02:44:54','2024-10-28 02:44:54',NULL,NULL,'180',NULL,NULL,1.00,'$-USD','$',NULL),(12,'905587942',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,180.00,'pi_3QEoWJLdrMGLvvfW3xJtOQNQ','Stripe',NULL,'success','pending',2,1,'2024-10-28 02:45:19','2024-10-28 02:45:19',NULL,NULL,'180',NULL,NULL,1.00,'$-USD','$',NULL),(13,'1022056500',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,100.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-10-28 02:48:59','2024-10-28 02:48:59',NULL,NULL,'100',NULL,NULL,1.00,'$-USD','$',NULL),(14,'1381942086',2,0,NULL,3,NULL,16.6,NULL,NULL,'0',NULL,NULL,348.60,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-10-28 02:51:13','2024-10-28 02:51:13',NULL,NULL,'332',NULL,NULL,1.00,'$-USD','$',NULL),(15,'887101864',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,80.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-10-28 02:53:00','2024-10-28 02:53:00',NULL,NULL,'80',NULL,NULL,1.00,'$-USD','$',NULL),(16,'1103795894',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,75.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-10-28 03:01:08','2024-10-28 03:01:08',NULL,NULL,'75',NULL,NULL,1.00,'$-USD','$',NULL),(17,'20846202',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,75.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-10-28 03:01:26','2024-10-28 03:01:26',NULL,NULL,'75',NULL,NULL,1.00,'$-USD','$',NULL),(18,'1507016087',2,0,NULL,3,NULL,0,NULL,NULL,'0',NULL,NULL,75.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-10-28 03:02:18','2024-10-28 03:02:18',NULL,NULL,'75',NULL,NULL,1.00,'$-USD','$',NULL),(19,'1645203527',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,120.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-11-09 22:52:24','2024-11-09 22:52:24',NULL,NULL,'120',NULL,NULL,1.00,'$-USD','$',NULL),(20,'1676650724',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,80.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-11-10 02:03:00','2024-11-10 02:03:00',NULL,NULL,'80',NULL,NULL,1.00,'$-USD','$',NULL),(21,'1268186988',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,800.00,'tr_D6oWLnzrRr','Mollie',NULL,'success','pending',2,1,'2024-11-19 05:13:11','2024-11-19 05:13:11',NULL,NULL,'800',NULL,NULL,1.27,'$-CAD','$',NULL),(22,'1553245677',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,800.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-11-19 05:43:12','2024-11-19 05:43:12',NULL,NULL,'800',NULL,NULL,1.27,'$-CAD','$',NULL),(23,'34345848',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,800.00,'pay_PNPXrK1U3HAk89','Razorpay',NULL,'success','pending',2,1,'2024-11-19 21:29:37','2024-11-19 21:29:37',NULL,NULL,'800',NULL,NULL,74.66,'₹-Rupee','₹',NULL),(24,'1087454789',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,80.00,'S6QJBTAJ7NFQA','Paypal',NULL,'success','pending',2,1,'2024-11-19 21:51:56','2024-11-19 21:51:56',NULL,NULL,'80',NULL,NULL,1.00,'$-USD','$',NULL),(25,'778278397',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,800.00,'Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','Direct Bank',NULL,'pending','pending',2,1,'2024-11-19 21:59:48','2024-11-19 21:59:48',NULL,NULL,'800',NULL,NULL,1.00,'$-USD','$',NULL),(26,'1458041502',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,800.00,'Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','Direct Bank',NULL,'pending','pending',2,1,'2024-11-19 22:00:57','2024-11-19 22:00:57',NULL,NULL,'800',NULL,NULL,74.66,'₹-Rupee','₹',NULL),(27,'416042801',24,0,NULL,12,NULL,0,NULL,NULL,'0',NULL,NULL,900.00,'pi_3QN5BtLdrMGLvvfW23bNVFok','Stripe',NULL,'success','pending',2,1,'2024-11-19 22:07:04','2024-11-19 22:07:04',NULL,NULL,'900',NULL,NULL,1.00,'$-USD','$',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `our_teams`
--

DROP TABLE IF EXISTS `our_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `our_teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `twitter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `instagram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `our_teams`
--

LOCK TABLES `our_teams` WRITE;
/*!40000 ALTER TABLE `our_teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `our_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_utilities`
--

DROP TABLE IF EXISTS `pages_utilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages_utilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `login_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `register_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forget_password_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_password_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_payment_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_app_button_status` tinyint(1) DEFAULT NULL,
  `ios_app_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `android_app_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cta_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cta_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price_range` int DEFAULT '20000',
  `experience_image` varchar(255) DEFAULT NULL,
  `class_time_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `pages_utilities`
--

LOCK TABLES `pages_utilities` WRITE;
/*!40000 ALTER TABLE `pages_utilities` DISABLE KEYS */;
INSERT INTO `pages_utilities` VALUES (1,'uploads/custom-images/wsus-img-2024-06-06-11-29-23-2862.jpg','uploads/custom-images/wsus-img-2024-06-06-11-29-23-5244.jpg','uploads/custom-images/wsus-img-2024-06-06-11-29-23-6942.jpg','uploads/custom-images/wsus-img-2024-06-06-11-29-23-1272.jpg',NULL,1,NULL,NULL,'2024-06-06 04:59:20','2024-09-04 22:54:31','fab fa-whatsapp','callto:1234567890',2000,'uploads/custom-images/wsus-img-2024-09-05-04-54-31-3366.png','uploads/custom-images/wsus-img-2024-09-05-04-54-31-9918.jpg');
/*!40000 ALTER TABLE `pages_utilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_utility_translations`
--

DROP TABLE IF EXISTS `pages_utility_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages_utility_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pages_utility_id` bigint unsigned NOT NULL,
  `lang_code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `footer_copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `app_download_now_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cta_button` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `experience_title` varchar(255) DEFAULT NULL,
  `time_table_title` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `award_title` varchar(255) DEFAULT NULL,
  `faq_title` varchar(255) DEFAULT NULL,
  `membership_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_utility_translations_pages_utility_id_foreign` (`pages_utility_id`),
  CONSTRAINT `pages_utility_translations_pages_utility_id_foreign` FOREIGN KEY (`pages_utility_id`) REFERENCES `pages_utilities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `pages_utility_translations`
--

LOCK TABLES `pages_utility_translations` WRITE;
/*!40000 ALTER TABLE `pages_utility_translations` DISABLE KEYS */;
INSERT INTO `pages_utility_translations` VALUES (1,1,'en','© 2024 WebSolutionUs.','Download now','2024-06-06 05:04:22','2024-10-16 00:13:02','Talk to a Specialist','My Experience','Class Time Table','Get Our Services For you','Award Winners!','Frequently Asked Questions','FITNESS CLASSES PRICING PLAN'),(2,1,'ar','© 2024 ويب سولوشن أس','قم بالتنزيل الآن','2024-08-26 01:01:41','2024-10-16 00:26:14','تحدث إلى أحد المتخصصين','تجربتي','الجدول الزمني للفصل','احصل على خدماتنا من أجلك','الفائزون بالجائزة!','الأسئلة المتداولة','خطة تسعير دروس اللياقة البدنية'),(3,1,'bn','© 2024 WebSolutionUs.','এখনই ডাউনলোড করুন','2024-11-03 00:28:03','2024-11-03 00:31:31','একজন বিশেষজ্ঞের সাথে কথা বলুন','আমার অভিজ্ঞতা','ক্লাস টাইম টেবিল','আপনার জন্য আমাদের পরিষেবা পান','পুরস্কার বিজয়ীরা!','প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী','ফিটনেস ক্লাস প্রাইসিং প্ল্যান');
/*!40000 ALTER TABLE `pages_utility_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'uploads/custom-images/partner/wsus-img-2024-07-11-09-35-35-4684.png',NULL,1,NULL,'2024-07-11 03:35:35','2024-07-11 03:35:35'),(2,'uploads/custom-images/partner/wsus-img-2024-07-11-09-35-59-7869.png',NULL,1,NULL,'2024-07-11 03:35:59','2024-07-11 03:35:59'),(3,'uploads/custom-images/partner/wsus-img-2024-07-11-09-36-54-8804.png',NULL,1,NULL,'2024-07-11 03:36:54','2024-07-11 03:36:54'),(4,'uploads/custom-images/partner/wsus-img-2024-07-11-09-37-15-2862.png',NULL,1,NULL,'2024-07-11 03:37:15','2024-07-11 03:37:15'),(5,'uploads/custom-images/partner/wsus-img-2024-07-11-09-37-38-6817.png',NULL,1,NULL,'2024-07-11 03:37:38','2024-07-11 03:37:38'),(6,'uploads/custom-images/partner/wsus-img-2024-07-11-09-38-37-9879.png',NULL,1,NULL,'2024-07-11 03:38:37','2024-07-11 03:38:37'),(7,'uploads/custom-images/partner/wsus-img-2024-07-11-09-39-01-1328.png',NULL,1,NULL,'2024-07-11 03:39:01','2024-07-11 03:39:01'),(8,'uploads/custom-images/partner/wsus-img-2024-07-11-09-39-22-2129.png',NULL,1,NULL,'2024-07-11 03:39:22','2024-07-11 03:39:22');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_gateways`
--

DROP TABLE IF EXISTS `payment_gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_gateways` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `payment_gateways`
--

LOCK TABLES `payment_gateways` WRITE;
/*!40000 ALTER TABLE `payment_gateways` DISABLE KEYS */;
INSERT INTO `payment_gateways` VALUES (1,'razorpay_key','rzp_test_k23Mr4BskGqpBu','2024-06-02 05:30:39','2024-12-01 03:22:51'),(2,'razorpay_secret','LTrXh7U5xWeZoAHcqdhemFkg','2024-06-02 05:30:39','2024-12-01 03:22:51'),(3,'razorpay_name','WebSolutionUs','2024-06-02 05:30:39','2024-12-01 03:22:51'),(4,'razorpay_description','This is test payment window','2024-06-02 05:30:39','2024-12-01 03:22:51'),(5,'razorpay_charge','0','2024-06-02 05:30:39','2024-12-01 03:22:51'),(6,'razorpay_theme_color','#6d0ce4','2024-06-02 05:30:39','2024-12-01 03:22:51'),(7,'razorpay_status','active','2024-06-02 05:30:39','2024-12-01 03:22:51'),(8,'razorpay_currency_id','3','2024-06-02 05:30:39','2024-12-01 03:22:51'),(9,'razorpay_image','uploads/website-images/razorpay.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(10,'flutterwave_public_key','FLWPUBK_TEST-30e42cf6c5ef2062ceda4be024b2dab0-X','2024-06-02 05:30:39','2024-09-25 21:56:11'),(11,'flutterwave_secret_key','FLWSECK_TEST-8007291fe9fdc301e571dd668bfffe40-X','2024-06-02 05:30:39','2024-09-25 21:56:11'),(12,'flutterwave_app_name','WebSolutionUs','2024-06-02 05:30:39','2024-09-25 21:56:11'),(13,'flutterwave_charge','0','2024-06-02 05:30:39','2024-09-25 21:56:11'),(14,'flutterwave_currency_id','2','2024-06-02 05:30:39','2024-09-25 21:56:11'),(15,'flutterwave_status','active','2024-06-02 05:30:39','2024-09-25 21:56:11'),(16,'flutterwave_image','uploads/website-images/flutterwave.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(17,'paystack_public_key','pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38','2024-06-02 05:30:39','2024-06-02 05:30:39'),(18,'paystack_secret_key','sk_test_77cb93329abbdc18104466e694c9f720a7d69c97','2024-06-02 05:30:39','2024-06-02 05:30:39'),(19,'paystack_status','active','2024-06-02 05:30:39','2024-06-02 05:30:39'),(20,'paystack_charge','0','2024-06-02 05:30:39','2024-06-02 05:30:39'),(21,'paystack_image','uploads/website-images/paystack.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(22,'paystack_currency_id','2','2024-06-02 05:30:39','2024-06-02 05:30:39'),(23,'mollie_key','test_HFc5UhscNSGD5jujawhtNFs3wM3B4n','2024-06-02 05:30:39','2024-09-25 21:58:19'),(24,'mollie_charge','0','2024-06-02 05:30:39','2024-09-25 21:58:19'),(25,'mollie_image','uploads/website-images/mollie.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(26,'mollie_status','active','2024-06-02 05:30:39','2024-09-25 21:58:19'),(27,'mollie_currency_id','5','2024-06-02 05:30:39','2024-09-25 21:58:19'),(28,'instamojo_account_mode','Sandbox','2024-06-02 05:30:39','2024-10-30 03:41:37'),(29,'instamojo_api_key','instamojo-test-348949439-api-key','2024-06-02 05:30:39','2024-10-30 03:41:37'),(30,'instamojo_auth_token','instamojo-auth-348949439-token','2024-06-02 05:30:39','2024-10-30 03:41:37'),(31,'instamojo_charge','0','2024-06-02 05:30:39','2024-10-30 03:41:37'),(32,'instamojo_image','uploads/website-images/instamojo.png','2024-06-02 05:30:39','2024-06-02 05:30:39'),(33,'instamojo_currency_id','3','2024-06-02 05:30:39','2024-10-30 03:41:37'),(34,'instamojo_status','inactive','2024-06-02 05:30:39','2024-10-30 03:41:37');
/*!40000 ALTER TABLE `payment_gateways` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `subscription_id` bigint unsigned DEFAULT NULL,
  `enrollment_id` bigint unsigned DEFAULT NULL,
  `order_id` bigint unsigned DEFAULT NULL,
  `payment_confirmation_by` bigint unsigned DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'USD',
  `payment_type` enum('recurring','one-time') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'one-time',
  `payment_mode` enum('manual','automatic') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'manual',
  `payment_for` enum('subscription','workout','order') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'subscription',
  `payment_status` enum('pending','success','due','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `total_amount` double(8,2) NOT NULL,
  `due_amount` double DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `paid_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `refunded_at` timestamp NULL DEFAULT NULL,
  `failed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_rate` double(8,2) DEFAULT NULL,
  `paid_amount` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_user_id_foreign` (`user_id`),
  KEY `payments_subscription_id_foreign` (`subscription_id`),
  KEY `payments_enrollment_id_foreign` (`enrollment_id`),
  KEY `payments_order_id_foreign` (`order_id`),
  KEY `payments_payment_confirmation_by_foreign` (`payment_confirmation_by`),
  CONSTRAINT `payments_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `workout_enrollments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_payment_confirmation_by_foreign` FOREIGN KEY (`payment_confirmation_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payments_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscription_histories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (2,2,1,NULL,NULL,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','','success',2000.00,0,1,NULL,NULL,NULL,NULL,'2024-06-03 00:59:41','2024-06-03 00:59:41',NULL,NULL),(3,2,NULL,1,NULL,NULL,'Direct Bank','Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','$-USD','one-time','automatic','workout','success',20.00,0,1,NULL,NULL,NULL,NULL,'2024-06-03 22:20:38','2024-06-03 22:20:38',NULL,NULL),(5,2,NULL,3,NULL,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','workout','success',500.00,0,1,NULL,NULL,NULL,NULL,'2024-06-03 23:05:41','2024-06-03 23:05:41',NULL,NULL),(15,3,NULL,NULL,6,NULL,'Stripe','txn_3Prx9uLdrMGLvvfW1J2SYnBd','$-USD','one-time','automatic','order','success',320.00,0,1,NULL,NULL,NULL,NULL,'2024-08-26 01:16:18','2024-08-26 01:16:18',NULL,NULL),(16,24,NULL,NULL,NULL,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','','success',3000.00,0,1,NULL,NULL,NULL,NULL,'2024-10-09 00:50:47','2024-10-09 00:50:47',NULL,NULL),(17,24,9,NULL,NULL,NULL,'Direct Bank','Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','$-USD','one-time','automatic','','pending',2000.00,0,1,NULL,NULL,NULL,NULL,'2024-10-09 01:06:25','2024-10-09 01:06:25',NULL,NULL),(18,24,NULL,NULL,8,NULL,'Paystack','4314368746','$-USD','one-time','automatic','order','success',333880.00,0,1,NULL,NULL,NULL,NULL,'2024-10-27 00:51:43','2024-10-27 00:51:43',NULL,NULL),(19,2,NULL,NULL,9,NULL,'Paystack','4317913852','$-USD','one-time','automatic','order','success',333880.00,0,1,NULL,NULL,NULL,NULL,'2024-10-28 02:39:10','2024-10-28 02:39:10',NULL,NULL),(20,2,NULL,NULL,12,NULL,'Stripe','pi_3QEoWJLdrMGLvvfW3xJtOQNQ','$-USD','one-time','automatic','order','success',180.00,0,1,NULL,NULL,NULL,NULL,'2024-10-28 02:45:19','2024-10-28 02:45:19',NULL,NULL),(21,2,NULL,NULL,13,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',100.00,0,1,NULL,NULL,NULL,NULL,'2024-10-28 02:49:00','2024-10-28 02:49:00',NULL,NULL),(22,2,NULL,NULL,14,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',348.60,0,1,NULL,NULL,NULL,NULL,'2024-10-28 02:51:13','2024-10-28 02:51:13',NULL,NULL),(23,2,NULL,NULL,15,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',80.00,0,1,NULL,NULL,NULL,NULL,'2024-10-28 02:53:00','2024-10-28 02:53:00',NULL,NULL),(24,2,NULL,NULL,18,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',75.00,0,1,NULL,NULL,NULL,NULL,'2024-10-28 03:02:23','2024-10-28 03:02:23',NULL,NULL),(25,24,NULL,NULL,19,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',120.00,0,1,NULL,NULL,NULL,NULL,'2024-11-09 22:52:29','2024-11-09 22:52:29',NULL,NULL),(26,24,NULL,NULL,20,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',80.00,0,1,NULL,NULL,NULL,NULL,'2024-11-10 02:03:04','2024-11-10 02:03:04',NULL,NULL),(27,24,NULL,NULL,21,NULL,'Mollie','tr_D6oWLnzrRr','$-CAD','one-time','automatic','order','success',800.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 05:13:20','2024-11-19 05:13:20',NULL,NULL),(28,24,NULL,NULL,22,NULL,'Paypal','S6QJBTAJ7NFQA','$-CAD','one-time','automatic','order','success',800.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 05:43:20','2024-11-19 05:43:20',NULL,NULL),(29,24,NULL,NULL,23,NULL,'Razorpay','pay_PNPXrK1U3HAk89','₹-Rupee','one-time','automatic','order','success',800.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 21:29:48','2024-11-19 21:29:48',NULL,NULL),(30,24,NULL,NULL,24,NULL,'Paypal','S6QJBTAJ7NFQA','$-USD','one-time','automatic','order','success',80.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 21:52:04','2024-11-19 21:52:04',NULL,NULL),(31,24,NULL,NULL,25,NULL,'Direct Bank','Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','$-USD','one-time','automatic','order','pending',800.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 21:59:54','2024-11-19 21:59:54',NULL,NULL),(32,24,NULL,NULL,26,NULL,'Direct Bank','Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','₹-Rupee','one-time','automatic','order','pending',800.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 22:01:04','2024-11-19 22:01:04',NULL,NULL),(33,24,NULL,NULL,27,NULL,'Stripe','pi_3QN5BtLdrMGLvvfW23bNVFok','$-USD','one-time','automatic','order','success',900.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 22:07:10','2024-11-19 22:07:10',NULL,NULL),(34,24,10,NULL,NULL,NULL,'Stripe','pi_3QN5LqLdrMGLvvfW2uGs0tBl','$-USD','one-time','automatic','','success',100.00,0,1,NULL,NULL,NULL,NULL,'2024-11-19 22:17:25','2024-11-19 22:17:25',NULL,NULL);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'dashboard.view','admin','dashboard','2024-12-01 04:58:22','2024-12-01 04:58:22'),(2,'admin.profile.view','admin','admin profile','2024-12-01 04:58:22','2024-12-01 04:58:22'),(3,'admin.profile.edit','admin','admin profile','2024-12-01 04:58:22','2024-12-01 04:58:22'),(4,'admin.profile.update','admin','admin profile','2024-12-01 04:58:22','2024-12-01 04:58:22'),(5,'admin.profile.delete','admin','admin profile','2024-12-01 04:58:22','2024-12-01 04:58:22'),(6,'admin.view','admin','admin','2024-12-01 04:58:23','2024-12-01 04:58:23'),(7,'admin.create','admin','admin','2024-12-01 04:58:23','2024-12-01 04:58:23'),(8,'admin.store','admin','admin','2024-12-01 04:58:23','2024-12-01 04:58:23'),(9,'admin.edit','admin','admin','2024-12-01 04:58:23','2024-12-01 04:58:23'),(10,'admin.update','admin','admin','2024-12-01 04:58:23','2024-12-01 04:58:23'),(11,'admin.delete','admin','admin','2024-12-01 04:58:23','2024-12-01 04:58:23'),(12,'blog.category.view','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(13,'blog.category.create','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(14,'blog.category.translate','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(15,'blog.category.store','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(16,'blog.category.edit','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(17,'blog.category.update','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(18,'blog.category.delete','admin','blog category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(19,'product.category.view','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(20,'product.category.create','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(21,'product.category.translate','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(22,'product.category.store','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(23,'product.category.edit','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(24,'product.category.update','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(25,'product.category.delete','admin','Product category','2024-12-01 04:58:23','2024-12-01 04:58:23'),(26,'product.attribute.view','admin','Product attribute','2024-12-01 04:58:23','2024-12-01 04:58:23'),(27,'product.attribute.create','admin','Product attribute','2024-12-01 04:58:23','2024-12-01 04:58:23'),(28,'product.attribute.store','admin','Product attribute','2024-12-01 04:58:23','2024-12-01 04:58:23'),(29,'product.attribute.edit','admin','Product attribute','2024-12-01 04:58:23','2024-12-01 04:58:23'),(30,'product.attribute.update','admin','Product attribute','2024-12-01 04:58:23','2024-12-01 04:58:23'),(31,'product.attribute.delete','admin','Product attribute','2024-12-01 04:58:23','2024-12-01 04:58:23'),(32,'product.brand.view','admin','Product brand','2024-12-01 04:58:23','2024-12-01 04:58:23'),(33,'product.brand.create','admin','Product brand','2024-12-01 04:58:23','2024-12-01 04:58:23'),(34,'product.brand.translate','admin','Product brand','2024-12-01 04:58:23','2024-12-01 04:58:23'),(35,'product.brand.store','admin','Product brand','2024-12-01 04:58:23','2024-12-01 04:58:23'),(36,'product.brand.edit','admin','Product brand','2024-12-01 04:58:24','2024-12-01 04:58:24'),(37,'product.brand.update','admin','Product brand','2024-12-01 04:58:24','2024-12-01 04:58:24'),(38,'product.brand.delete','admin','Product brand','2024-12-01 04:58:24','2024-12-01 04:58:24'),(39,'product.view','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(40,'product.create','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(41,'product.translate','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(42,'product.store','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(43,'product.edit','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(44,'product.update','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(45,'product.delete','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(46,'product.gallery','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(47,'product.gallery.update','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(48,'product.related.product.view','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(49,'product.related.product.update','admin','Product','2024-12-01 04:58:24','2024-12-01 04:58:24'),(50,'product.variant.view','admin','Product Variant','2024-12-01 04:58:24','2024-12-01 04:58:24'),(51,'product.variant.create','admin','Product Variant','2024-12-01 04:58:24','2024-12-01 04:58:24'),(52,'product.variant.store','admin','Product Variant','2024-12-01 04:58:24','2024-12-01 04:58:24'),(53,'product.variant.edit','admin','Product Variant','2024-12-01 04:58:24','2024-12-01 04:58:24'),(54,'product.variant.update','admin','Product Variant','2024-12-01 04:58:24','2024-12-01 04:58:24'),(55,'product.variant.delete','admin','Product Variant','2024-12-01 04:58:24','2024-12-01 04:58:24'),(56,'state.view','admin','State','2024-12-01 04:58:24','2024-12-01 04:58:24'),(57,'state.create','admin','State','2024-12-01 04:58:24','2024-12-01 04:58:24'),(58,'state.store','admin','State','2024-12-01 04:58:24','2024-12-01 04:58:24'),(59,'state.edit','admin','State','2024-12-01 04:58:24','2024-12-01 04:58:24'),(60,'state.update','admin','State','2024-12-01 04:58:24','2024-12-01 04:58:24'),(61,'state.delete','admin','State','2024-12-01 04:58:24','2024-12-01 04:58:24'),(62,'shipping.view','admin','Shipping','2024-12-01 04:58:24','2024-12-01 04:58:24'),(63,'shipping.create','admin','Shipping','2024-12-01 04:58:24','2024-12-01 04:58:24'),(64,'shipping.store','admin','Shipping','2024-12-01 04:58:24','2024-12-01 04:58:24'),(65,'shipping.edit','admin','Shipping','2024-12-01 04:58:24','2024-12-01 04:58:24'),(66,'shipping.update','admin','Shipping','2024-12-01 04:58:24','2024-12-01 04:58:24'),(67,'shipping.delete','admin','Shipping','2024-12-01 04:58:24','2024-12-01 04:58:24'),(68,'tax.view','admin','Tax','2024-12-01 04:58:24','2024-12-01 04:58:24'),(69,'tax.create','admin','Tax','2024-12-01 04:58:24','2024-12-01 04:58:24'),(70,'tax.store','admin','Tax','2024-12-01 04:58:24','2024-12-01 04:58:24'),(71,'tax.edit','admin','Tax','2024-12-01 04:58:24','2024-12-01 04:58:24'),(72,'tax.update','admin','Tax','2024-12-01 04:58:25','2024-12-01 04:58:25'),(73,'tax.delete','admin','Tax','2024-12-01 04:58:25','2024-12-01 04:58:25'),(74,'city.view','admin','City','2024-12-01 04:58:25','2024-12-01 04:58:25'),(75,'city.create','admin','City','2024-12-01 04:58:25','2024-12-01 04:58:25'),(76,'city.store','admin','City','2024-12-01 04:58:25','2024-12-01 04:58:25'),(77,'city.edit','admin','City','2024-12-01 04:58:25','2024-12-01 04:58:25'),(78,'city.update','admin','City','2024-12-01 04:58:25','2024-12-01 04:58:25'),(79,'city.delete','admin','City','2024-12-01 04:58:25','2024-12-01 04:58:25'),(80,'specialty.view','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(81,'specialty.create','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(82,'specialty.translate','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(83,'specialty.store','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(84,'specialty.edit','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(85,'specialty.update','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(86,'specialty.delete','admin','Specialty','2024-12-01 04:58:25','2024-12-01 04:58:25'),(87,'trainer.view','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(88,'trainer.create','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(89,'trainer.bulk.mail','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(90,'trainer.store','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(91,'trainer.edit','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(92,'trainer.update','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(93,'trainer.delete','admin','trainer','2024-12-01 04:58:25','2024-12-01 04:58:25'),(94,'workout.view','admin','workout','2024-12-01 04:58:25','2024-12-01 04:58:25'),(95,'workout.create','admin','workout','2024-12-01 04:58:25','2024-12-01 04:58:25'),(96,'workout.translate','admin','workout','2024-12-01 04:58:25','2024-12-01 04:58:25'),(97,'workout.store','admin','workout','2024-12-01 04:58:25','2024-12-01 04:58:25'),(98,'workout.edit','admin','workout','2024-12-01 04:58:25','2024-12-01 04:58:25'),(99,'workout.update','admin','workout','2024-12-01 04:58:26','2024-12-01 04:58:26'),(100,'workout.delete','admin','workout','2024-12-01 04:58:26','2024-12-01 04:58:26'),(101,'activity.view','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(102,'activity.create','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(103,'activity.translate','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(104,'activity.store','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(105,'activity.edit','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(106,'activity.update','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(107,'activity.delete','admin','activity','2024-12-01 04:58:26','2024-12-01 04:58:26'),(108,'class.view','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(109,'class.create','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(110,'class.translate','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(111,'class.store','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(112,'class.edit','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(113,'class.update','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(114,'class.delete','admin','Class','2024-12-01 04:58:26','2024-12-01 04:58:26'),(115,'gallery.group.view','admin','Gallery Group','2024-12-01 04:58:26','2024-12-01 04:58:26'),(116,'gallery.group.create','admin','Gallery Group','2024-12-01 04:58:26','2024-12-01 04:58:26'),(117,'gallery.group.store','admin','Gallery Group','2024-12-01 04:58:26','2024-12-01 04:58:26'),(118,'gallery.group.edit','admin','Gallery Group','2024-12-01 04:58:26','2024-12-01 04:58:26'),(119,'gallery.group.update','admin','Gallery Group','2024-12-01 04:58:26','2024-12-01 04:58:26'),(120,'gallery.group.delete','admin','Gallery Group','2024-12-01 04:58:26','2024-12-01 04:58:26'),(121,'gallery.image.view','admin','Gallery Image','2024-12-01 04:58:26','2024-12-01 04:58:26'),(122,'gallery.image.create','admin','Gallery Image','2024-12-01 04:58:26','2024-12-01 04:58:26'),(123,'gallery.image.store','admin','Gallery Image','2024-12-01 04:58:26','2024-12-01 04:58:26'),(124,'gallery.image.edit','admin','Gallery Image','2024-12-01 04:58:26','2024-12-01 04:58:26'),(125,'gallery.image.update','admin','Gallery Image','2024-12-01 04:58:27','2024-12-01 04:58:27'),(126,'gallery.image.delete','admin','Gallery Image','2024-12-01 04:58:27','2024-12-01 04:58:27'),(127,'gallery.video.view','admin','Gallery Video','2024-12-01 04:58:27','2024-12-01 04:58:27'),(128,'gallery.video.create','admin','Gallery Video','2024-12-01 04:58:27','2024-12-01 04:58:27'),(129,'gallery.video.store','admin','Gallery Video','2024-12-01 04:58:27','2024-12-01 04:58:27'),(130,'gallery.video.edit','admin','Gallery Video','2024-12-01 04:58:27','2024-12-01 04:58:27'),(131,'gallery.video.update','admin','Gallery Video','2024-12-01 04:58:27','2024-12-01 04:58:27'),(132,'gallery.video.delete','admin','Gallery Video','2024-12-01 04:58:27','2024-12-01 04:58:27'),(133,'service.view','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(134,'service.create','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(135,'service.translate','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(136,'service.store','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(137,'service.edit','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(138,'service.update','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(139,'service.delete','admin','Service','2024-12-01 04:58:27','2024-12-01 04:58:27'),(140,'service.message.view','admin','Service Message','2024-12-01 04:58:27','2024-12-01 04:58:27'),(141,'service.message.delete','admin','Service Message','2024-12-01 04:58:27','2024-12-01 04:58:27'),(142,'award.view','admin','Award','2024-12-01 04:58:27','2024-12-01 04:58:27'),(143,'award.create','admin','Award','2024-12-01 04:58:27','2024-12-01 04:58:27'),(144,'award.store','admin','Award','2024-12-01 04:58:27','2024-12-01 04:58:27'),(145,'award.edit','admin','Award','2024-12-01 04:58:27','2024-12-01 04:58:27'),(146,'award.update','admin','Award','2024-12-01 04:58:27','2024-12-01 04:58:27'),(147,'award.delete','admin','Award','2024-12-01 04:58:28','2024-12-01 04:58:28'),(148,'partner.view','admin','Partner','2024-12-01 04:58:28','2024-12-01 04:58:28'),(149,'partner.create','admin','Partner','2024-12-01 04:58:28','2024-12-01 04:58:28'),(150,'partner.store','admin','Partner','2024-12-01 04:58:28','2024-12-01 04:58:28'),(151,'partner.edit','admin','Partner','2024-12-01 04:58:28','2024-12-01 04:58:28'),(152,'partner.update','admin','Partner','2024-12-01 04:58:28','2024-12-01 04:58:28'),(153,'partner.delete','admin','Partner','2024-12-01 04:58:28','2024-12-01 04:58:28'),(154,'website.content.view','admin','Website Manage','2024-12-01 04:58:28','2024-12-01 04:58:28'),(155,'website.content.update','admin','Website Manage','2024-12-01 04:58:28','2024-12-01 04:58:28'),(156,'blog.view','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(157,'blog.create','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(158,'blog.translate','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(159,'blog.store','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(160,'blog.edit','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(161,'blog.update','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(162,'blog.delete','admin','blog','2024-12-01 04:58:28','2024-12-01 04:58:28'),(163,'blog.comment.view','admin','blog Comment','2024-12-01 04:58:28','2024-12-01 04:58:28'),(164,'blog.comment.reply','admin','blog Comment','2024-12-01 04:58:28','2024-12-01 04:58:28'),(165,'blog.comment.update','admin','blog Comment','2024-12-01 04:58:28','2024-12-01 04:58:28'),(166,'blog.comment.delete','admin','blog Comment','2024-12-01 04:58:28','2024-12-01 04:58:28'),(167,'role.view','admin','role','2024-12-01 04:58:28','2024-12-01 04:58:28'),(168,'role.create','admin','role','2024-12-01 04:58:29','2024-12-01 04:58:29'),(169,'role.store','admin','role','2024-12-01 04:58:29','2024-12-01 04:58:29'),(170,'role.assign','admin','role','2024-12-01 04:58:29','2024-12-01 04:58:29'),(171,'role.edit','admin','role','2024-12-01 04:58:29','2024-12-01 04:58:29'),(172,'role.update','admin','role','2024-12-01 04:58:29','2024-12-01 04:58:29'),(173,'role.delete','admin','role','2024-12-01 04:58:29','2024-12-01 04:58:29'),(174,'setting.view','admin','settings','2024-12-01 04:58:29','2024-12-01 04:58:29'),(175,'setting.update','admin','settings','2024-12-01 04:58:29','2024-12-01 04:58:29'),(176,'setting.system.view','admin','settings','2024-12-01 04:58:29','2024-12-01 04:58:29'),(177,'setting.system.update','admin','settings','2024-12-01 04:58:29','2024-12-01 04:58:29'),(178,'basic.payment.view','admin','basic payment','2024-12-01 04:58:29','2024-12-01 04:58:29'),(179,'basic.payment.update','admin','basic payment','2024-12-01 04:58:29','2024-12-01 04:58:29'),(180,'contact.message.view','admin','contact message','2024-12-01 04:58:29','2024-12-01 04:58:29'),(181,'contact.message.delete','admin','contact message','2024-12-01 04:58:29','2024-12-01 04:58:29'),(182,'currency.view','admin','currency','2024-12-01 04:58:29','2024-12-01 04:58:29'),(183,'currency.create','admin','currency','2024-12-01 04:58:29','2024-12-01 04:58:29'),(184,'currency.store','admin','currency','2024-12-01 04:58:29','2024-12-01 04:58:29'),(185,'currency.edit','admin','currency','2024-12-01 04:58:29','2024-12-01 04:58:29'),(186,'currency.update','admin','currency','2024-12-01 04:58:29','2024-12-01 04:58:29'),(187,'currency.delete','admin','currency','2024-12-01 04:58:30','2024-12-01 04:58:30'),(188,'counter.view','admin','counter','2024-12-01 04:58:30','2024-12-01 04:58:30'),(189,'counter.create','admin','counter','2024-12-01 04:58:30','2024-12-01 04:58:30'),(190,'counter.store','admin','counter','2024-12-01 04:58:30','2024-12-01 04:58:30'),(191,'counter.edit','admin','counter','2024-12-01 04:58:30','2024-12-01 04:58:30'),(192,'counter.update','admin','counter','2024-12-01 04:58:30','2024-12-01 04:58:30'),(193,'counter.delete','admin','counter','2024-12-01 04:58:30','2024-12-01 04:58:30'),(194,'media.view','admin','media','2024-12-01 04:58:30','2024-12-01 04:58:30'),(195,'customer.view','admin','customer','2024-12-01 04:58:30','2024-12-01 04:58:30'),(196,'customer.bulk.mail','admin','customer','2024-12-01 04:58:30','2024-12-01 04:58:30'),(197,'customer.update','admin','customer','2024-12-01 04:58:30','2024-12-01 04:58:30'),(198,'customer.delete','admin','customer','2024-12-01 04:58:30','2024-12-01 04:58:30'),(199,'member.list','admin','member','2024-12-01 04:58:30','2024-12-01 04:58:30'),(200,'member.view','admin','member','2024-12-01 04:58:30','2024-12-01 04:58:30'),(201,'member.create','admin','member','2024-12-01 04:58:30','2024-12-01 04:58:30'),(202,'member.bulk.mail','admin','member','2024-12-01 04:58:30','2024-12-01 04:58:30'),(203,'member.store','admin','member','2024-12-01 04:58:30','2024-12-01 04:58:30'),(204,'member.edit','admin','member','2024-12-01 04:58:30','2024-12-01 04:58:30'),(205,'member.update','admin','member','2024-12-01 04:58:31','2024-12-01 04:58:31'),(206,'member.delete','admin','member','2024-12-01 04:58:31','2024-12-01 04:58:31'),(207,'attendance.list','admin','Attendance','2024-12-01 04:58:31','2024-12-01 04:58:31'),(208,'attendance.create','admin','Attendance','2024-12-01 04:58:31','2024-12-01 04:58:31'),(209,'attendance.store','admin','Attendance','2024-12-01 04:58:31','2024-12-01 04:58:31'),(210,'attendance.update','admin','Attendance','2024-12-01 04:58:31','2024-12-01 04:58:31'),(211,'locker.list','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(212,'locker.view','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(213,'locker.create','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(214,'locker.store','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(215,'locker.edit','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(216,'locker.update','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(217,'locker.delete','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(218,'locker.assign','admin','locker','2024-12-01 04:58:31','2024-12-01 04:58:31'),(219,'language.view','admin','language','2024-12-01 04:58:31','2024-12-01 04:58:31'),(220,'language.create','admin','language','2024-12-01 04:58:31','2024-12-01 04:58:31'),(221,'language.store','admin','language','2024-12-01 04:58:31','2024-12-01 04:58:31'),(222,'language.edit','admin','language','2024-12-01 04:58:31','2024-12-01 04:58:31'),(223,'language.update','admin','language','2024-12-01 04:58:32','2024-12-01 04:58:32'),(224,'language.delete','admin','language','2024-12-01 04:58:32','2024-12-01 04:58:32'),(225,'language.translate','admin','language','2024-12-01 04:58:32','2024-12-01 04:58:32'),(226,'language.single.translate','admin','language','2024-12-01 04:58:32','2024-12-01 04:58:32'),(227,'menu.view','admin','menu builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(228,'menu.create','admin','menu builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(229,'menu.store','admin','menu builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(230,'menu.edit','admin','menu builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(231,'menu.update','admin','menu builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(232,'menu.delete','admin','menu builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(233,'page.view','admin','page builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(234,'page.create','admin','page builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(235,'page.store','admin','page builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(236,'page.edit','admin','page builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(237,'page.update','admin','page builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(238,'page.delete','admin','page builder','2024-12-01 04:58:32','2024-12-01 04:58:32'),(239,'coupon.view','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(240,'coupon.create','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(241,'coupon.store','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(242,'coupon.edit','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(243,'coupon.update','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(244,'coupon.delete','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(245,'coupon.history','admin','Coupon','2024-12-01 04:58:33','2024-12-01 04:58:33'),(246,'order.view','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(247,'order.create','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(248,'order.store','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(249,'order.edit','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(250,'order.update','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(251,'order.delete','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(252,'order.assign','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(253,'order.history','admin','Order','2024-12-01 04:58:33','2024-12-01 04:58:33'),(254,'order.payment.history','admin','Order Payment History','2024-12-01 04:58:33','2024-12-01 04:58:33'),(255,'order.payment.update','admin','Order Payment History','2024-12-01 04:58:34','2024-12-01 04:58:34'),(256,'subscription.view','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(257,'subscription.create','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(258,'subscription.store','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(259,'subscription.edit','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(260,'subscription.update','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(261,'subscription.delete','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(262,'subscription.assign','admin','subscription','2024-12-01 04:58:34','2024-12-01 04:58:34'),(263,'subscription.option.view','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(264,'subscription.option.create','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(265,'subscription.option.store','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(266,'subscription.option.edit','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(267,'subscription.option.update','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(268,'subscription.option.delete','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(269,'subscription.option.assign','admin','subscription option','2024-12-01 04:58:34','2024-12-01 04:58:34'),(270,'payment.view','admin','payment','2024-12-01 04:58:35','2024-12-01 04:58:35'),(271,'payment.update','admin','payment','2024-12-01 04:58:35','2024-12-01 04:58:35'),(272,'newsletter.view','admin','newsletter','2024-12-01 04:58:35','2024-12-01 04:58:35'),(273,'newsletter.mail','admin','newsletter','2024-12-01 04:58:35','2024-12-01 04:58:35'),(274,'newsletter.delete','admin','newsletter','2024-12-01 04:58:35','2024-12-01 04:58:35'),(275,'testimonial.view','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(276,'testimonial.create','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(277,'testimonial.translate','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(278,'testimonial.store','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(279,'testimonial.edit','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(280,'testimonial.update','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(281,'testimonial.delete','admin','testimonial','2024-12-01 04:58:35','2024-12-01 04:58:35'),(282,'faq.view','admin','faq','2024-12-01 04:58:35','2024-12-01 04:58:35'),(283,'faq.create','admin','faq','2024-12-01 04:58:35','2024-12-01 04:58:35'),(284,'faq.translate','admin','faq','2024-12-01 04:58:36','2024-12-01 04:58:36'),(285,'faq.store','admin','faq','2024-12-01 04:58:36','2024-12-01 04:58:36'),(286,'faq.edit','admin','faq','2024-12-01 04:58:36','2024-12-01 04:58:36'),(287,'faq.update','admin','faq','2024-12-01 04:58:36','2024-12-01 04:58:36'),(288,'faq.delete','admin','faq','2024-12-01 04:58:36','2024-12-01 04:58:36'),(289,'addon.view','admin','Addons','2024-12-01 04:58:36','2024-12-01 04:58:36'),(290,'addon.install','admin','Addons','2024-12-01 04:58:36','2024-12-01 04:58:36'),(291,'addon.update','admin','Addons','2024-12-01 04:58:36','2024-12-01 04:58:36'),(292,'addon.status.change','admin','Addons','2024-12-01 04:58:36','2024-12-01 04:58:36'),(293,'addon.remove','admin','Addons','2024-12-01 04:58:36','2024-12-01 04:58:36');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_attributes_slug_unique` (`slug`),
  KEY `product_attributes_product_id_foreign` (`product_id`),
  CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_attributes`
--

LOCK TABLES `product_attributes` WRITE;
/*!40000 ALTER TABLE `product_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_brand_translations`
--

DROP TABLE IF EXISTS `product_brand_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_brand_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_brand_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_brand_translations_product_brand_id_foreign` (`product_brand_id`),
  CONSTRAINT `product_brand_translations_product_brand_id_foreign` FOREIGN KEY (`product_brand_id`) REFERENCES `product_brands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_brand_translations`
--

LOCK TABLES `product_brand_translations` WRITE;
/*!40000 ALTER TABLE `product_brand_translations` DISABLE KEYS */;
INSERT INTO `product_brand_translations` VALUES (1,1,'en','Life Fitness',NULL,'2024-06-02 05:31:17','2024-08-12 02:12:36'),(2,2,'en','Technogym',NULL,'2024-06-02 05:31:17','2024-08-12 02:17:04'),(3,3,'en','Cybex',NULL,'2024-06-02 05:31:17','2024-08-12 02:18:26'),(4,4,'en','Precor',NULL,'2024-06-02 05:31:17','2024-08-12 02:19:46'),(5,5,'en','True Fitness',NULL,'2024-06-02 05:31:17','2024-08-12 02:21:14'),(6,1,'bn','আপেল',NULL,'2024-06-02 21:53:11','2024-11-02 21:57:57'),(7,2,'bn','Samsung',NULL,'2024-06-02 21:53:11','2024-06-02 21:53:11'),(8,3,'bn','হুয়াওয়ে',NULL,'2024-06-02 21:53:11','2024-11-02 21:58:43'),(9,4,'bn','শাওমি',NULL,'2024-06-02 21:53:11','2024-11-02 21:59:11'),(10,5,'bn','অপো',NULL,'2024-06-02 21:53:11','2024-11-02 21:59:39'),(11,6,'en','NordicTrack',NULL,'2024-08-12 02:23:43','2024-08-12 02:23:43'),(12,6,'bn','নর্ডিকট্র্যাক',NULL,'2024-08-12 02:23:43','2024-11-02 22:00:06'),(13,7,'en','Gym gear',NULL,'2024-08-12 02:25:13','2024-08-12 02:25:13'),(14,7,'bn','জিম গিয়ার',NULL,'2024-08-12 02:25:13','2024-11-02 22:00:32'),(15,8,'en','Rogue Fitness',NULL,'2024-08-12 02:26:32','2024-08-12 02:26:32'),(16,8,'bn','দুর্বৃত্ত ফিটনেস',NULL,'2024-08-12 02:26:32','2024-11-02 22:01:04'),(17,9,'en','Star Trac',NULL,'2024-08-12 02:32:12','2024-08-12 02:32:12'),(18,9,'bn','স্টার ট্র্যাক',NULL,'2024-08-12 02:32:12','2024-11-02 22:01:34'),(19,10,'en','Escape Fitness',NULL,'2024-08-12 02:40:35','2024-08-12 02:40:35'),(20,10,'bn','এস্কেপ ফিটনেস',NULL,'2024-08-12 02:40:35','2024-11-02 22:02:06'),(21,11,'en','Adidas',NULL,'2024-08-13 03:20:40','2024-08-13 03:20:40'),(22,11,'bn','অ্যাডিডাস',NULL,'2024-08-13 03:20:40','2024-11-02 22:02:49'),(23,1,'ar','لايف فيتنس','<p>لايف فيتنس</p>','2024-08-26 01:01:39','2024-10-23 01:56:29'),(24,2,'ar','تكنوجيم',NULL,'2024-08-26 01:01:39','2024-10-23 01:57:02'),(25,3,'ar','سايبكس',NULL,'2024-08-26 01:01:39','2024-10-23 01:57:38'),(26,4,'ar','أنا أصلِّي',NULL,'2024-08-26 01:01:39','2024-10-23 01:58:05'),(27,5,'ar','اللياقة الحقيقية',NULL,'2024-08-26 01:01:39','2024-10-23 01:58:33'),(28,6,'ar','NordicTrack',NULL,'2024-08-26 01:01:39','2024-08-26 01:01:39'),(29,7,'ar','Gym gear',NULL,'2024-08-26 01:01:39','2024-08-26 01:01:39'),(30,8,'ar','Rogue Fitness',NULL,'2024-08-26 01:01:39','2024-08-26 01:01:39'),(31,9,'ar','Star Trac',NULL,'2024-08-26 01:01:39','2024-08-26 01:01:39'),(32,10,'ar','Escape Fitness',NULL,'2024-08-26 01:01:39','2024-08-26 01:01:39'),(33,11,'ar','Adidas',NULL,'2024-08-26 01:01:39','2024-08-26 01:01:39');
/*!40000 ALTER TABLE `product_brand_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_brands`
--

DROP TABLE IF EXISTS `product_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_brands`
--

LOCK TABLES `product_brands` WRITE;
/*!40000 ALTER TABLE `product_brands` DISABLE KEYS */;
INSERT INTO `product_brands` VALUES (1,'life-fitness','uploads/custom-images/wsus-img-2024-10-08-11-13-50-3436.png','1','2024-06-02 05:31:17','2024-10-08 05:13:50'),(2,'technogym','uploads/custom-images/wsus-img-2024-10-08-11-14-34-2267.png','1','2024-06-02 05:31:17','2024-10-08 05:14:34'),(3,'cybex','uploads/custom-images/wsus-img-2024-10-08-11-16-41-9625.png','1','2024-06-02 05:31:17','2024-10-08 05:16:41'),(4,'precor','uploads/custom-images/wsus-img-2024-10-08-11-19-11-8311.png','1','2024-06-02 05:31:17','2024-10-08 05:19:11'),(5,'true-fitness','uploads/custom-images/wsus-img-2024-10-08-11-20-56-8057.png','1','2024-06-02 05:31:17','2024-10-08 05:20:56'),(6,'nordictrack','uploads/custom-images/wsus-img-2024-10-08-11-21-33-4438.png','1','2024-08-12 02:23:43','2024-10-08 05:21:33'),(7,'gym-gear','uploads/custom-images/wsus-img-2024-10-08-11-22-28-6484.png','1','2024-08-12 02:25:13','2024-10-08 05:22:28'),(8,'rogue-fitness','uploads/custom-images/wsus-img-2024-10-08-11-23-08-6085.png','1','2024-08-12 02:26:32','2024-10-08 05:23:08'),(9,'star-trac','uploads/custom-images/wsus-img-2024-10-08-11-23-49-8356.png','1','2024-08-12 02:32:12','2024-10-08 05:23:49'),(10,'escape-fitness','uploads/custom-images/wsus-img-2024-10-08-11-24-28-5851.png','1','2024-08-12 02:40:35','2024-10-08 05:24:28'),(11,'adidas','uploads/custom-images/wsus-img-2024-10-08-11-25-15-1054.png','1','2024-08-13 03:20:40','2024-10-08 05:25:15');
/*!40000 ALTER TABLE `product_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,1,1,NULL,NULL),(5,2,1,NULL,NULL),(6,4,4,NULL,NULL),(8,6,4,NULL,NULL),(9,7,3,NULL,NULL),(10,8,2,NULL,NULL),(11,9,5,NULL,NULL),(12,10,5,NULL,NULL),(13,11,4,NULL,NULL),(14,12,1,NULL,NULL),(16,3,1,NULL,NULL),(17,5,0,NULL,NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category_translations`
--

DROP TABLE IF EXISTS `product_category_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_translations_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `product_category_translations_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_category_translations`
--

LOCK TABLES `product_category_translations` WRITE;
/*!40000 ALTER TABLE `product_category_translations` DISABLE KEYS */;
INSERT INTO `product_category_translations` VALUES (1,1,'en','Strength Training','Strength Training','2024-06-02 05:31:17','2024-08-12 01:39:18'),(2,2,'en','Resistance Training','Resistance Training','2024-06-02 05:31:17','2024-08-12 01:39:44'),(3,3,'en','Yoga & Pilates','Yoga & Pilates','2024-06-02 05:31:17','2024-08-12 01:40:39'),(4,4,'en','Strength Equipment','Strength Equipment','2024-06-02 05:31:17','2024-08-12 01:43:35'),(5,1,'bn','পোশাক','পোশাক','2024-06-02 21:53:11','2024-11-02 21:48:04'),(6,2,'bn','জুতা','জুতা','2024-06-02 21:53:11','2024-11-02 21:48:44'),(7,3,'bn','আনুষাঙ্গিক','আনুষাঙ্গিক','2024-06-02 21:53:11','2024-11-02 21:49:27'),(8,4,'bn','যন্ত্রপাতি','যন্ত্রপাতি','2024-06-02 21:53:11','2024-11-02 21:50:00'),(9,5,'en','Cardio Training',NULL,'2024-08-12 01:41:47','2024-08-12 01:41:47'),(10,5,'bn','কার্ডিও প্রশিক্ষণ',NULL,'2024-08-12 01:41:47','2024-11-02 21:50:50'),(11,6,'en','Cardio Machines',NULL,'2024-08-12 01:42:53','2024-08-12 01:42:53'),(12,6,'bn','কার্ডিও মেশিন',NULL,'2024-08-12 01:42:53','2024-11-02 21:55:37'),(13,7,'en','Gym Supplies',NULL,'2024-08-12 01:43:56','2024-08-12 01:43:56'),(14,7,'bn','জিম সরবরাহ',NULL,'2024-08-12 01:43:56','2024-11-02 21:56:27'),(15,8,'en','Athletic Shoes',NULL,'2024-08-13 03:23:07','2024-08-13 03:23:07'),(16,8,'bn','অ্যাথলেটিক জুতা',NULL,'2024-08-13 03:23:07','2024-11-02 21:57:05'),(17,1,'ar','تدريب القوة','تدريب القوة','2024-08-26 01:01:39','2024-10-08 04:11:50'),(18,2,'ar','تدريب المقاومة','تدريب المقاومة','2024-08-26 01:01:39','2024-10-23 01:52:28'),(19,3,'ar','اليوغا والبيلاتس','اليوغا والبيلاتس','2024-08-26 01:01:39','2024-10-23 01:53:12'),(20,4,'ar','معدات القوة','معدات القوة','2024-08-26 01:01:39','2024-10-23 01:51:39'),(21,5,'ar','تدريب القلب','تدريب القلب','2024-08-26 01:01:39','2024-10-23 01:53:52'),(22,6,'ar','آلات القلب','آلات القلب','2024-08-26 01:01:39','2024-10-23 01:54:26'),(23,7,'ar','مستلزمات الصالة الرياضية','مستلزمات الصالة الرياضية','2024-08-26 01:01:39','2024-10-23 01:55:05'),(24,8,'ar','أحذية رياضية','أحذية رياضية','2024-08-26 01:01:39','2024-10-08 04:13:27');
/*!40000 ALTER TABLE `product_category_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_translations`
--

DROP TABLE IF EXISTS `product_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `additional_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_translations_product_id_foreign` (`product_id`),
  CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_translations`
--

LOCK TABLES `product_translations` WRITE;
/*!40000 ALTER TABLE `product_translations` DISABLE KEYS */;
INSERT INTO `product_translations` VALUES (1,1,'en','Chest Press Machine','A Chest Press Machine is a popular piece of equipment used in strength training to target the pectoral muscles, along with secondary involvement from the deltoids and triceps.','<p>A Chest Press Machine is a popular piece of equipment used in strength training to target the pectoral muscles, along with secondary involvement from the deltoids and triceps. The machine provides a safer and more controlled alternative to free weight exercises like the bench press, making it ideal for beginners and those focused on muscle isolation.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Target Muscles:</strong> Primarily the pectoral muscles, with secondary engagement of the deltoids and triceps.</li>\r\n<li><strong>Adjustable Seat:</strong> Most machines come with an adjustable seat to align the handles with your chest, ensuring proper form and reducing the risk of injury.</li>\r\n<li><strong>Weight Stack or Plate Loaded:</strong> Some machines use a selectorized weight stack, making it easy to adjust the weight, while others are plate-loaded, allowing for more incremental adjustments.</li>\r\n<li><strong>Grip Positions:</strong> Typically, machines offer multiple grip positions to target different parts of the chest.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"product\\\"},{\\\"value\\\":\\\"test\\\"}]\"',NULL,NULL,NULL,'2024-06-02 22:43:58','2024-09-08 02:18:53'),(2,1,'bn','নোলা বেন্ডার','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"product\\\"},{\\\"value\\\":\\\"test\\\"}]\"',NULL,NULL,NULL,'2024-06-02 22:43:58','2024-11-02 22:28:28'),(3,2,'en','Seated Dip Machine','The Seated Dip Machine is a strength training apparatus designed to target the triceps, with secondary engagement of the chest and shoulders.','<p>The Seated Dip Machine is a strength training apparatus designed to target the triceps, with secondary engagement of the chest and shoulders. It offers a controlled environment to perform dips, which are typically a bodyweight exercise, allowing for adjustable resistance and a safer alternative to free dips.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Target Muscles:</strong> Primarily the triceps, with secondary activation of the pectoral muscles and anterior deltoids.</li>\r\n<li><strong>Adjustable Seat:</strong> Allows users to align their body properly with the handles, ensuring correct form and reducing the risk of injury.</li>\r\n<li><strong>Weight Stack or Plate Loaded:</strong> Similar to other resistance machines, seated dip machines may be selectorized (with a weight stack) or plate-loaded, offering different ways to adjust the resistance.</li>\r\n<li><strong>Range of Motion:</strong> Machines often include adjustable levers or arm paths to tailor the range of motion to the user&rsquo;s preference.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handles, adjustable seat, and a smooth weight stack system. Designed with biomechanics in mind to ensure proper muscle engagement and minimize strain.</li>\r\n<li><strong>Application:</strong> Suitable for both commercial and home gyms, particularly for users seeking a high-quality, reliable machine.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Dip Machine:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm movement allows for balanced muscle development. The plate-loaded design mimics the feel of free weights, providing a more natural resistance curve.</li>\r\n<li><strong>Application:</strong> Ideal for strength training facilities and athletes looking for a robust and effective triceps workout.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth, guided motion with a focus on user comfort. Multiple grip positions allow for variation in muscle targeting. The weight stack is easy to adjust, making it accessible for all fitness levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and fitness centers due to its ergonomic design and ease of use.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable arm paths, ergonomic seating, and intuitive resistance adjustment. The machine is built with durability and user comfort in mind, providing a smooth and consistent workout experience.</li>\r\n<li><strong>Application:</strong> Suitable for both commercial and home gyms, focusing on durability and ease of use.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Low starting resistance for beginners, with smooth motion and easy seat adjustments. The machine is designed to offer a natural movement path, reducing joint strain while maximizing muscle activation.</li>\r\n<li><strong>Application:</strong> Ideal for a wide range of users, from beginners to experienced athletes, and commonly found in both commercial and home gyms.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<h3>Benefits of a Seated Dip Machine:</h3>\r\n<ul>\r\n<li><strong>Controlled Environment:</strong> Unlike bodyweight dips, the machine allows for controlled resistance and movement, reducing the risk of injury.</li>\r\n<li><strong>Adjustable Resistance:</strong> Users can tailor the resistance to their strength level, making it accessible to both beginners and advanced users.</li>\r\n<li><strong>Isolation of the Triceps:</strong> The machine\'s design ensures that the triceps are the primary muscle group being worked, with less involvement of other muscle groups, leading to more targeted development.</li>\r\n</ul>','\"[{\\\"value\\\":\\\"Machine\\\"},{\\\"value\\\":\\\"strength training\\\"}]\"',NULL,NULL,NULL,'2024-06-02 22:46:50','2024-09-08 02:21:51'),(4,2,'bn','ওরা রেমন্ড','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"helo\\\"},{\\\"value\\\":\\\"world\\\"}]\"',NULL,NULL,NULL,'2024-06-02 22:46:50','2024-11-02 22:28:02'),(5,3,'en','Adjustable Hand Grip','An Adjustable Hand Grip is a compact fitness device designed to strengthen the muscles of the hand, wrist, and forearm.','<p>An Adjustable Hand Grip is a compact fitness device designed to strengthen the muscles of the hand, wrist, and forearm. It\'s particularly useful for improving grip strength, which is essential for various sports, everyday activities, and rehabilitation purposes. The device typically consists of two handles connected by a tension spring, with the resistance level adjustable to accommodate different strength levels.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Adjustable Resistance:</strong> The primary feature of adjustable hand grips is the ability to change the resistance level, usually by turning a knob or dial. This allows users to progressively increase the challenge as their grip strength improves.</li>\r\n<li><strong>Ergonomic Design:</strong> Handles are often ergonomically shaped and may be coated with rubber or foam for comfort and better grip, reducing strain on the hands during use.</li>\r\n<li><strong>Portability:</strong> Due to their small size, adjustable hand grips are easy to carry, making them ideal for use at home, in the office, or while traveling.</li>\r\n<li><strong>Durability:</strong> High-quality hand grips are made from durable materials like stainless steel, reinforced plastic, and high-tension springs to withstand frequent use.</li>\r\n</ul>\r\n<h3>&nbsp;</h3>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Gripmaster Pro Hand Grip Exerciser:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Offers independent finger resistance, allowing each finger to be exercised separately. It has multiple resistance levels, ranging from light to heavy, making it suitable for all fitness levels.</li>\r\n<li><strong>Application:</strong> Ideal for musicians, athletes, and anyone looking to enhance finger dexterity and grip strength.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Captains of Crush Hand Gripper:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Known for its durability and high resistance levels, ranging from beginner to advanced. It has a knurled aluminum handle for a secure grip and comes in various models with different tension levels.</li>\r\n<li><strong>Application:</strong> Preferred by serious strength trainers and athletes aiming to develop maximum grip strength.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>IronMind Expand-Your-Hand Bands:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Hand Grip Strengthener (with adjustable resistance)</li>\r\n<li><strong>Features:</strong> Includes a set of bands with different resistance levels, specifically designed to strengthen the extensor muscles in the hands, balancing grip strength development.</li>\r\n<li><strong>Application:</strong> Used in conjunction with traditional hand grippers for a comprehensive hand workout, beneficial for climbers, weightlifters, and those recovering from hand injuries.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Luxon Adjustable Hand Grip Strengthener:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Features a resistance range from 10 to 60 kg, with an easily adjustable dial. The handles are coated with soft rubber for comfort, and the spring mechanism is designed for durability.</li>\r\n<li><strong>Application:</strong> Suitable for general fitness enthusiasts, seniors, and those undergoing rehabilitation.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Heavy Grips Hand Gripper:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Provides a range of resistance from 100 lbs to 350 lbs, catering to users at different levels of grip strength. Made with aluminum handles and a high-tension spring, it&rsquo;s built for durability.</li>\r\n<li><strong>Application:</strong> Targeted at serious strength athletes, particularly those focused on improving grip strength for powerlifting, rock climbing, and other demanding sports.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<h3>Benefits of Using an Adjustable Hand Grip:</h3>\r\n<ul>\r\n<li><strong>Increased Grip Strength:</strong> Essential for various physical activities, from lifting weights to playing musical instruments.</li>\r\n<li><strong>Enhanced Forearm Muscles:</strong> Regular use also strengthens the forearm muscles, contributing to better overall arm strength and endurance.</li>\r\n<li><strong>Rehabilitation and Injury Prevention:</strong> Particularly beneficial for individuals recovering from hand injuries or surgeries, helping restore strength and flexibility.</li>\r\n<li><strong>Portable and Convenient:</strong> Small and lightweight, making it easy to use anywhere, anytime.</li>\r\n</ul>\r\n<p>Adjustable hand grips are versatile tools that can benefit anyone from athletes to those looking to maintain hand strength and dexterity as they age.</p>','\"[{\\\"value\\\":\\\"Adjustable\\\"},{\\\"value\\\":\\\"Hand Grip\\\"}]\"',NULL,NULL,NULL,'2024-06-03 21:23:59','2024-09-08 02:22:26'),(6,3,'bn','অ্যাডজাস্টেবল হ্যান্ড গ্রিপ 5-60 কেজি - এই অ্যাডজাস্টেবল হ্যান্ড গ্রিপ ব্যবহার করে স্পষ্টতা এবং আরামের সাথে আপনার গ্রিপকে শক্তিশালী করুন','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Adjustable\\\"},{\\\"value\\\":\\\"Hand Grip\\\"}]\"',NULL,NULL,NULL,'2024-06-03 21:23:59','2024-11-02 22:27:05'),(7,4,'en','Bench Press','The Bench Press is one of the most fundamental and widely recognized exercises in strength training. It primarily targets the pectoral muscles (chest) but also engages the shoulders, triceps','<p>The Bench Press is one of the most fundamental and widely recognized exercises in strength training. It primarily targets the pectoral muscles (chest) but also engages the shoulders, triceps, and various stabilizing muscles. This exercise can be performed using a barbell, dumbbells, or a specialized bench press machine, and it is a key component in building upper body strength.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Target Muscles:</strong> Primarily the pectoralis major (chest), with significant involvement of the anterior deltoids (shoulders) and triceps.</li>\r\n<li><strong>Variations:</strong> Bench press can be performed in several variations, including flat bench press, incline bench press, and decline bench press, each targeting different parts of the chest.</li>\r\n<li><strong>Equipment:</strong> Typically performed using a flat bench, barbell, or dumbbells. Some gyms also have Smith machines or dedicated bench press machines for added stability and safety.</li>\r\n<li><strong>Form:</strong> Proper form is crucial to avoid injury. The exercise involves lowering the weight to the chest and then pressing it back up to the starting position.</li>\r\n</ul>','<h3>Popular Bench Press Equipment:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Rogue Monster Utility Bench 2.0:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Flat Bench</li>\r\n<li><strong>Features:</strong> Heavy-duty construction with a high-density foam pad and grippy vinyl covering. It&rsquo;s designed for maximum stability and durability, making it suitable for serious lifters.</li>\r\n<li><strong>Application:</strong> Ideal for home gyms and commercial facilities, especially for those performing heavy lifts.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Rep Fitness AB-5000 Zero Gap Adjustable Bench:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Bench (Flat/Incline/Decline)</li>\r\n<li><strong>Features:</strong> Offers multiple incline, decline, and flat positions, with a unique \"zero gap\" feature to eliminate the gap between the seat and back pad. Built with thick padding and high-quality materials.</li>\r\n<li><strong>Application:</strong> Versatile bench for performing various bench press variations and other exercises, suitable for home gyms and commercial settings.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Bench Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Bench Press Machine</li>\r\n<li><strong>Features:</strong> Independent motion arms for a more balanced workout, simulating the feel of free weights. It&rsquo;s ergonomically designed to reduce stress on the joints while maximizing muscle activation.</li>\r\n<li><strong>Application:</strong> Common in commercial gyms, especially for users seeking a safer alternative to free weight bench pressing.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Life Fitness Signature Series Olympic Flat Bench:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Olympic Flat Bench</li>\r\n<li><strong>Features:</strong> A sturdy bench with integrated barbell rack and adjustable safety catches. Designed to withstand heavy use, with thick padding for comfort.</li>\r\n<li><strong>Application:</strong> Found in commercial gyms, suitable for serious lifters who regularly perform heavy bench presses.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Ironmaster Super Bench Pro:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Bench (Flat/Incline/Decline)</li>\r\n<li><strong>Features:</strong> Highly adjustable with multiple angle settings, and compatible with various attachments. It&rsquo;s built for both durability and versatility.</li>\r\n<li><strong>Application:</strong> Great for home gyms where space and equipment versatility are important.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<h3>Variations of the Bench Press:</h3>\r\n<ul>\r\n<li><strong>Flat Bench Press:</strong> Targets the middle part of the chest. This is the most common and traditional form of bench press.</li>\r\n<li><strong>Incline Bench Press:</strong> The bench is set at a 30-45 degree angle, focusing on the upper chest and shoulders.</li>\r\n<li><strong>Decline Bench Press:</strong> The bench is set at a decline, targeting the lower chest muscles more effectively.</li>\r\n<li><strong>Close-Grip Bench Press:</strong> Performed with a narrow grip on the barbell, this variation emphasizes the triceps.</li>\r\n<li><strong>Dumbbell Bench Press:</strong> Using dumbbells instead of a barbell allows for a greater range of motion and helps to correct muscle imbalances.</li>\r\n</ul>\r\n<h3>Benefits of the Bench Press:</h3>\r\n<ul>\r\n<li><strong>Upper Body Strength:</strong> It&rsquo;s one of the best exercises for building overall upper body strength, particularly in the chest, shoulders, and triceps.</li>\r\n<li><strong>Versatility:</strong> With various forms and equipment, the bench press can be adapted to target different muscles and accommodate different fitness levels.</li>\r\n<li><strong>Functional Fitness:</strong> Improves strength in pushing movements, which is important for daily activities and sports.</li>\r\n<li><strong>Progress Tracking:</strong> The bench press is a standard exercise for assessing upper body strength, often used in fitness testing and competitions like powerlifting.</li>\r\n</ul>\r\n<p>The bench press is a foundational exercise in any strength training program, offering numerous benefits for muscle growth, strength, and overall fitness.</p>','\"[{\\\"value\\\":\\\"Bench\\\"},{\\\"value\\\":\\\"Press\\\"}]\"',NULL,NULL,NULL,'2024-06-03 21:29:30','2024-09-08 02:23:07'),(8,4,'bn','1 পিস নিনজা হ্যান্ড গ্রিপ এক্সারসাইজার ফরআর্ম গ্রিপ হ্যান্ড স্কুইজার হ্যান্ড এক্সারসাইজ গ্রিপার ফিঙ্গার স্ট্রেন্থেনার','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Hand\\\"},{\\\"value\\\":\\\"grip\\\"}]\"',NULL,NULL,NULL,'2024-06-03 21:29:30','2024-11-02 22:26:32'),(9,5,'en','Midnight Sneakers','Step into timeless style with our sleek Black Sneakers. Crafted for comfort and versatility, these sneakers feature a minimalist all-black design that effortlessly complements any outfit.','<p><strong>Description:</strong><br>Step into timeless style with our sleek Black Sneakers. Crafted for comfort and versatility, these sneakers feature a minimalist all-black design that effortlessly complements any outfit. Whether you\'re dressing up for a night out or keeping it casual for the day, these sneakers are your go-to choice.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Premium Materials:</strong> Made with high-quality leather/fabric for durability and a polished finish.</li>\r\n<li><strong>Comfortable Fit:</strong> Padded insole and cushioned collar provide maximum comfort for all-day wear.</li>\r\n<li><strong>Durable Outsole:</strong> Rubber outsole ensures excellent grip and long-lasting wear, perfect for both urban and outdoor environments.</li>\r\n<li><strong>Versatile Style:</strong> Simple and classic design, suitable for various occasions&mdash;work, leisure, or sports.</li>\r\n<li><strong>Breathable Lining:</strong> Keeps your feet cool and dry, even during extended wear.</li>\r\n</ul>\r\n<p><strong>Available Sizes:</strong> 6-13 (US), 39-46 (EU)</p>\r\n<p><strong>Color:</strong> Black</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Daily wear</li>\r\n<li>Casual outings</li>\r\n<li>Light sports activities</li>\r\n<li>Streetwear fashion</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe with a damp cloth to clean.</li>\r\n<li>Use a soft brush to remove dirt from the outsole.</li>\r\n<li>Avoid exposure to extreme heat to maintain quality.</li>\r\n</ul>','<p><strong>Description:</strong><br>Step into timeless style with our sleek Black Sneakers. Crafted for comfort and versatility, these sneakers feature a minimalist all-black design that effortlessly complements any outfit. Whether you\'re dressing up for a night out or keeping it casual for the day, these sneakers are your go-to choice.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Premium Materials:</strong> Made with high-quality leather/fabric for durability and a polished finish.</li>\r\n<li><strong>Comfortable Fit:</strong> Padded insole and cushioned collar provide maximum comfort for all-day wear.</li>\r\n<li><strong>Durable Outsole:</strong> Rubber outsole ensures excellent grip and long-lasting wear, perfect for both urban and outdoor environments.</li>\r\n<li><strong>Versatile Style:</strong> Simple and classic design, suitable for various occasions&mdash;work, leisure, or sports.</li>\r\n<li><strong>Breathable Lining:</strong> Keeps your feet cool and dry, even during extended wear.</li>\r\n</ul>\r\n<p><strong>Available Sizes:</strong> 6-13 (US), 39-46 (EU)</p>\r\n<p><strong>Color:</strong> Black</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Daily wear</li>\r\n<li>Casual outings</li>\r\n<li>Light sports activities</li>\r\n<li>Streetwear fashion</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe with a damp cloth to clean.</li>\r\n<li>Use a soft brush to remove dirt from the outsole.</li>\r\n<li>Avoid exposure to extreme heat to maintain quality.</li>\r\n</ul>','\"[{\\\"value\\\":\\\"Sneakers\\\"},{\\\"value\\\":\\\"Footwear\\\"},{\\\"value\\\":\\\"Casual Shoes\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:30:35','2024-09-08 02:23:50'),(10,5,'bn','মিডনাইট স্নিকার্স','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Sneakers\\\"},{\\\"value\\\":\\\"Footwear\\\"},{\\\"value\\\":\\\"Casual Shoes\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:30:35','2024-11-02 22:26:02'),(11,6,'en','PowerLift Pro Dumbbells','Elevate your strength training with the PowerLift Pro Dumbbells, designed for serious lifters and fitness enthusiasts alike. Engineered for precision and durability, these dumbbells are the perfect addition to your home gym or fitness routine.','<p>Elevate your strength training with the PowerLift Pro Dumbbells, designed for serious lifters and fitness enthusiasts alike. Engineered for precision and durability, these dumbbells are the perfect addition to your home gym or fitness routine. The adjustable weight system allows you to customize your workout intensity, making them ideal for everything from light toning to heavy lifting.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Adjustable Weight System:</strong> Easily switch between different weights with a simple twist-lock mechanism, providing a range of options to match your workout needs.</li>\r\n<li><strong>Ergonomic Grip:</strong> Contoured, non-slip handles ensure a secure and comfortable grip during intense lifting sessions.</li>\r\n<li><strong>Durable Construction:</strong> Made from high-grade steel and coated with a protective finish, these dumbbells are built to withstand the toughest workouts.</li>\r\n<li><strong>Space-Saving Design:</strong> The compact, all-in-one design replaces multiple sets of dumbbells, saving you space without sacrificing performance.</li>\r\n<li><strong>Versatile Use:</strong> Perfect for a variety of exercises including bicep curls, tricep extensions, shoulder presses, and more.</li>\r\n</ul>\r\n<p><strong>Available Weight Range:</strong> 5-50 lbs (per dumbbell)</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Strength training</li>\r\n<li>Muscle building</li>\r\n<li>Home gyms</li>\r\n<li>Full-body workouts</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe down after use with a clean, dry cloth to prevent rust and wear.</li>\r\n<li>Store in a dry place to maintain longevity.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Dumbbells\\\"},{\\\"value\\\":\\\"PowerLift\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:37:18','2024-09-08 02:24:21'),(12,6,'bn','পাওয়ারলিফ্ট প্রো ডাম্বেল','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Dumbbells\\\"},{\\\"value\\\":\\\"PowerLift\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:37:18','2024-11-02 22:24:25'),(13,7,'en','CoreMaster Ab Roller','Unleash the full potential of your core workouts with the CoreMaster Ab Roller, the ultimate tool for achieving a strong, defined midsection. Whether you\'re a beginner or a fitness pro, the CoreMaster Ab Roller is your go-to for core training.','<p>Unleash the full potential of your core workouts with the CoreMaster Ab Roller, the ultimate tool for achieving a strong, defined midsection. Designed for stability and efficiency, this ab roller targets your abs, obliques, and lower back, delivering an intense workout that builds strength and tones muscles. Whether you\'re a beginner or a fitness pro, the CoreMaster Ab Roller is your go-to for core training.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Wide, Non-Slip Wheel:</strong> The extra-wide wheel ensures enhanced stability and control, allowing for smooth and balanced movements on any surface.</li>\r\n<li><strong>Comfort Grip Handles:</strong> Ergonomically designed, the foam-padded handles provide a secure and comfortable grip, reducing strain on your hands and wrists.</li>\r\n<li><strong>Durable Construction:</strong> Built with high-quality, heavy-duty materials, the CoreMaster is designed to withstand intense use and last through countless workouts.</li>\r\n<li><strong>Versatile Workout Tool:</strong> Targets not only the abs but also the shoulders, arms, and lower back, making it ideal for full-body core training.</li>\r\n<li><strong>Compact and Portable:</strong> Lightweight and easy to store, perfect for home gyms, travel, or on-the-go workouts.</li>\r\n</ul>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Core strengthening</li>\r\n<li>Abdominal toning</li>\r\n<li>Home workouts</li>\r\n<li>Full-body fitness routines</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Clean with a damp cloth after use.</li>\r\n<li>Store in a cool, dry place to maintain quality.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Roller\\\"},{\\\"value\\\":\\\"CoreMaster\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:41:09','2024-09-08 02:25:02'),(14,7,'bn','কোরমাস্টার আব রোলার','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Roller\\\"},{\\\"value\\\":\\\"CoreMaster\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:41:09','2024-11-02 22:23:41'),(15,8,'en','Velocity Speed Jump Rope','Elevate your cardio routine with the Velocity Speed Jump Rope, engineered for maximum speed and efficiency. Perfect for athletes, fitness enthusiasts, and anyone looking to boost their endurance, this jump rope delivers smooth, fast rotations for an intense workout.','<p>Elevate your cardio routine with the Velocity Speed Jump Rope, engineered for maximum speed and efficiency. Perfect for athletes, fitness enthusiasts, and anyone looking to boost their endurance, this jump rope delivers smooth, fast rotations for an intense workout. Whether you\'re mastering double unders or just getting started, the Velocity Speed Jump Rope is designed to help you reach your fitness goals.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>High-Speed Bearings:</strong> Equipped with precision ball bearings for ultra-smooth and rapid rotations, ideal for speed training and high-intensity workouts.</li>\r\n<li><strong>Adjustable Length:</strong> Easily customizable to fit any height, ensuring optimal performance and comfort for all users.</li>\r\n<li><strong>Lightweight Design:</strong> The sleek, lightweight cable allows for faster spins and better control, enhancing your agility and coordination.</li>\r\n<li><strong>Ergonomic Handles:</strong> Anti-slip, foam-padded handles provide a comfortable and secure grip, reducing hand fatigue during extended sessions.</li>\r\n<li><strong>Durable Construction:</strong> Made from high-quality, tangle-free steel wire coated with PVC, this jump rope is built to withstand rigorous use.</li>\r\n</ul>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Speed training</li>\r\n<li>CrossFit</li>\r\n<li>Boxing and MMA training</li>\r\n<li>Cardio workouts</li>\r\n<li>Endurance building</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe handles and cable with a clean cloth after use.</li>\r\n<li>Store coiled and avoid kinks to maintain rope longevity.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Rope\\\"},{\\\"value\\\":\\\"Speed Jump\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:48:19','2024-09-08 02:25:39'),(16,8,'bn','বেগ গতি দড়ি লাফ','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Rope\\\"},{\\\"value\\\":\\\"Speed Jump\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:48:19','2024-11-02 22:20:41'),(17,9,'en','Titan Strength Bench','Maximize your strength training with the Titan Strength Bench, the cornerstone of any serious home gym. Built to support heavy lifting and versatile workouts, this bench is designed for durability, stability, and comfort.','<p>Maximize your strength training with the Titan Strength Bench, the cornerstone of any serious home gym. Built to support heavy lifting and versatile workouts, this bench is designed for durability, stability, and comfort. Whether you\'re performing bench presses, dumbbell workouts, or core exercises, the Titan Strength Bench is engineered to help you reach your fitness potential.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Heavy-Duty Construction:</strong> Made from high-grade steel, this bench can support up to 1,000 lbs, making it ideal for intense lifting sessions.</li>\r\n<li><strong>Adjustable Backrest:</strong> The backrest adjusts to multiple positions, including flat, incline, and decline, allowing for a wide range of exercises targeting different muscle groups.</li>\r\n<li><strong>Thick Padding:</strong> High-density foam padding provides superior comfort and support, reducing pressure on your back and joints during heavy lifts.</li>\r\n<li><strong>Anti-Slip Feet:</strong> Equipped with rubberized feet to prevent slipping and protect your floors, ensuring safety and stability during your workouts.</li>\r\n<li><strong>Compact Design:</strong> Despite its robust build, the bench is designed to be space-efficient, perfect for home gyms or smaller workout areas.</li>\r\n</ul>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Bench presses</li>\r\n<li>Dumbbell exercises</li>\r\n<li>Core workouts</li>\r\n<li>Full-body strength training</li>\r\n</ul>\r\n<p><strong>Dimensions:</strong></p>\r\n<ul>\r\n<li>Length: 50 inches</li>\r\n<li>Width: 22 inches</li>\r\n<li>Height: 18 inches</li>\r\n</ul>\r\n<p><strong>Weight Capacity:</strong> 1,000 lbs</p>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe down after each use with a damp cloth to maintain cleanliness.</li>\r\n<li>Check bolts and screws regularly to ensure they remain tight.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Bench\\\"},{\\\"value\\\":\\\"strength\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:53:41','2024-09-08 02:26:21'),(18,9,'bn','টাইটান স্ট্রেংথ বেঞ্চ','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Bench\\\"},{\\\"value\\\":\\\"strength\\\"}]\"',NULL,NULL,NULL,'2024-08-13 03:53:41','2024-11-02 22:20:09'),(19,10,'en','PulseFit Smart Watch','Stay connected and on top of your fitness goals with the PulseFit Smart Watch, your ultimate companion for a healthy, active lifestyle. Combining sleek design with cutting-edge technology, the PulseFit tracks your workouts, monitors.','<p>Stay connected and on top of your fitness goals with the PulseFit Smart Watch, your ultimate companion for a healthy, active lifestyle. Combining sleek design with cutting-edge technology, the PulseFit tracks your workouts, monitors your heart rate, and keeps you connected with smart notifications. Whether you\'re hitting the gym, going for a run, or managing your day-to-day tasks, the PulseFit Smart Watch seamlessly integrates into your routine, helping you stay on track and motivated.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Real-Time Health Monitoring:</strong> Track your heart rate, blood oxygen levels, sleep patterns, and more with advanced sensors that provide accurate and real-time health data.</li>\r\n<li><strong>Multi-Sport Modes:</strong> Choose from a variety of pre-set workout modes, including running, cycling, swimming, and strength training, to get the most out of every session.</li>\r\n<li><strong>Smart Notifications:</strong> Receive calls, texts, emails, and app notifications directly on your wrist, so you never miss an important update.</li>\r\n<li><strong>Water-Resistant Design:</strong> With a water resistance rating of IP68, the PulseFit is built to withstand sweat, rain, and even swimming, making it perfect for any activity.</li>\r\n<li><strong>Long Battery Life:</strong> Enjoy up to 7 days of battery life on a single charge, keeping you powered up and focused without constant recharging.</li>\r\n<li><strong>Customizable Watch Faces:</strong> Personalize your PulseFit with a variety of watch faces to match your style and preferences.</li>\r\n</ul>\r\n<p><strong>Compatibility:</strong><br>Works with both iOS and Android devices via the PulseFit app.</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Fitness enthusiasts</li>\r\n<li>Health monitoring</li>\r\n<li>Daily activity tracking</li>\r\n<li>Staying connected on the go</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe the watch with a dry cloth after workouts.</li>\r\n<li>Avoid exposure to extreme temperatures to maintain battery life.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Smart Watch\\\"},{\\\"value\\\":\\\"Watch\\\"},{\\\"value\\\":\\\"PulseFit\\\"}]\"',NULL,NULL,NULL,'2024-08-13 04:00:36','2024-09-08 02:27:51'),(20,10,'bn','পালসফিট স্মার্ট ওয়াচ','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Smart Watch\\\"},{\\\"value\\\":\\\"Watch\\\"},{\\\"value\\\":\\\"PulseFit\\\"}]\"',NULL,NULL,NULL,'2024-08-13 04:00:36','2024-11-02 22:19:44'),(21,11,'en','CardioMaster Elliptical','Experience a superior cardiovascular workout with the CardioMaster Elliptical Trainer, engineered for optimal performance and comfort. This elliptical trainer is designed to deliver a low-impact, full-body workout that helps you burn calories.','<p>Experience a superior cardiovascular workout with the CardioMaster Elliptical Trainer, engineered for optimal performance and comfort. This elliptical trainer is designed to deliver a low-impact, full-body workout that helps you burn calories, improve endurance, and enhance overall fitness. Perfect for home gyms and fitness enthusiasts of all levels, the CardioMaster combines advanced features with sleek design to provide an exceptional exercise experience.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Smooth Elliptical Motion:</strong> The advanced flywheel system ensures a fluid, natural motion that reduces impact on joints, making it ideal for users seeking a low-impact workout.</li>\r\n<li><strong>Adjustable Resistance Levels:</strong> Customize your workout intensity with multiple resistance settings, from light toning to challenging strength training, to match your fitness goals.</li>\r\n<li><strong>Integrated Heart Rate Monitor:</strong> Built-in sensors on the handlebars provide real-time heart rate data, helping you stay in your target zone and track your cardiovascular health.</li>\r\n<li><strong>Large, Multi-Function Display:</strong> The easy-to-read LCD screen tracks essential workout metrics, including time, distance, speed, calories burned, and heart rate.</li>\r\n<li><strong>Ergonomic Design:</strong> The adjustable handlebars and large, cushioned foot pedals offer a comfortable and secure grip, accommodating users of various heights and fitness levels.</li>\r\n<li><strong>Built-In Workout Programs:</strong> Choose from a variety of pre-set workout programs designed to target different fitness goals, such as weight loss, endurance, and interval training.</li>\r\n<li><strong>Compact Footprint:</strong> Designed to fit seamlessly into home gyms, its compact size ensures you get a powerful workout without sacrificing space.</li>\r\n</ul>\r\n<p><strong>Dimensions:</strong></p>\r\n<ul>\r\n<li>Length: 58 inches</li>\r\n<li>Width: 24 inches</li>\r\n<li>Height: 64 inches</li>\r\n</ul>\r\n<p><strong>Weight Capacity:</strong> 300 lbs</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Cardiovascular conditioning</li>\r\n<li>Weight loss</li>\r\n<li>Full-body workouts</li>\r\n<li>Home fitness routines</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe down the machine with a clean, damp cloth after each use.</li>\r\n<li>Regularly check and tighten any loose bolts or screws to ensure stability and safety.</li>\r\n<li>Keep the machine in a dry, cool place to prevent rust and wear.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Elliptical\\\"},{\\\"value\\\":\\\"CardioMaster\\\"}]\"',NULL,NULL,NULL,'2024-08-13 04:20:51','2024-09-10 01:01:33'),(22,11,'bn','কার্ডিওমাস্টার উপবৃত্তাকার প্রশিক্ষক','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Elliptical\\\"},{\\\"value\\\":\\\"CardioMaster\\\"}]\"',NULL,NULL,NULL,'2024-08-13 04:20:51','2024-11-02 22:19:23'),(23,12,'en','Stair Climber','The Stair Climber is a high-performance fitness machine designed to simulate the experience of climbing stairs, offering an intense, low-impact workout that targets the lower body and cardiovascular system.','<p>The Stair Climber is a high-performance fitness machine designed to simulate the experience of climbing stairs, offering an intense, low-impact workout that targets the lower body and cardiovascular system. Ideal for both beginners and advanced fitness enthusiasts, this machine helps you burn calories, improve endurance, and tone muscles, particularly in the legs, glutes, and core.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Adjustable Resistance Levels:</strong> Easily customize the intensity of your workout with multiple resistance settings, catering to various fitness levels and goals.</li>\r\n<li><strong>Smooth, Quiet Operation:</strong> Equipped with advanced mechanisms that ensure a smooth, fluid motion and quiet operation, making it perfect for both home and commercial gyms.</li>\r\n<li><strong>Ergonomic Design:</strong> Features cushioned handrails and non-slip pedals that provide stability and comfort during your workout, reducing the risk of injury.</li>\r\n<li><strong>Interactive Console:</strong> Comes with a user-friendly console displaying key metrics such as time, speed, distance, calories burned, and heart rate. Some models also offer pre-programmed workouts and Bluetooth connectivity for syncing with fitness apps.</li>\r\n<li><strong>Compact Footprint:</strong> Despite its powerful capabilities, the Stair Climber is designed to occupy minimal floor space, making it suitable for any gym environment.</li>\r\n<li><strong>Durability:</strong> Built with high-quality materials and a robust frame to withstand regular, intense use, ensuring long-lasting performance.</li>\r\n</ul>\r\n<p><strong>Benefits:</strong></p>\r\n<ul>\r\n<li><strong>Efficient Calorie Burn:</strong> Achieve a high-calorie burn in a short period, making it an effective tool for weight loss and fitness improvement.</li>\r\n<li><strong>Low-Impact Exercise:</strong> Provides an intense workout without the harsh impact on joints, making it a safer alternative to running or other high-impact cardio exercises.</li>\r\n<li><strong>Muscle Toning:</strong> Targets major muscle groups in the lower body, helping to tone and strengthen your legs, glutes, and core.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Climber\\\"},{\\\"value\\\":\\\"fitness machine\\\"}]\"',NULL,NULL,NULL,'2024-08-13 21:43:09','2024-09-08 02:29:12'),(24,12,'bn','সিঁড়ি আরোহী','সিঁড়ি ক্লাইম্বার হল একটি উচ্চ-পারফরম্যান্স ফিটনেস মেশিন যা সিঁড়ি বেয়ে ওঠার অভিজ্ঞতাকে অনুকরণ করার জন্য ডিজাইন করা হয়েছে, একটি তীব্র, কম প্রভাবের ওয়ার্কআউট প্রদান করে যা নিম্ন শরীর এবং কার্ডিওভাসকুলার সিস্টেমকে লক্ষ্য করে।','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','<p>চেস্ট প্রেস মেশিন একটি জনপ্রিয় ব্যায়াম যন্ত্র যা শক্তি প্রশিক্ষণের জন্য ব্যবহৃত হয়। এটি মূলত বুকের পেশীগুলিকে (পেক্টোরাল) লক্ষ্য করে এবং পাশাপাশি ডেল্টয়েডস ও ট্রাইসেপসের মতো গৌণ পেশীগুলিকেও সক্রিয় করে। এই মেশিনটি ফ্রি ওয়েট এক্সারসাইজ, যেমন বেঞ্চ প্রেসের তুলনায় নিরাপদ ও নিয়ন্ত্রিত বিকল্প সরবরাহ করে, যা বিশেষ করে নতুনদের জন্য উপযুক্ত এবং যারা নির্দিষ্ট পেশী আলাদাভাবে উন্নত করতে চান তাদের জন্য উপযোগী।</p>\r\n<p>চেস্ট প্রেস মেশিনের গুরুত্বপূর্ণ বৈশিষ্ট্যগুলোর মধ্যে সামঞ্জস্যযোগ্য আসন অন্যতম। বেশিরভাগ মেশিনে আসনটি এমনভাবে সামঞ্জস্যযোগ্য যে হ্যান্ডেলগুলি বুকের সমতলে আসে, যা সঠিক ফর্ম বজায় রাখতে সহায়ক এবং আঘাতের ঝুঁকি কমায়। সঠিক উচ্চতায় বসার মাধ্যমে সঠিক পেশীগুলিতে চাপ পড়ে, যা ব্যায়ামের কার্যকারিতা বৃদ্ধি করে এবং প্রাথমিকভাবে লক্ষ্য পেশীগুলিতে ফোকাস ধরে রাখে।</p>\r\n<p>এছাড়াও, অনেক চেস্ট প্রেস মেশিনে ওজন সামঞ্জস্য করার জন্য দুটি প্রধান পদ্ধতি থাকে - ওজন স্ট্যাক এবং প্লেট লোড। ওজন স্ট্যাক সিলেক্টরাইজড, যা দ্রুত ওজন পরিবর্তনের সুযোগ দেয়, যেখানে প্লেট লোড মেশিনে ছোট ছোট পরিমাণে ওজন যোগ বা বাদ দেওয়া যায়, যা আরও নিখুঁত সামঞ্জস্যের সুযোগ দেয়। সাধারণত মেশিনে একাধিক গ্রিপ পজিশন থাকে, যা বুকের বিভিন্ন অংশের পেশীগুলিকে লক্ষ্য করার সুযোগ দেয়, ফলে একটি বহুমুখী ব্যায়াম অভিজ্ঞতা প্রদান করে।</p>','\"[{\\\"value\\\":\\\"Climber\\\"},{\\\"value\\\":\\\"fitness machine\\\"}]\"',NULL,NULL,NULL,'2024-08-13 21:43:09','2024-11-02 22:19:03'),(25,1,'ar','آلة ضغط الصدر','آلة ضغط الصدر هي قطعة شائعة من المعدات المستخدمة في تدريب القوة لاستهداف العضلات الصدرية، إلى جانب المشاركة الثانوية من العضلة الدالية والعضلة ثلاثية الرؤوس.','<p>A Chest Press Machine is a popular piece of equipment used in strength training to target the pectoral muscles, along with secondary involvement from the deltoids and triceps. The machine provides a safer and more controlled alternative to free weight exercises like the bench press, making it ideal for beginners and those focused on muscle isolation.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Target Muscles:</strong> Primarily the pectoral muscles, with secondary engagement of the deltoids and triceps.</li>\r\n<li><strong>Adjustable Seat:</strong> Most machines come with an adjustable seat to align the handles with your chest, ensuring proper form and reducing the risk of injury.</li>\r\n<li><strong>Weight Stack or Plate Loaded:</strong> Some machines use a selectorized weight stack, making it easy to adjust the weight, while others are plate-loaded, allowing for more incremental adjustments.</li>\r\n<li><strong>Grip Positions:</strong> Typically, machines offer multiple grip positions to target different parts of the chest.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"product\\\"},{\\\"value\\\":\\\"test\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-27 01:04:25'),(26,2,'ar','آلة تراجع الجلوس','The Seated Dip Machine is a strength training apparatus designed to target the triceps, with secondary engagement of the chest and shoulders.','<p>The Seated Dip Machine is a strength training apparatus designed to target the triceps, with secondary engagement of the chest and shoulders. It offers a controlled environment to perform dips, which are typically a bodyweight exercise, allowing for adjustable resistance and a safer alternative to free dips.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Target Muscles:</strong> Primarily the triceps, with secondary activation of the pectoral muscles and anterior deltoids.</li>\r\n<li><strong>Adjustable Seat:</strong> Allows users to align their body properly with the handles, ensuring correct form and reducing the risk of injury.</li>\r\n<li><strong>Weight Stack or Plate Loaded:</strong> Similar to other resistance machines, seated dip machines may be selectorized (with a weight stack) or plate-loaded, offering different ways to adjust the resistance.</li>\r\n<li><strong>Range of Motion:</strong> Machines often include adjustable levers or arm paths to tailor the range of motion to the user&rsquo;s preference.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handles, adjustable seat, and a smooth weight stack system. Designed with biomechanics in mind to ensure proper muscle engagement and minimize strain.</li>\r\n<li><strong>Application:</strong> Suitable for both commercial and home gyms, particularly for users seeking a high-quality, reliable machine.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Dip Machine:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm movement allows for balanced muscle development. The plate-loaded design mimics the feel of free weights, providing a more natural resistance curve.</li>\r\n<li><strong>Application:</strong> Ideal for strength training facilities and athletes looking for a robust and effective triceps workout.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth, guided motion with a focus on user comfort. Multiple grip positions allow for variation in muscle targeting. The weight stack is easy to adjust, making it accessible for all fitness levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and fitness centers due to its ergonomic design and ease of use.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable arm paths, ergonomic seating, and intuitive resistance adjustment. The machine is built with durability and user comfort in mind, providing a smooth and consistent workout experience.</li>\r\n<li><strong>Application:</strong> Suitable for both commercial and home gyms, focusing on durability and ease of use.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Seated Dip:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Low starting resistance for beginners, with smooth motion and easy seat adjustments. The machine is designed to offer a natural movement path, reducing joint strain while maximizing muscle activation.</li>\r\n<li><strong>Application:</strong> Ideal for a wide range of users, from beginners to experienced athletes, and commonly found in both commercial and home gyms.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<h3>Benefits of a Seated Dip Machine:</h3>\r\n<ul>\r\n<li><strong>Controlled Environment:</strong> Unlike bodyweight dips, the machine allows for controlled resistance and movement, reducing the risk of injury.</li>\r\n<li><strong>Adjustable Resistance:</strong> Users can tailor the resistance to their strength level, making it accessible to both beginners and advanced users.</li>\r\n<li><strong>Isolation of the Triceps:</strong> The machine\'s design ensures that the triceps are the primary muscle group being worked, with less involvement of other muscle groups, leading to more targeted development.</li>\r\n</ul>','\"[{\\\"value\\\":\\\"Machine\\\"},{\\\"value\\\":\\\"strength training\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 04:53:12'),(27,3,'ar','قبضة يد قابلة للتعديل','An Adjustable Hand Grip is a compact fitness device designed to strengthen the muscles of the hand, wrist, and forearm.','<p>An Adjustable Hand Grip is a compact fitness device designed to strengthen the muscles of the hand, wrist, and forearm. It\'s particularly useful for improving grip strength, which is essential for various sports, everyday activities, and rehabilitation purposes. The device typically consists of two handles connected by a tension spring, with the resistance level adjustable to accommodate different strength levels.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Adjustable Resistance:</strong> The primary feature of adjustable hand grips is the ability to change the resistance level, usually by turning a knob or dial. This allows users to progressively increase the challenge as their grip strength improves.</li>\r\n<li><strong>Ergonomic Design:</strong> Handles are often ergonomically shaped and may be coated with rubber or foam for comfort and better grip, reducing strain on the hands during use.</li>\r\n<li><strong>Portability:</strong> Due to their small size, adjustable hand grips are easy to carry, making them ideal for use at home, in the office, or while traveling.</li>\r\n<li><strong>Durability:</strong> High-quality hand grips are made from durable materials like stainless steel, reinforced plastic, and high-tension springs to withstand frequent use.</li>\r\n</ul>\r\n<h3>&nbsp;</h3>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Gripmaster Pro Hand Grip Exerciser:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Offers independent finger resistance, allowing each finger to be exercised separately. It has multiple resistance levels, ranging from light to heavy, making it suitable for all fitness levels.</li>\r\n<li><strong>Application:</strong> Ideal for musicians, athletes, and anyone looking to enhance finger dexterity and grip strength.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Captains of Crush Hand Gripper:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Known for its durability and high resistance levels, ranging from beginner to advanced. It has a knurled aluminum handle for a secure grip and comes in various models with different tension levels.</li>\r\n<li><strong>Application:</strong> Preferred by serious strength trainers and athletes aiming to develop maximum grip strength.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>IronMind Expand-Your-Hand Bands:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Hand Grip Strengthener (with adjustable resistance)</li>\r\n<li><strong>Features:</strong> Includes a set of bands with different resistance levels, specifically designed to strengthen the extensor muscles in the hands, balancing grip strength development.</li>\r\n<li><strong>Application:</strong> Used in conjunction with traditional hand grippers for a comprehensive hand workout, beneficial for climbers, weightlifters, and those recovering from hand injuries.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Luxon Adjustable Hand Grip Strengthener:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Features a resistance range from 10 to 60 kg, with an easily adjustable dial. The handles are coated with soft rubber for comfort, and the spring mechanism is designed for durability.</li>\r\n<li><strong>Application:</strong> Suitable for general fitness enthusiasts, seniors, and those undergoing rehabilitation.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Heavy Grips Hand Gripper:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Hand Grip Strengthener</li>\r\n<li><strong>Features:</strong> Provides a range of resistance from 100 lbs to 350 lbs, catering to users at different levels of grip strength. Made with aluminum handles and a high-tension spring, it&rsquo;s built for durability.</li>\r\n<li><strong>Application:</strong> Targeted at serious strength athletes, particularly those focused on improving grip strength for powerlifting, rock climbing, and other demanding sports.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<h3>Benefits of Using an Adjustable Hand Grip:</h3>\r\n<ul>\r\n<li><strong>Increased Grip Strength:</strong> Essential for various physical activities, from lifting weights to playing musical instruments.</li>\r\n<li><strong>Enhanced Forearm Muscles:</strong> Regular use also strengthens the forearm muscles, contributing to better overall arm strength and endurance.</li>\r\n<li><strong>Rehabilitation and Injury Prevention:</strong> Particularly beneficial for individuals recovering from hand injuries or surgeries, helping restore strength and flexibility.</li>\r\n<li><strong>Portable and Convenient:</strong> Small and lightweight, making it easy to use anywhere, anytime.</li>\r\n</ul>\r\n<p>Adjustable hand grips are versatile tools that can benefit anyone from athletes to those looking to maintain hand strength and dexterity as they age.</p>','\"[{\\\"value\\\":\\\"Adjustable\\\"},{\\\"value\\\":\\\"Hand Grip\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 04:53:43'),(28,4,'ar','الصحافة مقاعد البدلاء','The Bench Press is one of the most fundamental and widely recognized exercises in strength training. It primarily targets the pectoral muscles (chest) but also engages the shoulders, triceps','<p>The Bench Press is one of the most fundamental and widely recognized exercises in strength training. It primarily targets the pectoral muscles (chest) but also engages the shoulders, triceps, and various stabilizing muscles. This exercise can be performed using a barbell, dumbbells, or a specialized bench press machine, and it is a key component in building upper body strength.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li><strong>Target Muscles:</strong> Primarily the pectoralis major (chest), with significant involvement of the anterior deltoids (shoulders) and triceps.</li>\r\n<li><strong>Variations:</strong> Bench press can be performed in several variations, including flat bench press, incline bench press, and decline bench press, each targeting different parts of the chest.</li>\r\n<li><strong>Equipment:</strong> Typically performed using a flat bench, barbell, or dumbbells. Some gyms also have Smith machines or dedicated bench press machines for added stability and safety.</li>\r\n<li><strong>Form:</strong> Proper form is crucial to avoid injury. The exercise involves lowering the weight to the chest and then pressing it back up to the starting position.</li>\r\n</ul>','<h3>Popular Bench Press Equipment:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Rogue Monster Utility Bench 2.0:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Flat Bench</li>\r\n<li><strong>Features:</strong> Heavy-duty construction with a high-density foam pad and grippy vinyl covering. It&rsquo;s designed for maximum stability and durability, making it suitable for serious lifters.</li>\r\n<li><strong>Application:</strong> Ideal for home gyms and commercial facilities, especially for those performing heavy lifts.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Rep Fitness AB-5000 Zero Gap Adjustable Bench:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Bench (Flat/Incline/Decline)</li>\r\n<li><strong>Features:</strong> Offers multiple incline, decline, and flat positions, with a unique \"zero gap\" feature to eliminate the gap between the seat and back pad. Built with thick padding and high-quality materials.</li>\r\n<li><strong>Application:</strong> Versatile bench for performing various bench press variations and other exercises, suitable for home gyms and commercial settings.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Bench Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Bench Press Machine</li>\r\n<li><strong>Features:</strong> Independent motion arms for a more balanced workout, simulating the feel of free weights. It&rsquo;s ergonomically designed to reduce stress on the joints while maximizing muscle activation.</li>\r\n<li><strong>Application:</strong> Common in commercial gyms, especially for users seeking a safer alternative to free weight bench pressing.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Life Fitness Signature Series Olympic Flat Bench:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Olympic Flat Bench</li>\r\n<li><strong>Features:</strong> A sturdy bench with integrated barbell rack and adjustable safety catches. Designed to withstand heavy use, with thick padding for comfort.</li>\r\n<li><strong>Application:</strong> Found in commercial gyms, suitable for serious lifters who regularly perform heavy bench presses.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Ironmaster Super Bench Pro:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Adjustable Bench (Flat/Incline/Decline)</li>\r\n<li><strong>Features:</strong> Highly adjustable with multiple angle settings, and compatible with various attachments. It&rsquo;s built for both durability and versatility.</li>\r\n<li><strong>Application:</strong> Great for home gyms where space and equipment versatility are important.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<h3>Variations of the Bench Press:</h3>\r\n<ul>\r\n<li><strong>Flat Bench Press:</strong> Targets the middle part of the chest. This is the most common and traditional form of bench press.</li>\r\n<li><strong>Incline Bench Press:</strong> The bench is set at a 30-45 degree angle, focusing on the upper chest and shoulders.</li>\r\n<li><strong>Decline Bench Press:</strong> The bench is set at a decline, targeting the lower chest muscles more effectively.</li>\r\n<li><strong>Close-Grip Bench Press:</strong> Performed with a narrow grip on the barbell, this variation emphasizes the triceps.</li>\r\n<li><strong>Dumbbell Bench Press:</strong> Using dumbbells instead of a barbell allows for a greater range of motion and helps to correct muscle imbalances.</li>\r\n</ul>\r\n<h3>Benefits of the Bench Press:</h3>\r\n<ul>\r\n<li><strong>Upper Body Strength:</strong> It&rsquo;s one of the best exercises for building overall upper body strength, particularly in the chest, shoulders, and triceps.</li>\r\n<li><strong>Versatility:</strong> With various forms and equipment, the bench press can be adapted to target different muscles and accommodate different fitness levels.</li>\r\n<li><strong>Functional Fitness:</strong> Improves strength in pushing movements, which is important for daily activities and sports.</li>\r\n<li><strong>Progress Tracking:</strong> The bench press is a standard exercise for assessing upper body strength, often used in fitness testing and competitions like powerlifting.</li>\r\n</ul>\r\n<p>The bench press is a foundational exercise in any strength training program, offering numerous benefits for muscle growth, strength, and overall fitness.</p>','\"[{\\\"value\\\":\\\"Bench\\\"},{\\\"value\\\":\\\"Press\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 04:54:15'),(29,5,'ar','أحذية منتصف الليل','Step into timeless style with our sleek Black Sneakers. Crafted for comfort and versatility, these sneakers feature a minimalist all-black design that effortlessly complements any outfit.','<p><strong>Description:</strong><br>Step into timeless style with our sleek Black Sneakers. Crafted for comfort and versatility, these sneakers feature a minimalist all-black design that effortlessly complements any outfit. Whether you\'re dressing up for a night out or keeping it casual for the day, these sneakers are your go-to choice.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Premium Materials:</strong> Made with high-quality leather/fabric for durability and a polished finish.</li>\r\n<li><strong>Comfortable Fit:</strong> Padded insole and cushioned collar provide maximum comfort for all-day wear.</li>\r\n<li><strong>Durable Outsole:</strong> Rubber outsole ensures excellent grip and long-lasting wear, perfect for both urban and outdoor environments.</li>\r\n<li><strong>Versatile Style:</strong> Simple and classic design, suitable for various occasions&mdash;work, leisure, or sports.</li>\r\n<li><strong>Breathable Lining:</strong> Keeps your feet cool and dry, even during extended wear.</li>\r\n</ul>\r\n<p><strong>Available Sizes:</strong> 6-13 (US), 39-46 (EU)</p>\r\n<p><strong>Color:</strong> Black</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Daily wear</li>\r\n<li>Casual outings</li>\r\n<li>Light sports activities</li>\r\n<li>Streetwear fashion</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe with a damp cloth to clean.</li>\r\n<li>Use a soft brush to remove dirt from the outsole.</li>\r\n<li>Avoid exposure to extreme heat to maintain quality.</li>\r\n</ul>','<p><strong>Description:</strong><br>Step into timeless style with our sleek Black Sneakers. Crafted for comfort and versatility, these sneakers feature a minimalist all-black design that effortlessly complements any outfit. Whether you\'re dressing up for a night out or keeping it casual for the day, these sneakers are your go-to choice.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Premium Materials:</strong> Made with high-quality leather/fabric for durability and a polished finish.</li>\r\n<li><strong>Comfortable Fit:</strong> Padded insole and cushioned collar provide maximum comfort for all-day wear.</li>\r\n<li><strong>Durable Outsole:</strong> Rubber outsole ensures excellent grip and long-lasting wear, perfect for both urban and outdoor environments.</li>\r\n<li><strong>Versatile Style:</strong> Simple and classic design, suitable for various occasions&mdash;work, leisure, or sports.</li>\r\n<li><strong>Breathable Lining:</strong> Keeps your feet cool and dry, even during extended wear.</li>\r\n</ul>\r\n<p><strong>Available Sizes:</strong> 6-13 (US), 39-46 (EU)</p>\r\n<p><strong>Color:</strong> Black</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Daily wear</li>\r\n<li>Casual outings</li>\r\n<li>Light sports activities</li>\r\n<li>Streetwear fashion</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe with a damp cloth to clean.</li>\r\n<li>Use a soft brush to remove dirt from the outsole.</li>\r\n<li>Avoid exposure to extreme heat to maintain quality.</li>\r\n</ul>','\"[{\\\"value\\\":\\\"Sneakers\\\"},{\\\"value\\\":\\\"Footwear\\\"},{\\\"value\\\":\\\"Casual Shoes\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 04:54:56'),(30,6,'ar','دمبل باور ليفت برو','Elevate your strength training with the PowerLift Pro Dumbbells, designed for serious lifters and fitness enthusiasts alike. Engineered for precision and durability, these dumbbells are the perfect addition to your home gym or fitness routine.','<p>Elevate your strength training with the PowerLift Pro Dumbbells, designed for serious lifters and fitness enthusiasts alike. Engineered for precision and durability, these dumbbells are the perfect addition to your home gym or fitness routine. The adjustable weight system allows you to customize your workout intensity, making them ideal for everything from light toning to heavy lifting.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Adjustable Weight System:</strong> Easily switch between different weights with a simple twist-lock mechanism, providing a range of options to match your workout needs.</li>\r\n<li><strong>Ergonomic Grip:</strong> Contoured, non-slip handles ensure a secure and comfortable grip during intense lifting sessions.</li>\r\n<li><strong>Durable Construction:</strong> Made from high-grade steel and coated with a protective finish, these dumbbells are built to withstand the toughest workouts.</li>\r\n<li><strong>Space-Saving Design:</strong> The compact, all-in-one design replaces multiple sets of dumbbells, saving you space without sacrificing performance.</li>\r\n<li><strong>Versatile Use:</strong> Perfect for a variety of exercises including bicep curls, tricep extensions, shoulder presses, and more.</li>\r\n</ul>\r\n<p><strong>Available Weight Range:</strong> 5-50 lbs (per dumbbell)</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Strength training</li>\r\n<li>Muscle building</li>\r\n<li>Home gyms</li>\r\n<li>Full-body workouts</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe down after use with a clean, dry cloth to prevent rust and wear.</li>\r\n<li>Store in a dry place to maintain longevity.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Dumbbells\\\"},{\\\"value\\\":\\\"PowerLift\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 04:55:42'),(31,7,'ar','كور ماستر آب رولر','Unleash the full potential of your core workouts with the CoreMaster Ab Roller, the ultimate tool for achieving a strong, defined midsection. Whether you\'re a beginner or a fitness pro, the CoreMaster Ab Roller is your go-to for core training.','<p>Unleash the full potential of your core workouts with the CoreMaster Ab Roller, the ultimate tool for achieving a strong, defined midsection. Designed for stability and efficiency, this ab roller targets your abs, obliques, and lower back, delivering an intense workout that builds strength and tones muscles. Whether you\'re a beginner or a fitness pro, the CoreMaster Ab Roller is your go-to for core training.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Wide, Non-Slip Wheel:</strong> The extra-wide wheel ensures enhanced stability and control, allowing for smooth and balanced movements on any surface.</li>\r\n<li><strong>Comfort Grip Handles:</strong> Ergonomically designed, the foam-padded handles provide a secure and comfortable grip, reducing strain on your hands and wrists.</li>\r\n<li><strong>Durable Construction:</strong> Built with high-quality, heavy-duty materials, the CoreMaster is designed to withstand intense use and last through countless workouts.</li>\r\n<li><strong>Versatile Workout Tool:</strong> Targets not only the abs but also the shoulders, arms, and lower back, making it ideal for full-body core training.</li>\r\n<li><strong>Compact and Portable:</strong> Lightweight and easy to store, perfect for home gyms, travel, or on-the-go workouts.</li>\r\n</ul>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Core strengthening</li>\r\n<li>Abdominal toning</li>\r\n<li>Home workouts</li>\r\n<li>Full-body fitness routines</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Clean with a damp cloth after use.</li>\r\n<li>Store in a cool, dry place to maintain quality.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Roller\\\"},{\\\"value\\\":\\\"CoreMaster\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 04:56:08'),(32,8,'ar','سرعة القفز على الحبل','Elevate your cardio routine with the Velocity Speed Jump Rope, engineered for maximum speed and efficiency. Perfect for athletes, fitness enthusiasts, and anyone looking to boost their endurance, this jump rope delivers smooth, fast rotations for an intense workout.','<p>Elevate your cardio routine with the Velocity Speed Jump Rope, engineered for maximum speed and efficiency. Perfect for athletes, fitness enthusiasts, and anyone looking to boost their endurance, this jump rope delivers smooth, fast rotations for an intense workout. Whether you\'re mastering double unders or just getting started, the Velocity Speed Jump Rope is designed to help you reach your fitness goals.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>High-Speed Bearings:</strong> Equipped with precision ball bearings for ultra-smooth and rapid rotations, ideal for speed training and high-intensity workouts.</li>\r\n<li><strong>Adjustable Length:</strong> Easily customizable to fit any height, ensuring optimal performance and comfort for all users.</li>\r\n<li><strong>Lightweight Design:</strong> The sleek, lightweight cable allows for faster spins and better control, enhancing your agility and coordination.</li>\r\n<li><strong>Ergonomic Handles:</strong> Anti-slip, foam-padded handles provide a comfortable and secure grip, reducing hand fatigue during extended sessions.</li>\r\n<li><strong>Durable Construction:</strong> Made from high-quality, tangle-free steel wire coated with PVC, this jump rope is built to withstand rigorous use.</li>\r\n</ul>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Speed training</li>\r\n<li>CrossFit</li>\r\n<li>Boxing and MMA training</li>\r\n<li>Cardio workouts</li>\r\n<li>Endurance building</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe handles and cable with a clean cloth after use.</li>\r\n<li>Store coiled and avoid kinks to maintain rope longevity.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Rope\\\"},{\\\"value\\\":\\\"Speed Jump\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 05:06:14'),(33,9,'ar','مقعد قوة تيتان','Maximize your strength training with the Titan Strength Bench, the cornerstone of any serious home gym. Built to support heavy lifting and versatile workouts, this bench is designed for durability, stability, and comfort.','<p>Maximize your strength training with the Titan Strength Bench, the cornerstone of any serious home gym. Built to support heavy lifting and versatile workouts, this bench is designed for durability, stability, and comfort. Whether you\'re performing bench presses, dumbbell workouts, or core exercises, the Titan Strength Bench is engineered to help you reach your fitness potential.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Heavy-Duty Construction:</strong> Made from high-grade steel, this bench can support up to 1,000 lbs, making it ideal for intense lifting sessions.</li>\r\n<li><strong>Adjustable Backrest:</strong> The backrest adjusts to multiple positions, including flat, incline, and decline, allowing for a wide range of exercises targeting different muscle groups.</li>\r\n<li><strong>Thick Padding:</strong> High-density foam padding provides superior comfort and support, reducing pressure on your back and joints during heavy lifts.</li>\r\n<li><strong>Anti-Slip Feet:</strong> Equipped with rubberized feet to prevent slipping and protect your floors, ensuring safety and stability during your workouts.</li>\r\n<li><strong>Compact Design:</strong> Despite its robust build, the bench is designed to be space-efficient, perfect for home gyms or smaller workout areas.</li>\r\n</ul>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Bench presses</li>\r\n<li>Dumbbell exercises</li>\r\n<li>Core workouts</li>\r\n<li>Full-body strength training</li>\r\n</ul>\r\n<p><strong>Dimensions:</strong></p>\r\n<ul>\r\n<li>Length: 50 inches</li>\r\n<li>Width: 22 inches</li>\r\n<li>Height: 18 inches</li>\r\n</ul>\r\n<p><strong>Weight Capacity:</strong> 1,000 lbs</p>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe down after each use with a damp cloth to maintain cleanliness.</li>\r\n<li>Check bolts and screws regularly to ensure they remain tight.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Bench\\\"},{\\\"value\\\":\\\"strength\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 05:07:03'),(34,10,'ar','ساعة بولس فيت الذكية','Stay connected and on top of your fitness goals with the PulseFit Smart Watch, your ultimate companion for a healthy, active lifestyle. Combining sleek design with cutting-edge technology, the PulseFit tracks your workouts, monitors.','<p>Stay connected and on top of your fitness goals with the PulseFit Smart Watch, your ultimate companion for a healthy, active lifestyle. Combining sleek design with cutting-edge technology, the PulseFit tracks your workouts, monitors your heart rate, and keeps you connected with smart notifications. Whether you\'re hitting the gym, going for a run, or managing your day-to-day tasks, the PulseFit Smart Watch seamlessly integrates into your routine, helping you stay on track and motivated.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Real-Time Health Monitoring:</strong> Track your heart rate, blood oxygen levels, sleep patterns, and more with advanced sensors that provide accurate and real-time health data.</li>\r\n<li><strong>Multi-Sport Modes:</strong> Choose from a variety of pre-set workout modes, including running, cycling, swimming, and strength training, to get the most out of every session.</li>\r\n<li><strong>Smart Notifications:</strong> Receive calls, texts, emails, and app notifications directly on your wrist, so you never miss an important update.</li>\r\n<li><strong>Water-Resistant Design:</strong> With a water resistance rating of IP68, the PulseFit is built to withstand sweat, rain, and even swimming, making it perfect for any activity.</li>\r\n<li><strong>Long Battery Life:</strong> Enjoy up to 7 days of battery life on a single charge, keeping you powered up and focused without constant recharging.</li>\r\n<li><strong>Customizable Watch Faces:</strong> Personalize your PulseFit with a variety of watch faces to match your style and preferences.</li>\r\n</ul>\r\n<p><strong>Compatibility:</strong><br>Works with both iOS and Android devices via the PulseFit app.</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Fitness enthusiasts</li>\r\n<li>Health monitoring</li>\r\n<li>Daily activity tracking</li>\r\n<li>Staying connected on the go</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe the watch with a dry cloth after workouts.</li>\r\n<li>Avoid exposure to extreme temperatures to maintain battery life.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Smart Watch\\\"},{\\\"value\\\":\\\"Watch\\\"},{\\\"value\\\":\\\"PulseFit\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-09 05:08:13'),(35,11,'ar','كارديو ماستر اهليلجيه','استمتع بتمرين القلب والأوعية الدموية الفائق مع جهاز CardioMaster Elliptical Trainer، المصمم لتحقيق الأداء الأمثل والراحة. تم تصميم هذا المدرب البيضاوي لتقديم تمرين منخفض التأثير لكامل الجسم يساعدك على حرق السعرات الحرارية.','<p>Experience a superior cardiovascular workout with the CardioMaster Elliptical Trainer, engineered for optimal performance and comfort. This elliptical trainer is designed to deliver a low-impact, full-body workout that helps you burn calories, improve endurance, and enhance overall fitness. Perfect for home gyms and fitness enthusiasts of all levels, the CardioMaster combines advanced features with sleek design to provide an exceptional exercise experience.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Smooth Elliptical Motion:</strong> The advanced flywheel system ensures a fluid, natural motion that reduces impact on joints, making it ideal for users seeking a low-impact workout.</li>\r\n<li><strong>Adjustable Resistance Levels:</strong> Customize your workout intensity with multiple resistance settings, from light toning to challenging strength training, to match your fitness goals.</li>\r\n<li><strong>Integrated Heart Rate Monitor:</strong> Built-in sensors on the handlebars provide real-time heart rate data, helping you stay in your target zone and track your cardiovascular health.</li>\r\n<li><strong>Large, Multi-Function Display:</strong> The easy-to-read LCD screen tracks essential workout metrics, including time, distance, speed, calories burned, and heart rate.</li>\r\n<li><strong>Ergonomic Design:</strong> The adjustable handlebars and large, cushioned foot pedals offer a comfortable and secure grip, accommodating users of various heights and fitness levels.</li>\r\n<li><strong>Built-In Workout Programs:</strong> Choose from a variety of pre-set workout programs designed to target different fitness goals, such as weight loss, endurance, and interval training.</li>\r\n<li><strong>Compact Footprint:</strong> Designed to fit seamlessly into home gyms, its compact size ensures you get a powerful workout without sacrificing space.</li>\r\n</ul>\r\n<p><strong>Dimensions:</strong></p>\r\n<ul>\r\n<li>Length: 58 inches</li>\r\n<li>Width: 24 inches</li>\r\n<li>Height: 64 inches</li>\r\n</ul>\r\n<p><strong>Weight Capacity:</strong> 300 lbs</p>\r\n<p><strong>Ideal For:</strong></p>\r\n<ul>\r\n<li>Cardiovascular conditioning</li>\r\n<li>Weight loss</li>\r\n<li>Full-body workouts</li>\r\n<li>Home fitness routines</li>\r\n</ul>\r\n<p><strong>Care Instructions:</strong></p>\r\n<ul>\r\n<li>Wipe down the machine with a clean, damp cloth after each use.</li>\r\n<li>Regularly check and tighten any loose bolts or screws to ensure stability and safety.</li>\r\n<li>Keep the machine in a dry, cool place to prevent rust and wear.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Elliptical\\\"},{\\\"value\\\":\\\"CardioMaster\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-23 01:48:42'),(36,12,'ar','متسلق الدرج','جهاز Stair Climber هو جهاز لياقة بدنية عالي الأداء مصمم لمحاكاة تجربة تسلق السلالم، ويقدم تمرينًا مكثفًا ومنخفض التأثير يستهدف الجزء السفلي من الجسم ونظام القلب والأوعية الدموية.','<p>The Stair Climber is a high-performance fitness machine designed to simulate the experience of climbing stairs, offering an intense, low-impact workout that targets the lower body and cardiovascular system. Ideal for both beginners and advanced fitness enthusiasts, this machine helps you burn calories, improve endurance, and tone muscles, particularly in the legs, glutes, and core.</p>\r\n<p><strong>Key Features:</strong></p>\r\n<ul>\r\n<li><strong>Adjustable Resistance Levels:</strong> Easily customize the intensity of your workout with multiple resistance settings, catering to various fitness levels and goals.</li>\r\n<li><strong>Smooth, Quiet Operation:</strong> Equipped with advanced mechanisms that ensure a smooth, fluid motion and quiet operation, making it perfect for both home and commercial gyms.</li>\r\n<li><strong>Ergonomic Design:</strong> Features cushioned handrails and non-slip pedals that provide stability and comfort during your workout, reducing the risk of injury.</li>\r\n<li><strong>Interactive Console:</strong> Comes with a user-friendly console displaying key metrics such as time, speed, distance, calories burned, and heart rate. Some models also offer pre-programmed workouts and Bluetooth connectivity for syncing with fitness apps.</li>\r\n<li><strong>Compact Footprint:</strong> Despite its powerful capabilities, the Stair Climber is designed to occupy minimal floor space, making it suitable for any gym environment.</li>\r\n<li><strong>Durability:</strong> Built with high-quality materials and a robust frame to withstand regular, intense use, ensuring long-lasting performance.</li>\r\n</ul>\r\n<p><strong>Benefits:</strong></p>\r\n<ul>\r\n<li><strong>Efficient Calorie Burn:</strong> Achieve a high-calorie burn in a short period, making it an effective tool for weight loss and fitness improvement.</li>\r\n<li><strong>Low-Impact Exercise:</strong> Provides an intense workout without the harsh impact on joints, making it a safer alternative to running or other high-impact cardio exercises.</li>\r\n<li><strong>Muscle Toning:</strong> Targets major muscle groups in the lower body, helping to tone and strengthen your legs, glutes, and core.</li>\r\n</ul>','<h3>Popular Brands and Models:</h3>\r\n<ol>\r\n<li>\r\n<p><strong>Life Fitness Pro2 Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Ergonomic handle design, adjustable seat, and back support for proper posture. Smooth resistance adjustment and durable construction.</li>\r\n<li><strong>Application:</strong> Ideal for commercial gyms and home gyms focused on premium quality.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Hammer Strength Plate-Loaded Iso-Lateral Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Plate-Loaded Strength Training</li>\r\n<li><strong>Features:</strong> Independent arm motion, plate-loaded resistance, and biomechanically correct design to mimic free weights. Durable construction with heavy-duty steel.</li>\r\n<li><strong>Application:</strong> Used in high-performance training centers and by athletes for strength building.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Technogym Selection 900 Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Smooth movement, ergonomic design, and multiple grip positions. Easy-to-read weight stack, ideal for all user levels.</li>\r\n<li><strong>Application:</strong> Common in high-end commercial gyms and rehabilitation centers due to its user-friendly design.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Matrix Fitness Ultra Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Adjustable range of motion, incremental weight adjustments, and an intuitive design for ease of use. Designed for maximum user comfort and safety.</li>\r\n<li><strong>Application:</strong> Suitable for commercial gyms with a focus on durability and advanced features.</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Precor Vitality Series Chest Press:</strong></p>\r\n<ul>\r\n<li><strong>Category:</strong> Selectorized Strength Training</li>\r\n<li><strong>Features:</strong> Natural motion path, easy seat adjustment, and user-friendly weight stack selection. Offers a low starting resistance to accommodate a wide range of users.</li>\r\n<li><strong>Application:</strong> Great for both commercial and home gyms, especially for users looking for a smooth and natural motion.</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p>These machines vary by resistance type (selectorized vs. plate-loaded), ergonomics, and design features, catering to different user needs from beginners to advanced athletes.</p>','\"[{\\\"value\\\":\\\"Climber\\\"},{\\\"value\\\":\\\"fitness machine\\\"}]\"',NULL,NULL,NULL,'2024-08-26 01:01:39','2024-10-23 01:49:32');
/*!40000 ALTER TABLE `product_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` bigint unsigned NOT NULL,
  `tax_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `badge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` float(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_type` enum('fixed','percent') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'fixed',
  `cost_per_item` decimal(8,2) DEFAULT NULL,
  `has_variant` tinyint(1) NOT NULL DEFAULT '0',
  `stock` int NOT NULL DEFAULT '0',
  `stock_status` enum('in_stock','out_of_stock') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'in_stock',
  `is_warranty` tinyint(1) DEFAULT NULL,
  `warranty_duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_returnable` tinyint(1) NOT NULL DEFAULT '0',
  `is_exchangeable` tinyint(1) NOT NULL DEFAULT '0',
  `is_refundable` tinyint(1) NOT NULL DEFAULT '0',
  `is_cod` tinyint(1) NOT NULL DEFAULT '0',
  `is_emi` tinyint(1) NOT NULL DEFAULT '0',
  `is_guest_checkout` tinyint(1) NOT NULL DEFAULT '0',
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_bestseller` tinyint(1) NOT NULL DEFAULT '0',
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_top` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_tax_id_foreign` (`tax_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brands` (`id`),
  CONSTRAINT `products_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,1,'chest-press-machine','uploads/custom-images/wsus-img-2024-10-08-10-22-33-1611.png','[\"41,42,43,44,45,46,47\"]',NULL,1000.00,10.00,'fixed',NULL,0,3,'in_stock',1,'7 Month',0,0,0,0,0,0,NULL,'51716642',1,0,0,0,0,0,NULL,'2024-06-02 22:43:57','2024-11-10 04:44:00'),(2,2,1,'seated-dip-machine','uploads/custom-images/wsus-img-2024-10-08-10-24-30-9506.png','[\"48,49,50,51,52,53\"]',NULL,800.00,10.00,'percent',NULL,0,29,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'25409297',1,0,0,0,0,0,NULL,'2024-06-02 22:46:50','2024-10-08 04:24:30'),(3,3,2,'adjustable-hand-grip','uploads/custom-images/wsus-img-2024-10-08-10-32-52-9129.png','[\"54,55,56,57,58\"]',NULL,332.00,0.00,'fixed',NULL,0,99,'in_stock',1,'7',0,0,0,0,0,0,NULL,'39531357',1,0,0,0,0,0,NULL,'2024-06-03 21:23:59','2024-10-28 02:51:13'),(4,4,1,'bench-press','uploads/custom-images/wsus-img-2024-10-08-10-34-18-1858.png','[\"59,60,61,62,63,64\"]',NULL,101.00,1.00,'fixed',NULL,0,99,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'11273818',1,0,0,0,0,0,NULL,'2024-06-03 21:29:30','2024-10-28 02:49:00'),(5,11,1,'midnight-sneakers','uploads/custom-images/wsus-img-2024-10-08-10-35-42-1999.jpg','[\"116,117,118,119,120,121\"]',NULL,100.00,0.00,'fixed',NULL,0,3,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'42158258',1,0,0,0,0,0,NULL,'2024-08-13 03:30:35','2024-10-08 04:35:42'),(6,1,1,'powerlift-pro-dumbbells','uploads/custom-images/wsus-img-2024-10-08-10-37-10-3673.jpg','[\"70,71,72,73,74,75,76\"]',NULL,120.00,0.00,'fixed',NULL,0,4,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'74042121',1,0,0,0,0,0,NULL,'2024-08-13 03:37:18','2024-11-09 22:52:29'),(7,3,1,'coremaster-ab-roller','uploads/custom-images/wsus-img-2024-10-08-10-40-02-9694.png','[\"77,78,79,80,81\"]',NULL,80.00,5.00,'fixed',NULL,0,9,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'24028981',1,0,0,0,0,0,NULL,'2024-08-13 03:41:09','2024-10-28 03:02:23'),(8,6,1,'velocity-speed-jump-rope','uploads/custom-images/wsus-img-2024-10-08-10-42-26-3506.png','[\"82,83,84,85,86,87,88\"]',NULL,80.00,0.00,'fixed',NULL,0,7,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'67124283',1,0,0,0,0,0,NULL,'2024-08-13 03:48:19','2024-11-19 21:52:04'),(9,9,1,'titan-strength-bench','uploads/custom-images/wsus-img-2024-10-08-10-43-36-4895.png','[\"89,90,91,92,93,94,95,96\"]',NULL,500.00,0.00,'fixed',NULL,0,5,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'35463664',1,0,0,0,0,0,NULL,'2024-08-13 03:53:41','2024-10-08 04:43:36'),(10,9,1,'pulsefit-smart-watch','uploads/custom-images/wsus-img-2024-10-08-10-45-20-9328.jpg','[\"97,98,99,100,101,102,103\"]',NULL,180.00,0.00,'fixed',NULL,0,49,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'91622935',1,0,0,0,0,0,NULL,'2024-08-13 04:00:36','2024-10-28 02:45:19'),(11,7,1,'cardiomaster-elliptical','uploads/custom-images/wsus-img-2024-10-08-10-47-07-7241.png','[\"104,105,106,107,108,109\"]',NULL,900.00,0.00,'fixed',NULL,0,2,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'90238353',1,0,0,0,0,0,NULL,'2024-08-13 04:20:51','2024-11-19 22:07:10'),(12,4,1,'stair-climber','uploads/custom-images/wsus-img-2024-10-08-10-48-07-6578.png','[\"110,111,112,113,114,115\"]',NULL,800.00,0.00,'fixed',NULL,0,-3,'in_stock',0,NULL,0,0,0,0,0,0,NULL,'71850976',1,0,0,0,0,0,NULL,'2024-08-13 21:43:08','2024-11-19 22:01:04');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund_requests`
--

DROP TABLE IF EXISTS `refund_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refund_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL,
  `refund_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `reasone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('pending','rejected','success') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `refund_requests`
--

LOCK TABLES `refund_requests` WRITE;
/*!40000 ALTER TABLE `refund_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `related_products`
--

DROP TABLE IF EXISTS `related_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `related_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `related_product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `related_products_product_id_foreign` (`product_id`),
  KEY `related_products_related_product_id_foreign` (`related_product_id`),
  CONSTRAINT `related_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `related_products_related_product_id_foreign` FOREIGN KEY (`related_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `related_products`
--

LOCK TABLES `related_products` WRITE;
/*!40000 ALTER TABLE `related_products` DISABLE KEYS */;
INSERT INTO `related_products` VALUES (1,1,2,'2024-08-12 00:46:47','2024-08-12 00:46:47'),(2,1,3,'2024-08-12 00:46:47','2024-08-12 00:46:47'),(3,1,4,'2024-08-12 00:46:47','2024-08-12 00:46:47');
/*!40000 ALTER TABLE `related_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1),(136,1),(137,1),(138,1),(139,1),(140,1),(141,1),(142,1),(143,1),(144,1),(145,1),(146,1),(147,1),(148,1),(149,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(156,1),(157,1),(158,1),(159,1),(160,1),(161,1),(162,1),(163,1),(164,1),(165,1),(166,1),(167,1),(168,1),(169,1),(170,1),(171,1),(172,1),(173,1),(174,1),(175,1),(176,1),(177,1),(178,1),(179,1),(180,1),(181,1),(182,1),(183,1),(184,1),(185,1),(186,1),(187,1),(188,1),(189,1),(190,1),(191,1),(192,1),(193,1),(194,1),(195,1),(196,1),(197,1),(198,1),(199,1),(200,1),(201,1),(202,1),(203,1),(204,1),(205,1),(206,1),(207,1),(208,1),(209,1),(210,1),(211,1),(212,1),(213,1),(214,1),(215,1),(216,1),(217,1),(218,1),(219,1),(220,1),(221,1),(222,1),(223,1),(224,1),(225,1),(226,1),(227,1),(228,1),(229,1),(230,1),(231,1),(232,1),(233,1),(234,1),(235,1),(236,1),(237,1),(238,1),(239,1),(240,1),(241,1),(242,1),(243,1),(244,1),(245,1),(246,1),(247,1),(248,1),(249,1),(250,1),(251,1),(252,1),(253,1),(254,1),(255,1),(256,1),(257,1),(258,1),(259,1),(260,1),(261,1),(262,1),(263,1),(264,1),(265,1),(266,1),(267,1),(268,1),(269,1),(270,1),(271,1),(272,1),(273,1),(274,1),(275,1),(276,1),(277,1),(278,1),(279,1),(280,1),(281,1),(282,1),(283,1),(284,1),(285,1),(286,1),(287,1),(288,1),(289,1),(290,1),(291,1),(292,1),(293,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','admin','2024-12-01 04:58:22','2024-12-01 04:58:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_content_translations`
--

DROP TABLE IF EXISTS `section_content_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_content_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `section_content_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `program_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pricing_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `products_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `testimonial_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_content_translations_section_content_id_foreign` (`section_content_id`),
  CONSTRAINT `section_content_translations_section_content_id_foreign` FOREIGN KEY (`section_content_id`) REFERENCES `section_contents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `section_content_translations`
--

LOCK TABLES `section_content_translations` WRITE;
/*!40000 ALTER TABLE `section_content_translations` DISABLE KEYS */;
INSERT INTO `section_content_translations` VALUES (1,1,'en','Our Complete Gym Program','Fitness Classes Pricing Plan','Read the Latest News','Fitnes Training Equipment','What our members say','2024-06-09 04:32:10','2024-10-31 02:53:10'),(2,1,'bn','আমাদের সম্পূর্ণ জিম প্রোগ্রাম','ফিটনেস ক্লাস মূল্য পরিকল্পনা','সর্বশেষ খবর পড়ুন','ফিটনেস প্রশিক্ষণের সরঞ্জাম','যা বলেন আমাদের সদস্যরা','2024-06-09 04:32:10','2024-11-03 00:04:29'),(3,1,'ar','برنامج صالة الألعاب الرياضية الكامل','فصول اللياقة البدنية خطة الأسعار','اقرأ آخر الأخبار','معدات تدريب اللياقة البدنية','ماذا يقول أعضاؤنا','2024-08-26 01:01:41','2024-10-16 00:29:26');
/*!40000 ALTER TABLE `section_content_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_contents`
--

DROP TABLE IF EXISTS `section_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `section_contents`
--

LOCK TABLES `section_contents` WRITE;
/*!40000 ALTER TABLE `section_contents` DISABLE KEYS */;
INSERT INTO `section_contents` VALUES (1,'2024-06-09 04:32:10','2024-06-09 04:32:10');
/*!40000 ALTER TABLE `section_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_controls`
--

DROP TABLE IF EXISTS `section_controls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_controls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=show, 0=hide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `section_controls`
--

LOCK TABLES `section_controls` WRITE;
/*!40000 ALTER TABLE `section_controls` DISABLE KEYS */;
INSERT INTO `section_controls` VALUES (1,'slider_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(2,'workout_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(3,'machine_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(4,'trainer_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(5,'video_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(6,'brand_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(7,'pricing_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(8,'testimonial_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(9,'blog_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(10,'call_to_action_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(11,'products_visibility',1,'2024-06-05 02:00:04','2024-10-23 01:39:23'),(12,'counter_visibility',1,'2024-06-05 03:40:08','2024-10-23 01:39:23'),(13,'about_section_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(14,'choose_us_section_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(15,'support_section_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(16,'exercise_section_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(17,'about_trainer_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(18,'about_testimonial_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(19,'about_call_to_action_visibility',1,'2024-06-05 23:29:28','2024-11-10 04:16:59'),(20,'code',0,'2024-06-06 04:25:35','2024-06-06 04:26:53'),(21,'service_visibility',1,'2024-10-23 01:38:35','2024-10-23 01:39:23');
/*!40000 ALTER TABLE `section_controls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo_settings`
--

DROP TABLE IF EXISTS `seo_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seo_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `seo_settings`
--

LOCK TABLES `seo_settings` WRITE;
/*!40000 ALTER TABLE `seo_settings` DISABLE KEYS */;
INSERT INTO `seo_settings` VALUES (1,'Home Page','Home || WebSolutionUS','Home || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(2,'About Page','About || WebSolutionUS','About || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(3,'Shop Page','Shop || WebSolutionUS','Shop || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(4,'Contact Page','Contact || WebSolutionUS','Contact || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(5,'Service Page','Service || WebSolutionUS','Service || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(6,'Blog Page','Blog Page || WebSolutionUS','Blog Page || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(7,'FAQ Page','FAQ Page || WebSolutionUS','FAQ Page || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(8,'Privacy & Policy Page','Privacy & Policy || WebSolutionUS','Privacy & Policy || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(9,'Terms & Condition Page','Terms & Condition || WebSolutionUS','Terms & Condition || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(10,'Workout Page','Workout || WebSolutionUS','Workout || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(11,'Trainer Page','Trainer || WebSolutionUS','Trainer || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(12,'Image Gallery Page','Image Gallery || WebSolutionUS','Image Gallery || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(13,'Video Gallery Page','Video Gallery || WebSolutionUS','Video Gallery || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(14,'Award Page','Award || WebSolutionUS','Award || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(15,'Pricing Page','Pricing || WebSolutionUS','Pricing || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(16,'Cart Page','Cart || WebSolutionUS','Cart || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(17,'Checkout Page','Checkout || WebSolutionUS','Checkout || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(18,'Payment Page','Payment || WebSolutionUS','Payment || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45'),(19,'Wishlist Page','Wishlist || WebSolutionUS','Payment || WebSolutionUS','2024-08-22 06:23:45','2024-08-22 06:23:45');
/*!40000 ALTER TABLE `seo_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_faq_translations`
--

DROP TABLE IF EXISTS `service_faq_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_faq_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_faq_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_faq_translations_service_faq_id_foreign` (`service_faq_id`),
  CONSTRAINT `service_faq_translations_service_faq_id_foreign` FOREIGN KEY (`service_faq_id`) REFERENCES `service_faqs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `service_faq_translations`
--

LOCK TABLES `service_faq_translations` WRITE;
/*!40000 ALTER TABLE `service_faq_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_faq_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_faqs`
--

DROP TABLE IF EXISTS `service_faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_faqs_service_id_foreign` (`service_id`),
  CONSTRAINT `service_faqs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `service_faqs`
--

LOCK TABLES `service_faqs` WRITE;
/*!40000 ALTER TABLE `service_faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_translations`
--

DROP TABLE IF EXISTS `service_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_translations_service_id_foreign` (`service_id`),
  CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `service_translations`
--

LOCK TABLES `service_translations` WRITE;
/*!40000 ALTER TABLE `service_translations` DISABLE KEYS */;
INSERT INTO `service_translations` VALUES (1,1,'en','Personal Training','<p>Personal training services at a gym offer a personalized fitness experience tailored to each individual\'s unique needs and goals. Unlike a general workout routine, personal training provides one-on-one guidance from certified trainers who create a structured plan designed to help clients achieve specific objectives, whether that&rsquo;s weight loss, muscle gain, improving endurance, or enhancing flexibility. This personalized approach ensures that every workout is efficient and effective, focusing on exercises that are best suited for the client\'s body type and fitness aspirations.</p>\r\n<p>A personal trainer also offers motivation and accountability, which are essential for maintaining consistency and commitment. They keep clients engaged, help them push beyond their perceived limits, and celebrate every milestone achieved. Additionally, trainers educate clients on proper form and techniques to minimize the risk of injury, making sure that exercises are performed correctly to optimize results and build confidence over time. For beginners, this guidance is especially valuable, helping them develop good habits and a solid fitness foundation.</p>\r\n<p>The benefits of personal training extend beyond the physical aspects; it also fosters mental resilience and a positive outlook on health. Personal trainers often work closely with clients to set realistic and attainable goals, providing support every step of the way. Whether it\'s through continuous encouragement or adapting routines to fit lifestyle changes, personal training creates a supportive environment that makes fitness enjoyable and sustainable, helping individuals lead healthier, happier lives.</p>','Personalized sessions focused on individual goals, fitness levels, and specific needs.',NULL,NULL,'2024-08-22 02:00:30','2024-10-29 03:48:15'),(2,1,'bn','ব্যক্তিগত প্রশিক্ষণ','<p>একটি জিমে ব্যক্তিগত প্রশিক্ষণ পরিষেবাগুলি প্রতিটি ব্যক্তির অনন্য চাহিদা এবং লক্ষ্যগুলির জন্য তৈরি একটি ব্যক্তিগতকৃত ফিটনেস অভিজ্ঞতা অফার করে। একটি সাধারণ ওয়ার্কআউট রুটিনের বিপরীতে, ব্যক্তিগত প্রশিক্ষণ প্রত্যয়িত প্রশিক্ষকদের কাছ থেকে একের পর এক নির্দেশনা প্রদান করে যারা ক্লায়েন্টদের নির্দিষ্ট লক্ষ্য অর্জনে সাহায্য করার জন্য ডিজাইন করা একটি কাঠামোগত পরিকল্পনা তৈরি করে, তা ওজন হ্রাস, পেশী বৃদ্ধি, সহনশীলতা উন্নত করা বা নমনীয়তা বাড়ানো। এই ব্যক্তিগতকৃত পন্থা নিশ্চিত করে যে প্রতিটি ওয়ার্কআউট দক্ষ এবং কার্যকর, ব্যায়ামের উপর ফোকাস করে যা ক্লায়েন্টের শরীরের ধরন এবং ফিটনেস আকাঙ্ক্ষার জন্য সবচেয়ে উপযুক্ত।</p>\r\n<p>একজন ব্যক্তিগত প্রশিক্ষক প্রেরণা এবং জবাবদিহিতাও অফার করে, যা ধারাবাহিকতা এবং প্রতিশ্রুতি বজায় রাখার জন্য অপরিহার্য। তারা ক্লায়েন্টদের নিযুক্ত রাখে, তাদের অনুভূত সীমা ছাড়িয়ে যেতে সাহায্য করে এবং অর্জিত প্রতিটি মাইলফলক উদযাপন করে। উপরন্তু, প্রশিক্ষকরা ক্লায়েন্টদের সঠিক ফর্ম এবং কৌশলগুলিকে আঘাতের ঝুঁকি কমানোর জন্য শিক্ষিত করে, নিশ্চিত করে যে অনুশীলনগুলি সঠিকভাবে ফলাফল অপ্টিমাইজ করতে এবং সময়ের সাথে আত্মবিশ্বাস তৈরি করতে পারে। নতুনদের জন্য, এই নির্দেশিকা বিশেষভাবে মূল্যবান, তাদের ভালো অভ্যাস এবং একটি শক্ত ফিটনেস ভিত্তি গড়ে তুলতে সাহায্য করে।</p>\r\n<p>ব্যক্তিগত প্রশিক্ষণের সুবিধাগুলি শারীরিক দিকগুলির বাইরেও প্রসারিত হয়; এটি মানসিক স্থিতিস্থাপকতা এবং স্বাস্থ্যের প্রতি ইতিবাচক দৃষ্টিভঙ্গিও বাড়ায়। ব্যক্তিগত প্রশিক্ষকরা প্রায়ই বাস্তবসম্মত এবং অর্জনযোগ্য লক্ষ্য নির্ধারণের জন্য ক্লায়েন্টদের সাথে ঘনিষ্ঠভাবে কাজ করে, প্রতিটি পদক্ষেপে সহায়তা প্রদান করে। এটি ক্রমাগত উত্সাহের মাধ্যমে হোক বা জীবনযাত্রার পরিবর্তনের সাথে মানানসই রুটিনগুলিকে মানিয়ে নেওয়া হোক না কেন, ব্যক্তিগত প্রশিক্ষণ একটি সহায়ক পরিবেশ তৈরি করে যা ফিটনেসকে উপভোগ্য এবং টেকসই করে তোলে, ব্যক্তিদের স্বাস্থ্যকর, সুখী জীবনযাপন করতে সহায়তা করে।</p>','ব্যক্তিগতকৃত সেশনগুলি স্বতন্ত্র লক্ষ্য, ফিটনেস স্তর এবং নির্দিষ্ট প্রয়োজনের উপর দৃষ্টি নিবদ্ধ করে।',NULL,NULL,'2024-08-22 02:00:30','2024-11-02 23:06:00'),(3,2,'en','Wellness Services','<p>Personal training services at a gym offer a personalized fitness experience tailored to each individual\'s unique needs and goals. Unlike a general workout routine, personal training provides one-on-one guidance from certified trainers who create a structured plan designed to help clients achieve specific objectives, whether that&rsquo;s weight loss, muscle gain, improving endurance, or enhancing flexibility. This personalized approach ensures that every workout is efficient and effective, focusing on exercises that are best suited for the client\'s body type and fitness aspirations.</p>\r\n<p>A personal trainer also offers motivation and accountability, which are essential for maintaining consistency and commitment. They keep clients engaged, help them push beyond their perceived limits, and celebrate every milestone achieved. Additionally, trainers educate clients on proper form and techniques to minimize the risk of injury, making sure that exercises are performed correctly to optimize results and build confidence over time. For beginners, this guidance is especially valuable, helping them develop good habits and a solid fitness foundation.</p>\r\n<p>The benefits of personal training extend beyond the physical aspects; it also fosters mental resilience and a positive outlook on health. Personal trainers often work closely with clients to set realistic and attainable goals, providing support every step of the way. Whether it\'s through continuous encouragement or adapting routines to fit lifestyle changes, personal training creates a supportive environment that makes fitness enjoyable and sustainable, helping individuals lead healthier, happier lives.</p>','Therapeutic massages that help with muscle recovery, pain relief, and relaxation.',NULL,NULL,'2024-08-22 04:26:35','2024-10-29 03:50:05'),(4,2,'bn','পুনরুদ্ধার এবং সুস্থতা সেবা','<p>একটি জিমে ব্যক্তিগত প্রশিক্ষণ পরিষেবাগুলি প্রতিটি ব্যক্তির অনন্য চাহিদা এবং লক্ষ্যগুলির জন্য তৈরি একটি ব্যক্তিগতকৃত ফিটনেস অভিজ্ঞতা অফার করে। একটি সাধারণ ওয়ার্কআউট রুটিনের বিপরীতে, ব্যক্তিগত প্রশিক্ষণ প্রত্যয়িত প্রশিক্ষকদের কাছ থেকে একের পর এক নির্দেশনা প্রদান করে যারা ক্লায়েন্টদের নির্দিষ্ট লক্ষ্য অর্জনে সাহায্য করার জন্য ডিজাইন করা একটি কাঠামোগত পরিকল্পনা তৈরি করে, তা ওজন হ্রাস, পেশী বৃদ্ধি, সহনশীলতা উন্নত করা বা নমনীয়তা বাড়ানো। এই ব্যক্তিগতকৃত পন্থা নিশ্চিত করে যে প্রতিটি ওয়ার্কআউট দক্ষ এবং কার্যকর, ব্যায়ামের উপর ফোকাস করে যা ক্লায়েন্টের শরীরের ধরন এবং ফিটনেস আকাঙ্ক্ষার জন্য সবচেয়ে উপযুক্ত।</p>\r\n<p>একজন ব্যক্তিগত প্রশিক্ষক প্রেরণা এবং জবাবদিহিতাও অফার করে, যা ধারাবাহিকতা এবং প্রতিশ্রুতি বজায় রাখার জন্য অপরিহার্য। তারা ক্লায়েন্টদের নিযুক্ত রাখে, তাদের অনুভূত সীমা ছাড়িয়ে যেতে সাহায্য করে এবং অর্জিত প্রতিটি মাইলফলক উদযাপন করে। উপরন্তু, প্রশিক্ষকরা ক্লায়েন্টদের সঠিক ফর্ম এবং কৌশলগুলিকে আঘাতের ঝুঁকি কমানোর জন্য শিক্ষিত করে, নিশ্চিত করে যে অনুশীলনগুলি সঠিকভাবে ফলাফল অপ্টিমাইজ করতে এবং সময়ের সাথে আত্মবিশ্বাস তৈরি করতে পারে। নতুনদের জন্য, এই নির্দেশিকা বিশেষভাবে মূল্যবান, তাদের ভালো অভ্যাস এবং একটি শক্ত ফিটনেস ভিত্তি গড়ে তুলতে সাহায্য করে।</p>\r\n<p>ব্যক্তিগত প্রশিক্ষণের সুবিধাগুলি শারীরিক দিকগুলির বাইরেও প্রসারিত হয়; এটি মানসিক স্থিতিস্থাপকতা এবং স্বাস্থ্যের প্রতি ইতিবাচক দৃষ্টিভঙ্গিও বাড়ায়। ব্যক্তিগত প্রশিক্ষকরা প্রায়ই বাস্তবসম্মত এবং অর্জনযোগ্য লক্ষ্য নির্ধারণের জন্য ক্লায়েন্টদের সাথে ঘনিষ্ঠভাবে কাজ করে, প্রতিটি পদক্ষেপে সহায়তা প্রদান করে। এটি ক্রমাগত উত্সাহের মাধ্যমে হোক বা জীবনযাত্রার পরিবর্তনের সাথে মানানসই রুটিনগুলিকে মানিয়ে নেওয়া হোক না কেন, ব্যক্তিগত প্রশিক্ষণ একটি সহায়ক পরিবেশ তৈরি করে যা ফিটনেসকে উপভোগ্য এবং টেকসই করে তোলে, ব্যক্তিদের স্বাস্থ্যকর, সুখী জীবনযাপন করতে সহায়তা করে।</p>','থেরাপিউটিক ম্যাসেজ যা পেশী পুনরুদ্ধার, ব্যথা উপশম এবং শিথিলকরণে সহায়তা করে।',NULL,NULL,'2024-08-22 04:26:35','2024-11-02 23:06:31'),(5,3,'en','Aquatic Fitness','<p>Personal training services at a gym offer a personalized fitness experience tailored to each individual\'s unique needs and goals. Unlike a general workout routine, personal training provides one-on-one guidance from certified trainers who create a structured plan designed to help clients achieve specific objectives, whether that&rsquo;s weight loss, muscle gain, improving endurance, or enhancing flexibility. This personalized approach ensures that every workout is efficient and effective, focusing on exercises that are best suited for the client\'s body type and fitness aspirations.</p>\r\n<p>A personal trainer also offers motivation and accountability, which are essential for maintaining consistency and commitment. They keep clients engaged, help them push beyond their perceived limits, and celebrate every milestone achieved. Additionally, trainers educate clients on proper form and techniques to minimize the risk of injury, making sure that exercises are performed correctly to optimize results and build confidence over time. For beginners, this guidance is especially valuable, helping them develop good habits and a solid fitness foundation.</p>\r\n<p>The benefits of personal training extend beyond the physical aspects; it also fosters mental resilience and a positive outlook on health. Personal trainers often work closely with clients to set realistic and attainable goals, providing support every step of the way. Whether it\'s through continuous encouragement or adapting routines to fit lifestyle changes, personal training creates a supportive environment that makes fitness enjoyable and sustainable, helping individuals lead healthier, happier lives.</p>','Low-impact aerobic workouts conducted in a pool, ideal for those with joint issues or seeking a gentler exercise option.',NULL,NULL,'2024-08-22 04:30:41','2024-10-29 03:50:25'),(6,3,'bn','জলজ ফিটনেস','<p>একটি জিমে ব্যক্তিগত প্রশিক্ষণ পরিষেবাগুলি প্রতিটি ব্যক্তির অনন্য চাহিদা এবং লক্ষ্যগুলির জন্য তৈরি একটি ব্যক্তিগতকৃত ফিটনেস অভিজ্ঞতা অফার করে। একটি সাধারণ ওয়ার্কআউট রুটিনের বিপরীতে, ব্যক্তিগত প্রশিক্ষণ প্রত্যয়িত প্রশিক্ষকদের কাছ থেকে একের পর এক নির্দেশনা প্রদান করে যারা ক্লায়েন্টদের নির্দিষ্ট লক্ষ্য অর্জনে সাহায্য করার জন্য ডিজাইন করা একটি কাঠামোগত পরিকল্পনা তৈরি করে, তা ওজন হ্রাস, পেশী বৃদ্ধি, সহনশীলতা উন্নত করা বা নমনীয়তা বাড়ানো। এই ব্যক্তিগতকৃত পন্থা নিশ্চিত করে যে প্রতিটি ওয়ার্কআউট দক্ষ এবং কার্যকর, ব্যায়ামের উপর ফোকাস করে যা ক্লায়েন্টের শরীরের ধরন এবং ফিটনেস আকাঙ্ক্ষার জন্য সবচেয়ে উপযুক্ত।</p>\r\n<p>একজন ব্যক্তিগত প্রশিক্ষক প্রেরণা এবং জবাবদিহিতাও অফার করে, যা ধারাবাহিকতা এবং প্রতিশ্রুতি বজায় রাখার জন্য অপরিহার্য। তারা ক্লায়েন্টদের নিযুক্ত রাখে, তাদের অনুভূত সীমা ছাড়িয়ে যেতে সাহায্য করে এবং অর্জিত প্রতিটি মাইলফলক উদযাপন করে। উপরন্তু, প্রশিক্ষকরা ক্লায়েন্টদের সঠিক ফর্ম এবং কৌশলগুলিকে আঘাতের ঝুঁকি কমানোর জন্য শিক্ষিত করে, নিশ্চিত করে যে অনুশীলনগুলি সঠিকভাবে ফলাফল অপ্টিমাইজ করতে এবং সময়ের সাথে আত্মবিশ্বাস তৈরি করতে পারে। নতুনদের জন্য, এই নির্দেশিকা বিশেষভাবে মূল্যবান, তাদের ভালো অভ্যাস এবং একটি শক্ত ফিটনেস ভিত্তি গড়ে তুলতে সাহায্য করে।</p>\r\n<p>ব্যক্তিগত প্রশিক্ষণের সুবিধাগুলি শারীরিক দিকগুলির বাইরেও প্রসারিত হয়; এটি মানসিক স্থিতিস্থাপকতা এবং স্বাস্থ্যের প্রতি ইতিবাচক দৃষ্টিভঙ্গিও বাড়ায়। ব্যক্তিগত প্রশিক্ষকরা প্রায়ই বাস্তবসম্মত এবং অর্জনযোগ্য লক্ষ্য নির্ধারণের জন্য ক্লায়েন্টদের সাথে ঘনিষ্ঠভাবে কাজ করে, প্রতিটি পদক্ষেপে সহায়তা প্রদান করে। এটি ক্রমাগত উত্সাহের মাধ্যমে হোক বা জীবনযাত্রার পরিবর্তনের সাথে মানানসই রুটিনগুলিকে মানিয়ে নেওয়া হোক না কেন, ব্যক্তিগত প্রশিক্ষণ একটি সহায়ক পরিবেশ তৈরি করে যা ফিটনেসকে উপভোগ্য এবং টেকসই করে তোলে, ব্যক্তিদের স্বাস্থ্যকর, সুখী জীবনযাপন করতে সহায়তা করে।</p>','একটি পুলে পরিচালিত কম প্রভাবের বায়বীয় ওয়ার্কআউট, যাঁদের জয়েন্ট সমস্যা আছে বা হালকা ব্যায়ামের বিকল্প খুঁজছেন তাদের জন্য আদর্শ৷',NULL,NULL,'2024-08-22 04:30:41','2024-11-02 23:07:13'),(7,4,'en','Mind-Body Services','<p>Personal training services at a gym offer a personalized fitness experience tailored to each individual\'s unique needs and goals. Unlike a general workout routine, personal training provides one-on-one guidance from certified trainers who create a structured plan designed to help clients achieve specific objectives, whether that&rsquo;s weight loss, muscle gain, improving endurance, or enhancing flexibility. This personalized approach ensures that every workout is efficient and effective, focusing on exercises that are best suited for the client\'s body type and fitness aspirations.</p>\r\n<p>A personal trainer also offers motivation and accountability, which are essential for maintaining consistency and commitment. They keep clients engaged, help them push beyond their perceived limits, and celebrate every milestone achieved. Additionally, trainers educate clients on proper form and techniques to minimize the risk of injury, making sure that exercises are performed correctly to optimize results and build confidence over time. For beginners, this guidance is especially valuable, helping them develop good habits and a solid fitness foundation.</p>\r\n<p>The benefits of personal training extend beyond the physical aspects; it also fosters mental resilience and a positive outlook on health. Personal trainers often work closely with clients to set realistic and attainable goals, providing support every step of the way. Whether it\'s through continuous encouragement or adapting routines to fit lifestyle changes, personal training creates a supportive environment that makes fitness enjoyable and sustainable, helping individuals lead healthier, happier lives.</p>','Sessions focused on improving mental well-being through meditation techniques and mindfulness practices.',NULL,NULL,'2024-08-22 04:58:53','2024-10-29 03:50:47'),(8,4,'bn','মন-দেহ সেবা','<p>একটি জিমে ব্যক্তিগত প্রশিক্ষণ পরিষেবাগুলি প্রতিটি ব্যক্তির অনন্য চাহিদা এবং লক্ষ্যগুলির জন্য তৈরি একটি ব্যক্তিগতকৃত ফিটনেস অভিজ্ঞতা অফার করে। একটি সাধারণ ওয়ার্কআউট রুটিনের বিপরীতে, ব্যক্তিগত প্রশিক্ষণ প্রত্যয়িত প্রশিক্ষকদের কাছ থেকে একের পর এক নির্দেশনা প্রদান করে যারা ক্লায়েন্টদের নির্দিষ্ট লক্ষ্য অর্জনে সাহায্য করার জন্য ডিজাইন করা একটি কাঠামোগত পরিকল্পনা তৈরি করে, তা ওজন হ্রাস, পেশী বৃদ্ধি, সহনশীলতা উন্নত করা বা নমনীয়তা বাড়ানো। এই ব্যক্তিগতকৃত পন্থা নিশ্চিত করে যে প্রতিটি ওয়ার্কআউট দক্ষ এবং কার্যকর, ব্যায়ামের উপর ফোকাস করে যা ক্লায়েন্টের শরীরের ধরন এবং ফিটনেস আকাঙ্ক্ষার জন্য সবচেয়ে উপযুক্ত।</p>\r\n<p>একজন ব্যক্তিগত প্রশিক্ষক প্রেরণা এবং জবাবদিহিতাও অফার করে, যা ধারাবাহিকতা এবং প্রতিশ্রুতি বজায় রাখার জন্য অপরিহার্য। তারা ক্লায়েন্টদের নিযুক্ত রাখে, তাদের অনুভূত সীমা ছাড়িয়ে যেতে সাহায্য করে এবং অর্জিত প্রতিটি মাইলফলক উদযাপন করে। উপরন্তু, প্রশিক্ষকরা ক্লায়েন্টদের সঠিক ফর্ম এবং কৌশলগুলিকে আঘাতের ঝুঁকি কমানোর জন্য শিক্ষিত করে, নিশ্চিত করে যে অনুশীলনগুলি সঠিকভাবে ফলাফল অপ্টিমাইজ করতে এবং সময়ের সাথে আত্মবিশ্বাস তৈরি করতে পারে। নতুনদের জন্য, এই নির্দেশিকা বিশেষভাবে মূল্যবান, তাদের ভালো অভ্যাস এবং একটি শক্ত ফিটনেস ভিত্তি গড়ে তুলতে সাহায্য করে।</p>\r\n<p>ব্যক্তিগত প্রশিক্ষণের সুবিধাগুলি শারীরিক দিকগুলির বাইরেও প্রসারিত হয়; এটি মানসিক স্থিতিস্থাপকতা এবং স্বাস্থ্যের প্রতি ইতিবাচক দৃষ্টিভঙ্গিও বাড়ায়। ব্যক্তিগত প্রশিক্ষকরা প্রায়ই বাস্তবসম্মত এবং অর্জনযোগ্য লক্ষ্য নির্ধারণের জন্য ক্লায়েন্টদের সাথে ঘনিষ্ঠভাবে কাজ করে, প্রতিটি পদক্ষেপে সহায়তা প্রদান করে। এটি ক্রমাগত উত্সাহের মাধ্যমে হোক বা জীবনযাত্রার পরিবর্তনের সাথে মানানসই রুটিনগুলিকে মানিয়ে নেওয়া হোক না কেন, ব্যক্তিগত প্রশিক্ষণ একটি সহায়ক পরিবেশ তৈরি করে যা ফিটনেসকে উপভোগ্য এবং টেকসই করে তোলে, ব্যক্তিদের স্বাস্থ্যকর, সুখী জীবনযাপন করতে সহায়তা করে।</p>','সেশনগুলি ধ্যান কৌশল এবং মননশীলতা অনুশীলনের মাধ্যমে মানসিক সুস্থতার উন্নতির উপর দৃষ্টি নিবদ্ধ করে।',NULL,NULL,'2024-08-22 04:58:53','2024-11-02 23:08:01'),(9,1,'ar','التدريب الشخصي','<ul>\r\n<li>التدريب الفردي: جلسات مخصصة تركز على الأهداف الفردية ومستويات اللياقة البدنية والاحتياجات المحددة.<br>التدريب في مجموعات صغيرة: خيار أكثر فعالية من حيث التكلفة حيث يعمل المدرب مع مجموعة صغيرة، مما يوفر اهتمامًا شخصيًا مع التحفيز الإضافي من ديناميات المجموعة.<br>التدريب عبر الإنترنت/الافتراضي: تدريب شخصي يتم عبر مكالمات الفيديو، مما يوفر مرونة وراحة.</li>\r\n</ul>','جلسات مخصصة تركز على الأهداف الفردية ومستويات اللياقة البدنية والاحتياجات المحددة.',NULL,NULL,'2024-08-26 01:01:40','2024-08-26 03:39:07'),(10,2,'ar','خدمات العافية','<ul>\r\n<li>العلاج بالتدليك: جلسات تدليك علاجية تساعد في استعادة العضلات وتخفيف الألم والاسترخاء.<br>العلاج بالتبريد: علاج استعادة يتضمن تعريض الجسم لدرجات حرارة منخفضة جدًا لتقليل الالتهاب وتعزيز الشفاء.<br>ساونا وغرفة بخار: علاجات تعتمد على الحرارة تعزز الاسترخاء وإزالة السموم واستعادة العضلات.</li>\r\n</ul>','جلسات تدليك علاجية تساعد في استعادة العضلات وتخفيف الألم والاسترخاء.',NULL,NULL,'2024-08-26 01:01:40','2024-08-26 03:41:08'),(11,3,'ar','اللياقة البدنية المائية','<ul>\r\n<li>تمارين الأيروبكس المائية: تمارين هوائية منخفضة التأثير تُجرى في حوض السباحة، مثالية لمن يعانون من مشاكل في المفاصل أو يبحثون عن خيار تمرين أكثر لطفًا.<br>تدريب السباحة: جلسات سباحة منظمة تركز على تحسين التقنية والقدرة على التحمل والسرعة، مناسبة لجميع المستويات.</li>\r\n</ul>','تمارين هوائية منخفضة التأثير تُجرى في حوض السباحة، مثالية لمن يعانون من مشاكل في المفاصل أو يبحثون عن خيار تمرين أكثر لطفًا.',NULL,NULL,'2024-08-26 01:01:40','2024-08-26 03:42:36'),(12,4,'ar','خدمات العقل والجسد','<ul>\r\n<li>فصول التأمل واليقظة: جلسات تركز على تحسين الرفاهية العقلية من خلال تقنيات التأمل وممارسات اليقظة.<br>تاي تشي: فنون قتالية معروفة بحركاتها البطيئة والمدروسة والتركيز على التنفس والوضوح الذهني، مما يوفر فوائد جسدية وعقلية.</li>\r\n</ul>','جلسات تركز على تحسين الرفاهية العقلية من خلال تقنيات التأمل وممارسات اليقظة.',NULL,NULL,'2024-08-26 01:01:40','2024-08-26 03:43:47'),(13,5,'en','General Fitness','<p>Personal training services at a gym offer a personalized fitness experience tailored to each individual\'s unique needs and goals. Unlike a general workout routine, personal training provides one-on-one guidance from certified trainers who create a structured plan designed to help clients achieve specific objectives, whether that&rsquo;s weight loss, muscle gain, improving endurance, or enhancing flexibility. This personalized approach ensures that every workout is efficient and effective, focusing on exercises that are best suited for the client\'s body type and fitness aspirations.</p>\r\n<p>A personal trainer also offers motivation and accountability, which are essential for maintaining consistency and commitment. They keep clients engaged, help them push beyond their perceived limits, and celebrate every milestone achieved. Additionally, trainers educate clients on proper form and techniques to minimize the risk of injury, making sure that exercises are performed correctly to optimize results and build confidence over time. For beginners, this guidance is especially valuable, helping them develop good habits and a solid fitness foundation.</p>\r\n<p>The benefits of personal training extend beyond the physical aspects; it also fosters mental resilience and a positive outlook on health. Personal trainers often work closely with clients to set realistic and attainable goals, providing support every step of the way. Whether it\'s through continuous encouragement or adapting routines to fit lifestyle changes, personal training creates a supportive environment that makes fitness enjoyable and sustainable, helping individuals lead healthier, happier lives.</p>','Therapeutic massages that help with muscle recovery, pain relief, and relaxation.',NULL,NULL,'2024-09-04 22:43:22','2024-10-29 03:51:05'),(14,5,'bn','সাধারণ ফিটনেস','<p>একটি জিমে ব্যক্তিগত প্রশিক্ষণ পরিষেবাগুলি প্রতিটি ব্যক্তির অনন্য চাহিদা এবং লক্ষ্যগুলির জন্য তৈরি একটি ব্যক্তিগতকৃত ফিটনেস অভিজ্ঞতা অফার করে। একটি সাধারণ ওয়ার্কআউট রুটিনের বিপরীতে, ব্যক্তিগত প্রশিক্ষণ প্রত্যয়িত প্রশিক্ষকদের কাছ থেকে একের পর এক নির্দেশনা প্রদান করে যারা ক্লায়েন্টদের নির্দিষ্ট লক্ষ্য অর্জনে সাহায্য করার জন্য ডিজাইন করা একটি কাঠামোগত পরিকল্পনা তৈরি করে, তা ওজন হ্রাস, পেশী বৃদ্ধি, সহনশীলতা উন্নত করা বা নমনীয়তা বাড়ানো। এই ব্যক্তিগতকৃত পন্থা নিশ্চিত করে যে প্রতিটি ওয়ার্কআউট দক্ষ এবং কার্যকর, ব্যায়ামের উপর ফোকাস করে যা ক্লায়েন্টের শরীরের ধরন এবং ফিটনেস আকাঙ্ক্ষার জন্য সবচেয়ে উপযুক্ত।</p>\r\n<p>একজন ব্যক্তিগত প্রশিক্ষক প্রেরণা এবং জবাবদিহিতাও অফার করে, যা ধারাবাহিকতা এবং প্রতিশ্রুতি বজায় রাখার জন্য অপরিহার্য। তারা ক্লায়েন্টদের নিযুক্ত রাখে, তাদের অনুভূত সীমা ছাড়িয়ে যেতে সাহায্য করে এবং অর্জিত প্রতিটি মাইলফলক উদযাপন করে। উপরন্তু, প্রশিক্ষকরা ক্লায়েন্টদের সঠিক ফর্ম এবং কৌশলগুলিকে আঘাতের ঝুঁকি কমানোর জন্য শিক্ষিত করে, নিশ্চিত করে যে অনুশীলনগুলি সঠিকভাবে ফলাফল অপ্টিমাইজ করতে এবং সময়ের সাথে আত্মবিশ্বাস তৈরি করতে পারে। নতুনদের জন্য, এই নির্দেশিকা বিশেষভাবে মূল্যবান, তাদের ভালো অভ্যাস এবং একটি শক্ত ফিটনেস ভিত্তি গড়ে তুলতে সাহায্য করে।</p>\r\n<p>ব্যক্তিগত প্রশিক্ষণের সুবিধাগুলি শারীরিক দিকগুলির বাইরেও প্রসারিত হয়; এটি মানসিক স্থিতিস্থাপকতা এবং স্বাস্থ্যের প্রতি ইতিবাচক দৃষ্টিভঙ্গিও বাড়ায়। ব্যক্তিগত প্রশিক্ষকরা প্রায়ই বাস্তবসম্মত এবং অর্জনযোগ্য লক্ষ্য নির্ধারণের জন্য ক্লায়েন্টদের সাথে ঘনিষ্ঠভাবে কাজ করে, প্রতিটি পদক্ষেপে সহায়তা প্রদান করে। এটি ক্রমাগত উত্সাহের মাধ্যমে হোক বা জীবনযাত্রার পরিবর্তনের সাথে মানানসই রুটিনগুলিকে মানিয়ে নেওয়া হোক না কেন, ব্যক্তিগত প্রশিক্ষণ একটি সহায়ক পরিবেশ তৈরি করে যা ফিটনেসকে উপভোগ্য এবং টেকসই করে তোলে, ব্যক্তিদের স্বাস্থ্যকর, সুখী জীবনযাপন করতে সহায়তা করে।</p>','থেরাপিউটিক ম্যাসেজ যা পেশী পুনরুদ্ধার, ব্যথা উপশম এবং শিথিলকরণে সহায়তা করে।',NULL,NULL,'2024-09-04 22:43:22','2024-11-02 23:08:47'),(15,5,'ar','اللياقة العامة','<ul>\r\n<li><strong>العلاج بالتدليك:</strong> جلسات تدليك علاجية تساعد على تعافي العضلات وتخفيف الألم والاسترخاء.</li>\r\n<li><strong>العلاج بالتبريد:</strong> علاج تعافي يتضمن تعريض الجسم لدرجات حرارة شديدة البرودة لتقليل الالتهاب وتعزيز التعافي.</li>\r\n<li><strong>غرفة الساونا والبخار:</strong> العلاجات المعتمدة على الحرارة التي تعزز الاسترخاء وإزالة السموم وتعافي العضلات.</li>\r\n</ul>','جلسات تدليك علاجية تساعد على تعافي العضلات وتخفيف الألم والاسترخاء.',NULL,NULL,'2024-09-04 22:43:22','2024-11-03 23:57:16'),(16,6,'en','Specialized Training','<p>Personal training services at a gym offer a personalized fitness experience tailored to each individual\'s unique needs and goals. Unlike a general workout routine, personal training provides one-on-one guidance from certified trainers who create a structured plan designed to help clients achieve specific objectives, whether that&rsquo;s weight loss, muscle gain, improving endurance, or enhancing flexibility. This personalized approach ensures that every workout is efficient and effective, focusing on exercises that are best suited for the client\'s body type and fitness aspirations.</p>\r\n<p>A personal trainer also offers motivation and accountability, which are essential for maintaining consistency and commitment. They keep clients engaged, help them push beyond their perceived limits, and celebrate every milestone achieved. Additionally, trainers educate clients on proper form and techniques to minimize the risk of injury, making sure that exercises are performed correctly to optimize results and build confidence over time. For beginners, this guidance is especially valuable, helping them develop good habits and a solid fitness foundation.</p>\r\n<p>The benefits of personal training extend beyond the physical aspects; it also fosters mental resilience and a positive outlook on health. Personal trainers often work closely with clients to set realistic and attainable goals, providing support every step of the way. Whether it\'s through continuous encouragement or adapting routines to fit lifestyle changes, personal training creates a supportive environment that makes fitness enjoyable and sustainable, helping individuals lead healthier, happier lives.</p>','Therapeutic massages that help with muscle recovery, pain relief, and relaxation.',NULL,NULL,'2024-09-04 22:45:48','2024-10-29 03:51:23'),(17,6,'bn','সুস্থতা সেবা','<p>একটি জিমে ব্যক্তিগত প্রশিক্ষণ পরিষেবাগুলি প্রতিটি ব্যক্তির অনন্য চাহিদা এবং লক্ষ্যগুলির জন্য তৈরি একটি ব্যক্তিগতকৃত ফিটনেস অভিজ্ঞতা অফার করে। একটি সাধারণ ওয়ার্কআউট রুটিনের বিপরীতে, ব্যক্তিগত প্রশিক্ষণ প্রত্যয়িত প্রশিক্ষকদের কাছ থেকে একের পর এক নির্দেশনা প্রদান করে যারা ক্লায়েন্টদের নির্দিষ্ট লক্ষ্য অর্জনে সাহায্য করার জন্য ডিজাইন করা একটি কাঠামোগত পরিকল্পনা তৈরি করে, তা ওজন হ্রাস, পেশী বৃদ্ধি, সহনশীলতা উন্নত করা বা নমনীয়তা বাড়ানো। এই ব্যক্তিগতকৃত পন্থা নিশ্চিত করে যে প্রতিটি ওয়ার্কআউট দক্ষ এবং কার্যকর, ব্যায়ামের উপর ফোকাস করে যা ক্লায়েন্টের শরীরের ধরন এবং ফিটনেস আকাঙ্ক্ষার জন্য সবচেয়ে উপযুক্ত।</p>\r\n<p>একজন ব্যক্তিগত প্রশিক্ষক প্রেরণা এবং জবাবদিহিতাও অফার করে, যা ধারাবাহিকতা এবং প্রতিশ্রুতি বজায় রাখার জন্য অপরিহার্য। তারা ক্লায়েন্টদের নিযুক্ত রাখে, তাদের অনুভূত সীমা ছাড়িয়ে যেতে সাহায্য করে এবং অর্জিত প্রতিটি মাইলফলক উদযাপন করে। উপরন্তু, প্রশিক্ষকরা ক্লায়েন্টদের সঠিক ফর্ম এবং কৌশলগুলিকে আঘাতের ঝুঁকি কমানোর জন্য শিক্ষিত করে, নিশ্চিত করে যে অনুশীলনগুলি সঠিকভাবে ফলাফল অপ্টিমাইজ করতে এবং সময়ের সাথে আত্মবিশ্বাস তৈরি করতে পারে। নতুনদের জন্য, এই নির্দেশিকা বিশেষভাবে মূল্যবান, তাদের ভালো অভ্যাস এবং একটি শক্ত ফিটনেস ভিত্তি গড়ে তুলতে সাহায্য করে।</p>\r\n<p>ব্যক্তিগত প্রশিক্ষণের সুবিধাগুলি শারীরিক দিকগুলির বাইরেও প্রসারিত হয়; এটি মানসিক স্থিতিস্থাপকতা এবং স্বাস্থ্যের প্রতি ইতিবাচক দৃষ্টিভঙ্গিও বাড়ায়। ব্যক্তিগত প্রশিক্ষকরা প্রায়ই বাস্তবসম্মত এবং অর্জনযোগ্য লক্ষ্য নির্ধারণের জন্য ক্লায়েন্টদের সাথে ঘনিষ্ঠভাবে কাজ করে, প্রতিটি পদক্ষেপে সহায়তা প্রদান করে। এটি ক্রমাগত উত্সাহের মাধ্যমে হোক বা জীবনযাত্রার পরিবর্তনের সাথে মানানসই রুটিনগুলিকে মানিয়ে নেওয়া হোক না কেন, ব্যক্তিগত প্রশিক্ষণ একটি সহায়ক পরিবেশ তৈরি করে যা ফিটনেসকে উপভোগ্য এবং টেকসই করে তোলে, ব্যক্তিদের স্বাস্থ্যকর, সুখী জীবনযাপন করতে সহায়তা করে।</p>','থেরাপিউটিক ম্যাসেজ যা পেশী পুনরুদ্ধার, ব্যথা উপশম এবং শিথিলকরণে সহায়তা করে।',NULL,NULL,'2024-09-04 22:45:48','2024-11-02 23:09:34'),(18,6,'ar','التدريب المتخصص','<ul>\r\n<li><strong>العلاج بالتدليك:</strong> جلسات تدليك علاجية تساعد على تعافي العضلات وتخفيف الألم والاسترخاء.</li>\r\n<li><strong>العلاج بالتبريد:</strong> علاج تعافي يتضمن تعريض الجسم لدرجات حرارة شديدة البرودة لتقليل الالتهاب وتعزيز التعافي.</li>\r\n<li><strong>غرفة الساونا والبخار:</strong> العلاجات المعتمدة على الحرارة التي تعزز الاسترخاء وإزالة السموم وتعافي العضلات.</li>\r\n</ul>','جلسات تدليك علاجية تساعد على تعافي العضلات وتخفيف الألم والاسترخاء.',NULL,NULL,'2024-09-04 22:45:48','2024-11-03 23:56:37');
/*!40000 ALTER TABLE `service_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'personal-training','/uploads/custom-images/gym_service/wsus-img-2024-08-22-10-52-57-5155.jpg','[\"130,131,132,133,134,135,136\"]','[{\"link\":\"https:\\/\\/youtu.be\\/HQfF5XRVXjU?si=MrNNiNjFfcIxQ-z9\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-08-00-30-7051.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-08-00-30-2776.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-08-00-30-9134.jpg\"}]',1,'[{\"value\":\"persoanl\"},{\"value\":\"training\"}]','2024-08-22 02:00:30','2024-11-10 00:13:15','/uploads/files/gym_service/wsus-img-2024-08-22-08-31-03-2928.pdf'),(2,'wellness-services','/uploads/custom-images/gym_service/wsus-img-2024-08-22-10-54-02-8019.jpg','[\"130,131,132,135,136\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-26-35-1358.jpg\"},{\"link\":\"https:\\/\\/youtu.be\\/HQfF5XRVXjU?si=MrNNiNjFfcIxQ-z9\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-26-35-7409.jpg\"}]',1,'[{\"value\":\"wellness\"},{\"value\":\"recovery\"}]','2024-08-22 04:26:35','2024-08-22 04:54:02','/uploads/files/gym_service/wsus-img-2024-08-22-10-26-35-9435.pdf'),(3,'aquatic-fitness','/uploads/custom-images/gym_service/wsus-img-2024-08-22-10-54-55-5273.jpg','[\"138,139,132,136\"]','[{\"link\":\"https:\\/\\/youtu.be\\/HQfF5XRVXjU?si=MrNNiNjFfcIxQ-z9\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-30-41-6893.jpg\"},{\"link\":\"https:\\/\\/youtu.be\\/HQfF5XRVXjU?si=MrNNiNjFfcIxQ-z9\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-30-41-2105.jpg\"},{\"link\":\"https:\\/\\/youtu.be\\/HQfF5XRVXjU?si=MrNNiNjFfcIxQ-z9\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-30-41-3174.jpg\"}]',1,'[{\"value\":\"fitness\"},{\"value\":\"aquatic\"}]','2024-08-22 04:30:41','2024-08-22 04:54:55','/uploads/files/gym_service/wsus-img-2024-08-22-10-30-41-3405.pdf'),(4,'mind-body-services','/uploads/custom-images/gym_service/wsus-img-2024-08-22-10-58-53-8376.jpg','[\"138,130,132,133,134,136\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-58-53-4245.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-08-22-10-58-53-8393.jpg\"}]',1,'[{\"value\":\"Services\"},{\"value\":\"Mind\"}]','2024-08-22 04:58:53','2024-10-29 03:50:47','/uploads/files/gym_service/wsus-img-2024-08-22-10-58-53-9730.pdf'),(5,'general-fitness','/uploads/custom-images/gym_service/wsus-img-2024-09-10-06-47-47-9708.png','[\"130,131,132\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-09-05-04-43-22-2791.jpg\"}]',1,'[{\"value\":\"fitness\"},{\"value\":\"general\"}]','2024-09-04 22:43:22','2024-11-04 03:54:33','/uploads/files/gym_service/wsus-img-2024-09-05-04-43-22-2407.pdf'),(6,'specialized-training','/uploads/custom-images/gym_service/wsus-img-2024-09-10-06-49-40-1581.png','[\"138,139,130,133\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-09-05-04-45-48-3735.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/gym_service\\/wsus-img-2024-09-05-04-45-48-9942.jpg\"}]',1,'[{\"value\":\"Services\"},{\"value\":\"wellness\"}]','2024-09-04 22:45:48','2024-09-10 00:49:40','/uploads/files/gym_service/wsus-img-2024-09-05-04-45-48-1219.pdf');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'home_theme','all','2024-09-04 21:30:12','2024-10-09 03:32:38'),(2,'app_name','Fitnes','2024-09-04 21:30:12','2024-11-23 00:08:12'),(3,'version','2.2.0','2024-09-04 21:30:12','2024-09-04 21:30:12'),(4,'admin_logo','uploads/custom-images/wsus-img-2024-10-29-10-45-32-4354.png','2024-09-04 21:30:12','2024-10-29 04:45:32'),(5,'logo','uploads/website-images/logo.png','2024-09-04 21:30:12','2024-09-04 21:30:12'),(6,'timezone','Asia/Dhaka','2024-09-04 21:30:12','2024-10-09 03:32:38'),(7,'admin_favicon','uploads/custom-images/wsus-img-2024-10-29-10-42-30-9127.png','2024-09-04 21:30:12','2024-10-29 04:42:30'),(8,'favicon','uploads/custom-images/wsus-img-2024-10-29-10-42-30-1685.png','2024-09-04 21:30:12','2024-10-29 04:42:30'),(9,'invoice_logo','website/images/invoice_logo.png','2024-09-04 21:30:12','2024-09-04 21:30:12'),(10,'cookie_status','active','2024-09-04 21:30:12','2024-09-04 21:30:12'),(11,'border','normal','2024-09-04 21:30:13','2024-09-04 21:30:13'),(12,'corners','thin','2024-09-04 21:30:13','2024-09-04 21:30:13'),(13,'background_color','#184dec','2024-09-04 21:30:13','2024-09-04 21:30:13'),(14,'text_color','#fafafa','2024-09-04 21:30:13','2024-09-04 21:30:13'),(15,'border_color','#0a58d6','2024-09-04 21:30:13','2024-09-04 21:30:13'),(16,'btn_bg_color','#fffceb','2024-09-04 21:30:13','2024-09-04 21:30:13'),(17,'btn_text_color','#222758','2024-09-04 21:30:13','2024-09-04 21:30:13'),(18,'link','#','2024-09-04 21:30:13','2024-09-04 21:30:13'),(19,'link_text','More Info','2024-09-04 21:30:13','2024-09-04 21:30:13'),(20,'btn_text','Yes','2024-09-04 21:30:13','2024-09-04 21:30:13'),(21,'message','This website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only upon approval.','2024-09-04 21:30:13','2024-09-04 21:30:13'),(22,'copyright_text','2024 WebSolutionUs All Rights Reserved.','2024-09-04 21:30:13','2024-09-08 04:43:37'),(23,'recaptcha_site_key','6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI','2024-09-04 21:30:13','2024-09-04 22:26:22'),(24,'recaptcha_secret_key','6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe','2024-09-04 21:30:13','2024-09-04 22:26:22'),(25,'recaptcha_status','active','2024-09-04 21:30:13','2024-09-04 22:26:22'),(26,'tawk_chat_link','chat_link','2024-09-04 21:30:13','2024-09-04 21:30:13'),(27,'tawk_status','inactive','2024-09-04 21:30:13','2024-09-04 21:30:13'),(28,'google_analytic_status','inactive','2024-09-04 21:30:13','2024-09-04 21:30:13'),(29,'google_analytic_id','google_analytic_id','2024-09-04 21:30:13','2024-09-04 21:30:13'),(30,'pixel_status','inactive','2024-09-04 21:30:13','2024-09-04 21:30:13'),(31,'pixel_app_id','pixel_app_id','2024-09-04 21:30:13','2024-09-04 21:30:13'),(32,'facebook_login_status','inactive','2024-09-04 21:30:13','2024-09-04 21:30:13'),(33,'facebook_app_id','facebook_app_id','2024-09-04 21:30:13','2024-09-04 21:30:13'),(34,'facebook_app_secret','facebook_app_secret','2024-09-04 21:30:13','2024-09-04 21:30:13'),(35,'facebook_redirect_url','facebook_redirect_url','2024-09-04 21:30:13','2024-09-04 21:30:13'),(36,'google_login_status','inactive','2024-09-04 21:30:13','2024-10-31 07:37:27'),(37,'gmail_client_id','1032247393692-m971vqjtbbsoeecu5agg95rou2epqpmg.apps.googleusercontent.com','2024-09-04 21:30:13','2024-10-31 07:37:27'),(38,'gmail_secret_id','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','2024-09-04 21:30:13','2024-10-31 07:37:27'),(39,'gmail_redirect_url','http://127.0.0.1:8000/auth/google/callback','2024-09-04 21:30:13','2024-10-31 07:37:27'),(40,'default_avatar','uploads/website-images/default-avatar.png','2024-09-04 21:30:13','2024-09-04 21:30:13'),(41,'breadcrumb_image','uploads/website-images/breadcrumb-image.jpg','2024-09-04 21:30:13','2024-09-04 21:30:13'),(42,'mail_host','smtp.mailtrap.io','2024-09-04 21:30:13','2024-09-04 21:30:13'),(43,'mail_sender_email','sender@gmail.com','2024-09-04 21:30:13','2024-09-04 21:30:13'),(44,'mail_username','58784e2a1e8e06','2024-09-04 21:30:13','2024-09-04 21:30:13'),(45,'mail_password','266052f6bf04bf','2024-09-04 21:30:13','2024-09-04 21:30:13'),(46,'mail_port','2525','2024-09-04 21:30:13','2024-09-04 21:30:13'),(47,'mail_encryption','tls','2024-09-04 21:30:13','2024-09-04 21:30:13'),(48,'mail_sender_name','WebSolutionUs','2024-09-04 21:30:13','2024-09-04 21:30:13'),(49,'contact_message_receiver_mail','admin@gmail.com','2024-09-04 21:30:13','2024-09-04 21:30:13'),(50,'pusher_app_id','pusher_app_id','2024-09-04 21:30:13','2024-09-04 21:30:13'),(51,'pusher_app_key','pusher_app_key','2024-09-04 21:30:13','2024-09-04 21:30:13'),(52,'pusher_app_secret','pusher_app_secret','2024-09-04 21:30:13','2024-09-04 21:30:13'),(53,'pusher_app_cluster','pusher_app_cluster','2024-09-04 21:30:13','2024-09-04 21:30:13'),(54,'pusher_status','active','2024-09-04 21:30:13','2024-09-04 21:30:13'),(55,'club_point_rate','1','2024-09-04 21:30:13','2024-09-04 21:30:13'),(56,'club_point_status','active','2024-09-04 21:30:13','2024-09-04 21:30:13'),(57,'maintenance_mode','0','2024-09-04 21:30:13','2024-09-04 21:30:13'),(58,'maintenance_image','','2024-09-04 21:30:13','2024-09-04 21:30:13'),(59,'maintenance_title','Website Under maintenance','2024-09-04 21:30:13','2024-09-04 21:30:13'),(60,'maintenance_description','<p>We are currently performing maintenance on our website to<br>improve your experience. Please check back later.</p>','2024-09-04 21:30:13','2024-09-04 21:30:13'),(61,'last_update_date','2024-03-12 12:00:00','2024-09-04 21:30:13','2024-11-23 00:08:12'),(62,'is_queable','inactive','2024-09-04 21:30:13','2024-10-09 03:32:38'),(63,'website_short_description','Qui magni autem id omnis assumenda ut maxime Quis sed voluptatum modi, omnis tenetur est.','2024-09-04 21:37:27','2024-10-27 04:26:46'),(64,'website_phone','865-658-2083','2024-09-04 21:37:27','2024-10-27 04:26:46'),(65,'website_address','3815 Berkshire Circle','2024-09-04 21:37:27','2024-10-27 04:26:46'),(66,'website_email','fitness@mail.com','2024-09-04 21:37:27','2024-10-27 04:26:46'),(67,'website_facebook_url','https://www.facebook.com','2024-09-04 21:37:27','2024-10-27 04:26:46'),(68,'website_instagram_url','https://www.instagram.com','2024-09-04 21:37:27','2024-10-27 04:26:46'),(69,'website_twitter_url','https://www.twitter.com','2024-09-04 21:37:27','2024-10-27 04:26:46'),(70,'website_linkedin_url','https://www.linkedin.com','2024-09-04 21:37:27','2024-10-27 04:26:46'),(71,'primary_color','#eefb13','2024-11-22 03:22:56','2024-11-22 03:36:10'),(72,'secondary_color','#0e0e55','2024-11-22 03:22:57','2024-11-22 03:22:57'),(73,'common_color_one','#171718','2024-11-22 03:22:57','2024-11-22 03:22:57'),(74,'common_color_two','#bebec9','2024-11-22 03:22:57','2024-11-22 03:22:57'),(75,'common_color_three','#737382','2024-11-22 03:22:57','2024-11-22 03:22:57'),(76,'common_color_four','#eff0f3','2024-11-22 03:22:57','2024-11-22 03:22:57'),(77,'common_color_five','#272732','2024-11-22 03:22:57','2024-11-22 03:22:57'),(78,'common_color_six','#f5980c','2024-11-22 03:25:57','2024-11-22 03:25:57');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_methods`
--

DROP TABLE IF EXISTS `shipping_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fee` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `minimum_order` double DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `shipping_methods`
--

LOCK TABLES `shipping_methods` WRITE;
/*!40000 ALTER TABLE `shipping_methods` DISABLE KEYS */;
INSERT INTO `shipping_methods` VALUES (1,'Inside City',NULL,100.00,1,0,NULL,NULL,'2024-06-03 06:22:01','2024-06-03 06:22:01'),(2,'Outside City',NULL,200.00,1,0,NULL,NULL,'2024-06-03 06:22:43','2024-06-03 06:22:43');
/*!40000 ALTER TABLE `shipping_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socialite_credentials`
--

DROP TABLE IF EXISTS `socialite_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `socialite_credentials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `provider_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provider_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `refresh_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `socialite_credentials`
--

LOCK TABLES `socialite_credentials` WRITE;
/*!40000 ALTER TABLE `socialite_credentials` DISABLE KEYS */;
INSERT INTO `socialite_credentials` VALUES (1,2,'google','109722453025322460305','ya29.a0AXooCgtSgi0JKJnIHyE-wPqjvp40nfuB2YjaR1Wi72J1mTn9IKGYqIVXcOP8X8fU5eLoUAa1Cd4hdmHj85xoTIQXdYL2nZC4HoXpIr8p2gMAqRxsHFJT1SWpKpex58agSHW9KMJqBmV1MacaaSQbgrGmbadEBCEIRhaiaCgYKAfwSARASFQHGX2MiHVqO507oWCLjv2M-0L-y0g0171',NULL,'2024-06-02 23:57:17','2024-06-02 23:57:17');
/*!40000 ALTER TABLE `socialite_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialist_translations`
--

DROP TABLE IF EXISTS `specialist_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialist_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `specialist_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `specialist_translations_specialist_id_foreign` (`specialist_id`),
  CONSTRAINT `specialist_translations_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `specialist_translations`
--

LOCK TABLES `specialist_translations` WRITE;
/*!40000 ALTER TABLE `specialist_translations` DISABLE KEYS */;
INSERT INTO `specialist_translations` VALUES (1,1,'en','Personal Trainer',NULL,'2024-06-03 06:25:59','2024-08-14 22:21:43'),(2,1,'bn','ফিটনেস কোচ',NULL,'2024-06-03 06:25:59','2024-11-02 22:31:14'),(3,2,'en','Strength Coach',NULL,'2024-06-03 06:26:52','2024-08-14 22:22:40'),(4,2,'bn','বডি বিল্ডিং',NULL,'2024-06-03 06:26:52','2024-11-02 22:31:44'),(5,3,'en','Fitness Instructor',NULL,'2024-08-14 22:23:15','2024-08-14 22:23:15'),(6,3,'bn','ফিটনেস প্রশিক্ষক',NULL,'2024-08-14 22:23:16','2024-11-02 22:32:10'),(7,4,'en','Nutritionist',NULL,'2024-08-14 22:24:18','2024-08-14 22:24:18'),(8,4,'bn','পুষ্টিবিদ',NULL,'2024-08-14 22:24:18','2024-11-02 22:32:35'),(9,5,'en','Physiologist',NULL,'2024-08-14 22:25:06','2024-08-14 22:25:06'),(10,5,'bn','ফিজিওলজিস্ট',NULL,'2024-08-14 22:25:06','2024-11-02 22:33:05'),(11,6,'en','Sports Therapist',NULL,'2024-08-14 22:25:42','2024-08-14 22:25:42'),(12,6,'bn','ক্রীড়া থেরাপিস্ট',NULL,'2024-08-14 22:25:42','2024-11-02 22:33:37'),(13,7,'en','Pilates Instructor',NULL,'2024-08-14 22:26:33','2024-08-14 22:26:33'),(14,7,'bn','পাইলেটস প্রশিক্ষক',NULL,'2024-08-14 22:26:33','2024-11-02 22:34:03'),(15,8,'en','Kinesiologist',NULL,'2024-08-14 22:26:56','2024-08-14 22:26:56'),(16,8,'bn','কাইনেসিওলজিস্ট',NULL,'2024-08-14 22:26:56','2024-11-02 22:34:25'),(17,9,'en','Bodybuilding Coach',NULL,'2024-08-14 22:27:22','2024-08-14 22:27:22'),(18,9,'bn','বডি বিল্ডিং কোচ',NULL,'2024-08-14 22:27:22','2024-11-02 22:34:50'),(19,10,'en','CrossFit Coach',NULL,'2024-08-14 22:28:23','2024-08-14 22:28:23'),(20,10,'bn','ক্রসফিট কোচ',NULL,'2024-08-14 22:28:23','2024-11-02 22:35:11'),(21,11,'en','Health Coach',NULL,'2024-08-14 22:28:49','2024-08-14 22:28:49'),(22,11,'bn','স্বাস্থ্য প্রশিক্ষক',NULL,'2024-08-14 22:28:49','2024-11-02 22:35:31'),(23,12,'en','Powerlifting Coach',NULL,'2024-08-14 22:29:25','2024-08-14 22:29:25'),(24,12,'bn','Powerlifting Coach',NULL,'2024-08-14 22:29:25','2024-08-14 22:29:25'),(25,1,'ar','مدرب شخصي',NULL,'2024-08-26 01:01:40','2024-10-23 02:34:59'),(26,2,'ar','مدرب القوة',NULL,'2024-08-26 01:01:40','2024-10-23 02:35:25'),(27,3,'ar','مدرب لياقة بدنية',NULL,'2024-08-26 01:01:40','2024-10-23 02:35:47'),(28,4,'ar','اخصائي تغذية',NULL,'2024-08-26 01:01:40','2024-10-23 02:36:12'),(29,5,'ar','عالم فسيولوجي',NULL,'2024-08-26 01:01:40','2024-10-23 02:36:37'),(30,6,'ar','معالج رياضي',NULL,'2024-08-26 01:01:40','2024-10-23 02:36:56'),(31,7,'ar','مدرب بيلاتيس',NULL,'2024-08-26 01:01:40','2024-10-23 02:37:43'),(32,8,'ar','Kinesiologist',NULL,'2024-08-26 01:01:40','2024-08-26 01:01:40'),(33,9,'ar','مدرب كمال الاجسام',NULL,'2024-08-26 01:01:40','2024-10-23 02:38:53'),(34,10,'ar','مدرب كروس فيت',NULL,'2024-08-26 01:01:40','2024-10-23 02:39:24'),(35,11,'ar','مدرب الصحة',NULL,'2024-08-26 01:01:40','2024-10-23 02:39:53'),(36,12,'ar','مدرب رفع الاثقال',NULL,'2024-08-26 01:01:40','2024-10-08 21:43:04');
/*!40000 ALTER TABLE `specialist_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialists`
--

DROP TABLE IF EXISTS `specialists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialists_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `specialists`
--

LOCK TABLES `specialists` WRITE;
/*!40000 ALTER TABLE `specialists` DISABLE KEYS */;
INSERT INTO `specialists` VALUES (1,'personal-trainer',NULL,'1','2024-06-03 06:25:59','2024-08-14 22:21:43'),(2,'-strength-coach',NULL,'1','2024-06-03 06:26:52','2024-08-14 22:22:40'),(3,'fitness-instructor',NULL,'1','2024-08-14 22:23:15','2024-08-14 22:23:15'),(4,'nutritionist',NULL,'1','2024-08-14 22:24:18','2024-08-14 22:24:18'),(5,'physiologist',NULL,'1','2024-08-14 22:25:06','2024-08-14 22:25:06'),(6,'sports-therapist',NULL,'1','2024-08-14 22:25:42','2024-08-14 22:25:42'),(7,'pilates-instructor',NULL,'1','2024-08-14 22:26:33','2024-08-14 22:26:33'),(8,'kinesiologist',NULL,'1','2024-08-14 22:26:56','2024-08-14 22:26:56'),(9,'bodybuilding-coach',NULL,'1','2024-08-14 22:27:22','2024-08-14 22:27:22'),(10,'crossfit-coach',NULL,'1','2024-08-14 22:28:23','2024-08-14 22:28:23'),(11,'health-coach',NULL,'1','2024-08-14 22:28:49','2024-08-14 22:28:49'),(12,'powerlifting-coach',NULL,'1','2024-08-14 22:29:24','2024-08-14 22:29:24');
/*!40000 ALTER TABLE `specialists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'New York','2024-06-03 01:54:26','2024-10-08 05:30:22');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_histories`
--

DROP TABLE IF EXISTS `subscription_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint unsigned NOT NULL,
  `invoice_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subscription_plan_id` bigint unsigned NOT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `cancellation_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `renewal_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subscription_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `subscription_histories`
--

LOCK TABLES `subscription_histories` WRITE;
/*!40000 ALTER TABLE `subscription_histories` DISABLE KEYS */;
INSERT INTO `subscription_histories` VALUES (1,2,'INV-92579247',2,'Standard Plan',200.00,NULL,'2024-06-03','2024-07-03','2024-07-03',1,'Paypal','success','S6QJBTAJ7NFQA','2024-06-03 00:59:39','2024-06-03 00:59:39','monthly',2000.00),(2,9,'INV-83966840',2,'Standard Plan',200.00,NULL,'2024-08-12','2024-09-11','2024-09-11',1,'bank_transfer','success',NULL,'2024-08-11 22:21:46','2024-08-11 22:21:46','monthly',200.00),(5,11,'INV-40507835',1,'Basic Plan',100.00,NULL,'2024-10-08','2024-11-07','2024-11-07',1,'stripe','success','1234567','2024-10-08 02:59:12','2024-10-08 02:59:12','monthly',100.00),(8,14,'INV-27439737',3,'Premium Plan',300.00,NULL,'2024-10-09','2025-04-07','2025-04-07',1,'Paypal','success','S6QJBTAJ7NFQA','2024-10-09 00:50:47','2024-10-09 00:50:47','monthly',3000.00),(9,14,'INV-11085834',2,'Standard Plan',200.00,NULL,'2024-10-09','2024-11-08','2024-11-08',1,'Direct Bank','success','Bank Name => Your bank name\r\nAccount Number => Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','2024-10-09 01:06:25','2024-10-09 02:02:11','monthly',2000.00),(10,14,'INV-84588334',1,'Basic Plan',100.00,NULL,'2024-11-20','2024-12-20','2024-12-20',1,'Stripe','success','pi_3QN5LqLdrMGLvvfW2uGs0tBl','2024-11-19 22:17:23','2024-11-19 22:17:23','monthly',100.00);
/*!40000 ALTER TABLE `subscription_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_options`
--

DROP TABLE IF EXISTS `subscription_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `subscription_options`
--

LOCK TABLES `subscription_options` WRITE;
/*!40000 ALTER TABLE `subscription_options` DISABLE KEYS */;
INSERT INTO `subscription_options` VALUES (1,1,'Access to Core Services','2024-06-02 05:31:17','2024-08-15 04:59:30'),(2,1,'Standard In-Person Support','2024-06-02 05:31:17','2024-08-15 04:59:55'),(3,1,'Access to Basic Resources','2024-06-02 05:31:17','2024-08-15 05:00:10'),(4,1,'Basic Practice Materials','2024-06-02 05:31:17','2024-08-15 05:00:48'),(5,1,'Regular Class Updates','2024-06-02 05:31:17','2024-08-15 05:01:10'),(6,2,'Access to Core Services','2024-06-02 05:31:17','2024-08-15 05:03:28'),(7,2,'Expanded Resources','2024-06-02 05:31:17','2024-08-15 05:04:47'),(8,2,'Enhanced Practice Materials','2024-06-02 05:31:17','2024-08-15 05:05:21'),(9,2,'Priority Class Updates','2024-06-02 05:31:17','2024-08-15 05:06:02'),(10,2,'Locker Facility','2024-06-02 05:31:17','2024-08-15 05:07:41'),(11,3,'Access to Core Services','2024-06-02 05:31:17','2024-08-15 05:09:02'),(12,3,'Priority In-Person Support','2024-06-02 05:31:17','2024-08-15 05:09:22'),(13,3,'Exclusive Resources','2024-06-02 05:31:17','2024-08-15 05:09:41'),(14,3,'Advanced Practice Materials','2024-06-02 05:31:17','2024-08-15 05:10:03'),(15,3,'Early Access to New Classes','2024-06-02 05:31:17','2024-08-15 05:10:25'),(16,1,'Basic Participant Management','2024-08-15 05:01:37','2024-08-15 05:01:37'),(17,2,'Training Workshops','2024-08-15 05:06:53','2024-08-15 05:06:53'),(18,3,'Locker Facility','2024-08-15 05:10:49','2024-08-15 05:10:49');
/*!40000 ALTER TABLE `subscription_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_plans`
--

DROP TABLE IF EXISTS `subscription_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `yearly_price` decimal(8,2) DEFAULT NULL,
  `free_trial` int NOT NULL DEFAULT '0',
  `expiration_date` enum('daily','monthly','quarterly','half-yearly','yearly') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'daily',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `serial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `subscription_plans`
--

LOCK TABLES `subscription_plans` WRITE;
/*!40000 ALTER TABLE `subscription_plans` DISABLE KEYS */;
INSERT INTO `subscription_plans` VALUES (1,'Basic Plan',100.00,1000.00,0,'monthly',1,'1','2024-06-02 05:31:17','2024-10-09 00:48:30'),(2,'Standard Plan',200.00,2000.00,0,'monthly',1,'2','2024-06-02 05:31:17','2024-06-03 00:58:09'),(3,'Premium Plan',300.00,3000.00,0,'yearly',1,'3','2024-06-02 05:31:17','2024-10-09 00:58:25');
/*!40000 ALTER TABLE `subscription_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rate` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
INSERT INTO `taxes` VALUES (1,'Free',0.00,1,0,NULL,'2024-06-02 22:41:28','2024-06-02 22:41:50'),(2,'@5%',5.00,1,0,NULL,'2024-06-03 06:23:26','2024-06-03 06:23:26');
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial_translations`
--

DROP TABLE IF EXISTS `testimonial_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonial_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `testimonial_id` bigint unsigned NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonial_translations_lang_code_index` (`lang_code`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `testimonial_translations`
--

LOCK TABLES `testimonial_translations` WRITE;
/*!40000 ALTER TABLE `testimonial_translations` DISABLE KEYS */;
INSERT INTO `testimonial_translations` VALUES (1,1,'en','Rizvi','Managing Director','\"Joining this gym was the best decision I ever made for my health. I’ve lost 30 pounds in the past six months, thanks to the amazing trainers and supportive community. The personalized workout plans and nutrition advice made all the difference. I feel stronger, healthier, and more confident than ever!\"','2024-06-03 04:11:15','2024-08-15 04:20:26'),(2,1,'bn','রিজভী','ব্যবস্থাপনা পরিচালক মো','\"এই জিমে যোগদান করা আমার স্বাস্থ্যের জন্য আমার নেওয়া সেরা সিদ্ধান্ত ছিল। আমি গত ছয় মাসে 30 পাউন্ড হারিয়েছি, আশ্চর্যজনক প্রশিক্ষক এবং সহায়ক সম্প্রদায়কে ধন্যবাদ। ব্যক্তিগতকৃত ওয়ার্কআউট পরিকল্পনা এবং পুষ্টির পরামর্শ সব পার্থক্য করেছে। আমি অনুভব করি আগের চেয়ে শক্তিশালী, স্বাস্থ্যকর এবং আরও আত্মবিশ্বাসী!\"','2024-06-03 04:11:15','2024-11-03 00:50:00'),(3,2,'en','James R.','Professional Athlete','\"As someone who’s always been into sports, I was looking for a gym that could push me to the next level. The strength and conditioning programs here are top-notch. I’ve increased my squat and deadlift by 50 pounds each, and my overall athletic performance has skyrocketed. The trainers.\"','2024-06-03 04:12:28','2024-10-23 02:06:14'),(4,2,'bn','আলেয়া গ্রাহাম','আমরা সবাই তাকে অভিযুক্ত করি','\"যে ব্যক্তি সবসময় খেলাধুলায় থাকে, আমি এমন একটি জিম খুঁজছিলাম যা আমাকে পরবর্তী স্তরে নিয়ে যেতে পারে। এখানে শক্তি এবং কন্ডিশনিং প্রোগ্রামগুলি সেরা। আমি আমার স্কোয়াট এবং ডেডলিফ্ট প্রতিটি 50 পাউন্ড বাড়িয়েছি, এবং আমার প্রশিক্ষকদের সামগ্রিক অ্যাথলেটিক পারফরম্যান্স আকাশচুম্বী করেছে।\"','2024-06-03 04:12:28','2024-11-03 00:50:48'),(5,3,'en','Emily K.','School Teacher','\"What I love most about this gym is the sense of community. Everyone here is friendly and supportive, and the group classes are always a blast. The instructors are enthusiastic and knowledgeable, and they always find a way to keep the workouts fun and challenging. This place challenging\"','2024-06-03 04:14:03','2024-10-23 02:10:49'),(6,3,'bn','Thomas Ferrell','Harum eum eos error','\"What I love most about this gym is the sense of community. Everyone here is friendly and supportive, and the group classes are always a blast. The instructors are enthusiastic and knowledgeable, and they always find a way to keep the workouts fun and challenging. This place challenging\"','2024-06-03 04:14:03','2024-11-03 00:51:16'),(7,4,'en','Mike T.','Software Developer','\"I was really intimidated to join a gym because I’m a complete beginner, but the staff here made me feel comfortable from day one. They took the time to explain everything and designed a workout plan that was perfect for my level. Now, I’m lifting weights and doing exercises I never thought!\"','2024-08-15 04:24:56','2024-10-23 02:07:11'),(8,4,'bn','মাইক টি।','সফটওয়্যার ডেভেলপার','\"আমি সত্যিই একটি জিমে যোগ দিতে ভয় পেয়েছিলাম কারণ আমি একজন সম্পূর্ণ শিক্ষানবিস, কিন্তু এখানকার কর্মীরা আমাকে প্রথম দিন থেকেই স্বাচ্ছন্দ্য বোধ করেছে। তারা সবকিছু ব্যাখ্যা করার জন্য সময় নিয়েছে এবং একটি ওয়ার্কআউট পরিকল্পনা তৈরি করেছে যা আমার স্তরের জন্য উপযুক্ত। এখন, আমি ওজন তুলছি এবং ব্যায়াম করছি আমি কখনো ভাবিনি এটা একটা জীবন-পরিবর্তনকারী অভিজ্ঞতা!\"','2024-08-15 04:24:56','2024-11-03 00:51:53'),(9,5,'en','Linda A.','Business Consultant','\"I’ve been working with a personal trainer here for the past year, and the results have been incredible. My trainer really listens to my goals and challenges me in ways I didn’t think were possible. I’ve built muscle, improved my endurance, and even fixed some old injuries. I can’t recommend!\"','2024-08-15 04:26:21','2024-10-23 02:07:38'),(10,5,'bn','লিন্ডা এ.','বিজনেস কনসালটেন্ট','\"আমি সত্যিই একটি জিমে যোগ দিতে ভয় পেয়েছিলাম কারণ আমি একজন সম্পূর্ণ শিক্ষানবিস, কিন্তু এখানকার কর্মীরা আমাকে প্রথম দিন থেকেই স্বাচ্ছন্দ্য বোধ করেছে। তারা সবকিছু ব্যাখ্যা করার জন্য সময় নিয়েছে এবং একটি ওয়ার্কআউট পরিকল্পনা তৈরি করেছে যা আমার স্তরের জন্য উপযুক্ত। এখন, আমি ওজন তুলছি এবং ব্যায়াম করছি যা আমি কখনও ভাবিনি!\"','2024-08-15 04:26:21','2024-11-03 00:52:36'),(11,1,'ar','Rizvi','Managing Director','\"انضمامي إلى هذا النادي كان أفضل قرار اتخذته من أجل صحتي. لقد خسرت 30 رطلاً في الأشهر الستة الماضية، وذلك بفضل المدربين الرائعين والمجتمع الداعم. خطط التمارين الشخصية ونصائح التغذية أحدثت فرقًا كبيرًا. أشعر أنني أقوى وأكثر صحة وثقة أكثر من أي وقت مضى!\"','2024-08-26 01:01:38','2024-08-26 05:52:05'),(12,2,'ar','James R.','Professional Athlete','\"انضمامي إلى هذا النادي كان أفضل قرار اتخذته من أجل صحتي. لقد خسرت 30 رطلاً في الأشهر الستة الماضية، وذلك بفضل المدربين الرائعين والمجتمع الداعم. خطط التمارين الشخصية ونصائح التغذية أحدثت فرقًا كبيرًا. أشعر أنني أقوى وأكثر صحة وثقة أكثر من أي وقت مضى!\"','2024-08-26 01:01:38','2024-10-23 02:13:03'),(13,3,'ar','Emily K.','School Teacher','\"انضمامي إلى هذا النادي كان أفضل قرار اتخذته من أجل صحتي. لقد خسرت 30 رطلاً في الأشهر الستة الماضية، وذلك بفضل المدربين الرائعين والمجتمع الداعم. خطط التمارين الشخصية ونصائح التغذية أحدثت فرقًا كبيرًا. أشعر أنني أقوى وأكثر صحة وثقة أكثر من أي وقت مضى!\"','2024-08-26 01:01:39','2024-10-23 02:13:21'),(14,4,'ar','Mike T.','Software Developer','\"انضمامي إلى هذا النادي كان أفضل قرار اتخذته من أجل صحتي. لقد خسرت 30 رطلاً في الأشهر الستة الماضية، وذلك بفضل المدربين الرائعين والمجتمع الداعم. خطط التمارين الشخصية ونصائح التغذية أحدثت فرقًا كبيرًا. أشعر أنني أقوى وأكثر صحة وثقة أكثر من أي وقت مضى!\"','2024-08-26 01:01:39','2024-10-23 02:13:40'),(15,5,'ar','Linda A.','Business Consultant','\"انضمامي إلى هذا النادي كان أفضل قرار اتخذته من أجل صحتي. لقد خسرت 30 رطلاً في الأشهر الستة الماضية، وذلك بفضل المدربين الرائعين والمجتمع الداعم. خطط التمارين الشخصية ونصائح التغذية أحدثت فرقًا كبيرًا. أشعر أنني أقوى وأكثر صحة وثقة أكثر من أي وقت مضى!\"','2024-08-26 01:01:39','2024-10-23 02:13:57');
/*!40000 ALTER TABLE `testimonial_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'uploads/custom-images/wsus-img-2024-06-03-10-11-15-3072.jpg','5',1,'2024-06-03 04:11:15','2024-10-09 02:11:59'),(2,'uploads/custom-images/wsus-img-2024-08-15-10-28-12-5637.png','5',1,'2024-06-03 04:12:28','2024-10-09 02:12:01'),(3,'uploads/custom-images/wsus-img-2024-06-03-10-14-03-3508.jpg','5',1,'2024-06-03 04:14:03','2024-10-09 02:12:03'),(4,'uploads/custom-images/wsus-img-2024-08-15-10-24-56-5280.png','5',1,'2024-08-15 04:24:56','2024-08-15 04:24:56'),(5,'uploads/custom-images/wsus-img-2024-08-15-10-26-21-6301.png','5',1,'2024-08-15 04:26:21','2024-08-15 04:26:21');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tool_translations`
--

DROP TABLE IF EXISTS `tool_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tool_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tool_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tool_translations_tool_id_foreign` (`tool_id`),
  CONSTRAINT `tool_translations_tool_id_foreign` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `tool_translations`
--

LOCK TABLES `tool_translations` WRITE;
/*!40000 ALTER TABLE `tool_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tool_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tools` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tools_created_by_foreign` (`created_by`),
  KEY `tools_updated_by_foreign` (`updated_by`),
  CONSTRAINT `tools_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tools_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `tools`
--

LOCK TABLES `tools` WRITE;
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;
/*!40000 ALTER TABLE `tools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trainers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `specialty_id` bigint unsigned NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hours_per_week` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trainers_slug_unique` (`slug`),
  KEY `trainers_user_id_foreign` (`user_id`),
  KEY `trainers_specialty_id_foreign` (`specialty_id`),
  CONSTRAINT `trainers_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE,
  CONSTRAINT `trainers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `trainers`
--

LOCK TABLES `trainers` WRITE;
/*!40000 ALTER TABLE `trainers` DISABLE KEYS */;
INSERT INTO `trainers` VALUES (1,3,1,'carson-williams','<p>Lorem ipsum dolor sit amet consectetur adipiscing elit quam malesuada nisi porta accumsan taciti potenti mi, bibendum per hendrerit ligula venenatis erat metus hac molestie curabitur quisque maecenas senectus. Eu est faucibus commodo nullam praesent vehicula dignissim,&nbsp;</p>',NULL,'145','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"body building\\\"},{\\\"value\\\":\\\"workout\\\"}]\"','1',NULL,'2024-06-03 06:30:56','2024-09-06 03:37:44'),(2,4,2,'flavia-stuart','<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus est, quam elementum in enim platea viverra phasellus tempor, taciti laoreet proin sem aliquam ullamcorper nibh dictumst. Taciti nibh ante ac metus interdum suscipit montes a rhoncus fames, eget id quis senectus dictum volutpat ligula egestas tortor, congue pretium varius mauris duis primis mus molestie in. Mauris faucibus porttitor curabitur aenean torquent vivamus sed eleifend posuere, sodales urna lectus tincidunt sagittis per platea egestas, phasellus metus vel nec et euismod primis aliquam. Fusce ad vel malesuada massa inceptos a nibh ligula morbi pretium volutpat, fringilla sem hendrerit sociosqu odio ornare mi nisi primis.</p>',NULL,'132','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"building\\\"},{\\\"value\\\":\\\"workout\\\"}]\"','1',NULL,'2024-06-03 06:34:31','2024-09-06 03:40:34'),(3,5,2,'leilani-rosales','<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, hendrerit nibh aliquet erat arcu dignissim, neque felis quisque quam ultrices senectus. Aptent viverra class aliquam fusce penatibus turpis enim sociosqu,&nbsp;</p>',NULL,'11','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"Body\\\"},{\\\"value\\\":\\\"building\\\"}]\"','1',NULL,'2024-06-05 22:02:13','2024-06-05 22:03:05'),(4,6,1,'eden-howard','<ul>\r\n<li><strong>Cardio Training</strong>: Incorporating low to moderate-intensity cardio for heart health and fat loss.</li>\r\n<li><strong>High-Intensity Interval Training (HIIT)</strong>: Short bursts of intense exercise followed by rest for fat loss while preserving muscle mass.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>Volume Training</strong>: High reps/sets to increase muscle size.</li>\r\n<li><strong>Time Under Tension (TUT)</strong>: Controlling the speed of lifts to maximize muscle engagement.</li>\r\n<li><strong>Muscle-Mind Connection</strong>: Focusing on the muscle being worked to enhance contraction and growth.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>Weightlifting Techniques</strong>: Proper form and technique in exercises like squats, deadlifts, bench presses, etc.</li>\r\n<li><strong>Progressive Overload</strong>: Gradually increasing the weight or intensity to build muscle.</li>\r\n<li><strong>Isolation Exercises</strong>: Targeting specific muscle groups (e.g., bicep curls, tricep extensions).</li>\r\n<li><strong>Compound Exercises</strong>: Engaging multiple muscle groups (e.g., deadlifts, squats).</li>\r\n</ul>\r\n<h3>&nbsp;</h3>',40,'','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"Strength Training\\\"},{\\\"value\\\":\\\"Muscle Hypertrophy\\\"},{\\\"value\\\":\\\"Cardiovascular Fitness\\\"},{\\\"value\\\":\\\"Nutrition and Diet\\\"}]\"','1',NULL,'2024-08-11 02:25:18','2024-10-09 00:11:57'),(5,16,12,'chava-britt',NULL,40,'122','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"squat\\\"},{\\\"value\\\":\\\"bench press\\\"},{\\\"value\\\":\\\"deadlift\\\"}]\"','1',NULL,'2024-08-14 22:41:39','2024-08-14 22:41:39'),(6,17,5,'miriam-mathews',NULL,25,'123','https://www.facebook.com',NULL,'https://www.twitter.com',NULL,'https://www.instagram.com',NULL,'\"[{\\\"value\\\":\\\"disease prevention\\\"},{\\\"value\\\":\\\"rehabilitation\\\"},{\\\"value\\\":\\\"health improvement\\\"}]\"','1',NULL,'2024-08-14 23:02:08','2024-08-14 23:02:08'),(7,18,2,'nelle-odom','<p>Focuses on improving athletic performance, strength, power, and endurance, often working with athletes.</p>\r\n<p>&nbsp;</p>\r\n<p>CSCS (Certified Strength and Conditioning Specialist), NSCA (National Strength and Conditioning Association).</p>',30,'124','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"strength\\\"},{\\\"value\\\":\\\"athletic performance\\\"},{\\\"value\\\":\\\"power\\\"},{\\\"value\\\":\\\"endurance\\\"}]\"','1',NULL,'2024-08-14 23:07:31','2024-08-14 23:07:31'),(8,19,1,'amos-rowland',NULL,20,'125','https://www.facebook.com',NULL,'https://www.twitter.com',NULL,'https://www.instagram.com',NULL,'\"[{\\\"value\\\":\\\"fitness goals\\\"},{\\\"value\\\":\\\"weight loss\\\"},{\\\"value\\\":\\\"muscle gain\\\"},{\\\"value\\\":\\\"overall fitness\\\"}]\"','1',NULL,'2024-08-15 00:26:24','2024-08-15 00:26:24'),(9,20,3,'eric-bridges',NULL,22,'126','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"aerobics\\\"},{\\\"value\\\":\\\"spinning\\\"},{\\\"value\\\":\\\"Zumba\\\"},{\\\"value\\\":\\\"yoga\\\"}]\"','1',NULL,'2024-08-15 00:29:11','2024-08-15 00:29:11'),(10,21,10,'jasper-swanson',NULL,16,'127','https://www.facebook.com','fab fa-facebook-f','https://www.twitter.com','fab fa-twitter','https://www.instagram.com','fab fa-instagram','\"[{\\\"value\\\":\\\"methodology\\\"},{\\\"value\\\":\\\"combining strength\\\"},{\\\"value\\\":\\\"cardio\\\"}]\"','1',NULL,'2024-08-15 00:35:16','2024-08-15 00:35:16');
/*!40000 ALTER TABLE `trainers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `is_banned` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `verification_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forget_password_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wallet_balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `user_type` enum('trainer','member') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pandora Moody','nasamoqi@mailinator.com','2024-06-02 21:33:00','$2y$12$T/PomfeETtGFDJunxxK3jONMngW1YtEdct8cih.vtUak9dp7gsl0u',NULL,NULL,NULL,'2024-06-02 21:33:00','2024-10-08 03:01:11','active','no',NULL,NULL,'01740497649','3656 Alexander Avenue',NULL,0.00,'member'),(2,'Rizvi Ahmed','rizvi1316@gmail.com','2024-06-02 23:57:17','$2y$10$Hr5fz.7oWrqtiahuQMaRuO3dK1coSvt/33ZreCHuhXLF8go41gJFG',NULL,NULL,'hpNE1OW61vZDDf7BvqxRvlp5yPvMdf3hOUMv5lFvmyfCVUGqWXBKjkr39h95','2024-06-02 23:57:17','2024-11-09 22:02:17','active','no','2YkNeERNBkv4ZEaMJ9mpZSl8npQx3oIufEDmkhrjm6GCrHQEBJeRU1sw71PByI4RfG1wljKgDo8LKn2v4svVB72XV4rEYINXKV3o','GVER25rQYyaX1P66wUzjFlmoKDy4wsuJhpSGLuAkTwdSFRzK0w6DY11CGMu9TJEuNd8XtxS4Y4fsHKKIpkX5Ou5Q9EqzpJL2ALxk',NULL,NULL,'https://lh3.googleusercontent.com/a/ACg8ocKp6KSm5Jt78JbunLaRcfsMamEwADbYffV8G7bJm2jvS6OWzWLG=s96-c',0.00,'member'),(3,'Carson Williams','trainer@gmail.com','2024-06-03 06:30:56','$2y$12$AJsh7WxD/p/mLzCm7VvMEu42sQ1Gl74R6hK.Fg7no1kOkTjzeHa9K',NULL,'male',NULL,'2024-06-03 06:30:56','2024-10-31 06:55:03','active','no',NULL,NULL,'01700110015',NULL,'uploads/custom-images/wsus-img-2024-10-08-11-42-26-1737.png',0.00,'trainer'),(4,'Flavia Stuart','trainer2@gmail.com','2024-06-03 06:34:31','$2y$12$MUw0WDGs6ErH1Bx1fXIAe.tQVJH4DGRs6YQYOyn2W/BfcJSVdkbEu',NULL,'male',NULL,'2024-06-03 06:34:31','2024-10-08 05:43:27','active','no',NULL,NULL,'01740497649',NULL,'uploads/custom-images/wsus-img-2024-10-08-11-43-27-1477.jpg',0.00,'trainer'),(5,'Leilani Rosales','trainer3@gmail.com','2024-06-05 22:02:13','$2y$12$.FVjD9Umr32IY0Uj9Ez.pePSBfWBtUMpL2.b.CwjCbg1L1kkErGQG',NULL,'male',NULL,'2024-06-05 22:02:13','2024-10-08 05:44:29','active','no',NULL,NULL,'+1 (496) 262-3953','Aut deserunt quaerat','uploads/custom-images/wsus-img-2024-10-08-11-44-29-7270.jpg',0.00,'trainer'),(6,'Eden Howard','trainer4@gmail.com','2024-08-11 02:25:18','$2y$12$VQy.3BZdz3CVqQrtUCbOOeSogLp3oq6Kh.W939YXvGq./9.iJZql2',NULL,'male',NULL,'2024-08-11 02:25:18','2024-10-09 00:18:29','active','no',NULL,NULL,'+1 (152) 614-9829','Quibusdam distinctio','uploads/custom-images/wsus-img-2024-10-09-06-18-29-6228.jpg',0.00,'trainer'),(7,'Beck Tillman','user1@gmail.com','2024-08-11 21:19:03','$2y$12$xR.PpRCDINBVpClpKvqHl.21pbF.XaHek1VcC90MTDkXUvmP79wha',NULL,NULL,NULL,'2024-08-11 21:19:03','2024-08-11 21:19:03','active','no',NULL,NULL,'+1 (607) 859-5023','4389 Cardinal Lane',NULL,0.00,'member'),(9,'Fiona Franco','user5@mailinator.com','2024-08-11 21:25:23','$2y$12$9Yqbh64UpeVTSUthLrFFt.8NgfoTMoV2cQgARfz9ilwDw4tx8rcTG',NULL,NULL,NULL,'2024-08-11 21:25:23','2024-08-11 21:25:23','active','no',NULL,NULL,'+1 (253) 529-5954','3317 Jim Rosa Lane',NULL,0.00,'member'),(10,'Lesley Wong','user6@gmail.com','2024-08-11 21:57:53','$2y$12$02IgRIQ2frPb8ECXnZXnPuUEgdTzgCZnrBF8yRJqf0RzwqWM9Cagy',NULL,NULL,NULL,'2024-08-11 21:57:53','2024-08-28 04:43:19','inactive','no',NULL,NULL,'+1 (611) 436-3333','4685 Reeves Street',NULL,0.00,'member'),(11,'Erasmus Morales','user7@gmail.com','2024-08-11 21:59:49','$2y$12$aeQv2gcxjLdmVIaSUzFjk.qz125/ANNSZR3W34ILttSFqVAIoanbG',NULL,NULL,NULL,'2024-08-11 21:59:49','2024-08-11 21:59:49','active','no',NULL,NULL,'+1 (483) 723-5294','4773 Smithfield Avenue',NULL,0.00,'member'),(12,'Adria Colon','user8@mailinator.com','2024-08-11 22:13:52','$2y$12$lTVt0ymjFqdgII2JQNjGVupH1aB5J5qx3MkxyvAu5Kgmefwp5jaMi',NULL,NULL,NULL,'2024-08-11 22:13:52','2024-08-11 22:13:52','active','no',NULL,NULL,'+1 (579) 539-1018','2606 Poplar Street',NULL,0.00,'member'),(13,'Devin Dillon','user9@mailinator.com','2024-08-11 22:21:46','$2y$12$pQ8pylvNdb5/ALeO8pXqFOy8SRChTbeHffP72E1h7dvhg2CiAuMo6',NULL,NULL,NULL,'2024-08-11 22:21:46','2024-08-11 22:21:46','active','no',NULL,NULL,'+1 (862) 205-4138','672 Church Street',NULL,0.00,'member'),(14,'Russell Acevedo','user12@mailinator.com','2024-08-11 22:41:29','$2y$12$fOeIkcG7AZ1nnP1VxzHAee898fikSMwoIfBo1tcd4r9U79MlZpuVG',NULL,NULL,NULL,'2024-08-11 22:41:29','2024-08-11 22:41:29','active','no',NULL,NULL,'+1 (402) 726-4282','4685 Reeves Street',NULL,0.00,'member'),(15,'Audra Lloyd','user15@gmail.com','2024-08-11 22:52:52','$2y$12$p7JzLb2oMQhZb77JHIPgbesbnPTVg58xVfe0185tNVgDfdJemDTYq',NULL,NULL,NULL,'2024-08-11 22:52:52','2024-08-11 22:52:52','active','no',NULL,NULL,'+1 (365) 902-3912','4389 Cardinal Lane',NULL,0.00,'member'),(16,'Chava Britt','trainer5@gmail.com','2024-08-14 22:41:39','$2y$12$EhBeJpIinLdzvaMhHqui/ugMti70yK7DaSd0cgAm5e06eLvXqKKL6',NULL,'male',NULL,'2024-08-14 22:41:39','2024-10-08 05:47:27','active','no',NULL,NULL,'+1 (311) 173-1675','3911 Valley Lane','uploads/custom-images/wsus-img-2024-10-08-11-47-27-8717.jpg',0.00,'trainer'),(17,'Miriam Mathews','trainer6@gmail.com','2024-08-14 23:02:08','$2y$12$E3ugAZxeYZhKYjaGivXnyOXBdr8CL6M8XAGOl3ZtylGcW8hH2NNjW',NULL,'female',NULL,'2024-08-14 23:02:08','2024-10-08 05:48:20','active','no',NULL,NULL,'+1 (249) 811-5334','1739 Upland Avenue','uploads/custom-images/wsus-img-2024-10-08-11-48-20-6696.jpg',0.00,'trainer'),(18,'Nelle Odom','trainer7@mailinator.com','2024-08-14 23:07:31','$2y$12$hJz0m4/6Ckqjj/W4sZgQu.yjjbo5EmrtT9tpzMtTerF5BsmEvv7Ui',NULL,'female',NULL,'2024-08-14 23:07:31','2024-10-08 05:49:13','active','no',NULL,NULL,'+1 (664) 487-5613','156 Coventry Court','uploads/custom-images/wsus-img-2024-10-08-11-49-13-5513.jpg',0.00,'trainer'),(19,'Amos Rowland','trainer8@mailinator.com','2024-08-15 00:26:24','$2y$12$XMtk6rLj/gq/KHy.htoMi.ZYQaJkpG2DjijP698TYW9qvtRQoLt66',NULL,'male',NULL,'2024-08-15 00:26:24','2024-10-08 05:50:54','active','no',NULL,NULL,'+1 (704) 387-4794','1049 Parkway Street','uploads/custom-images/wsus-img-2024-10-08-11-50-54-1570.jpg',0.00,'trainer'),(20,'Eric Bridges','trainer9@gamil.com','2024-08-15 00:29:11','$2y$12$WY8WsIRt94Spzwrljs4ZMOC8zHx6viAezuOcRxStbCFd106nKlO2e',NULL,'male',NULL,'2024-08-15 00:29:11','2024-10-08 05:51:46','active','no',NULL,NULL,'+1 (587) 484-2027','2264 Strother Street','uploads/custom-images/wsus-img-2024-10-08-11-51-46-5210.jpg',0.00,'trainer'),(21,'Jasper Swanson','trainer10@gmail.com','2024-08-15 00:35:16','$2y$12$mU/RDyNftH6q8rYBC9/DfuoGUDMba6gcqV87sU4zuWE.78Tc4zORC',NULL,'female',NULL,'2024-08-15 00:35:16','2024-10-08 05:53:05','active','no',NULL,NULL,'+1 (899) 842-3235','914 Vineyard Drive','uploads/custom-images/wsus-img-2024-10-08-11-53-05-6155.jpg',0.00,'trainer'),(23,'Aurora Martinez','user16@gmail.com','2024-10-08 03:34:58','$2y$12$Ree49r9xWPj8yUAwJuMDWOwN9ILoUxRzg69taA2yMKVvvqDciDJui',NULL,NULL,NULL,'2024-10-08 03:34:58','2024-10-08 03:35:55','active','no',NULL,NULL,'+1 (535) 542-5466','4516 Norma Avenue',NULL,0.00,'member'),(24,'User','user@gmail.com','2024-08-14 18:35:16','$2y$12$3HsKJurrUC9UcNU2Xa87BuQbBD8mrg4daAsFWW.PBjTMlwRUDY/02',NULL,'male',NULL,'2024-08-25 15:41:57','2024-11-10 02:18:30','active','no','','IjSxlXCGk4JI4UBMqKtjvgqtzeH4MufG9ILeC5vNaBlC3gykgDgMJdOK4BdAhxxbUT2vvmfPcOdQsHwDCLLjdmUHRssieY6Kk73V','+1 (972) 727-6741',NULL,NULL,0.00,'member');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variant_options`
--

DROP TABLE IF EXISTS `variant_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variant_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `variant_id` bigint unsigned NOT NULL,
  `attribute_id` bigint unsigned NOT NULL,
  `attribute_value_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `variant_options_variant_id_foreign` (`variant_id`),
  KEY `variant_options_attribute_id_foreign` (`attribute_id`),
  KEY `variant_options_attribute_value_id_foreign` (`attribute_value_id`),
  CONSTRAINT `variant_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `variant_options_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  CONSTRAINT `variant_options_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `variant_options`
--

LOCK TABLES `variant_options` WRITE;
/*!40000 ALTER TABLE `variant_options` DISABLE KEYS */;
INSERT INTO `variant_options` VALUES (1,1,1,1,'2024-10-27 03:34:28','2024-10-27 03:34:28'),(2,1,2,5,'2024-10-27 03:34:28','2024-10-27 03:34:28');
/*!40000 ALTER TABLE `variant_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variants`
--

DROP TABLE IF EXISTS `variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `compare_at_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cost_per_item` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxable` tinyint(1) NOT NULL DEFAULT '1',
  `track_inventory` tinyint(1) NOT NULL DEFAULT '1',
  `out_of_stock_track_inventory` tinyint(1) NOT NULL DEFAULT '0',
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `weight` decimal(10,3) NOT NULL DEFAULT '0.000',
  `weight_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'kg',
  `origin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `media_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `variants_sku_unique` (`sku`),
  KEY `variants_product_id_foreign` (`product_id`),
  CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `variants`
--

LOCK TABLES `variants` WRITE;
/*!40000 ALTER TABLE `variants` DISABLE KEYS */;
INSERT INTO `variants` VALUES (1,1,990.00,0.00,0.00,1,1,0,'RED-SM-51716642',0.000,'kg',NULL,NULL,0,NULL,'2024-10-27 03:34:28','2024-10-27 04:19:03');
/*!40000 ALTER TABLE `variants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_galleries`
--

DROP TABLE IF EXISTS `video_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint unsigned NOT NULL,
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_galleries_group_id_foreign` (`group_id`),
  CONSTRAINT `video_galleries_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `gallery_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `video_galleries`
--

LOCK TABLES `video_galleries` WRITE;
/*!40000 ALTER TABLE `video_galleries` DISABLE KEYS */;
INSERT INTO `video_galleries` VALUES (1,2,'[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=R30JGe23A24\",\"image\":\"\\/uploads\\/custom-images\\/video-gallery\\/wsus-img-2024-08-29-07-09-06-1835.png\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FjDb5LqH6Qw\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-09-06-04-28-05-1128.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=SUq6-D_TBVQ\",\"image\":null},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=RKqb61-zTyY\",\"image\":null}]',1,'2024-08-29 01:09:06','2024-09-05 23:18:20'),(2,4,'[{\"link\":\"https:\\/\\/youtube.com\\/watch?v=HQfF5XRVXjU\",\"image\":null},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=A9F3bV335nA\",\"image\":null}]',1,'2024-09-05 23:25:58','2024-09-05 23:29:23');
/*!40000 ALTER TABLE `video_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_histories`
--

DROP TABLE IF EXISTS `wallet_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_gateway` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` enum('pending','success','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `wallet_histories`
--

LOCK TABLES `wallet_histories` WRITE;
/*!40000 ALTER TABLE `wallet_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallet_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website_utilities`
--

DROP TABLE IF EXISTS `website_utilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `website_utilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `website_utilities`
--

LOCK TABLES `website_utilities` WRITE;
/*!40000 ALTER TABLE `website_utilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `website_utilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (8,3,12,'2024-08-26 01:17:25','2024-08-26 01:17:25'),(9,3,11,'2024-08-26 01:17:36','2024-08-26 01:17:36'),(10,3,10,'2024-08-26 01:17:44','2024-08-26 01:17:44'),(13,24,8,'2024-10-09 02:08:55','2024-10-09 02:08:55');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw_methods`
--

DROP TABLE IF EXISTS `withdraw_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdraw_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `min_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `max_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_charge` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `withdraw_methods`
--

LOCK TABLES `withdraw_methods` WRITE;
/*!40000 ALTER TABLE `withdraw_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdraw_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw_requests`
--

DROP TABLE IF EXISTS `withdraw_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdraw_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_charge` decimal(8,2) NOT NULL DEFAULT '0.00',
  `account_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `approved_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `withdraw_requests`
--

LOCK TABLES `withdraw_requests` WRITE;
/*!40000 ALTER TABLE `withdraw_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdraw_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_categories`
--

DROP TABLE IF EXISTS `workout_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_categories`
--

LOCK TABLES `workout_categories` WRITE;
/*!40000 ALTER TABLE `workout_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `workout_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_category_translations`
--

DROP TABLE IF EXISTS `workout_category_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_category_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_category_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_category_translations_workout_category_id_foreign` (`workout_category_id`),
  CONSTRAINT `workout_category_translations_workout_category_id_foreign` FOREIGN KEY (`workout_category_id`) REFERENCES `workout_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_category_translations`
--

LOCK TABLES `workout_category_translations` WRITE;
/*!40000 ALTER TABLE `workout_category_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `workout_category_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_contacts`
--

DROP TABLE IF EXISTS `workout_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` bigint unsigned NOT NULL DEFAULT '0',
  `service_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_contacts`
--

LOCK TABLES `workout_contacts` WRITE;
/*!40000 ALTER TABLE `workout_contacts` DISABLE KEYS */;
INSERT INTO `workout_contacts` VALUES (3,NULL,'Rizvi','rizvi@gmail.com','01740497649','Test','2024-08-22 02:49:52','2024-08-22 02:49:52',0,1),(4,6,'Test','test@gmail.com','Test Subject','Test Message','2024-10-09 00:27:29','2024-10-09 00:27:29',0,NULL),(5,3,'Rizvi Ahmed','rizvi1316@gmail.com','12345','Test Contact','2024-10-28 03:10:06','2024-10-28 03:10:06',0,NULL),(6,NULL,'Rizvi','user@gmail.com','123','Test Message','2024-10-28 03:15:26','2024-10-28 03:15:26',0,3);
/*!40000 ALTER TABLE `workout_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_enrollments`
--

DROP TABLE IF EXISTS `workout_enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_enrollments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `enroll_date` date NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_enrollments_workout_id_foreign` (`workout_id`),
  KEY `workout_enrollments_user_id_foreign` (`user_id`),
  CONSTRAINT `workout_enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `workout_enrollments_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_enrollments`
--

LOCK TABLES `workout_enrollments` WRITE;
/*!40000 ALTER TABLE `workout_enrollments` DISABLE KEYS */;
INSERT INTO `workout_enrollments` VALUES (1,3,2,'2024-06-04','2024-06-17','2024-07-07','',1,1,NULL,'2024-06-03 22:20:38','2024-06-03 22:20:38',NULL),(3,2,2,'2024-06-04','2024-06-26','2024-10-04','',1,1,NULL,'2024-06-03 23:05:41','2024-06-03 23:05:41',NULL);
/*!40000 ALTER TABLE `workout_enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_schedules`
--

DROP TABLE IF EXISTS `workout_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_id` bigint unsigned NOT NULL,
  `trainer_id` bigint unsigned NOT NULL,
  `location_id` bigint unsigned DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_schedules_workout_id_foreign` (`workout_id`),
  KEY `workout_schedules_trainer_id_foreign` (`trainer_id`),
  KEY `workout_schedules_created_by_foreign` (`created_by`),
  KEY `workout_schedules_updated_by_foreign` (`updated_by`),
  KEY `workout_schedules_location_id_foreign` (`location_id`),
  CONSTRAINT `workout_schedules_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `workout_schedules_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `workout_schedules_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `workout_schedules_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `workout_schedules_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_schedules`
--

LOCK TABLES `workout_schedules` WRITE;
/*!40000 ALTER TABLE `workout_schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `workout_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_trainers`
--

DROP TABLE IF EXISTS `workout_trainers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_trainers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_id` bigint unsigned NOT NULL,
  `trainer_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_trainers_workout_id_foreign` (`workout_id`),
  KEY `workout_trainers_trainer_id_foreign` (`trainer_id`),
  CONSTRAINT `workout_trainers_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `workout_trainers_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_trainers`
--

LOCK TABLES `workout_trainers` WRITE;
/*!40000 ALTER TABLE `workout_trainers` DISABLE KEYS */;
INSERT INTO `workout_trainers` VALUES (5,4,1,'2024-08-11 03:43:12','2024-08-11 03:43:12'),(6,4,4,'2024-08-11 03:43:12','2024-08-11 03:43:12'),(24,2,1,'2024-11-03 23:52:19','2024-11-03 23:52:19'),(25,2,3,'2024-11-03 23:52:19','2024-11-03 23:52:19');
/*!40000 ALTER TABLE `workout_trainers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_translations`
--

DROP TABLE IF EXISTS `workout_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `workout_id` bigint unsigned NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_translations_workout_id_foreign` (`workout_id`),
  CONSTRAINT `workout_translations_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_translations`
--

LOCK TABLES `workout_translations` WRITE;
/*!40000 ALTER TABLE `workout_translations` DISABLE KEYS */;
INSERT INTO `workout_translations` VALUES (3,2,'en','Cardio Workout','<p>A well-rounded cardio workout program typically includes a variety of exercises and methods to improve cardiovascular endurance, burn calories, and support overall health. Here&rsquo;s a detailed cardio workout program you might consider, suitable for various fitness levels:</p>','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','2024-06-03 22:02:52','2024-10-29 04:03:52'),(4,2,'bn','কার্ডিও ওয়ার্কআউট','<p>একটি ভাল বৃত্তাকার কার্ডিও ওয়ার্কআউট প্রোগ্রামে সাধারণত কার্ডিওভাসকুলার সহনশীলতা উন্নত করতে, ক্যালোরি পোড়াতে এবং সামগ্রিক স্বাস্থ্যকে সমর্থন করার জন্য বিভিন্ন ব্যায়াম এবং পদ্ধতি অন্তর্ভুক্ত থাকে। এখানে একটি বিশদ কার্ডিও ওয়ার্কআউট প্রোগ্রাম যা আপনি বিবেচনা করতে পারেন, বিভিন্ন ফিটনেস স্তরের জন্য উপযুক্ত।</p>','<p>একটি জিম ওয়ার্কআউট ফিটনেসের জন্য একটি কাঠামোগত পদ্ধতির প্রস্তাব দেয় যা ব্যক্তিদের নির্দিষ্ট লক্ষ্যগুলিতে ফোকাস করতে দেয়, শক্তি তৈরি করা, কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করা বা নমনীয়তা বাড়ানো। বিস্তৃত সরঞ্জাম এবং সুবিধার সাথে, একটি জিম একটি সুষম ওয়ার্কআউট রুটিনের জন্য প্রয়োজনীয় সবকিছু সরবরাহ করে, যার মধ্যে বিনামূল্যে ওজন, মেশিন, কার্ডিও সরঞ্জাম এবং স্ট্রেচিং এবং গতিশীলতা ব্যায়ামের জন্য স্থান রয়েছে। এই সংস্থানগুলি সহজেই উপলব্ধ থাকার ফলে একটি ভাল বৃত্তাকার ওয়ার্কআউট অভিজ্ঞতা উত্সাহিত হয় যা শারীরিক স্বাস্থ্যের সমস্ত দিক সম্বোধন করে।</p>\r\n<p>একটি জিমে কাজ করার প্রধান সুবিধাগুলির মধ্যে একটি হল সম্প্রদায়ের অনুভূতি এবং অনুপ্রেরণা যা একই লক্ষ্যগুলি অনুসরণ করে অন্যদের দ্বারা বেষ্টিত থেকে আসে। পরিবেশ শক্তিদায়ক, একা কাজ করার সময় ব্যক্তিদের নিজেদেরকে আরও বেশি এগিয়ে নিতে সাহায্য করে। অনেক জিম গ্রুপ ক্লাসও অফার করে, বৈচিত্র্য যোগ করে এবং ভাগ করা অগ্রগতির উত্তেজনা, যা ওয়ার্কআউটগুলিকে আকর্ষক এবং উপভোগ্য রাখতে সাহায্য করে। গ্রুপ ক্লাসগুলি প্রায়ই শক্তি, কার্ডিও এবং নমনীয়তা প্রশিক্ষণকে একত্রিত করে, যা অংশগ্রহণকারীদের একটি ব্যাপক ফিটনেস বুস্ট দেয়।</p>\r\n<p>জিমে ওয়ার্কআউটগুলি যে কোনও ফিটনেস স্তরের সাথে মানানসই করা যেতে পারে, নতুনদের তাদের নিজস্ব গতিতে মৌলিক অনুশীলন এবং অগ্রগতির সাথে শুরু করার অনুমতি দেয়। আরও উন্নত জিম-গামীদের জন্য, ভারী ওজন, নতুন ব্যায়াম, বা উচ্চ-তীব্রতার ব্যবধান প্রশিক্ষণ (HIIT) দিয়ে নিজেদের চ্যালেঞ্জ করার সুযোগ রয়েছে। ব্যক্তিগত পছন্দ এবং লক্ষ্যগুলির উপর ভিত্তি করে রুটিনগুলি সংশোধন করার বিকল্পের সাথে, একটি জিম ওয়ার্কআউট সক্রিয় থাকার, শরীরকে শক্তিশালী করতে এবং সামগ্রিক সুস্থতার উন্নতি করার একটি বহুমুখী এবং কার্যকর উপায়।</p>','2024-06-03 22:02:52','2024-11-02 22:52:01'),(5,3,'en','Basic barbell training','<p>Basic barbell training is a foundational aspect of strength training that focuses on using a barbell&mdash;a long, weighted bar with removable weights on each end&mdash;to perform various exercises. It helps build muscle strength, endurance, and overall fitness.&nbsp;</p>','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','2024-06-03 22:12:51','2024-10-29 04:02:55'),(6,3,'bn','বেসিক বারবেল প্রশিক্ষণ','<p>একটি ভাল বৃত্তাকার কার্ডিও ওয়ার্কআউট প্রোগ্রামে সাধারণত কার্ডিওভাসকুলার সহনশীলতা উন্নত করতে, ক্যালোরি পোড়াতে এবং সামগ্রিক স্বাস্থ্যকে সমর্থন করার জন্য বিভিন্ন ব্যায়াম এবং পদ্ধতি অন্তর্ভুক্ত থাকে। এখানে একটি বিশদ কার্ডিও ওয়ার্কআউট প্রোগ্রাম যা আপনি বিবেচনা করতে পারেন, বিভিন্ন ফিটনেস স্তরের জন্য উপযুক্ত।</p>','<p>একটি জিম ওয়ার্কআউট ফিটনেসের জন্য একটি কাঠামোগত পদ্ধতির প্রস্তাব দেয় যা ব্যক্তিদের নির্দিষ্ট লক্ষ্যগুলিতে ফোকাস করতে দেয়, শক্তি তৈরি করা, কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করা বা নমনীয়তা বাড়ানো। বিস্তৃত সরঞ্জাম এবং সুবিধার সাথে, একটি জিম একটি সুষম ওয়ার্কআউট রুটিনের জন্য প্রয়োজনীয় সবকিছু সরবরাহ করে, যার মধ্যে বিনামূল্যে ওজন, মেশিন, কার্ডিও সরঞ্জাম এবং স্ট্রেচিং এবং গতিশীলতা ব্যায়ামের জন্য স্থান রয়েছে। এই সংস্থানগুলি সহজেই উপলব্ধ থাকার ফলে একটি ভাল বৃত্তাকার ওয়ার্কআউট অভিজ্ঞতা উত্সাহিত হয় যা শারীরিক স্বাস্থ্যের সমস্ত দিক সম্বোধন করে।</p>\r\n<p>একটি জিমে কাজ করার প্রধান সুবিধাগুলির মধ্যে একটি হল সম্প্রদায়ের অনুভূতি এবং অনুপ্রেরণা যা একই লক্ষ্যগুলি অনুসরণ করে অন্যদের দ্বারা বেষ্টিত থেকে আসে। পরিবেশ শক্তিদায়ক, একা কাজ করার সময় ব্যক্তিদের নিজেদেরকে আরও বেশি এগিয়ে নিতে সাহায্য করে। অনেক জিম গ্রুপ ক্লাসও অফার করে, বৈচিত্র্য যোগ করে এবং ভাগ করা অগ্রগতির উত্তেজনা, যা ওয়ার্কআউটগুলিকে আকর্ষক এবং উপভোগ্য রাখতে সাহায্য করে। গ্রুপ ক্লাসগুলি প্রায়ই শক্তি, কার্ডিও এবং নমনীয়তা প্রশিক্ষণকে একত্রিত করে, যা অংশগ্রহণকারীদের একটি ব্যাপক ফিটনেস বুস্ট দেয়।</p>\r\n<p>জিমে ওয়ার্কআউটগুলি যে কোনও ফিটনেস স্তরের সাথে মানানসই করা যেতে পারে, নতুনদের তাদের নিজস্ব গতিতে মৌলিক অনুশীলন এবং অগ্রগতির সাথে শুরু করার অনুমতি দেয়। আরও উন্নত জিম-গামীদের জন্য, ভারী ওজন, নতুন ব্যায়াম, বা উচ্চ-তীব্রতার ব্যবধান প্রশিক্ষণ (HIIT) দিয়ে নিজেদের চ্যালেঞ্জ করার সুযোগ রয়েছে। ব্যক্তিগত পছন্দ এবং লক্ষ্যগুলির উপর ভিত্তি করে রুটিনগুলি সংশোধন করার বিকল্পের সাথে, একটি জিম ওয়ার্কআউট সক্রিয় থাকার, শরীরকে শক্তিশালী করতে এবং সামগ্রিক সুস্থতার উন্নতি করার একটি বহুমুখী এবং কার্যকর উপায়।</p>','2024-06-03 22:12:51','2024-11-02 22:55:05'),(7,4,'en','Weight Loss Program','<p>A comprehensive weight loss program integrates exercise, nutrition, and lifestyle changes to help individuals achieve and maintain a healthy weight.</p>','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','2024-07-11 02:07:40','2024-10-29 04:08:47'),(8,4,'bn','ওজন কমানোর প্রোগ্রাম','<p>একটি ভাল বৃত্তাকার কার্ডিও ওয়ার্কআউট প্রোগ্রামে সাধারণত কার্ডিওভাসকুলার সহনশীলতা উন্নত করতে, ক্যালোরি পোড়াতে এবং সামগ্রিক স্বাস্থ্যকে সমর্থন করার জন্য বিভিন্ন ব্যায়াম এবং পদ্ধতি অন্তর্ভুক্ত থাকে। এখানে একটি বিশদ কার্ডিও ওয়ার্কআউট প্রোগ্রাম যা আপনি বিবেচনা করতে পারেন, বিভিন্ন ফিটনেস স্তরের জন্য উপযুক্ত।</p>','<p>একটি জিম ওয়ার্কআউট ফিটনেসের জন্য একটি কাঠামোগত পদ্ধতির প্রস্তাব দেয় যা ব্যক্তিদের নির্দিষ্ট লক্ষ্যগুলিতে ফোকাস করতে দেয়, শক্তি তৈরি করা, কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করা বা নমনীয়তা বাড়ানো। বিস্তৃত সরঞ্জাম এবং সুবিধার সাথে, একটি জিম একটি সুষম ওয়ার্কআউট রুটিনের জন্য প্রয়োজনীয় সবকিছু সরবরাহ করে, যার মধ্যে বিনামূল্যে ওজন, মেশিন, কার্ডিও সরঞ্জাম এবং স্ট্রেচিং এবং গতিশীলতা ব্যায়ামের জন্য স্থান রয়েছে। এই সংস্থানগুলি সহজেই উপলব্ধ থাকার ফলে একটি ভাল বৃত্তাকার ওয়ার্কআউট অভিজ্ঞতা উত্সাহিত হয় যা শারীরিক স্বাস্থ্যের সমস্ত দিক সম্বোধন করে।</p>\r\n<p>একটি জিমে কাজ করার প্রধান সুবিধাগুলির মধ্যে একটি হল সম্প্রদায়ের অনুভূতি এবং অনুপ্রেরণা যা একই লক্ষ্যগুলি অনুসরণ করে অন্যদের দ্বারা বেষ্টিত থেকে আসে। পরিবেশ শক্তিদায়ক, একা কাজ করার সময় ব্যক্তিদের নিজেদেরকে আরও বেশি এগিয়ে নিতে সাহায্য করে। অনেক জিম গ্রুপ ক্লাসও অফার করে, বৈচিত্র্য যোগ করে এবং ভাগ করা অগ্রগতির উত্তেজনা, যা ওয়ার্কআউটগুলিকে আকর্ষক এবং উপভোগ্য রাখতে সাহায্য করে। গ্রুপ ক্লাসগুলি প্রায়ই শক্তি, কার্ডিও এবং নমনীয়তা প্রশিক্ষণকে একত্রিত করে, যা অংশগ্রহণকারীদের একটি ব্যাপক ফিটনেস বুস্ট দেয়।</p>\r\n<p>জিমে ওয়ার্কআউটগুলি যে কোনও ফিটনেস স্তরের সাথে মানানসই করা যেতে পারে, নতুনদের তাদের নিজস্ব গতিতে মৌলিক অনুশীলন এবং অগ্রগতির সাথে শুরু করার অনুমতি দেয়। আরও উন্নত জিম-গামীদের জন্য, ভারী ওজন, নতুন ব্যায়াম, বা উচ্চ-তীব্রতার ব্যবধান প্রশিক্ষণ (HIIT) দিয়ে নিজেদের চ্যালেঞ্জ করার সুযোগ রয়েছে। ব্যক্তিগত পছন্দ এবং লক্ষ্যগুলির উপর ভিত্তি করে রুটিনগুলি সংশোধন করার বিকল্পের সাথে, একটি জিম ওয়ার্কআউট সক্রিয় থাকার, শরীরকে শক্তিশালী করতে এবং সামগ্রিক সুস্থতার উন্নতি করার একটি বহুমুখী এবং কার্যকর উপায়।</p>','2024-07-11 02:07:40','2024-11-02 22:55:36'),(9,5,'en','Nutrition Plan','<p>A well-structured nutrition plan program is essential for achieving health goals, whether it&rsquo;s weight loss, muscle gain, or overall wellness.&nbsp;</p>','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','2024-07-11 02:11:08','2024-10-29 04:09:09'),(10,5,'bn','পুষ্টি পরিকল্পনা প্রোগ্রাম','<p>একটি ভাল বৃত্তাকার কার্ডিও ওয়ার্কআউট প্রোগ্রামে সাধারণত কার্ডিওভাসকুলার সহনশীলতা উন্নত করতে, ক্যালোরি পোড়াতে এবং সামগ্রিক স্বাস্থ্যকে সমর্থন করার জন্য বিভিন্ন ব্যায়াম এবং পদ্ধতি অন্তর্ভুক্ত থাকে। এখানে একটি বিশদ কার্ডিও ওয়ার্কআউট প্রোগ্রাম যা আপনি বিবেচনা করতে পারেন, বিভিন্ন ফিটনেস স্তরের জন্য উপযুক্ত।</p>','<p>একটি জিম ওয়ার্কআউট ফিটনেসের জন্য একটি কাঠামোগত পদ্ধতির প্রস্তাব দেয় যা ব্যক্তিদের নির্দিষ্ট লক্ষ্যগুলিতে ফোকাস করতে দেয়, শক্তি তৈরি করা, কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করা বা নমনীয়তা বাড়ানো। বিস্তৃত সরঞ্জাম এবং সুবিধার সাথে, একটি জিম একটি সুষম ওয়ার্কআউট রুটিনের জন্য প্রয়োজনীয় সবকিছু সরবরাহ করে, যার মধ্যে বিনামূল্যে ওজন, মেশিন, কার্ডিও সরঞ্জাম এবং স্ট্রেচিং এবং গতিশীলতা ব্যায়ামের জন্য স্থান রয়েছে। এই সংস্থানগুলি সহজেই উপলব্ধ থাকার ফলে একটি ভাল বৃত্তাকার ওয়ার্কআউট অভিজ্ঞতা উত্সাহিত হয় যা শারীরিক স্বাস্থ্যের সমস্ত দিক সম্বোধন করে।</p>\r\n<p>একটি জিমে কাজ করার প্রধান সুবিধাগুলির মধ্যে একটি হল সম্প্রদায়ের অনুভূতি এবং অনুপ্রেরণা যা একই লক্ষ্যগুলি অনুসরণ করে অন্যদের দ্বারা বেষ্টিত থেকে আসে। পরিবেশ শক্তিদায়ক, একা কাজ করার সময় ব্যক্তিদের নিজেদেরকে আরও বেশি এগিয়ে নিতে সাহায্য করে। অনেক জিম গ্রুপ ক্লাসও অফার করে, বৈচিত্র্য যোগ করে এবং ভাগ করা অগ্রগতির উত্তেজনা, যা ওয়ার্কআউটগুলিকে আকর্ষক এবং উপভোগ্য রাখতে সাহায্য করে। গ্রুপ ক্লাসগুলি প্রায়ই শক্তি, কার্ডিও এবং নমনীয়তা প্রশিক্ষণকে একত্রিত করে, যা অংশগ্রহণকারীদের একটি ব্যাপক ফিটনেস বুস্ট দেয়।</p>\r\n<p>জিমে ওয়ার্কআউটগুলি যে কোনও ফিটনেস স্তরের সাথে মানানসই করা যেতে পারে, নতুনদের তাদের নিজস্ব গতিতে মৌলিক অনুশীলন এবং অগ্রগতির সাথে শুরু করার অনুমতি দেয়। আরও উন্নত জিম-গামীদের জন্য, ভারী ওজন, নতুন ব্যায়াম, বা উচ্চ-তীব্রতার ব্যবধান প্রশিক্ষণ (HIIT) দিয়ে নিজেদের চ্যালেঞ্জ করার সুযোগ রয়েছে। ব্যক্তিগত পছন্দ এবং লক্ষ্যগুলির উপর ভিত্তি করে রুটিনগুলি সংশোধন করার বিকল্পের সাথে, একটি জিম ওয়ার্কআউট সক্রিয় থাকার, শরীরকে শক্তিশালী করতে এবং সামগ্রিক সুস্থতার উন্নতি করার একটি বহুমুখী এবং কার্যকর উপায়।</p>','2024-07-11 02:11:08','2024-11-02 22:56:11'),(11,6,'en','Free Weights Program','<p>A free weights program is a strength training routine that utilizes dumbbells, barbells, and kettlebells to build muscle, enhance strength, and improve overall fitness.&nbsp;</p>','<p>A gym workout offers a structured approach to fitness that allows individuals to focus on specific goals, whether building strength, improving cardiovascular health, or enhancing flexibility. With a wide range of equipment and facilities, a gym provides everything needed for a balanced workout routine, including free weights, machines, cardio equipment, and space for stretching and mobility exercises. Having these resources readily available encourages a well-rounded workout experience that addresses all aspects of physical health.</p>\r\n<p>One of the major benefits of working out at a gym is the sense of community and motivation that comes from being surrounded by others pursuing similar goals. The environment is energizing, helping individuals push themselves further than they might when working out alone. Many gyms also offer group classes, adding variety and the excitement of shared progress, which helps keep workouts engaging and enjoyable. Group classes often combine strength, cardio, and flexibility training, giving participants a comprehensive fitness boost.</p>\r\n<p>Workouts at the gym can be tailored to fit any fitness level, allowing beginners to start with foundational exercises and progress at their own pace. For more advanced gym-goers, there are opportunities to challenge themselves with heavier weights, new exercises, or high-intensity interval training (HIIT). With the option to modify routines based on personal preferences and goals, a gym workout is a versatile and effective way to stay active, strengthen the body, and improve overall well-being.</p>','2024-07-11 02:16:44','2024-10-29 04:09:28'),(12,6,'bn','বিনামূল্যে ওজন প্রোগ্রাম','<p>একটি ভাল বৃত্তাকার কার্ডিও ওয়ার্কআউট প্রোগ্রামে সাধারণত কার্ডিওভাসকুলার সহনশীলতা উন্নত করতে, ক্যালোরি পোড়াতে এবং সামগ্রিক স্বাস্থ্যকে সমর্থন করার জন্য বিভিন্ন ব্যায়াম এবং পদ্ধতি অন্তর্ভুক্ত থাকে। এখানে একটি বিশদ কার্ডিও ওয়ার্কআউট প্রোগ্রাম যা আপনি বিবেচনা করতে পারেন, বিভিন্ন ফিটনেস স্তরের জন্য উপযুক্ত।</p>','<p>একটি জিম ওয়ার্কআউট ফিটনেসের জন্য একটি কাঠামোগত পদ্ধতির প্রস্তাব দেয় যা ব্যক্তিদের নির্দিষ্ট লক্ষ্যগুলিতে ফোকাস করতে দেয়, শক্তি তৈরি করা, কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করা বা নমনীয়তা বাড়ানো। বিস্তৃত সরঞ্জাম এবং সুবিধার সাথে, একটি জিম একটি সুষম ওয়ার্কআউট রুটিনের জন্য প্রয়োজনীয় সবকিছু সরবরাহ করে, যার মধ্যে বিনামূল্যে ওজন, মেশিন, কার্ডিও সরঞ্জাম এবং স্ট্রেচিং এবং গতিশীলতা ব্যায়ামের জন্য স্থান রয়েছে। এই সংস্থানগুলি সহজেই উপলব্ধ থাকার ফলে একটি ভাল বৃত্তাকার ওয়ার্কআউট অভিজ্ঞতা উত্সাহিত হয় যা শারীরিক স্বাস্থ্যের সমস্ত দিক সম্বোধন করে।</p>\r\n<p>একটি জিমে কাজ করার প্রধান সুবিধাগুলির মধ্যে একটি হল সম্প্রদায়ের অনুভূতি এবং অনুপ্রেরণা যা একই লক্ষ্যগুলি অনুসরণ করে অন্যদের দ্বারা বেষ্টিত থেকে আসে। পরিবেশ শক্তিদায়ক, একা কাজ করার সময় ব্যক্তিদের নিজেদেরকে আরও বেশি এগিয়ে নিতে সাহায্য করে। অনেক জিম গ্রুপ ক্লাসও অফার করে, বৈচিত্র্য যোগ করে এবং ভাগ করা অগ্রগতির উত্তেজনা, যা ওয়ার্কআউটগুলিকে আকর্ষক এবং উপভোগ্য রাখতে সাহায্য করে। গ্রুপ ক্লাসগুলি প্রায়ই শক্তি, কার্ডিও এবং নমনীয়তা প্রশিক্ষণকে একত্রিত করে, যা অংশগ্রহণকারীদের একটি ব্যাপক ফিটনেস বুস্ট দেয়।</p>\r\n<p>জিমে ওয়ার্কআউটগুলি যে কোনও ফিটনেস স্তরের সাথে মানানসই করা যেতে পারে, নতুনদের তাদের নিজস্ব গতিতে মৌলিক অনুশীলন এবং অগ্রগতির সাথে শুরু করার অনুমতি দেয়। আরও উন্নত জিম-গামীদের জন্য, ভারী ওজন, নতুন ব্যায়াম, বা উচ্চ-তীব্রতার ব্যবধান প্রশিক্ষণ (HIIT) দিয়ে নিজেদের চ্যালেঞ্জ করার সুযোগ রয়েছে। ব্যক্তিগত পছন্দ এবং লক্ষ্যগুলির উপর ভিত্তি করে রুটিনগুলি সংশোধন করার বিকল্পের সাথে, একটি জিম ওয়ার্কআউট সক্রিয় থাকার, শরীরকে শক্তিশালী করতে এবং সামগ্রিক সুস্থতার উন্নতি করার একটি বহুমুখী এবং কার্যকর উপায়।</p>','2024-07-11 02:16:44','2024-11-02 22:57:27'),(13,7,'en','Powerlifting Programs','<p>The Power Hypertrophy Upper Lower (PHUL) workout program is designed to combine elements of strength training (power) with muscle-building (hypertrophy) within an upper-lower body split.&nbsp;</p>','<p>The Power Hypertrophy Upper Lower (PHUL) workout program is designed to combine elements of strength training (power) with muscle-building (hypertrophy) within an upper-lower body split. This program is ideal for individuals looking to build both strength and muscle mass, as it balances heavy, low-rep strength work with lighter, higher-rep hypertrophy work.</p>\r\n<h3><strong>Program Overview</strong></h3>\r\n<p><strong>Frequency:</strong> Typically 4 days per week (2 upper body days, 2 lower body days).</p>\r\n<p><strong>Structure:</strong></p>\r\n<ol>\r\n<li><strong>Power Days:</strong> Focus on strength with low-rep, heavy-weight exercises.</li>\r\n<li><strong>Hypertrophy Days:</strong> Focus on muscle growth with moderate to high-rep, moderate-weight exercises.</li>\r\n</ol>\r\n<h3><strong>Sample PHUL Program</strong></h3>\r\n<h4><strong>Upper Body Power</strong></h4>\r\n<ul>\r\n<li><strong>Warm-Up:</strong> 5-10 minutes of light cardio and dynamic stretching.</li>\r\n<li><strong>Exercises:</strong>\r\n<ol>\r\n<li><strong>Bench Press:</strong> 4 sets of 4-6 reps</li>\r\n<li><strong>Bent-Over Rows:</strong> 4 sets of 4-6 reps</li>\r\n<li><strong>Overhead Press:</strong> 3 sets of 4-6 reps</li>\r\n<li><strong>Pull-Ups or Lat Pulldowns:</strong> 3 sets of 4-6 reps</li>\r\n<li><strong>Barbell Curls:</strong> 3 sets of 6-8 reps</li>\r\n<li><strong>Tricep Dips or Skull Crushers:</strong> 3 sets of 6-8 reps</li>\r\n</ol>\r\n</li>\r\n<li><strong>Cool-Down:</strong> Static stretching for upper body muscles.</li>\r\n</ul>\r\n<h4><strong>Lower Body Power</strong></h4>\r\n<ul>\r\n<li><strong>Warm-Up:</strong> 5-10 minutes of light cardio and dynamic stretching.</li>\r\n<li><strong>Exercises:</strong>\r\n<ol>\r\n<li><strong>Squats:</strong> 4 sets of 4-6 reps</li>\r\n<li><strong>Deadlifts:</strong> 4 sets of 4-6 reps</li>\r\n<li><strong>Leg Press:</strong> 3 sets of 6-8 reps</li>\r\n<li><strong>Hamstring Curls:</strong> 3 sets of 6-8 reps</li>\r\n<li><strong>Calf Raises:</strong> 4 sets of 8-12 reps</li>\r\n</ol>\r\n</li>\r\n<li><strong>Cool-Down:</strong> Static stretching for lower body muscles.</li>\r\n</ul>\r\n<h4><strong>Upper Body Hypertrophy</strong></h4>\r\n<ul>\r\n<li><strong>Warm-Up:</strong> 5-10 minutes of light cardio and dynamic stretching.</li>\r\n<li><strong>Exercises:</strong>\r\n<ol>\r\n<li><strong>Incline Dumbbell Press:</strong> 3 sets of 8-12 reps</li>\r\n<li><strong>Seated Cable Rows:</strong> 3 sets of 8-12 reps</li>\r\n<li><strong>Lateral Raises:</strong> 3 sets of 10-15 reps</li>\r\n<li><strong>Face Pulls:</strong> 3 sets of 10-15 reps</li>\r\n<li><strong>Hammer Curls:</strong> 3 sets of 10-15 reps</li>\r\n<li><strong>Tricep Pushdowns:</strong> 3 sets of 10-15 reps</li>\r\n</ol>\r\n</li>\r\n<li><strong>Cool-Down:</strong> Static stretching for upper body muscles.</li>\r\n</ul>\r\n<h4><strong>&nbsp;Lower Body Hypertrophy</strong></h4>\r\n<ul>\r\n<li><strong>Warm-Up:</strong> 5-10 minutes of light cardio and dynamic stretching.</li>\r\n<li><strong>Exercises:</strong>\r\n<ol>\r\n<li><strong>Front Squats or Goblet Squats:</strong> 3 sets of 8-12 reps</li>\r\n<li><strong>Romanian Deadlifts:</strong> 3 sets of 8-12 reps</li>\r\n<li><strong>Leg Extensions:</strong> 3 sets of 10-15 reps</li>\r\n<li><strong>Leg Curls:</strong> 3 sets of 10-15 reps</li>\r\n<li><strong>Standing Calf Raises:</strong> 4 sets of 12-20 reps</li>\r\n</ol>\r\n</li>\r\n<li><strong>Cool-Down:</strong> Static stretching for lower body muscles.</li>\r\n</ul>\r\n<h3><strong>Key Principles</strong></h3>\r\n<ol>\r\n<li><strong>Progressive Overload:</strong> Gradually increase the weights or resistance to continue making progress in both strength and muscle size.</li>\r\n<li><strong>Form and Technique:</strong> Focus on proper form to maximize effectiveness and reduce the risk of injury.</li>\r\n<li><strong>Rest and Recovery:</strong> Allow for adequate recovery between workouts and ensure proper sleep to support muscle growth and repair.</li>\r\n<li><strong>Nutrition:</strong> Maintain a balanced diet with sufficient protein, carbohydrates, and fats to support both strength gains and muscle hypertrophy.</li>\r\n</ol>\r\n<h3><strong>Tips for Success</strong></h3>\r\n<ul>\r\n<li><strong>Warm-Up and Cool-Down:</strong> Always include a proper warm-up and cool-down to prepare your body for exercise and aid recovery.</li>\r\n<li><strong>Variety:</strong> Change up exercises, angles, or equipment every 6-8 weeks to prevent plateaus and keep workouts engaging.</li>\r\n<li><strong>Listen to Your Body:</strong> Adjust weights, reps, and sets based on how you feel and your progress.</li>\r\n</ul>\r\n<p>&nbsp;</p>','2024-07-11 03:00:50','2024-08-15 01:35:30'),(14,7,'bn','পাওয়ার হাইপারট্রফি আপার লোয়ার','<p>একটি ভাল বৃত্তাকার কার্ডিও ওয়ার্কআউট প্রোগ্রামে সাধারণত কার্ডিওভাসকুলার সহনশীলতা উন্নত করতে, ক্যালোরি পোড়াতে এবং সামগ্রিক স্বাস্থ্যকে সমর্থন করার জন্য বিভিন্ন ব্যায়াম এবং পদ্ধতি অন্তর্ভুক্ত থাকে। এখানে একটি বিশদ কার্ডিও ওয়ার্কআউট প্রোগ্রাম যা আপনি বিবেচনা করতে পারেন, বিভিন্ন ফিটনেস স্তরের জন্য উপযুক্ত।</p>','<p>একটি জিম ওয়ার্কআউট ফিটনেসের জন্য একটি কাঠামোগত পদ্ধতির প্রস্তাব দেয় যা ব্যক্তিদের নির্দিষ্ট লক্ষ্যগুলিতে ফোকাস করতে দেয়, শক্তি তৈরি করা, কার্ডিওভাসকুলার স্বাস্থ্যের উন্নতি করা বা নমনীয়তা বাড়ানো। বিস্তৃত সরঞ্জাম এবং সুবিধার সাথে, একটি জিম একটি সুষম ওয়ার্কআউট রুটিনের জন্য প্রয়োজনীয় সবকিছু সরবরাহ করে, যার মধ্যে বিনামূল্যে ওজন, মেশিন, কার্ডিও সরঞ্জাম এবং স্ট্রেচিং এবং গতিশীলতা ব্যায়ামের জন্য স্থান রয়েছে। এই সংস্থানগুলি সহজেই উপলব্ধ থাকার ফলে একটি ভাল বৃত্তাকার ওয়ার্কআউট অভিজ্ঞতা উত্সাহিত হয় যা শারীরিক স্বাস্থ্যের সমস্ত দিক সম্বোধন করে।</p>\r\n<p>একটি জিমে কাজ করার প্রধান সুবিধাগুলির মধ্যে একটি হল সম্প্রদায়ের অনুভূতি এবং অনুপ্রেরণা যা একই লক্ষ্যগুলি অনুসরণ করে অন্যদের দ্বারা বেষ্টিত থেকে আসে। পরিবেশ শক্তিদায়ক, একা কাজ করার সময় ব্যক্তিদের নিজেদেরকে আরও বেশি এগিয়ে নিতে সাহায্য করে। অনেক জিম গ্রুপ ক্লাসও অফার করে, বৈচিত্র্য যোগ করে এবং ভাগ করা অগ্রগতির উত্তেজনা, যা ওয়ার্কআউটগুলিকে আকর্ষক এবং উপভোগ্য রাখতে সাহায্য করে। গ্রুপ ক্লাসগুলি প্রায়ই শক্তি, কার্ডিও এবং নমনীয়তা প্রশিক্ষণকে একত্রিত করে, যা অংশগ্রহণকারীদের একটি ব্যাপক ফিটনেস বুস্ট দেয়।</p>\r\n<p>জিমে ওয়ার্কআউটগুলি যে কোনও ফিটনেস স্তরের সাথে মানানসই করা যেতে পারে, নতুনদের তাদের নিজস্ব গতিতে মৌলিক অনুশীলন এবং অগ্রগতির সাথে শুরু করার অনুমতি দেয়। আরও উন্নত জিম-গামীদের জন্য, ভারী ওজন, নতুন ব্যায়াম, বা উচ্চ-তীব্রতার ব্যবধান প্রশিক্ষণ (HIIT) দিয়ে নিজেদের চ্যালেঞ্জ করার সুযোগ রয়েছে। ব্যক্তিগত পছন্দ এবং লক্ষ্যগুলির উপর ভিত্তি করে রুটিনগুলি সংশোধন করার বিকল্পের সাথে, একটি জিম ওয়ার্কআউট সক্রিয় থাকার, শরীরকে শক্তিশালী করতে এবং সামগ্রিক সুস্থতার উন্নতি করার একটি বহুমুখী এবং কার্যকর উপায়।</p>','2024-07-11 03:00:50','2024-11-02 22:58:14'),(15,2,'ar','تمرين الكارديو','<p>يشتمل برنامج تمرين القلب المتوازن بشكل عام على مجموعة متنوعة من التمارين والطرق لتحسين القدرة التحملية القلبية، وحرق السعرات الحرارية، ودعم الصحة العامة. إليك برنامج تمارين قلبية مفصل قد تفكر فيه، مناسب لمستويات اللياقة البدنية المختلفة:</p>','<p><strong>يشتمل برنامج تمارين القلب المتوازن بشكل عام على مجموعة متنوعة من التمارين والطرق لتحسين القدرة التحملية القلبية، وحرق السعرات الحرارية، ودعم الصحة العامة. إليك برنامج تمارين قلبية مفصل قد تفكر فيه، مناسب لمستويات اللياقة البدنية المختلفة:</strong></p>\r\n<h3><strong>الإحماء (5-10 دقائق)</strong></h3>\r\n<ul>\r\n<li><strong>الجري الخفيف أو المشي السريع</strong>: زيادة معدل ضربات القلب تدريجيًا.</li>\r\n<li><strong>تمارين الإطالة الديناميكية</strong>: حركات الساق، دوائر الذراع، رفع الركبة العالية لتحضير العضلات والمفاصل.</li>\r\n</ul>\r\n<h3><strong>التمرين الرئيسي للقلب (20-45 دقيقة)</strong></h3>\r\n<h4><strong>الخيار أ: تمارين القلب الثابتة</strong></h4>\r\n<ul>\r\n<li><strong>المدة</strong>: 20-45 دقيقة بمعدل ثابت.</li>\r\n<li><strong>أمثلة</strong>: الجري، ركوب الدراجة، السباحة، التجديف.</li>\r\n<li><strong>الشدة</strong>: معتدلة (60-75% من الحد الأقصى لمعدل ضربات القلب).</li>\r\n<li><strong>الهدف</strong>: بناء القدرة التحملية الهوائية وتحسين صحة القلب.</li>\r\n</ul>\r\n<h4><strong>الخيار ب: تمارين الت intervals عالية الشدة (HIIT)</strong></h4>\r\n<ul>\r\n<li><strong>المدة</strong>: 20-30 دقيقة.</li>\r\n<li><strong>الهيكل</strong>:\r\n<ul>\r\n<li><strong>الإحماء</strong>: 5 دقائق.</li>\r\n<li><strong>الفترات</strong>: التناوب بين الجهد العالي وفترة التعافي المنخفضة.</li>\r\n<li><strong>مثال</strong>: 30 ثانية من الجري السريع تليها دقيقة واحدة من المشي (كرر لمدة 10-15 دقيقة).</li>\r\n<li><strong>التبريد</strong>: 5 دقائق.</li>\r\n</ul>\r\n</li>\r\n<li><strong>الشدة</strong>: عالية (80-90% من الحد الأقصى لمعدل ضربات القلب خلال فترات العمل).</li>\r\n<li><strong>الهدف</strong>: تحسين اللياقة القلبية وحرق السعرات الحرارية بكفاءة.</li>\r\n</ul>\r\n<h4><strong>الخيار ج: تمارين القلب الدائرية</strong></h4>\r\n<ul>\r\n<li><strong>المدة</strong>: 30-45 دقيقة.</li>\r\n<li><strong>الهيكل</strong>:\r\n<ul>\r\n<li><strong>الإحماء</strong>: 5 دقائق.</li>\r\n<li><strong>الدائرة</strong>: قم بأداء كل تمرين لمدة 1-2 دقيقة، الانتقال من تمرين إلى آخر مع الحد الأدنى من الراحة.</li>\r\n<li><strong>مثال على الدائرة</strong>:\r\n<ul>\r\n<li>نط الحبل</li>\r\n<li>بيربي</li>\r\n<li>تسلق الجبال</li>\r\n<li>رفع الركبة العالية</li>\r\n<li>قفزات جاك</li>\r\n</ul>\r\n</li>\r\n<li><strong>الراحة</strong>: 1-2 دقيقة بين الدوائر.</li>\r\n<li><strong>التكرار</strong>: 2-3 مرات.</li>\r\n<li><strong>التبريد</strong>: 5 دقائق.</li>\r\n</ul>\r\n</li>\r\n<li><strong>الشدة</strong>: تتنوع حسب التمرين (60-85% من الحد الأقصى لمعدل ضربات القلب).</li>\r\n<li><strong>الهدف</strong>: دمج تمارين القلب مع تدريب القوة والتحمل.</li>\r\n</ul>','2024-08-26 01:01:39','2024-08-26 03:09:45'),(16,3,'ar','تدريب الباربل الأساسي','<p>تدريب الباربل الأساسي هو جانب أساسي من تدريب القوة يركز على استخدام الباربل&mdash;وهو قضيب طويل مزود بأوزان قابلة للإزالة على كل طرف&mdash;لأداء تمارين متنوعة. يساعد على بناء قوة العضلات، والقدرة التحملية، واللياقة البدنية بشكل عام.</p>','<p>**تدريب الباربل الأساسي هو جانب أساسي من تدريب القوة يركز على استخدام الباربل&mdash;وهو قضيب طويل مزود بأوزان قابلة للإزالة على كل طرف&mdash;لأداء تمارين متنوعة. يساعد على بناء قوة العضلات، والقدرة التحملية، واللياقة البدنية بشكل عام. إليك وصف شامل لتدريب الباربل الأساسي:**</p>\r\n<p>### 1. فوائد تدريب الباربل<br>- **تطوير القوة**: يحسن من قوة العضلات والطاقة.<br>- **زيادة حجم العضلات**: يعزز نمو العضلات من خلال تدريبات المقاومة.<br>- **القوة الوظيفية**: يعزز القوة القابلة للتطبيق في الأنشطة اليومية.<br>- **كثافة العظام**: يدعم صحة العظام من خلال زيادة كثافة العظام.<br>- **استقرار المفاصل**: يقوي العضلات حول المفاصل، مما يقلل من خطر الإصابة.</p>\r\n<p>### 2. تمارين باربل الأساسية</p>\r\n<p>#### أ. القرفصاء (Squat)<br>- **العضلات المستهدفة**: العضلات الرباعية، أوتار الركبة، العضلات الألوية، أسفل الظهر.<br>- **التنفيذ**:<br>&nbsp; - **وضع البداية**: قف مع تباعد قدميك بعرض الكتفين، والباربل مستند على الجزء العلوي من العضلات الجانبية (قرفصاء خلفي) أو على الأكتاف الأمامية (قرفصاء أمامي).<br>&nbsp; - **الحركة**: انحنِ عند الركبتين والوركين لخفض جسمك، مع الحفاظ على صدرك مرفوعًا وظهرك مستقيمًا.<br>&nbsp; - **العودة**: ادفع من كعبيك للعودة إلى وضع البداية.</p>\r\n<p>#### ب. الرفعة الميتة (Deadlift)<br>- **العضلات المستهدفة**: أوتار الركبة، العضلات الألوية، أسفل الظهر، القلب.<br>- **التنفيذ**:<br>&nbsp; - **وضع البداية**: قف مع تباعد قدميك بعرض الوركين، والباربل فوق منتصف القدم.<br>&nbsp; - **الحركة**: انحنِ عند الوركين والركبتين للإمساك بالباربل. حافظ على ظهرك مستويًا أثناء رفع البار عن طريق تمديد الوركين والركبتين.<br>&nbsp; - **العودة**: انزل البار إلى الأرض عن طريق عكس الحركة.</p>\r\n<p>#### ج. ضغط الصدر (Bench Press)<br>- **العضلات المستهدفة**: الصدر، العضلات ثلاثية الرؤوس، الأكتاف.<br>- **التنفيذ**:<br>&nbsp; - **وضع البداية**: استلقِ على مقعد مع قدميك مسطحتين على الأرض، امسك الباربل بمسافة أوسع قليلاً من عرض الكتفين.<br>&nbsp; - **الحركة**: اخفض الباربل إلى صدرك مع الحفاظ على المرفقين بزاوية حوالي 45 درجة.<br>&nbsp; - **العودة**: اضغط الباربل لأعلى إلى وضع البداية.</p>\r\n<p>#### د. ضغط فوق الرأس (Overhead Press)<br>- **العضلات المستهدفة**: الأكتاف، العضلات ثلاثية الرؤوس، الجزء العلوي من الصدر.<br>- **التنفيذ**:<br>&nbsp; - **وضع البداية**: قف مع تباعد قدميك بعرض الكتفين، والباربل مستند على الجزء العلوي من الصدر.<br>&nbsp; - **الحركة**: اضغط الباربل لأعلى فوق رأسك عن طريق تمديد ذراعيك بالكامل.<br>&nbsp; - **العودة**: انزل الباربل إلى وضع البداية.</p>\r\n<p>#### هـ. صف الباربل المنحني (Bent-Over Row)<br>- **العضلات المستهدفة**: الجزء العلوي من الظهر، العضلات الظهرية، العضلات ذات الرأسين.<br>- **التنفيذ**:<br>&nbsp; - **وضع البداية**: انحنِ عند الوركين والركبتين مع الحفاظ على الظهر مسطحًا، امسك الباربل مع مدّ الذراعين.<br>&nbsp; - **الحركة**: اسحب الباربل نحو صدرك السفلي/بطنك العلوي، مع الضغط على شفرات الكتف معًا.<br>&nbsp; - **العودة**: انزل الباربل إلى وضع البداية.</p>','2024-08-26 01:01:39','2024-08-26 03:28:03'),(17,4,'ar','برنامج فقدان الوزن','<p><strong>برنامج فقدان الوزن الشامل يدمج التمارين الرياضية، والتغذية، وتغييرات نمط الحياة لمساعدة الأفراد على تحقيق والحفاظ على وزن صحي.</strong></p>','<p>**برنامج فقدان الوزن الشامل يدمج التمارين الرياضية، والتغذية، وتغييرات نمط الحياة لمساعدة الأفراد على تحقيق والحفاظ على وزن صحي. إليك وصف مفصل لبرنامج فقدان الوزن النموذجي:**</p>\r\n<p>1. الأهداف والتقييم<br>- **التقييم الأولي**: تقييم الوزن الحالي، تركيبة الجسم، مستوى اللياقة البدنية، والحالة الصحية.<br>- **تحديد الأهداف**: وضع أهداف فقدان وزن واقعية، مثل خسارة 1-2 رطل في الأسبوع، وتحديد الأهداف الصحية العامة.</p>\r\n<p>2. عنصر التمارين<br>- **التكرار**: استهدف 150 دقيقة من تمارين الأيروبيك متوسطة الشدة أو 75 دقيقة من تمارين الأيروبيك عالية الشدة في الأسبوع، مع دمج تمارين القوة 2-3 مرات في الأسبوع.</p>\r\n<p>&nbsp;أنواع التمارين:<br>- **تمارين القلب**: أنشطة مثل المشي، الجري، ركوب الدراجة، السباحة، أو استخدام آلات القلب لحرق السعرات الحرارية وتحسين صحة القلب.<br>- **تمارين القوة**: استخدم الأوزان، أو الأشرطة المقاومة، أو تمارين وزن الجسم (مثل القرفصاء، والضغط) لبناء كتلة العضلات، مما يساعد في زيادة معدل الأيض.<br>- **المرونة والحركة**: دمج تمارين الإطالة، واليوغا، أو تمارين المرونة الديناميكية لتحسين نطاق الحركة ومنع الإصابات.</p>\r\n<p>مثال على جدول أسبوعي:<br>- **الاثنين**: 30 دقيقة من تمارين القلب متوسطة الشدة (مثل المشي السريع أو ركوب الدراجة)<br>- **الثلاثاء**: تمارين القوة (للكامل) لمدة 45 دقيقة<br>- **الأربعاء**: 30 دقيقة من HIIT (تمرين الفواصل عالية الشدة)<br>- **الخميس**: راحة أو نشاط خفيف (مثل اليوغا الخفيفة أو الإطالة)<br>- **الجمعة**: 30 دقيقة من تمارين القلب متوسطة الشدة<br>- **السبت**: تمارين القوة (مع التركيز على مجموعات عضلية مختلفة) لمدة 45 دقيقة<br>- **الأحد**: استعادة نشطة (مثل المشي الترفيهي، أو الإطالة)</p>\r\n<p>3. عنصر التغذية<br>- **العجز السعراتي**: تناول سعرات حرارية أقل مما تحرق لتعزيز فقدان الوزن. استهدف عجزًا معتدلًا لضمان فقدان وزن مستدام (مثل 500-750 سعرة حرارية يوميًا).</p>\r\n<p>نظام غذائي متوازن:<br>- **المغذيات الكبرى**:<br>&nbsp; - **البروتينات**: اللحوم الخالية من الدهون، الأسماك، الفاصولياء، البقوليات، التوفو.<br>&nbsp; - **الكربوهيدرات**: الحبوب الكاملة، الخضروات، الفواكه.<br>&nbsp; - **الدهون**: الدهون الصحية من الأفوكادو، المكسرات، البذور، وزيت الزيتون.</p>\r\n<p>- **المغذيات الدقيقة**: ضمان الحصول على الكميات الكافية من الفيتامينات والمعادن من خلال مجموعة متنوعة من الفواكه والخضروات الملونة.</p>\r\n<p>&nbsp;توقيت الوجبات والأحجام:<br>- تناول وجبات أصغر ومتكررة للحفاظ على مستويات الطاقة ومنع الإفراط في الأكل.<br>- الانتباه إلى أحجام الحصص وتجنب الأطعمة عالية السعرات الحرارية وقليلة المغذيات.</p>\r\n<p>- **الترطيب**: اشرب الكثير من الماء طوال اليوم؛ استهدف على الأقل 8 أكواب (64 أونصة) يوميًا. قلل من المشروبات السكرية والكحول.</p>\r\n<p>4. تغييرات نمط الحياة والسلوك<br>- **النوم**: استهدف 7-9 ساعات من النوم الجيد كل ليلة، حيث أن قلة النوم يمكن أن تؤثر على هرمونات الجوع والوزن.<br>- **إدارة الضغط**: ممارسة تقنيات تقليل التوتر مثل التأمل، والتنفس العميق، أو الهوايات لتجنب الأكل العاطفي.<br>- **الأكل الواعي**: التركيز على الأكل ببطء، والاستمتاع بكل لقمة، والاستماع إلى إشارات الجوع والشبع.<br>- **الدعم والمساءلة**: ابحث عن الدعم من الأصدقاء، والعائلة، أو مجموعة فقدان الوزن. فكر في العمل مع اختصاصي تغذية مسجّل أو مدرب شخصي.</p>\r\n<p>5. المراقبة والتعديلات<br>- **تتبع التقدم**: مراقبة الوزن، والقياسات، أو تغييرات تركيبة الجسم بانتظام. استخدم دفتر يوميات الطعام والتمارين أو التطبيقات لتتبع تقدمك.<br>- **التعديلات**: قم بإجراء تعديلات على البرنامج حسب الحاجة بناءً على التقدم، أو التوقف، أو التغييرات في مستوى اللياقة البدنية. استشر مقدم الرعاية الصحية أو متخصص اللياقة البدنية إذا لزم الأمر.</p>','2024-08-26 01:01:39','2024-08-26 03:28:34'),(18,5,'ar','خطة التغذية','<p><strong>برنامج خطة التغذية المنظم جيدًا ضروري لتحقيق الأهداف الصحية، سواء كان ذلك فقدان الوزن، أو زيادة الكتلة العضلية، أو تحسين الرفاهية العامة.</strong></p>','<p>**برنامج خطة التغذية المنظم جيدًا ضروري لتحقيق الأهداف الصحية، سواء كان ذلك فقدان الوزن، أو زيادة الكتلة العضلية، أو تحسين الرفاهية العامة. إليك دليل شامل لإنشاء خطة تغذية فعالة:**</p>\r\n<p>### 1. الأهداف والتقييم<br>- **تحديد الأهداف**: حدد هدفك الأساسي، مثل فقدان الوزن، زيادة الكتلة العضلية، تحسين الطاقة، أو الصحة العامة.<br>- **تقييم النظام الغذائي الحالي**: قم بتقييم عاداتك الغذائية الحالية، وتفضيلات الطعام، وأي قيود غذائية أو حالات صحية.<br>- **حساب الاحتياجات السعرات الحرارية**: استخدم حاسبة معدل الأيض الأساسي (BMR) واعتبر مستوى نشاطك لتقدير الاحتياجات السعرات الحرارية اليومية.</p>\r\n<p>### 2. توزيع المغذيات الكبرى<br>- **البروتينات**: ضرورية لإصلاح ونمو العضلات.<br>&nbsp; - **الكمية الموصى بها**: 10-35% من إجمالي السعرات الحرارية اليومية.<br>&nbsp; - **المصادر**: اللحوم الخالية من الدهون، الدواجن، الأسماك، البيض، منتجات الألبان، البقوليات، التوفو.</p>\r\n<p>- **الكربوهيدرات**: المصدر الرئيسي للطاقة.<br>&nbsp; - **الكمية الموصى بها**: 45-65% من إجمالي السعرات الحرارية اليومية.<br>&nbsp; - **المصادر**: الحبوب الكاملة، الفواكه، الخضروات، البقوليات.</p>\r\n<p>- **الدهون**: مهمة لإنتاج الهرمونات والطاقة.<br>&nbsp; - **الكمية الموصى بها**: 20-35% من إجمالي السعرات الحرارية اليومية.<br>&nbsp; - **المصادر**: الدهون الصحية من الأفوكادو، المكسرات، البذور، زيت الزيتون، والأسماك الدهنية.</p>\r\n<p>### 3. تخطيط الوجبات وهيكلها<br>- **تكرار الوجبات**: استهدف 3 وجبات متوازنة و1-2 وجبة خفيفة صحية يوميًا، بناءً على أهدافك وتفضيلاتك.</p>\r\n<p>#### تكوين الوجبات:<br>- **الإفطار**: تضمين توازن بين البروتينات، الكربوهيدرات، والدهون الصحية.<br>&nbsp; - **مثال**: زبادي يوناني مع التوت ورشة من الجرانولا.<br>&nbsp;&nbsp;<br>- **الغداء**: التركيز على البروتينات الخالية من الدهون، الحبوب الكاملة، ومجموعة متنوعة من الخضروات.<br>&nbsp; - **مثال**: سلطة دجاج مشوي مع الخضار المختلطة، والطماطم الكرزية، والخيار، وتتبيلة الخل.</p>\r\n<p>- **العشاء**: استهدف طبق متوازن مع البروتين، والدهون الصحية، والخضروات.<br>&nbsp; - **مثال**: سمك السلمون المشوي مع الكينوا والبروكلي المطبوخ على البخار.</p>\r\n<p>- **الوجبات الخفيفة**: اختر خيارات غنية بالمغذيات للحفاظ على مستويات الطاقة مستقرة.<br>&nbsp; - **مثال**: شرائح تفاح مع زبدة اللوز، وخضروات نيئة مع الحمص.</p>\r\n<p>### 4. توقيت المغذيات والترطيب<br>- **قبل التمرين**: تناول وجبة أو وجبة خفيفة تحتوي على الكربوهيدرات والبروتين قبل 1-2 ساعة من التمرين لتغذية تمرينك.<br>&nbsp; - **مثال**: شريحة خبز كاملة مع زبدة الفول السوداني أو سموذي مع الفواكه ومسحوق البروتين.</p>\r\n<p>- **بعد التمرين**: التركيز على البروتين والكربوهيدرات لدعم الانتعاش خلال 30-60 دقيقة بعد التمرين.<br>&nbsp; - **مثال**: مشروب بروتين مع موزة أو لفافة دجاج مع الخضروات.</p>\r\n<p>- **الترطيب**: اشرب الكثير من الماء طوال اليوم، واستهدف على الأقل 8 أكواب (64 أونصة). عدل الكمية بناءً على مستوى النشاط والمناخ.</p>','2024-08-26 01:01:39','2024-08-26 03:25:19'),(19,6,'ar','برنامج الأوزان الحرة','<p><strong>برنامج الأثقال الحرة هو روتين تدريب القوة الذي يستخدم الدمبل، والأثقال، وكيتلبل لبناء العضلات، وتعزيز القوة، وتحسين اللياقة البدنية العامة.</strong></p>','<p>**برنامج الأثقال الحرة هو روتين تدريب القوة الذي يستخدم الدمبل، والأثقال، وكيتلبل لبناء العضلات، وتعزيز القوة، وتحسين اللياقة البدنية العامة. إليك وصف تفصيلي لبرنامج الأثقال الحرة المتكامل:**</p>\r\n<p>### 1. الأهداف والتقييم<br>- **تحديد الأهداف**: تحديد ما إذا كان الهدف هو زيادة الكتلة العضلية، تعزيز القوة، التحمل، أو اللياقة العامة.<br>- **تقييم مستوى اللياقة الحالي**: تقييم القوة الحالية، والتحمل، وأي خبرة سابقة مع الأثقال الحرة.<br>- **تحديد الأهداف**: وضع أهداف واضحة وقابلة للتحقيق (مثل: زيادة القوة في رفع محدد، أو بناء الكتلة العضلية).</p>\r\n<p>### 2. هيكل البرنامج<br>- **التكرار**: استهدف 3-4 جلسات تدريب قوة في الأسبوع، مع السماح بأيام راحة أو استشفاء نشط بينها.<br>- **نظام التقسيم**: النظر في نظام تقسيم (مثل: الجزء العلوي/الجزء السفلي أو دفع/سحب) لاستهداف مجموعات عضلية مختلفة في أيام مختلفة.<br>- **المدة**: تستغرق الجلسات عادةً 45-60 دقيقة، بما في ذلك الإحماء والتبريد.</p>\r\n<p>### 3. الإحماء (5-10 دقائق)<br>- **الإحماء العام**: كارديو خفيف مثل المشي السريع، أو الجري، أو القفز على الحبل.<br>- **تمارين الإطالة الديناميكية**: تنفيذ تمارين مثل دوائر الذراعين، وتأرجح الساقين، والتواء الجذع لتحضير العضلات والمفاصل.</p>\r\n<p>### 4. نموذج برنامج الأثقال الحرة<br>**اليوم 1: الجزء العلوي**<br>- **الإحماء**: 5-10 دقائق من الكارديو الخفيف وتمارين الإطالة الديناميكية.<br>- **التمارين**:<br>&nbsp; - **ضغط باربيل على المقعد**: 3 مجموعات من 8-12 تكرار<br>&nbsp; - **صفوف الدمبل**: 3 مجموعات من 8-12 تكرار لكل جانب<br>&nbsp; - **ضغط الكتف بالدمبل**: 3 مجموعات من 8-12 تكرار<br>&nbsp; - **تمارين البايسيب بالباربيل**: 3 مجموعات من 10-15 تكرار<br>&nbsp; - **تمارين الترايسيب بالدمبل**: 3 مجموعات من 10-15 تكرار<br>- **التبريد**: إطالة عضلات الجزء العلوي التي تم العمل عليها.</p>\r\n<p>**اليوم 2: الجزء السفلي**<br>- **الإحماء**: 5-10 دقائق من الكارديو الخفيف وتمارين الإطالة الديناميكية.<br>- **التمارين**:<br>&nbsp; - **القرفصاء بالباربيل**: 3 مجموعات من 8-12 تكرار<br>&nbsp; - **الاندفاع بالدمبل**: 3 مجموعات من 10-15 تكرار لكل ساق<br>&nbsp; - **الرفعة المميتة بالباربيل**: 3 مجموعات من 8-12 تكرار<br>&nbsp; - **صعود الدمبل**: 3 مجموعات من 10-15 تكرار لكل ساق<br>&nbsp; - **تمارين رفع الساق**: 3 مجموعات من 15-20 تكرار<br>- **التبريد**: إطالة عضلات الجزء السفلي التي تم العمل عليها.</p>\r\n<p>**اليوم 3: الجسم بالكامل**<br>- **الإحماء**: 5-10 دقائق من الكارديو الخفيف وتمارين الإطالة الديناميكية.<br>- **التمارين**:<br>&nbsp; - **القرفصاء بالدمبل مع الضغط**: 3 مجموعات من 10-12 تكرار<br>&nbsp; - **صفوف باربيل مائلة**: 3 مجموعات من 8-12 تكرار<br>&nbsp; - **ضغط الدمبل على المقعد**: 3 مجموعات من 8-12 تكرار<br>&nbsp; - **تأرجح الكيتلبل**: 3 مجموعات من 12-15 تكرار<br>&nbsp; - **الرفعة المميتة بالدمبل**: 3 مجموعات من 8-12 تكرار<br>- **التبريد**: إطالة جميع مجموعات العضلات الرئيسية.</p>','2024-08-26 01:01:39','2024-08-26 03:26:03'),(20,7,'ar','برامج رفع الأثقال','<p><strong>برنامج تمرين القوة وزيادة حجم العضلات (PHUL) مصمم لدمج عناصر تدريب القوة (القوة) مع بناء العضلات (زيادة الحجم) ضمن تقسيم الجسم العلوي والسفلي.</strong></p>','<p><strong>برنامج تمرين القوة وزيادة حجم العضلات (PHUL)</strong></p>\r\n<p>برنامج تمرين القوة وزيادة حجم العضلات (PHUL) مصمم لدمج عناصر تدريب القوة (القوة) مع بناء العضلات (زيادة الحجم) ضمن تقسيم الجسم العلوي والسفلي. هذا البرنامج مثالي للأشخاص الذين يسعون لبناء كل من القوة وكتلة العضلات، حيث يوازن بين العمل الشاق منخفض التكرار مع العمل الأخف عالي التكرار.</p>\r\n<h3>نظرة عامة على البرنامج</h3>\r\n<ul>\r\n<li><strong>التكرار</strong>: عادةً 4 أيام في الأسبوع (يومان للجسم العلوي، ويومان للجسم السفلي).</li>\r\n</ul>\r\n<h3>الهيكل:</h3>\r\n<ul>\r\n<li><strong>أيام القوة</strong>: التركيز على القوة مع تمارين الوزن الثقيل منخفضة التكرار.</li>\r\n<li><strong>أيام زيادة الحجم</strong>: التركيز على نمو العضلات مع تمارين وزن معتدل ومتكررات متوسطة إلى عالية.</li>\r\n</ul>\r\n<h3>برنامج PHUL النموذجي</h3>\r\n<h4>يوم قوة الجسم العلوي</h4>\r\n<ul>\r\n<li><strong>الإحماء</strong>: 5-10 دقائق من تمارين الكارديو الخفيفة وتمدد ديناميكي.</li>\r\n<li><strong>التمارين</strong>:\r\n<ul>\r\n<li>تمرين الضغط على البنش: 4 مجموعات من 4-6 تكرارات</li>\r\n<li>تمرين السحب المنحني: 4 مجموعات من 4-6 تكرارات</li>\r\n<li>تمرين الضغط العلوي: 3 مجموعات من 4-6 تكرارات</li>\r\n<li>تمرين السحب العلوي أو تمرينات السحب الجانبية: 3 مجموعات من 4-6 تكرارات</li>\r\n<li>تمرين انثناء الذراع بالبار: 3 مجموعات من 6-8 تكرارات</li>\r\n<li>تمرين دفع العضلة الثلاثية أو تمرين سحق الجمجمة: 3 مجموعات من 6-8 تكرارات</li>\r\n</ul>\r\n</li>\r\n<li><strong>التهدئة</strong>: تمدد ثابت لعضلات الجسم العلوي.</li>\r\n</ul>\r\n<h4>يوم قوة الجسم السفلي</h4>\r\n<ul>\r\n<li><strong>الإحماء</strong>: 5-10 دقائق من تمارين الكارديو الخفيفة وتمدد ديناميكي.</li>\r\n<li><strong>التمارين</strong>:\r\n<ul>\r\n<li>القرفصاء: 4 مجموعات من 4-6 تكرارات</li>\r\n<li>رفع الأثقال الميتة: 4 مجموعات من 4-6 تكرارات</li>\r\n<li>ضغط الساق: 3 مجموعات من 6-8 تكرارات</li>\r\n<li>تمارين ثني العضلة الخلفية: 3 مجموعات من 6-8 تكرارات</li>\r\n<li>رفع الكعب: 4 مجموعات من 8-12 تكرارات</li>\r\n</ul>\r\n</li>\r\n<li><strong>التهدئة</strong>: تمدد ثابت لعضلات الجسم السفلي.</li>\r\n</ul>\r\n<h4>يوم زيادة حجم الجسم العلوي</h4>\r\n<ul>\r\n<li><strong>الإحماء</strong>: 5-10 دقائق من تمارين الكارديو الخفيفة وتمدد ديناميكي.</li>\r\n<li><strong>التمارين</strong>:\r\n<ul>\r\n<li>ضغط الدمبل المائل: 3 مجموعات من 8-12 تكرار</li>\r\n<li>سحب الكابل الجالس: 3 مجموعات من 8-12 تكرار</li>\r\n<li>رفع جانبي: 3 مجموعات من 10-15 تكرار</li>\r\n<li>سحب الوجه: 3 مجموعات من 10-15 تكرار</li>\r\n<li>انثناء المطرقة: 3 مجموعات من 10-15 تكرار</li>\r\n<li>دفع العضلة الثلاثية: 3 مجموعات من 10-15 تكرار</li>\r\n</ul>\r\n</li>\r\n<li><strong>التهدئة</strong>: تمدد ثابت لعضلات الجسم العلوي.</li>\r\n</ul>\r\n<h4>يوم زيادة حجم الجسم السفلي</h4>\r\n<ul>\r\n<li><strong>الإحماء</strong>: 5-10 دقائق من تمارين الكارديو الخفيفة وتمدد ديناميكي.</li>\r\n<li><strong>التمارين</strong>:\r\n<ul>\r\n<li>القرفصاء الأمامية أو قرفصاء الكوب: 3 مجموعات من 8-12 تكرار</li>\r\n<li>رفع الأثقال الميتة الرومانية: 3 مجموعات من 8-12 تكرار</li>\r\n<li>تمديدات الساق: 3 مجموعات من 10-15 تكرار</li>\r\n<li>تمارين ثني الساق: 3 مجموعات من 10-15 تكرار</li>\r\n<li>رفع الكعب واقفًا: 4 مجموعات من 12-20 تكرار</li>\r\n</ul>\r\n</li>\r\n<li><strong>التهدئة</strong>: تمدد ثابت لعضلات الجسم السفلي.</li>\r\n</ul>\r\n<h3>المبادئ الأساسية</h3>\r\n<ul>\r\n<li><strong>التحميل التدريجي</strong>: زيادة الأوزان أو المقاومة تدريجيًا للاستمرار في تحقيق تقدم في كل من القوة وحجم العضلات.</li>\r\n<li><strong>الشكل والتقنية</strong>: التركيز على الشكل الصحيح لتحقيق أقصى فعالية وتقليل مخاطر الإصابة.</li>\r\n<li><strong>الراحة والتعافي</strong>: السماح بالتعافي الكافي بين التمارين وضمان نوم جيد لدعم نمو العضلات وإصلاحها.</li>\r\n<li><strong>التغذية</strong>: الحفاظ على نظام غذائي متوازن يحتوي على ما يكفي من البروتينات والكربوهيدرات والدهون لدعم زيادة القوة وزيادة حجم العضلات.</li>\r\n</ul>\r\n<h3>نصائح للنجاح</h3>\r\n<ul>\r\n<li><strong>الإحماء والتهدئة</strong>: تضمين إحماء صحيح وتهدئة دائمًا لتحضير جسمك للتمرين والمساعدة في التعافي.</li>\r\n<li><strong>التنوع</strong>: تغيير التمارين، الزوايا، أو المعدات كل 6-8 أسابيع لمنع الانحدار والحفاظ على الحماس في التمارين.</li>\r\n<li><strong>استمع إلى جسمك</strong>: تعديل الأوزان، والتكرارات، والمجموعات بناءً على كيفية شعورك وتقدمك.</li>\r\n</ul>','2024-08-26 01:01:39','2024-08-26 03:26:54');
/*!40000 ALTER TABLE `workout_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workouts`
--

DROP TABLE IF EXISTS `workouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `tool_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `training_days` int DEFAULT NULL,
  `class_count` int DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `capacity` int NOT NULL DEFAULT '0',
  `enroll_start` date DEFAULT NULL,
  `enroll_end` date DEFAULT NULL,
  `class_start_date` date DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workouts_category_id_foreign` (`category_id`),
  KEY `workouts_created_by_foreign` (`created_by`),
  KEY `workouts_updated_by_foreign` (`updated_by`),
  CONSTRAINT `workouts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `workout_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `workouts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `workouts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workouts`
--

LOCK TABLES `workouts` WRITE;
/*!40000 ALTER TABLE `workouts` DISABLE KEYS */;
INSERT INTO `workouts` VALUES (1,NULL,NULL,'brittany-bauer','/uploads/custom-images/workout/wsus-img-2024-06-04-03-46-12-1567.jpg',NULL,'[{\"link\": \"https://www.youtube.com/watch?v=R30JGe23A24\", \"image\": \"/uploads/custom-images/workout/wsus-img-2024-06-04-03-46-12-2664.png\"}]',100,40,100.00,100,'2024-06-10','2024-06-18','2024-06-26',1,1,'0','2024-07-11 02:12:05','2024-06-03 21:46:12','2024-07-11 02:12:05'),(2,NULL,NULL,'cardio-workout','/uploads/custom-images/workout/wsus-img-2024-06-04-04-02-52-5358.jpg','[\"138,131,130,133\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-08-26-09-19-32-2356.jpg\"}]',100,30,100.00,20,'2024-08-27','2024-12-27','2024-08-28',1,1,'1',NULL,'2024-06-03 22:02:52','2024-11-10 05:28:45'),(3,NULL,NULL,'basic-barbell-training','/uploads/custom-images/workout/wsus-img-2024-06-04-04-12-51-2038.jpg','[\"7,9,10,3\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-06-04-04-12-51-1816.jpg\"}]',20,10,20.00,20,'2024-08-24','2024-11-30','2024-12-01',1,1,'1',NULL,'2024-06-03 22:12:51','2024-11-10 05:28:44'),(4,NULL,NULL,'weight-loss-program','/uploads/custom-images/workout/wsus-img-2024-07-11-08-07-40-4089.jpg','[\"8,9,10,4,3\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-07-11-08-07-40-8238.jpg\"}]',30,22,100.00,50,'2024-08-25','2024-12-31','2024-08-01',1,1,'1',NULL,'2024-07-11 02:07:40','2024-11-10 04:53:19'),(5,NULL,NULL,'nutrition-plan','/uploads/custom-images/workout/wsus-img-2024-07-11-08-11-08-7611.jpg','[\"8,9,10\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-07-11-08-11-08-6807.jpg\"}]',20,10,200.00,10,'2024-08-21','2024-09-23','2024-07-31',1,1,'1',NULL,'2024-07-11 02:11:08','2024-11-10 04:52:59'),(6,NULL,NULL,'free-weights-program','/uploads/custom-images/workout/wsus-img-2024-07-11-08-16-44-2526.jpg','[\"9,4,3\"]','[{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-07-11-08-16-44-2094.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-07-11-08-16-44-9923.jpg\"},{\"link\":\"https:\\/\\/www.youtube.com\\/watch?v=FBs0l6cxl1o\",\"image\":\"\\/uploads\\/custom-images\\/workout\\/wsus-img-2024-07-11-08-16-44-2433.png\"}]',10,2,0.00,10,'2024-07-30','2024-08-01','2024-08-02',1,1,'1',NULL,'2024-07-11 02:16:44','2024-09-05 23:53:46'),(7,NULL,NULL,'powerlifting-programs','/uploads/custom-images/workout/wsus-img-2024-07-11-09-00-50-4617.jpg','[\"8,9,4\"]','[]',30,10,100.00,20,'2024-07-18','2024-07-20','2024-07-24',1,1,'1',NULL,'2024-07-11 03:00:50','2024-08-15 01:35:30'),(8,NULL,NULL,'test',NULL,'[null]','[]',12,12,1111.00,100,'2024-11-14','2024-11-22','2024-11-27',1,1,'1','2024-11-10 05:34:38','2024-11-10 05:29:37','2024-11-10 05:34:38');
/*!40000 ALTER TABLE `workouts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-02  9:49:27
