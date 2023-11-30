-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 09:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `chat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `chat_name`) VALUES
(15, 'MICHAEL'),
(16, 'MICHAEL'),
(17, 'JOSE'),
(18, 'JOSE'),
(19, 'MICHAEL'),
(20, 'JOSE'),
(21, 'MICHAEL'),
(22, 'MICHAEL'),
(23, 'JOSE');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `chat_name` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `sent_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `receiver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_name`, `content`, `sent_by`, `created_at`, `receiver`) VALUES
(1, 'nnn', 'mmmmm', 'me', '2023-07-13 18:34:59', ''),
(2, 'nnn', 'i want you baby', 'me', '2023-07-13 18:35:31', ''),
(3, 'nnn', 'nnnn', 'me', '2023-07-13 18:36:31', ''),
(4, 'nnn', 'lover you baby', 'me', '2023-07-13 18:42:26', ''),
(5, '', '', 'me', '2023-07-13 19:35:30', ''),
(6, '', '', 'me', '2023-07-13 19:35:43', ''),
(7, 'nnn', '', 'me', '2023-07-13 19:36:15', ''),
(8, 'nnn', ' [File: <a href=\"uploads/64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg\" target=\"_blank\">64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg</a>]', 'me', '2023-07-13 19:50:18', ''),
(9, 'nnn', ' [File: <a href=\"uploads/64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx\" target=\"_blank\">64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx</a>]', 'me', '2023-07-13 19:51:07', ''),
(10, '', '64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg [File: <a href=\"uploads/64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg\" target=\"_blank\">64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg</a>]', 'me', '2023-07-13 20:20:18', ''),
(11, 'nnn', '64b04f0a89563_WhatsApp Image 2023-07-11 at 9.04.23 PM.jpeg [File: <a href=\"uploads/64b04f0a89563_WhatsApp Image 2023-07-11 at 9.04.23 PM.jpeg\" target=\"_blank\">64b04f0a89563_WhatsApp Image 2023-07-11 at 9.04.23 PM.jpeg</a>]', 'me', '2023-07-13 20:20:45', ''),
(12, 'nnn', '64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx', 'me', '2023-07-13 20:23:03', ''),
(13, 'nnn', '64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg', 'me', '2023-07-13 20:27:40', ''),
(14, 'nnn', '64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg', 'me', '2023-07-13 20:35:17', ''),
(15, 'nnn', '64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx', 'me', '2023-07-13 20:37:20', ''),
(16, 'nnn', '64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx', 'me', '2023-07-13 20:40:34', ''),
(17, 'michael', 'mmmm', 'me', '2023-07-13 21:29:20', ''),
(18, 'MICHAEL', '64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg', 'me', '2023-07-13 21:43:55', ''),
(19, '', 'mmm', 'me', '2023-07-13 22:10:01', ''),
(20, '', 'hhhhh', 'me', '2023-07-13 22:10:33', ''),
(21, 'MICHAEL', '64b04f0a89563_WhatsApp Image 2023-07-11 at 9.04.23 PM.jpeg', 'me', '2023-07-13 22:29:54', ''),
(22, 'JOSE', '64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx', 'me', '2023-07-14 06:11:13', ''),
(23, 'JOSE', 'dfgh', 'me', '2023-07-14 06:12:10', ''),
(24, 'JOSE', '64b046fff03c1_WhatsApp Image 2023-07-11 at 9.04.23 PM (1).jpeg', 'me', '2023-07-14 06:12:23', ''),
(25, 'MICHAEL', 'JJJJH', 'me', '2023-07-14 06:13:26', ''),
(26, 'JOSE', 'UUUUUU', 'me', '2023-07-14 06:16:25', ''),
(27, 'MICHAEL', '64b046965b709_JOSEPH MWANGI IRUNGU resume (1).docx', 'me', '2023-07-14 06:55:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'JOSE', '1234', 'JOSEPH@COM', '2023-07-13 21:36:31'),
(2, 'MICHAEL', '1234', 'MICHAI@HOM', '2023-07-13 21:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `users_chats`
--

CREATE TABLE `users_chats` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `chat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_chats`
--
ALTER TABLE `users_chats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_chats`
--
ALTER TABLE `users_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
