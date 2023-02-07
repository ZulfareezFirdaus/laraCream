<?php 

session_start();
include("dbconn.php");

$sql = "SELECT * FROM customer WHERE userActivationCode = '".$_GET['activation_code']."'";
$query = mysqli_query($dbconn, $sql);
$data = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LaraCream Cafe</title>

  <!-- Favicons -->
  <link href="assets/imgs/logo2.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><img width="9%" src="assets/imgs/logo5.png" />&nbsp;<span class="title" >LaraCream</span></a></h1>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="about.html">Events</a></li>
		  <li class="drop-down"><a href="">Products</a>
            <ul>
              <li class="drop-down"><a href="#">Flavors</a>
                <ul>
                  <li class="drop-down"><a href="#">All</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Tart</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Non Tart</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Laracream's ®</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Dairy Free</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
                </ul>
              </li>
              <li class="drop-down"><a href="#">Toppings</a>
                <ul>
                  <li class="drop-down"><a href="#">All</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Fresh Fruit</a>
					<ul>
					  <li><a href="#">Strawberries</a></li>
					  <li><a href="#">Blueberries</a></li>
					  <li><a href="#">Raspberries</a></li>
					  <li><a href="#">Pineapple</a></li>
					  <li><a href="#">Kiwi</a></li>
					  <li><a href="#">Mango</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Chocolate n Candy</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Nut n Cereals</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
				  <li class="drop-down"><a href="#">Liquid</a>
					<ul>
					  <li><a href="#">Deep Drop Down 1</a></li>
					  <li><a href="#">Deep Drop Down 2</a></li>
					  <li><a href="#">Deep Drop Down 3</a></li>
					  <li><a href="#">Deep Drop Down 4</a></li>
					  <li><a href="#">Deep Drop Down 5</a></li>
					</ul>
				  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="portfolio.html">Contact Us</a></li>
          <li><a href="team.html">Our Story</a></li>
          <li><a href="blog.html">Our Blog</a></li>
		  <li><a href="blog.html"><i style="font-size:18px;" class="bx bx-shopping-bag"></i></a></li>
		  <li><a href="signin.php"><i style="font-size:19px;" class="bx bx-door-open"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Email Verification</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Email Verification</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->
<?php

	if($data['userStatus'] == 'Not Verify'){
	
	$sqlVerify = "UPDATE customer SET userStatus = 'Verified' WHERE userActivationCode = '".$_GET['activation_code']."'";
	$queryVerify = mysqli_query($dbconn, $sqlVerify);

?>
    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row" style="justify-content: center;" >
          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <form action="index.php" method="post" class="php-email-form">
			  <br><center><h2 style="z-index:999999;position: relative;" >Registration Success!</h2></center>
			  <center><img style="position: relative;top: 55px;" width="30%" src="https://hacisouthsudan.org/account/includes/PAYMENTS/img/success.gif" />
              <p style="position: relative;top: 125px;z-index:999999;position: relative;" >Registration has been success . Thank you for joining us from LaraCream Sdn. Bhd.<br>
			  <div style="position: relative;top: 125px;z-index:999999;position: relative;" class="text-center"><a class="btn" href="signin.php">Sign In <i style="font-size:18px;" class="bx bx-door-open"></i></a></div>
			  <br><br><br><br><br><br>
            </form>
          </div>

        </div>

      </div>
    </section>
	
<?php
	}
	else if($data['userStatus'] == 'Verified'){

	$sqlVerify = "UPDATE customer SET userStatus = 'Verified' WHERE userActivationCode = '".$_GET['activation_code']."'";
	$queryVerify = mysqli_query($dbconn, $sqlVerify);

?>

	<!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row" style="justify-content: center;" >
          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <form action="index.php" method="post" class="php-email-form">
			  <br><center><h2 style="z-index:999999;position: relative;" >Verification Expired!</h2></center>
			  <center><img style="position: relative;top: 55px;" width="30%" src="https://media2.giphy.com/media/3og0IvGtnDyPHCRaYU/giphy.gif" />
              <p style="position: relative;top: 125px;z-index:999999;position: relative;" >The entered activation link had expired. Please contact LaraCream Staff to acquire a approval or register a new account. Thank You<br>
			  <div style="position: relative;top: 125px;z-index:999999;position: relative;" class="text-center"><a class="btn" href="signup.php">Sign Up <i style="font-size:18px;" class="bx bx-door-open"></i></a></div>
			  <br><br><br><br><br><br>
            </form>
          </div>

        </div>

      </div>
    </section>
	
<?php } ?>

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Moderna</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>