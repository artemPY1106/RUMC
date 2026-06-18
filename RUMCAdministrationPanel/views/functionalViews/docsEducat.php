<?php 
    include_once('../../php/connectdb.php');
	session_start();
	if (!$_SESSION['user']) {
		header('Location: index.php');
	}

    $nameGlobalCatalog = 'docsEducat';
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
	<title>Создать мероприятие</title>
	<link rel="stylesheet" type="text/css" href="../../styles/origin.css">
	<link rel="stylesheet" type="text/css" href="../../styles/profile.css">
    <link rel="stylesheet" type="text/css" href="../../styles/fileManager.css">
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
        <h1 class="title-page">Образование</h1>
		<div class="wrapper-file-manager">
            <div class="wrapper-catalogs">
                <?php
                    $catalog = $conn->prepare("SELECT `nameCatalog`, `globalCatalog` FROM `catalogs` WHERE `globalCatalog` = '$nameGlobalCatalog' ORDER BY `idCatalog` DESC");
                    $catalog->execute();
                    foreach ($catalog as $row) {
                        $folder = '../../../documents/'.$row['globalCatalog'].'/'.$row['nameCatalog'].'';
					    $folderLink = '../../../documents/'.$row['globalCatalog'].'/'.$row['nameCatalog'].'/';
                        if ($dh = opendir($folder)) {
                            echo '
                                <div class="filestorage-wrapper">
                                    <div class="filestorage-tittle">
                                        <button class="delBtn" value="'.$folderLink.'">Удалить</button>
                                        <p>'.$row['nameCatalog'].'</p>
                                    </div>
                                    <div class="filestorage">';
                                        while (($file = readdir($dh)) !== false) {
                                            if ($file != '.' && $file != '..') {
                                                echo '
                                                    <div class="file">
                                                        <i class="fa-solid fa-xmark closeDel" value="'.$folderLink.$file.'" alt="Удалить"></i>
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
            <div class="wrapper-forms">
                <form class="newCatalog">
                    <p>Создать новый каталог</p>
                    <input type="text" value="<?=$nameGlobalCatalog?>" id="defaultDIR" hidden/>
                    <input type="text" class="text-inp" id="nameCat" require/>
                    <input type="submit" class="sendInfo" id="createCat" value="Создать"/>
                </form>
                <form class="newFile" enctype="multipart/form-data">
                    <input type="text" value="<?=$nameGlobalCatalog?>" id="defaultDIR" hidden/>
                    <p>Добавить новые файлы в каталог</p>
                    <select class="selectCat" require>
                        <?php
                            $nameC = $conn->prepare("SELECT `nameCatalog` FROM `catalogs` WHERE `globalCatalog`= '$nameGlobalCatalog' ORDER BY `idCatalog` DESC");
                            $nameC->execute();
                            foreach ($nameC as $row) {
                                echo '<option value="'.$row['nameCatalog'].'">'.$row['nameCatalog'].'</option>';
                            }
                        ?>
                    </select>
                    <div class="wrap-loadDoc">
                        <input  type="file" class="loadDoc" name="documents[]" multiple require/>
                        <label for="loadDoc" class="labelDoc">
                            <span class="inp-text">Загрузите документ</span>
                        </label>
                    </div>
                    <div class="wrapper-btn">
                        <input type="submit" class="sendInfo" id="addDoc" value="Добавить"/>
                        <input type="submit" class="sendInfo" id="backDoc" value="Отменить"/>
                    </div>
                </form>
            </div>
        </div>
		<a href="../../profile.php#jobWithDoc" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Вернуться назад</a>
	</main>
</body>
<script src="../../js/animate/alert.js"></script>
<script src="../../js/animate/viewDeleteBtn.js"></script>
<script src="../../js/ajax/createCatalog.js"></script>
<script src="../../js/ajax/addDoc.js"></script>
<script src="../../js/ajax/deleteDoc.js"></script>
<script src="../../js/ajax/deleteCatalog.js"></script>
</html>