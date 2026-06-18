<?php 
	require_once('connectdb.php');

	$queryVebinars = $conn->query('SELECT `idEvent` ,`tittle`, `tittleImage` FROM `event` WHERE `idType` = 2 ORDER BY `idEvent` DESC');
	$rows = $queryVebinars->fetchAll();
	echo json_encode($rows);
?>