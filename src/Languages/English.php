<?php


namespace Zhange\HelloWord\Languages;


use Zhange\HelloWord\Interfaces\Say;

class English implements Say
{

    public function hello()
    {
        return "Hi,guys!";
    }
}