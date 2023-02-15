-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2023 at 08:01 PM
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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_14_232239_create_shortened_urls_table', 1),
(3, '2023_02_15_011017_create_users_table', 1);

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
-- Table structure for table `shortened_urls`
--

CREATE TABLE `shortened_urls` (
  `id` int(10) UNSIGNED NOT NULL,
  `original_url` varchar(255) NOT NULL,
  `short_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shortened_urls`
--

INSERT INTO `shortened_urls` (`id`, `original_url`, `short_url`, `created_at`, `updated_at`) VALUES
(6, 'https://laravel.com/docs/10.x/installation#getting-started-on-macos', 'https://tinyurl.com/2owgqcrp', '2023-02-15 16:13:36', '2023-02-15 16:13:36'),
(7, 'https://www.global-tickets.com/de/Sportveranstaltungen/Motorsport/MotoGP/MotoGP-Portimao/MotoGP-Wochenend-Tickets-3-Tage-Portimao.html', 'https://tinyurl.com/2jajnfxc', '2023-02-15 16:13:36', '2023-02-15 16:13:36'),
(8, 'https://www.hanze.nl/eng/education/engineering/institute-for-life-science--technology/programmes/master/data-science-for-life-sciences', 'https://tinyurl.com/2odlavhe', '2023-02-15 16:13:36', '2023-02-15 16:13:36'),
(9, 'https://laravel.com/docs/10.x/installation#getting-started-on-macos', 'https://tinyurl.com/2owgqcrp', '2023-02-15 16:14:08', '2023-02-15 17:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Parvej Chowdhury', 'user1@mail.com', 'eyJpdiI6IkRzcSt3YWdBUHpnODU1Uk9KMUtUbHc9PSIsInZhbHVlIjoiMTNIWXR1ai9oU2ZheS90SjhOTUJhUT09IiwibWFjIjoiZDQ1ODFiMTgwOWQ4ZWM1N2FhNTk3YzJmMGU2NTlmOWNhZWZmMDY5ODM2YWRhMjE4NzE2YWY3NWM0MTc1MGE1ZiIsInRhZyI6IiJ9', '2023-02-15 14:37:29', '2023-02-15 14:37:29'),
(3, 'Aiyan Chowdhury', 'user2@mail.com', 'eyJpdiI6ImhqRU9LSWdyZmY3dVV1eEN6eU83R0E9PSIsInZhbHVlIjoiMTk1Q2F4dVJPYkFOTE4zQlBrNnVZUT09IiwibWFjIjoiOTYwYTdmNmY4YWRiMmRkNmY5ZmNmOTczNGNkNGFlODIxOTVlYTY3ZDcxZDFjZDYyOTZkMWJhMGYxMDEwZThmZSIsInRhZyI6IiJ9', '2023-02-15 14:37:29', '2023-02-15 14:37:29'),
(4, 'Kanij Fatema', 'user3@mail.com', 'eyJpdiI6IitnU2Mxa3MrODhNTDJ5ZGlDeURyWWc9PSIsInZhbHVlIjoicmFHTjVUQTJOcHBXa0J2QXpNL0d1dz09IiwibWFjIjoiZWM2MzMyMGY0MWRiYTNmMmYwNDlkMmU2NzFlYmI1YmFhNGI3YjE3YWFjNDExYWYwMWVjZjNjMDE4OGE1NmE2MSIsInRhZyI6IiJ9', '2023-02-15 14:37:29', '2023-02-15 14:37:29'),
(5, 'Parvej Chowdhury', 'user1@mail.com', 'eyJpdiI6ImpCZmVWRmJ5OXR4c292MlN4U0dhVnc9PSIsInZhbHVlIjoiN3l0VUpjd3B4NHVra0xGdkpEZDJOQT09IiwibWFjIjoiNzVhYjFkZTQzZjI5OTgyYzhmYmJhMmJkYTE1NmMwMWYwMWFlMjNjYTc1MTVhMDFkNjY4MThiMzkwZTE4NmQ2NCIsInRhZyI6IiJ9', '2023-02-15 14:37:50', '2023-02-15 14:37:50'),
(6, 'Aiyan Chowdhury', 'user2@mail.com', 'eyJpdiI6IjYxVVdub1hlblBnNWpzMlRLK1FFSnc9PSIsInZhbHVlIjoiS3MwTmpDemZaVGFIRjVlYUNQWnZNUT09IiwibWFjIjoiY2NkYWVlNjU4MTJiOTk4NzFkMDg4Yzg3YTE4NzFkMTZkNDJmZmYyNmMxMTY2MGVhNTFmNTU4NjA5ZWZhOWJjYyIsInRhZyI6IiJ9', '2023-02-15 14:37:50', '2023-02-15 14:37:50'),
(7, 'Kanij Fatema', 'user3@mail.com', 'eyJpdiI6InlMNzFodnlHNFk5SjZSZ1I5QVUyRnc9PSIsInZhbHVlIjoia0VydXBvWmZRcjl0cGVVa1A3MTNOUT09IiwibWFjIjoiNTNiNzVlYzNiYjJhMDc2NmEwMTI3NmZmNDc4ZjRiZTJiY2JmMTUyZTc5MWM0MzZiY2YxM2Q1NjYyNDAyZTI4YSIsInRhZyI6IiJ9', '2023-02-15 14:37:50', '2023-02-15 14:37:50'),
(8, 'Parvej Ahmed', 'parvej35@gmail.com', 'eyJpdiI6ImFsRHdoT1NPbnNqS1dUdU43em03M3c9PSIsInZhbHVlIjoiN0xFTTcrdE44cnVIVWxJalZaNVNpZz09IiwibWFjIjoiZjM0N2Y5NWQzY2MwZTM0MWE2Y2VjNTI5OTViZTBlNzNjNDY0OTY0YjcwNmRkN2NmNjc2YTcxZjBjMTRlMjNlMCIsInRhZyI6IiJ9', '2023-02-15 14:48:15', '2023-02-15 14:48:15'),
(9, 'Parvej Chowdhury', 'user1@mail.com', 'eyJpdiI6ImEzNDhoM0dtMks3ODVxZWY2M2JxblE9PSIsInZhbHVlIjoibjk4cVJkTmdsSlRsTnJLVzFmb2hqdz09IiwibWFjIjoiZWI2OTI1MDIzMmEwMzM4ZmYzOWVmMjE0YTY2YzcwNTNhYjFlNzE1Yjk5NmZiYjQ4ZjU2NGE3NDY0NThkOWViYiIsInRhZyI6IiJ9', '2023-02-15 16:13:35', '2023-02-15 16:13:35'),
(10, 'Aiyan Chowdhury', 'user2@mail.com', 'eyJpdiI6IjB4WCtRVGU0YkFwL2M3b3V5Q216aUE9PSIsInZhbHVlIjoiVmZFbVJOWDliVitMTHBVRWZTVlVlUT09IiwibWFjIjoiMzBkOWFhZjgzNTQ5Y2E5YmM1Yjc1ZGViNjk0YjQ4MWNhNjkyZGE0YWFiYWI3YTE4ZDEwZmQ4ZTIzYjUyN2I2NiIsInRhZyI6IiJ9', '2023-02-15 16:13:35', '2023-02-15 16:13:35'),
(11, 'Kanij Fatema', 'user3@mail.com', 'eyJpdiI6InlLTnJpVGlsWDNvNkI1Yk8rYktSanc9PSIsInZhbHVlIjoiNG9CdXRwczhsZ3J2aXU4L1BhN1NWZz09IiwibWFjIjoiNjJiNTUxNDVhOGFhNjBjYjk0Y2IyNWUxODUxYWExZWIwYTUwMTM0MWM3ZGUxMTZmYWUyODdkMjAwZjYxOTA0YSIsInRhZyI6IiJ9', '2023-02-15 16:13:35', '2023-02-15 16:13:35'),
(12, 'Parvej Chowdhury', 'user1@mail.com', 'eyJpdiI6IksvdDVheFltLzJPUjh4WmFGcERCN1E9PSIsInZhbHVlIjoiTnFNVm9OZWFZczRlS2J4ck5FQlA1QT09IiwibWFjIjoiMDYwZWI4ZDMwZmZhMjEzODliODNkNzUyYjVhMTMzOTNkMGZmMGM3Y2VhMzRhMmFiZTliYTgxZDFmZTI3MWY4NSIsInRhZyI6IiJ9', '2023-02-15 16:14:07', '2023-02-15 16:14:07'),
(13, 'Aiyan Chowdhury', 'user2@mail.com', 'eyJpdiI6Inp4cmp2QnlvZHhxM0hvUE9UeUE5YWc9PSIsInZhbHVlIjoicjIzVTRGOC9ZZXR2cHVKMFJkNlNKdz09IiwibWFjIjoiNjQzNzA5ZTUwZDUyNTc2OWI2ODQ2OWIyYjQ1Yjg3NDE4YjBkN2JlZDFmYjBjNjg4ZDM5NTUzZTQ3ZjYxMjZjMyIsInRhZyI6IiJ9', '2023-02-15 16:14:07', '2023-02-15 16:14:07'),
(14, 'Kanij Fatema', 'user3@mail.com', 'eyJpdiI6ImxQcXoyRzFwS0twU2NyY1IrZUxEVUE9PSIsInZhbHVlIjoiL3BTMDRQRXp5ZWgwMStsMkhJNDlRZz09IiwibWFjIjoiYzY1NjM2NzdiZjNmOTkxZGZiYzM4ZWJhNTEzZGU4ODBiYzUyNTIzY2EyYTI3ZjA1OGE5M2Q2Y2M0YTU1NzFkMiIsInRhZyI6IiJ9', '2023-02-15 16:14:07', '2023-02-15 16:14:07'),
(15, 'sss', 'parvej@mail.com', 'eyJpdiI6IlZ3eU1QeFlSdElsRzlRSExvczRoNlE9PSIsInZhbHVlIjoibW0zbUFmN1lXL0pjaDVDQmQxR2hwUT09IiwibWFjIjoiMGI0NDdiZmY4MjRlZTk4Y2VhNWIxZGFlNmNkNzNlMGU5M2I2MzRkM2YxOTU5ZTkxZGIzYTI2OGVjZDJiYTNhNyIsInRhZyI6IiJ9', '2023-02-15 16:20:45', '2023-02-15 16:20:45');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
