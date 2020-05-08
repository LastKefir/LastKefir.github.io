<?php
    //Запускаем сессию
    session_start();
?>

<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<!--<meta http-equiv="X-UA-Compatible" content="IE=Edge">-->
	<title>WeCan</title>
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
	<script src="script.js" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        "use strict";
	        //================ Проверка email ==================
	 
	        //регулярное выражение для проверки email
	        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
	        var mail = $('input[name=email]');
	         
	        mail.blur(function(){
	            if(mail.val() != ''){
	 
	                // Проверяем, если введенный email соответствует регулярному выражению
	                if(mail.val().search(pattern) == 0){
	                    // Убираем сообщение об ошибке
	                    $('#valid_email_message').text('');
	 
	                    //Активируем кнопку отправки
	                    $('input[type=submit]').attr('disabled', false);
	                }else{
	                    //Выводим сообщение об ошибке
	                    $('#valid_email_message').text('Не правильный Email');
	 
	                    // Дезактивируем кнопку отправки
	                    $('input[type=submit]').attr('disabled', true);
	                }
	            }else{
	                $('#valid_email_message').text('Введите Ваш email');
	            }
	        });
	 
	        //================ Проверка длины пароля ==================
	        var password = $('input[name=password]');
	         
	        password.blur(function(){
	            if(password.val() != ''){
	 
	                //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
	                if(password.val().length < 6){
	                    //Выводим сообщение об ошибке
	                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');
	 
	                    // Дезактивируем кнопку отправки
	                    $('input[type=submit]').attr('disabled', true);
	                     
	                }else{
	                    // Убираем сообщение об ошибке
	                    $('#valid_password_message').text('');
	 
	                    //Активируем кнопку отправки
	                    $('input[type=submit]').attr('disabled', false);
	                }
	            }else{
	                $('#valid_password_message').text('Введите пароль');
	            }
	        });
	    });
	</script>
</head>
<body>
	<div id="wrapper">
		<header>
			<a href="Main.php"><img src="image/icon.png" width="560" height="150" alt="WeCan logo"></a>
		</header>
		<nav>	
			<ul class="top-menu">
			<li><a href="NewOrder.php">Новый заказ</li>
			<li><a href="RegisterPage.php">Регистрация</a></li>
			<li><a href="AuthPage.php">Авторизация</a></li>
			<li><a href="logout.php">Выход</a></li>
			</ul>
		</nav>
		<div id="heading">
			<h1></h1>
		</div>