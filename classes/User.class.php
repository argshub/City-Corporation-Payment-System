<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 8:57 PM
 */
class User
{

    public $isLogged = false;
    public $data;
    public $sessionName;

    public function __construct($user = null)
    {
        $this->sessionName = Config::get('cookie/cookie_name');
        if(!$user){
            if(Session::exist($this->sessionName)){
                $user = Session::get($this->sessionName);
                if($this->find($user)){
                    $this->isLogged = true;
                } else {
                    Session::delete($this->sessionName);
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function isLogged()
    {
        return $this->isLogged;
    }

    public function find($user = null)
    {
        if(!empty($user)){
            $field = is_numeric($user) ? 'secret_id' : 'secret_password';
            $check = App::getInstance()->get('corp_customers', [$field, '=', $user]);
            if($check->count()){
                $this->data = $check->first();
                return true;
            }
        }
        return false;
    }

    public function permit($userId = null, $password = null)
    {
        if(!empty($userId) && !empty($password)){
            $user = $this->find($userId);
            if($user){
                if($this->data()->secret_password_hash == Hash::make($password, $this->data()->salt)){
                    Session::put($this->sessionName, $this->data()->secret_id);
                    return true;
                } else {
                    Session::flash('info', 'Invalid User Information');
                }
            } else {
                Session::flash('info', 'This Account is Not Registerd');
            }
        }
        return false;
    }

    public function info()
    {
        $check = App::getInstance()->get('corp_customer_info', ['id', '=', $this->data()->corp_customer_info_id]);
        if($check->count()){
            return $check->first();
        }
    }

    public function property($table, $id)
    {
        if(!empty($table) & !empty($id)){
            $check = App::getInstance()->get($table, ['id', '=', $id]);
            if($check->count()){
                return $check->first();
            }
        }
    }

    public function get($table, $id)
    {
        if(!empty($table) & !empty($id)){
            $check = App::getInstance()->get($table, ['id', '=', $id]);
            if($check->count()){
                return $check->first();
            }
        }
    }

    public function logout()
    {
        Session::delete($this->sessionName);
    }

    public function data()
    {
        return $this->data;
    }

}