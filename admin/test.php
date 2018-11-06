<?php
	ob_start();
	session_start();
	$dbservername="localhost";
	$dbuser="root";
	$dbpassword="";
	$dbname="virtual_classroom_db";
	$conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);
	

if(isset($_SESSION['username']))
{

     
									$user=$_SESSION['username'];
									$sql="select * from admin where username='$user'";
									$res=mysqli_query($conn,$sql);
									$row=mysqli_fetch_assoc($res);
									$image=$row['image'];
									print_r($row);
									echo $image."<br>";
}
else
{
  echo "connection failed";
}
?>

