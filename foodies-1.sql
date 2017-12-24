-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 08:18 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `CreationDate` date NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Email`, `Password`, `FName`, `LName`, `CreationDate`, `Image`) VALUES
(1, 'sara@admin.com', 'bla', 'sara', 'hassan', '0000-00-00', 'img');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `RestID` int(3) NOT NULL,
  `Area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`RestID`, `Area`) VALUES
(2, 'Maadi');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `RestID` int(3) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`RestID`, `Type`) VALUES
(2, 'Salad');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(1) NOT NULL,
  `UserID` int(1) DEFAULT NULL,
  `Area` varchar(20) NOT NULL,
  `Street` varchar(20) NOT NULL,
  `Building` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `TotalPrice` float NOT NULL,
  `RestID` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `OrderID` int(7) NOT NULL,
  `ProdID` int(1) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(350) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `RestID` int(3) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Description`, `Image`, `Category`, `RestID`, `Status`) VALUES
(1, 'Chicken MACDO ®', 'Crispy, tender spicy chicken Pattie seasoned \r\nwith a bold mix of spices,\r\ntopped with shredded iceberg lettuce,\r\nmayonnaise and served on a perfectly toasty bun', 'chickenmac.png', 'Lunch', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prod_value`
--

CREATE TABLE `prod_value` (
  `ProdID` int(4) NOT NULL,
  `Price` float NOT NULL,
  `Size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_value`
--

INSERT INTO `prod_value` (`ProdID`, `Price`, `Size`) VALUES
(1, 20, 'Medium'),
(1, 10, 'Small');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `ID` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Hotline` varchar(10) NOT NULL,
  `DelvFees` float NOT NULL,
  `DelvTime` varchar(10) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `AdminID` int(2) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`ID`, `Name`, `Hotline`, `DelvFees`, `DelvTime`, `Image`, `AdminID`, `Status`) VALUES
(2, 'Mcdonald\'s', '19000', 10.2, '10mins', 'mac1.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(1) NOT NULL,
  `Rating` int(11) NOT NULL,
  `UserID` int(1) DEFAULT NULL,
  `RestID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `Building` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Email`, `Password`, `FName`, `LName`, `Area`, `Street`, `Building`) VALUES
(36, 'sara@yahoo.com', '$2y$08$smSstU5e3yZcsU3r8KiazOmjvc0BdNQPeEgzqXIITR9M6zEqDFjfW', 's', 'a', 'a', 'a', 'aa'),
(37, 'masalan@masalan.com', '$2y$08$HayElGBEYkmEFmp49QB7N.r.vXVt/BC0qnSng4vsu5sqcrLYvi6fO', 'm', 'mm', 'm', 'm', 'm'),
(38, 'farah@yahoo.com', '$2y$08$V8gXKsDIt08jsGDF570tMuRNEr1izH5C20WSDaGPX3O8DpDHzhJri', 'farah', 'hisham', 'Nasr city', 'el nozha', '18'),
(39, 'menna@yahoo.com', '$2y$08$ldxmcIhcA0LHxfvNsaCfWOiAon9Dc7tLUxxvar.udEa3EzVM2TwgG', 'menna', 'mohamed', 'maadi', 'maadi st', '12'),
(40, 'sherine@moussa.com', '$2y$08$15f81m2S81TW0Huubfg0q.hm5TvDkebfhzIXO6ORy1dOxdKF0KLue', 'sherine', 'moussa', 'miu', 'r', 'rc4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`RestID`,`Area`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`RestID`,`Type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `orders_ibfk_1` (`UserID`),
  ADD KEY `orders_ibfk_2` (`RestID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ProdID` (`ProdID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RestID` (`RestID`);

--
-- Indexes for table `prod_value`
--
ALTER TABLE `prod_value`
  ADD PRIMARY KEY (`ProdID`,`Size`) USING BTREE;

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `restaurant_ibfk_1` (`AdminID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RestID` (`RestID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD CONSTRAINT `cuisine_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

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
