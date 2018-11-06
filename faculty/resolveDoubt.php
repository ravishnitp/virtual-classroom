<?php
    include "navbar.php";
?>
      
      
    <div class="main">
    <?php
$user = $_SESSION['fusername'];
$sql5 = "select * from faculty where username='$user'";
$res5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($res5);
$fid  = $row5['fid'];
?>
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Doubts&nbsp;Forum</h5>
            <?php
            if(isset($_SESSION['doubtMessage']))
            {
            echo $_SESSION['doubtMessage'];
            unset($_SESSION['doubtMessage']);
            }
            ?>
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        <?php

$sql = "select * from doubt inner join course where  doubt.cid = course.cid and course.startDate <=CURDATE() ANd course.endDate >= CURDATE()  and doubt.fid = $fid    order by course.cid  ";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $sid  = $row['sid'];
        $sql2 = "select * from students where sid=$sid";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $susername=$row2['username'];
        $cid  = $row['cid'];

        $sql3 = "select * from assignment where cid=$cid";
        $res3 = mysqli_query($conn, $sql3);
        $title = $row['dtitle'];
        $course = $row['title'];

                $did = $row['did'];
                $sql4         = "select * from doubtresponse  where did=$did  and fid=$fid";
                $res4         = mysqli_query($conn, $sql4);
    ?>        
            
            <li class="collection-item avatar">
            
            <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Doubt&nbsp;Title:&nbsp;<?php echo $title?></span>
            <p style="text-transform: capitalize; font-weight: bold;">Asked&nbsp;By:<?php echo $susername?></p> 
            <p style="text-transform: capitalize; font-weight: bold;">Course:<?php echo $course?></p>

              <?php
                
                if (mysqli_num_rows($res4) > 0) {
                    echo '<a href="#" class="btn btn-large green darken-3 secondary-content white-text">Resolved</a>';
                } else {
?>  
             <a href="doubtAnswer.php?did=<?php echo urlencode($did)?>" class="btn btn-large pink accent-2 secondary-content white-text">Resolve Now</a>
                         <?php
                    
                }
?>
            </li>
            <?php
        }
}
else
{
	echo "<div class='chip green white-text'>NO Pending Doubts</div>";
}

        ?>
    
    </ul>
    </div>


<?php
    include "footer.php";
?>