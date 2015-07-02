-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2015 at 02:43 PM
-- Server version: 5.5.43
-- PHP Version: 5.3.10-1ubuntu3.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bidding`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE IF NOT EXISTS `bidding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `min_price` decimal(10,0) NOT NULL,
  `bid_fee` decimal(10,0) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `name`, `code`, `desc`, `image`, `price`, `min_price`, `bid_fee`, `start_date`, `end_date`, `status`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 1, 'gnana', '174KN', 'dsc', '1435670566-0d5b1c4c7f720f698946c7f6ab08f687.jpg', 22, 22, 1, '2015-07-01 12:00:00', '2015-07-07 12:00:00', 0, '2015-06-29 06:12:36', '2015-07-01 09:32:24', 0, 0),
(4, 1, 'gopiI', '174KNNN', 'fsdcC', '1435670566-0d5b1c4c7f720f698946c7f6ab08f687.jpg', 1, 21, 11, '2015-07-09 08:00:00', '2015-07-17 07:30:00', 1, '2015-06-30 12:34:24', '2015-07-01 09:46:40', 0, 0),
(5, 1, 'test', 'CCCCCC', 'dscsdfvdsv', '1435729096-0d5b1c4c7f720f698946c7f6ab08f687.jpg', 233, 222, 11, '2015-07-01 12:00:00', '2015-07-17 12:00:00', 0, '2015-07-01 11:08:16', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'seller', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'customer', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `role_uid` int(15) NOT NULL AUTO_INCREMENT,
  `uid` int(15) NOT NULL,
  `rid` int(15) NOT NULL,
  PRIMARY KEY (`role_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_uid`, `uid`, `rid`) VALUES
(1, 1, 1),
(4, 6, 2),
(6, 8, 3),
(8, 10, 3),
(9, 11, 2),
(10, 12, 3),
(11, 13, 3),
(12, 14, 3),
(13, 15, 3),
(14, 16, 3),
(15, 17, 3),
(16, 18, 3),
(17, 19, 3),
(18, 20, 3),
(19, 21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_status` tinyint(4) NOT NULL COMMENT '1=Yes, 0=No',
  `payment_date` datetime NOT NULL,
  `shipping_status` tinyint(4) NOT NULL COMMENT '1=Yes, 0=No',
  `shipment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone`, `address`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', 'a6UU6dhF9Wvu2Hk7IKaCiA==', 'admin@bidding.com', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Gnanasekar', 'fksCpIh+ZNHK1jQIT7Jnsg==', 'gnanaseka@gmail.com', '987789', 'mambal', 1, '2015-06-26 04:47:30', '0000-00-00 00:00:00'),
(8, 'gnana', 'U0vy1ORtEpb6h2qnygbQmQ==', 'gnana@gmail.com', '979877897', 'ekkattuthangal', 1, '2015-07-01 03:43:48', '0000-00-00 00:00:00'),
(10, 'kumar', 'QgEzrrvT0pQA3gyiJA5qkw==', 'kuma@gmail.co', '9876543210', 'test', 1, '2015-06-26 04:42:15', '0000-00-00 00:00:00'),
(11, 'gnana', 'QG6OwVHonYHjuMoIOy0Ahg==', 'gnana@gmail.com.mm', '', '2 S Biscayne\nBlvd #3760', 1, '2015-07-01 03:44:26', '0000-00-00 00:00:00'),
(20, 'sekar', 'TpTbmYYNhwwW+zf5VwncIg==', 'sekar@gmail.com', '3055010256', 'Pollachi,Coimbatore dt', 1, '2015-07-01 06:19:02', '0000-00-00 00:00:00'),
(21, 'gnanas', 'oa1y4SAun+/uwlsUsuFhVQ==', 'gnana@gmail.com.cc', '9798778977', 'ekkattuthangall', 1, '2015-07-02 10:06:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_bids`
--

CREATE TABLE IF NOT EXISTS `user_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
