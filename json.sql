-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2017 at 02:43 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `json`
--


-- --------------------------------------------------------

--
-- Table structure for table `chat_tbl`
--

CREATE TABLE IF NOT EXISTS `chat_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `chat_msg` text NOT NULL,
  `chat_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `chat_tbl`
--

INSERT INTO `chat_tbl` (`id`, `user_id`, `chat_msg`, `chat_date_time`, `read_status`) VALUES
(1, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel ornare dui, a sodales massa. Donec ut gravida enim, non vestibulum magna. Mauris libero sapien, faucibus vel odio non, bibendum facilisis eros. Pellentesque eget orci congue, tempor augue ultrices, pellentesque libero.', '2017-10-13 18:34:59', 0),
(11, 4, 'This fancy beer in the style of American India Pale Ale. Red-copper-bodied, with citrus flavor and aroma, floral, resin, pine and fruit derived from American hops', '2017-10-13 20:41:53', 0),
(12, 3, 'hey there wanted to know whether this works', '2017-10-15 14:02:58', 0),
(13, 4, 'Yes it works.. lets try delete', '2017-10-15 14:03:36', 0),
(14, 5, 'hey there I am new', '2017-10-15 14:10:09', 0),
(15, 4, 'Welcome Doe', '2017-10-15 14:10:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `firstname`, `lastname`, `email`, `password`, `active_status`) VALUES
(3, 'Steven', 'Kirika', 'stevenkirika@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'Ndegwa', 'Steven', 'steven@nairobits.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(5, 'Mary', 'Doe', 'marydoe@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_chats`
--
CREATE TABLE IF NOT EXISTS `view_chats` (
`firstname` varchar(50)
,`lastname` varchar(50)
,`email` varchar(100)
,`active_status` tinyint(1)
,`id` int(11)
,`user_id` int(11)
,`chat_msg` text
,`chat_date_time` timestamp
,`read_status` tinyint(1)
);
-- --------------------------------------------------------

--
-- Structure for view `view_chats`
--
DROP TABLE IF EXISTS `view_chats`;
CREATE VIEW `view_chats` AS select `users_tbl`.`firstname` AS `firstname`,`users_tbl`.`lastname` AS `lastname`,`users_tbl`.`email` AS `email`,`users_tbl`.`active_status` AS `active_status`,`chat_tbl`.`id` AS `id`,`chat_tbl`.`user_id` AS `user_id`,`chat_tbl`.`chat_msg` AS `chat_msg`,`chat_tbl`.`chat_date_time` AS `chat_date_time`,`chat_tbl`.`read_status` AS `read_status` from (`users_tbl` join `chat_tbl`) where (`chat_tbl`.`user_id` = `users_tbl`.`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
