<?php
/**
 * TOP API: taobao.tbk.tpwd.create request
 * 
 * @author zhange
 * @since 2021.03.02
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkTpwdCreateRequest implements Request
{
	/** 
	 * 生成口令的淘宝用户ID
	 */
	private $userId;
	
	/** 
	 * 口令弹框内容
	 */
	private $text;
	
	/** 
	 * 口令跳转目标页
	 */
	private $url;

	/**
     * 口令弹框logoURL
	 */
	private $logo;
	
	private $apiParas = [];

	public function getApiMethodName()
	{
		return 'taobao.tbk.tpwd.create';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->text,'text');
		RequestParamCheckUtil::checkNotNull($this->url,'url');
	}

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $val
     */
    public function setUserId($val): void
    {
        $this->userId = (string)$val;
        $this->apiParas['user_id'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $val
     */
    public function setText($val): void
    {
        $this->text = (string)$val;
        $this->apiParas['text'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $val
     */
    public function setUrl($val): void
    {
        $this->url = (string)$val;
        $this->apiParas['url'] = (string)$val;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $val
     */
    public function setLogo($val): void
    {
        $this->logo = (string)$val;
        $this->apiParas['logo'] = (string)$val;
    }

}
