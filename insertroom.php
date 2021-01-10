<?php

require("config/sqlconn.php");
$i=1;
while($i<=25)
{
    $room = mysqli_real_escape_string($conn, $i);

	$hostel = mysqli_real_escape_string($conn, "A");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

    if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "B");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

    if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "C");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

    if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "D");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

    if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "E");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

	if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "F");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

	if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "MB");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

	if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $hostel = mysqli_real_escape_string($conn, "ML");
    $sql = "INSERT INTO rooms(hostelID,roomNo) VALUES('$hostel','$room')";

	if (mysqli_query($conn, $sql)) {
		#header('Location: userprofile.php');
    } 
    else {
		echo 'query error: ' . mysqli_error($conn);
    }

    $i++;
}

?>