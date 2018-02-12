<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/19/2016
 * Time: 12:14 PM
 */
class Year
{
    public $id;

    public function __construct()
    {
        $this->getYearList();
    }

    public function getYear($id = '')
    {
        $check = App::getInstance()->get('year_list', ['id', '=', $id]);
        if($check->count()){
            return $check->first();
        }
    }

    public function getYearList()
    {
        $check = App::getInstance()->get('year_list', ['name', '>', 2010]);
        if($check->count())
        {
            $this->id = $check->result();
        }

    }

    public function getQuarter()
    {
        $check = App::getInstance()->fetchAll('quarter_list');
        if($check->count()){
            return $check->result();
        }
    }

    public function yearList()
    {
        $check = App::getInstance()->fetchAll('year_list');
        if($check->count()){
            return $check->result();
        }
    }


    public function getData()
    {
        return $this->id;
    }
}