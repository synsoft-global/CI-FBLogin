-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2013 at 02:52 PM
-- Server version: 5.5.32
-- PHP Version: 5.5.3-1+debphp.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeignitor_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `facebook_user`
--

CREATE TABLE IF NOT EXISTS `facebook_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(50) NOT NULL,
  `fb_uname` varchar(50) NOT NULL,
  `fb_email` varchar(100) NOT NULL,
  `fb_user_location` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `facebook_user`
--

INSERT INTO `facebook_user` (`id`, `fb_id`, `fb_uname`, `fb_email`, `fb_user_location`, `user_password`) VALUES
(1, '1000025', 'testpower', 'testpower@gmail.com', 'Indore, India', '25f9e7943ddae4343ef34181f1b624d0b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
