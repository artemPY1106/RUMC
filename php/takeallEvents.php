<?php 
	require_once('connectdb.php');

	$queryAll = $conn->query('SELECT `idEvent` ,`tittle`, `tittleImage` FROM `event` ORDER BY `idEvent` DESC');
	$rows = $queryAll->fetchAll();
	echo json_encode($rows);
?>