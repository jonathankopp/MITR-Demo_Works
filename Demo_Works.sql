-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2018 at 08:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Demo_Works`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `ContactTitle` varchar(30) DEFAULT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(15) NOT NULL,
  `PostalCode` int(5) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Notes` varchar(180) DEFAULT NULL,
  PRIMARY KEY(`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `ContactTitle`, `Address`, `City`, `PostalCode`, `Phone`) VALUES
(1, 'Joey', 'PEPE', NULL, '29 Cedar St', 'Syosset', 11791, 222222222,'joey.j@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  'jID' int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CustomerID` int(5) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL,
  `Block Lot` varchar(15) NOT NULL,
  `Community Board` varchar(60) NOT NULL,
  `PostalCode` int(10) NOT NULL,
  PRIMARY KEY(`jID`)
) 


CREATE TABLE `Check_Off` (
  'jID' int(5) NOT NULL,
  `FormType` int(5) NOT NULL,
  `D_Req` varchar(60) DEFAULT NULL,
  `D_Rec` varchar(60) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL
)
--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `PGL Insurance WC/Liab/Dis Ins`, `Rodent Control Letter`, `Gas Cut Off boolean`, `Water/Sewer Cut Off`, `SRO Intake Form`, `10 Day Notice Letter`, `Community Board Notice`, `Asbestos Report ACP5/AP21`, `Photographs`, `Landmark Letter`, `PW-1 Application`, `PW-2 App. Demo/Fence`, `Blank Check DOB Filing/Perimit`, `TR1/DS1 from Engineer`, `Tax Map`, `Fence Filing`, `CustomerID`) VALUES
('Joey', 'PEPE', '29 Cedar St', 'Syosset', 11791, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
