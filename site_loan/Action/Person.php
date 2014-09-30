<?php
namespace App\Action;

use App\Api\PersonManage;
use \Lavender\Filter;

class Person extends \Lavender\WebPage
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


		/***
	 * 保存数据
	 */
	public function  add_person_action()
	{

		 $param = $this->parameters(array(
			'user_id' => Filter::T_INT,
			'name' => Filter::T_STRING,
			'id_type' => Filter::T_STRING
			'id_number' => Filter::T_STRING,
			'regions' => Filter::T_STRING,
			'marriage_status' => Filter::T_INT,
			'children' => Filter::T_INT,
			'education' => Filter::T_INT,
			'salary' => Filter::T_INT
			'insurance' => Filter::T_INT,
			'insurance_num' => Filter::T_INT,
			'house_condition' => Filter::T_INT
			'is_buy_car' => Filter::T_INT,
			'is_overdue' => Filter::T_INT,
		),self::M_POST,true);

		try {
             
             PersonManage::add($param);

			common::ajax_success("数据保存成功！");
		} catch (Exception $e) {
			common::ajax_error("数据保存失败！");
		}
	}



}

