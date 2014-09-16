
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 下午3:38
 * To change this template use File | Settings | File Templates.
 */

namespace App\Api;

use App\Api\Dao\HouseTable;
use Lavender\Errno;
use Lavender\Exception;

class HouseManage
{

	/**
	 *新增数据
	 */
	public static function add($username, $password, $name, $dept_id, $role_id, $mobile, $email, $create_user_id)
	{
		try {

			$arr["username"] = $username;
			$arr["name"] = $name;
			$arr["password"] = $password;
			$arr["dept_id"] = $dept_id;
			$arr["role_id"] = $role_id;
			$arr["mobile"] = $mobile;
			$arr["email"] = $email;
			$arr["create_user_id"] = $create_user_id;
			$arr["create_time"] = date('Y-m-d H:i:s', time());
			$id = \Lavender\IdMaker::make('user');
			return Dao\HouseTable::instance()->add($id, $arr);


		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 判断用户名是否重复
	 * 传入ID有值时表示修改时判断
	 */
	public static function bol_exist_username($username, $id = null)
	{
		try {
			$exist = true;
			$filtes["username"] = $username;
			$data = UserTable::instance()->get(null, null, $filtes);
			if (!isset($data) || count($data) <= 0) {
				return false;

			}
			//新增
			if (!isset($id)) {
				return true;
			} else {
				//修改
				//修改时需求判断用户名是否存在,要排除当前的用户名id
				if (count($data) == 1) {
					if ($data[0]["id"] == $id) {
						$exist = false;
					}
				}
			}

			return $exist;
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 更新用户信息
	 * 更新用户姓名，部门，角色，电话 ，邮件
	 */
	public static function  update($id, $name, $dept_id, $role_id, $mobile, $email)
	{
		try {
			if (isset($name)) {
				$arr["name"] = $name;
			}
			if (isset($dept_id)) {
				$arr["dept_id"] = $dept_id;
			}
			if (isset($role_id)) {
				$arr["role_id"] = $role_id;
			}
			if (isset($mobile)) {
				$arr["mobile"] = $mobile;
			}
			if (isset($email)) {
				$arr["email"] = $email;
			}
			return Dao\UserTable::instance()->update($id, $arr);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 根据ID查用户信息
	 */
	public static function get_data_by_id($id, $dept_id = null, $role_id = null, $name = null, $order = null, $offset = null, $length = null)
	{
		try {

			if (isset($dept_id)) {
				$filtes["dept_id"] = $dept_id;
			}
			if (isset($role_id)) {
				$filtes["role_id"] = $role_id;
			}
			if (isset($name)) {
				$filtes["name"] = $name;
			}
			$filds = array('id', 'username', 'name', 'dept_id', 'role_id', 'mobile', 'email', 'status', 'create_user_id', 'create_time','group_id');
			return UserTable::instance()->get($id, $filds, $filtes, $order, $offset, $length);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 根据ID查用户信息
	 */
	public static function search_data($id = null, $dept_id = null, $role_id = null, $name = null, $username = null, $order = null, $offset = null, $length = null)
	{
		try {

			if (isset($dept_id)) {
				$filtes["dept_id"] = $dept_id;
			}
			if (isset($role_id)) {
				$filtes["role_id"] = $role_id;
			}
			if (isset($name)) {
				$filtes["name"] = $name;
			}
			if (isset($username)) {
				$filtes["username"] = $username;
			}
			$filds = array('id', 'username', 'name', 'dept_id', 'role_id', 'mobile', 'email', 'status', 'create_user_id', 'create_time');
			return UserTable::instance()->get($id, $filds, $filtes, $order, $offset, $length);
		} catch (Exception $e) {
			throw($e);
		}
	}

	public static function get_search_count($id = null, $dept_id = null, $role_id = null, $name = null, $username = null)
	{
		try {

			if (isset($dept_id)) {
				$filtes["dept_id"] = $dept_id;
			}
			if (isset($role_id)) {
				$filtes["role_id"] = $role_id;
			}
			if (isset($name)) {
				$filtes["name"] = $name;
			}
			if (isset($username)) {
				$filtes["username"] = $username;
			}
			$filds = array('id', 'username', 'name', 'dept_id', 'role_id', 'mobile', 'email', 'status', 'create_user_id', 'create_time');
			return UserTable::instance()->count($id, $filtes);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 根据用户名查用户信息
	 */
	public static function get_data_by_name($username)
	{
		try {

			$filtes["username"] = $username;
			$filds = array('id', 'username', 'name','role_id', 'mobile', 'email', 'status', 'created_user_id', 'created_on');
			return UserTable::instance()->get(null, $filds, $filtes);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 根据用户ID删除数据
	 */
	public static function  del_data_by_id($id)
	{
		try {
			return UserTable::instance()->delete($id);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 修改用户密码
	 */
	public static function  modify_password($id, $password)
	{
		try {

			$filtes["password"] = $password;
			return UserTable::instance()->update($id, $filtes);
		} catch (Exception $e) {
			throw($e);
		}
	}

	/**
	 * 登陆验证
	 * 用户名，用户密码必须
	 */
	public static function  bol_login_valid($username, $password)
	{
		try {

			if (!isset($username)) {
				throw new Exception("username is not empty！", Errno::INPUT_PARAM_INVALID);
			}

			if (!isset($password)) {
				throw new Exception("password is not empty！", Errno::INPUT_PARAM_INVALID);
			}

			$filtes["password"] = $password;
			$filtes["username"] = $username;
			$data = UserTable::instance()->get(null, array(), $filtes);
			if (isset($data) && count($data) > 0) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			throw($e);
		}
	}

	/***
	 * @return int 返回所有数据的数量
	 * @throws \Exception|\Lavender\Exception
	 */
	public static function  get_data_count()
	{
		try {
			return UserTable::instance()->count(null);
		} catch (Exception $e) {
			throw($e);
		}
	}



}