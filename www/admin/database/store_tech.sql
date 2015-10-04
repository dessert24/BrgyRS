-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 03:30 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store_tech`
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
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `Email`, `Contact_number`, `Address`, `Image`, `Password`, `Status`, `Type`, `Time_stamp`) VALUES
(2015101001, 'Pete Eldrich', 'Bagongon', 'Taruc', 'Male', 'aykanhak@gmail.com', '09353416194', 'Tablon , CDO', 'anon.png', '85ec0898f0998c95a023f18f1123cbc77ba51f2632137b61999655d59817d942ecef3012762604e442d395a194c53e94e9fb5bb8fe74d61900eb05cb0c078bb6', 'Active', 'Admin', '2015-06-05 09:33:05'),
(2015101002, 'Juddy Mae', 'Ambot', 'Bation', 'Female', 'juddy@gmail.com', '00000000000', 'Lapasan', 'juddy.jpg', '85ec0898f0998c95a023f18f1123cbc77ba51f2632137b61999655d59817d942ecef3012762604e442d395a194c53e94e9fb5bb8fe74d61900eb05cb0c078bb6', 'Active', 'Admin', '2015-06-05 11:26:50'),
(2015101003, 'Brauz Jearic', 'Simeon', 'Libre', 'Male', 'tokoii2@gmail.com', '11111111111', 'Bulua , Soldiers Hill', 'jeykoy.jpg', '85ec0898f0998c95a023f18f1123cbc77ba51f2632137b61999655d59817d942ecef3012762604e442d395a194c53e94e9fb5bb8fe74d61900eb05cb0c078bb6', 'Active', 'Customer', '2015-06-05 08:58:12'),
(2015101004, 'Jellie', 'Ambot', 'Edem', 'Female', 'jellie@yahoo.com', '10101010101', 'Bukidnon', 'jellie.jpg', '85ec0898f0998c95a023f18f1123cbc77ba51f2632137b61999655d59817d942ecef3012762604e442d395a194c53e94e9fb5bb8fe74d61900eb05cb0c078bb6', 'Active', 'Customer', '2015-06-05 08:58:12'),
(2015101005, 'Barbaki', 'NakoSI', 'Shudii', 'Other', 'atay@gmail.com', '1234567', 'SUBA SA BULUA', 'NO IMAGE', '85ec0898f0998c95a023f18f1123cbc77ba51f2632137b61999655d59817d942ecef3012762604e442d395a194c53e94e9fb5bb8fe74d61900eb05cb0c078bb6', 'Active', 'Customer', '2015-06-05 13:20:24'),
(2015101006, 'Barbaki', 'NakoSI', 'Shudii', 'Other', 'churcillanimal@yahoo.com', '1234567', 'SUBA SA BULUA', 'NO IMAGE', '45ae11223701be26d393902d66ccf198e80f8525b41a1e39e03f4ce7fa1d3a8772e6d2a737448a183ede101a43cbc8f94bb108b9404c5ae7690eed1467cf8f23', 'Active', 'Customer', '2015-06-05 13:20:59'),
(2015101007, 'asdfdfasdfasdf', 'asdfasdfsdf', 'sadfadfadf', 'Male', 'sadfasdfadf@gmail.com', '12312312312', 'asdfasdfasdf', 'NO IMAGE', 'd60857e37e76a11a48f32cb4be38c0ff19cabaadde458c5156d323318cb7bc52aaf45e1004b47eef091a4172a830dc317b880085389e998e191594604a78a5c9', 'Active', 'Customer', '2015-06-05 13:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `Forum_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `Topic` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `Views` int(11) NOT NULL DEFAULT '0',
  `Replies` int(11) NOT NULL DEFAULT '0',
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`Forum_ID`, `Account_ID`, `Topic`, `Description`, `Views`, `Replies`, `Time_stamp`) VALUES
(3, 2015101001, 'Store Tech', 'Shop Online here on Store Tech. Laptops , Printers , Accessories and more .', 3, 2, '2015-06-09 15:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE IF NOT EXISTS `forum_comments` (
  `Comment_ID` int(11) NOT NULL,
  `Forum_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(50) NOT NULL,
  `Comment` text NOT NULL,
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`Comment_ID`, `Forum_ID`, `Account_ID`, `Name`, `Comment`, `Time_stamp`) VALUES
(1, 1, 0, 'Pete Eldrich', 'Hahahhaa', '2015-06-06 08:04:35'),
(2, 1, 0, 'Anon', 'This is bullshit', '2015-06-06 08:07:15'),
(3, 1, 0, 'wrew', 'werewr', '2015-06-06 08:09:50'),
(4, 2, 0, 'were', 'rewre', '2015-06-06 08:10:02'),
(6, 1, 2015101003, 'Brauz Jearic', 'werew', '2015-06-06 10:37:28'),
(7, 2, 0, 'aaw', 'aw', '2015-06-08 05:06:39'),
(8, 1, 0, 'qewq', 'ewqew', '2015-06-08 05:18:47'),
(9, 1, 0, 'ewr', 'ewewre', '2015-06-08 05:19:08'),
(10, 2, 0, 'Pete Eldrich', 'ewre', '2015-06-08 23:32:51'),
(11, 2, 0, 'Pete Eldrich', 'ewre', '2015-06-08 23:33:51'),
(12, 2, 0, 'Pete Eldrich', 'This ', '2015-06-08 23:34:18'),
(13, 2, 0, 'Pete Eldrich', 'This erer', '2015-06-08 23:35:19'),
(14, 2, 0, 'Pete Eldrich', 'rewre', '2015-06-08 23:35:35'),
(15, 2, 2015101001, 'Pete Eldrich', 'ewre', '2015-06-08 23:36:49'),
(16, 2, 2015101001, 'Pete Eldrich', 'ewre', '2015-06-08 23:37:44'),
(17, 2, 2015101001, 'Pete Eldrich', 'ewreerewdfgf', '2015-06-08 23:38:51'),
(18, 2, 2015101001, 'Pete Eldrich', 'ewrer', '2015-06-08 23:41:09'),
(19, 2, 2015101001, 'Pete Eldrich', 'ere', '2015-06-08 23:43:15'),
(20, 2, 2015101001, 'Pete Eldrich', 'rere', '2015-06-08 23:43:34'),
(21, 3, 0, 'Pete Eldrich', 'This is ELective ..', '2015-06-09 15:14:54'),
(22, 3, 0, 'ewrew', 'rewre', '2015-06-09 15:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE IF NOT EXISTS `guests` (
  `Guest_ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`Guest_ID`, `Email`, `Time_stamp`) VALUES
