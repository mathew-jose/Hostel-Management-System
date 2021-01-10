<?php
require('../config/sqlconn.php');
require('../form-processing/reqcomform.php');
require('../form-processing/lostfoundform.php');
require('../form-processing/visitorform.php');
require('../form-processing/requestroom.php');
require('../form-processing/messreq.php');
if(!$_SESSION['user'])
{
	header('Location: ../Login/login.php');
}

	$sql1 = mysqli_query($conn,"select * from users where email='".$_SESSION['user']."'");

	$sql2 = mysqli_query($conn,"select * from student where sEmail='".$_SESSION['user']."'");

	$num1 = mysqli_num_rows($sql1);
	$num2 = mysqli_num_rows($sql2);

	/*if(!$num1 || !$num2)
	{
		echo "NO DETAILS ADDED YET";
	}
	else
	{*/
		$tab1 = mysqli_fetch_assoc($sql1);
		$tab2 = mysqli_fetch_assoc($sql2);


		// not really an efficient way. the below code is there for the time being till an efficent method is found
		$sql3 = mysqli_query($conn,"select * from hostel where hostelID='".$tab2['hostelID']."'");
		
		$num3 = mysqli_num_rows($sql3);
		$tab3 = mysqli_fetch_assoc($sql3);

		$sql4 = mysqli_query($conn,"select * from admin where aEmail ='".$tab3['aEmail']."'");

		$tab4 = mysqli_fetch_assoc($sql4);

?>


