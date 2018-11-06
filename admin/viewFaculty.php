<?php
include "navbar.php";
?>

<div class="main">
    
        <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Faculty&nbsp;List</h5>
        </div>
        <table class="highlight centered responsive-table">
        <thead>
          <tr>
                <th>Faculty&nbsp;Id</th>
				<th>Name</th>
				<th>Department</th>
				<th>email</th>
          </tr>
        </thead>

        <tbody>
          <tr>
		  <?php
			$sql="select * from faculty order by fid ";
			$res=mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
			?>
				  <tr>
					<td><?php echo $row['fid']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['department']?></td>
					<td><?php echo $row['email']?></td>
				  </tr>
		   <?php
			}
				}
					else
					{
					  echo "<div class='chip red white-text'>No Faculty in Database , ADD a New One by clicking circular button Below</div>";
					}
			?>
         
        </tbody>
      </table>
	  <div class="fixed-action-btn">
	<a href="addFaculty.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">add</i></a>
	</div>
	  

    
</div>

<?php
include "footer.php";
?>

