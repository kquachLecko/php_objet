-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `attendees`;
CREATE TABLE `attendees` (
  `meeting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `meeting_id` (`meeting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`),
  CONSTRAINT `attendees_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `attendees` (`meeting_id`, `user_id`) VALUES
(2,	1),
(2,	3),
(2,	4),
(3,	1),
(3,	2);

DROP TABLE IF EXISTS `communities`;
CREATE TABLE `communities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `communities` (`id`, `name`) VALUES
(1,	'php'),
(2,	'react Js');

DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `films` (`id`, `title`) VALUES
(1,	'Star Wars épisode 1'),
(2,	'Star Wars épisode 2'),
(3,	'Star Wars épisode 3'),
(4,	'Star Wars épisode 4'),
(5,	'Star Wars épisode 5'),
(6,	'Star Wars épisode 6'),
(7,	'Star Wars épisode 7'),
(8,	'Star Wars épisode 8'),
(9,	'Star Wars épisode 9');

DROP TABLE IF EXISTS `lecturers`;
CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lecturers` (`id`, `firstname`, `lastname`) VALUES
(1,	'John',	'Doe');

DROP TABLE IF EXISTS `meetings`;
CREATE TABLE `meetings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `community_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `community_id` (`community_id`),
  CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `meetings` (`id`, `title`, `description`, `date_start`, `date_end`, `community_id`) VALUES
(2,	'start with php',	'lesson for beginner',	'2017-12-26 14:16:08',	'2017-12-26 14:16:08',	1),
(3,	'start with react',	'get started ',	'2017-12-26 14:16:35',	'2017-12-26 14:16:35',	2),
(4,	'lesson 2 : php',	'POO php',	'2017-12-26 16:05:26',	'2017-12-28 16:05:26',	1);

DROP TABLE IF EXISTS `organisers`;
CREATE TABLE `organisers` (
  `meeting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `meeting_id` (`meeting_id`),
  CONSTRAINT `organisers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `organisers_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `organisers` (`meeting_id`, `user_id`) VALUES
(2,	3),
(3,	3),
(4,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`) VALUES
(1,	'quach'),
(2,	'doe'),
(3,	'kevin'),
(4,	'new');

-- 2017-12-27 15:21:05