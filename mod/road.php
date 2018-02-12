<?php
require_once "../core/autoload.php";

$q = $_REQUEST['q'];

$list = new Lists();
$road = $list->getRoadList($q);

echo '<option value="">Select a Road</option>';
foreach ($road as $item) {
    echo '<option value="';
    echo $item->id;
    echo '">';
    echo $item->road_name;
    echo '</option>';
}


?>