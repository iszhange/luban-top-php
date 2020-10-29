<?php


namespace Zhange\HelloWord\Languages;


use Zhange\HelloWord\Interfaces\Say;

class Chinese implements Say
{

    public function hello()
    {
        return "大家好!";
    }
}