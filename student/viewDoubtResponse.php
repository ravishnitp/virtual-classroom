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
    
    
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Doubts&nbsp;Resolved</h5>
            
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        
        <?php

$sql = "select * from doubtresponse where sid=$sid order by cid ";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {

                $dResponseId = $row['dResponseId'];
                $title=$row['title'];
                $did=$row['did'];
                $cid=$row['cid'];
                $fid=$row['fid'];
                $sql2 = "select * from course  where cid=$cid ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $sql3 = "select * from faculty  where fid=$fid ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $cTitle = $row2['title'];
                $name=$row3['username'];
                
        ?>
        <li class="collection-item avatar">
        <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Doubt&nbsp;Title:&nbsp;<?php echo $title;?></span>
<p style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $cTitle; ?></p>

        <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $name; ?>
</p> 
<a href="viewDoubtResponseCheck.php?drid=<?php echo urlencode($dResponseId)?>" class="btn btn-large teal lighten-2 secondary-content white-text">View</a>
                         
                             </li> 
                             <?php
                
            }
            
        
        
        
?>
           
<?php
    
    
} else {
    echo "<div class='chip red white-text'>No Resolved Doubts</div>";
}
?>
    
    </ul>
    </div>

	<?php
include "footer.php";
?>

