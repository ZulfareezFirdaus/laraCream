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
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
  <!-- Jquery Link -->
  <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  
  <!-- Notification File -->
  <link rel="stylesheet" href="assets/notification/style.css">
  <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
  <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

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
			<li><a href="signin.php"><i style="font-size:22px;position:relative;top:-3px;" class="bx bx-door-open"></i></a></li>
		  <?php } ?>
		  
        </ul>
      </nav>
    </div>
  </header>

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="align-items-center">
          <h2>Edit Password</h2>
        </div>
      </div>
    </section>
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row" style="justify-content: center;" >
          <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <form method="post" role="form" class="php-email-form">
				<br><center><h2>Edit Password Form</h2></center><br><br>
              <div class="row">
				<span>Current Password : </span>
                <div class="col-md-12 form-group">
                  <input type="password" name="currPassword" id="currPassword" class="form-control" placeholder="Enter your current Password"  data-msg="Please enter your current password"  />
				  <div class="validate"></div>
                </div><br><br>
              </div>
			  <div class="row">
				<span>New Password : </span>
                <div class="col-md-12 form-group">
                  <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Enter your new Password"  data-msg="Please enter your new password"  />
                  <div class="validate"></div>
                </div><br><br>
              </div>
			  <div class="row">
				<span>Confirm Password : </span>
                <div class="col-md-12 form-group">
                  <input type="password" name="confPassword" id="confPassword" class="form-control" placeholder="Enter your confirm Password"  data-msg="Please enter your confirm password"  />
                  <div class="validate"></div>
                </div><br><br>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="sent-message">Update Successfully. Thank you!</div>
				<div class="registered">Email is already registered! Please Login</div>
				<div class="not-match">Update Not Successfully. Please Try Again!</div>
				<div class="database-error">Database Error, Please Contact the Developer!. </div>
              </div><br>
              <div class="text-center"><button type="submit" class="btn" id="signup">Sign Up <i style="font-size:18px;" class="bx bx-lock"></i></button></div>
			  <br><br>
            </form>
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
  
  <script>
$(document).ready(function(){
 $('#signup').click(function(){
  var currPassword = $('#currPassword').val();
  var newPassword = $('#newPassword').val();
  var confPassword = $('#confPassword').val();
  
	if(newPassword == confPassword)
	{
	   $.ajax({
		url:"updatePassword.php",
		method:"POST",
		dataType:"json",
		data:{currPassword:currPassword,newPassword:newPassword},
		beforeSend:function(){
		 $('#signup').val("connecting...");
		},
		success:function(data)
		{
			if(data == 'Yes')  
			{  
				$('#confPassword').val('');
				$('#newPassword').val('');
				$('#currPassword').val('');
				swal("Success!", "Password successfully change!", "success");	
			}
			else if(data == 'No'){
				$('.not-match').show();
			}
			else if(data == 'Failed'){
				swal("False!", "Wrong current password, Please try again!", "error");
			}
		}
	   });
	}
	else{
		swal("False!", "Password is not match, Please try again!", "error");
	}
  
 });
});
</script>

</body>

</html>