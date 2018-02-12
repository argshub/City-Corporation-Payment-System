<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/8/2016
 * Time: 7:26 PM
 */
class Property
{
    public $field = [];
    public $thanaId;
    public $wardId;
    public $mohollaId;
    public $roadId;
    public $holdingId;


    public function addField($fields = [])
    {
        if(!empty($fields)){
            foreach ($fields as $field => $value) {
                $this->field[$field] = $value;
            }
        }
        return $this->addThana();
    }

    public function addThana()
    {
        if(App::getInstance()->insert('thana_list', [
            'thana_name' => $this->field['thana']
        ])){
            $this->thanaId = App::getInstance()->insertId();
            return $this->addWard();
        }

    }

    public function addWard()
    {
        if(App::getInstance()->insert('wards_list', [
            'wards_name' => $this->field['ward'],
            'thana_id' => $this->thanaId
        ])){
            $this->wardId = App::getInstance()->insertId();
            return $this->addMoholla();
        }
    }

    public function addMoholla()
    {
        if(App::getInstance()->insert('moholla_list', [
            'moholla_name' => $this->field['moholla'],
            'ward_id' => $this->wardId,
            'thana_id' => $this->thanaId
        ])){
            $this->mohollaId = App::getInstance()->insertId();
            return $this->addRoads();
        }
    }

    public function addRoads()
    {
        if(App::getInstance()->insert('roads_list', [
            'road_name' => $this->field['road'],
            'moholla_id' => $this->mohollaId,
            'wards_id' => $this->wardId,
            'thana_id' => $this->thanaId
        ])){
            $this->roadId = App::getInstance()->insertId();
            return $this->addHolding();
        }
    }

    public function addHolding()
    {
        if(!App::getInstance()->insert('holding_lists', [
            'holding_name' => $this->field['holding'],
            'road_id' => $this->roadId,
            'moholla_id' => $this->mohollaId,
            'wards_id' => $this->wardId,
            'thana_id' => $this->thanaId
        ])){
            throw new Exception('There is a problem with Register');
        }
    }




    public function getField()
    {
        return $this->field;
    }



}