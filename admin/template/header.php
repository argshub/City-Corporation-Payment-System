<!DOCTYPE html>
<html lang="en">
<head>
    <title>Corp || Office</title>
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
            <?php
            if(Session::exist(Config::get('session/session_name'))){
                $objOfficer = new Officer();
                ?>
            <a class="navbar-brand" href="#"><?php echo $objOfficer->getRank()->rank_name; ?></a>

          <?php  } else { ?>
                <a class="navbar-brand">Admin Panel</a>
           <?php }
            ?>
                    </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">


                <?php
                if(Session::exist(Config::get('session/session_name'))){

                    ?>
                    <li class="dropdown">
                        <a href="javascript:void()" class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"> <?php echo $objOfficer->data()->first_name.' '.$objOfficer->data()->last_name; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="?_q=logout">Log Out</a></li>
                        </ul>
                    </li>
                <?php  }
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


