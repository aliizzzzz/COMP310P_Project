-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2017 at 11:30 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bright_tutors`
--

CREATE DATABASE IF NOT EXISTS `bright_tutors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bright_tutors`;

-- --------------------------------------------------------

--
-- Create User: `ameghdadi`, Password: `adminalizz`
--

GRANT ALL PRIVILEGES ON bright_tutors.* To 'ameghdadi'@'localhost' IDENTIFIED BY 'adminalizz';

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `level` enum('KS1','KS2','KS3','GCSE','A-levels','') CHARACTER SET latin1 NOT NULL,
  `cost` decimal(5,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`level`, `cost`) VALUES
('KS1', '20.00'),
('KS2', '25.00'),
('KS3', '30.00'),
('GCSE', '35.00'),
('A-levels', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `teacher_id`, `course_name`) VALUES
(301, 104, 'Mathematics'),
(302, 104, 'Science'),
(303, 102, 'Music'),
(304, 103, 'History'),
(305, 103, 'Sociology'),
(306, 105, 'English'),
(307, 107, 'IT'),
(308, 106, 'Art'),
(309, 104, 'Geography');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `postcode` varchar(16) NOT NULL,
  `city` varchar(32) DEFAULT NULL,
  `street_name` varchar(32) NOT NULL,
  `house_number` varchar(32) DEFAULT NULL,
  `phone_number` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`postcode`, `city`, `street_name`, `house_number`, `phone_number`) VALUES
('N29FE', 'London', '66 Lankaster Gardens', '4', '07445269099');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `level` enum('KS1','KS2','KS3','GCSE','A-levels','') NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `course_id`, `level`, `date`) VALUES
(1, 301, 'A-levels', '2018-01-01'),
(2, 302, 'KS3', '2017-12-29'),
(3, 305, 'A-levels', '2017-12-22'),
(4, 307, 'KS2', '2018-01-10'),
(5, 306, 'GCSE', '2017-12-14'),
(6, 303, 'A-levels', '2017-12-11'),
(7, 309, 'A-levels', '2017-12-17'),
(8, 304, 'GCSE', '2017-12-16'),
(9, 301, 'KS2', '2017-12-28'),
(10, 308, 'KS3', '2017-12-24'),
(11, 308, 'A-levels', '2018-01-19'),
(12, 303, 'KS1', '2018-01-31'),
(13, 303, 'GCSE', '2018-02-15'),
(14, 302, 'A-levels', '2018-03-14'),
(15, 309, 'KS1', '2018-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `email`) VALUES
(101, 'Bruce', 'Wayne', 'bruce.wayne@gmail.com'),
(102, 'Peter', 'Parker', 'peter.parker@yahoo.com'),
(103, 'Tony', 'Stark', 'tony.stark@gmail.com'),
(104, 'Ali', 'Meghdadi', 'ali.meghdadi@gmail.com'),
(105, 'Allen', 'Walker', 'allen.walker@ymail.com'),
(106, 'Edward', 'Elrick', 'ed.el@gmail.com'),
(107, 'James', 'Gordon', 'jim.g@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `postcode` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hashed_password`, `postcode`) VALUES
(1, 'Alireza', 'Meghdadi', 'alireza.meghdadi@gmail.com', '$2y$10$rwFdyaTY5LsdYFGvhqN3zONOqBHA/ntWfJEBciqMaq.x64Oa33uxm', 'N29FE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `session_id` (`session_id`) USING BTREE;

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD UNIQUE KEY `level` (`level`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`postcode`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email`),
  ADD UNIQUE KEY `postcode` (`postcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sessions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessions_ibfk_3` FOREIGN KEY (`level`) REFERENCES `cost` (`level`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`postcode`) REFERENCES `personal_details` (`postcode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
