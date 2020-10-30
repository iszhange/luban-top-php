<?php
namespace LuBan\Top;

use LuBan\Top\Exceptions\Exception;
use LuBan\Top\Interfaces\Request;

class Client
{

    /**
     * 应用ID
     * @var string
     */
	public $appKey;

	/**
     * 应用密钥
     * @var string
	 */
	public $secretKey;

	/**
     * API网关
     * @var string
	 */
	public $gatewayUrl = 'https://eco.taobao.com/router/rest';

	/**
     * 响应格式
     * @var string json|xml
	 */
	public $format = 'json';

	/**
     * http超时时间(s)
     * @var float 0:不限制
	 */
	public $connectTimeout = 0;

	/**
     * http等待时间(s)
     * @var float 0:不限制
	 */
	public $readTimeout = 0;

	/**
     * 合作伙伴标识
     * @var string
	 */
	public $partnerId;

	/**
     * 精简json格式返回
     * @var bool
	 */
	public $simplify = true;

	/**
	 * 是否打开入参check
     * @var bool
     */
	public $checkRequest = true;

	/**
     * 签名的摘要算法
     * @var string
	 */
	protected $signMethod = 'md5';

	/**
     * API协议版本
     * @var string
	 */
	protected $v = '2.0';

	/**
     * 淘宝SDK版本号
     * @var string
	 */
	protected $sdkVersion = 'top-sdk-php-20180326';


	public function __construct($appKey = '', $secretKey = '')
    {
		$this->appKey = $appKey;
		$this->secretKey = $secretKey ;
	}

    /**
     * 执行请求
     *
     * @param Request $request
     * @param string $session
     * @param string $bestUrl
     * @return mixed
     */
    public function execute(Request $request, $session = null, $bestUrl = null)
    {
        // 校验业务参数
        if ($this->checkRequest) {
            try {
                $request->check();
            } catch (Exception $e) {
                return $this->failResult($e->getCode(), $e->getMessage());
            }
        }

        //组装系统参数
        $sysParams['app_key'] = $this->appKey;
        $sysParams['v'] = $this->v;
        $sysParams['format'] = $this->format;
        $sysParams['sign_method'] = $this->signMethod;
        $sysParams['method'] = $request->getApiMethodName();
        $sysParams['timestamp'] = date('Y-m-d H:i:s');
        $session && $sysParams['session'] = $session;
        $this->partnerId && $sysParams['partner_id'] = $this->partnerId;
        $this->simplify && $sysParams['simplify'] = $this->simplify;

        //获取业务参数
        $apiParams = $request->getApiParas();

        //系统参数放入GET请求串
        if ($bestUrl) {
            $requestUrl = $bestUrl.'?';
            $sysParams['partner_id'] = $this->getClusterTag();
        } else {
            $requestUrl = $this->gatewayUrl.'?';
            $sysParams['partner_id'] = $this->sdkVersion;
        }

        //签名
        $sysParams['sign'] = $this->generateSign(array_merge($apiParams, $sysParams));

        foreach ($sysParams as $sysParamKey => $sysParamValue)
        {
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . '&';
        }

        $fileFields = [];
        foreach ($apiParams as $key => $value) {
            if (is_array($value) && array_key_exists('type',$value) && array_key_exists('content',$value) ) {
                $value['name'] = $key;
                $fileFields[$key] = $value;
                unset($apiParams[$key]);
            }
        }

        $requestUrl = substr($requestUrl, 0, -1);

        //发起HTTP请求
        try {
            if (count($fileFields) > 0) {
                $resp = $this->curl_with_memory_file($requestUrl, $apiParams, $fileFields);
            } else {
                $resp = $this->curl($requestUrl, $apiParams);
            }
        } catch (\Exception $e) {
            return $this->failResult($e->getCode(), $e->getMessage());
        }

        unset($apiParams);
        unset($fileFields);
        //解析TOP返回结果
        $respObject = null;
        if ('json' == $this->format) {
            $respObject = @json_decode($resp, true);
            if (null !== $respObject) {
                $respObject = current($respObject);
            }
        } else if('xml' == $this->format) {
            $respObject = @simplexml_load_string($resp);
        }

        if (!$respObject) {
            return $this->failResult(0, 'HTTP_RESPONSE_NOT_WELL_FORMED');
        }

        return $respObject;
    }