<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>User Profile</title>
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
				<a href="../index.html"><img src="../images/NITC.png" alt="" class="img-fluid"></a>
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li><a href="../hostel.html">Hostels</a></li>
					<li><a href="http://www.dss.nitc.ac.in/">DSS</a></li>
					<li><a href="../contact.html">Contact</a></li>
					<li><a href="../help.html">Help</a></li>
					<li><a href="../config/logout.php">Logout</a></li>
				</ul>
			</nav><!-- .nav-menu -->

		</div>

	</header><!-- End Header -->




	<div style="background: radial-gradient(ellipse at bottom, #1B2735 0%, #090A0F 100%);">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
		<div id="page" class="containers">
			<!-- 	<div id="header" style="align-items: center;"> -->
			<div id="logo">
				<img src="https://cdn4.vectorstock.com/i/1000x1000/08/33/profile-icon-male-user-person-avatar-symbol-vector-20910833.jpg"
                    alt="" />
				<h1><a href="#"><?php echo "".$tab1['name'].""; ?></a></h1>
				<!--<span>Course Yearofstudy</span>-->
			</div>

			<div id="menu">

				<ul>
					<li class="current_page_item"><a href="#" accesskey="1" title="">My Profile</a></li>
					<li><a href="#handm" accesskey="2" title="">Hostel & Mess</a></li>
					<li><a href="#randc" accesskey="3" title="">Requests & Complaints</a></li>
					<li><a href="#landf" accesskey="4" title="">Lost & Found</a></li>
					<li><a href="#visitors" accesskey="5" title="">My Visitors</a></li>
					<li><a href="../Tables/duesstu.php" accesskey="6" title="">My Dues</a></li>
				</ul>
			</div>
			<!-- </div> -->



			<div id="main">
				<!-- *****Profile Contents********* -->

				<div id="welcome">
					<div class="title">
						<h2>Hi <?php echo "".$tab1['name'].""; ?></h2>
						<span class="byline">Welcome to the NIT Calicut Hostel Management System.</span>
					</div>
					<!-- ****** form********** -->
					<div class="grid-cont">
			<div style="text-align: left;">
				<h5>NAME</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab1['name'].""; ?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>COURSE</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab2['branch'].""; ?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>YEAR OF STUDY<h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab2['YoS'].""; ?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>ROLL NUMBER</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab2['rollNo'].""; ?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>INSTITUTE EMAIL</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab1['email'].""; ?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>HOSTEL</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab2['hostelID']."";?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>ROOM</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab2['roomNo'].""; ?></h5>
			</div>
		</div>
		
		<div class="grid-cont">
			<div style="text-align: left;">
				<h5>MESS</h5>
			</div>
			<div style="text-align: right;">
				<h5><?php echo "".$tab2['mess'].""; ?></h5>
			</div>
		</div>
		
		<form action="profile_update.php" method="POST">
			<div class="grid-cont">
				<div style="text-align: left;">
					<h5>ADDRESS</h5>
				</div>
				<div style="text-align: right;">
					<h5><input type="text" class="form-control" name="addr" placeholder="<?php echo "".$tab2['address'].""; ?>"></h5>
				</div>
			</div>
			
			<div class="grid-cont">
				<div style="text-align: left;">
					<h5>CONTACT NUMBER</h5>
				</div>
				<div style="text-align: right;">
					<h5><input type="text" class="form-control" name="contact" placeholder="<?php echo "".$tab1['contactNo'].""; ?>"></h5>
				</div>
			</div>
			
			<div class="grid-cont">
				<div style="text-align: left;">
					<h5>EDIT PASSWORD</h5>
				</div>
				<div style="text-align: right;">
					<h5><input type="Password" class="form-control" name="pwd" placeholder="Enter new Password"></h5>
				</div>
			</div><br><br>

				<div class="text-center"><button class= "submitbutton submitbutton1" name="pro_submit" type="submit">Submit profile details</button></div>
		</form>

			<p><br></p>
		</div>

				<!-- ******Hostel and Mess******** -->

				<div id="handm" class="featured">
					<div class="title">
						<h2>Hostel and Mess</h2>
						<span class="byline">Related Requests</span>
					</div>
					<ul class="style1">
						<li class="first">
							<h4>Request to Change Hostel/Vacate Room</h4><br>
							<form class="text-center" action="userprofile.php" method="POST">
							<div class="form-group">
							<select class = "submitbutton submitbutton1" name="subject">
								<option value="">Select Request</option>
								<option value="CHANGE HOSTEL">Change Hostel</option>
								<option value="VACATE ROOM">Vacate Room</option>
							</select>
						</div>
						<div class="red-text small"><?php echo $errorsrc_['subject']; ?></div>
						<div class="form-group">
							<textarea class="form-control" name="concern" rows="5" data-msg="Please write your concern here" placeholder="Please write your concern here"></textarea>
							<div class="red-text small"><?php echo $errorsrc_['concern']; ?></div>
						</div><br><br>

						<div class="center">
							<input type="submit" name="submitx" value="Submit Request" class="submitbutton submitbutton1">
						</div>
					</form>
						</li>
						<li>
							<h4>Request to Issue Mess Card</h4><br>
							<p>1. A - First Year Mess</p>
							2. B - First Year Mess
							<p>3. C - South Indian Veg Mess</p>
							4. D - North Indian Non Veg Mess
							<p>5. E - North Indian Veg Mess</p>
							6. F - South Indian Non Veg Mess
							<p>7. MB - Mega Hostel Mess</p>
							8. ML - Ladies Hostel Mess
							<br><br>

							<form class= "form-group" action="userprofile.php" method="POST">
							<div class="text-center">
							<select class = "submitbutton submitbutton1" name="mess">
									<option value="">Choose Mess</option>
			                    	<option value="A">A</option>
			                    	<option value="B">B</option>
			                    	<option value="C">C</option>
			                    	<option value="D">D</option>
			                    	<option value="E">E</option>
			                    	<option value="F">F</option>
			                    	<option value="MB">MB</option>
			                    	<option value="ML">ML</option>
							</select>
						</div>
						<div class="red-text small"><?php echo $errorsm['mess']; ?></div>
	

						<div class="text-center">
							<input type="submit" name="submitm" value="Submit Mess Request" class="submitbutton submitbutton1">
						</div>
					</form>
						</li>

					</ul>
				</div>

				<!-- ******Request and Complaints******** -->

				<div class="featured" id="randc">
					<div class="title">
						<h2>Request and Complaints</h2>
						<span class="byline">Fill the form incase of Requests and Complaints</span>
					</div>
					<form class="white" action="userprofile.php" method="POST">
						<div class="form-group">
							<select class = "submitbutton submitbutton1" name="subject">
								<option value="">Select Request or Complaint</option>
								<option value="REQUEST">Request</option>
								<option value="COMPLAINT">Complaint</option>
							</select>
						</div>
						<div class="red-text small"><?php echo $errorsrc['subject']; ?></div>
						<div class="form-group">
							<textarea class="form-control" name="concern" rows="5" data-msg="Please write your concern here" placeholder="Please write your concern here" required></textarea>
							<div class="red-text small"><?php echo $errorsrc['concern']; ?></div>
						</div><br><br>

						<div class="center">
							<input type="submit" name="submitrc" value="Submit Request&Complaint" class="submitbutton submitbutton1">
						</div>
					</form>
					<a href="../Tables/request&complaintstu.php">
							<button class="submitbutton submitbutton1">
								View Request&Complaints
							</button>
					</a>
				</div>

				<!-- ******Lost and Found******** -->

				<div class="featured" id="landf">
					<div class="title">
						<h2>Lost and Found</h2>
						<span class="byline">Fill the form incase of Lost/Found item</span>
					</div>
					<form class="white" action="userprofile.php" method="POST">
						<div class="form-group">
							<select class="submitbutton submitbutton1" name="lf">
								<option value="">Select Lost or Found</option>
								<option value="LOST">Lost</option>
								<option value="FOUND">Found</option>
							</select>
						</div>
						<div class="red-text small"><?php echo $errorslf['lf']; ?></div>
						<div class="form-group">
							<input type="text" class="form-control" name="item" placeholder="Item name" />
							<div class="red-text small"><?php echo $errorslf['item']; ?></div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="description" rows="5" data-msg="Please give proper description of the item" placeholder="Please give proper decription of the item"></textarea>
							<div class="red-text small"><?php echo $errorslf['description']; ?></div>
						</div>

						
						<br><br>
						<div>
							<input type="submit" name="submitlf" value="Submit Lost/Found" class="submitbutton submitbutton1">
						</div>
					</form>
					<a href="../Tables/lost&foundstu.php">
							<button class="submitbutton submitbutton1">
								View Lost&Found
							</button>
					</a>
				</div>

				<!-- ******Visitors******** -->

				<div class="featured" id="visitors">
					<div class="title">
						<h2>Visitors</h2>
						<span class="byline">Add Visitor Details</span>
					</div>
					<form class="white" action="userprofile.php" method="POST">
					<div class="grid-cont">
						<div style="text-align: left;">
							<h5>VISITOR NAME</h5>
						</div>
						<div style="text-align: right;">
							<h5><input type="text" class="form-control" name="vname" placeholder="Enter Name"></h5>
						</div>
						<div class="red-text small"><?php echo $errorsv['vname']; ?></div>
					</div>

					<div class="grid-cont">
						<div style="text-align: left;">
							<h5>RELATION</h5>
						</div>
						<div style="text-align: right;">
							<h5><input type="text" class="form-control" name="reln" placeholder="Enter Relation"></h5>
						</div>
						<div class="red-text small"><?php echo $errorsv['reln']; ?></div>
					</div>

					<div class="grid-cont">
						<div style="text-align: left;">
							<h5>CONTACT NUMBER</h5>
						</div>
						<div style="text-align: right;">
							<h5><input type="text" class="form-control" name="vcontact" placeholder="Mobile Number"></h5>
						</div>
						<div class="red-text small"><?php echo $errorsv['vcontact']; ?></div>
					</div>

					<div class="grid-cont">
						<div style="text-align: left;">
							<h5>ARRIVAL DATE</h5>
						</div>
						<div style="text-align: right;">
							<h5><input type="text" class="form-control" name="adate" placeholder="dd/mm/yyyy"></h5>
						</div>
						<div class="red-text small"><?php echo $errorsv['adate']; ?></div>
					</div>

					<div class="grid-cont">
						<div style="text-align: left;">
							<h5>ARRIVAL TIME</h5>
						</div>
						<div style="text-align: right;">
							<h5><input type="text" class="form-control" name="atime" placeholder="hh:mm (24 hour format)"></h5>
						</div>
						<div class="red-text small"><?php echo $errorsv['atime']; ?></div>
					</div>

					<div class="grid-cont">
						<div style="text-align: left;">
							<h5>DEPARTURE TIME</h5>
						</div>
						<div style="text-align: right;">
							<h5><input type="text" class="form-control" name="dtime" placeholder="hh:mm (in 24 hour format)"></h5>
						</div>
						<div class="red-text small"><?php echo $errorsv['dtime']; ?></div>
					</div> <br><br>

					<div>
							<input type="submit" name="submitv" value="Submit Visitor Details" class="submitbutton submitbutton1">
					</div>
					</form>

				</div>
			</div>


			<!-- Vendor JS Files -->
			<script src="../vendor/jquery/jquery.min.js"></script>
			<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="../vendor/jquery.easing/jquery.easing.min.js"></script>
			<script src="../vendor/php-email-form/validate.js"></script>
			<script src="../vendor/jquery-sticky/jquery.sticky.js"></script>
			<script src="../vendor/venobox/venobox.min.js"></script>
			<script src="../vendor/waypoints/jquery.waypoints.min.js"></script>
			<script src="../vendor/counterup/counterup.min.js"></script>
			<script src="../vendor/isotope-layout/isotope.pkgd.min.js"></script>
			<script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
			<script src="../vendor/aos/aos.js"></script>

			<!-- Template Main JS File -->
			<script src="../js/main.js"></script>
</body>

</html>