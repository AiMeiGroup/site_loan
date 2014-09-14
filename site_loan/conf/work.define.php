<?php
/**
 * 页面常用固定值
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-11-8
 * Time: 下午3:04
 * To change this template use File | Settings | File Templates.
 */

//需求状态 待审核=101（市场反馈）
$combox_status = array('0' => "待评审", '1' => "待开发", '2' => "开发中", '3' => "完成", '4' => '拒绝', '5' => '关闭', '101' => '待审核');

//需求来源
$combox_task_source = array('1' => "市场反馈", '2' => "产品测试", '3' => "推广需求", '4' => '内部定义');

//优先级
$combox_priority = array('2' => "P0", '1' => "P1", '3' => "P2");

//bug状态 已提交、已解决、已关闭、挂起、拒绝、待审核=101（市场反馈）
$combox_bug_status = array('0' => "已提交", '1' => "已解决", '2' => "已关闭", '3' => '挂起', '4' => '拒绝', '101' => '待审核');

//默认bug优先级（添加界面需要）
$default_bug_priority = '2';
//bug 优先级 致命、严重、一般、轻微、建议
$combox_bug_priority = array('0' => "致命", '1' => "严重", $default_bug_priority => "一般", '3' => '轻微', '4' => '建议');


//评审缺陷ID
$review_bug_source = '4';
//bug 来源
$combox_bug_source = array('1' => "市场反馈", '2' => "内部测试", $review_bug_source => "产品评审");

//bug 类别 目前只给评审缺陷使用
$combox_bug_type = array('1' => "产品定义", '2' => "项目管理计划", '3' => "维修手册说明书信息", '4' => "工业设计", '5' => "硬件", '6' => "其他");


//缺陷类型

#region bug状态
$bug_status_new = 0;
$bug_status_solve = 1;
$bug_status_close = 2;
$bug_status_supend = 3;
$bug_status_refuse = 4;
$bug_status_need_check = 101;

#ednregion

//全部
$select_all_tag = -1;

//默认的缺陷描述
$default_bug_description = "<p>【测试设备及系统】</p><p>【测试语言】</p><p>【缺陷描述】</p><p>【测试步骤】</p>";

//项目状态
$combox_project_status = array('0' => "使用", '1' => "废弃");

//测试用例等级
$combox_case_rank = array('A' => "A", 'B' => "B", 'C' => "C", 'D' => "D");

//测试用例结果
$combox_case_result = array('PASS' => 'PASS', 'FAILED' => 'FAILED', 'N/A' => 'N/A', 'NO RUN' => 'NO RUN');

//发布管理系统
$combox_environment_type = array('0' => "测试", '1' => "预发布", '2' => "正式");

//发布管理系统服务器中间保存地址
$final_folder = "/data/test/code_backup";

//发布管理系统服务器端口号
$ser_port = "2222";

//发布管理系统发布状态
$combox_status_type = array('0' => "未发布", '1' => "已发布测试版本", '2' => "已发布预发布版本", '3' => "已发布正式版本");

//发布管理系统服务器中间保存地址
//$final_folder = "/data/test/code_backup/";