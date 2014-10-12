<?php
namespace App\Action;


use App\common\common;
use Lavender\Exception;
use Lavender\Filter;
use App\Api\LoanManage;


class Third extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);


/***
	 * 列出全部的借款信息
	 * @return array
	 */
	public function  third_party_action()
	{

/*        $params['size']=10;
        $count=LoanManage::get_data_count();
        $listrow=LoanManage::get
        $Page=new common\Page($count,$listrow,null,'action=loan.index'); // 实例化分页类 传入总记录数
        $show=$page->show(); // 分页显示输出
        return array('data'=>$data,'page'=>$show);*/
	}

	public function third_intro_action(){
		
	}

}

