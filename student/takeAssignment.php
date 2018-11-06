<?php
include "navbar.php";
?>

<div class="main">
    <!-- upcoming course -->
    <?php
$user = $_SESSION['susername'];
$sql5 = "select * from students where username='$user'";
$res5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($res5);
$sid  = $row5['sid'];
?>
    
    <!-- Assignment for Ongoing COURSES  -->
    
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Assignment&nbsp;List</h5>
            <?php
            if(isset($_SESSION['assignmentMessage']))
            {
            echo $_SESSION['assignmentMessage'];
            unset($_SESSION['assignmentMessage']);
            }
            ?>
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        
        <?php

$sql = "select * from enrollment inner join course where  enrollment.cid = course.cid and course.startDate <=CURDATE() ANd course.endDate >= CURDATE()  and enrollment.sid = $sid    order by course.cid  ";
$res = mysqli_query($conn, $sql);
//for no of enrolled course
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $fid  = $row['fid'];
        $sql2 = "select * from faculty where fid=$fid";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $cid  = $row['cid'];
        $sql3 = "select * from assignment where cid=$cid";
        $res3 = mysqli_query($conn, $sql3);
        
        if (mysqli_num_rows($res3) > 0) {
            //for each assignment corresponding to each course
            while ($row3 = mysqli_fetch_assoc($res3)) {
                $assignmentId = $row3['assignment_Id'];
                $sql4         = "select * from assignmentresponse  where assignment_Id=$assignmentId  and sid=$sid";
                $res4         = mysqli_query($conn, $sql4);
?>
                            <li class="collection-item avatar">
        <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php
                echo $row['title'];
?>
</span>
        <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php
                echo $row2['name'];
?>
</p> 
        <p style="text-transform: capitalize; font-weight: bold;">Department:&nbsp;<?php
                echo $row['department'];
?>
</p> 
        <p class="red-text"style="text-transform: capitalize; font-weight: bold;">End&nbsp;Date:&nbsp;<?php
                echo $row['endDate'];
?>
</p>
       
        <?php
                
                if (mysqli_num_rows($res4) > 0) {
                    echo '<a href="#" class="btn btn-large green darken-3 secondary-content white-text">Submitted</a>';
                } else {
?>

                <a href="submitAssignment.php?aid=<?php echo urlencode($assignmentId)?>" class="btn btn-large pink accent-2 secondary-content white-text">Submit Now</a>
                         <?php
                    
                }
?>
                             </li> 
                             <?php
                
            }
            
        }
		else {
    echo "<div class='chip red white-text'>No Assignment Available</div>";
}
        
        
?>
           
<?php
    }
    
} else {
    echo "<div class='chip red white-text'>No Assignment Available</div>";
}
?>
    
    </ul>
    </div>

	<?php
include "footer.php";
?>

