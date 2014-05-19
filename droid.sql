-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Palvelin: localhost
-- Luontiaika: 25.04.2014 klo 19:07
-- Palvelimen versio: 5.5.16
-- PHP:n versio: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Tietokanta: `droid`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`day_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Vedos taulusta `day`
--

INSERT INTO `day` (`day_id`, `user_id`, `date`, `is_public`) VALUES
(1, 1, '0000-00-00', NULL),
(2, 1, '0000-00-00', NULL),
(3, 1, '2012-12-12', NULL),
(4, 2, '2012-12-15', NULL),
(6, 6, '2014-03-30', 0),
(7, 6, '2014-03-30', NULL),
(9, 6, '2014-04-02', NULL),
(14, 7, '2014-04-06', NULL),
(15, 10, '2014-04-08', NULL),
(16, 5, '2014-04-10', NULL),
(17, 5, '2014-04-10', NULL),
(18, 11, '2014-04-10', NULL),
(19, 6, '2014-04-14', NULL),
(20, 6, '2014-04-16', NULL),
(21, 6, '2014-04-18', NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `exercise`
--

CREATE TABLE IF NOT EXISTS `exercise` (
  `exercise_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `instruction` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`exercise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Vedos taulusta `exercise`
--

INSERT INTO `exercise` (`exercise_id`, `name`, `instruction`, `user_id`) VALUES
(1, 'Jea', 'asdf', NULL),
(2, 'Leuanveto', 'Perinteinen leuanveto', NULL),
(3, 'Penkkipunnerrus', 'Penkkipunnerrus', NULL),
(4, 'Pystypunnerrus', 'Pystypunnerrus', NULL),
(5, 'Vipunostot sivulle', 'Viparit', NULL),
(6, 'Kyykky', 'Kyykky', NULL),
(7, 'asdfasdf', 'asdfasdf', NULL),
(8, 'Etunojapunnerrus', 'Perinteinen etunojapunnerrus ', NULL),
(9, 'asdf', 'asdf', 6),
(10, 'ASDFasdf', 'adsf', 6),
(11, 'adsf', 'asdf', 6),
(12, 'asdfadsf', 'asdfadsf', 6),
(13, 'uusi', 'uusi', 6),
(16, 'ASDFasdfasdf', 'asdfasdf', 5),
(17, 'Vinokyykky', 'vimo', 6);

-- --------------------------------------------------------

--
-- Rakenne taululle `set`
--

CREATE TABLE IF NOT EXISTS `set` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `exercise_id` int(11) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`set_id`),
  KEY `exercise_id` (`exercise_id`,`day_id`),
  KEY `day_id` (`day_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Vedos taulusta `set`
--

INSERT INTO `set` (`set_id`, `exercise_id`, `reps`, `weight`, `day_id`, `user_id`) VALUES
(9, 1, 1, 11, 1, 1),
(10, 1, 1, 1, 1, 1),
(11, 2, 2, 2, 2, 2),
(13, 1, 1, 1, 1, 1),
(14, 2, 2, 2, 1, 1),
(40, 4, 0, 0, 7, 6),
(41, 4, 0, 0, 7, 6),
(47, 2, 0, 0, 6, 6),
(48, 2, 0, 0, 6, 6),
(51, 2, 3, 3, 6, 6),
(52, 1, 0, 0, 1, 6),
(53, 2, 0, 0, 9, 6),
(60, 4, 0, 0, 14, 7),
(62, 5, 0, 0, 15, 10),
(63, 4, 0, 0, 15, 10),
(65, 1, 0, 0, 15, 10),
(66, 4, 10, 50, 18, 11),
(67, 3, 8, 50, 6, 6),
(68, 3, 10, 50, 6, 6),
(70, 3, 10, 50, 6, 6),
(72, 4, 0, 32424, 7, 6),
(79, 8, 234, 234234, 7, 6),
(80, 11, 0, 22222, 7, 6),
(82, 3, 12, 50, 19, 6),
(83, 3, 12, 50, 19, 6),
(84, 3, 13, 50, 20, 6),
(85, 3, 15, 50, 20, 6);

-- --------------------------------------------------------

--
-- Rakenne taululle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Vedos taulusta `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'asdf', 'asdf', ''),
(2, 'asdf', 'asdf', ''),
(3, 'Juhq', 'juho@asdf.fi', 'user'),
(4, 'Juhq', 'user@user.com', 'user'),
(5, 'User', 'user', 'user'),
(6, 'newuser', 'newuser22', 'newuser'),
(7, 'naamat', 'naamat@naamat.fi', 'naamat'),
(8, 'Jeba', 'jeba', 'jeba'),
(9, 'uusikäyttäjä', 'kä', 'uusi'),
(10, 'uusi', 'uusi', 'uusi'),
(11, 'Juho', 'juho', 'juho');

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `day_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Rajoitteet taululle `set`
--
ALTER TABLE `set`
  ADD CONSTRAINT `set_ibfk_10` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `set_ibfk_8` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`exercise_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `set_ibfk_9` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
