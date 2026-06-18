<?php
	session_start();
	require_once 'connectdb.php';
	try {

			$tittle = $_POST['tittle'];
			$about = $_POST['about'];
			$dateStart = $_POST['dateStart'];
			$dateEnd = $_POST['dateEnd'];
			$levelCourse = $_POST['levelCourse'];
            $link = $_POST['linkCourse'];

            $pathTittleIMG = 'images/courses/'.$_FILES['cardPhoto']['name'];

            if (move_uploaded_file($_FILES['cardPhoto']['tmp_name'], '../../'.$pathTittleIMG)) {
                $addCourse = $conn->prepare("INSERT INTO `kursi` (`name`, `about`, `image`, `type`, `dateStart`, `dateClose`, `link`, `author`) values (:tittle, :about, :tittleImage, :levelCourse, :dateStart, :dateEnd, :link, :idUsers)");
                $addCourse->bindParam(':tittle', $tittle);
                $addCourse->bindParam(':about', $about);
                $addCourse->bindParam(':dateStart', $dateStart);
                $addCourse->bindParam(':dateEnd', $dateEnd);
                $addCourse->bindParam(':tittleImage', $pathTittleIMG);
                $addCourse->bindParam(':levelCourse', $levelCourse);
                $addCourse->bindParam(':link', $link);
                $addCourse->bindParam(':idUsers', $_SESSION['user']['id']);
                $addCourse->execute();

                $response = [
                    "status" => true,
                    "message" => 'Новый курс успешно создан :)'
                ];
                echo json_encode($response);
            }
			
	} catch (Exception $e) {
		echo "Ошибка: " . $e->getMessage();
	}	
?>