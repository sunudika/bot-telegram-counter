-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2020 at 04:04 PM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmhwebid_telegram_bot_counter`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `frequency` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_user`, `username`, `name`, `frequency`, `created_at`, `updated_at`) VALUES
(10, 753050347, 'sunuilhmp', 'Sunu', 57, '2020-04-24 12:18:25', '2020-04-24 20:29:52'),
(11, 482942544, 'mramirid', 'Amir M', 6, '2020-04-24 12:47:18', '2020-04-24 13:03:49'),
(12, 788192855, 'kholil_rnm', 'Kholilul', 4, '2020-04-24 18:21:15', '2020-04-24 18:21:29'),
(13, 753050347, 'sunuilhmp', 'Sunu', 7, '2020-04-25 04:57:38', '2020-04-25 11:39:24'),
(14, 482942544, 'mramirid', 'Amir', 4, '2020-04-25 10:34:39', '2020-04-25 11:25:09'),
(15, 788192855, 'kholil_rnm', 'Kholilul', 2, '2020-04-25 16:16:15', '2020-04-25 16:16:40'),
(16, 753050347, 'sunuilhmp', 'Sunu', 2, '2020-04-28 16:47:25', '2020-04-28 16:47:39'),
(17, 788192855, 'kholil_rnm', 'Kholilul', 2, '2020-04-28 16:47:53', '2020-04-28 16:47:55'),
(18, 753050347, 'sunuilhmp', 'Sunu', 1, '2020-04-29 21:31:24', '2020-04-29 21:31:24'),
(19, 788192855, 'kholil_rnm', 'Kholilul', 1, '2020-04-30 07:59:36', '2020-04-30 07:59:36'),
(20, 482942544, 'mramirid', 'Amir', 1, '2020-04-30 07:59:48', '2020-04-30 07:59:48'),
(21, 753050347, 'sunuilhmp', 'Sunu', 22, '2020-04-30 07:59:54', '2020-04-30 10:08:52'),
(22, 1127094811, 'kholilboy', 'Kholilboy', 2, '2020-04-30 14:12:28', '2020-04-30 14:12:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
