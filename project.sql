-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 08:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2022-08-15 00:38:05', '2022-08-15 00:38:05'),
(2, 'Color', '2022-08-15 00:38:14', '2022-08-15 00:38:14'),
(9, 'Gender', '2022-08-15 09:18:41', '2022-08-15 09:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', '2022-08-15 01:33:52', '2022-08-15 01:33:52'),
(2, 1, 'XL', '2022-08-15 01:34:47', '2022-08-15 01:34:47'),
(3, 1, 'XXL', '2022-08-15 01:34:53', '2022-08-15 02:04:04'),
(6, 2, 'Red', '2022-08-15 01:35:36', '2022-08-15 01:35:36'),
(7, 2, 'Yellow', '2022-08-15 01:35:40', '2022-08-15 01:35:40'),
(18, 1, '12 Inch', '2022-08-15 09:15:59', '2022-08-15 09:15:59'),
(19, 1, '10 Inch', '2022-08-15 09:16:05', '2022-08-15 09:16:05'),
(20, 9, 'Male', '2022-08-15 09:18:46', '2022-08-15 09:18:46'),
(21, 9, 'Female', '2022-08-15 09:18:54', '2022-08-15 09:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_08_15_054007_create_attributes_table', 1),
(4, '2022_08_15_070257_create_attribute_values_table', 2),
(5, '2022_08_15_104537_create_products_table', 3),
(6, '2022_08_15_115520_create_product_variants_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'T-shirt', '2022-08-15 04:51:24', '2022-08-15 04:51:24'),
(3, 'Shoes', '2022-08-15 04:53:25', '2022-08-15 04:53:25'),
(4, 'Screw Driver', '2022-08-15 04:53:35', '2022-08-15 04:53:35'),
(6, 'Cars', '2022-08-15 12:13:27', '2022-08-15 12:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variants` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `sku`, `variants`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(10, 1, 'tsirtMRed', '{\"Size\":\"M\",\"Color\":\"Red\",\"Gender\":\"Male\"}', '10', '100', '2022-08-15 09:19:27', '2022-08-15 09:19:27'),
(11, 1, 'tsirtMRedF', '{\"Size\":\"M\",\"Color\":\"Red\",\"Gender\":\"Female\"}', '10', '54', '2022-08-15 09:19:56', '2022-08-15 09:19:56'),
(12, 1, 'tsirtMYM', '{\"Size\":\"M\",\"Color\":\"Yellow\",\"Gender\":\"Male\"}', '10', '120', '2022-08-15 09:20:50', '2022-08-15 09:20:50'),
(13, 1, 'tsirtMYF', '{\"Size\":\"M\",\"Color\":\"Yellow\",\"Gender\":\"Female\"}', '10', '130', '2022-08-15 09:21:11', '2022-08-15 09:21:11'),
(14, 1, 'tsirtXLRed', '{\"Size\":\"XXL\",\"Color\":\"Red\",\"Gender\":\"Female\"}', '10', '110', '2022-08-15 09:21:49', '2022-08-15 11:52:06'),
(15, 3, 'shoe10Y', '{\"Size\":\"XL\",\"Color\":\"Yellow\",\"Gender\":\"Female\"}', '10', '140', '2022-08-15 09:55:56', '2022-08-15 09:55:56'),
(17, 4, 'screw12R', '{\"Size\":\"10 Inch\",\"Color\":\"Red\",\"Gender\":null}', '10', '60', '2022-08-15 11:52:57', '2022-08-15 11:54:39'),
(18, 4, 'screw12Y', '{\"Size\":\"XL\",\"Color\":\"Yellow\",\"Gender\":null}', '10', '50', '2022-08-15 11:55:08', '2022-08-15 11:55:08'),
(19, 6, 'carmy', '{\"Size\":\"XXL\",\"Color\":\"Yellow\",\"Gender\":null}', '10', '54', '2022-08-15 12:15:12', '2022-08-15 12:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_of_birth`, `city`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mahfuzur Rahman', 'mahfuj@gmail.com', '$2y$10$zahre/lwX9vD1PqjwcVoseyvi9pk1lJqRbpzWZrGF0OlFOY95Wx4W', '10/24/2002', 'mirpur', 'bangladesh', 1, '2022-08-13 13:12:32', '2022-08-15 12:08:32'),
(2, 'Rakib Hasan', 'rakib@gmail.com', '$2y$10$F4iryv3.cmjUR5ywzB4AqeRCVSEi/ftOtryxhxFrzdq2pqYdPj5c.', '08/05/2022', 'Uttara', 'Bangladesh', 1, '2022-08-13 23:11:43', '2022-08-14 23:39:09'),
(3, 'Hasan Milon', 'hasan@gmail.com', '$2y$10$rbHOfiGJhvTBw53A1gaPsOTmiVdzRngD4/Lh8fchQLOx41djU3Elu', '08/10/2022', 'Banani', 'Bangladesh', 0, '2022-08-13 23:13:01', '2022-08-14 02:12:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
