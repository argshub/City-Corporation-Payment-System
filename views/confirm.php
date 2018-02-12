<?php
/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/19/2016
 * Time: 3:06 AM
 */

$objUser = new User();

if(!$objUser->isLogged()){
    Redirect::to('login');
}

$objValidate = new Validate();
if(Form::exists()){
    if(Token::exists(Form::getPost('token'))) {
        $validation = $objValidate->check($_POST, [
            'year' => [
                'required' => true
            ],
            'quarter' => [
                'required' => true
            ],
            'mobile_number' => [
                'required' => true
            ],
            'transaction_id' => [
                'required' => true
            ],
            'reference_number' => [
                'required' => true
            ],
            'payment_amount' => [
                'required' => true
            ],
            'payment_date' => [
                'required' => true
            ]
        ]);

        if($validation->pass()){
            try {
                $objPayment = new Payment();
                $payment = $objPayment->getPayment(Form::getPost('transaction_id'), [
                    'year' => Form::getPost('year'),
                    'quarter' => Form::getPost('quarter'),
                    'mobile_number' => Form::getPost('mobile_number'),
                    'reference_number' => Form::getPost('reference_number'),
                    'payment_amount' => Form::getPost('payment_amount'),
                    'payment_date' => Form::getPost('payment_date')
                ]);
                if($payment){
                    Session::flash('info', 'You Payment Completed');
                } else {
                    Session::flash('Payment Error');
                }
            } catch(Exception $e){
                die($e->getMessage());
            }
        }
    } else {
        Session::flash('info', 'Token Not Exists');
    }

}
require_once 'header.php';



?>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h2 class="text-center">Confirm Your Payment</h2><br><br>
            <form class="form-vertical" role="form" action="" method="post">
                <div class="form-group  <?php echo $objValidate->isError('year'); ?>">
                    <select name="year" class="form-control">
                        <option value="">Select Year</option>
                        <?php
                        $objYear = new Year();
                        foreach ($objYear->yearList() as $item) { ?>
                            <option value="<?php echo $item->id; ?>" <?php echo Helper::selected($item->id, Form::getPost('year')); ?>><?php echo $item->name; ?></option>
                      <?php  }
                        ?>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('year'); ?></span>
                </div>
                <div class="form-group  <?php echo $objValidate->isError('quarter'); ?>">
                    <select name="quarter" class="form-control">
                        <option value="">Select Quarter</option>
                        <?php
                        foreach ($objYear->getQuarter() as $item) { ?>
                            <option value="<?php echo $item->id; ?>" <?php echo Helper::selected($item->id, Form::getPost('quarter')); ?>><?php echo $item->name; ?></option>
                        <?php  }
                        ?>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('quarter'); ?></span>
                </div>
                <div class="form-group  <?php echo $objValidate->isError('mobile_number'); ?>">
                    <input type="number" value="<?php echo Form::getPost('mobile_number'); ?>" name="mobile_number" class="form-control" placeholder="Type Mobile Number">
                    <span class="help-block"><?php echo $objValidate->spanError('mobile_number'); ?></span>
                </div>
                <div class="form-group  <?php echo $objValidate->isError('reference_number'); ?>">
                    <input type="number" value="<?php echo Form::getPost('reference_number'); ?>" name="reference_number" class="form-control" placeholder="Enter Reference Number">
                    <span class="help-block"><?php echo $objValidate->spanError('reference_number'); ?></span>
                </div>
                <div class="form-group  <?php echo $objValidate->isError('transaction_id'); ?>">
                    <input type="number" name="transaction_id" value="<?php echo Form::getPost('transaction_id'); ?>" class="form-control" placeholder="Enter Transaction Id">
                    <span class="help-block"><?php echo $objValidate->spanError('transaction_id'); ?></span>
                </div>
                <div class="form-group  <?php echo $objValidate->isError('payment_amount'); ?>">
                    <input type="number" name="payment_amount" value="<?php echo Form::getPost('payment_amount'); ?>" class="form-control" placeholder="Enter Payment Amount">
                    <span class="help-block"><?php echo $objValidate->spanError('payment_amount'); ?></span>
                </div>
                <div class="form-group  <?php echo $objValidate->isError('payment_date'); ?>">
                    <input type="date" name="payment_date" value="<?php echo Form::getPost('payment_date'); ?>" class="form-control" placeholder="Enter Payment Date">
                    <span class="help-block"><?php echo $objValidate->spanError('payment_date'); ?></span>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" class="btn btn-warning btn-xs pull-right">Submit</button>
            </form>
        </div>
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs"></div>
    </div>
</div>



<?php require_once 'footer.php'; ?>





