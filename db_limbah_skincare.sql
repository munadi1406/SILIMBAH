-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 03:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_limbah_skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_limbah`
--

CREATE TABLE `data_limbah` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jenis_limbah` varchar(32) NOT NULL,
  `waktu_pengangkutan` datetime NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_limbah` varchar(255) NOT NULL DEFAULT 'belum di ambil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_limbah`
--

INSERT INTO `data_limbah` (`id`, `user_id`, `jenis_limbah`, `waktu_pengangkutan`, `keterangan`, `lokasi`, `jumlah`, `created_at`, `updated_at`, `status_limbah`) VALUES
(50, 29, 'limbah p', '2022-12-16 18:00:00', 'Di Antar', 'Astambul', 12, '2022-12-16 10:00:54', NULL, 'sudah di ambil'),
(51, 29, 'tes', '2022-12-16 18:02:00', 'Di Antar', 'munadi', 9, '2022-12-16 10:02:47', NULL, 'belum di ambil'),
(52, 29, 'waluh', '2022-12-16 18:04:00', 'Di Antar', 'kalsel', 12, '2022-12-16 10:04:52', NULL, 'belum di ambil'),
(53, 29, 'waluh', '2022-12-16 18:05:00', 'Di Antar', 'munadi', 9, '2022-12-16 10:05:39', NULL, 'belum di ambil'),
(54, 29, 'waluh', '2022-12-16 18:05:00', 'Di Antar', 'munadi', 9, '2022-12-16 10:05:52', NULL, 'belum di ambil'),
(55, 29, 'munadiasaasaasa bbb', '2022-12-16 18:06:00', 'Di Ambil', 'Pingaran Ulu1', 12, '2022-12-16 10:06:12', NULL, 'sudah di ambil'),
(56, 29, 'waluh', '2022-12-16 18:06:00', 'Di Antar', 'as', 1, '2022-12-16 10:06:52', NULL, 'belum di ambil'),
(57, 29, 'asas', '2022-12-16 18:07:00', 'Di Antar', 'as', 1, '2022-12-16 10:07:29', NULL, 'belum di ambil'),
(58, 38, 'dari user', '2022-12-16 18:18:00', 'Di Antar', 'kalsel', 2, '2022-12-16 10:18:12', NULL, 'sudah di ambil');

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE `detail_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_rekening` varchar(32) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`user_id`, `no_rekening`, `alamat`, `no_telpon`, `created_at`, `updated_at`) VALUES
(29, '12345678', 'kalsel', '082148161129', '2022-12-15 03:31:46', NULL),
(31, '20200210201', 'Pingaran Ulu11', '12312331123', '2022-12-15 03:35:39', NULL),
(37, '1231232', '123123', '1231313', '2022-12-15 12:43:03', NULL),
(38, '20200210201', 'Pingaran Ulu11', '082148161129', '2022-12-15 13:21:24', NULL),
(39, '20200210201', 'Pingaran Ulu11', '2390103193', '2022-12-15 13:24:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(29, 'admin', '$2y$10$pXjWJHQu27WQyyJUeutx3ux5uPUT80G3FDmUGGm9Wi2x43PYJe9Hi', 'admin@gmail.com', 'admin', 'active', '2022-12-15 03:31:46', '2022-12-15 13:28:53'),
(31, 'user', '$2y$10$buZYUr/V0xjYiO7OvuUM5ugpvAtZzNRaVO2E1e9CNwmPJlu3BfrFS', 'user1@gmail.com', 'admin', 'active', '2022-12-15 03:35:39', '2022-12-16 14:07:15'),
(37, 'user', '$2y$10$Ztf6S/8R10FJVUFhjEARgeTrbAL7qJMSN/6JUxvxkABeAKXQVB7ue', 'fathullahmunadi1406@gmail.com', 'user', 'active', '2022-12-15 12:43:03', '2022-12-15 13:20:25'),
(38, 'munadi', '$2y$10$..5PJEX0aM/P9ju6jxhT4uoqyNceQIV5FcEfvixnJHWpfUMZRPi5y', 'munadifathullah@gmail.com', 'user', 'active', '2022-12-15 13:21:24', '2022-12-16 14:17:21'),
(39, 'waluh', '$2y$10$jw5PH2rA.H.7T9NwgyeTMuqY0TlwFulJClKuVwjHnL/kozKWuCBge', 'munadinork@gmail.com', 'user', 'inactive', '2022-12-15 13:24:53', '2022-12-15 13:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_limbah`
--
ALTER TABLE `data_limbah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_limbah`
--
ALTER TABLE `data_limbah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_limbah`
--
ALTER TABLE `data_limbah`
  ADD CONSTRAINT `data_limbah_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD CONSTRAINT `detail_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
