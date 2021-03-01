<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkItemInfoGetRequest;

final class TaobaoTbkItemInfoGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkItemInfoGetRequest();
        $req->setNumIids('624175478197');
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('results', $result);

    }

}