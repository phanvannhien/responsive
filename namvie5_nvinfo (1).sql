-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2013 at 08:22 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `namvie5_nvinfo`
--
CREATE DATABASE IF NOT EXISTS `namvie5_nvinfo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `namvie5_nvinfo`;

-- --------------------------------------------------------

--
-- Table structure for table `gl_categories`
--

CREATE TABLE IF NOT EXISTS `gl_categories` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_slug` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `parent_id` int(5) DEFAULT '1',
  `category_des` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `gl_categories`
--

INSERT INTO `gl_categories` (`category_id`, `category_slug`, `category_name`, `category_img`, `parent_id`, `category_des`) VALUES
(1, NULL, 'Laptop', '1223_P_1376657509020.jpg', 0, 'Laptop'),
(36, NULL, 'Dell', '2667_2667_4595.jpg', 1, 'Dell'),
(34, NULL, 'galaxy note', 'samsung1.jpg', 29, 'galaxy note'),
(35, NULL, 'Smartphone', 'samsung2.jpg', 0, 'test'),
(29, NULL, 'Samsung', 'samsung.jpg', 35, 'Samsung'),
(30, NULL, 'Apple', 'Apple-Pic.jpg', 35, 'Apple'),
(31, NULL, 'Iphone', '', 30, 'Iphone'),
(33, NULL, 'Iphone 5s', 'Iphone_5S.jpg', 31, 'Iphone 5s');

-- --------------------------------------------------------

--
-- Table structure for table `gl_request_detail`
--

CREATE TABLE IF NOT EXISTS `gl_request_detail` (
  `request_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_request_cate_id` int(11) NOT NULL,
  `product_request_info` varchar(500) NOT NULL,
  `request_quantity_estimated` int(11) NOT NULL,
  `request_quantity_annual` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gl_request_detail`
--

INSERT INTO `gl_request_detail` (`request_detail_id`, `request_id`, `product_id`, `product_name`, `product_request_cate_id`, `product_request_info`, `request_quantity_estimated`, `request_quantity_annual`, `create_date`) VALUES
(1, 3, 0, '123', 34, '123', 123, 0, '2013-12-21 04:28:29'),
(2, 4, 0, '123', 34, '123', 123, 0, '2013-12-21 04:30:48'),
(3, 5, 0, '123', 34, '123', 123, 0, '2013-12-21 04:32:47'),
(4, 6, 0, '123', 34, '123', 123, 0, '2013-12-21 04:34:22'),
(5, 7, 0, '123', 34, '123', 123, 0, '2013-12-21 04:36:50'),
(6, 8, 0, '123', 34, '123', 123, 0, '2013-12-21 04:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `gl_request_files`
--

CREATE TABLE IF NOT EXISTS `gl_request_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_detail_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gl_user`
--

CREATE TABLE IF NOT EXISTS `gl_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `level_id` int(5) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_sex` varchar(10) DEFAULT NULL,
  `user_birthday` varchar(20) DEFAULT NULL,
  `user_key` varchar(255) DEFAULT NULL,
  `published` int(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gl_user`
--

INSERT INTO `gl_user` (`user_id`, `user_firstname`, `user_lastname`, `user_pass`, `level_id`, `user_email`, `user_phone`, `user_sex`, `user_birthday`, `user_key`, `published`) VALUES
(1, '0', 'Nhiên', 'e10adc3949ba59abbe56e057f20f883e', 1, 'phanvannhien@gmail.com', '0949546262', 'Nam', '05/11/2013', 'RrSHwi0CcjXci877MDy6BN6eVOEaWINIENhM4JAzkPUDnPd1do', 0),
(2, 'Nguyen', 'Nhu Minh', 'e10adc3949ba59abbe56e057f20f883e', 1, 'neihn88@gmail.com', '0902181852', 'Nam', '13/11/1975', NULL, 0),
(3, 'Nguyễn ', 'Văn Nhật', '1249fe1ef8b9f86b6d4094baadbdf58d', 1, 'nguyenvannhat@yahoo.com.vn', '01656306965', 'Nam', '08/08/1990', NULL, 0),
(6, 'nguyen', 'tien', 'e10adc3949ba59abbe56e057f20f883e', 1, 'nguyentaitien@gmail.com', '0123456789', 'Nam', '20/11/1989', NULL, 0),
(5, 'Đương', 'Tấn', 'e10adc3949ba59abbe56e057f20f883e', 1, 'muitet@yahoo.com', '0123456789', 'Nam', '10/11/1977', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_user_request`
--

CREATE TABLE IF NOT EXISTS `gl_user_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(250) NOT NULL,
  `time_expire` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gl_user_request`
--

INSERT INTO `gl_user_request` (`id`, `userid`, `time_expire`, `create_date`) VALUES
(1, '', '0000-00-00 00:00:00', '2013-12-21 04:27:10'),
(2, '', '0000-00-00 00:00:00', '2013-12-21 04:27:48'),
(3, '', '0000-00-00 00:00:00', '2013-12-21 04:28:29'),
(4, '', '0000-00-00 00:00:00', '2013-12-21 04:30:48'),
(5, '', '0000-00-00 00:00:00', '2013-12-21 04:32:47'),
(6, '', '0000-00-00 00:00:00', '2013-12-21 04:34:22'),
(7, '', '0000-00-00 00:00:00', '2013-12-21 04:36:50'),
(8, '', '0000-00-00 00:00:00', '2013-12-21 04:39:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
