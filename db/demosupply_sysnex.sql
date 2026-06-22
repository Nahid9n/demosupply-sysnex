-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2026 at 09:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demosupply_sysnex`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_image` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `status`, `is_image`, `created_at`, `updated_at`) VALUES
(1, 'Size', 'size', NULL, 0, '2025-11-22 10:53:11', '2025-11-22 10:56:25'),
(2, 'Color', 'color', NULL, 1, '2025-11-22 10:56:44', '2025-11-22 10:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_items`
--

CREATE TABLE `attribute_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_items`
--

INSERT INTO `attribute_items` (`id`, `attribute_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', 'm', NULL, '2025-11-22 10:53:44', '2025-11-22 10:53:44'),
(2, 1, 'L', 'l', NULL, '2025-11-22 10:53:50', '2025-11-22 10:53:50'),
(3, 1, 'XL', 'xl', NULL, '2025-11-22 10:56:03', '2025-11-22 10:56:03'),
(4, 2, 'Red', 'red', NULL, '2025-11-22 10:56:55', '2025-11-22 10:56:55'),
(5, 2, 'Green', 'green', NULL, '2025-11-22 10:57:03', '2025-11-22 10:57:03'),
(6, 2, 'White', 'white', NULL, '2025-11-22 10:57:13', '2025-11-22 10:57:13'),
(7, 2, 'Yellow', 'yellow', NULL, '2025-11-22 10:57:20', '2025-11-22 10:57:20'),
(10, 1, 's', NULL, NULL, '2025-11-24 11:56:27', '2025-11-24 11:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `is_show_home` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `category_name`, `file_url`, `is_show_home`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mens', 'Men\'s', 'uploads/category/1763826402_64eca91652a74-square.jpg', 0, 1, '2025-11-22 09:46:42', '2025-11-22 12:06:23'),
(2, 1, 'half-sleeve-t-shirt', 'Half Sleeve T-shirt', NULL, 0, 1, '2025-11-22 09:48:13', '2025-11-22 09:48:13'),
(3, 1, 'full-sleeve-t-shirt', 'Full Sleeve T-shirt', NULL, 0, 1, '2025-11-22 09:48:31', '2025-11-22 09:48:31'),
(4, 1, 'drop-shoulder-t-shirt', 'Drop Shoulder T-shirt', NULL, 0, 1, '2025-11-22 09:48:44', '2025-11-22 09:48:44'),
(5, 1, 'sports-t-shirt', 'Sports T-shirt', NULL, 0, 1, '2025-11-22 09:48:58', '2025-11-22 09:48:58'),
(6, 1, 'shirt', 'Shirt', NULL, 0, 1, '2025-11-22 09:49:10', '2025-11-22 09:49:10'),
(7, 1, 'underwear', 'Underwear', NULL, 0, 1, '2025-11-22 09:49:23', '2025-11-22 09:49:23'),
(8, 1, 'panjabi', 'Panjabi', NULL, 0, 1, '2025-11-22 09:49:34', '2025-11-22 09:49:34'),
(9, 1, 'denim-jeans', 'Denim Jeans', NULL, 0, 1, '2025-11-22 09:49:51', '2025-11-22 09:49:51'),
(10, 1, 'comfy-trouser', 'Comfy Trouser', NULL, 0, 1, '2025-11-22 09:50:05', '2025-11-22 09:50:05'),
(11, 1, 'sports-trouser', 'Sports Trouser', NULL, 0, 1, '2025-11-22 09:50:24', '2025-11-22 09:50:24'),
(12, 1, 'joggers', 'Joggers', NULL, 0, 1, '2025-11-22 09:50:37', '2025-11-22 09:50:37'),
(13, 1, 'hoodie', 'Hoodie', NULL, 0, 1, '2025-11-22 09:50:51', '2025-11-22 09:50:51'),
(14, 1, 'jacket', 'Jacket', NULL, 0, 1, '2025-11-22 09:51:07', '2025-11-22 09:51:07'),
(15, 1, 'shorts', 'Shorts', NULL, 0, 1, '2025-11-22 09:51:18', '2025-11-22 09:51:18'),
(16, NULL, 'womens', 'Womens', 'uploads/category/1763826721_Teen\'s Premium Tops - Zivara.webp', 0, 1, '2025-11-22 09:52:01', '2025-11-22 09:52:01'),
(17, 16, 'kurti-tunic-tops', 'Kurti, Tunic & Tops', NULL, 0, 1, '2025-11-22 09:52:16', '2025-11-22 09:52:16'),
(18, 16, 'teens-kurti-tunic-tops', 'Teens Kurti, Tunic & Tops', NULL, 0, 1, '2025-11-22 09:52:32', '2025-11-22 09:52:32'),
(19, 16, 't-shirt', 'T-Shirt', NULL, 0, 1, '2025-11-22 09:52:50', '2025-11-22 09:52:50'),
(20, 16, 'designer-pajamas', 'Designer Pajamas', NULL, 0, 1, '2025-11-22 09:53:08', '2025-11-22 09:53:08'),
(21, 16, 'pants', 'Pants', NULL, 0, 1, '2025-11-22 09:53:27', '2025-11-22 09:53:27'),
(22, 16, 'comfy-trouser-women', 'Comfy Trouser', NULL, 0, 1, '2025-11-22 09:55:18', '2025-11-22 09:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 3),
(2, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '0' COMMENT '1=800x800, 2=180x180, 3=1110x280',
  `file_original_name` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `file_original_name`, `file_url`, `user_id`, `created_at`, `updated_at`) VALUES
(29, '1', 'Girl Premium Frock - Merina', 'uploads/products/692496851533a_1000x1000.webp', 1, '2025-11-24 11:31:49', '2025-11-24 11:31:49'),
(30, '1', 'Girl Premium Frock - Anzarna', 'uploads/products/6924968579d73_1000x1000.webp', 1, '2025-11-24 11:31:49', '2025-11-24 11:31:49'),
(31, '1', 'Girl Premium Frock - Merina', 'uploads/products/69249685d7d3b_1000x1000.webp', 1, '2025-11-24 11:31:50', '2025-11-24 11:31:50'),
(32, '1', 'Kids Premium Jacket - Playard', 'uploads/products/692496864a7df_1000x1000.webp', 1, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(33, '1', 'Girl Premium Frock - Merina', 'uploads/products/6924968736293_1000x1000.webp', 1, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(34, '1', 'Kids Premium Jacket - Playard', 'uploads/products/6924968797d96_1000x1000.webp', 1, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(35, '1', 'Girl Premium Frock - Merina', 'uploads/products/692496887c820_1000x1000.webp', 1, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(36, '1', 'Kids Premium Jacket - Playard', 'uploads/products/69249688db8dd_1000x1000.webp', 1, '2025-11-24 11:31:53', '2025-11-24 11:31:53'),
(37, '1', 'Girl Premium Frock - Merina', 'uploads/products/69249689bc846_1000x1000.webp', 1, '2025-11-24 11:31:54', '2025-11-24 11:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2025_11_17_180450_create_permission_tables', 1),
(18, '2025_11_18_155218_create_web_settings_table', 1),
(20, '2025_11_22_074100_create_categories_table', 2),
(21, '2025_11_22_163245_create_attributes_table', 3),
(22, '2025_11_22_163341_create_attribute_items_table', 3),
(23, '2025_11_22_073157_create_products_table', 4),
(24, '2025_11_23_175823_create_media_table', 5),
(25, '2025_11_24_170750_create_product_variants_table', 6),
(26, '2025_11_24_170846_create_product_variant_items_table', 6),
(27, '2025_11_24_173056_create_category_products_table', 7),
(34, '2026_06_18_181856_create_messages_table', 8),
(36, '2026_06_20_185104_create_services_table', 9),
(37, '2026_06_20_190540_create_service_items_table', 9),
(38, '2026_06_20_190554_create_service_pricings_table', 9),
(39, '2026_06_20_190605_create_service_galleries_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(2, 'role.permission', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(3, 'role.permission.create', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(4, 'role.permission.store', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(5, 'role.permission.edit', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(6, 'role.permission.update', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(7, 'role.permission.delete', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(8, 'profile', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(9, 'settings', 'web', '2025-11-19 11:29:58', '2025-11-19 11:29:58'),
(10, 'reset.password', 'web', '2025-11-19 11:29:58', '2025-11-19 11:29:58'),
(11, 'user.list', 'web', '2025-11-19 11:29:58', '2025-11-19 11:29:58'),
(12, 'user.store', 'web', '2025-11-19 11:29:58', '2025-11-19 11:29:58'),
(13, 'user.update', 'web', '2025-11-19 11:29:58', '2025-11-19 11:29:58'),
(14, 'user.delete', 'web', '2025-11-19 11:29:58', '2025-11-19 11:29:58'),
(15, 'category.index', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(16, 'category.store', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(17, 'category.update', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(18, 'category.delete', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(19, 'product.index', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(20, 'product.create', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(21, 'product.store', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(22, 'product.edit', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(23, 'product.update', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(24, 'product.delete', 'web', '2025-11-22 09:45:20', '2025-11-22 09:45:20'),
(25, 'attribute.index', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(26, 'attribute.store', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(27, 'attribute.update', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(28, 'attribute.delete', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(29, 'attribute.item.store', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(30, 'attribute.item.update', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(31, 'attribute.item.delete', 'web', '2025-11-22 10:50:31', '2025-11-22 10:50:31'),
(32, 'service.list', 'web', '2026-06-20 12:49:10', '2026-06-20 12:49:10'),
(33, 'service.store', 'web', '2026-06-20 12:49:10', '2026-06-20 12:49:10'),
(34, 'service.update', 'web', '2026-06-20 12:49:10', '2026-06-20 12:49:10'),
(35, 'service.delete', 'web', '2026-06-20 12:49:10', '2026-06-20 12:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `thumb` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `gallery_images` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `regular_price` decimal(10,2) DEFAULT 0.00,
  `sale_price` decimal(10,2) DEFAULT 0.00,
  `purchase_price` decimal(10,2) DEFAULT 0.00,
  `is_package` int(11) DEFAULT NULL,
  `package_qty` int(11) DEFAULT NULL,
  `has_variant` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `related_products` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `thumb`, `image`, `gallery_images`, `stock`, `description`, `regular_price`, `sale_price`, `purchase_price`, `is_package`, `package_qty`, `has_variant`, `status`, `related_products`, `created_at`, `updated_at`) VALUES
(3, 'Kids', 'kids', '1254875', 29, 29, '30,31', 60, NULL, 500.00, 400.00, 600.00, 0, 1, 1, 1, NULL, '2025-11-24 11:31:50', '2025-12-15 11:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `variant` text DEFAULT NULL,
  `purchase_price` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `regular_price` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `sale_price` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `stock` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `sku`, `variant`, `purchase_price`, `regular_price`, `sale_price`, `stock`, `created_at`, `updated_at`) VALUES
(4, 3, '1254875-m-red', '1-4', 600.0000, 500.0000, 400.0000, 10, '2025-11-24 11:31:50', '2025-11-24 11:31:50'),
(5, 3, '1254875-m-white', '1-6', 600.0000, 500.0000, 400.0000, 10, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(6, 3, '1254875-l-red', '2-4', 600.0000, 500.0000, 400.0000, 10, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(7, 3, '1254875-l-white', '2-6', 600.0000, 500.0000, 400.0000, 10, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(8, 3, '1254875-xl-red', '3-4', 600.0000, 500.0000, 400.0000, 10, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(9, 3, '1254875-xl-white', '3-6', 600.0000, 500.0000, 400.0000, 10, '2025-11-24 11:31:53', '2025-11-24 11:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_items`
--

CREATE TABLE `product_variant_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_items`
--

INSERT INTO `product_variant_items` (`id`, `product_variant_id`, `attribute_id`, `attribute_item_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(7, 4, 1, 1, 'M', NULL, '2025-11-24 11:31:50', '2025-11-24 11:31:50'),
(8, 4, 2, 4, 'Red', 32, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(9, 5, 1, 1, 'M', NULL, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(10, 5, 2, 6, 'White', 33, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(11, 6, 1, 2, 'L', NULL, '2025-11-24 11:31:51', '2025-11-24 11:31:51'),
(12, 6, 2, 4, 'Red', 34, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(13, 7, 1, 2, 'L', NULL, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(14, 7, 2, 6, 'White', 35, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(15, 8, 1, 3, 'XL', NULL, '2025-11-24 11:31:52', '2025-11-24 11:31:52'),
(16, 8, 2, 4, 'Red', 36, '2025-11-24 11:31:53', '2025-11-24 11:31:53'),
(17, 9, 1, 3, 'XL', NULL, '2025-11-24 11:31:53', '2025-11-24 11:31:53'),
(18, 9, 2, 6, 'White', 37, '2025-11-24 11:31:54', '2025-11-24 11:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(2, 'admin', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(3, 'manager', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39'),
(4, 'user', 'web', '2025-11-18 10:08:39', '2025-11-18 10:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon_class` varchar(255) NOT NULL DEFAULT 'fa-solid fa-bolt',
  `phone` varchar(255) DEFAULT NULL,
  `whatsApp` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `hero_image` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `features_title` varchar(255) DEFAULT NULL,
  `pricing_title` varchar(255) DEFAULT NULL,
  `gallery_title` varchar(255) DEFAULT NULL,
  `faq_title` varchar(255) DEFAULT NULL,
  `faqs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`faqs`)),
  `cta_title` varchar(255) DEFAULT NULL,
  `cta_subtitle` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `icon_class`, `phone`, `whatsApp`, `status`, `hero_image`, `page_title`, `short_description`, `long_description`, `features_title`, `pricing_title`, `gallery_title`, `faq_title`, `faqs`, `cta_title`, `cta_subtitle`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Brent Baird', 'brent-baird', 'Reprehenderit rem a', '+1 (948) 168-4568', '248', 1, NULL, 'Ea ipsam non minim c', 'Nemo non explicabo', NULL, 'Dolorem nemo delectu', 'Consequatur Saepe d', 'Nulla error itaque d', 'Est culpa est qui it', '[{\"question\":\"Aut irure maxime bea\",\"answer\":\"Autem iusto et eos\"}]', 'Soluta nostrum dolor', 'Distinctio Architec', 'Eiusmod adipisci ver', 'Commodi vero ut aut', '2026-06-20 13:44:32', '2026-06-20 13:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_galleries`
--

CREATE TABLE `service_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `service_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Incidunt ducimus q', 'Nulla perferendis ni', '2026-06-20 13:44:32', '2026-06-20 13:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_pricings`
--

CREATE TABLE `service_pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `scope_name` varchar(255) NOT NULL,
  `estimated_rate` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_pricings`
--

INSERT INTO `service_pricings` (`id`, `service_id`, `scope_name`, `estimated_rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Eveniet quaerat nos', '272', '2026-06-20 13:44:32', '2026-06-20 13:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$pE8arh.OWm7wuqPGxZ.pze53Yebj7UWjrnVNzy/GesXIadH.8kD3S', 'uploads/profile/943454803.webp', 'fXbW4bNN5a9Rvm23Z8ItBaDmLaPmrpcg8tgTbuwacpRQd1qIp5JUKFvMCrn9', '2025-11-18 10:08:39', '2026-06-16 08:12:58'),
(3, 'Admin', 'test@gmail.com', '01761070654', NULL, '$2y$10$A/fUao2WQt9P255pvfDptuosZ015lkMz.WSqxP0aOiHa5h6Q8/G7y', 'uploads/profile/1761476359.jpg', 'cqOpV2aHLFyJSV09tmamJr10vZHIIVdTaFEHx2q2tY5s2AbBMJwnPRjc1KXp', '2025-11-19 11:27:27', '2025-11-19 12:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_title` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `favicon_logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `company_name`, `company_title`, `email`, `email_2`, `phone`, `phone_2`, `header_logo`, `footer_logo`, `favicon_logo`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Sysnex', 'Ecommerce Home', 'test@gmail.com', 'ecommerce@gmail.com', '+8801310993183', '014124585474', 'uploads/settings/1935751212.jpg', 'uploads/settings/380789046.png', 'uploads/settings/1434990033.png', 'Dubarchar Dokkhin , Kamarer Char , Dubarchar - 2100 , Sherpur sadar Sherpur', '2025-11-18 10:08:39', '2026-04-16 12:03:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_items`
--
ALTER TABLE `attribute_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `service_galleries`
--
ALTER TABLE `service_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_galleries_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_items_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_pricings`
--
ALTER TABLE `service_pricings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_pricings_service_id_foreign` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_items`
--
ALTER TABLE `attribute_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_galleries`
--
ALTER TABLE `service_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_pricings`
--
ALTER TABLE `service_pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_galleries`
--
ALTER TABLE `service_galleries`
  ADD CONSTRAINT `service_galleries_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_pricings`
--
ALTER TABLE `service_pricings`
  ADD CONSTRAINT `service_pricings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
