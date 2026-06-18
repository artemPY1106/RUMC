<?php
    session_start();
    require_once 'connectdb.php';

    $valBtn = $_POST['valBtn'];
    $idkurs = $_POST['idkurs'];

    try {
        if ($valBtn == 'Открыть курс') {
            $updateStat = $conn->prepare("UPDATE `kursi` SET `status` = 'открыт' WHERE (`idkursi` = '$idkurs')");
            $updateStat->execute();

            $response = [
                "status" => true,
                "message" => 'Курс открыт'
            ];
            echo json_encode($response);
        } else {
            $updateStat = $conn->prepare("UPDATE `kursi` SET `status` = 'закрыт' WHERE (`idkursi` = '$idkurs')");
            $updateStat->execute();

            $response = [
                "status" => true,
                "message" => 'Курс закрыт'
            ];
            echo json_encode($response);
        }

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>