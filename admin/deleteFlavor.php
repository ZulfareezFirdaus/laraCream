<?php
    include '../config.php';
	session_start();
	$flavorID = $_GET['flavorID']; //Get id from URL
	$id = $_SESSION['id']; //id of the current user
	//$_SESSION['flavorID'] = $productID;

	$query = "DELETE FROM flavor WHERE flavorID = '$flavorID'";

	if(!($link->query($query))){
		echo("<SCRIPT LANGUAGE='Javascript'>
			window.location.href='products.php'
			window.alert('Sorry, a problem has occured!')</SCRIPT>");
	}

	else{
		echo("<SCRIPT LANGUAGE='Javascript'>
			window.location.href='products.php'
			window.alert('This flavor has been removed!')</SCRIPT>");
	}
?>