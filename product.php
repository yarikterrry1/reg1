<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>


<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

   define('HOST', 'localhost');
define('USER', 'yarikta4_r');
define('PASSWORD', '1995yariK');
define('DATABASE', 'yarikta4_r');

/*
 * Подключаемся к базе данных с помощью функции mysqli_connect()
 */

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $product_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT * FROM `users` WHERE `user_id` = '$product_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);

    /*
     * Делаем выборку всех строк комментариев с полученным ID продукта выше
     */

    
?>

<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php 
            $sql = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Product</title>
</head>
<body>
    <p>Имя: <?= $product['fname'] ?></p>
    <p>Номер телефона: <?= $product['lname'] ?></p>
    <p>Электронная почта: <?= $product['email'] ?></p>

    

     
    <a href="php/logout.php?logout_id=<?php echo $row['user_id']; ?>" class="logout">Выйти из аккаунта</a>
         
    </ul>
</body>
</html>