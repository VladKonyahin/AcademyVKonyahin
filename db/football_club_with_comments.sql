-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 16 2014 г., 20:34
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `football_club`
--

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE IF NOT EXISTS `club` ( --варто назвати clubs, адже тут буде не один клуб :)
  `club_id` int(10) NOT NULL AUTO_INCREMENT, -- просто id. Таблиця clubs, тому далі club не варто тянути
  `club_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL, -- варто винести в окрему таблицю
  `division` varchar(100) NOT NULL,
  `year of foundation` date NOT NULL,
  `trophies` int(10) NOT NULL,
  `budget` int(10) NOT NULL,
  `president` varchar(100) NOT NULL, --президента варто винести в окрему таблицю, скажімо Persons
  `stadium` varchar(100) NOT NULL, --stadium_id типу int це звязок із таблицею Стадіонів
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `league`
--

CREATE TABLE IF NOT EXISTS `league` ( --теж множина мала б бути
  `league_id` int(10) NOT NULL AUTO_INCREMENT, --див. зауваження до попередньої таблиці
  `league_name` varchar(100) NOT NULL,
  `league_counry` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `league_president` varchar(100) NOT NULL,--президента варто винести в окрему таблицю, скажімо Persons
  PRIMARY KEY (`league_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `stadium`
--

CREATE TABLE IF NOT EXISTS `stadium` (
  `stadium_id` int(10) NOT NULL AUTO_INCREMENT,
  `stadium_name` varchar(100) NOT NULL,
  `stadium_foundation` date NOT NULL,
  `capacity` int(10) NOT NULL,
  PRIMARY KEY (`stadium_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `trophies`
--

CREATE TABLE IF NOT EXISTS `trophies` (
  `trophie_id` int(10) NOT NULL AUTO_INCREMENT,
  `trophie_name` varchar(100) NOT NULL,
  `trophie_foundation` date NOT NULL,
  PRIMARY KEY (`trophie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--- мала б бути ще одна таблиця для звязку клубів і трофеїв. інакше один із пунктів задачі не вийде реалізувати :)