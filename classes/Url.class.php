<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 3:59 PM
 */
class Url
{

    public static $page = '_q';
    public static $directory = VIEWS_DIR;


    public static function getParam($key)
    {
        return isset($_GET[$key]) && $_GET[$key] != "" ? $_GET[$key] : null;
    }

    public static function cPage()
    {
        return isset($_GET[self::$page]) ? $_GET[self::$page] : 'home';
    }


    public static function getpage()
    {
        $page = self::$directory.DS.self::cPage().EXT;
        $error = self::$directory.DS."error".EXT;
        return is_file($page) ? $page : $error;
    }
}