# luban-top (PHP)
鲁班·淘宝开放平台SDK

#### 使用示例
```php
require __DIR__ . '/vendor/autoload.php';

use LuBan\Top\Client;
use LuBan\Top\Requests\TbkItemInfoGetRequest;

$c = new Client();
$c->appKey = "You're appkey";
$c->secretKey = "You're appSecret";
$req = new TbkItemInfoGetRequest();
$req->setNumIids('627565398166');
$result = $c->execute($req);
var_dump($result);
```

#### 参考文档
- [淘宝开放平台](https://open.taobao.com)