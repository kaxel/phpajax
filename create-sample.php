<?php

$con=mysqli_connect("localhost","root","addi3");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE sample;";
if (mysqli_query($con,$sql)) {
  echo "Database sample created successfully";
} else {
  echo "Error creating database: " . mysqli_error($con);
}

mysql_close($con);

?>