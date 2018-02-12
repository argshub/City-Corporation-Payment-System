<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/20/2016
 * Time: 10:48 AM
 */
class Invoice
{

    public $id;

    public function __construct($id = '')
    {
        $this->id = $id;
    }

    public function getPayment()
    {
        $check = App::getInstance()->get('property_payment', ['id', '=', $this->id]);
        if($check->count()){
            return $check->first();
        }
    }

}