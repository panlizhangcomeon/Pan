-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

DROP TABLE IF EXISTS `stu`;
CREATE TABLE `stu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `tel` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `stu` (`id`, `name`, `sex`, `age`, `tel`) VALUES
(1,	'xiaowang',	'boy',	15,	'18858652150'),
(2,	'xiaopan',	'boy',	18,	'12332325454'),
(3,	'xiaoma',	'boy',	18,	'18895651234'),
(4,	'xiaoli',	'girl',	24,	'12234567890'),
(5,	'xiaoqiang',	'girl',	24,	'14534567450');

-- 2018-11-26 02:34:56
