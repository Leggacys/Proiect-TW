-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 08:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(256) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(256) CHARACTER SET latin1 NOT NULL,
  `email` varchar(256) CHARACTER SET latin1 NOT NULL,
  `parola` varchar(2048) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` varchar(2901) NOT NULL DEFAULT '0',
  `year` varchar(255) NOT NULL,
  `semian` varchar(255) NOT NULL,
  `grup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `parola`, `created`, `modified`, `rol`, `year`, `semian`, `grup`) VALUES
(1, '', 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$P12apYp3//GouRxu05QVceEhzbzooNijUzmQlDDHBdF6PnhhuXPqS', '2021-06-13 19:18:44', '2021-06-13 16:18:44', '0', '', '', ''),
(2, 'cezarus', 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$0WvzX1XERPQcnwzl.DLBv.zzVCSP9b1KTxu7nPXA.sNJueEsKZjFC', '2021-06-13 19:23:01', '2021-06-13 16:23:01', '0', '', '', ''),
(3, 'georgegabrieconstantines', 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$xOlvNPuH9WXZ5OL2Pp00ruKZaJ8xpQuUEAneWImX1rskCE2veSbou', '2021-06-13 19:27:01', '2021-06-13 16:27:01', 'student', '', '', ''),
(4, 'cezarus', 'Gabriel', 'Constantinescu', 'george.constantinescu@info.uaic.ro', '$2y$10$xFAQ0X.ewVAV7wFeu2hh8OUipm8QX8bDU8DRmH3Z7Iea35mO.9e1u', '2021-06-13 19:30:31', '2021-06-13 16:30:31', 'student', '1', 'A', '1'),
(5, 'leggacy', 'Bogatu', 'Daniel', 'bogatu.daniel@yahoo.com', '$2y$10$kpEFyA.IXcVh.lwDSw9r4ew9hjFngg.hRu3YlfAr4wJv8vlOYJSNm', '2021-06-13 19:31:29', '2021-06-13 16:31:29', 'student', '2', 'E', '3'),
(6, 'gigi', 'gigi', 'gigi', 'gigi@gigi.gigi', '$2y$10$Uie/HnRIsc5gHFGajuhb0uYe5oXji8qRRKM1L20gc77OknitcVTm6', '2021-06-13 19:31:58', '2021-06-13 16:31:58', 'teacher', '', '', ''),
(7, 'gabi', 'Gabriel', 'Constantinescu', 'gabi@gabi.gabi', '$2y$10$4.qbXbc9QOfKHqKMxrZo3uS94UPJBy5cADY9vitlsk72EjqzSRpgO', '2021-06-13 19:40:39', '2021-06-13 16:40:39', 'student', '2', 'E', '3'),
(8, 'lupusor', 'Lupu', 'Cezar', 'lupu.cezar@gmail.com', '$2y$10$rFF.lM.ymaSQhgdO1o0x9.egBxfqBUavwUuYW1Y6/gM.1ImjrCrDm', '2021-06-13 20:07:05', '2021-06-13 17:07:05', 'student', '2', 'E', '4'),
(9, 'mimi', 'mimi', 'mimi', 'mimi@mimi.mimi', '$2y$10$KmA2Wwqg855ej1sUQCiBxu9YVpdgU0jcWmS/UwsFz1FFOpCGb6r92', '2021-06-13 20:16:13', '2021-06-13 17:16:13', 'student', '1', 'A', '1'),
(10, 'iceeye7', 'Gabi', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$bmPtwJDhKeqfNEFMFUlDL.4PiN8XsCh6lPTAZDBdjmMC7y4x3U/4m', '2021-06-13 20:57:36', '2021-06-13 17:57:36', 'student', '2', 'E', '3'),
(11, 'maria', 'Maria', 'Andreea', 'gabi@gabi.gabi', '$2y$10$nRcnQ7IUasE3RmrCQgo.i.dH.fxKsWzCyWt4rLGQrpQ0iptiDPKhW', '2021-06-14 12:41:51', '2021-06-14 09:41:51', 'student', '2', 'B', '2'),
(12, 'marian22', 'Marian', 'Craiova', 'marian.craiova@yahoo.com', '$2y$10$8P4FTwHRP.P6JEEPYWHuEOGAvLX3/3UrbQfZaT3WuuZb5s18doftq', '2021-06-14 17:53:52', '2021-06-14 14:53:52', 'student', '3', 'B', '1'),
(13, 'bibel', 'bibel', 'mihai', 'bibel@gg.gg', '$2y$10$7OXyzyszQvGck18y83j2IuBUfEyzGf.jjCpGymrv3JjNuXz/4AOIm', '2021-06-14 19:08:32', '2021-06-14 16:08:32', 'student', '2', 'B', '6'),
(15, 'admin', 'George', 'Constantin', 'admin@admin.admin', '$2y$10$Wz4mTA8DUsYOHeOn.c./a.sNOn6Zf/riin1kRkyOgqKiyNK6QXca6', '2021-06-14 21:35:35', '2021-06-14 18:36:27', 'admin', '', '', ''),
(16, 'gege', 'Mihai', 'Georgescu', 'george.constantinescu@info.uaic.ro', '$2y$10$UOwBhnYX7AAEheyHmDpHWO7jeSp.jvAC6HnBTVir4POsJZ1JGi2XG', '2021-06-14 22:42:21', '2021-06-14 19:42:21', 'teacher', '', '', ''),
(20, 'gigi456', 'Apple', 'Costel', 'gabi@gabi.gabi', '$2y$10$Oc4Izf9hw4RiYcPssTJmIe4RERKE3qqvCN6IvtCaGF2TnRW2xHs6q', '2021-06-14 23:04:52', '2021-06-14 20:05:12', 'teacher', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
