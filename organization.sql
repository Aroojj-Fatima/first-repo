-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 02:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organization`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(3) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `type` varchar(5) NOT NULL,
  `job_description` varchar(50) NOT NULL,
  `keywords` varchar(10) NOT NULL,
  `distance` varchar(10) NOT NULL,
  `office` varchar(10) NOT NULL,
  `job_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `status`, `shift`, `type`, `job_description`, `keywords`, `distance`, `office`, `job_id`) VALUES
(1, 'Smith', 'Active', 'Day', 'Temp', 'Good ', 'Hello', '5 Miles', 'North', 1),
(10, 'Adam', 'Inactive', 'Night', 'Perm', 'Excellent', '12345', '10 Miles', 'South', 1),
(11, 'Jenny', 'Inactive', 'Both', 'Perm', 'Very Good', 'abcde', '15 Miles', 'South', 1),
(12, 'Saba', 'Active', 'Both', 'Perm', 'Very Good', 'Xyz', '10 Miles', 'North', 1),
(15, 'Maryam', 'Active', 'Day', 'Perm', 'Excellent', '98765', '5 Miles', 'North', 2),
(16, 'Shaista', 'Active', 'Day', 'Temp', 'Good ', 'Hello', '15 Miles', 'South', 2),
(17, 'Rabia', 'Active', 'Night', 'Temp', 'Good ', 'Hello', '5 Miles', 'North', 3);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(5) NOT NULL,
  `job_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(1, 'Catering'),
(2, 'Driving'),
(3, 'Education'),
(4, 'Warehouse');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(5) NOT NULL,
  `job_id` int(5) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `job_id`, `role_name`) VALUES
(1, 1, 'CDP'),
(2, 1, 'Chef'),
(3, 1, 'Head Chef'),
(4, 1, 'Sous Chef'),
(5, 2, 'Driver'),
(6, 2, 'Mechanic'),
(7, 2, 'Conductor'),
(8, 2, 'Passenger'),
(9, 3, 'Behavior Specialist'),
(10, 3, 'Teacher'),
(11, 3, 'Teacher Assistant'),
(12, 3, 'Tutor'),
(13, 4, 'Machine Opertaor'),
(14, 4, 'Manager'),
(15, 4, 'Clerk'),
(16, 4, 'Material Handler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `empforeign` (`job_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `roleforeign` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `empforeign` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roleforeign` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
