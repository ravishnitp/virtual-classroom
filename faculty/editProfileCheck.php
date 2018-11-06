<?php
include "header.php";
if($conn)
 {
     if(isset($_POST['update'])) //
     {
         $email=$_POST['email'];
         $username=$_SESSION['fusername'];
         $department=$_POST['department'];
         $phoneNumber=$_POST['phoneNumber'];
         $name=$_POST['name'];
       
         $username=mysqli_real_escape_string($conn,$username);
         $email=mysqli_real_escape_string($conn,$email);
         $department=mysqli_real_escape_string($conn,$department);
         $phoneNumber=mysqli_real_escape_string($conn,$phoneNumber);
         $name=mysqli_real_escape_string($conn,$name);
         /* prevent scripting */

         $username=htmlentities($username);
         $email=htmlentities($email);
         $department=htmlentities($department);
         $phoneNumber=htmlentities($phoneNumber);
         $name=htmlentities($name);
        
        
         $sql1="select * from faculty where username != '$username' and email='$email'  ";
         $res1=mysqli_query($conn,$sql1);
         /*print_r($res1);
         echo 'signup'.'<br>';
         print_r($res1);
         echo '<br>';*/
 
         
 
         
         if(mysqli_num_rows($res1)>0)
         {
             header("Location: editProfile.php");
             $_SESSION['fmessage']="<div class='chip red black-text'>E-mail already exist</div>";
			 die("Email already exist ");
         }
         else
         {
            $sql="update faculty set email='$email',department='$department',phoneNumber='$phoneNumber',name='$name' where username='$username'";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
            $user=$_SESSION['fusername'];
            $sql3="select * from faculty where username='$user'";
            $res3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($res3);
            $email=$row3['email'];
            $username=$row3['username'];
            $department=$row3['department'];
            $phoneNumber=$row3['phoneNumber'];
            $name=$row3['name'];
            $_SESSION['fmessage']="<div class='chip green white-text'> Profile&nbsp;Updated</div>";
            header("Location: editProfile.php");
			die("Profile Updated ");
            }
            else
            {
              $_SESSION['fmessage']="<div class='chip red black-text'> Sorry,Something went wrong.</div>";
              header("Location: editProfile.php");
			  die("Sorry Something Went Wrong ");
            }
        }
 
     }
     
 
 }
 else
 {
    $_SESSION['fmessage']="<div class='chip red black-text'> Connection Failed</div>";
    header("Location: editProfile.php");
     
 }
 ?>
 
 



