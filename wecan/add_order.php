<?php
    session_start();
 
    //Добавляем файл подключения к БД
    require_once("dbconnect.php");
 
    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';
 
    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

    //Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться.
   
    if(isset($_POST["btn_submit_add"]) && !empty($_POST["btn_submit_add"])){
 
    /* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/
 
	if(isset($_POST["text_order"])){
	     
	    //Обрезаем пробелы с начала и с конца строки
	    $text_order = trim($_POST["text_order"]);
	 
	    //Проверяем переменную на пустоту
	    if(!empty($text_order)){
	        // Для безопасности, преобразуем специальные символы в HTML-сущности
	        $text_order = htmlspecialchars($text_order, ENT_QUOTES);
	    }else{
	        // Сохраняем в сессию сообщение об ошибке. 
	        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше требование</p>";
	 
	        
	        header("HTTP/1.1 301 Moved Permanently");
	        header("Location: ".$address_site."/NewOrder.php");
	 
	        //Останавливаем скрипт
	        exit();
	    }
	 
	     
	}else{
	    // Сохраняем в сессию сообщение об ошибке. 
	    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с текстом</p>";
	 
	    
	    header("HTTP/1.1 301 Moved Permanently");
	    header("Location: ".$address_site."/NewOrder.php");
	 
	    //Останавливаем скрипт
	    exit();
	}
	 
	if(isset($_POST["phone_number"])){
	 
	    //Обрезаем пробелы с начала и с конца строки
	    $phone_number = trim($_POST["phone_number"]);
	 
	    if(!empty($phone_number)){
	 
	        $phone_number = htmlspecialchars($phone_number, ENT_QUOTES);
	 
	//Проверяем формат полученного почтового адреса с помощью регулярного выражения
	$reg_phone_number = "/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/";
	 
	//Если формат полученного почтового адреса не соответствует регулярному выражению
	if( !preg_match($reg_phone_number, $phone_number)){
	    // Сохраняем в сессию сообщение об ошибке. 
	    $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправельный номер телефона</p>";
	     
	    
	    header("HTTP/1.1 301 Moved Permanently");
	    header("Location: ".$address_site."/NewOrder.php");
	 
	    //Останавливаем  скрипт
	    exit();
	}

	    }else{
	        // Сохраняем в сессию сообщение об ошибке. 
	        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш email</p>";
	         
	        
	        header("HTTP/1.1 301 Moved Permanently");
	        header("Location: ".$address_site."/NewOrder.php");
	 
	        //Останавливаем  скрипт
	        exit();
	    }
	
	}else{
	    // Сохраняем в сессию сообщение об ошибке. 
	    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода номера телефона</p>";
	     
	    
	    header("HTTP/1.1 301 Moved Permanently");
	    header("Location: ".$address_site."/NewOrder.php");
	 
	    //Останавливаем  скрипт
	    exit();
	}
	
	 
	if(isset($_POST["price"])){
	     
	    //Обрезаем пробелы с начала и с конца строки
	    $price = trim($_POST["price"]);
	 
	    //Проверяем переменную на пустоту
	    if(!empty($price)){
	        // Для безопасности, преобразуем специальные символы в HTML-сущности
	        $price = htmlspecialchars($price, ENT_QUOTES);
	    }else{
	        // Сохраняем в сессию сообщение об ошибке. 
	        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше требование</p>";
	 
	        
	        header("HTTP/1.1 301 Moved Permanently");
	        header("Location: ".$address_site."/NewOrder.php");
	 
	        //Останавливаем скрипт
	        exit();
	    }
	 
	     
	}else{
	    // Сохраняем в сессию сообщение об ошибке. 
	    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с текстом</p>";
	 
	    
	    header("HTTP/1.1 301 Moved Permanently");
	    header("Location: ".$address_site."/NewOrder.php");
	 
	    //Останавливаем скрипт
	    exit();
	}
	
	//Запись текущего пользователя для добавления в БД
	$email = $_SESSION['email'];
    //Запрос на добавления пользователя в БД
	$result_query_insert = $mysqli->query("INSERT INTO `orders` (text_order, phone_number, price, email) VALUES ('".$text_order."', '".$phone_number."', '".$price."', '".$email."')");
	 
	if(!$result_query_insert){
	    // Сохраняем в сессию сообщение об ошибке. 
	    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";
	     
	    
	    header("HTTP/1.1 301 Moved Permanently");
	    header("Location: ".$address_site."/NewOrder.php");
	 
	    //Останавливаем  скрипт
	    exit();
	}else{
	 
	    $_SESSION["success_messages"] = "<p class='success_message'>Ваш заказ успешно составлен и добавлен в базу данных</p>";
	 
	    //Отправляем пользователя на страницу авторизации
	    header("HTTP/1.1 301 Moved Permanently");
	    header("Location: ".$address_site."/NewOrder.php");
	}
	 
	/* Завершение запроса */
	$result_query_insert->close();
	 
	//Закрываем подключение к БД
	$mysqli->close(); 

    }else{
 
        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }
?>