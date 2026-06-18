<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<title>РУМЦ СПО КУЗБАССА</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/color/jquery.color-2.2.0.min.js" integrity="sha256-aSe2ZC5QeunlL/w/7PsVKmV+fa0eDbmybn/ptsKHR6I=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/ce798340d9.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js" integrity="sha512-HaoDYc3PGduguBWOSToNc0AWGHBi2Y432Ssp3wNIdlOzrunCtB2qq6FrhtPbo+PlbvRbyi86dr5VQx61eg/daQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" type="text/css" href="styles/origin.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">
	<link rel="stylesheet" type="text/css" href="styles/fileviewer.css">
	<link rel="stylesheet" type="text/css" href="styles/events.css">
	<link rel="stylesheet" type="text/css" href="styles/courses.css">
	<link rel="stylesheet" type="text/css" href="styles/education.css">
	<link rel="stylesheet" type="text/css" href="styles/careerGuidance.css">
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/media/mediaNav.css">
	<link rel="stylesheet" type="text/css" href="styles/media/mediaFirstWrapper.css">
	<link rel="stylesheet" type="text/css" href="styles/media/mediaMap.css">
	<link rel="stylesheet" type="text/css" href="styles/media/mediaTask.css">
	<link rel="stylesheet" type="text/css" href="styles/media/mediaConsaling.css">
	<link rel="stylesheet" type="text/css" href="styles/media/mediaCourses.css">
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
					<a href="#basicInformation" onclick="window.scrollTo(0,0);">
						<p class="first-btn bg-btn">Основные сведения</p>
						<div class="for-ico">
							<i class="fa-solid fa-circle-info myico1"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="#education" onclick="window.scrollTo(0,0);">
						<p class="second-btn bg-btn">Образование</p>
						<div class="for-ico">
							<i class="fa-solid fa-graduation-cap myico2"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="#careerGuidance" onclick="window.scrollTo(0,0);">
						<p class="third-btn bg-btn">Профориентация</p>
						<div class="for-ico">
							<i class="fa-solid fa-user-tie myico3"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="#events" onclick="window.scrollTo(0,0);">
						<p class="fourth-btn bg-btn">Мероприятия</p>
						<div class="for-ico">
							<i class="fa-regular fa-calendar-days myico4"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="#partners" onclick="window.scrollTo(0,0);">
						<p class="fifth-btn bg-btn">Партнеры</p>
						<div class="for-ico">
							<i class="fa-solid fa-handshake myico5"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="#accessibleEnvironment" onclick="window.scrollTo(0,0);">
						<p class="sixth-btn bg-btn">Доступная среда</p>
						<div class="for-ico">
							<i class="fa-solid fa-universal-access myico6"></i>
						</div>
					</a>
				</li>
			</ul>
		</nav>
	</header>
	<main id="app">
		<div class="start-page">
			<div class="first-info-wrapper">
				<div class="head-content-wrapper">
					<div class="back-logo">
						<div class="bg-logo"></div>
					</div>
					<div class="head-tittle">
						<p class="first-word">ресурсный</p>
						<p class="second-word">учебно-</p>
						<p class="third-word">методический</p>
						<p class="fourth-word">центр</p>
						<p class="fifth-word">СПО КУЗБАССА</p>
					</div>
					<div class="contacts">
						<a href="https://vk.com/rumckuzbass" target="_blank">
							<i class="fa-brands fa-vk"></i>
						</a>
						<p>+7 (3843) 37-56-19</p>		
					</div>
				</div>
				<div class="paralax-items">
					<div class="pc" id="pc"></div>
					<div class="pen" id="pen"></div>
					<div class="book" id="book"></div>
					<div class="grass" id="grass"></div>
				</div>
				<div class="about-wrapper" id="notebook">
					<div class="first-about">
						<p>Ресурсный учебно-методический центр</p>
						<p>- это статус, который присваивается профессиональной образовательной организации на основании решения высшего государственного органа исполнительной власти субъекта Российской Федерации</p>
					</div>
					<div class="second-about">
						<p>Цель деятельности РУМЦ СПО</p>
						<p>- методическое и экспертное сопровождение модернизации системы инклюзивного профессионального образования посредством совершенствования образовательной, инновационной, методической деятельности образовательных организаций, реализующих программы среднего профессионального образования, профессионального обучения и дополнительного профессионального образования инвалидов и людей с ОВЗ во всех профессиональных образовательных организациях закрепленного региона</p>
					</div>
				</div>
			</div>
			<div class="map-wrapper"></div>
			<div class="on-map-wrapper">
				<p class="tittle-map element-animation-opacity">Закрепление территории за Р УМЦ в системе СПО</p>
				<div class="map">
					<div class="map-kuzb"></div>
				</div>
				<div class="legend-wrapper">
					<div class="legend-city">
						<p>Сетевое взаимодействие  </p>
						<div></div>
					</div>
					<div class="legend-kuzb">
						<p>Закрепление территории </p>
						<div></div>
					</div>
				</div>
				<div class="file-zakrep-wrap">
					<a href="documents/homepage/zakrepspo.pdf" target="_blank">
						<i class="fa-solid fa-file"></i>
						<p>Закрепление территории.pdf</p>
					</a>
				</div>
			</div>
			<div class="white-gradient">
				
			</div>
			<div class="tasks-wrapper">
				<div class="tasks-tittle element-animation-opacity">
					<p class="first-word adpt-header">Задачи РУМЦ</p>
				</div>
				<div class="task-info-wrapper element-animation-opacity t1">
					<div class="task-info">
						<p>
							<span>Экспертно-консультационное сопровождение:</span> взаимодействие со специалистами ФУМО СПО, БПОО, ПОО по вопросам методического обеспечения проведения профориентационных мероприятий, методик и технологий организации сопровождения инвалидов и лиц с ОВЗ в субъекте РФ; проведение экспертизы адаптированных образовательных программ, методических материалов,  контрольно-оценочных средств
						</p>
					</div>
					<div class="task-img">
						<img src="images/task1.png">
					</div>
				</div>
				<div class="task-info-wrapper reverse-row element-animation-opacity t2">
					<div class="task-info">
						<p>
							<span>Методическое и научно-образовательное сопровождение:</span> учебно-методическое обеспечение реализации образовательных программ; разработка и актуализация адаптированных основных профессиональных образовательных  программ; разработка атласа профессий и ежегодное обновление ТОП-10 профессий
						</p>
					</div>
					<div class="task-img task2-img">
						<img src="images/task2.png">
					</div>
				</div>
				<div class="task-info-wrapper element-animation-opacity t3">
					<div class="task-info">
						<p>
							<span>Информационно-аналитическое сопровождение:</span> формирование, ведение и ежегодная актуализация банка адаптированных образовательных программ по закрепленным профессиям и  специальностям; разработка и проведение мониторингов; проведение различных экспертиз по поручению ФМЦИО
						</p>
					</div>
					<div class="task-img task2-img">
						<img src="images/task3.png">
					</div>
				</div>
				<div class="task-info-wrapper reverse-row element-animation-opacity t4">
					<div class="task-info">
						<p>
							<span>Межрегиональное развитие инклюзивного образования: </span>разработка и передача в другие РУМЦ СПО и ПОО на закрепленных территориях (субъектах Российской Федерации) методики и порядок  применения образовательных технологий для студентов с инвалидностью профессионального образования; организация и проведение регулярных специализированных научно-практических семинаров и конференций
						</p>
					</div>
					<div class="task-img task2-img">
						<img src="images/task4.png">
					</div>
				</div>
			</div>
			<div class="consaling-wrapper">
				<div class="consaling-tittle element-animation-opacity">
					<p class="first-word adpt-header">Консалтинг РУМЦ</p>
				</div>
				<div class="metrics-wrapper">
					<div class="metrics-content">
						<div class="metric met1">
							<div class="metric-number">
								<p class="spincrement">42</p>
							</div>
							<div class="metric-text">
								<p>
									Количество профессиональных образовательных организаций, курируемых РУМЦ СПО и включенных в сетевое взаимодействие в субъектах Российской Федерации, в которых обеспечены условия для получения среднего профессионального образования инвалидами и лицами с ОВЗ.
								</p>
							</div>
						</div>
						<div class="metric met2">
							<div class="metric-number">
								<p class="spincrement">5</p>
							</div>
							<div class="metric-text">
								<p>
									Количество разработанных программ повышения квалификации руководящих и педагогических работников профессиональных образовательных организаций по вопросам инклюзивного профессионального образования.
								</p>
							</div>
						</div>
						<div class="metric met3">
							<div class="metric-number">
								<p class="spincrement">52</p>
							</div>
							<div class="metric-text">
								<p>
									Количество реализуемых конкурсных заданий, разработанных с участием РУМЦ СПО, в рамках проведения соревнований по компетенциям конкурсов профессионального мастерства «Абилимпикс».
								</p>
							</div>
						</div>
						<div class="metric met4">
							<div class="metric-number">
								<p class="spincrement">29</p>
							</div>
							<div class="metric-text">
								<p>
									Количество разработанных РУМЦ СПО адаптированных образовательных программ, в том числе для не менее 4 нозологических групп.
								</p>
							</div>
						</div>
					</div>
					<div class="last-metric-wrapper">
						<div class="last-metric">		
							<div class="metric-text-horiz">
								<p>
									Численность педагогических работников профессиональных образовательных организаций, с которыми РУМЦ СПО заключены соглашения (договоры) в рамках сетевого взаимодействия на региональном и межрегиональном уровнях, прошедших повышение квалификации и (или) профессиональную переподготовку по вопросам инклюзивного образования, чел.
								</p>
							</div>
							<div class="metric-number-horiz">
								<p class="spincrement">545</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="courses-wrapper">
				<div class="tasks-tittle tt-center element-animation-opacity">
					<p class="first-word small-title adpt-header">Курсы повышения квалификации</p>
				</div>
				<div class="info-courses-wrapper">
					<div class="img-course"></div>
					<div class="all-courses">
						<ul class="list-courses">
							<?php
								require_once('php/connectdb.php');

								$allKursi = $conn->query('SELECT `idkursi`, `name`, `type` FROM `kursi` ORDER BY `idkursi` DESC');
								foreach ($allKursi as $row) {
									echo '
										<li>
											<a href="course.php?id='.$row['idkursi'].'">
												'.$row['name'].'';
												if ($row['type'] == 'Базовый уровень') {
													echo '
														<div style="background-color: #2fabd4;">'.$row['type'].'</div>
											</a>
										</li>';
												} else if ($row['type'] == 'Продвинутый уровень'){
													echo '
														<div style="background-color: #ff3573;">'.$row['type'].'</div>
											</a>
										</li>';
												} else {
													echo '
												</a>
										</li>';
												}
								}
							?>
							<a href="#courses" class="about-courses" onclick="window.scrollTo(0,0);">Посмотреть все курсы</a>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>

	</footer>
	<script type="text/javascript" src="js/spa/route.js"></script>
	<script type="text/javascript" src="js/spa/router.js"></script>
	<script type="text/javascript" src="js/spa/app.js"></script>
	<script type="text/javascript" src="js/navigate.js"></script>
	<script type="text/javascript" src="js/animpage.js"></script>
	<script type="text/javascript" src="js/paralaxhome.js"></script>
	<script type="text/javascript" src="js/appearanceAfterConsal.js"></script>
	<script type="text/javascript" src="js/appearanceEndConsal.js"></script>
	<script type="text/javascript" src="js/ajax/categoryEvents.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.spincrement.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.spincrement.min.js"></script>
	<script type="text/javascript" src="js/media.js"></script>
	<script>
		let observer = new MutationObserver(mutationRecords => {
			bgPropCourse();
			initButtonsCategory();
		})

		observer.observe(app, {
			childList: true,
			subtree: true,
			characterDataOldValue: true 
		});
	</script>
</body>
</html>