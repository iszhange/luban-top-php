<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TbkItemInfoGetRequest;

final class TbkItemInfoGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TbkItemInfoGetRequest();
        $req->setNumIids('627565398166');
        $result = $c->execute($req);

        $this->assertArrayHasKey('results', $result);

    }

}