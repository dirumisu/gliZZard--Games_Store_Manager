-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2024 at 10:47 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glizzard`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderpayment`
--

DROP TABLE IF EXISTS `orderpayment`;
CREATE TABLE IF NOT EXISTS `orderpayment` (
  `paymentID` int NOT NULL AUTO_INCREMENT,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `cardNo` int NOT NULL,
  `paymentDate` date DEFAULT NULL,
  `orderID` int DEFAULT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `orderID` (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderpayment`
--

INSERT INTO `orderpayment` (`paymentID`, `paymentMethod`, `cardNo`, `paymentDate`, `orderID`) VALUES
(4, 'Debit Card', 1212334455, '2024-03-04', 21),
(5, 'Debit Card', 1212334455, '2024-03-04', 21),
(6, 'Credit Card', 222, '2024-04-06', 21),
(7, 'Credit Card', 12224433, '2024-03-30', 22),
(8, 'Debit Card', 12123445, '2024-03-18', 23),
(9, 'PayPal', 435355678, '2024-03-20', 24),
(10, 'PayPal', 2147483647, '2024-03-04', 25),
(11, 'Credit Card', 4444, '2024-03-29', 26),
(12, 'Credit Card', 2222, '2024-03-07', 27);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
