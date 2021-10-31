-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 07:27 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'Admin', '123', 'admin@domin.com');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `imageUrl` varchar(80) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `imageUrl`) VALUES
(4, 'Samsung', 'img/BrandsPictures/Samsung.jpg'),
(5, 'Nokia', 'img/BrandsPictures/Nokia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE IF NOT EXISTS `mobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(100) CHARACTER SET utf8 NOT NULL,
  `brandID` int(11) NOT NULL,
  `price` double NOT NULL,
  `releaseDate` varchar(100) CHARACTER SET utf8 NOT NULL,
  `discountRate` double NOT NULL,
  `mobileUrl` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cameraSpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `memorySpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `networkSpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `platform` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cpu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `features` varchar(300) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`id`, `model`, `brandID`, `price`, `releaseDate`, `discountRate`, `mobileUrl`, `cameraSpecs`, `memorySpecs`, `networkSpecs`, `platform`, `cpu`, `features`) VALUES
(1, 'S4', 4, 200, '2014-12-02', 0, 'img/MobilesPictures/4S4.jpg', '24 MP', '2GB Ram | Storage 16 GB', '3G | 4G', 'Android', '1 MHZ', 'Cool Mobile with cool body'),
(2, 'n9', 5, 1000, '2017-05-07', 50, 'img/MobilesPictures/5n9.jpg', '8 mp', '512 RAM / 8 GBstorage', '3G / wifi / bluetooth', 'Android', '1 MHZ', 'Available colors: blue , red '),
(4, 'A7', 4, 2000, '2017-05-16', 200, 'img/MobilesPictures/4A7.jpg', '20 MP', '32 RAM/ 16 Storage', '3G / wifi / bluetooth', 'andriod', '1 MHZ', 'any');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `imageUrl` varchar(120) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `imageUrl`, `email`, `username`, `password`) VALUES
(2, 'Mohamed', 'Fouad', 'img/UserProfiles/DefaultUser.jpg', 'user@domin.com', 'user', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
