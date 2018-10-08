-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 02:10 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `parent_id`, `description`) VALUES
(1, 'color', 0, 'color'),
(2, 'red', 1, 'red'),
(3, 'black', 1, '#000'),
(4, 'green', 1, 'green'),
(5, 'gray', 1, '#ccc'),
(6, 'gold', 1, '#FFFFE0');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Test', 'test@test.com', 'Test message');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_type` varchar(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `pay_type`, `date`) VALUES
(13, 5, 'master', '2018-10-07 01:45:44'),
(14, 5, 'visa', '2018-10-07 03:04:13'),
(15, 5, 'master', '2018-10-07 09:16:14'),
(16, 5, 'visa', '2018-10-07 09:23:03'),
(17, 5, 'visa', '2018-10-07 09:36:53'),
(18, 5, 'master', '2018-10-07 09:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 13, 2, 1, 200),
(2, 13, 3, 1, 700),
(3, 14, 2, 1, 200),
(4, 14, 1, 1, 800),
(5, 15, 2, 1, 200),
(6, 15, 3, 1, 700),
(7, 16, 5, 1, 900),
(8, 16, 1, 1, 800),
(9, 17, 2, 1, 200),
(10, 17, 1, 1, 800),
(11, 18, 3, 1, 700),
(12, 18, 6, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `is_published` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_published`) VALUES
(1, 'about', 'About Us', 'Test content', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `ref_id`, `price`, `type`, `date`) VALUES
(1, 5, 17, 1000, 'Visa', '2018-10-07 09:37:13'),
(2, 5, 18, 900, 'Master', '2018-10-07 09:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `small_desc` varchar(255) DEFAULT NULL,
  `price_gross` int(11) NOT NULL,
  `price_net` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `small_desc`, `price_gross`, `price_net`, `image`) VALUES
(1, 'product_name1', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 800, 780, 'product_name1'),
(2, 'product_name2', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 200, 180, 'product_name2'),
(3, 'product_name3', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 700, 680, 'product_name3'),
(4, 'product_name4', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 800, 780, 'product_name4'),
(5, 'product_name5', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 900, 880, 'product_name5'),
(6, 'product_name6', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 200, 180, 'product_name6'),
(7, 'product_name7', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 100, 80, 'product_name7'),
(8, 'product_name8', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 200, 180, 'product_name8'),
(9, 'product_name9', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 400, 380, 'product_name9'),
(10, 'product_name10', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 600, 580, 'product_name10'),
(11, 'product_name11', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 800, 780, 'product_name11'),
(12, 'product_name12', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 1000, 980, 'product_name12'),
(13, 'product_name13', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 500, 480, 'product_name13'),
(14, 'product_name14', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 700, 680, 'product_name14'),
(15, 'product_name15', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 800, 780, 'product_name15'),
(16, 'product_name16', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 200, 180, 'product_name16'),
(17, 'product_name17', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 500, 480, 'product_name17'),
(18, 'product_name18', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 700, 680, 'product_name18'),
(19, 'product_name19', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 300, 280, 'product_name19'),
(20, 'product_name20', 'Lorem ipsum dolor amet waistcoat af leggings twee, tilde shaman four loko tote bag gentrify. Pabst chicharrones jean shorts live-edge. Truffaut DIY chicharrones,', 100, 80, 'product_name20');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `attribute_id`, `product_id`) VALUES
(1, 2, 1),
(2, 6, 2),
(3, 5, 3),
(4, 2, 3),
(5, 3, 6),
(6, 2, 5),
(7, 3, 7),
(8, 4, 8),
(9, 2, 9),
(10, 5, 10),
(11, 3, 11),
(12, 6, 12),
(13, 3, 13),
(14, 4, 14),
(15, 6, 15),
(16, 3, 16),
(17, 5, 17),
(18, 2, 18),
(19, 3, 19),
(20, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'admin',
  `password` char(32) NOT NULL,
  `is_active` tinyint(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `role`, `password`, `is_active`) VALUES
(1, 'admin', 'admin@mysite.com', 'admin', '66461f44bc9d81630c1ccb7411c366ac', 1),
(3, 'user', 'user@mysite.com', 'user', 'c3d0bd396da7f589a5c5dabddc133432', 1),
(4, 'user1', 'user1@uu.com', 'user', '123', 1),
(5, 'user2', 'user2@dse.hgdf.dd', 'user', 'ffd376eb5995427c8d4dd700689ddb7e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
