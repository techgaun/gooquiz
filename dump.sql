-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2011 at 03:24 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `googling`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `send_time` time DEFAULT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `user_id`, `answer`, `send_time`) VALUES
(17, 10, 'taha chaina', '01:45:18'),
(18, 16, 'music', '01:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `current_question`
--

CREATE TABLE IF NOT EXISTS `current_question` (
  `q_id` int(11) NOT NULL,
  `right_answer_by` int(11) DEFAULT NULL COMMENT 'id of the user giving the right answer',
  `end_time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_question`
--

INSERT INTO `current_question` (`q_id`, `right_answer_by`, `end_time`) VALUES
(9, 10, '01:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`) VALUES
(1, 'Charlize Theron plays Sara''s role in the movie Sweet November, she selects Nelson to be her November, whom she first met on test for license when Nelson asked Sara a question. What was the question number?', '9'),
(2, 'Near around the time of death of Steve Jobs, another talented computer scientist died. Write the name of the scientist and the major contribution of the scientist.', 'Dennis Ritchie, C programming language and/or Unix Operating system'),
(3, 'After winning the league again in 1997 by Manchester United, a player shocked his fans by retiring from the football at the age of 30, Name the player.', 'Eric Cantona'),
(4, 'Actor of movie harry potter(Daniel Radcliffe) plays a role of child who manages to triumph over incredible adventures after he was sent away by his stepfather immediately after death of his mother. Name the movie.', 'David Cooperfield'),
(6, 'What is the biggest hit movie of PIXAR ANIMATION STUDIO till now?', 'The Incredibles'),
(7, 'who is the villain character''s name in upcoming Batman movie?', 'Bane'),
(9, 'Which was the field in which Dan Brown was involved before perusing his career as a writer?', 'Songwriter and Pop Singer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ip`) VALUES
(8, '192.168.5.141'),
(9, '192.168.5.89'),
(10, '192.168.5.224'),
(11, '192.168.5.183'),
(12, '192.168.5.69'),
(13, '192.168.5.97'),
(14, '192.168.5.184'),
(15, '127.0.0.1'),
(16, '192.168.5.21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
