<?php

$objOfficer = new Officer();

if($objOfficer->isLogged()){
    Redirect::to('home');
}


$objValidate = new Validate();
if(Form::exists()){
    if(Token::exists(Form::getPost('token'))) {
        $validation = $objValidate->check($_POST, [
            'username' => [
                'required' => true,
                'min' => 3,
                'max' => 32
            ],
            'password' => [
                'required' => true,
                'min' => 3,
                'max' => 32
            ]
        ]);

        if($validation->pass()){
            try {

                $login = $objOfficer->login(Form::getPost('username'), Form::getPost('password'));

                if($login){
                    Session::flash('info', 'You Signed In');
                    Redirect::to('home');
                } else {
                    Session::flash('Please Input Valid Login Information');
                }
            } catch(Exception $e){
                die($e->getMessage());
            }
        }
    } else {
        Session::flash('info', 'Token Not Exists');
    }

}
?>

<?php require_once "template/header.php"; ?>


<br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 hidden-sm hidden-xs"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xm-12">
                <a href="?_q=admin-register" class="btn btn-secondary pull-right">Not Registered Yet</a>
            <form class="form-horizontal" name="myForm" role="form" action="" method="post">


                    <div class="form-group  <?php echo $objValidate->isError('username'); ?>">
                            <input type="text" name="username" value="<?php echo Form::getPost('username'); ?>"  class="form-control" id="father_name" placeholder="Enter UserName" >
                            <span class="help-block"><?php echo $objValidate->spanError('username'); ?></span>
                    </div>
                    <div class="form-group <?php echo $objValidate->isError('password'); ?>">
                            <input type="text" name="password" value="<?php echo Form::getPost('password'); ?>"  class="form-control" id="mother_name" placeholder="Enter Your Password" >
                            <span class="help-block"><?php echo $objValidate->spanError('password'); ?></span>
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <button type="submit" class="btn btn-info btn-xs pull-right">Submit</button>
            </form>


        </div>

    </div>




<?php require_once "template/footer.php"; ?>