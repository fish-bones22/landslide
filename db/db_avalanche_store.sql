-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 11:01 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_avalanche_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `rating` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dev_info`
--

CREATE TABLE `tbl_dev_info` (
  `dev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dev_name` varchar(64) NOT NULL,
  `dev_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dev_info`
--

INSERT INTO `tbl_dev_info` (`dev_id`, `user_id`, `dev_name`, `dev_desc`) VALUES
(1, 1, 'Fishbones', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0',
  `owner` int(11) NOT NULL,
  `icon_location` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `file_size` float DEFAULT NULL,
  `price` float NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `name`, `description`, `downloads`, `owner`, `icon_location`, `file_location`, `file_size`, `price`, `approval`, `status`, `timestamp`) VALUES
(39, 'Sample Product', 'Description Sample product. Description Sample product. Description Sample product. Description Sample product. Description Sample product.Description Sample product. Description Sample product. Description Sample product. Description Sample product.Descr', 54, 1, '/landslide/product-files/icons/Sample Product_Dev Name', '/landslide/product-files/zip/Sample Product_Dev Name.zip', 83921, 23, 2, 0, '2017-10-28 12:39:53'),
(40, 'Product 2', 'Description', 0, 1, '/landslide/product-files/icons/Product 2_Dev Name', '/landslide/product-files/zip/Product 2_Dev Name.zip', 305447, 230, 1, 1, '2017-10-28 12:41:57'),
(41, 'Another Sample Product', 'Description of another product', 23, 1, '/landslide/product-files/icons/Another Sample Product_Dev Name', '/landslide/product-files/zip/Another Sample Product_Dev Name.zip', 335944, 231, 2, 1, '2017-10-28 14:12:31'),
(42, 'Yet Another Sample', 'Description of Another Sample Product. Description of Another Sample Product. Description of Another Sample Product. Description of Another Sample Product. Description of Another Sample Product. Description of Another Sample Product. Description of Anothe', 0, 1, '/landslide/product-files/icons/Yet Another Sample_Dev Name', '/landslide/product-files/zip/Yet Another Sample_Dev Name.zip', 954845, 231, 1, 1, '2017-10-28 16:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_stat`
--

CREATE TABLE `tbl_prod_stat` (
  `stat_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prod_stat`
--

INSERT INTO `tbl_prod_stat` (`stat_id`, `prod_id`, `user_id`, `rating`, `timestamp`) VALUES
(1, 39, 1, 5, '2017-11-04 01:24:19'),
(2, 41, 1, 5, '2017-11-04 01:24:19'),
(4, 40, 1, 0, '2017-11-04 01:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `trans_tbl_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`trans_tbl_id`, `trans_id`, `user_id`, `prod_id`, `price`, `timestamp`) VALUES
(7, 1, 1, 39, 23, '2017-11-04 01:24:19'),
(8, 1, 1, 41, 231, '2017-11-04 01:24:19'),
(9, 2, 1, 39, 23, '2017-11-04 01:28:55'),
(10, 2, 1, 40, 230, '2017-11-04 01:28:55'),
(11, 3, 1, 39, 23, '2017-11-04 01:31:35'),
(12, 3, 1, 40, 230, '2017-11-04 01:31:35'),
(13, 4, 1, 41, 231, '2017-11-04 01:32:36'),
(14, 5, 1, 39, 23, '2017-11-04 01:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `currency_amount` float DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `password`, `type`, `fname`, `lname`, `sex`, `currency_amount`, `status`, `timestamp`) VALUES
(1, 'samuel@gmail.com', '11223344', 2, 'Sam', 'Quinto', 1, 121055, 1, '2017-10-28 13:14:10'),
(2, 'avalancheteam@gmail.com', '12345', 2, 'Avalanche', 'Team', 1, 210201000000, 1, '2017-11-09 16:22:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_dev_info`
--
ALTER TABLE `tbl_dev_info`
  ADD PRIMARY KEY (`dev_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_prod_stat`
--
ALTER TABLE `tbl_prod_stat`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`trans_tbl_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dev_info`
--
ALTER TABLE `tbl_dev_info`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_prod_stat`
--
ALTER TABLE `tbl_prod_stat`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `trans_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
