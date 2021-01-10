<?php 
$lf = $item = $description = '' ;
$errorslf = array('lf' => '', 'item' => '', 'description' => '');
if (isset($_POST['submitlf'])) {

if (empty($_POST['lf'])) {
    $errorslf['lf'] = 'Please select if the item is lost or found <br />';
}

if (empty($_POST['item'])) {
    $errorslf['item'] = 'Item name cannot be empty <br />';
}


if (empty($_POST['description'])) {
    $errorslf['description'] = 'Description field is required <br />';
}



if (!array_filter($errorslf)) {
    $lf_id = mysqli_real_escape_string($conn, $_POST['lf']);
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['lf']);
    $email = mysqli_real_escape_string($conn, $x);

    $sql = "INSERT INTO lost_and_found(sEmail,LF_ID,item,description,lf) VALUES('$email','$lf_id','$item','$description','$status')";

    if (mysqli_query($conn, $sql)) {
        header('Location: userprofile.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
}
?>