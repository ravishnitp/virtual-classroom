<?php
    include "navbar.php";
    if(isset($_SESSION['fusername']))
    {
?>
      
      <div class="main">
        <nav class="blue">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="" class="brand-logo right ">Dashboard</a>
                </div>

            </div>
        </nav>
		<?php
		
		$username=$_SESSION['fusername'];
		$sql1="SELECT * FROM faculty where username='$username' ";
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($res1);
		$fid=$row1['fid'];
		
		$sql3="SELECT Distinct courseCode FROM course where fid=$fid ";
		$res3=mysqli_query($conn,$sql3);
		$rowcount3=mysqli_num_rows($res3);
		
		
		
		
	?>

            <div class="row" style="margin:15px;">
                    <div class="col l6 m6 s12" style="padding:5px;" >
                        <div  style="height:400px;">
                            <div class="center "style="background-color: gold;height:75%;">
                                    <a href="createTest.php"><i style="font-size: 200px;padding-top:10%"class="material-icons blue-text">code</i></a>
                            </div>
                           
                            <div class="flow-text center" style="background-color: aqua;height:25%; font-variant: small-caps;
                            font-weight: 600;padding:20px"><a href="createTest.php">Create&nbsp;Test<br></a>
                            </div>
                        </div>
                    </div>

                    <div class="col l6 m6 s12" style="padding:5px;" >
                            <div  style="height:400px;">
                                <div class="center "style="background-color: gold;height:75%;">
                                        <a href="createAssignment.php"><i style="font-size: 200px;padding-top:10%"class="material-icons blue-text">assignment</i></a>
                                </div>
                               
                                <div class="flow-text center" style="background-color: aqua;height:25%; font-variant: small-caps;
                                font-weight: 600;padding:20px"><a href="createAssignment.php">Create&nbsp;Assignments<br></a>
                                </div>
                            </div>
                        </div>
            </div>
                   

                       

            </div> 
        
        
      
     
<?php
    
    include "footer.php";
   
}
else
{
     $_SESSION['fmessage']="<div class='chip red black-text'>Login To Continue</div>";
     header("Location: facultyLogin.php");
	 die("Login To Continue ");
}
?>