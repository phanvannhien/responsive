-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 28, 2013 at 02:37 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `gldb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `gl_user`
-- 

CREATE TABLE `gl_user` (
  `user_id` int(10) NOT NULL auto_increment,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `level_id` int(5) default NULL,
  `user_email` varchar(100) default NULL,
  `user_phone` varchar(15) default NULL,
  `user_sex` varchar(10) default NULL,
  `user_birthday` varchar(20) default NULL,
  `published` int(1) default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `gl_user`
-- 

INSERT INTO `gl_user` VALUES (1, '0', 'Nhiên', 'e10adc3949ba59abbe56e057f20f883e', 1, 'phanvannhien@gmail.com', '0949546262', 'Nam', '05/11/2013', 0);


