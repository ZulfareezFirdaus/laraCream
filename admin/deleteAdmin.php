<?php
    include '../config.php';
	session_start();
	$adminID = $_GET['adminID']; //Get id from URL
	$id = $_SESSION['id']; //id of the current user
	$_SESSION['adminID'] = $adminID;

	$query = "DELETE FROM admins WHERE adminID = '$adminID'";

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