<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 10:27 PM
 */
class Token
{

    public static function generate()
    {
        return Session::put(Config::get('session/session_token'), md5(uniqid()));
    }

    public static function exists($token)
    {

        $tokenName = Config::get('session/session_token');

        if(Session::exist($tokenName) && Session::get($tokenName) == $token){
            Session::delete($tokenName);
            return true;
        }
        return false;

    }

}