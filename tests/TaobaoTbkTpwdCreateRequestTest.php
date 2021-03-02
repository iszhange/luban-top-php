<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use LuBan\Top\Client;
use LuBan\Top\Requests\TaobaoTbkTpwdCreateRequest;

final class TaobaoTbkTpwdCreateRequestTest extends TestCase
{

    public function testRequest()
    {
        list($appkey, $secret) = include __DIR__ . '/configs.php';

        $c = new Client();
        $c->appKey = $appkey;
        $c->secretKey = $secret;
        $req = new TaobaoTbkTpwdCreateRequest();
        $req->setText('商品');
        $req->setUrl('https://uland.taobao.com/coupon/edetail?e=dvk4Qo5ebbgGQASttHIRqRlHSXvamlh8Gfkoq5jZgbaYsTf9GQYXaD%2B%2ByEkO1tuJVyRpivZqXWyh8MSxwLQMmYwXLtJbfxnDv1%2FAHDBSKqVGpU3d%2FEu%2B7ERFNRUGF6qFwdWr93Gr8MBMmdsrkidbOd3h1FtNvlY31WozoFaXPfz3TlSCox8Bq6VrktpyQYQ0WkuP%2FI%2BtPo%2BBVCJoJTBEqw%3D%3D&traceId=212bbcbb16146656796697991ebf05&union_lens=lensId:TAPI@1614665679@21081c0f_0824_177f1930351_0d31@01');
        $result = $c->execute($req);
        var_dump($result);
        $this->assertArrayHasKey('data', $result);

    }

}