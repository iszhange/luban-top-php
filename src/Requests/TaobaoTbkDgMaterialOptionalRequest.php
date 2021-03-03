<?php
/**
 * TOP API: taobao.tbk.dg.material.optional request
 * 
 * @author zhange
 * @since 2021.03.03
 */

namespace LuBan\Top\Requests;

use LuBan\Top\Interfaces\Request;
use LuBan\Top\Libs\RequestParamCheckUtil;

class TaobaoTbkDgMaterialOptionalRequest implements Request
{
	/** 
	 * 商品筛选(特定媒体支持)-店铺dsr评分。筛选大于等于当前设置的店铺dsr评分的商品0-50000之间
	 */
	private $startDsr;
	
	/** 
	 * 页大小，默认20，1~100
	 */
	private $pageSize;
	
	/** 
	 * 第几页，默认：１
	 */
	private $pageNo;

	/**
     * 链接形式：1：PC，2：无线，默认：１
	 */
	private $platform;

	/**
     * 商品筛选-淘客佣金比率上限。如：1234表示12.34%
	 */
	private $endTkRate;

	/**
     * 商品筛选-淘客佣金比率下限。如：1234表示12.34%
	 */
	private $startTkRate;

	/**
     * 商品筛选-折扣价范围上限。单位：元
	 */
	private $endPrice;

	/**
     * 商品筛选-折扣价范围下限。单位：元
	 */
	private $startPrice;

	/**
     * 商品筛选-是否海外商品。true表示属于海外商品，false或不设置表示不限
	 */
	private $isOverseas;

	/**
     * 商品筛选-是否天猫商品。true表示属于天猫商品，false或不设置表示不限
	 */
	private $isTmall;

	/**
     * 排序_des（降序），排序_asc（升序），销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price），匹配分（match）
	 */
	private $sort;

	/**
     * 商品筛选-所在地
	 */
	private $itemloc;

	/**
     * 商品筛选-后台类目ID。用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到
	 */
	private $cat;

	/**
     * 商品筛选-查询词
	 */
	private $q;

	/**
     * 不传时默认物料id=2836；如果直接对消费者投放，可使用官方个性化算法优化的搜索物料id=17004
	 */
	private $materialId;

	/**
     * 优惠券筛选-是否有优惠券。true表示该商品有优惠券，false或不设置表示不限
	 */
	private $hasCoupon;

	/**
     * ip参数影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
	 */
	private $ip;

	/**
     * mm_xxx_xxx_12345678三段式的最后一段数字
	 */
	private $adzoneId;

	/**
     * 商品筛选-是否包邮。true表示包邮，false或不设置表示不限
	 */
	private $needFreeShipment;

	/**
     * 商品筛选-是否加入消费者保障。true表示加入，false或不设置表示不限
	 */
	private $needPrepay;

	/**
     * 商品筛选(特定媒体支持)-成交转化是否高于行业均值。True表示大于等于，false或不设置表示不限
	 */
	private $includePayRate30;

	/**
     * 商品筛选-好评率是否高于行业均值。True表示大于等于，false或不设置表示不限
	 */
	private $includeGoodRate;

	/**
     * 商品筛选(特定媒体支持)-退款率是否低于行业均值。True表示大于等于，false或不设置表示不限
	 */
	private $includeRfdRate;

	/**
     * 商品筛选-牛皮癣程度。取值：1不限，2无，3轻微
	 */
	private $npxLevel;

	/**
     * 商品筛选-KA媒体淘客佣金比率上限。如：1234表示12.34%
	 */
	private $endKaTkRate;

	/**
     * 商品筛选-KA媒体淘客佣金比率下限。如：1234表示12.34%
	 */
	private $startKaTkRate;

	/**
     * 智能匹配-设备号加密类型：MD5
	 */
	private $deviceEncrypt;

	/**
     * 智能匹配-设备号加密后的值（MD5加密需32位小写）
	 */
	private $deviceValue;

	/**
     * 智能匹配-设备号类型：IMEI，或者IDFA，或者UTDID（UTDID不支持MD5加密），或者OAID
	 */
	private $deviceType;

	/**
     * 锁佣结束时间
	 */
	private $lockRateEndTime;

	/**
     * 锁佣开始时间
	 */
	private $lockRateStartTime;

	/**
     * 本地化业务入参-LBS信息-经度
	 */
	private $longitude;

	/**
     * 本地化业务入参-LBS信息-纬度
	 */
	private $latitude;

	/**
     * 本地化业务入参-LBS信息-国标城市码，仅支持单个请求，请求饿了么卡券物料时，该字段必填。 （详细城市ID见：https://mo.m.taobao.com/page_2020010315120200508）
	 */
	private $cityCode;

	/**
     * 商家id，仅支持饿了么卡券商家ID，支持批量请求1-100以内，多个商家ID使用英文逗号分隔
	 */
	private $sellerIds;

	/**
     * 会员运营ID
	 */
	private $specialId;

