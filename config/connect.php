<?php
  $hostname = "localhost";
  $username = "w925179w_diploma";
  $password = "Gtnth,ehu1";
  $dbname = "w925179w_diploma";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }

