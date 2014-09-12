/*
SQLyog Enterprise - MySQL GUI
Host - 5.5.23 
*********************************************************************
Server version : 5.5.23
*/
/*!40101 SET NAMES utf8 */;

create table `company` (
	`id` double ,
	`user_id` double ,
	`name` varchar (765),
	`type` double ,
	`industry` double ,
	`grade` double ,
	`position` double ,
	`start_time` datetime ,
	`end_time` datetime ,
	`work_life` double ,
	`telephone` varchar (765),
	`address` varchar (765),
	`website` varchar (765),
	`remark` varchar (1500),
	`created_on` datetime ,
	`modified_on` datetime 
); 
