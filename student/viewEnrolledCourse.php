<?php
include "navbar.php";
?>

<div class="main">
    <?php
        $user=$_SESSION['susername'];
        $sql5="select * from students where username='$user'";
        $res5=mysqli_query($conn,$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $sid=$row5['sid'];
    ?>
    
    <!-- Completed COURSES  -->
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Completed&nbsp;Courses</h5>
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">

        
        <?php
        
           $sql="select * from enrollment inner join course where  enrollment.cid = course.cid and course.endDate < CURDATE()  and enrollment.sid = $sid    order by course.cid  ";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$fid=$row['fid'];
					$sql2="select * from faculty where fid=$fid" ;
					$res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
					$cid=$row['cid'];
                    
        ?>
        <li class="collection-item avatar">
        <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $row['title']?></span>
        <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $row2['name']?></p> 
        <p style="text-transform: capitalize; font-weight: bold;">Department:&nbsp;<?php echo $row['department']?></p> 
        <a href="downloadVideo.php?cid=<?php echo urlencode($cid)?>" class="waves-effect waves-light blue lighten-3 btn"><i class="material-icons left">file_download</i>Download&nbsp;Videos</a>
        <a href="downloadDocument.php?cid=<?php echo urlencode($cid)?>" class="waves-effect waves-light blue lighten-3 btn"><i class="material-icons left">file_download</i>Download&nbsp;Documents</a>
        
        </li>    
<?php
            }

        }
        else
        {
            echo "<div class='chip red white-text'>No Courses Available</div>";
        }
    ?>
    
    </ul>
            
            
            
					
        
    <!-- Ongoing COURSES  -->
    <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Ongoing&nbsp;Courses</h5>
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        
        <?php
        
           $sql="select * from enrollment inner join course where  enrollment.cid = course.cid and course.startDate <=CURDATE() ANd course.endDate >= CURDATE()  and enrollment.sid = $sid    order by course.cid  ";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$fid=$row['fid'];
					$sql2="select * from faculty where fid=$fid" ;
					$res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
					$cid=$row['cid'];
                    
        ?><li class="collection-item avatar">
        <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $row['title']?></span>
        <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $row2['name']?></p> 
        <p style="text-transform: capitalize; font-weight: bold;">Department:&nbsp;<?php echo $row['department']?></p> 
        <p class="red-text"style="text-transform: capitalize; font-weight: bold;">End&nbsp;Date:&nbsp;<?php echo $row['endDate']?></p>
        <a href="downloadVideo.php?cid=<?php echo urlencode($cid)?>" class="waves-effect waves-light blue lighten-3 btn"><i class="material-icons left">file_download</i>Download&nbsp;Videos</a>
        <a href="downloadDocument.php?cid=<?php echo urlencode($cid)?>"class="waves-effect waves-light blue lighten-3 btn"><i class="material-icons left">file_download</i>Download&nbsp;Documents</a>
        </li>    
<?php
            }

        }
        else
        {
            echo "<div class='chip red white-text'>No Courses Available</div>";
        }
    ?>
    
    </ul>

        <!-- UPCOMING COURSES  -->
	  <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">UpComing&nbsp;Courses</h5>
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        
        <?php
        
           $sql="select * from enrollment inner join course where  enrollment.cid = course.cid and course.startDate > CURDATE()  and enrollment.sid = $sid    order by course.cid  ";
            $res=mysqli_query($conn,$sql);
            //print_r($res);
            
            if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$fid=$row['fid'];
					$sql2="select * from faculty where fid=$fid" ;
					$res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
                    
        ?>
                    <li class="collection-item avatar">
            <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $row['title']?></span>
            <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $row2['name']?></p> 
            <p style="text-transform: capitalize; font-weight: bold;">Department:&nbsp;<?php echo $row['department']?></p> 
            <p class="green-text"style="text-transform: capitalize; font-weight: bold;">Start&nbsp;Date:&nbsp;<?php echo $row['startDate']?></p>
            </li>    
    <?php
                }

            }
            else
            {
                echo "<div class='chip red white-text'>No Courses Available</div>";
            }
        ?>
        
        </ul>
    </div>

	<?php
	include "footer.php";
	?>

