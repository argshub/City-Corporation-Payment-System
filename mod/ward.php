<?php
require_once "../core/autoload.php";

$q = $_REQUEST['q'];

$list = new Lists();
$ward = $list->getWardList($q);

foreach ($ward as $item) {
    echo '<option value="';
    echo $item->id;
    echo '">';
    echo $item->wards_name;
    echo '</option>';
}
?>