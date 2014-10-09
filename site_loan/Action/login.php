<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 上午11:14
 * To change this template use File | Settings | File Templates.
 */

namespace App\Action;

use App\Api\SendMes;
use App\Api\UserManage;
use App\common\common;
use Lavender\Exception;
use Lavender\Session;

class login extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);

	public function  login_action()
	{

	}

	public function  logon_action()
	{

//var_dump($_POST["username"]);
//var_dump($_POST["userpsw"]);
		try {
			if (isset($_POST["username"]) && isset($_POST["userpsw"])) {
				if (UserManage::bol_login_valid($_POST["username"], sha1($_POST["userpsw"]))) {

					//获取用户信息
					$data = UserManage::get_data_by_name($_POST["username"]);
					$this->set_cookie(self::SESSION_KEY_NAME, $this->session->create($data[0]["id"], time()), time() + 60 * 60 * 24);
					//将用户信息存入session
					$this->session->offsetSet(L_USERINFO, $data[0]);
					common::ajax_success("登陆成功！");
				} else {
					common::ajax_error("用户名或密码错误！");

				}
			}
		} catch (Exception $e) {
//			echo($e);
			common::ajax_error("登录失败！");
		}

	}

	public function  logout_action()
	{

		$this->session->destroy();
		$this->redirect('?action=login.login');
	}
}