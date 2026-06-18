<?php 
    include_once('../../php/connectdb.php');
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
        <h1 class="title-page">Курсы</h1>
		<div class="wrapper-course-manager">
            <div class="wrapper-courses">
                <?php
                    $course = $conn->prepare("SELECT `idkursi`,`name`, `about`, `image`, `type`, `dateStart`, `dateClose`, `status` FROM `kursi` ORDER BY `idkursi` DESC");
                    $course->execute();
                    foreach ($course as $row) {
                        echo '
                            <div class="card-course">
                                <div class="course-img" style="background-image: url(../../../'.$row['image'].')"></div>
                                <div class="info-course">
                                    <p class="name-course">'.$row['name'].'</p>
                                    <hr class="line-bold" />
                                    <p class="about-course">'.$row['about'].'</p>
                                    <div class="wrapper-date">
                                        <p>Дата начала: '.$row['dateStart'].'</p>|
                                        <p>Дата окончания: '.$row['dateClose'].'</p>
                                    </div>
                                    <div class="prop-course">
                                        <p class="level-course">'.$row['type'].'</p>
                                        <p class="status-course">'.$row['status'].'</p>
                                    </div>
                                    <div class="actions-course">
                                        <a href="updateCourse.php?id='.$row['idkursi'].'">Редактировать</a>
                                        <button class="close-open" value="'.$row['idkursi'].'">Открыть курс</button>                        
                                        <button class="delete-course" value="'.$row['idkursi'].'">Удалить</button>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
            <form class="create-course">
                <h1>Добавить новый курс</h1>
                <div>
				    <p>Название</p><input type="text" name="tittle" maxlength="200" placeholder="До 200 символов!" require />
			    </div>
                <div>
				    <p>Описание</p><input type="text" name="about" maxlength="500" placeholder="До 500 символов!" require />
			    </div>
                <div>
				    <p>Ссылка на обучение (можно оставить пустым)</p><input type="text" name="linkCourse" maxlength="300" placeholder="https://" require />
			    </div>
                <div>
				    <p>Дата начала</p><input type="date" name="dateStart" require />
			    </div>
                <div>
				    <p>Дата окончания</p><input type="date" name="dateEnd" require />
			    </div>
                
                <div>
                    <p>Уровень (можно оставить пустым)</p>
                    <select name="levelCourse">
                        <option value=""></option>
                        <option value="Базовый уровень">Базовый уровень</option>
                        <option value="Продвинутый уровень">Продвинутый уровень</option>
                    </select>
                </div>
                <div>
                    <p class="without-bg" style="background: none; top:-30px;">Фото для карточки курса</p><input type="file" accept=".jpg, .jpeg, .png" name="cardPhoto" class="photo" require/>
                </div>
                <div>
                    <input type="submit" class="send-inf" value="Добавить"/>
                </div>
            </form>
        </div>
		<a href="../../profile.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Вернуться назад</a>
	</main>
</body>
<script src="../../js/animate/alert.js"></script>
<script src="../../js/ajax/createCourse.js"></script>
<script src="../../js/ajax/openCloseCourse.js"></script>
<script src="../../js/ajax/deleteCourse.js"></script>
</html>