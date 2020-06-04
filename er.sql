-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Jun 2020 um 16:32
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `er`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blog`
--

CREATE TABLE `blog` (
  `Blog_ID` int(10) NOT NULL,
  `Titel` text NOT NULL,
  `Text` text NOT NULL,
  `Vorschau` text DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `Autor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `blog`
--

INSERT INTO `blog` (`Blog_ID`, `Titel`, `Text`, `Vorschau`, `Status`, `Autor`) VALUES
(57, 'Test', '<h2 contenteditable=\"false\">Überschrift</h2><p contenteditable=\"false\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,justo.</p>', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,justo.', 0, 0),
(61, 'Blog_Entry', '<h2 contenteditable=\"false\">Überschrift</h2><p contenteditable=\"false\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,justo.</p>', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,justo.', 2, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login_user`
--

CREATE TABLE `login_user` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 normaler Account\r\n1 warten auf Bestätigung \r\n2 Author \r\n3 Admin',
  `last_login` datetime DEFAULT NULL,
  `Token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `login_user`
--

INSERT INTO `login_user` (`id`, `username`, `email`, `password`, `status`, `last_login`, `Token`) VALUES
(0, 'moritz', 'moritz@weibold.cc', '$2y$10$6pydkdFJxcq9SdiDMLcuKeUIpmspYnTC.F4ld.ijuPUcpn3O1/q6K', 3, NULL, NULL),
(5, 'user', 'user@user.com', 'a4c3dd592625f5c5712b277823f17d7c', 0, NULL, NULL),
(7, 'einfügen', 'einfügen@einfügen.com', 'Passwort1', 1, NULL, NULL),
(24, 'username', 'email@adresse.com', '$2y$10$dEwCJujXLTB9HHP8TEJosevVLsw9tzWGrzaHRDaAJt0FqbyN1EZ26', 2, NULL, 'a999eb418dc5bf5fb07903816c1cfa94dedff2c917f8eca1d181187b0479753bdcb6315c473f45fed6760f43f43592344384cb09f6e8a3497a6943af5d7bce81');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Blog_ID`);

--
-- Indizes für die Tabelle `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blog`
--
ALTER TABLE `blog`
  MODIFY `Blog_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT für Tabelle `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
