CREATE DATABASE IF NOT EXISTS `web-rtc-video`;
USE `web-rtc-video`;

CREATE TABLE IF NOT EXISTS `Test` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

