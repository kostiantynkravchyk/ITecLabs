<?php

require "../connection.php";

$cursor = $db->duties->find(["departmentName" => $_GET['dept']], [ 'projection' => ['_id' => 0, "nurses" => 1] ]);
echo json_encode(iterator_to_array($cursor));
