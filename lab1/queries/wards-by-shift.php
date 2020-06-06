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
?>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Дата</th>
			<th>Отделение</th>
			<th>Смена</th>
			<th>ID Палаты</th>
			<th>Палата</th>
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
					<td><?php echo $value['id_ward']; ?></td>
					<td><?php echo $value['ward_name']; ?></td>
				</tr>
			<?php endforeach; ?>
	</tbody>
</table>