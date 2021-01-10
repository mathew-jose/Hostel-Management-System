<?php
session_start();
$conn = mysqli_connect('localhost','root','','hms');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

if(isset($_POST['pro_submit']))
{

    $address = $_POST['addr'];
    $contact = $_POST['contact'];
    $password = $_POST['pwd'];

    $pass = $password;

    if($address != "")//user wants to update address
    {
        $sql = mysqli_query($conn, "update student set address='$address' where sEmail='".$_SESSION['user']."'");
    }

    if($contact != "" && $password != "")//user updates both password and contact number
    {
        $sql = mysqli_query($conn, "update users set contactNo='$contact', password='$pass' where email='".$_SESSION['user']."'");
    }
    else if($contact != "")//user updates contact number only
    {
        $sql = mysqli_query($conn, "update users set contactNo='$contact' where email='".$_SESSION['user']."'");
    }
    else if($password != "")//user updates password only
    {
        $sql = mysqli_query($conn, "update users set password='$pass' where email='".$_SESSION['user']."'");
    }


    if ($sql) 
    {
		header('Location: userprofile.php');
    }else 
    {
		echo 'query error: ' . mysqli_error($conn);
	}
    
}