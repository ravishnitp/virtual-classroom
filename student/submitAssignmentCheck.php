<?php
    include "header.php";   
?>
<?php
if($conn)
 {
     if(isset($_POST['submit'])) 
     {
        $user = $_SESSION['susername'];
        $sql5 = "select * from students where username='$user'";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_assoc($res5);
        $sid  = $row5['sid'];

       
        $aid=$_POST['aid'];
        $title=$_POST['title'];
        $rbody=$_POST['rBody'];
        $sql3 = "select * from assignment where assignment_Id=$aid";
        $res3         = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($res3);

        $cid=$row3['cid'];
        
        $aid=mysqli_real_escape_string($conn,$aid);
        $title=mysqli_real_escape_string($conn,$title);
        $rbody=mysqli_real_escape_string($conn,$rbody);
        $sid=mysqli_real_escape_string($conn,$sid);
        $cid=mysqli_real_escape_string($conn,$cid);

        $aid=htmlentities($aid);
        $title=htmlentities($title);
        $rbody=htmlentities($rbody);
        $sid=htmlentities($sid);
        $cid=htmlentities($cid);


        
        $sql="insert into assignmentresponse(assignment_Id,title,body,cid,sid)values('$aid','$title','$rbody',$cid,$sid)";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "assignment added "."<br>";
            header("Location: takeAssignment.php");
             $_SESSION['assignmentMessage']="<div class='chip green white-text'>Assignment Submitted Successfully</div>";
             die("Assignment Submitted ");
        }
        else{
           header("Location: takeAssignment.php");
        $_SESSION['assignmentMessage']="<div class='chip red black-text'>Error Submitting Assignment</div>";
        die("Error Adding Assignment");

       }


     }
     else{
        header("Location: takeAssignment.php");
        $_SESSION['assignmentMessage']="<div class='chip red black-text'>Error Submitting Assignment</div>";
        die("Error Adding Assignment");
     }
    }
    else
    {
        header("Location: takeAssignment.php");
        $_SESSION['assignmentMessage']="<div class='chip red black-text'>Error Submitting Assignment</div>";
        die("Error Adding Assignment"); 
    }

?>
