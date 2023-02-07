<?php 

session_start();
include('dbconn.php');

date_default_timezone_set("Asia/Kuala_Lumpur");
$autoDateTime = date('d/m/Y H:i:A');
$dateOnly = date('Y-m-d');
$Y = date('Y');
$D = date('d');

if(isset($_SESSION['totPrice'])){
	$_SESSION['totalPrice'] = $_SESSION['totPrice'];
	unset($_SESSION['totPrice']);
}

if(isset($_SESSION['custEmail'])){
	$sql = "SELECT * FROM customer WHERE custEmail = '".$_SESSION['custEmail']."'";
	$query = mysqli_query($dbconn, $sql);
	$data = mysqli_fetch_assoc($query);

	$words = explode(" ", $data['custName']);
	$name = $words[0];
}

$sql3 = "SELECT * FROM flavor WHERE flavorName = '".$_POST['flavor']."' ";
$query3 = mysqli_query($dbconn, $sql3);
$data3 = mysqli_fetch_assoc($query3);

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
  
  <!-- Jquery File -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  
  <!-- Modal File -->
  <link rel="stylesheet" href="assets/modal/style.css">
  
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
				<ul style="left: -135px;width: 315px;padding:25px;">
					<li style="position: relative;top: -55px;" >
					<center>
					<br><br><br>
					<center><div class="card-titles" ><i class="fas fa-shopping-bag"></i> Shopping Cart</div></center>
					<hr style="border:1px solid #e12323;"></hr>
					<br>
					<table>
						<tr>
							<td width="15%" ><img style="position:relative;top:-5px;" width="80%" src="assets/imgs/medium_size.png" /></td>
							<td style="color:black;text-align:right"><?php echo $_POST['cupsize'] ?> Size</td>
							<td style="color:black;text-align:right">RM <?php echo $_POST['cupprice'] ?></td>
						</tr>
						<tr>
							<td width="80%" ><img width="100%" src="<?php echo $data3['flavorImg'] ?>" /></td>
							<td style="color:black;text-align:right"><?php echo $_POST['flavor'] ?> </td>
							<td style="color:black;text-align:right">RM <?php echo $_POST['flavorPrice'] ?></td>
						</tr>
						<?php  
						if(!empty($_SESSION["shopping_cart"]))  
						{  
							 $total = 0;  
							 foreach($_SESSION["shopping_cart"] as $keys => $values)  
							 {                                               
						?>
						<tr>
							<td width="80%" ><img width="100%" src="<?php echo $values["product_image"] ?>" /></td>
							<td style="color:black;text-align:right"><?php echo $values["product_name"] ?> </td>
							<td style="color:black;text-align:right">RM <?php echo $values["product_price"] ?></td>
						</tr>
						<?php }} ?>
					</table>
					<br><br><br><br>
					
					<table width="100%">
					<tr>
					<hr style="border:1px solid black;position:relative;top:15px;"></hr>
						<td style="text-align:left;position:relative;top:3px;color:black;" width="50%"><br>Total Price:</td>
						<td style="text-align:right;font-size:17px;color:black;"><br><b>RM 
						<?php 
						  if(isset($_SESSION['totalPrice'])){
							echo number_format($_SESSION['totalPrice'], 2); 
						  }
						  else{
							  echo number_format($totalPrice, 2);
						  }
						  
						?>
						</b></td>
					</tr>
					</table>
					</center><br><br>
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
							<td width="15%" ><img style="position:relative;top:-5px;" width="80%" src="assets/imgs/medium_size.png" /></td>
							<td style="color:black;text-align:right"><?php echo $_POST['cupsize'] ?> Size</td>
							<td style="color:black;text-align:right">RM <?php echo $_POST['cupprice'] ?></td>
						</tr>
						<tr>
							<td width="80%" ><img width="100%" src="<?php echo $data3['flavorImg'] ?>" /></td>
							<td style="color:black;text-align:right"><?php echo $_POST['flavor'] ?> </td>
							<td style="color:black;text-align:right">RM <?php echo $_POST['flavorPrice'] ?></td>
						</tr>
						<?php  
						if(!empty($_SESSION["shopping_cart"]))  
						{  
							 $total = 0;  
							 foreach($_SESSION["shopping_cart"] as $keys => $values)  
							 {                                               
						?>
						<tr>
							<td width="80%" ><img width="100%" src="<?php echo $values["product_image"] ?>" /></td>
							<td style="color:black;text-align:right"><?php echo $values["product_name"] ?> </td>
							<td style="color:black;text-align:right">RM <?php echo $values["product_price"] ?></td>
						</tr>
						<?php }} ?>
					</table>
					<br><br><br><br>
					
					<table width="100%">
					<tr>
					<hr style="border:1px solid black;position:relative;top:15px;"></hr>
						<td style="text-align:left;position:relative;top:3px;color:black;" width="50%"><br>Total Price:</td>
						<td style="text-align:right;font-size:17px;color:black;"><br><b>RM 
						<?php 
						  if(isset($_SESSION['totalPrice'])){
							echo number_format($_SESSION['totalPrice'], 2); 
						  }
						  else{
							  echo number_format($totalPrice, 2);
						  }
						  
						?>
						</b></td>
					</tr>
					</table>
					</center><br><br>
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
 
	<div id="open-modal-size" class="modal-window">
	  <div>
		<a href="#close" title="Close" class="modal-close">Close</a>
		<section style="background: none;" class="pricing section-bg" data-aos="fade-up">
		  <div class="container">

			<div class="row no-gutters" style="margin-top: -90px;">
			  <div class="col-lg-4 box" style="box-shadow:none">
				<h3>Mini</h3>
				<img width="30%" src="assets/imgs/small_size.png" />
				<ul>
				  <li><br></li>
				  <li><i class="bx bx-check"></i> RM 10.00</li>
				  <li class="na"><i class="bx bx-x"></i> No Free Topping</li>
				  <li class="na"><i class="bx bx-x"></i> No Free Sauce</li>
				</ul>
				<form >
					<input type="hidden" name="cuppriceOldMi" id="cuppriceOldMi" value="<?php echo $_POST['cupprice'] ?>" />
					<input type="hidden" name="cupsizeMi" id="cupsizeMi" value="Mini" />
					<input type="hidden" name="cuppriceMi" id="cuppriceMi" value="10.00" />
					<button type="button" class="get-started-btn add_to_cartMi">Add to Cart</button>
				</form>
			  </div>

			  <div class="col-lg-4 box featured" style="box-shadow:none">
				<h3>Maxi</h3>
				<img width="30%" src="assets/imgs/large_size.png" />
				<ul>
				  <li><br></li>
				  <li><i class="bx bx-check"></i> RM 20.00</li>
				  <li><i class="bx bx-check"></i> Free 1 Topping</li>
				  <li><i class="bx bx-check"></i> Free 1 Sauce</li>
				</ul>
				<form >
					<input type="hidden" name="cuppriceOldMa" id="cuppriceOldMa" value="<?php echo $_POST['cupprice'] ?>" />
					<input type="hidden" name="cupsizeMa" id="cupsizeMa" value="Maxi" />
					<input type="hidden" name="cuppriceMa" id="cuppriceMa" value="20.00" />
					<button type="button" class="get-started-btn add_to_cartMa">Add to Cart</button>
				</form>
			  </div>

			  <div class="col-lg-4 box" style="box-shadow:none">
				<h3>Classic</h3>
				<img width="30%" src="assets/imgs/medium_size.png" />
				<ul>
				  <li><br></li>
				  <li><i class="bx bx-check"></i> RM 15.00</li>
				  <li><i class="bx bx-check"></i> Free 1 Topping</li>
				  <li class="na"><i class="bx bx-x"></i> No Free Sauce</li>
				</ul>
				<form  >
					<input type="hidden" name="cuppriceOldcl" id="cuppriceOldcl" value="<?php echo $_POST['cupprice'] ?>" />
					<input type="hidden" name="cupsizecl" id="cupsizecl" value="Classic" />
					<input type="hidden" name="cuppricecl" id="cuppricecl" value="15.00" />
					<button type="button" class="get-started-btn add_to_cartcl">Add to Cart</button>
				</form>
			  </div>

			</div>

		  </div>
		</section>
	  </div>
	</div>

	<div id="open-modal-flavor" class="modal-window">
	  <div style="overflow-y: auto;">
		<a href="#close" title="Close" class="modal-close">Close</a>
			<section class="service-details">
				<div class="container">
					<div class="row">
					<?php 
					$sql2 = "SELECT * FROM flavor ";
					$query2 = mysqli_query($dbconn, $sql2);
					while($data2 = mysqli_fetch_array($query2)) { ?>
					  <div class="col-md-4 d-flex align-items-stretch">
						<div class="card">
						  <div class="card-img">
							<img src="<?php echo $data2['flavorImg'] ?>" alt="...">
						  </div>
						  <div class="card-body">
							<h5 class="card-title"><a href="#"><?php echo $data2['flavorName'] ?></a></h5>
							<p class="card-text">RM <?php echo $data2['flavorPrice'] ?></p>
							<div class="read-more"><a href="toppings-detail.php" title="Portfolio Details"><i class="icofont-arrow-right"></i> Read More</a></div>
							<br>
							<form >
								<input type="hidden" name="flavorPriceOld" id="flavorPriceOld" value="<?php echo $_POST['flavorPrice'] ?>" />
								<input type="hidden" name="flavorPrice" id="flavorPrice<?php echo $data2["flavorID"]; ?>" value="<?php echo $data2['flavorPrice'] ?>" />
								<button type="button" class="get-started-btn add_flavor" name="add_flavor" id="<?php echo $data2["flavorID"]; ?>">Add to Cart </button>
							</form>
						  </div>
						</div>
					  </div>
					<?php }	?>
					</div>
				</div>
			</section>
	  </div>
	</div>

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="align-items-center">
          <h2>Shopping Cart</h2>
          <h3><a href="home.php" >Home</a> / <a href="cup_size.php" >Cup Size</a> / <a href="flavors.php" >Flavors</a> / <a href="toppings.php" >Toppings</a> / Shopping Cart</h3>
        </div>
      </div>
    </section>
	
    <section class="service-details">
      <div class="container">
	  
		<div class="section-title">
		  <h2>Shopping Cart</h2>
		  <p>Three quick decisions will lead you to live an authentic smöoy experience: size, taste and the toppings that you like; As you see, something simple and very tasty.</p>
		</div>	
		
        <div class="row">
          <div class="col-md-12" data-aos="fade-up">
				<div class="shopping-cart">
				  <div class="column-labels">
					<label class="product-image">Image</label>
					<label class="product-details">Product</label>
					<label class="product-price">Price</label>
					<label class="product-line-price">Total</label>
					<label class="product-removal">Remove</label>
				  </div>
				  <div id="cup_table" >
				  
					  <div class="product" >
						<div class="product-image">
						  <img style="width:23%" src="assets/imgs/medium_size.png">
						</div>
						<div class="product-details">
						  <div class="product-title">
						  <?php
							  if(isset($_SESSION['cupsize'])){
								echo $_SESSION['cupsize'] ;
							  }
							  else{
								echo $_POST['cupsize']; 
							  }
						  ?>
						  Size</div>
						</div>
						<div class="product-price mt"> 
						  <?php
							  if(isset($_SESSION['cupprice'])){
								echo $_SESSION['cupprice'] ;
							  }
							  else{
								echo $_POST['cupprice']; 
							  }
						  ?>
						  </div>
						<div class="product-line-price mt">
						  <?php
							  if(isset($_SESSION['cupprice'])){
								echo $_SESSION['cupprice'] ;
							  }
							  else{
								echo $_POST['cupprice']; 
							  }
						  ?></div>
						<div class="product-removal">
						  <a href="#open-modal-size" class="change-product">
							<i class="fas fa-pen"></i>
						  </a>
						</div>
					  </div>
				  </div>
				  
				  <div id="flav_table" >
						<?php
						
							if(isset($_SESSION['flavorID'])){
								$sql = "SELECT * FROM flavor WHERE flavorID = '".$_SESSION['flavorID']."' ";
								$query = mysqli_query($dbconn, $sql);
								$data = mysqli_fetch_assoc($query);
								
								
							}
							else{
								$sql = "SELECT * FROM flavor WHERE flavorName = '".$_POST['flavor']."' ";
								$query = mysqli_query($dbconn, $sql);
								$data = mysqli_fetch_assoc($query);
								
								
							}
						
						?>
					  <div class="product">
						<div class="product-image">
						  <img src="<?php echo $data['flavorImg'] ?>">
						</div>
						<div class="product-details">
						  <div class="product-title"><?php echo $data['flavorName'] ?></div>
						</div>
						<div class="product-price mt"> <?php echo $data['flavorPrice'] ?></div>
						<div class="product-line-price mt"> <?php echo $data['flavorPrice'] ?></div>
						<div class="product-removal">
						  <a href="#open-modal-flavor" class="change-product">
							<i class="fas fa-pen"></i>
						  </a>
						</div>
					  </div>
				  </div>
				  
				  <div id="order_table" >
				  <?php  
						if(!empty($_SESSION["shopping_cart"]))  
						{  
							 $total = 0;  
							 foreach($_SESSION["shopping_cart"] as $keys => $values)  
							 {                                               
			      ?>  
						<div class="product">
							<div class="product-image">
							  <img src="<?php echo $values["product_image"] ?>">
							</div>
							<div class="product-details">
							  <div class="product-title"><?php echo $values["product_name"] ?></div>
							</div>
							<div class="product-price mt"> <?php echo $values["product_price"] ?></div>
							<div class="product-line-price mt"> <?php echo $values["product_price"] ?></div>
							<div class="product-removal ">
							  <button class="remove-product delete" style="position:relative;right:4px;" id="<?php echo $values["product_id"]?>">
								<i class="fas fa-times"></i>
							  </button>
							</div>
						</div>
				  <?php  
						 }  
					}
				  ?>
				  </div>
				  
				  <div id="payment">
					  <div class="totals" style="position: relative;left: -115px;">
						<div class="totals-item">
						  <label>Subtotal</label>
						  <div class="totals-value" id="cart-subtotal"> <?php echo number_format($_SESSION['totalPrice'], 2) ?></div>
						</div>
						<div class="totals-item">
						  <label>SST (6%)</label>
						  <div class="totals-value" id="cart-tax"> 
						  <?php 
						  $tax = $_SESSION['totalPrice'] * (6/100);
						  echo number_format($tax, 2);
						  
						  ?></div>
						</div>
						<div class="totals-item totals-item-total">
						  <label>Grand Total</label>
						  <div class="totals-value" id="cart-total"> 
						  <?php 
						  
						  $grandTotal = $_SESSION['totalPrice'] + ($_SESSION['totalPrice'] * (6/100));
						  echo number_format($grandTotal, 2);
						  
						  ?></div>
						</div>
					  </div> 
				  </div> 				  
				  
				  <form action="payment.php" method="POST" style="position: relative;left: -110px;" >
					  <input type="hidden" name="flavorID" value="<?php echo $data['flavorID'] ?>" />
					  <input type="hidden" name="cupsize" value="<?php echo $_POST['cupsize'] ?>" />
					  <input type="hidden" name="cupprice" value="<?php echo $_POST['cupprice'] ?>" />
					  <input type="hidden" name="place_order" value="0" />
					  <button class="continue">Continue Payment</button>
				  </form>
				  <form action="toppings.php" method="POST" style="position: relative;left: -115px;" >
					  <input type="hidden" name="flavor" value="<?php echo $_POST['flavor'] ?>" />
					  <input type="hidden" name="cupsize" value="<?php echo $_POST['cupsize'] ?>" />
					  <input type="hidden" name="cupprice" value="<?php echo $_POST['cupprice'] ?>" />
					  <button class="addtop">Add Topping</button>
				  </form>
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
  <script src="assets/js/main.js"></script>
  
  <script>  
	 $(document).ready(function(data){
			$('.add_to_cartMa').click(function(){  
			   var cupsizeMa = $('#cupsizeMa').val();  
			   var cuppriceMa = $('#cuppriceMa').val();
			   var cuppriceOldMa = $('#cuppriceOldMa').val();
			   var action = "addMa";
				$.ajax({  
					 url:"addcart_process.php",  
					 method:"POST",  
					 dataType:"json",  
					 data:{  
						  cupsizeMa:cupsizeMa,   
						  cuppriceMa:cuppriceMa,
						  cuppriceOldMa:cuppriceOldMa,
						  action:action  
					 },  
					 success:function(data)  
					 {  
						  $("#cup_table").load(" #cup_table");	
						  $("#payment").load(" #payment");						  
						  $('.badge').text(data.cart_item);  
						  $('.notification-container').show();
						  swal("Success!", "Product has been Added into Cart!", "success"); 						  
					 }  
					});
				});
				$('.add_to_cartMi').click(function(){  
				   var cupsizeMi = $('#cupsizeMi').val();  
				   var cuppriceMi = $('#cuppriceMi').val();
				   var cuppriceOldMi = $('#cuppriceOldMi').val();
				   var action = "addMi";
					$.ajax({  
						 url:"addcart_process.php",  
						 method:"POST",  
						 dataType:"json",  
						 data:{  
							  cupsizeMi:cupsizeMi,   
							  cuppriceMi:cuppriceMi,
							  cuppriceOldMi:cuppriceOldMi,
							  action:action  
						 },  
						 success:function(data)  
						 {  
							  $("#cup_table").load(" #cup_table");
							  $("#payment").load(" #payment");							  
							  $('.badge').text(data.cart_item);  
							  $('.notification-container').show(); 	
							  swal("Success!", "Product has been Added into Cart!", "success");
						 }  
					});
				});
				$('.add_to_cartcl').click(function(){  
				   var cupsizecl = $('#cupsizecl').val();  
				   var cuppricecl = $('#cuppricecl').val();
				   var cuppriceOldcl = $('#cuppriceOldcl').val();
				   var action = "addcl";
					$.ajax({  
						 url:"addcart_process.php",  
						 method:"POST",  
						 dataType:"json",  
						 data:{  
							  cupsizecl:cupsizecl,   
							  cuppricecl:cuppricecl,
							  cuppriceOldcl:cuppriceOldcl,
							  action:action  
						 },  
						 success:function(data)  
						 {  
							  $("#cup_table").load(" #cup_table");
							  $("#payment").load(" #payment");							  
							  $('.badge').text(data.cart_item);  
							  $('.notification-container').show(); 
							  swal("Success!", "Product has been Added into Cart!", "success");
						 }  
					});
				});	

			$('.add_flavor').click(function(){  
			   var flavorID = $(this).attr("id");
			   var flavorPrice = $('#flavorPrice'+flavorID).val();
			   var flavorPriceOld = $('#flavorPriceOld').val();
			   var action = "add";
				$.ajax({  
					 url:"addflav_process.php",  
					 method:"POST",  
					 dataType:"json",  
					 data:{  
						  flavorID:flavorID,
						  flavorPrice:flavorPrice,
						  flavorPriceOld:flavorPriceOld,
						  action:action  
					 },  
					 success:function(data)  
					 {  	
					      $("#flav_table").load(" #flav_table");
						  $("#payment").load(" #payment");
						  swal("Success!", "Product has been Added into Cart!", "success");						  
					 }  
					});
				});				
			$(document).on('click', '.delete', function(){  
           var product_id = $(this).attr("id");
		   var product_price = $('#price'+product_id).val(); 		   
           var action = "remove";  
			swal({
				title: "Are you sure?",
				text: "Are you sure you want to remove this product?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Yes, remove it!',
				cancelButtonText: "No, cancel it!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			if (isConfirm){
			  $.ajax({  
                     url:"cart_process.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id,product_price:product_price, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);
						  $("#payment").load(" #payment");
						  swal("Removed!", "Your product has been removed!", "success"); 						  
                     }  
                });
			} else {
			  swal("Cancelled", "Your product is safe in the cart :)", "error");
			}
			});		   
      });  
	 });  
	 </script>

</body>

</html>