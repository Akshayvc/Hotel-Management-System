-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2017 at 06:32 AM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `BI_NO` int(4) NOT NULL,
  `SL_NO` int(5) NOT NULL,
  `F_NAME` varchar(15) NOT NULL,
  `QUANTITY` int(3) NOT NULL,
  `AMOUNT` int(5) NOT NULL,
  `C_ID` varchar(8) NOT NULL,
  `B_DATE` date NOT NULL,
  `TAX` int(4) NOT NULL,
  `OI_ID` varchar(8) NOT NULL,
  `NET_AMT` int(5) NOT NULL,
  PRIMARY KEY (`F_NAME`),
  KEY `C_ID` (`C_ID`),
  KEY `OI_ID` (`OI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`BI_NO`, `SL_NO`, `F_NAME`, `QUANTITY`, `AMOUNT`, `C_ID`, `B_DATE`, `TAX`, `OI_ID`, `NET_AMT`) VALUES
(1112, 2, 'FALOODA', 2, 160, 'ROYC101', '2017-11-07', 5, 'ROYOI101', 165),
(1113, 3, 'FINGER CHIPS', 1, 100, 'ROYC102', '2017-11-09', 10, 'ROYOI103', 110),
(1115, 5, 'FRY PAPAD', 1, 20, 'ROYC104', '2017-11-07', 0, 'ROYOI106', 20),
(1114, 4, 'PISTA', 2, 80, 'ROYC104', '2017-11-13', 5, 'ROYOI105', 85),
(1111, 1, 'VENILLA', 1, 20, 'ROYC100', '2017-11-01', 5, 'royoi100', 20);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CAT_ID` int(3) NOT NULL AUTO_INCREMENT,
  `CAT_DES` varchar(15) NOT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_DES`) VALUES
(100, 'ICE CREAM'),
(101, 'JUICE CORNER'),
(103, 'SNACKS'),
(104, 'PAPAD');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `C_ID` varchar(8) NOT NULL,
  `C_NAME` varchar(20) NOT NULL,
  `ADDRESS` varchar(30) NOT NULL,
  `MOBILE_NO` varchar(12) NOT NULL,
  `W_ID` varchar(8) NOT NULL,
  `T_ID` int(3) NOT NULL,
  PRIMARY KEY (`C_ID`),
  KEY `W_ID` (`W_ID`),
  KEY `T_ID` (`T_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_NAME`, `ADDRESS`, `MOBILE_NO`, `W_ID`, `T_ID`) VALUES
('123', 'anish', 'hubli', '123456', 'ROYW104', 300),
('ROYC100', 'AJAY', 'HUBBALLI', '123654789', 'ROYW104', 300),
('ROYC101', 'SUNIL', 'SAVADATTI', '214563458', 'ROYW105', 302),
('ROYC102', 'ABHI', 'BIJAPUR', '125478963', 'ROYW104', 304),
('ROYC104', 'KOUSHIK', 'HUBBALLI', '142536789', 'ROYW104', 301),
('ROYC105', 'RAMYA', 'BANGLORE', '1425369875', 'ROYW105', 302),
('ROYC108', 'LIKITH', 'BELLARY', '123654896', 'ROYW104', 303);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `DESG_NO` int(5) NOT NULL,
  `MG_ID` varchar(8) NOT NULL,
  `DESG_NAME` varchar(10) NOT NULL,
  `SALARY` int(6) NOT NULL,
  PRIMARY KEY (`MG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`DESG_NO`, `MG_ID`, `DESG_NAME`, `SALARY`) VALUES
