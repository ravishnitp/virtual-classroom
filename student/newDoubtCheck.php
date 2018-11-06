<?php
    include "header.php";   
?>
<?php
if($conn)
 {
     if(isset($_POST['submit'])) 
     {
        $user=$_SESSION['susername'];
        $sql5="select * from students where username='$user'";
        $res5=mysqli_query($conn,$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $sid=$row5['sid'];
        $cid=$_POST['course'];
        $title=$_POST['title'];
        $body=$_POST['body'];

        $sql="select * from course  where cid='$cid'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $fid=$row['fid'];
        
        $sid=mysqli_real_escape_string($conn,$sid);
        $cid=mysqli_real_escape_string($conn,$cid);
        $fid=mysqli_real_escape_string($conn,$fid);
        $title=mysqli_real_escape_string($conn,$title);
        $body=mysqli_real_escape_string($conn,$body);

        $sid=htmlentities($sid);
        $cid=htmlentities($cid);
        $fid=htmlentities($fid);
        $title=htmlentities($title);
        $body=htmlentities($body);

        $sql2="insert into doubt(sid,dtitle,que,cid,fid)values($sid,'$title','$body',$cid,$fid)";
        $res2=mysqli_query($conn,$sql2);
        if($res2)
        {
            echo "Doubt Created "."<br>";
            header("Location: askNewDoubt.php");
             $_SESSION['doubtmessage']="<div class='chip green white-text'>Doubt Created Successfully</div>";
             die("Assignment Added ");
        }
        else{
           header("Location: askNewDoubt.php");
        $_SESSION['doubtmessage']="<div class='chip red black-text'>Error Adding Doubtt</div>";
        die("Error Adding Doubt");

       }


     }else{
        header("Location: askNewDoubt.php");
        $_SESSION['doubtmessage']="<div class='chip red black-text'>Error Adding Doubtt</div>";
        die("Error Adding Doubt");
     }
}
else
{
    header("Location: askNewDoubt.php");
    $_SESSION['doubtmessage']="<div class='chip red black-text'>Error Adding Doubtt</div>";
    die("Error Adding Doubt");
}
?>
