<?php
require "../connection.php";

$sqlSelect = "SELECT * FROM `nurse` `n` WHERE `n`.department = :depart";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':depart' => $_GET['depart']));

$items = array();
foreach ($sth as $index => $row) {
	$items[] = array(
		'id_nurse' => $row['id_nurse'],
		'name' => $row['name'],
		'date' => $row['date'],
		'department' => $row['department'],
		'shift' => $row['shift'],
	);
}

echo '<?xml version="1.0" encoding="utf8" ?>';
echo "<root>";
 
foreach ($items as $value) :
	echo "
	<nurse>
		<id_nurse>".$value['id_nurse']."</id_nurse>
		<name>".$value['name']."</name>
		<date>".$value['date']."</date>
		<department>".$value['department']."</department>
		<shift>".$value['shift']."</shift>
	</nurse>";
endforeach;
echo "</root>";
