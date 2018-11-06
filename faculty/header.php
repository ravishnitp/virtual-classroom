<?php
	ob_start();
	session_start();
	$dbservername="localhost";
	$dbuser="root";
	$dbpassword="";
	$dbname="virtual_classroom_db";
	$conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);
?>

