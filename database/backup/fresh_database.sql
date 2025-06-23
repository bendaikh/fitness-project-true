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
  `lang_code` varchar(2) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `about_us_title` varchar(255) DEFAULT NULL,
  `about_us_description` text,
  `about_us_button_text` varchar(255) DEFAULT NULL,
  `choose_us_title` varchar(255) DEFAULT NULL,
  `choose_us_description` text,
  `choose_us_button_text` varchar(255) DEFAULT NULL,
  `support_us_title` varchar(255) DEFAULT NULL,
  `support_us_description` text,
  `support_us_button_text` varchar(255) DEFAULT NULL,
  `exercise_title` varchar(255) DEFAULT NULL,
  `exercise_description` text,
  `team_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `about_translations_about_id_foreign` (`about_id`),
  CONSTRAINT `about_translations_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `about_translations`
--

LOCK TABLES `about_translations` WRITE;
/*!40000 ALTER TABLE `about_translations` DISABLE KEYS */;
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
  `about_us_image` varchar(255) DEFAULT NULL,
  `about_us_button_link` varchar(255) DEFAULT NULL,
  `about_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `choose_us_image_1` varchar(255) DEFAULT NULL,
  `choose_us_image_2` varchar(255) DEFAULT NULL,
  `choose_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `choose_us_button_link` varchar(255) DEFAULT NULL,
  `support_us_image` varchar(255) DEFAULT NULL,
  `support_us_video` varchar(255) DEFAULT NULL,
  `support_us_button_link` varchar(255) DEFAULT NULL,
  `support_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `exercise_image` varchar(255) DEFAULT NULL,
  `exercise_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `team_status` tinyint(1) NOT NULL DEFAULT '1',
  `team_image` varchar(255) DEFAULT NULL,
  `testimonial_status` tinyint(1) NOT NULL DEFAULT '1',
  `testimonial_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_translations_activity_id_foreign` (`activity_id`),
  CONSTRAINT `activity_translations_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `activity_translations`
--

LOCK TABLES `activity_translations` WRITE;
/*!40000 ALTER TABLE `activity_translations` DISABLE KEYS */;
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
  `address` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `walk_in_customer` tinyint(1) DEFAULT NULL,
  `type` enum('home','office') NOT NULL DEFAULT 'home',
  `default` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forget_password_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'John Doe','admin@gmail.com','uploads/website-images/admin.jpg','$2y$12$g15oeaMooZZLJgi9ke2e3.VY5KJ1H8ER.QsnpA7qY8ix80NRzM4MC','active','2024-11-22 23:04:25','2024-11-22 23:04:25',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
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
  `name` varchar(255) DEFAULT NULL,
  `has_thumbnail` tinyint(1) DEFAULT '0',
  `thumbnail` varchar(255) DEFAULT NULL,
  `attribute_id` bigint unsigned NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_values_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `attribute_values`
--

LOCK TABLES `attribute_values` WRITE;
/*!40000 ALTER TABLE `attribute_values` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `type` enum('winner','runner_up','participation') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `awards`
--

LOCK TABLES `awards` WRITE;
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
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
  `subject` varchar(255) DEFAULT NULL,
  `reasone` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `banned_histories`
--

LOCK TABLES `banned_histories` WRITE;
/*!40000 ALTER TABLE `banned_histories` DISABLE KEYS */;
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
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `basic_payments`
--

LOCK TABLES `basic_payments` WRITE;
/*!40000 ALTER TABLE `basic_payments` DISABLE KEYS */;
INSERT INTO `basic_payments` VALUES (1,'stripe_key','pk_test_33mdngCLuLsmECXOe8mbde9f00pZGT4uu9','2024-11-22 23:04:07','2024-11-22 23:04:07'),(2,'stripe_secret','sk_test_MroTZzRZRv2KJ9Hmaro73SE800UOR90Q9u','2024-11-22 23:04:07','2024-11-22 23:04:07'),(3,'stripe_currency_id','1','2024-11-22 23:04:07','2024-11-22 23:04:07'),(4,'stripe_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(5,'stripe_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(6,'stripe_image','uploads/website-images/stripe.png','2024-11-22 23:04:07','2024-11-22 23:04:07'),(7,'paypal_client_id','AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy','2024-11-22 23:04:07','2024-11-22 23:04:07'),(8,'paypal_secret_key','EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn','2024-11-22 23:04:07','2024-11-22 23:04:07'),(9,'paypal_account_mode','sandbox','2024-11-22 23:04:07','2024-11-22 23:04:07'),(10,'paypal_currency_id','1','2024-11-22 23:04:07','2024-11-22 23:04:07'),(11,'paypal_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(12,'paypal_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(13,'paypal_image','uploads/website-images/paypal.png','2024-11-22 23:04:07','2024-11-22 23:04:07'),(14,'bank_information','Bank Name => Your bank name\r\nAccount Number =>  Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name','2024-11-22 23:04:07','2024-11-22 23:04:07'),(15,'bank_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(16,'bank_image','uploads/website-images/bank-pay.png','2024-11-22 23:04:07','2024-11-22 23:04:07'),(17,'bank_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(18,'bank_currency_id','1','2024-11-22 23:04:07','2024-11-22 23:04:07'),(19,'paypal_app_id','paypal_app_id',NULL,NULL);
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
  `slug` varchar(255) NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `parent_id` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'workout-plans',1,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(2,'healthy-eating',2,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(3,'mental-toughness',3,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(4,'weight-loss',4,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(5,'strength-training',5,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(6,'beginner-fitness',6,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(7,'yoga-practice',7,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(8,'sports-conditioning',8,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(9,'injury-prevention',9,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(10,'fitness-tech',10,NULL,1,'2024-11-22 23:04:26','2024-11-22 23:04:26');
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
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_category_translations_blog_category_id_foreign` (`blog_category_id`),
  CONSTRAINT `blog_category_translations_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_category_translations`
--

