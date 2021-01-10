<?php
$vname = $reln = $vcontact = $adate = $atime = $dtime = '';
$errorsv = array('vname' => '', 'reln' => '', 'adate' => '', 'atime' => '', 'dtime' => '', 'vcontact' => '');
if (isset($_POST['submitv'])) {

	if (empty($_POST['vname'])) {
		$errorsv['vname'] = 'Enter visitor name <br />';
	}

	if (empty($_POST['reln'])) {
		$errorsv['reln'] = 'Enter your relation with the visitor <br />';
	}


	if (empty($_POST['adate'])) {
		$errorsv['adate'] = 'Enter the visitor arrival date <br />';
	}
	else
	{
		if (!(preg_match('/^(?:(?:31(\/)(?:0[13578]|1[02]))\1|(?:(?:29|30)(\/)(?:0[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/)02\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0[1-9]|1\d|2[0-8])(\/)(?:(?:0[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $_POST['adate']))) {
			$errorsv['adate'] = 'Enter a valid arrival date';
		}
	}

	if (empty($_POST['atime'])) {
		$errorsv['atime'] = 'Enter the visitor arrival time <br />';
	}
	else
	{
		if (!(preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $_POST['atime']))) {
			$errorsv['atime'] = 'Enter a valid arrival time';
		}
	}

	if (empty($_POST['dtime'])) {
		$errorsv['dtime'] = 'Enter the visitor departure time <br />';
	}
	else
	{
		if (!(preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $_POST['dtime']))) {
			$errorsv['dtime'] = 'Enter a valid departure time';
		}
	}

	if (empty($_POST['vcontact'])) {
		$errorsv['vcontact'] = 'Enter your mobile number <br />';
	} 
	else 
	{
		if (!(preg_match('/^[0-9]{10}$/', $_POST['vcontact']))) {
			$errorsv['vcontact'] = 'Enter a valid phone number';
		}
	}

	if (!array_filter($errorsv)) {
		$vname = mysqli_real_escape_string($conn, $_POST['vname']);
		$reln = mysqli_real_escape_string($conn, $_POST['reln']);
		$vcontact = mysqli_real_escape_string($conn, $_POST['vcontact']);
		$adate = mysqli_real_escape_string($conn, $_POST['adate']);
		$atime = mysqli_real_escape_string($conn, $_POST['atime'].':00');
		$dtime = mysqli_real_escape_string($conn, $_POST['dtime'].':00');
        $email = mysqli_real_escape_string($conn, $x);
        
        $sql = "SELECT 1 FROM visitors WHERE contactNo = '$vcontact' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (empty(mysqli_error($conn))) {
			if(!mysqli_fetch_row($result)){
                $sql1 = "INSERT INTO visitors(contactNo,name,reln) VALUES('$vcontact','$vname','$reln')";
                if (mysqli_query($conn, $sql1)) {
                    $sql2= "INSERT INTO student_visitor(contactNo,sEmail) VALUES('$vcontact','$email')";
                    if (mysqli_query($conn, $sql2)) {
                        $sql3= "INSERT INTO visits(contactNo,inDate,inTime,outTime) VALUES('$vcontact',STR_TO_DATE('$adate', '%d/%m/%Y'),TIME_FORMAT('$atime','%H:%i:%s'),TIME_FORMAT('$dtime','%H:%i:%s'))";
                        if(mysqli_query($conn, $sql3))
                        {
                            header('Location: userprofile.php');
                        }
                        else
                        {
                            echo 'query error: ' . mysqli_error($conn);
                        }
                    }
                    else{
                        echo 'query error: ' . mysqli_error($conn);
                    }   
                } 
                else {
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
            else
            {
                $sql3= "INSERT INTO visits(contactNo,inDate,inTime,outTime) VALUES('$vcontact',STR_TO_DATE('$adate', '%d/%m/%Y'),TIME_FORMAT('$atime','%H:%i:%s'),TIME_FORMAT('$dtime','%H:%i:%s'))";
                if(mysqli_query($conn, $sql3))
                {
                    header('Location: userprofile.php');
                }
                else
                {
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
        }   
        
    
        else {
			echo 'query error: ' . mysqli_error($conn);
		}
		#$sql = "INSERT INTO visitors(email,vname,reln,vcontact,adate,atime,ddate,dtime) VALUES('$email','$vname','$reln','$vcontact',STR_TO_DATE('$adate', '%d/%m/%Y'),TIME_FORMAT('$atime','%H:%i:%s'),STR_TO_DATE('$ddate', '%d/%m/%Y'),TIME_FORMAT('$dtime','%H:%i:%s'))";
        
        }
    }

        
		
	
 ?>