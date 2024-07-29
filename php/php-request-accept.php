<?php
include_once ("../config/connect.php");
$id = $_GET['request_id'];
$sql_change = "UPDATE `requests` SET `request_status` = 'active' WHERE `requests`.`request_id` = $id";
$query_change = mysqli_query($conn, $sql_change) or die (mysqli_error($conn));

header("Location: ../admin/index.php");