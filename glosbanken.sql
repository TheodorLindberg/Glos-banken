-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 15 nov 2018 kl 20:32
-- Serverversion: 10.1.36-MariaDB
-- PHP-version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `glosbanken`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `quizes`
--

CREATE TABLE `quizes` (
  `quiz_id` int(11) NOT NULL,
  `id` varchar(100) DEFAULT NULL,
  `phpPath` varchar(100) DEFAULT NULL,
  `quizname` varchar(100) DEFAULT NULL,
  `lang1` varchar(100) DEFAULT NULL,
  `lang2` varchar(100) DEFAULT NULL,
  `creatorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `quizes`
--

INSERT INTO `quizes` (`quiz_id`, `id`, `phpPath`, `quizname`, `lang1`, `lang2`, `creatorID`) VALUES
(36, '5bc2f7474f247', 'source/quizes/5bc2f7474f247/En+ql+resturante.php', 'En ql resturante', 'swedish', 'swedish', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `userquizhistory`
--

CREATE TABLE `userquizhistory` (
  `u_id` int(11) NOT NULL,
  `lastload` datetime NOT NULL,
  `timesloaded` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `userquizhistory`
--

INSERT INTO `userquizhistory` (`u_id`, `lastload`, `timesloaded`, `quiz_id`) VALUES
(1, '2018-10-04 16:58:00', 2, 36);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_first` varchar(50) NOT NULL,
  `user_last` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_uid` varchar(50) NOT NULL,
  `user_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'Theodor', 'Lindberg', 'thbjo_04@edu.sollentuna.se', 'Theodor123', '$2y$10$MGaTvQ0WW4kZRUlqwPaU4etm61u5VUxIkdmJ1papPaLE1l9NSf3qy'),
(8, 'Theodor', 'fsdf', 'asd@gmail.com', 'Theodor123sd', '$2y$10$MGaTvQ0WW4kZRUlqwPaU4etm61u5VUxIkdmJ1papPaLE1l9NSf3qy'),
(9, 'Test', 'LOL', 'thbjo_04@edu.sollentuna.se', 'MYUSE', '$2y$10$lV9bCmPs.5cANXKDF/.bP.6cwnM8qkyYytcO5uAovWhfLS.plecGm'),
(10, 'Theodor', 'asd', 'sd@gmail.com', 'TEST', '$2y$10$F1WWGj2INHKvum.4eMTRkeIklUAoKMWys24l9bYeOGjVkTZzuSDhq'),
(11, 'Theodor', 'asd', 'sd@gmail.com', 'TESTs', '$2y$10$1oxQ3uDZ44dO.dRYWp6ayeCayFrfVDXTb1Kdlyn3T6s9gnyK35Ymm');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Index för tabell `userquizhistory`
--
ALTER TABLE `userquizhistory`
  ADD PRIMARY KEY (`u_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT för tabell `userquizhistory`
--
ALTER TABLE `userquizhistory`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
