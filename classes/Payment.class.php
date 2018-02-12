<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/20/2016
 * Time: 8:22 AM
 */
class Payment
{
    public $data;
    public $property_details;
    public $paymentId;

    public function __construct()
    {
        $objUser = new User();
        $this->property_details = $objUser->get('corp_customers', $objUser->data()->id);
    }

    public function getPayment($transactionId, $data)
    {
        if(!empty($transactionId) && !empty($data)){
            $transId = $this->getTransactionId($transactionId);
            if($transId){
                if($this->data()->mobile_number == $data['mobile_number']){
                    if($this->data()->reference_number == $data['reference_number']){
                        if($this->data()->payment_amount > $data['payment_amount']){
                            Session::flash('info', 'You Payment Amount is Lesser than Preferred Payment');
                        } else {

                            if(App::getInstance()->insert('customer_order', [
                                'property_id' => $this->property_details->customer_property_id,
                                'quarter_id' => $data['quarter'],
                                'year_id' => $data['year'],
                                'mobile_number' => $data['mobile_number'],
                                'transaction_number' => $transactionId,
                                'payment_amount' => $data['payment_amount'],
                                'payment_date' => $data['payment_date']
                            ])){
                                $this->paymentId = App::getInstance()->insertId();
                                if(App::getInstance()->propertyUpdate('property_payment', $this->property_details->customer_property_id, $data['quarter'], $data['year'], [
                                    'payment_status' => 1
                                ])){
                                    if(App::getInstance()->insert('customer_invoice', [
                                        'client_id' => $this->property_details->id,
                                        'client_property_id' => $this->property_details->customer_property_id,
                                        'order_id' => $this->paymentId
                                    ])){
                                        Session::flash('info', 'Successfully Completed Your Payment');
                                    }
                                }
                            }
                        }
                    } else {
                        Session::flash('info', 'You Reference Number is Invalid');
                    }
                } else {
                    Session::flash('info', 'You Mobile Number is Invalid');
                }
            } else {
                Session::flash('info', 'You Havnt Done Any Payment');
            }
        }

    }

    public function data()
    {
        return $this->data;
    }

    public function getTransactionId($id = null)
    {
        if(!empty($id)){
            $field = is_numeric($id) ? 'transaction_number' : '';
            $check = App::getInstance()->get('bank_details', [$field, '=', $id]);
            if($check->count()){
                $this->data = $check->first();
                return true;
            }
        }
        return false;

    }

}