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

<body style="background: url(https://lh3.googleusercontent.com/proxy/uit7d5GM23qxTFin50nfFbU6AyYd_GWBQ8Tev_4XqklkNmBTlZ6HxtBaOFVSlzhRl0YmIfJg3KCxDaqLUz0qgfndtplRJVVQyOfpH4OX-BTzBtLUbceM9BSLJ56sE4KP);">
<?php

    echo'
	  <script>

		  
		  $(window).load(function(){
		  $(document).ready(function () {
			  swal({
				title: "Are you sure?",
				text: "Are you sure you want to signout?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes!",
				cancelButtonText: "No!",
				closeOnConfirm: false,
				closeOnCancel: false
				},
				function(isConfirm){
				if (isConfirm){ 
					window.location = "Signout_process.php";
				} else {
				  setTimeout(function() {
					swal({
						title: "Cancelled",
						text: "Happy Shopping :)",
						type: "error"
					}, function() {
						window.location = "javascript:history.go(-1)";
					});
				}, 1000);
				}
				});
			  });
			});
		 
	  </script>
	  ';
?>
</body>

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