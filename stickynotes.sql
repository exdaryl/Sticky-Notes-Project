-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(150) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `notes` (`id`, `user_id`, `content`, `timestamp`) VALUES
(1,	1,	'test',	'2024-04-19 14:37:47'),
(3,	2,	'asdf',	'2024-04-19 14:48:57'),
(4,	37,	'asdf',	'2024-04-19 14:49:36'),
(14,	29,	'Testing',	'2024-04-23 23:26:17'),
(15,	29,	'Testing 2',	'2024-04-23 23:57:16'),
(16,	29,	'Updated note',	'2024-04-24 00:04:49'),
(17,	29,	'Updated note 1',	'2024-04-24 00:05:03'),
(25,	1,	'1',	'2024-04-29 16:16:47'),
(26,	1,	'2',	'2024-04-29 16:16:48'),
(27,	1,	'3',	'2024-04-29 16:16:49'),
(28,	1,	'4',	'2024-04-29 16:16:51'),
(29,	1,	'5',	'2024-04-29 16:16:52'),
(30,	1,	'Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hel',	'2024-04-29 16:16:53'),
(31,	1,	'7',	'2024-04-29 16:16:55'),
(32,	1,	'7',	'2024-04-29 16:16:56'),
(33,	1,	'8',	'2024-04-29 16:16:58'),
(34,	1,	'11',	'2024-04-29 16:17:03'),
(35,	1,	'12',	'2024-04-29 16:23:04'),
(36,	1,	'Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hello, how are you ? Hel',	'2024-04-29 16:39:47'),
(37,	1,	'23',	'2024-04-29 16:39:48'),
(38,	1,	'24',	'2024-04-29 16:39:50'),
(39,	1,	'1213',	'2024-04-29 16:39:51'),
(40,	1,	'12312',	'2024-04-29 16:39:53'),
(41,	1,	'asf13',	'2024-04-29 16:39:55'),
(42,	1,	'asf',	'2024-04-29 16:39:56'),
(43,	1,	'asf31',	'2024-04-29 16:39:58'),
(44,	1,	'asgxzc3',	'2024-04-29 16:40:00'),
(45,	1,	'Yukaka2eg gg',	'2024-04-30 01:59:33'),
(51,	1,	'Newbs',	'2024-05-06 23:44:07'),
(52,	59,	'today was hot.',	'2024-05-06 23:48:36'),
(53,	1,	'Hellloo 2',	'2024-05-08 15:45:54'),
(54,	50,	'Hello world.',	'2024-05-09 23:29:57'),
(55,	50,	'Dinner at 9 PM tonight at KLCC.',	'2024-05-09 23:30:27'),
(57,	60,	'Hello 2',	'2024-05-10 14:21:36'),
(58,	1,	'asdf',	'2024-05-10 18:18:09'),
(63,	1,	'asdf23f332',	'2024-05-10 18:38:42'),
(64,	1,	'Hello world.',	'2024-05-10 19:14:01'),
(65,	1,	'Hi',	'2024-05-10 20:22:44'),
(66,	1,	'asdfasdfasdfasdf2',	'2024-05-10 20:40:35'),
(67,	1,	'asf',	'2025-01-17 15:00:53');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1,	'Abu',	'Ali',	'aliabu@example.com',	'12345'),
(2,	'Henry',	'Gurn',	'henry@example.com',	'12346'),
(25,	'asdf',	'asf',	'asdf',	'asf'),
(27,	'asdf',	'asdf',	'sadf',	'asdf'),
(29,	'Peter',	'James',	'peterjames@testing.com',	'12'),
(30,	'Henry',	'Gurn',	'peterjames1@testing.com',	'12'),
(32,	'Admin',	'Admin',	'admin@outlook.com',	'secret!!'),
(33,	'Peter',	'Parker',	'spiderman@gmail.com',	'spidey'),
(34,	'Henry',	'Gurner',	'henrynew@gmail.com',	'12345'),
(37,	'Carlisle',	'Cullen',	'carlisle@gmail.com',	'123456'),
(39,	'Abu',	'Bu',	'abubu@example.com',	'121212'),
(50,	'Gojo',	'Satoru',	'gojosatoru@gmail.com',	'123123'),
(54,	'Itadori',	'Yuji',	'yuji@gmail.com',	'1234'),
(55,	'Ryomen',	'Sukuna',	'sukuna@gmail.com',	'1234'),
(59,	'Kariyu',	'riri',	'kariyu@gmail.com',	'riri1234'),
(60,	'Naruto',	'Uzumaki',	'naruto@gmail.com',	'naruto@gmail.co');

-- 2025-05-23 15:14:08
