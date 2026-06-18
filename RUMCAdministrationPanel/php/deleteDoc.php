<?php
    $fileDir = $_POST['fileDir'];

    try {
        if(unlink($fileDir)) {
            $response = [
                "status" => true,
                "message" => 'Файл успешно удалён!'
            ];
            echo json_encode($response);
        } else {
            $response = [
                "status" => false,
                "message" => 'Упс! Почему - то мы не можем удалить файл =('
            ];
            echo json_encode($response);
        }

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>