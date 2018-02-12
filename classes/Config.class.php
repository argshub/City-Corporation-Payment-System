<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 4:17 PM
 */
class Config
{
    public static function get($path = null)
    {
        if(!empty($path))
        {
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            foreach ($path as $item) {

                if(isset($config[$item])){
                    $config = $config[$item];
                }
            }
            return $config;
        }
    }

}