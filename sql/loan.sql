/*
SQLyog Enterprise - MySQL GUI v6.03
Host - 5.5.23 : Database - loan
*********************************************************************
Server version : 5.5.23
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `loan`;

USE `loan`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `action` */

DROP TABLE IF EXISTS `action`;

CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '功能名称',
  `remark` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `action` */

insert  into `action`(`id`,`name`,`remark`,`created_on`,`modified_on`) values (1,'home.index','访问首页','2013-09-24 20:27:05','2013-09-24 20:27:05');

/*Table structure for table `borrow` */

DROP TABLE IF EXISTS `borrow`;

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `type` int(11) NOT NULL COMMENT '借款种类：1：普通标，2：担保标，3：秒还标，4：净值标，5：抵押标',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `amount` varchar(255) DEFAULT NULL COMMENT '借款金额',
  `mode` varchar(255) DEFAULT NULL COMMENT '还款方式：1：按天到期还款，2：按月分期还款，3按季分期还款，4：每月还息到期还本',
  `period` varchar(255) DEFAULT NULL COMMENT '借款期限：1:30天内，2:1个月，3:1-3个月，4:6-12个月，5:12个月以上',
  `closing_cost` varchar(255) DEFAULT NULL COMMENT '借款手续费',
  `fundraising_days` int(11) DEFAULT NULL COMMENT '筹款天数',
  `status` int(11) DEFAULT NULL COMMENT '状态：1:未审核，2：审核通过，3：审核不通过',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `start_time` datetime NOT NULL COMMENT '开始时间',
  `end_time` datetime NOT NULL COMMENT '结束时间',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `borrow` */

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `type` int(11) DEFAULT NULL COMMENT '公司性质:1:政府机关,2:国有企业,3:国内私营企业，4:台(港,澳)资企业,5:外资企业,6:合资企业,7:个体户,8:事业性单位',
  `industry` int(11) DEFAULT NULL COMMENT '公司行业:1:农、林、牧、渔业,2:制造业,3:电力、燃气及水的生产和供应业,4:建筑业,5:交通运输、仓储和邮政业,6:信息传输、计算机服务和软件业,7:批发和零售业,8:金融业,9:房地产业,10:采矿业,11:租赁和商务服务业,12:科学研究、技术服务和地质勘查业,13:水利、环境和公共设施管理业,14:居民服务和其他服务业,15:教育,16:卫生、社会保障和社会福利业,17:文化、体育和娱乐业,18:公共管理和社会组织,19:国际组织',
  `grade` int(11) DEFAULT NULL COMMENT '工作级别:0:请选择,1:普通员工,2:管理人员,3:股东,4:私营业主',
  `position` int(11) DEFAULT NULL COMMENT '职位：',
  `start_time` datetime DEFAULT NULL COMMENT '服务开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '服务结束时间',
  `work_life` int(11) DEFAULT NULL COMMENT '工作年限:0:一年以内,1:一年以上,2:二年以上,3:三年以上,4:四年以上,5:五年以上,6:六年以上',
  `telephone` varchar(255) DEFAULT NULL COMMENT '工作电话',
  `address` varchar(255) DEFAULT NULL COMMENT '公司地址',
  `website` varchar(255) DEFAULT NULL COMMENT '公司网站',
  `remark` varchar(500) DEFAULT NULL COMMENT '备注说明',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `company` */

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `telephone` varchar(500) NOT NULL COMMENT '居住电话',
  `cellphone` int(11) NOT NULL COMMENT '手机号码',
  `province` int(11) NOT NULL COMMENT '居住所在省市',
  `city` int(11) NOT NULL COMMENT '居住所在市',
  `county` int(11) DEFAULT NULL COMMENT '居住所在县城',
  `post_code` int(11) DEFAULT NULL COMMENT '居住地邮编',
  `address` varchar(500) DEFAULT NULL COMMENT '现居住地址',
  `MSN` varchar(500) DEFAULT NULL COMMENT 'MSN',
  `QQ` varchar(500) DEFAULT NULL COMMENT 'QQ',
  `taobao` varchar(500) DEFAULT NULL COMMENT '淘宝旺旺',
  `second_contact_name` varchar(500) DEFAULT NULL COMMENT '第二联系人姓名',
  `second_contact_relation` int(11) DEFAULT NULL COMMENT '第二联系人关系：1:配偶,2:父亲,3:母亲,4:兄弟姐妹,5:子女',
  `second_contatc_telephone` varchar(500) DEFAULT NULL COMMENT '第二联系人电话',
  `second_contatc_cellphone` int(11) DEFAULT NULL COMMENT '第二联系人手机',
  `third_contact_name` varchar(500) DEFAULT NULL COMMENT '第三联系人姓名',
  `third_contact_relation` int(11) DEFAULT NULL COMMENT '第三联系人关系：1:配偶,2:父亲,3:母亲,4:兄弟姐妹,5:子女',
  `third_contatc_telephone` varchar(500) DEFAULT NULL COMMENT '第三联系人电话',
  `third_contatc_cellphone` int(11) DEFAULT NULL COMMENT '第三联系人手机',
  `four_contact_name` varchar(500) DEFAULT NULL COMMENT '第四联系人姓名',
  `four_contact_relation` int(11) DEFAULT NULL COMMENT '第四联系人关系：1:配偶,2:父亲,3:母亲,4:兄弟姐妹,5:子女',
  `four_contatc_telephone` varchar(500) DEFAULT NULL COMMENT '第四联系人电话',
  `four_contatc_cellphone` int(11) DEFAULT NULL COMMENT '第四联系人手机',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `contact` */

