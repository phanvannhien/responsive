-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2014 at 10:20 AM
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
-- Table structure for table `gl_file`
--

CREATE TABLE IF NOT EXISTS `gl_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relevant_type` varchar(25) NOT NULL,
  `relevant_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `share_status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `gl_file`
--

INSERT INTO `gl_file` (`id`, `relevant_type`, `relevant_id`, `message_id`, `name`, `file_path`, `share_status`, `description`, `create_date`, `status`) VALUES
(1, '', 0, 3, '2667_2667_459535.jpg', '', '', '', '0000-00-00 00:00:00', ''),
(2, '', 0, 21, '2667_2667_459539.jpg', 'uploads/2667_2667_459539.jpg', '', '', '0000-00-00 00:00:00', ''),
(3, '', 0, 32, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(4, '', 0, 33, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(5, '', 0, 34, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(6, '', 0, 35, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(7, '', 0, 36, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(8, '', 0, 41, '2667_2667_459542.jpg', 'uploads/2667_2667_459542.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(9, '', 0, 42, '2667_2667_459542.jpg', 'uploads/2667_2667_459542.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(10, '', 0, 44, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(11, '', 0, 45, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(12, '', 0, 46, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(13, '', 0, 47, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(14, '', 0, 48, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(15, '', 0, 49, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(16, '', 0, 50, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(17, '', 0, 51, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(18, '', 0, 52, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(19, '', 0, 53, '1223_P_137665750902053.jpg', 'uploads/1223_P_137665750902053.jpg', '', '', '0000-00-00 00:00:00', ''),
(20, '', 0, 53, '2667_2667_459544.jpg', 'uploads/2667_2667_459544.jpg', '', '', '0000-00-00 00:00:00', ''),
(21, '', 0, 54, '2667_2667_459545.jpg', 'uploads/2667_2667_459545.jpg', '', '', '0000-00-00 00:00:00', ''),
(22, '', 0, 54, '1223_P_137665750902054.jpg', 'uploads/1223_P_137665750902054.jpg', '', '', '0000-00-00 00:00:00', ''),
(23, '', 0, 55, '2667_2667_459546.jpg', 'uploads/2667_2667_459546.jpg', '', '', '0000-00-00 00:00:00', ''),
(24, '', 0, 55, '1223_P_137665750902055.jpg', 'uploads/1223_P_137665750902055.jpg', '', '', '0000-00-00 00:00:00', ''),
(25, '', 0, 56, '1223_P_137665750902056.jpg', 'uploads/1223_P_137665750902056.jpg', '', '', '0000-00-00 00:00:00', ''),
(26, '', 0, 56, '2667_2667_459547.jpg', 'uploads/2667_2667_459547.jpg', '', '', '0000-00-00 00:00:00', ''),
(27, '', 0, 57, 'samsung16.jpg', 'uploads/samsung16.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(28, '', 0, 58, '2667_2667_459548.jpg', 'uploads/2667_2667_459548.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(29, '', 0, 59, '2667_2667_459549.jpg', 'uploads/2667_2667_459549.jpg', '', '', '0000-00-00 00:00:00', ''),
(30, '', 0, 60, '2667_2667_459550.jpg', 'uploads/2667_2667_459550.jpg', '', '', '0000-00-00 00:00:00', 'DELETE');

-- --------------------------------------------------------

--
-- Table structure for table `gl_message`
--

CREATE TABLE IF NOT EXISTS `gl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL DEFAULT '1',
  `subject` text NOT NULL,
  `content` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `gl_message`
--

INSERT INTO `gl_message` (`id`, `quote_id`, `subject`, `content`, `user_id`, `create_date`, `status`, `last_update_date`, `is_read`) VALUES
(1, 1, 'test', '<strong>test</strong>', 'danhkhmt@gmail.com', '2014-01-06 22:23:01', 'SPAM', '0000-00-00 00:00:00', 0),
(2, 1, 'b', '<u><em><strong>c</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-06 22:31:01', 'SPAM', '0000-00-00 00:00:00', 0),
(3, 1, 'b', '<u><em><strong>c</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-06 22:32:01', 'DELETE', '0000-00-00 00:00:00', 0),
(4, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(5, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(6, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(7, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(8, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(9, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(10, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(11, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:16:01', 'SPAM', '0000-00-00 00:00:00', 0),
(12, 1, 'test', 'test', 'danhkhmt@gmail.com', '2014-01-07 03:32:01', 'SPAM', '0000-00-00 00:00:00', 1),
(13, 1, 'test', 'test', 'danhkhmt@gmail.com', '2014-01-07 03:32:01', 'SPAM', '0000-00-00 00:00:00', 0),
(14, 1, '', '', 'danhkhmt@gmail.com', '2014-01-07 03:40:01', 'DELETE', '0000-00-00 00:00:00', 0),
(15, 1, '', '123', 'danhkhmt@gmail.com', '2014-01-07 03:42:01', 'DELETE', '0000-00-00 00:00:00', 0),
(16, 1, '', '', 'danhkhmt@gmail.com', '2014-01-07 03:43:01', 'DELETE', '0000-00-00 00:00:00', 0),
(17, 1, '', '', 'danhkhmt@gmail.com', '2014-01-07 03:44:01', 'DELETE', '0000-00-00 00:00:00', 0),
(18, 1, '', '', 'danhkhmt@gmail.com', '2014-01-07 03:44:01', 'DELETE', '0000-00-00 00:00:00', 0),
(19, 1, '', '', 'danhkhmt@gmail.com', '2014-01-07 03:45:01', 'DELETE', '0000-00-00 00:00:00', 0),
(20, 1, 'test', '<u><em><strong>test</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-07 03:54:01', '', '0000-00-00 00:00:00', 0),
(21, 1, 'test', '<em><strong>did you like my suggestion price?</strong></em>', 'danh_hc@yahoo.com', '2014-01-07 03:56:01', '', '0000-00-00 00:00:00', 1),
(22, 1, 'test', '123', 'danhkhmt@gmail.com', '2014-01-07 21:24:01', '', '0000-00-00 00:00:00', 0),
(23, 1, 'test', '123', 'danhkhmt@gmail.com', '2014-01-07 21:25:01', 'DELETE', '0000-00-00 00:00:00', 0),
(24, 1, 'test', '123', 'danhkhmt@gmail.com', '2014-01-07 21:33:01', 'DELETE', '0000-00-00 00:00:00', 0),
(25, 1, '', 'Software Developer - Fresh Graduated In 2013 ', 'danhkhmt@gmail.com', '2014-01-07 21:40:01', 'DELETE', '0000-00-00 00:00:00', 0),
(26, 1, '', 'Software Developer - Fresh Graduated In 2013 ', 'danhkhmt@gmail.com', '2014-01-07 21:41:01', 'DELETE', '0000-00-00 00:00:00', 0),
(27, 1, '', 'Software Developer - Fresh Graduated In 2013 ', 'danhkhmt@gmail.com', '2014-01-07 21:47:01', 'DELETE', '0000-00-00 00:00:00', 0),
(28, 1, '', 'Software Developer - Fresh Graduated In 2013 ', 'danhkhmt@gmail.com', '2014-01-07 21:51:01', 'DELETE', '0000-00-00 00:00:00', 0),
(29, 1, '', 'Software Developer - Fresh Graduated In 2013 ', 'danhkhmt@gmail.com', '2014-01-07 21:55:01', 'DELETE', '0000-00-00 00:00:00', 0),
(30, 1, 'test', '', 'danhkhmt@gmail.com', '2014-01-08 00:49:01', 'DELETE', '0000-00-00 00:00:00', 0),
(31, 1, 'test', '<u><em><strong>hello test send mail function</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 00:51:01', 'DELETE', '0000-00-00 00:00:00', 0),
(32, 1, 'test attachment', '<u><em><strong>test sendmail</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 01:28:01', '', '0000-00-00 00:00:00', 0),
(33, 1, 'test attachment', '<u><em><strong>test sendmail</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 01:30:01', '', '0000-00-00 00:00:00', 0),
(34, 1, 'test attachment', '<u><em><strong>test sendmail</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 01:39:01', '', '0000-00-00 00:00:00', 0),
(35, 1, 'test attachment', '<u><em><strong>test sendmail</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 01:41:01', '', '0000-00-00 00:00:00', 0),
(36, 1, 'test attachment', '<u><em><strong>test sendmail</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 01:43:01', '', '0000-00-00 00:00:00', 0),
(37, 1, 'test', 'test attach', 'danhkhmt@gmail.com', '2014-01-08 01:50:01', 'DELETE', '0000-00-00 00:00:00', 0),
(38, 1, 'test', 'test attach', 'danhkhmt@gmail.com', '2014-01-08 01:51:01', 'DELETE', '0000-00-00 00:00:00', 0),
(39, 1, 'test', 'test attach', 'danhkhmt@gmail.com', '2014-01-08 01:53:01', 'DELETE', '0000-00-00 00:00:00', 0),
(40, 1, 'test', 'test attach', 'danhkhmt@gmail.com', '2014-01-08 01:53:01', 'DELETE', '0000-00-00 00:00:00', 0),
(41, 1, 'test', 'test attach', 'danhkhmt@gmail.com', '2014-01-08 01:54:01', 'DELETE', '0000-00-00 00:00:00', 0),
(42, 1, 'test', 'test attach', 'danhkhmt@gmail.com', '2014-01-08 01:54:01', 'DELETE', '0000-00-00 00:00:00', 0),
(43, 1, '', '', 'danhkhmt@gmail.com', '2014-01-08 02:02:01', 'SPAM', '0000-00-00 00:00:00', 0),
(44, 1, 'test attach 3', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:03:01', 'DELETE', '0000-00-00 00:00:00', 0),
(45, 1, 'test attach 3', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:05:01', 'DELETE', '0000-00-00 00:00:00', 0),
(46, 1, 'test attach 3', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:05:01', 'DELETE', '0000-00-00 00:00:00', 0),
(47, 1, 'test attach 3', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:06:01', 'DELETE', '0000-00-00 00:00:00', 0),
(48, 1, 'test attach 3', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:10:01', '', '0000-00-00 00:00:00', 0),
(49, 1, 'test attach 3', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:10:01', 'DELETE', '0000-00-00 00:00:00', 0),
(50, 1, 'test attach 3', 'test attachment 3', 'danhkhmt@gmail.com', '2014-01-08 02:11:01', 'DELETE', '0000-00-00 00:00:00', 0),
(51, 1, 'test attach 3', 'test attachment 3', 'danhkhmt@gmail.com', '2014-01-08 02:11:01', '', '0000-00-00 00:00:00', 0),
(52, 1, 'test attach 3', 'test attachment 3', 'danhkhmt@gmail.com', '2014-01-08 02:11:01', '', '0000-00-00 00:00:00', 0),
(53, 1, 'test multi attachment', '<u><em><strong>test multi attachment</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 02:13:01', '', '0000-00-00 00:00:00', 1),
(54, 1, 'test multiattach', '<u><em><strong>test multiattach</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 02:15:01', 'DELETE', '0000-00-00 00:00:00', 0),
(55, 1, 'test multiattach', '<span style="color:#ff0000;"><u><em><strong>test multiattach</strong></em></u></span>', 'danhkhmt@gmail.com', '2014-01-08 02:21:01', '', '0000-00-00 00:00:00', 1),
(56, 1, 'test multiattach 8/1', '<u><em><strong>test multiattach 8/1</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 02:23:01', 'SPAM', '0000-00-00 00:00:00', 0),
(57, 1, 'test single attach', 'test single attach', 'danhkhmt@gmail.com', '2014-01-08 02:26:01', 'DELETE', '0000-00-00 00:00:00', 0),
(58, 1, 'test', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:37:01', 'TRASH', '0000-00-00 00:00:00', 1),
(59, 1, 'test attachment', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:41:01', 'TRASH', '0000-00-00 00:00:00', 0),
(60, 1, 'test', 'test attachment', 'danhkhmt@gmail.com', '2014-01-08 02:43:01', 'SPAM', '0000-00-00 00:00:00', 0),
(61, 1, 'test loading', 'test loading bar', 'danhkhmt@gmail.com', '2014-01-08 02:58:01', 'SPAM', '0000-00-00 00:00:00', 0),
(62, 1, 'test loading', 'test loading bar', 'danhkhmt@gmail.com', '2014-01-08 03:00:01', 'SPAM', '0000-00-00 00:00:00', 0),
(63, 1, 'test 9/1', '<u><em><strong>test 9/1</strong></em></u>', 'danhkhmt@gmail.com', '2014-01-08 20:01:01', 'SPAM', '0000-00-00 00:00:00', 0),
(64, 1, 'em co khoe khong', 'em co khoe khong', 'danhkhmt@gmail.com', '2014-01-09 02:40:01', '', '0000-00-00 00:00:00', 0),
(65, 1, 'tinh chi dep khi con dang do', 'cho anh xin mot ngay , mot ngay thoai', 'danhkhmt@gmail.com', '2014-01-09 02:46:01', 'SPAM', '0000-00-00 00:00:00', 1),
(66, 1, 'cho em xin mot ngan, 1k thoi', 'cho em xin mot ngan, 1k thoi<br />\n<em><strong><span style="background-color:#ffd700;">cho em xin mot ngan, 1k thoi</span></strong></em>', 'danhkhmt@gmail.com', '2014-01-09 02:49:01', '', '0000-00-00 00:00:00', 1),
(67, 1, 'test html tag', '', 'danhkhmt@gmail.com', '2014-01-09 03:25:01', 'SPAM', '0000-00-00 00:00:00', 1),
(68, 1, 'test html tag', '', 'danhkhmt@gmail.com', '2014-01-09 03:25:01', 'SPAM', '0000-00-00 00:00:00', 1),
(69, 1, 'test html tag', '', 'danhkhmt@gmail.com', '2014-01-09 03:26:01', 'SPAM', '0000-00-00 00:00:00', 1),
(70, 1, 'test html tag', 'test', 'danhkhmt@gmail.com', '2014-01-09 03:26:01', 'DELETE', '0000-00-00 00:00:00', 0),
(71, 1, 'test html', '<strong>test HTML tag</strong><br />\ntest HTML tag<br />\ntest HTML tag<br />\n', 'danhkhmt@gmail.com', '2014-01-09 03:28:01', '', '0000-00-00 00:00:00', 1),
(73, 1, 'Reply: test 9/1', 'hello', 'danhkhmt@gmail.com', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(74, 1, 'Reply: test 9/1', 'yes, I like so much', 'danhkhmt@gmail.com', '2014-01-23 09:53:04', '', '0000-00-00 00:00:00', 0),
(75, 1, 'Reply: test 9/1', 'yes, I like so much 2', 'danhkhmt@gmail.com', '2014-01-23 09:53:52', '', '0000-00-00 00:00:00', 0),
(76, 1, 'Reply: test 9/1', 'vậy thì mua đi em', 'danh_hc@yahoo.com', '2014-01-23 10:02:42', '', '0000-00-00 00:00:00', 0),
(77, 1, 'Reply: test 9/1', 'vậy thì mua đi em', 'danh_hc@yahoo.com', '2014-01-23 10:02:42', '', '0000-00-00 00:00:00', 1),
(78, 1, 'Reply: test 9/1', 'mua thì mua', 'danhkhmt@gmail.com', '2014-01-23 14:53:51', '', '0000-00-00 00:00:00', 0),
(79, 1, 'Reply: test 9/1', 'mua thì mua', 'danhkhmt@gmail.com', '2014-01-23 14:53:55', '', '0000-00-00 00:00:00', 0),
(80, 1, 'Reply: test 9/1', '20.000 dc ko', 'danhkhmt@gmail.com', '2014-01-23 14:55:04', '', '0000-00-00 00:00:00', 1),
(81, 1, 'Reply: test 9/1', 'ok luôn', 'danh_hc@yahoo.com', '2014-01-23 14:56:57', '', '0000-00-00 00:00:00', 1),
(82, 1, 'Reply: test 9/1', 'mà khi nào giả tiền đây', 'danh_hc@yahoo.com', '2014-01-23 14:59:23', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gl_message_file`
--

CREATE TABLE IF NOT EXISTS `gl_message_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `share_status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `gl_message_file`
--

INSERT INTO `gl_message_file` (`id`, `message_id`, `name`, `file_path`, `share_status`, `description`, `create_date`, `status`) VALUES
(1, 3, '2667_2667_459535.jpg', '', '', '', '0000-00-00 00:00:00', 'DELETE'),
(2, 21, '2667_2667_459539.jpg', 'uploads/2667_2667_459539.jpg', '', '', '0000-00-00 00:00:00', ''),
(3, 32, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(4, 33, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(5, 34, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(6, 35, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(7, 36, '2667_2667_459541.jpg', 'uploads/2667_2667_459541.jpg', '', '', '0000-00-00 00:00:00', ''),
(8, 41, '2667_2667_459542.jpg', 'uploads/2667_2667_459542.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(9, 42, '2667_2667_459542.jpg', 'uploads/2667_2667_459542.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(10, 44, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(11, 45, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(12, 46, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(13, 47, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(14, 48, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(15, 49, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(16, 50, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(17, 51, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(18, 52, '2667_2667_459543.jpg', 'uploads/2667_2667_459543.jpg', '', '', '0000-00-00 00:00:00', ''),
(19, 53, '1223_P_137665750902053.jpg', 'uploads/1223_P_137665750902053.jpg', '', '', '0000-00-00 00:00:00', ''),
(20, 53, '2667_2667_459544.jpg', 'uploads/2667_2667_459544.jpg', '', '', '0000-00-00 00:00:00', ''),
(21, 54, '2667_2667_459545.jpg', 'uploads/2667_2667_459545.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(22, 54, '1223_P_137665750902054.jpg', 'uploads/1223_P_137665750902054.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(23, 55, '2667_2667_459546.jpg', 'uploads/2667_2667_459546.jpg', '', '', '0000-00-00 00:00:00', ''),
(24, 55, '1223_P_137665750902055.jpg', 'uploads/1223_P_137665750902055.jpg', '', '', '0000-00-00 00:00:00', ''),
(25, 56, '1223_P_137665750902056.jpg', 'uploads/1223_P_137665750902056.jpg', '', '', '0000-00-00 00:00:00', ''),
(26, 56, '2667_2667_459547.jpg', 'uploads/2667_2667_459547.jpg', '', '', '0000-00-00 00:00:00', ''),
(27, 57, 'samsung16.jpg', 'uploads/samsung16.jpg', '', '', '0000-00-00 00:00:00', 'DELETE'),
(28, 58, '2667_2667_459548.jpg', 'uploads/2667_2667_459548.jpg', '', '', '0000-00-00 00:00:00', 'TRASH'),
(29, 59, '2667_2667_459549.jpg', 'uploads/2667_2667_459549.jpg', '', '', '0000-00-00 00:00:00', 'TRASH'),
(30, 60, '2667_2667_459550.jpg', 'uploads/2667_2667_459550.jpg', '', '', '0000-00-00 00:00:00', 'TRASH');

-- --------------------------------------------------------

--
-- Table structure for table `gl_quote`
--

CREATE TABLE IF NOT EXISTS `gl_quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_detail_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `expire_time` datetime NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `offer_sample` varchar(255) NOT NULL,
  `payer` varchar(255) NOT NULL,
  `offer_sample_free` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `valid_till` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gl_quote`
--

INSERT INTO `gl_quote` (`id`, `request_detail_id`, `user_id`, `create_date`, `expire_time`, `supplier_id`, `offer_sample`, `payer`, `offer_sample_free`, `description`, `valid_till`) VALUES
(1, 74, 'danh_hc@yahoo.com', '2014-01-09 14:34:00', '0000-00-00 00:00:00', '', '', '', '', 'test 9/1', '0000-00-00 00:00:00'),
(9, 0, 'danhkhmt@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'test', '2015-01-21 00:00:00'),
(10, 0, 'danhkhmt@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '2015-01-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gl_quote_detail`
--

CREATE TABLE IF NOT EXISTS `gl_quote_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `model_number` varchar(255) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `port` int(11) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_quote_detail`
--

INSERT INTO `gl_quote_detail` (`id`, `product_name`, `model_number`, `quote_id`, `price`, `quantity`, `shipping_id`, `port`, `currency`, `unit_id`, `description`, `create_date`, `status`) VALUES
(1, '123', '123', 9, 123, 123, 123, 123, 'USD', 0, '123', '0000-00-00 00:00:00', ''),
(2, 'lap', '123', 10, 0, 0, 123, 123, 'USD', 0, 'hello danh_hc', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `gl_quote_file`
--

CREATE TABLE IF NOT EXISTS `gl_quote_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relevant_id` int(11) NOT NULL,
  `relevant_type` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(500) NOT NULL,
  `status` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gl_quote_file`
--

INSERT INTO `gl_quote_file` (`id`, `relevant_id`, `relevant_type`, `name`, `path`, `status`, `description`, `create_date`) VALUES
(1, 2, 'QUOTE_RELEVANT_FILE', '2667_2667_459578.jpg', '2667_2667_459578.jpg', '', '', '0000-00-00 00:00:00'),
(2, 3, 'QUOTE_RELEVANT_FILE', '2667_2667_459578.jpg', '2667_2667_459578.jpg', '', '', '0000-00-00 00:00:00'),
(3, 4, 'QUOTE_RELEVANT_FILE', '2667_2667_459580.jpg', '2667_2667_459580.jpg', '', '', '0000-00-00 00:00:00'),
(4, 5, 'QUOTE_RELEVANT_FILE', '2667_2667_459580.jpg', '2667_2667_459580.jpg', '', '', '0000-00-00 00:00:00'),
(5, 8, 'QUOTE_RELEVANT_FILE', '1223_P_137665750902077.jpg', '1223_P_137665750902077.jpg', '', '', '0000-00-00 00:00:00'),
(6, 9, 'QUOTE_RELEVANT_FILE', '2667_2667_459583.jpg', '2667_2667_459583.jpg', '', '', '0000-00-00 00:00:00'),
(7, 1, 'QUOTE_PRODUCT_PHOTO', '1223_P_137665750902078.jpg', '1223_P_137665750902078.jpg', '', '', '0000-00-00 00:00:00'),
(8, 1, 'QUOTE_PRODUCT_PHOTO', '2667_2667_459582.jpg', '2667_2667_459582.jpg', '', '', '0000-00-00 00:00:00'),
(9, 10, 'QUOTE_RELEVANT_FILE', '1223_P_137665750902079.jpg', '1223_P_137665750902079.jpg', '', '', '0000-00-00 00:00:00'),
(10, 2, 'QUOTE_PRODUCT_PHOTO', '2667_2667_459585.jpg', '2667_2667_459585.jpg', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gl_request_status`
--

CREATE TABLE IF NOT EXISTS `gl_request_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gl_request_status`
--

INSERT INTO `gl_request_status` (`id`, `name`, `description`, `status`, `create_date`) VALUES
(1, 'pending', '', '', '2013-12-28 01:31:49'),
(2, 'approved', '', '', '2013-12-28 01:32:22'),
(3, 'rejected', '', '', '2013-12-28 01:33:28'),
(4, 'completed', '', '', '2013-12-28 01:33:57'),
(5, 'closed', '', '', '2013-12-31 01:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `gl_unit`
--

CREATE TABLE IF NOT EXISTS `gl_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_unit`
--

INSERT INTO `gl_unit` (`id`, `name`, `description`, `create_date`, `status`) VALUES
(1, 'pieces', '', '2014-01-21 00:00:00', ''),
(2, 'boxes', '', '2014-01-21 08:51:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `gl_user`
--

CREATE TABLE IF NOT EXISTS `gl_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_avata` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_pass` varchar(50) NOT NULL,
  `type_id` int(5) NOT NULL,
  `user_level_id` int(10) unsigned NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_sex` varchar(10) NOT NULL,
  `user_birthday` varchar(20) NOT NULL,
  `user_key` varchar(255) DEFAULT '',
  `user_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` int(1) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gl_user`
--

INSERT INTO `gl_user` (`user_id`, `user_firstname`, `user_lastname`, `user_avata`, `user_address`, `user_pass`, `type_id`, `user_level_id`, `user_email`, `user_phone`, `user_sex`, `user_birthday`, `user_key`, `user_last_login`, `published`) VALUES
(1, 'Nhien', 'Phan', NULL, NULL, 'fcea920f7412b5da7be0cf42b8c93759', 1, 1, 'phanvannhien@gmail.com', '0949546262', 'Nam', '03/12/1969', 'Ll47TP1GjV6xLBIcLOfaf00Ur1QgBcvEmkuaPiKJFmKHjw6ZyDSl4i0YI96JJl1l6ROXzU8Qn2YUKhDEaBATjgAkwc7JsmdtLRnJcSCm2akvbH08fxZBENNkYLnKOCRdioXmdMlJ4k8qvF5dAxJYeSImdxCCPW8nQwEdb5zZsJe5m2VaZPZTSUgSA3XsBWdyhnviqDKfTIv8fA1z0lNrYSnNgwu2TlvL7sG7iT4eNXVH5z5JElmbRtkX1oFXJvh', '2013-12-21 02:21:20', 0),
(2, 'Nhien', 'Phan', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 'neihn88@gmail.com', '0949546262', 'Nam', '08/12/1965', '', '2013-12-20 04:01:43', 0),
(3, 'Huynh Cong', 'Danh', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 3, 1, 'danhkhmt@gmail.com', '01649133672', 'Nam', '20/08/1987', '', '2014-01-23 09:57:55', 0),
(4, 'Huynh Cong', 'Danh', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 3, 1, 'danh_hc@yahoo.com', '01649133672', 'Nam', '20/08/1987', '', '2014-01-23 09:22:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gl_user_level`
--

CREATE TABLE IF NOT EXISTS `gl_user_level` (
  `user_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_name` varchar(255) DEFAULT NULL,
  `user_level_icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gl_user_level`
--

INSERT INTO `gl_user_level` (`user_level_id`, `user_level_name`, `user_level_icon`) VALUES
(1, 'Chưa xác thực', 'unverified.png'),
(2, 'Đã xác thực', 'verified.png'),
(3, 'Thành viên vàng', 'goldmember.png');

-- --------------------------------------------------------

--
-- Table structure for table `gl_user_request`
--

CREATE TABLE IF NOT EXISTS `gl_user_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) NOT NULL,
  `time_expire` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `gl_user_request`
--

INSERT INTO `gl_user_request` (`id`, `user_id`, `time_expire`, `create_date`) VALUES
(1, '', '2014-12-24 00:00:00', '2013-12-24 00:14:04'),
(2, '', '2014-12-24 00:00:00', '2013-12-24 01:59:12'),
(3, '', '2014-12-24 00:00:00', '2013-12-24 02:05:44'),
(4, '', '2014-12-24 00:00:00', '2013-12-24 02:39:30'),
(5, '', '2014-12-24 00:00:00', '2013-12-24 04:03:16'),
(6, '', '2014-12-24 00:00:00', '2013-12-24 04:07:44'),
(7, '', '2014-12-24 00:00:00', '2013-12-24 04:16:19'),
(8, '', '2014-12-24 00:00:00', '2013-12-24 04:21:15'),
(9, '', '2014-12-24 00:00:00', '2013-12-24 07:27:13'),
(10, '', '2014-12-24 00:00:00', '2013-12-24 07:27:19'),
(11, '', '2014-12-24 00:00:00', '2013-12-24 07:54:03'),
(12, '', '2014-12-24 00:00:00', '2013-12-24 07:59:09'),
(13, '', '2014-12-24 00:00:00', '2013-12-24 08:31:06'),
(14, '', '2014-12-24 00:00:00', '2013-12-24 08:36:16'),
(15, '', '2014-12-24 00:00:00', '2013-12-24 08:54:24'),
(16, '', '2014-12-24 00:00:00', '2013-12-24 09:46:56'),
(17, '', '2014-12-24 00:00:00', '2013-12-24 14:55:31'),
(18, '', '2014-12-24 00:00:00', '2013-12-24 14:55:46'),
(19, '', '2014-12-24 00:00:00', '2013-12-24 15:13:24'),
(20, '', '2014-12-25 00:00:00', '2013-12-24 23:19:28'),
(21, '', '2014-12-25 00:00:00', '2013-12-25 01:33:25'),
(22, '', '2014-12-25 00:00:00', '2013-12-25 03:21:31'),
(23, '', '2014-12-25 00:00:00', '2013-12-25 03:23:00'),
(24, '', '2014-12-25 00:00:00', '2013-12-25 03:38:50'),
(25, '', '2014-12-25 00:00:00', '2013-12-25 03:39:32'),
(26, '', '2014-12-25 00:00:00', '2013-12-25 03:45:35'),
(27, '', '2014-12-25 00:00:00', '2013-12-25 03:46:19'),
(28, '', '2014-12-25 00:00:00', '2013-12-25 03:54:21'),
(29, '', '2014-12-26 00:00:00', '2013-12-26 10:05:20'),
(30, '', '2014-12-27 00:00:00', '2013-12-26 23:15:49'),
(31, '', '2014-12-28 00:00:00', '2013-12-27 03:54:36'),
(32, '', '2014-12-27 00:00:00', '2013-12-27 07:57:02'),
(33, '', '2014-12-28 00:00:00', '2013-12-28 02:36:41'),
(34, '', '2014-12-28 00:00:00', '2013-12-28 02:36:41'),
(35, '', '2014-12-28 00:00:00', '2013-12-28 02:37:38'),
(36, '', '2014-12-28 00:00:00', '2013-12-28 02:37:38'),
(37, '', '2014-12-28 00:00:00', '2013-12-28 08:29:00'),
(38, '', '2014-12-28 00:00:00', '2013-12-28 08:40:33'),
(39, '', '2014-12-30 00:00:00', '2013-12-30 03:58:33'),
(40, '', '2014-12-30 00:00:00', '2013-12-30 04:31:10'),
(41, '', '2014-12-30 00:00:00', '2013-12-30 10:34:00'),
(42, '', '2014-12-31 00:00:00', '2013-12-31 01:25:49'),
(43, '', '2014-12-31 00:00:00', '2013-12-31 08:38:17'),
(44, '', '2015-01-06 00:00:00', '2014-01-06 01:23:00'),
(45, '', '2015-01-06 00:00:00', '2014-01-06 01:26:03'),
(46, 'danhkhmt@gmail.com', '2015-01-06 00:00:00', '2014-01-06 01:49:40'),
(47, 'danhkhmt@gmail.com', '2015-01-06 00:00:00', '2014-01-06 01:51:34'),
(48, 'danhkhmt@gmail.com', '2015-01-06 00:00:00', '2014-01-06 03:31:12'),
(49, 'danhkhmt@gmail.com', '2015-01-06 00:00:00', '2014-01-06 04:15:45'),
(50, 'danhkhmt@gmail.com', '2015-01-06 00:00:00', '2014-01-06 07:17:20'),
(51, 'danhkhmt@gmail.com', '2015-01-06 00:00:00', '2014-01-06 07:31:35'),
(52, 'danhkhmt@gmail.com', '2015-01-15 00:00:00', '2014-01-15 10:42:45'),
(53, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:00:17'),
(54, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:02:00'),
(55, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:03:35'),
(56, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:08:14'),
(57, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:09:58'),
(58, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:12:10'),
(59, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:12:20'),
(60, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 05:12:41'),
(61, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:40:38'),
(62, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:41:17'),
(63, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:42:55'),
(64, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:45:05'),
(65, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:46:12'),
(66, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:54:01'),
(67, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 06:54:23'),
(68, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 07:18:52'),
(69, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 07:37:01'),
(70, 'danhkhmt@gmail.com', '2015-01-17 00:00:00', '2014-01-17 07:43:03'),
(71, 'danh_hc@yahoo.com', '2015-01-23 00:00:00', '2014-01-23 07:28:00'),
(72, 'danh_hc@yahoo.com', '2015-01-23 00:00:00', '2014-01-23 07:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `gl_user_request_detail`
--

CREATE TABLE IF NOT EXISTS `gl_user_request_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_request_cate_id` int(11) NOT NULL,
  `product_request_info` varchar(500) NOT NULL,
  `request_quantity_estimated` int(11) NOT NULL,
  `request_quantity_annual` int(11) NOT NULL,
  `request_status_id` smallint(6) NOT NULL,
  `status` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `gl_user_request_detail`
--

INSERT INTO `gl_user_request_detail` (`id`, `request_id`, `product_id`, `product_name`, `product_request_cate_id`, `product_request_info`, `request_quantity_estimated`, `request_quantity_annual`, `request_status_id`, `status`, `create_date`) VALUES
(1, 1, 0, 'lap', 36, '', 1, 0, 0, '', '2013-12-24 00:14:04'),
(2, 2, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 01:59:12'),
(3, 3, 0, '123', 34, '', 0, 0, 0, '', '2013-12-24 02:05:44'),
(4, 4, 0, '123', 33, '', 1, 0, 0, '', '2013-12-24 02:39:30'),
(5, 5, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 04:03:16'),
(6, 6, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 04:07:44'),
(7, 7, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 04:16:19'),
(8, 8, 0, '123', 34, '', 0, 0, 0, '', '2013-12-24 04:21:15'),
(9, 9, 0, '123', 34, '', 1, 0, 0, '', '2013-12-24 07:27:13'),
(10, 10, 0, '123', 34, '', 1, 0, 0, '', '2013-12-24 07:27:19'),
(11, 11, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 07:54:03'),
(12, 12, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 07:59:09'),
(13, 13, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 08:31:07'),
(14, 14, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 08:36:16'),
(15, 15, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 08:54:24'),
(16, 16, 0, '123', 36, '', 1, 0, 0, '', '2013-12-24 09:46:56'),
(17, 17, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 14:55:32'),
(18, 18, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 14:55:47'),
(19, 19, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 15:13:24'),
(20, 20, 0, '123', 36, '', 0, 0, 0, '', '2013-12-24 23:19:28'),
(21, 21, 0, '123', 36, 'test', 0, 0, 0, '', '2013-12-25 01:33:25'),
(22, 22, 0, 'Laptop', 36, 'Lap', 1, 0, 1, 'pending', '2013-12-25 03:21:31'),
(23, 23, 0, 'Laptop', 36, 'Lap', 1, 0, 0, '', '2013-12-25 03:23:01'),
(24, 24, 0, '123', 34, '', 1, 0, 0, '', '2013-12-25 03:38:50'),
(25, 24, 0, '123', 34, '', 0, 0, 0, '', '2013-12-25 03:38:51'),
(26, 25, 0, '123', 34, '', 1, 0, 0, '', '2013-12-25 03:39:32'),
(27, 25, 0, '123', 34, '', 0, 0, 0, '', '2013-12-25 03:39:33'),
(28, 26, 0, 'laptop', 36, '123', 1, 0, 0, '', '2013-12-25 03:45:35'),
(29, 27, 0, 'laptop', 36, '123', 1, 0, 0, '', '2013-12-25 03:46:19'),
(30, 27, 0, 'laptop', 34, '', 1, 0, 0, '', '2013-12-25 03:46:19'),
(31, 28, 0, 'Laptop', 36, '', 1, 0, 0, '', '2013-12-25 03:54:21'),
(32, 29, 0, 'test', 36, 'test', 1, 0, 0, '', '2013-12-26 10:05:20'),
(33, 30, 0, 'test2', 34, 'test', 1, 0, 0, '', '2013-12-26 23:15:49'),
(34, 31, 0, 'test3', 36, 'test3', 1, 0, 0, '', '2013-12-27 03:54:37'),
(35, 32, 0, 'Phone', 34, 'Galaxy', 1, 0, 0, '', '2013-12-27 07:57:02'),
(36, 35, 0, 'test 6', 34, 'test', 1, 0, 0, '', '2013-12-28 02:37:38'),
(37, 37, 0, '123', 33, '', 1, 0, 0, '', '2013-12-28 08:29:00'),
(38, 37, 0, 'Lap', 34, '', 0, 0, 0, '', '2013-12-28 08:29:01'),
(39, 38, 0, 'test 28_12', 33, '', 0, 0, 0, '', '2013-12-28 08:40:33'),
(40, 39, 0, 'Lap', 36, '', 0, 0, 0, '', '2013-12-30 03:58:33'),
(41, 40, 0, 'mobile', 36, '', 1, 0, 0, '', '2013-12-30 04:31:10'),
(42, 41, 0, 'Lap', 36, '', 0, 0, 0, '', '2013-12-30 10:34:01'),
(43, 42, 0, 'Phone', 33, 'Test', 2, 0, 0, '', '2013-12-31 01:25:49'),
(44, 43, 0, 'test', 36, '', 1, 0, 0, '', '2013-12-31 08:38:17'),
(45, 44, 0, 'test user_email', 36, 'test', 1, 0, 0, '', '2014-01-06 01:23:00'),
(46, 45, 0, 'test email', 36, '', 1, 0, 0, '', '2014-01-06 01:26:03'),
(47, 46, 0, 'test', 36, '', 1, 0, 0, '', '2014-01-06 01:49:40'),
(48, 47, 0, 'test_8_51', 34, '', 1, 0, 0, '', '2014-01-06 01:51:34'),
(49, 48, 0, 'lap test', 36, '', 1, 0, 0, '', '2014-01-06 03:31:12'),
(50, 49, 0, 'Laptop Expensive', 36, 'expensive', 1, 0, 1, '', '2014-01-06 04:15:45'),
(51, 50, 0, 'Phone', 34, '', 1, 0, 1, '', '2014-01-06 07:17:20'),
(52, 51, 0, 'Phone test', 34, '', 1, 0, 1, '', '2014-01-06 07:31:35'),
(53, 52, 0, 'laptop', 36, '', 1, 0, 1, '', '2014-01-15 10:42:46'),
(54, 52, 0, 'phone', 34, '', 2, 0, 1, '', '2014-01-15 10:42:46'),
(55, 53, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:00:17'),
(56, 54, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:02:00'),
(57, 55, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:03:35'),
(58, 56, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:08:14'),
(59, 57, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:09:58'),
(60, 58, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:12:10'),
(61, 59, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:12:20'),
(62, 60, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 05:12:41'),
(63, 61, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:40:38'),
(64, 62, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:41:17'),
(65, 63, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:42:55'),
(66, 64, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:45:05'),
(67, 65, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:46:12'),
(68, 66, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:54:01'),
(69, 67, 0, 'test mail', 36, 'test', 1, 0, 1, '', '2014-01-17 06:54:23'),
(70, 68, 0, 'test dup', 36, 'test dup', 1, 0, 1, '', '2014-01-17 07:18:52'),
(71, 69, 0, 'test send mail', 34, 'test send mail', 1, 0, 1, '', '2014-01-17 07:37:02'),
(72, 70, 0, 'test send mail after request', 33, '', 2, 0, 1, '', '2014-01-17 07:43:03'),
(73, 71, 0, 'danh_hc post', 36, 'test', 1, 0, 1, '', '2014-01-23 07:28:00'),
(74, 72, 0, 'danh_hc post', 36, 'test', 1, 0, 1, '', '2014-01-23 07:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `gl_user_request_file`
--

CREATE TABLE IF NOT EXISTS `gl_user_request_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_detail_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `share_status` varchar(255) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `gl_user_request_file`
--

INSERT INTO `gl_user_request_file` (`file_id`, `request_detail_id`, `name`, `file_path`, `share_status`, `desc`, `create_date`) VALUES
(1, 19, '2667_2667_45957.jpg', '2667_2667_45957.jpg', '', '', '2013-12-24 15:13:24'),
(2, 21, '2667_2667_45958.jpg', '2667_2667_45958.jpg', '', '', '2013-12-25 01:33:25'),
(3, 22, '2667_2667_459510.jpg', '2667_2667_459510.jpg', '', '', '2013-12-25 03:21:31'),
(4, 22, '1223_P_137665750902011.jpg', '1223_P_137665750902011.jpg', '', '', '2013-12-25 03:21:31'),
(5, 23, '2667_2667_459510.jpg', '2667_2667_459510.jpg', '', '', '2013-12-25 03:23:01'),
(6, 23, '1223_P_137665750902011.jpg', '1223_P_137665750902011.jpg', '', '', '2013-12-25 03:23:01'),
(7, 23, '1223_P_137665750902012.jpg', '1223_P_137665750902012.jpg', '', '', '2013-12-25 03:23:01'),
(8, 24, '2667_2667_459511.jpg', '2667_2667_459511.jpg', '', '', '2013-12-25 03:38:51'),
(9, 24, '1223_P_137665750902013.jpg', '1223_P_137665750902013.jpg', '', '', '2013-12-25 03:38:51'),
(10, 25, '1223_P_1376657509020.jpg', '1223_P_1376657509020.jpg', '', '', '2013-12-25 03:38:51'),
(11, 25, '2667_2667_4595.jpg', '2667_2667_4595.jpg', '', '', '2013-12-25 03:38:51'),
(12, 26, '2667_2667_459511.jpg', '2667_2667_459511.jpg', '', '', '2013-12-25 03:39:33'),
(13, 26, '1223_P_137665750902013.jpg', '1223_P_137665750902013.jpg', '', '', '2013-12-25 03:39:33'),
(14, 27, '1223_P_1376657509020.jpg', '1223_P_1376657509020.jpg', '', '', '2013-12-25 03:39:33'),
(15, 27, '2667_2667_4595.jpg', '2667_2667_4595.jpg', '', '', '2013-12-25 03:39:33'),
(16, 29, '2667_2667_459513.jpg', '2667_2667_459513.jpg', '', '', '2013-12-25 03:46:19'),
(17, 29, '1223_P_137665750902015.jpg', '1223_P_137665750902015.jpg', '', '', '2013-12-25 03:46:19'),
(18, 30, '1223_P_1376657509020.jpg', '1223_P_1376657509020.jpg', '', '', '2013-12-25 03:46:19'),
(19, 30, '2667_2667_4595.jpg', '2667_2667_4595.jpg', '', '', '2013-12-25 03:46:19'),
(20, 31, '1223_P_137665750902017.jpg', '1223_P_137665750902017.jpg', '', '', '2013-12-25 03:54:21'),
(21, 32, '2667_2667_459519.jpg', '2667_2667_459519.jpg', '', '', '2013-12-26 10:05:20'),
(22, 33, '2667_2667_459520.jpg', '2667_2667_459520.jpg', '', '', '2013-12-26 23:15:49'),
(23, 34, '2667_2667_459521.jpg', '2667_2667_459521.jpg', '', '', '2013-12-27 03:54:37'),
(24, 35, 'samsung8.jpg', 'samsung8.jpg', '', '', '2013-12-27 07:57:02'),
(25, 36, '2667_2667_459522.jpg', '2667_2667_459522.jpg', '', '', '2013-12-28 02:37:38'),
(26, 37, '2667_2667_459524.jpg', '2667_2667_459524.jpg', '', '', '2013-12-28 08:29:00'),
(27, 37, '1223_P_137665750902040.jpg', '1223_P_137665750902040.jpg', '', '', '2013-12-28 08:29:00'),
(28, 38, '2667_2667_459525.jpg', '2667_2667_459525.jpg', '', '', '2013-12-28 08:29:01'),
(29, 39, 'samsung9.jpg', 'samsung9.jpg', '', '', '2013-12-28 08:40:33'),
(30, 42, '1223_P_137665750902041.jpg', '1223_P_137665750902041.jpg', '', '', '2013-12-30 10:34:01'),
(31, 42, '2667_2667_459526.jpg', '2667_2667_459526.jpg', '', '', '2013-12-30 10:34:01'),
(32, 43, 'Mobi.txt', 'Mobi.txt', '', '', '2013-12-31 01:25:49'),
(33, 44, '1223_P_137665750902042.jpg', '1223_P_137665750902042.jpg', '', '', '2013-12-31 08:38:17'),
(34, 45, '2667_2667_459528.jpg', '2667_2667_459528.jpg', '', '', '2014-01-06 01:23:00'),
(35, 47, '2667_2667_459529.jpg', '2667_2667_459529.jpg', '', '', '2014-01-06 01:49:40'),
(36, 48, 'samsung11.jpg', 'samsung11.jpg', '', '', '2014-01-06 01:51:34'),
(37, 49, '1223_P_137665750902046.jpg', '1223_P_137665750902046.jpg', '', '', '2014-01-06 03:31:12'),
(38, 50, '2667_2667_459530.jpg', '2667_2667_459530.jpg', '', '', '2014-01-06 04:15:45'),
(39, 51, 'samsung12.jpg', 'samsung12.jpg', '', '', '2014-01-06 07:17:20'),
(40, 52, 'samsung13.jpg', 'samsung13.jpg', '', '', '2014-01-06 07:31:35'),
(41, 53, '2667_2667_459553.jpg', '2667_2667_459553.jpg', '', '', '2014-01-15 10:42:46'),
(42, 53, '1223_P_137665750902058.jpg', '1223_P_137665750902058.jpg', '', '', '2014-01-15 10:42:46'),
(43, 54, 'samsung18.jpg', 'samsung18.jpg', '', '', '2014-01-15 10:42:46'),
(44, 73, '2667_2667_459584.jpg', '2667_2667_459584.jpg', '', '', '2014-01-23 07:28:00'),
(45, 74, '2667_2667_459584.jpg', '2667_2667_459584.jpg', '', '', '2014-01-23 07:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `gl_user_type`
--

CREATE TABLE IF NOT EXISTS `gl_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gl_user_type`
--

INSERT INTO `gl_user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'Người mua hàng'),
(2, 'Người bán hàng'),
(3, 'Cả hai');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
