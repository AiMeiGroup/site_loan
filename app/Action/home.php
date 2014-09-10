<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 上午11:14
 * To change this template use File | Settings | File Templates.
 */

namespace App\Action;


class Home extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);

	public function  index_action()
	{

	}

}