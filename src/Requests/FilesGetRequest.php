<?php
/**
 * TOP API: taobao.files.get request
 * 
 * @author zhange
 * @since 2020-11-05
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class FilesGetRequest implements Request
{
	/** 
	 * 搜索结束时间
	 **/
	private $endDate;
	
	/** 
	 * 搜索开始时间
	 **/
	private $startDate;
	
	/** 
	 * 下载链接状态。1:未下载。2:已下载
	 **/
	private $status;
	
	private $apiParas = [];
	
	public function setEndDate($endDate)
	{
		$this->endDate = $endDate;
		$this->apiParas['end_date'] = $endDate;
	}

	public function getEndDate()
	{
		return $this->endDate;
	}

	public function setStartDate($startDate)
	{
		$this->startDate = $startDate;
		$this->apiParas['start_date'] = $startDate;
	}

	public function getStartDate()
	{
		return $this->startDate;
	}

	public function setStatus($status)
	{
		$this->status = $status;
		$this->apiParas['status'] = $status;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function getApiMethodName()
	{
		return 'taobao.files.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->endDate,'endDate');
		RequestParamCheckUtil::checkNotNull($this->startDate,'startDate');
	}
	

}
