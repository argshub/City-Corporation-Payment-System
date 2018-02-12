<?php

/**
 * Created by PhpStorm.
 * User: Shazzad
 * Date: 5/5/2016
 * Time: 3:56 PM
 */
class Home
{

    public function __construct()
    {
        ob_start();
        ob_get_flush();
        require_once(Url::getpage());
    }
}