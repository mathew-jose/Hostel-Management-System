<?php
	
	$conn = mysqli_connect('localhost','root','','hms');

	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

	else
	{
		// if (isset($_POST['submitlf'])) {
		// 	$lf_id = mysqli_real_escape_string($conn, $_POST['lf_id']);
		// 	$sql = "DELETE FROM `lost_and_found` WHERE `LF_ID` ='$lf_id'";
		// 	if(!mysqli_query($conn, $sql))
		// 		echo mysqli_error($conn);
		// }
		

		$sql = "SELECT * FROM student INNER JOIN users on sEmail=email ";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

		mysqli_free_result($result);
	}

	

	mysqli_close($conn);
 
	

	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lost & Found</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="../vendor/venobox/venobox.css" rel="stylesheet">
	<link href="../vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="../vendor/aos/aos.css" rel="stylesheet">



</head>
<body>
	<!-- ======= Top Bar ======= -->
	<section id="topbar" class="d-none d-lg-block">
		<div class="container d-flex">
			<div class="contact-info mr-auto">
				<i class="icofont-envelope"></i><a href="mailto:hostel@nitc.ac.in">hostel@nitc.ac.in</a>
				<i class="icofont-phone"></i> +91 1234xxxxxx
			</div>
		</div>
	</section>
	<!-- ======= Header ======= -->
	<header id="headers">
		<div class="container d-flex">

			<div class="logo mr-auto">
				<!--  <h1 class="text-light"><a href="index.html">NITC Hostels</a></h1> -->
				<!-- Uncomment below if you prefer to use an image logo -->
				<a href="../index.html"><img src="../images/NITC.png" alt="" class="img-fluid"></a>
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li><a href="../hostel.html">Hostels</a></li>
					<li><a href="http://www.dss.nitc.ac.in/">DSS</a></li>
					<li><a href="../contact.html">Contact</a></li>
					<li><a href="../help.html">Help</a></li>
					<li><a href="../Profile/admin.php">Profile</a></li>
				</ul>
			</nav><!-- .nav-menu -->

		</div>

	</header><!-- End Header -->
	<div style="background: radial-gradient(ellipse at bottom, #1B2735 0%, #090A0F 100%);">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
	<div class="limiter">
		
		<div style="background-color: #000;">
		<!-- <form style = "margin-left: 40%;" action = "lost&found.php" method=POST>
			<input type="text" name="lf_id" placeholder="Enter LF_ID" class = "submitbutton submitbutton1">
			<input type="submit" name="submitlf" value="Delete Entry" class="submitbutton submitbutton1">
		</form> -->
	</div>
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ROLL NO.</th>
								<th class="column2">NAME</th>
								<th class="column3">BRANCH</th>
								<th class="column4">EMAIL</th>
								<th class="column4">ADDRESS</th>
								<th class="column5">YOS</th>
								<th class="column5">HOSTEL</th>
								<th class="column5">ROOM NO.</th>
								<th class="column5">MESS</th>
							</tr>
						</thead>
						<tbody>
								
								
		<?php 
			
			foreach($rows as $row){ ?>
				<tr>
									<td class="column1"><?php echo $row['rollNo']; ?></td>
									<td class="column2"><?php echo $row['name'] ;?></td>
									<td class="column3"><?php echo $row['branch'] ;?></td>
									<td class="column4"><?php echo $row['sEmail'] ;?></td>
									<td class="column5"><?php echo $row['address'] ;?></td>
									<td class="column5"><?php echo $row['YoS'] ;?></td>
									<td class="column5"><?php echo $row['hostelID'];?></td>
									<td class="column5"><?php echo $row['roomNo'] ;?></td>
									<td class="column5"><?php echo $row['mess'] ;?></td>
									
				</tr>
									
		<?php } ?>
				
							
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>