-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2015 at 09:57 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `reply_tweets`
--

CREATE TABLE `reply_tweets` (
  `TextArea` varchar(255) NOT NULL,
  `reply_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `reply_ID` (`reply_ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reply_tweets`
--

INSERT INTO `reply_tweets` (`TextArea`, `reply_ID`, `ID`, `user_id`) VALUES
('hej', 1, 3, 1),
('du suger', 1, 4, 3),
('ny kommentar', 2, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TextArea` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_tweets` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`ID`, `TextArea`, `user_id`) VALUES
(1, 'hejsan hoppsan', 1),
(2, 'Hej alla !!! ', 1),
(4, 'ANNA HÃ„R!! ', 5),
(6, 'Hej jag Ã¤lskar alla!!!', 5),
(8, 'NÃ¤ men tjenare!!', 5),
(11, 'katter', 1),
(14, 'Johanna suger', 1),
(15, 'Jag heter petter', 3),
(33, 'hejhejhjehjehje', 1),
(34, 'hejhej', 1),
(35, 'katter', 1),
(36, 'Min tweet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProfilePicture` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `Username` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `ProfilePicture`, `firstName`, `lastName`, `email`, `passWord`, `Username`) VALUES
(1, 'uploads/jag.jpg', 'Fredrika', 'Conradsson', 'fredrika.conradsson@gmail.com', 'admin', 'Admin'),
(3, 'uploads/Ph03nyx-Super-Mario-Paper-Mario.ico', 'Petter', 'Olsson', 'PetterO@gmail.com', 'petter', 'PetterOH'),
(5, 'uploads/IMG_0216.JPG', 'Anna', 'Larsson', 'AnnLar@gmail.com', 'hejsan', 'AnnaPanna');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply_tweets`
--
ALTER TABLE `reply_tweets`
  ADD CONSTRAINT `reply_tweets_ibfk_1` FOREIGN KEY (`reply_ID`) REFERENCES `tweets` (`ID`),
  ADD CONSTRAINT `reply_tweets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