LOCK TABLES `blog_category_translations` WRITE;
/*!40000 ALTER TABLE `blog_category_translations` DISABLE KEYS */;
INSERT INTO `blog_category_translations` VALUES (1,1,'en','Workout Plans',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(2,2,'en','Healthy Eating',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(3,3,'en','Mental Toughness',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(4,4,'en','Weight Loss',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(5,5,'en','Strength Training',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(6,6,'en','Beginner Fitness',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(7,7,'en','Yoga Practice',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(8,8,'en','Sports Conditioning',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(9,9,'en','Injury Prevention',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(10,10,'en','Fitness Tech',NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26');
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
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
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
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext,
  `seo_title` text,
  `seo_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `blog_translations`
--

LOCK TABLES `blog_translations` WRITE;
/*!40000 ALTER TABLE `blog_translations` DISABLE KEYS */;
INSERT INTO `blog_translations` VALUES (1,1,'en','Full-Body Circuit Workout','A full-body circuit workout is a fantastic starting point for beginners. It’s efficient, targets all the major muscle groups, and provides a blend of strength training and cardio. The idea behind a circuit workout is to move quickly from one exercise to the next with minimal rest in between, keeping your heart rate elevated and maximizing calorie burn.\n\nWhy It’s Great for Beginners:\n\nEfficiency: You’re working out multiple muscle groups in a short amount of time.\nSimplicity: The exercises are straightforward and don’t require specialized equipment.\nAdaptability: You can easily adjust the number of rounds or reps based on your fitness level.\nExample Circuit:\n\nPush-Ups: 10-15 reps\nTargets chest, shoulders, and triceps while engaging the core for stability.\nBodyweight Squats: 15-20 reps\nFocuses on the quads, hamstrings, and glutes, with secondary engagement of the core.\nBent-Over Rows: 12-15 reps (using dumbbells or resistance bands)\nStrengthens the upper back, lats, and biceps.\nPlank: Hold for 30 seconds\nAn excellent core stabilizer that also engages the shoulders and glutes.\nJumping Jacks: 30 seconds\nA great cardio burst that works the whole body, especially the legs and shoulders.\nHow to Perform:\nComplete the exercises in the order listed, with minimal rest between each. After completing all five exercises, rest for 1-2 minutes, then repeat the circuit 3-4 times. As you progress, you can increase the number of reps or rounds to keep challenging your body.','Full-Body Circuit Workout','Full-Body Circuit Workout','2024-11-22 23:04:26','2024-11-22 23:04:26'),(2,2,'en','Bodyweight Strength Training','Bodyweight exercises are a staple in any beginner’s workout arsenal. They require no equipment, can be performed anywhere, and are highly effective at building foundational strength. This type of training focuses on compound movements—exercises that engage multiple muscle groups simultaneously—making it ideal for improving overall strength and coordination.\n\nWhy It’s Great for Beginners:\n\nNo Equipment Needed: You can do these exercises at home or even outdoors.\nFunctional Strength: Bodyweight exercises improve strength that translates into everyday activities.\nProgressive Difficulty: As you get stronger, you can modify these exercises to increase difficulty.\nExample Routine:\n\nSquats: 3 sets of 12 reps\nStrengthens the lower body and core, promoting balance and stability.\nPush-Ups: 3 sets of 10 reps\nWorks the chest, shoulders, and triceps while also engaging the core.\nLunges: 3 sets of 10 reps per leg\nTargets the quads, hamstrings, and glutes, while also challenging balance.\nGlute Bridges: 3 sets of 15 reps\nFocuses on the glutes and hamstrings, also engaging the lower back.\nSuperman: 3 sets of 12 reps\nStrengthens the lower back, glutes, and shoulders, promoting spinal health.\nHow to Perform:\nThis routine is best performed 2-3 times a week, with a day of rest in between to allow your muscles to recover. Focus on maintaining proper form throughout each exercise, and as you build strength, consider adding more reps or sets, or even combining the exercises into a circuit for added intensity.','Bodyweight Strength Training','Bodyweight Strength Training','2024-11-22 23:04:26','2024-11-22 23:04:26'),(3,3,'en','Beginner’s Cardio Routine','Cardiovascular exercise is crucial for heart health, improving lung capacity, and aiding in weight loss. For beginners, starting with low-impact cardio helps to build endurance without placing too much strain on the joints. This routine is designed to get your heart pumping while being gentle on your body.\n\nWhy It’s Great for Beginners:\n\nLow-Impact Options: Reduces the risk of injury and is gentle on the joints.\nImproves Endurance: Gradually builds cardiovascular strength, making more intense workouts possible later on.\nVariety: Combines different movements to keep the workout interesting and engaging.\nExample Routine:\n\nBrisk Walking: 5 minutes warm-up\nAn effective way to prepare your body for more intense activity.\nJogging in Place: 2 minutes\nBoosts heart rate and warms up the leg muscles.\nHigh Knees: 1 minute\nTargets the lower abs and legs while keeping the heart rate elevated.\nButt Kicks: 1 minute\nStretches the quads and engages the hamstrings while maintaining cardio intensity.\nJump Rope: 2 minutes\nAn excellent full-body cardio exercise that improves coordination and burns calories.\nCool Down: 5 minutes of walking\nGradually lowers your heart rate and helps with muscle recovery.\nHow to Perform:\nStart with this routine 2-3 times a week. As your stamina improves, you can increase the duration of each exercise or add more rounds. Always listen to your body—if something feels too intense, take it down a notch and gradually build up.','Beginner’s Cardio Routine','Beginner’s Cardio Routine','2024-11-22 23:04:26','2024-11-22 23:04:26'),(4,4,'en','Beginner’s Strength Training Routine','Flexibility and mobility are critical aspects of fitness that often get overlooked. Incorporating stretching and mobility exercises into your routine helps to prevent injuries, improve posture, and enhance overall performance. This workout focuses on stretching major muscle groups and improving joint mobility.\n\nWhy It’s Great for Beginners:\n\nPrevents Injuries: Regular stretching reduces the risk of muscle strains and joint issues.\nImproves Posture: Helps correct imbalances and tightness, leading to better posture.\nEnhances Performance: Greater flexibility and mobility allow for more efficient movement during workouts.\nExample Routine:\n\nHamstring Stretch: Hold for 30 seconds per leg\nLengthens the hamstrings, reducing tension and improving lower body flexibility.\nHip Flexor Stretch: Hold for 30 seconds per leg\nTargets the hip flexors, which are often tight due to prolonged sitting.\nShoulder Stretch: Hold for 30 seconds per arm\nRelieves tension in the shoulders and improves upper body mobility.\nCat-Cow Stretch: 10 reps\nIncreases flexibility in the spine and promotes better spinal alignment.\nChild’s Pose: Hold for 1 minute\nA gentle stretch for the lower back, hips, and shoulders, promoting relaxation.\nHow to Perform:\nThis routine can be done at the end of your workout to help cool down and improve flexibility, or as a standalone session on rest days. Flexibility improvements take time, so consistency is key. Over time, you’ll notice increased range of motion and reduced muscle stiffness.\n','Beginner’s Strength Training Routine','Beginner’s Strength Training Routine','2024-11-22 23:04:26','2024-11-22 23:04:26'),(5,5,'en','Beginner’s Strength Training with Dumbbells','Dumbbells are a versatile and accessible piece of equipment for beginners looking to build muscle and strength. Strength training with dumbbells allows for a wide range of exercises that target different muscle groups, and it’s easy to progress by gradually increasing the weight as you get stronger.\n\nWhy It’s Great for Beginners:\n\nVersatile: Dumbbells can be used for a variety of exercises targeting different muscle groups.\nScalable: Start with light weights and increase as you gain strength.\nFunctional Strength: Helps build strength that translates to everyday activities, like lifting and carrying.\nExample Routine:\n\nDumbbell Squats: 3 sets of 10 reps\nTargets the quads, glutes, and core while also improving balance.\nDumbbell Bench Press: 3 sets of 10 reps\nStrengthens the chest, shoulders, and triceps.\nDumbbell Rows: 3 sets of 12 reps per arm\nFocuses on the upper back and biceps, promoting better posture.\nDumbbell Shoulder Press: 3 sets of 10 reps\nBuilds shoulder strength and stability.\nDumbbell Deadlifts: 3 sets of 12 reps\nEngages the hamstrings, glutes, and lower back, improving posterior chain strength.\nHow to Perform:\nPerform this routine 2-3 times a week, with at least one day of rest between sessions. Focus on form over weight—using proper technique ensures you’re working the targeted muscles and reduces the risk of injury. As you become more comfortable, gradually increase the weight or add more reps to continue challenging your muscles.','Beginner’s Strength Training with Dumbbells','Beginner’s Strength Training with Dumbbells','2024-11-22 23:04:26','2024-11-22 23:04:26'),(6,6,'en','Beginner’s Strength Training with Kettlebells','\n                Kettlebells have become a popular choice for strength training enthusiasts due to their versatility and effectiveness. These unique weights, resembling a cannonball with a handle, offer a dynamic approach to building strength, enhancing flexibility, and improving overall fitness. Whether you’re new to strength training or looking to add variety to your routine, kettlebells are an excellent tool for beginners. This blog will guide you through the fundamentals of kettlebell training, including exercises, benefits, and tips for getting started.\n\n                Why Choose Kettlebells?\nKettlebells are renowned for their ability to provide a full-body workout in a relatively short amount of time. Here’s why they’re ideal for beginners:\n\nVersatility: Kettlebells can be used for a wide range of exercises, targeting multiple muscle groups simultaneously. This versatility makes them a comprehensive tool for building strength and improving endurance.\n\nFunctional Fitness: Kettlebell training focuses on functional movements that mimic everyday activities. This approach helps improve balance, coordination, and core strength, which translates to better performance in daily tasks.\n\nEfficiency: With kettlebells, you can achieve a high-intensity workout that combines strength training and cardiovascular conditioning. This efficiency helps in burning calories and improving overall fitness.\n\nScalability: Kettlebells come in various weights, allowing you to start with a lighter weight and gradually increase as you build strength. This scalability makes them suitable for beginners.\n\nGetting Started with Kettlebells\nBefore diving into kettlebell exercises, it’s essential to familiarize yourself with proper form and technique to prevent injury and maximize benefits. Here’s a step-by-step guide to help you get started:\n                ','Beginner’s Strength Training with Kettlebells','Beginner’s Strength Training with Kettlebells','2024-11-22 23:04:26','2024-11-22 23:04:26'),(7,7,'en','Fuel Your Body for Optimal Health','\n                In the quest for a healthier lifestyle, nutrition plays a pivotal role. It\'s not just about eating fruits and vegetables but understanding how different nutrients affect your body and overall well-being. This guide will delve into the essentials of nutrition, exploring macronutrients, micronutrients, hydration, and practical tips for incorporating a balanced diet into your daily life.\n\nUnderstanding Macronutrients\nMacronutrients are the nutrients that provide us with energy and are required in large amounts. They include carbohydrates, proteins, and fats. Each plays a unique role in maintaining health and supporting bodily functions.\n\nCarbohydrates: The Primary Energy Source\n\nRole: Carbohydrates are the body\'s main source of energy. They are broken down into glucose, which is used by cells for fuel.\nTypes: Carbohydrates are categorized into simple (sugars) and complex (starches and fibers). Simple carbohydrates are found in foods like fruits and sweets, while complex carbohydrates are present in whole grains, legumes, and vegetables.\nRecommendations: Aim for complex carbohydrates as they provide sustained energy and essential nutrients. Foods like oats, brown rice, and sweet potatoes are excellent choices.\nProteins: The Building Blocks of the Body\n\nRole: Proteins are crucial for building and repairing tissues, making enzymes and hormones, and supporting immune function.\nSources: High-quality protein sources include lean meats, poultry, fish, eggs, dairy products, legumes, nuts, and seeds.\nRecommendations: For optimal health, include a variety of protein sources in your diet. Aim for about 0.8 grams of protein per kilogram of body weight daily, adjusting based on activity levels and specific health needs.\nFats: Essential for Health\n\nRole: Fats are vital for energy storage, hormone production, and cell membrane integrity. They also help in absorbing fat-soluble vitamins (A, D, E, and K).\nTypes: Fats are divided into saturated, unsaturated (monounsaturated and polyunsaturated), and trans fats. Unsaturated fats are considered beneficial and can be found in olive oil, avocados, and nuts. Saturated fats should be consumed in moderation, while trans fats should be avoided.\nRecommendations: Focus on healthy fats from sources like fish, nuts, and seeds. Limit intake of saturated fats and avoid trans fats to maintain heart health.\n                ','Fuel Your Body for Optimal Health','Fuel Your Body for Optimal Health','2024-11-22 23:04:26','2024-11-22 23:04:26'),(8,8,'en','Understanding the Role of Fiber in a Healthy Diet','\n                Introduction\nFiber is often touted as a key component of a healthy diet, yet many people remain unclear about its benefits and how to incorporate it into their daily meals. This essential nutrient plays a significant role in digestive health, weight management, and overall wellness. In this blog, we’ll explore the different types of fiber, their benefits, and practical tips for increasing your fiber intake.\n\nTypes of Fiber\nFiber is categorized into two main types: soluble and insoluble, each with its unique benefits.\n\nSoluble Fiber\n\nCharacteristics: Soluble fiber dissolves in water to form a gel-like substance. It can help lower blood cholesterol levels and stabilize blood sugar.\nSources: Common sources include oats, barley, beans, lentils, apples, oranges, and carrots.\nInsoluble Fiber\n\nCharacteristics: Insoluble fiber does not dissolve in water. It adds bulk to the stool and aids in moving food through the digestive tract.\nSources: Found in whole grains, wheat bran, nuts, and vegetables such as cauliflower and potatoes.\n                ','Understanding the Role of Fiber in a Healthy Diet','Understanding the Role of Fiber in a Healthy Diet','2024-11-22 23:04:26','2024-11-22 23:04:26'),(9,9,'en','A Guide to Making Healthier Choices','\n                Introduction\nFood labels can be a valuable tool in making informed dietary choices, but they can also be confusing with their technical jargon and numbers. Understanding how to read and interpret food labels is crucial for maintaining a healthy diet and making better food choices. This guide will break down the essential components of food labels and offer tips for navigating them effectively.\n\nKey Components of Food Labels\nServing Size\n\nDefinition: The serving size indicates the amount of food that is considered one serving. It is crucial for understanding nutritional information.\nTip: Compare the serving size to the amount you actually consume to gauge the calories and nutrients you’re ingesting.\nCalories\n\nDefinition: Calories represent the amount of energy provided by one serving of the food.\nTip: Pay attention to the number of calories per serving to manage your energy intake. Be mindful of portion sizes to avoid overconsumption.\nNutritional Breakdown\n\nFats:\nTypes: Labels typically list total fat, saturated fat, and trans fat.\nTip: Choose products with lower saturated and trans fats to promote heart health.\nCholesterol:\nDefinition: Cholesterol is a type of fat found in animal products.\nTip: Opt for foods lower in cholesterol to maintain healthy blood cholesterol levels.\nSodium:\nDefinition: Sodium is a component of salt that can impact blood pressure.\nTip: Limit sodium intake to support cardiovascular health. Aim for less than 2,300 mg of sodium per day.\nCarbohydrates:\nTypes: Labels often list total carbohydrates, dietary fiber, and sugars.\nTip: Choose foods high in fiber and low in added sugars to support digestive health and stable blood sugar levels.\nProteins:\nDefinition: Proteins are essential for muscle repair and overall bodily functions.\nTip: Include a variety of protein sources, such as lean meats, dairy, legumes, and nuts.\nVitamins and Minerals\n\nDefinition: Labels list vitamins and minerals like vitamin A, vitamin C, calcium, and iron.\nTip: Ensure you’re getting adequate amounts of these essential nutrients to support overall health.\nIngredients List\n\nDefinition: The ingredients list shows all the components of the food product in descending order by weight.\nTip: Look for whole, recognizable ingredients. Avoid products with excessive added sugars, artificial additives, and preservatives.\nPercent Daily Values (%DV)\n\nDefinition: %DV shows how much a nutrient in a serving of food contributes to a daily diet based on a 2,000-calorie reference.\nTip: Use %DV to determine if a food product is high or low in specific nutrients. For example, a %DV of 20% or more is considered high.\nTips for Making Healthier Choices\nFocus on Whole Foods\n\nPreference: Opt for foods with minimal processing and natural ingredients. Whole fruits, vegetables, grains, and lean proteins are healthier choices.\nBeware of Health Claims\n\nUnderstanding Claims: Be cautious of labels with claims such as “low fat” or “sugar-free,” as they may still contain unhealthy ingredients. Always check the full nutritional information.\nCompare Products\n\nComparison: When shopping, compare different brands and products to find the one with the best nutritional profile.\nPortion Control\n\nServing Size Awareness: Be aware of the serving size to avoid consuming more calories or nutrients than you intended.\nEducate Yourself\n\nNutritional Knowledge: Take time to learn about different nutrients and their roles in your diet. This knowledge will help you make more informed food choices.\nBalance and Moderation\n\nHealthy Eating: Focus on balancing your diet with a variety of foods. Moderation is key to maintaining a healthy eating pattern without depriving yourself.','A Guide to Making Healthier Choices','A Guide to Making Healthier Choices','2024-11-22 23:04:26','2024-11-22 23:04:26'),(10,10,'en','Why You Should Incorporate It Into Your Routine','\n                    Introduction\nHigh-Intensity Interval Training (HIIT) has gained immense popularity in recent years, and for good reason. This form of exercise alternates between short bursts of intense activity and periods of rest or low-intensity activity. HIIT is known for its efficiency, allowing you to burn calories, improve cardiovascular health, and build strength in a shorter amount of time than traditional workouts. In this blog, we’ll delve into the benefits of HIIT, how it works, and tips for getting started.\n\nWhat is High-Intensity Interval Training (HIIT)?\nHIIT is a type of cardiovascular exercise strategy that involves short, intense bursts of anaerobic exercise followed by recovery periods. These workouts typically last between 10 to 30 minutes, making them ideal for those with busy schedules. The intensity and variability of HIIT not only make it an effective workout but also keep it engaging.\n\nThe Science Behind HIIT\nHIIT is effective due to the high demand it places on the body during short bursts of intense exercise. During these bursts, your heart rate increases significantly, and your body taps into anaerobic energy systems, which do not require oxygen but rather glycogen stored in muscles for energy. This process helps to burn a significant amount of calories, both during and after the workout, due to the excess post-exercise oxygen consumption (EPOC) effect, often referred to as the \"afterburn.\"\n\nBenefits of HIIT\nTime Efficiency\n\nShort Workouts, Big Results: One of the most significant benefits of HIIT is its efficiency. You can achieve substantial fitness gains in as little as 20 minutes. This is especially appealing for those with tight schedules who struggle to find time for longer workouts.\nFlexibility: HIIT can be done almost anywhere and with minimal equipment. Whether you’re at home, in a gym, or even outdoors, you can customize your HIIT routine to fit your environment.\nCalorie and Fat Burning\n\nHigh Caloric Burn: HIIT is incredibly effective for burning calories in a short amount of time. The intense bursts of activity elevate your heart rate and metabolism, leading to higher calorie expenditure during the workout.\nAfterburn Effect: The EPOC effect ensures that your body continues to burn calories even after the workout has ended. This prolonged calorie burn can aid in fat loss, making HIIT a powerful tool for those looking to lose weight.\nImproved Cardiovascular Health\n\nHeart Health: HIIT has been shown to improve cardiovascular health by increasing both aerobic and anaerobic endurance. The intense nature of the intervals challenges the heart and lungs, leading to better heart function and circulation.\nLowered Blood Pressure: Regular HIIT workouts can help lower blood pressure, improving overall cardiovascular health and reducing the risk of heart disease.\nIncreased Metabolic Rate\n\nBoosted Metabolism: The high intensity of HIIT workouts can increase your metabolic rate for hours after the workout. This means your body continues to burn calories even at rest, aiding in weight management and fat loss.\nImproved Insulin Sensitivity: HIIT has been shown to improve insulin sensitivity, which helps the muscles better use glucose for energy and reduces the risk of developing type 2 diabetes.\nMuscle Building and Retention\n\nPreservation of Lean Muscle Mass: Unlike steady-state cardio, which can sometimes lead to muscle loss, HIIT helps preserve and even build lean muscle mass while reducing body fat. The high-intensity intervals engage multiple muscle groups, promoting strength and endurance.\nFunctional Fitness: HIIT often involves compound movements like squats, lunges, and push-ups, which mimic everyday activities and improve functional fitness.\nMental Health Benefits\n\nEndorphin Boost: The intensity of HIIT workouts can lead to the release of endorphins, often referred to as the \"feel-good\" hormones. This can result in improved mood and reduced feelings of stress and anxiety.\nMental Toughness: Pushing through the intense intervals of HIIT can also help build mental resilience and discipline, which can translate to other areas of life.\n                ','Why You Should Incorporate It Into Your Routine','Why You Should Incorporate It Into Your Routine','2024-11-22 23:04:26','2024-11-22 23:04:26'),(11,11,'en','Stretch Your Way to Better Health','Flexibility training is often overlooked in fitness routines, yet it is an essential component of overall health and wellness. Stretching not only improves your range of motion but also enhances muscle coordination, reduces the risk of injury, and promotes relaxation. Whether you’re an athlete or someone looking to improve their daily function, incorporating flexibility exercises into your routine can yield significant benefits. In this blog, we’ll explore the importance of flexibility training, different types of stretching, and how to incorporate it into your fitness regimen.\n\nWhat is Flexibility?\nFlexibility refers to the ability of your muscles and joints to move through their full range of motion. Good flexibility allows for ease of movement, reduces muscle stiffness, and helps prevent injuries. Flexibility can vary between individuals based on factors like age, gender, and physical activity levels, but it can be improved with consistent practice.\n\nTypes of Stretching\nThere are several types of stretching, each with its own benefits and appropriate uses:\n\nStatic Stretching\n\nDefinition: Static stretching involves holding a stretch for an extended period, usually 15 to 60 seconds, without movement.\nBenefits: This type of stretching is effective for increasing flexibility and is best performed after a workout when muscles are warm.\nExamples: Forward fold, hamstring stretch, and shoulder stretch.\nDynamic Stretching\n\nDefinition: Dynamic stretching involves moving parts of your body through a full range of motion in a controlled manner, gradually increasing the reach or speed of the movement.\nBenefits: Dynamic stretching is ideal for warming up before exercise as it prepares the muscles for activity and improves joint flexibility.\nExamples: Leg swings, arm circles, and walking lunges.\nBallistic Stretching\n\nDefinition: Ballistic stretching involves using momentum to force a body part beyond its normal range of motion.\nCaution: This type of stretching can lead to injury if not done correctly and is generally not recommended for beginners or those with limited flexibility.\nExamples: Bouncing toe touches and rapid arm swings.\nPNF Stretching (Proprioceptive Neuromuscular Facilitation)\n\nDefinition: PNF stretching involves a combination of passive stretching and isometric contractions. Typically, a muscle is stretched, contracted, and then stretched further.\nBenefits: PNF is highly effective for increasing flexibility and is often used in rehabilitation settings.\nExamples: Partner hamstring stretch where one person pushes against the other’s resistance.','Stretch Your Way to Better Health','Stretch Your Way to Better Health','2024-11-22 23:04:26','2024-11-22 23:04:26');
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
  `slug` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` bigint NOT NULL DEFAULT '0',
  `show_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `tags` text,
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
INSERT INTO `blogs` VALUES (1,1,6,'full-body-circuit-workout','website/images/blog_details_img_1.jpg',496,1,1,'\"[{\\\"value\\\":\\\"Training\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(2,1,6,'bodyweight-strength-training','website/images/blog_details_img_2.jpg',212,1,1,'\"[{\\\"value\\\":\\\"Running\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(3,1,7,'beginners-cardio-routine','website/images/blog_details_img_3.jpg',964,1,1,'\"[{\\\"value\\\":\\\"Running\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(4,1,5,'beginners-strength-training-routine','website/images/blog_details_img_4.jpg',680,1,1,'\"[{\\\"value\\\":\\\"Running\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(5,1,6,'beginners-strength-training-with-dumbbells','website/images/blog_details_img_5.jpg',308,1,1,'\"[{\\\"value\\\":\\\"Swimming\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(6,1,6,'beginners-strength-training-with-kettlebells','website/images/blog_details_img_6.jpg',505,1,1,'\"[{\\\"value\\\":\\\"Bodybuilding\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(7,1,7,'fuel-your-body-for-optimal-health','website/images/blog_details_img_7.jpg',975,1,1,'\"[{\\\"value\\\":\\\"Cycling\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(8,1,5,'understanding-the-role-of-fiber-in-a-healthy-diet','website/images/blog_details_img_8.jpg',760,1,1,'\"[{\\\"value\\\":\\\"Meditation\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(9,1,7,'a-guide-to-making-healthier-choices','website/images/blog_details_img_9.jpg',533,1,1,'\"[{\\\"value\\\":\\\"Training\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(10,1,2,'why-you-should-incorporate-it-into-your-routine','website/images/blog_details_img_10.jpg',962,1,1,'\"[{\\\"value\\\":\\\"Swimming\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(11,1,5,'stretch-your-way-to-better-health','website/images/blog_details_img_11.jpg',709,1,1,'\"[{\\\"value\\\":\\\"Yoga\\\"}]\"',1,'2024-11-22 23:04:26','2024-11-22 23:04:26');
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'clothing','1',NULL,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,'shoes','1',NULL,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,'accessories','1',NULL,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,'equipment','1',NULL,1,'2024-11-22 23:04:25','2024-11-22 23:04:25');
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
  `name` varchar(255) NOT NULL,
  `state_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_state_id_foreign` (`state_id`),
  CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `class_activities`
--

LOCK TABLES `class_activities` WRITE;
/*!40000 ALTER TABLE `class_activities` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `class_trainers`
--

LOCK TABLES `class_trainers` WRITE;
/*!40000 ALTER TABLE `class_trainers` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `class_translations`
--

LOCK TABLES `class_translations` WRITE;
/*!40000 ALTER TABLE `class_translations` DISABLE KEYS */;
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
  `day` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_workout_id_foreign` (`workout_id`),
  CONSTRAINT `classes_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
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
  `config` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `configurations`
--

LOCK TABLES `configurations` WRITE;
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` VALUES (1,'setup_complete','0','2024-11-22 23:04:25','2024-11-22 23:04:27'),(2,'setup_stage','1','2024-11-22 23:04:25','2024-11-22 23:04:27');
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
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
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_page_translations_contact_page_id_foreign` (`contact_page_id`),
  CONSTRAINT `contact_page_translations_contact_page_id_foreign` FOREIGN KEY (`contact_page_id`) REFERENCES `contact_pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `contact_page_translations`
--

LOCK TABLES `contact_page_translations` WRITE;
/*!40000 ALTER TABLE `contact_page_translations` DISABLE KEYS */;
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
  `address` text,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `map` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `contact_pages`
--

LOCK TABLES `contact_pages` WRITE;
/*!40000 ALTER TABLE `contact_pages` DISABLE KEYS */;
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
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `counter_translations_counter_id_foreign` (`counter_id`),
  CONSTRAINT `counter_translations_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `counter_translations`
--

LOCK TABLES `counter_translations` WRITE;
/*!40000 ALTER TABLE `counter_translations` DISABLE KEYS */;
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
  `icon` varchar(255) DEFAULT NULL,
  `home` enum('1','2','3','4') DEFAULT NULL,
  `number` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `counters`
--

LOCK TABLES `counters` WRITE;
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
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
  `coupon_code` varchar(255) NOT NULL,
  `coupon_id` int NOT NULL,
  `discount_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `coupon_histories`
--

LOCK TABLES `coupon_histories` WRITE;
/*!40000 ALTER TABLE `coupon_histories` DISABLE KEYS */;
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
  `coupon_code` varchar(255) NOT NULL,
  `expired_date` date NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `min_price` decimal(8,2) DEFAULT NULL,
  `offer_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=Percentage, 2=Flat',
  `max_quantity` int NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_addons`
--

LOCK TABLES `custom_addons` WRITE;
/*!40000 ALTER TABLE `custom_addons` DISABLE KEYS */;
INSERT INTO `custom_addons` VALUES (1,'Installer Addon','Installer',1,'This is Installer Addon','{\"name\": \"Websolutionsus\", \"email\": \"websolutionus1@gmail.com\", \"website\": \"https://websolutionus.com\"}','{\"route\": \"home\"}',NULL,'Proprietary','','1.1.0',NULL,'2024-03-31',1,'2024-08-24 22:12:45','2024-08-24 22:12:45');
/*!40000 ALTER TABLE `custom_addons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_codes`
--

DROP TABLE IF EXISTS `custom_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `css` text,
  `javascript` text,
  `header_javascript` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_codes`
--

LOCK TABLES `custom_codes` WRITE;
/*!40000 ALTER TABLE `custom_codes` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_page_translations`
--

LOCK TABLES `custom_page_translations` WRITE;
/*!40000 ALTER TABLE `custom_page_translations` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `custom_pages`
--

LOCK TABLES `custom_pages` WRITE;
/*!40000 ALTER TABLE `custom_pages` DISABLE KEYS */;
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
  `section_name` varchar(255) NOT NULL,
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
INSERT INTO `custom_paginations` VALUES (1,'Blog List',9,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(2,'Blog Comment',10,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(3,'Language List',100,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(4,'Media List',10,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(5,'Product List',9,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(6,'Workout List',9,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(7,'Trainer List',9,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(8,'Service List',9,'2024-11-22 23:04:07','2024-11-22 23:04:07'),(9,'Award List',6,'2024-11-22 23:04:07','2024-11-22 23:04:07');
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
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `email_templates`
--

LOCK TABLES `email_templates` WRITE;
/*!40000 ALTER TABLE `email_templates` DISABLE KEYS */;
INSERT INTO `email_templates` VALUES (1,'password_reset','Password Reset','<p>Dear {{user_name}},</p>\n                <p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(2,'contact_mail','Contact Email','<p>Hello there,</p>\n                <p>&nbsp;Mr. {{name}} has sent a new message. you can see the message details below.&nbsp;</p>\n                <p>Email: {{email}}</p>\n                <p>Phone: {{phone}}</p>\n                <p>Subject: {{subject}}</p>\n                <p>Message: {{message}}</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(3,'subscribe_notification','Subscribe Notification','<p>Hi there, Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you will not approve this link, you can not get any newsletter from us.</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(4,'user_verification','User Verification','<p>Dear {{user_name}},</p>\n                <p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(5,'approved_refund','Refund Request Approval','<p>Dear {{user_name}},</p>\n                <p>We are happy to say that, we have send {{refund_amount}} USD to your provided bank information. </p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(6,'new_refund','New Refund Request','<p>Hello websolutionus, </p>\n\n                <p>Mr. {{user_name}} has send a new refund request to you.</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(7,'pending_wallet_payment','Wallet Payment Approval','<p>Hello {{user_name}},</p>\n                <p>We have received your wallet payment request. we find your payment to our bank account.</p>\n                <p>Thanks &amp; Regards</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(8,'approved_withdraw','Withdraw Request Approval','<p>Dear {{user_name}},</p>\n                <p>We are happy to say that, we have send a withdraw amount to your provided bank information.</p>\n                <p>Thanks &amp; Regards</p>\n                <p>WebSolutionUs</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(9,'approved_withdraw','Withdraw Request Approval','<p>Dear {{user_name}},</p>\n                <p>We are happy to say that, we have send a withdraw amount to your provided bank information.</p>\n                <p>Thanks &amp; Regards</p>\n                <p>WebSolutionUs</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(10,'Order Successfully','Order Successfully','<p>Hi {{user_name}},</p>\n                <p> Thanks for your new order. Your order has been placed .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(11,'Admin Order Confirmation','New Order Confirmation - Order Placed','\n                <p>Hello Admin,</p>\n                <p>A new order has been successfully placed. Please find the details below:</p>\n                <p><strong>Total Amount:</strong> {{total_amount}}</p>\n                <p><strong>Payment Method:</strong> {{payment_method}}</p>\n                <p><strong>Payment Status:</strong> {{payment_status}}</p>\n                <p><strong>Order Status:</strong> {{order_status}}</p>\n                <p><strong>Order Date:</strong> {{order_date}}</p>\n                <p>Thank you for your attention.</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(12,'Order Cancel','Order Cancel','<p>Hi {{user_name}},</p>\n                <p> Your order has been canceled .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(13,'Order Delivery','Order Delivery','<p>Hi {{user_name}},</p>\n                <p> Your order has been delivered .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(14,'Payment Success','Payment Success','<p>Hi {{user_name}},</p>\n                <p> Your payment has been successfully completed .</p>\n                <p>Total Amount : {{total_amount}},</p>\n                <p>Payment Method : {{payment_method}},</p>\n                <p>Payment Status : {{payment_status}},</p>\n                <p>Order Status : {{order_status}},</p>\n                <p>Order Date: {{order_date}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(15,'Workout Enrolled','Workout Enrolled','<p>Hi {{user_name}},</p>\n                <p> You have successfully enrolled in the workout .</p>\n                <p>Workout Name : {{workout_name}},</p>\n                <p>Workout Date : {{workout_date}},</p>\n                <p>Workout Time : {{workout_time}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(16,'Member Registration','Member Registration','<p>Hi {{user_name}},</p>\n                <p> Your registration has been successfully completed .</p>\n                <p>Member ID : {{member_id}},</p>\n                <p>Member Name : {{member_name}},</p>\n                <p>Member Email : {{member_email}},</p>\n                <p>Member Password : {{member_password}},</p>\n                <p>Member Phone : {{member_phone}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(17,'Subscription Success','Subscription Success','<p>Hi {{user_name}},</p>\n                <p> Your subscription has been successfully completed .</p>\n                <p>Subscription Start Date:{{subscription_start_date}},</p>\n                <p>Subscription End Date:{{subscription_end_date}},</p>\n                <p>Subscription Name : {{subscription_name}},</p>\n                <p>Subscription Price : {{subscription_price}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(18,'Trial Subscription','Trial Subscription','<p>Hi {{user_name}},</p>\n                <p> Your trial subscription has been Started.</p>\n                <p>Trial Start Date:{{subscription_start_date}},</p>\n                <p>Trial End Date:{{subscription_end_date}}</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(19,'Assign Locker','Assign Locker','<p>Hi {{user_name}},</p>\n                <p> Your locker has been successfully assigned.</p>\n                <p>Locker ID : {{locker_no}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(20,'Locker Status Change','Locker Status Change','<p>Hi {{user_name}},</p>\n                <p> Your locker status has been successfully changed.</p>\n                <p>Locker ID : {{locker_no}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(21,'Remove Assign Locker','Remove Assign Locker','<p>Hi {{user_name}},</p>\n                <p> Your locker has been successfully removed.</p>\n                <p>Locker ID : {{locker_no}},</p>','2024-11-22 23:04:08','2024-11-22 23:04:08'),(22,'Subscription Expire','Subscription Expire','<p>Hi {{ user_name }},</p>\n<p>We hope you’ve been enjoying your subscription!</p>\n<p>This is a reminder that your subscription will expire soon.</p>\n<p><strong>Details:</strong></p>\n<ul>\n    <li><strong>Start Date:</strong> {{ subscription_start_date }}</li>\n    <li><strong>Renew Date:</strong> {{ subscription_renew_date }}</li>\n</ul>\n<p>To continue enjoying uninterrupted access to our services, please consider renewing your subscription before it expires.</p>\n<p>If you have already renewed, please disregard this email.</p>\n<p>Thank you for choosing our services!</p>\n<p>Best regards,</p>\n<p><strong>{{ app_name }}</strong></p>',NULL,NULL);
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
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` text,
  `description` text,
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
  `location` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `images` json DEFAULT NULL,
  `videos` json DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `registration_link` varchar(255) DEFAULT NULL,
  `organized_by` varchar(255) NOT NULL,
  `status` enum('draft','published','unpublished') NOT NULL DEFAULT 'draft',
  `contributors` json DEFAULT NULL,
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
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
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lang_code` varchar(255) NOT NULL,
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
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
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
  `lang_code` varchar(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `faq_translations`
--

LOCK TABLES `faq_translations` WRITE;
/*!40000 ALTER TABLE `faq_translations` DISABLE KEYS */;
INSERT INTO `faq_translations` VALUES (1,1,'en','How often should I exercise each week?','The ideal frequency of exercise depends on your fitness goals and current fitness level. For general health, the American Heart Association recommends at least 150 minutes of moderate-intensity aerobic exercise per week or 75 minutes of vigorous-intensity exercise, combined with muscle-strengthening activities on two or more days a week. ','2024-11-22 23:04:26','2024-11-22 23:04:26'),(2,2,'en','What is the best type of exercise for weight loss?','The most effective exercise for weight loss often combines both cardiovascular (cardio) and strength training. Cardio exercises like running, cycling, or swimming help burn calories and improve cardiovascular health. Strength training, such as weight lifting or bodyweight exercises, builds muscle, which in turn boosts your resting metabolic rate.','2024-11-22 23:04:26','2024-11-22 23:04:26'),(3,3,'en','How do I know if I’m drinking enough water?','A common guideline is to drink about 8 cups (64 ounces) of water a day, but individual needs can vary. To gauge if you’re well-hydrated, check the color of your urine—it should be light yellow. Darker urine can indicate dehydration. Other signs include feeling thirsty, dry mouth, or dizziness. If you\'re active or live in a hot climate, you may need to drink more. ','2024-11-22 23:04:26','2024-11-22 23:04:26'),(4,4,'en','What should I eat before and after a workout?','Before a Workout: Eat a balanced meal 1-3 hours before exercising. Focus on carbohydrates for energy and some protein for muscle support. Examples include oatmeal with fruit, a banana with peanut butter, or a yogurt parfait. Avoid heavy or greasy foods that might cause discomfort.Consume a meal or snack within 30-60 minutes post-exercise to aid recovery.','2024-11-22 23:04:27','2024-11-22 23:04:27'),(5,5,'en','How can I avoid injury while working out?','To avoid injury, prioritize proper form and technique in all exercises. Start with lighter weights or lower intensity to master the movements before progressing. Incorporate a warm-up before starting your workout and cool down afterward to prepare your muscles and help in recovery. Listen to your body—don’t push through pain. ','2024-11-22 23:04:27','2024-11-22 23:04:27'),(6,6,'en','How important is sleep for fitness?','Sleep is crucial for overall fitness and recovery. During sleep, the body repairs muscles, synthesizes proteins, and releases growth hormones. Inadequate sleep can impair your performance, hinder muscle growth, and increase the risk of injury. Aim for 7-9 hours of quality sleep per night to support optimal health and fitness. ','2024-11-22 23:04:27','2024-11-22 23:04:27'),(7,7,'en','Can I build muscle and lose fat at the same time?','Yes, it’s possible to build muscle and lose fat simultaneously, especially for beginners or those returning after a break. This process, known as body recomposition, involves a combination of resistance training and a carefully managed diet. To achieve this, focus on strength training to build muscle, maintain a slight caloric deficit .','2024-11-22 23:04:27','2024-11-22 23:04:27');
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
INSERT INTO `faqs` VALUES (1,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(2,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(3,1,'2024-11-22 23:04:26','2024-11-22 23:04:26'),(4,1,'2024-11-22 23:04:27','2024-11-22 23:04:27'),(5,1,'2024-11-22 23:04:27','2024-11-22 23:04:27'),(6,1,'2024-11-22 23:04:27','2024-11-22 23:04:27'),(7,1,'2024-11-22 23:04:27','2024-11-22 23:04:27');
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
  `name` varchar(255) NOT NULL,
  `type` enum('image','video') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `gallery_groups`
--

LOCK TABLES `gallery_groups` WRITE;
/*!40000 ALTER TABLE `gallery_groups` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `short_description` text,
  `description` longtext,
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
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
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle_1` varchar(255) DEFAULT NULL,
  `subtitle_2` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_page_slider_translations_home_page_slider_id_foreign` (`home_page_slider_id`),
  CONSTRAINT `home_page_slider_translations_home_page_slider_id_foreign` FOREIGN KEY (`home_page_slider_id`) REFERENCES `home_page_sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_page_slider_translations`
--

LOCK TABLES `home_page_slider_translations` WRITE;
/*!40000 ALTER TABLE `home_page_slider_translations` DISABLE KEYS */;
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
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `button_text` varchar(255) DEFAULT NULL,
  `button_icon` varchar(255) NOT NULL DEFAULT 'fab fa-whatsapp',
  `button_link` varchar(255) DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT '1',
  `home_page` tinyint NOT NULL,
  `order` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_page_sliders`
--

LOCK TABLES `home_page_sliders` WRITE;
/*!40000 ALTER TABLE `home_page_sliders` DISABLE KEYS */;
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
  `lang_code` varchar(255) NOT NULL,
  `about_us_title` varchar(255) DEFAULT NULL,
  `about_us_description` text,
  `pricing_title` varchar(255) DEFAULT NULL,
  `pricing_description` text,
  `about_us_inner_title` varchar(255) DEFAULT NULL,
  `about_us_sub_title` varchar(255) DEFAULT NULL,
  `about_us_description_list` json DEFAULT NULL,
  `about_us_button_text` varchar(255) DEFAULT NULL,
  `team_title` varchar(255) DEFAULT NULL,
  `team_button_text` varchar(255) DEFAULT NULL,
  `video_section_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_page_translations`
--

LOCK TABLES `home_page_translations` WRITE;
/*!40000 ALTER TABLE `home_page_translations` DISABLE KEYS */;
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
  `about_us_images` json DEFAULT NULL,
  `about_us_image` varchar(255) DEFAULT NULL,
  `about_us_bg_shape_1` varchar(255) DEFAULT NULL,
  `about_us_bg_shape_2` varchar(255) DEFAULT NULL,
  `about_us_button_link` varchar(255) DEFAULT NULL,
  `pricing_image` varchar(255) DEFAULT NULL,
  `team_bg_image` varchar(255) DEFAULT NULL,
  `team_button_link` varchar(255) DEFAULT NULL,
  `video_bg_image` varchar(255) DEFAULT NULL,
  `video_button_link` varchar(255) DEFAULT NULL,
  `video_button_icon` varchar(255) DEFAULT NULL,
  `testimonial_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `home_pages`
--

LOCK TABLES `home_pages` WRITE;
/*!40000 ALTER TABLE `home_pages` DISABLE KEYS */;
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
  `images` json NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `image_galleries`
--

LOCK TABLES `image_galleries` WRITE;
/*!40000 ALTER TABLE `image_galleries` DISABLE KEYS */;
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
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `direction` varchar(255) NOT NULL DEFAULT 'ltr',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `is_default` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_name_unique` (`name`),
  UNIQUE KEY `languages_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','en',NULL,'ltr','1','1','2024-11-22 23:04:06','2024-11-22 23:04:06');
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
  `name` varchar(255) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
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
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `locker_histories`
--

LOCK TABLES `locker_histories` WRITE;
/*!40000 ALTER TABLE `locker_histories` DISABLE KEYS */;
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
  `locker_no` varchar(255) NOT NULL,
  `availability` enum('available','occupied') NOT NULL DEFAULT 'available',
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `lockers`
--

LOCK TABLES `lockers` WRITE;
/*!40000 ALTER TABLE `lockers` DISABLE KEYS */;
INSERT INTO `lockers` VALUES (1,'L001','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,'L002','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,'L003','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,'L004','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(5,'L005','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(6,'L006','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(7,'L007','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(8,'L008','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(9,'L009','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(10,'L0010','available',1,1,1,NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25');
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
  `title` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `description` text,
  `height` int DEFAULT NULL,
  `width` int DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
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
  `payment_status` enum('pending','success','due') NOT NULL DEFAULT 'pending',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `member_subscriptions`
--

LOCK TABLES `member_subscriptions` WRITE;
/*!40000 ALTER TABLE `member_subscriptions` DISABLE KEYS */;
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
  `member_id` varchar(255) NOT NULL,
  `locker_no` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `height` int DEFAULT NULL COMMENT 'in cm',
  `weight` int DEFAULT NULL COMMENT 'in kg',
  `chest` int DEFAULT NULL COMMENT 'in inch',
  `referred_by` varchar(255) DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL COMMENT 'A+, A-, B+, B-, AB+, AB-, O+, O-',
  `phone` varchar(255) DEFAULT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `emergency_phone` varchar(255) DEFAULT NULL,
  `emergency_relation` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menu_item_translations`
--

LOCK TABLES `menu_item_translations` WRITE;
/*!40000 ALTER TABLE `menu_item_translations` DISABLE KEYS */;
INSERT INTO `menu_item_translations` VALUES (1,1,'en','Home','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,2,'en','About Us','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,3,'en','Pricing','2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,4,'en','Pages','2024-11-22 23:04:25','2024-11-22 23:04:25'),(5,5,'en','Contact Us','2024-11-22 23:04:25','2024-11-22 23:04:25'),(6,6,'en','Shop','2024-11-22 23:04:25','2024-11-22 23:04:25'),(7,7,'en','Services','2024-11-22 23:04:25','2024-11-22 23:04:25'),(8,8,'en','Trainers','2024-11-22 23:04:25','2024-11-22 23:04:25'),(9,9,'en','Workouts','2024-11-22 23:04:25','2024-11-22 23:04:25'),(10,10,'en','Photo Gallery','2024-11-22 23:04:25','2024-11-22 23:04:25'),(11,11,'en','Video Gallery','2024-11-22 23:04:25','2024-11-22 23:04:25'),(12,12,'en','Awards','2024-11-22 23:04:25','2024-11-22 23:04:25'),(13,13,'en','FAQ','2024-11-22 23:04:25','2024-11-22 23:04:25'),(14,14,'en','Privacy Policy','2024-11-22 23:04:25','2024-11-22 23:04:25'),(15,15,'en','Terms & Conditions','2024-11-22 23:04:25','2024-11-22 23:04:25'),(16,16,'en','Blog','2024-11-22 23:04:25','2024-11-22 23:04:25'),(17,17,'en','About Us','2024-11-22 23:04:25','2024-11-22 23:04:25'),(18,18,'en','Terms & Conditions','2024-11-22 23:04:25','2024-11-22 23:04:25'),(19,19,'en','Privacy Policy','2024-11-22 23:04:25','2024-11-22 23:04:25'),(20,20,'en','Services','2024-11-22 23:04:25','2024-11-22 23:04:25'),(21,21,'en','Pricing','2024-11-22 23:04:25','2024-11-22 23:04:25'),(22,22,'en','Workout','2024-11-22 23:04:25','2024-11-22 23:04:25'),(23,23,'en','Blog','2024-11-22 23:04:25','2024-11-22 23:04:25'),(24,24,'en','Contact Us','2024-11-22 23:04:25','2024-11-22 23:04:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,'Home','/',0,1,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,'About Us','/about-us',0,2,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,'Pricing','/membership',0,3,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,'Pages','#',0,4,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(5,'Contact Us','/contact',4,5,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(6,'Shop','/shop',4,6,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(7,'Services','/service',4,7,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(8,'Trainers','/trainer',4,8,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(9,'Workouts','/workout',4,9,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(10,'Photo Gallery','/image-gallery',4,10,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(11,'Video Gallery','/video-gallery',4,11,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(12,'Awards','/award',4,12,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(13,'FAQ','/faqs',4,13,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(14,'Privacy Policy','/privacy-policy',4,14,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(15,'Terms & Conditions','/terms-conditions',4,15,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(16,'Blog','/blogs',0,16,1,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(17,'About Us','/about-us',0,0,2,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(18,'Terms & Conditions','/terms-conditions',0,1,2,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(19,'Privacy Policy','/privacy-policy',0,2,2,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(20,'Services','/service',0,3,2,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(21,'Pricing','/membership',0,0,3,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(22,'Workout','/workout',0,1,3,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(23,'Blog','/blogs',0,2,3,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(24,'Contact Us','/contact',0,3,3,'2024-11-22 23:04:25','2024-11-22 23:04:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `menu_translations`
--

LOCK TABLES `menu_translations` WRITE;
/*!40000 ALTER TABLE `menu_translations` DISABLE KEYS */;
INSERT INTO `menu_translations` VALUES (1,1,'en','Main Menu','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,2,'en','Useful Link','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,3,'en','Support Desk','2024-11-22 23:04:25','2024-11-22 23:04:25');
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
INSERT INTO `menus` VALUES (1,'Main Menu','main-menu','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,'Useful Link','footer-1-menu','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,'Support Desk','footer-2-menu','2024-11-22 23:04:25','2024-11-22 23:04:25');
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
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_11_05_045432_create_admins_table',1),(6,'2023_11_05_114814_create_languages_table',1),(7,'2023_11_06_043247_create_settings_table',1),(8,'2023_11_06_054251_create_seo_settings_table',1),(9,'2023_11_06_094842_create_custom_paginations_table',1),(10,'2023_11_06_115856_create_email_templates_table',1),(11,'2023_11_07_051924_create_multi_currencies_table',1),(12,'2023_11_07_103108_create_basic_payments_table',1),(13,'2023_11_07_104315_create_blog_categories_table',1),(14,'2023_11_07_104328_create_blog_category_translations_table',1),(15,'2023_11_07_104336_create_blogs_table',1),(16,'2023_11_07_104343_create_blog_translations_table',1),(17,'2023_11_07_104546_create_blog_comments_table',1),(18,'2023_11_09_035236_create_payment_gateways_table',1),(19,'2023_11_09_100621_create_jobs_table',1),(20,'2023_11_12_052417_create_subscription_plans_table',1),(21,'2023_11_12_064847_create_subscription_histories_table',1),(22,'2023_11_16_035458_add_user_info_to_users',1),(23,'2023_11_16_061508_add_forget_info_to_users',1),(24,'2023_11_16_063639_add_phone_to_users',1),(25,'2023_11_19_055229_add_image_to_users',1),(26,'2023_11_19_064341_create_banned_histories_table',1),(27,'2023_11_21_043030_create_news_letters_table',1),(28,'2023_11_21_094702_create_contact_messages_table',1),(29,'2023_11_22_105539_create_permission_tables',1),(30,'2023_11_29_055540_create_orders_table',1),(31,'2023_11_29_095126_create_coupons_table',1),(32,'2023_11_29_104658_create_testimonials_table',1),(33,'2023_11_29_104704_create_testimonial_translations_table',1),(34,'2023_11_29_105234_create_coupon_histories_table',1),(35,'2023_11_30_041502_create_refund_requests_table',1),(36,'2023_11_30_044838_create_faqs_table',1),(37,'2023_11_30_044844_create_faq_translations_table',1),(38,'2023_11_30_095404_add_wallet_balance_to_users',1),(39,'2023_11_30_101249_create_wallet_histories_table',1),(40,'2023_12_03_052502_add_to_payment_status_wallet_histories',1),(41,'2023_12_04_071839_create_withraw_methods_table',1),(42,'2023_12_04_095319_create_withdraw_requests_table',1),(43,'2023_12_05_090256_create_our_teams_table',1),(44,'2024_01_01_054644_create_socialite_credentials_table',1),(45,'2024_01_03_092007_create_custom_codes_table',1),(46,'2024_01_06_110613_create_states_table',1),(47,'2024_01_06_110643_create_cities_table',1),(48,'2024_02_07_135537_create_contact_pages_table',1),(49,'2024_02_07_145716_create_contact_page_translations_table',1),(50,'2024_02_10_060044_create_configurations_table',1),(51,'2024_02_10_134337_create_pages_utilities_table',1),(52,'2024_02_10_134405_create_pages_utility_translations_table',1),(53,'2024_02_24_092128_add_map_column_to_contact_pages_table',1),(54,'2024_02_28_064128_add_forgot_info_to_admins',1),(55,'2024_02_29_084852_create_taxes_table',1),(56,'2024_03_02_105751_create_media_table',1),(57,'2024_03_04_062506_create_categories_table',1),(58,'2024_03_06_041659_create_specialists_table',1),(59,'2024_03_06_051704_create_trainers_table',1),(60,'2024_03_06_055051_create_members_table',1),(61,'2024_03_06_062121_create_lockers_table',1),(62,'2024_03_06_062435_create_attendances_table',1),(63,'2024_03_06_063355_create_workout_categories_table',1),(64,'2024_03_06_063856_create_tools_table',1),(65,'2024_03_06_064415_create_workouts_table',1),(66,'2024_03_06_071120_create_locations_table',1),(67,'2024_03_06_071146_create_workout_schedules_table',1),(68,'2024_03_06_104037_create_events_table',1),(69,'2024_03_06_105415_create_product_brands_table',1),(70,'2024_03_06_105424_create_products_table',1),(71,'2024_03_06_105447_create_product_attributes_table',1),(72,'2024_03_06_113019_create_facilities_table',1),(73,'2024_03_06_113313_create_gym_services_table',1),(74,'2024_03_07_081851_create_gym_service_translations_table',1),(75,'2024_03_07_081910_create_facility_translations_table',1),(76,'2024_03_07_081929_create_event_translations_table',1),(77,'2024_03_07_082007_create_location_translations_table',1),(78,'2024_03_07_082030_create_product_translations_table',1),(79,'2024_03_07_082045_create_product_brand_translations_table',1),(80,'2024_03_07_082104_create_product_category_translations_table',1),(81,'2024_03_07_082121_create_specialist_translations_table',1),(82,'2024_03_07_082140_create_tool_translations_table',1),(83,'2024_03_07_082158_create_workout_translations_table',1),(84,'2024_03_07_082224_create_workout_category_translations_table',1),(85,'2024_03_07_105225_create_attributes_table',1),(86,'2024_03_07_105405_create_product_categories_table',1),(87,'2024_03_07_105727_create_attribute_values_table',1),(88,'2024_03_07_111404_create_variants_table',1),(89,'2024_03_08_113747_create_workout_enrollments_table',1),(90,'2024_03_10_043027_create_subscription_options_table',1),(91,'2024_03_10_092529_create_locker_histories_table',1),(92,'2024_03_12_111630_create_member_subscriptions_table',1),(93,'2024_03_13_034051_create_payments_table',1),(94,'2024_03_28_095206_create_custom_addons_table',1),(95,'2024_03_28_095207_create_menus_wp_table',1),(96,'2024_03_28_095208_create_menu_translations_table',1),(97,'2024_03_28_095209_create_menu_items_wp_table',1),(98,'2024_03_28_095210_create_menu_item_translations_table',1),(99,'2024_04_04_071958_add_columns_to_products_table',1),(100,'2024_04_04_114745_create_order_details_table',1),(101,'2024_04_04_115619_create_related_products_table',1),(102,'2024_04_07_055856_create_variant_options_table',1),(103,'2024_04_07_063211_add_status_to_attributes_table',1),(104,'2024_04_21_060305_add_columns_to_orders_table',1),(105,'2024_04_21_070132_create_addresses_table',1),(106,'2024_04_24_091524_add_columns_to_users_table',1),(107,'2024_04_24_141358_create_shipping_methods_table',1),(108,'2024_04_25_074719_create_order_reviews_table',1),(109,'2024_05_07_041530_create_activities_table',1),(110,'2024_05_07_041613_create_activity_translations_table',1),(111,'2024_05_07_063114_add_user_type_column_to_users_table',1),(112,'2024_05_08_035219_create_classes_table',1),(113,'2024_05_08_040339_create_class_activities_table',1),(114,'2024_05_08_040735_create_class_trainers_table',1),(115,'2024_05_08_041045_create_workout_trainers_table',1),(116,'2024_05_08_115334_add_class_start_date_column_to_workouts_table',1),(117,'2024_05_09_050120_add_yearly_price_column_to_subscription_plans_table',1),(118,'2024_05_09_055050_add_free_trial_column_to_subscription_plans_table',1),(119,'2024_05_09_090616_add_columns_to_subscription_histories_table',1),(120,'2024_05_09_112213_add_invoice_id_column_to_subscription_histories_table',1),(121,'2024_05_12_041218_create_services_table',1),(122,'2024_05_12_041307_create_service_translations_table',1),(123,'2024_05_12_041904_create_service_faqs_table',1),(124,'2024_05_12_041951_create_service_faq_translations_table',1),(125,'2024_05_14_075441_create_awards_table',1),(126,'2024_05_15_062257_create_wishlists_table',1),(127,'2024_05_16_070511_create_image_galleries_table',1),(128,'2024_05_16_071655_create_gallery_groups_table',1),(129,'2024_05_16_102629_create_video_galleries_table',1),(130,'2024_05_19_093310_create_home_pages_table',1),(131,'2024_05_19_093347_create_home_page_translations_table',1),(132,'2024_05_19_093642_create_home_page_sliders_table',1),(133,'2024_05_19_093655_create_home_page_slider_translations_table',1),(134,'2024_05_19_110605_add_theme_column_to_home_page_sliders_table',1),(135,'2024_05_21_055741_create_partners_table',1),(136,'2024_05_21_074047_create_counters_table',1),(137,'2024_05_21_074146_create_counter_translations_table',1),(138,'2024_05_23_050404_create_abouts_table',1),(139,'2024_05_23_051514_create_about_translations_table',1),(140,'2024_05_27_045919_create_custom_pages_table',1),(141,'2024_05_27_050016_create_custom_page_translations_table',1),(142,'2024_06_05_070523_create_section_controls_table',1),(143,'2024_06_09_095312_create_section_contents_table',1),(144,'2024_06_09_095528_create_section_content_translations_table',1),(145,'2024_07_14_070356_create_website_utilities_table',1),(146,'2024_08_11_100217_create_workout_contacts_table',1),(147,'2024_10_08_034841_create_class_translations_table',1);
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
  `model_type` varchar(255) NOT NULL,
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
  `model_type` varchar(255) NOT NULL,
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
  `currency_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `is_default` varchar(255) NOT NULL,
  `currency_rate` decimal(8,2) NOT NULL,
  `currency_position` varchar(255) NOT NULL DEFAULT 'before_price',
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `multi_currencies`
--

LOCK TABLES `multi_currencies` WRITE;
/*!40000 ALTER TABLE `multi_currencies` DISABLE KEYS */;
INSERT INTO `multi_currencies` VALUES (1,'$-USD','US','USD','$','yes',1.00,'before_price','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(2,'₦-Naira','NG','NGN','₦','no',417.35,'before_price','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(3,'₹-Rupee','IN','INR','₹','no',74.66,'before_price','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(4,'₱-Peso','PH','PHP','₱','no',55.07,'before_price','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(5,'$-CAD','CA','CAD','$','no',1.27,'before_price','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(6,'৳-Taka','BD','BDT','৳','no',80.00,'before_price','active','2024-11-22 23:04:06','2024-11-22 23:04:06');
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
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not_verified',
  `verify_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `news_letters`
--

LOCK TABLES `news_letters` WRITE;
/*!40000 ALTER TABLE `news_letters` DISABLE KEYS */;
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
  `product_name` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `variant_id` varchar(255) DEFAULT NULL,
  `price` decimal(15,4) NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(15,4) NOT NULL,
  `attributes` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
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
  `comment` text,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  `order_id` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  `walk_in_customer` tinyint(1) DEFAULT NULL,
  `address_id` bigint unsigned DEFAULT NULL,
  `billing_id` bigint unsigned DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `order_delivery_date` date DEFAULT NULL,
  `payment_details` text,
  `payment_notes` text,
  `order_note` text,
  `total_amount` decimal(8,2) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `payment_status` enum('pending','success','rejected') NOT NULL DEFAULT 'pending',
  `order_status` enum('pending','success','rejected','cancelled') NOT NULL DEFAULT 'pending',
  `delivery_method` int NOT NULL DEFAULT '1' COMMENT '1- Delivery, 2- Pickup',
  `delivery_status` int NOT NULL DEFAULT '1' COMMENT '1- Pending, 2- Accept, 3- Progress, 4- On the way, 5- Delivered, 6- Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `order_amount` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `delivery_cancel_note` text,
  `currency_rate` double(8,2) NOT NULL DEFAULT '0.00',
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_icon` varchar(255) DEFAULT NULL,
  `invoice_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `facebook` text,
  `twitter` text,
  `linkedin` text,
  `instagram` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
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
  `footer_app_button_status` tinyint(1) NOT NULL DEFAULT '1',
  `login_image` varchar(255) DEFAULT NULL,
  `experience_image` varchar(255) DEFAULT NULL,
  `class_time_image` varchar(255) DEFAULT NULL,
  `cta_link` varchar(255) DEFAULT NULL,
  `cta_icon` varchar(255) DEFAULT NULL,
  `register_image` varchar(255) DEFAULT NULL,
  `forget_password_image` varchar(255) DEFAULT NULL,
  `reset_password_image` varchar(255) DEFAULT NULL,
  `ios_app_link` varchar(255) DEFAULT NULL,
  `android_app_link` varchar(255) DEFAULT NULL,
  `price_range` int DEFAULT '20000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `pages_utilities`
--

LOCK TABLES `pages_utilities` WRITE;
/*!40000 ALTER TABLE `pages_utilities` DISABLE KEYS */;
INSERT INTO `pages_utilities` VALUES (1,1,'uploads/custom-images/wsus-img-2024-06-06-11-29-23-2862.jpg',NULL,NULL,'callto:1234567890','fab fa-whatsapp','uploads/custom-images/wsus-img-2024-06-06-11-29-23-5244.jpg','uploads/custom-images/wsus-img-2024-06-06-11-29-23-6942.jpg','uploads/custom-images/wsus-img-2024-06-06-11-29-23-1272.jpg','#','#',2000,'2024-11-22 23:04:25','2024-11-22 23:04:25');
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
  `lang_code` varchar(5) NOT NULL,
  `footer_copyright` varchar(255) DEFAULT NULL,
  `cta_button` varchar(255) DEFAULT NULL,
  `app_download_now_text` varchar(255) DEFAULT NULL,
  `experience_title` varchar(255) DEFAULT NULL,
  `time_table_title` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `award_title` varchar(255) DEFAULT NULL,
  `faq_title` varchar(255) DEFAULT NULL,
  `membership_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_utility_translations_pages_utility_id_foreign` (`pages_utility_id`),
  CONSTRAINT `pages_utility_translations_pages_utility_id_foreign` FOREIGN KEY (`pages_utility_id`) REFERENCES `pages_utilities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `pages_utility_translations`
--

LOCK TABLES `pages_utility_translations` WRITE;
/*!40000 ALTER TABLE `pages_utility_translations` DISABLE KEYS */;
INSERT INTO `pages_utility_translations` VALUES (1,1,'en','Copyright 2024 Fitnes All Rights Reserved','Talk to a Specialist','Download Now',NULL,NULL,NULL,NULL,NULL,NULL,'2024-11-22 23:04:26','2024-11-22 23:04:26');
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
  `logo` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `payment_gateways`
--

LOCK TABLES `payment_gateways` WRITE;
/*!40000 ALTER TABLE `payment_gateways` DISABLE KEYS */;
INSERT INTO `payment_gateways` VALUES (1,'razorpay_key','rzp_test_cvrsy43xvBZfDT','2024-11-22 23:04:07','2024-11-22 23:04:07'),(2,'razorpay_secret','c9AmI4C5vOfSWmZehhlns5df','2024-11-22 23:04:07','2024-11-22 23:04:07'),(3,'razorpay_name','WebSolutionUs','2024-11-22 23:04:07','2024-11-22 23:04:07'),(4,'razorpay_description','This is test payment window','2024-11-22 23:04:07','2024-11-22 23:04:07'),(5,'razorpay_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(6,'razorpay_theme_color','#6d0ce4','2024-11-22 23:04:07','2024-11-22 23:04:07'),(7,'razorpay_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(8,'razorpay_currency_id','3','2024-11-22 23:04:07','2024-11-22 23:04:07'),(9,'razorpay_image','uploads/website-images/razorpay.jpeg','2024-11-22 23:04:07','2024-11-22 23:04:07'),(10,'flutterwave_public_key','FLWPUBK_TEST-6199046fedfadb3304d3726662040bf9-X','2024-11-22 23:04:07','2024-11-22 23:04:07'),(11,'flutterwave_secret_key','FLWSECK_TEST-44d4064c7b4e7d3a278a8b8e206b465b-X','2024-11-22 23:04:07','2024-11-22 23:04:07'),(12,'flutterwave_app_name','WebSolutionUs','2024-11-22 23:04:07','2024-11-22 23:04:07'),(13,'flutterwave_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(14,'flutterwave_currency_id','2','2024-11-22 23:04:07','2024-11-22 23:04:07'),(15,'flutterwave_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(16,'flutterwave_image','uploads/website-images/flutterwave.jpg','2024-11-22 23:04:07','2024-11-22 23:04:07'),(17,'paystack_public_key','pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38','2024-11-22 23:04:07','2024-11-22 23:04:07'),(18,'paystack_secret_key','sk_test_77cb93329abbdc18104466e694c9f720a7d69c97','2024-11-22 23:04:07','2024-11-22 23:04:07'),(19,'paystack_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(20,'paystack_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(21,'paystack_image','uploads/website-images/paystack.png','2024-11-22 23:04:07','2024-11-22 23:04:07'),(22,'paystack_currency_id','2','2024-11-22 23:04:07','2024-11-22 23:04:07'),(23,'mollie_key','test_PSkUJqktrsrnxjJnq4gnpfKjM722ms','2024-11-22 23:04:07','2024-11-22 23:04:07'),(24,'mollie_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(25,'mollie_image','uploads/website-images/mollie.png','2024-11-22 23:04:07','2024-11-22 23:04:07'),(26,'mollie_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(27,'mollie_currency_id','5','2024-11-22 23:04:07','2024-11-22 23:04:07'),(28,'instamojo_account_mode','Sandbox','2024-11-22 23:04:07','2024-11-22 23:04:07'),(29,'instamojo_api_key','test_ffc6f0ad486d6ae0ba9ca2f46da','2024-11-22 23:04:07','2024-11-22 23:04:07'),(30,'instamojo_auth_token','test_ded356ba75e1aaa80bdd8f438d7','2024-11-22 23:04:07','2024-11-22 23:04:07'),(31,'instamojo_charge','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(32,'instamojo_image','uploads/website-images/instamojo.png','2024-11-22 23:04:07','2024-11-22 23:04:07'),(33,'instamojo_currency_id','3','2024-11-22 23:04:07','2024-11-22 23:04:07'),(34,'instamojo_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07');
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
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'USD',
  `payment_type` enum('recurring','one-time') NOT NULL DEFAULT 'one-time',
  `payment_mode` enum('manual','automatic') NOT NULL DEFAULT 'manual',
  `payment_for` enum('subscription','workout','order') NOT NULL DEFAULT 'subscription',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
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
INSERT INTO `permissions` VALUES (1,'dashboard.view','admin','dashboard','2024-12-02 03:21:31','2024-12-02 03:21:31'),(2,'admin.profile.view','admin','admin profile','2024-12-02 03:21:31','2024-12-02 03:21:31'),(3,'admin.profile.edit','admin','admin profile','2024-12-02 03:21:31','2024-12-02 03:21:31'),(4,'admin.profile.update','admin','admin profile','2024-12-02 03:21:31','2024-12-02 03:21:31'),(5,'admin.profile.delete','admin','admin profile','2024-12-02 03:21:31','2024-12-02 03:21:31'),(6,'admin.view','admin','admin','2024-12-02 03:21:31','2024-12-02 03:21:31'),(7,'admin.create','admin','admin','2024-12-02 03:21:31','2024-12-02 03:21:31'),(8,'admin.store','admin','admin','2024-12-02 03:21:31','2024-12-02 03:21:31'),(9,'admin.edit','admin','admin','2024-12-02 03:21:31','2024-12-02 03:21:31'),(10,'admin.update','admin','admin','2024-12-02 03:21:31','2024-12-02 03:21:31'),(11,'admin.delete','admin','admin','2024-12-02 03:21:31','2024-12-02 03:21:31'),(12,'blog.category.view','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(13,'blog.category.create','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(14,'blog.category.translate','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(15,'blog.category.store','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(16,'blog.category.edit','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(17,'blog.category.update','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(18,'blog.category.delete','admin','blog category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(19,'product.category.view','admin','Product category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(20,'product.category.create','admin','Product category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(21,'product.category.translate','admin','Product category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(22,'product.category.store','admin','Product category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(23,'product.category.edit','admin','Product category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(24,'product.category.update','admin','Product category','2024-12-02 03:21:31','2024-12-02 03:21:31'),(25,'product.category.delete','admin','Product category','2024-12-02 03:21:32','2024-12-02 03:21:32'),(26,'product.attribute.view','admin','Product attribute','2024-12-02 03:21:32','2024-12-02 03:21:32'),(27,'product.attribute.create','admin','Product attribute','2024-12-02 03:21:32','2024-12-02 03:21:32'),(28,'product.attribute.store','admin','Product attribute','2024-12-02 03:21:32','2024-12-02 03:21:32'),(29,'product.attribute.edit','admin','Product attribute','2024-12-02 03:21:32','2024-12-02 03:21:32'),(30,'product.attribute.update','admin','Product attribute','2024-12-02 03:21:32','2024-12-02 03:21:32'),(31,'product.attribute.delete','admin','Product attribute','2024-12-02 03:21:32','2024-12-02 03:21:32'),(32,'product.brand.view','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(33,'product.brand.create','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(34,'product.brand.translate','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(35,'product.brand.store','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(36,'product.brand.edit','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(37,'product.brand.update','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(38,'product.brand.delete','admin','Product brand','2024-12-02 03:21:32','2024-12-02 03:21:32'),(39,'product.view','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(40,'product.create','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(41,'product.translate','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(42,'product.store','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(43,'product.edit','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(44,'product.update','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(45,'product.delete','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(46,'product.gallery','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(47,'product.gallery.update','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(48,'product.related.product.view','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(49,'product.related.product.update','admin','Product','2024-12-02 03:21:32','2024-12-02 03:21:32'),(50,'product.variant.view','admin','Product Variant','2024-12-02 03:21:32','2024-12-02 03:21:32'),(51,'product.variant.create','admin','Product Variant','2024-12-02 03:21:32','2024-12-02 03:21:32'),(52,'product.variant.store','admin','Product Variant','2024-12-02 03:21:32','2024-12-02 03:21:32'),(53,'product.variant.edit','admin','Product Variant','2024-12-02 03:21:33','2024-12-02 03:21:33'),(54,'product.variant.update','admin','Product Variant','2024-12-02 03:21:33','2024-12-02 03:21:33'),(55,'product.variant.delete','admin','Product Variant','2024-12-02 03:21:33','2024-12-02 03:21:33'),(56,'state.view','admin','State','2024-12-02 03:21:33','2024-12-02 03:21:33'),(57,'state.create','admin','State','2024-12-02 03:21:33','2024-12-02 03:21:33'),(58,'state.store','admin','State','2024-12-02 03:21:33','2024-12-02 03:21:33'),(59,'state.edit','admin','State','2024-12-02 03:21:33','2024-12-02 03:21:33'),(60,'state.update','admin','State','2024-12-02 03:21:33','2024-12-02 03:21:33'),(61,'state.delete','admin','State','2024-12-02 03:21:33','2024-12-02 03:21:33'),(62,'shipping.view','admin','Shipping','2024-12-02 03:21:33','2024-12-02 03:21:33'),(63,'shipping.create','admin','Shipping','2024-12-02 03:21:33','2024-12-02 03:21:33'),(64,'shipping.store','admin','Shipping','2024-12-02 03:21:33','2024-12-02 03:21:33'),(65,'shipping.edit','admin','Shipping','2024-12-02 03:21:33','2024-12-02 03:21:33'),(66,'shipping.update','admin','Shipping','2024-12-02 03:21:33','2024-12-02 03:21:33'),(67,'shipping.delete','admin','Shipping','2024-12-02 03:21:33','2024-12-02 03:21:33'),(68,'tax.view','admin','Tax','2024-12-02 03:21:33','2024-12-02 03:21:33'),(69,'tax.create','admin','Tax','2024-12-02 03:21:33','2024-12-02 03:21:33'),(70,'tax.store','admin','Tax','2024-12-02 03:21:33','2024-12-02 03:21:33'),(71,'tax.edit','admin','Tax','2024-12-02 03:21:33','2024-12-02 03:21:33'),(72,'tax.update','admin','Tax','2024-12-02 03:21:33','2024-12-02 03:21:33'),(73,'tax.delete','admin','Tax','2024-12-02 03:21:33','2024-12-02 03:21:33'),(74,'city.view','admin','City','2024-12-02 03:21:33','2024-12-02 03:21:33'),(75,'city.create','admin','City','2024-12-02 03:21:33','2024-12-02 03:21:33'),(76,'city.store','admin','City','2024-12-02 03:21:33','2024-12-02 03:21:33'),(77,'city.edit','admin','City','2024-12-02 03:21:34','2024-12-02 03:21:34'),(78,'city.update','admin','City','2024-12-02 03:21:34','2024-12-02 03:21:34'),(79,'city.delete','admin','City','2024-12-02 03:21:34','2024-12-02 03:21:34'),(80,'specialty.view','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(81,'specialty.create','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(82,'specialty.translate','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(83,'specialty.store','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(84,'specialty.edit','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(85,'specialty.update','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(86,'specialty.delete','admin','Specialty','2024-12-02 03:21:34','2024-12-02 03:21:34'),(87,'trainer.view','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(88,'trainer.create','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(89,'trainer.bulk.mail','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(90,'trainer.store','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(91,'trainer.edit','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(92,'trainer.update','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(93,'trainer.delete','admin','trainer','2024-12-02 03:21:34','2024-12-02 03:21:34'),(94,'workout.view','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(95,'workout.create','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(96,'workout.translate','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(97,'workout.store','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(98,'workout.edit','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(99,'workout.update','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(100,'workout.delete','admin','workout','2024-12-02 03:21:34','2024-12-02 03:21:34'),(101,'activity.view','admin','activity','2024-12-02 03:21:34','2024-12-02 03:21:34'),(102,'activity.create','admin','activity','2024-12-02 03:21:34','2024-12-02 03:21:34'),(103,'activity.translate','admin','activity','2024-12-02 03:21:34','2024-12-02 03:21:34'),(104,'activity.store','admin','activity','2024-12-02 03:21:35','2024-12-02 03:21:35'),(105,'activity.edit','admin','activity','2024-12-02 03:21:35','2024-12-02 03:21:35'),(106,'activity.update','admin','activity','2024-12-02 03:21:35','2024-12-02 03:21:35'),(107,'activity.delete','admin','activity','2024-12-02 03:21:35','2024-12-02 03:21:35'),(108,'class.view','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(109,'class.create','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(110,'class.translate','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(111,'class.store','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(112,'class.edit','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(113,'class.update','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(114,'class.delete','admin','Class','2024-12-02 03:21:35','2024-12-02 03:21:35'),(115,'gallery.group.view','admin','Gallery Group','2024-12-02 03:21:35','2024-12-02 03:21:35'),(116,'gallery.group.create','admin','Gallery Group','2024-12-02 03:21:35','2024-12-02 03:21:35'),(117,'gallery.group.store','admin','Gallery Group','2024-12-02 03:21:35','2024-12-02 03:21:35'),(118,'gallery.group.edit','admin','Gallery Group','2024-12-02 03:21:35','2024-12-02 03:21:35'),(119,'gallery.group.update','admin','Gallery Group','2024-12-02 03:21:35','2024-12-02 03:21:35'),(120,'gallery.group.delete','admin','Gallery Group','2024-12-02 03:21:35','2024-12-02 03:21:35'),(121,'gallery.image.view','admin','Gallery Image','2024-12-02 03:21:35','2024-12-02 03:21:35'),(122,'gallery.image.create','admin','Gallery Image','2024-12-02 03:21:35','2024-12-02 03:21:35'),(123,'gallery.image.store','admin','Gallery Image','2024-12-02 03:21:35','2024-12-02 03:21:35'),(124,'gallery.image.edit','admin','Gallery Image','2024-12-02 03:21:35','2024-12-02 03:21:35'),(125,'gallery.image.update','admin','Gallery Image','2024-12-02 03:21:35','2024-12-02 03:21:35'),(126,'gallery.image.delete','admin','Gallery Image','2024-12-02 03:21:35','2024-12-02 03:21:35'),(127,'gallery.video.view','admin','Gallery Video','2024-12-02 03:21:35','2024-12-02 03:21:35'),(128,'gallery.video.create','admin','Gallery Video','2024-12-02 03:21:36','2024-12-02 03:21:36'),(129,'gallery.video.store','admin','Gallery Video','2024-12-02 03:21:36','2024-12-02 03:21:36'),(130,'gallery.video.edit','admin','Gallery Video','2024-12-02 03:21:36','2024-12-02 03:21:36'),(131,'gallery.video.update','admin','Gallery Video','2024-12-02 03:21:36','2024-12-02 03:21:36'),(132,'gallery.video.delete','admin','Gallery Video','2024-12-02 03:21:36','2024-12-02 03:21:36'),(133,'service.view','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(134,'service.create','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(135,'service.translate','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(136,'service.store','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(137,'service.edit','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(138,'service.update','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(139,'service.delete','admin','Service','2024-12-02 03:21:36','2024-12-02 03:21:36'),(140,'service.message.view','admin','Service Message','2024-12-02 03:21:36','2024-12-02 03:21:36'),(141,'service.message.delete','admin','Service Message','2024-12-02 03:21:36','2024-12-02 03:21:36'),(142,'award.view','admin','Award','2024-12-02 03:21:36','2024-12-02 03:21:36'),(143,'award.create','admin','Award','2024-12-02 03:21:36','2024-12-02 03:21:36'),(144,'award.store','admin','Award','2024-12-02 03:21:36','2024-12-02 03:21:36'),(145,'award.edit','admin','Award','2024-12-02 03:21:36','2024-12-02 03:21:36'),(146,'award.update','admin','Award','2024-12-02 03:21:36','2024-12-02 03:21:36'),(147,'award.delete','admin','Award','2024-12-02 03:21:36','2024-12-02 03:21:36'),(148,'partner.view','admin','Partner','2024-12-02 03:21:36','2024-12-02 03:21:36'),(149,'partner.create','admin','Partner','2024-12-02 03:21:37','2024-12-02 03:21:37'),(150,'partner.store','admin','Partner','2024-12-02 03:21:37','2024-12-02 03:21:37'),(151,'partner.edit','admin','Partner','2024-12-02 03:21:37','2024-12-02 03:21:37'),(152,'partner.update','admin','Partner','2024-12-02 03:21:37','2024-12-02 03:21:37'),(153,'partner.delete','admin','Partner','2024-12-02 03:21:37','2024-12-02 03:21:37'),(154,'website.content.view','admin','Website Manage','2024-12-02 03:21:37','2024-12-02 03:21:37'),(155,'website.content.update','admin','Website Manage','2024-12-02 03:21:37','2024-12-02 03:21:37'),(156,'blog.view','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(157,'blog.create','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(158,'blog.translate','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(159,'blog.store','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(160,'blog.edit','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(161,'blog.update','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(162,'blog.delete','admin','blog','2024-12-02 03:21:37','2024-12-02 03:21:37'),(163,'blog.comment.view','admin','blog Comment','2024-12-02 03:21:37','2024-12-02 03:21:37'),(164,'blog.comment.reply','admin','blog Comment','2024-12-02 03:21:38','2024-12-02 03:21:38'),(165,'blog.comment.update','admin','blog Comment','2024-12-02 03:21:38','2024-12-02 03:21:38'),(166,'blog.comment.delete','admin','blog Comment','2024-12-02 03:21:38','2024-12-02 03:21:38'),(167,'role.view','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(168,'role.create','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(169,'role.store','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(170,'role.assign','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(171,'role.edit','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(172,'role.update','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(173,'role.delete','admin','role','2024-12-02 03:21:38','2024-12-02 03:21:38'),(174,'setting.view','admin','settings','2024-12-02 03:21:38','2024-12-02 03:21:38'),(175,'setting.update','admin','settings','2024-12-02 03:21:38','2024-12-02 03:21:38'),(176,'setting.system.view','admin','settings','2024-12-02 03:21:38','2024-12-02 03:21:38'),(177,'setting.system.update','admin','settings','2024-12-02 03:21:38','2024-12-02 03:21:38'),(178,'basic.payment.view','admin','basic payment','2024-12-02 03:21:38','2024-12-02 03:21:38'),(179,'basic.payment.update','admin','basic payment','2024-12-02 03:21:38','2024-12-02 03:21:38'),(180,'contact.message.view','admin','contact message','2024-12-02 03:21:38','2024-12-02 03:21:38'),(181,'contact.message.delete','admin','contact message','2024-12-02 03:21:38','2024-12-02 03:21:38'),(182,'currency.view','admin','currency','2024-12-02 03:21:38','2024-12-02 03:21:38'),(183,'currency.create','admin','currency','2024-12-02 03:21:38','2024-12-02 03:21:38'),(184,'currency.store','admin','currency','2024-12-02 03:21:39','2024-12-02 03:21:39'),(185,'currency.edit','admin','currency','2024-12-02 03:21:39','2024-12-02 03:21:39'),(186,'currency.update','admin','currency','2024-12-02 03:21:39','2024-12-02 03:21:39'),(187,'currency.delete','admin','currency','2024-12-02 03:21:39','2024-12-02 03:21:39'),(188,'counter.view','admin','counter','2024-12-02 03:21:39','2024-12-02 03:21:39'),(189,'counter.create','admin','counter','2024-12-02 03:21:39','2024-12-02 03:21:39'),(190,'counter.store','admin','counter','2024-12-02 03:21:39','2024-12-02 03:21:39'),(191,'counter.edit','admin','counter','2024-12-02 03:21:39','2024-12-02 03:21:39'),(192,'counter.update','admin','counter','2024-12-02 03:21:39','2024-12-02 03:21:39'),(193,'counter.delete','admin','counter','2024-12-02 03:21:39','2024-12-02 03:21:39'),(194,'media.view','admin','media','2024-12-02 03:21:39','2024-12-02 03:21:39'),(195,'customer.view','admin','customer','2024-12-02 03:21:39','2024-12-02 03:21:39'),(196,'customer.bulk.mail','admin','customer','2024-12-02 03:21:39','2024-12-02 03:21:39'),(197,'customer.update','admin','customer','2024-12-02 03:21:39','2024-12-02 03:21:39'),(198,'customer.delete','admin','customer','2024-12-02 03:21:39','2024-12-02 03:21:39'),(199,'member.list','admin','member','2024-12-02 03:21:39','2024-12-02 03:21:39'),(200,'member.view','admin','member','2024-12-02 03:21:39','2024-12-02 03:21:39'),(201,'member.create','admin','member','2024-12-02 03:21:39','2024-12-02 03:21:39'),(202,'member.bulk.mail','admin','member','2024-12-02 03:21:40','2024-12-02 03:21:40'),(203,'member.store','admin','member','2024-12-02 03:21:40','2024-12-02 03:21:40'),(204,'member.edit','admin','member','2024-12-02 03:21:40','2024-12-02 03:21:40'),(205,'member.update','admin','member','2024-12-02 03:21:40','2024-12-02 03:21:40'),(206,'member.delete','admin','member','2024-12-02 03:21:40','2024-12-02 03:21:40'),(207,'attendance.list','admin','Attendance','2024-12-02 03:21:40','2024-12-02 03:21:40'),(208,'attendance.create','admin','Attendance','2024-12-02 03:21:40','2024-12-02 03:21:40'),(209,'attendance.store','admin','Attendance','2024-12-02 03:21:40','2024-12-02 03:21:40'),(210,'attendance.update','admin','Attendance','2024-12-02 03:21:40','2024-12-02 03:21:40'),(211,'locker.list','admin','locker','2024-12-02 03:21:40','2024-12-02 03:21:40'),(212,'locker.view','admin','locker','2024-12-02 03:21:40','2024-12-02 03:21:40'),(213,'locker.create','admin','locker','2024-12-02 03:21:40','2024-12-02 03:21:40'),(214,'locker.store','admin','locker','2024-12-02 03:21:40','2024-12-02 03:21:40'),(215,'locker.edit','admin','locker','2024-12-02 03:21:41','2024-12-02 03:21:41'),(216,'locker.update','admin','locker','2024-12-02 03:21:41','2024-12-02 03:21:41'),(217,'locker.delete','admin','locker','2024-12-02 03:21:41','2024-12-02 03:21:41'),(218,'locker.assign','admin','locker','2024-12-02 03:21:41','2024-12-02 03:21:41'),(219,'language.view','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(220,'language.create','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(221,'language.store','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(222,'language.edit','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(223,'language.update','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(224,'language.delete','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(225,'language.translate','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(226,'language.single.translate','admin','language','2024-12-02 03:21:41','2024-12-02 03:21:41'),(227,'menu.view','admin','menu builder','2024-12-02 03:21:41','2024-12-02 03:21:41'),(228,'menu.create','admin','menu builder','2024-12-02 03:21:41','2024-12-02 03:21:41'),(229,'menu.store','admin','menu builder','2024-12-02 03:21:41','2024-12-02 03:21:41'),(230,'menu.edit','admin','menu builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(231,'menu.update','admin','menu builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(232,'menu.delete','admin','menu builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(233,'page.view','admin','page builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(234,'page.create','admin','page builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(235,'page.store','admin','page builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(236,'page.edit','admin','page builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(237,'page.update','admin','page builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(238,'page.delete','admin','page builder','2024-12-02 03:21:42','2024-12-02 03:21:42'),(239,'coupon.view','admin','Coupon','2024-12-02 03:21:42','2024-12-02 03:21:42'),(240,'coupon.create','admin','Coupon','2024-12-02 03:21:42','2024-12-02 03:21:42'),(241,'coupon.store','admin','Coupon','2024-12-02 03:21:42','2024-12-02 03:21:42'),(242,'coupon.edit','admin','Coupon','2024-12-02 03:21:43','2024-12-02 03:21:43'),(243,'coupon.update','admin','Coupon','2024-12-02 03:21:43','2024-12-02 03:21:43'),(244,'coupon.delete','admin','Coupon','2024-12-02 03:21:43','2024-12-02 03:21:43'),(245,'coupon.history','admin','Coupon','2024-12-02 03:21:43','2024-12-02 03:21:43'),(246,'order.view','admin','Order','2024-12-02 03:21:43','2024-12-02 03:21:43'),(247,'order.create','admin','Order','2024-12-02 03:21:43','2024-12-02 03:21:43'),(248,'order.store','admin','Order','2024-12-02 03:21:43','2024-12-02 03:21:43'),(249,'order.edit','admin','Order','2024-12-02 03:21:43','2024-12-02 03:21:43'),(250,'order.update','admin','Order','2024-12-02 03:21:44','2024-12-02 03:21:44'),(251,'order.delete','admin','Order','2024-12-02 03:21:44','2024-12-02 03:21:44'),(252,'order.assign','admin','Order','2024-12-02 03:21:44','2024-12-02 03:21:44'),(253,'order.history','admin','Order','2024-12-02 03:21:44','2024-12-02 03:21:44'),(254,'order.payment.history','admin','Order Payment History','2024-12-02 03:21:44','2024-12-02 03:21:44'),(255,'order.payment.update','admin','Order Payment History','2024-12-02 03:21:44','2024-12-02 03:21:44'),(256,'subscription.view','admin','subscription','2024-12-02 03:21:44','2024-12-02 03:21:44'),(257,'subscription.create','admin','subscription','2024-12-02 03:21:44','2024-12-02 03:21:44'),(258,'subscription.store','admin','subscription','2024-12-02 03:21:44','2024-12-02 03:21:44'),(259,'subscription.edit','admin','subscription','2024-12-02 03:21:45','2024-12-02 03:21:45'),(260,'subscription.update','admin','subscription','2024-12-02 03:21:45','2024-12-02 03:21:45'),(261,'subscription.delete','admin','subscription','2024-12-02 03:21:45','2024-12-02 03:21:45'),(262,'subscription.assign','admin','subscription','2024-12-02 03:21:45','2024-12-02 03:21:45'),(263,'subscription.option.view','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(264,'subscription.option.create','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(265,'subscription.option.store','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(266,'subscription.option.edit','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(267,'subscription.option.update','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(268,'subscription.option.delete','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(269,'subscription.option.assign','admin','subscription option','2024-12-02 03:21:45','2024-12-02 03:21:45'),(270,'payment.view','admin','payment','2024-12-02 03:21:45','2024-12-02 03:21:45'),(271,'payment.update','admin','payment','2024-12-02 03:21:45','2024-12-02 03:21:45'),(272,'newsletter.view','admin','newsletter','2024-12-02 03:21:46','2024-12-02 03:21:46'),(273,'newsletter.mail','admin','newsletter','2024-12-02 03:21:46','2024-12-02 03:21:46'),(274,'newsletter.delete','admin','newsletter','2024-12-02 03:21:46','2024-12-02 03:21:46'),(275,'testimonial.view','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(276,'testimonial.create','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(277,'testimonial.translate','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(278,'testimonial.store','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(279,'testimonial.edit','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(280,'testimonial.update','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(281,'testimonial.delete','admin','testimonial','2024-12-02 03:21:46','2024-12-02 03:21:46'),(282,'faq.view','admin','faq','2024-12-02 03:21:46','2024-12-02 03:21:46'),(283,'faq.create','admin','faq','2024-12-02 03:21:46','2024-12-02 03:21:46'),(284,'faq.translate','admin','faq','2024-12-02 03:21:46','2024-12-02 03:21:46'),(285,'faq.store','admin','faq','2024-12-02 03:21:46','2024-12-02 03:21:46'),(286,'faq.edit','admin','faq','2024-12-02 03:21:47','2024-12-02 03:21:47'),(287,'faq.update','admin','faq','2024-12-02 03:21:47','2024-12-02 03:21:47'),(288,'faq.delete','admin','faq','2024-12-02 03:21:47','2024-12-02 03:21:47'),(289,'addon.view','admin','Addons','2024-12-02 03:21:47','2024-12-02 03:21:47'),(290,'addon.install','admin','Addons','2024-12-02 03:21:47','2024-12-02 03:21:47'),(291,'addon.update','admin','Addons','2024-12-02 03:21:47','2024-12-02 03:21:47'),(292,'addon.status.change','admin','Addons','2024-12-02 03:21:47','2024-12-02 03:21:47'),(293,'addon.remove','admin','Addons','2024-12-02 03:21:47','2024-12-02 03:21:47');
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
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `options` json DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_brand_translations_product_brand_id_foreign` (`product_brand_id`),
  CONSTRAINT `product_brand_translations_product_brand_id_foreign` FOREIGN KEY (`product_brand_id`) REFERENCES `product_brands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_brand_translations`
--

LOCK TABLES `product_brand_translations` WRITE;
/*!40000 ALTER TABLE `product_brand_translations` DISABLE KEYS */;
INSERT INTO `product_brand_translations` VALUES (1,1,'en','Apple',NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,2,'en','Samsung',NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,3,'en','Huawei',NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,4,'en','Xiaomi',NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25'),(5,5,'en','Oppo',NULL,'2024-11-22 23:04:25','2024-11-22 23:04:25');
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_brands`
--

LOCK TABLES `product_brands` WRITE;
/*!40000 ALTER TABLE `product_brands` DISABLE KEYS */;
INSERT INTO `product_brands` VALUES (1,'apple','1','1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,'samsung','1','1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,'huawei','1','1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,'xiaomi','1','1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(5,'oppo','1','1','2024-11-22 23:04:25','2024-11-22 23:04:25');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_translations_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `product_category_translations_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_category_translations`
--

LOCK TABLES `product_category_translations` WRITE;
/*!40000 ALTER TABLE `product_category_translations` DISABLE KEYS */;
INSERT INTO `product_category_translations` VALUES (1,1,'en','Clothing','Clothing','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,2,'en','Shoes','Shoes','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,3,'en','Accessories','Accessories','2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,4,'en','Equipment','Equipment','2024-11-22 23:04:25','2024-11-22 23:04:25');
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` text,
  `description` longtext,
  `additional_information` longtext,
  `tags` json DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_translations_product_id_foreign` (`product_id`),
  CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product_translations`
--

LOCK TABLES `product_translations` WRITE;
/*!40000 ALTER TABLE `product_translations` DISABLE KEYS */;
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `images` json DEFAULT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_type` enum('fixed','percent') NOT NULL DEFAULT 'fixed',
  `cost_per_item` decimal(8,2) DEFAULT NULL,
  `has_variant` tinyint(1) NOT NULL DEFAULT '0',
  `stock` int NOT NULL DEFAULT '0',
  `stock_status` enum('in_stock','out_of_stock') NOT NULL DEFAULT 'in_stock',
  `is_warranty` tinyint(1) DEFAULT NULL,
  `warranty_duration` varchar(255) DEFAULT NULL,
  `is_returnable` tinyint(1) NOT NULL DEFAULT '0',
  `is_exchangeable` tinyint(1) NOT NULL DEFAULT '0',
  `is_refundable` tinyint(1) NOT NULL DEFAULT '0',
  `is_cod` tinyint(1) NOT NULL DEFAULT '0',
  `is_emi` tinyint(1) NOT NULL DEFAULT '0',
  `is_guest_checkout` tinyint(1) NOT NULL DEFAULT '0',
  `attributes` json DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
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
  `reasone` text NOT NULL,
  `account_information` text NOT NULL,
  `status` enum('pending','rejected','success') NOT NULL DEFAULT 'pending',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `related_products`
--

LOCK TABLES `related_products` WRITE;
/*!40000 ALTER TABLE `related_products` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
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
INSERT INTO `roles` VALUES (1,'Super Admin','admin','2024-12-02 03:21:30','2024-12-02 03:21:30');
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
  `lang_code` varchar(255) NOT NULL,
  `program_title` varchar(255) DEFAULT NULL,
  `pricing_title` varchar(255) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `products_title` varchar(255) DEFAULT NULL,
  `testimonial_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_content_translations_section_content_id_foreign` (`section_content_id`),
  CONSTRAINT `section_content_translations_section_content_id_foreign` FOREIGN KEY (`section_content_id`) REFERENCES `section_contents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `section_content_translations`
--

LOCK TABLES `section_content_translations` WRITE;
/*!40000 ALTER TABLE `section_content_translations` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `section_contents`
--

LOCK TABLES `section_contents` WRITE;
/*!40000 ALTER TABLE `section_contents` DISABLE KEYS */;
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
  `value` varchar(255) NOT NULL,
  `key` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=show, 0=hide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `section_controls`
--

LOCK TABLES `section_controls` WRITE;
/*!40000 ALTER TABLE `section_controls` DISABLE KEYS */;
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
  `page_name` varchar(255) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `seo_settings`
--

LOCK TABLES `seo_settings` WRITE;
/*!40000 ALTER TABLE `seo_settings` DISABLE KEYS */;
INSERT INTO `seo_settings` VALUES (1,'Home Page','Home || WebSolutionUS','Home || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(2,'About Page','About || WebSolutionUS','About || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(3,'Shop Page','Shop || WebSolutionUS','Shop || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(4,'Contact Page','Contact || WebSolutionUS','Contact || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(5,'Service Page','Service || WebSolutionUS','Service || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(6,'Blog Page','Blog Page || WebSolutionUS','Blog Page || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(7,'FAQ Page','FAQ Page || WebSolutionUS','FAQ Page || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(8,'Privacy & Policy Page','Privacy & Policy || WebSolutionUS','Privacy & Policy || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(9,'Terms & Condition Page','Terms & Condition || WebSolutionUS','Terms & Condition || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(10,'Workout Page','Workout || WebSolutionUS','Workout || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(11,'Trainer Page','Trainer || WebSolutionUS','Trainer || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(12,'Image Gallery Page','Image Gallery || WebSolutionUS','Image Gallery || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(13,'Video Gallery Page','Video Gallery || WebSolutionUS','Video Gallery || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(14,'Award Page','Award || WebSolutionUS','Award || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(15,'Pricing Page','Pricing || WebSolutionUS','Pricing || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(16,'Cart Page','Cart || WebSolutionUS','Cart || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(17,'Checkout Page','Checkout || WebSolutionUS','Checkout || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(18,'Payment Page','Payment || WebSolutionUS','Payment || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08'),(19,'Wishlist Page','Wishlist || WebSolutionUS','Payment || WebSolutionUS','2024-11-22 23:04:08','2024-11-22 23:04:08');
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
  `lang_code` varchar(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_faq_translations_service_faq_id_foreign` (`service_faq_id`),
  CONSTRAINT `service_faq_translations_service_faq_id_foreign` FOREIGN KEY (`service_faq_id`) REFERENCES `service_faqs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `short_description` text,
  `meta_title` text,
  `meta_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_translations_service_id_foreign` (`service_id`),
  CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `service_translations`
--

LOCK TABLES `service_translations` WRITE;
/*!40000 ALTER TABLE `service_translations` DISABLE KEYS */;
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `images` json DEFAULT NULL,
  `videos` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tags` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
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
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'home_theme','all','2024-11-22 23:04:06','2024-11-22 23:04:06'),(2,'app_name','WebSolutionUs','2024-11-22 23:04:06','2024-11-22 23:04:06'),(3,'version','2.2.0','2024-11-22 23:04:06','2024-11-22 23:04:06'),(4,'admin_logo','uploads/website-images/admin_logo.png','2024-11-22 23:04:06','2024-11-22 23:04:06'),(5,'logo','uploads/website-images/logo.png','2024-11-22 23:04:06','2024-11-22 23:04:06'),(6,'timezone','Asia/Dhaka','2024-11-22 23:04:06','2024-11-22 23:04:06'),(7,'admin_favicon','uploads/website-images/admin_favicon.png','2024-11-22 23:04:06','2024-11-22 23:04:06'),(8,'favicon','uploads/website-images/favicon.png','2024-11-22 23:04:06','2024-11-22 23:04:06'),(9,'invoice_logo','website/images/invoice_logo.png','2024-11-22 23:04:06','2024-11-22 23:04:06'),(10,'cookie_status','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(11,'border','normal','2024-11-22 23:04:06','2024-11-22 23:04:06'),(12,'corners','thin','2024-11-22 23:04:06','2024-11-22 23:04:06'),(13,'background_color','#184dec','2024-11-22 23:04:06','2024-11-22 23:04:06'),(14,'text_color','#fafafa','2024-11-22 23:04:06','2024-11-22 23:04:06'),(15,'border_color','#0a58d6','2024-11-22 23:04:06','2024-11-22 23:04:06'),(16,'btn_bg_color','#fffceb','2024-11-22 23:04:06','2024-11-22 23:04:06'),(17,'btn_text_color','#222758','2024-11-22 23:04:06','2024-11-22 23:04:06'),(18,'link','#','2024-11-22 23:04:06','2024-11-22 23:04:06'),(19,'link_text','More Info','2024-11-22 23:04:06','2024-11-22 23:04:06'),(20,'btn_text','Yes','2024-11-22 23:04:06','2024-11-22 23:04:06'),(21,'message','This website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only upon approval.','2024-11-22 23:04:06','2024-11-22 23:04:06'),(22,'copyright_text','this is copyright text','2024-11-22 23:04:06','2024-11-22 23:04:06'),(23,'recaptcha_site_key','6LeQCfwjAAAoKX9eg','2024-11-22 23:04:06','2024-11-22 23:04:06'),(24,'recaptcha_secret_key','6LeQCfwjAMsR','2024-11-22 23:04:06','2024-11-22 23:04:06'),(25,'recaptcha_status','inactive','2024-11-22 23:04:06','2024-11-22 23:04:06'),(26,'tawk_chat_link','chat_link','2024-11-22 23:04:06','2024-11-22 23:04:06'),(27,'tawk_status','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(28,'google_analytic_status','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(29,'google_analytic_id','google_analytic_id','2024-11-22 23:04:06','2024-11-22 23:04:06'),(30,'pixel_status','inactive','2024-11-22 23:04:06','2024-11-22 23:04:06'),(31,'pixel_app_id','pixel_app_id','2024-11-22 23:04:06','2024-11-22 23:04:06'),(32,'facebook_login_status','active','2024-11-22 23:04:06','2024-11-22 23:04:06'),(33,'facebook_app_id','facebook_app_id','2024-11-22 23:04:06','2024-11-22 23:04:06'),(34,'facebook_app_secret','facebook_app_secret','2024-11-22 23:04:06','2024-11-22 23:04:06'),(35,'facebook_redirect_url','facebook_redirect_url','2024-11-22 23:04:06','2024-11-22 23:04:06'),(36,'google_login_status','inactive','2024-11-22 23:04:06','2024-11-22 23:04:06'),(37,'gmail_client_id','google_client_id','2024-11-22 23:04:06','2024-11-22 23:04:06'),(38,'gmail_secret_id','google_secret_id','2024-11-22 23:04:06','2024-11-22 23:04:06'),(39,'gmail_redirect_url','google_redirect_url','2024-11-22 23:04:06','2024-11-22 23:04:06'),(40,'default_avatar','uploads/website-images/default-avatar.png','2024-11-22 23:04:06','2024-11-22 23:04:06'),(41,'breadcrumb_image','uploads/website-images/breadcrumb-image.jpg','2024-11-22 23:04:06','2024-11-22 23:04:06'),(42,'mail_host','smtp.mailtrap.io','2024-11-22 23:04:06','2024-11-22 23:04:06'),(43,'mail_sender_email','sender@gmail.com','2024-11-22 23:04:06','2024-11-22 23:04:06'),(44,'mail_username','58784e2a1e8e06','2024-11-22 23:04:06','2024-11-22 23:04:06'),(45,'mail_password','266052f6bf04bf','2024-11-22 23:04:06','2024-11-22 23:04:06'),(46,'mail_port','2525','2024-11-22 23:04:06','2024-11-22 23:04:06'),(47,'mail_encryption','tls','2024-11-22 23:04:07','2024-11-22 23:04:07'),(48,'mail_sender_name','WebSolutionUs','2024-11-22 23:04:07','2024-11-22 23:04:07'),(49,'contact_message_receiver_mail','receiver@gmail.com','2024-11-22 23:04:07','2024-11-22 23:04:07'),(50,'pusher_app_id','pusher_app_id','2024-11-22 23:04:07','2024-11-22 23:04:07'),(51,'pusher_app_key','pusher_app_key','2024-11-22 23:04:07','2024-11-22 23:04:07'),(52,'pusher_app_secret','pusher_app_secret','2024-11-22 23:04:07','2024-11-22 23:04:07'),(53,'pusher_app_cluster','pusher_app_cluster','2024-11-22 23:04:07','2024-11-22 23:04:07'),(54,'pusher_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(55,'club_point_rate','1','2024-11-22 23:04:07','2024-11-22 23:04:07'),(56,'club_point_status','active','2024-11-22 23:04:07','2024-11-22 23:04:07'),(57,'maintenance_mode','0','2024-11-22 23:04:07','2024-11-22 23:04:07'),(58,'maintenance_image','','2024-11-22 23:04:07','2024-11-22 23:04:07'),(59,'maintenance_title','Website Under maintenance','2024-11-22 23:04:07','2024-11-22 23:04:07'),(60,'maintenance_description','<p>We are currently performing maintenance on our website to<br>improve your experience. Please check back later.</p>','2024-11-22 23:04:07','2024-11-22 23:04:07'),(61,'last_update_date','2024-11-23 05:04:06','2024-11-22 23:04:07','2024-11-22 23:04:07'),(62,'is_queable','inactive','2024-11-22 23:04:07','2024-11-22 23:04:07'),(63,'primary_color','#eefb13','2024-11-22 23:04:07','2024-11-22 23:04:07'),(64,'secondary_color','#0e0e55','2024-11-22 23:04:07','2024-11-22 23:04:07'),(65,'common_color_one','#171718','2024-11-22 23:04:07','2024-11-22 23:04:07'),(66,'common_color_two','#bebec9','2024-11-22 23:04:07','2024-11-22 23:04:07'),(67,'common_color_three','#737382','2024-11-22 23:04:07','2024-11-22 23:04:07'),(68,'common_color_four','#eff0f3','2024-11-22 23:04:07','2024-11-22 23:04:07'),(69,'common_color_five','#272732','2024-11-22 23:04:07','2024-11-22 23:04:07'),(70,'common_color_six','#f5980c','2024-11-22 23:04:07','2024-11-22 23:04:07');
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
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fee` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `minimum_order` double DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `shipping_methods`
--

LOCK TABLES `shipping_methods` WRITE;
/*!40000 ALTER TABLE `shipping_methods` DISABLE KEYS */;
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
  `provider_name` varchar(255) NOT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `refresh_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `socialite_credentials`
--

LOCK TABLES `socialite_credentials` WRITE;
/*!40000 ALTER TABLE `socialite_credentials` DISABLE KEYS */;
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `specialist_translations_specialist_id_foreign` (`specialist_id`),
  CONSTRAINT `specialist_translations_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `specialist_translations`
--

LOCK TABLES `specialist_translations` WRITE;
/*!40000 ALTER TABLE `specialist_translations` DISABLE KEYS */;
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
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialists_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `specialists`
--

LOCK TABLES `specialists` WRITE;
/*!40000 ALTER TABLE `specialists` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
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
  `invoice_id` varchar(255) DEFAULT NULL,
  `subscription_plan_id` bigint unsigned NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `cancellation_reason` text,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `renewal_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subscription_type` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `subscription_histories`
--

LOCK TABLES `subscription_histories` WRITE;
/*!40000 ALTER TABLE `subscription_histories` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `subscription_options`
--

LOCK TABLES `subscription_options` WRITE;
/*!40000 ALTER TABLE `subscription_options` DISABLE KEYS */;
INSERT INTO `subscription_options` VALUES (1,1,'Option 1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,1,'Option 2','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,1,'Option 3','2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,1,'Option 4','2024-11-22 23:04:25','2024-11-22 23:04:25'),(5,1,'Option 5','2024-11-22 23:04:25','2024-11-22 23:04:25'),(6,2,'Option 1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(7,2,'Option 2','2024-11-22 23:04:25','2024-11-22 23:04:25'),(8,2,'Option 3','2024-11-22 23:04:25','2024-11-22 23:04:25'),(9,2,'Option 4','2024-11-22 23:04:25','2024-11-22 23:04:25'),(10,2,'Option 5','2024-11-22 23:04:25','2024-11-22 23:04:25'),(11,3,'Option 1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(12,3,'Option 2','2024-11-22 23:04:25','2024-11-22 23:04:25'),(13,3,'Option 3','2024-11-22 23:04:25','2024-11-22 23:04:25'),(14,3,'Option 4','2024-11-22 23:04:25','2024-11-22 23:04:25'),(15,3,'Option 5','2024-11-22 23:04:25','2024-11-22 23:04:25'),(16,4,'Access to Core Services','2024-11-22 23:04:27','2024-11-22 23:04:27'),(17,4,'Standard In-Person Support','2024-11-22 23:04:27','2024-11-22 23:04:27'),(18,4,'Access to Basic Resources','2024-11-22 23:04:27','2024-11-22 23:04:27'),(19,4,'Basic Practice Materials','2024-11-22 23:04:27','2024-11-22 23:04:27'),(20,4,'Regular Class Updates','2024-11-22 23:04:27','2024-11-22 23:04:27'),(21,4,'Basic Participant Management','2024-11-22 23:04:27','2024-11-22 23:04:27'),(22,5,'Access to Core Services','2024-11-22 23:04:27','2024-11-22 23:04:27'),(23,5,'Priority In-Person Support','2024-11-22 23:04:27','2024-11-22 23:04:27'),(24,5,'Expanded Resources','2024-11-22 23:04:27','2024-11-22 23:04:27'),(25,5,'Enhanced Practice Materials','2024-11-22 23:04:27','2024-11-22 23:04:27'),(26,5,'Priority Class Updates','2024-11-22 23:04:27','2024-11-22 23:04:27'),(27,5,'Training Workshops','2024-11-22 23:04:27','2024-11-22 23:04:27'),(28,5,'Locker Facility','2024-11-22 23:04:27','2024-11-22 23:04:27'),(29,6,'Access to Core Services','2024-11-22 23:04:27','2024-11-22 23:04:27'),(30,6,'Priority In-Person Support','2024-11-22 23:04:27','2024-11-22 23:04:27'),(31,6,'Exclusive Resources','2024-11-22 23:04:27','2024-11-22 23:04:27'),(32,6,'Advanced Practice Materials','2024-11-22 23:04:27','2024-11-22 23:04:27'),(33,6,'Early Access to New Classes','2024-11-22 23:04:27','2024-11-22 23:04:27'),(34,6,'Locker Facility','2024-11-22 23:04:27','2024-11-22 23:04:27');
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
  `plan_name` varchar(255) NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `yearly_price` decimal(8,2) DEFAULT NULL,
  `free_trial` int NOT NULL DEFAULT '0',
  `expiration_date` enum('daily','monthly','quarterly','half-yearly','yearly') NOT NULL DEFAULT 'daily',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `serial` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `subscription_plans`
--

LOCK TABLES `subscription_plans` WRITE;
/*!40000 ALTER TABLE `subscription_plans` DISABLE KEYS */;
INSERT INTO `subscription_plans` VALUES (1,'Basic Plan',100.00,NULL,0,'monthly',1,'1','2024-11-22 23:04:25','2024-11-22 23:04:25'),(2,'Standard Plan',200.00,NULL,0,'yearly',1,'2','2024-11-22 23:04:25','2024-11-22 23:04:25'),(3,'Premium Plan',300.00,NULL,0,'quarterly',1,'3','2024-11-22 23:04:25','2024-11-22 23:04:25'),(4,'Basic',100.00,1000.00,0,'monthly',1,'1','2024-11-22 23:04:27','2024-11-22 23:04:27'),(5,'Standard',200.00,2000.00,0,'monthly',1,'2','2024-11-22 23:04:27','2024-11-22 23:04:27'),(6,'Premium',300.00,3000.00,0,'monthly',1,'3','2024-11-22 23:04:27','2024-11-22 23:04:27');
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
  `name` varchar(255) NOT NULL,
  `rate` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
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
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonial_translations_lang_code_index` (`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `testimonial_translations`
--

LOCK TABLES `testimonial_translations` WRITE;
/*!40000 ALTER TABLE `testimonial_translations` DISABLE KEYS */;
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
  `image` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
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
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
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
  `slug` varchar(255) NOT NULL,
  `description` text,
  `hours_per_week` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `facebook_icon` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `twitter_icon` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `instagram_icon` varchar(255) DEFAULT NULL,
  `skills` json DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trainers_slug_unique` (`slug`),
  KEY `trainers_user_id_foreign` (`user_id`),
  KEY `trainers_specialty_id_foreign` (`specialty_id`),
  CONSTRAINT `trainers_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE,
  CONSTRAINT `trainers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `trainers`
--

LOCK TABLES `trainers` WRITE;
/*!40000 ALTER TABLE `trainers` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `is_banned` varchar(255) NOT NULL DEFAULT 'no',
  `verification_token` varchar(255) DEFAULT NULL,
  `forget_password_token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `wallet_balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `user_type` enum('trainer','member') NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `variant_options`
--

LOCK TABLES `variant_options` WRITE;
/*!40000 ALTER TABLE `variant_options` DISABLE KEYS */;
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
  `sku` varchar(255) DEFAULT NULL,
  `weight` decimal(10,3) NOT NULL DEFAULT '0.000',
  `weight_unit` varchar(255) DEFAULT 'kg',
  `origin` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `media_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `variants_sku_unique` (`sku`),
  KEY `variants_product_id_foreign` (`product_id`),
  CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `variants`
--

LOCK TABLES `variants` WRITE;
/*!40000 ALTER TABLE `variants` DISABLE KEYS */;
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
  `videos` json NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_galleries_group_id_foreign` (`group_id`),
  CONSTRAINT `video_galleries_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `gallery_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `video_galleries`
--

LOCK TABLES `video_galleries` WRITE;
/*!40000 ALTER TABLE `video_galleries` DISABLE KEYS */;
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
  `transaction_id` varchar(255) NOT NULL,
  `payment_gateway` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` enum('pending','success','rejected') NOT NULL DEFAULT 'pending',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
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
  `name` varchar(255) NOT NULL,
  `min_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `max_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_charge` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
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
  `method` varchar(255) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_charge` decimal(8,2) NOT NULL DEFAULT '0.00',
  `account_info` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `approved_date` varchar(255) DEFAULT NULL,
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
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
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
  `service_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_contacts`
--

LOCK TABLES `workout_contacts` WRITE;
/*!40000 ALTER TABLE `workout_contacts` DISABLE KEYS */;
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
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_enrollments`
--

LOCK TABLES `workout_enrollments` WRITE;
/*!40000 ALTER TABLE `workout_enrollments` DISABLE KEYS */;
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
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_trainers`
--

LOCK TABLES `workout_trainers` WRITE;
/*!40000 ALTER TABLE `workout_trainers` DISABLE KEYS */;
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
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` text,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workout_translations_workout_id_foreign` (`workout_id`),
  CONSTRAINT `workout_translations_workout_id_foreign` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workout_translations`
--

LOCK TABLES `workout_translations` WRITE;
/*!40000 ALTER TABLE `workout_translations` DISABLE KEYS */;
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
  `tool_id` json DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `images` json DEFAULT NULL,
  `videos` json DEFAULT NULL,
  `training_days` int DEFAULT NULL,
  `class_count` int DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `capacity` int NOT NULL DEFAULT '0',
  `enroll_start` date DEFAULT NULL,
  `enroll_end` date DEFAULT NULL,
  `class_start_date` date DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `workouts`
--

LOCK TABLES `workouts` WRITE;
/*!40000 ALTER TABLE `workouts` DISABLE KEYS */;
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

-- Dump completed on 2024-12-02 15:23:04
