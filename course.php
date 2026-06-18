<?php 
	include_once ('php/connectdb.php');
	$page = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<title>
		Курс РУМЦ
	</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/color/jquery.color-2.2.0.min.js" integrity="sha256-aSe2ZC5QeunlL/w/7PsVKmV+fa0eDbmybn/ptsKHR6I=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/ce798340d9.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js" integrity="sha512-HaoDYc3PGduguBWOSToNc0AWGHBi2Y432Ssp3wNIdlOzrunCtB2qq6FrhtPbo+PlbvRbyi86dr5VQx61eg/daQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" type="text/css" href="styles/origin.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">
	<link rel="stylesheet" type="text/css" href="styles/course.css">
	<!-- <script>
		( function ( d ) {
			var s=d.createElement("script");
			s.setAttribute("data-language", "ru");
			s.setAttribute("data-position", 3);
			s.setAttribute("data-size", "large");
			s.setAttribute("data-color", "#1f88ab");
			s.setAttribute("data-type", "3");

			s.setAttribute("data-account", "qhrSB9S3j8");
			s.setAttribute("src", "https://cdn.userway.org/widget.js");
			(d.body || d.head).appendChild(s);
		})(document);
	</script> -->
</head>
<body>
	<header>
		<nav class="nav-menu">
			<ul>
				<li class="btn-bars" id="btnBars">
					<p class="prefirst-btn bg-btn"></p>
					<div class="for-ico">
						<i class="fa-solid fa-bars myicoBars"></i>
						<i class="fa-solid fa-arrow-left myicoBars"></i>
					</div>
				</li>
				<li>
					<a href="index">
						<p class="first-btn bg-btn">Главная</p>
						<div class="for-ico">
							<i class="fa-solid fa-house myico"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="index#basicInformation" onclick="window.scrollTo(0,0);">
						<p class="first-btn bg-btn">Основные сведения</p>
						<div class="for-ico">
							<i class="fa-solid fa-circle-info myico1"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="index#education" onclick="window.scrollTo(0,0);">
						<p class="second-btn bg-btn">Образование</p>
						<div class="for-ico">
							<i class="fa-solid fa-graduation-cap myico2"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="index#careerGuidance" onclick="window.scrollTo(0,0);">
						<p class="third-btn bg-btn">Профориентация</p>
						<div class="for-ico">
							<i class="fa-solid fa-user-tie myico3"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="events" onclick="window.scrollTo(0,0);">
						<p class="fourth-btn bg-btn">Мероприятия</p>
						<div class="for-ico">
							<i class="fa-regular fa-calendar-days myico4"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="index#partners" onclick="window.scrollTo(0,0);">
						<p class="fifth-btn bg-btn">Партнеры</p>
						<div class="for-ico">
							<i class="fa-solid fa-handshake myico5"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="index#accessibleEnvironment" onclick="window.scrollTo(0,0);">
						<p class="sixth-btn bg-btn">Доступная среда</p>
						<div class="for-ico">
							<i class="fa-solid fa-universal-access myico6"></i>
						</div>
					</a>
				</li>
			</ul>
		</nav>
	</header>
			<?php 
				$course = $conn->query('SELECT * FROM `kursi` WHERE `idkursi` = '.$page.'');
				foreach ($course as $row) {
					echo '
						<main style="background-image: url('.$row['image'].')">
						<div class="fade"></div>
						<div class="course-wrapper">
							<h1>'.$row['name'].'</h1>
							<p>'.$row['about'].'</p>
							<p>Дата открытия: '.$row['dateStart'].' | Дата закрытия: '.$row['dateClose'].'</p>
					';
						if ($row['status'] === 'закрыт') {
							echo '<h2>Курс закрыт</h2>';
						} else {
							echo '<a href="'.$row['link'].'">Записаться на курс</a> </div>	</main>';
						}
				}
			?>
</body>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
	<script type="text/javascript" src="js/spa/route.js"></script>
	<script type="text/javascript" src="js/spa/router.js"></script>
	<script type="text/javascript" src="js/spa/app.js"></script>
	<script type="text/javascript" src="js/navigate.js"></script>
	<script type="text/javascript" src="js/animpage.js"></script>
</html>