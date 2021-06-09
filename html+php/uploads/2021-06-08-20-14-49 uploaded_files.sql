-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 07, 2021 la 08:59 PM
-- Versiune server: 10.4.19-MariaDB
-- Versiune PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `file_upload`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL,
  `uploaded_at` date NOT NULL DEFAULT current_timestamp(),
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `name`, `new_name`, `uploaded_at`, `course`) VALUES
(1, 'amg.jpg', '2021-05-15-18-54-33 amg.jpg', '2021-05-15', 'unknown'),
(2, 'amg.jpg', '2021-05-15-18-54-37 amg.jpg', '2021-05-15', 'unknown'),
(3, 'tenor.gif', '2021-05-15-18-55-33 tenor.gif', '2021-05-15', 'unknown'),
(4, 'tenor.gif', '2021-05-15-18-55-39 tenor.gif', '2021-05-15', 'unknown'),
(5, 'Audi interior.jpg', '2021-05-15-18-55-44 Audi interior.jpg', '2021-05-15', 'unknown'),
(6, 'amg.jpg', '2021-05-15-18-55-57 amg.jpg', '2021-05-15', 'unknown'),
(7, 'passat.jpg', '2021-05-15-18-56-15 passat.jpg', '2021-05-15', 'unknown'),
(8, 'Audi interior.jpg', '2021-05-15-18-56-31 Audi interior.jpg', '2021-05-15', 'unknown'),
(9, 'AMG C63.jpg', '2021-05-15-18-56-42 AMG C63.jpg', '2021-05-15', 'unknown'),
(10, 'amg.jpg', '2021-05-15-18-57-10 amg.jpg', '2021-05-15', 'unknown'),
(11, 'A7 2020.jpg', '2021-05-15-19-00-13 A7 2020.jpg', '2021-05-15', 'unknown'),
(12, 'tenor.gif', '2021-05-15-19-17-46 tenor.gif', '2021-05-15', 'unknown'),
(13, 'AMG C63.jpg', '2021-05-15-19-24-56 AMG C63.jpg', '2021-05-15', 'unknown'),
(14, 'amg.jpg', '2021-05-15-19-27-22 amg.jpg', '2021-05-15', 'unknown'),
(15, 'cls 63.jpg', '2021-05-15-19-27-36 cls 63.jpg', '2021-05-15', 'unknown'),
(16, 'passat.jpg', '2021-05-15-19-48-41 passat.jpg', '2021-05-15', 'unknown'),
(17, 'AMG C63.jpg', '2021-05-15-20-27-50 AMG C63.jpg', '2021-05-15', 'unknown'),
(18, 'AMG C63.jpg', '2021-05-15-20-29-04 AMG C63.jpg', '2021-05-15', 'unknown'),
(19, 'AMG C63.jpg', '2021-05-15-20-29-44 AMG C63.jpg', '2021-05-15', 'unknown'),
(20, 'A7 2020.jpg', '2021-05-15-20-31-15 A7 2020.jpg', '2021-05-15', 'unknown'),
(21, 'passat.jpg', '2021-05-15-20-32-49 passat.jpg', '2021-05-15', 'unknown'),
(22, 'tenor.gif', '2021-05-15-20-35-46 tenor.gif', '2021-05-15', 'unknown'),
(23, 'amg.jpg', '2021-05-15-20-36-12 amg.jpg', '2021-05-15', 'unknown'),
(24, 'AMG C63.jpg', '2021-05-15-20-37-45 AMG C63.jpg', '2021-05-15', 'unknown'),
(25, 'g700.jpg', '2021-05-15-20-38-30 g700.jpg', '2021-05-15', 'unknown'),
(26, 'A7 2020.jpg', '2021-05-15-20-39-12 A7 2020.jpg', '2021-05-15', 'unknown'),
(27, 'g700.jpg', '2021-05-15-20-40-55 g700.jpg', '2021-05-15', 'unknown'),
(28, 'passat.jpg', '2021-05-15-20-41-29 passat.jpg', '2021-05-15', 'unknown'),
(29, 'A7 2020.jpg', '2021-05-15-20-45-27 A7 2020.jpg', '2021-05-15', 'unknown'),
(30, 'passat.jpg', '2021-05-15-20-47-13 passat.jpg', '2021-05-15', 'unknown'),
(31, 'AMG C63.jpg', '2021-05-15-20-49-37 AMG C63.jpg', '2021-05-15', 'unknown'),
(32, 'passat.jpg', '2021-05-15-20-50-03 passat.jpg', '2021-05-15', 'unknown'),
(33, 'passat.jpg', '2021-05-15-20-50-30 passat.jpg', '2021-05-15', 'unknown'),
(34, 'g700.jpg', '2021-05-15-20-52-07 g700.jpg', '2021-05-15', 'unknown'),
(35, 'A7 2020.jpg', '2021-05-15-20-53-30 A7 2020.jpg', '2021-05-15', 'unknown'),
(36, 'passat.jpg', '2021-05-15-20-54-04 passat.jpg', '2021-05-15', 'unknown'),
(37, 'A7 2020.jpg', '2021-05-15-20-55-09 A7 2020.jpg', '2021-05-15', 'unknown'),
(38, 'passat.jpg', '2021-05-15-20-57-14 passat.jpg', '2021-05-15', 'unknown'),
(39, 'tenor.gif', '2021-05-15-21-02-05 tenor.gif', '2021-05-16', 'unknown'),
(40, 'amg.jpg', '2021-05-15-21-02-24 amg.jpg', '2021-05-16', 'unknown'),
(41, 'AMG C63.jpg', '2021-05-15-21-06-22 AMG C63.jpg', '2021-05-16', 'unknown'),
(42, 'tenor.gif', '2021-05-15-21-10-48 tenor.gif', '2021-05-16', 'unknown'),
(43, 'tenor.gif', '2021-05-15-21-12-30 tenor.gif', '2021-05-16', 'unknown'),
(44, 'tenor.gif', '2021-05-15-21-12-49 tenor.gif', '2021-05-16', 'unknown'),
(45, 'tenor.gif', '2021-05-15-21-15-10 tenor.gif', '2021-05-16', 'unknown'),
(46, 'amg.jpg', '2021-05-15-21-15-57 amg.jpg', '2021-05-16', 'unknown'),
(47, 'AMG C63.jpg', '2021-05-15-21-16-34 AMG C63.jpg', '2021-05-16', 'unknown'),
(48, 'amg.jpg', '2021-05-15-21-17-21 amg.jpg', '2021-05-16', 'unknown'),
(49, 'tenor.gif', '2021-05-15-21-17-40 tenor.gif', '2021-05-16', 'unknown'),
(50, 'passat.jpg', '2021-05-15-21-18-05 passat.jpg', '2021-05-16', 'unknown'),
(51, 'tenor.gif', '2021-05-15-21-34-04 tenor.gif', '2021-05-16', 'unknown'),
(52, 'amg.jpg', '2021-05-15-21-38-42 amg.jpg', '2021-05-16', 'unknown'),
(53, 'passat.jpg', '2021-05-15-21-47-38 passat.jpg', '2021-05-16', 'unknown'),
(54, 'tenor.gif', '2021-05-15-21-52-07 tenor.gif', '2021-05-16', 'unknown'),
(55, 'AMG C63.jpg', '2021-05-15-22-01-09 AMG C63.jpg', '2021-05-16', 'unknown'),
(56, 'tenor.gif', '2021-05-15-22-04-07 tenor.gif', '2021-05-16', 'unknown'),
(57, 'AMG C63.jpg', '2021-05-15-22-04-32 AMG C63.jpg', '2021-05-16', 'unknown'),
(58, 'tenor.gif', '2021-05-15-22-05-07 tenor.gif', '2021-05-16', 'unknown'),
(59, 'tenor.gif', '2021-05-15-22-05-38 tenor.gif', '2021-05-16', 'unknown'),
(60, 'tenor.gif', '2021-05-15-22-06-37 tenor.gif', '2021-05-16', 'unknown'),
(61, 'tenor.gif', '2021-05-15-22-10-19 tenor.gif', '2021-05-16', 'unknown'),
(62, 'amg.jpg', '2021-05-15-22-10-45 amg.jpg', '2021-05-16', 'unknown'),
(63, 'tenor.gif', '2021-05-15-22-11-25 tenor.gif', '2021-05-16', 'unknown'),
(64, 'tenor.gif', '2021-05-15-22-14-11 tenor.gif', '2021-05-16', 'unknown'),
(65, 'passat.jpg', '2021-05-15-22-14-32 passat.jpg', '2021-05-16', 'unknown'),
(66, 'tenor.gif', '2021-05-15-22-14-46 tenor.gif', '2021-05-16', 'unknown'),
(67, 'tenor.gif', '2021-05-15-22-15-35 tenor.gif', '2021-05-16', 'unknown'),
(68, 'tenor.gif', '2021-05-15-22-16-12 tenor.gif', '2021-05-16', 'unknown'),
(69, 'tenor.gif', '2021-05-15-22-16-38 tenor.gif', '2021-05-16', 'unknown'),
(70, 'passat.jpg', '2021-05-15-22-18-10 passat.jpg', '2021-05-16', 'unknown'),
(71, 'passat.jpg', '2021-05-15-22-19-59 passat.jpg', '2021-05-16', 'unknown'),
(72, 'passat.jpg', '2021-05-15-22-20-29 passat.jpg', '2021-05-16', 'unknown'),
(73, 'tenor.gif', '2021-05-15-22-22-02 tenor.gif', '2021-05-16', 'unknown'),
(74, 'tenor.gif', '2021-05-15-22-23-27 tenor.gif', '2021-05-16', 'unknown'),
(75, 'tenor.gif', '2021-05-15-22-23-57 tenor.gif', '2021-05-16', 'unknown'),
(76, 'tenor.gif', '2021-05-15-22-28-25 tenor.gif', '2021-05-16', 'unknown'),
(77, 'tenor.gif', '2021-05-15-22-28-51 tenor.gif', '2021-05-16', 'unknown'),
(78, 'tenor.gif', '2021-05-15-22-29-07 tenor.gif', '2021-05-16', 'unknown'),
(79, 'tenor.gif', '2021-05-15-22-31-45 tenor.gif', '2021-05-16', 'unknown'),
(80, 'tenor.gif', '2021-05-15-22-32-11 tenor.gif', '2021-05-16', 'unknown'),
(81, 'tenor.gif', '2021-05-15-22-32-40 tenor.gif', '2021-05-16', 'unknown'),
(82, 'tenor.gif', '2021-05-15-22-33-54 tenor.gif', '2021-05-16', 'unknown'),
(83, 'tenor.gif', '2021-05-15-22-34-23 tenor.gif', '2021-05-16', 'unknown'),
(84, 'tenor.gif', '2021-05-15-22-34-54 tenor.gif', '2021-05-16', 'unknown'),
(85, 'tenor.gif', '2021-05-15-22-36-09 tenor.gif', '2021-05-16', 'unknown'),
(86, 'tenor.gif', '2021-05-15-22-36-35 tenor.gif', '2021-05-16', 'unknown'),
(87, 'AMG C63.jpg', '2021-05-15-22-37-28 AMG C63.jpg', '2021-05-16', 'unknown'),
(88, 'amg.jpg', '2021-05-15-22-38-07 amg.jpg', '2021-05-16', 'unknown'),
(89, 'tenor.gif', '2021-05-15-22-40-52 tenor.gif', '2021-05-16', 'unknown'),
(90, 'tenor.gif', '2021-05-15-22-41-39 tenor.gif', '2021-05-16', 'unknown'),
(91, 'tenor.gif', '2021-05-15-22-42-34 tenor.gif', '2021-05-16', 'unknown'),
(92, 'tenor.gif', '2021-05-15-22-43-31 tenor.gif', '2021-05-16', 'unknown'),
(93, 'tenor.gif', '2021-05-15-22-47-33 tenor.gif', '2021-05-16', 'unknown'),
(94, 'tenor.gif', '2021-05-15-22-48-31 tenor.gif', '2021-05-16', 'unknown'),
(95, 'tenor.gif', '2021-05-15-22-49-05 tenor.gif', '2021-05-16', 'unknown'),
(96, 'tenor.gif', '2021-05-15-22-49-58 tenor.gif', '2021-05-16', 'unknown'),
(97, 'tenor.gif', '2021-05-15-22-50-31 tenor.gif', '2021-05-16', 'unknown'),
(98, 'passat.jpg', '2021-05-15-22-51-56 passat.jpg', '2021-05-16', 'unknown'),
(99, 'passat.jpg', '2021-05-15-22-53-22 passat.jpg', '2021-05-16', 'unknown'),
(100, 'passat.jpg', '2021-05-15-22-54-06 passat.jpg', '2021-05-16', 'unknown'),
(101, 'passat.jpg', '2021-05-15-22-57-26 passat.jpg', '2021-05-16', 'unknown'),
(102, 'tenor.gif', '2021-05-15-22-58-55 tenor.gif', '2021-05-16', 'unknown'),
(103, 'tenor.gif', '2021-05-15-23-01-44 tenor.gif', '2021-05-16', 'unknown'),
(104, 'tenor.gif', '2021-05-16-01-03-19 tenor.gif', '2021-05-16', 'unknown'),
(105, 'tenor.gif', '2021-05-16-01-04-46 tenor.gif', '2021-05-16', 'unknown'),
(106, 'AMG C63.jpg', '2021-05-15-23-09-16 AMG C63.jpg', '2021-05-16', 'unknown'),
(107, 'tenor.gif', '2021-05-15-23-17-28 tenor.gif', '2021-05-16', 'unknown'),
(108, 'amg.jpg', '2021-05-15-23-18-27 amg.jpg', '2021-05-16', 'unknown'),
(109, 'tenor.gif', '2021-05-15-23-27-54 tenor.gif', '2021-05-16', 'unknown'),
(110, 'tenor.gif', '2021-05-15-23-36-55 tenor.gif', '2021-05-16', 'unknown'),
(111, 'amg.jpg', '2021-05-15-23-50-53 amg.jpg', '2021-05-16', 'unknown'),
(112, 'amg.jpg', '2021-05-15-23-51-32 amg.jpg', '2021-05-16', 'unknown'),
(113, 'AMG C63.jpg', '2021-05-16-00-02-17 AMG C63.jpg', '2021-05-16', 'unknown'),
(114, 'tenor.gif', '2021-05-16-00-03-27 tenor.gif', '2021-05-16', 'unknown'),
(115, 'tenor.gif', '2021-05-16-00-04-21 tenor.gif', '2021-05-16', 'unknown'),
(116, 'tenor.gif', '2021-05-16-00-10-55 tenor.gif', '2021-05-16', 'unknown'),
(117, 'tenor.gif', '2021-05-16-00-11-16 tenor.gif', '2021-05-16', 'unknown'),
(118, 'tenor.gif', '2021-05-16-00-13-57 tenor.gif', '2021-05-16', 'unknown'),
(119, 'tenor.gif', '2021-05-16-00-16-36 tenor.gif', '2021-05-16', 'unknown'),
(120, 'tenor.gif', '2021-05-16-00-20-42 tenor.gif', '2021-05-16', 'unknown'),
(121, 'tenor.gif', '2021-05-16-00-21-09 tenor.gif', '2021-05-16', 'unknown'),
(122, 'tenor.gif', '2021-05-16-00-21-40 tenor.gif', '2021-05-16', 'unknown'),
(123, 'tenor.gif', '2021-05-16-00-21-47 tenor.gif', '2021-05-16', 'unknown'),
(124, 'tenor.gif', '2021-05-16-00-22-04 tenor.gif', '2021-05-16', 'unknown'),
(125, 'tenor.gif', '2021-05-16-00-22-36 tenor.gif', '2021-05-16', 'unknown'),
(126, 'tenor.gif', '2021-05-16-00-24-22 tenor.gif', '2021-05-16', 'unknown'),
(127, 'tenor.gif', '2021-05-16-00-24-49 tenor.gif', '2021-05-16', 'unknown'),
(128, 'tenor.gif', '2021-05-16-00-29-44 tenor.gif', '2021-05-16', 'unknown'),
(129, 'tenor.gif', '2021-05-16-00-33-35 tenor.gif', '2021-05-16', 'unknown'),
(130, 'amg.jpg', '2021-05-16-00-35-16 amg.jpg', '2021-05-16', 'unknown'),
(131, 'amg.jpg', '2021-05-16-00-39-11 amg.jpg', '2021-05-16', 'unknown'),
(132, 'amg.jpg', '2021-05-16-00-40-09 amg.jpg', '2021-05-16', 'unknown'),
(133, 'tenor.gif', '2021-05-16-00-41-52 tenor.gif', '2021-05-16', 'unknown'),
(134, 'tenor.gif', '2021-05-16-00-42-14 tenor.gif', '2021-05-16', 'unknown'),
(135, 'tenor.gif', '2021-05-16-00-44-06 tenor.gif', '2021-05-16', 'unknown'),
(136, 'tenor.gif', '2021-05-16-00-46-48 tenor.gif', '2021-05-16', 'unknown'),
(137, 'tenor.gif', '2021-05-16-00-48-34 tenor.gif', '2021-05-16', 'unknown'),
(138, 'tenor.gif', '2021-05-16-00-49-14 tenor.gif', '2021-05-16', 'unknown'),
(139, 'tenor.gif', '2021-05-16-00-51-44 tenor.gif', '2021-05-16', 'unknown'),
(140, 'tenor.gif', '2021-05-16-00-52-22 tenor.gif', '2021-05-16', 'unknown'),
(141, 'tenor.gif', '2021-05-16-00-53-36 tenor.gif', '2021-05-16', 'unknown'),
(142, 'tenor.gif', '2021-05-16-00-54-03 tenor.gif', '2021-05-16', 'unknown'),
(143, 'tenor.gif', '2021-05-16-00-56-49 tenor.gif', '2021-05-16', 'unknown'),
(144, 'tenor.gif', '2021-05-16-00-57-38 tenor.gif', '2021-05-16', 'unknown'),
(145, 'tenor.gif', '2021-05-16-01-01-11 tenor.gif', '2021-05-16', 'unknown'),
(146, 'tenor.gif', '2021-05-16-01-02-22 tenor.gif', '2021-05-16', 'unknown'),
(147, 'AMG C63.jpg', '2021-05-16-01-07-29 AMG C63.jpg', '2021-05-16', 'unknown'),
(148, 'Audi interior.jpg', '2021-05-16-01-08-08 Audi interior.jpg', '2021-05-16', 'unknown'),
(149, 'tenor.gif', '2021-05-16-01-09-06 tenor.gif', '2021-05-16', 'unknown'),
(150, 'AMG C63.jpg', '2021-05-16-01-13-32 AMG C63.jpg', '2021-05-16', 'unknown'),
(151, 'tenor.gif', '2021-05-16-01-14-16 tenor.gif', '2021-05-16', 'unknown'),
(152, 'tenor.gif', '2021-05-16-01-16-12 tenor.gif', '2021-05-16', 'unknown'),
(153, 'tenor.gif', '2021-05-16-01-16-56 tenor.gif', '2021-05-16', 'unknown'),
(154, 'amg.jpg', '2021-05-16-19-50-06 amg.jpg', '2021-05-16', 'unknown'),
(155, 'passat.jpg', '2021-05-19-18-15-30 passat.jpg', '2021-05-19', 'unknown'),
(156, 'Examene_Ses.pdf', '2021-06-07-17-35-48 Examene_Ses.pdf', '2021-06-07', 'unknown'),
(157, 'Examene_Ses.pdf', '2021-06-07-18-19-56 Examene_Ses.pdf', '2021-06-07', 'unknown'),
(158, 'Examene_Ses.pdf', '2021-06-07-18-23-23 Examene_Ses.pdf', '2021-06-07', 'unknown'),
(159, 'Tabel pentru judecători.docx', '2021-06-07-18-30-56 Tabel pentru judecători.docx', '2021-06-07', 'unknown'),
(160, 'Tabel Regi.jpg', '2021-06-07-18-39-16 Tabel Regi.jpg', '2021-06-07', 'unknown');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
