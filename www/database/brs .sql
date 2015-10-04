-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 02:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brs`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_accountStatus`(IN `accountID` INT, IN `accountStatus` VARCHAR(50))
    NO SQL
BEGIN

	UPDATE Accounts SET Status = accountStatus WHERE Account_ID = accountID;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `Account_ID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact_number` varchar(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Image` varchar(250) NOT NULL DEFAULT 'NO IMAGE',
  `Password` varchar(250) NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `Type` enum('Admin','Customer','Guest') NOT NULL DEFAULT 'Customer',
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Account_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `Email`, `Contact_number`, `Address`, `Image`, `Password`, `Status`, `Type`, `Time_stamp`) VALUES
(2015101001, 'Lyra Sheen', 'Dayday', 'Baculio', 'Female', 'aryl123@yahoo.com', '09123456789', 'Poblacion Tagoloan Misamis Oriental', 'images.jpg', '4978eac405fd87dc1a807b54e1370fd597723382ee85a9854736a5dc9a4ad738aee7797adfa35ee093a2a3be127322e2158899d8fa4872d8190d00e080e0642e', 'Active', 'Admin', '2015-10-04 09:22:37'),
(2015101008, 'lol', 'lol', 'lol', 'Other', 'lola@gmail.com', '123', 'sads', 'NO IMAGE', '4978eac405fd87dc1a807b54e1370fd597723382ee85a9854736a5dc9a4ad738aee7797adfa35ee093a2a3be127322e2158899d8fa4872d8190d00e080e0642e', 'Active', 'Admin', '2015-09-27 16:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_clearance`
--

CREATE TABLE IF NOT EXISTS `barangay_clearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `civil_status` varchar(30) NOT NULL,
  `pob` varchar(50) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `barangay_clearance`
--

INSERT INTO `barangay_clearance` (`id`, `name`, `age`, `sex`, `civil_status`, `pob`, `residence`, `purpose`, `created`) VALUES
(6, '12', 21, 'Female', 'Married', '21', '121', '12', '2015-09-28 16:24:40'),
(7, 'wq', 12, 'Female', 'Single', 'wq', 'qww', 'wq', '2015-09-28 16:26:57'),
(8, 'maine gonzaga', 23, 'Female', 'Single', 'Tagoloan Mis. Or.', 'Zone 8 Poblacion tag. mis. or', 'Trisikad renewal', '2015-09-30 15:18:26'),
(9, 'john legend', 28, 'Male', 'Single', 'Cagayan de Oro City', 'Zone 2 Poblacion Tagoloan Misamis Oriental', 'Trisiakad Renewal', '2015-10-04 09:37:17'),
(10, 'john Smith', 27, 'Male', 'Married', 'Natumolan Tagoloan Misamis Oriental', 'zone 1 Poblacion Tagoloan Misamis Oriental', 'Trisikad Renewal', '2015-10-04 09:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_permit`
--

CREATE TABLE IF NOT EXISTS `brgy_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `liner_of_business` varchar(50) NOT NULL,
  `business_address` varchar(50) NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `brgy_permit`
--

INSERT INTO `brgy_permit` (`id`, `name`, `address`, `liner_of_business`, `business_address`, `created`) VALUES
(1, 'adam levine', 'Zone 8 Tagoloan  Misamis Oriental', 'pesonet', 'Zone 9 Tagoloan  Misamis Oriental', '2015-10-04 09:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `business_clearance`
--

CREATE TABLE IF NOT EXISTS `business_clearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nob` varchar(50) NOT NULL,
  `aob` varchar(50) NOT NULL,
  `name_of_owner` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `pob` varchar(50) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `business_clearance`
--

INSERT INTO `business_clearance` (`id`, `name`, `nob`, `aob`, `name_of_owner`, `age`, `sex`, `civil_status`, `pob`, `residence`, `purpose`, `created`) VALUES
(29, 'cardo probinsyano', 'Restaurant', 'Zone 2 , Poblacion Tagoloan Misamis Oriental', 'ador probinsyano', 35, 'Male', 'Single', 'Cdoc', 'Poblacion, Tagoloan Misamis Oriental', 'Business', '0000-00-00 00:00:00'),
(32, 'Dominador de Leon', 'Trisikad', 'Zone 8 Poblacion Tagoloan Misamis Oriental', 'Ricardo de Leon', 25, 'Female', 'Single', 'Cdoc', 'Pobalcion Tag. Mis. Or.', 'Business', '2015-09-28 20:47:49'),
(33, 'Hugh Grant', 'Eatery', 'Zone 2 Poblacion Tagoloan Misamis Oriental', 'Drew Barrymore', 40, 'Female', 'Single', 'Tagoloan Mis. Or.', 'Tagoloan Mis. Or.', 'Business', '2015-09-28 20:55:49'),
(34, 'lyra Sheen Baculio', 'trisikad', 'zone 2 poblacion tagoloan misamis oriental', 'Jun baculio', 60, 'Male', 'Married', 'tagoloan mis or', 'arellano st tagoloan mis or', 'business', '2015-09-28 20:59:30'),
(35, 'example', 'example', 'example', 'example', 35, 'Male', 'Single', 'example', 'example', 'example', '2015-09-28 21:01:28'),
(36, 'example2', 'example2', 'example2', 'example2', 78, 'Male', 'Single', 'example2', 'example2', 'example2', '2015-09-28 21:02:09'),
(37, 'example3', 'example3', 'example3', 'example3', 78, 'Female', 'Married', 'example3', 'example3', 'example3', '2015-09-28 21:03:05'),
(38, 'example4', 'example4', 'example4', 'example4', 65, 'Female', 'Single', 'example4', 'example4', 'example4', '2015-09-28 21:04:02'),
(39, 'example5', 'example5', 'example5', 'example5', 78, 'Male', 'Single', 'example5', 'example5', 'example5', '2015-09-28 21:05:29'),
(40, 'example6', 'example6', 'example6', 'example6', 34, 'Female', 'Single', 'example6', 'example6', 'example6', '2015-09-28 21:08:17'),
(41, 'clau barato', 'trisikad', 'zone 8 poblacion misamis oriental', 'reymar sandiego', 34, 'Female', 'Separated', 'Quezon City', '', 'Business', '2015-09-30 23:15:15'),
(44, 'john Smith', '', '', '', 27, 'Male', 'Married', 'Natumolan Tagoloan Misamis Oriental', 'zone 1 Poblacion Tagoloan Misamis Oriental', 'Trisikad Renewal', '2015-10-04 17:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaints` varchar(200) NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `complaints`, `created`) VALUES
(1, 'This is example of complaint', '2015-10-04 09:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers_auth`
--

CREATE TABLE IF NOT EXISTS `customers_auth` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `customers_auth`
--

INSERT INTO `customers_auth` (`uid`, `name`, `email`, `phone`, `password`, `created`) VALUES
(189, 'lol', 'lol@yahoo.com', '123', '$2a$10$1572ebefbfe166e03f095uBM8RxYVNZ64v30/xy1T.GXycaEayIyW', '2015-09-27 13:47:21'),
(190, 'lyra', 'lyrocks@yahoo.com', '12345678', '$2a$10$98b3e6b67f55756be8443uZSBDSGxgl1wysFUm64BiPJFMLj8Mgba', '2015-09-27 13:49:53'),
(191, 'sad', 'sad@yahoo.com', '123456789', '$2a$10$663d602a1b9cd10fdce0euFwoMUmVndglwU97/B8ZgC6ftj4DvWLy', '2015-10-03 05:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `Session_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Account_ID` int(11) NOT NULL,
  `Time_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Session_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`Session_ID`, `Account_ID`, `Time_logged`) VALUES
(1, 2015101001, '2015-10-03 08:47:37'),
(2, 2015101001, '2015-10-03 09:13:04'),
(3, 2015101001, '2015-10-03 09:37:18'),
(4, 2015101001, '2015-10-03 09:51:31'),
(5, 2015101001, '2015-10-03 10:22:37'),
(6, 2015101001, '2015-10-03 11:40:57'),
(7, 2015101001, '2015-10-03 12:19:31'),
(8, 2015101001, '2015-10-03 12:22:18'),
(9, 2015101001, '2015-10-03 12:27:48'),
(10, 2015101001, '2015-10-03 14:27:12'),
(11, 2015101001, '2015-10-03 14:50:17'),
(12, 2015101001, '2015-10-04 02:34:57'),
(13, 2015101001, '2015-10-04 06:05:18'),
(14, 2015101001, '2015-10-04 08:00:00'),
(15, 2015101001, '2015-10-04 08:54:18'),
(16, 2015101001, '2015-10-04 09:28:45'),
(17, 2015101001, '2015-10-04 10:04:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
