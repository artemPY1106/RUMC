<div class="fileview-wrapper">
	<p class="other-pages-tittle first-word">ОБРАЗОВАНИЕ <i class="fa-solid fa-graduation-cap"></i></p>
	<a class="courses-btn" href="#courses">
		Курсы повышения квалификации
	</a>
	<div class="filemanger-wrapper">
		<?php
			require_once('../php/connectdb.php');

			$nameGlobalCatalog = 'docsEducat';

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
</div>