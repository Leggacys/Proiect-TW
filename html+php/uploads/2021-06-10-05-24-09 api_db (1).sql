-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 12:34 AM
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
-- Table structure for table `cursuri`
--

CREATE TABLE `cursuri` (
  `id_curs` int(11) NOT NULL,
  `cod_prezenta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cursuri`
--

INSERT INTO `cursuri` (`id_curs`, `cod_prezenta`) VALUES
(0, ''),
(0, ''),
(1, 'pfp8ORZo4B'),
(3, 'Mvzs3324ez'),
(3, 'Mvzs3324ez'),
(2, 'EJn1v452Ug');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_stud` int(11) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `valoare2` int(11) NOT NULL,
  `valoare3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_stud`, `id_curs`, `valoare`, `valoare2`, `valoare3`) VALUES
(5, 1, 0, 0, 0),
(5, 2, 0, 0, 0),
(5, 3, 0, 0, 0),
(3, 1, 0, 0, 0),
(3, 2, 0, 0, 0),
(3, 3, 0, 0, 0),
(6, 1, 0, 0, 0),
(6, 2, 0, 0, 0),
(6, 3, 0, 0, 0),
(7, 1, 0, 0, 0),
(7, 2, 0, 0, 0),
(7, 3, 0, 0, 0),
(9, 1, 0, 0, 0),
(9, 2, 0, 0, 0),
(9, 3, 0, 0, 0),
(11, 1, 0, 0, 0),
(11, 2, 0, 0, 0),
(11, 3, 0, 0, 0),
(10, 1, 0, 0, 0),
(10, 2, 0, 0, 0),
(10, 3, 0, 0, 0),
(12, 1, 0, 0, 0),
(12, 2, 0, 0, 0),
(12, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id_prof` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `id_curs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statistica`
--

CREATE TABLE `statistica` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL,
  `uploaded_at` date NOT NULL DEFAULT current_timestamp(),
  `course` varchar(255) NOT NULL,
  `id_stud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `name`, `new_name`, `uploaded_at`, `course`, `id_stud`) VALUES
(1, 'amg.jpg', '2021-05-15-18-54-33 amg.jpg', '2021-05-15', 'unknown', 0),
(2, 'amg.jpg', '2021-05-15-18-54-37 amg.jpg', '2021-05-15', 'unknown', 0),
(3, 'tenor.gif', '2021-05-15-18-55-33 tenor.gif', '2021-05-15', 'unknown', 0),
(4, 'tenor.gif', '2021-05-15-18-55-39 tenor.gif', '2021-05-15', 'unknown', 0),
(5, 'Audi interior.jpg', '2021-05-15-18-55-44 Audi interior.jpg', '2021-05-15', 'unknown', 0),
(6, 'amg.jpg', '2021-05-15-18-55-57 amg.jpg', '2021-05-15', 'unknown', 0),
(7, 'passat.jpg', '2021-05-15-18-56-15 passat.jpg', '2021-05-15', 'unknown', 0),
(8, 'Audi interior.jpg', '2021-05-15-18-56-31 Audi interior.jpg', '2021-05-15', 'unknown', 0),
(9, 'AMG C63.jpg', '2021-05-15-18-56-42 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(10, 'amg.jpg', '2021-05-15-18-57-10 amg.jpg', '2021-05-15', 'unknown', 0),
(11, 'A7 2020.jpg', '2021-05-15-19-00-13 A7 2020.jpg', '2021-05-15', 'unknown', 0),
(12, 'tenor.gif', '2021-05-15-19-17-46 tenor.gif', '2021-05-15', 'unknown', 0),
(13, 'AMG C63.jpg', '2021-05-15-19-24-56 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(14, 'amg.jpg', '2021-05-15-19-27-22 amg.jpg', '2021-05-15', 'unknown', 0),
(15, 'cls 63.jpg', '2021-05-15-19-27-36 cls 63.jpg', '2021-05-15', 'unknown', 0),
(16, 'passat.jpg', '2021-05-15-19-48-41 passat.jpg', '2021-05-15', 'unknown', 0),
(17, 'AMG C63.jpg', '2021-05-15-20-27-50 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(18, 'AMG C63.jpg', '2021-05-15-20-29-04 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(19, 'AMG C63.jpg', '2021-05-15-20-29-44 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(20, 'A7 2020.jpg', '2021-05-15-20-31-15 A7 2020.jpg', '2021-05-15', 'unknown', 0),
(21, 'passat.jpg', '2021-05-15-20-32-49 passat.jpg', '2021-05-15', 'unknown', 0),
(22, 'tenor.gif', '2021-05-15-20-35-46 tenor.gif', '2021-05-15', 'unknown', 0),
(23, 'amg.jpg', '2021-05-15-20-36-12 amg.jpg', '2021-05-15', 'unknown', 0),
(24, 'AMG C63.jpg', '2021-05-15-20-37-45 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(25, 'g700.jpg', '2021-05-15-20-38-30 g700.jpg', '2021-05-15', 'unknown', 0),
(26, 'A7 2020.jpg', '2021-05-15-20-39-12 A7 2020.jpg', '2021-05-15', 'unknown', 0),
(27, 'g700.jpg', '2021-05-15-20-40-55 g700.jpg', '2021-05-15', 'unknown', 0),
(28, 'passat.jpg', '2021-05-15-20-41-29 passat.jpg', '2021-05-15', 'unknown', 0),
(29, 'A7 2020.jpg', '2021-05-15-20-45-27 A7 2020.jpg', '2021-05-15', 'unknown', 0),
(30, 'passat.jpg', '2021-05-15-20-47-13 passat.jpg', '2021-05-15', 'unknown', 0),
(31, 'AMG C63.jpg', '2021-05-15-20-49-37 AMG C63.jpg', '2021-05-15', 'unknown', 0),
(32, 'passat.jpg', '2021-05-15-20-50-03 passat.jpg', '2021-05-15', 'unknown', 0),
(33, 'passat.jpg', '2021-05-15-20-50-30 passat.jpg', '2021-05-15', 'unknown', 0),
(34, 'g700.jpg', '2021-05-15-20-52-07 g700.jpg', '2021-05-15', 'unknown', 0),
(35, 'A7 2020.jpg', '2021-05-15-20-53-30 A7 2020.jpg', '2021-05-15', 'unknown', 0),
(36, 'passat.jpg', '2021-05-15-20-54-04 passat.jpg', '2021-05-15', 'unknown', 0),
(37, 'A7 2020.jpg', '2021-05-15-20-55-09 A7 2020.jpg', '2021-05-15', 'unknown', 0),
(38, 'passat.jpg', '2021-05-15-20-57-14 passat.jpg', '2021-05-15', 'unknown', 0),
(39, 'tenor.gif', '2021-05-15-21-02-05 tenor.gif', '2021-05-16', 'unknown', 0),
(40, 'amg.jpg', '2021-05-15-21-02-24 amg.jpg', '2021-05-16', 'unknown', 0),
(41, 'AMG C63.jpg', '2021-05-15-21-06-22 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(42, 'tenor.gif', '2021-05-15-21-10-48 tenor.gif', '2021-05-16', 'unknown', 0),
(43, 'tenor.gif', '2021-05-15-21-12-30 tenor.gif', '2021-05-16', 'unknown', 0),
(44, 'tenor.gif', '2021-05-15-21-12-49 tenor.gif', '2021-05-16', 'unknown', 0),
(45, 'tenor.gif', '2021-05-15-21-15-10 tenor.gif', '2021-05-16', 'unknown', 0),
(46, 'amg.jpg', '2021-05-15-21-15-57 amg.jpg', '2021-05-16', 'unknown', 0),
(47, 'AMG C63.jpg', '2021-05-15-21-16-34 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(48, 'amg.jpg', '2021-05-15-21-17-21 amg.jpg', '2021-05-16', 'unknown', 0),
(49, 'tenor.gif', '2021-05-15-21-17-40 tenor.gif', '2021-05-16', 'unknown', 0),
(50, 'passat.jpg', '2021-05-15-21-18-05 passat.jpg', '2021-05-16', 'unknown', 0),
(51, 'tenor.gif', '2021-05-15-21-34-04 tenor.gif', '2021-05-16', 'unknown', 0),
(52, 'amg.jpg', '2021-05-15-21-38-42 amg.jpg', '2021-05-16', 'unknown', 0),
(53, 'passat.jpg', '2021-05-15-21-47-38 passat.jpg', '2021-05-16', 'unknown', 0),
(54, 'tenor.gif', '2021-05-15-21-52-07 tenor.gif', '2021-05-16', 'unknown', 0),
(55, 'AMG C63.jpg', '2021-05-15-22-01-09 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(56, 'tenor.gif', '2021-05-15-22-04-07 tenor.gif', '2021-05-16', 'unknown', 0),
(57, 'AMG C63.jpg', '2021-05-15-22-04-32 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(58, 'tenor.gif', '2021-05-15-22-05-07 tenor.gif', '2021-05-16', 'unknown', 0),
(59, 'tenor.gif', '2021-05-15-22-05-38 tenor.gif', '2021-05-16', 'unknown', 0),
(60, 'tenor.gif', '2021-05-15-22-06-37 tenor.gif', '2021-05-16', 'unknown', 0),
(61, 'tenor.gif', '2021-05-15-22-10-19 tenor.gif', '2021-05-16', 'unknown', 0),
(62, 'amg.jpg', '2021-05-15-22-10-45 amg.jpg', '2021-05-16', 'unknown', 0),
(63, 'tenor.gif', '2021-05-15-22-11-25 tenor.gif', '2021-05-16', 'unknown', 0),
(64, 'tenor.gif', '2021-05-15-22-14-11 tenor.gif', '2021-05-16', 'unknown', 0),
(65, 'passat.jpg', '2021-05-15-22-14-32 passat.jpg', '2021-05-16', 'unknown', 0),
(66, 'tenor.gif', '2021-05-15-22-14-46 tenor.gif', '2021-05-16', 'unknown', 0),
(67, 'tenor.gif', '2021-05-15-22-15-35 tenor.gif', '2021-05-16', 'unknown', 0),
(68, 'tenor.gif', '2021-05-15-22-16-12 tenor.gif', '2021-05-16', 'unknown', 0),
(69, 'tenor.gif', '2021-05-15-22-16-38 tenor.gif', '2021-05-16', 'unknown', 0),
(70, 'passat.jpg', '2021-05-15-22-18-10 passat.jpg', '2021-05-16', 'unknown', 0),
(71, 'passat.jpg', '2021-05-15-22-19-59 passat.jpg', '2021-05-16', 'unknown', 0),
(72, 'passat.jpg', '2021-05-15-22-20-29 passat.jpg', '2021-05-16', 'unknown', 0),
(73, 'tenor.gif', '2021-05-15-22-22-02 tenor.gif', '2021-05-16', 'unknown', 0),
(74, 'tenor.gif', '2021-05-15-22-23-27 tenor.gif', '2021-05-16', 'unknown', 0),
(75, 'tenor.gif', '2021-05-15-22-23-57 tenor.gif', '2021-05-16', 'unknown', 0),
(76, 'tenor.gif', '2021-05-15-22-28-25 tenor.gif', '2021-05-16', 'unknown', 0),
(77, 'tenor.gif', '2021-05-15-22-28-51 tenor.gif', '2021-05-16', 'unknown', 0),
(78, 'tenor.gif', '2021-05-15-22-29-07 tenor.gif', '2021-05-16', 'unknown', 0),
(79, 'tenor.gif', '2021-05-15-22-31-45 tenor.gif', '2021-05-16', 'unknown', 0),
(80, 'tenor.gif', '2021-05-15-22-32-11 tenor.gif', '2021-05-16', 'unknown', 0),
(81, 'tenor.gif', '2021-05-15-22-32-40 tenor.gif', '2021-05-16', 'unknown', 0),
(82, 'tenor.gif', '2021-05-15-22-33-54 tenor.gif', '2021-05-16', 'unknown', 0),
(83, 'tenor.gif', '2021-05-15-22-34-23 tenor.gif', '2021-05-16', 'unknown', 0),
(84, 'tenor.gif', '2021-05-15-22-34-54 tenor.gif', '2021-05-16', 'unknown', 0),
(85, 'tenor.gif', '2021-05-15-22-36-09 tenor.gif', '2021-05-16', 'unknown', 0),
(86, 'tenor.gif', '2021-05-15-22-36-35 tenor.gif', '2021-05-16', 'unknown', 0),
(87, 'AMG C63.jpg', '2021-05-15-22-37-28 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(88, 'amg.jpg', '2021-05-15-22-38-07 amg.jpg', '2021-05-16', 'unknown', 0),
(89, 'tenor.gif', '2021-05-15-22-40-52 tenor.gif', '2021-05-16', 'unknown', 0),
(90, 'tenor.gif', '2021-05-15-22-41-39 tenor.gif', '2021-05-16', 'unknown', 0),
(91, 'tenor.gif', '2021-05-15-22-42-34 tenor.gif', '2021-05-16', 'unknown', 0),
(92, 'tenor.gif', '2021-05-15-22-43-31 tenor.gif', '2021-05-16', 'unknown', 0),
(93, 'tenor.gif', '2021-05-15-22-47-33 tenor.gif', '2021-05-16', 'unknown', 0),
(94, 'tenor.gif', '2021-05-15-22-48-31 tenor.gif', '2021-05-16', 'unknown', 0),
(95, 'tenor.gif', '2021-05-15-22-49-05 tenor.gif', '2021-05-16', 'unknown', 0),
(96, 'tenor.gif', '2021-05-15-22-49-58 tenor.gif', '2021-05-16', 'unknown', 0),
(97, 'tenor.gif', '2021-05-15-22-50-31 tenor.gif', '2021-05-16', 'unknown', 0),
(98, 'passat.jpg', '2021-05-15-22-51-56 passat.jpg', '2021-05-16', 'unknown', 0),
(99, 'passat.jpg', '2021-05-15-22-53-22 passat.jpg', '2021-05-16', 'unknown', 0),
(100, 'passat.jpg', '2021-05-15-22-54-06 passat.jpg', '2021-05-16', 'unknown', 0),
(101, 'passat.jpg', '2021-05-15-22-57-26 passat.jpg', '2021-05-16', 'unknown', 0),
(102, 'tenor.gif', '2021-05-15-22-58-55 tenor.gif', '2021-05-16', 'unknown', 0),
(103, 'tenor.gif', '2021-05-15-23-01-44 tenor.gif', '2021-05-16', 'unknown', 0),
(104, 'tenor.gif', '2021-05-16-01-03-19 tenor.gif', '2021-05-16', 'unknown', 0),
(105, 'tenor.gif', '2021-05-16-01-04-46 tenor.gif', '2021-05-16', 'unknown', 0),
(106, 'AMG C63.jpg', '2021-05-15-23-09-16 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(107, 'tenor.gif', '2021-05-15-23-17-28 tenor.gif', '2021-05-16', 'unknown', 0),
(108, 'amg.jpg', '2021-05-15-23-18-27 amg.jpg', '2021-05-16', 'unknown', 0),
(109, 'tenor.gif', '2021-05-15-23-27-54 tenor.gif', '2021-05-16', 'unknown', 0),
(110, 'tenor.gif', '2021-05-15-23-36-55 tenor.gif', '2021-05-16', 'unknown', 0),
(111, 'amg.jpg', '2021-05-15-23-50-53 amg.jpg', '2021-05-16', 'unknown', 0),
(112, 'amg.jpg', '2021-05-15-23-51-32 amg.jpg', '2021-05-16', 'unknown', 0),
(113, 'AMG C63.jpg', '2021-05-16-00-02-17 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(114, 'tenor.gif', '2021-05-16-00-03-27 tenor.gif', '2021-05-16', 'unknown', 0),
(115, 'tenor.gif', '2021-05-16-00-04-21 tenor.gif', '2021-05-16', 'unknown', 0),
(116, 'tenor.gif', '2021-05-16-00-10-55 tenor.gif', '2021-05-16', 'unknown', 0),
(117, 'tenor.gif', '2021-05-16-00-11-16 tenor.gif', '2021-05-16', 'unknown', 0),
(118, 'tenor.gif', '2021-05-16-00-13-57 tenor.gif', '2021-05-16', 'unknown', 0),
(119, 'tenor.gif', '2021-05-16-00-16-36 tenor.gif', '2021-05-16', 'unknown', 0),
(120, 'tenor.gif', '2021-05-16-00-20-42 tenor.gif', '2021-05-16', 'unknown', 0),
(121, 'tenor.gif', '2021-05-16-00-21-09 tenor.gif', '2021-05-16', 'unknown', 0),
(122, 'tenor.gif', '2021-05-16-00-21-40 tenor.gif', '2021-05-16', 'unknown', 0),
(123, 'tenor.gif', '2021-05-16-00-21-47 tenor.gif', '2021-05-16', 'unknown', 0),
(124, 'tenor.gif', '2021-05-16-00-22-04 tenor.gif', '2021-05-16', 'unknown', 0),
(125, 'tenor.gif', '2021-05-16-00-22-36 tenor.gif', '2021-05-16', 'unknown', 0),
(126, 'tenor.gif', '2021-05-16-00-24-22 tenor.gif', '2021-05-16', 'unknown', 0),
(127, 'tenor.gif', '2021-05-16-00-24-49 tenor.gif', '2021-05-16', 'unknown', 0),
(128, 'tenor.gif', '2021-05-16-00-29-44 tenor.gif', '2021-05-16', 'unknown', 0),
(129, 'tenor.gif', '2021-05-16-00-33-35 tenor.gif', '2021-05-16', 'unknown', 0),
(130, 'amg.jpg', '2021-05-16-00-35-16 amg.jpg', '2021-05-16', 'unknown', 0),
(131, 'amg.jpg', '2021-05-16-00-39-11 amg.jpg', '2021-05-16', 'unknown', 0),
(132, 'amg.jpg', '2021-05-16-00-40-09 amg.jpg', '2021-05-16', 'unknown', 0),
(133, 'tenor.gif', '2021-05-16-00-41-52 tenor.gif', '2021-05-16', 'unknown', 0),
(134, 'tenor.gif', '2021-05-16-00-42-14 tenor.gif', '2021-05-16', 'unknown', 0),
(135, 'tenor.gif', '2021-05-16-00-44-06 tenor.gif', '2021-05-16', 'unknown', 0),
(136, 'tenor.gif', '2021-05-16-00-46-48 tenor.gif', '2021-05-16', 'unknown', 0),
(137, 'tenor.gif', '2021-05-16-00-48-34 tenor.gif', '2021-05-16', 'unknown', 0),
(138, 'tenor.gif', '2021-05-16-00-49-14 tenor.gif', '2021-05-16', 'unknown', 0),
(139, 'tenor.gif', '2021-05-16-00-51-44 tenor.gif', '2021-05-16', 'unknown', 0),
(140, 'tenor.gif', '2021-05-16-00-52-22 tenor.gif', '2021-05-16', 'unknown', 0),
(141, 'tenor.gif', '2021-05-16-00-53-36 tenor.gif', '2021-05-16', 'unknown', 0),
(142, 'tenor.gif', '2021-05-16-00-54-03 tenor.gif', '2021-05-16', 'unknown', 0),
(143, 'tenor.gif', '2021-05-16-00-56-49 tenor.gif', '2021-05-16', 'unknown', 0),
(144, 'tenor.gif', '2021-05-16-00-57-38 tenor.gif', '2021-05-16', 'unknown', 0),
(145, 'tenor.gif', '2021-05-16-01-01-11 tenor.gif', '2021-05-16', 'unknown', 0),
(146, 'tenor.gif', '2021-05-16-01-02-22 tenor.gif', '2021-05-16', 'unknown', 0),
(147, 'AMG C63.jpg', '2021-05-16-01-07-29 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(148, 'Audi interior.jpg', '2021-05-16-01-08-08 Audi interior.jpg', '2021-05-16', 'unknown', 0),
(149, 'tenor.gif', '2021-05-16-01-09-06 tenor.gif', '2021-05-16', 'unknown', 0),
(150, 'AMG C63.jpg', '2021-05-16-01-13-32 AMG C63.jpg', '2021-05-16', 'unknown', 0),
(151, 'tenor.gif', '2021-05-16-01-14-16 tenor.gif', '2021-05-16', 'unknown', 0),
(152, 'tenor.gif', '2021-05-16-01-16-12 tenor.gif', '2021-05-16', 'unknown', 0),
(153, 'tenor.gif', '2021-05-16-01-16-56 tenor.gif', '2021-05-16', 'unknown', 0),
(154, 'amg.jpg', '2021-05-16-19-50-06 amg.jpg', '2021-05-16', 'unknown', 0),
(155, 'passat.jpg', '2021-05-19-18-15-30 passat.jpg', '2021-05-19', 'unknown', 0),
(156, 'Examene_Ses.pdf', '2021-06-07-17-35-48 Examene_Ses.pdf', '2021-06-07', 'unknown', 0),
(157, 'Examene_Ses.pdf', '2021-06-07-18-19-56 Examene_Ses.pdf', '2021-06-07', 'unknown', 0),
(158, 'Examene_Ses.pdf', '2021-06-07-18-23-23 Examene_Ses.pdf', '2021-06-07', 'unknown', 0),
(159, 'Tabel pentru judecători.docx', '2021-06-07-18-30-56 Tabel pentru judecători.docx', '2021-06-07', 'unknown', 0),
(160, 'Tabel Regi.jpg', '2021-06-07-18-39-16 Tabel Regi.jpg', '2021-06-07', 'unknown', 0),
(161, 'uploaded_files.sql', '2021-06-08-20-14-49 uploaded_files.sql', '2021-06-08', 'unknown', 0),
(162, 'RAR_istoric_vehicul (4) (1).pdf', '2021-06-08-20-28-47 RAR_istoric_vehicul (4) (1).pdf', '2021-06-08', 'unknown', 0),
(163, 'RAR_istoric_vehicul (4) (1) (1).pdf', '2021-06-08-20-30-27 RAR_istoric_vehicul (4) (1) (1).pdf', '2021-06-08', 'unknown', 0),
(164, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1).docx', '2021-06-08-20-49-07 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1).docx', '2021-06-08', 'unknown', 0),
(165, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1).docx', '2021-06-08-20-53-40 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1).docx', '2021-06-08', 'unknown', 0),
(166, 'uploaded_files (1).sql', '2021-06-08-20-59-02 uploaded_files (1).sql', '2021-06-08', 'unknown', 0),
(167, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1).docx', '2021-06-08-21-06-45 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1).docx', '2021-06-09', 'unknown', 0),
(168, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1).docx', '2021-06-08-22-32-22 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1).docx', '2021-06-09', 'unknown', 0),
(169, 'uploaded_files.sql', '2021-06-08-22-41-46 uploaded_files.sql', '2021-06-09', 'unknown', 0),
(170, 'uploaded_files (1) (1).sql', '2021-06-08-23-01-31 uploaded_files (1) (1).sql', '2021-06-09', 'unknown', 0),
(171, 'uploaded_files (1).sql', '2021-06-08-23-51-17 uploaded_files (1).sql', '2021-06-09', 'unknown', 0),
(172, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1).docx', '2021-06-08-23-52-08 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1).docx', '2021-06-09', 'unknown', 0),
(173, 'Semian_EN.pdf', '2021-06-09-00-31-02 Semian_EN.pdf', '2021-06-09', 'unknown', 0),
(174, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1) (2).docx', '2021-06-09-02-31-55 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1) (2).docx', '2021-06-09', 'unknown', 0),
(175, 'Semian_A.pdf', '2021-06-09-02-32-05 Semian_A.pdf', '2021-06-09', 'unknown', 0),
(176, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1) (1).docx', '2021-06-09-02-34-54 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1) (1).docx', '2021-06-09', 'unknown', 0),
(177, 'PLSQL9-DBMS_SQL.docx', '2021-06-09-02-37-44 PLSQL9-DBMS_SQL.docx', '2021-06-09', 'unknown', 71),
(178, 'TeamWork_template.xlsx', '2021-06-09-02-38-45 TeamWork_template.xlsx', '2021-06-09', 'unknown', 71),
(179, 'CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1) (2).docx', '2021-06-09-00-42-16 CV CONSTANTINESCU GEORGE-GABRIEL 2021 (1) (1) (2).docx', '2021-06-09', 'unknown', 0),
(180, 'RAR_istoric_vehicul (4) (1) (1).pdf', '2021-06-09-00-44-36 RAR_istoric_vehicul (4) (1) (1).pdf', '2021-06-09', 'unknown', 71),
(181, 'doron-bosome-shoving-to-in-noonobalo-Cowp-a-cribue (1).pdf', '2021-06-09-00-47-06 doron-bosome-shoving-to-in-noonobalo-Cowp-a-cribue (1).pdf', '2021-06-09', 'unknown', 70),
(182, 'Semian_A.pdf', '2021-06-09-01-07-07 Semian_A.pdf', '2021-06-09', 'unknown', 71),
(183, 'Stan_Andrei_-_E13_-_Examen_PA-min.pdf', '2021-06-09-01-41-35 Stan_Andrei_-_E13_-_Examen_PA-min.pdf', '2021-06-09', 'unknown', 71),
(184, 'Semian_EN.pdf', '2021-06-09-09-05-58 Semian_EN.pdf', '2021-06-09', 'unknown', 71),
(185, 'message (34).txt', '2021-06-09-15-29-00 message (34).txt', '2021-06-09', 'unknown', 3),
(186, 'message (34).txt', '2021-06-09-15-29-01 message (34).txt', '2021-06-09', 'unknown', 3),
(187, 'Semian_A.pdf', '2021-06-09-15-36-54 Semian_A.pdf', '2021-06-09', 'unknown', 3),
(188, 'uploaded_files (1) (2).sql', '2021-06-09-17-56-45 uploaded_files (1) (2).sql', '2021-06-09', 'unknown', 3),
(189, 'Semian_EN (1).pdf', '2021-06-09-19-17-54 Semian_EN (1).pdf', '2021-06-09', 'unknown', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(256) CHARACTER SET latin1 NOT NULL,
  `email` varchar(256) CHARACTER SET latin1 NOT NULL,
  `parola` varchar(2048) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` varchar(2901) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `parola`, `created`, `modified`, `rol`) VALUES
