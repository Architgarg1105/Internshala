-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.byetcluster.com
-- Generation Time: Jun 02, 2021 at 05:24 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28768313_foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_item`
--

CREATE TABLE `add_item` (
  `itemid` int(6) NOT NULL,
  `restaurantid` int(6) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_item`
--

INSERT INTO `add_item` (`itemid`, `restaurantid`, `itemname`, `price`, `category`) VALUES
(1, 1, 'Item1', 100, 'Veg'),
(2, 1, 'Item2', 200, 'Non-Veg'),
(3, 1, 'Item3', 300, 'Veg'),
(4, 2, 'Item1', 110, 'Veg'),
(5, 2, 'Item2', 210, 'Non-Veg'),
(6, 2, 'Item3', 310, 'Veg'),
(7, 3, 'Item1', 120, 'Veg'),
(8, 3, 'Item2', 220, 'Non-Veg'),
(9, 3, 'Item3', 320, 'Veg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customerid` int(6) NOT NULL,
  `customername` varchar(20) NOT NULL,
  `customerpassword` varchar(8) NOT NULL,
  `customercontactnumber` bigint(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `preferance` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customerid`, `customername`, `customerpassword`, `customercontactnumber`, `address`, `preferance`) VALUES
(1, 'Cus1', 'Cus1123', 2222222221, 'Cus1 Address', 'veg'),
(2, 'Cus2', 'Cus2123', 2222222222, 'Cus2 Address', 'nonveg'),
(3, 'Cus3', 'Cus3123', 2222222223, 'Cus3 Address', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `orderid` int(6) NOT NULL,
  `customerid` int(6) NOT NULL,
  `restaurantid` int(6) NOT NULL,
  `itemid` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`orderid`, `customerid`, `restaurantid`, `itemid`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 4),
(3, 1, 3, 7),
(4, 2, 1, 2),
(5, 2, 2, 5),
(6, 2, 3, 8),
(7, 3, 1, 3),
(8, 3, 2, 6),
(9, 3, 3, 9),
(10, 1, 1, 3),
(11, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_details`
--

CREATE TABLE `restaurant_details` (
  `restaurantid` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `restaurantpassword` varchar(8) NOT NULL,
  `restaurantname` varchar(30) NOT NULL,
  `restaurantcontactnumber` bigint(10) NOT NULL,
  `address` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_details`
--

INSERT INTO `restaurant_details` (`restaurantid`, `username`, `restaurantpassword`, `restaurantname`, `restaurantcontactnumber`, `address`) VALUES
(1, 'Res1', 'Res1123', 'Restaurant1', 1111111111, 'Res1 Address'),
(2, 'Res2', 'Res2123', 'Restaurant2', 1111111112, 'Res2 Address'),
(3, 'Res3', 'Res3123', 'Restaurant3', 1111111113, 'Res3 Address');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_item`
--
ALTER TABLE `add_item`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `restaurant_details`
--
ALTER TABLE `restaurant_details`
  ADD PRIMARY KEY (`restaurantid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_item`
--
ALTER TABLE `add_item`
  MODIFY `itemid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customerid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `orderid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurant_details`
--
ALTER TABLE `restaurant_details`
  MODIFY `restaurantid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
