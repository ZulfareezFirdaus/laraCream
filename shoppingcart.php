<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LaraCream Cafe</title>

  <!-- Favicons -->
  <link href="assets/imgs/logo2.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

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


<!-- Notification File -->
<link rel="stylesheet" href="assets/notification/style.css">
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

<?php  

session_start();
include('dbconn.php'); 


if(!isset($_SESSION["paymenttype"])){
	$_SESSION["paymenttype"] = $_POST["paymenttype"];
}

if(!isset($_SESSION["custEmail"])){
	
	$_SESSION["login"] = 'Not';
	header("Location: signin.php");
    exit;
}

	
	$grandTotal = $_SESSION['totalPrice'] + ($_SESSION['totalPrice'] * (6/100));
	
	$sql = "SELECT * FROM customer WHERE custEmail = '".$_SESSION["custEmail"]."'";
	$query = mysqli_query($dbconn, $sql);
	$data = mysqli_fetch_assoc($query);
	


 
	 $insert_order = "  
	 INSERT INTO payment( paymentType, paymentTotal)  
	 VALUES( '".$_SESSION['paymenttype']."','".$grandTotal."')  
	 ";  
	 $paymentID = "";  
	 if(mysqli_query($dbconn, $insert_order))  
	 {  
		  $paymentID = mysqli_insert_id($dbconn);  
	 } 
	 
	 $insert_order = "  
	 INSERT INTO orders(custID, creation_date, flavorID, cupsize,paymentID)  
	 VALUES('".$data['custID']."', '".date('Y-m-d')."','".$_SESSION['flavorID']."','".$_SESSION['cupsize']."','".$paymentID."')  
	 ";  
	 $ordersID = "";  
	 if(mysqli_query($dbconn, $insert_order))  
	 {  
		  $ordersID = mysqli_insert_id($dbconn);  
	 }  
	 $_SESSION["ordersID"] = $ordersID;  
	 $order_details = "";  
	 
	 foreach($_SESSION["shopping_cart"] as $keys => $values)  
	 {  
		  $order_details .= "  
		  INSERT INTO orders_detail(ordersID, toppingID)  
		  VALUES('".$ordersID."', '".$values["product_id"]."');  
		  ";  
	 }  
	 if(mysqli_multi_query($dbconn, $order_details))  
	 {  
		  unset($_SESSION["shopping_cart"]);
		  unset($_SESSION["flavID"]);
		  unset($_SESSION["cupprice"]);
		  unset($_SESSION["cupsize"]);
		  unset($_SESSION["totalPrice"]);
		  unset($_SESSION["grandTotal"]);
		  unset($_SESSION["paymenttype"]);
		  unset($_SESSION["login"]);
		  
		  echo'
		  <script>
		  $(window).load(function(){
		  $(document).ready(function () {
			  setTimeout(function() {
				swal({
					title: "Awesome!",
					text: "Your Payment Was Sucessfull!",
					type: "success"
				}, function() {
					window.location = "success-payment.php";
				});
			}, 1000);
			  });
			});
		  </script>
		  ';  
	 }  
?>  

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