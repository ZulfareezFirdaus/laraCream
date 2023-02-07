<?php

session_start();
include("dbconn.php");

	$currPassword = mysqli_real_escape_string($dbconn, $_POST["currPassword"]);
	$newPassword = mysqli_real_escape_string($dbconn, $_POST["newPassword"]);
	$hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
	
	$sql = "SELECT * FROM customer WHERE custEmail = '".$_SESSION["custEmail"]."' ";
	$query = mysqli_query($dbconn, $sql);
	$data = mysqli_fetch_assoc($query);
	
	if(password_verify($currPassword,$data['CustPassword'])){ 
		
		$sql2 = "UPDATE customer SET CustPassword = '".$hash_password."' WHERE custEmail = '".$_SESSION["custEmail"]."'";
		$query2 = mysqli_query($dbconn, $sql2);
		if($query2){
			$output = 'Yes';
		}
		else{
			$output = 'No';
		}
		
	}
	else{
		$output = 'No2';
	}
	


echo json_encode($output);
?>