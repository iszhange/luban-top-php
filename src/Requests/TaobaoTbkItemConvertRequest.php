<?php
/**
 * TOP API: taobao.tbk.item.convert request
 * 
 * @author zhange
 * @since 2021.03.22
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkItemConvertRequest implements Request
{
	/** 
	 * 需返回的字段列表
	 */
	private $fields;
	
	/** 
	 * 	商品ID串，用','分割，从taobao.tbk.item.get接口获取num_iid字段，最大40个
	 */
	private $numIids;
	
	/** 
	 * 广告位ID，区分效果位置
	 */
	private $adzoneId;

	/**
     * 链接形式：1：PC，2：无线，默认：１
	 */
	private $platform;

	/**
     * 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
	 */
	private $unid;

	/**
     * 1表示商品转通用计划链接，其他值或不传表示转营销计划链接
	 */
	private $dx;

	private $apiParas = [];


	public function getApiMethodName()
	{
		return 'taobao.tbk.item.convert';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->fields,'fields');
		RequestParamCheckUtil::checkNotNull($this->numIids,'num_iids');
		RequestParamCheckUtil::checkNotNull($this->adzoneId,'adzone_id');
	}

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields): void
    {
        $this->apiParas['fields'] = $fields;
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getNumIids()
    {
        return $this->numIids;
    }

    /**
     * @param mixed $numIids
     */
    public function setNumIids($numIids): void
    {
        $this->apiParas['num_iids'] = $numIids;
        $this->numIids = $numIids;
    }

    /**
     * @return mixed
     */
    public function getAdzoneId()
    {
        return $this->adzoneId;
    }

    /**
     * @param mixed $adzoneId
     */
    public function setAdzoneId($adzoneId): void
    {
        $this->apiParas['adzone_id'] = $adzoneId;
        $this->adzoneId = $adzoneId;
    }

    /**
     * @return mixed
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param mixed $platform
     */
    public function setPlatform($platform): void
    {
        $this->apiParas['platform'] = $platform;
        $this->platform = $platform;
    }

    /**
     * @return mixed
     */
    public function getUnid()
    {
        return $this->unid;
    }

    /**
     * @param mixed $unid
     */
    public function setUnid($unid): void
    {
        $this->apiParas['unid'] = $unid;
        $this->unid = $unid;
    }

    /**
     * @return mixed
     */
    public function getDx()
    {
        return $this->dx;
    }

    /**
     * @param mixed $dx
     */
    public function setDx($dx): void
    {
        $this->apiParas['dx'] = $dx;
        $this->dx = $dx;
    }

}
