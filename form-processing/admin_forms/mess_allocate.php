<?php

    require('../../config/sqlconn.php');

    echo "outside everything";

    if(isset($_POST['mess_alloc']))
    {
        echo "inside if";
        $email = mysqli_real_escape_string($conn, $_POST['email_s']);
        $mess = mysqli_real_escape_string($conn, $_POST['mess_name']);

        $sql = mysqli_query($conn,"UPDATE student SET mess='$mess' WHERE sEmail='$email'");
        if($sql)
        {

            header('Location:../../Profile/admin.php');
        }
        else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>