<?php
namespace App\Action;


use App\common\common;
use Lavender\Exception;
use Lavender\Filter;

class Borrow extends \Lavender\WebPage
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
	public function  save_action()
	{
		try {

			$user_id = common::get_user_info("id");
			if (isset($_POST["project_id2"]) && trim($_POST["project_id2"]) != "") {
				$project_id = $_POST["project_id2"];
			} else if (isset($_POST["project_id1"]) && trim($_POST["project_id1"]) != "") {
				$project_id = $_POST["project_id1"];
			}

			//更新信息 返回id
			$result = BugManage::add(null, $_POST["title"], $_POST["content"], 0, $user_id,
				$_POST["target_user_id"], $_POST["source"], $_POST["type"], $project_id,
				$_POST["deadline"], $_POST["priority"], $_POST["version"]);

			$tittle = "新建 by " . common::get_user_info("name") . " to " . $_POST["target_user_name"];
			BugCommentManage::add($result, $tittle, $user_id, "");

			//写邮件
			$this->send_mail($_POST["target_user_id"], $_POST["title"], 0, $_POST["priority"], $project_id, self::cur_page_detail_url($result));
//            SendMes::send_mail_assy('http://127.0.0.1/rms/?action=bug.send_mail_service');
			common::ajax_success("数据保存成功！");
		} catch (Exception $e) {
			common::ajax_error("数据保存失败！");
		}
	}



	/***
	 * 编辑数据
	 */
	public function update_action()
	{
		try {
			if (isset($_POST["id"])) {
				$user_id = common::get_user_info("id");
				if (isset($_POST["project_id2"]) && trim($_POST["project_id2"]) != "") {
					$project_id = $_POST["project_id2"];
				} else if (isset($_POST["project_id1"]) && trim($_POST["project_id1"]) != "") {
					$project_id = $_POST["project_id1"];
				}

				$result = BugManage::update($_POST["id"], $_POST["title"], $_POST["content"], null, null,
					$_POST["target_user_id"], $_POST["source"], $_POST["type"], $project_id,
					$_POST["deadline"], $_POST["priority"], $_POST["version"]);


				$tittle = "编辑 by " . common::get_user_info("name") . " to " . $_POST["target_user_name"];
				BugCommentManage::add($_POST["id"], $tittle, $user_id, "");
				\App\Api\MarketFeedback::update($_POST["id"], array('target_user_id' => $_POST["target_user_id"]));

				common::ajax_success("数据保存成功！");
			}
		} catch (Exception $e) {
			common::ajax_error("数据保存失败！");
		}

	}



/***
	 * 列出全部的借款信息
	 * @return array
	 */
	public function  list_all_borrow_action()
	{
		//所有的查询界面 用 search_params 作为参数传递出去(GET)
//            var_dump($_GET);
		$search_params = $this->parameters(array('project_id1' => Filter::T_INT, 'project_id2' => Filter::T_INT,
			'version' => Filter::T_STRING, 'status' => Filter::T_INT, 'create_user_id' => Filter::T_INT, 'target_user_id' => Filter::T_INT, 'priority' => Filter::T_INT, 'source' => Filter::T_INT,
			'start_create_time' => Filter::T_STRING, 'end_create_time' => Filter::T_STRING, 'id' => Filter::T_STRING, 'p' => Filter::T_INT), self::M_GET, false);
//var_dump($search_params);
		$user_id = common::get_user_info("id");
		$listrow = 10;
		$str_url = "action=bug.list_all_task";
		foreach ($search_params as $key => $velue) {
			if (!isset($velue) || $velue === "" || $key == "action" || $velue == -1) {
				unset($search_params[$key]);
			} else {
				$str_url .= '&' . $key . '=' . $velue;
			}
		}
		$project_id = null;
		if (isset($search_params["project_id2"])) {
			$project_id = $search_params["project_id2"];
		} else {
			if (isset($search_params["project_id1"])) {
				$project_id = $search_params["project_id1"];
			}
		}
		//截止时间 为当日的24：00
		if (isset($search_params["end_create_time"])) {
			$search_params["end_create_time"] = date('Y-m-d', strtotime($search_params["end_create_time"] . " + 1 day"));
		}

		$count = BugManage::count($search_params["id"], $search_params["create_user_id"], $search_params["target_user_id"],
			$search_params["status"], $project_id,
			$search_params["version"], $search_params["priority"], $search_params["source"],
			$search_params["start_create_time"], $search_params["end_create_time"]);
		$page = new \page($count, $listrow, null, $str_url); // 实例化分页类 传入总记录数

		$show = $page->show(); // 分页显示输出
		$nowPage = isset($search_params['p']) ? $search_params['p'] : 1;
		// 进行分页数据查询
		$list = BugManage::get_data($search_params["id"], $search_params["create_user_id"], $search_params["target_user_id"],
			$search_params["status"],
			$search_params["version"],
			$project_id, $search_params["priority"], $search_params["source"],
			$search_params["start_create_time"], $search_params["end_create_time"],
			'create_time desc ', ($nowPage - 1) * $listrow, $listrow);

		//初始化查询框
		$projects = ProjectManage::get_project_data(null, " name ");
		$users = UserManage::get_data_by_id(null);


		if (isset($list)) {
			//临时记录版本信息 key=version_id value=name
			$temp_vesion = array();
			for ($i = 0; $i < count($list); $i++) {
				if ($i == count($list)) break;
				$list[$i]["create_user"] = $this->get_user_info($list[$i]["create_user_id"])["name"]; //获取创建用户信息
				$list[$i]["target_user"] = $this->get_user_info($list[$i]["target_user_id"])["name"]; //获取指派用户信息
				$list[$i]["project"] = $this->get_project_name($list[$i]["project_id"]); //获取项目信息

				//获取版本信息
				$version_id = $list[$i]["version"];
				if (array_key_exists($version_id, $temp_vesion)) {
					//如果临时版本信息存在已经记录的key值,则name=value
					$list[$i]["version"] = $temp_vesion[$version_id];
				} else {
					$version_data = $this->get_version_data($version_id);
					if (!empty($version_data)) {
						$list[$i]["version"] = $version_data[0]['name'];
						$temp_vesion[$version_id] = $version_data[0]['name'];
					}
				}
			}
		}
		return array('vo' => $list, 'page' => $show, 'search_params' => $search_params, 'projects' => $projects, 'users' => $users);
	}




	/***
	 * 通过id获取借款信息
	 * @param $id
	 * @return string
	 */
	private function get_borrow_info($id)
	{
		try {
			if (empty($id)) return "";
			$list = UserManage::get_data_by_id($id);
			if (isset($list) && count($list) > 0) {
				return $list[0];
			}
			return "";
		} catch (Exception $e) {
			return "";
		}
	}

}

