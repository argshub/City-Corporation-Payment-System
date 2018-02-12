
<?php
$objOfficer = new Officer();

if($objOfficer->isLogged()){
    Redirect::to('home');
} ?>
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
            'username' => [
                'required' => true,
                'min' => 3,
                'max' => 32,
                'unique' => 'users'
            ],
            'password' => [
                'required' => true,
                'min' => 3,
                'max' => 32
            ],
            'password_match' => [
                'required' => true,
                'min' => 3,
                'max' => 32,
                'matches' => 'password'
            ],

        ]);

        if($validation->pass()){
            try {
                $salt = Hash::salt(32);
                $objOfficer->register([
                    'first_name' => Form::getPost('first_name'),
                    'last_name' => Form::getPost('last_name'),
                    'username' => Form::getPost('username'),
                    'password' => Hash::make(Form::getPost('password'), $salt),
                    'salt' => $salt
            ]);
                Session::flash('info', 'You Have Been Signed Up');
                Redirect::to('login');

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

<br><br>

    <div class="container">
        <div class="row">
            <form class="form-horizontal" name="myForm" role="form" action="" method="post">
                <div class="col-lg-6 col-lg-6 col-sm-12 col-xs-12">
                </div>
                    <div class="col-lg-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group <?php echo $objValidate->isError('first_name'); ?>">

                            <input type="text" name="first_name" value="<?php echo Form::getPost('first_name'); ?>"  class="form-control" id="first_name" placeholder="Enter First Name" >
                            <span class="help-block"><?php echo $objValidate->spanError('first_name'); ?></span>
                    </div>
                    <div class="form-group <?php echo $objValidate->isError('last_name'); ?>">
                            <input type="text" name="last_name" value="<?php echo Form::getPost('last_name'); ?>"  class="form-control" id="mother_name" placeholder="Enter Last Name" >
                            <span class="help-block"><?php echo $objValidate->spanError('last_name'); ?></span>
                    </div>

                    <div class="form-group <?php echo $objValidate->isError('username'); ?>">
                            <input type="text" name="username" value="<?php echo Form::getPost('username'); ?>"  class="form-control" id="username" placeholder="Enter Username" >
                            <span class="help-block"><?php echo $objValidate->spanError('username'); ?></span>
                    </div>

                        <div class="form-group <?php echo $objValidate->isError('password'); ?>">
                            <input type="text" name="password" value="<?php echo Form::getPost('password'); ?>"  class="form-control" id="password" placeholder="Enter Password" >
                            <span class="help-block"><?php echo $objValidate->spanError('password'); ?></span>
                        </div>
                        <div class="form-group <?php echo $objValidate->isError('password_match'); ?>">
                            <input type="text" name="password_match" value="<?php echo Form::getPost('password_match'); ?>"  class="form-control" id="password_match" placeholder="Enter Password Again" >
                            <span class="help-block"><?php echo $objValidate->spanError('password_match'); ?></span>
                        </div>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <button type="submit" class="btn btn-success btn-xs pull-right">Submit</button>
                    </div>
            </form>
        </div>
    </div>
<?php require_once "template/footer.php"; ?>