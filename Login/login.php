<?php
session_start();
$conn = mysqli_connect('localhost','root','','hms');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

$err = '';
extract($_POST);


if(isset($login))
{

  //$err = '';
    if($email=="" || $pass=="")
	{
	    $err="<font color='blue'>fill all the fileds first</font>";	
	}
	else
	{
        $password=md5($pass);
        

        $sql=mysqli_query($conn,"select * from users where email='$email' and password='$pass' and usertype='$usertype'");

        $num = mysqli_num_rows($sql);
        //$err="<font color='red'>Inside first else</font>";

        if($num == 1)
        {
            $_SESSION['user']=$email;
            if($usertype == "student")
            {
                header('location:../Profile/userprofile.php');//redirect to student user page
            }
            elseif($usertype == "admin")
            {
                header('location:../Profile/admin.php');//redirect to admin user page
            }
            //header('location:sUser.html'); 
        }
        else
        {
            $err='There was an error with your E-Mail/Password combination. Please try again';
        }
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Hostel Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


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
    <link href="../css/style.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

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
    <header id="header">
      <div class="container d-flex">

        <div class="logo mr-auto">
          <!--  <h1 class="text-light"><a href="../index.html">NITC Hostels</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="../index.html"><img src="../images/NITC.png" alt="" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="../hostel.html">Hostels</a></li>
			<li><a href="http://www.dss.nitc.ac.in/">DSS</a></li>
			<li><a href="../contact.html">Contact</a></li>
			<li><a href="../help.html">Help</a></li>
            <li class="active"><a href="login.php">Login</a></li>
          </ul>
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
      <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
      <div class="hero-container">
        <div class="limiter">
          <div class="container-login100">
            <div class="wrap-login100 p-t-90 p-b-30">
              <form class="login100-form validate-form" action="login.php" method="POST">
                <span class="login100-form-title p-b-40">
                  Login
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Enter Username: example@abc.xyz">
                  <input class="input100" type="text" name="email" placeholder="Email">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Password">
                  <span class="btn-show-pass">
                    <i class="fa fa fa-eye"></i>
                  </span>
                  <input class="input100" type="password" name="pass" placeholder="Password">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100">
                  <select name="usertype" class="input100">
                    <option>Choose Privillege</option>
                    <option value="student">Student</option>
                    <!--<option value="warden">Warden</option>-->
                    <option value="admin">Admin</option>
                  </select>

                </div>
                <br>
                <div class="container-login100-form-btn">
                  <button class="btn-get-started scrollto" name="login">
                    Login
                  </button>
                </div>

                <!-- output if user entered values are not present in the db-->
                <div>
                  <p><?php echo $err; ?> </p>
                  <?php unset($err); ?>
                </div>

                <div class="flex-col-c p-t-224">
                  <span class="txt2 p-b-10">
                    Unable to login?
                  </span>

                  <a href="../help.html" class="txt3 bo1 hov1">
                    Get in touch with the NITC hostel office now!
                  </a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero -->

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

  </body>

</html>