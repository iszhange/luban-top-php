<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkOrderDetailsGetRequest;

final class TaobaoTbkOrderDetailsGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkOrderDetailsGetRequest();
        $req->setStartTime(date('Y-m-d H:i:s', time()-600));
        $req->setEndTime(date('Y-m-d H:i:s'));
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('data', $result);

    }

}