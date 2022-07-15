-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2022 at 10:52 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elegant_wardrobe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 3, 'Rebecca Martin', 'rebecca@yahoo.com', '0762588880', 'Hi, I\'m Rebecca. I placed and order for two products on 27th of May and I would like to know the status and whereabout of it.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 3, 'Rebecca Martin', '0762588880', 'rebecca@yahoo.com', 'cash on delivery', 'no. 03, 453 Galle Road, Colombo, Western Province, Sri Lanka - 00130', ', Audrey Cardigan Sweater (1) , 90s Trucker Jacket (2) ', 19000, '27-05-22', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `shop_kids`
--

DROP TABLE IF EXISTS `shop_kids`;
CREATE TABLE IF NOT EXISTS `shop_kids` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_kids`
--

INSERT INTO `shop_kids` (`id`, `name`, `price`, `image`) VALUES
(1, 'Low Pro Jeans 7-16', 4850, 'Low Pro Jeans 7-16.jpg'),
(2, '4-6x Stretch Trucker Jacket', 7800, '4-6x Stretch Trucker Jacket.jpg'),
(3, 'Taper Fit Toddler Boys Jeans 2t-4t', 3850, 'Taper Fit Toddler Boys Jeans 2t-4t.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop_men`
--

DROP TABLE IF EXISTS `shop_men`;
CREATE TABLE IF NOT EXISTS `shop_men` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_men`
--

INSERT INTO `shop_men` (`id`, `name`, `price`, `image`) VALUES
(1, 'Graphic L-Sleeve T-shirt', 3200, 'Graphic L-Sleeve T-shirt.jpg'),
(2, 'Original Hemmed Shorts', 4000, 'Original Hemmed Shorts.jpg'),
(3, 'Stock Trucker Jacket', 7500, 'Stock Trucker Jacket.jpg'),
(4, 'Relaxed Pocket Tee', 2750, 'Relaxed Pocket Tee.jpg'),
(5, 'Regular Fit Men\'s Jeans', 8000, 'regular fit jeans.jpg'),
(6, 'Relaxed Fit Western Shirt', 6500, 'Relaxed Fit Western Shirt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop_women`
--

DROP TABLE IF EXISTS `shop_women`;
CREATE TABLE IF NOT EXISTS `shop_women` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_women`
--

INSERT INTO `shop_women` (`id`, `name`, `price`, `image`) VALUES
(1, 'Audrey Cardigan Sweater', 4000, 'Audrey Cardigan Sweater.jpg'),
(2, '90s Trucker Jacket', 7500, '90s Trucker Jacket.jpg'),
(3, 'Shaping Skinny Women\'s Jeans', 8000, 'Shaping Skinny Womens Jeans.jpg'),
(4, 'Apt. Hoodie Sweatshirt', 5000, 'Apt. Hoodie Sweatshirt.jpg'),
(5, 'High Rise Shorts', 4850, 'High Rise Shorts.jpg'),
(7, 'Ribcage Straight Ankle Jeans', 8900, 'Ribcage Straight Ankle Jeans.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `position`) VALUES
(1, 'Imam', 'imam@mail.com', 'beeccdb438355c029a66dbec333fa1c8', 'admin'),
(3, 'Rebecca Martin', 'rebecca@yahoo.com', '13852466bb87914ef75d721a117f779d', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
