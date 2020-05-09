-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mar 2018 pada 11.53
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content_management`
--
CREATE DATABASE IF NOT EXISTS `content_management` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `content_management`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_category`
--

DROP TABLE IF EXISTS `ma_category`;
CREATE TABLE `ma_category` (
  `category_code` varchar(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_category`
--

INSERT INTO `ma_category` (`category_code`, `category_name`) VALUES
('FF', 'Frozen Food'),
('MN', 'Drinks'),
('MS', 'Makanan Sehat'),
('SN', 'Snacks');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_content`
--

DROP TABLE IF EXISTS `ma_content`;
CREATE TABLE `ma_content` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_product`
--

DROP TABLE IF EXISTS `ma_product`;
CREATE TABLE `ma_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `note` varchar(100) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `price_unit` decimal(10,0) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `category_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_product`
--

INSERT INTO `ma_product` (`id`, `product_name`, `note`, `unit`, `price_unit`, `picture`, `category_id`) VALUES
(1, 'SOSIS ABC', 'isi 6 perpak', 'pak', '11500', '1.jpg', 'FF'),
(2, 'MARTABAK BEUKU', 'isi jamur', 'buah', '7800', '2.jpg', 'FF'),
(3, 'MINUMAN MINT ISIS', '1 kotak isi 35 sachet', 'kotak', '14000', '3.jpg', 'MN'),
(4, 'ES TELER 79', '1 kotak isi 12 sachet', 'kotak', '34000', '2.jpg', 'MN'),
(5, 'ES TEH KOTAK 44', '1 kotak isi 200 ml', 'kotak', '4000', '3.jpg', 'MN'),
(6, 'SARI BUAH BEKU', '1 kotak isi 200 ml', 'kotak', '4800', '4.jpg', 'FF'),
(7, 'JOY WAFER BANANA', 'Snack kriuk', 'biji', '4500', '6.jpg', 'SN'),
(8, 'JOY WAFER CHOCO', 'Snack kriuk coklat', 'biji', '4500', '5.jpg', 'SN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_users`
--

DROP TABLE IF EXISTS `ma_users`;
CREATE TABLE `ma_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `ma_users`
--

INSERT INTO `ma_users` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'bypass', '$2y$13$OvUL1JUfujfVN4ULN/ilbuC2xCngZO/fTYnLmn9HVrmQmngVPaCaO', '', 'donairlbox@yahoo.com', 1, 1, 0, 1507369201),
(4, 'blueskin', NULL, '$2y$13$UnQ0gsf/RL8nrhmYImoyaePKmTQeOkVQ5UvOP3ZRMS4yc1DFYouom', NULL, 'donairlbox@yahoo.com', 2, 10, 1521886504, 0),
(6, 'farida', NULL, '$2y$13$LtK566clzDMsfoO8aX0QGeH94wU53njYKwdyWJhbZx0RCtjcjvtGu', NULL, 'farida@gmail.com', 2, 10, 1522478603, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_users_extra`
--

DROP TABLE IF EXISTS `ma_users_extra`;
CREATE TABLE `ma_users_extra` (
  `id` int(11) NOT NULL,
  `username` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(22) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_acc_no` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_acc_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_users_extra`
--

INSERT INTO `ma_users_extra` (`id`, `username`, `bank_name`, `bank_acc_no`, `bank_acc_name`) VALUES
(1, 'blueskin', 'bca', '324234', '32434444'),
(2, 'farida', 'mandiri', '8001200123', 'Farida Ariyanti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ma_category`
--
ALTER TABLE `ma_category`
  ADD PRIMARY KEY (`category_code`);

--
-- Indexes for table `ma_content`
--
ALTER TABLE `ma_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_product`
--
ALTER TABLE `ma_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_users`
--
ALTER TABLE `ma_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `ma_users_extra`
--
ALTER TABLE `ma_users_extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ma_content`
--
ALTER TABLE `ma_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ma_product`
--
ALTER TABLE `ma_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ma_users`
--
ALTER TABLE `ma_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ma_users_extra`
--
ALTER TABLE `ma_users_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ma_users_extra`
--
ALTER TABLE `ma_users_extra`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `ma_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
