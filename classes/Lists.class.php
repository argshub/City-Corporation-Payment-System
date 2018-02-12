<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/7/2016
 * Time: 2:40 PM
 */
class Lists
{

    public function getList($thana = null)
    {
        if(!empty($thana)){
            $check = App::getInstance()->fetchAll($thana);
            if($check->count())
            {
                return $check->result();
            }
        }
    }

    public function getWardList($id)
    {
        if(!empty($id)){
            $check = App::getInstance()->get('wards_list', ['thana_id', '=', $id]);
            if($check->count()){
                return $check->result();
            }
        }
    }
    public function getMohollaList($id)
    {
        if(!empty($id)){
            $check = App::getInstance()->get('moholla_list', ['ward_id', '=', $id]);
            if($check->count()){
                return $check->result();
            }
        }
    }

    public function getRoadList($id)
    {
        if(!empty($id)){
            $check = App::getInstance()->get('roads_list', ['moholla_id', '=', $id]);
            if($check->count()){
                return $check->result();
            }
        }
    }

    public function getHoldingList($id)
    {
        if(!empty($id)){
            $check = App::getInstance()->get('holding_lists', ['road_id', '=', $id]);
            if($check->count()){
                return $check->result();
            }
        }
    }


}