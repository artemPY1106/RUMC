<?php 
	require_once('connectdb.php');

	$queryOther = $conn->query('SELECT `idEvent` ,`tittle`, `tittleImage` FROM `event` WHERE `idType` = 3 ORDER BY `idEvent` DESC');
	$rows = $queryOther->fetchAll();
	echo json_encode($rows);
?>