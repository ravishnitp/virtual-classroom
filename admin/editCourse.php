<?php
  include "navbar.php";
  ?>
<div class="main">
<div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">OnGoing&nbsp;Courses</h5>
			<?php
           if(isset($_SESSION['courseEditmessage']))
           {
             echo $_SESSION['courseEditmessage'];
             unset($_SESSION['courseEditmessage']);
            }
        ?>
			<span id="message"></span>
        </div>

  <ul class="collection" style="margin:10px;border:2px solid red">
   
	<?php
			
			 $sql="select * from course where startDate <=CURDATE() ANd endDate >= CURDATE() order by cid  "; 
			
			$res=mysqli_query($conn,$sql);
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
				<span class="flow-text" style="text-transform: capitalize; font-weight: bold;"><?php echo $row['title']?></span>
				<p>Course&nbsp;Code&nbsp;:&nbsp;<?php echo ucfirst($row['courseCode']);?></p>
				<p>Faculty&nbsp;Name&nbsp;:&nbsp;<?php echo ucfirst($row2['name']);?></p>
				<p>Department&nbsp;:&nbsp;<?php echo ucfirst($row['department']);?></p>
				<div>
				<a href="addVideo.php?id=<?php echo $row['cid'];?>"> <i class="material-icons small">add</i> Add&nbsp;Videos</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<a href="removeVideo.php?id=<?php echo $row['cid'];?>" ><i class="material-icons small red-text ">delete</i>Remove&nbsp;Videos</a>
				<div>
				<a href="addDocument.php?id=<?php echo $row['cid'];?>"> <i class="material-icons small ">add</i>Add&nbsp;Documents</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<a href="removeDocument.php?id=<?php echo $row['cid'];?>"> <i class="material-icons small red-text">delete</i>Remove&nbsp;Documents</a>
				</div>

	<?php
			}	
		}
		else
		{
		  echo "<div class='chip red white-text'>No Course in Database , Add a New One by clicking circular button Below</div>";
		}
	?>
    
  </ul>
  
				<!--  up coming course -->
				
	<div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Upcoming&nbsp;Courses</h5>
			<?php
           if(isset($_SESSION['courseEditmessage']))
           {
             echo $_SESSION['courseEditmessage'];
             unset($_SESSION['courseEditmessage']);
            }
        ?>
			<span id="message"></span>
        </div>

  <ul class="collection" style="margin:10px;border:2px solid red">
   
	<?php
			
			 $sql="select * from course where startDate > CURDATE()  order by cid  "; 
			
			$res=mysqli_query($conn,$sql);
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
				<span class="flow-text" style="text-transform: capitalize; font-weight: bold;"><?php echo $row['title']?></span>
				<p>Course&nbsp;Code&nbsp;:&nbsp;<?php echo ucfirst($row['courseCode']);?></p>
				<p>Faculty&nbsp;Name&nbsp;:&nbsp;<?php echo ucfirst($row2['name']);?></p>
				<p>Department&nbsp;:&nbsp;<?php echo ucfirst($row['department']);?></p>
				<div>
				<a href="addVideo.php?id=<?php echo $row['cid'];?>"> <i class="material-icons small">add</i> Add&nbsp;Videos</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<a href="removeVideo.php?id=<?php echo $row['cid'];?>" ><i class="material-icons small red-text ">delete</i>Remove&nbsp;Videos</a>
				<div>
				<a href="addDocument.php?id=<?php echo $row['cid'];?>"> <i class="material-icons small ">add</i>Add&nbsp;Documents</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<a href="removeDocument.php?id=<?php echo $row['cid'];?>"> <i class="material-icons small red-text">delete</i>Remove&nbsp;Documents</a>
				</div>

	<?php
			}	
		}
		else
		{
		  echo "<div class='chip red white-text'>No Upcoming&nbspCourse in Database , Add a New One by clicking circular button Below</div>";
		}
	?>
    
  </ul>
				
				
				
				
  
  <div class="fixed-action-btn">
	<a href="addCourse.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">add</i></a>
	</div>
            

</div>
  
  <?php
include "footer.php";
?>

