-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 09:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `police`
--

-- --------------------------------------------------------

--
-- Table structure for table `criminals`
--

CREATE TABLE IF NOT EXISTS `criminals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `nickname` text NOT NULL,
  `ent7al` text NOT NULL,
  `birthday` text NOT NULL,
  `job` text NOT NULL,
  `address` text NOT NULL,
  `card_number` text NOT NULL,
  `marks` text NOT NULL,
  `mother_name` text NOT NULL,
  `cause_number` text NOT NULL,
  `charge_type` text NOT NULL,
  `pic` text NOT NULL,
  `egra2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `criminals`
--

INSERT INTO `criminals` (`id`, `name`, `nickname`, `ent7al`, `birthday`, `job`, `address`, `card_number`, `marks`, `mother_name`, `cause_number`, `charge_type`, `pic`, `egra2`) VALUES
(1, 'sdsd', 'sadas', '', 'sd', 'asd', 'sd', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE IF NOT EXISTS `system_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(6) NOT NULL,
  `edit` tinyint(4) NOT NULL,
  `addP` tinyint(4) NOT NULL,
  `deleteP` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `username`, `password`, `role`, `edit`, `addP`, `deleteP`) VALUES
(1, 'admin', '12345', 'admin', 1, 1, 1),
(2, 'ahmedsami', '1234', 'normal', 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
