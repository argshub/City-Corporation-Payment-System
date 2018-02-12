<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/19/2016
 * Time: 2:19 AM
 */
class Tax
{
    public $id;
    public $data;
    public $details;

    public function __construct($id = '')
    {
        $this->id = $id;
        $this->getPropertyDetails();
    }


    public function getPropertyDetails()
    {
        $check = App::getInstance()->get('property_payment', ['property_id', '=', $this->id]);
        if($check->count())
        {
            $this->data =  $check->result();
        }
    }

    public function getFraud($id = '')
    {
        $check = App::getInstance()->get('property_payment', ['id', '=', $id]);
        if($check->count()){
            return $check->first();
        }
    }

    public function getPropertyData()
    {
        return $this->data;
    }









}