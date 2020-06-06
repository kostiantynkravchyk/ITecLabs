<?php
require "./connection.php";

$sqlSelect = "SELECT * FROM `nurse`";

$nurses = array();
$departments = array();
$shifts = array();

foreach ($dbh->query($sqlSelect) as $n) {
    $nurses[] = array(
    	'id'	=> $n['id_nurse'],
        'name' => $n['name'],
        'date' => $n['date'],
        'department' => $n['department'],
        'shift' => $n['shift'],
    );
}

foreach ($nurses as $item) {
    $departments[] = $item['department'];
}
foreach ($nurses as $item) {
    $shifts[] = $item['shift'];
}

$shifts = array_unique($shifts);
$departments = array_unique($departments);