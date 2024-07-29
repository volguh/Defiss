<?php
include_once ("../config/connect.php");
$id = $_GET['delete_id'];
$sql_change = "DELETE FROM requests WHERE `requests`.`request_id` = $id";
$query_change = mysqli_query($conn, $sql_change) or die (mysqli_error($conn));

header("Location: ../admin/index.php");