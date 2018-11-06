<?php
include "header.php";
if($_SESSION['fusername'] && isset($_GET['id']) )
{
	$vid=$_GET['id'];
	$vid=intval($vid);
	
	$vid=mysqli_real_escape_string($conn,$vid);
	$vid=htmlentities($vid);
	$sql3="delete from video where id=$vid ";
	$res3=mysqli_query($conn,$sql3);
	
	if( $res3  )
	{
	  echo "<div class='chip green white-text'>Deleted Successfully</div>";
	}
	else
	{
	  echo "<div class='chip red black-text'>Something Went Wrong</div>";
	}
}
else
{
	 $_SESSION['fcourseEditmessage']="<div class='chip red black-text'>Invalid Access</div>";
     header("Location: editCourse.php");
	 die("Login To Continue ");
}
?>