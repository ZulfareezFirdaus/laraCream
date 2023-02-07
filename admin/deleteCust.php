<?php
    include '../config.php';
	session_start();
	$custID = $_GET['custID']; //Get id from URL
	$id = $_SESSION['id']; //id of the current user
	$_SESSION['custID'] = $custID;

	$query = "DELETE FROM customer WHERE custID = '$custID'";

	if(!($link->query($query))){
		echo("<SCRIPT LANGUAGE='Javascript'>
			window.location.href='adminUsers.php'
			window.alert('Sorry, a problem has occured!')</SCRIPT>");
	}

	else{
		echo("<SCRIPT LANGUAGE='Javascript'>
			window.location.href='adminUsers.php'
			window.alert('This user has been removed!')</SCRIPT>");
	}
?>