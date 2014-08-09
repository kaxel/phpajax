<?php

$con=mysqli_connect("localhost","root","addi3");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="drop DATABASE sample;";
if (mysqli_query($con,$sql)) {
  echo "Database sample deleted successfully";
} else {
  echo "Error deleting database: " . mysqli_error($con);
}

mysql_close($con);
		
?>