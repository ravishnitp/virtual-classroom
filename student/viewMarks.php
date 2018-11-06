<?php
include "navbar.php";
?>

<div class="main">

    <?php
$user = $_SESSION['susername'];
$sql5 = "select * from students where username='$user'";
$res5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($res5);
$sid  = $row5['sid'];
?>
    
    
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Tests&nbsp;Attempted</h5>
            
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        
        <?php

$sql = "select * from quizresponse where sid=$sid order by cid ";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);


if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {

                $qrid = $row['qrid'];
                $qid=$row['qid'];
				$sid=$row['sid'];
                $cid=$row['cid'];
                
				$resbody=$row['resbody'];
                $sql2 = "select * from course  where cid=$cid ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
				$fid=$row2['fid'];
                $sql3 = "select * from faculty  where fid=$fid ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
				$sql4 = "select * from quiz  where qid=$qid ";
                $res4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($res4);
				$qTitle= $row4['title'];
                $cTitle = $row2['title'];
                $name=$row3['username'];
                
        ?>
        <li class="collection-item avatar">
        <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Test&nbsp;Title:&nbsp;<?php echo $qTitle;?></span>
<p style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $cTitle; ?></p>

        <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $name; ?>
</p> 
<a href="viewMarksCheck.php?qrid=<?php echo urlencode($qrid)?>" class="btn btn-large teal lighten-2 secondary-content white-text">View</a>
                         
                             </li> 
                             <?php
                
            }
            
        
        
        
?>
           
<?php
    
    
} else {
    echo "<div class='chip red white-text'>No Tests Attempted</div>";
}
?>
    
    </ul>
    </div>

	<?php
include "footer.php";
?>

