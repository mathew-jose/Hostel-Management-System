-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 11:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aEmail` varchar(40) NOT NULL,
  `hostelID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aEmail`, `hostelID`) VALUES
('a@nitc.ac.in', 'A'),
('b@nitc.ac.in', 'B'),
('c@nitc.ac.in', 'C'),
('d@nitc.ac.in', 'D'),
('e@nitc.ac.in', 'E'),
('f@nitc.ac.in', 'F'),
('mb@nitc.ac.in', 'MB'),
('ml@nitc.ac.in', 'ML');

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `sEmail` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `dueType` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`sEmail`, `amount`, `dueType`, `status`) VALUES
('mathew@nitc.ac.in', 1000, 'Fines', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `aEmail` varchar(40) NOT NULL,
  `no_ofRooms` int(11) NOT NULL,
  `no_ofStudents` int(11) NOT NULL,
  `hostelID` varchar(40) NOT NULL,
  `maxshare` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`aEmail`, `no_ofRooms`, `no_ofStudents`, `hostelID`, `maxshare`) VALUES
('a@nitc.ac.in', 25, 1, 'A', 4),
('b@nitc.ac.in', 25, 0, 'B', 4),
('c@nitc.ac.in', 25, 0, 'C', 4),
('d@nitc.ac.in', 25, 0, 'D', 2),
('e@nitc.ac.in', 25, 0, 'E', 2),
('f@nitc.ac.in', 25, 0, 'F', 1),
('mb@nitc.ac.in', 25, 5, 'MB', 2),
('ml@nitc.ac.in', 25, 1, 'ML', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lost_and_found`
--

CREATE TABLE `lost_and_found` (
  `sEmail` varchar(40) NOT NULL,
  `LF_ID` int(11) NOT NULL,
  `item` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `lf` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mess_request`
--

CREATE TABLE `mess_request` (
  `req_id` int(11) NOT NULL,
  `sEmail` varchar(40) NOT NULL,
  `mess` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `req_and_comp`
--

CREATE TABLE `req_and_comp` (
  `sEmail` varchar(40) NOT NULL,
  `RC_ID` int(20) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `subject` varchar(255) NOT NULL,
  `concern` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `hostelID` varchar(20) NOT NULL,
  `roomNo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`hostelID`, `roomNo`) VALUES
