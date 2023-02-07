<?php

session_start();
include("dbconn.php");

if(isset($_POST["custEmail"]))
{
	$custEmail = mysqli_real_escape_string($dbconn, $_POST["custEmail"]);
	$custPhone = mysqli_real_escape_string($dbconn, $_POST["custPhone"]);
	$custName = mysqli_real_escape_string($dbconn, $_POST["custName"]);
	$custPassword = mysqli_real_escape_string($dbconn, $_POST["custPassword"]);
	$hash_password = password_hash($custPassword, PASSWORD_DEFAULT);
	$user_activation_code = md5(rand());
	
	$sql = "SELECT * FROM customer WHERE custEmail = '".$custEmail."'";
	$query = mysqli_query($dbconn, $sql);
	$num_row = mysqli_num_rows($query);
	
	if($num_row > 0)
	{
		$output = 'No'; 
	}
	else
	{
		$_SESSION["username"] = $custEmail;
		$sql = "INSERT INTO customer (custEmail,custName,custPhone,custPassword,userActivationCode, userStatus) VALUES ('".$custEmail."','".$custName."','".$custPhone."','".$hash_password."','".$user_activation_code."','Verified')";
		$query = mysqli_query($dbconn, $sql);
		if($query > 0)
		{	
			$output = 'Yes';
		}
	}
}
else
{
	$output = 'Failed'; 
}

echo json_encode($output);
?>