<?php

    require('../config/sqlconn.php');

if(isset($_POST['pro_submit']))
{

    $contact = $_POST['contact'];
    $password = $_POST['pwd'];

    $pass = md5($password);

    if($contact != "" && $password != "")//user updates both password and contact number
    {
        $sql = mysqli_query($conn, "update users set contactNo='$contact', password='$password' where email='".$_SESSION['user']."'");
    }
    else if($contact != "")//user updates contact number only
    {
        $sql = mysqli_query($conn, "update users set contactNo='$contact' where email='".$_SESSION['user']."'");
    }
    else if($password != "")//user updates password only
    {
        $sql = mysqli_query($conn, "update users set password='$password' where email='".$_SESSION['user']."'");
    }


    if ($sql) 
    {
		header('Location:admin.php');
    }else 
    {
		echo 'query error: ' . mysqli_error($conn);
	}
    
}