-- database credentials
-- username: debian-sys-maint
-- password: KC04tFxqpPh4JypZ

CREATE DATABASE `62147_Petar_Yanakiev` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE `62147_Petar_Yanakiev`.`UserInfo` ( `firstName` VARCHAR(50) NOT NULL , `lastName` VARCHAR(50) NOT NULL , `year` INT UNSIGNED NOT NULL , `major` VARCHAR(30) NOT NULL , `facultyNumber` VARCHAR(10) NOT NULL , `groupNumber` INT UNSIGNED NOT NULL , `birthdate` DATE NOT NULL , `zodiacSign` VARCHAR(10) NOT NULL , `link` VARCHAR(100) NOT NULL , `imagePath` VARCHAR(100) NOT NULL , `motivation` TEXT NOT NULL , PRIMARY KEY (`facultyNumber`)) ENGINE = InnoDB;