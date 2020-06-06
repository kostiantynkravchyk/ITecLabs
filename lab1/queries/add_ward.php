<?php
require "../connection.php";

try {
	$prevID = "SELECT id_ward FROM ward WHERE id_ward=(SELECT MAX(id_ward) FROM ward)";
	$insertWard = "INSERT INTO `ward`(`id_ward`, `name`) VALUES (?,?)";

	$sth = $dbh->prepare($prevID, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute();
	$prevID = 0;
	foreach ($sth as $value) {
		$prevID = (int)$value['id_ward'];
	}

	$ward_insert = $dbh->prepare($insertWard);

	if ($ward_insert->execute([$prevID+1,$_GET['ward_name']]))
	{
		echo "Палата успешно добавлена";
	} else {
		echo "Ошибка!";
	}
} catch (Exception $e) {
	echo $e;
}
