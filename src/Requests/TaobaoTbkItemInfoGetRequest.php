<?php
/**
 * TOP API: taobao.tbk.item.info.get request
 * 
 * @author zhange
 * @since 2020.10.28
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkItemInfoGetRequest implements Request
{
	/** 
	 * ip地址，影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
	 **/
	private $ip;
	
	/** 
	 * 商品ID串，用,分割，最大40个
	 **/
	private $numIids;
	
	/** 
	 * 链接形式：1：PC，2：无线，默认：１
	 **/
	private $platform;
	
	private $apiParas = [];
	
	public function setIp($ip)
	{
		$this->ip = $ip;
		$this->apiParas['ip'] = $ip;
	}

	public function getIp()
	{
		return $this->ip;
	}

	public function setNumIids($numIids)
	{
		$this->numIids = $numIids;
		$this->apiParas['num_iids'] = $numIids;
	}

	public function getNumIids()
	{
		return $this->numIids;
	}

	public function setPlatform($platform)
	{
		$this->platform = $platform;
		$this->apiParas['platform'] = $platform;
	}

	public function getPlatform()
	{
		return $this->platform;
	}

	public function getApiMethodName()
	{
		return 'taobao.tbk.item.info.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->numIids,'numIids');
	}

}
