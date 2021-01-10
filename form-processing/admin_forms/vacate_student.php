<?php

    require('../../config/sqlconn.php');

    if(isset($_POST['vac_sub']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email_s']);
        $roomNo = mysqli_real_escape_string($conn, $_POST['room_no']);
        $host = mysqli_real_escape_string($conn, $_POST['hostel']);

        $sql = mysqli_query($conn, "select * from student where sEmail='$email'");
        

        if($sql)
        {
    
            $tab1 = mysqli_fetch_assoc($sql);
            if($roomNo == $tab1['roomNo'] && $host == $tab1['hostelID'])
            {
                echo "inside 3rd if";
                $sql2 = mysqli_query($conn, "UPDATE student SET roomNo = null, hostelID = null WHERE sEmail ='$email'");
                if($sql2)
                {
                    $sql3 = mysqli_query($conn, "UPDATE hostel SET no_ofStudents = no_ofStudents - 1 WHERE hostelID = '$host'");
                    header('Location:../../Profile/admin.php');
                }
                else{
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
            else{
                echo "User's room number and/or Hostel doesnt match";
                #header('Location:../../Profile/admin.php');
            }
        }
        else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>