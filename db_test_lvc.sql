-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2018 at 04:05 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test_lvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `name`, `status`) VALUES
('6039010001', '30/07/39', 'นายวรศิษฏ์ ภู่สุวรรณ์', 'student'),
('6039010002', '12345678', 'จิตรานุช นวลสาย', 'student'),
('root', '12345678', 'pin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id_score` int(5) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `correct` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id_score`, `name`, `correct`) VALUES
(1, 'aaaa', 1),
(2, '', 2),
(3, 'dddd', 0),
(4, 'gggg', 1),
(5, 'kkk', 2),
(55, 'gggggggggg', 1),
(80, 'Vorasit Phusuwan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(3) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `choice1` text COLLATE utf8_unicode_ci NOT NULL,
  `choice2` text COLLATE utf8_unicode_ci NOT NULL,
  `choice3` text COLLATE utf8_unicode_ci NOT NULL,
  `choice4` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES
(1, 'php คืออะไร', 'ภาษาคอม', 'ไก', 'หมู', 'นก', 1),
(2, 'python', 'dddd', 'gggg', 'qqqq', 'program', 4),
(3, 'what is the java?', 'food', 'language program', 'program', 'coffee', 2),
(4, 'android', 'phone', 'fish', 'snake', 'food', 1),
(5, 'what is the pycharm', 'cook', 'language program', 'program', 'coffee', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
