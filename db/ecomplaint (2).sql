-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 03:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomplaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `cid` int(11) NOT NULL,
  `complaint` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(5) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`cid`, `complaint`, `date`, `time`, `uid`, `eid`, `status`) VALUES
(31, 'complaint 2', '2021-05-09', '14:51:45', 23, 8, 2),
(32, 'complaint 3', '2021-05-09', '02:53:00', 23, 8, 2),
(33, 'comp 4', '2021-05-09', '02:57:00', 23, 8, 2),
(34, 'comp5', '2021-05-09', '02:57:59', 23, 8, 2),
(35, 'effef', '2021-05-09', '00:00:00', 23, 8, 2),
(43, 'asd', '2021-05-29', '04:42:49', 25, 7, 2),
(46, 'cheat', '2021-05-29', '08:08:41', 20, 9, 2),
(47, 'This is a test complaint message', '2021-05-30', '08:15:21', 27, 11, 2),
(48, 'This is secind complaint', '2021-05-30', '08:16:32', 27, 10, 1),
(49, 'Sample complaint', '2021-07-10', '05:58:05', 30, 11, 2),
(50, 'Misbehave', '2021-07-10', '05:58:33', 30, 7, 1),
(51, 'some complaint against Fahad', '2021-07-16', '07:00:11', 32, 13, 2),
(52, 'Complaint ...', '2021-07-16', '07:55:28', 25, 13, 3),
(53, 'too arrogant', '2021-07-16', '11:12:41', 32, 13, 3),
(54, 'Demo complaint', '2021-07-18', '08:05:03', 32, 12, 3),
(55, 'Jishnu is very rude', '2021-07-18', '03:18:25', 36, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employeereg`
--

CREATE TABLE `employeereg` (
  `eid` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `contactno` int(12) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `lid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeereg`
--

INSERT INTO `employeereg` (`eid`, `name`, `place`, `contactno`, `designation`, `image`, `lid`) VALUES
(7, 'emp1', 'test', 123, 'Manager', 'admin.png', 21),
(8, 'emp2', 'test', 123, 'Accountant', 'user3 pic.jfif', 22),
(9, 'Suresh', 'tvm', 2147483647, 'asd', 'download.jpg', 26),
(10, 'Winsten', 'Ernakulam', 2147483647, 'Manager', 'images (3).jpg', 28),
(11, 'Jon Snow', 'Kollam', 2147483647, 'Sales', 'images (6).jpg', 29),
(12, 'Jishnu', 'Punaloor', 2147483647, 'CEO', 'images (5).jpg', 31),
(13, 'Fahad Fassil', 'Meerut', 2147483647, 'Designer', 'images (5).jpg', 34);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `username`, `password`, `status`) VALUES
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(20, 'user1', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(21, 'emp1', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(22, 'emp2', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(23, 'user2', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(24, 'ajojohn', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(25, 'emma@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(26, 'suresh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(27, 'adityan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(28, 'winsten@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(29, 'jon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(30, 'ashwin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(31, 'jishnu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(32, 'rekha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(34, 'fahadfassil@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(35, 'vivek@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(36, 'athulkrishna@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `contact` int(12) NOT NULL,
  `lid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`id`, `name`, `place`, `contact`, `lid`) VALUES
(24, 'user1', 'test', 100, 20),
(25, 'user2', 'test', 132, 23),
(26, 'Ajo John', 'Kottarakara', 2147483647, 24),
(27, 'Emma', 'asd', 2147483647, 25),
(28, 'Adityan', 'kollam', 2147483647, 27),
(29, 'Ashwin', 'Punaloor', 2147483647, 30),
(30, 'Rekha', 'Kottayam', 2147483647, 32),
(31, 'Vivek', 'Kottayam', 2147483647, 35),
(32, 'Athul Krishna', 'Boston', 2147483647, 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `employeereg`
--
ALTER TABLE `employeereg`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employeereg`
--
ALTER TABLE `employeereg`
  MODIFY `eid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
