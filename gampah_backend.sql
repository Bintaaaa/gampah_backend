-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 04:52 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gampah_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
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
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `reporter_id`, `driver_id`, `report_image`, `picked_image`, `finished_image`, `address_detail`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'test', NULL, NULL, '', 'PENDING', 0.00, 0.00, NULL, NULL),
(2, 1, 3, 'test2', NULL, NULL, '', 'PENDING', 0.00, 0.00, NULL, NULL),
(3, 1, 3, 'test3', NULL, NULL, '', 'PENDING', 0.00, 0.00, NULL, NULL),
(4, 1, 2, 'test', NULL, NULL, '', 'PENDING', 0.00, 0.00, NULL, NULL),
(5, 1, 2, 'test', NULL, NULL, '', 'PENDING', 0.00, 0.00, NULL, NULL),
(6, 1, 3, 'report_images/3kA1JdrPAGyZ6CCPtIfoAsNhkyx9iGPuyMp7Wx0w.png', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:27:48', '2021-12-03 10:27:48'),
(7, 1, 2, 'phpCA78.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:34:34', '2021-12-03 10:34:34'),
(8, 1, 3, 'php9BB3.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:35:28', '2021-12-03 10:35:28'),
(9, 1, 2, 'phpBE01.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:35:37', '2021-12-03 10:35:37'),
(10, 1, 3, 'phpF30D.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:35:50', '2021-12-03 10:35:50'),
(11, 1, 2, 'php2EEE.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:36:05', '2021-12-03 10:36:05'),
(12, 1, 3, 'phpD953.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:37:55', '2021-12-03 10:37:55'),
(13, 1, 2, 'phpE1EF.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-03 10:37:57', '2021-12-03 10:37:57'),
(14, 1, 3, 'phpB51.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-04 00:04:48', '2021-12-04 00:04:48'),
(15, 1, 2, 'phpABF2.tmp', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-04 00:06:34', '2021-12-04 00:06:34'),
(16, 1, 3, 'uploads/399c694bb154png', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-04 00:11:57', '2021-12-04 00:11:57'),
(17, 1, 2, 'uploads/ee46ba6b77f8.png', NULL, NULL, 'Adam Malik', 'PENDING', 80.00, 90.00, '2021-12-05 08:50:37', '2021-12-05 08:50:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
