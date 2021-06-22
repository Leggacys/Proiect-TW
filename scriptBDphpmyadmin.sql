-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 12:13 AM
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
-- Table structure for table `coduri_studenti`
--

CREATE TABLE `coduri_studenti` (
  `id_stud` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `nr_saptamana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coduri_studenti`
--

INSERT INTO `coduri_studenti` (`id_stud`, `cod`, `id_curs`, `nr_saptamana`) VALUES
(10, '0QMIz7nAcD', 2, 13),
(10, 'JqPycuwzxQ', 1, 1),
(10, 'qFC43O09AJ', 3, 7),
(10, 'YA7IIfNocB', 1, 5),
(38, 'Bu03kEmYWF', 1, 12),
(44, 'AckHgWtPsI', 2, 1),
(44, 'pLiiMEm9oX', 2, 10),
(44, 'VgfaA2BKwc', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cursuri2`
--

CREATE TABLE `cursuri2` (
  `cod_prezenta` varchar(255) NOT NULL,
  `insert_date` time NOT NULL,
  `durata` int(11) NOT NULL,
  `Id_curs` int(11) NOT NULL,
  `nr_saptamana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media_formule`
--

CREATE TABLE `media_formule` (
  `id_curs` int(11) NOT NULL,
  `formula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_formule`
--

INSERT INTO `media_formule` (`id_curs`, `formula`) VALUES
(3, 'floor((p1+p2+p3)/3)'),
(1, 'ceil((p1+p2+p3)/3)'),
(2, 'floor((p1+p2)/2)');

-- --------------------------------------------------------

--
-- Table structure for table `medie_ascultari`
--

CREATE TABLE `medie_ascultari` (
  `id_student` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `prezente` int(11) NOT NULL,
  `nota1` int(11) NOT NULL DEFAULT 0,
  `nota2` int(11) NOT NULL DEFAULT 0,
  `nota3` int(11) NOT NULL DEFAULT 0,
  `id_curs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medie_ascultari`
--

INSERT INTO `medie_ascultari` (`id_student`, `nume`, `prenume`, `prezente`, `nota1`, `nota2`, `nota3`, `id_curs`) VALUES
(10, 'Gabi', 'Constantinescu', 0, 0, 0, 0, 1),
(10, 'Gabi', 'Constantinescu', 0, 0, 0, 0, 2),
(10, 'Gabi', 'Constantinescu', 0, 0, 0, 0, 3),
(13, 'bibel', 'mihai', 0, 0, 0, 0, 1),
(30, 'Gabriel', 'meh', 0, 0, 0, 0, 1),
(34, 'aaa', 'aaa', 0, 0, 0, 0, 1),
(35, 'Vladut', 'Vladut', 0, 0, 0, 0, 1),
(38, 'avram', 'adi', 0, 0, 0, 0, 1),
(39, 'matei', 'matei', 0, 0, 0, 0, 1),
(39, 'matei', 'matei', 0, 0, 0, 0, 2),
(39, 'matei', 'matei', 0, 0, 0, 0, 3),
(40, 'aaa', 'aaa', 0, 0, 0, 0, 1),
(40, 'aaa', 'aaa', 0, 0, 0, 0, 2),
(40, 'aaa', 'aaa', 0, 0, 0, 0, 3),
(44, 'Lupu', 'Cezar', 0, 0, 0, 0, 1),
(44, 'Lupu', 'Cezar', 0, 0, 0, 0, 2),
(44, 'Lupu', 'Cezar', 0, 0, 0, 0, 3),
(45, 'aaa', 'aaa', 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_stud` int(11) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `valoare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_stud`, `id_curs`, `valoare`) VALUES
(10, 1, 4),
(10, 1, 5),
(10, 3, 4),
(10, 3, 5),
(10, 2, 4),
(10, 2, 5),
(10, 3, 6),
(10, 2, 4),
(44, 2, 1),
(44, 2, 10),
(45, 2, 2),
(45, 2, 4),
(44, 3, 2),
(44, 3, 3),
(44, 3, 10),
(44, 1, 6),
(44, 1, 6),
(44, 1, 7),
(10, 1, 1),
(40, 1, 2),
(40, 1, 10),
(40, 1, 9),
(38, 1, 3),
(38, 1, 1),
(38, 1, 1),
(35, 1, 1),
(35, 1, 10),
(35, 1, 3);

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
-- Table structure for table `stabileste_note_cursuri`
--

CREATE TABLE `stabileste_note_cursuri` (
  `id_curs` int(11) NOT NULL,
  `nr_note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stabileste_note_cursuri`
--

INSERT INTO `stabileste_note_cursuri` (`id_curs`, `nr_note`) VALUES
(1, 3),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `statistica`
--

CREATE TABLE `statistica` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `statusP` varchar(255) NOT NULL,
  `id_curs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistica`
--

INSERT INTO `statistica` (`id`, `nume`, `statusP`, `id_curs`) VALUES
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(13, 'mihai', 'PREZENT', 0),
(13, 'mihai', 'PREZENT', 0),
(13, 'mihai', 'PREZENT', 0),
(13, 'mihai', 'PREZENT', 0),
(13, 'mihai', 'PREZENT', 0),
(13, 'mihai', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(26, 'george', 'PREZENT', 0),
(26, 'george', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(3, 'cezarus', 'PREZENT', 0),
(10, 'Gabi', 'PREZENT', 0),
(10, 'Gabi', 'PREZENT', 0),
(10, 'Gabi', 'PREZENT', 0),
(10, 'Gabi', 'PREZENT', 0),
(10, 'Gabi', 'PREZENT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id_stud` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `an` varchar(255) NOT NULL,
  `semian` varchar(255) NOT NULL,
  `grupa` varchar(255) NOT NULL,
  `medie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id_stud`, `nume`, `prenume`, `id_curs`, `an`, `semian`, `grupa`, `medie`) VALUES
(10, 'Gabi', 'Constantinescu', 1, '2', 'E', '3', 4),
(10, 'Gabi', 'Constantinescu', 2, '2', 'E', '3', 4),
(10, 'Gabi', 'Constantinescu', 3, '2', 'E', '3', 5),
(30, 'Gabriel', 'meh', 1, '1', 'B', '5', 0),
(35, 'Vladut', 'Vladut', 1, '2', 'B', '3', 5),
(38, 'avram', 'adi', 1, '3', 'E', '2', 2),
(39, 'matei', 'matei', 1, '2', 'E', '3', 0),
(39, 'matei', 'matei', 2, '2', 'E', '3', 0),
(39, 'matei', 'matei', 3, '2', 'E', '3', 0),
(40, 'aaa', 'aaa', 1, '1', 'A', '1', 7),
(40, 'aaa', 'aaa', 3, '1', 'A', '1', 0),
(40, 'aaa', 'aaa', 2, '1', 'A', '1', 0),
(13, 'bibel', 'mihai', 1, '2', 'B', '6', 0),
(44, 'Lupu', 'Cezar', 1, '2', 'E', '4', 7),
(44, 'Lupu', 'Cezar', 2, '2', 'E', '4', 5),
(44, 'Lupu', 'Cezar', 3, '2', 'E', '4', 5),
(45, 'aaa', 'aaa', 2, '1', 'A', '1', 3),
(34, 'aaa', 'aaa', 1, '1', 'A', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentiacceptare`
--

CREATE TABLE `studentiacceptare` (
  `id_stud` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `an` varchar(255) NOT NULL,
  `semian` varchar(255) NOT NULL,
  `grupa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentiacceptare`
--

INSERT INTO `studentiacceptare` (`id_stud`, `nume`, `prenume`, `id_curs`, `an`, `semian`, `grupa`) VALUES
(34, 'aaa', 'aaa', 3, '1', 'A', '1'),
(35, 'Vladut', 'Vladut', 3, '2', 'B', '3'),
(45, 'aaa', 'aaa', 3, '1', 'A', '1'),
(46, 'aaa', 'aaa', 1, '1', 'A', '1'),
(46, 'aaa', 'aaa', 2, '1', 'A', '1'),
(46, 'aaa', 'aaa', 3, '1', 'A', '1');

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
  `id_stud` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `name`, `new_name`, `uploaded_at`, `course`, `id_stud`, `nota`) VALUES
(1, 'Document_8.pdf', '2021-06-21-09-11-16Document_8.pdf', '2021-06-21', 'BD', 10, 4),
(2, 'Document_8.pdf', '2021-06-21-17-06-17Document_8.pdf', '2021-06-21', 'BD', 10, NULL),
(3, 'Erminie.pdf', '2021-06-21-17-22-22Erminie.pdf', '2021-06-21', 'BD', 44, 6),
(4, 'Examene_Ses.pdf', '2021-06-21-17-26-21Examene_Ses.pdf', '2021-06-21', 'BD', 44, 6),
(5, 'Recap_greaca.docx', '2021-06-21-17-27-54Recap_greaca.docx', '2021-06-21', 'BD', 44, 7),
(6, 'Erminie.pdf', '2021-06-21-17-49-04Erminie.pdf', '2021-06-21', 'RC', 44, 10),
(7, 'Aristotel_Onassis.pptx', '2021-06-21-17-49-10Aristotel_Onassis.pptx', '2021-06-21', 'RC', 44, NULL),
(8, 'Recap_greaca.docx', '2021-06-21-18-05-36Recap_greaca.docx', '2021-06-21', 'RC', 45, NULL),
(9, 'PSGBD_Despre_variabile.pptx', '2021-06-21-18-15-56PSGBD_Despre_variabile.pptx', '2021-06-21', 'TW', 44, NULL),
(10, 'Aristotel_Onassis.pptx', '2021-06-21-18-16-02Aristotel_Onassis.pptx', '2021-06-21', 'TW', 44, 10),
(11, 'PSGBD_Despre_variabile.pptx', '2021-06-21-19-17-45PSGBD_Despre_variabile.pptx', '2021-06-21', 'BD', 44, NULL);

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
(6, 'gigi', 'Mihailescu', 'gigi', 'gigi@gigi.gigi', '$2y$10$Uie/HnRIsc5gHFGajuhb0uYe5oXji8qRRKM1L20gc77OknitcVTm6', '2021-06-13 19:31:58', '2021-06-15 10:12:03', 'teacher1', '', '', ''),
(7, 'gabi', 'Gabriel', 'Constantinescu', 'gabi@gabi.gabi', '$2y$10$4.qbXbc9QOfKHqKMxrZo3uS94UPJBy5cADY9vitlsk72EjqzSRpgO', '2021-06-13 19:40:39', '2021-06-13 16:40:39', 'student', '2', 'E', '3'),
(8, 'lupusor', 'Lupu', 'Cezar', 'lupu.cezar@gmail.com', '$2y$10$rFF.lM.ymaSQhgdO1o0x9.egBxfqBUavwUuYW1Y6/gM.1ImjrCrDm', '2021-06-13 20:07:05', '2021-06-13 17:07:05', 'student', '2', 'E', '4'),
(9, 'mimi', 'mimi', 'mimi', 'mimi@mimi.mimi', '$2y$10$KmA2Wwqg855ej1sUQCiBxu9YVpdgU0jcWmS/UwsFz1FFOpCGb6r92', '2021-06-13 20:16:13', '2021-06-13 17:16:13', 'student', '1', 'A', '1'),
(10, 'iceeye7', 'Gabi', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$bmPtwJDhKeqfNEFMFUlDL.4PiN8XsCh6lPTAZDBdjmMC7y4x3U/4m', '2021-06-13 20:57:36', '2021-06-13 17:57:36', 'student', '2', 'E', '3'),
(11, 'maria', 'Maria', 'Andreea', 'gabi@gabi.gabi', '$2y$10$nRcnQ7IUasE3RmrCQgo.i.dH.fxKsWzCyWt4rLGQrpQ0iptiDPKhW', '2021-06-14 12:41:51', '2021-06-14 09:41:51', 'student', '2', 'B', '2'),
(12, 'marian22', 'Marian', 'Craiova', 'marian.craiova@yahoo.com', '$2y$10$8P4FTwHRP.P6JEEPYWHuEOGAvLX3/3UrbQfZaT3WuuZb5s18doftq', '2021-06-14 17:53:52', '2021-06-14 14:53:52', 'student', '3', 'B', '1'),
(13, 'bibel', 'bibel', 'mihai', 'bibel@gg.gg', '$2y$10$7OXyzyszQvGck18y83j2IuBUfEyzGf.jjCpGymrv3JjNuXz/4AOIm', '2021-06-14 19:08:32', '2021-06-14 16:08:32', 'student', '2', 'B', '6'),
(15, 'admin', 'George', 'Constantin', 'admin@admin.admin', '$2y$10$Wz4mTA8DUsYOHeOn.c./a.sNOn6Zf/riin1kRkyOgqKiyNK6QXca6', '2021-06-14 21:35:35', '2021-06-14 18:36:27', 'admin', '', '', ''),
(16, 'gege', 'Mihai', 'Georgescu', 'george.constantinescu@info.uaic.ro', '$2y$10$UOwBhnYX7AAEheyHmDpHWO7jeSp.jvAC6HnBTVir4POsJZ1JGi2XG', '2021-06-14 22:42:21', '2021-06-14 19:42:21', 'teacher', '', '', ''),
(20, 'gigi456', 'Apple', 'Costel', 'gabi@gabi.gabi', '$2y$10$Oc4Izf9hw4RiYcPssTJmIe4RERKE3qqvCN6IvtCaGF2TnRW2xHs6q', '2021-06-14 23:04:52', '2021-06-14 20:05:12', 'teacher', '', '', ''),
(21, 'iceeye8', 'aaa', 'bbb', 'george.constantinescu@info.uaic.ro', '$2y$10$4AMzJca2igPqsRD2pv8RJefRXmUtsARxoNa3B6IeF2Pyd7XZKHsVW', '2021-06-15 11:40:27', '2021-06-15 08:40:27', 'student', '1', 'A', '1'),
(22, 'mihaim', 'abc', 'def', 'gg@gg.gg', '$2y$10$qexPooZ/aJTCzkf88ejeB.HRKyEljjZgOS36kUs3I218MqGytO..q', '2021-06-15 12:23:43', '2021-06-15 09:43:44', 'teacher1', '', '', ''),
(23, 'gigel', 'Mihai', 'Margineanu', 'asfasfasf@asfsfaasf.com', '$2y$10$Dew6ishXQ8MTCPNO.GqN8O.R0QJ861Nc3.6ULNCK3DFPyYVVjZMJy', '2021-06-15 12:34:37', '2021-06-15 09:43:47', 'teacher3', '', '', ''),
(25, 'cezarusss', 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$qgiDsLVjUfLnLZ8kIHnr.uSu9Fo.WR6LfmteD3bf1BBiEod16.0se', '2021-06-15 12:36:15', '2021-06-15 09:43:51', 'teacher2', '', '', ''),
(27, 'mihai', 'mihai', 'mihai', 'asfasfasf@asfsfaasf.com', '$2y$10$UakEuX73p3g//3w.1POP2emlxY3qKIwF8hDZJcUCKqdu7SpKJxOPG', '2021-06-15 12:51:28', '2021-06-15 10:07:34', 'teacher2', '', '', ''),
(28, 'lupu', 'lupu', 'lupu', 'lupu@lupu.lupu', '$2y$10$soJIZzHPjViPEQFyGjwTR.jG6dGeKOf3LEGVexocg79VYiB7JK00S', '2021-06-15 13:09:39', '2021-06-15 10:18:22', 'teacher2', '', '', ''),
(29, 'mv', 'aaa', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$6JlT.jJb/FGAOh2dMRV4O.M3Tu4JjbwLMFWtn0qZEbZx8IFSIxbkW', '2021-06-15 13:20:07', '2021-06-15 10:20:29', 'teacher3', '', '', ''),
(30, 'mihaita', 'Gabriel', 'meh', 'asfasfasf@asfsfaasf.com', '$2y$10$RNAWyoHUwc7O5I8PufSqI.MIU.VCuoo8WQctdUtL7OnHRcOF/s0Um', '2021-06-15 13:46:03', '2021-06-15 10:46:03', 'student', '1', 'B', '5'),
(31, 'vm2', 'aa', 'aa', 'asfasfasf@asfsfaasf.com', '$2y$10$LcP5YYt5LtKCOrUR8sjJR.Ckz1NxVEnv2Y9kFDEh8RujMnqOAg0/C', '2021-06-15 15:15:11', '2021-06-15 12:15:11', 'teacher4', '', '', ''),
(32, 'mihaita', 'mihaita', 'gigica', 'gabi@gabi.gabi', '$2y$10$iiXrbWaKT63q4ZWCZ1wKp.d1uxTDchvtm7NnXZh98gMy03FAv0elW', '2021-06-16 11:02:56', '2021-06-16 08:02:56', 'student', '3', 'E', '1'),
(33, 'gigel', 'gigel', 'gigel', 'gabi@gabi.gabi', '$2y$10$Q1XeffGz6ABNCr9WGKdOhOAVLOjG4x/F0CbTNzgPyjR0GCEKKaKn2', '2021-06-16 19:52:43', '2021-06-16 16:52:43', 'student', '1', 'A', '1'),
(34, 'mamaia', 'aaa', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$l6abJ3jIM6EusvhnvUi9Yep3/sPRVhVPybOPW3/jMVeqHZfaP7qCy', '2021-06-16 19:53:16', '2021-06-16 16:53:16', 'student', '1', 'A', '1'),
(35, 'vladut', 'Vladut', 'Vladut', 'asfasfasf@asfsfaasf.com', '$2y$10$IEQqbJ1KHt9pG8scSamvR.Z3Mh4u5H4Mjp1vdokYiCdhcwiFPbls.', '2021-06-16 20:08:08', '2021-06-16 17:08:08', 'student', '2', 'B', '3'),
(36, 'cezarus', 'Multumesc', 'Babysca', 'gabi@gabi.gabi', '$2y$10$1VJPXWWPYRK5eBADzdFtmOW.OrW.Y2xDrFm1Ps4rxhaeDaIXKi9i2', '2021-06-17 17:43:10', '2021-06-17 14:43:28', 'teacher2', '', '', ''),
(37, 'filotei', 'Prof', 'RC', 'asfasfasf@asfsfaasf.com', '$2y$10$8IOWZRR9fl2T7QPL8EqodehfwE68WD4dltnLbYZKmWQUJgoTPdZ0a', '2021-06-17 17:44:53', '2021-06-17 14:45:04', 'teacher2', '', '', ''),
(38, 'avram', 'avram', 'adi', 'apa@apa.apa', '$2y$10$0rJhRACXQRYqxx3Bp/iqOuu6GO18kS2xFSbGD4diKtCZMG4svRKnm', '2021-06-17 23:42:44', '2021-06-17 20:42:44', 'student', '3', 'E', '2'),
(39, 'matei', 'matei', 'matei', 'asfasfasf@asfsfaasf.com', '$2y$10$Y5uvCLW9CHpCKQEkJRNdIOoPaLtGfKe2gXz1.d4UamiwOrd7Yoz3i', '2021-06-19 20:58:32', '2021-06-19 17:58:32', 'student', '2', 'E', '3'),
(40, 'marean', 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$ZUTRs.rZyzIlllM4yrpsveMQFG7LiETd0Pzaz2n98yEyDKpXWhHVa', '2021-06-19 22:55:39', '2021-06-19 19:55:39', 'student', '1', 'A', '1'),
(41, 'bibel', 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$a6ZuT1USQVEqyBIcHYydOuIJEWhez1ysYmYaObcjgMGyJvtsi10UW', '2021-06-20 01:05:13', '2021-06-19 22:05:13', 'student', '1', 'A', '1'),
(42, 'borfasu', 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$b1dII97qf.jaBY/bZzGhE.rku0TtgCYthqEIjyWSjxSt57pKgwo.6', '2021-06-20 15:05:53', '2021-06-20 12:05:53', 'student', '1', 'A', '1'),
(43, 'bercea', 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$gVMsp2LY2CgKrJbchYoZ7Oo6LQMR/CtOkjycadIQZhPVMNhn5pbr6', '2021-06-20 22:45:19', '2021-06-20 19:46:52', 'teacher1', '', '', ''),
(44, 'cezarlupu', 'Lupu', 'Cezar', 'george.constantinescu@info.uaic.ro', '$2y$10$W7qdYElx5DxUAAgvv.JzyuK1mR4TmqAUlxR/Tb/Clyay4qQslGnsq', '2021-06-21 19:10:58', '2021-06-21 16:10:58', 'student', '2', 'E', '4'),
(45, 'cezarlupu2', 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$Ld0V6D/BBDv38jc8G1/ebu68CcBTNjmhdJFEuwUKahWQ3TfT4Cjm2', '2021-06-21 20:58:40', '2021-06-21 17:58:40', 'student', '1', 'A', '1'),
(46, 'ivan', 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$mRsaBYdQiQq0qxmHD4XccuzyweCAnkyUJCyfEiufreBXDBKfuvVWy', '2021-06-21 22:32:59', '2021-06-21 19:32:59', 'student', '1', 'A', '1');

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
  `rol` varchar(2901) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `firstname`, `lastname`, `email`, `parola`, `created`, `modified`, `rol`) VALUES
(31, 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$V3mo2uEXIMUFrDyrtuqn8u/Ra521dVdrYdAD7U8zHw4ufmre.RfJm', '2021-06-13 19:18:45', '2021-06-13 16:18:45', '0'),
(32, 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$LU8w9BUMjTF7MgzwSOZ4NexlHSi84T68m5Pd4vxLm3gW5xnW2Y2iC', '2021-06-13 19:23:02', '2021-06-13 16:23:02', '0'),
(33, 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$yjnmHbvR.gbYpuLWhAsxHOWf8ZE/UZUjWcgmCITXglu93ODlQS7rK', '2021-06-13 19:27:02', '2021-06-13 16:27:02', '0'),
(34, 'Gabriel', 'Constantinescu', 'george.constantinescu@info.uaic.ro', '$2y$10$ph13mMkImO0SHT4JOygAvet4lGAzqK2JGqsOuySszw.QjUniPclQe', '2021-06-13 19:30:32', '2021-06-13 16:30:32', '0'),
(35, 'Bogatu', 'Daniel', 'bogatu.daniel@yahoo.com', '$2y$10$As./TbmrsULcvdc8h7kVM.TRmuz9NDxe703dJpxIW.bn5rnVQtPOi', '2021-06-13 19:31:30', '2021-06-13 16:31:30', '0'),
(36, 'gigi', 'gigi', 'gigi@gigi.gigi', '$2y$10$XAcZXlcNykCYIFRgxGumE..67177UDZd0pHlzZI7k1xzffN.K9oTK', '2021-06-13 19:31:59', '2021-06-13 16:31:59', '0'),
(37, 'Gabriel', 'Constantinescu', 'gabi@gabi.gabi', '$2y$10$etcYO.yhuvN9RKl4ZEPrHuvOwsqQy7hy/Gpm4MQDdDOP9tXfxw/HW', '2021-06-13 19:40:40', '2021-06-13 16:40:40', '0'),
(38, 'Lupu', 'Cezar', 'lupu.cezar@gmail.com', '$2y$10$T.IIfPEgos2tsnm5fC0Ol.IRLFMNStOZnMlmPL3dwMKf2BvkqQxde', '2021-06-13 20:07:05', '2021-06-13 17:07:05', '0'),
(39, 'mimi', 'mimi', 'mimi@mimi.mimi', '$2y$10$E2VvGFZFXf14rrlD8clI/eFazCCuYHpgWScSodl.n2.pxmB3pflR6', '2021-06-13 20:16:13', '2021-06-13 17:16:13', '0'),
(40, 'Gabi', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$JCcYLHVIWncCZI7Y2Imr/..wZ7fkOuvFyLyMoT0T56.AJ09EBRBgy', '2021-06-13 20:57:36', '2021-06-13 17:57:36', '0'),
(41, 'Maria', 'Andreea', 'gabi@gabi.gabi', '$2y$10$5wCoIa3YXET8FH/mdxKfDuoBxLipZkk/uq.ncwlxPDsVoxcg1Nahm', '2021-06-14 12:41:51', '2021-06-14 09:41:51', '0'),
(42, 'Marian', 'Craiova', 'marian.craiova@yahoo.com', '$2y$10$ugdCWeMg2R1mZPCnJFhtMuKPWJhxBiBUBlAo6HweeUSQX.WI/q0Ai', '2021-06-14 17:53:52', '2021-06-14 14:53:52', '0'),
(43, 'bibel', 'mihai', 'bibel@gg.gg', '$2y$10$LVE02/uz0p18ZVX5Rqc3pOGxUSY/RfCDM5usbgVbNUFl2Fw6BcROK', '2021-06-14 19:08:32', '2021-06-14 16:08:32', '0'),
(44, 'Mihai', 'Dolanescu', 'dolanescu@gmail.com', '$2y$10$MP8MZsCdX5jpPueUFh3u6uDF/tWEcopyGmLUllw6l0IDpYw4nAvES', '2021-06-14 20:48:55', '2021-06-14 17:48:55', '0'),
(45, 'George', 'Constantin', 'admin@admin.admin', '$2y$10$C1p/24m7kPx4BOtB0APGqeNG/x.bfZVnTPLuPUuqlHgMYoOpfsRiq', '2021-06-14 21:35:35', '2021-06-14 18:35:35', '0'),
(46, 'Mihai', 'Georgescu', 'george.constantinescu@info.uaic.ro', '$2y$10$WMGg8.z1XNC.KxEbOz66beca9MAkrbPDbNanXJqyxjEck/giTeLL.', '2021-06-14 22:42:21', '2021-06-14 19:42:21', '0'),
(47, 'Oeare', 'Meme', 'gabi@gabi.gabi', '$2y$10$g2VcG2JvmciC235tae8UeeRxsj8QkNQm/gzWd1HojlZ0dZDec3fpW', '2021-06-14 22:45:15', '2021-06-14 19:45:15', '0'),
(48, 'George-Gabriel', 'cezar', 'gabi_steam@yahoo.com', '$2y$10$lk.J23kEKZicSpoSBS2X5O5EWk2dNJiBuHMVJiA/y/KznyR3kWC2u', '2021-06-14 23:03:13', '2021-06-14 20:03:13', '0'),
(49, 'George-Gabriel', 'sss', 'gabi_steam@yahoo.com', '$2y$10$5xxCisU9xogYm.l39Rr2DOlcteo1CK.T29qeGf0BcSnCRaL3/iY9a', '2021-06-14 23:03:27', '2021-06-14 20:03:27', '0'),
(50, 'Apple', 'Costel', 'gabi@gabi.gabi', '$2y$10$ha0B.Y6gjjKa.nCb9GsfO.urDnmS1IPB4mOWUMUO4.rWjFZgfSCGC', '2021-06-14 23:04:52', '2021-06-14 20:04:52', '0'),
(52, 'abc', 'def', 'gg@gg.gg', '$2y$10$1jEQq41LlFUQ860pUXTbsO55egwAlKw5VyBvuhwmivGnMk5e7Y8nC', '2021-06-15 12:23:43', '2021-06-15 09:23:43', '0'),
(53, 'Mihai', 'Margineanu', 'asfasfasf@asfsfaasf.com', '$2y$10$6UAk8xAjFpQKzyUAOyfr5.lGNjuIyAgFtsQDrJZUiyX9tRvZBdSd2', '2021-06-15 12:34:37', '2021-06-15 09:34:37', '0'),
(54, 'Bibi', 'Maricel', 'george.constantinescu@info.uaic.ro', '$2y$10$fLVTXQNqLbbXVltwB2c.cecnlMV1Il1BhMnkkejztz3Wq1dvEChT6', '2021-06-15 12:35:56', '2021-06-15 09:35:56', '0'),
(55, 'Gabriel', 'Constantinescu', 'gabi_steam@yahoo.com', '$2y$10$Sc/hMMixwoOZa65aVlzQieJRFS/xSqHUVitdV2tH6bypLaeWq6c7S', '2021-06-15 12:36:15', '2021-06-15 09:36:15', '0'),
(56, 'Mihail', 'Constantinescu', 'mihail@gmail.com', '$2y$10$mISICCQvEwZlUrmIIYplbOguFWce22OT/beRgnGqDi2KbgJOj7HU6', '2021-06-15 12:48:57', '2021-06-15 09:48:57', '0'),
(57, 'mihai', 'mihai', 'asfasfasf@asfsfaasf.com', '$2y$10$bIfRfmrUZngM7kGd.tnkv.yj0yvHR0yS.qytVkHwwbxlNF405.rX.', '2021-06-15 12:51:28', '2021-06-15 09:51:28', '0'),
(58, 'lupu', 'lupu', 'lupu@lupu.lupu', '$2y$10$aZgQiDPHMmRcMpLyFbVswOShSWI/qUtfKi8rAAacKYpEvOjzvywPC', '2021-06-15 13:09:40', '2021-06-15 10:09:40', '0'),
(59, 'aaa', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$HGu3V8mGNbi5XXPZUOfk3.fknhemZysnnR4r17J4pDpGfjAzNe9Ti', '2021-06-15 13:20:07', '2021-06-15 10:20:07', '0'),
(60, 'Gabriel', 'meh', 'asfasfasf@asfsfaasf.com', '$2y$10$la3F0DPFpENKQcRaho4TBeNJ/OHyNZXbdxC3vIvoFEtvKstOHAKUm', '2021-06-15 13:46:03', '2021-06-15 10:46:03', '0'),
(61, 'aa', 'aa', 'asfasfasf@asfsfaasf.com', '$2y$10$.68dVIgqyR88Zg5Ox3zdYOn5WB0wmXOX5HgN7tPa7/IA.5t9xSwba', '2021-06-15 15:15:11', '2021-06-15 12:15:11', '0'),
(62, 'mihaita', 'gigica', 'gabi@gabi.gabi', '$2y$10$.Q1KMq3FYmieHUK.srvSXe7GXMyxhi4ptGX44u0yHf.M5c.URjDUm', '2021-06-16 11:02:56', '2021-06-16 08:02:56', '0'),
(63, 'gigel', 'gigel', 'gabi@gabi.gabi', '$2y$10$FL89kak1NKKINebIWkbLbOD8J.ZPI.7/qE3zWwqWKlqazzDiOq4ze', '2021-06-16 19:52:44', '2021-06-16 16:52:44', '0'),
(64, 'aaa', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$pIA9fAbzeDjD/C..zSRLrOPRU6.WBaaFGqKLOQCsn10uFNXAcAd0K', '2021-06-16 19:53:16', '2021-06-16 16:53:16', '0'),
(65, 'Vladut', 'Vladut', 'asfasfasf@asfsfaasf.com', '$2y$10$ffKpySGVzldd7FJTbXH2Oe7.7Jw1cTW6SrNOi/Bu7MnG3j4an8y9.', '2021-06-16 20:08:08', '2021-06-16 17:08:08', '0'),
(66, 'Multumesc', 'Babysca', 'gabi@gabi.gabi', '$2y$10$KFwRQAsNq6UNbZbxJCT5y.ZDM/57DjZ3MDoYIU3DIGPxMnlAmHqUy', '2021-06-17 17:43:10', '2021-06-17 14:43:10', '0'),
(67, 'Prof', 'RC', 'asfasfasf@asfsfaasf.com', '$2y$10$jX7weQjtDkLO.v2ozQrLrO/wj9srQI.FEPBFZNGZnji1Rg9fC2yFm', '2021-06-17 17:44:54', '2021-06-17 14:44:54', '0'),
(68, 'avram', 'adi', 'apa@apa.apa', '$2y$10$T0Br.9KJ5RigzOvIShq5fuYgpPiBU2sH6EdpO9.NV2vDcbl94QR6O', '2021-06-17 23:42:44', '2021-06-17 20:42:44', '0'),
(69, 'matei', 'matei', 'asfasfasf@asfsfaasf.com', '$2y$10$PVXdmpZYXBe.bv2Ofz0e4urgPk2pbEqKjlgVua76hnNpO1TrUkwAe', '2021-06-19 20:58:32', '2021-06-19 17:58:32', '0'),
(70, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$T1CG/Rd5ZYi3daNfvVlsCeB1lwkBlA7oToalZlxTxgY9XxhwyHcpG', '2021-06-19 22:55:39', '2021-06-19 19:55:39', '0'),
(71, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$d8blnUOCjRBszB/zDr9IY.eozZnYPtjdOGJnpMJy62YPrQtBER3Ee', '2021-06-20 01:05:14', '2021-06-19 22:05:14', '0'),
(72, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$VpEG.FthOBgYalhOk4QC2e8jnco/T3QQtzwfPny6KLQdsZ5cfGUle', '2021-06-20 15:05:53', '2021-06-20 12:05:53', '0'),
(73, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$KM6TAF7pUtpPWOJ4QBmYvOgCD2QEFXfwxlA1eg1J44ZSjqNJDHiMO', '2021-06-20 22:45:19', '2021-06-20 19:45:19', '0'),
(74, 'Lupu', 'Cezar', 'george.constantinescu@info.uaic.ro', '$2y$10$Y3ASFt6ZBRhVr5meSnU3BO71PzvAEOwARL/RZuf4.I9M4cydOLxvm', '2021-06-21 19:10:58', '2021-06-21 16:10:58', '0'),
(75, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$XnmDaLypHW/QB5T9eLBGDexpui5wNyZiJHGnHMEDLFDQaGabkDuuK', '2021-06-21 20:58:41', '2021-06-21 17:58:41', '0'),
(76, 'aaa', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$1TuMqITgDvW5TA7WGskNpeYNma0xRmdqHKPOAIcPYFvA5c.rCQnyC', '2021-06-21 22:33:00', '2021-06-21 19:33:00', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coduri_studenti`
--
ALTER TABLE `coduri_studenti`
  ADD PRIMARY KEY (`id_stud`,`cod`);

--
-- Indexes for table `medie_ascultari`
--
ALTER TABLE `medie_ascultari`
  ADD PRIMARY KEY (`id_student`,`id_curs`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `prof-id_curs` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
