<?php
/**
 * 淘宝客-推广者-淘礼金创建
 * taobao.tbk.dg.vegas.tlj.create
 * https://open.taobao.com/api.htm?docId=40173&docType=2&scopeId=15029
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkDgVegasTljCreateRequest implements Request
{
	/** 
	 * CPS佣金计划类型 定向：DX；鹊桥：LINK_EVENT；营销：MKT
	 */
	private $campaignType;
	
	/** 
	 * 妈妈广告位Id
	 */
	private $adzoneId;
	
	/** 
	 * 宝贝id
	 */
	private $itemId;

	/**
     * 淘礼金总个数
	 */
	private $totalNum;

	/**
     * 淘礼金名称，最大10个字符
	 */
	private $name;

	/**
     * 单用户累计中奖次数上限
	 */
	private $userTotalWinNumLimit;

	/**
     * 安全开关，若不进行安全校验，可能放大您的资损风险，请谨慎选择
     * 启动安全：true；不启用安全：false
	 */
	private $securitySwitch;

	/**
     * 单个淘礼金面额，支持两位小数，单位元
	 */
	private $perFace;

	/**
     * 发放开始时间 eg:2018-09-01 00:00:00
	 */
	private $sendStartTime;

	/**
     * 发放截止时间 eg:2018-09-01 00:00:00
	 */
	private $sendEndTime;

	/**
     * 使用结束日期
     * 如果是结束时间模式为相对时间，时间格式为1-7直接的整数, 例如，1（相对领取时间1天）;
     * 如果是绝对时间，格式为yyyy-MM-dd，例如，2019-01-29，表示到2019-01-29 23:59:59结束
	 */
	private $useEndTime;

	/**
     * 结束日期的模式,1:相对时间，2:绝对时间
	 */
	private $useEndTimeMode;

	/**
     * 使用开始日期。
     * 相对时间，无需填写，以用户领取时间作为使用开始时间。
     * 绝对时间，格式 yyyy-MM-dd，例如，2019-01-29，表示从2019-01-29 00:00:00 开始
	 */
	private $useStartTime;

	/**
     * 	安全等级，
     * 0：适用于常规淘礼金投放场景；
     * 1：更高安全级别，适用于淘礼金面额偏大等安全性较高的淘礼金投放场景，可能导致更多用户拦截。
     * security_switch为true，此字段不填写时，使用0作为默认安全级别。
     * 如果security_switch为false，不进行安全判断。
	 */
	private $securityLevel;
	
	private $apiParas = [];
	
	public function setCampaignType($val)
	{
		$this->campaignType = (string)$val;
		$this->apiParas['campaign_type'] = (string)$val;
	}

    public function getCampaignType()
    {
        return $this->campaignType;
	}

	public function setAdzoneId($val)
	{
        $this->adzoneId = (string)$val;
        $this->apiParas['adzone_id'] = (string)$val;
	}

	public function getAdzoneId()
	{
		return $this->adzoneId;
	}

	public function setItemId($val)
	{
		$this->itemId = (string)$val;
		$this->apiParas['item_id'] = (string)$val;
	}

	public function getItemId()
	{
		return $this->itemId;
	}

    /**
     * @return int
     */
    public function getTotalNum()
    {
        return $this->totalNum;
    }

    /**
     * @param int $val
     */
    public function setTotalNum($val): void
    {
        $this->totalNum = (int)$val;
        $this->apiParas['total_num'] = (int)$val;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $val
     */
    public function setName($val): void
    {
        $this->name = (string)$val;
        $this->apiParas['name'] = (string)$val;
    }

    /**
     * @return int
     */
    public function getUserTotalWinNumLimit()
    {
        return $this->userTotalWinNumLimit;
    }

    /**
     * @param int $val
     */
    public function setUserTotalWinNumLimit($val): void
    {
        $this->userTotalWinNumLimit = (int)$val;
        $this->apiParas['user_total_win_num_limit'] = (int)$val;
    }

    /**
     * @return bool
     */
    public function getSecuritySwitch()
    {
        return $this->securitySwitch;
    }

    /**
     * @param bool $val
     */
    public function setSecuritySwitch($val): void
    {
        $this->securitySwitch = (string)$val;
        $this->apiParas['security_switch'] = (string)$val;
    }

    /**
     * @return float
     */
    public function getPerFace()
    {
        return $this->perFace;
    }

    /**
     * @param float $val
     */
    public function setPerFace($val): void
    {
        $this->perFace = (float)$val;
        $this->apiParas['per_face'] = (float)$val;
    }

    /**
     * @return string
     */
    public function getSendStartTime()
    {
        return $this->sendStartTime;
    }

    /**
     * @param string $val
     */
    public function setSendStartTime($val): void
    {
        $this->sendStartTime = (string)$val;
        $this->apiParas['send_start_time'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getSendEndTime()
    {
        return $this->sendEndTime;
    }

    /**
     * @param string $val
     */
    public function setSendEndTime($val): void
    {
        $this->sendEndTime = (string)$val;
        $this->apiParas['send_end_time'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getUseEndTime()
    {
        return $this->useEndTime;
    }

    /**
     * @param string $val
     */
    public function setUseEndTime($val): void
    {
        $this->useEndTime = (string)$val;
        $this->apiParas['use_end_time'] = (string)$val;
    }

    /**
     * @return int
     */
    public function getUseEndTimeMode()
    {
        return $this->useEndTimeMode;
    }

    /**
     * @param int $val
     */
    public function setUseEndTimeMode($val): void
    {
        $this->useEndTimeMode = (int)$val;
        $this->apiParas['use_end_time_mode'] = (int)$val;
    }

    /**
     * @return string
     */
    public function getUseStartTime()
    {
        return $this->useStartTime;
    }

    /**
     * @param string $val
     */
    public function setUseStartTime($val): void
    {
        $this->useStartTime = (string)$val;
        $this->apiParas['use_start_time'] = (string)$val;
    }

    /**
     * @return int
     */
    public function getSecurityLevel()
    {
        return $this->securityLevel;
    }

    /**
     * @param int $val
     */
    public function setSecurityLevel($val): void
    {
        $this->securityLevel = (int)$val;
        $this->apiParas['security_level'] = (int)$val;
    }

    public function getApiMethodName()
    {
        return 'taobao.tbk.dg.vegas.tlj.create';
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestParamCheckUtil::checkNotNull($this->adzoneId,'adzone_id');
        RequestParamCheckUtil::checkNotNull($this->itemId,'item_id');
        RequestParamCheckUtil::checkNotNull($this->totalNum,'total_num');
        RequestParamCheckUtil::checkNotNull($this->name,'name');
        RequestParamCheckUtil::checkNotNull($this->userTotalWinNumLimit,'user_total_win_num_limit');
        RequestParamCheckUtil::checkNotNull($this->securitySwitch,'security_switch');
        RequestParamCheckUtil::checkNotNull($this->perFace,'per_face');
        RequestParamCheckUtil::checkNotNull($this->sendStartTime,'send_start_time');
    }

}