/*Table structure for table `education` */

DROP TABLE IF EXISTS `education`;

CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `degree` int(11) NOT NULL COMMENT '最高学历',
  `school` varchar(500) NOT NULL COMMENT '最高学历学校名称',
  `address` varchar(500) DEFAULT NULL COMMENT '最高学历学校地址',
  `major` varchar(500) DEFAULT NULL COMMENT '学习的专业',
  `start_date` date NOT NULL COMMENT '开始日期',
  `end_date` date NOT NULL COMMENT '结束日期',
  `created_on` datetime DEFAULT NULL COMMENT '创建日期',
  `modified_on` datetime DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `education` */

/*Table structure for table `finance` */

DROP TABLE IF EXISTS `finance`;

CREATE TABLE `finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `finance` */

/*Table structure for table `house` */

DROP TABLE IF EXISTS `house`;

CREATE TABLE `house` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `address` varchar(500) NOT NULL COMMENT '房产地址',
  `area` varchar(255) NOT NULL COMMENT '建筑面积',
  `year` int(11) NOT NULL COMMENT '年份',
  `status` int(11) DEFAULT NULL COMMENT '供款状态：0:已供完房款,1:按揭中',
  `ower_1` varchar(255) DEFAULT NULL COMMENT '所有权人1',
  `percent_1` varchar(255) DEFAULT NULL COMMENT '产权份额1',
  `ower_2` varchar(255) DEFAULT NULL COMMENT '所有权人2',
  `percent_2` varchar(255) DEFAULT NULL COMMENT '产权份额2',
  `period` varchar(255) DEFAULT NULL COMMENT '贷款年限',
  `monthly_payment` varchar(255) DEFAULT NULL COMMENT '月供',
  `residue` varchar(255) DEFAULT NULL COMMENT '贷款余款',
  `bank` varchar(255) DEFAULT NULL COMMENT '贷款银行',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `house` */

/*Table structure for table `kv_session` */

DROP TABLE IF EXISTS `kv_session`;

CREATE TABLE `kv_session` (
  `id` int(11) NOT NULL,
  `data` text,
  `flags` tinyint(4) NOT NULL,
  `updated` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kv_session` */

insert  into `kv_session`(`id`,`data`,`flags`,`updated`) values (262,'{\"secret\":\"13681133971410363771\",\"userinfo\":{\"id\":\"262\",\"username\":\"dejian.liang\",\"name\":\"梁德坚\",\"dept_id\":\"1\",\"role_id\":\"48\",\"mobile\":\"\",\"email\":\"dejian.liang@cnlaunch.com\",\"status\":\"0\",\"create_user_id\":\"1\",\"create_time\":\"2014-03-24 20:04:40\"}}',1,1410363771);

/*Table structure for table `other` */

DROP TABLE IF EXISTS `other`;

