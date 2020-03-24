-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 29, 2020 at 09:10 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cars`
--

CREATE TABLE `Cars` (
  `Id` int(11) NOT NULL,
  `Plate` varchar(20) NOT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Model` varchar(100) DEFAULT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Channels`
--

CREATE TABLE `Channels` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Channels`
--

INSERT INTO `Channels` (`Id`, `Name`, `Id_Users`) VALUES
(1, 'TEST', 1),
(2, 'Discord', 2),
(3, 'Refund', 2),
(4, 'PFR', 2),
(5, 'Intranet', 2),
(6, 'Bonjour', 2),
(7, 'oklm', 2),
(8, 'Timote', 2),
(9, 'Perso', 2),
(10, 'Second Test', 2),
(11, 'BG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Channels_class`
--

CREATE TABLE `Channels_class` (
  `Id` int(11) NOT NULL,
  `Id_Channels` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Channel_users`
--

CREATE TABLE `Channel_users` (
  `Id` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Channel_users`
--

INSERT INTO `Channel_users` (`Id`, `Id_Users`) VALUES
(2, 1),
(4, 1),
(2, 2),
(4, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(2, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Year_begin` date NOT NULL,
  `Year_end` date NOT NULL,
  `etablishment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Classes`
--

CREATE TABLE `Classes` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Matter` varchar(100) NOT NULL,
  `Begin` datetime NOT NULL,
  `End` datetime NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Depo`
--

CREATE TABLE `Depo` (
  `Id` int(11) NOT NULL,
  `Id_Class` int(11) NOT NULL,
  `Id_Deposit` int(11) NOT NULL,
  `File` longtext NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Deposit`
--

CREATE TABLE `Deposit` (
  `Id` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Discussion`
--

CREATE TABLE `Discussion` (
  `Id` int(11) NOT NULL,
  `Id_Channels` int(11) NOT NULL,
  `Id_Messages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Discussion`
--

INSERT INTO `Discussion` (`Id`, `Id_Channels`, `Id_Messages`) VALUES
(1, 2, 2),
(1, 2, 9),
(1, 2, 10),
(1, 2, 11),
(2, 2, 3),
(2, 2, 5),
(2, 2, 6),
(2, 2, 7),
(2, 2, 8),
(3, 2, 12),
(3, 2, 13),
(3, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `Id` int(11) NOT NULL,
  `Content` varchar(500) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`Id`, `Content`, `Date`) VALUES
(1, 'Bonjour !', '0000-00-00 00:00:00'),
(2, 'Salut ! ', '0000-00-00 00:00:00'),
(3, 'Comment ça va ?', '0000-00-00 00:00:00'),
(4, 'Tranquille et toi ? ', '0000-00-00 00:00:00'),
(5, 'Tranquille, tranquille', '0000-00-00 00:00:00'),
(6, 'Test', '2020-02-28 16:01:54'),
(7, 'Bonjour tout le monde', '2020-02-28 16:03:23'),
(8, 'Bien ou bien ? ', '2020-02-28 16:03:32'),
(9, 'Salam ', '2020-02-28 16:04:32'),
(10, 'Ã§a va ? ', '2020-02-28 16:07:19'),
(11, 'Test', '2020-02-28 16:43:36'),
(12, 'Salut les gars', '2020-02-28 16:49:39'),
(13, 'Ã§a va et vous ? ', '2020-02-28 16:49:49'),
(14, 'Test', '2020-02-28 16:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `Note`
--

CREATE TABLE `Note` (
  `Id` int(11) NOT NULL,
  `Id_Classes` int(11) NOT NULL,
  `Id_Notes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
  `Id` int(11) NOT NULL,
  `Note` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

CREATE TABLE `Timetable` (
  `Id` int(11) NOT NULL,
  `Id_Class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Birth` date DEFAULT NULL,
  `Post` varchar(50) DEFAULT NULL,
  `Picture` text,
  `Phone` int(11) DEFAULT NULL,
  `Address` text,
  `Tutor` varchar(100) DEFAULT NULL,
  `Tutor_mail` varchar(150) DEFAULT NULL,
  `Mail` varchar(150) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Id_Class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Level`, `Last_name`, `First_name`, `Birth`, `Post`, `Picture`, `Phone`, `Address`, `Tutor`, `Tutor_mail`, `Mail`, `Password`, `Id_Class`) VALUES
(1, 1, 'LAGOUTTE', 'Lorenzo', '2020-02-28', 'Eleve', NULL, NULL, NULL, NULL, NULL, 'thelorenzo533@gmail.com', '$2y$10$yu95aanZmR.lNvRcLhi/yO1nOZ2siyY/VDBI1/uFgrg9JzWOOUoCS', NULL),
(2, 1, 'LAINE', 'Timothe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tlaine@viacesi.fr', '$2y$10$yu95aanZmR.lNvRcLhi/yO1nOZ2siyY/VDBI1/uFgrg9JzWOOUoCS', NULL),
(3, 1, 'DOPPLER', 'Quentin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qdoppler@viacesi.fr', '$2y$10$yu95aanZmR.lNvRcLhi/yO1nOZ2siyY/VDBI1/uFgrg9JzWOOUoCS', NULL),
(4, 1, 'GROSDOIGT', 'Quentin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qgrosdoigt@viacesi.fr', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cars`
--
ALTER TABLE `Cars`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Cars_Users_FK` (`Id_Users`);

--
-- Indexes for table `Channels`
--
ALTER TABLE `Channels`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Channels_Users_FK` (`Id_Users`);

--
-- Indexes for table `Channels_class`
--
ALTER TABLE `Channels_class`
  ADD PRIMARY KEY (`Id`,`Id_Channels`),
  ADD KEY `Channels_class_Channels0_FK` (`Id_Channels`);

--
-- Indexes for table `Channel_users`
--
ALTER TABLE `Channel_users`
  ADD PRIMARY KEY (`Id`,`Id_Users`),
  ADD KEY `Channel_users_Users0_FK` (`Id_Users`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Classes`
--
ALTER TABLE `Classes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Classes_Users_FK` (`Id_Users`);

--
-- Indexes for table `Depo`
--
ALTER TABLE `Depo`
  ADD PRIMARY KEY (`Id`,`Id_Class`,`Id_Deposit`),
  ADD KEY `Depo_Class0_FK` (`Id_Class`),
  ADD KEY `Depo_Deposit1_FK` (`Id_Deposit`);

--
-- Indexes for table `Deposit`
--
ALTER TABLE `Deposit`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Discussion`
--
ALTER TABLE `Discussion`
  ADD PRIMARY KEY (`Id`,`Id_Channels`,`Id_Messages`),
  ADD KEY `Discussion_Channels0_FK` (`Id_Channels`),
  ADD KEY `Discussion_Messages1_FK` (`Id_Messages`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`Id`,`Id_Classes`,`Id_Notes`),
  ADD KEY `Note_Classes0_FK` (`Id_Classes`),
  ADD KEY `Note_Notes1_FK` (`Id_Notes`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD PRIMARY KEY (`Id`,`Id_Class`),
  ADD KEY `Timetable_Class0_FK` (`Id_Class`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Users_Class_FK` (`Id_Class`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cars`
--
ALTER TABLE `Cars`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Channels`
--
ALTER TABLE `Channels`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Classes`
--
ALTER TABLE `Classes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Deposit`
--
ALTER TABLE `Deposit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Notes`
--
ALTER TABLE `Notes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cars`
--
ALTER TABLE `Cars`
  ADD CONSTRAINT `Cars_Users_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Channels`
--
ALTER TABLE `Channels`
  ADD CONSTRAINT `Channels_Users_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Channels_class`
--
ALTER TABLE `Channels_class`
  ADD CONSTRAINT `Channels_class_Channels0_FK` FOREIGN KEY (`Id_Channels`) REFERENCES `Channels` (`Id`),
  ADD CONSTRAINT `Channels_class_Class_FK` FOREIGN KEY (`Id`) REFERENCES `Class` (`Id`);

--
-- Constraints for table `Channel_users`
--
ALTER TABLE `Channel_users`
  ADD CONSTRAINT `Channel_users_Channels_FK` FOREIGN KEY (`Id`) REFERENCES `Channels` (`Id`),
  ADD CONSTRAINT `Channel_users_Users0_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Classes`
--
ALTER TABLE `Classes`
  ADD CONSTRAINT `Classes_Users_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Depo`
--
ALTER TABLE `Depo`
  ADD CONSTRAINT `Depo_Class0_FK` FOREIGN KEY (`Id_Class`) REFERENCES `Class` (`Id`),
  ADD CONSTRAINT `Depo_Deposit1_FK` FOREIGN KEY (`Id_Deposit`) REFERENCES `Deposit` (`Id`),
  ADD CONSTRAINT `Depo_Users_FK` FOREIGN KEY (`Id`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Discussion`
--
ALTER TABLE `Discussion`
  ADD CONSTRAINT `Discussion_Channels0_FK` FOREIGN KEY (`Id_Channels`) REFERENCES `Channels` (`Id`),
  ADD CONSTRAINT `Discussion_Messages1_FK` FOREIGN KEY (`Id_Messages`) REFERENCES `Messages` (`Id`),
  ADD CONSTRAINT `Discussion_Users_FK` FOREIGN KEY (`Id`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `Note_Classes0_FK` FOREIGN KEY (`Id_Classes`) REFERENCES `Classes` (`Id`),
  ADD CONSTRAINT `Note_Notes1_FK` FOREIGN KEY (`Id_Notes`) REFERENCES `Notes` (`Id`),
  ADD CONSTRAINT `Note_Users_FK` FOREIGN KEY (`Id`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD CONSTRAINT `Timetable_Class0_FK` FOREIGN KEY (`Id_Class`) REFERENCES `Class` (`Id`),
  ADD CONSTRAINT `Timetable_Classes_FK` FOREIGN KEY (`Id`) REFERENCES `Classes` (`Id`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_Class_FK` FOREIGN KEY (`Id_Class`) REFERENCES `Class` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
