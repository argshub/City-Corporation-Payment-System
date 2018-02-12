<?php

$objUser = new User();
$objUser->logout();
Redirect::to('login');