<?php 

namespace App\Api;

use App\Api\Dao\LoanTable;
use Lavender\Errno;
use Lavender\Exception;

class LoanManage
{


	/**
	 * 	根据ID获取数据
	 */
	public static function  get_data_by_id($id, $order = null, $offset = null, $length = null)
	{
		try {
			return Dao\LoanTable::instance()->get($id, null, null, $order, $offset, $length);
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
			return Dao\LoanTable::instance()->delete($id);
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
			return Dao\LoanTable::instance()->count(null);

		} catch (Exception $e) {
			throw($e);
		}
	}


	public static function get_last_loans()
	{
		try {
		    $order="created_on desc";
			
			return Dao\LoanTable::instance()->get(null,array(),null,$order,0,10);
		} catch (Exception $e) {
			throw($e);
		}
	}



}