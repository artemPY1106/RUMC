<?php
    session_start();
    require_once 'connectdb.php';

    $idkurs = $_POST['idkurs'];

    try {
        $updateStat = $conn->prepare("DELETE FROM `kursi` WHERE `idkursi` = $idkurs");
        $updateStat->execute();

        $response = [
            "status" => true,
            "message" => 'Курс удалён'
        ];
        echo json_encode($response);
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>