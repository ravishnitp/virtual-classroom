<?php
  include "navbar.php";
  ?>
<div class="main">
<div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Student&nbsp;List</h5>
			<span id="message"></span>
        </div>

  <ul class="collection">
    <?php
		$sql="select * from students order by sid ";
		$res=mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)>0)
		{
			while($row=mysqli_fetch_assoc($res))
			{
	?>
				<li class="collection-item avatar">
				<span class="flow-text" style="text-transform: capitalize; font-weight: bold;"><?php echo $row['name']?></span>
				<p><?php echo $row['department']?></p>
				<p><?php echo $row['email']?></p>
				<a href=""  class=" delete secondary-content red-text"> <i class=" medium material-icons" id="<?php echo $row['sid'];?>">delete</i></a>
				

	<?php
			}	
		}
		else
		{
		  echo "<div class='chip red white-text'>No Studentin Database , Add a New One by clicking circular button Below</div>";
		}
	?>
    
  </ul>
  <div class="fixed-action-btn">
		<a href="addStudents.php" class="btn-floating btn btn-large white-text pulse"><i class="material-icons">add</i></a>
	  </div>
            

</div>
  
  <?php
include "footer.php";
?>

<script>
	const del=document.querySelectorAll(".delete");
	del.forEach(function(item,index)
	{
	item.addEventListener("click",deleteNow)
	})

	function deleteNow(e)
	{
		
	  e.preventDefault();
	  if(confirm("Do you really Want to Delete"))
	  {
		const xhr=new XMLHttpRequest();
		xhr.open("GET","deleteStudents.php?id="+Number(e.target.id),true)
		xhr.onload=function()
		{
		  const messg=xhr.responseText;
		  const message=document.getElementById("message")
		  message.innerHTML=messg;
		}
		xhr.send()
	  }

	}
</script>