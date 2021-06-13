-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 12, 2021 la 07:29 PM
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
-- Structură tabel pentru tabel `coduri`
--

CREATE TABLE `coduri` (
  `titlu_curs` varchar(255) NOT NULL,
  `nr_saptamana` int(11) NOT NULL,
  `codul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cursuri`
--

CREATE TABLE `cursuri` (
  `id_curs` int(11) NOT NULL,
  `titlu_curs` varchar(255) NOT NULL,
  `nume_profesor` varchar(255) NOT NULL,
  `nr_lectii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `note`
--

CREATE TABLE `note` (
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `id_student` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `titlu_curs` varchar(255) NOT NULL,
  `titlu_componenta_evaluata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `prezente`
--

CREATE TABLE `prezente` (
  `id_student` int(11) NOT NULL,
  `titlu_curs` varchar(255) NOT NULL,
  `nr_saptamana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `teme`
--

CREATE TABLE `teme` (
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `uploaded_at` date NOT NULL,
  `titlu_tema` varchar(255) NOT NULL,
  `titlu_curs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `parola` varchar(256) NOT NULL,
  `rol` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `cursuri`
--
ALTER TABLE `cursuri`
  ADD PRIMARY KEY (`id_curs`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
