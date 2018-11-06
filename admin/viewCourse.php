<?php
include "navbar.php";
?>

<div class="main">
    
        <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">OnGoing&nbsp;Courses</h5>
        </div>
        <table class="highlight centered responsive-table" style="margin:10px;">
        <thead>
          <tr>
                <th>Course&nbsp;Id</th>
              <th>Course&nbsp;Title</th>
              <th>Department</th>
              <th>Faculty&nbsp;Name</th>
          </tr>
        </thead>

        <tbody>
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
				  <tr>
					<td><?php echo $row['cid']?></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $row['department']?></td>
					<td><?php echo $row2['name']?></td>
				  </tr>
		   <?php
				}
			}
			else
			{
				echo "<div class='chip red white-text'>No Courses, ADD a New One by clicking circular button Below</div>";
			}
			?>
        </tbody>
      </table>
							<!-- upcoming course -->
	  
	  <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">UpComing&nbsp;Courses</h5>
        </div>
        <table class="highlight centered responsive-table" style="margin:10px;">
        <thead>
          <tr>
                <th>Course&nbsp;Id</th>
              <th>Course&nbsp;Title</th>
              <th>Department</th>
              <th>Faculty&nbsp;Name</th>
          </tr>
        </thead>

        <tbody>
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
				  <tr>
					<td><?php echo $row['cid']?></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $row['department']?></td>
					<td><?php echo $row2['name']?></td>
				  </tr>
		   <?php
				}
			}
			else
			{
				echo "<div class='chip red white-text'>No Courses, ADD a New One by clicking circular button Below</div>";
			}
			?>
        </tbody>
      </table>
	  
							<!-- end Course -->
		<div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Completed&nbsp;Courses</h5>
        </div>
        <table class="highlight centered responsive-table" style="margin:10px;">
        <thead>
          <tr>
                <th>Course&nbsp;Id</th>
              <th>Course&nbsp;Title</th>
              <th>Department</th>
              <th>Faculty&nbsp;Name</th>
          </tr>
        </thead>

        <tbody>
          <?php
			$sql="select * from course where endDate < CURDATE()  order by cid  ";
			
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
				  <tr>
					<td><?php echo $row['cid']?></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $row['department']?></td>
					<td><?php echo $row2['name']?></td>
				  </tr>
		   <?php
				}
			}
			else
			{
				echo "<div class='chip red white-text center'>No Courses</div>";
			}
			?>
        </tbody>
      </table>

	  
	   <div class="fixed-action-btn">
	<a href="addCourse.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">add</i></a>
	</div>

    
</div>

	<?php
	include "footer.php";
	?>

