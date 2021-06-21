-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 15, 2021 la 08:44 PM
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
-- Bază de date: `api_db`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `medie_ascultari`
--

CREATE TABLE `medie_ascultari` (
  `id_student` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `prezente` int(11) NOT NULL,
  `nota1` int(11) NOT NULL DEFAULT 0,
  `nota2` int(11) NOT NULL DEFAULT 0,
  `nota3` int(11) NOT NULL DEFAULT 0,
  `titlu_curs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `medie_ascultari`
--

INSERT INTO `medie_ascultari` (`id_student`, `nume`, `prenume`, `prezente`, `nota1`, `nota2`, `nota3`, `titlu_curs`) VALUES
(10, 'Bogatu', 'Daniel', 11, 6, 7, 8, 'BD'),
(10, 'Bogatu', 'Daniel', 5, 3, 7, 8, 'RC'),
(10, 'Bogatu', 'Daniel', 12, 5, 6, 7, 'TW');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `medie_ascultari`
--
ALTER TABLE `medie_ascultari`
  ADD PRIMARY KEY (`id_student`,`titlu_curs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
