<?php
include "header.php";
if(isset($_SESSION['username']) && isset($_GET['id']))
{
	$id=$_GET['id'];
	$idArray=(explode("-",$id));
	$cid=intval($idArray[0]);
	$fid=intval($idArray[1]);
	
	
	$cid=mysqli_real_escape_string($conn,$cid);
	$fid=mysqli_real_escape_string($conn,$fid);
	$cid=htmlentities($cid);
	$fid=htmlentities($fid);
	
	$sql2="select * from course where cid=$cid and fid=$fid" ;
	$res2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($res2);
	$courseCode=$row2['courseCode'];
	
	
	
	$sql="delete from course where fid=$fid and cid=$cid";
	$sql3="delete from video where cid=$cid";
	$sql4="delete from document where $cid";
	$res=mysqli_query($conn,$sql);
	$res3=mysqli_query($conn,$sql3);
	$res4=mysqli_query($conn,$sql4);
	if($res && $res3 && $res4 )
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
	 $_SESSION['message']="<div class='chip red black-text'>Invalid Access</div>";
     header("Location: adminLogin.php");
	 die("Login To Continue ");
}
	
?>