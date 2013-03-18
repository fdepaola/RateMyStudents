-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2013 at 08:25 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ratemystudents`
--
CREATE DATABASE `ratemystudents` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ratemystudents`;

-- --------------------------------------------------------


-- --------------------------------------------------------
--

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

--
-- Dumping data for table `student`
--



--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department_id` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `last_name`, `first_name`, `email`, `password`, `department_id`) VALUES
(1, 'Crawford', 'Michael', 'mscrawfor@gmail.com', '48181acd22b3edaebc8a447868a7df7ce629920a', 0),
(2, 'RRRRAAWWR', 'Chewbacca', 'IhateHAN@gmail.com', '177538037189398e459160a3ddc53f04a394062e', 0),
(3, 'DePaola', 'Frankie', 'f@f.com', '890a492c4fc7a01e4582fc6774ffb8a9e01f14d5', 0),
(4, 'DePaola', 'Frankie', 'f@f.com', '890a492c4fc7a01e4582fc6774ffb8a9e01f14d5', 0),
(5, 'user', 'test', 'test@user.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0),
(6, 'user2', 'test2', 't2@user2.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2),
(7, 'user3', 'test3', 't3@user3.com', 'afc97ea131fd7e2695a98ef34013608f97f34e1d', 1);

-- --------------------------------------------------------
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `smart` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `lazy` int(11) NOT NULL,
  `smelly` int(11) NOT NULL,
  `integrity` int(11) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  `major` varchar(50) DEFAULT NULL,
  `comments` blob,
  
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  FOREIGN KEY (student_id) REFERENCES student(student_id),
  PRIMARY KEY (`review_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
