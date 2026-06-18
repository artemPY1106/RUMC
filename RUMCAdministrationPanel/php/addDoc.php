<?php
    try {
        $nameCat = $_POST['nameCat'];
        $defaultDIR = $_POST['defaultDIR'];

        if (!empty($_FILES['documents']['name'])) {

            $countFiles = count($_FILES['documents']['name']);
            for ($i = 0; $i < $countFiles; $i++) {
                move_uploaded_file($_FILES['documents']['tmp_name'][$i], '../../documents/'.$defaultDIR.'/'.$nameCat.'/'.$_FILES['documents']['name'][$i].'');
            }
            $response = [
                "status" => true,
            ];
            echo json_encode($response);
        } else {
            $response = [
                "status" => false,
                "message" => 'Загрузите хотя бы один файл!'
            ];
            echo json_encode($response);
        }

    } catch (Exception $e) {
		$conn->rollback();
		echo "Ошибка: " . $e->getMessage();
	}	

?>