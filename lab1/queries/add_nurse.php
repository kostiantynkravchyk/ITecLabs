<?php
require "../connection.php";

try {
	$prevID = "SELECT id_nurse FROM nurse WHERE id_nurse=(SELECT MAX(id_nurse) FROM nurse)";
	$insertNurse = "INSERT INTO `nurse`(`id_nurse`, `name`, `date`, `department`, `shift`) VALUES (?,?,CURDATE(),?,?)";

	$sth = $dbh->prepare($prevID, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute();
	$prevID = 0;
	foreach ($sth as $value) {
		$prevID = (int)$value['id_nurse'];
	}

	$ward_insert = $dbh->prepare($insertNurse);

	if ($ward_insert->execute([$prevID+1,$_GET['name'],$_GET['department'],$_GET['shift']]))
	{
		echo "Медсестра успешно добавлена";
	} else {
		echo "Ошибка!";
	}
} catch (Exception $e) {
	echo $e;
}
