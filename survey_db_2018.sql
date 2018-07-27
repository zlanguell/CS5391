-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2018 at 12:39 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_inc_test`
--
CREATE DATABASE IF NOT EXISTS `survey_db_2018` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `survey_db_2018`;

-- --------------------------------------------------------

--
-- Table structure for table `airbus`
--

CREATE TABLE `airbus` (
  `airbus_id` int(6) NOT NULL,
  `capacity_eco` int(3) NOT NULL,
  `capacity_first` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airbus`
--

INSERT INTO `airbus` (`airbus_id`, `capacity_eco`, `capacity_first`) VALUES
(737, 144, 16),
(757, 179, 20),
(767, 175, 36);

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `airline_id` int(10) NOT NULL,
  `airline_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`) VALUES
(1, 'Delta'),
(2, 'United'),
(3, 'Southwest'),
(4, 'Frontier');

-- --------------------------------------------------------

--
-- Table structure for table `airport_detail`
--

CREATE TABLE `airport_detail` (
  `airport_id` varchar(3) NOT NULL,
  `city` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport_detail`
--

INSERT INTO `airport_detail` (`airport_id`, `city`, `name`) VALUES
('AUS', 'Austin', 'Austin Bergstrom International'),
('HNL', 'Honolulu', 'Daniel K. Inouye International'),
('IAD', 'Washington D.C.', 'Washington Dulles International'),
('IAH', 'Houston', 'Bush Intercontinental'),
('JFK', 'New York', 'John F. Kennedy International '),
('LAS', 'Las Vegas', 'McCarran International'),
('LAX', 'Los Angeles', 'Los Angeles International'),
('MDW', 'Chicago', 'Midway International'),
('PDX', 'Portland', 'Portland International'),
('TPA', 'Tampa', 'Tampa International');

-- --------------------------------------------------------

--
-- Table structure for table `cabin_type`
--

CREATE TABLE `cabin_type` (
  `cabin_type_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabin_type`
--

INSERT INTO `cabin_type` (`cabin_type_id`) VALUES
('economy'),
('first');

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `creditcard` varchar(19) NOT NULL,
  `CVC` int(3) NOT NULL,
  `Exp_date` varchar(5) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`creditcard`, `CVC`, `Exp_date`, `user_id`) VALUES
('0000-0000-0000-0000', 111, '02/25', 'estewart');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `deal_id` int(10) NOT NULL,
  `hotel_avail_id` int(10) DEFAULT NULL,
  `flight_id` int(10) DEFAULT NULL,
  `price` int(6) NOT NULL,
  `begin_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_days` int(11) NOT NULL,
  `dept_airport` varchar(3) DEFAULT NULL,
  `arr_airport` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `hotel_avail_id`, `flight_id`, `price`, `begin_date`, `end_date`, `total_days`, `dept_airport`, `arr_airport`) VALUES
(1, 5, 4, 2000, '2018-08-01', '2018-10-31', 7, 'IAH', 'HNL'),
(2, 1, 7, 600, '2018-10-01', '2018-12-31', 3, 'LAS', 'AUS');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `comments` text,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `comments`, `rating`) VALUES
(1, 'estewart', 'This website is awesome!', 10);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(10) NOT NULL,
  `flight_no` int(10) NOT NULL,
  `airbus_id` int(10) NOT NULL,
  `route_desc` text NOT NULL,
  `dept_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `dept_time` time NOT NULL,
  `return_dept_time` time DEFAULT NULL,
  `journey_hr` int(6) NOT NULL,
  `cabin_type` varchar(10) NOT NULL,
  `fare_dollars` int(10) NOT NULL,
  `fare_mileage` int(10) NOT NULL,
  `dept_airport` varchar(3) NOT NULL,
  `arr_airport` varchar(3) NOT NULL,
  `distance` int(6) NOT NULL,
  `airline_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `flight_no`, `airbus_id`, `route_desc`, `dept_date`, `return_date`, `dept_time`, `return_dept_time`, `journey_hr`, `cabin_type`, `fare_dollars`, `fare_mileage`, `dept_airport`, `arr_airport`, `distance`, `airline_id`) VALUES
(1, 251, 737, 'Non-stop from Austin to Houston. One Way.', '2018-08-23', NULL, '07:00:00', NULL, 1, 'economy', 250, 5000, 'AUS', 'IAH', 200, 1),
(2, 554, 757, 'Non-Stop from Los Angeles to Honolulu. Roundtrip.', '2018-09-21', '2018-10-01', '12:00:00', '08:00:00', 10, 'economy', 600, 15000, 'LAX', 'HNL', 5098, 2),
(3, 554, 757, 'Non-Stop from Los Angeles to Honolulu. Roundtrip.', '2018-09-21', '2018-10-01', '12:00:00', '08:00:00', 10, 'first', 1200, 30000, 'LAX', 'HNL', 5098, 2),
(4, 655, 767, '1 Stop. Houston to Las Angeles to Honolulu. One Way.', '2018-10-19', NULL, '14:00:00', NULL, 12, 'economy', 900, 30000, 'IAH', 'HNL', 3950, 2),
(5, 655, 767, '1 Stop. Houston to Las Angeles to Honolulu. One Way.', '2018-10-19', NULL, '14:00:00', NULL, 12, 'first', 1800, 60000, 'IAH', 'HNL', 3950, 2),
(6, 234, 737, 'Non-stop Austin to Las Vegas. Roundtrip', '2018-08-30', '2018-09-02', '05:00:00', '12:00:00', 6, 'economy', 250, 5000, 'AUS', 'LAS', 2800, 3),
(7, 236, 737, 'Nonstop. Las Vegas to Austin. One Way.', '2018-08-18', NULL, '15:06:00', NULL, 6, 'economy', 250, 5000, 'LAS', 'AUS', 1400, 3),
(8, 661, 767, '1 Stop. Houston to Las Angeles to Honolulu. Round Trip.', '2018-10-19', '2018-10-25', '14:00:00', '09:00:00', 24, 'economy', 1500, 55000, 'IAH', 'HNL', 7900, 2),
(9, 661, 767, '1 Stop. Houston to Las Angeles to Honolulu. Round Trip.', '2018-12-07', '2018-12-13', '09:00:00', '12:00:00', 24, 'economy', 1500, 55000, 'IAH', 'HNL', 7900, 2),
(10, 231, 737, 'Nonstop. Las Vegas to Austin. Round Trip.', '2018-10-01', '2018-10-04', '15:06:00', '08:04:00', 6, 'economy', 500, 10000, 'LAS', 'AUS', 2800, 1),
(11, 230, 737, 'Nonstop. Las Vegas to Austin. Round Trip.', '2018-11-12', '2018-11-15', '09:06:00', '17:04:00', 6, 'economy', 500, 10000, 'LAS', 'AUS', 2800, 4);

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

CREATE TABLE `flight_booking` (
  `fbook_id` int(10) NOT NULL,
  `flight_id` int(5) NOT NULL,
  `trans_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_booking`
--

INSERT INTO `flight_booking` (`fbook_id`, `flight_id`, `trans_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flight_transacations`
--

CREATE TABLE `flight_transacations` (
  `trans_id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `creditcard` varchar(19) NOT NULL,
  `amount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_transacations`
--

INSERT INTO `flight_transacations` (`trans_id`, `user_id`, `creditcard`, `amount`) VALUES
(1, 'estewart', '0000-0000-0000-0000', 600);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `capacity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `name`, `address`, `phone`, `capacity`) VALUES
(1, 'Holiday Inn', 'Austin, TX', '512-123-4567', 500),
(2, 'Hilton', 'Houston, TX', '713-724-5555', 600),
(3, 'Mandalay Bay', 'Las Vegas, NV', '702-565-9871', 1000),
(4, 'MGM Grand', 'Las Vegas, NV', '702-336-2541', 1200),
(5, 'Motel 6', 'Tampa, FL', '813-623-6987', 250),
(6, 'W', 'Los Angeles, CA', '213-952-6541', 450),
(7, 'Best Western', 'Honolulu, HI', '965-321-5422', 550);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_availibility`
--

CREATE TABLE `hotel_availibility` (
  `hotel_avail_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_availibility`
--

INSERT INTO `hotel_availibility` (`hotel_avail_id`, `hotel_id`, `room_id`, `price`) VALUES
(1, 1, '2-Queen', 175),
(2, 2, '1-King', 150),
(3, 3, '2-Full', 140),
(4, 4, '1-Queen', 125),
(5, 7, '1-Queen', 225);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `hbook_id` int(10) NOT NULL,
  `htrans_id` int(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_bookings`
--

INSERT INTO `hotel_bookings` (`hbook_id`, `htrans_id`, `check_in`, `check_out`) VALUES
(1, 1, '2018-09-21', '2018-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_transactions`
--

CREATE TABLE `hotel_transactions` (
  `htrans_id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `creditcard` varchar(19) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_transactions`
--

INSERT INTO `hotel_transactions` (`htrans_id`, `user_id`, `creditcard`, `amount`) VALUES
(1, 'estewart', '0000-0000-0000-0000', 200);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`) VALUES
('1-King'),
('1-Queen'),
('2-Full'),
('2-Queen');

-- --------------------------------------------------------

--
-- Table structure for table `seats_avail`
--

CREATE TABLE `seats_avail` (
  `seats_avail_id` int(10) NOT NULL,
  `flight_id` int(10) NOT NULL,
  `eco_seats_remaining` int(11) NOT NULL,
  `first_seats_remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats_avail`
--

INSERT INTO `seats_avail` (`seats_avail_id`, `flight_id`, `eco_seats_remaining`, `first_seats_remaining`) VALUES
(1, 1, 42, 0),
(2, 2, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trips_id` int(10) NOT NULL,
  `hbook_id` int(10) DEFAULT NULL,
  `fbook_id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trips_id`, `hbook_id`, `fbook_id`, `user_id`) VALUES
(1, NULL, 1, 'estewart');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `mileage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `user_id`, `email`, `phone`, `mileage`) VALUES
('Ethan', 'Stewart', 'estewart', 'estewart08@gmail.com', '512-999-9999', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airbus`
--
ALTER TABLE `airbus`
  ADD PRIMARY KEY (`airbus_id`);

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `airport_detail`
--
ALTER TABLE `airport_detail`
  ADD PRIMARY KEY (`airport_id`);

--
-- Indexes for table `cabin_type`
--
ALTER TABLE `cabin_type`
  ADD PRIMARY KEY (`cabin_type_id`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`creditcard`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `hotel_avail_id` (`hotel_avail_id`),
  ADD KEY `arr_airport` (`arr_airport`),
  ADD KEY `dept_airpot` (`dept_airport`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `cabin_type` (`cabin_type`),
  ADD KEY `depart_airport` (`dept_airport`),
  ADD KEY `arr_airport` (`arr_airport`),
  ADD KEY `airline_id` (`airline_id`),
  ADD KEY `airbus_id` (`airbus_id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`fbook_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `flight_transacations`
--
ALTER TABLE `flight_transacations`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `creditcard` (`creditcard`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_availibility`
--
ALTER TABLE `hotel_availibility`
  ADD PRIMARY KEY (`hotel_avail_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`hbook_id`),
  ADD KEY `htrans_id` (`htrans_id`);

--
-- Indexes for table `hotel_transactions`
--
ALTER TABLE `hotel_transactions`
  ADD PRIMARY KEY (`htrans_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `seats_avail`
--
ALTER TABLE `seats_avail`
  ADD PRIMARY KEY (`seats_avail_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trips_id`),
  ADD KEY `hbook_id` (`hbook_id`),
  ADD KEY `fbook_id` (`fbook_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `airline_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `fbook_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight_transacations`
--
ALTER TABLE `flight_transacations`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel_availibility`
--
ALTER TABLE `hotel_availibility`
  MODIFY `hotel_avail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `hbook_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_transactions`
--
ALTER TABLE `hotel_transactions`
  MODIFY `htrans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seats_avail`
--
ALTER TABLE `seats_avail`
  MODIFY `seats_avail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trips_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`arr_airport`) REFERENCES `airport_detail` (`airport_id`),
  ADD CONSTRAINT `deals_ibfk_2` FOREIGN KEY (`dept_airport`) REFERENCES `airport_detail` (`airport_id`),
  ADD CONSTRAINT `deals_ibfk_3` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `deals_ibfk_4` FOREIGN KEY (`hotel_avail_id`) REFERENCES `hotel_availibility` (`hotel_avail_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`cabin_type`) REFERENCES `cabin_type` (`cabin_type_id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`dept_airport`) REFERENCES `airport_detail` (`airport_id`),
  ADD CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`arr_airport`) REFERENCES `airport_detail` (`airport_id`),
  ADD CONSTRAINT `flights_ibfk_4` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`airline_id`),
  ADD CONSTRAINT `flights_ibfk_5` FOREIGN KEY (`airbus_id`) REFERENCES `airbus` (`airbus_id`);

--
-- Constraints for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD CONSTRAINT `flight_booking_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `flight_booking_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `flight_transacations` (`trans_id`);

--
-- Constraints for table `flight_transacations`
--
ALTER TABLE `flight_transacations`
  ADD CONSTRAINT `flight_transacations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `flight_transacations_ibfk_3` FOREIGN KEY (`creditcard`) REFERENCES `creditcard` (`creditcard`);

--
-- Constraints for table `hotel_availibility`
--
ALTER TABLE `hotel_availibility`
  ADD CONSTRAINT `hotel_availibility_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `hotel_bookings_ibfk_1` FOREIGN KEY (`htrans_id`) REFERENCES `hotel_transactions` (`htrans_id`);

--
-- Constraints for table `hotel_transactions`
--
ALTER TABLE `hotel_transactions`
  ADD CONSTRAINT `hotel_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `seats_avail`
--
ALTER TABLE `seats_avail`
  ADD CONSTRAINT `seats_avail_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`fbook_id`) REFERENCES `flight_booking` (`fbook_id`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`hbook_id`) REFERENCES `hotel_bookings` (`hbook_id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
