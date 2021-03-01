<?php
/**
 * TOP API: taobao.appip.get request
 * 
 * @author zhange
 * @since 2020.11.05
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;

class AppipGetRequest implements Request
{
	
	private $apiParas = [];
	
	public function getApiMethodName()
	{
		return 'taobao.appip.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}

}