	/**
     * 渠道关系ID，仅适用于渠道推广场景
	 */
	private $relationId;

	/**
     * 本地化业务入参-分页唯一标识，非首页的请求必传，值为上一页返回结果中的page_result_key字段值
	 */
	private $pageResultKey;

	/**
     * 人群ID，仅适用于物料评估场景material_id=41377
	 */
	private $ucrowdId;

	/**
     * 物料评估-商品列表
	 */
	private $ucrowdRankItems;

	private $apiParas = [];

	public function getApiMethodName()
	{
		return 'taobao.tbk.dg.material.optional';
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		RequestParamCheckUtil::checkNotNull($this->adzoneId,'adzone_id');
	}

    /**
     * @return int
     */
    public function getStartDsr()
    {
        return $this->startDsr;
    }

    /**
     * @param int $val
     */
    public function setStartDsr($val): void
    {
        $this->startDsr = (int)$val;
        $this->apiParas['start_dsr'] = (int)$val;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param int $val
     */
    public function setPageSize($val): void
    {
        $this->pageSize = (int)$val;
        $this->apiParas['page_size'] = (int)$val;
    }

    /**
     * @return int
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * @param int $val
     */
    public function setPageNo($val): void
    {
        $this->pageNo = (int)$val;
        $this->apiParas['page_no'] = (int)$val;
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
     * @return int
     */
    public function getEndTkRate()
    {
        return $this->endTkRate;
    }

    /**
     * @param int $val
     */
    public function setEndTkRate($val): void
    {
        $this->endTkRate = (int)$val;
        $this->apiParas['end_tk_rate'] = (int)$val;
    }

    /**
     * @return int
     */
    public function getStartTkRate()
    {
        return $this->startTkRate;
    }

    /**
     * @param int $val
     */
    public function setStartTkRate($val): void
    {
        $this->startTkRate = (int)$val;
        $this->apiParas['start_tk_rate'] = (int)$val;
    }

    /**
     * @return int
     */
    public function getEndPrice()
    {
        return $this->endPrice;
    }

    /**
     * @param int $val
     */
    public function setEndPrice($val): void
    {
        $this->endPrice = (int)$val;
        $this->apiParas['end_price'] = (int)$val;
    }

    /**
     * @return int
     */
    public function getStartPrice()
    {
        return $this->startPrice;
    }

    /**
     * @param int $val
     */
    public function setStartPrice($val): void
    {
        $this->startPrice = (int)$val;
        $this->apiParas['start_price'] = (int)$val;
    }

    /**
     * @return bool
     */
    public function getIsOverseas()
    {
        return $this->isOverseas;
    }

    /**
     * @param bool $val
     */
    public function setIsOverseas($val): void
    {
        $this->isOverseas = $val;
        $this->apiParas['is_overseas'] = $val;
    }

    /**
     * @return bool
     */
    public function getIsTmall()
    {
        return $this->isTmall;
    }

    /**
     * @param bool $val
     */
    public function setIsTmall($val): void
    {
        $this->isTmall = $val;
        $this->apiParas['is_tmall'] = $val;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $val
     */
    public function setSort($val): void
    {
        $this->sort = $val;
        $this->apiParas['sort'] = $val;
    }

    /**
     * @return string
     */
    public function getItemloc()
    {
        return $this->itemloc;
    }

    /**
     * @param string $val
     */
    public function setItemloc($val): void
    {
        $this->itemloc = $val;
        $this->apiParas['itemloc'] = $val;
    }

    /**
     * @return string
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * @param string $val
     */
    public function setCat($val): void
    {
        $this->cat = $val;
        $this->apiParas['cat'] = $val;
    }

    /**
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * @param string $q
     */
    public function setQ($q): void
    {
        $this->q = $q;
        $this->apiParas['q'] = $q;
    }

    /**
     * @return int
     */
    public function getMaterialId()
    {
        return $this->materialId;
    }

    /**
     * @param int $val
     */
    public function setMaterialId($val): void
    {
        $this->materialId = $val;
        $this->apiParas['material_id'] = $val;
    }

    /**
     * @return bool
     */
    public function getHasCoupon()
    {
        return $this->hasCoupon;
    }

    /**
     * @param bool $val
     */
    public function setHasCoupon($val): void
    {
        $this->hasCoupon = $val;
        $this->apiParas['has_coupon'] = $val;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip): void
    {
        $this->ip = $ip;
        $this->apiParas['ip'] = $ip;
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
     * @return bool
     */
    public function getNeedFreeShipment()
    {
        return $this->needFreeShipment;
    }

    /**
     * @param bool $val
     */
    public function setNeedFreeShipment($val): void
    {
        $this->needFreeShipment = $val;
        $this->apiParas['need_free_shipment'] = $val;
    }

    /**
     * @return bool
     */
    public function getNeedPrepay()
    {
        return $this->needPrepay;
    }

    /**
     * @param bool $val
     */
    public function setNeedPrepay($val): void
    {
        $this->needPrepay = $val;
        $this->apiParas['need_prepay'] = $val;
    }

    /**
     * @return bool
     */
    public function getIncludePayRate30()
    {
        return $this->includePayRate30;
    }

    /**
     * @param bool $val
     */
    public function setIncludePayRate30($val): void
    {
        $this->includePayRate30 = $val;
        $this->apiParas['include_pay_rate_30'] = $val;
    }

    /**
     * @return bool
     */
    public function getIncludeGoodRate()
    {
        return $this->includeGoodRate;
    }

    /**
     * @param bool $val
     */
    public function setIncludeGoodRate($val): void
    {
        $this->includeGoodRate = $val;
        $this->apiParas['include_good_rate'] = $val;
    }

    /**
     * @return bool
     */
    public function getIncludeRfdRate()
    {
        return $this->includeRfdRate;
    }

    /**
     * @param bool $val
     */
    public function setIncludeRfdRate($val): void
    {
        $this->includeRfdRate = $val;
        $this->apiParas['include_rfd_rate'] = $val;
    }

    /**
     * @return int
     */
    public function getNpxLevel()
    {
        return $this->npxLevel;
    }

    /**
     * @param int $val
     */
    public function setNpxLevel($val): void
    {
        $this->npxLevel = $val;
        $this->apiParas['npx_level'] = $val;
    }

    /**
     * @return int
     */
    public function getEndKaTkRate()
    {
        return $this->endKaTkRate;
    }

    /**
     * @param int $val
     */
    public function setEndKaTkRate($val): void
    {
        $this->endKaTkRate = $val;
        $this->apiParas['end_ka_tk_rate'] = $val;
    }

    /**
     * @return int
     */
    public function getStartKaTkRate()
    {
        return $this->startKaTkRate;
    }

    /**
     * @param int $val
     */
    public function setStartKaTkRate($val): void
    {
        $this->startKaTkRate = $val;
        $this->apiParas['start_ka_tk_rate'] = $val;
    }

    /**
     * @return string
     */
    public function getDeviceEncrypt()
    {
        return $this->deviceEncrypt;
    }

    /**
     * @param string $val
     */
    public function setDeviceEncrypt($val): void
    {
        $this->deviceEncrypt = $val;
        $this->apiParas['device_encrypt'] = $val;
    }

    /**
     * @return string
     */
    public function getDeviceValue()
    {
        return $this->deviceValue;
    }

    /**
     * @param string $val
     */
    public function setDeviceValue($val): void
    {
        $this->deviceValue = $val;
        $this->apiParas['device_value'] = $val;
    }

    /**
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @param string $val
     */
    public function setDeviceType($val): void
    {
        $this->deviceType = $val;
        $this->apiParas['device_type'] = $val;
    }

    /**
     * @return int
     */
    public function getLockRateEndTime()
    {
        return $this->lockRateEndTime;
    }

    /**
     * @param int $val
     */
    public function setLockRateEndTime($val): void
    {
        $this->lockRateEndTime = $val;
        $this->apiParas['lock_rate_end_time'] = $val;
    }

    /**
     * @return int
     */
    public function getLockRateStartTime()
    {
        return $this->lockRateStartTime;
    }

    /**
     * @param int $val
     */
    public function setLockRateStartTime($val): void
    {
        $this->lockRateStartTime = $val;
        $this->apiParas['lock_rate_start_time'] = $val;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $val
     */
    public function setLongitude($val): void
    {
        $this->longitude = $val;
        $this->apiParas['longitude'] = $val;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $val
     */
    public function setLatitude($val): void
    {
        $this->latitude = $val;
        $this->apiParas['latitude'] = $val;
    }

    /**
     * @return string
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * @param string $val
     */
    public function setCityCode($val): void
    {
        $this->cityCode = $val;
        $this->apiParas['city_code'] = $val;
    }

    /**
     * @return string
     */
    public function getSellerIds()
    {
        return $this->sellerIds;
    }

    /**
     * @param string $val
     */
    public function setSellerIds($val): void
    {
        $this->sellerIds = $val;
        $this->apiParas['seller_ids'] = $val;
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
        $this->specialId = $val;
        $this->apiParas['special_id'] = $val;
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
        $this->relationId = $val;
        $this->apiParas['relation_id'] = $val;
    }

    /**
     * @return string
     */
    public function getPageResultKey()
    {
        return $this->pageResultKey;
    }

    /**
     * @param string $val
     */
    public function setPageResultKey($val): void
    {
        $this->pageResultKey = $val;
        $this->apiParas['page_result_key'] = $val;
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

    /**
     * @return array
     */
    public function getUcrowdRankItems()
    {
        return $this->ucrowdRankItems;
    }

    /**
     * @param array $val
     */
    public function setUcrowdRankItems($val): void
    {
        $this->ucrowdRankItems = $val;
        $this->apiParas['ucrowd_rank_items'] = json_encode($val);
    }

}
