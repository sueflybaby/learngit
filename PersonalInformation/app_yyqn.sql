-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-09-14 11:38:50
-- 服务器版本： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_yyqn`
--

-- --------------------------------------------------------

--
-- 表的结构 `personalinformation_records`
--

CREATE TABLE IF NOT EXISTS `personalinformation_records` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `educational_background` varchar(20) NOT NULL,
  `academic_degree` varchar(20) NOT NULL,
  `academic_title` varchar(20) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `office` varchar(20) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `study` varchar(100) NOT NULL,
  `medical` varchar(100) NOT NULL,
  `check` varchar(10) NOT NULL DEFAULT 'uncheck'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `personalinformation_users`
--

CREATE TABLE IF NOT EXISTS `personalinformation_users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='THE LIST OF USERS AND ITS SECRETS';

--
-- 转存表中的数据 `personalinformation_users`
--

INSERT INTO `personalinformation_users` (`id`, `user`, `secret`, `uuid`) VALUES
(1, 'suweijie', 'suweijie', ''),
(2, 'hongweifeng', 'hongweifeng', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personalinformation_records`
--
ALTER TABLE `personalinformation_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `personalinformation_users`
--
ALTER TABLE `personalinformation_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personalinformation_records`
--
ALTER TABLE `personalinformation_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personalinformation_users`
--
ALTER TABLE `personalinformation_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
