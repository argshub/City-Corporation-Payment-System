<?php
require_once "../core/autoload.php";

$q = $_REQUEST['q'];

$list = new Lists();
$moholla = $list->getMohollaList($q);
echo '<option value="">Select a Moholla</option>';
foreach ($moholla as $item) {
    echo '<option value="';
    echo $item->id;
    echo '">';
    echo $item->moholla_name;
    echo '</option>';
 }

?>