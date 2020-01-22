-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2019, 20:51
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quizwsb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filesquiz`
--

CREATE TABLE `filesquiz` (
  `id` int(50) UNSIGNED NOT NULL,
  `namequiz` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `filesquiz`
--

INSERT INTO `filesquiz` (`id`, `namequiz`) VALUES
(1, 'quiz1'),
(2, 'quiz2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `games`
--

CREATE TABLE `games` (
  `idgames` int(100) UNSIGNED NOT NULL,
  `idplayer` int(50) UNSIGNED NOT NULL,
  `idquiz` int(100) UNSIGNED NOT NULL,
  `access` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `games`
--

INSERT INTO `games` (`idgames`, `idplayer`, `idquiz`, `access`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(1, 2, 1, 1),
(1, 3, 1, 1),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `player`
--

CREATE TABLE `player` (
  `id` int(250) UNSIGNED NOT NULL,
  `firstname` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `player`
--

INSERT INTO `player` (`id`, `firstname`, `surname`, `login`, `password`) VALUES
(1, 'Adam', 'Polański', 'Test', 'RmZDMk81ZDlCczBTb2pleGxjQTdRdz09'),
(2, 'Ada', 'Radna', 'Test2', 'RmZDMk81ZDlCczBTb2pleGxjQTdRdz09'),
(3, 'Grzegorz', 'Dębski', 'Test3', 'RmZDMk81ZDlCczBTb2pleGxjQTdRdz09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `score`
--

CREATE TABLE `score` (
  `idplayer` int(100) UNSIGNED NOT NULL,
  `idquiz` int(100) UNSIGNED NOT NULL,
  `score` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filesquiz`
--
ALTER TABLE `filesquiz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `games`
--
ALTER TABLE `games`
  ADD KEY `idplayer` (`idplayer`),
  ADD KEY `idquiz` (`idquiz`),
  ADD KEY `idgames` (`idgames`);

--
-- Indeksy dla tabeli `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `score`
--
ALTER TABLE `score`
  ADD KEY `idplayer` (`idplayer`),
  ADD KEY `idquiz` (`idquiz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `filesquiz`
--
ALTER TABLE `filesquiz`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `player`
--
ALTER TABLE `player`
  MODIFY `id` int(250) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
