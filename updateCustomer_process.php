<?php

session_start();
include("dbconn.php");

	$custEmail = mysqli_real_escape_string($dbconn, $_POST["custEmail"]);
	$custPhone = mysqli_real_escape_string($dbconn, $_POST["custPhone"]);
	$custName = mysqli_real_escape_string($dbconn, $_POST["custName"]);
	
	$sql = "UPDATE customer SET custPhone = '".$custPhone."',custName = '".$custName."'  WHERE custEmail = '".$custEmail."'";
	$query = mysqli_query($dbconn, $sql);
	
	if($query)
	{
		$output = 'Yes';
	}
	else
	{
		$output = 'No'; 
	}


echo json_encode($output);
?>