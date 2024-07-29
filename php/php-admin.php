<?php
session_start();
include_once ("../config/connect.php");
if (!isset ($_SESSION['id'])) {
  header("Location: ../admin/login.php");
};

$sql_pending = "SELECT * FROM `requests` WHERE `request_status` = 'pending'";
$query_pending = mysqli_query($conn, $sql_pending) or die (mysqli_error($conn));

$sql_active = "SELECT * FROM `requests` WHERE `request_status` = 'active'";
$query_active = mysqli_query($conn, $sql_active) or die (mysqli_error($conn));
