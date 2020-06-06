<?php
require "../connection.php";

$sqlSelect = "SELECT 
`n`.id_nurse,
`n`.name,
`n`.date,
`n`.department,
`n`.shift,
`w`.id_ward,
`w`.name as 'ward_name'
FROM `nurse_ward` `nw`
JOIN `nurse` `n` on `n`.id_nurse = `nw`.fid_nurse
JOIN `ward` `w` on `w`.`id_ward` = `nw`.fid_ward
WHERE `n`.shift = :shift
";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':shift' => $_GET['shift']));

$items = array();
foreach ($sth as $index => $row) {
	$items[] = array(
		'id_nurse' => $row['id_nurse'],
		'name' => $row['name'],
		'date' => $row['date'],
		'department' => $row['department'],
		'shift' => $row['shift'],
		'id_ward' => $row['id_ward'],
		'ward_name' => $row['ward_name'],
	);
}

echo json_encode($items);