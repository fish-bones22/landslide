-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 05:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(4, 13, 'EJ', 'drawdej963@gmail.com'),
(5, 14, 'Marximus', 'The UI/UX Designer');

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
(43, 'Apollo 11', 'This source code has been transcribed or otherwise adapted from digitized\r\nimages of a hardcopy from the MIT Museum.  The digitization was performed\r\nby Paul Fjeld, and arranged for by Deborah Douglas of the Museum.  Many\r\nthanks to both.  The images (with suitable reduction in storage size and\r\nconsequent reduction in image quality as well) are available online at\r\nwww.ibiblio.org/apollo.  If for some reason you find that the images are\r\nillegible, contact me at info@sandroid.org about getting access to t', 0, 13, '/landslide/product-files/icons/Apollo 11_Dev Name', '/landslide/product-files/zip/Apollo 11_Dev Name.zip', 305447, 300, 1, 1, '2017-11-11 09:15:37'),
(44, 'Blog Designer', 'Blog Designer is an effective and user friendly way to beautify your blog pages on your websites. Itâ€™s very popular plugin for websiteâ€™s WordPress blog to attract more clients as well as more blog visitors. Blog Designer makes your blog section more intuitive with no coding skill. Itâ€™s very easy to manage for beginners to website developers.\r\n\r\nBlog designer plugin bundled with precisely designed 36 templates for various category and we will keep adding more in future version.', 0, 13, '/landslide/product-files/icons/Blog Designer_Dev Name', '/landslide/product-files/zip/Blog Designer_Dev Name.zip', 305447, 431, 1, 1, '2017-11-11 09:17:10'),
(45, 'Efx Player', 'Efx Player is Responsive jQuery HTML5 Music/Audio Player with Playlist and huge possibilities and options. Its comes with 12 Audio Player styles with Single player & Multiple Playlist orientations. It supports shuffle, repeat, volume control, time line progress-bar, Song Title and Artist. It features also download, purchase and social share links. You can add your download or purchase url easily.', 0, 13, '/landslide/product-files/icons/Efx Player_Dev Name', '/landslide/product-files/zip/Efx Player_Dev Name.zip', 305447, 540, 1, 1, '2017-11-11 09:18:51'),
(46, 'Enigma', ' This program is an exact simulation of the 3-rotor Army and famous 4-rotor Naval M4, used on U-boats, of the German Enigma cipher machine, as it was used during World War II from 1939 until 1945. You can select between the two models, choose different rotors or \'Walzen\', preset the rotor wiring positions or \'Ringstellung\' and switch letters by using plugs or \'Stecker\'. The code is based on the technical details of the original machine.', 0, 13, '/landslide/product-files/icons/Enigma_Dev Name', '/landslide/product-files/zip/Enigma_Dev Name.zip', 305447, 120, 1, 1, '2017-11-11 09:21:06'),
(47, 'FilterMail', 'Optimail Cleaner is a web application that has been specially designed for intensive cleaning of your email addresses. This application offers 4 important features as powerful as each other and with countless sorting options.\r\n\r\nNo need for any installation or configuration, Optimail Cleaner takes care of everything for you! From the connection to the application, the storage of data or any kind of configuration everything is done automatically.', 0, 13, '/landslide/product-files/icons/FilterMail_Dev Name', '/landslide/product-files/zip/FilterMail_Dev Name.zip', 305447, 234, 1, 1, '2017-11-11 09:22:12'),
(48, 'Looper', 'Easily sell any customized services & products creating your own flat and responsive cost calculator or payment forms (even with subscription !) on your wordpress website .\r\nThis unique plugin can be used to sell any type of service or products: applications, websites, graphics, seo, pets, lunar fragments â€¦. or anything else.', 0, 13, '/landslide/product-files/icons/Looper_Dev Name', '/landslide/product-files/zip/Looper_Dev Name.zip', 305447, 453, 1, 1, '2017-11-11 09:23:11'),
(49, 'SliderRevo', 'Are you looking to utilize the full visual editing power of our Slider Revolution Responsive WordPress Plugin WITHOUT using WordPress?\r\n\r\nIf you donâ€™t have the option to use WordPress on your server or just donâ€™t want to, the Slider Revolution jQuery Visual Editor Addon which (only) works in conjunction with our Slider Revolution Responsive jQuery Plugin is the best choice.', 0, 13, '/landslide/product-files/icons/SliderRevo_Dev Name', '/landslide/product-files/zip/SliderRevo_Dev Name.zip', 305447, 230, 1, 1, '2017-11-11 09:24:41'),
(50, 'UniVerter', 'Unit converter is the most comprehensive unit conversion application, it consists of 23 different categories with over 150 units, so you can convert easily and quickly. \r\n\r\nUnit conventer is a single page application, no database required, so all you need are a static hosting to deploy it. \r\n\r\nEditing & development is easy, no code required, just follow the instructions and you will be able to custom your app. ', 0, 13, '/landslide/product-files/icons/UniVerter_Dev Name', '/landslide/product-files/zip/UniVerter_Dev Name.zip', 305447, 272, 1, 1, '2017-11-11 09:25:29'),
(51, 'RespoGrid', 'RespoGrid is a premium wordpress grid plugin which allows you to show off any custom post types in a fully customizable and responsive grid system. It is perfectly suited for displaying your blog, portfolio, e-commerce or any kind of Wordpress post type. This plugin support the following post format: standard, video, audio, gallery, link, quote. Possibilities are unlimited and can be easily controlled thank to a powerful admin panel.', 0, 14, '/landslide/product-files/icons/RespoGrid_Dev Name', '/landslide/product-files/zip/RespoGrid_Dev Name.zip', 305447, 300, 1, 1, '2017-11-13 00:02:43'),
(52, 'Anvil', 'Anvil is a PHP appication written in codeignter hmvc framework which provides secured User registration and management along with frontend website and pagebuilder. crafted with latest code and security standards and numerous testâ€™s gives you a stable and secured login system.', 0, 14, '/landslide/product-files/icons/Anvil_Dev Name', '/landslide/product-files/zip/Anvil_Dev Name.zip', 305447, 258, 1, 1, '2017-11-13 00:03:26'),
(53, 'SocialNetwork - PHP Social Networking System', 'Social Network â€“ PHP Social Networking System is a powerful PHP script designed to allow you to create your own Social Network! It uses a beautiful Bootstrap design, has integrated live chat, pages, albums, image uploading, powerful Admin Panel and more. Itâ€™s powered by MySQL and PHP.', 0, 14, '/landslide/product-files/icons/SocialNetwork - PHP Social Networking System_Dev Name', '/landslide/product-files/zip/SocialNetwork - PHP Social Networking System_Dev Name.zip', 305447, 500, 1, 1, '2017-11-13 00:04:31'),
(54, 'CryptoCompare', 'CryptoCompare is a PHP web application, which displays general information, quotes and interactive historical charts for more than 1500 cryptocurrencies. It is designed to allow you quickly get a website like coinmarketcap.com up and running.', 0, 14, '/landslide/product-files/icons/CryptoCompare_Dev Name', '/landslide/product-files/zip/CryptoCompare_Dev Name.zip', 305447, 530, 1, 1, '2017-11-13 00:05:22'),
(55, 'Unlimited Addons Package', 'The biggest Addon bundle for WPBakery Page Builder (Visual Composer) with +700 addons and +30 Predefined Templates. All addons are totally unique, crafted individually to fit your WPBakery Page Builder (Visual Composer) website.', 0, 14, '/landslide/product-files/icons/Unlimited Addons Package_Dev Name', '/landslide/product-files/zip/Unlimited Addons Package_Dev Name.zip', 305447, 600, 1, 1, '2017-11-13 00:06:17');

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
(13, 'drawdej963@gmail.com', '123456', 2, 'Ej', 'Mindanao', 1, NULL, 1, '2017-11-11 09:11:20'),
(14, 'marxs@gmail.com', '123123', 3, 'Marx Jendre', 'Sabandana', 1, 99999, 1, '2017-11-12 23:40:55');

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
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
