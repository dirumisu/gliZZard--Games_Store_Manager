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
-- Table structure for table `customer_detail`
--

DROP TABLE IF EXISTS `customer_detail`;
CREATE TABLE IF NOT EXISTS `customer_detail` (
  `cusId` int NOT NULL AUTO_INCREMENT,
  `cusName` varchar(100) DEFAULT NULL,
  `cusAddress` varchar(100) DEFAULT NULL,
  `cusTele` int DEFAULT NULL,
  `cusEmail` varchar(100) DEFAULT NULL,
  `cusPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cusId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`cusId`, `cusName`, `cusAddress`, `cusTele`, `cusEmail`, `cusPassword`) VALUES
(1, 'wick', 'brooklyn', 778686756, 'wick@email.com', 'wick'),
(2, 'joe', 'galle', 779090879, 'joe@email.com', '1234'),
(3, 'dinan', 'galle', 776090909, 'dinan@gmail.com', 'dd'),
(4, 'hana', 'kandy', 777854453, 'hana@email.com', 'hhh'),
(5, 'bryan', 'new york', 2147483647, 'bryan@email.com', 'b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
