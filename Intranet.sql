-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2020 at 05:41 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.28-3+ubuntu18.04.1+deb.sury.org+1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Channels`
--

CREATE TABLE `Channels` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Channels_class`
--

CREATE TABLE `Channels_class` (
  `Id` int(11) NOT NULL,
  `Id_Channels` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Channel_users`
--

CREATE TABLE `Channel_users` (
  `Id` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Deposit`
--

CREATE TABLE `Deposit` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Date` date DEFAULT NULL,
  `Size` int(11) NOT NULL,
  `Type` varchar(1) NOT NULL,
  `Author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Discussion`
--

CREATE TABLE `Discussion` (
  `Id` int(11) NOT NULL,
  `Id_Channels` int(11) NOT NULL,
  `Id_Messages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `Id` int(11) NOT NULL,
  `Content` varchar(500) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Note`
--

CREATE TABLE `Note` (
  `Id` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL,
  `Id_Classes` int(11) NOT NULL,
  `Id_Notes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
  `Id` int(11) NOT NULL,
  `Note` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Socket`
--

CREATE TABLE `Socket` (
  `Id` int(11) NOT NULL,
  `Token` text NOT NULL,
  `Expire` datetime NOT NULL,
  `Id_Channels` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

CREATE TABLE `Timetable` (
  `Id` int(11) NOT NULL,
  `Id_Classes` int(11) NOT NULL,
  `Id_Class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `Level` int(11) DEFAULT NULL,
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
  `Id_Class` int(11) DEFAULT NULL,
  `Sign` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Note_Users_FK` (`Id_Users`),
  ADD KEY `Note_Classes_FK` (`Id_Classes`),
  ADD KEY `Note_Notes1_FK` (`Id_Notes`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Socket`
--
ALTER TABLE `Socket`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Socket_Channels_FK` (`Id_Channels`),
  ADD KEY `Socket_Users0_FK` (`Id_Users`);

--
-- Indexes for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Timetable_Classes_FK` (`Id_Classes`),
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Notes`
--
ALTER TABLE `Notes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Socket`
--
ALTER TABLE `Socket`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Timetable`
--
ALTER TABLE `Timetable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `Note_Classes_FK` FOREIGN KEY (`Id_Classes`) REFERENCES `Classes` (`Id`),
  ADD CONSTRAINT `Note_Notes1_FK` FOREIGN KEY (`Id_Notes`) REFERENCES `Notes` (`Id`),
  ADD CONSTRAINT `Note_Users_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Socket`
--
ALTER TABLE `Socket`
  ADD CONSTRAINT `Socket_Channels_FK` FOREIGN KEY (`Id_Channels`) REFERENCES `Channels` (`Id`),
  ADD CONSTRAINT `Socket_Users0_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Timetable`
--
ALTER TABLE `Timetable`
  ADD CONSTRAINT `Timetable_Class0_FK` FOREIGN KEY (`Id_Class`) REFERENCES `Class` (`Id`),
  ADD CONSTRAINT `Timetable_Classes_FK` FOREIGN KEY (`Id_Classes`) REFERENCES `Classes` (`Id`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_Class_FK` FOREIGN KEY (`Id_Class`) REFERENCES `Class` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
