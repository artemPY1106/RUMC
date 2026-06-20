<?php
require_once('../php/connectdb.php');

$partners = $conn->query('SELECT * FROM `partners` ORDER BY CAST(`num` AS UNSIGNED), `num`');
?>

<div class="fileview-wrapper">
	<p class="other-pages-tittle first-word">ПАРТНЕРЫ <i class="fa-solid fa-handshake"></i></p>
	
	<!-- Региональные органы исполнительной власти -->
	<div class="partners-section">
		<h2 class="partners-header">Региональные органы исполнительной власти</h2>
		<div class="regional-authorities-wrapper">
			<a href="https://xn--42-6kcadhwnl3cfdx.xn--p1ai/" target="_blank" class="authority-card">
				<div class="authority-logo">
					<img src="images/gerb-kuzbass.png" alt="Герб Кузбасса">
				</div>
				<div class="authority-name">
					<p>Министерство образования Кузбасса</p>
				</div>
			</a>
			<a href="https://xn--42-6kcadhwnl3cfdx.xn--p1ai/department/structure/20/" target="_blank" class="authority-card">
				<div class="authority-name">
					<p>Управление профессионального образования и подготовки кадров Министерства образования Кузбасса</p>
				</div>
			</a>
		</div>
	</div>

	<!-- Образовательные организации -->
	<div class="partners-section">
		<h2 class="partners-header">Образовательные организации, включенные в сетевое взаимодействие</h2>
		
		<div class="organizations-list">
			<?php while($org = $partners->fetch(PDO::FETCH_ASSOC)): ?>
			<div class="organization-card">
				<div class="org-header">
					<span class="org-number"><?php echo htmlspecialchars($org['num']); ?></span>
					<h3 class="org-name"><?php echo htmlspecialchars($org['name']); ?></h3>
				</div>
				<div class="org-info">
					<div class="org-info-item">
						<i class="fa-regular fa-calendar"></i>
						<span>Дата: <?php echo date('d.m.Y', strtotime($org['date'])); ?></span>
					</div>
					<div class="org-info-item">
						<i class="fa-solid fa-file-signature"></i>
						<span>Номер: <?php echo htmlspecialchars($org['agreement_number']); ?></span>
					</div>
					<div class="org-info-item">
						<i class="fa-solid fa-user-tie"></i>
						<span>Директор: <?php echo htmlspecialchars($org['director']); ?></span>
					</div>
					<div class="org-info-item">
						<i class="fa-solid fa-envelope"></i>
						<a href="mailto:<?php echo htmlspecialchars($org['email']); ?>"><?php echo htmlspecialchars($org['email']); ?></a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>

		<!-- Файловый менеджер с соглашениями -->
		<div class="filemanger-wrapper">
			<?php
				$nameGlobalCatalog = 'docsPart';
				$nameCatalog = 'Соглашения';

				$catalog = $conn->prepare("SELECT `nameCatalog`, `globalCatalog` FROM `catalogs` WHERE `globalCatalog` = '$nameGlobalCatalog' AND `nameCatalog` = '$nameCatalog' ORDER BY `idCatalog` DESC");
				$catalog->execute();
				foreach ($catalog as $row) {
					$folder = '../documents/'.$row['globalCatalog'].'/'.$row['nameCatalog'];
					$folderLink = '../documents/'.$row['globalCatalog'].'/'.$row['nameCatalog'].'/';
					if ($dh = opendir($folder)) {
						echo '
							<div class="filestorage-wrapper">
								<div class="filestorage-tittle">
									<i class="fa-solid fa-folder-open"></i>
									<p>'.$row['nameCatalog'].'</p>
								</div>
								<div class="filestorage">';
									while (($file = readdir($dh)) !== false) {
										if ($file != '.' && $file != '..') {
											$fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
											$fileIcon = 'fa-file';
											if ($fileExt == 'pdf') {
												$fileIcon = 'fa-file-pdf';
											} else if ($fileExt == 'doc' || $fileExt == 'docx') {
												$fileIcon = 'fa-file-word';
											}
											
											echo '
												<div class="file">
													<a href="'.$folderLink.$file.'" title="'.$file.'" target="_blank">
														<i class="fa-solid '.$fileIcon.'"></i>
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
</div>