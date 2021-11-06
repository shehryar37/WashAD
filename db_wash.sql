-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 04:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wash`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_building` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_type` enum('W','D','B') COLLATE utf8_unicode_ci NOT NULL,
  `item_number` int(11) NOT NULL,
  `is_operational` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_building`, `item_type`, `item_number`, `is_operational`) VALUES
(1, 'A1B', 'W', 1, b'1'),
(2, 'A1B', 'W', 2, b'1'),
(3, 'A1B', 'W', 3, b'1'),
(4, 'A1B', 'W', 4, b'1'),
(5, 'A1B', 'W', 5, b'0'),
(6, 'A1B', 'W', 6, b'1'),
(7, 'A1B', 'W', 7, b'1'),
(8, 'A1B', 'W', 8, b'1'),
(9, 'A1B', 'D', 1, b'1'),
(10, 'A1B', 'D', 2, b'0'),
(11, 'A1B', 'D', 3, b'1'),
(12, 'A1B', 'D', 4, b'1'),
(13, 'A1B', 'D', 5, b'1'),
(14, 'A1B', 'D', 6, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_end` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `student_id`, `session_start`, `session_end`) VALUES
(1, 1, '2021-11-05 17:03:01', '2021-11-05 17:28:30'),
(2, 1, '2021-11-05 17:28:36', '2021-11-05 17:28:36'),
(3, 1, '2021-11-05 17:29:32', '2021-11-05 17:33:34'),
(4, 1, '2021-11-05 17:33:39', '2021-11-05 17:34:01'),
(5, 1, '2021-11-05 17:35:13', NULL),
(6, 1, '2021-11-05 17:55:50', '2021-11-05 18:07:16'),
(7, 1, '2021-11-05 18:07:28', '2021-11-05 21:35:58'),
(8, 2, '2021-11-06 03:53:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `slot_start` timestamp NULL DEFAULT NULL,
  `slot_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_booked` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `net_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `student_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `student_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `net_id`, `student_name`, `student_password`) VALUES
(1, 'sas9891', 'Shehryar Ahmed Subhani', '123'),
(2, 'asd', 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `UQ_net_id` (`net_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_ItemBookings` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `FK_StudentsBookings` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `FK_SessionStudent` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `FK_ItemsSlots` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `slot_maker` ON SCHEDULE EVERY 5 SECOND STARTS '2021-11-06 00:35:00' ON COMPLETION NOT PRESERVE DISABLE DO INSERT INTO slots(item_id, slot_start, slot_end, is_booked) VALUES(1, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), 0)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