(1, 'LupuFilotei', 'aabb', 'filotei@yahoo.com', '$2y$10$DOUhc65aM6UAHUjLJa1MvOM6hgU.imNnYxR9kReTx3B2/3OdUd8rG', '2021-06-09 14:42:54', '2021-06-09 11:57:49', '0'),
(2, 'profesorul', 'aaa', 'profesor@gmail.com', '$2y$10$Dv4qFeSEHsfcePBkmE8cKOZ72pqfKYAsbo7XtpPjh2F4.I//2aZ6q', '2021-06-09 14:47:27', '2021-06-09 11:55:44', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(3, 'cezarus', 'cezar', 'gabi_steam@yahoo.com', '$2y$10$Xsls9R04DI5U/RSIzGhAI.8YgVLJnaDMOY6Eg6rqPUZndyG7Un4gG', '2021-06-09 14:53:14', '2021-06-09 11:57:51', '0'),
(4, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$YBhKDurkKyLCnwYKabWzjeELcQ/KKM4LStPYBbntpYtId7tTjRW.i', '2021-06-09 15:18:55', '2021-06-09 20:02:51', '0'),
(5, 'bbb', 'bb', 'bbb@ccc.dd', '$2y$10$SueIyrpZbYKy9jbcvd65Junsp9n/4RfGK/NsY839xZoV2G2jE2AJy', '2021-06-09 15:51:24', '2021-06-09 20:02:54', '0'),
(6, 'daniel', 'aaa', 'daniel@gabi.ro', '$2y$10$pCSeID5zxqdsfS3hQqB/SOoUIqwUDHf14ukNrYwQtAHd31AzALfJa', '2021-06-09 18:48:25', '2021-06-09 20:02:56', '0'),
(7, 'marian', 'marian', 'asfasfasf@asfsfaasf.com', '$2y$10$nl0wNUDc6F6lg1XvmbKm5ODc3q90r9qek2noHsv7I3EHU8o3tqUWG', '2021-06-09 18:58:37', '2021-06-09 20:02:58', '0'),
(8, '\'gabi\'', 'gabi', 'gabi_steam@yahoo.com', '$2y$10$5jKmYkkY5kYsGCmm/zQGp.Q7XbJH2G5H4Be9RJeLCssSIYqGSe5ju', '2021-06-09 21:36:37', '2021-06-09 20:03:00', '0'),
(9, 'bogatu', 'daniel', 'bogatu@gmail.com', '$2y$10$YxcgYcdtzFTQ9fX6qiZc9.QylETtP1AFnxR3waBkW3/sj6VfjB95q', '2021-06-09 23:13:59', '2021-06-09 20:17:26', '0'),
(10, 'roxana', 'rox', 'roxana@romania.ro', '$2y$10$OdrP0V1YUipPQD4BbK4yGONFDADTrtnagCd0fwSBtBMP.WWuPiOGi', '2021-06-09 23:21:15', '2021-06-09 20:27:37', '0'),
(11, 'cezarus22', 'gg', 'gabi_steam@yahoo.com', '$2y$10$LOBBLo8MVDvFx3B0lqCQc.htnwIugu1uI.HVO.AQA.CJ/dNe9XODa', '2021-06-09 23:27:29', '2021-06-09 20:27:29', '0'),
(12, 'cezarus223', 'gg', 'gabi_steam@yahoo.com', '$2y$10$iY4cTJo59vNigLFsiM7o6usspusyYy2LYqUdRmb9NlsYZFZdJlwem', '2021-06-09 23:40:59', '2021-06-09 20:40:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(256) CHARACTER SET latin1 NOT NULL,
  `email` varchar(256) CHARACTER SET latin1 NOT NULL,
  `parola` varchar(2048) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` varchar(2901) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `firstname`, `lastname`, `email`, `parola`, `created`, `modified`, `rol`) VALUES
(8, '\'gabi\'', 'gabi', 'gabi_steam@yahoo.com', '$2y$10$LwQT81MgSB7mmakevvubBOCpzNJjK3f6cYA/OfYtIwsVfiJf1nM2O', '2021-06-09 21:36:38', '2021-06-09 18:36:38', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD KEY `utilizator-nota` (`id_stud`),
  ADD KEY `curs-nota` (`id_curs`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD KEY `prof-id_curs` (`id_curs`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `curs-nota` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `utilizator-nota` FOREIGN KEY (`id_stud`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `prof-id_curs` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
