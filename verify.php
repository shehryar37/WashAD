<?php
session_start();
include("db.php");

$net_id = $_POST['net_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM `students` WHERE `net_id` = '$net_id' AND `student_password` = '$password'";

$user = $conn->query($sql);

if ($user->num_rows == 1) {
	$user = $user->fetch_assoc();
	$_SESSION["net_id"] = $user["net_id"];
	$_SESSION["student_name"] = $user["student_name"];
	$_SESSION["student_id"] = $user["student_id"];

	$session_query = "INSERT INTO `sessions` (`student_id`) VALUES ('{$user["student_id"]}')";
	$conn->query($session_query);
	$_SESSION['session_id'] = $conn->insert_id;

	header("Location: student/bookings/your_bookings.php");
} else {
	$_SESSION['loginMessage'] = "Incorrect Net ID or password";
	header("Location: login.php");
}
?>