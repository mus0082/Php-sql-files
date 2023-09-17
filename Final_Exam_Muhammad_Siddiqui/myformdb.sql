-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 04:10 AM
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
-- Database: `myformdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `username` varchar(255) NOT NULL,
  `password` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`username`, `password`) VALUES
('uzairuddin95', 'password'),
('uzairuddin95', 'asdasd'),
('uzairuddin95', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `formsinserttable`
--

CREATE TABLE `formsinserttable` (
  `FullName` varchar(55) NOT NULL,
  `ContactNumber` int(24) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `EventName` varchar(255) NOT NULL,
  `NumberofParticipants` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formsinserttable`
--

INSERT INTO `formsinserttable` (`FullName`, `ContactNumber`, `EmailAddress`, `EventName`, `NumberofParticipants`) VALUES
('Muhammad', 2147483647, 'jaskdnh@hotmail.com', 'Ball-Party', 2),
('kasjdg', 2147483647, 'jaskdnh@hotmail.com', 'Ball-Party', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
