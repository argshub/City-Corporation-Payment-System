<?php
$objOfficer = new Officer();
if(!$objOfficer->isLogged()){
    Redirect::to('login');
}
require_once "template/header.php"; ?>

<div class="container">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <div class="">
            <h4 class="panel-heading panel-warning"><a class="" href="?_q=customer-registration">Insert New Customer Info</a></h4>
            <h4 class="panel-heading panel-warning"><a class="" href="?_q=property-register">Insert New Property</a></h4>
        </div>
    </div>
</div>

<?php require_once "template/footer.php"; ?>