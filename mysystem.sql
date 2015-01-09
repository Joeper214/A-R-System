	-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2014 at 08:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `accountID` int(11) NOT NULL AUTO_INCREMENT,
  `employeeID` int(11) NOT NULL,
  `accountType` int(11) NOT NULL,
  `accountStatus` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`accountID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `employeeID`, `accountType`, `accountStatus`, `username`, `password`) VALUES
(1, 1, 1, 1, 'admin', 'admin'),
(2, 2, 2, 1, 'cashier', 'cashier'),
(3, 3, 3, 1, 'technician', 'technician'),
(4, 4, 3, 2, 'tech', 'tech'),
(5, 6, 1, 2, 'kebin', 'Kebin'),
(6, 7, 4, 1, 'nicasio', 'nicasio'),
(7, 5, 2, 1, 'Joe', 'Joe'),
(8, 8, 1, 1, 'albert', 'albert');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brandID` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(25) NOT NULL,
  `brandStatus` int(11) NOT NULL,
  PRIMARY KEY (`brandID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`, `brandStatus`) VALUES
(1, 'Samsung', 1),
(2, 'Dell', 1),
(3, 'Asus', 1),
(4, 'Toshiba', 1),
(5, 'Acer', 1),
(6, 'Neo', 1),
(7, 'Compaq', 0),
(8, 'hp', 0),
(9, 'Packard Bell', 0),
(10, 'Kingston', 0),
(11, 'Seagate', 0),
(12, 'MSI', 0),
(13, 'eMaxx', 0),
(14, 'chimei', 0),
(15, 'sony', 0),
(16, 'Western Digital', 0),
(17, 'Maxtor', 0),
(18, 'pqi', 0),
(19, 'lenovo', 0),
(20, 'Compal', 0),
(21, 'Kingmax', 0),
(22, 'intex', 0),
(23, 'clicker', 0),
(24, 'genius', 0),
(25, 'aideAL', 0),
(26, 'eco power', 0),
(27, 'intel', 0),
(28, 'Owl City!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE IF NOT EXISTS `cartdetail` (
  `cartDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `transactionID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `warranty` varchar(25) NOT NULL,
  PRIMARY KEY (`cartDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(25) NOT NULL,
  `categoryDescription` varchar(225) NOT NULL,
  `categoryStatus` int(11) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryDescription`, `categoryStatus`) VALUES
(1, 'Monitor', 'Displays output to the user.', 1),
(2, 'Internal', 'Internal components of a computer', 1),
(3, 'Accessories', 'Added functionality to computers', 2),
(4, 'External', 'External components of a computer', 2),
(5, 'Printer', 'Prints a hard copy of a file', 2),
(6, 'Computer Case', 'Provide added enclosure to computers', 2),
(7, 'UPS', '', 2),
(9, 'Packages', 'Computer Packages', 2),
(10, 'Bato', 'Maglata ta ug bato!', 2);

-- --------------------------------------------------------

--
-- Table structure for table `disposed`
--

CREATE TABLE IF NOT EXISTS `disposed` (
  `disposedID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(25) NOT NULL,
  PRIMARY KEY (`disposedID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employeeID` int(11) NOT NULL AUTO_INCREMENT,
  `personID` int(11) NOT NULL,
  `employmentStatus` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `birthDate` date NOT NULL,
  `birthPlace` varchar(50) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `position` varchar(25) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `dateRegistered` date NOT NULL,
  PRIMARY KEY (`employeeID`),
  KEY `personID` (`personID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `personID`, `employmentStatus`, `gender`, `birthDate`, `birthPlace`, `religion`, `position`, `photo`, `dateRegistered`) VALUES
(1, 1, 1, 'Female', '1989-08-22', 'MSU, Marawi City', 'Islam', 'Manager', '', '2014-09-11'),
(2, 2, 1, 'Female', '1988-01-04', 'Marawi Ciy', 'Islam', 'Cashier', '', '2014-09-11'),
(3, 3, 2, 'Male', '1991-06-12', 'Marawi Ciy', 'Islam', 'Technician', '', '2014-09-11'),
(4, 4, 2, 'Male', '1988-10-02', 'Tagum City', 'Roman Catholic', 'Manager', '', '2014-09-11'),
(5, 8, 2, 'Male', '1993-02-15', 'Dr. Cuarteron Memorial Hospital, Tandag City', 'None', 'Cashier', NULL, '2000-02-01'),
(6, 11, 2, 'Male', '2014-10-02', 'Tiil', 'Born-Again Christian', 'Cashier', NULL, '2014-10-02'),
(7, 12, 1, 'Female', '1988-11-02', 'Tagum City', 'Born-Again Christian', 'Utility', NULL, '2014-10-02'),
(8, 13, 1, 'Male', '2014-10-02', 'Tiil', 'Roman Catholic', 'Manager', NULL, '2014-10-02'),
(9, 14, 1, 'Male', '2014-10-02', 'MSU, Marawi City', 'Islam', 'Manager', NULL, '2014-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `nonconsumable`
--

CREATE TABLE IF NOT EXISTS `nonconsumable` (
  `nonConsumableID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `warranty` varchar(25) NOT NULL,
  PRIMARY KEY (`nonConsumableID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `noteID` int(11) NOT NULL AUTO_INCREMENT,
  `device` varchar(25) NOT NULL,
  `problemCategory` varchar(25) NOT NULL,
  `problemDescription` varchar(225) NOT NULL,
  `obviousIssues` varchar(225) NOT NULL,
  `quickSolution` varchar(225) NOT NULL,
  `gatheredData` varchar(225) NOT NULL,
  `evaluatedProblem` varchar(225) NOT NULL,
  `problemSolution` varchar(225) NOT NULL,
  PRIMARY KEY (`noteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `personID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactNumber` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`personID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personID`, `fname`, `mname`, `lname`, `address`, `contactNumber`) VALUES
(1, 'Jeryy Kevin', 'Burger', 'Alibangbang', 'Tokyo Japan', '095235554'),
(2, 'Zahra-fatmah', 'Mohammad', 'Al-Sharief', 'Dayawan-Tuca, Marawi City', '09172084785'),
(3, 'Vinzer', 'butay', 'Abellarot', 'katill', '095235554'),
(4, 'Jofel', 'Butay', 'Bayron', 'Davao Oriental', '5588669898'),
(5, 'Abdulfatah', 'P.', 'Polayagan', 'Basak, Malutlut, Marawi City', '123'),
(8, 'Joeper', 'Pantaleon', 'Serrano', 'Dagocdoc Tandag City', '09105733301'),
(9, 'Jofel', 'Butay', 'Bayron', 'Tagum', '061564514'),
(11, 'Jerry Harby', 'B', 'Abellar', 'Davao Oriental', '095847415161'),
(12, 'Arlyn', 'Butay', 'Bayron', 'Davao City', '9856546564'),
(13, 'Kevin', 'B', 'Abellar', 'Davao Oriental', '091545422333'),
(14, 'Jeryy Kevin', 'butay', 'Abellarot', 'katill', '095235554'),
(18, 'Norjie', 'test', 'Lastname', 'Dagocdoc Tandag City', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productType` int(11) NOT NULL,
  `productName` varchar(25) NOT NULL,
  `productDescription` varchar(225) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `productStatus` int(11) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `brandID` (`brandID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `selectedserial`
--

CREATE TABLE IF NOT EXISTS `selectedserial` (
  `selectedSerialID` int(11) NOT NULL AUTO_INCREMENT,
  `cartDetailID` int(11) NOT NULL,
  `serialNumber` varchar(25) NOT NULL,
  PRIMARY KEY (`selectedSerialID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE IF NOT EXISTS `serial` (
  `nonConsumabeID` int(11) NOT NULL,
  `serialNumber` varchar(25) NOT NULL,
  `serialStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serialreplace`
--

CREATE TABLE IF NOT EXISTS `serialreplace` (
  `serialReplaceID` int(11) NOT NULL AUTO_INCREMENT,
  `serialNummber` varchar(25) NOT NULL,
  `selectedSerialID` int(11) NOT NULL,
  PRIMARY KEY (`serialReplaceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serviceID` int(11) NOT NULL AUTO_INCREMENT,
  `serviceDescription` varchar(225) NOT NULL,
  `serviceRate` float NOT NULL,
  `serviceStatus` int(11) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `technical`
--

CREATE TABLE IF NOT EXISTS `technical` (
  `transactionID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `device` varchar(25) NOT NULL,
  `serviceRate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionID` int(11) NOT NULL AUTO_INCREMENT,
  `accountID` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `transactionType` int(11) NOT NULL,
  `dateRecorded` date NOT NULL,
  `transactionStatus` int(11) NOT NULL,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `person` (`personID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandID`) REFERENCES `brand` (`brandID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brandID`) REFERENCES `brand` (`brandID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
