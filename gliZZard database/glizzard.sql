-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2024 at 01:07 PM
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
-- Table structure for table `admin_detail`
--

DROP TABLE IF EXISTS `admin_detail`;
CREATE TABLE IF NOT EXISTS `admin_detail` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `adminEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`adminID`, `adminEmail`, `adminPassword`) VALUES
(1, 'admin@email.com', 'admin');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`cusId`, `cusName`, `cusAddress`, `cusTele`, `cusEmail`, `cusPassword`) VALUES
(1, 'wick', 'brooklyn', 778686756, 'wick@email.com', 'wick'),
(2, 'joe', 'galle', 779090879, 'joe@email.com', '1234'),
(7, 'dinan', 'galle', 775106574, 'dinan@gmail.com', 'dinan'),
(8, 'Chanuka', 'Galle ', 761603621, 'chanuka@email.com', '12345'),
(9, 'prabhath', 'Galle', 776398091, 'prabhath@gmail.com', '123'),
(10, 'kamal', 'colombo', 778989076, 'kamal@email.com', '12');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

DROP TABLE IF EXISTS `item_details`;
CREATE TABLE IF NOT EXISTS `item_details` (
  `itemID` int NOT NULL AUTO_INCREMENT,
  `itemName` varchar(50) DEFAULT NULL,
  `itemQty` int DEFAULT NULL,
  `unitPrice` int DEFAULT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`itemID`, `itemName`, `itemQty`, `unitPrice`) VALUES
(1, 'Bio Hazard', 2, 19000),
(6, 'Red Dead Redemption 2', 1, 22000),
(7, 'God of War - Ragnarok', 1, 25000),
(11, 'Assassins Creed Mirage', 1, 28000),
(10, 'Dark Souls', 1, 16000),
(12, 'Devil May Cry 5', 1, 22000),
(13, 'Call of Duty Black Ops 4', 1, 24000),
(14, 'Elden Ring', 1, 26000),
(15, 'Alan Wake 2', 1, 29000);

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
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `orderID` (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderpayment`
--

INSERT INTO `orderpayment` (`paymentID`, `paymentMethod`, `cardNo`, `paymentDate`, `orderID`, `status`) VALUES
(13, 'Credit Card', 2147483647, '2024-03-01', 28, 'confirmed'),
(14, 'PayPal', 2147483647, '2024-03-04', 29, 'confirmed'),
(15, 'Debit Card', 2147483647, '2024-03-02', 30, 'confirmed'),
(16, 'Credit Card', 2147483647, '2024-03-05', 31, 'confirmed'),
(17, 'Debit Card', 2147483647, '2024-02-28', 32, 'confirmed'),
(19, 'PayPal', 2147483647, '2024-02-26', 33, 'confirmed'),
(21, 'Credit Card', 1234567899, '2024-03-06', 35, 'confirmed'),
(22, 'Credit Card', 2147483647, '2024-03-06', 36, 'pending'),
(23, 'Debit Card', 2147483647, '2024-03-13', 37, 'pending'),
(24, 'Debit Card', 22224677, '2024-03-05', 38, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `cusID` int DEFAULT NULL,
  `orderedItem` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `totalAmount` int DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `cusID` (`cusID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `cusID`, `orderedItem`, `totalAmount`) VALUES
(28, 7, 'God of War - Ragnarok', 25000),
(29, 1, 'RDR 2', 22000),
(30, 2, 'Mirage', 28000),
(31, 2, 'Alan Wake 2', 29000),
(32, 7, 'Devil May Cry 5', 22000),
(33, 1, 'Alan Wake 2', 29000),
(34, 1, 'God of War - Ragnarok', 25000),
(35, 8, 'Red Dead Redemption 2', 22000),
(36, 9, 'God of War - Ragnarok', 25000),
(37, 1, 'God of War - Ragnarok', 25000),
(38, 10, 'Red Dead Redemption 2', 22000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
