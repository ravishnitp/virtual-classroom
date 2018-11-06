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
        
        
        
        $sql2="SELECT * FROM assignment where fid=$fid ";
		$res2=mysqli_query($conn,$sql2);
        $rowcount2=mysqli_num_rows($res2);
        
        $sql4="SELECT * FROM quiz where fid=$fid ";
		$res4=mysqli_query($conn,$sql4);
        $rowcount4=mysqli_num_rows($res4);
        
        $sql5="SELECT * FROM doubt where fid=$fid ";
		$res5=mysqli_query($conn,$sql5);
		$rowcount5=mysqli_num_rows($res5);
		
		
		
		
	?>

            <div class="row" style="margin:15px;">
                    <div class="col l3 m6 s12" style="padding:5px;" >
                        <div  style="height:400px;">
                            <div class="center "style="background-color: gold;height:50%;">
                                    <a href="manageCourse.php"><i style="font-size: 200px;"class="material-icons blue-text">assignment</i></a>
                            </div>
                           
                            <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                            font-weight: 600;padding:20px">Total&nbsp;Courses<br><?php echo $rowcount3;?>
                            </div>
                        </div>
                    </div>

                    <div class="col l3 m6 s12" style="padding:5px;" >
                            <div  style="height:400px;">
                                <div class="center "style="background-color: gold;height:50%;">
                                        <a href="assessment.php"><i style="font-size: 200px;"class="material-icons blue-text">list</i></a>
                                </div>
                               
                                <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                font-weight: 600;padding:20px">Assignments<br><?php echo $rowcount2;?>
                                </div>
                            </div>
                        </div>

                        <div class="col l3 m6 s12" style="padding:5px;" >
                                <div  style="height:400px;">
                                    <div class="center "style="background-color: gold;height:50%;">
                                            <a href="assessment.php"><i style="font-size: 200px;"class="material-icons blue-text">code</i></a>
                                    </div>
                                   
                                    <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                    font-weight: 600;padding:20px">Tests<br><?php echo $rowcount4;?>
                                    </div>
                                </div>
                            </div>

                            <div class="col l3 m6 s12" style="padding:5px;" >
                                    <div  style="height:400px;">
                                        <div class="center "style="background-color: gold;height:50%;">
                                        <a href="resolveDoubt.php"><i style="font-size: 200px;"class="material-icons blue-text">question_answer</i></a>
                                        </div>
                                       
                                        <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                        font-weight: 600;padding:20px">Doubts<br><?php echo $rowcount5;?>
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