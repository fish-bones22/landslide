-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 04:30 PM
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

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `prod_id`, `user_id`, `price`, `rating`, `timestamp`) VALUES
(3, 40, 5, 230, 0, '2017-11-09 23:33:09');

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
(1, 1, 'Fishbones', 'Software Developer'),
(3, 12, 'Developer', 'Developer'),
(4, 13, 'EjAdev', 'Bida Bida');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(511) NOT NULL,
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
(40, 'McDonald\'s', 'Finally, McDonald\'s Source code is finally released Open-Source. Look through the internal workings of the world famous Obesityâ„¢ maker and wonder in its amazing greatness. Soon to be bundled: the popular and to-die-for Schezwan Sauce source code.', 0, 1, '/landslide/product-files/icons/Product 2_Dev Name', '/landslide/product-files/zip/McDonald\'s_Dev Name.zip', 305447, 230, 1, 1, '2017-10-28 12:41:57'),
(41, 'Another Sample Product', 'Description of another product', 23, 1, '/landslide/product-files/icons/Another Sample Product_Dev Name', '/landslide/product-files/zip/Another Sample Product_Dev Name.zip', 335944, 231, 2, 1, '2017-10-28 14:12:31'),
(42, 'McDonald\'s Lite', 'A Lite version of the McDonald\'s Source Code, ideal for students, educators, and the poor. Finally, McDonald\'s Source code is finally released Open-Source. Look through the internal workings of the world famous Obesityâ„¢ maker and wonder in its amazing greatness. Soon to be bundled: the popular and to-die-for Schezwan Sauce source code (not included in the Lite version).', 0, 1, '/landslide/product-files/icons/Yet Another Sample_Dev Name', '/landslide/product-files/zip/McDonald\'s Lite_Dev Name.zip', 954845, 200, 1, 1, '2017-10-28 16:12:10'),
(43, 'Apollo 11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/Apollo 11_Dev Name', '/landslide/product-files/zip/Apollo 11_Dev Name.zip', 305447, 300, 1, 1, '2017-11-11 09:15:37'),
(44, 'Blog Designer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/Blog Designer_Dev Name', '/landslide/product-files/zip/Blog Designer_Dev Name.zip', 305447, 431, 1, 1, '2017-11-11 09:17:10'),
(45, 'Efx Player', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/Efx Player_Dev Name', '/landslide/product-files/zip/Efx Player_Dev Name.zip', 305447, 540, 1, 1, '2017-11-11 09:18:51'),
(46, 'Enigma', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/Enigma_Dev Name', '/landslide/product-files/zip/Enigma_Dev Name.zip', 305447, 120, 1, 1, '2017-11-11 09:21:06'),
(47, 'FilterMail', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/FilterMail_Dev Name', '/landslide/product-files/zip/FilterMail_Dev Name.zip', 305447, 234, 1, 1, '2017-11-11 09:22:12'),
(48, 'Looper', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/Looper_Dev Name', '/landslide/product-files/zip/Looper_Dev Name.zip', 305447, 453, 1, 1, '2017-11-11 09:23:11'),
(49, 'SliderRevo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/SliderRevo_Dev Name', '/landslide/product-files/zip/SliderRevo_Dev Name.zip', 305447, 230, 1, 1, '2017-11-11 09:24:41'),
(50, 'UniVerter', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam hic rem officia, cumque animi beatae nemo maiores ab, excepturi odit consequuntur dicta obcaecati fugiat ducimus repellat magni nam sed similique voluptatum sequi! Fugit maiores sint, sequi la', 0, 13, '/landslide/product-files/icons/UniVerter_Dev Name', '/landslide/product-files/zip/UniVerter_Dev Name.zip', 305447, 272, 1, 1, '2017-11-11 09:25:29');

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
(4, 40, 1, 0, '2017-11-04 01:31:35'),
(5, 42, 1, 5, '2017-11-10 11:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `trans_tbl_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`trans_tbl_id`, `trans_id`, `user_id`, `prod_id`, `prod_name`, `price`, `timestamp`) VALUES
(15, 6, 1, 40, 'Product 2', 230, '2017-11-10 11:21:26'),
(16, 6, 1, 42, 'Yet Another Sample', 231, '2017-11-10 11:21:26'),
(17, 7, 1, 42, 'Yet Another Sample', 231, '2017-11-10 11:21:43'),
(18, 8, 1, 42, 'Yet Another Sample', 231, '2017-11-10 11:23:10');

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
(1, 'samuel@gmail.com', '11223344', 2, 'Sam', 'Quinto', 1, 120362, 1, '2017-10-28 13:14:10'),
(2, 'avalancheteam@gmail.com', '12345', 2, 'Avalanche', 'Team', 1, 210201000000, 1, '2017-11-09 16:22:51'),
(3, '0101@gmail.com', '1234', 1, 'Neil', 'Armstrong', 1, NULL, 1, '2017-11-09 23:15:33'),
(5, 'thor@gmail.com', '1234', 1, 'Thor', 'Of Asgard', 1, NULL, 1, '2017-11-09 23:31:29'),
(12, 'dev@gmail.com', '1234', 2, 'Developer', 'Team', 1, NULL, 1, '2017-11-09 23:55:04'),
(13, 'drawdej963@gmail.com', '123456', 3, 'Ej', 'Mindanao', 1, NULL, 1, '2017-11-11 09:11:20');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_dev_info`
--
ALTER TABLE `tbl_dev_info`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_prod_stat`
--
ALTER TABLE `tbl_prod_stat`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `trans_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
