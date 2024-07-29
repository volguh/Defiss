<?php
include_once ('../config/connect.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Parse the JSON data
  $data = json_decode(file_get_contents('php://input'));
  
  echo json_last_error();
  // Check if the data is valid
  if (json_last_error() === JSON_ERROR_NONE) {
    echo "test2";
    $name = $data->name;
    $number = $data->number;
    $email = $data->email;
    $sql_request = "INSERT INTO `requests` (`request_name`, `request_number`, `request_email`, `request_status`) VALUES ('$name', '$number', '$email', 'pending') ";
    $query_request = mysqli_query($conn, $sql_request);
  } else {
    echo 'Invalid JSON data.';
  }
} else {
  echo 'Invalid request method.';
}

