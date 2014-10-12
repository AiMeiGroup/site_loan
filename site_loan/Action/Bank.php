<?php
namespace App\Action;


use App\common\common;
use Lavender\Exception;
use Lavender\Filter;
use App\Api\LoanManage;


class Bank extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);


	/***
	 * 我要充值
	 * @return array
	 */
	public function  topup_action()
	{

	}
   
   /***
	 * 充值记录
	 * @return array
	 */
	public function topup_record_action(){
		
	}

	/***
	 * 我要体现
	 * @return array
	 */
	public function with_drawal_action(){
		
	}

	/***
	 * 提现记录
	 * @return array
	 */
	public function withdraw_record_action(){
		
	}

	/***
	 * 资金流水
	 * @return array
	 */
	public function fund_flow_action(){
		
	}

	/***
	 * 绑定银行卡
	 * @return array
	 */
	public function bind_card_action(){
		
	}

}

