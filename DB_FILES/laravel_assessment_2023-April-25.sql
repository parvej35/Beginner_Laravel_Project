-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 01:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_assessment`
--
CREATE DATABASE IF NOT EXISTS `laravel_assessment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel_assessment`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(2, '2023_02_14_232239_create_shortened_urls_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(3, '2023_02_15_011017_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(4, '2023_04_25_084742_create_users_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(5, '2023_04_25_084747_create_shortened_urls_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
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

--
-- Truncate table before insert `personal_access_tokens`
--

TRUNCATE TABLE `personal_access_tokens`;
-- --------------------------------------------------------

--
-- Table structure for table `shortened_urls`
--

DROP TABLE IF EXISTS `shortened_urls`;
CREATE TABLE `shortened_urls` (
  `id` int(10) UNSIGNED NOT NULL,
  `original_url` varchar(255) NOT NULL,
  `short_url` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `shortened_urls`
--

TRUNCATE TABLE `shortened_urls`;
--
-- Dumping data for table `shortened_urls`
--

INSERT INTO `shortened_urls` (`id`, `original_url`, `short_url`, `users_id`, `created_at`, `updated_at`) VALUES(1, 'https://laravel.com/docs/10.x/installation#getting-started-on-macos', 'https://tinyurl.com/2owgqcrp', 1, '2023-04-25 07:14:42', '2023-04-25 07:14:42');
INSERT INTO `shortened_urls` (`id`, `original_url`, `short_url`, `users_id`, `created_at`, `updated_at`) VALUES(2, 'https://www.global-tickets.com/de/Sportveranstaltungen/Motorsport/MotoGP/MotoGP-Portimao/MotoGP-Wochenend-Tickets-3-Tage-Portimao.html', 'https://tinyurl.com/2jajnfxc', 1, '2023-04-25 07:14:43', '2023-04-25 07:14:43');
INSERT INTO `shortened_urls` (`id`, `original_url`, `short_url`, `users_id`, `created_at`, `updated_at`) VALUES(3, 'https://www.hanze.nl/eng/education/engineering/institute-for-life-science--technology/programmes/master/data-science-for-life-sciences', 'https://tinyurl.com/2odlavhe', 1, '2023-04-25 07:14:43', '2023-04-25 07:14:43');
INSERT INTO `shortened_urls` (`id`, `original_url`, `short_url`, `users_id`, `created_at`, `updated_at`) VALUES(5, 'BBBBB', 'Error', 3, '2023-04-25 07:59:51', '2023-04-25 07:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES(1, 'Parvej Chowdhury', 'user1@mail.com', 'eyJpdiI6InU5S0RTN2Q3L1BySFgzMW1XNnl6WkE9PSIsInZhbHVlIjoiUXlDSUhNL1hBMXZramhJZXZxcWtzQT09IiwibWFjIjoiNzM4YmQ2ZTFlNjUzY2JkYmQxY2IxNWQ2MDcxYzhjNDEwMmNmNTE5YTU0NjI3M2JjZTgwMTAxOGE1MjA5NTk5YiIsInRhZyI6IiJ9', '2023-04-25 07:14:42', '2023-04-25 07:14:42');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES(2, 'Aiyan Chowdhury', 'user2@mail.com', 'eyJpdiI6IlBKeENRclBTS25PU2ovNXVJdmhqT2c9PSIsInZhbHVlIjoiZVk4dXZlWmlFWnRhRnhMb2I0T3FMdz09IiwibWFjIjoiYjVhZmU5Mjc3MjhkOGMwOTE1ZWE0ODY2NDAxYWI0YjU5NWRmZDczNTRkMWM4ZjRlYzI2MzUxMTgxMTNiMWNhZCIsInRhZyI6IiJ9', '2023-04-25 07:14:42', '2023-04-25 07:14:42');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES(3, 'Kanij Fatema', 'user3@mail.com', 'eyJpdiI6IlZEWEVYL042anJ4NDE4S3pIU0dBalE9PSIsInZhbHVlIjoiS3k1bklnL0g1L2FLQzFic0Fnd2JJUT09IiwibWFjIjoiN2M5YmUxNzI1ZDRhNTdkODUyN2ExOWJkZTYwNDhiNTAzNzg4NzA2NWM0NTk1OTJmY2JjNDIxNTg0NDRhOTJiNiIsInRhZyI6IiJ9', '2023-04-25 07:14:42', '2023-04-25 07:14:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
