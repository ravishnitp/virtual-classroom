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
    
    <!-- Test for Ongoing COURSES  -->
    
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Test&nbsp;List</h5>
            <?php
            if(isset($_SESSION['TestMessage']))
            {
            echo $_SESSION['TestMessage'];
            unset($_SESSION['TestMessage']);
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
        $sql3 = "select * from quiz where cid=$cid";
        $res3 = mysqli_query($conn, $sql3);
        
        if (mysqli_num_rows($res3) > 0) {
            
            //for each Test corresponding to each course
            while ($row3 = mysqli_fetch_assoc($res3)) {
                $qid = $row3['qid'];
                $sql4         = "select * from quizresponse  where qid=$qid  and sid=$sid";
                $res4         = mysqli_query($conn, $sql4);
                $deadline = $row3['deadline'];
?>
                            <li class="collection-item avatar">
        <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $row['title'];?>
</span>
        <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $row2['name']; ?>
</p> 
        <p style="text-transform: capitalize; font-weight: bold;">Department:&nbsp;<?php echo $row['department']; ?>
</p> 
        <p class="red-text"style="text-transform: capitalize; font-weight: bold;">End&nbsp;Date:&nbsp;<?php echo $row3['deadline']; ?>
</p>
       
        <?php
                
                if (mysqli_num_rows($res4) > 0) {
                    echo '<a href="#" class="btn btn-large green darken-3 secondary-content white-text">Submitted</a>';
                } else {
                    $deadline1=date_create($deadline);
                    $today = new DateTime('now');
                    $diff=date_diff($today,$deadline1);
                if($diff->format("%R%a days") < 0){
                    
                        echo '<a href="#" class="btn btn-large red darken-3 secondary-content white-text">Expired</a>';
                    }
                    else{

                    
?>

                <a href="submitTest.php?qid=<?php echo urlencode($qid)?>" class="btn btn-large pink accent-2 secondary-content white-text">Submit Now</a>
                         <?php
                }
                    
                }
?>
                             </li> 
                             <?php
                
            }
            
        }
        else{
            echo "<div class='chip red white-text'>No Test Available</div>";   
        }
        
        
?>
           
<?php
    }
    
} else {
    echo "<div class='chip red white-text'>No Test Available</div>";
}
?>
    
    </ul>
    </div>

	<?php
include "footer.php";
?>

