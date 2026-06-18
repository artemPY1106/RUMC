<?php
	session_start();
	require_once 'connectdb.php';
	$error = 0;
	try {

			$type_event = $_POST['typeEvent'];
			$tittle = $_POST['tittle'];
			$text = $_POST['textEvent'];
			$date = $_POST['dateEvent'];
			$video = $_POST['video'];

			$conn->beginTransaction();
			if (!empty($type_event) && !empty($tittle) && !empty($text) && !empty($date) && !empty($_FILES['cardPhoto'])) {
				$pathTittleIMG = 'images/eventIMG/tittles/'.time().$_FILES['cardPhoto']['name'];
				if (move_uploaded_file($_FILES['cardPhoto']['tmp_name'], '../../'.$pathTittleIMG)) {
					$addevent = $conn->prepare("INSERT INTO `event` (`tittle`, `eventText`, `dateEvent`, `tittleImage`, `idUsers`, `idType`) values (:tittle, :eventText, :eventDate, :tittleImage, :idUsers, :idType)");
					$addevent->bindParam(':tittle', $tittle);
					$addevent->bindParam(':eventText', $text);
					$addevent->bindParam(':eventDate', $date);
					$addevent->bindParam(':tittleImage', $pathTittleIMG);
					$addevent->bindParam(':idUsers', $_SESSION['user']['id']);
					$addevent->bindParam(':idType', $type_event);
					$addevent->execute();

					$countIMG = count($_FILES['allPhoto']['name']);
					$code_match = array('-', '"', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '|', ':', '"', '<', '>', '?', '[', ']', ';', "'", ',', '.', '/', '', '~', '`', '=');
					$clear_tittle = str_replace($code_match, '', $tittle);
					mkdir("../../images/eventIMG/$clear_tittle");
					for ($i=0; $i < $countIMG; $i++) { 
						$pathEventIMG = "images/eventIMG/".$clear_tittle."/".time().$_FILES['allPhoto']['name'][$i];
						if (move_uploaded_file($_FILES['allPhoto']['tmp_name'][$i], '../../'.$pathEventIMG)) {
							$addPhotos = $conn->prepare("INSERT INTO `event_photos` (`path`, `idEvent`) values (:pathEvent, (SELECT MAX(`idEvent`) FROM `event`))");
							$addPhotos->bindParam(':pathEvent', $pathEventIMG);
							$addPhotos->execute();
						} else {
							$conn->rollback();
							$response = [
								"status" => false,
								"message" => 'Произошла ошибка во время загрузки фото! Попробуйте ещё раз'
							];
							echo json_encode($response);
						}
					}

					if (!empty($video)) {
						$addVideo = $conn->prepare("INSERT INTO `event_video` (`path`, `idEvent`) values (:pathEventV, (SELECT MAX(`idEvent`) FROM `event`))");
						$addVideo->bindParam(':pathEventV', $video);
						$addVideo->execute();
						$conn->commit();
						$response = [
							"status" => true,
							"message" => 'Новое мероприятие успешно загружено :)'
						];
						echo json_encode($response);
					} else {
						$conn->commit();
						$response = [
							"status" => true,
							"message" => 'Новое мероприятие успешно загружено :)'
						];
						echo json_encode($response);
					}
				} else {
					$conn->rollback();
					$response = [
						"status" => false,
						"message" => 'Произошла ошибка во время загрузки фото! Попробуйте ещё раз'
					];
					echo json_encode($response);
				}
			} else {
				$conn->rollback();
				$response = [
					"status" => false,
					"message" => 'Все поля обязательны к заполнению кроме видео!'
				];
				echo json_encode($response);
			}
	} catch (Exception $e) {
		$conn->rollback();
		echo "Ошибка: " . $e->getMessage();
	}	
?>