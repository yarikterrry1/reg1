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

    require_once 'config/connect.php';

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
?>


<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Изменить данные о себе</title>
</head>
<body>
    <h3>Изменить данные о себе</h3>
    <form action="vendor/update.php" method="post">
	 
	 <p hidden >Id</p>
        <input type="hidden" name="id" value="<?= $product['user_id'] ?>">
	    <p>Имя</p>
        <input type="text" name="fname" value="<?= $product['fname'] ?>">
        <p>Телефон</p>
        <input type="text" name="lname" value="<?= $product['lname'] ?>">
        <p>Почта</p>
		<input type="text" name="email" value="<?= $product['email'] ?>">
        <p>Пароль</p>
        <textarea name="password"><?= $product['password'] ?></textarea>
          <br> <br>
        <button type="submit">Сохранить</button>
		 <?php 
            $sql = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
		  
		   <?php
		  $sql1 = "SELECT * FROM users";
	$result_select1 = mysql_query($sql1);
	echo "<select name='category_id'>";
	while($object1 = mysql_fetch_object($result_select1)){
		echo "<option value = '$object1->id' > $object1->name</option>";
	}
	echo "</select>";
	
	?>
		
		<a href="php/logout.php?logout_id=<?php echo $row['user_id']; ?>" class="logout">Выход из аккаунта</a>
    </form>
</body>
</html>