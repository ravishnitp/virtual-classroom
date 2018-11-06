<?php
    include "navbar.php";
    if(isset($_SESSION['username']))
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
		$sql="select * from faculty  ";
		$res=mysqli_query($conn,$sql);
		$rowcount1=mysqli_num_rows($res);
		
		$sql2="select * from students  ";
		$res2=mysqli_query($conn,$sql2);
		$rowcount2=mysqli_num_rows($res2);
		
		$sql3="SELECT DISTINCT courseCode FROM course ";
		$res3=mysqli_query($conn,$sql3);
        $rowcount3=mysqli_num_rows($res3);
        
        $sql4="SELECT * FROM quiz  ";
		$res4=mysqli_query($conn,$sql4);
		$rowcount4=mysqli_num_rows($res4);
		
		
	?>

            <div class="row" style="margin:15px;">
                    <div class="col l3 m6 s12" style="padding:5px;" >
                        <div  style="height:400px;">
                            <div class="center "style="background-color: gold;height:50%;">
                                    <a href="manageStudents.php"><i style="font-size: 200px;"class="material-icons blue-text">group</i></a>
                            </div>
                           
                            <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                            font-weight: 600;padding:20px">Total&nbsp;Students<br><?php echo $rowcount2;?>
                            </div>
                        </div>
                    </div>

                    <div class="col l3 m6 s12" style="padding:5px;" >
                            <div  style="height:400px;">
                                <div class="center "style="background-color: gold;height:50%;">
                                        <a href="manageFaculty.php"><i style="font-size: 200px;"class="material-icons blue-text">person</i></a>
                                </div>
                               
                                <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                font-weight: 600;padding:20px">Total&nbsp;Faculty<br><?php echo $rowcount1;?>
                                </div>
                            </div>
                        </div>

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
                                                <i style="font-size: 200px;"class="material-icons blue-text">code</i>
                                        </div>
                                       
                                        <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                        font-weight: 600;padding:20px">Total&nbsp;Tests<br><?php echo $rowcount4;?>
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
     $_SESSION['message']="<div class='chip red black-text'>Login To Continue</div>";
     header("Location: adminLogin.php");
}
?>