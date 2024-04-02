-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Mar 2024, 08:44
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pracownicy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ludziki`
--

CREATE TABLE `ludziki` (
  `Numer` int(11) NOT NULL,
  `Imie` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Wiek` int(3) NOT NULL,
  `Staz` int(3) NOT NULL,
  `Stanowisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Wydzial` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Pensja` decimal(10,2) NOT NULL,
  `Data_dodania` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ludziki`
--
ALTER TABLE `ludziki`
  ADD PRIMARY KEY (`Numer`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ludziki`
--
ALTER TABLE `ludziki`
  MODIFY `Numer` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
