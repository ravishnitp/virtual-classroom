<?php
include "header.php";
if(isset($_SESSION['fusername']))
{
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/main.css" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Faculty </title>
      
      <style>
          /* to prevent items from hiding under sidenav */
          header , .main , footer {
              padding-left: 300px;
          }
          @media only screen and (max-width : 992px){
              header , .main , footer{
                  padding-left: 0;
              }
          }

      </style>
       

    </head>

    <body>
        <!-- Top Navigation bar-->
        <nav class="blue">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="" class="brand-logo center hide-on-small-and-down">Virtual&nbsp;ClassRoom</a>
                    <a href="" class="brand-logo right ">Faculty</a>
                    <a href="" class="button-collapse show-on-large" data-activates="sidenav">
                        
                        <i class="material-icons">menu</i></a>
                       
                </div>

            </div>
        </nav>

        <!-- Side Navigation -->
        <ul class="side-nav fixed" id="sidenav">
            <!-- Side navigation  image and details box -->
            <li>
				<?php
									$user=$_SESSION['fusername'];
									$sql="select image from faculty where username='$user'";
									$res=mysqli_query($conn,$sql);
									$row=mysqli_fetch_assoc($res);
									$image=$row['image'];
									
				?>
                
                <div class="user-view">
                    <div class="background">
                        <img src="../img/img11.jpg" alt="" class="responsive-img">
                    </div>
                     <a href="#modal1" class="modal-trigger">
						<img  class="circle" src="<?php echo "images/".$image;?>" />
					</a>
                    <span class="white-text name"> <?php echo $_SESSION['fusername'];?> </span>
                    <span class="white-text email">
                    <?php
                        $user=$_SESSION['fusername'];
                        $sql="select email from faculty where username='$user'";
                        $res=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($res);
                        echo $row['email'];
                        ?>
                    
                    </span>

                     
        


            

                </div>
            </li>
            <!-- Rest of list items in side navigation-->
            <li >
                <a href="facultyDashboard.php" ><i class="material-icons blue-text">dashboard</i>Dashboard</a>
            </li>
            <li >
                <a href="editProfile.php" ><i class="material-icons blue-text">edit</i>Edit&nbsp;Profile</a>
            </li>
            
             <li>
                <a href="manageCourse.php" ><i class="material-icons blue-text">assignment</i>Manage&nbsp;Course</a>
             </li>
             <li>
                <a href="assessment.php" ><i class="material-icons blue-text">code</i>Assessments</a>
             </li>

             <li>
                <a href="resolveDoubt.php" ><i class="material-icons blue-text">question_answer</i>Resolve&nbsp;Doubts</a>
             </li>
             
             <div class="divider"></div>
             <li>
                    <a href="settings.php" ><i class="material-icons blue-text">settings</i>Settings</a>
               </li>
            
               <li>
                    <a href="logout.php" ><i class="material-icons blue-text">exit_to_app</i>Logout</a>
               </li>
              

        

        </ul>

        <!-- side nav finished -->
		<!-- Popup Box Starts Here -->
					<div class="modal" id="modal1">
						<div class="modal-content">
							<div class="col l6 offset-l3 m8 offset-m2 s12"  style="margin:20px;">
								<div class="card-panel center  teal lighten-5" style="margin-top:1px">
									<h5 style="font-variant: small-caps; font-weight: bold;">Upload&nbsp;Image</h5>
									<form action="navbar.php"  enctype="multipart/form-data" method="post" >
										<div class="file-field input-field">
											<div class="btn">
												<span>Choose&nbsp;Image</span>
												<input type="file" name="file">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
										</div>
										<input type="submit" name="submit" value="Upload Image" class="btn btn-large">
									</form>
									
									<div class="modal-footer teal lighten-5"">
									 <a href="facultyDashboard.php" class="btn-floating btn-large waves-effect waves-light red"><i class="medium material-icons white-text">cancel</i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php
					
						if(isset($_POST['submit']))
						{ 
							$filepath = "images/" . $_FILES["file"]["name"];
							   $image=$_FILES['file'];
							   $img_name=$_FILES['file']['name'];
							  $img_size=$_FILES['file']['size'];
							  $tmp_dir=$_FILES['file']['tmp_name'];
							  $type=$_FILES['file']['type'];
							  if($type =="image/jpeg" || $type=="image/png" || $type=="image/jpg")
							  {
								  if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
								{
								
									$username=$_SESSION['fusername'];
									$img=$_FILES["file"]["name"];
									$sql="update faculty set image='$img' where username='$username'";
									$res=mysqli_query($conn,$sql);
									header("Location: facultyDashboard.php");
								
								} 
								else 
								{
									
									header("Location: facultyDashboard.php");
								}
								
							  }
							  else
							  {
								  
								header("Location: facultyDashboard.php");
							  }

							
						} 
					?>
					
					
					
					<!-- Popup Box Ends Here -->

<?php
     
}
else
{
  $_SESSION['fmessage']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location: facultyLogin.php");
  die("Login To Continue");
}
?>