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
?>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Дата</th>
			<th>Отделение</th>
			<th>Смена</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($items as $value) : ?>
				<tr>
					<td><?php echo $value['id_nurse']; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['date']; ?></td>
					<td><?php echo $value['department']; ?></td>
					<td><?php echo $value['shift']; ?></td>
				</tr>
			<?php endforeach; ?>
	</tbody>
</table>