<?php
require "../connection.php";

try {
	$insertWard = "INSERT INTO `nurse_ward`(`fid_nurse`, `fid_ward`) VALUES (?,?)";

	$ward_insert = $dbh->prepare($insertWard);

	if ($ward_insert->execute([$_GET['fid_nurse'],$_GET['fid_ward']]))
	{
		echo "Дежурство успешно добавлено";
	} else {
		echo "Ошибка!";
	}
} catch (Exception $e) {
	echo $e;
}
