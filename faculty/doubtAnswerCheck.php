<?php
    include "header.php";   
?>
<?php
if($conn)
 {
     if(isset($_POST['submit'])) 
     {
        $user = $_SESSION['fusername'];
        $sql5 = "select * from faculty where username='$user'";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_assoc($res5);
        $fid  = $row5['fid'];
       
        $did=$_POST['did'];
        $title=$_POST['title'];
        $rbody=$_POST['rBody'];
        $sql3 = "select * from doubt where did=$did";
        $res3         = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($res3);

        $fid=$row3['fid'];
        $cid=$row3['cid'];
        $sid=$row3['sid'];
        echo $did."<br>";
        echo $title."<br>";
        echo $rbody."<br>";
        echo $cid."<br>";
        echo $fid."<br>";
        
        $did=mysqli_real_escape_string($conn,$did);
        $title=mysqli_real_escape_string($conn,$title);
        $rbody=mysqli_real_escape_string($conn,$rbody);
        $cid=mysqli_real_escape_string($conn,$cid);
        $fid=mysqli_real_escape_string($conn,$fid);
        $sid=mysqli_real_escape_string($conn,$sid);

        $did=htmlentities($did);
        $title=htmlentities($title);
        $rbody=htmlentities($rbody);
        $cid=htmlentities($cid);
        $fid=htmlentities($fid);
        $sid=mysqli_real_escape_string($conn,$sid);


        
        $sql="insert into doubtresponse(did,title,body,cid,fid,sid)values('$did','$title','$rbody',$cid,$fid,$sid)";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "assignment added "."<br>";
            header("Location: resolveDoubt.php");
             $_SESSION['doubtMessage']="<div class='chip green white-text'>Doubt Resolved Successfully</div>";
             die("doubt resolved ");
        }
        else{
           header("Location: resolveDoubt.php");
        $_SESSION['doubtMessage']="<div class='chip red black-text'>Error Resolving Doubt</div>";
        die("Error Resolving Doubt");

       }


     }
     else{
        header("Location: resolveDoubt.php");
        $_SESSION['doubtMessage']="<div class='chip red black-text'>Error Resolving Doubt</div>";
        die("Error Resolving Doubt");
     }
    }
    else
    {
        header("Location: resolveDoubt.php");
        $_SESSION['doubtMessage']="<div class='chip red black-text'>Error Resolving Doubt</div>";
        die("Error Resolving Doubt"); 
    }


?>
