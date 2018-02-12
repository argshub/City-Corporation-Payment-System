<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/19/2016
 * Time: 7:10 AM
 */
class Quarter
{
    public $id;
    public $data;
    public $year;

    public function __construct()
    {
        $this->addYear();
    }

    public function addYear()
    {
        $this->year = getdate()['year'];
        for ($i = 1955; $i <= $this->year; $i++)
        {
            App::getInstance()->insert('year_list', [
               'name' => $i
            ]);
        }

    }


}