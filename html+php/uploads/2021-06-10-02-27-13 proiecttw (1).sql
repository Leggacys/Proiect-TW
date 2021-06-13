-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 08, 2021 la 09:08 PM
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
-- Bază de date: `proiecttw`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cursuri`
--

CREATE TABLE `cursuri` (
  `id_curs` int(11) NOT NULL,
  `cod_prezenta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `note`
--

CREATE TABLE `note` (
  `id_stud` int(11) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `valoare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profesori`
--

CREATE TABLE `profesori` (
  `id_prof` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `id_curs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL,
  `uploaded_at` date NOT NULL DEFAULT current_timestamp(),
  `course` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
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
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `parola`, `created`, `modified`, `rol`) VALUES
(1, 'Mike', 'Dalisay', 'mike@codeofaninja.com', '$2y$10$U/NtTAA2EHA3UGdwgxp.DevSh3O9QsJ2gmQpfRsH1wW3vBdjbniP2', '2021-05-19 20:51:22', '2021-05-19 17:51:22', '0'),
(2, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$qzdWRcHD/rZR5By6Y.OKOO3TRKQJJ1sMA5lqVqPpnTcaJrlxDtJVa', '2021-05-19 20:52:55', '2021-05-19 17:52:55', '0'),
(3, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$gXC0aUHJfB0QHq0JJHFubOdehsaHfcKfy9RIUchziwfoB14QBsvBC', '2021-05-19 21:02:23', '2021-05-19 18:02:23', '0'),
(4, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$GcGvFDw5FBbuMESzip0RN.iDA/UPt66Gqa.6d6yzyOVXsWmdT5vmC', '2021-05-19 21:02:24', '2021-05-19 18:02:24', '0'),
(5, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$boQOYCkCjS0SQ./0RYzcZehUEFCYKEFJJSXR4ACRnS.AaFksPnc1q', '2021-05-19 21:02:25', '2021-05-19 18:02:25', '0'),
(6, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$D9RDGlcHCPdhw92fK/OVjO8CFzLM0yqpz.1sgW9Ic2Uh4qMNs3eM6', '2021-05-19 21:02:27', '2021-05-19 18:02:27', '0'),
(7, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$cC86BH/i9HOfyEI7gHK1wOXbTc//eAJgx/j.lDKVd/eSXB1fByKPC', '2021-05-19 21:02:28', '2021-05-19 18:02:28', '0'),
(8, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$W2hT1bfMqwqKwKnzsef4TuWR36ryMOYkvT6WxqFYVBFW/bTdjU0f6', '2021-05-19 21:02:28', '2021-05-19 18:02:28', '0'),
(9, 'Mike', 'Dalisay', 'mike@codeofaninja.com', '$2y$10$LbAFYD6R3ofEfhpuLqhD.ehf0bCqHUYZvaOU8V2srNk7F3NbKtDr.', '2021-05-19 21:02:29', '2021-05-19 20:02:08', '0'),
(10, 'Gabi', 'George', 'mike@codeofaninja.com', '$2y$10$tvrzX1gSJCyxzPMEPKGt4OV47Nd1d4a3JH.pdfOCpeOgONwa4Bffq', '2021-05-19 21:02:29', '2021-05-19 18:02:29', '0'),
(14, 'gabi', 'gabi', 'gabi_steam@yahoo.com', '$2y$10$fDkHfGagqMOuM2aa7..of.s8LO07AsqPSbUCJMz6OFz6AoVljx5T6', '2021-05-20 10:28:41', '2021-05-20 07:28:41', '0'),
(15, 'ionut', 'ionutboss', 'hristea@gmail.com', '$2y$10$R4.UUUOkUmGqGi6juY6QGu.Kjf.UfKc/K0gokE2EzOu9BFXvclfEK', '2021-05-20 10:30:54', '2021-05-20 07:30:54', '0'),
(16, 'bossionuthristea', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$yQ8WjaNj/c2P6I4A3tuGe.2HRfhC3VWRhOY9XRhMfsupOzFU7pcCW', '2021-05-20 10:31:56', '2021-05-20 07:31:56', '0'),
(17, 'Ionaaaut', 'Bogaaaaaatu', 'daniel@gaaaaaaabi.com', '$2y$10$AwE.nMmWmldIuJYYvWu1NeLJxkm4GTtkoYvFh4kehbznwR.kD9hzy', '2021-05-20 10:37:45', '2021-05-20 07:37:45', '0'),
(18, 'george', 'george', 'george.constantinescu@info.uaic.ro', '$2y$10$V4cYgBXYsAPKhvYx2xJ1M.TNWVSg.vtwKD6HShYx22arcNxfQA9hi', '2021-05-20 10:39:22', '2021-05-20 07:39:22', '0'),
(19, 'aaa', 'aaaa', 'george.constantinescu@info.uaic.ro', '$2y$10$dVi6tgMH7ADq388Pa8jb5uxBrt8SNGscA/uJ1fxY7AZYWntNjZEtC', '2021-05-20 10:41:47', '2021-05-20 07:41:47', '0'),
(20, 'aaa', 'cdd', 'gabi@gabi.gabi', '$2y$10$4Dl4gDKUHVLaVMvR15xbteXfaOTYYqhp4joheBAgQ68n090b6jNme', '2021-05-20 10:43:03', '2021-05-20 07:43:03', '0'),
(21, 'aaa', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$uduhgOu8TJ9saibi211DT.Kqo0OzEOJBMYphmb3Ck0beac9LKSrIC', '2021-05-20 10:56:10', '2021-05-20 07:56:10', '0'),
(22, 'gabi', 'amma', 'gabi@gabi.gabi', '$2y$10$I8m7nKnW8q.So6vy6WSv0OoE6g0kPFfhbGzY8spoMcPMTMt8fJZO2', '2021-05-20 10:57:38', '2021-05-20 07:57:38', '0'),
(23, 'gabi', 'abcd', 'gabi@gabi.gabi', '$2y$10$1s2BOxGpOL3OMkrjO5/Ruu3j7.9gLlYK9h2QF883WDPuBf5lNBQcy', '2021-05-20 10:59:24', '2021-05-20 07:59:24', '0'),
(24, 'aaa', 'aaa', 'iceeye7gabi@gmail.com', '$2y$10$xvi08XFlkew55TyA8OChQebFQfwGtw0RG95pB0S8SToJJfI7Gso8m', '2021-05-20 11:09:55', '2021-05-20 08:09:55', '0'),
(25, 'gigel', 'gigel', 'george.constantinescu@info.uaic.ro', '$2y$10$3zXKE9rAWkAVWN0MBXWe4.ycqvIn.PXbCFDg/OXVeprCeie7MnPE2', '2021-05-20 11:11:36', '2021-05-20 08:11:36', '0'),
(26, 'iceeye7gabi@gmail.com', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$Bh/VMyJ1saswjZAqviNJ0uNYhff/0Ijw7RLRtY4DPtOOGOv6ZhrpO', '2021-05-20 11:19:52', '2021-05-20 08:19:52', '0'),
(27, 'bossionuthristea', 'aaa', 'gabi@gabi.gabi', '$2y$10$exH6AUNAaTF43IuFPkyGOO7ZVGoaAGbPQlsrvMIKf.dhKBAkEki6u', '2021-05-20 11:31:09', '2021-05-20 08:31:09', '0'),
(28, 'george', 'aaa', 'bbb@ccc.dd', '$2y$10$RzfGnRFGbtkxUN4BqR3ox.X5cLFHrnHg5BFrpq77tQwAOCkAeiLoy', '2021-05-20 11:31:27', '2021-05-20 08:31:27', '0'),
(29, 'george', '123', 'gabi@gabi.gabi', '$2y$10$9Zrg7krQkLO/ETmrOF3/du9ZEeQwnIB43KssW8qIBFxpXDdvSLjEW', '2021-05-20 11:32:22', '2021-05-20 08:32:22', '0'),
(30, 'iceeye7gabi@gmail.com', '777', 'george.constantinescu@info.uaic.ro', '$2y$10$GbaKJOYju/nGQE.IXDiZL.lYSn23AylaO177/MC9XnlDHrg15G.xa', '2021-05-20 11:33:46', '2021-05-20 08:33:46', '0'),
(31, 'georgegabrieconstantines1', 'aaab', 'george.constantinescu@info.uaic.ro', '$2y$10$yBytZROBb9tAsxXq3J4OK.POODNKMw4czspiZ3AbErRMX8MN2Vr4q', '2021-05-20 11:43:11', '2021-05-20 08:43:11', '0'),
(32, 'LupuCezar', 'cezarlupu', 'constantinescu_mihail_gabriel@yahoo.com', '$2y$10$uppVa4YeksaVpt/zKwjCBuzpp1eek8ijR7hWJOSM7zgnSZSg2/18.', '2021-05-20 12:16:24', '2021-05-20 09:16:24', '0'),
(33, 'GabiConstantinescu', 'gabi1949', 'gabi_steam@yahoo.com', '$2y$10$kM2TV3uGAqvadvhcdNLzl.FrMI1GzDMKAe9ufFYdZqup/oM/4w7au', '2021-05-20 16:31:45', '2021-05-20 13:31:45', '0'),
(34, 'xxxxxxx', 'xx', 'bbb@ccc.dd', '$2y$10$WXGpNZl6MZW7KOF.iOXRDO5mSqeD2XWLuEuC7ZQYB2PCeLHj6t88y', '2021-05-20 16:36:51', '2021-05-20 13:36:51', '0'),
(35, 'yyy', 'yy', 'asfasfasf@asfsfaasf.com', '$2y$10$O1i15PGyzgQgmQHDJrS.f.ZUUR3ZsS9ttaoLhD5MDGLk2aT/aXKeS', '2021-05-20 16:47:03', '2021-05-20 13:47:03', '0'),
(36, 'yyyy', 'yy', 'gabi_steam@yahoo.com', '$2y$10$CdcckINinKVU3c0j6KnFVurfRZW864o5vossXZcJRfuPj1ErfR6Rm', '2021-05-20 16:47:40', '2021-05-20 13:47:40', '0'),
(37, 'abcde', 'abb', 'gabi_steam@yahoo.com', '$2y$10$RyM0gHW8gSjIz3QgYJIvNeyO.9yaYH47t9zz6Ifn2mVZlS4eFU4s2', '2021-05-20 16:48:04', '2021-05-20 13:48:04', '0'),
(38, 'sss', 'ss', 'gabi_steam@yahoo.com', '$2y$10$yLbIHmIx5Ljfo4CxAIynk.TnAdo8zm6YFp5.Gc4HbaxlIyEfpgexe', '2021-05-20 16:49:51', '2021-05-20 13:49:51', '0'),
(39, 'adrian', 'adi1949', 'adrian.zamfir@yahoo.com', '$2y$10$fzoNP0/JuhxYL27pSn2PpOzWxQQq4IEbVe5pzD1zXFL1kQZqTCgBK', '2021-06-01 19:55:54', '2021-06-01 16:55:54', '0'),
(40, 'georgegabrieconstantines', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$61XvxEBdab3i8QaFw3P09OdaOkQe9daKO0AOJnivMcXr9zbLkBIaa', '2021-06-01 20:02:34', '2021-06-01 17:02:34', '0'),
(41, 'zamfi', 'aaa', 'zamif@zamfi.zamfi', '$2y$10$EV5yPTbrRiqPBMLrhigjwOcH.euAMIVAAj7pXbYhFN46odkFyRbaq', '2021-06-01 20:18:37', '2021-06-01 17:18:37', '0'),
(42, 'asfasfasfs', 'sss', 'gabi_steam@yahoo.com', '$2y$10$DPf9oByZQ5xvZw44OZHJO.ciFw7EaFlAKcGoe8zOdyVRbE1bv95GW', '2021-06-01 20:20:53', '2021-06-01 17:20:53', '0'),
(43, 'assad', 'aaa', 'sdadasds@asasfa.sfafs', '$2y$10$kmCuEesqee/lFaSHwwsX1uFMoP2V/r8BHyo50XVlFaEXo7n2./E3i', '2021-06-01 20:21:22', '2021-06-01 17:21:22', '0'),
(44, 'tatian25', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$zZxjeSdJcOmZ7IEJztE0nOZdBvFX3GI8HkVYwWgP7DTdEqhp8FUg2', '2021-06-01 20:22:46', '2021-06-01 17:22:46', '0'),
(45, 'tatian25', 'aaa', 'asfasfasf@asfsfaasf.com', '$2y$10$v9qcwO80wHFE/Ba2FP.MrelY09jUV/exWZbIuGPXfrsNlBsuE0.uy', '2021-06-01 20:23:32', '2021-06-01 17:23:32', '0'),
(46, 'tatian256', 'aaa', 'george.constantinescu@info.uaic.ro', '$2y$10$zIbOU7eHJ21/2mN8cUm9peaZTtWwHf7AObSTQVkm3O1Vj8bvZuCIe', '2021-06-01 20:24:04', '2021-06-01 17:24:04', '0'),
(47, 'Ionaaaut', 'Bogaaaaaatu', 'daniel@gaaaaaaabi.com', '$2y$10$RIh6EJc5mFEYZHnLsMqQiOABAlk9dtyPATqfQ4MoawV2zwj8mjMEu', '2021-06-01 20:25:52', '2021-06-01 17:25:52', '0'),
(48, 'Ionaaaut', 'Bogaaaaaatu', 'daniel@gaaaaaaabi.com', '$2y$10$ij2Lp.bXzk460RmGckfSVepBrgpllRATtUY2BUowA2B8ToM5Wo3NG', '2021-06-01 20:25:53', '2021-06-01 17:25:53', '0'),
(49, 'tatian25', 'aaa', 'aabb@cc.dd', '$2y$10$XASo8m6k375fVipVRT2SLu/pEjVDnNqhYqhK7NKaTHwJAnJ4MUSCG', '2021-06-01 20:41:58', '2021-06-01 17:41:58', '0'),
(50, 'tatian25', 'aaab', 'abcde@cc.dd', '$2y$10$Dc.XJveoEPOPiO24BjKDcO5OHkWaxLZtKPezR.7AzOlXuTLN0sCcO', '2021-06-01 20:42:28', '2021-06-01 17:42:28', '0'),
(51, 'asfasfasf', 'aaa', 'gabi_steam@yahoo.com', '$2y$10$JeKOwKojzOia4US5EzlV1eAAl22IZpYnhrwmLsd.Q4qb2GCRjyPnC', '2021-06-01 20:51:39', '2021-06-01 17:51:39', '0'),
(52, 'georgegabrieconstantines1', 'aaa', 'iceeye7gabi@gmail.com', '$2y$10$2cEiqHNWvce0nsVWFMKCVupK0w.i7zsZd02zTXb3jC1B/uDVmnXgC', '2021-06-01 21:17:17', '2021-06-01 18:17:17', '0'),
(53, 'gica23', 'gica', 'gica23@gg.gg', '$2y$10$BeTvATTMSumIE2gJJOn24ejFP5A75lbfTIyclh/oCLjdtYJE7CxAu', '2021-06-01 22:17:20', '2021-06-01 19:17:20', '0'),
(54, 'gg233', 'gg', 'george.constantinescu@info.uaic.ro', '$2y$10$UKxP5CxgOo6uPWQlWhkVBOQpPFT4KYaUmYriGpH8N.vm7vEXl.NMa', '2021-06-01 23:21:49', '2021-06-01 20:21:49', '0'),
(55, 'tatian2532', 'gg', 'george.constantinescu@info.uaic.ro', '$2y$10$4t9OMdj0CqWJOfTwR8muR.Fn0rL.9urqDbsiiaUTvsHK6Ab856puO', '2021-06-01 23:26:56', '2021-06-01 20:26:56', '0'),
(56, 'stefania', 'stefy', 'asfasfasf@asfsfaasf.com', '$2y$10$X2A9YVLwT5yxhFNOlHUY9ubf7OAVCCjo2ya8NLxoORfhC.B2ovsDm', '2021-06-01 23:27:20', '2021-06-01 20:27:20', '0'),
(57, 'adi', 'gg', 'bbb@ccc.dd', '$2y$10$MJgseN.ueA./bZFBMcsWxuhG2nF/HjCuMBPIH5qRGlNZIPZhlpzbW', '2021-06-01 23:27:34', '2021-06-01 20:27:34', '0'),
(58, 'profesor', 'gigel', 'gigel@gigel.ro', '$2y$10$hvzqSumO8X23AvudBKpeHOzahVZAOwmH5oTGv5WODC32Vqn42cUEO', '2021-06-06 17:43:36', '2021-06-06 14:43:36', '0'),
(59, 'ASFSF', 'ABB', 'asfasfasf@asfsfaasf.com', '$2y$10$n.vj/guaCaHOOhn01fASVO.JAWHA.LyHgvNvNHR5XHJybmmihxCq6', '2021-06-06 18:08:26', '2021-06-06 15:08:26', '0'),
(60, 'asfasf', 'aabb', 'asfasfasf@asfsfaasf.com', '$2y$10$tOj3.fTJJAQBd6sPGKoMguw.jRDRIWsk.s9KHIZZdogm2vdB6tNXy', '2021-06-06 19:31:51', '2021-06-06 16:31:51', '0'),
(61, 'sfasf', 'acc', 'asfasfasf@asfsfaasf.com', '$2y$10$AMDnZQBuhp.rtyzYqrpbzO.IlgtzWrA3NaRMjSfMOIAkCmEIlE34a', '2021-06-06 19:32:04', '2021-06-06 16:32:04', '0'),
(62, 'tatian25', 'ttt', 't@td.tdd', '$2y$10$ZiQrJ7WvLsf50if4PHN7ZuPDYkxWFXP9n29ZfGDnCFmzyi8j17kK6', '2021-06-06 19:32:29', '2021-06-06 16:32:29', '0'),
(63, 'georgegabrieconstantines1', 'sss', 'gabi_steam@yahoo.com', '$2y$10$vnHy22wXRpusNUbx1HUF4./Yd49n8VYWvmNqhJ7oy.LnzwOWmsKoW', '2021-06-06 19:32:48', '2021-06-06 16:32:48', '0'),
(64, 'stefania', 'aaa', 'stefani@stefy.fs', '$2y$10$uvaFS2oG0BIIRMKlZvDbZur5HQGJxYAgS2IyGOgj608VV.StL/kuK', '2021-06-06 19:34:16', '2021-06-06 16:34:16', '0'),
(65, 'adiavream', 'sss', 'asfasfasf@asfsfaasf.com', '$2y$10$PP8qhDO5ycyvaRXh42XDZ.BD8iwlSpYhGOBqenGCOw/Au1tQnA/BK', '2021-06-06 20:03:56', '2021-06-06 17:03:56', '0'),
(66, 'georgegabrieconstantines1', 'sdd', 'asfasfasf@asfsfaasf.com', '$2y$10$jgocFgTga0AeCp3QvirwUefuL19eQuH43BR2CKJ6s7.f1o9c9DuCi', '2021-06-06 21:35:46', '2021-06-06 18:35:46', '0'),
(67, 'george69', 'george', 'gabi_steam@yahoo.com', '$2y$10$VQZ9Fy4EjRDh.c/Hbj3MbOFd2wYjv4TsuyUmIpu0s2PlRUsY82Zs.', '2021-06-07 13:12:53', '2021-06-07 10:12:53', '0'),
(68, 'cezarlupusor', 'david', 'cezar.lupu2012@gmail.com', '$2y$10$YCoYCVf03rJRcNzwIvLPq.vEcX0vLsdH1Mmls8b5dmpNKcz/17aOm', '2021-06-07 13:58:28', '2021-06-07 10:58:28', '0'),
(69, 'adizamfir', 'adi', 'adi@zamfir.zamfir', '$2y$10$TF4Rtt8Z.bE6d7vi1m0SlOzBOvPmJ/etmDQ88hk4yCB2rd3mzDwJ6', '2021-06-07 14:29:15', '2021-06-07 11:29:15', '0'),
(70, 'BogatuDaniel', 'daniel', 'bogatu.daniel@ceva.com', '$2y$10$i29ksV7W/QqdDAl7SZCp6ef9ke95T/sxJJThz5UXBpanMxb/iGa12', '2021-06-07 20:46:08', '2021-06-07 17:46:08', '0'),
(71, 'cezarus', 'cezar', 'cezarus@myname.cezarus', '$2y$10$OQeyLSc85hFupZAX7odjUedKIVSBEthbjq12TUMUNNLOTtkDJGemO', '2021-06-07 22:28:30', '2021-06-07 19:28:30', '0'),
(72, 'Popescu', 'popescu', 'popescu@profesor.ro', '$2y$10$PNBWrDPrz.cMevAOBcFNYecukeuvYx4OSowT2ZPRnVLCOtxDKk7Xy', '2021-06-08 16:38:54', '2021-06-08 14:16:50', '100000000'),
(73, 'Profesor2', 'profesor2', 'profesor@profesor2.com', '$2y$10$9FiORQC9W1y1u42J2sRbDO0nn/2x2i4FOSg6fuKyXEXdSUZNVuOLa', '2021-06-08 17:15:35', '2021-06-08 14:26:38', '2147483647'),
(74, 'paralelipiped', 'aabb', 'pareleliped@paralelipipedparalelipipedparalelipipedparalelipiped.com', '$2y$10$QPdVFlrSgniZPhRUpTKv7ec8QRmdCljcOwEZDQVhQhrNlIGnO1/rW', '2021-06-08 17:30:39', '2021-06-08 14:39:24', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `cursuri`
--
ALTER TABLE `cursuri`
  ADD PRIMARY KEY (`id_curs`);

--
-- Indexuri pentru tabele `note`
--
ALTER TABLE `note`
  ADD KEY `utilizator-nota` (`id_stud`),
  ADD KEY `curs-nota` (`id_curs`);

--
-- Indexuri pentru tabele `profesori`
--
ALTER TABLE `profesori`
  ADD KEY `prof-id_curs` (`id_curs`);

--
-- Indexuri pentru tabele `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stud-tema` (`id_student`),
  ADD KEY `id_curs-tema` (`course`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `curs-nota` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `utilizator-nota` FOREIGN KEY (`id_stud`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `prof-id_curs` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD CONSTRAINT `id_curs-tema` FOREIGN KEY (`course`) REFERENCES `cursuri` (`id_curs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_stud-tema` FOREIGN KEY (`id_student`) REFERENCES `uploaded_files` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
