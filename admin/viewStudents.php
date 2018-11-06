<?php
include "navbar.php";
?>

<div class="main">
    
        <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Student&nbsp;List</h5>
        </div>
        <table class="highlight centered responsive-table">
        <thead>
          <tr>
                <th>Student&nbsp;Id</th>
              <th>Name</th>
              <th>Department</th>
              <th>email</th>
          </tr>
        </thead>

        <tbody>
		<?php
			$sql="select * from students GROUP BY department ";
			$res=mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
			?>
				  <tr>
					<td><?php echo $row['sid']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['department']?></td>
					<td><?php echo $row['email']?></td>
				  </tr>
		   <?php
			}
				}
					else
					{
					  echo "<div class='chip red white-text'>No Student in Database , ADD a New One by clicking circular button Below</div>";
					}
			?>
          
        </tbody>
      </table>
	  <div class="fixed-action-btn">
	<a href="addStudents.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">add</i></a>
	</div>

    
</div>

<?php
include "footer.php";
?>

