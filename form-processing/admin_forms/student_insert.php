<?php

    require('../../config/sqlconn.php');

    echo "outside everything";

if(isset($_POST['s_allocate']))
{
    //$sEmail = $_POST['s_email'];

    
        echo "inside if 1";

        $name = mysqli_real_escape_string($conn, $_POST['s_name']);//U
        $password = mysqli_real_escape_string($conn, $_POST['s_roll']);//student roll number is the initial password
        $yos = mysqli_real_escape_string($conn, $_POST['s_yos']);//S
        $rollnumber = mysqli_real_escape_string($conn, $_POST['s_roll']);//S
        $email = mysqli_real_escape_string($conn, $_POST['s_email']);//U
        $dob = mysqli_real_escape_string($conn, $_POST['s_dob']);//U
        $hostelID = mysqli_real_escape_string($conn, $_POST['s_hostel_id']);//S
        $address = mysqli_real_escape_string($conn, $_POST['s_address']);//S
        $contact = mysqli_real_escape_string($conn, $_POST['s_contact']);//U
        $course = mysqli_real_escape_string($conn, $_POST['s_course']);//U
        //$encry = md5($password);

        $check = "select * from users where email = '$email'";

        $result = mysqli_query($conn, $check);
        $num = mysqli_num_rows($result);



            $sql3 = mysqli_query($conn, "UPDATE hostel SET no_ofStudents = no_ofStudents + 1 WHERE  hostelID='$hostelID'");
            if($sql3)
            {
                //header('Location:../../Profile/admin.php');
            }
            else{
                echo 'query error: ' . mysqli_error($conn);
            }

            $sql4 = mysqli_query($conn, "SELECT * FROM hostel WHERE hostelID='$hostelID'");
            if($sql4)
            {
                //header('Location:../../Profile/admin.php');
            }
            else{
                echo 'query error: ' . mysqli_error($conn);
            }

            $tab4 = mysqli_fetch_assoc($sql4);
            $alloc_room = ceil(($tab4['no_ofStudents']/$tab4['maxshare']));

        if($num)
        {
            $sql2 = mysqli_query($conn, "UPDATE student SET roomNo = '$alloc_room', hostelID = '$hostelID' WHERE sEmail = '$email'");
            
            if($sql2)
            {
                header('Location:../../Profile/admin.php');
            }
            else{
                echo 'query error: ' . mysqli_error($conn);
            }
        
        }
        else{

            $sql1 = mysqli_query($conn,"INSERT INTO users(name,password,email,DoB,usertype,contactNo) VALUES('$name','$password','$email','$dob','student','$contact')");
            if($sql1)
            {
                //header('Location:../../Profile/admin.php');
            }
            else{
                echo 'query error: ' . mysqli_error($conn);
            }

            $sql2 = mysqli_query($conn, "INSERT INTO student(Branch,YoS,rollNo,sEmail,hostelID,address,roomNo) VALUES('$course','$yos','$rollnumber','$email','$hostelID','$address','$alloc_room')");
            if($sql2)
            {
                header('Location:../../Profile/admin.php');
            }
            else{
                echo 'query error: ' . mysqli_error($conn);
            }
        }


}

?>