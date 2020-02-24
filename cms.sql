-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2020 at 05:50 PM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

DROP TABLE IF EXISTS `bloodgroup`;
CREATE TABLE IF NOT EXISTS `bloodgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(225) DEFAULT NULL,
  `bgroup` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`id`, `fullname`, `bgroup`) VALUES
(1, 'Muhaimin Shihab', 'AB+'),
(2, 'Muhaimin Shihab', 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(225) DEFAULT NULL,
  `content` text,
  `ytblink` text,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `content`, `ytblink`, `img`) VALUES
(1, 'Data Structure', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolorem hic cum veniam porro distinctio magni? Inventore rem qui aut est consequuntur. Suscipit, eligendi fugit? Architecto deserunt doloribus eos enim!\r\n\r\n                <br><br>\r\n\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem est minus perferendis incidunt quis, cumque maxime ducimus magni, ullam rerum temporibus quam? Saepe, voluptates facere ullam aspernatur nobis ipsa accusantium.', 'https://www.youtube.com/embed/6ardZEhjvV0', 'assets/img/001.jpg'),
(2, 'Algorithm', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolorem hic cum veniam porro distinctio magni? Inventore rem qui aut est consequuntur. Suscipit, eligendi fugit? Architecto deserunt doloribus eos enim!\r\n\r\n                <br><br>\r\n\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem est minus perferendis incidunt quis, cumque maxime ducimus magni, ullam rerum temporibus quam? Saepe, voluptates facere ullam aspernatur nobis ipsa accusantium.', 'https://www.youtube.com/embed/6ardZEhjvV0', 'assets/img/002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

DROP TABLE IF EXISTS `notify`;
CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `sts` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `title`, `sts`) VALUES
(1, 'Welcome to CMS | SKB', 1),
(2, 'Welcome to CMS | Shihab', 1),
(3, 'Tommorow Class Cancel 25/02/2020', 1),
(4, 'Test Test', 1),
(5, 'Algorithm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(225) DEFAULT NULL,
  `sid` varchar(225) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `emailid` varchar(225) DEFAULT NULL,
  `mobile` varchar(225) DEFAULT NULL,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `sid`, `title`, `emailid`, `mobile`, `img`) VALUES
(1, 'Shakib', '147852369', 'CSE', 'random@m.com', '0123654', 'https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?k=6&m=476085198&s=612x612&w=0&h=5cDQxXHFzgyz8qYeBQu2gCZq1_TN0z40e_8ayzne0X0=');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(225) DEFAULT NULL,
  `tid` varchar(50) DEFAULT NULL,
  `title` varchar(2285) DEFAULT NULL,
  `emailadd` varchar(225) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fullname`, `tid`, `title`, `emailadd`, `mobile`, `img`) VALUES
(1, 'Muhaimin Shihab', NULL, 'Lecturer, Dept of CMT', NULL, '', 'http://localhost/project-cms/assets/img/profile.JPG'),
(2, 'Abdullah', '123456', 'Techer', 'ab@gmail.com', '0179365112', 'https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?k=6&m=476085198&s=612x612&w=0&h=5cDQxXHFzgyz8qYeBQu2gCZq1_TN0z40e_8ayzne0X0=');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `fullname` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` int(3) NOT NULL DEFAULT '0',
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `fullname`, `email`, `password`, `role`, `img`) VALUES
(1, 'Section: B,CMT - 2', 'Muhaimin Shihab', 'sa@m.com', '123', 1, 'assets/img/profile.JPG'),
(2, 'Techer', 'Abdullah', '123456', '142536', 2, 'https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?k=6&m=476085198&s=612x612&w=0&h=5cDQxXHFzgyz8qYeBQu2gCZq1_TN0z40e_8ayzne0X0='),
(3, 'CSE', 'Shakib', '142536', '145236', 3, 'https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?k=6&m=476085198&s=612x612&w=0&h=5cDQxXHFzgyz8qYeBQu2gCZq1_TN0z40e_8ayzne0X0=');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
