<?php

    require('../../config/sqlconn.php');

    if(isset($_POST['dues_alloc']))
    {
        
        $email = mysqli_real_escape_string($conn, $_POST['email_s']);
        $dues = mysqli_real_escape_string($conn, $_POST['amt']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);

        $result= mysqli_query($conn,"SELECT * FROM dues WHERE sEmail='$email' AND dueType ='$type'" );
        if (empty(mysqli_error($conn))) {
			if(!mysqli_fetch_row($result)){
                echo "inside if";
                mysqli_free_result($result);
                $sql = mysqli_query($conn,"INSERT INTO dues(sEmail,amount,dueType) VALUES('$email','$dues','$type')");
                if($sql)
                {
                    header('Location:../../Profile/admin.php');
                }
                else{
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
            else
            {
                mysqli_free_result($result);
                $sql = mysqli_query($conn,"UPDATE `dues` SET amount = amount + $dues WHERE sEmail='$email' AND dueType ='$type'");
                if($sql)
                {
                    header('Location:../../Profile/admin.php');
                }
                else
                {
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
        }
    }    
       

?>