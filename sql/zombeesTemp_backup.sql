-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2012 at 09:54 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zombeesTemp`
--

-- --------------------------------------------------------

--
-- Table structure for table `postTemp`
--

CREATE TABLE `postTemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(80) DEFAULT NULL,
  `description` text,
  `image1` char(40) DEFAULT NULL,
  `image2` char(40) DEFAULT NULL,
  `image3` char(40) DEFAULT NULL,
  `image4` char(40) DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `post_it` enum('yes','no') DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `postTemp`
--

INSERT INTO `postTemp` VALUES(1, 'Some Artwork I did', 'this is some sample text for the first entry into my database', '/images/image1.jpeg', '/images/image2.jpeg', '/images/image3.jpeg', '/images/image4.jpeg', 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(2, 'dfsa', 'fdafsdfa', 'Screen shot 2012-02-05 at 12.19.04 PM.pn', '', '', NULL, 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(3, 'new post', 'afdsasdf', 'Garden of love 2.jpeg', '', '', NULL, 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(4, 'new post', 'asfdfds', 'its been blown out of proportion.jpg', '', '', NULL, 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(5, 'new post', 'asfdfds', 'its been blown out of proportion.jpg', '', '', NULL, 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(6, 'new post', 'asfdfds', 'its been blown out of proportion.jpg', '', '', NULL, 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(7, 'Brom\\''s Motorbike', 'kjhkhkjh', 'Screen shot 2012-02-05 at 12.19.03 PM.pn', '', '', NULL, 1, NULL, '2012-02-18 15:47:56');
INSERT INTO `postTemp` VALUES(8, 'Super Mario', 'dfasfdasf', 'e-card.gif', '', '', NULL, 1, NULL, '2012-02-18 15:49:36');
INSERT INTO `postTemp` VALUES(14, 'creepy priest', 'dfafds', 'loadinfo-11.net.gif', '', '', NULL, 1, NULL, '2012-02-18 20:02:38');
INSERT INTO `postTemp` VALUES(15, 'creepy priest', 'adsfdsf', 'loadinfo-11.net.gif', '', '', NULL, 1, NULL, '2012-02-18 20:15:52');
INSERT INTO `postTemp` VALUES(16, 'creepy priest', 'adsfdsf', 'loadinfo-11.net.gif', '', '', NULL, 1, NULL, '2012-02-18 20:18:04');
INSERT INTO `postTemp` VALUES(18, 'new post', 'adfasf', 'kennysscore.gif', '', '', NULL, 1, NULL, '2012-02-18 20:23:07');
INSERT INTO `postTemp` VALUES(19, 'afadsfds', 'dasfsfdf', 'plakat3.png', '', '', NULL, 1, NULL, '2012-02-18 20:24:17');
INSERT INTO `postTemp` VALUES(23, 'creepy priest', 'rgffdgfgd', 'Screen shot 2012-02-05 at 12.19.04 PM.pn', '', '', NULL, 1, NULL, '2012-02-18 20:35:46');
INSERT INTO `postTemp` VALUES(24, 'faf', 'adsfasdf', 'Screen shot 2012-01-21 at 11.12.12 AM.pn', '', '', NULL, 1, NULL, '2012-02-18 20:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `userTemp`
--

CREATE TABLE `userTemp` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(80) DEFAULT NULL,
  `email` char(200) DEFAULT NULL,
  `password` binary(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userTemp`
--

INSERT INTO `userTemp` VALUES(1, 'Olly Blake', 'blake.olly@gmail.com', 'password\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0');
