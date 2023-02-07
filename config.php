
<?php

//$username = "epiz_27743608";
//$password = "7pz3gvq0";
//$hostname = "sql112.epizy.com";
//$dbname = "epiz_27743608_laracream"; 

$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "laracream"; 

$link = mysqli_connect($hostname, $username, $password, $dbname);


if (mysqli_connect_errno())
{
	echo "failed to connect to MySQLi: " . mysqli_connect_error();
}

?>