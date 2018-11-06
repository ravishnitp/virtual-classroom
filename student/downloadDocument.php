<?php
include "navbar.php";
if($_SESSION['susername'] && isset($_GET['cid'])   )
{
    $user = $_SESSION['susername'];
    $sql5 = "select * from students where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $sid  = $row5['sid'];

    $cid = $_GET['cid'];
	
}
?>
<div class="main">
<!-- file_download -->
<div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Download&nbsp;Documents</h5>
			<?php
           if(isset($_SESSION['download']))
           {
             echo $_SESSION['download'];
             unset($_SESSION['download']);
            }
        ?>
            
        </div>
        <ul class="collection" style="margin:10px;border:2px solid red">

	<?php
		$sql = "select * from document   where cid=$cid   ";
		$res = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
				?>
		
		<li class="collection-item avatar">
				<span  style="text-transform: capitalize; font-weight: bold;"><?php echo $row['document']?></span>
				
				<a href="<?php echo '../course/documents/'.$row['document'];?>"  class=" delete secondary-content blue-text"> <i class=" medium material-icons" >file_download</i></a>
			
        </li> 
				
			<?php
            }

        }
		else
        {
            echo "<div class='chip red white-text'>No Documents Available</div>";
        }
			
	
	?>
	</ul>
</div>