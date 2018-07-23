-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2015 at 03:29 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlinefinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(10) NOT NULL,
  `Admin_name` varchar(20) NOT NULL,
  `Admin_password` varchar(10) NOT NULL,
  `Question` text NOT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `airbus`
--

CREATE TABLE IF NOT EXISTS `airbus` (
  `Airbus_no` int(10) NOT NULL,
  `Economy_capacity` int(10) NOT NULL,
  `First_capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `airport detail`
--

CREATE TABLE IF NOT EXISTS `airport detail` (
  `Airport_id` int(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Airport_Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cancelation_detail`
--

CREATE TABLE IF NOT EXISTS `cancelation_detail` (
  `Pass_id` int(50) NOT NULL,
  `Pass_tno` int(50) NOT NULL,
  `Flight_no` int(10) NOT NULL,
  `Seat_no` int(10) NOT NULL,
  `Cancel_date` datetime(6) NOT NULL,
  `Cancel_charge` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fare_discount_detail`
--

CREATE TABLE IF NOT EXISTS `fare_discount_detail` (
  `Fare_disId` int(50) NOT NULL,
  `Economy_adults` int(10) NOT NULL,
  `Economy_senior` int(10) NOT NULL,
  `Economy_children12-17` int(10) NOT NULL,
  `Economy_children5-11` int(10) NOT NULL,
  `Economy_children24` int(10) NOT NULL,
  `First_adults` int(10) NOT NULL,
  `First_seniors` int(10) NOT NULL,
  `First_children12-17` int(10) NOT NULL,
  `First_children5-11` int(10) NOT NULL,
  `First_children24` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_schedule`
--

CREATE TABLE IF NOT EXISTS `flight_schedule` (
  `Flight_no` int(10) NOT NULL,
  `Airbus_no` int(10) NOT NULL,
  `Route_description` text NOT NULL,
  `Depart_date` datetime(6) NOT NULL,
  `Depart_time` datetime(6) NOT NULL,
  `Journey_hour` int(10) NOT NULL,
  `Fare_economy` text NOT NULL,
  `Fare_first` text NOT NULL,
  `Economy_booked` int(10) DEFAULT NULL,
  `First_booked` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_fare_master`
--

CREATE TABLE IF NOT EXISTS `passenger_fare_master` (
  `Pasfare_id` int(50) NOT NULL,
  `Pass_id` int(50) NOT NULL,
  `Creditcard_no` int(30) NOT NULL,
  `Card_password` int(10) NOT NULL,
  `Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`fname`, `lname`, `username`, `password`, `email`, `mobile`, `uid`) VALUES
('Yash', 'Panchal', 'yash00977', '123', 'ypatel@gmail.com ', 2147483647, 1),
('Yash', 'Panchal', 'yash00977', '12345', 'ypatel@gmail.com ', 999999999, 2);

-- --------------------------------------------------------

--
-- Table structure for table `traveler_detail`
--

CREATE TABLE IF NOT EXISTS `traveler_detail` (
  `Pass_id` int(10) NOT NULL,
  `Pass_name` varchar(50) NOT NULL,
  `Pass_city` varchar(50) NOT NULL,
  `Pass_pin` int(10) NOT NULL,
  `Pass_tno` int(50) NOT NULL,
  `Pass_email` varchar(50) NOT NULL,
  `FIight_no` int(10) NOT NULL,
  `Class` varchar(50) NOT NULL,
  `From name` varchar(50) NOT NULL,
  `Depart_date` datetime(6) NOT NULL,
  `Depart_time` datetime(6) NOT NULL,
  `Toname` varchar(50) NOT NULL,
  `Seat_no` int(10) NOT NULL,
  `Login_name` int(10) NOT NULL,
  `Password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `airbus`
--
ALTER TABLE `airbus`
  ADD PRIMARY KEY (`Airbus_no`);

--
-- Indexes for table `airport detail`
--
ALTER TABLE `airport detail`
  ADD PRIMARY KEY (`Airport_id`);

--
-- Indexes for table `cancelation_detail`
--
ALTER TABLE `cancelation_detail`
  ADD PRIMARY KEY (`Pass_id`);

--
-- Indexes for table `fare_discount_detail`
--
ALTER TABLE `fare_discount_detail`
  ADD PRIMARY KEY (`Fare_disId`);

--
-- Indexes for table `flight_schedule`
--
ALTER TABLE `flight_schedule`
  ADD PRIMARY KEY (`Flight_no`);

--
-- Indexes for table `passenger_fare_master`
--
ALTER TABLE `passenger_fare_master`
  ADD PRIMARY KEY (`Pasfare_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `traveler_detail`
--
ALTER TABLE `traveler_detail`
  ADD PRIMARY KEY (`Pass_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
