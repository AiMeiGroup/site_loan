<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 下午3:35
 * To change this template use File | Settings | File Templates.
 */

namespace App\Api\Dao;

use Lavender\Dao\Exception;

class UserTable extends \Lavender\Dao\Table
{
	protected $database = 'loan';
	protected $table = 'person';


	public function get($ids, $fields = array(), array $filter = array(), $order = null, $offset = null, $length = null)
	{
		$condition = $this->build_condition($ids, $filter);
		return $this->db_handle_get($this->table, $condition, $fields, $order, $offset, $length);
	}

	public function db_handle_get($table, $condition, array $fields = array(), $order = null, $offset = null, $length = null)
	{
		if (!$this->db_handle->check_name($table)) {
			throw new Exception("table name invalid", Errno::PARAM_INVALID);
		}

		//check fields
		if (!empty($fields)) {
			if (!is_array($fields)) {
				throw new Exception("param fields not an array", Errno::PARAM_INVALID);
			}

			foreach ($fields as $field) {
				if (!$this->db_handle->check_name($field)) {
					throw new Exception("field \"{$field}\" invalid", Errno::PARAM_INVALID);
				}
			}

			$fields = implode(',', $fields);
		} else {
			$fields = '*';
		}

		$condition = $condition ? " WHERE {$condition}" : '';
		$sql = "SELECT {$fields} FROM {$table}{$condition}";
		$sql .= " ORDER BY CONVERT( name USING GBK) asc";
		if ($order) {
			if (!preg_match('/^[a-z0-9_\., ]+$/i', $order)) {
				throw new Exception("order exp \"{$order}\" is invalid", Errno::PARAM_INVALID);
			}
			$sql .= " , {$order}";
		}

		return $this->db_handle->get_by_sql($sql, $offset, $length);
	}

}