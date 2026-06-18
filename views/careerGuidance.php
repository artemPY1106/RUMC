<div class="fileview-wrapper">
	<p class="other-pages-tittle first-word">ПРОФОРИЕНТАЦИЯ <i class="fa-solid fa-user-tie"></i></p>
	<div class="article">
		<p class=""><span>Профориентация</span> – это процесс, который помогает студентам определить свои интересы, способности и цели в жизни, а также выбрать подходящую профессию. Это очень важный этап в жизни каждого человека, так как правильный выбор профессии может определить его будущее и карьеру.</p>
	</div>
	<div class="filemanger-wrapper">
		<?php
			require_once('../php/connectdb.php');

			$nameGlobalCatalog = 'docsProf';

			$catalog = $conn->prepare("SELECT `nameCatalog`, `globalCatalog` FROM `catalogs` WHERE `globalCatalog` = '$nameGlobalCatalog' ORDER BY `idCatalog` DESC");
			$catalog->execute();
			foreach ($catalog as $row) {
				$folder = '../documents/'.$row['globalCatalog'].'/'.$row['nameCatalog'].'';
				$folderLink = 'documents/'.$row['globalCatalog'].'/'.$row['nameCatalog'].'/';
				if ($dh = opendir($folder)) {
					echo '
						<div class="filestorage-wrapper">
							<div class="filestorage-tittle">
								<p>'.$row['nameCatalog'].'</p>
							</div>
							<div class="filestorage">';
								while (($file = readdir($dh)) !== false) {
									if ($file != '.' && $file != '..') {
										echo '
											<div class="file">
												<a href="'.$folderLink.$file.'" title="'.$file.'" target="_blanc">
													<i class="fa-solid fa-file"></i>
													<p class="name-file">'.$file.'</p>
												</a>
											</div>';
									}
								}    
					echo'        </div>
						</div>
					';
				closedir($dh);
				}
			}
		?>
	</div>
	<div>
		<p class="first-word"><span>ТРУДООРИЕНТАЦИЯ</span></p>
	</div>
</div>