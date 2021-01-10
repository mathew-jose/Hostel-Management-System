<?php
$conn = mysqli_connect('localhost', 'root', '', 'hms');
session_start();
$x = $_SESSION['user'];
if (!$conn) {
	echo 'Connection error: ' . mysqli_connect_error();
}
?>