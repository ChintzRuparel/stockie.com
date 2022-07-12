<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{
	//echo "Connection Established";
}
else{
	die("Connection Failed".mysqli_connect_error());
	}

?>