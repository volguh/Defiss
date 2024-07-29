<?php
include ("../config/connect.php");
session_start();
echo $_SESSION['id'];

$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "SELECT * FROM `accounts` WHERE `account_email` = '{$email}'";
$query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0) {
  if (password_verify($password, $row['account_password'])) {
    $_SESSION['id'] = $row['account_id'];
    header('Location: ../admin/index.php');
  } else {
    header('Location: ../admin/login.php?err=password&email=' . $email . '');
  }
  ;
} else {
  header('Location: ../admin/login.php?err=login&email=' . $email . '');
}
;