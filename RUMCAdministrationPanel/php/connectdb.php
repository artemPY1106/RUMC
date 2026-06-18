<?php 
	try {
		$conn = new PDO('mysql:host=localhost;dbname=rumc_spo','root','root');	
	} catch (PDOException $e) {
		echo 'ОШИБКА'.$e->getMessage()."<br />";
	}
?>