-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 16, 2025 at 03:19 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devm`
--
CREATE DATABASE IF NOT EXISTS `devm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE `devm`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rangi`
--

CREATE TABLE `rangi` (
  `id` tinyint(11) NOT NULL,
  `nazwa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `rangi`
--

INSERT INTO `rangi` (`id`, `nazwa`) VALUES
(1, 'Użytkownik'),
(2, 'Developer'),
(3, 'Moderator'),
(4, 'Administrator');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(300) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ranga` tinyint(4) NOT NULL,
  `status_zgloszenia` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `haslo`, `email`, `ranga`, `status_zgloszenia`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@administrator.pl', 4, 0),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user@user.us', 1, 0),
(4, 'dev', '34c6fceca75e456f25e7e99531e2425c6c1de443', 'dev@developer.dev', 2, 0),
(5, 'mod', '7dd30f0a95d522bfc058be4e75847f8b6df9f76b', 'mod@moderator.mod', 3, 0),
(19, 'JohnProblem', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'JohnProblem@gmail.com', 1, 1),
(20, 'AndrzejModeracyjny', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Andrzej@interia.pl', 3, 0),
(21, 'JanDeveloper', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jan@wp.pl', 2, 2),
(22, 'TomaszProblem', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Tomasz@Problem.pl', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tytul` varchar(50) DEFAULT 'Zgłoszenie bez tytułu',
  `opis` text NOT NULL,
  `tagi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `user_id`, `tytul`, `opis`, `tagi`) VALUES
(16, 22, 'Jestem super i umiem wszystko', 'Cześć, jestem Tomasz i umiem wszystko więc z programowaniem też sobie poradzę ;)', 'Python, Java, JavaScript, C#, C++, PHP, SQL, Swift, HTML, CSS, Inne'),
(17, 19, 'Jestem profesjonalistą', 'Wszystko muszę robić za Tomasza!', 'Python, Java, JavaScript, C++, PHP, SQL, HTML, CSS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenia`
--

CREATE TABLE `zlecenia` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tytul` varchar(50) NOT NULL DEFAULT 'Zlecenie bez tytułu',
  `opis` text DEFAULT NULL,
  `tagi` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `zlecenia`
--

INSERT INTO `zlecenia` (`id`, `user_id`, `tytul`, `opis`, `tagi`, `status`) VALUES
(16, 22, 'Chyba mamy problem', 'Robię projekt na studia i z jakiegoś powodu nie działa ten skrypt\r\n\r\n<script>\r\n    $(document).ready(function () {\r\n    \r\n    $(\"#aplikuj\").click(function () {\r\n        $(\"#main\").load(\"aplikuj.html\");\r\n    });\r\n\r\n}); \r\n</script>\r\n\r\nPomocy!', 'JavaScript, HTML, CSS', 0),
(18, 19, 'Podobno Tomasz ma problem', 'A jak Tomasz ma problem to ja też bo robimy ten projekt razem :(((', 'JavaScript, PHP, SQL, HTML, CSS', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rangi`
--
ALTER TABLE `rangi`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `ranga` (`ranga`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rangi`
--
ALTER TABLE `rangi`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `zlecenia`
--
ALTER TABLE `zlecenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ranga`) REFERENCES `rangi` (`id`);

--
-- Constraints for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD CONSTRAINT `zlecenia_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
