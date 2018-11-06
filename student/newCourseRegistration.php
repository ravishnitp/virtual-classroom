<?php
include "header.php";
if($_SESSION['susername'] && isset($_GET['cid'])   )
{

    $cid = $_GET['cid'];
  echo "cid ".$cid."<br>";
  $user=$_SESSION['susername'];
        $sql5="select * from students where username='$user'";
        $res5=mysqli_query($conn,$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $sid=$row5['sid'];
        echo "sid ".$sid."<br>";

        $sql="select * from course where cid=$cid ";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $fid=$row['fid'];
        echo 'fid '.$fid;

        $sql2="insert into enrollment(sid,fid,cid)values($sid,$fid,$cid)";
        $res2=mysqli_query($conn,$sql2);
        if($res2)
                 {
                    header("Location: registerNewCourse.php");
                    $_SESSION['scourseAddmessage']="<div class='chip green white-text'>Course Registered Successfully</div>";
                    die(" Registered Course Successfully");
                 }
				 else{
					header("Location: registerNewCourse.php");
				 $_SESSION['scourseAddmessage']="<div class='chip red black-text'>Error Registering Course</div>";
				 die("Error Registering Course");

				}



    

}
else
{
    header("Location: registerNewCourse.php");
    $_SESSION['scourseAddmessage']="<div class='chip red black-text'>Something Went Wrong</div>";
    die("Error Registering Course");

}