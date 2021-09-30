-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2021 at 10:58 PM
-- Server version: 5.6.51
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samacha2_bbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `practical_event_dates`
--

CREATE TABLE `practical_event_dates` (
  `id` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `eventDate` date NOT NULL,
  `status` int(11) NOT NULL,
  `eventDay` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practical_event_dates`
--

INSERT INTO `practical_event_dates` (`id`, `eventId`, `eventDate`, `status`, `eventDay`) VALUES
(48, 21, '2021-09-11', 1, 'Sat'),
(47, 21, '2021-09-10', 1, 'Fri'),
(46, 21, '2021-09-09', 1, 'Thu'),
(45, 21, '2021-09-08', 1, 'Wed'),
(44, 21, '2021-09-07', 1, 'Tue'),
(43, 21, '2021-09-06', 1, 'Mon'),
(42, 21, '2021-09-05', 1, 'Sun'),
(41, 21, '2021-09-04', 1, 'Sat'),
(40, 21, '2021-09-03', 1, 'Fri'),
(39, 21, '2021-09-02', 1, 'Thu'),
(68, 22, '2021-09-16', 1, 'Thu'),
(67, 22, '2021-09-15', 1, 'Wed'),
(66, 22, '2021-09-14', 1, 'Tue'),
(65, 22, '2021-09-13', 1, 'Mon'),
(64, 22, '2021-09-12', 1, 'Sun'),
(63, 22, '2021-09-11', 1, 'Sat'),
(62, 22, '2021-09-10', 1, 'Fri'),
(61, 22, '2021-09-09', 1, 'Thu'),
(60, 22, '2021-09-08', 1, 'Wed'),
(59, 22, '2021-09-07', 1, 'Tue'),
(58, 22, '2021-09-06', 1, 'Mon'),
(57, 22, '2021-09-05', 1, 'Sun'),
(56, 22, '2021-09-04', 1, 'Sat'),
(55, 22, '2021-09-03', 1, 'Fri'),
(54, 22, '2021-09-02', 1, 'Thu'),
(49, 21, '2021-09-12', 1, 'Sun'),
(50, 21, '2021-09-13', 1, 'Mon'),
(51, 21, '2021-09-14', 1, 'Tue'),
(52, 21, '2021-09-15', 1, 'Wed'),
(53, 21, '2021-09-16', 1, 'Thu');

-- --------------------------------------------------------

--
-- Table structure for table `practical_event_list`
--

CREATE TABLE `practical_event_list` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `repeatEvery` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `numberofreapet` int(11) NOT NULL,
  `repeaton` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practical_event_list`
--

INSERT INTO `practical_event_list` (`id`, `title`, `startDate`, `endDate`, `repeatEvery`, `status`, `numberofreapet`, `repeaton`) VALUES
(22, 'day test', '2021-09-01', '2021-09-15', '1', 1, 1, '0'),
(21, 'day test', '2021-09-01', '2021-09-15', '1', 1, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `practical_event_dates`
--
ALTER TABLE `practical_event_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical_event_list`
--
ALTER TABLE `practical_event_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `practical_event_dates`
--
ALTER TABLE `practical_event_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `practical_event_list`
--
ALTER TABLE `practical_event_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
