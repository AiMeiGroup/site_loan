<?php
namespace App\Action;

use App\Api\DeptManage;
use \Lavender\Filter;

class Work_History extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);

	/**
	 * default action
	 *
	 * @return array
	 */
	public function index_action()
	{

	}


}

