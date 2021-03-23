-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2021 at 10:37 AM
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
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `edu_qualification` varchar(20) NOT NULL,
  `linkedin` varchar(30) NOT NULL,
  `github` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `name`, `gender`, `email`, `contact_number`, `photo`, `about`, `address`, `edu_qualification`, `linkedin`, `github`) VALUES
(1, 'Navin Chandra', 'm', 'navinchndr@gmail.com', '8789797797', '20210317173814.png', 'whejbsdhsbdjbsj', 'wjkenkjwnekjwnk', 'higher_secondary', 'http://linkedin.com/navin', 'http://github.com/navin'),
(5, 'Rohan Naik', 'm', 'navinc@mindfire.com', '1111111111', '20210320081309.png', 'hhhhhhhhhhhhhhh', 'hhhhhhhhhhhhh', 'post_graduate', 'http://linkedin.com/navin', 'http://github.com/navin'),
(12, 'Rohan Naik', 'm', 'navinc@mindfiree.com', '1111111112', '20210320081744.png', 'hhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhh', 'post_graduate', 'http://linkedin.com/navinn', 'http://github.com/navinn'),
(29, 'John Cena', 'f', 'johncena29@gmail.com', '1234567810', '20210323093513.png', 'You cant see me.', 'You cant see my address too', 'higher_secondary', 'www.linkedin.com/johncena', 'www.github.com/johncena');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'python'),
(2, 'c++'),
(3, 'java'),
(4, 'html'),
(5, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `user_id` int NOT NULL,
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`user_id`, `skill_id`) VALUES
(1, 1),
(29, 1),
(1, 2),
(1, 3),
(29, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_number` (`contact_number`),
  ADD UNIQUE KEY `photo` (`photo`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`user_id`,`skill_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_id_resume_skill_foreign` FOREIGN KEY (`user_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
