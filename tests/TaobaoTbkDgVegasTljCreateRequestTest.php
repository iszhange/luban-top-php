<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkDgVegasTljCreateRequest;

final class TaobaoTbkDgVegasTljCreateRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkDgVegasTljCreateRequest();
        $req->setAdzoneId('62361250323');
        $req->setItemId('624175478197');
        $req->setTotalNum(1);
        $req->setName('测试淘礼金');
        $req->setUserTotalWinNumLimit(1);
        $req->setSecuritySwitch('true');
        $req->setPerFace(1);
        $req->setSendStartTime('2021-03-01 00:00:00');
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('result', $result);

    }

}