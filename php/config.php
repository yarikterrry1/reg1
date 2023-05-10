<?php
  $hostname = "localhost";
  $username = "yarikta4_r";
  $password = "1995yariK";
  $dbname = "yarikta4_r";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
