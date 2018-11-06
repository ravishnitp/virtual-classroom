<?php
include "navbar.php";
?>

<div class="main">
    <!-- upcoming course -->
    <?php
        $user=$_SESSION['susername'];
        $sql5="select * from students where username='$user'";
        $res5=mysqli_query($conn,$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $sid=$row5['sid'];
    ?>
	  
	  <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">UpComing&nbsp;Courses</h5>
            <?php
           if(isset($_SESSION['scourseAddmessage']))
           {
             echo $_SESSION['scourseAddmessage'];
             unset($_SESSION['scourseAddmessage']);
            }
        ?>
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">
        <?php
            $sql="select * from course where startDate > CURDATE()  order by cid  ";
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
                    $cid=$row['cid'];
					
		?>
                <li class="collection-item avatar">
            <span class="flow-text" style="text-transform: capitalize; font-weight: bold;">Course&nbsp;Title:&nbsp;<?php echo $row['title']?></span>
            <p style="text-transform: capitalize; font-weight: bold;">Faculty&nbsp;Name:&nbsp;<?php echo $row2['name']?></p> 
            <p style="text-transform: capitalize; font-weight: bold;">Department:&nbsp;<?php echo $row['department']?></p> 
            <p style="text-transform: capitalize; font-weight: bold;">Start&nbsp;Date:&nbsp;<?php echo $row['startDate']?></p>
            <?php
                $sql3="select * from enrollment where cid=$cid   and sid=$sid  ";
                $res3=mysqli_query($conn,$sql3);
                $row3=mysqli_fetch_assoc($res3);
                if(mysqli_num_rows($res3)>0)
                {
                    echo '<a href="#" class="btn btn-large green darken-3 secondary-content white-text">Enrolled</a>';

                }else
                {

                ?>
<a href="newCourseRegistration.php?cid=<?php echo urlencode($cid)?>" class="btn btn-large pink accent-2 secondary-content white-text">Register Now</a>                   
                
                <?php
                }

            ?>
               
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

