<?php
include "header.php";
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$id=mysqli_real_escape_string($conn,$id);
	$id=htmlentities($id);
	$sql="select * from facultysignup where id=$id";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	
	
	
			$username=$row['username'];
			$password=$row['password'];
			$department=$row['department'];
			$email=$row['email'];
			
			$sql2="select * from faculty where email='$email' or username='$username'";
			$sql2="select * from faculty where email='$email' or username='$username'";
			$sql2="select * from faculty where email='$email' or username='$username'";
			$res2=mysqli_query($conn,$sql2);
			if(mysqli_num_rows($res2)>0)
			 {
				 $sql5="delete from facultysignup where id=$id";
						  $res5=mysqli_query($conn,$sql5);
				 echo "<div class='chip red white-text'>Faculty Already Exists</div>";
			 }
			  else
			 {
				 
				 
				 
					 $sql3="insert into faculty(email,username,password,department) values('$email','$username','$password','$department')";
					 $res3=mysqli_query($conn,$sql3);
					 if($res3)
					 {
						 $sql4="delete from facultysignup where id=$id";
						  $res4=mysqli_query($conn,$sql4);
						 echo "<div class='chip green white-text'>Faculty Added Successfully</div>";
					 }
					 else
					 {
						 echo "<div class='chip red white-text'>Sorry Something Went Wrong,Please try Again</div>";
						 
					 }
				 
				 
			 }
        
        
 
         
 
         
        
	
}
?>