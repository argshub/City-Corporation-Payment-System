<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 10:48 PM
 */
class Hash
{

    public static function make($string, $salt = null)
    {
        return hash('sha256', $string . $salt);
    }

    public static function salt($length)
    {
        return mcrypt_create_iv($length);
    }
    public static function unique()
    {
        return self::make(uniqid());
    }

}