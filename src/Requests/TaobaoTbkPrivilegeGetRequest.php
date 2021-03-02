<?php
/**
 * TOP API: taobao.tbk.privilege.get request
 * 
 * @author zhange
 * @since 2021.03.02
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkPrivilegeGetRequest implements Request
{
    /**
     * 推广位id，mm_xx_xx_xx pid三段式中的第三段
     */
    private $adzoneId;

    /**
     * 淘客商品id
     */
    private $itemId;

    /**
     * 营销计划链接中的me参数
     */
    private $me;

    /**
     * 1：PC，2：无线，默认：１
     */
    private $platform;

    /**
     * 渠道关系ID，仅适用于渠道推广场景
     */
    private $relationId;

    /**
     * 会员运营ID
     */
    private $specialId;

    /**
     * 淘宝客外部用户标记，如自身系统账户ID；微信ID等
     */
    private $externalId;

    /**
     * 备案的网站id, mm_xx_xx_xx pid三段式中的第二段
     */
    private $siteId;
	
	private $apiParas = [];

	public function getApiMethodName()
	{
		return 'taobao.tbk.privilege.get';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->adzoneId,'adzone_id');
		RequestParamCheckUtil::checkNotNull($this->siteId,'site_id');
	}

    /**
     * @return string
     */
    public function getAdzoneId()
    {
        return $this->adzoneId;
    }

    /**
     * @param string $val
     */
    public function setAdzoneId($val): void
    {
        $this->adzoneId = (string)$val;
        $this->apiParas['adzone_id'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $val
     */
    public function setItemId($val): void
    {
        $this->itemId = (string)$val;
        $this->apiParas['item_id'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getMe()
    {
        return $this->me;
    }

    /**
     * @param string $val
     */
    public function setMe($val): void
    {
        $this->me = (string)$val;
        $this->apiParas['me'] = (string)$val;
    }

    /**
     * @return int
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param int $val
     */
    public function setPlatform($val): void
    {
        $this->platform = (int)$val;
        $this->apiParas['platform'] = (int)$val;
    }

    /**
     * @return string
     */
    public function getRelationId()
    {
        return $this->relationId;
    }

    /**
     * @param string $val
     */
    public function setRelationId($val): void
    {
        $this->relationId = (string)$val;
        $this->apiParas['relation_id'] = (string)$val;
    }

    /**
     * @return int
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param int $val
     */
    public function setSiteId($val): void
    {
        $this->siteId = (int)$val;
        $this->apiParas['site_id'] = (int)$val;
    }

    /**
     * @return string
     */
    public function getSpecialId()
    {
        return $this->specialId;
    }

    /**
     * @param string $val
     */
    public function setSpecialId($val): void
    {
        $this->specialId = (string)$val;
        $this->apiParas['special_id'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $val
     */
    public function setExternalId($val): void
    {
        $this->externalId = (string)$val;
        $this->apiParas['external_id'] = (string)$val;
    }

}
