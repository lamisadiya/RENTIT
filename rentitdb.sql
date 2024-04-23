-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 10:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `adminID` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`adminID`, `FirstName`, `LastName`, `email`, `password`) VALUES
(1, 'Farhat', 'lamisa', 'lamisa.diya09@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_ownerstb`
--

CREATE TABLE `apartment_ownerstb` (
  `OwnerID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `NID` varchar(255) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `ZipCode` varchar(30) DEFAULT NULL,
  `RentalHistory` text DEFAULT NULL,
  `Employment` varchar(50) DEFAULT NULL,
  `Ap_name` varchar(255) DEFAULT NULL,
  `sqrfoot` int(11) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `roomNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment_ownerstb`
--

INSERT INTO `apartment_ownerstb` (`OwnerID`, `name`, `email`, `phone`, `DOB`, `NID`, `Address`, `City`, `Area`, `ZipCode`, `RentalHistory`, `Employment`, `Ap_name`, `sqrfoot`, `rent`, `roomNo`) VALUES
(4, 'Nazah Mahmud', 'Nazah@gmail.com', '+8801579836673', '2023-09-28', '67484957954', 'mirpur dohs, blah blah', 'dgaka', 'Bashundhara', '2343246', 'No History', 'employed', 'Nazas Heaven', 5400, '1200', 6);

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`) VALUES
(1, 'lamisa', 'diya', '01994782966', 'lamisa.diya09@gmail.com', 'lorem'),
(2,'farhat','lamisa','01994782966','lamisadiya@gmail.com','bleh');
-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `custID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`custID`, `Fname`, `Lname`, `email`, `phone`, `password`) VALUES
(1,'lamisa','diya','lamisa.diya09@gmail.com','01994782966','lamisa'),
(2,'farhat','lamisa','bla@gmail.com','01234567433','12345678'),
(3,'Utsav ','Dhar','01923456344','blabla@gmail.com','12345678'),
(4,'Sadnan ','Haque ','bla@gmail.com','01237654899','12345678'),
(5,'Niloy','Sinha','Hello@gmail.com','01556783455','12345678'),
(6,'Joyeta ','Roy','hello@gmail.com','01445387677','12345678'),
(7,'Istiaq ','Ahmed','hi@gmail.com','01556386632','12345678');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintb`
--
ALTER TABLE `admintb`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `apartment_ownerstb`
--
ALTER TABLE `apartment_ownerstb`
  ADD PRIMARY KEY (`OwnerID`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`custID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintb`
--
ALTER TABLE `admintb`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apartment_ownerstb`
--
ALTER TABLE `apartment_ownerstb`
  MODIFY `OwnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
