<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 6:03 PM
 */
class Form
{
    public static function exists($type = 'post')
    {
        switch ($type){
            case 'post':
                return !empty($_POST) ? true : false;
            break;
            case 'get':
                return !empty($_GET) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }

    public static function getPost($item = null)
    {
        if(isset($_POST[$item])){
            return stripslashes($_POST[$item]);
        } else if (isset($_GET[$item])){
            return stripcslashes($_GET[$item]);
        } else {
            return "";
        }
    }

}