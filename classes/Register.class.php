<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/8/2016
 * Time: 3:27 AM
 */
class Register extends Year
{

    public $register_id;
    public $clientId;
    public $propertyId;
    public $field = [];
    public $quarterId = [1, 2, 3, 4];

    public function goRegister($fields = [])
    {
        if(!empty($fields)){
            foreach ($fields as $field => $value){
                $this->field[$field] = $value;
            }
        }
        return $this->registerInfo();
    }

    public function addField($key, $value)
    {
        $this->field[$key] = $value;
    }

    public function registerInfo()
    {
        if(App::getInstance()->insert('corp_customer_info', [
            'first_name' => $this->field['first_name'],
            'last_name' => $this->field['last_name'],
            'father_name' => $this->field['father_name'],
            'mother_name' => $this->field['mother_name'],
            'holding_list_id' => $this->field['holding'],
            'road_list_id' => $this->field['road'],
            'wards_list_id' => $this->field['ward'],
            'moholla_list_id' => $this->field['moholla'],
            'post_code_list_id' => $this->field['post_code'],
            'thana_list_id' => $this->field['thana']
        ])){
            $this->register_id = App::getInstance()->insertId();
            return $this->addProperty();
        }

    }

    public function addProperty()
    {
        if(App::getInstance()->insert('customer_property', [
            'property_name' => $this->field['property_name'],
            'property_area' => $this->field['property_area'],
            'water_amount' => 0,
            'register_date' => $this->field['register_date'],
            'holding_id' => $this->field['holding'],
            'road_id' => $this->field['road'],
            'ward_id' => $this->field['ward'],
            'moholla_id' => $this->field['moholla'],
            'post_code_id' => $this->field['post_code'],
            'thana_id' => $this->field['thana']
        ])){
            $this->propertyId = App::getInstance()->insertId();
            return $this->secretInsert();
        }
    }

    public function secretInsert()
    {
        $salt = Hash::salt(32);
        if(App::getInstance()->insert('corp_customers', [
            'secret_id' => $this->field['tin_number'],
            'secret_password' => $this->field['last_name'],
            'secret_password_hash' => Hash::make($this->field['last_name'], $salt),
            'salt' => $salt,
            'tin_number' => $this->field['tin_number'],
            'corp_customer_info_id' => $this->register_id,
            'customer_property_id' => $this->propertyId
        ])){
            $this->clientId = App::getInstance()->insertId();
            return $this->addPropertyDetails();
        }

    }

    public function addPropertyDetails()
    {
        if(App::getInstance()->insert('property_tax', [
            'client_id' => $this->clientId,
            'property_id' => $this->propertyId,
            'tax_amount' => ($this->field['property_area'] * 3),
            'start_date' => $this->field['register_date']
        ])){
            return $this->addPayment();
        }
    }

    public function addPayment()
    {
        foreach ($this->getData() as $year) {
            for ($i = 1; $i <= 4; $i++) {
                App::getInstance()->insert('property_payment', [
                    'property_id' => $this->propertyId,
                    'payment_amount' => ($this->field['property_area'] * 3),
                    'quarter_id' => $i,
                    'year_id' => $year->id
                ]);
            }
        }
        return $this->getUpdate();

    }

    public function getUpdate()
    {
        if(!App::getInstance()->update('property_payment', 92, [
            'payment_status' => 1
        ]))
        {
            throw new Exception('There is a problem with update');
        }
    }




    public function getFields()
    {
        return $this->field;
    }



}