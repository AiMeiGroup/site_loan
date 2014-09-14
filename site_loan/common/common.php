<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 上午9:37
 * To change this template use File | Settings | File Templates.
 */

namespace App\common;

use Lavender\Exception;


class common extends \Lavender\WebPage
{

	/**
	 * Ajax方式返回消息数据到客户端
	 * @access protected
	 * @param mixed   $data   要返回的数据
	 * @param String  $info   提示信息
	 * @param boolean $status 返回状态 1=success  0=fail
	 * @param String  $status ajax返回类型 JSON XML
	 * @return void
	 */
	public static function ajax_return_info($data, $info = '', $status = 1, $type = 'JSON')
	{
		$result = array();
		$result['status'] = $status;
		$result['info'] = $info;
		$result['data'] = $data;
		if (strtoupper($type) == 'JSON') {
			// 返回JSON数据格式到客户端 包含状态信息
			header("Content-Type:text/html; charset=utf-8");
			exit(json_encode($result));
		} elseif (strtoupper($type) == 'XML') {
			// 返回xml格式数据
			header("Content-Type:text/xml; charset=utf-8");
			exit(xml_encode($result));
		}
	}

	/**
	 * Ajax方式返回成功消息数据到客户端
	 * @access protected
	 * @param mixed  $data   要返回的数据
	 * @param String $info   提示信息
	 * @param String $status ajax返回类型 JSON XML
	 * @return void
	 */
	public static function  ajax_success($info = '', $type = 'JSON')
	{
		self::ajax_return_info("", $info, 1, $type);
	}

	/**
	 * Ajax方式返回失败消息数据到客户端
	 * @access protected
	 * @param mixed  $data   要返回的数据
	 * @param String $info   提示信息
	 * @param String $status ajax返回类型 JSON XML
	 * @return void
	 */
	public static function  ajax_error($info = '', $type = 'JSON')
	{
		self::ajax_return_info("", $info, 0, $type);
//        $this::ajax_return_info($data,$info,0,$type);
	}


	/**
	 * Ajax方式返回数据到客户端
	 * @access protected
	 * @param mixed  $data 要返回的数据
	 * @param String $type AJAX返回数据格式 默认json
	 * @return void
	 */
	public static function ajax_return_data($data, $type = 'json')
	{
		if (func_num_args() > 2) { // 兼容3.0之前用法
			$args = func_get_args();
			array_shift($args);
			$info = array();
			$info['data'] = $data;
			$info['info'] = array_shift($args);
			$info['status'] = array_shift($args);
			$data = $info;
			$type = $args ? array_shift($args) : '';
		}
		switch (strtoupper($type)) {
			case 'JSON' :
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				exit(json_encode($data));
			case 'XML'  :
				// 返回xml格式数据
				header('Content-Type:text/xml; charset=utf-8');
				exit(xml_encode($data));
//            case 'JSONP':
//                // 返回JSON数据格式到客户端 包含状态信息
//                header('Content-Type:application/json; charset=utf-8');
//                $handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
//                exit($handler.'('.json_encode($data).');');
			case 'EVAL' :
				// 返回可执行的js脚本
				header('Content-Type:text/html; charset=utf-8');
				exit($data);
			default     :
				// 用于扩展其他返回格式数据
				exit($data);
		}
	}

	/**
	 * 返回用户字段信息
	 */
	public static function get_user_info($name)
	{
		try {
			if (self::$instance->session->is_valid()) {
				return self::$instance->session->offsetGet(L_USERINFO)[$name];
			} else {
//                //没有登录就直接跳转
//                $url = "?action=login.login";
//                echo "<script language='javascript' type='text/javascript'>";
//                echo "window.top.location.href='$url'";
//                echo "</script>";
//                exit;
				return "";
			}
		} catch (Exception $e) {
			//没有登录就直接跳转
//            $url = "?action=login.login";
//            echo "<script language='javascript' type='text/javascript'>";
//            echo "window.top.location.href='$url'";
//            echo "</script>";
////            echo($e);
			return "";
//            exit;
		}

	}

}