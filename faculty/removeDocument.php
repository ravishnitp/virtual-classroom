<?php
  include "navbar.php";
  ?>
<div class="main">
<div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Documents</h5>
			<span id="message"></span>
        </div>

  <ul class="collection" style="margin:10px;border:2px solid red">
	  <?php
	  if (isset($_GET['id'])) {
	  
	  }else{
		  $_SESSION['fcourseAddmessage'] = "<div class='chip red black-text'>Invalid Access</div>";
			header("Location: editCourse.php");
			die("error ");
	  }
	  ?>
  
    <?php
					$cid = $_GET['id'];
					$sql2="select * from course where cid=$cid" ;
					$res2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($res2);
					$courseCode=$row2['courseCode'];
					$username=$_SESSION['fusername'];
			$sql1="SELECT * FROM faculty where username='$username' ";
			$res1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($res1);
			$fid=$row1['fid'];
			
			$sql="select * from document where fid=$fid and courseCode='$courseCode' ";
			$res=mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)>0)
		{
			while($row=mysqli_fetch_assoc($res))
			{
					
	?>
				<li class="collection-item avatar">
				<span  style="text-overflow: ellipsis;"><?php echo $row['document']?></span>
				<p style="text-transform: capitalize; font-weight: bold;"><?php echo strtoupper($row['courseCode']);?></p>
				
				<a href="deleteDocument.php"  class=" delete secondary-content red-text"> <i class=" medium material-icons" id="<?php echo $row['id']?>">delete</i></a>
				

	<?php
			}	
		}
		else
		{
		  echo "<div class='chip red white-text'>No Documents For This Course in Database </div>";
		}
	?>
    
  </ul>
 
            

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
		xhr.open("GET","deleteDocument.php?id="+e.target.id,true)
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