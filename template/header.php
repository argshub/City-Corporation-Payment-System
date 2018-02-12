<!DOCTYPE html>
<html lang="en">
<head>
    <title>Corp || Rajshahi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once "css.php"; ?>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">RCC</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    $objUser = new User();
                    if(Session::exist(Config::get('cookie/cookie_name'))){
                        $user = $objUser->info(); ?>
                        <li class="dropdown">
                    <a href="javascript:void()" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo $user->first_name.' '.$user->last_name; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="?_q=logout">Log Out</a></li>
                </ul>
                </li>
                <?php    }
                ?>

            </ul>
        </div>
    </div>
</nav>

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




