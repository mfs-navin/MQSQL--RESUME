-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2021 at 08:26 AM
-- Server version: 8.0.23
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `resume_data`
--

CREATE TABLE `resume_data` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `edu_qualification` varchar(20) NOT NULL,
  `linkedin` varchar(30) NOT NULL,
  `github` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resume_data`
--

INSERT INTO `resume_data` (`id`, `name`, `gender`, `email`, `contact_number`, `skills`, `photo`, `about`, `address`, `edu_qualification`, `linkedin`, `github`) VALUES
(1, 'Navin Chandra', 'm', 'navinchndr@gmail.com', '8789797797', '', '20210317173814.png', 'whejbsdhsbdjbsj', 'wjkenkjwnekjwnk', 'higher_secondary', 'http://linkedin.com/navin', 'http://github.com/navin'),
(4, 'Navin Chandra', 'f', 'navinc@mindfiresolutions.com', '1234567891', '', '20210317174911.png', '2nd about ', 'second address', 'higher_secondary', 'http://linkedin.com/navin', 'http://github.com/navin'),
(5, 'Rohan Naik', 'm', 'navinc@mindfire.com', '1111111111', '4', '20210320081309.png', 'hhhhhhhhhhhhhhh', 'hhhhhhhhhhhhh', 'post_graduate', 'http://linkedin.com/navin', 'http://github.com/navin'),
(12, 'Rohan Naik', 'm', 'navinc@mindfiree.com', '1111111112', 'c++, java, python, html, ', '20210320081744.png', 'hhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhh', 'post_graduate', 'http://linkedin.com/navinn', 'http://github.com/navinn');

-- --------------------------------------------------------

--
-- Table structure for table `resume_data_user_skills`
--

CREATE TABLE `resume_data_user_skills` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resume_data_user_skills`
--

INSERT INTO `resume_data_user_skills` (`id`, `user_id`, `skill_id`) VALUES
(19, 1, 1),
(20, 1, 2),
(21, 1, 3),
(22, 4, 4),
(23, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int NOT NULL,
  `skills` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `skills`) VALUES
(1, 'python'),
(2, 'c++'),
(3, 'java'),
(4, 'c++'),
(5, 'php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resume_data`
--
ALTER TABLE `resume_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_number` (`contact_number`),
  ADD UNIQUE KEY `photo` (`photo`);

--
-- Indexes for table `resume_data_user_skills`
--
ALTER TABLE `resume_data_user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_resume_skill_foreign` (`user_id`),
  ADD KEY `skill_id_user_skills_id` (`skill_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resume_data`
--
ALTER TABLE `resume_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `resume_data_user_skills`
--
ALTER TABLE `resume_data_user_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
