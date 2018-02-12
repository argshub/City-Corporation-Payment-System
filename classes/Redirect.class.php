<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 8:56 PM
 */
class Redirect
{
    public static function to($location = null)
    {
        if(!empty($location))
        {
            header("Location: ?_q=".$location);
            exit();
        }
    }

}