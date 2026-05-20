-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2026 at 02:34 AM
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
-- Database: `banana_phone_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `user_id`, `office_id`, `created_at`, `updated_at`) VALUES
(18, '2026-03-23', 4, 6, '2026-03-24 03:02:47', '2026-03-24 03:02:47'),
(19, '2026-03-23', 4, 5, '2026-03-24 03:02:47', '2026-03-24 03:02:47'),
(20, '2026-03-23', 5, 6, '2026-03-24 03:11:14', '2026-03-24 03:11:14'),
(21, '2026-03-23', 5, 4, '2026-03-24 03:11:14', '2026-03-24 03:11:14'),
(22, '2026-03-24', 4, 5, '2026-03-24 05:18:29', '2026-03-24 05:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_lines`
--

CREATE TABLE `invoice_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` int(11) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_lines`
--

INSERT INTO `invoice_lines` (`id`, `unit_price`, `discount`, `quantity`, `reason`, `invoice_id`, `phone_id`, `created_at`, `updated_at`) VALUES
(15, 150, 0.00, 3, 'None', 18, 4, '2026-03-24 03:02:47', '2026-03-24 03:02:47'),
(16, 500, 0.00, 1, 'None', 19, 5, '2026-03-24 03:02:47', '2026-03-24 03:02:47'),
(17, 450, 0.00, 1, 'None', 18, 8, '2026-03-24 03:02:47', '2026-03-24 03:02:47'),
(18, 150, 0.00, 2, 'None', 20, 4, '2026-03-24 03:11:14', '2026-03-24 03:11:14'),
(19, 1400, 0.00, 1, 'None', 21, 7, '2026-03-24 03:11:14', '2026-03-24 03:11:14'),
(20, 599, 0.00, 3, 'None', 21, 11, '2026-03-24 03:11:14', '2026-03-24 03:11:14'),
(21, 500, 0.00, 1, 'None', 22, 5, '2026-03-24 05:18:29', '2026-03-24 05:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_07_000000_create_offices_table', 1),
(5, '2026_03_07_031947_create_phones_table', 1),
(6, '2026_03_07_221916_add_image_to_phones_table', 1),
(7, '2026_03_16_185529_create_savings_accounts_table', 1),
(8, '2026_03_21_000000_create_invoices_table', 1),
(9, '2026_03_21_005637_create_invoice_lines_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `manager_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `address`, `manager_name`, `created_at`, `updated_at`) VALUES
(4, 'Banana store El poblado', 'Cr 7 # 48 sur transversal', 'Simon Sloan', '2026-03-24 02:34:11', '2026-03-24 02:34:11'),
(5, 'Banana store Sabaneta', 'Cr 37 # 54-88 Monterey 207', 'Pabon Arturo', '2026-03-24 02:34:36', '2026-03-24 02:34:36'),
(6, 'Banana store Buenos aires', 'Cr 37 # 54-88', 'Tomas Alfonso', '2026-03-24 02:35:00', '2026-03-24 02:35:00'),
(7, 'Banana store Boston', 'Cr 33 # 54-90', 'Alejandro Tirado', '2026-03-24 02:50:03', '2026-03-24 02:50:03'),
(8, 'Banana store Copacabana', 'Cr 10 # 54 norte transversal superior', 'Simon Sloan AlpacaLand', '2026-03-24 02:50:37', '2026-03-24 02:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('alejotiradoramirez@gmail.com', '$2y$12$WGTlBfu0B8dEVc59EJqAFO0Zb0WsZrW04SW6ew49Qx6Gaihr1GGbm', '2026-03-22 05:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `name`, `memory`, `ram`, `battery`, `brand`, `price`, `quantity`, `office_id`, `created_at`, `updated_at`, `image`) VALUES
(3, 'Iphone 17 pro max', '512', '16', '5000', 'Apple', 1000, 25, 4, '2026-03-24 02:35:37', '2026-03-24 02:35:37', 'phones/G4N1Q3AQAZzGi65BeU6T4BgkknsPUuwMWSyjABv2.webp'),
(4, 'Iphone 4', '64', '4', '3200', 'Apple', 150, 0, 6, '2026-03-24 02:36:18', '2026-03-24 03:11:14', 'phones/hfwD1680HwX4OIUek5SaE7nyZejWrRStFEeBSFmx.webp'),
(5, 'Honor reno 15', '512', '32', '7000', 'Honor', 500, 44, 5, '2026-03-24 02:37:59', '2026-03-24 05:18:29', 'phones/XWV6Rcdq12jfK1rIc6phzAjQqOnIYZFw9lZ3iKma.jpg'),
(6, 'Xiaomi 17', '256', '16', '8000', 'Xiaomi', 700, 100, 4, '2026-03-24 02:40:38', '2026-03-24 02:40:46', 'phones/WewHGVnnrPDcphhFSjtGct5dWo1r1rnF0QRNgFXo.jpg'),
(7, 'Samsung s24', '512', '32', '9000', 'Samsung', 1400, 21, 4, '2026-03-24 02:43:52', '2026-03-24 03:11:14', 'phones/s1EQC4GKQgdIFizdHL4dMHo64gi2eYxxEpjunqVO.webp'),
(8, 'Oppo A57', '128', '8', '4000', 'Oppo', 450, 69, 6, '2026-03-24 02:44:31', '2026-03-24 03:02:47', 'phones/eFUMqbSSPTzvYlVClEfAJPmH6mGHTNoBoZ7w2YtS.jpg'),
(9, 'Iphone 15 pro max', '512', '16', '3400', 'Apple', 1100, 10, 5, '2026-03-24 02:46:19', '2026-03-24 02:46:19', 'phones/pM4jA2XTjeA9GRZs2j4UemW1cNBgCOGnBLiAFUgk.jpg'),
(10, 'Motorola Moto Edge 20 lite', '128', '4', '5000', 'Motorola', 250, 100, 6, '2026-03-24 02:47:03', '2026-03-24 02:47:03', 'phones/diLihFH1UGLJs7maDOMzfS8V6Osaoee265ur77Cs.webp'),
(11, 'Samsung a56', '128', '8', '4000', 'Samsung', 599, 58, 4, '2026-03-24 02:48:32', '2026-03-24 03:11:14', 'phones/4tyP9EANiRlQMsrJRLwryMnPPc7mbkXONLckALDb.webp'),
(12, 'Asus zenfone 10', '512', '32', '10000', 'Asus', 600, 8, 4, '2026-03-24 02:49:09', '2026-03-24 02:49:09', 'phones/6rcaYB8qgoJO3saGgqOJ4eABF3AGInNNv43PpOTn.webp'),
(13, 'Nokia 1100', '512', '64', '99999', 'Nokia', 10000000, 1, 8, '2026-03-24 02:51:30', '2026-03-24 02:51:30', 'phones/nFtfA3WmR8n76NegThVDFmWihWvcdWEEuSPYCX12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `savings_accounts`
--

CREATE TABLE `savings_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings_accounts`
--

INSERT INTO `savings_accounts` (`id`, `type`, `balance`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahorros', 993000, 1, '2026-03-22 01:59:07', '2026-03-22 02:03:12'),
(7, 'Ahorros', 503, 5, '2026-03-24 03:04:53', '2026-03-24 03:11:14'),
(8, 'Savings', 100000, 4, '2026-03-24 05:27:02', '2026-03-24 05:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mTrIZ6jc5NI49Glv9KVOcLv1oLHGiNRoYOEvdeMM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXNaNXp0R3dZWER1SUZPV1pYaXV4T0JTdHRBcGkyRXZJdW9VNTA4aCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czoxMDoiaG9tZS5pbmRleCI7fX0=', 1774315960);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `national_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `phone_number` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `national_id`, `first_name`, `last_name`, `role`, `phone_number`, `birthday`, `address`) VALUES
(1, 'AdminPro', 'alejotiradoramirez@gmail.com', NULL, '$2y$12$1InItzOIk522vQXXsyS6Zu5opcJCIY4dXO6NQMoO2Q8IBigBAW32.', 'oK6KI0LLDOJNykRKtp8nsT4bwydRwRToMgjV9ForH0oelG0aB3GeaJD7pem6', '2026-03-21 21:53:58', '2026-03-24 02:59:51', 'A11312', 'Alberto', 'Garcia Villa', 'Admin', '44873485', '2026-03-19', 'Cr 7 # 48 sur transversal'),
(4, 'Alejoso777', 'empanadaspor1000@gmail.com', NULL, '$2y$12$FcPCoAJoC4DNAc36JU8DqOS6DjCNmqvXXUMOcV177HEQpnjiks93S', NULL, '2026-03-24 02:53:35', '2026-03-24 02:59:28', '123', 'Alejandro', 'Tirado', 'Client', '44873485', '2007-03-12', 'Cr 7 # 48 sur'),
(5, 'Ssloan07', 'empanadaspor2000@gmail.com', NULL, '$2y$12$UNqBsqwI.uZs7assDMa9f.M/8BgTZsPnhvWOWN6OVdlx8awpKJzTG', NULL, '2026-03-24 03:04:40', '2026-03-24 03:04:40', '1234', 'Simon', 'Sloan', 'client', '3205097448', '2026-03-23', 'Cr 7 # 48 sur transversal inferior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_office_id_foreign` (`office_id`);

--
-- Indexes for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_lines_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_lines_phone_id_foreign` (`phone_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_office_id_foreign` (`office_id`);

--
-- Indexes for table `savings_accounts`
--
ALTER TABLE `savings_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `savings_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `savings_accounts`
--
ALTER TABLE `savings_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  ADD CONSTRAINT `invoice_lines_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_lines_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `savings_accounts`
--
ALTER TABLE `savings_accounts`
  ADD CONSTRAINT `savings_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
