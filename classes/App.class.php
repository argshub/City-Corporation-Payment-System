<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/6/2016
 * Time: 12:19 AM
 */
class App
{
    public static $instance = null;

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new DB();
        }
        return self::$instance;
    }
}