<?php  
  
 session_start();  
 include('dbconn.php');
 
      $order_table = ''; 	  
      if(isset($_POST['cupsizeMa']))  
      {  	
			if(isset($_SESSION['cupprice'])){
				$newtotal = $_SESSION['totalPrice'] - $_SESSION['cupprice'];
				$_SESSION['totalPrice'] = $newtotal + $_POST['cuppriceMa'];
			}
			else{
				$newtotal = $_SESSION['totalPrice'] - $_POST['cuppriceOldMa'];
				$_SESSION['totalPrice'] = $newtotal + $_POST['cuppriceMa'];
			}
			
			
			$_SESSION['cupprice'] = $_POST['cuppriceMa'];
			$_SESSION['cupsize'] = $_POST['cupsizeMa'];
			
           $order_table .= '
				<div class="product">
				<div class="product-image">
				  <img style="width:23%" src="assets/imgs/medium_size.png">
				</div>
				<div class="product-details">
				  <div class="product-title">'.$_POST['cupsizeMa'].'Size</div>
				</div>
				<div class="product-price mt"> '.$_POST['cuppriceMa'].'</div>
				<div class="product-line-price mt"> '.$_POST['cuppriceMa'].'</div>
				<div class="product-removal">
				  <a href="#open-modal-size" class="change-product">
					<i class="fas fa-pen"></i>
				  </a>
				</div>
			  </div>						
			';  
      } 
	else if(isset($_POST['cupsizeMi']))  
      {  
			
			if(isset($_SESSION['cupprice'])){
				$newtotal = $_SESSION['totalPrice'] - $_SESSION['cupprice'];
				$_SESSION['totalPrice'] = $newtotal + $_POST['cuppriceMi'];
			}
			else{
				$newtotal = $_SESSION['totalPrice'] - $_POST['cuppriceOldMi'];
				$_SESSION['totalPrice'] = $newtotal + $_POST['cuppriceMi'];
			}
			
			$_SESSION['cupprice'] = $_POST['cuppriceMi'];
			$_SESSION['cupsize'] = $_POST['cupsizeMi'];
			
           $order_table .= '
				<div class="product">
				<div class="product-image">
				  <img style="width:23%" src="assets/imgs/medium_size.png">
				</div>
				<div class="product-details">
				  <div class="product-title">'.$_POST['cupsizeMi'].'Size</div>
				</div>
				<div class="product-price mt"> '.$_POST['cuppriceMi'].'</div>
				<div class="product-line-price mt"> '.$_POST['cuppriceMi'].'</div>
				<div class="product-removal">
				  <a href="#open-modal-size" class="change-product">
					<i class="fas fa-pen"></i>
				  </a>
				</div>
			  </div>						
			';  
      }
	else if(isset($_POST['cupsizecl']))  
      {  
			if(isset($_SESSION['cupprice'])){
				$newtotal = $_SESSION['totalPrice'] - $_SESSION['cupprice'];
				$_SESSION['totalPrice'] = $newtotal + $_POST['cuppricecl'];
			}
			else{
				$newtotal = $_SESSION['totalPrice'] - $_POST['cuppriceOldcl'];
				$_SESSION['totalPrice'] = $newtotal + $_POST['cuppricecl'];
			}
			
			$_SESSION['cupprice'] = $_POST['cuppricecl'];
			$_SESSION['cupsize'] = $_POST['cupsizecl'];
			
           $order_table .= '
				<div class="product">
				<div class="product-image">
				  <img style="width:23%" src="assets/imgs/medium_size.png">
				</div>
				<div class="product-details">
				  <div class="product-title">'.$_POST['cupsizecl'].'Size</div>
				</div>
				<div class="product-price mt"> '.$_POST['cuppricecl'].'</div>
				<div class="product-line-price mt"> '.$_POST['cuppricecl'].'</div>
				<div class="product-removal">
				  <a href="#open-modal-size" class="change-product">
					<i class="fas fa-pen"></i>
				  </a>
				</div>
			  </div>						
			';  
      }	  
      	  
       
      echo json_encode($order_table);  	
 ?>
 
