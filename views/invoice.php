<?php
/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/20/2016
 * Time: 10:45 AM
 */
$objUser = new User();
if(!$objUser->isLogged()){
    Redirect::to('login');
}

$id = Url::getParam('id');


if(!empty($id)){
    $objInvoice = new Invoice($id);

    $proper = $objInvoice->getPayment();
    $objYear = new Year();
    $year = $objYear->getYear($proper->year_id);


    $user = $objUser->info();
    $property = $objUser->property('customer_property', $objUser->data()->customer_property_id);
    $holding = $objUser->get('holding_lists', $property->holding_id);
    $road = $objUser->get('roads_list', $property->road_id);
    $moholla = $objUser->get('moholla_list', $property->moholla_id);
    $post_code = $objUser->get('post_code_list', $property->post_code_id);
    $ward = $objUser->get('wards_list', $property->ward_id);
    $thana = $objUser->get('thana_list', $property->thana_id);
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Invoice</title>
        <?php require_once 'css.php'; ?>
    </head>

    <body>
            <div class="container">
                <div class="jumbotron text-center">
                    <a href="#" class="pull-right" onclick="window.print(); return false">Print Invoice</a>
                    <h1>Rajshahi City Corporation </h1>
                    <p>Thank You for Staying with Us, Be Contacted</p>
                   

                </div>

                <div style="width: 60%;float: left;">
<h4><strong><div class="pull-right">
                            <?php
                            if ($proper->quarter_id == 1) { ?>
                                January-February-March, <strong><?php echo $year->name; ?></strong>
                            <?php } else if ($proper->quarter_id == 2) { ?>
                                April-May-June, <strong><?php echo $year->name; ?></strong>
                            <?php } else if ($proper->quarter_id == 3) { ?>
                                July-August-September, <strong><?php echo $year->name; ?></strong>
                            <?php } else if ($proper->quarter_id == 4) { ?>
                                October-November-December, <strong><?php echo $year->name; ?></strong>
                            <?php } ?></div>
                                   </strong></h4><br/>


                        <h4><strong>Payment Amount:: <div class="pull-right"> <?php echo $proper->payment_amount; ?> BDT.</div></strong></strong></h4>
                        <h4><strong>Payment Date:: <div class="pull-right"> 2016-12-12 12.00.34 GMT.</div></strong></strong></h4>
                        <h4><strong>Transaction ID:: <div class="pull-right"> 647299216188191</div></strong></strong></h4>
                        <h4><strong>Unique Rolling ID:: <div class="pull-right"> 80835261718177</div></strong></strong></h4>
                        <h4><strong>You Have Successfully Completed Your Payment</strong></strong></h4><br/>




                </div>
                <div style="width: 30%;float: right;">
                    <h4 class="pull-left"><strong><?php echo $user->first_name.' '.$user->last_name; ?></strong></h4><br><br>
                        <p><strong><?php echo $user->father_name; ?></br>
                        <?php echo $user->mother_name; ?></br>
                        <?php echo $holding->holding_name.', '.$property->property_name; ?>,
                        <?php echo $post_code->post_code.', '.$post_code->sub_office; ?>,
                        <?php echo $moholla->moholla_name; ?>,
                        <?php echo $thana->thana_name; ?></strong></p>
                </div>

                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4 class="text-center"><strong>Thank You for Being with Us. If You Feel Any Problem Please Contact With The Administrator for Further Reference</strong></h4>

    </body>

    </html>

<?php
} else {
    Redirect::to('error');
}
