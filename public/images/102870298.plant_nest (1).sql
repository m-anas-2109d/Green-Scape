-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2023 at 03:28 PM
-- Server version: 5.7.40
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plant_nest`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

DROP TABLE IF EXISTS `accessories`;
CREATE TABLE IF NOT EXISTS `accessories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accessories_category_id_index` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessories_id` bigint(20) UNSIGNED NOT NULL,
  `plants_id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_accessories_id_index` (`accessories_id`),
  KEY `bills_plants_id_index` (`plants_id`),
  KEY `bills_orders_id_index` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

DROP TABLE IF EXISTS `checkouts`;
CREATE TABLE IF NOT EXISTS `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_registrations_id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `checkouts_user_registrations_id_index` (`user_registrations_id`),
  KEY `checkouts_orders_id_index` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_09_105251_create_categories_table', 1),
(6, '2023_08_09_102030_create_user_registrations_table', 1),
(7, '2023_08_09_105142_create_plants_table', 1),
(8, '2023_08_09_105200_create_accessories_table', 1),
(9, '2023_08_09_105219_create_orders_table', 1),
(10, '2023_08_09_105220_create_bills_table', 1),
(11, '2023_08_09_105229_create_checkouts_table', 1),
(12, '2023_08_09_112144_create_reviews_table', 1),
(13, '2023_08_09_112156_create_feedback_table', 1),
(14, '2023_08_09_125648_create_temp_verfies_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_registrations_id` bigint(20) UNSIGNED NOT NULL,
  `total_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_reg` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_registrations_id_index` (`user_registrations_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

DROP TABLE IF EXISTS `plants`;
CREATE TABLE IF NOT EXISTS `plants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `plant_genes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plants_categories_id_index` (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_registrations_id` bigint(20) UNSIGNED NOT NULL,
  `plants_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_registrations_id_index` (`user_registrations_id`),
  KEY `reviews_plants_id_index` (`plants_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_verfies`
--

DROP TABLE IF EXISTS `temp_verfies`;
CREATE TABLE IF NOT EXISTS `temp_verfies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_verfies`
--

INSERT INTO `temp_verfies` (`id`, `email`, `code`, `status`, `created_at`, `updated_at`) VALUES
(4, 'anus2109d@aptechgdn.net', '104928', NULL, '2023-08-09 09:47:49', '2023-08-09 09:47:49'),
(6, 'anus2109d@aptechgdn.net', '866685', NULL, '2023-08-09 09:58:24', '2023-08-09 09:58:24'),
(7, 'anus2109d@aptechgdn.net', '673759', NULL, '2023-08-09 10:12:13', '2023-08-09 10:12:13'),
(8, 'anus2109d@aptechgdn.net', '754331', NULL, '2023-08-09 10:14:37', '2023-08-09 10:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registrations`
--

DROP TABLE IF EXISTS `user_registrations`;
CREATE TABLE IF NOT EXISTS `user_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_registrations`
--

INSERT INTO `user_registrations` (`id`, `first_name`, `last_name`, `password`, `email`, `contact_no`, `role`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'def', NULL, '12345678', 'abc@gmail.com', 12345678, 0, 'abc', NULL, NULL),
(2, 'def', NULL, '12345678', 'abc@gmail.com', 12345678, 0, 'abc', NULL, NULL),
(3, 'memon', NULL, '123456', 'saimsachwany@gmail.com', 12233445, 1, 'abc', NULL, NULL),
(4, 'zahid', NULL, '123456', 'anus@gmail.com', 1122333, 1, 'abc', NULL, NULL),
(5, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:43:27', '2023-08-09 08:43:27'),
(6, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:43:57', '2023-08-09 08:43:57'),
(7, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:44:03', '2023-08-09 08:44:03'),
(8, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:44:23', '2023-08-09 08:44:23'),
(9, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:44:46', '2023-08-09 08:44:46'),
(10, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:46:00', '2023-08-09 08:46:00'),
(11, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:46:02', '2023-08-09 08:46:02'),
(12, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:46:11', '2023-08-09 08:46:11'),
(13, 'hgvbmb', NULL, '12345678', 'techgurus@aptechgdn.net', 234567, 0, NULL, '2023-08-09 08:46:47', '2023-08-09 08:46:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories`
--
ALTER TABLE `accessories`
  ADD CONSTRAINT `accessories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_accessories_id_foreign` FOREIGN KEY (`accessories_id`) REFERENCES `accessories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_plants_id_foreign` FOREIGN KEY (`plants_id`) REFERENCES `plants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkouts_user_registrations_id_foreign` FOREIGN KEY (`user_registrations_id`) REFERENCES `user_registrations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_registrations_id_foreign` FOREIGN KEY (`user_registrations_id`) REFERENCES `user_registrations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_plants_id_foreign` FOREIGN KEY (`plants_id`) REFERENCES `plants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_registrations_id_foreign` FOREIGN KEY (`user_registrations_id`) REFERENCES `user_registrations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
