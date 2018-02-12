<?php
/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/6/2016
 * Time: 5:23 PM
 */

$objUser = new User();

if($objUser->isLogged()){
    Redirect::to('home');
}


$objValidate = new Validate();
if(Form::exists()){
    if(Token::exists(Form::getPost('token'))) {
        $validation = $objValidate->check($_POST, [
            'secret_id' => [
                'required' => true,
                'min' => 7,
                'max' => 20
            ],
            'password' => [
                'required' => true,
                'min' => 3,
                'max' => 32
            ]
        ]);

        if($validation->pass()){
            try {
                $objUser = new User();
                $login = $objUser->permit(Form::getPost('secret_id'), Form::getPost('password'));
                if($login){
                    Session::flash('info', 'You Signed In');
                    Redirect::to('home');
                } else {
                    Session::flash('Login Error');
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

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Corp || Rajshahi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once "css.php"; ?>
    </head>
<body>
    <div class="container text-center">
        <div class="row">

            <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                <div class="jumbotron">
                    <h1>Rajshahi City Corporation</h1>
                    <p>You City at Pocket</p>
                </div>
            </div>
        </div>
    </div>
<?php
if(Session::exist('info')){ ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12"><br>
                <div class="alert alert-success">
                    <p><?php echo Session::flash('info'); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php }
?>


    <br><br>

    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 hidden-sm hidden-xs"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xm-12">
            <form class="form-horizontal" name="myForm" role="form" action="" method="post">


                <div class="form-group  <?php echo $objValidate->isError('secret_id'); ?>">
                    <input type="text" name="secret_id" value="<?php echo Form::getPost('secret_id'); ?>"  class="form-control" id="father_name" placeholder="Enter Your Unique ID" >
                    <span class="help-block"><?php echo $objValidate->spanError('secret_id'); ?></span>
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




<?php require_once "footer.php"; ?>