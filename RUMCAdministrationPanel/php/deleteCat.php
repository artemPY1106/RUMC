<?php
    session_start();
    require_once('connectdb.php');

    $catDir = $_POST['catDir'];
    $catName = $_POST['catName'];

    try {
        $conn->beginTransaction();
        $delCat = $conn->prepare("DELETE FROM `catalogs` WHERE `nameCatalog` = '$catName'");
        $delCat->execute();

        rmdir($catDir);

        $response = [
            "status" => true,
            "message" => 'Каталог успешно удалён!'
        ];
        echo json_encode($response);
        
        $conn->commit();
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
        $conn->rollback();
    }
?>