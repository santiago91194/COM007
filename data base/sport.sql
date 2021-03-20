-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 09:21 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE IF NOT EXISTS `available` (
  `id` int(10) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `m_available` varchar(100) NOT NULL,
  `t_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`id`, `u_name`, `p_type`, `m_available`, `t_name`) VALUES
(2, 'gudu', 'football', 'pak vs ind 3', 'Football Worldcup 2021'),
(3, 'gudu', 'football', 'pak vs ind 1', 'Football Worldcup 2021'),
(4, 'arslan', 'football', 'pak vs ind 1', 'Football Worldcup 2021'),
(6, 'adam', 'Tennis', 'pak vs ind 1', 'Tennis World Cup 2021'),
(7, 'adam', 'Tennis', 'aus vs ind 1', 'Football Worldcup 2021'),
(8, 'gudu', 'football', 'aus vs ind 1', 'Football Worldcup 2021');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `id` int(10) NOT NULL,
  `t_id` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `team` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `t_id`, `m_name`, `date`, `time`, `t_type`, `team`) VALUES
(45, 'Football Worldcup 2021', 'aus vs ind 1', '2021-03-22', '22:00', '', 'adam,gudu'),
(49, 'Tennis World Cup 2021', 'pak vs ind 1', '2021-03-17', '15:33', '', 'adam');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `u_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `f_name`, `l_name`, `u_name`, `email`, `password`, `p_type`, `u_type`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 'admin'),
(2, 'gudu', 'qureshi', 'gudu', 'gudu@gmail.com', 'gudu', 'football', 'player'),
(3, 'adam', 'adam', 'adam', 'adam@yahoo.com', 'adam', 'Tennis', 'player');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(10) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `winner_team` varchar(100) NOT NULL,
  `winner_team_score` varchar(100) NOT NULL,
  `looser_team` varchar(100) NOT NULL,
  `looser_team_score` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `t_name`, `m_name`, `winner_team`, `winner_team_score`, `looser_team`, `looser_team_score`) VALUES
(2, 'Tennis World Cup 2021', 'pak vs ind 1', 'pak', '2', 'ind', '1'),
(3, 'Football Worldcup 2021', 'aus vs ind 1', 'aus', '3', 'ind', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
  `id` int(10) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `d_from` varchar(100) NOT NULL,
  `d_to` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `t_name`, `d_from`, `d_to`, `t_type`) VALUES
(15, 'Football Worldcup 2021', '2021-03-19', '2021-04-01', ''),
(16, 'Tennis World Cup 2021', '2021-03-15', '2021-03-26', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
