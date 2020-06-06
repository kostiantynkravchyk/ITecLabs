<?php

require "../connection.php";

$nurseName = $_GET['nurseName'];

$query = ["nurses.name" => ['$all' => [ $nurseName ]]];

$cursor = $db->duties->find($query, [ 'projection' => ['_id' => 0, "wards" => 1] ]);
echo json_encode(iterator_to_array($cursor));