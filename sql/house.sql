/*
SQLyog Enterprise - MySQL GUI
Host - 5.5.23 
*********************************************************************
Server version : 5.5.23
*/
/*!40101 SET NAMES utf8 */;

create table `house` (
	`id` double ,
	`user_id` double ,
	`address` varchar (1500),
	`area` varchar (765),
	`year` double ,
	`status` double ,
	`ower_1` varchar (765),
	`percent_1` varchar (765),
	`ower_2` varchar (765),
	`percent_2` varchar (765),
	`period` varchar (765),
	`monthly_payment` varchar (765),
	`residue` varchar (765),
	`bank` varchar (765),
	`created_on` datetime ,
	`modified_on` datetime 
); 
