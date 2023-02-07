
 
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
	  $order_table .= '    
	   <td colspan="2" ><b><i><br>Toppings : </i></b><br> 
	   ';
      if(!empty($_SESSION["shopping_cart"]))  
      {  	
		   $totalPrice = 0;
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= '  
						<button name="delete" style="padding: 1px 4px 1px 4px;font-size: 9px;position: relative;top: -3px;" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'" > X</button> '.$values["product_name"].'<br>					 
                ';  
				
				if(isset($_SESSION['totalPrice'])){
					
					if($totalPrice > 0){
						$totalPrice = $_SESSION['totalPrice'];
						$totalPrice = $totalPrice + $values["product_price"];
					}
					else{
						$totalPrice = $_SESSION['totalPrice'] + $values["totalPrice"] + $values["product_price"];
					}
				}
				else{
					if($totalPrice > 0){
						$totalPrice = $totalPrice + $values["product_price"];
					}
					else{
						$totalPrice = $totalPrice + $values["totalPrice"] + $values["product_price"];
					}
				}
           } 
      }
	  else{
		  $totalPrice = $values["totalPrice"];
	  }
	  if(!isset($_SESSION['totalPrice'])){
		$_SESSION['totPrice'] = $totalPrice;
	  }
	  else{
		$_SESSION['totalPrice'] = $totalPrice;
	  }
	   $order_table .= '
	   <br><br><div>Total Price : <b style="font-size:20px;">RM '.number_format($totalPrice, 2).' </b></div>	   
	   </td> 
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
 
