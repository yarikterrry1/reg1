<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Регистрация</header>
      <form action="php/signup.php" method="POST" enctype="multipart/form-data" autocomplete="off" id="send-invite-form">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Имя</label>
            <input type="text" name="fname" placeholder="Имя" required>
          </div>
          <div class="field input">
            <label>Номер телефона</label>
            <input type="text" name="lname" placeholder="Номер телефона" required>
          </div>
        </div>
        <div class="field input">
          <label>Электронная почта</label>
          <input type="text" name="email" placeholder="Почта" required>
        </div>
        <div class="field input">
           
		  
<!-- <label>Пароль</label>
          <input type="password" name="password" placeholder="Пароль" required> -->		  
		  
		    <script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Пароль сходится';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Пароль не сходится';
  }
}
</script>
 
<label>Пароль :
  <input name="password" id="password" type="password" placeholder="Введите пароль" onkeyup='check();' />
   
</label>
<br>
<label>Подтвердите пароль:
  <input type="password" name="confirm_password" id="confirm_password" placeholder="Повторите пароль" onkeyup='check();' /> 
 
  <span id='message'></span>
</label>
 
		  
          
        </div>
 
        <div class="field image">
           
        </div>
        <div class="field button">
          <input type="submit" name="submit" id="submit" value="Зарегистрироваться">
        </div>
      </form>
      <div class="link">Уже зарегистрировался? <a href="login.php">Войти</a></div>
    </section>
  </div>
  
 
 
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>



 


</body>
</html>
