<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 6:16 PM
 */
class Validate
{

    public $error = [];
    public $passed = false;

    public function check($source, $items = [])
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $value = $source[$item];
                if ($rule == 'required' && empty($value)) {
                    $this->addError($item, "{$item} is required");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError($item, "{$item} must be minimum {$rule_value}");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError($item, "{$item} must be maximum {$rule_value}");
                            }
                            break;
                        case 'email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError($item, "please enter a valid {$item}");
                            }
                            break;
                        case 'website':
                            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                $this->addError($item, "please enter a valid {$item}");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError($item, "{$item} must be matches with {$rule_value}");
                            }
                            break;
                        case 'unique':
                            $check = App::getInstance()->get('corporation_officer', [$item, '=', $value]);
                            if ($check->count()) {
                                $this->addError($item, "{$item} already registered");
                            }
                            break;

                    }
                }
            }
        }
        if(empty($this->error())){
            $this->passed = true;
        } else {
            return $this;
        }
        return $this;

    }


    public function addError($key, $value)
    {
        $this->error[$key] = $value;
    }

    public function spanError($key)
    {
        if (!empty($this->error)) {
            if (array_key_exists($key, $this->error())) {
                return $this->error()[$key];
            }
        }
    }

    public function isError($key)
    {
        if (!empty($this->error)) {
            if (array_key_exists($key, $this->error())) {
                return " has-error";
            }
        }
    }



    public function error()
    {
        return $this->error;
    }

    public function pass()
    {
        return $this->passed;
    }
}