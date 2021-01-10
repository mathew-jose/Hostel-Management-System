<?php
    
    require('../../config/sqlconn.php');

if(isset($_POST['w_signup']))
{
    $wEmail = $_POST['w_email'];

    $check = "select * from users where email = '$wEmail'";

    $result = mysqli_query($conn, $check);
    $num = mysqli_num_rows($result);

    if($num)
    {
        $err = "User already exists";
    }
    else
    {
        $name = mysqli_real_escape_string($conn, $_POST['w_name']);//U
        $email = mysqli_real_escape_string($conn, $_POST['w_email']);
        //$password = mysqli_real_escape_string($conn, $_POST['s_roll']);
        $dob = mysqli_real_escape_string($conn, $_POST['w_dob']);
        $hostel = mysqli_real_escape_string($conn, $_POST['w_hostel']);
        $contact = mysqli_real_escape_string($conn, $_POST['w_contact']);

        $sql1 = mysqli_query($conn, "INSERT INTO users(name,password,email,DoB,usertype,contactNo) VALUES('$name','admin','$email',STR_TO_DATE('$dob', '%d-%m-%Y'),'admin','$contact')");

        

        if($sql1)
        {
            $sql2 = mysqli_query($conn, "INSERT INTO admin(hostelName,aEmail) VALUES('$hostel','$email')");
            if($sql2)
            {
                header('Location:../../Profile/admin.php');
            }
            else{
                echo 'query error: ' . mysqli_error($conn);
            }
        }
        else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

?>