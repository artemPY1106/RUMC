<div class="wrapper-courses">
	<img src="images/bgcourses.png" class="bg-courses" />
	<p class="other-pages-tittle first-word">Курсы повышения </br>квалификации</p>
	<div class="catalog-courses">
		<?php
			require_once('../php/connectdb.php');

			$course = $conn->prepare('SELECT `idkursi`, `name`, `about`, `image`, `type`, `status`, `dateStart`, `dateClose` FROM `kursi` ORDER BY `dateStart` DESC');
			$course->execute();

			foreach ($course as $row) {
				echo '
					<a href="course.php?id='.$row['idkursi'].'" class="card-course" style="background-image: url('.$row['image'].');">
						<div class="min-info">
							<h1>
								'.$row['name'].'
							</h1>
							<hr/>
							<p>
								'.$row['about'].'
							</p>
						</div>
						<div class="bottom-info">
							';
								if (!empty($row['type'])) {
									echo '<p class="level-course">'.$row['type'].'</p>';
								}
							echo '
							<p class="status-course">'.$row['status'].'</p>
							<p class="date-course">Даты проведения: '.$row['dateStart'].' до '.$row['dateClose'].'</p>
						</div>
					</a>
				';
			}
		?>
	</div>
</div>