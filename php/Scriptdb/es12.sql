-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 12, 2023 alle 22:13
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `es12`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `genere`
--

CREATE TABLE `genere` (
  `ID` int(11) NOT NULL,
  `Descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `genere`
--

INSERT INTO `genere` (`ID`, `Descrizione`) VALUES
(1, 'Drammatico'),
(2, 'Azione'),
(3, 'Commedia'),
(5, 'Animazione'),
(6, 'Aventura'),
(7, 'Comico'),
(8, 'Biografico'),
(9, 'Fantasy'),
(10, 'Fantascientifico'),
(11, 'Giallo'),
(12, 'Horror'),
(13, 'Musical');

-- --------------------------------------------------------

--
-- Struttura della tabella `noleggio`
--

CREATE TABLE `noleggio` (
  `ID` int(11) NOT NULL,
  `IDsocio` int(11) NOT NULL,
  `IDvideo` int(11) NOT NULL,
  `dataNoleggio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `userdata`
--

INSERT INTO `userdata` (`ID`, `nome`, `cognome`, `email`, `telefono`, `indirizzo`, `password`) VALUES
(0, 'Admin', ' ', 'Admin@Root', 0, ' ', 'Admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `video`
--

CREATE TABLE `video` (
  `ID` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `regista` varchar(255) NOT NULL,
  `anno` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `IDgenere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `video`
--

INSERT INTO `video` (`ID`, `titolo`, `regista`, `anno`, `tipo`, `IDgenere`) VALUES
(10, '2028: La Ragazza Trovata nella Spazzatura', 'Michal Krzywicki', '2023', 'DVD', 1),
(11, 'Argonuts - missione olimpo', 'David Alaux', '2023', 'DVD', 5),
(12, 'Gigi la legge', 'Alessandro Comodin', '2023', 'DVD', 3),
(14, 'Pluto', 'Renzo Carbonera', '2023', 'DVD', 10);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `genere`
--
ALTER TABLE `genere`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `noleggio`
--
ALTER TABLE `noleggio`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `genere`
--
ALTER TABLE `genere`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `noleggio`
--
ALTER TABLE `noleggio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT per la tabella `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `video`
--
ALTER TABLE `video`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
