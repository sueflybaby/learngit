-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2015 at 06:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_yyqn`
--

-- --------------------------------------------------------

--
-- Table structure for table `PersonalInformation_Records`
--

CREATE TABLE IF NOT EXISTS `PersonalInformation_Records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `educational_background` varchar(20) NOT NULL,
  `academic_degree` varchar(20) NOT NULL,
  `academic_title` varchar(20) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `office` varchar(20) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `check` varchar(10) NOT NULL DEFAULT 'uncheck',
  `login_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `PersonalInformation_Records`
--

INSERT INTO `PersonalInformation_Records` (`id`, `name`, `gender`, `telephone`, `educational_background`, `academic_degree`, `academic_title`, `duty`, `office`, `profession`, `resume`, `check`, `login_name`) VALUES
(2, '苏维杰', '1', '13858625391', 'benke', 'xueshi', '医师', '无', 'neiyi', '放射', ' 并没有什么乱用！', 'uncheck', 'suweijie'),
(3, '苏思思', '0', '1590230928', 'UI多少', 'erw', 'cvcxv', 'dfsf', 'werwr', 'dsvxc', 'xcxvcv', 'uncheck', 'susisi');

-- --------------------------------------------------------

--
-- Table structure for table `PersonalInformation_Users`
--

CREATE TABLE IF NOT EXISTS `PersonalInformation_Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `secret` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='THE LIST OF USERS AND ITS SECRETS' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `PersonalInformation_Users`
--

INSERT INTO `PersonalInformation_Users` (`id`, `user`, `secret`) VALUES
(1, '苏维杰', 'test'),
(2, 'suweijie', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
