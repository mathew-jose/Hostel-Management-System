<?php
	
    $mess = '';
    $errorsm = array('mess' => '');
	
		if (isset($_POST['submitm'])) {
			
			if (empty($_POST['mess'])) {
                $errorsm['mess'] = 'Please select a mess <br />';
            }
            if (!array_filter($errorsm)) {
				$mess = mysqli_real_escape_string($conn, $_POST['mess']);
				$email = mysqli_real_escape_string($conn, $x);

				$sql = "INSERT INTO mess_request(sEmail,mess) VALUES('$email','$mess')";

				if (mysqli_query($conn, $sql)) {
					#header('Location: userprofile.php');
				} else {
					echo 'query error: ' . mysqli_error($conn);
				}
		        
		        }

		
	}
?>