CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `roomID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT= 0;

CREATE TABLE `messages` (
  `msg_id` int unsigned NOT NULL AUTO_INCREMENT,
  `msg` varchar(1000) DEFAULT NULL,
  `senderID` varchar(255) DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT NULL,
  `chatID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0;