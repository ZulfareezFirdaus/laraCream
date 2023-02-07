<?php

session_start();
include("dbconn.php");

if(isset($_POST["custEmail"]))
{
	$custEmail = mysqli_real_escape_string($dbconn, $_POST["custEmail"]);
	$custPassword = mysqli_real_escape_string($dbconn, $_POST["custPassword"]);
	
	$sql = "SELECT * FROM customer WHERE custEmail = '".$custEmail."'";
	$query = mysqli_query($dbconn, $sql);
	$num_row = mysqli_num_rows($query);
	
	if($num_row > 0)
	{
		$sql2 = "SELECT * FROM customer WHERE custEmail = '".$custEmail."' && userStatus = 'Verified'";
		$query2 = mysqli_query($dbconn, $sql2);
		$num_row2 = mysqli_num_rows($query2);
		$data = mysqli_fetch_assoc($query2);
		
		if(password_verify($custPassword,$data['CustPassword'])){
			if(isset($_SESSION["login"])){
				$_SESSION["custEmail"] = $custEmail;
				$output = 'Yes2'; 
			}
			else{
				$_SESSION["custEmail"] = $custEmail;
				$output = 'Yes'; 
			}
		}
		else{
			$output = 'No';
		}
	}
	else
	{
		$output = 'Not'; 
	}
}
else
{
	$output = 'Failed'; 
}

echo json_encode($output);
?>