
 
<?php  
  
 session_start();  
 include('dbconn.php');
 if(isset($_POST["product_id"]))  
 {  
      $order_table = '';  
      $message = '';	  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["shopping_cart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                {  
                     if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                     {  
                          $is_available++; 
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'product_id'               =>     $_POST["product_id"], 
                          'product_name'               =>     $_POST["product_name"],
						  'product_image'               =>     $_POST["product_image"], 
						  'totalPrice'               =>     $_POST["totalPrice"],						  
                          'product_price'               =>     $_POST["product_price"] 
                     );  
                     $_SESSION["shopping_cart"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'product_id'               =>     $_POST["product_id"],  
                     'product_name'               =>     $_POST["product_name"],
					 'product_image'               =>     $_POST["product_image"],
					 'totalPrice'               =>     $_POST["totalPrice"],					 
                     'product_price'               =>     $_POST["product_price"] 
                );  
                $_SESSION["shopping_cart"][] = $item_array;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["product_id"] == $_POST["product_id"])  
                {  
					if(isset($_SESSION['totalPrice'])){
						$_SESSION['totalPrice'] = $_SESSION['totalPrice'] - $values["product_price"];
					}
                     unset($_SESSION["shopping_cart"][$keys]); 				 
                      
                }  
           }  
      } 
	
      if(!empty($_SESSION["shopping_cart"]))  
      {  	
		   $totalPrice = 0;
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= '
					<div class="product" >				
					<div class="product-image">
					  <img src="'.$values["product_image"].'">
					</div>
					<div class="product-details">
					  <div class="product-title">'.$values["product_name"].'</div>
					</div>
					<div class="product-price mt">'.$values["product_price"].'</div>
					<div class="product-line-price mt">'.$values["product_price"].'</div>
					<div class="product-removal ">
					  <button class="remove-product delete" style="position:relative;right:4px;" id="'.$values["product_id"].'">
						<i class="fas fa-times"></i>
					  </button>
					</div>	
					</div>						
                ';  
				
				if($totalPrice > 0){
					$totalPrice = $totalPrice + $values["product_price"];
				}
				else{
					$totalPrice = $totalPrice + $values["totalPrice"] + $values["product_price"];
				}
           } 
      }
	  else{
		  $totalPrice = $values["totalPrice"];
	  }

	   $order_table .= '
	   
	   ';	  
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shopping_cart"])  
      );  
      echo json_encode($output);  
 }
else{
 echo'<script>alert("Error");  </script>';
}	
 ?>
 
