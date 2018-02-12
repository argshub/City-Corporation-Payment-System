
<?php

$objList = new Lists();
$thana = $objList->getList('thana_list');
$post_code = $objList->getList('post_code_list');
$objOfficer = new Officer();

if(!$objOfficer->isLogged()){
    Redirect::to('login');
}
require_once "template/header.php";
?>

<div class="container">
    <div class="row">
        <?php
        $objValidate = new Validate();
        if(Form::exists()){
            if(Token::exists(Form::getPost('token'))) {
                $validation = $objValidate->check($_POST, [
                    'first_name' => [
                        'required' => true,
                        'min' => 3,
                        'max' => 32
                    ],
                    'last_name' => [
                        'required' => true,
                        'min' => 3,
                        'max' => 32
                    ],
                    'father_name' => [
                        'required' => true,
                        'min' => 3,
                        'max' => 32
                    ],
                    'mother_name' => [
                        'required' => true,
                        'min' => 3,
                        'max' => 32
                    ],
                    'tin_number' => [
                        'required' => true
                    ],
                    'post_code' => [
                        'required' => true
                    ],
                    'holding' => [
                        'required' => true
                    ],
                    'road' => [
                        'required' => true
                    ],
                    'ward' => [
                        'required' => true
                    ],
                    'moholla' => [
                        'required' => true
                    ],
                    'thana' => [
                        'required' => true
                    ],
                    'property_name' => [
                        'required' => true
                    ],
                    'property_area' => [
                        'required' => true
                    ],
                    'register_date' => [
                        'required' => true
                    ]
                ]);

                if($validation->pass()){
                    try {
                        $objRegister = new Register();
                        $objRegister->goRegister([
                            'first_name' => Form::getPost('first_name'),
                            'last_name' => Form::getPost('last_name'),
                            'father_name' => Form::getPost('father_name'),
                            'mother_name' => Form::getPost('mother_name'),
                            'tin_number' => Form::getPost('tin_number'),
                            'post_code' => Form::getPost('post_code'),
                            'holding' => Form::getPost('holding'),
                            'road' => Form::getPost('road'),
                            'ward' => Form::getPost('ward'),
                            'moholla' => Form::getPost('moholla'),
                            'thana' => Form::getPost('thana'),
                            'property_name' => Form::getPost('property_name'),
                            'property_area' => Form::getPost('property_area'),
                            'register_date' => Form::getPost('register_date')
                        ]);
                        Session::flash('info', 'New Customer Record Successful');
                    } catch (Exception $e){
                        die($e->getMessage());
                    }
                }

            } else {
                Session::flash('info', 'Token Not Exists');
            }

        }

        ?>

        <form class="form-horizontal" name="myForm" role="form" action="" method="post">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h2 class="panel-heading panel-primary">User Basic Info</h2><hr><br></hr>
                <div class="form-group <?php echo $objValidate->isError('first_name'); ?>">

                    <input type="text" name="first_name" value="<?php echo Form::getPost('first_name'); ?>"  class="form-control" id="first_name" placeholder="Enter First Name" >
                    <span class="help-block"><?php echo $objValidate->spanError('first_name'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('last_name'); ?>">
                    <input type="text" name="last_name" value="<?php echo Form::getPost('last_name'); ?>"  class="form-control" id="mother_name" placeholder="Enter Last Name" >
                    <span class="help-block"><?php echo $objValidate->spanError('last_name'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('father_name'); ?>">

                    <input type="text" name="father_name" value="<?php echo Form::getPost('father_name'); ?>"  class="form-control" id="first_name" placeholder="Enter Father Name" >
                    <span class="help-block"><?php echo $objValidate->spanError('father_name'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('mother_name'); ?>">
                    <input type="text" name="mother_name" value="<?php echo Form::getPost('mother_name'); ?>"  class="form-control" id="mother_name" placeholder="Enter Mother Name" >
                    <span class="help-block"><?php echo $objValidate->spanError('mother_name'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('tin_number'); ?>">
                    <input type="number" name="tin_number" value="<?php echo Form::getPost('tin_number'); ?>"  class="form-control" id="mother_name" placeholder="Enter TIN Number" >
                    <span class="help-block"><?php echo $objValidate->spanError('tin_number'); ?></span>
                </div>

                <div class="form-group <?php echo $objValidate->isError('post_code'); ?>">
                    <select name="post_code" class="form-control">
                        <option value="">Select Post Code</option>
                        <?php
                        foreach ($post_code as $item) { ?>
                            <option value="<?php echo $item->id; ?>" <?php echo Helper::selected($item->id, Form::getPost('post_code')); ?>><?php echo $item->post_code.', '.$item->sub_office; ?></option>
                        <?php }
                        ?>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('post_code'); ?></span>
                </div>
            </div>

            <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="form-group <?php echo $objValidate->isError('thana'); ?>">
                    <select name="thana" id="thana" class="form-control" onchange="showWard(this.value)">
                        <option value="">Select Thana</option>
                        <?php
                        foreach ($thana as $item) { ?>
                            <option value="<?php echo $item->id; ?>" <?php echo Helper::selected($item->id, Form::getPost('thana')); ?>><?php echo $item->thana_name; ?></option>
                        <?php }
                        ?>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('thana'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('ward'); ?>">
                    <select name="ward" id="ward" class="form-control" onchange="showMoholla(this.value)">
                        <option value="">Select a Ward</option>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('ward'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('moholla'); ?>">
                    <select name="moholla" id="moholla" class="form-control" onchange="showRoad(this.value)">
                        <option value="">Select Moholla</option>

                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('moholla'); ?></span>
                </div>

                <div class="form-group <?php echo $objValidate->isError('road'); ?>">
                    <select name="road" id="road" class="form-control" onchange="showHolding(this.value)">
                        <option value="">Select Road</option>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('holding'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('holding'); ?>">
                    <select name="holding" id="holding" class="form-control">
                        <option value="">Select Holding</option>
                    </select>
                    <span class="help-block"><?php echo $objValidate->spanError('holding'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('property_area'); ?>">
                    <input type="number" name="property_area" value="<?php echo Form::getPost('property_area'); ?>"  class="form-control" id="mother_name" placeholder="Enter Property Area" >
                    <span class="help-block"><?php echo $objValidate->spanError('property_area'); ?></span>
                </div>
                <div class="form-group <?php echo $objValidate->isError('property_name'); ?>">
                    <input type="text" name="property_name" value="<?php echo Form::getPost('property_name'); ?>"  class="form-control" id="mother_name" placeholder="Enter Property Name" >
                    <span class="help-block"><?php echo $objValidate->spanError('property_name'); ?></span>
                </div>

                <div class="form-group <?php echo $objValidate->isError('register_date'); ?>">
                    <input type="date" name="register_date" value="<?php echo Form::getPost('register_date'); ?>"  class="form-control" id="mother_name" placeholder="Enter Water Amount" >
                    <span class="help-block"><?php echo $objValidate->spanError('register_date'); ?></span>
                </div>

                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" class="btn btn-success btn-xs pull-right">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php require_once "template/footer.php"; ?>