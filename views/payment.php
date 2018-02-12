<?php
$objUser = new User();

if(!$objUser->isLogged()){
    Redirect::to('login');
}
require_once 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="text-center">
            <h2>Follow The Payment Method</h2>
            <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                <div class="row"><br>
                    <div class="col-sm-3">
                        <div class="panel panel-secondary">
                            <h3 class="panel-heading">Enter Your Bkash Wallet And Select Payment</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="panel panel-secondary">
                            <h3 class="panel-heading">Then Enter The Merchant ID of Rajhahi City Corporation</h3>
                        </div>
                        </div>
                    <div class="col-sm-3">
                        <div class="panel panel-secondary">
                            <h3 class="panel-heading">After That, Enter Your Property ID and Other Credential </h3>
                        </div>
                        </div>
                    <div class="col-sm-3"><div class="panel panel-secondary">
                            <h3 class="panel-heading">Save The Mobile Number and Transaction ID for further Reference</h3>
                        </div>
                        </div>
                </div>

                <br><br>
                <a href="?_q=confirm" class="btn btn-warning">Payment Complete, Need to Approved</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>