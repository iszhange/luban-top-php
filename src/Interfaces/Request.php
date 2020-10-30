<?php

namespace LuBan\Top\Interfaces;

use LuBan\Top\Exceptions\ParameterException;

interface Request
{

    public function getApiMethodName();

    public function getApiParas();

    /**
     * @throws ParameterException
     */
    public function check();

}