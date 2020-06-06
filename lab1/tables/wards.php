<?php
require "./connection.php";

$sqlSelect = "SELECT * FROM `ward`";

$wards = array();

foreach ($dbh->query($sqlSelect) as $n) {
    $wards[] = array(
    	'id'	=> $n['id_ward'],
        'name' => $n['name'],
    );
}