<?php 
    include_once('../../php/connectdb.php');
	session_start();
	if (!$_SESSION['user']) {
		header('Location: index.php');
	}
    $idKurs = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../images/favicon.ico" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://kit.fontawesome.com/ce798340d9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/color/jquery.color-2.2.0.min.js" integrity="sha256-aSe2ZC5QeunlL/w/7PsVKmV+fa0eDbmybn/ptsKHR6I=" crossorigin="anonymous"></script>
	<title>Курсы</title>
	<link rel="stylesheet" type="text/css" href="../../styles/origin.css">
	<link rel="stylesheet" type="text/css" href="../../styles/profile.css">
    <link rel="stylesheet" type="text/css" href="../../styles/kursi.css">
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
				<i class="fa-solid fa-xmark closeMessage"></i>
				<p class="error-send"></p>
			</div>
		</div>
        <h1 class="title-page">Редактировать курс</h1>
		<div class="wrapper-course-manager-update">
            <form class="create-course-update">
                <h1>Информация о курсе</h1>
                <?php
                    $aboutCourse = $conn->prepare('SELECT `name`, `about`, `dateStart`, `dateClose`, `link` FROM `kursi` WHERE `idkursi` = '.$idKurs.'');
                    $aboutCourse->execute();
                    foreach ($aboutCourse as $row) {
                        echo '
                            <input type="text" name="idK" value="'.$idKurs.'" hidden />
                            <div>
                                <p>Название</p><input type="text" name="tittle" maxlength="200" value="'.$row['name'].'" placeholder="До 200 символов!" />
                            </div>
                            <div>
                                <p>Описание</p><input type="text" name="about" maxlength="500" value="'.$row['about'].'" placeholder="До 500 символов!" />
                            </div>
                            <div>
                                <p>Ссылка на обучение (можно оставить пустым)</p><input type="text" name="linkCourse" value="'.$row['link'].'" maxlength="300" placeholder="https://" />
                            </div>
                            <div>
                                <p>Дата начала</p><input type="date" value="'.$row['dateStart'].'" name="dateStart" />
                            </div>
                            <div>
                                <p>Дата окончания</p><input type="date" value="'.$row['dateClose'].'" name="dateEnd"/>
                            </div>
                        ';
                    }
                ?>
                <div>
                    <input type="submit" class="send-inf" value="Сохранить"/>
                </div>
            </form>
        </div>
		<a href="kursi.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Вернуться назад</a>
	</main>
</body>
<script src="../../js/animate/alert.js"></script>
<script src="../../js/ajax/updateCourse.js"></script>
</html>