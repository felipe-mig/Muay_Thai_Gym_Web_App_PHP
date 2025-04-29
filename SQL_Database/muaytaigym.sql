-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 01:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muaytaigym`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(200) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `day`, `time`) VALUES
(1, 'boxeo', 'martedi', '21:34'),
(6, 'Thai', 'Monday', '20:30'),
(10, 'yoga', 'sunday', '23:43'),
(11, 'futbol', 'saturday', '21:34'),
(13, 'crossfit4', 'sabado', '05:04'),
(17, 'hiit', 'wedneday', '08:00');

-- --------------------------------------------------------

--
-- Table structure for table `member_to_routine`
--

CREATE TABLE `member_to_routine` (
  `id` int(10) NOT NULL,
  `memberid` varchar(10) NOT NULL,
  `exerciseid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(10) NOT NULL,
  `exercise` varchar(100) NOT NULL DEFAULT '',
  `equipment` varchar(100) NOT NULL,
  `series` varchar(100) NOT NULL,
  `reps` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `exercise`, `equipment`, `series`, `reps`) VALUES
(21, 'Dumbbell bench press', 'Bench, dumbbells', '3', '8 ,10,12'),
(25, 'streching', 'mat', '20 on - 10 off', '4');

-- --------------------------------------------------------

--
-- Table structure for table `stafftomembers`
--

CREATE TABLE `stafftomembers` (
  `id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stafftomembers`
--

INSERT INTO `stafftomembers` (`id`, `staffid`, `memberid`) VALUES
(15, 3, 6),
(36, 25, 12);

-- --------------------------------------------------------

--
-- Table structure for table `staff_to_class`
--

CREATE TABLE `staff_to_class` (
  `id` int(200) NOT NULL,
  `staffid` int(200) NOT NULL,
  `class_nameid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_to_routine`
--

CREATE TABLE `staff_to_routine` (
  `id` int(10) NOT NULL,
  `staffid` varchar(10) NOT NULL,
  `exerciseid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `position`) VALUES
(97, 'arnold', '$2y$10$7cr38FAL9yNEi6GBjDhIxejN.mqkWEHPf5JxW5GuYAIFXS0wNpPRO', 'staff'),
(98, 'sara', '$2y$10$.3evWF9DL0XGq7D2lXAoyeuQy7LW590xWRpsQEyETJ4hyE71W2aX6', 'staff'),
(99, 'rukua', '$2y$10$jWxxTIDLPHWD75TyROezKuACzOnLMkZDxZUCdML4OT78iE0noqYVG', 'staff'),
(101, 'chris', '$2y$10$1JE3rIASeYTszayXQ/ZOFeM7byi6LgQuVVt9iIzWpbG7.Df5JJfmO', 'member'),
(102, 'jill', '$2y$10$Zf4yOD32ejY.BEjphXRoB.YJzEBlOS8WYHmOgDtQOq5Qkoi67Cam2', 'member'),
(103, 'rebecca', '$2y$10$9BrjnohU/DpqR9poS2QvbO/2SrqxcUHkqBb6wU/87hNiaXkDmURz6', 'member'),
(106, 'sean', '$2y$10$UkBs7fM4lgp7393w4WZn/.7S0Col1Co3Fh/XlM9KfvAySC2CQOLwa', 'admin'),
(107, 'admin', '$2y$10$ZplBceZUDvtdXhbm1duuyeyE.uuPSa7LH6yZxGEmNL7PXDnEC6vUW', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_to_routine`
--
ALTER TABLE `member_to_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafftomembers`
--
ALTER TABLE `stafftomembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_to_class`
--
ALTER TABLE `staff_to_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_to_routine`
--
ALTER TABLE `staff_to_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `member_to_routine`
--
ALTER TABLE `member_to_routine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stafftomembers`
--
ALTER TABLE `stafftomembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `staff_to_class`
--
ALTER TABLE `staff_to_class`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff_to_routine`
--
ALTER TABLE `staff_to_routine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
