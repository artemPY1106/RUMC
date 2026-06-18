<?php 
	session_start();
	if (!$_SESSION['user']) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://kit.fontawesome.com/ce798340d9.js" crossorigin="anonymous"></script>
	<title>Панель администрирования</title>
	<link rel="stylesheet" type="text/css" href="styles/origin.css">
	<link rel="stylesheet" type="text/css" href="styles/profile.css">
</head>
<body>
	<div class="start-alert-wrapper">
		<p>Здравствуйте,</p>
		<p><?=$_SESSION['user']['name']." ".$_SESSION['user']['lastname']?>!</p>
		<p>Хорошей работы :)</p>
	</div>
	<img src="images/logo.png" />
	<header>
		<div>
			<p>Профиль: <span><?=$_SESSION['user']['name']?></span></p>
			<a id="logout">Выйти</a>
		</div>
	</header>
	<main id="app">
		<div class="jop-panel">
			<a href="views/functionalViews/createEvent.php">
				<p>Добавить мероприяте</p>
			</a>
			<a href="#jobWithDoc">
				<p>Документы</p>
			</a>
			<a href="views/functionalViews/kursi.php">
				<p>Курсы</p>
			</a>
		</div>
	</main>
</body>
<script src="js/animate/startalert.js" type="text/javascript"></script>
<script src="js/ajax/logout.js" type="text/javascript"></script>
<script src="js/ajax/addevent.js" type="text/javascript"></script>
<script src="js/animate/alert.js" type="text/javascript"></script>
<script type="text/javascript" src="js/spa/route.js"></script>
<script type="text/javascript" src="js/spa/router.js"></script>
<script type="text/javascript" src="js/spa/app.js"></script>
</html>
