<?php
    session_start();
    require_once('connectdb.php');

    $nameCat = $_POST['nameCat'];
    $defaultDIR = $_POST['defaultDIR'];
    $idUser = $_SESSION['user']['id'];

    try {
        $conn->beginTransaction();
        $addCat = $conn->prepare("INSERT INTO `catalogs` (`globalCatalog`, `nameCatalog`, `author`) values (:globalCatalog, :nameCat, :auth)");
		$addCat->bindParam(':globalCatalog', $defaultDIR);
        $addCat->bindParam(':nameCat', $nameCat);
        $addCat->bindParam(':auth', $idUser);
        $addCat->execute();

        if (mkdir('../../documents/'.$defaultDIR.'/'.$nameCat.'', 0777)) {
            $conn->commit();
            $response = [
                "status" => true,
                "nameCat" => $nameCat
            ];
            echo json_encode($response);
        } else {
            $conn->rollback();
            $response = [
                "status" => false,
                "message" => 'По каким - то причинам невозможно создать такой каталог'
            ];
            echo json_encode($response);
        }

    } catch (Exception $e) {
		$conn->rollback();
		echo "Ошибка: " . $e->getMessage();
	}	
?>