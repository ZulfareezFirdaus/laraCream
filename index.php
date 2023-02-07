<?php 

session_start();
include('dbconn.php');

unset($_SESSION["shopping_cart"]);
unset($_SESSION["flavID"]);
unset($_SESSION["cupprice"]);
unset($_SESSION["cupsize"]);
unset($_SESSION["totalPrice"]);
unset($_SESSION["grandTotal"]);
unset($_SESSION["paymenttype"]);

date_default_timezone_set("Asia/Kuala_Lumpur");
$autoDateTime = date('d/m/Y H:i:A');
$dateOnly = date('Y-m-d');
$Y = date('Y');
$D = date('d');

if(isset($_SESSION['custEmail'])){
	$sql = "SELECT * FROM customer WHERE custEmail = '".$_SESSION['custEmail']."'";
	$query = mysqli_query($dbconn, $sql);
	$data = mysqli_fetch_assoc($query);

	$words = explode(" ", $data['custName']);
	$name = $words[0];
}

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>LaraCream Cafe</title>
  
  <!-- Logo -->
  <link href="assets/imgs/logo2.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Roboto:300,300i,400,400i,500,500i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  
  <!-- CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
  <div class="topnav">
	<a href="contact.php" class="left" ><i class="fas fa-phone" ></i> Help Centre</a>
	<a href="index.php" class="center" ><i class="fas fa-ice-cream" ></i> LaraCream</a>
	<a class="right" ><i class="fas fa-calendar-alt" ></i>&nbsp;<?php echo $D.' '.date("F", strtotime($dateOnly)).' '.$Y; ?></a>
  </div>
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><img width="13%" src="assets/imgs/logo2.png" />&nbsp;<span class="title" >LaraCream</span></a></h1>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
		  <li class="drop-down"><a href="#">Products</a>
            <ul>
              <li class="drop-down"><a href="#">Flavors</a>
                <ul>
				 <?php 

					$sqlFlavor = "SELECT * FROM flavor"; 
					$queryFlavor = mysqli_query($dbconn,$sqlFlavor);
					while($dataFlavor = mysqli_fetch_array($queryFlavor))
					{					

				?>
				  <li><a href="flavor-view.php"><?php echo $dataFlavor['flavorName'] ?></a></li>
				<?php } ?>
                </ul>
              </li>
              <li class="drop-down"><a href="#">Toppings</a>
                <ul>
                  <?php 

					$sqlTopping = "SELECT * FROM topping"; 
					$queryTopping = mysqli_query($dbconn,$sqlTopping);
					while($dataTopping = mysqli_fetch_array($queryTopping))
					{					

				?>
				  <li><a href="topping-view.php"><?php echo $dataTopping['toppingName'] ?></a></li>
				<?php } ?>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="contact.php">Contact Us</a></li>
		  <?php if(isset($_SESSION['custEmail'])){ ?>
			<li class="drop-down" ><a href="#"><i style="font-size:22px;position:relative;top:-3px;" class="bx bx-shopping-bag"></i></a>
				<ul style="left: -135px;width: 315px;">
					<li>
					<center>
					<br><br><br>
					<img width="40%" src="https://icons.iconarchive.com/icons/graphicloads/colorful-long-shadow/256/Cart-add-icon.png" />
					<br><br>
					<h4 class="title" style="color:#e12323;">Cart is still empty! <br> Buy an ice cream Now!</h4>
					</center><br><br><br><br>
					</li>
				</ul>
			</li>
			<li class="drop-down"><a href="#"><i style="font-size:22px;position:relative;top:-3px;" class="bx bx-user"></i> <font style="position:relative;top:-6px;">Hye, <?php echo $name ?></font></a>
				<ul>
					<li><a href="editpassword.php"><i class="bx bx-lock"></i> Edit Password</a></li>
					<li><a href="editprofile.php"><i class="bx bx-user"></i> Edit Profile</a></li>
					<li><a href="signout.php"><i class="bx bx-log-out"></i> Sign Out</a></li>
				</ul>
			</li>
		  <?php }else{ ?>
			<li class="drop-down" ><a href="#"><i style="font-size:22px;position:relative;top:-3px;" class="bx bx-shopping-bag"></i></a>
				<ul style="left: -135px;width: 315px;">
					<li>
					<center>
					<br><br><br>
					<img width="40%" src="https://icons.iconarchive.com/icons/graphicloads/colorful-long-shadow/256/Cart-add-icon.png" />
					<br><br>
					<h4 class="title" style="color:#e12323;">Cart is still empty! <br> Buy an ice cream Now!</h4>
					</center><br><br><br><br>
					</li>
				</ul>
			</li>
			<li class="drop-down" ><a href="#"><i style="font-size:22px;position:relative;top:-3px;" class="bx bx-door-open"></i></a>
            <ul>
                <li><a href="signin.php"><i class="bx bx-lock"></i> Log In</a></li>
                <li><a href="signup.php"><i class="bx bx-lock"></i> Register New</a></li>
            </ul>
            </li>
		  <?php } ?>
		  
        </ul>
      </nav>
    </div>
  </header>
  
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-item active">
		  <div class="row">
			  <div class="col-md-6 col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
				<div class="carousel-container">
				  <h1 class="animate__animated animate__fadeInDown">Homemade <br> ice creams<br> created with <br> <font color="#e12323">Love & Fun !</font></h1>
				  <div class="row" style="position:relative;left:-35px;">
					<div class="col-6 col-md-6 col-lg-6" data-aos="fade-up">
						<a href="cup_size.php" class="btn-get-purchase animate__animated animate__fadeInUp">Order Now&nbsp;<i class="fab fa-opencart"></i></a>&nbsp;&nbsp;
					</div>
					<div class="col-6 col-md-6 col-lg-6" data-aos="fade-up">
						<a href="explore.php" class="btn-get-started animate__animated animate__fadeInUp">Explore&nbsp;More&nbsp;<i class="fab fa-opencart"></i></a>
					</div>
				  </div>
				</div>
			   </div>
			   
			   <div class="col-md-6 col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
				<div class="carousel-container">
				  <div class="animate__animated animate__fadeInDown" style="background:#ffa5ba;border-radius: 50%;    width: 75%;height: 84%;">
					<img width="110%" src="assets/imgs/bg-11.png" />
				  </div>
				</div>
			   </div>
		  </div>
	  </div>
	</div>
  </section>

  <main id="main">
    <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="fas fa-ice-cream" ></i></div>
              <h4 class="title"><a href="">CREATIVE</a></h4>
              <p class="description">AWE-INSPIRING CREATIVE & LOCAL FLAVOURS</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="fas fa-ice-cream" ></i></div>
              <h4 class="title"><a href="">QUALITY</a></h4>
              <p class="description">HIGH QUALITY INGREDIENTS</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="fas fa-ice-cream" ></i></div>
              <h4 class="title"><a href="">SMOOTH</a></h4>
              <p class="description">SMOOTH & CREAMY TEXTURE</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="fas fa-ice-cream" ></i></div>
              <h4 class="title"><a href="">TRADITIONAL</a></h4>
              <p class="description">NO ADDED ARTIFICIAL FLAVOURINGS & PRESERVATIVES</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box"><br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NUYXk1Dmo60" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="fas fa-ice-cream"></i></div>
              <h4 class="title"><a href="">WHAT DO WE DO?</a></h4>
              <p class="description">We take our ice cream very seriously here, we make all the ice cream bases and mix-ins from scratch in our kitchen - be it cooking apples, tempering chocolate or zesting oranges. </p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">JOIN #TEAMLARACREAM</a></h4>
              <p class="description">Join us Now! for more suprise and happy :).</p>
            </div>

          </div>
        </div>

      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Let's Be Friends</h4>
            <p>Get the LaraCream on new flavours and exclusive offers!</p>
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
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Product</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cup Size</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Flavors</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Toppings</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              UiTM Shah Alam <br>
              Branch Selangor<br>
              Malaysia <br><br>
              <strong>Phone:</strong> +03 554 6789<br>
              <strong>Email:</strong> customerservice @laracream.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About LaraCream</h3>
            <p>We take our ice cream very seriously here, we make all the ice cream bases and mix-ins from scratch in our kitchen - be it cooking apples, tempering chocolate or zesting oranges.</p>
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
        &copy; Copyright <strong><span>LaraCream</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- JS Files -->
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
  <script src="assets/js/main.js"></script>
  <script src="assets/js/typewriter.js"></script>

</body>

</html>