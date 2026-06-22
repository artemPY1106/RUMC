<div class="fileview-wrapper">
	<p class="other-pages-tittle first-word">ДОСТУПНАЯ СРЕДА <i class="fa-solid fa-universal-access"></i></p>
	
	<div class="accessible-section">
		<h2 class="accessible-header">
			<i class="fa-solid fa-location-dot"></i>
			Адреса объектов, режим работы организации
		</h2>
		<div class="addresses-table-wrapper">
			<table class="addresses-table">
				<thead>
					<tr>
						<th><i class="fa-solid fa-building"></i> Объект</th>
						<th><i class="fa-solid fa-map-location-dot"></i> Адрес</th>
						<th><i class="fa-regular fa-clock"></i> Режим работы</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<span class="building-number">1</span>
							Учебный корпус № 1
						</td>
						<td>
							<p class="address-text">
								<span class="address-index">654015</span>, Россия, Кемеровская область - Кузбасс, г. Новокузнецк, улица Метелкина, дом 17
							</p>
						</td>
						<td>
							<span class="work-time">Пн - Пт</span>
							<span class="work-hours">8:30 - 16:30</span>
						</td>
					</tr>
					<tr>
						<td>
							<span class="building-number">2</span>
							Учебный корпус № 2
						</td>
						<td>
							<p class="address-text">
								<span class="address-index">654013</span>, Россия, Кемеровская область - Кузбасс, г. Новокузнецк, улица Обнорского, дом 92
							</p>
						</td>
						<td>
							<span class="work-time">Пн - Пт</span>
							<span class="work-hours">8:30 - 16:30</span>
						</td>
					</tr>
					<tr>
						<td>
							<span class="building-number">3</span>
							Учебный корпус № 3
						</td>
						<td>
							<p class="address-text">
								<span class="address-index">654003</span>, Россия, Кемеровская область - Кузбасс, г. Новокузнецк, улица Климасенко, дом 11/5
							</p>
						</td>
						<td>
							<span class="work-time">Пн - Пт</span>
							<span class="work-hours">8:30 - 16:30</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="accessible-section">
		<h2 class="accessible-header">
			<i class="fa-solid fa-hand-holding-heart"></i>
			Способы предоставления услуг для различных категорий инвалидов
		</h2>
		<div class="info-card">
			<div class="info-card-icon">
				<i class="fa-solid fa-wheelchair"></i>
			</div>
			<div class="info-card-content">
				<p>На объекте для различных категорий инвалидов. Для маломобильных граждан возможно получение услуг дистанционно.</p>
			</div>
		</div>
	</div>

	<!-- Условия доступности -->
	<div class="accessible-section">
		<h2 class="accessible-header">
			<i class="fa-solid fa-door-open"></i>
			Условия доступности для инвалидов различных категорий основных структурно-функциональных зон объекта
		</h2>
		<div class="info-card">
			<div class="info-card-icon">
				<i class="fa-solid fa-building-user"></i>
			</div>
			<div class="info-card-content">
				<p class="org-name">ГПОУ «Профессиональный колледж г. Новокузнецка» имени Кучерявенко Тамары Александровны</p>
				<div class="call-button-info">
					<div class="call-icon">
						<i class="fa-solid fa-bell"></i>
					</div>
					<div class="call-text">
						<p>Кнопка вызова расположена у входной двери при входе в здание. Если на кнопку никто не отвечает, Вы можете позвонить по телефону:</p>
						<a href="tel:+79505797486" class="phone-link">
							<i class="fa-solid fa-phone"></i>
							+7 (950) 579-74-86
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="accessible-section">
		<h2 class="accessible-header">
			<i class="fa-solid fa-square-parking"></i>
			Наличие автостоянки (парковки) на территории организации
		</h2>
		<div class="info-card">
			<div class="info-card-icon">
				<i class="fa-solid fa-car"></i>
			</div>
			<div class="info-card-content">
				<p>Имеется парковка для автотранспорта на территории организации в непосредственной близости от него (не далее 100 м от входа в организацию). Имеются выделенные парковочные места для автотранспорта инвалидов, обозначенных знаком парковки автомобилей, используемых инвалидами, и соответствующей разметкой.</p>
				<div class="parking-badges">
					<div class="parking-badge">
						<i class="fa-solid fa-wheelchair"></i>
						<span>Места для инвалидов</span>
					</div>
					<div class="parking-badge">
						<i class="fa-solid fa-person-walking"></i>
						<span>Не далее 100 м</span>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="accessible-folders-section">
    <h2 class="accessible-header">
        <i class="fa-solid fa-folder-tree"></i>
        Дополнительная информация
    </h2>

    <div class="accordion-wrapper">
        <?php
        require_once('../php/connectdb.php');

        $nameGlobalCatalog = 'docsAccessible';

        $catalog = $conn->prepare("SELECT `nameCatalog`, `globalCatalog` FROM `catalogs` WHERE `globalCatalog` = '$nameGlobalCatalog' ORDER BY `idCatalog` ASC");
        $catalog->execute();
        
        $firstItem = true;
        foreach ($catalog as $row) {
            $folderName = $row['nameCatalog'];
            $folder = '../documents/'.$row['globalCatalog'].'/'.$folderName;
            $folderLink = 'documents/'.$row['globalCatalog'].'/'.rawurlencode($folderName).'/';
            
            $isActive = $firstItem ? 'active' : '';
            $iconClass = $firstItem ? 'fa-minus' : 'fa-plus';
            $firstItem = false;

            $isLinksFolder = (strpos($row['nameCatalog'], 'Сайты дистанционных') !== false);
            ?>
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    <i class="fa-solid <?php echo $iconClass; ?> accordion-icon"></i>
                    <span><?php echo htmlspecialchars($row['nameCatalog']); ?></span>
                </div>
                <div class="accordion-content <?php echo $isActive; ?>">
                    <div class="accordion-body">
                        <?php if ($isLinksFolder): ?>
                            <!-- Ссылки для папки "Сайты дистанционных образовательных технологий" -->
                            <div class="links-list">
                                <a href="https://znanium.com" target="_blank" class="link-item">
                                    <i class="fa-solid fa-book"></i>
                                    <span>Электронно-библиотечная система Znanium</span>
                                </a>
                                <a href="https://urait.ru" target="_blank" class="link-item">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span>Образовательная платформа «Юрайт» — курсы и учебники СПО, по различным дисциплинам</span>
                                </a>
                                <a href="https://reestr-pd.minpromtorg.gov.ru" target="_blank" class="link-item">
                                    <i class="fa-solid fa-wheelchair-move"></i>
                                    <span>Каталог товаров реабилитационной направленности, верифицированных Минпромторгом России</span>
                                </a>
                                <a href="#" target="_blank" class="link-item">
                                    <i class="fa-solid fa-hands-asl-interpreting"></i>
                                    <span>Диспетчерский центр перевода РЖЯ</span>
                                </a>
                            </div>
                        <?php else: ?>
                            <?php
                            $absolutePath = realpath($folder);
                            
                            if ($absolutePath && is_dir($absolutePath)) {
                                $files = array_diff(scandir($absolutePath), array('.', '..'));
                                
                                if (!empty($files)) {
                                    echo '<div class="filestorage-grid">';
                                    foreach ($files as $file) {
                                        $filePath = $absolutePath . '/' . $file;
                                        $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                        $fileIcon = 'fa-file';
                                        if ($fileExt == 'pdf') $fileIcon = 'fa-file-pdf';
                                        else if ($fileExt == 'doc' || $fileExt == 'docx') $fileIcon = 'fa-file-word';
                                        else if ($fileExt == 'xls' || $fileExt == 'xlsx') $fileIcon = 'fa-file-excel';
                                        else if ($fileExt == 'jpg' || $fileExt == 'jpeg' || $fileExt == 'png') $fileIcon = 'fa-file-image';
                                        
                                        $encodedFile = rawurlencode($file);
                                        
                                        echo '
                                            <div class="file-item">
                                                <a href="'.$folderLink.$encodedFile.'" target="_blank">
                                                    <i class="fa-solid '.$fileIcon.'"></i>
                                                    <span>'.htmlspecialchars($file).'</span>
                                                </a>
                                            </div>';
                                    }
                                    echo '</div>';
                                } else {
                                    echo '<p class="no-files"><i class="fa-solid fa-folder-open"></i> Папка пуста</p>';
                                }
                            } else {
                                // Отладочная информация
                                echo '<div style="background: #fff3cd; padding: 15px; border-radius: 5px; margin: 10px 0;">';
                                echo '<p style="color: #856404; margin: 0;"><strong>⚠️ Папка не найдена</strong></p>';
                                echo '<p style="color: #856404; margin: 5px 0 0 0; font-size: 12px;">';
                                echo 'Путь: <code>'.htmlspecialchars($folder).'</code><br>';
                                echo 'Absolute path: <code>'.htmlspecialchars($absolutePath ?: 'не определен').'</code>';
                                echo '</p>';
                                echo '</div>';
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
	</div>
	</div>
</div>