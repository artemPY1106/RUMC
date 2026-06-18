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
	<link rel="icon" href="../../images/favicon.ico" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://kit.fontawesome.com/ce798340d9.js" crossorigin="anonymous"></script>
	<title>Создать мероприятие</title>
	<link rel="stylesheet" type="text/css" href="../../styles/origin.css">
	<link rel="stylesheet" type="text/css" href="../../styles/profile.css">
	<link rel="stylesheet" type="text/css" href="../../styles/createevent.css">
</head>
<body>
	<img src="../../images/logo.png" />
	<header>
		<div>
			<p>Профиль: <span><?=$_SESSION['user']['name']?></span></p>
			<a href="../../php/logout.php">Выйти</a>
		</div>
	</header>
	<main id="app">
		<div class="alert-wrapper">
			<div class="window-alert">
				<i class="fa-solid fa-xmark"></i>
				<p class="error-send"></p>
			</div>
		</div>
		<form class="create-event-form" enctype="multipart/form-data">
			<div>
				<select name="typeEvent">
					<?php 
						include_once('../../php/connectdb.php');
						$type = $conn->prepare("SELECT * FROM `type_event`");
						$type->execute();
						foreach ($type as $row) {
							echo '<option value="'.$row['idtype_event'].'">'.$row['name'].'</option>';
						}
					?>
				</select>
			</div>
			<div>
				<p>Заголовок</p><input type="text" name="tittle" maxlength="100" placeholder="ДО 100 СИМВОЛОВ!" />
			</div>
			<div>
				<p>Текст мероприятия</p><textarea type="text" name="textEvent" maxlength="800" placeholder="ДО 800 СИМВОЛОВ!"></textarea>
			</div>
			<div>
				<p>Дата мероприятия</p><input type="date" name="dateEvent"/>
			</div>
			<div>
				<p class="without-bg">Фото для карточки мероприятия</p><input type="file" accept=".jpg, .jpeg, .png" name="cardPhoto" class="photo" />
			</div>
			<div>
				<p class="without-bg">Все фотографии мероприятия</p><input type="file" accept=".jpg, .jpeg, .png" name="allPhoto[]" class="photo" multiple />
			</div>
			<div>
				<p>Код для вставки видео</p><input type="text" name="video" placeholder="Необязательно!" />
			</div>
			<div>
				<input type="submit" name="send-event" class="send-event">
			</div>
		</form>
		<a href="../../profile.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Вернуться назад</a>
	</main>
</body>
<script src="../../js/ajax/addevent.js" type="text/javascript"></script>
<script src="../../js/animate/alert.js" type="text/javascript"></script>
</html>