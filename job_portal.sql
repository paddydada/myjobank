-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 06:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `role` enum('job_seeker','employer','admin') NOT NULL DEFAULT 'job_seeker',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `designation`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$12$pBZFx8daxAVIVZ2VskSMpOGoxQ9lkOCtA.oiEEHTAEjIseZ.Y0DAe', '2402150932Capture.png', '8709216859', 'Software Developer', 'admin', 'active', NULL, NULL, '2024-02-15 04:15:19'),
(2, 'employer', 'employer', 'employer@gmail.com', NULL, '$2y$12$yzFiD8cFi/9Ycjrvvy8PIuO8lV6TtipqJ/yPVLKK1sb3c4fw//2Lm', NULL, NULL, NULL, 'employer', 'active', NULL, NULL, NULL),
(3, 'jobseeker', 'jobseeker', 'jobseeker@gmail.com', NULL, '$2y$12$1C9fClEm1oMKaA.SvZuxMuEXRaDgjf2K8qeyCNrqbvL7lBHYx2eKq', NULL, NULL, NULL, 'job_seeker', 'active', NULL, NULL, NULL),
(4, 'Dr. Davonte Gleichner', 'caleb44', 'zwilliamson@example.com', '2024-02-14 03:42:01', '$2y$12$OMRQ8JQ.R1ePknCzgvnZC.DMJ/ygz1DMh96Jlg8K.Sr7ZlPZy2Dli', 'https://via.placeholder.com/60x60.png/0077ff?text=vitae', '713.343.1678', 'Software Engineer', 'admin', 'active', 'mbzbiX', '2024-02-14 03:42:01', '2024-02-14 03:42:01'),
(5, 'Dr. Arnaldo Reynolds', 'zsimonis', 'pouros.cullen@example.org', '2024-02-14 03:42:01', '$2y$12$OMRQ8JQ.R1ePknCzgvnZC.DMJ/ygz1DMh96Jlg8K.Sr7ZlPZy2Dli', 'https://via.placeholder.com/60x60.png/00cc00?text=velit', '(534) 282-3226', 'Software Engineer', 'job_seeker', 'active', '7jDFsL', '2024-02-14 03:42:01', '2024-02-14 03:42:01'),
(6, 'Prof. Hailie Mueller IV', 'axel01', 'nels.raynor@example.net', '2024-02-14 03:42:01', '$2y$12$OMRQ8JQ.R1ePknCzgvnZC.DMJ/ygz1DMh96Jlg8K.Sr7ZlPZy2Dli', 'https://via.placeholder.com/60x60.png/0055bb?text=iusto', '571-968-2512', 'Software Engineer', 'admin', 'inactive', 'a7fLwC', '2024-02-14 03:42:01', '2024-02-14 03:42:01'),
(7, 'Emelie Homenick', 'mya44', 'colin.marquardt@example.org', '2024-02-14 03:42:01', '$2y$12$OMRQ8JQ.R1ePknCzgvnZC.DMJ/ygz1DMh96Jlg8K.Sr7ZlPZy2Dli', 'https://via.placeholder.com/60x60.png/00bb66?text=et', '+1 (415) 306-6727', 'Software Engineer', 'admin', 'active', '2YjC7l', '2024-02-14 03:42:01', '2024-02-14 03:42:01'),
(8, 'Abelardo Kutch', 'cloyd.farrell', 'garfield68@example.com', '2024-02-14 03:42:01', '$2y$12$OMRQ8JQ.R1ePknCzgvnZC.DMJ/ygz1DMh96Jlg8K.Sr7ZlPZy2Dli', 'https://via.placeholder.com/60x60.png/00bb77?text=sit', '+15347465059', 'Software Engineer', 'job_seeker', 'inactive', 'hUOmpQ', '2024-02-14 03:42:01', '2024-02-14 03:42:01'),
(9, 'Holden Robel', 'blanda.veronica', 'torp.dereck@example.org', '2024-02-14 03:42:01', '$2y$12$OMRQ8JQ.R1ePknCzgvnZC.DMJ/ygz1DMh96Jlg8K.Sr7ZlPZy2Dli', 'https://via.placeholder.com/60x60.png/002222?text=sapiente', '1-925-439-5045', 'Software Engineer', 'job_seeker', 'active', 'hWanSa', '2024-02-14 03:42:02', '2024-02-14 03:42:02'),
(10, 'test', NULL, 'test@gmail.com', NULL, '$2y$12$apF91OKeYlazQppaPECHiewkncJ6Otz/bAysaEEDeosNSfrT426Bu', NULL, NULL, NULL, 'job_seeker', 'active', NULL, '2024-02-14 03:43:05', '2024-02-14 03:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
