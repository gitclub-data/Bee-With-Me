-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2019 at 08:01 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `messanger`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `First_person` varchar(50) NOT NULL,
  `Second_person` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`First_person`, `Second_person`) VALUES
('byebaby@gmail.com', 'gaurav465@gmail.com'),
('helfkobaby@gmail.com', 'gaurav465@gmail.com'),
('byebaby@gmail.com', 'gangaprashad47@gmail.com'),
('latauu@gmail.com', 'byebaby@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `Send_by` varchar(50) NOT NULL,
  `Received_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`Send_by`, `Received_by`) VALUES
('gaurav465@gmail.com', 'hellobaby@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Combined_name` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile_Number` bigint(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Image` varchar(100) NOT NULL DEFAULT 'Bee.jpg',
  `About1` varchar(100) NOT NULL,
  `About2` varchar(100) NOT NULL,
  `About3` varchar(100) NOT NULL,
  `About4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`First_Name`, `Last_Name`, `Combined_name`, `Birthdate`, `Gender`, `Email`, `Mobile_Number`, `Password`, `Image`, `About1`, `About2`, `About3`, `About4`) VALUES
('Gaura', 'Pand', 'Gaura Pand', '1999-02-09', 'Male', 'gaurav465@gmail.com', 919012154798, 'gaurav@', '52022705', 'a', 'd', '', ''),
('ganga', 'Pandey', 'ganga Pandey', '0000-00-00', 'Male', 'hellobaby@gmail.com', 652721171278, '1234567890', '46002197', '', '', '', ''),
('Prema', 'Pandey', 'Prema Pandey', '2019-04-20', 'Female', 'byebaby@gmail.com', 41390893323, '78900987', '86522522', '', '', '', ''),
('ganga', 'sharma', 'ganga sharma', '0000-00-00', 'Male', 'helfkobaby@gmail.com', 7866833872928, '45677654', '46002197', '', '', '', ''),
('gaurav', 'juyal', 'gaurav juyal', '1998-06-24', 'Male', 'gauravjuyal48@gmail.com', 917983779776, 'juyalgaura', 'Bee.jpg', '', '', '', ''),
('lata', 'bhist', 'lata bhist', '2019-04-09', 'Male', 'latauu@gmail.com', 916578432874, 'latturemot', '70702209', '', '', '', ''),
('simran', 'chabra', 'simran chabra', '2019-04-23', 'Male', 'chabra@gmail.com', 918623891297, 'chabra@hq', 'Bee.jpg', '', '', '', ''),
('jkjbasjkbsa', 'slhlisah', 'jkjbasjkbsa slhlisah', '2019-04-23', 'Male', 'gaursav@gmail.com', 912572795312, 'gaurav@123', 'Bee.jpg', '', '', '', ''),
('ganga', 'panday', 'ganga panday', '1993-02-07', 'Male', 'gangaprashad47@gmail.com', 919911282622, '123456asd@', '52923584', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `s.no` int(250) NOT NULL AUTO_INCREMENT,
  `Send_By` varchar(50) NOT NULL,
  `Received_By` varchar(50) NOT NULL,
  `Message` varchar(200) NOT NULL,
  PRIMARY KEY (`s.no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`s.no`, `Send_By`, `Received_By`, `Message`) VALUES
(17, 'byebaby@gmail.com', 'gaurav465@gmail.com', 'hii'),
(18, 'gaurav465@gmail.com', 'byebaby@gmail.com', 'hello'),
(19, 'byebaby@gmail.com', 'gaurav465@gmail.com', 'kese ho'),
(20, 'gaurav465@gmail.com', 'byebaby@gmail.com', 'thik hu'),
(21, 'gaurav465@gmail.com', 'byebaby@gmail.com', 'pta h mujhe'),
(22, 'gaurav465@gmail.com', 'byebaby@gmail.com', 'bye'),
(23, 'gaurav465@gmail.com', 'helfkobaby@gmail.com', 'or beta'),
(24, 'gaurav465@gmail.com', 'helfkobaby@gmail.com', 'kesa  h'),
(25, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'chl'),
(26, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'nikl'),
(27, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'hat na'),
(28, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'chl na'),
(29, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'baag yrr'),
(30, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'hjkss'),
(31, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'jnnz'),
(32, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', ',m.'),
(33, 'helfkobaby@gmail.com', 'gaurav465@gmail.com', 'yaa'),
(34, 'gaurav465@gmail.com', 'helfkobaby@gmail.com', 'acha'),
(35, 'gaurav465@gmail.com', 'helfkobaby@gmail.com', 'asiii baat'),
(36, 'gaurav465@gmail.com', 'byebaby@gmail.com', 'or kesa h'),
(37, 'byebaby@gmail.com', 'gangaprashad47@gmail.com', 'hi'),
(38, 'byebaby@gmail.com', 'gangaprashad47@gmail.com', 'hii'),
(39, 'byebaby@gmail.com', 'gaurav465@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `proimage`
--

CREATE TABLE IF NOT EXISTS `proimage` (
  `Email` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proimage`
--

INSERT INTO `proimage` (`Email`, `Image`) VALUES
('gaurav465@gmail.com', '45356751'),
('gaurav465@gmail.com', '95712585'),
('gaurav465@gmail.com', '73528442'),
('gaurav465@gmail.com', '85874328'),
('gaurav465@gmail.com', '24444275'),
('gaurav465@gmail.com', '92570495'),
('gaurav465@gmail.com', '67774353'),
('gaurav465@gmail.com', '38215637'),
('gaurav465@gmail.com', '46614685'),
('gaurav465@gmail.com', '94616699'),
('gaurav465@gmail.com', '14685669'),
('gaurav465@gmail.com', '36361695'),
('gaurav465@gmail.com', '46002197'),
('gaurav465@gmail.com', '88469848'),
('gaurav465@gmail.com', '59281921'),
('gaurav465@gmail.com', '86083069'),
('gangaprashad47@gmail.com', '64797058'),
('gaurav465@gmail.com', '52022705'),
('byebaby@gmail.com', '86522522'),
('gangaprashad47@gmail.com', '52923584'),
('latauu@gmail.com', '70702209');
