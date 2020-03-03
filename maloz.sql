-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Gegenereerd op: 03 mrt 2020 om 11:05
-- Serverversie: 8.0.19
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maloz`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `idAccount` int NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(15) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `telefoonnummer` varchar(15) DEFAULT NULL,
  `functie` enum('gebruiker','eerstelijns','tweedelijns','derdelijns','beheerder') NOT NULL,
  `gebruikersnaam` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `aangemaakt` date NOT NULL,
  `laatste_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `actie`
--

CREATE TABLE `actie` (
  `idActie` int NOT NULL,
  `Account_idAccount` int NOT NULL,
  `Melding_idMelding` int NOT NULL,
  `datum_tijd` datetime NOT NULL,
  `actie` varchar(45) NOT NULL,
  `resultaat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `melding`
--

CREATE TABLE `melding` (
  `idMelding` int NOT NULL,
  `datum_tijd` datetime NOT NULL,
  `korte_omschrijving` varchar(45) NOT NULL,
  `lange_omschrijving` varchar(256) DEFAULT NULL,
  `Account_idGebruiker` int NOT NULL,
  `Account_idBehandelaar` int NOT NULL,
  `verantwoordelijke` varchar(45) NOT NULL,
  `oorzaak` varchar(45) NOT NULL,
  `oplossing` varchar(45) NOT NULL,
  `terugkoppeling` varchar(45) NOT NULL,
  `impact` int NOT NULL,
  `urgentie` int NOT NULL,
  `prioriteit` int NOT NULL,
  `afhandeltijd` float NOT NULL,
  `status` enum('aangemeld','in behandeling','opgelost]') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idAccount`);

--
-- Indexen voor tabel `actie`
--
ALTER TABLE `actie`
  ADD PRIMARY KEY (`idActie`),
  ADD KEY `fk_Actie_Account1_idx` (`Account_idAccount`),
  ADD KEY `fk_Actie_Melding1_idx` (`Melding_idMelding`);

--
-- Indexen voor tabel `melding`
--
ALTER TABLE `melding`
  ADD PRIMARY KEY (`idMelding`),
  ADD KEY `fk_Melding_Account_idx` (`Account_idGebruiker`),
  ADD KEY `fk_Melding_Account1_idx` (`Account_idBehandelaar`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `idAccount` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `actie`
--
ALTER TABLE `actie`
  MODIFY `idActie` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `melding`
--
ALTER TABLE `melding`
  MODIFY `idMelding` int NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `actie`
--
ALTER TABLE `actie`
  ADD CONSTRAINT `fk_Actie_Account1` FOREIGN KEY (`Account_idAccount`) REFERENCES `account` (`idAccount`),
  ADD CONSTRAINT `fk_Actie_Melding1` FOREIGN KEY (`Melding_idMelding`) REFERENCES `melding` (`idMelding`);

--
-- Beperkingen voor tabel `melding`
--
ALTER TABLE `melding`
  ADD CONSTRAINT `fk_Melding_Account` FOREIGN KEY (`Account_idGebruiker`) REFERENCES `account` (`idAccount`),
  ADD CONSTRAINT `fk_Melding_Account1` FOREIGN KEY (`Account_idBehandelaar`) REFERENCES `account` (`idAccount`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
