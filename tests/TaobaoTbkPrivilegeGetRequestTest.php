<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkPrivilegeGetRequest;

final class TaobaoTbkPrivilegeGetRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkPrivilegeGetRequest();
        $req->setAdzoneId('99542050012');
        $req->setItemId('545609591550');
        $req->setSiteId(356200186);
        $result = $c->execute($req, '62023158561bfed68274f9bdf680263a906d4a8df3a99c9527712929');
        var_dump($result);
        $this->assertArrayHasKey('result', $result);

    }

}