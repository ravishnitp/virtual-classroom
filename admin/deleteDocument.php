<?php
include "header.php";
if($_SESSION['username'] && isset($_GET['id']) )
{
	$docid=$_GET['id'];
	$docid=intval($docid);
	
	$docid=mysqli_real_escape_string($conn,$docid);
	$docid=htmlentities($docid);
	$sql3="delete from document where id=$docid ";
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
	 $_SESSION['courseEditmessage']="<div class='chip red black-text'>Invalid Access</div>";
     header("Location: editCourse.php");
	 die("Login To Continue ");
}
?>