<?php
require_once "../core/autoload.php";

$q = $_REQUEST['q'];

$list = new Lists();
$holding = $list->getHoldingList($q);

foreach ($holding as $item) {
    echo '<option value="';
    echo $item->id;
    echo '">';
    echo $item->holding_name;
    echo '</option>';
}

?>