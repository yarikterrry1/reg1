<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: product.php");
  }
?>

<?php include_once "header.php"; ?>

 
  

<html>
	<head>
	<title>Авторизация</title>
	  
	 <script src="https://www.google.com/recaptcha/api.js"></script>
	 
	 


<body>
  <div class="wrapper">
    <section class="form login">
      <header>Авторизация</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="form">
	  
	    
	   
        <div class="error-text"></div>
        <div class="field input">
          <label>Электронная почта/номер телефона</label>
          <input type="text" name="email" placeholder="Электронная почту/номер телефона" required>
        </div>
        <div class="field input">
          <label>Пароль</label>
          <input type="password" name="password" placeholder="Введите пароль" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
		 
          <input type="submit" name="submit" class="g-recaptcha" 
        data-sitekey="6LeSK_MlAAAAAFkwrcwVPhqHBYK2-AVcoPsg6wPj" 
        data-callback='onSubmit' 
        data-action='submit'>
		  
		  
		  
		   
        </div>
		 
   
      </form>
      <div class="link">Нет аккаунта? <a href="index.php" style="color: red" > Регистрация</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
  
 
    <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

</body>
</html>

 