<?php
require "../connection.php";

$sqlSelect = "SELECT DISTINCT 
`w`.id_ward,
`w`.name
FROM `nurse_ward` `nw` 
JOIN `ward` `w` on `nw`.fid_ward = `w`.`id_ward` 
WHERE `nw`.fid_nurse = :nurse_id";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':nurse_id' => $_GET['nurse_id']));

$items = array();
foreach ($sth as $index => $row) {
	$items[] = array(
		'id_ward' => $row['id_ward'],
		'name' => $row['name'],
	);
}
?>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Имя</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($items as $value) : ?>
				<tr>
					<td><?php echo $value['id_ward']; ?></td>
					<td><?php echo $value['name']; ?></td>
				</tr>
			<?php endforeach; ?>
	</tbody>
</table>