-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2017 at 07:14 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `topic_id`, `set_id`, `question`, `is_deleted`) VALUES
(1, 3, 1, 'How strongly do you agree with newtons 1st law?', 0),
(2, 3, 1, 'How strongly do you agree with newtons 2nd law?', 0),
(3, 3, 1, 'How strongly do you agree with newtons 3rd law?', 0),
(4, 3, 1, 'How strongly do you agree with newtons nth law?', 0),
(5, 1, 1, 'How much do you like apple?', 0),
(6, 1, 1, 'How much do you like chickoo?', 0),
(7, 1, 1, 'How much do you like banana?', 0),
(8, 1, 1, 'How much do you like chickoo?', 0),
(9, 2, 1, 'How good is H2SO4?', 0),
(10, 2, 1, 'How good is O3?', 0),
(11, 2, 1, 'How good is CO2?', 0),
(12, 2, 1, 'How good is H2O?', 0),
(13, 4, 1, 'How good is flower1?', 0),
(14, 4, 1, 'How good is flower2?', 0),
(15, 4, 1, 'How good is flower3?', 0),
(16, 4, 1, 'How good is flower4?', 0),
(17, 1, 2, 'How much do you like kidney?', 0),
(18, 1, 2, 'How much do you like eyes?', 0),
(19, 1, 2, 'How much do you like liver?', 0),
(20, 1, 2, 'How much do you like heart?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `response_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `set_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `response` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`response_id`, `survey_id`, `date`, `set_id`, `topic_id`, `question_id`, `response`) VALUES
(1, 3, '2017-06-06 12:58:18', 1, 1, 5, 1),
(2, 3, '2017-06-06 12:58:18', 1, 1, 6, 2),
(3, 3, '2017-06-06 12:58:18', 1, 1, 7, 3),
(4, 3, '2017-06-06 12:58:18', 1, 1, 8, 4),
(5, 4, '2017-06-06 12:59:48', 2, 1, 17, 5),
(6, 4, '2017-06-06 12:59:48', 2, 1, 18, 5),
(7, 4, '2017-06-06 12:59:48', 2, 1, 19, 4),
(8, 4, '2017-06-06 12:59:48', 2, 1, 20, 5),
(9, 5, '2017-06-06 13:05:19', 1, 2, 9, 2),
(10, 5, '2017-06-06 13:05:19', 1, 2, 10, 3),
(11, 5, '2017-06-06 13:05:19', 1, 2, 11, 4),
(12, 5, '2017-06-06 13:05:19', 1, 2, 12, 5),
(13, 6, '2017-06-06 13:25:13', 1, 1, 5, 5),
(14, 6, '2017-06-06 13:25:13', 1, 1, 6, 2),
(15, 6, '2017-06-06 13:25:13', 1, 1, 7, 3),
(16, 6, '2017-06-06 13:25:13', 1, 1, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `is_deleted`) VALUES
(3, 0),
(4, 0),
(5, 0),
(6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(20) NOT NULL,
  `current_set_id` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `current_set_id`, `is_deleted`) VALUES
(1, 'Biology', 3, 0),
(2, 'Chemistry', 2, 0),
(3, 'Physics', 2, 0),
(4, 'Botony', 2, 0),
(5, 'Zoology', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
