<?php 

namespace App\Api;

use App\Api\Dao\BorrowTable;
use Lavender\Errno;
use Lavender\Exception;

class BorrowManage
{

	/**
	 *	新增数据
	 */
	public static function add(
		$id = null, 
		$user_id = null, 
		$type = null, 
		$title = null, 
		$amout = null, 
		$mode = null, 
		$period = null,
		$closing_cost = null, 
		$fundraising = null, 
		$status = null, 
		$remark = null, 
		$start_time = null,
		$end_time = null
		)
	{
		try {
			$arr["user_id"] = $user_id;
			$arr["type"] = $type;
			$arr["title"] = $title;
			$arr["amout"] = $amout;
			$arr["mode"] = $mode;
			$arr["period"] = $period;
			$arr["closing_cost"] = $closing_cost;
			$arr["fundraising"] = $fundraising;
			$arr["status"] = $status;
			$arr["remark"] = $remark;
			$arr["start_time"] = $start_time;
			$arr["end_time"] = $end_time;
			$arr["created_on"] = date('Y-m-d H:i:s', time());
			$id = \Lavender\IdMaker::make('borrow');
			return Dao\BorrowTable::instance()->add($id, $arr);

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
		$type = null, 
		$title = null, 
		$amout = null, 
		$mode = null, 
		$period = null,
		$closing_cost = null, 
		$fundraising = null, 
		$status = null, 
		$remark = null, 
		$start_time = null,
		$end_time = null)
	{
		try {
			$arr["user_id"] = $user_id;
			$arr["type"] = $type;
			$arr["title"] = $title;
			$arr["amout"] = $amout;
			$arr["mode"] = $mode;
			$arr["period"] = $period;
			$arr["closing_cost"] = $closing_cost;
			$arr["fundraising"] = $fundraising;
			$arr["status"] = $status;
			$arr["remark"] = $remark;
			$arr["start_time"] = $start_time;
			$arr["end_time"] = $end_time;
           	$arr["modified_on"]=date('Y-m-d H:i:s',time());
			return Dao\BorrowTable::instance()->update($id, $arr_role);
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
			return Dao\BorrowTable::instance()->get($id, null, null, $order, $offset, $length);
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
			return Dao\BorrowTable::instance()->get($id, null, $filters, $order, $offset, $length);
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
			return Dao\BorrowTable::instance()->delete($id);
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
			return Dao\BorrowTable::instance()->count(null);
		} catch (Exception $e) {
			throw($e);
		}
	}

}