<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'store_survey';

date_default_timezone_set("Asia/Kuala_Lumpur");

$conn = mysqli_connect($host,$username,$password,$database);

                       
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>