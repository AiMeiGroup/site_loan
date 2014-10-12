<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wanwenyou
 * Date: 13-9-13
 * Time: 上午11:14
 * To change this template use File | Settings | File Templates.
 */

namespace App\Action;

use App\Api\LoanManage;

class Investment extends \Lavender\WebPage
{

	protected $without_auth_actions = array(
		'*',
	);

	public function  index_action()
	{

          
        $loan_list=LoanManage::get_last_loans();
	    return array('loan_list' =>$loan_list);


	}
   
   public function  detail_action()
	{

          
        $loan_list=LoanManage::get_last_loans();
	    return array('loan_list' =>$loan_list);


	}

	 /***
		 * 我的投资
		 * @return array
		 */
	 public function  invest_list_action()
	{

          
        $loan_list=LoanManage::get_last_loans();
	    return array('loan_list' =>$loan_list);


	}

     /***
	 * 投资统计
	 * @return array
	 */
	 public function  invest_sta_action()
	{

          
        $loan_list=LoanManage::get_last_loans();
	    return array('loan_list' =>$loan_list);


	}

}