    /**
     * 构建失败结果
     *
     * @param int|string $code // 错误码
     * @param string $message // 错误信息
     * @return array|\SimpleXMLElement
     */
    private function failResult($code, $message)
    {
        if ('xml' == $this->format) {
            return @simplexml_load_string("<error_response><code>{$code}</code><msg>{$message}</msg></error_response>");
        } else {
            return [
                'code' => $code,
                'msg' => $message,
            ];
        }
    }

	private function generateSign($params)
	{
		ksort($params);

		$stringToBeSigned = $this->secretKey;
		foreach ($params as $k => $v)
		{
			if(!is_array($v) && "@" != substr($v, 0, 1))
			{
				$stringToBeSigned .= "$k$v";
			}
		}
		unset($k, $v);
		$stringToBeSigned .= $this->secretKey;

		return strtoupper(md5($stringToBeSigned));
	}

	/**
     * @param string $url
     * @param mixed $postFields
     * @return string
     * @throws \Exception
	 */
	private function curl($url, $postFields = null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if ($this->readTimeout) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
		}
		if ($this->connectTimeout) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
		}
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'top-sdk-php');
		//https 请求
		if (strlen($url) > 5 && strtolower(substr($url,0,5)) == 'https') {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}

		if (is_array($postFields) && 0 < count($postFields)) {
			$postBodyString = '';
			$postMultipart = false;
			foreach ($postFields as $k => $v)
			{
				if ('@' != substr($v, 0, 1)) {
                    //判断是不是文件上传
					$postBodyString .= "$k=" . urlencode($v) . '&';
				} else {
                    //文件上传用multipart/form-data，否则用www-form-urlencoded
					$postMultipart = true;
					if (class_exists('\CURLFile')) {
						$postFields[$k] = new \CURLFile(substr($v, 1));
					}
				}
			}
			unset($k, $v);
			curl_setopt($ch, CURLOPT_POST, true);
			if ($postMultipart) {
				if (class_exists('\CURLFile')) {
				    curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
				} else {
				    if (defined('CURLOPT_SAFE_UPLOAD')) {
				        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
				    }
				}
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			} else {
				$header = ['content-type: application/x-www-form-urlencoded; charset=UTF-8'];
				curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
				curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
			}
		}
		$reponse = curl_exec($ch);
		
		if (curl_errno($ch)) {
			throw new \Exception(curl_error($ch),0);
		} else {
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (200 !== $httpStatusCode) {
				throw new \Exception($reponse,$httpStatusCode);
			}
		}
		curl_close($ch);
		return $reponse;
	}

	private function curl_with_memory_file($url, $postFields = null, $fileFields = null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if ($this->readTimeout) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
		}
		if ($this->connectTimeout) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
		}
		curl_setopt ( $ch, CURLOPT_USERAGENT, "top-sdk-php" );
		//https 请求
		if(strlen($url) > 5 && strtolower(substr($url,0,5)) == "https" ) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		//生成分隔符
		$delimiter = '-------------' . uniqid();
		//先将post的普通数据生成主体字符串
		$data = '';
		if($postFields != null){
			foreach ($postFields as $name => $content) {
			    $data .= "--" . $delimiter . "\r\n";
			    $data .= 'Content-Disposition: form-data; name="' . $name . '"';
			    //multipart/form-data 不需要urlencode，参见 http:stackoverflow.com/questions/6603928/should-i-url-encode-post-data
			    $data .= "\r\n\r\n" . $content . "\r\n";
			}
			unset($name,$content);
		}

		//将上传的文件生成主体字符串
		if($fileFields != null){
			foreach ($fileFields as $name => $file) {
			    $data .= "--" . $delimiter . "\r\n";
			    $data .= 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $file['name'] . "\" \r\n";
			    $data .= 'Content-Type: ' . $file['type'] . "\r\n\r\n";//多了个文档类型

			    $data .= $file['content'] . "\r\n";
			}
			unset($name,$file);
		}
		//主体结束的分隔符
		$data .= "--" . $delimiter . "--";

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER , array(
		    'Content-Type: multipart/form-data; boundary=' . $delimiter,
		    'Content-Length: ' . strlen($data))
		); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$reponse = curl_exec($ch);
		unset($data);

		if (curl_errno($ch)) {
			throw new \Exception(curl_error($ch),0);
		} else {
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (200 !== $httpStatusCode) {
				throw new \Exception($reponse,$httpStatusCode);
			}
		}
		curl_close($ch);

		return $reponse;
	}

	private function getClusterTag()
    {
	    return substr($this->sdkVersion,0,11).'-cluster'.substr($this->sdkVersion,11);
    }
}
