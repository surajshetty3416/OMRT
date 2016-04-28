-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 08:26 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `omrtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `omrtdb`
--

CREATE TABLE IF NOT EXISTS `omrtdb` (
  `uid` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `accesslevel` int(1) NOT NULL DEFAULT '0',
  `regdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `omrtdb`
--

INSERT INTO `omrtdb` (`uid`, `username`, `password`, `accesslevel`, `regdatetime`) VALUES
('123', '123', '123', 0, '2014-10-08 03:11:42'),
('1233456666', 'ffdgfdgd', 'bggfggfgjhj', 0, '2014-10-13 09:47:22'),
('1234567891', 'suraj', 'aaffasjfjaksfb', 0, '2014-10-11 06:49:03'),
('1236547981', 'asd', 'asdfghj', 0, '2014-10-11 08:14:19'),
('2198746523', '198746851', '193549', 0, '2014-10-11 08:10:08'),
('a', 'a', 'a', 0, '2014-10-08 04:19:50'),
('Admin', 'Admin', 'Admin', 1, '2014-10-08 03:11:09'),
('c', 'c', 'c', 0, '2014-10-08 04:20:09'),
('hkdfhaskld', '12345', '12345', 0, '2014-10-08 10:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `user db`
--

CREATE TABLE IF NOT EXISTS `user db` (
  `username` varchar(32) NOT NULL,
  `e-wallet cash` int(11) NOT NULL DEFAULT '0',
  `previous journey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user db`
--

INSERT INTO `user db` (`username`, `e-wallet cash`, `previous journey`) VALUES
('Admin', 100000, 'CST to Kalyan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `omrtdb`
--
ALTER TABLE `omrtdb`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user db`
--
ALTER TABLE `user db`
 ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
