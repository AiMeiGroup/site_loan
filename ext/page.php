<?php

/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-16
 * Time: 上午9:46
 * To change this template use File | Settings | File Templates.
 */
class page
{

	// 分页栏每页显示的页数
	public $rollPage = 5;
	// 分页URL地址
	public $url = '';
	// 默认列表每页显示行数
	public $listRows = 20;
	// 起始行数
	public $firstRow;
	// 分页总页面数
	protected $totalPages;
	// 总行数
	protected $totalRows;
	// 当前页数
	protected $nowPage;
	// 分页的栏的总页数
	protected $coolPages;
	// 分页显示定制
	protected $config = array('header' => '条记录', 'prev' => '上一页', 'next' => '下一页', 'first' => '第一页', 'last' => '最后一页', 'theme' => ' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%');
	// 默认分页变量名
	protected $varPage;

	/**
	 * 架构函数
	 * @access public
	 * @param array $totalRows 总的记录数
	 * @param array $listRows  每页显示记录数
	 * @param array $varPage   默认分页变量名
	 * @param array $url       分页URL地址 like action=main.index
	 */
	public function __construct($totalRows, $listRows = '', $varPage = '', $url = '')
	{
		$this->totalRows = $totalRows;
		$this->varPage = empty($varPage) ? 'p' : $varPage;
		if (!empty($listRows)) {
			$this->listRows = intval($listRows);
		}
		$this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
		$this->coolPages = ceil($this->totalPages / $this->rollPage);
		$this->nowPage = !empty($_GET[$this->varPage]) ? intval($_GET[$this->varPage]) : 1;
		if ($this->nowPage < 1) {
			$this->nowPage = 1;
		} elseif (!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
			$this->nowPage = $this->totalPages;
		}
		$this->firstRow = $this->listRows * ($this->nowPage - 1);
		if (!empty($url)) $this->url = $url;
	}

	public function setConfig($name, $value)
	{
		if (isset($this->config[$name])) {
			$this->config[$name] = $value;
		}
	}

	/**
	 * 分页显示输出
	 * @access public
	 */
	public function show()
	{
		if (0 == $this->totalRows) return '';
		$p = $this->varPage;
		$nowCoolPage = ceil($this->nowPage / $this->rollPage);

		$url = $this->url;

		//上下翻页字符串
		$upRow = $this->nowPage - 1;
		$downRow = $this->nowPage + 1;
		if ($upRow > 0) {
			$upPage = "<a href='?" . $url . '&' . $this->varPage . '=' . $upRow . "'>" . $this->config['prev'] . "</a>";
		} else {
			$upPage = '';
		}

		if ($downRow <= $this->totalPages) {
			$downPage = "<a href='?" . $url . '&' . $this->varPage . '=' . $downRow . "'>" . $this->config['next'] . "</a>";
		} else {
			$downPage = '';
		}
		// << < > >>
		if ($nowCoolPage == 1) {
			$theFirst = '';
			$prePage = '';
		} else {
			$preRow = $this->nowPage - $this->rollPage;
			$prePage = "<a href='?" . $url . '&' . $this->varPage . '=' . $preRow . "' >上" . $this->rollPage . "页</a>";
			$theFirst = "<a href='?" . $url . '&' . $this->varPage . '=1' . "' >" . $this->config['first'] . "</a>";
		}
		if ($nowCoolPage == $this->coolPages) {
			$nextPage = '';
			$theEnd = '';
		} else {
			$nextRow = $this->nowPage + $this->rollPage;
			$theEndRow = $this->totalPages;
			$nextPage = "<a href='?" . $url . '&' . $this->varPage . '=' . $nextRow . "' >下" . $this->rollPage . "页</a>";
			$theEnd = "<a href='?" . $url . '&' . $this->varPage . '=' . $theEndRow . "' >" . $this->config['last'] . "</a>";
		}
		// 1 2 3 4 5
		$linkPage = "";
		for ($i = 1; $i <= $this->rollPage; $i++) {
			$page = ($nowCoolPage - 1) * $this->rollPage + $i;
			if ($page != $this->nowPage) {
				if ($page <= $this->totalPages) {
					$linkPage .= "<a href='?" . $url . '&' . $this->varPage . '=' . $page . "'>" . $page . "</a>";
				} else {
					break;
				}
			} else {
				if ($this->totalPages != 1) {
					$linkPage .= "<span class='current'>" . $page . "</span>";
				}
			}
		}
		$pageStr = str_replace(
			array('%header%', '%nowPage%', '%totalRow%', '%totalPage%', '%upPage%', '%downPage%', '%first%', '%prePage%', '%linkPage%', '%nextPage%', '%end%'),
			array($this->config['header'], $this->nowPage, $this->totalRows, $this->totalPages, $upPage, $downPage, $theFirst, $prePage, $linkPage, $nextPage, $theEnd), $this->config['theme']);
		return $pageStr;
	}

}