/*
SQLyog Enterprise - MySQL GUI
Host - 5.5.23 
*********************************************************************
Server version : 5.5.23
*/
/*!40101 SET NAMES utf8 */;

create table `borrow` (
	`id` double ,
	`user_id` double ,
	`type` double ,
	`title` varchar (765),
	`amount` varchar (765),
	`mode` varchar (765),
	`period` varchar (765),
	`closing_cost` varchar (765),
	`fundraising_days` double ,
	`status` double ,
	`remark` varchar (765),
	`start_time` datetime ,
	`end_time` datetime ,
	`created_on` datetime ,
	`modified_on` datetime 
); 
