<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\ClusterClient;
use LuBan\Top\Requests\TbkItemInfoGetRequest;

final class ClusterClientTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new ClusterClient();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TbkItemInfoGetRequest();
        $req->setNumIids('627565398166');
        $result = $c->execute($req);

        $this->assertArrayHasKey('results', $result);

    }

}