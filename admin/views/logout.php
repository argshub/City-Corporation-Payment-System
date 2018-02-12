<?php

$objOfficer = new Officer();
$objOfficer->logout();
Redirect::to('login');