(1, 'aw@yahoo.com', '2015-06-08 04:43:36'),
(2, 'aw@yahoo.com', '2015-06-08 04:45:18'),
(3, 'aww@yahoo.com', '2015-06-08 04:51:40'),
(4, 'aw@yahoo.com', '2015-06-08 04:54:19'),
(5, 'aw@yahoo.com', '2015-06-08 05:01:22'),
(6, 'aw@yahoo.com', '2015-06-08 05:06:29'),
(7, 'aw@yahoo.com', '2015-06-08 05:08:37'),
(8, 'aw@yahoo.com', '2015-06-09 15:10:08'),
(9, 'aw@yahoo.com', '2015-06-09 15:15:22'),
(10, 'aw@yahoo.com', '2015-06-09 15:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `Message_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Topic` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_name` varchar(250) NOT NULL,
  `Product_description` text NOT NULL,
  `Product_categoryID` int(11) NOT NULL,
  `Product_brandID` int(11) NOT NULL,
  `Product_price` double NOT NULL,
  `Product_quantity` int(11) NOT NULL,
  `Product_image` varchar(250) NOT NULL,
  `Product_status` enum('Sell','Pending','Purchased') NOT NULL DEFAULT 'Sell'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_name`, `Product_description`, `Product_categoryID`, `Product_brandID`, `Product_price`, `Product_quantity`, `Product_image`, `Product_status`) VALUES
(7, 'Vaio 1', 'This is VAIO 1 laptop', 1, 3, 400, 3, 'anon.png', 'Sell'),
(8, 'Vaio 2', 'This is Vaio 2 laptop', 1, 3, 300, 0, 'v2.jpg', 'Sell'),
(9, 'Vaio 3', 'This is Vaio 3 laptop .. Color pink as you can see !', 1, 3, 350, 5, 'v3.jpg', 'Sell'),
(10, 'Vaio 4', 'This is Vaio 3 laptop . Color red , very red !', 1, 3, 180, 0, 'v4.jpg', 'Sell'),
(11, 'Vaio 5', 'This is Vaio 5 laptop . Nice !', 1, 3, 550, 3, 'v5.jpg', 'Sell'),
(12, 'Vaio 6', 'This is Vaio 6 laptop', 1, 3, 200, 5, 'v6.jpg', 'Sell'),
(13, 'Vaio 7', 'This is Vaio 7 laptop', 1, 3, 430, 2, 'v7.jpg', 'Sell'),
(14, 'Vaio 8', 'This is Vaio 8 laptop\n', 1, 3, 800, 2, 'v8.jpg', 'Sell'),
(15, 'Vaio 9', 'This is Vaio 9 laptop', 1, 1, 650, 2, 'v9.jpg', 'Sell'),
(16, 'Vaio 10', 'This is Vaio 10 laptop', 1, 3, 550, 2, 'v10.jpg', 'Sell'),
(17, 'Toshiba 1', 'This is Toshiba 1', 1, 1, 250, 2, 'toshiba1.jpg', 'Sell'),
(18, 'Toshiba 2', 'This is Toshiba 2', 1, 1, 300, 2, 'toshiba2.jpg', 'Sell'),
(19, 'Toshiba 3', 'This is Toshiba 3', 1, 1, 500, 0, 'toshiba3.jpg', 'Sell'),
(20, 'Toshiba 4', 'This is Toshiba 4', 1, 1, 250, 2, 'toshiba4.jpg', 'Sell'),
(21, 'Toshiba 5', 'This is Toshiba 5', 1, 1, 650, 2, 'v5.jpg', 'Sell'),
(22, 'Samsung 1', 'This is Samsung 1 laptop', 1, 2, 500, 2, 's1.jpg', 'Sell'),
(23, 'Samsung 2', 'This is Samsung 2 laptop', 1, 2, 200, 1, 's2.jpg', 'Sell'),
(24, 'Samsung 3', 'This is Samsung 3', 1, 2, 500, 1, 's3.jpg', 'Sell'),
(25, 'Keyboard', 'This is a keyboard', 3, 1, 50, 2, 'r1.jpg', 'Sell'),
(26, 'Keyboard 2', 'This is keyboard 2', 3, 1, 55, 2, 'r2.jpg', 'Sell'),
(27, 'Mouse', 'This is Computer mouse .', 3, 1, 25, 10, 'r3.jpg', 'Sell'),
(28, 'Printer 1', 'This is Printer 1', 2, 1, 200, 5, 'print.jpg', 'Sell');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE IF NOT EXISTS `product_brand` (
  `Brand_ID` int(11) NOT NULL,
  `Brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`Brand_ID`, `Brand_name`) VALUES
