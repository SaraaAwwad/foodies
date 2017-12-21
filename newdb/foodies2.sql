-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2017 at 07:37 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Image` varchar(250) NOT NULL,
  `LastVisited` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Email`, `Password`, `FName`, `LName`, `CreationDate`, `Image`, `LastVisited`) VALUES
(1, 'hamada', '1234', 'hassan', 'hamyd', '2017-12-13 22:00:00', 'aaa', '2017-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Area` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`ID`, `Area`) VALUES
(1, 'Fifth Settlement'),
(2, 'Maadi'),
(3, 'Nasr City'),
(4, 'Heliopolis'),
(5, 'Sheraton'),
(6, 'Rehab'),
(7, '6 October'),
(8, 'Tahrir Square'),
(9, 'Dokki'),
(10, 'Mohandesen');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

DROP TABLE IF EXISTS `cuisine`;
CREATE TABLE IF NOT EXISTS `cuisine` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RestID` int(3) NOT NULL,
  `Type` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `RestID` (`RestID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`ID`, `RestID`, `Type`) VALUES
(1, 16, 'aaa'),
(2, 19, 'hamada'),
(4, 22, 'American'),
(6, 26, 'hamada'),
(8, 28, 'italian'),
(10, 30, 'hamada'),
(11, 30, 'hamada'),
(12, 32, 'Chinese'),
(13, 32, 'Chinese'),
(14, 36, 'hamada'),
(15, 36, 'hamada'),
(16, 39, 'turkey'),
(17, 40, 'italiam');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `UserID` int(3) NOT NULL,
  `Area` varchar(20) NOT NULL,
  `Street` varchar(20) NOT NULL,
  `Building` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `TotalPrice` float NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `OrderID` int(7) NOT NULL,
  `ProdID` int(4) DEFAULT NULL,
  `Price` float NOT NULL,
  `Quantity` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `order_item_ibfk_1` (`OrderID`),
  KEY `ProdID` (`ProdID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `RestID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `RestID` (`RestID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_value`
--

DROP TABLE IF EXISTS `prod_value`;
CREATE TABLE IF NOT EXISTS `prod_value` (
  `ProdID` int(4) NOT NULL,
  `Price` float NOT NULL,
  `Size` varchar(20) NOT NULL,
  PRIMARY KEY (`ProdID`,`Price`,`Size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Hotline` varchar(10) NOT NULL,
  `DelvFees` float NOT NULL,
  `DelvTime` varchar(10) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `AdminID` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `restaurant_ibfk_1` (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`ID`, `Name`, `Hotline`, `DelvFees`, `DelvTime`, `Image`, `AdminID`) VALUES
(14, 'aaaaaaaabbb', '19200', 200, '10', 'hamada', 1),
(16, 'hamdy', '1911', 200, '10', 'aaa', 1),
(19, 'as', '10101', 100, '10', 'aaa', 1),
(22, 'MAC', '16000', 200, '10', 'aaa', 1),
(24, 'aaaaa', '16001', 900, '11', '1111', 1),
(26, 'abab', '800', 1000, '100', 'awawa', 1),
(28, 'Yummy', '8000', 500, '15', 'kokok', 1),
(30, 'aaaaaaaaaaa', '19200', 100, '11', 'aaa', 1),
(32, 'ITaliano', '160000', 2000, '10', 'awawa', 1),
(36, 'aaa', '1911', 500, '15', '1111', 1),
(38, 'Kentucky', '19111', 101, '10', 'ada', 1),
(39, 'Turkey', '77577', 1000, '10', 'aa', 1),
(40, 'Lily', '888', 88, '88', 'mo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rest_area`
--

DROP TABLE IF EXISTS `rest_area`;
CREATE TABLE IF NOT EXISTS `rest_area` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_area`
--

INSERT INTO `rest_area` (`ID`, `RID`, `AID`) VALUES
(1, 38, 0),
(2, 38, 0),
(3, 38, 0),
(4, 38, 0),
(5, 38, 4),
(6, 39, 1),
(7, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Rating` int(11) NOT NULL,
  `UserID` int(4) DEFAULT NULL,
  `RestID` int(4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `RestID` (`RestID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UID` int(4) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `Building` varchar(30) NOT NULL,
  `Image` varchar(250) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD CONSTRAINT `cuisine_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`ProdID`) REFERENCES `products` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
