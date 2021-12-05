-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2021 pada 17.31
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_30_194002_create_sessions_table', 1),
(7, '2014_10_12_000010_create_users_table', 2),
(8, '2021_11_30_200222_create_transactions_table', 3),
(9, '2021_12_01_121925_add_field_to_users_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 2, 'authToken', '4a070b4676db7d91af25d08a176e3404bc9b6cb8e09e08c03183a56cbe71a754', '[\"*\"]', NULL, '2021-12-01 08:44:45', '2021-12-01 08:44:45'),
(4, 'App\\Models\\User', 2, 'authToken', '02e014ba8fec156ec8efa40f0b2d4b55961a3b6daf4be505a118dd1111fcb577', '[\"*\"]', '2021-12-02 09:36:35', '2021-12-02 09:08:26', '2021-12-02 09:36:35'),
(5, 'App\\Models\\User', 3, 'authToken', '47d62bd03d400a978ed8e48fa7d6fe5b7fa4db33102232faf9687ceb1de2d72f', '[\"*\"]', NULL, '2021-12-04 02:32:30', '2021-12-04 02:32:30'),
(6, 'App\\Models\\User', 4, 'authToken', 'e6690bc9ede5377e705139c61b24af4cd174496744d8940be425f2e4b1a06012', '[\"*\"]', NULL, '2021-12-04 02:47:50', '2021-12-04 02:47:50'),
(7, 'App\\Models\\User', 5, 'authToken', '9dac9edb866df1e67ba330ecb5b7fca266dc0dc7dd9d73ba12fda991b26a71a6', '[\"*\"]', NULL, '2021-12-04 02:50:11', '2021-12-04 02:50:11'),
(8, 'App\\Models\\User', 6, 'authToken', '8639b3d31e4633597f46813d4cd340e8a22cafa2df9c7473e5503acb57669dcb', '[\"*\"]', NULL, '2021-12-04 02:53:13', '2021-12-04 02:53:13'),
(9, 'App\\Models\\User', 7, 'authToken', '378de1803a16e829257d42f4dfd463c98c5799031a45a2bc4a89a89dae45691f', '[\"*\"]', NULL, '2021-12-04 09:00:18', '2021-12-04 09:00:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Bbkbcq7VwujxE3trcrjJ59KJWah3x40dvVouCrkf', NULL, '192.168.1.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEQ2VDM1R250Q3dLRzZjdHJXVHF2UHk1TlVGYWtFR2RJY2tKRGZDViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xOTIuMTY4LjEuMTI6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1638631915),
('bbUaU0aOgvkJ7FIDsYwM9TVIo3RpEAoi2FSkYK8r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1I5Q1pKdUs3eVlURUZHMTlkanpDUkxXTGdic2lXMkpncUh4SVB1VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1638556686),
('ggeGmXqtB9zievYRa1rzAOk2KUdHuhqvSj7a3CFm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXZiNnV0bXRDcHJ4QXRoTG5rZ0l1OExxSFFpUjFPUXNRdmQ4d2M5YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1638611922);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reporter_id` bigint(20) NOT NULL,
  `driver_id` bigint(20) NOT NULL,
  `report_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picked_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finished_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `latitude` double(8,2) NOT NULL DEFAULT 0.00,
  `longitude` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `reporter_id`, `driver_id`, `report_image`, `picked_image`, `finished_image`, `address_detail`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'uploads/62bc27651930.png', NULL, NULL, 'sdfsdfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:32:48', '2021-12-04 02:32:48'),
(2, 1, 3, 'uploads/aa0699623322.png', NULL, NULL, 'sdfsdfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:36:22', '2021-12-04 02:36:22'),
(3, 33, 3, 'uploads/2388d14cd702.png', NULL, NULL, 'sdfsdfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:41:09', '2021-12-04 02:41:09'),
(4, 33, 3, 'uploads/545329efc70a.png', NULL, NULL, 'sdfsdfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:41:52', '2021-12-04 02:41:52'),
(5, 33, 3, 'uploads/b79226e11712.png', NULL, NULL, 'sdfsdfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:43:39', '2021-12-04 02:43:39'),
(6, 31, 3, 'uploads/4d88387b60ff.png', NULL, NULL, 'sdfsdfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:45:57', '2021-12-04 02:45:57'),
(7, 1, 3, 'uploads/6ba5d5c7c91c.png', NULL, NULL, 'sdfsdfsd sfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:49:40', '2021-12-04 02:49:40'),
(8, 3, 3, 'uploads/0619f2b5bc96.png', NULL, NULL, 'sdfsdfsd sfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:52:03', '2021-12-04 02:52:03'),
(9, 3, 3, 'uploads/6ecf91a45eb8.png', NULL, NULL, 'sdfsdfsd sfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:52:11', '2021-12-04 02:52:11'),
(10, 3, 3, 'uploads/da64e48d7d49.png', NULL, NULL, 'sdfsdfsd sfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:52:34', '2021-12-04 02:52:34'),
(11, 3, 3, 'uploads/0c85ef9430b2.png', NULL, NULL, 'sdfsdfsd sfsd', 'PENDING', 89.00, 90.00, '2021-12-04 02:58:18', '2021-12-04 02:58:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `last_active` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `roles`, `email_verified_at`, `password`, `user_status`, `last_active`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Bijantium Sinatria', 'admin2@gmial.com', NULL, NULL, NULL, '$2y$10$SMm1wt97.O3tKHoTU8k0cuwUHJuLbfNnI.VWKXFJVn.AXgp3Mjbwe', 1, NULL, NULL, NULL, NULL, '2021-11-30 12:55:46', '2021-11-30 12:55:57'),
(2, 'bijantium', 'bijan@rok.com', '89999999', 'Pengguna', NULL, '$2y$10$WjJAMuiUhLCBC/ivxaL5WOmeUKfFKCH7I7MWc9r651iGKQM0ucOOK', 1, '2021-12-02', NULL, NULL, NULL, '2021-12-01 08:44:45', '2021-12-02 09:36:35'),
(3, 'bijantiumsss', 'bijan@rssok.com', '89999999', 'driver', NULL, '$2y$10$WxF9V7o3SNXbyBDzc4Zv/OVbxWYi22pUoWv4rnERxa6UP8slqvPZS', 1, NULL, NULL, NULL, NULL, '2021-12-04 02:32:30', '2021-12-04 02:32:30'),
(7, 'sfasdfasdss', 'bijassssan@rssok.coma', '89999999', 'driver', NULL, '$2y$10$ZBMlfXK/arlLzdXJtwfOKOpeN0.G2YvTVGJ/ZlT.DYPvtRzJYOTGm', 1, NULL, NULL, NULL, NULL, '2021-12-04 09:00:18', '2021-12-04 09:00:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
