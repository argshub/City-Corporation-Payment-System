<?php

$objUser = new User();
if(!$objUser->isLogged()){
    Redirect::to('login');
}

$user = $objUser->info();
$property = $objUser->property('customer_property', $objUser->data()->customer_property_id);
$holding = $objUser->get('holding_lists', $property->holding_id);
$road = $objUser->get('roads_list', $property->road_id);
$moholla = $objUser->get('moholla_list', $property->moholla_id);
$post_code = $objUser->get('post_code_list', $property->post_code_id);
$ward = $objUser->get('wards_list', $property->ward_id);
$thana = $objUser->get('thana_list', $property->thana_id);
$objTax = new Tax($property->id);
$duelist = $objTax->getPropertyData();

?>

<?php require_once "header.php"; ?>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading">Total Due List</div>
                </div>
                <?php

                            foreach ($duelist as $item) {
                $objYear = new Year();
                                $year = $objYear->getYear($item->year_id);

                if ($item->payment_status == 0){ ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading">Total Due:: <p class="pull-right">
                                <strong><?php echo $item->payment_amount; ?> BDT.</strong></p></div>
                        <div class="panel-text">
                            <?php
                            if ($item->false_status == 0) { ?>
                                <a href="?_q=payment" class="btn btn-success btn-xs pull-right">Payment</a>
                            <?php } else if ($item->false_status == 1) { ?>
                                <a href="?_q=review&id=<?php echo $item->id; ?>" class="btn btn-danger btn-xs pull-right">Fraud</a>
                            <?php }
                            ?>
                            <?php
                            if ($item->quarter_id == 1) { ?>
                                <h5>January-February-March, <strong><?php echo $year->name; ?></strong></h5>
                            <?php } else if ($item->quarter_id == 2) { ?>
                                <h5>April-May-June, <strong><?php echo $year->name; ?></strong></h5>
                            <?php } else if ($item->quarter_id == 3) { ?>
                                <h5>July-August-September, <strong><?php echo $year->name; ?></strong></h5>
                            <?php } else if ($item->quarter_id == 4) { ?>
                                <h5>October-November-December, <strong><?php echo $year->name; ?></strong></h5>
                            <?php }
                            ?>

                        </div>
                    </div>


                <?php }
                            }?>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">Total Payment List</div>
                </div>
                <div class="list-group">
                    <?php

                    foreach ($duelist as $item) {
                        $objYear = new Year();
                        $year = $objYear->getYear($item->year_id);
                        if ($item->payment_status == 1){ ?>
                       <div class="list-group-item">
                                <div class="list-group-heading">Total Payment:: <p class="pull-right">
                                        <strong><?php echo $item->payment_amount; ?> BDT.</strong></p></div>

                                <p class="list-group-item-text">
                                    <?php
                                    if ($item->quarter_id == 1) { ?>
                                        <h5>January-February-March, <strong><?php echo $year->name; ?></strong></h5>
                                    <?php } else if ($item->quarter_id == 2) { ?>
                                        <h5>April-May-June, <strong><?php echo $year->name; ?></strong></h5>
                                    <?php } else if ($item->quarter_id == 3) { ?>
                                        <h5>July-August-September, <strong><?php echo $year->name; ?></strong></h5>
                                    <?php } else if ($item->quarter_id == 4) { ?>
                                        <h5>October-November-December, <strong><?php echo $year->name; ?></strong></h5>
                                    <?php }
                                    ?>
                                    </p>
                           <a href="?_q=invoice&id=<?php echo $item->id; ?>" class="btn btn-warning btn-xs">Invoice</a>
                           </div>

                        <?php }
                    }?>
                </div>
        </div>
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">Name:: <a class="pull-right"> <?php echo $user->first_name.' '.$user->last_name; ?></a></div>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading">Father Name:: <a class="pull-right"> <?php echo $user->father_name; ?></a></div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading">Mother Name:: <a class="pull-right"> <?php echo $user->mother_name; ?></a></div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading">Property Name:: <a class="pull-right"> <?php echo $holding->holding_name.', '.$property->property_name; ?></a></div>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading">Property Area:: <a class="pull-right"> <?php echo $property->property_area; ?> Sq. Meter</a></div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Water Supply:: <a class="pull-right"> <?php echo $property->water_amount; ?> Kb. Meter</a></div>
                    </div>
                    <div class="panel panel-warning">
                        <div class="panel-heading">Road Name:: <a class="pull-right"> <?php echo $road->road_name; ?></a></div>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading">Post Code:: <a class="pull-right"> <?php echo $post_code->post_code.', '.$post_code->sub_office; ?></a></div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">Moholla Name:: <a class="pull-right"> <?php echo $moholla->moholla_name; ?></a></div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">Ward Name:: <a class="pull-right"> <?php echo $ward->wards_name; ?></a></div>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading">Thana Name:: <a class="pull-right"> <?php echo $thana->thana_name; ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once "footer.php"; ?>