<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkActivityInfoGetRequest;

final class TaobaoTbkActivityInfoGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkActivityInfoGetRequest();
        $req->setAdzoneId('62361250323');
        $req->setActivityMaterialId('20150318020002597');
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('data', $result);

    }

}