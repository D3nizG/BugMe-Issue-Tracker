DROP DATABASE IF EXISTS bugDB;
CREATE DATABASE bugDB;
USE bugDB;


CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`firstname` varchar(255) NOT NULL,
	`lastname` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`pword` CHAR(255) NOT NULL,
	`date_joined` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `issues` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`description` TEXT,
	`type` enum('bug','proposal','task') NOT NULL,
	`priority` enum('minor','major','critical') NOT NULL,
	`status` enum('open','closed','inprogress') NOT NULL,
	`assigned_to` INT NOT NULL,
	`created_by` INT NOT NULL,
	`created` DATETIME NOT NULL,
	`updated` DATETIME,
	PRIMARY KEY (`id`)
);



INSERT into users(firstname,lastname,pword,email,date_joined)
VALUES ("Tom","Bill",SHA2('Password123',512),"admin@project2.com",NOW());

INSERT into users(firstname,lastname,pword,email,date_joined)
VALUES ("Drew","Don",SHA2('Password123',512),"drew@project2.com",NOW());