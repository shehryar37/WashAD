<?php
include("credentials.php");
$conn = mysqli_connect(constant("DB_HOST"), constant("DB_USER"), constant("DB_PASS"), constant("DB_NAME"));

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}