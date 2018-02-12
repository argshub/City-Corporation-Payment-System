<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 9:00 PM
 */
class Officer
{
    public $isLogged = false;
    public $data;
    public $sessionName;

    public function __construct($officer = null)
    {
        $this->sessionName = Config::get('session/session_name');
        if (!$officer) {
            if (Session::exist($this->sessionName)) {
                $user = Session::get($this->sessionName);
                if ($this->find($user)) {
                    $this->isLogged = true;
                    return true;
                } else {
                    Session::delete($this->sessionName);
                }
            }
        } else {
            $this->find($officer);
        }
    }

    public function find($username = null)
    {
        if (!empty($username)) {
            $field = !is_numeric($username) ? 'username' : 'id';
            $check = App::getInstance()->get('corporation_officer', [$field, '=', $username]);
            if ($check->count()) {
                $this->data = $check->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null)
    {
        $user = $this->find($username);
        if ($user) {
            if ($this->data->password == Hash::make($password, $this->data->salt)) {
                if ($this->data()->account_status == 1) {
                    Session::put($this->sessionName, $this->data->username);
                    return true;
                } else {
                    Session::flash('info', 'You Need To Activate Your Account');
                }
            } else {
                Session::flash('info', 'Invalid Password');
            }
        } else {
            Session::flash('info', 'You Are Not Registered, Please Register Yourself');
        }
        return false;
    }

    public function register($fields = [])
    {
        if (!App::getInstance()->insert('corporation_officer', $fields)) {
            throw new Exception("There is a problem with register");
        }
    }

    public function isLogged()
    {
        return $this->isLogged;
    }

    public function data()
    {
        return $this->data;
    }

    public function logout()
    {
        Session::delete($this->sessionName);
    }

    public function getRank()
    {
        $check = App::getInstance()->get('officer_rank', ['id', '=', $this->data()->officer_rank]);
        if ($check->count()) {
            return $check->first();
        }
    }
}