('A', 1),
('A', 2),
('A', 3),
('A', 4),
('A', 5),
('A', 6),
('A', 7),
('A', 8),
('A', 9),
('A', 10),
('A', 11),
('A', 12),
('A', 13),
('A', 14),
('A', 15),
('A', 16),
('A', 17),
('A', 18),
('A', 19),
('A', 20),
('A', 21),
('A', 22),
('A', 23),
('A', 24),
('A', 25),
('B', 1),
('B', 2),
('B', 3),
('B', 4),
('B', 5),
('B', 6),
('B', 7),
('B', 8),
('B', 9),
('B', 10),
('B', 11),
('B', 12),
('B', 13),
('B', 14),
('B', 15),
('B', 16),
('B', 17),
('B', 18),
('B', 19),
('B', 20),
('B', 21),
('B', 22),
('B', 23),
('B', 24),
('B', 25),
('C', 1),
('C', 2),
('C', 3),
('C', 4),
('C', 5),
('C', 6),
('C', 7),
('C', 8),
('C', 9),
('C', 10),
('C', 11),
('C', 12),
('C', 13),
('C', 14),
('C', 15),
('C', 16),
('C', 17),
('C', 18),
('C', 19),
('C', 20),
('C', 21),
('C', 22),
('C', 23),
('C', 24),
('C', 25),
('D', 1),
('D', 2),
('D', 3),
('D', 4),
('D', 5),
('D', 6),
('D', 7),
('D', 8),
('D', 9),
('D', 10),
('D', 11),
('D', 12),
('D', 13),
('D', 14),
('D', 15),
('D', 16),
('D', 17),
('D', 18),
('D', 19),
('D', 20),
('D', 21),
('D', 22),
('D', 23),
('D', 24),
('D', 25),
('E', 1),
('E', 2),
('E', 3),
('E', 4),
('E', 5),
('E', 6),
('E', 7),
('E', 8),
('E', 9),
('E', 10),
('E', 11),
('E', 12),
('E', 13),
('E', 14),
('E', 15),
('E', 16),
('E', 17),
('E', 18),
('E', 19),
('E', 20),
('E', 21),
('E', 22),
('E', 23),
('E', 24),
('E', 25),
('F', 1),
('F', 2),
('F', 3),
('F', 4),
('F', 5),
('F', 6),
('F', 7),
('F', 8),
('F', 9),
('F', 10),
('F', 11),
('F', 12),
('F', 13),
('F', 14),
('F', 15),
('F', 16),
('F', 17),
('F', 18),
('F', 19),
('F', 20),
('F', 21),
('F', 22),
('F', 23),
('F', 24),
('F', 25),
('MB', 1),
('MB', 2),
('MB', 3),
('MB', 4),
('MB', 5),
('MB', 6),
('MB', 7),
('MB', 8),
('MB', 9),
('MB', 10),
('MB', 11),
('MB', 12),
('MB', 13),
('MB', 14),
('MB', 15),
('MB', 16),
('MB', 17),
('MB', 18),
('MB', 19),
('MB', 20),
('MB', 21),
('MB', 22),
('MB', 23),
('MB', 24),
('MB', 25),
('ML', 1),
('ML', 2),
('ML', 3),
('ML', 4),
('ML', 5),
('ML', 6),
('ML', 7),
('ML', 8),
('ML', 9),
('ML', 10),
('ML', 11),
('ML', 12),
('ML', 13),
('ML', 14),
('ML', 15),
('ML', 16),
('ML', 17),
('ML', 18),
('ML', 19),
('ML', 20),
('ML', 21),
('ML', 22),
('ML', 23),
('ML', 24),
('ML', 25);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sEmail` varchar(40) NOT NULL,
  `rollNo` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `branch` varchar(60) NOT NULL,
  `YoS` int(11) NOT NULL,
  `roomNo` int(20) DEFAULT NULL,
  `hostelID` varchar(20) DEFAULT NULL,
  `mess` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sEmail`, `rollNo`, `address`, `branch`, `YoS`, `roomNo`, `hostelID`, `mess`) VALUES
('emmy@nitc.ac.in', 'B180347CS', 'Kottayam', 'CSE', 3, 2, 'MB', ''),
('mathew@nitc.ac.in', 'B180586CS', 'Kottayam', 'Computer Science', 3, 1, 'MB', ''),
('neeli@nitc.ac.in', 'B180632CS', 'Sharjah', 'CSE', 3, 1, 'ML', 'F'),
('sid@nitc.ac.in', 'B180561CS', 'Dubai', 'CSE', 3, 2, 'MB', ''),
('vasu@nitc.ac.in', 'B181134CS', 'Lakshwadeep', 'CSE', 3, 3, 'MB', ''),
('vishnu@nitc.ac.in', 'B180474CS', 'Calicut', 'CSE', 3, 1, 'MB', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_visitor`
--

CREATE TABLE `student_visitor` (
  `sEmail` varchar(40) NOT NULL,
  `contactNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `DoB` date NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `picture` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `contactNo`, `name`, `DoB`, `usertype`, `picture`) VALUES
