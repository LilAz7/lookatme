<?php  
    // Обрабатываем данные, полученные из формы регистрации  
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 
    
    
     
    require "db.php";     
    // Подготовка и выполнение запроса 
    $sql = 'INSERT INTO user(login, username, email, password) VALUES(?, ?, ?, ?)'; 
    $query = $pdo->prepare($sql); 
    $query->execute([$login, $username, $email, $password]); 
 
    // Убедитесь, что путь к файлу указан правильно 
    header('Location: /shop/login.php'); 
    exit; // Завершаем выполнение скрипта 
?>