/*
 Navicat Premium Data Transfer

 Source Server         : lokal
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : konveksi_ecommerce

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 16/10/2023 16:35:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titles` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `image` text NOT NULL,
  `slug` text NOT NULL,
  `tags` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `banner_image` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banners
-- ----------------------------
BEGIN;
INSERT INTO `banners` (`id`, `name`, `banner_image`, `description`, `slug`, `status`, `link`, `created_at`, `updated_at`) VALUES (1, 'Barrett Gonzalez', 'http://127.0.0.1:8000/storage/image/banner/2023/1696987674_Screen Shot 2023-09-18 at 11.58.26.png', 'Accusamus modi a vel', 'barrett-gonzalez', 1, 'Delectus Nam ex par', '2023-10-11 01:27:54', '2023-10-11 01:43:55');
COMMIT;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `name`, `image`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES (2, 'Rose Hart', 'http://localhost/storage/image/category/2023/1696909541_1.png', 'produk', NULL, '2023-10-10 03:45:41', '2023-10-10 03:45:41');
INSERT INTO `categories` (`id`, `name`, `image`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES (3, 'Denise Cardenas', 'http://localhost/storage/image/category/2023/1696910162_Untitled.png', 'artikel', NULL, '2023-10-10 03:56:02', '2023-10-10 03:56:02');
INSERT INTO `categories` (`id`, `name`, `image`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES (4, 'Ulla Hines', 'http://127.0.0.1:8000/storage/image/category/2023/1696911804_0753v8gzxcjm.png', 'artikel', NULL, '2023-10-10 03:58:19', '2023-10-10 04:23:24');
INSERT INTO `categories` (`id`, `name`, `image`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES (5, 'Ulla Hines', 'http://127.0.0.1:8000/storage/image/category/2023/1696911081_idea.png', 'artikel', NULL, '2023-10-10 04:11:21', '2023-10-10 04:11:21');
INSERT INTO `categories` (`id`, `name`, `image`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES (6, 'kaos', 'http://127.0.0.1:8000/storage/image/category/2023/1696917757_main-qimg-1d14cde9591ce927caa56b121732230e.jpeg', 'produk', NULL, '2023-10-10 06:02:37', '2023-10-10 06:02:37');
COMMIT;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clients
-- ----------------------------
BEGIN;
INSERT INTO `clients` (`id`, `name`, `logo`, `address`, `link`, `created_at`, `updated_at`) VALUES (1, 'Cora Stephens 123', 'http://127.0.0.1:8000/storage/image/company_profile/logo-client/2023/1697429535_WhatsApp Image 2023-10-14 at 5.33.11 PM (1).jpeg', 'Voluptas laborum nis 45', 'Consequat Laboris v', '2023-10-16 04:12:15', '2023-10-16 04:26:20');
INSERT INTO `clients` (`id`, `name`, `logo`, `address`, `link`, `created_at`, `updated_at`) VALUES (2, 'Christine Abbott', 'http://127.0.0.1:8000/storage/image/company_profile/logo-client/2023/1697429751_WhatsApp Image 2023-10-15 at 5.57.36 AM.jpeg', 'Occaecat facilis et', 'Laborum Laborum Be', '2023-10-16 04:15:51', '2023-10-16 04:15:51');
COMMIT;

-- ----------------------------
-- Table structure for detail_company
-- ----------------------------
DROP TABLE IF EXISTS `detail_company`;
CREATE TABLE `detail_company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `link_fb` varchar(255) NOT NULL,
  `link_ig` varchar(255) NOT NULL,
  `link_tiktok` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of detail_company
-- ----------------------------
BEGIN;
INSERT INTO `detail_company` (`id`, `name`, `tagline`, `description`, `image`, `link`, `address`, `link_fb`, `link_ig`, `link_tiktok`, `phone`, `email`, `logo`, `created_at`, `updated_at`) VALUES (1, 'Webiin siap menjadi Layanan andalan ', 'maju sukses selalu', 'Minuman yang terbuat dari aloe vera dengan rasa nanas', 'http://127.0.0.1:8000/storage/image/company_profile/2023/1697247205_google.jpg', 'https://maps.app.goo.gl/99DoZyTmqTjejdZVA', 'RUKO PURI KENDEDES BLOK A1 KAV 3 SINGOSARI', 'https://maps.app.goo.gl/99DoZyTmqTjejdZVA', 'https://maps.app.goo.gl/99DoZyTmqTjejdZVA', 'https://maps.app.goo.gl/99DoZyTmqTjejdZVA', '085729334303', 'mana@gmail.com', 'http://127.0.0.1:8000/storage/image/company_profile/logo/2023/1697247205_LOGO-UGM-BAKU-tnp-back-grou.png', '2023-10-14 01:33:25', '2023-10-14 01:33:25');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2023_10_04_060214_create_products_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2023_10_04_060352_create_product_images_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2023_10_04_060437_create_categories_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2023_10_04_060550_create_transactions_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2023_10_04_061024_create_transaction_details_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2023_10_04_061454_create_banners_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2023_10_04_061631_create_articles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2023_10_13_083248_add_address_user', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14, '2023_10_13_155927_create_detail_company_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15, '2023_10_13_160230_create_clients_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16, '2023_10_13_160413_create_portofolios_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17, '2023_10_16_044629_create_permission_tables', 5);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'oke', 'web', '2023-10-16 07:06:51', '2023-10-16 07:06:51');
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for portofolios
-- ----------------------------
DROP TABLE IF EXISTS `portofolios`;
CREATE TABLE `portofolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of portofolios
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
BEGIN;
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (1, 2, 'http://127.0.0.1:8000/storage/image/product_imagess/2023/1696917938_training.jpg', NULL, '2023-10-10 06:05:38', '2023-10-10 06:05:38');
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (2, 3, 'http://127.0.0.1:8000/storage/image/product_imagess/2023/1696917976_pawel-czerwinski-fpZZEV0uQwA-unsplash.jpg', NULL, '2023-10-10 06:06:16', '2023-10-10 06:06:16');
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (3, 3, 'http://127.0.0.1:8000/storage/image/product_imagess/2023/1696917976_seo.jpg', NULL, '2023-10-10 06:06:16', '2023-10-10 06:06:16');
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (4, 1, 'http://127.0.0.1:8000/storage/image/product_imagess/2023/1696917976_seo.jpg', NULL, '2023-10-11 09:36:06', '2023-10-11 09:36:09');
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (5, 4, 'http://127.0.0.1:8000/storage/image/product_imagess/2023/1697250837_main-qimg-1d14cde9591ce927caa56b121732230e.jpeg', NULL, '2023-10-14 02:33:57', '2023-10-14 02:33:57');
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (6, 4, 'http://127.0.0.1:8000/storage/image/product_imagess/2023/1697250837_outbound-hadena-indonesia-experience-1024x723.jpeg', NULL, '2023-10-14 02:33:57', '2023-10-14 02:33:57');
INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES (7, 4, 'http://127.0.0.1:8000/storage/', NULL, '2023-10-14 02:33:57', '2023-10-14 02:33:57');
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `weight` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` (`id`, `title`, `category_id`, `available_qty`, `price`, `slug`, `description`, `weight`, `deleted_at`, `created_at`, `updated_at`) VALUES (1, 'Assumenda qui molest', 6, 347, 731, 'a-assumenda-qui-molest', 'Et sit qui officia', 21.00, NULL, '2023-10-10 06:05:12', '2023-10-10 06:05:12');
INSERT INTO `products` (`id`, `title`, `category_id`, `available_qty`, `price`, `slug`, `description`, `weight`, `deleted_at`, `created_at`, `updated_at`) VALUES (2, 'Assumenda qui molest', 6, 347, 731, 'Assumenda-qui-molest', 'Et sit qui officia', 21.00, NULL, '2023-10-10 06:05:38', '2023-10-10 06:05:38');
INSERT INTO `products` (`id`, `title`, `category_id`, `available_qty`, `price`, `slug`, `description`, `weight`, `deleted_at`, `created_at`, `updated_at`) VALUES (3, 'Magna dolor veniam', 6, 402, 483, 'magna-dolor-veniam', 'Dolore in atque esse', 47.00, NULL, '2023-10-10 06:06:16', '2023-10-10 06:06:16');
INSERT INTO `products` (`id`, `title`, `category_id`, `available_qty`, `price`, `slug`, `description`, `weight`, `deleted_at`, `created_at`, `updated_at`) VALUES (4, 'Voluptatum dolore of', 2, 396, 693, 'voluptatum-dolore-of', 'Aute dolore tempora', 74.00, NULL, '2023-10-14 02:33:56', '2023-10-14 02:33:56');
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'mitra', 'web', '2023-10-16 06:51:31', '2023-10-16 06:51:31');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (2, 'stockis', 'web', '2023-10-16 06:51:54', '2023-10-16 06:51:54');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (3, 'admin', 'web', '2023-10-16 06:52:02', '2023-10-16 06:52:02');
COMMIT;

-- ----------------------------
-- Table structure for transaction_details
-- ----------------------------
DROP TABLE IF EXISTS `transaction_details`;
CREATE TABLE `transaction_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_subtotal` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of transaction_details
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `va_number` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_url` varchar(255) NOT NULL,
  `payment_token` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of transactions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('super admin','admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `subdistrict_id` int(11) NOT NULL,
  `postcode` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `province_id`, `city_id`, `subdistrict_id`, `postcode`, `address`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'nanang', 'nanang@gmail.com', 'user', NULL, '$2y$10$4Hc2nPajbCI70tAzbSaTl.UUX1pAapNX3hzdVSJ7S4M541T02It7G', 0, 0, 0, 0, '', '', NULL, '2023-10-06 06:25:21', '2023-10-06 06:25:21');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
