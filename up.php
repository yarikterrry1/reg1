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

?>

<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <table>
        <tr>
            <th>Имя</th>
            <th>Номер телефона</th>
            <th>Электронная почта</th>
			<th>Обзор своей учетки</th>
            <th>Изменить свои учетные данные</th>
        </tr>

        <?php
		
		
	 
     $printer =$_SESSION['unique_id'];
		
		

            /*
             * Делаем выборку всех строк из таблицы "products"
             */
                                             
            $products = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $products = mysqli_fetch_all($products);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             */

            foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product[2] ?></td>
                        <td><?= $product[3] ?></td>
                        <td><?= $product[4] ?></td>
                         
                        <td><a href="product.php?id=<?= $product[0] ?>">Обзор своей учетки</a></td>
                        <td><a href="update.php?id=<?= $product[0] ?>">Изменить свои учетные данные</a></td>
                      
                    </tr>
                <?php
            }
        ?>
    </table>
     <br><br>
     <a href="php/logout.php?logout_id=<?php echo $row['user_id']; ?>" class="logout">Выйти из аккаунта</a>
</body>
</html>
