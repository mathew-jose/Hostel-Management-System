<?php
	
    $subject = $concern = '';
    $errorsrc_ = array('subject' => '', 'concern' => '');
	
		if (isset($_POST['submitx'])) {
			
			if (empty($_POST['subject'])) {
                $errorsrc_['subject'] = 'An subject is required <br />';
            }
        
        
        
            if (empty($_POST['concern'])) {
                $errorsrc_['concern'] = 'Concern field is required <br />';
            }



        
		if (!array_filter($errorsrc_)) {
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$concern = mysqli_real_escape_string($conn, $_POST['concern']);
		$email = mysqli_real_escape_string($conn, $x);

		$sql = "INSERT INTO req_and_comp(sEmail,subject,concern) VALUES('$email','$subject','$concern')";

		if (mysqli_query($conn, $sql)) {
			#header('Location: userprofile.php');
		} else {
			echo 'query error: ' . mysqli_error($conn);
		}
	}
}
?>