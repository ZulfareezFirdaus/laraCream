<?php
    include '../config.php';
	session_start();
	$toppingID = $_GET['toppingID']; //Get id from URL
	$id = $_SESSION['id']; //id of the current user
	//$_SESSION['toppingID'] = $productID;

	$query = "DELETE FROM topping WHERE toppingID = '$toppingID'";

	if(!($link->query($query))){
		echo("<SCRIPT LANGUAGE='Javascript'>
			window.location.href='products.php'
			window.alert('Sorry, a problem has occured!')</SCRIPT>");
	}

	else{
		echo("<SCRIPT LANGUAGE='Javascript'>
			window.location.href='products.php'
			window.alert('This topping has been removed!')</SCRIPT>");
	}
?>