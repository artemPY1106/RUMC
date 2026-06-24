<?php
header('Content-Type: application/json; charset=utf-8');
require_once('connectdb.php');

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if (empty($name)) {
    $errors[] = 'Введите ваше имя';
}

if (empty($email)) {
    $errors[] = 'Введите ваш email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Некорректный email';
}

if (empty($message)) {
    $errors[] = 'Введите сообщение';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
    exit;
}

try {
    $stmt = $conn->prepare("
        INSERT INTO requests (name, email, message) 
        VALUES (:name, :email, :message)
    ");
    
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':message' => $message
    ]);
    
    echo json_encode([
        'success' => true,
        'message' => 'Заявка успешно отправлена! С вами свяжется специалист.'
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка при сохранении: ' . $e->getMessage()
    ]);
}
?>