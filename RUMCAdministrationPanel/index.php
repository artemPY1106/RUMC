<?php 
	session_start();
	if (@$_SESSION['user']) {
		header('Location: profile.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>Вход</title>
	<link rel="stylesheet" type="text/css" href="styles/origin.css">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body>
	<img src="images/logo.png" />
	<p class="hello">добро пожаловать</p>
	<form>
		<div>
			<p>Логин</p><input type="text" name="login" placeholder="Введите логин" />
		</div>
		<div>
			<p>Пароль</p><input type="password" name="password" placeholder="Введите пароль" />
		</div>
		<input type="submit" value="ВОЙТИ" class="logbtn" name="logbtn" />
		<p class="error-form"></p>
	</form>
</body>
<script src="js/ajax/login.js" type="text/javascript"></script>
</html>