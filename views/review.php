<?php
/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/20/2016
 * Time: 3:03 AM
 */

require_once 'header.php';

$id = Url::getParam('id');

if(!empty($id)){
    $objTax = new Tax();
    $fraud = $objTax->getFraud($id); ?>
    <br><h2 class="text-center">Your Payment is Being Reviewed, You Provide Some Wrong Information</h2>
    <br><h3 class="text-center">Your Wrong Details For Property</h3><br>
    <div class="text-center">
        <div class="panel panel-secondary">
            <div class="panel-heading">
                <?php
                $objYear = new Year();
                $year = $objYear->getYear($fraud->year_id);
                if ($fraud->quarter_id == 1) { ?>
                    <h2>January-February-March, <strong><?php echo $year->name; ?></strong></h2>
                <?php } else if ($fraud->quarter_id == 2) { ?>
                    <h2>April-May-June, <strong><?php echo $year->name; ?></strong></h2>
                <?php } else if ($fraud->quarter_id == 3) { ?>
                    <h2>July-August-September, <strong><?php echo $year->name; ?></strong></h2>
                <?php } else if ($fraud->quarter_id == 4) { ?>
                    <h2>October-November-December, <strong><?php echo $year->name; ?></strong></h2>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <br><h4 class="text-center">If You Need Further Query, Please Contact with the Administrator</h4>
<?php }

?>



<?php require_once 'footer.php'; ?>