(10, 'ROYD100', 'MANAGER', 20000),
(11, 'ROYD101', '', 0),
(13, 'ROYM103', 'COOK', 0),
(14, 'ROYM104', 'WAITER', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

DROP TABLE IF EXISTS `food_item`;
CREATE TABLE IF NOT EXISTS `food_item` (
  `FIT_ID` int(3) NOT NULL,
  `FIT_NAME` varchar(15) NOT NULL,
  `RATE` int(4) NOT NULL,
  `CAT_ID` int(3) NOT NULL,
  PRIMARY KEY (`FIT_ID`),
  KEY `CAT_ID` (`CAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`FIT_ID`, `FIT_NAME`, `RATE`, `CAT_ID`) VALUES
(200, 'VENILLA', 40, 100),
(201, 'FALOODA', 80, 101),
(202, 'PISTA', 40, 100),
(203, 'FINGER CHIPS', 100, 103),
(205, 'FRY PAPAD', 20, 104),
(206, 'MANGO', 10, 101),
(207, 'straberry', 20, 101),
(208, 'chocolate', 15, 100),
(209, 'fingers', 100, 103),
(210, 'milk shake', 50, 101),
(211, 'lijath', 30, 104),
(212, 'cup', 8, 100),
(213, 'chips', 5, 103),
(214, 'apple', 60, 101),
(215, 'butterswatch', 40, 100);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `LOG_ID` varchar(10) NOT NULL,
  `LOG_NAME` varchar(20) NOT NULL,
  `LOG_PASS` varchar(20) NOT NULL,
  `LOG_TYPE` varchar(10) NOT NULL,
  `C_DATE` date NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  PRIMARY KEY (`LOG_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LOG_ID`, `LOG_NAME`, `LOG_PASS`, `LOG_TYPE`, `C_DATE`, `STATUS`) VALUES
('royl100', 'ADMIN', 'ADMIN', 'MANAGER', '2017-11-01', 'ACTIVE'),
('royl101', 'ACCOUNTANT', 'ACCOUNTANT', 'ACCOUNTANT', '2017-11-01', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `O_ID` varchar(8) NOT NULL,
  `T_ID` int(3) NOT NULL,
  `O_T_D` timestamp NOT NULL,
  `FIT_ID` int(3) NOT NULL,
  `C_ID` varchar(8) NOT NULL,
  PRIMARY KEY (`O_ID`),
  KEY `T_ID` (`T_ID`),
  KEY `FIT_ID` (`FIT_ID`),
  KEY `C_ID` (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`O_ID`, `T_ID`, `O_T_D`, `FIT_ID`, `C_ID`) VALUES
('royo100', 300, '2017-10-31 22:41:14', 200, 'ROYC100'),
('ROYO101', 300, '2017-10-31 21:48:22', 201, 'ROYC101'),
('ROYO102', 302, '2017-11-01 20:42:13', 203, 'ROYC102'),
('ROYO105', 304, '2017-11-13 20:46:00', 202, 'ROYC104'),
('ROYO106', 302, '2017-11-01 18:30:00', 205, 'ROYC105');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `OI_ID` varchar(8) NOT NULL,
  `O_ID` varchar(8) NOT NULL,
  `FIT_ID` int(3) NOT NULL,
  `QUANTITY` int(3) NOT NULL,
  `AMOUNT` int(5) NOT NULL,
  `R_P_I` int(4) NOT NULL,
  `W_ID` varchar(8) NOT NULL,
  PRIMARY KEY (`OI_ID`),
  KEY `O_ID` (`O_ID`),
  KEY `FIT_ID` (`FIT_ID`),
  KEY `W_ID` (`W_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`OI_ID`, `O_ID`, `FIT_ID`, `QUANTITY`, `AMOUNT`, `R_P_I`, `W_ID`) VALUES
('royoi100', 'ROYO101', 200, 1, 20, 20, 'ROYW104'),
('ROYOI101', 'ROYO101', 201, 2, 160, 80, 'ROYW104'),
('ROYOI102', 'ROYO102', 205, 2, 40, 20, 'ROYW105'),
('ROYOI103', 'ROYO102', 200, 1, 40, 40, 'ROYW105'),
('ROYOI105', 'ROYO105', 203, 1, 100, 100, 'ROYW105'),
('ROYOI106', 'ROYO106', 205, 1, 20, 20, 'ROYW105');

-- --------------------------------------------------------

--
-- Table structure for table `rtable`
--

DROP TABLE IF EXISTS `rtable`;
CREATE TABLE IF NOT EXISTS `rtable` (
  `T_ID` int(3) NOT NULL,
  `T_CAPACITY` int(2) NOT NULL,
  `W_ID` varchar(8) NOT NULL,
  `OCCUPIED` tinyint(1) NOT NULL,
  PRIMARY KEY (`T_ID`),
  KEY `W_ID` (`W_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtable`
--

INSERT INTO `rtable` (`T_ID`, `T_CAPACITY`, `W_ID`, `OCCUPIED`) VALUES
(300, 5, 'ROYW104', 0),
(301, 5, 'ROYW104', 0),
(302, 5, 'ROYW105', 0),
(303, 4, 'ROYW105', 0),
(304, 5, 'ROYW104', 0),
(305, 5, 'ROYW105', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
CREATE TABLE IF NOT EXISTS `workers` (
  `W_ID` varchar(8) NOT NULL,
  `W_NAME` varchar(20) NOT NULL,
  `W_ADDRESS` varchar(30) NOT NULL,
  `MOBILE_NO` varchar(12) NOT NULL,
  `GENDER` varchar(6) NOT NULL,
  `MG_ID` varchar(8) NOT NULL,
  PRIMARY KEY (`W_ID`),
  KEY `MG_ID` (`MG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`W_ID`, `W_NAME`, `W_ADDRESS`, `MOBILE_NO`, `GENDER`, `MG_ID`) VALUES
('ROYW100', 'SANKET', 'BIJAPUR', '123456789', 'MALE', 'ROYD100'),
('ROYW101', 'HEMANTHRAJ', 'DAVANGERE', '123456789', 'MALE', 'ROYD101'),
('ROYW102', 'HEMANTH', 'BAGALKOT', '1236547895', 'MALE', 'ROYD101'),
('ROYW103', 'NAVEEN', 'BELLARY', '142536789', 'MALE', 'ROYM103'),
('ROYW104', 'SANTOSH', 'GOKAK', '125469875', 'MALE', 'ROYM104'),
('ROYW105', 'ANAND', 'BAGALKOT', '12457862', 'MALE', 'ROYM104');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`OI_ID`) REFERENCES `order_item` (`OI_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`W_ID`) REFERENCES `workers` (`W_ID`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`T_ID`) REFERENCES `rtable` (`T_ID`);

--
-- Constraints for table `food_item`
--
ALTER TABLE `food_item`
  ADD CONSTRAINT `food_item_ibfk_1` FOREIGN KEY (`CAT_ID`) REFERENCES `category` (`CAT_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`T_ID`) REFERENCES `rtable` (`T_ID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`FIT_ID`) REFERENCES `food_item` (`FIT_ID`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `order_details` (`O_ID`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`FIT_ID`) REFERENCES `food_item` (`FIT_ID`),
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`W_ID`) REFERENCES `workers` (`W_ID`);

--
-- Constraints for table `rtable`
--
ALTER TABLE `rtable`
  ADD CONSTRAINT `rtable_ibfk_1` FOREIGN KEY (`W_ID`) REFERENCES `workers` (`W_ID`);

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`MG_ID`) REFERENCES `designation` (`MG_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
