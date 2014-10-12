<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 上午11:14
 * To change this template use File | Settings | File Templates.
 */

namespace App\Action;

use App\Api\LoanManage;

class Member extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);

	public function  account_action()
	{

	}

	public function  user_info_action()
	{

	}

}