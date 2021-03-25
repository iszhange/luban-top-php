<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkScOrderDetailsGetRequest;

final class TaobaoTbkScOrderDetailsGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkScOrderDetailsGetRequest();
        $req->setStartTime(date('Y-m-d H:i:s', time()-600));
        $req->setEndTime(date('Y-m-d H:i:s'));
        $result = $c->execute($req, '62014128d27e29680711ZZ6a7643cdea9a5ce87544cdd791076725086');
        var_dump($result);
        $this->assertArrayHasKey('data', $result);

    }

}