('a@nitc.ac.in', 'admin', '1325467980', 'Admin-A', '1974-01-01', 'admin', ''),
('admin@nitc.ac.in', 'admin123', '0070070070', 'Admin', '2018-08-30', 'admin', ''),
('b@nitc.ac.in', 'admin', '4123675890', 'Admin-B', '1969-01-01', 'admin', ''),
('c@nitc.ac.in', 'admin', '5678123490', 'Admin-C', '1988-01-01', 'admin', ''),
('d@nitc.ac.in', 'admin', '5432167890', 'Admin-D', '1980-01-01', 'admin', ''),
('e@nitc.ac.in', 'admin', '0987634521', 'Admin-E', '1979-01-01', 'admin', ''),
('emmy@nitc.ac.in', 'B180347CS', '8070906050', 'Emmanuel', '2000-06-21', 'student', ''),
('f@nitc.ac.in', 'admin', '4567098321', 'Admin-F', '1984-01-01', 'admin', ''),
('mathew@nitc.ac.in', 'B180586CS', '9998887776', 'Mathew', '2000-09-24', 'student', ''),
('mb@nitc.ac.in', 'admin', '2134657980', 'Admin-MB', '1965-01-01', 'admin', ''),
('ml@nitc.ac.in', 'admin', '2345670981', 'Admin-ML', '1963-01-01', 'admin', ''),
('neeli@nitc.ac.in', 'B180632CS', '2345678901', 'Neelima', '2020-12-28', 'student', ''),
('sid@nitc.ac.in', 'B180561CS', '9080706050', 'Sidharth', '2000-09-06', 'student', ''),
('vasu@nitc.ac.in', 'B181134CS', '7089065000', 'Shaaheen', '1999-06-19', 'student', ''),
('vishnu@nitc.ac.in', 'B180474CS', '9898878777', 'Vishnu', '1999-03-24', 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `contactNo` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reln` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `contactNo` varchar(15) NOT NULL,
  `inDate` date NOT NULL,
  `inTime` time NOT NULL,
  `outTime` time NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aEmail`),
  ADD KEY `hostelID` (`hostelID`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`sEmail`,`dueType`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostelID`);

--
-- Indexes for table `lost_and_found`
--
ALTER TABLE `lost_and_found`
  ADD PRIMARY KEY (`LF_ID`),
  ADD KEY `sEmail` (`sEmail`);

--
-- Indexes for table `mess_request`
--
ALTER TABLE `mess_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `sEmail` (`sEmail`),
  ADD KEY `mess` (`mess`);

--
-- Indexes for table `req_and_comp`
--
ALTER TABLE `req_and_comp`
  ADD PRIMARY KEY (`RC_ID`),
  ADD KEY `sEmail` (`sEmail`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`hostelID`,`roomNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sEmail`),
  ADD KEY `hostelID` (`hostelID`,`roomNo`);

--
-- Indexes for table `student_visitor`
--
ALTER TABLE `student_visitor`
  ADD PRIMARY KEY (`sEmail`,`contactNo`),
  ADD KEY `contactNo` (`contactNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`contactNo`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`contactNo`,`inDate`,`inTime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lost_and_found`
--
ALTER TABLE `lost_and_found`
  MODIFY `LF_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mess_request`
--
ALTER TABLE `mess_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `req_and_comp`
--
ALTER TABLE `req_and_comp`
  MODIFY `RC_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`aEmail`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`hostelID`) REFERENCES `hostel` (`hostelID`);

--
-- Constraints for table `dues`
--
ALTER TABLE `dues`
  ADD CONSTRAINT `dues_ibfk_1` FOREIGN KEY (`sEmail`) REFERENCES `student` (`sEmail`);

--
-- Constraints for table `lost_and_found`
--
ALTER TABLE `lost_and_found`
  ADD CONSTRAINT `lost_and_found_ibfk_1` FOREIGN KEY (`sEmail`) REFERENCES `student` (`sEmail`);

--
-- Constraints for table `mess_request`
--
ALTER TABLE `mess_request`
  ADD CONSTRAINT `mess_request_ibfk_1` FOREIGN KEY (`sEmail`) REFERENCES `student` (`sEmail`),
  ADD CONSTRAINT `mess_request_ibfk_2` FOREIGN KEY (`mess`) REFERENCES `hostel` (`hostelID`);

--
-- Constraints for table `req_and_comp`
--
ALTER TABLE `req_and_comp`
  ADD CONSTRAINT `req_and_comp_ibfk_1` FOREIGN KEY (`sEmail`) REFERENCES `student` (`sEmail`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hostelID`) REFERENCES `hostel` (`hostelID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sEmail`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`hostelID`,`roomNo`) REFERENCES `rooms` (`hostelID`, `roomNo`);

--
-- Constraints for table `student_visitor`
--
ALTER TABLE `student_visitor`
  ADD CONSTRAINT `student_visitor_ibfk_1` FOREIGN KEY (`sEmail`) REFERENCES `student` (`sEmail`),
  ADD CONSTRAINT `student_visitor_ibfk_2` FOREIGN KEY (`contactNo`) REFERENCES `visitors` (`contactNo`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`contactNo`) REFERENCES `student_visitor` (`contactNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
