-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 04:00 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table contain all detail of account holder.' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`Uid`, `Name`, `email`, `password`, `Cid`, `Gender`) VALUES
(13, 'Priya', 'prrani28@gmail.com', '$1$RnpUQIU9$lsIoPHfW4Hj6rp7e/lwkL0', 'DTU', 'f'),
(14, 'Divya', 'divyarn23@gmail.com', '$1$vMRH9yw/$V2cbSZY7yGOaWnAgp.j0M.', 'BITS', 'f'),
(15, 'Deep', 'deep9@web.com', '$1$cKe3YIAU$KOZ8zq7sOxrtQsk.CgQPV0', 'BITS', 'm');

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
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`I_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table contain all the item to sell.' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`I_id`, `Title`, `Description`, `Uid`, `Ca_id`, `Contact`, `Price`, `Image`) VALUES
(2, 'Lab Coat', 'Well conditioned ', 14, 2, 'contact @ 8903456123', 120, ''),
(29, 'Bat', 'winning bat', 13, 5, 'prrani28@gmail.com', 250, 'uploads/bat.jpg'),
(30, 'Lab Coat', 'Well conditioned', 13, 2, 'Contact @ 9874384784', 150, 'uploads/lab_coat.jpg'),
(31, 'Scooty', 'Well conditioned and maintained.', 13, 6, 'Only interested party should contact @ 9836583398', 50000, 'uploads/scooty.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
