-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 25. Jul 2018 um 21:27
-- Server-Version: 5.6.38
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `cr11_sabine_steiger_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `street_name` varchar(40) DEFAULT NULL,
  `house_no` int(11) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`addressID`, `street_name`, `house_no`, `postal_code`, `city`) VALUES
(1, 'Längenfeldgasse', 15, 1120, 'Vienna'),
(2, 'Schubert Ring', 22, 1010, 'Vienna'),
(3, 'Kettenbrückengasse', 2, 1050, 'Vienna'),
(4, 'Laxenburgerstrasse', 88, 1100, 'Vienna'),
(5, 'Turgenjewgasse', 28, 1130, 'Vienna');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `carID` int(11) NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `license_plate` varchar(30) DEFAULT NULL,
  `fk_type` int(11) DEFAULT NULL,
  `fk_lended` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`carID`, `brand`, `license_plate`, `fk_type`, `fk_lended`, `image`) VALUES
(1, 'Huawei', 'A09873', 1, NULL, 'https://www.sonnenwagen.org/wp-content/uploads/2017/07/scene2_0720_small.jpg'),
(2, 'BMW i3', 'B78378', 3, NULL, 'http://www.nextgreencar.com/i/news_support/BMW-i3-i3s.jpg'),
(3, 'RENAULT Zoe', 'Z783729', 3, NULL, 'http://www.nextgreencar.com/i/news_support/Renault-Zoe.jpg'),
(4, 'NISSAN Leaf', 'L936283', 3, NULL, 'http://www.nextgreencar.com/i/news_support/Nissan-Leaf.jpg'),
(5, 'VW e-Golf', 'G398I4783', 3, NULL, 'http://www.nextgreencar.com/i/news_support/VW-eGolf.jpg'),
(6, 'Sono Motors', 'S037829', 1, NULL, 'https://images.ecosia.org/6Vfb13kU35Qz00aC-itE-Jg41EQ=/0x390/smart/https%3A%2F%2Futopia.de%2Fapp%2Fuploads%2F2017%2F07%2Fsolarauto-sion-event-car2_z_sono-motors-170728-1280x800-1024x640.jpg'),
(7, 'HYUNDAI Ioniq', 'IQ84937', 2, NULL, 'http://www.nextgreencar.com/i/news_support/Hyundai-Ioniq-Electric.jpg'),
(8, 'TOYOTA Yaris 1.5', 'YXZY83682', 2, NULL, 'http://www.nextgreencar.com/i/vehicle_large_290/toyotayaris2017.jpg'),
(9, 'KIA Niro', 'NiRo9837', 2, NULL, 'http://www.nextgreencar.com/i/vehicle_large_290/kianiro2016.jpg'),
(10, 'TOYOTA C-HR', 'CH39R8', 2, NULL, 'http://www.nextgreencar.com/i/vehicle_large_290/toyotachr2016.jpg'),
(11, 'SUZUKI Ignis', 'ISZ87653', 2, NULL, 'http://www.nextgreencar.com/i/vehicle_large_290/suzukiignis2016.jpg.jpg'),
(12, 'KIA NIRO', 'U73936', 3, NULL, 'http://www.nextgreencar.com/i/news_xlarge/Niro-EV-2018.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car_type`
--

CREATE TABLE `car_type` (
  `car_typeID` int(11) NOT NULL DEFAULT '0',
  `car_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car_type`
--

INSERT INTO `car_type` (`car_typeID`, `car_type`) VALUES
(1, 'Solar'),
(2, 'Hybrid'),
(3, 'Electro');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `fname` varchar(55) DEFAULT NULL,
  `lname` varchar(55) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone_no` int(11) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `fk_address` int(11) DEFAULT NULL,
  `fk_lended` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`customerID`, `fname`, `lname`, `email`, `telephone_no`, `password`, `fk_address`, `fk_lended`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f3', NULL, NULL),
(2, 'Sabine', 'Steiger', 'sabine@gmail.com', NULL, '2eff821d3e45468f13deac8d7f689a16aba442d6af2e5cd2e0bec42', NULL, NULL),
(3, 'Sabine', 'Steiger', 'sabine.steiger@gmail.com', NULL, '2eff821d3e45468f13deac8d7f689a16aba442d6af2e5cd2e0bec42', NULL, NULL),
(4, 'bine', 'sum', 'bine@gmail.com', NULL, '73ebe1446c9af9edf861d958ed0df9591dc29bf197523a54b01bdca', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `GPS`
--

CREATE TABLE `GPS` (
  `ID` int(11) NOT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lended`
--

CREATE TABLE `lended` (
  `lendedID` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `fk_carID` int(11) DEFAULT NULL,
  `fk_customerID` int(11) DEFAULT NULL,
  `fk_officeID` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offices`
--

CREATE TABLE `offices` (
  `officeID` int(11) NOT NULL,
  `fk_carID` int(11) DEFAULT NULL,
  `fk_address` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `offices`
--

INSERT INTO `offices` (`officeID`, `fk_carID`, `fk_address`) VALUES
(1, 5, 1),
(2, 1, 2),
(3, 4, 3),
(4, 2, 4),
(5, 10, 5);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carID`),
  ADD KEY `fk_lended` (`fk_lended`),
  ADD KEY `fk_type` (`fk_type`);

--
-- Indizes für die Tabelle `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`car_typeID`);

--
-- Indizes für die Tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `fk_address` (`fk_address`),
  ADD KEY `fk_lended` (`fk_lended`);

--
-- Indizes für die Tabelle `GPS`
--
ALTER TABLE `GPS`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `lended`
--
ALTER TABLE `lended`
  ADD PRIMARY KEY (`lendedID`);

--
-- Indizes für die Tabelle `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`officeID`),
  ADD KEY `fk_address` (`fk_address`),
  ADD KEY `fk_carID` (`fk_carID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `GPS`
--
ALTER TABLE `GPS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `lended`
--
ALTER TABLE `lended`
  MODIFY `lendedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `offices`
--
ALTER TABLE `offices`
  MODIFY `officeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_lended`) REFERENCES `lended` (`lendedID`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`fk_type`) REFERENCES `car_type` (`car_typeID`);

--
-- Constraints der Tabelle `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`fk_address`) REFERENCES `address` (`addressID`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`fk_lended`) REFERENCES `lended` (`lendedID`);

--
-- Constraints der Tabelle `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`fk_address`) REFERENCES `address` (`addressID`),
  ADD CONSTRAINT `offices_ibfk_2` FOREIGN KEY (`fk_carID`) REFERENCES `cars` (`carID`);
