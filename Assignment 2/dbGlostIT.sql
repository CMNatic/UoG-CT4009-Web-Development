/* 
Drop tables if they already exist with data, this is upon the first initilization, or can be used to reset the data for the application for a fresh start 

*/

DROP TABLE IF EXISTS `tbl_users`;
DROP TABLE IF EXISTS `tbl_bicycles`;

/*
Create tables in database 'glostit'
    - tbl_users - latin1
    - tbl_bicycles - latin1

Inserting collums with the following standard, to allow entry of data from the application:
*/
CREATE TABLE `tbl_users` (
	`First_Name` varchar(20) NOT NULL,
	`Sur_Name` varchar(20) NOT NULL,
	`email` varchar(25) NOT NULL PRIMARY KEY,
	`password` varchar(200) NOT NULL,
	`RegistrationDate` DATE NOT NULL,
	`VerificationCode` varchar(16),
	`IsVerified` tinyint(1)
);

CREATE TABLE `tbl_bicycles` (
    `MPNNbr`, varchar(26) NOT NULL,
    `Brand`, varchar(16) NOT NULL,
    `Type`, varchar(16) NOT NULL,
    `Gears`, tinyint(1) NOT NULL,
    `Accessories`, varchar(200) NOT NULL,
    `Colour`, varchar (16) NOT NULL,
    `Image` longblob NOT NULL,
    PRIMARY KEY('images')) TYPE = mariaDB