(1, 'Toshiba'),
(2, 'Samsung'),
(3, 'VAIO');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `Category_ID` int(11) NOT NULL,
  `Category_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Category_ID`, `Category_name`) VALUES
(1, 'Laptops'),
(2, 'Printers'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_details`
--
CREATE TABLE IF NOT EXISTS `product_details` (
`Product_ID` int(11)
,`Product_name` varchar(250)
,`Product_description` text
,`Product_categoryID` int(11)
,`Product_brandID` int(11)
,`Product_price` double
,`Product_quantity` int(11)
,`Product_image` varchar(250)
,`Product_status` enum('Sell','Pending','Purchased')
,`Category_ID` int(11)
,`Category_name` varchar(50)
,`Brand_ID` int(11)
,`Brand_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `Sale_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `Items` int(11) NOT NULL,
  `Total_payment` double NOT NULL,
  `Card_number` varchar(50) NOT NULL,
  `Expiry_date` varchar(50) NOT NULL,
  `Time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sale_ID`, `Account_ID`, `Items`, `Total_payment`, `Card_number`, `Expiry_date`, `Time_stamp`) VALUES
(2, 2015101003, 1, 500, 'wwrewrewr', '10-18-2017', '2015-06-10 01:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `Session_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `Time_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`Session_ID`, `Account_ID`, `Time_logged`) VALUES
(1, 2015101001, '2015-06-09 22:30:33'),
(2, 2015101001, '2015-06-10 01:03:51'),
(3, 2015101003, '2015-06-10 01:07:01'),
(4, 2015101001, '2015-06-10 01:29:01');

-- --------------------------------------------------------

--
-- Structure for view `product_details`
--
DROP TABLE IF EXISTS `product_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_details` AS select `a`.`Product_ID` AS `Product_ID`,`a`.`Product_name` AS `Product_name`,`a`.`Product_description` AS `Product_description`,`a`.`Product_categoryID` AS `Product_categoryID`,`a`.`Product_brandID` AS `Product_brandID`,`a`.`Product_price` AS `Product_price`,`a`.`Product_quantity` AS `Product_quantity`,`a`.`Product_image` AS `Product_image`,`a`.`Product_status` AS `Product_status`,`b`.`Category_ID` AS `Category_ID`,`b`.`Category_name` AS `Category_name`,`c`.`Brand_ID` AS `Brand_ID`,`c`.`Brand_name` AS `Brand_name` from ((`products` `a` join `product_category` `b`) join `product_brand` `c`) where ((`a`.`Product_categoryID` = `b`.`Category_ID`) and (`a`.`Product_brandID` = `c`.`Brand_ID`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`Forum_ID`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`Guest_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Message_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`Brand_ID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sale_ID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`Session_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `Forum_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `Guest_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `Message_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sale_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `Session_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
