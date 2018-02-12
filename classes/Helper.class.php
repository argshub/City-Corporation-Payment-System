<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/8/2016
 * Time: 1:32 AM
 */
class Helper
{

    public static function selected($value1 = null, $value2 = null)
    {
        if(!empty($value1) & !empty($value1)){
            if($value1 == $value2){
                return 'selected';
            }
        }
    }

}