<?php
    require('../config/sqlconn.php');
    if(!$_SESSION['user'])
{
    header('Location: ../Login/login.php');
}

   $sql1 = mysqli_query($conn,"select * from users where email='$x'");

    $sql2 = mysqli_query($conn,"select * from admin where aEmail='$x'");

    $tab1 = mysqli_fetch_assoc($sql1);
    $tab2 = mysqli_fetch_assoc($sql2);


    //hostel display part

    $sql = mysqli_query($conn, "SELECT * FROM hostel");
    //$result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    $num = mysqli_num_rows($sql);

    if(!$num)
    {
        echo "No data about hostels found";
    }
    else{

        $arr = [];
        foreach($rows as $row)
        {
            $cap = $row['no_ofRooms'] * $row['maxshare'];
            $hostel = $cap  - $row['no_ofStudents'];
            //echo $hostel;
            array_push($arr,$hostel,$cap);
        }
    }
    $c=[];
    $hostarray = ['A','B','C','D','E','F','MB','ML'];
    foreach($hostarray as $host)
    {
        $sql = mysqli_query($conn, "SELECT * FROM student WHERE mess='$host'");
        $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        $num = mysqli_num_rows($sql);
        array_push($c,$num);
    }


?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Profile</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
                    <li><a href="../config/logout.php">Logout</a></li>
                    
                </ul>
            </nav><!-- .nav-menu -->

        </div>

    </header><!-- End Header -->




    <div style="background: radial-gradient(ellipse at bottom, #1B2735 0%, #090A0F 100%);">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <div id="stars4"></div>   
        <div id="page" class="containers">
            <!-- 	<div id="header" style="align-items: center;"> -->
            <div id="logo">
                <img src="https://cdn4.vectorstock.com/i/1000x1000/08/33/profile-icon-male-user-person-avatar-symbol-vector-20910833.jpg"
                    alt="" />
                <h1><a href="#"><?php echo "".$tab1['name']."";?></a></h1>
                
            </div>

            <div id="menu">

                <ul>
                    <li class="current_page_item"><a href="#">My Profile</a></li>
                    <li><a href="#alloc">Allocate</a></li>
                    <li><a href="../Tables/request&complaint.php">Requests & Complaints</a></li>
                    <li><a href="../Tables/lost&found.php">Lost & Found</a></li>
                    <li><a href="../Tables/visitors.php">View Visitors</a></li>
                    <li><a href="#vacate">Vacate</a></li>
                </ul>
            </div>
            <!-- </div> -->



            <div id="main">
                <!-- **Profile Contents**** -->

                <div id="welcome">
                    <div class="title">
                        <h2>Hi <?php echo "".$tab1['name'].""; ?></h2>
                        <span class="byline">Welcome to the NIT Calicut Hostel Management System.</span>
                    </div>
                    <!-- ** form**** -->
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
                            <h5>INSTITUTE EMAIL</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><?php echo $x; ?></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>ROLE</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5>ADMINISTRATOR</h5>
                        </div>
                    </div>
                    


                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>DATE OF BIRTH</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><?php echo "".$tab1['DoB']."";?></h5>
                        </div>
                    </div>

                    <form action="admin_prof_update.php" method="POST">

                        <div class="grid-cont">
                            <div style="text-align: left;">
                                <h5>CONTACT NUMBER</h5>
                            </div>
                            <div style="text-align: right;">
                                <h5><input type="text" class="form-control" name="contact" placeholder="<?php echo "".$tab1['contactNo'].""; ?>">
                                </h5>
                            </div>
                        </div>

                        <div class="grid-cont">
                            <div style="text-align: left;">
                                <h5>EDIT PASSWORD</h5>
                            </div>
                            <div style="text-align: right;">
                                <h5><input type="Password" class="form-control" name="pwd" placeholder="Enter new Password">
                                </h5>
                            </div>
                        </div><br><br>

                        <div class="text-center"><button class="submitbutton submitbutton1" name="pro_submit" type="submit">Edit profile
                                details</button></div>
                    </form>

                    <p><br></p>
                </div>

                <!-- ***Allocate*** -->
                <div class="featured" id="alloc">
                    <div class="title">
                        <h2>Allocate Student</h2><br><br>
                        <!-- ======= Counts Section ======= -->
                        <section id="counts" class="counts">
                            <div class="container">

                                <div class="row counters">

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[0]; ?></span>
                                        <p><h5>A-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[1]; ?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[2]; ?></span>
                                        <p><h5>B-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[3]; ?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[4]; ?></span>
                                        <p><h5>C-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[5]; ?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[6]; ?></span>
                                        <p><h5>D-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[7]; ?></h6></p>
                                    </div>

                                </div>
                                <br><br>
                                <div class="row counters">

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[8]; ?></span>
                                        <p><h5>E-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[9]; ?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[10]; ?></span>
                                        <p><h5>F-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[11]; ?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[12]; ?></span>
                                        <p><h5>MB-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[13]; ?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[14]; ?></span>
                                        <p><h5>ML-Hostel Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[15]; ?></h6></p>
                                    </div>

                                </div>


                            </div>
                        </section><!-- End Counts Section -->
                        <br><br>
                        <span class="byline">Enter Details To Allocate A New Student.</span>
                    </div>
                    <form action="../form-processing/admin_forms/student_insert.php" method="POST">
                    	<div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>NAME</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_name" placeholder="Name" ></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>COURSE</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_course" placeholder="Course" ></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>YEAR OF STUDY<h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_yos" placeholder="Year Of Study" ></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>ROLL NUMBER</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_roll" placeholder="Roll Number" ></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>INSTITUTE EMAIL</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_email" placeholder="Institute Email" required>
                            </h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>DATE OF BIRTH</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="date" class="form-control" name="s_dob" placeholder="DD-MM-YYYY" ></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>HOSTEL ID</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_hostel_id" placeholder="Hostel ID" required></h5>
                        </div>
                    </div>

                    

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>ADDRESS</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_address"
                                    placeholder="H.NO-5, XYZ street ABC" ></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>CONTACT NUMBER</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="s_contact" placeholder="+91 xxxxxxxxxx" >
                            </h5>
                        </div>
                    </div>

                   
                    <br><br>

                    <div class="text-center"><button class="submitbutton submitbutton1" name="s_allocate" type="submit">Allocate
                            Student</button></div>

                    </form>

                    <a href="../Tables/students.php">
							<button class="submitbutton submitbutton1">
								View All Students
							</button>
					</a>

                    <p><br><br></p>

                    <div class="title">
                        <h2>Allocate Warden</h2>
                        <span class="byline">Enter Details To Allocate A New Hostel Incharge.</span>
                    </div>
                    <form action="../form-processing/admin_forms/warden_insert.php" method="POST">
                    	<div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>NAME</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="w_name" placeholder="Name" required></h5>
                        </div>
                    </div>



                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>INSTITUTE EMAIL</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="w_email" placeholder="Institute Email" required>
                            </h5>
                        </div>
                    </div>


                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>DATE OF BIRTH</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="w_dob" placeholder="DD-MM-YYYY" required></h5>
                        </div>
                    </div>

                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>HOSTEL INCHARGE OF</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="w_hostel" placeholder="Hostel" required></h5>
                        </div>
                    </div>
                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>CONTACT NUMBER</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="w_contact" placeholder="+91 xxxxxxxxxx" required>
                            </h5>
                        </div>
                    </div>


                    <br><br>

                    <div class="text-center"><button class="submitbutton submitbutton1" name="w_signup" type="submit">Allocate
                            Warden</button></div>
                    </form>
                    <p><br><br><br></p>

                

                <div class="title">
                        <h2>Allocate Mess</h2>
                        <!-- ======= Counts Section ======= -->
                        <section id="counts" class="counts">
                            <div class="container">

                                <div class="row counters">

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[1]-$c[0]?></span>
                                        <p><h5>A-Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[1]?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[3]-$c[1]?></span>
                                        <p><h5>B- Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[3]?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[5]-$c[2]?></span>
                                        <p><h5>C-Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[5]?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[7]-$c[3]?></span>
                                        <p><h5>D-Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[7]?></h6></p>
                                    </div>

                                </div>
                                <br><br>
                                <div class="row counters">

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[9]-$c[4]?></span>
                                        <p><h5>E- Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[9]?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[11]-$c[5]?></span>
                                        <p><h5>F- Mess  Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[11]?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[13]-$c[6]?></span>
                                        <p><h5>MB-Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[13]?></h6></p>
                                    </div>

                                    <div class="col-lg-3 col-6 text-center">
                                        <span data-toggle="counter-up" style="color: #8fc04e; font-size: 50px;"><?php echo $arr[15]-$c[7]?></span>
                                        <p><h5>ML-Mess Vacancy</h5></p>
                                        <p><h6>Capacity-<?php echo $arr[15]?></h6></p>
                                    </div>

                                </div>


                            </div>
                        </section><!-- End Counts Section -->
                           <br> <br>

                        <span class="byline">Enter Details of Student to Allocate to a Mess.</span>
                    </div>
                  
                    <a href="../Tables/messrequest.php">
                            <button class="submitbutton submitbutton1">
                                View Mess Requests
                            </button>
                    </a>
                            <br><br>
                   <form action="../form-processing/admin_forms/mess_allocate.php" method="POST">
                   	
                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>Student Email</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="email_s" placeholder="Student Email" required>
                            </h5>
                        </div>
                    </div>

                    <br><br>
                    <select class = "submitbutton submitbutton1" name="mess_name">
                    	<option>Choose Mess</option>
                    	<option>A</option>
                    	<option>B</option>
                    	<option>C</option>
                    	<option>D</option>
                    	<option>E</option>
                    	<option>F</option>
                    	<option>MB</option>
                    	<option>ML</option>
                    </select>

                    
                    <div class="text-center"><button class="submitbutton submitbutton1" name="mess_alloc" type="submit">Allocate
                            Mess</button></div>
                    <p><br><br><br></p>

                   </form>

                   <!-- DUES -->
                <div class="title">
                        <h2>Allocate Dues</h2>
                        <span class="byline">Enter Dues of Student</span>
                    </div>
                   <form action="../form-processing/admin_forms/dues_allocate.php" method="POST">
                    
                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>Student Email</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="email_s" placeholder="Student Email" required>
                            </h5>
                        </div>
                    </div>
                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>Dues</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="number" class="form-control" name="amt" placeholder="Enter the Amount" required>
                            </h5>
                        </div>
                    </div>
                    <br><br>
                    <select class = "submitbutton submitbutton1" name="type">
                        <option>Choose Dues Type</option>
                        <option>Mess</option>
                        <option>Hostel</option>
                        <option>Fines</option>
                    </select>
                
                    
                    <div class="text-center"><button class="submitbutton submitbutton1" name="dues_alloc" type="submit">Allocate
                            Dues</button></div>
                    <br>

                   </form>
                    <a href="../Tables/dues.php">
                            <button class="submitbutton submitbutton1">
                                View Dues
                            </button>
                    </a>

               
            </div>

            <div class="featured" id="vacate">
                    <div class="title">
                        <h2>Vacate Student</h2><br><br>
            			<span class="byline">Enter Details to Vacate Student.</span>
                    </div>
                   <form action="../form-processing/admin_forms/vacate_student.php" method="POST"> 
                   	
                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>Student Email</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="email_s" placeholder="Student Email" required>
                            </h5>
                        </div>
                    </div>

                     <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>Room Number</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="room_no" placeholder="Room Number" required>
                            </h5>
                        </div>
                    </div>
                    <div class="grid-cont">
                        <div style="text-align: left;">
                            <h5>Hostel</h5>
                        </div>
                        <div style="text-align: right;">
                            <h5><input type="text" class="form-control" name="hostel" placeholder="Hostel" required>
                            </h5>
                        </div>
                    </div>
                     <br><br>
                    <div class="text-center"><button class="submitbutton submitbutton1" name="vac_sub" type="submit">Vacate Room</button></div>
                    <p><br><br><br></p>

                   </form>



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