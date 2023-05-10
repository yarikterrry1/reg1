<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$encrypt_pass = md5($password);
/*
 * Делаем запрос на изменение строки в таблице products
 */
 
 

mysqli_query($connect, "UPDATE `users` SET `lname` = '$lname', `fname` = '$fname', `email` = '$email', `password` = '$encrypt_pass' WHERE `users`.`user_id` = '$id'");

		 

/*
 * Переадресация на главную страницу
 */

 header('Location: ' . $_SERVER['HTTP_REFERER']);
