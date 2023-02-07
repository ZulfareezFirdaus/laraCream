<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'sql112.epizy.com');
define('DB_USERNAME', 'epiz_27743608');
define('DB_PASSWORD', '7pz3gvq0');
define('DB_NAME', 'epiz_27743608_laracream');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>