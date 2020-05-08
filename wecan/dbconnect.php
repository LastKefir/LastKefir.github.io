<?php
    header('Content-Type: text/html; charset=utf-8');
 
    $server = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "website"; 
     
    // Подключение к базе данный через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
 
    // Проверяем, успешность соединения. 
    if (mysqli_connect_errno()) { 
        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
        exit(); 
    }
 
    // Устанавливаем кодировку подключения
    $mysqli->set_charset('utf8');
 
    //Название сайта
    $address_site = "http://wecan";
?>