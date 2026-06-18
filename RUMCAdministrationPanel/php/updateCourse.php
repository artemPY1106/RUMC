<?php
    session_start();
    require_once 'connectdb.php';

    $idkurs = $_POST['idkurs'];
    $tittle = $_POST['tittle'];
    $about = $_POST['about'];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $linkCourse = $_POST['linkCourse'];

    try {

        $updateCourse = $conn->prepare("UPDATE `kursi` SET `name` = '$tittle', `about`='$about', `dateStart`='$dateStart', `dateClose`='$dateEnd', `link`='$linkCourse' WHERE (`idkursi` = '$idkurs')");
        $updateCourse->execute();

        $response = [
            "status" => true,
            "message" => 'Успех'
        ];
        echo json_encode($response);

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>