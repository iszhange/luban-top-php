<?php
/**
 * TOP API: taobao.tbk.tpwd.convert request
 * 
 * @author zhange
 * @since 2021.03.04
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkTpwdConvertRequest implements Request
{
	/** 
	 * 需要解析的淘口令
	 */
	private $passwordContent;
	
	/** 
	 * 广告位ID
	 */
	private $adzoneId;
	
	/** 
	 * 1表示商品转通用计划链接，其他值或不传表示优先转营销计划链接
	 */
	private $dx;

	/**
     * 会员人群ID，用于统计人群推广效果
	 */
	private $ucrowdId;
	
	private $apiParas = [];

	public function getApiMethodName()
	{
		return 'taobao.tbk.tpwd.convert';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->passwordContent,'password_content');
		RequestParamCheckUtil::checkNotNull($this->adzoneId,'adzone_id');
	}

    /**
     * @return string
     */
    public function getPasswordContent()
    {
        return $this->passwordContent;
    }

    /**
     * @param string $val
     */
    public function setPasswordContent($val): void
    {
        $this->passwordContent = $val;
        $this->apiParas['password_content'] = $val;
    }

    /**
     * @return int
     */
    public function getAdzoneId()
    {
        return $this->adzoneId;
    }

    /**
     * @param int $val
     */
    public function setAdzoneId($val): void
    {
        $this->adzoneId = $val;
        $this->apiParas['adzone_id'] = $val;
    }

    /**
     * @return string
     */
    public function getDx()
    {
        return $this->dx;
    }

    /**
     * @param string $val
     */
    public function setDx($val): void
    {
        $this->dx = $val;
        $this->apiParas['dx'] = $val;
    }

    /**
     * @return int
     */
    public function getUcrowdId()
    {
        return $this->ucrowdId;
    }

    /**
     * @param int $val
     */
    public function setUcrowdId($val): void
    {
        $this->ucrowdId = $val;
        $this->apiParas['ucrowd_id'] = $val;
    }

}
