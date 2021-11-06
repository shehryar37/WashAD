<?php
include_once("db.php");
session_start();

if (isset($_SESSION['session_id'])) {
    $session_query = "UPDATE `sessions` SET `session_end` = NOW() WHERE `session_id` = {$_SESSION["session_id"]}";
    $conn->query($session_query);
}
session_unset();
session_destroy();


header("Location: login.php");