CREATE TABLE `other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `ability` varchar(1000) DEFAULT NULL COMMENT '个人能力',
  `hobby` varchar(1000) DEFAULT NULL COMMENT '个人爱好',
  `remark` varchar(1000) DEFAULT NULL COMMENT '其它说明',
  `created_on` datetime DEFAULT NULL COMMENT '创建日期',
  `modified_on` datetime DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `other` */

/*Table structure for table `owner` */

DROP TABLE IF EXISTS `owner`;

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `type` int(11) NOT NULL COMMENT '公司行业:1:农、林、牧、渔业,2:制造业,3:电力、燃气及水的生产和供应业,4:建筑业,5:交通运输、仓储和邮政业,6:信息传输、计算机服务和软件业,7:批发和零售业,8:金融业,9:房地产业,10:采矿业,11:租赁和商务服务业,12:科学研究、技术服务和地质勘查业,13:水利、环境和公共设施管理业,14:居民服务和其他服务业,15:教育,16:卫生、社会保障和社会福利业,17:文化、体育和娱乐业,18:公共管理和社会组织,19:国际组织',
  `register_date` datetime NOT NULL COMMENT '成立日期',
  `place` varchar(500) NOT NULL COMMENT '经营场所',
  `rent` varchar(500) DEFAULT NULL COMMENT '租金',
  `tenancy` int(11) DEFAULT NULL COMMENT '租期',
  `tax_number` varchar(500) DEFAULT NULL COMMENT '税务编号',
  `registrater_number` varchar(500) DEFAULT NULL COMMENT '工商登记号',
  `profit_loss` varchar(500) DEFAULT NULL COMMENT '全年盈利/亏损额',
  `emploees` int(11) DEFAULT NULL COMMENT '员工人数',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `owner` */

/*Table structure for table `person` */

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) NOT NULL COMMENT '真实姓名',
  `id_type` varchar(255) NOT NULL COMMENT '证件类型',
  `id_number` varchar(255) NOT NULL COMMENT '证件号码',
  `regions` varchar(255) DEFAULT NULL COMMENT '籍贯',
  `marriage_status` int(11) DEFAULT NULL COMMENT '婚姻情况：0：未婚 1：已婚',
  `children` int(11) DEFAULT NULL COMMENT '子女：0：无,1:1个,2:2个,3:3个,4:4个,5:4个以上 ',
  `education` int(11) DEFAULT NULL COMMENT '学历：1:小学,2:高中,3:大专,4:大专,5:本科,6:研究生,7:硕士,8:博士,9:博士后,10:其它,11:职专、中专',
  `salary` int(11) DEFAULT NULL COMMENT '工资：1:1000元以下,2:1001-2000元,3:2001-3000元,4:3001-4000元,5:4001-5000元,6:5001-6000元,7:6001-7000元,8:7001-8000元,9:8001-10000元,10:10001-30000元,11:30001-50000元,12:50000元以上            ',
  `insurance` int(11) DEFAULT NULL COMMENT '社保：0:没有,1:有',
  `insurance_num` int(11) DEFAULT NULL COMMENT '社保电脑号',
  `house_condition` int(11) DEFAULT NULL COMMENT '住房条件：0:租房,1:自有房子,3其它',
  `is_buy_car` int(11) DEFAULT NULL COMMENT '是否购车：0:没有,1:有',
  `is_overdue` int(11) DEFAULT NULL COMMENT '逾期记录：0:没有,1:有',
  `created_on` datetime DEFAULT NULL COMMENT '创建日期',
  `modified_on` datetime DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `person` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色表';

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`description`,`created_on`,`modified_on`) values (1,'管理员组','超级管理员','2013-09-24 20:24:37','2013-09-24 20:24:37');

/*Table structure for table `role_action` */

DROP TABLE IF EXISTS `role_action`;

CREATE TABLE `role_action` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `action_ids` varchar(1000) DEFAULT NULL COMMENT '功能集合',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `role_action` */

insert  into `role_action`(`id`,`role_id`,`action_ids`,`created_on`,`modified_on`) values (1,1,'[\"2\",\"7\",\"9\",\"3\",\"11\",\"4\",\"13\",\"5\",\"17\",\"1\",\"100\",\"102\",\"41\",\"43\",\"6\"]','2013-09-24 20:37:41','2013-09-24 20:37:41');

/*Table structure for table `spouse` */

DROP TABLE IF EXISTS `spouse`;

CREATE TABLE `spouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `name` varchar(500) NOT NULL COMMENT '配偶姓名',
  `salary` varchar(500) DEFAULT NULL COMMENT '每月薪金/每月工资',
  `cellphone` int(11) DEFAULT NULL COMMENT '移动电话',
  `telephone` varchar(500) DEFAULT NULL COMMENT '单位电话',
  `type` int(11) DEFAULT NULL COMMENT '公司行业:1:农、林、牧、渔业,2:制造业,3:电力、燃气及水的生产和供应业,4:建筑业,5:交通运输、仓储和邮政业,6:信息传输、计算机服务和软件业,7:批发和零售业,8:金融业,9:房地产业,10:采矿业,11:租赁和商务服务业,12:科学研究、技术服务和地质勘查业,13:水利、环境和公共设施管理业,14:居民服务和其他服务业,15:教育,16:卫生、社会保障和社会福利业,17:文化、体育和娱乐业,18:公共管理和社会组织,19:国际组织',
  `position` int(11) DEFAULT NULL COMMENT '职位：',
  `address` varchar(500) DEFAULT NULL COMMENT '单位地址',
  `monthly_income` varchar(500) DEFAULT NULL COMMENT '月收入',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `spouse` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '登陆账号',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `name` varchar(20) NOT NULL COMMENT '用户名',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '状态0：禁用，1：启用',
  `created_on` datetime NOT NULL COMMENT '创建日期',
  `modified_on` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=731 DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`name`,`role_id`,`mobile`,`email`,`status`,`created_on`,`modified_on`) values (1,'admin','50ee99bb70b37dfd713de32880a534bb35dd0888','超级管理员',1,'15815513380','admin@cnlaunch.com',1,'2013-09-24 20:27:05','2013-09-24 20:27:05');

/*Table structure for table `work_history` */

DROP TABLE IF EXISTS `work_history`;

CREATE TABLE `work_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `company_name` varchar(500) NOT NULL COMMENT '公司名称',
  `address` varchar(500) DEFAULT NULL COMMENT '公司地址',
  `department` varchar(500) DEFAULT NULL COMMENT '工作部门',
  `contact` varchar(500) DEFAULT NULL COMMENT '联系人',
  `cellphone` int(11) DEFAULT NULL COMMENT '联系电话',
  `start_date` date DEFAULT NULL COMMENT '开始日期',
  `end_date` date DEFAULT NULL COMMENT '结束日期',
  `created_on` datetime DEFAULT NULL COMMENT '创建日期',
  `modified_on` datetime DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `work_history` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
