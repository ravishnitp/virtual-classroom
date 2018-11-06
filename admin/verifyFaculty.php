<?php
include "navbar.php";
?>
<div class="row main">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <ul class="collection with-header">
                <li class="collection-header teal">
                    <h5 class="white-text center" style="font-variant: small-caps; font-weight: bold;">Faculty&nbsp;Request</h5>
                    <span id="message"></span>
                </li>

                <li class="collection-item">
                   
				   
				   <?php
						$sql="select * from facultysignup order by id";
						$res=mysqli_query($conn,$sql);
						if(mysqli_num_rows($res)>0)
						{
							while($row=mysqli_fetch_assoc($res))
							{
							?>
								<li class="collection-item">
								<span class="flow-text blue-text"><?php echo $row['username']?></span>
								<br><span class="flow-text blue-text " style="margin-top:10px;display:block;"><b style="font-variant: small-caps;">
								Department:</b>&nbsp;<?php echo $row['department']?> </span>
								<br>
								<a class="accept waves-effect waves-light green white-text btn" id="<?php echo "A".$row['id'];?>" >Accept</a>
								<a class="reject waves-effect waves-light red btn" id="<?php echo "R".$row['id'];?>" >Reject</a>

							<?php
							}
						}
						
								
								
								else
								{
								  echo "<div class='chip red white-text'>No Faculty Registration Request</div>";
								}
								
						
					?>

                


            </ul>
        </div>
    </div>
</div>
    


<?php
include "footer.php";
?>

<script>
	const del=document.querySelectorAll(".reject");
	const acc=document.querySelectorAll(".accept");
	del.forEach(function(item,index)
	{
		item.addEventListener("click",rejectNow)
	})
	
	acc.forEach(function(item,index)
	{
		item.addEventListener("click",acceptNow)
	})

	function rejectNow(e)
	{
		
	  e.preventDefault();
	  var tId = ""+e.target.id;
	 // alert(tId);
	  var rId = tId.substring(1);
	 // alert(""+rId);
	  if(confirm("Do you really Want to Reject"))
	  {
		const xhr=new XMLHttpRequest();
		
		xhr.open("GET","rejectFaculty.php?id="+Number(rId),true)
		xhr.onload=function()
		{
		  const messg=xhr.responseText;
		  const message=document.getElementById("message")
		  message.innerHTML=messg;
		}
		xhr.send()
	  }

	}
	function acceptNow(e)
	{
		
	  e.preventDefault();
	  var tempId = ""+e.target.id;
	  //alert(tempId);
	  var aId = tempId.substring(1);
	  //alert(""+aId);
	  if(confirm("Do you really Want to Accept"))
	  {
		const xhr=new XMLHttpRequest();
		
		xhr.open("GET","acceptFaculty.php?id="+Number(aId),true)
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