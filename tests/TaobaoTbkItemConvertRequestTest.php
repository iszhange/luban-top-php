<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkItemConvertRequest;

final class TaobaoTbkItemConvertRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkItemConvertRequest();
        $req->setFields('num_iid,click_url');
        $req->setNumIids('624175478197');
        $req->setAdzoneId('62361250323');
        $result = $c->execute($req);
        var_dump($result['results']);
        $this->assertArrayHasKey('results', $result);

    }

}