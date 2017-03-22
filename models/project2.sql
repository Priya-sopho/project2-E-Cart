-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2017 at 11:35 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE IF NOT EXISTS `Account` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Cid` varchar(10) NOT NULL COMMENT 'References cid of college Table',
  `Gender` char(1) NOT NULL COMMENT 'Either G or B',
  PRIMARY KEY (`Uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table contain all detail of account holder.' AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `Ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cname` varchar(20) NOT NULL,
  PRIMARY KEY (`Ca_id`),
  UNIQUE KEY `Cname` (`Cname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Ca_id`, `Cname`) VALUES
(1, 'Books'),
(2, 'Clothing'),
(3, 'Electronics'),
(4, 'Furniture'),
(7, 'Others'),
(5, 'Sports'),
(6, 'Vehicle');

-- --------------------------------------------------------

--
-- Table structure for table `College`
--

CREATE TABLE IF NOT EXISTS `College` (
  `Cid` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains college name and their acronym which is primary key';

--
-- Dumping data for table `College`
--

INSERT INTO `College` (`Cid`, `Name`) VALUES
('BITS', 'Birla Institute of Technology & Science,Pilani'),
('DTU', 'Delhi Technological University'),
('IITD', 'Indian Institute of Technology, Delhi'),
('IITG', 'Indian Institute of Technology, Guwahati'),
('NITJ', 'National institute of Technology,Jaipur');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `I_id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Ca_id` int(11) NOT NULL,
  `Contact` varchar(150) NOT NULL,
  `Price` mediumint(9) NOT NULL COMMENT 'If price =0 => for donation',
  `Image` mediumblob NOT NULL,
  PRIMARY KEY (`I_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contain all the item to sell.' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
