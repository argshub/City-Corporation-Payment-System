<?php
/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/8/2016
 * Time: 5:31 PM
 */

$objList = new Lists();
$thana = $objList->getList('thana_list');
$post_code = $objList->getList('post_code_list');
$objOfficer = new Officer();

if(!$objOfficer->isLogged()){
    Redirect::to('login');
} ?>
<?php
$objValidate = new Validate();
if(Form::exists()){
    if(Token::exists(Form::getPost('token'))) {
        $validation = $objValidate->check($_POST, [
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
            ]

        ]);

        if($validation->pass()){
            try {
                $objProperty = new Property();

                $objProperty->addField([
                    'thana' => Form::getPost('thana'),
                    'ward' => Form::getPost('ward'),
                    'moholla' => Form::getPost('moholla'),
                    'road' => Form::getPost('road'),
                    'holding' => Form::getPost('holding')
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


<?php require_once "template/header.php";
?>



    <div class="container">
        <div class="row">
            <form class="form-horizontal" name="myForm" role="form" action="" method="post">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2 class="panel-heading panel-primary">Property List Register</h2><hr><br></hr>
                </div>

                <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="form-group <?php echo $objValidate->isError('thana'); ?>">
                        <input type="text" name="thana" value="<?php echo Form::getPost('thana'); ?>" class="form-control" placeholder="Thana Name Here">
                        <span class="help-block"><?php echo $objValidate->spanError('thana'); ?></span>
                    </div>
                    <div class="form-group <?php echo $objValidate->isError('ward'); ?>">
                        <input type="text" name="ward" value="<?php echo Form::getPost('ward'); ?>" class="form-control" placeholder="Ward Name Here">
                        <span class="help-block"><?php echo $objValidate->spanError('ward'); ?></span>
                    </div>
                    <div class="form-group <?php echo $objValidate->isError('moholla'); ?>">
                        <input type="text" name="moholla" value="<?php echo Form::getPost('moholla'); ?>" class="form-control" placeholder="Moholla Name Here">
                        <span class="help-block"><?php echo $objValidate->spanError('moholla'); ?></span>
                    </div>

                    <div class="form-group <?php echo $objValidate->isError('road'); ?>">
                        <input type="text" name="road" value="<?php echo Form::getPost('road'); ?>" class="form-control" placeholder="Road Name Here">
                        <span class="help-block"><?php echo $objValidate->spanError('road'); ?></span>
                    </div>
                    <div class="form-group <?php echo $objValidate->isError('holding'); ?>">
                        <input type="text" name="holding" value="<?php echo Form::getPost('holding'); ?>" class="form-control" placeholder="Holding Name Here">
                        <span class="help-block"><?php echo $objValidate->spanError('holding'); ?></span>
                    </div>

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <button type="submit" class="btn btn-success btn-xs pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php require_once "template/footer.php"; ?>