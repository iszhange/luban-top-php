<?php
/**
 * TOP API: taobao.tbk.activity.info.get request
 * 
 * @author zhange
 * @since 2021.03.09
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkActivityInfoGetRequest implements Request
{
	/** 
	 * mm_xxx_xxx_xxx的第三位
	 */
	private $adzoneId;
	
	/** 
	 * mm_xxx_xxx_xxx 仅三方分成场景使用
	 */
	private $subPid;
	
	/** 
	 * 渠道关系id
	 */
	private $relationId;

	/**
     * 官方活动会场ID，从淘宝客后台“我要推广-活动推广”中获取
	 */
	private $activityMaterialId;

	/**
     * 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
	 */
	private $unionId;
	
	private $apiParas = [];

	public function getApiMethodName()
	{
		return 'taobao.tbk.activity.info.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->adzoneId,'adzone_id');
		RequestParamCheckUtil::checkNotNull($this->activityMaterialId,'activity_material_id');
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
        $this->adzoneId = $adzoneId;
        $this->apiParas['adzone_id'] = $adzoneId;
    }

    /**
     * @return mixed
     */
    public function getSubPid()
    {
        return $this->subPid;
    }

    /**
     * @param mixed $subPid
     */
    public function setSubPid($subPid): void
    {
        $this->subPid = $subPid;
        $this->apiParas['sub_pid'] = $subPid;
    }

    /**
     * @return mixed
     */
    public function getRelationId()
    {
        return $this->relationId;
    }

    /**
     * @param mixed $relationId
     */
    public function setRelationId($relationId): void
    {
        $this->relationId = $relationId;
        $this->apiParas['relation_id'] = $relationId;
    }

    /**
     * @return mixed
     */
    public function getActivityMaterialId()
    {
        return $this->activityMaterialId;
    }

    /**
     * @param mixed $activityMaterialId
     */
    public function setActivityMaterialId($activityMaterialId): void
    {
        $this->activityMaterialId = $activityMaterialId;
        $this->apiParas['activity_material_id'] = $activityMaterialId;
    }

    /**
     * @return mixed
     */
    public function getUnionId()
    {
        return $this->unionId;
    }

    /**
     * @param mixed $unionId
     */
    public function setUnionId($unionId): void
    {
        $this->unionId = $unionId;
        $this->apiParas['union_id'] = $unionId;
    }

}
