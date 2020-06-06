<?php

require "../connection.php";

$cursor = $db->duties->find(["departmentName" => $_GET['dept'], "shift" => $_GET['shift']], [ 'projection' => ['_id' => 0] ]);
echo json_encode(iterator_to_array($cursor));