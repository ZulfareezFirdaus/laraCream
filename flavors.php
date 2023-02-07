<?php 

session_start();
include('dbconn.php');

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

$sql = "SELECT * FROM flavor";
$query = mysqli_query($dbconn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LaraCream Cafe</title>

  <!-- Icon -->
  <link href="assets/imgs/logo2.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  
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
		  <li class="drop-down"><a href="">Products</a>
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
				<ul style="left: -135px;width: 315px;padding:25px;">
					<li style="position: relative;top: -55px;" >
					<center>
					<br><br><br>
					<center><div class="card-titles" ><i class="fas fa-shopping-bag"></i> Shopping Cart</div></center>
					<hr style="border:1px solid #e12323;"></hr>
					<br>
					<table>
						<tr>
							<td width="15%" ><img width="100%" src="assets/imgs/medium_size.png" /></td>
							<td style="color:black;text-align:right"><?php echo $_POST['cupsize'] ?> Size</td>
							<td style="color:black;text-align:right">RM <?php echo $_POST['cupprice'] ?></td>
						</tr>
					</table>
					<br><br><br><br>
					
					<table width="100%">
					<tr>
					<hr style="border:1px solid black;position:relative;top:15px;"></hr>
						<td style="text-align:left;position:relative;top:3px;color:black;" width="50%"><br>Total Price:</td>
						<td style="text-align:right;font-size:17px;color:black;"><br><b>RM <?php echo $_POST['cupprice'] ?></b></td>
					</tr>
					</table>
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
				<ul style="left: -135px;width: 315px;padding:25px;">
					<li style="position: relative;top: -55px;" >
					<center>
					<br><br><br>
					<center><div class="card-titles" ><i class="fas fa-shopping-bag"></i> Shopping Cart</div></center>
					<hr style="border:1px solid #e12323;"></hr>
					<br>
					<table>
						<tr>
							<td width="15%" ><img width="100%" src="assets/imgs/medium_size.png" /></td>
							<td style="color:black;text-align:right"><?php echo $_POST['cupsize'] ?> Size</td>
							<td style="color:black;text-align:right">RM <?php echo $_POST['cupprice'] ?></td>
						</tr>
					</table>
					<br><br><br><br>
					
					<table width="100%">
					<tr>
					<hr style="border:1px solid black;position:relative;top:15px;"></hr>
						<td style="text-align:left;position:relative;top:3px;color:black;" width="50%"><br>Total Price:</td>
						<td style="text-align:right;font-size:17px;color:black;"><br><b>RM <?php echo $_POST['cupprice'] ?></b></td>
					</tr>
					</table>
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

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="align-items-center">
          <h2>Flavors</h2>
          <h3><a href="home.php" >Home</a> / <a href="cup_size.php" >Cup Size</a> / Flavors</h3>
        </div>
      </div>
    </section>

    <section class="service-details">
      <div class="container">
	  
		<div class="section-title">
		  <h2>Flavors</h2>
		  <p>Three quick decisions will lead you to live an authentic smöoy experience: size, taste and the Flavors that you like; As you see, something simple and very tasty.</p>
		</div>	
		
        <div class="row">
		<div class="col-md-9 col-lg-9 d-flex align-items-stretch" data-aos="fade-up">
			<div class="row">
			<?php while($data = mysqli_fetch_array($query)) { ?>
			  <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
				<div class="card">
				  <div class="card-img">
					<img src="<?php echo $data['flavorImg'] ?>" alt="...">
				  </div>
				  <div class="card-body">
					<h5 class="card-title"><a href="#"><?php echo $data['flavorName'] ?></a></h5>
					<p class="card-text">RM <?php echo $data['flavorPrice'] ?></p>
					<br>
					<form action="toppings.php" method="POST" >
						<input type="hidden" name="flavorPrice" value="<?php echo $data['flavorPrice'] ?>" />
						<input type="hidden" name="flavor" value="<?php echo $data['flavorName'] ?>" />
						<input type="hidden" name="cupsize" value="<?php echo $_POST['cupsize'] ?>" />
						<input type="hidden" name="cupprice" value="<?php echo $_POST['cupprice'] ?>" />
						<button class="get-started-btn">Add to Cart </button>
					</form>
				  </div>
				</div>
			  </div>
			<?php }	?>
			</div>
			</div>
		<div class="col-md-3 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
			<div class="cart-list">
			<center><div class="card-title" ><i class="fas fa-shopping-bag"></i> Shopping Cart</div></center>
			<table style="width:100%">
			  <tr>
				  <tr>
					<th width="30%"><center><img width="65%" src="assets/imgs/small_size.png" alt="..."></center></th>
					<td><b><font color="#e12323">Size :</font></b> <?php echo $_POST['cupsize'] ?> </td>
				  </tr>
			  </tr>
			  <tr>
				  <tr>
					<td style="text-align:left;position:relative;top:3px;" width="50%"><br>Total Price:</td>
					<td style="text-align:right;font-size:17px;"><br><b>RM <?php echo $_POST['cupprice'] ?></b></td>
				  </tr>
			  </tr>
			</table>
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

</body>

</html>