<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Zhange\HelloWord\Say;
use Zhange\HelloWord\Languages\Chinese;
use Zhange\HelloWord\Languages\English;

final class SayTest extends TestCase
{

    public function testChineseHello()
    {
        $say = new Say();
        $say->setLocale(new Chinese());

        $this->assertEquals(
            '大家好!',
            $say->hello()
        );

        $say->setLocale(new English());
        $say->hello();
    }

    public function testEnglishHello()
    {
        $say = new Say();
        $say->setLocale(new English());

        $this->assertEquals(
            'Hi,guys!',
            $say->hello()
        );

    }

}