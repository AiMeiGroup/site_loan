<?php

namespace App\Api;

use App\Api\Dao\CompanyTable;
use Lavender\Errno;
use Lavender\Exception;

class CompanyManage
{

	/**
	 *	新增数据
	 */
	public static function add(
		$id = null, 
		$user_id = null, 
		$name = null, 
		$type = null, 
		$industry = null, 
		$grade = null, 
		$position = null,
		$start_time = null, 
		$end_time = null, 
		$work_life = null, 
		$telephone = null, 
		$address = null,
		$website = null,
		$remark = null
		)
	{
		try {
			$arr["user_id"] = $user_id;
			$arr["name"] = $name;
			$arr["type"] = $type;
			$arr["industry"] = $industry;
			$arr["grade"] = $grade;
			$arr["position"] = $position;
			$arr["start_time"] = $start_time;
			$arr["end_time"] = $end_time;
			$arr["work_life"] = $work_life;
			$arr["telephone"] = $telephone;
			$arr["address"] = $address;
			$arr["website"] = $website;
			$arr["remark"] = $remark;
			$arr["created_on"] = date('Y-m-d H:i:s', time());
			$id = \Lavender\IdMaker::make('company');
			return Dao\CompanyTable::instance()->add($id, $arr);

		} catch (Exception $e) {
			throw($e);
		}
	}


	/**
	 * 	更新信息
	 */
	public static function update(
		$id = null, 
		$user_id = null, 
		$name = null, 
		$type = null, 
		$industry = null, 
		$grade = null, 
		$position = null,
		$start_time = null, 
		$end_time = null, 
		$work_life = null, 
		$telephone = null, 
		$address = null,
		$website = null,
		$remark = null)
	{
		try {
			$arr["user_id"] = $user_id;
			$arr["name"] = $name;
			$arr["type"] = $type;
			$arr["industry"] = $industry;
			$arr["grade"] = $grade;
			$arr["position"] = $position;
			$arr["start_time"] = $start_time;
			$arr["end_time"] = $end_time;
			$arr["work_life"] = $work_life;
			$arr["telephone"] = $telephone;
			$arr["address"] = $address;
			$arr["website"] = $website;
			$arr["remark"] = $remark;
           	$arr["modified_on"]=date('Y-m-d H:i:s',time());
			return Dao\CompanyTable::instance()->update($id, $arr_role);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 	根据ID获取数据
	 */
	public static function  get_data_by_id($id, $order = null, $offset = null, $length = null)
	{
		try {
			return Dao\CompanyTable::instance()->get($id, null, null, $order, $offset, $length);
		} catch (Exception $e) {
			throw($e);
		}
	}


	/**
	 * 根据USER_ID获取数据
	 */
	public static function  get_data_by_user($id, $user_id, $order = null, $offset = null, $length = null)
	{
		try {
			$filters["user_id"] = $user_id;
			return Dao\CompanyTable::instance()->get($id, null, $filters, $order, $offset, $length);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 根据ID删除数据
	 */
	public static function delete_data_by_id($id)
	{
		try {
			return Dao\CompanyTable::instance()->delete($id);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 获取所有的数据
	 */
	public static function get_data_count()
	{
		try {
			return Dao\CompanyTable::instance()->count(null);
		} catch (Exception $e) {
			throw($e);
		}
	}

}