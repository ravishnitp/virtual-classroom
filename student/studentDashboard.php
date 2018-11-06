<?php
    include "navbar.php";
    if(isset($_SESSION['susername']))
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
		
		$username=$_SESSION['susername'];
		$sql1="SELECT * FROM students where username='$username' ";
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($res1);
        $sid=$row1['sid'];
        

        

        

        $sql2="SELECT  * from assignmentresponse where sid=$sid ";
        $res2=mysqli_query($conn,$sql2);
       //if($res2)
            $rowcount2=mysqli_num_rows($res2);
		
        
        $sql3="SELECT * FROM enrollment where sid=$sid ";
        $res3=mysqli_query($conn,$sql3);
        //if($res)
            $rowcount3=mysqli_num_rows($res3);

        
       
        
        
        
        $sql4="SELECT * FROM doubt where sid=$sid ";
        $res4=mysqli_query($conn,$sql4);
        //if($res4)
            $rowcount4=mysqli_num_rows($res4);

        
        $sql5="SELECT * FROM quizresponse where sid=$sid ";
        $res5=mysqli_query($conn,$sql5);
       // if($res5)
            $rowcount5=mysqli_num_rows($res5);

		
		
		
		
	?>

            <div class="row" style="margin:15px;">
                    <div class="col l3 m6 s12" style="padding:5px;" >
                        <div  style="height:400px;">
                            <div class="center "style="background-color: gold;height:50%;">
                                    <a href="myClassroom.php"><i style="font-size: 200px;"class="material-icons blue-text">assignment</i></a>
                            </div>
                           
                            <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                            font-weight: 600;padding:20px">Registered<br/>&nbsp;Courses<br><?php echo $rowcount3?>
                            </div>
                        </div>
                    </div>

                    <div class="col l3 m6 s12" style="padding:5px;" >
                            <div  style="height:400px;">
                                <div class="center "style="background-color: gold;height:50%;">
                                        <a href="takeAssignment.php"><i style="font-size: 200px;"class="material-icons blue-text">list</i></a>
                                </div>
                               
                                <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                font-weight: 600;padding:20px">Assignments<br/>&nbsp;Submitted<br><?php echo $rowcount2?>
                                </div>
                            </div>
                        </div>

                        <div class="col l3 m6 s12" style="padding:5px;" >
                                <div  style="height:400px;">
                                    <div class="center "style="background-color: gold;height:50%;">
                                            <a href="takeTest.php"><i style="font-size: 200px;"class="material-icons blue-text">code</i></a>
                                    </div>
                                   
                                    <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                    font-weight: 600;padding:20px">Tests<br/>&nbsp;Taken<br><?php echo $rowcount5 ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col l3 m6 s12" style="padding:5px;" >
                                    <div  style="height:400px;">
                                        <div class="center "style="background-color: gold;height:50%;">
                                               <a href="askDoubt.php"> <i style="font-size: 200px;"class="material-icons blue-text">question_answer</i></a>
                                        </div>
                                       
                                        <div class="flow-text center" style="background-color: aqua;height:50%; font-variant: small-caps;
                                        font-weight: 600;padding:20px">Doubts<br/>&nbsp;Asked<br><?php echo $rowcount4?>
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
     $_SESSION['smessage']="<div class='chip red black-text'>Login To Continue</div>";
     header("Location: studentLogin.php");
	 die("Login To Continue ");
}
?>