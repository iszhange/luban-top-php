<?php
/**
 * TOP API: taobao.httpdns.get request
 * 
 * @author auto create
 * @since 1.0, 2018.07.25
 */
namespace LuBan\Top\Request;

use LuBan\Top\Interfaces\Request;

class HttpdnsGetRequest implements Request
{
	
	private $apiParas = [];
	
	public function getApiMethodName()
	{
		return 'taobao.httpdns.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
	}

}
