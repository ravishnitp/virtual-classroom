<?php
    include "header.php";   
?>
<?php
if($conn)
 {
     if(isset($_POST['submit'])) 
     {
         echo "hii"."<br>";
        echo $_POST['course']."<br>";
        echo $_POST['title']."<br>";
        echo $_POST['body']."<br>";

        $cid=$_POST['course'];
        $title=$_POST['title'];
        $body=$_POST['body'];

        $cid=mysqli_real_escape_string($conn,$cid);
        $title=mysqli_real_escape_string($conn,$title);
        $body=mysqli_real_escape_string($conn,$body);

        $cid=htmlentities($cid);
        $title=htmlentities($title);
        $body=htmlentities($body);


        $sql1="SELECT * FROM course where cid=$cid ";
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($res1);
        $courseCode=$row1['courseCode'];
        $fid=$row1['fid'];

        echo "<br>" . $courseCode;
        $sql="insert into assignment(courseCode,title,body,cid,fid)values('$courseCode','$title','$body',$cid,$fid)";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "assignment added "."<br>";
            header("Location: createAssignment.php");
             $_SESSION['fmessage']="<div class='chip green white-text'>Assignment Added</div>";
             die("Assignment Added ");
        }
        else{
           header("Location: createAssignment.php");
        $_SESSION['fmessage']="<div class='chip red black-text'>Error Adding Assignment</div>";
        die("Error Adding Assignment");

       }


     }else{
         
     }
}
?>
