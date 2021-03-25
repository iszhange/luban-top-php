<?php
/**
 * TOP API: taobao.tbk.sc.order.details.get request
 * 
 * @author zhange
 * @since 2021.03.25
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkScOrderDetailsGetRequest implements Request
{
	/** 
	 * 查询时间类型，1：按照订单淘客创建时间查询，2:按照订单淘客付款时间查询，3:按照订单淘客结算时间查询
	 */
	private $queryType;
	
	/** 
	 * 	位点，除第一页之外，都需要传递；前端原样返回
	 */
	private $positionIndex;
	
	/** 
	 * 页大小，默认20，1~100
	 */
	private $pageSize;

	/**
     * 推广者角色类型,2:二方，3:三方，不传，表示所有角色
	 */
	private $memberType;

	/**
     * 淘客订单状态，12-付款，13-关闭，14-确认收货，3-结算成功;不传，表示所有状态
	 */
	private $tkStatus;

	/**
     * 订单查询结束时间，订单开始时间至订单结束时间，中间时间段日常要求不超过3个小时，但如618、双11、年货节等大促期间预估时间段不可超过20分钟，超过会提示错误，调用时请务必注意时间段的选择，以保证亲能正常调用！
	 */
	private $endTime;

	/**
     * 订单查询开始时间
	 */
	private $startTime;

	/**
     * 跳转类型，当向前或者向后翻页必须提供,-1: 向前翻页,1：向后翻页
	 */
	private $jumpType;

	/**
     * 第几页，默认1，1~100
	 */
	private $pageNo;

	/**
     * 场景订单场景类型，1:常规订单，2:渠道订单，3:会员运营订单，默认为1
	 */
	private $orderScene;
	
	private $apiParas = [];

	public function getApiMethodName()
	{
		return 'taobao.tbk.sc.order.details.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->endTime,'end_time');
		RequestParamCheckUtil::checkNotNull($this->startTime,'start_time');
	}

    /**
     * @return mixed
     */
    public function getQueryType()
    {
        return $this->queryType;
    }

    /**
     * @param mixed $queryType
     */
    public function setQueryType($queryType): void
    {
        $this->queryType = $queryType;
        $this->apiParas['query_type'] = $queryType;
    }

    /**
     * @return mixed
     */
    public function getPositionIndex()
    {
        return $this->positionIndex;
    }

    /**
     * @param mixed $positionIndex
     */
    public function setPositionIndex($positionIndex): void
    {
        $this->positionIndex = $positionIndex;
        $this->apiParas['position_index'] = $positionIndex;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
        $this->apiParas['page_size'] = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getMemberType()
    {
        return $this->memberType;
    }

    /**
     * @param mixed $memberType
     */
    public function setMemberType($memberType): void
    {
        $this->memberType = $memberType;
        $this->apiParas['member_type'] = $memberType;
    }

    /**
     * @return mixed
     */
    public function getTkStatus()
    {
        return $this->tkStatus;
    }

    /**
     * @param mixed $tkStatus
     */
    public function setTkStatus($tkStatus): void
    {
        $this->tkStatus = $tkStatus;
        $this->apiParas['tk_status'] = $tkStatus;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
        $this->apiParas['end_time'] = $endTime;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime): void
    {
        $this->startTime = $startTime;
        $this->apiParas['start_time'] = $startTime;
    }

    /**
     * @return mixed
     */
    public function getJumpType()
    {
        return $this->jumpType;
    }

    /**
     * @param mixed $jumpType
     */
    public function setJumpType($jumpType): void
    {
        $this->jumpType = $jumpType;
        $this->apiParas['jump_type'] = $jumpType;
    }

    /**
     * @return mixed
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * @param mixed $pageNo
     */
    public function setPageNo($pageNo): void
    {
        $this->pageNo = $pageNo;
        $this->apiParas['page_no'] = $pageNo;
    }

    /**
     * @return mixed
     */
    public function getOrderScene()
    {
        return $this->orderScene;
    }

    /**
     * @param mixed $orderScene
     */
    public function setOrderScene($orderScene): void
    {
        $this->orderScene = $orderScene;
        $this->apiParas['order_scene'] = $orderScene;
    }

}
