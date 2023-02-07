
 
<?php  
  
 session_start();  
 include('dbconn.php');
   
	$order_table = '';  	 
  
	if(isset($_SESSION['flavorPrice'])){
		$newtotal = $_SESSION['totalPrice'] - $_SESSION['flavorPrice'];
		$_SESSION['totalPrice'] = $newtotal + $_POST['flavorPrice'];
	}
	else{
		$newtotal = $_SESSION['totalPrice'] - $_POST['flavorPriceOld'];
		$_SESSION['totalPrice'] = $newtotal + $_POST['flavorPrice'];
	}
	
	$_SESSION['flavorPrice'] = $_POST['flavorPrice'];
	$_SESSION['flavorID'] = $_POST['flavorID'];
	
	
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
	
	 $order_table .= '
	  <div class="product">
		<div class="product-image">
		  <img src="'.$data['flavorImg'].'">
		</div>
		<div class="product-details">
		  <div class="product-title">'.$data['flavorName'].'</div>
		</div>
		<div class="product-price mt">'.$data['flavorPrice'].'</div>
		<div class="product-line-price mt">'.$data['flavorPrice'].'</div>
		<div class="product-removal ">
		  <a href="#open-modal-flavor" class="change-product">
			<i class="fas fa-pen"></i>
		  </a>
		</div>
	  </div>						
	';   
 
  
      echo json_encode($order_table);  
	
 ?>
 
