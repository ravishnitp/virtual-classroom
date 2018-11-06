<?php
include "header.php";
if(isset($_GET['id']))
{
	$fid=$_GET['id'];
	$fid=mysqli_real_escape_string($conn,$fid);
	$fid=htmlentities($fid);
	$sql1="delete from faculty where fid=$fid";
	$sql2="delete from course where fid=$fid";
	$sql3="delete from video where fid=$fid ";
	$sql4="delete from document where fid=$fid";
	$res1=mysqli_query($conn,$sql1);
	$res2=mysqli_query($conn,$sql2);
	$res3=mysqli_query($conn,$sql3);
	$res4=mysqli_query($conn,$sql4);
	if($res1 && $res2 && $res3 && $res4 )
	{
	  echo "<div class='chip green white-text'>Deleted Successfully</div>";
	}
	else
	{
	  echo "<div class='chip red black-text'>Something Went Wrong</div>";
	}
	
	
}
?>