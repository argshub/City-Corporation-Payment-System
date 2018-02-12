<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 9:15 PM
 */
class Session
{
    public static function put($name, $value = null)
    {
        return $_SESSION[$name] = $value;
    }

    public static function exist($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    public static function delete($name)
    {
        if(self::exist($name)){
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $string = null)
    {
        if(self::exist($name)){
            $session = self::get($name);
            Session::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }

}