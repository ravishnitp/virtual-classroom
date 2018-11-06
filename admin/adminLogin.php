<?php
include "header.php";
if(!isset($_SESSION['username']))
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
      <title> Admin&nbsp;Login&nbsp; </title>
      <style>
        ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        color:    #909;
        }
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #909;
        opacity:  1;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #909;
        opacity:  1;
        }
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color:    #909;
        }
        ::-ms-input-placeholder { /* Microsoft Edge */
        color:    #909;
        }

        ::placeholder { /* Most modern browsers support this now. */
        color:    #909;

        }
        .navbar-fixed .nav-wrapper .brand-logo img {
        height: 64px;
}        
        </style>
     

    </head>

    <body>

            <div class="navbar-fixed">

                    <nav class="blue">
                            <div class="nav-wrapper">
                                <div class="container">
								<!-- Dropdown Trigger -->
								  <a class='dropdown-button btn blue right brand-logo' href='' data-beloworigin="true" data-activates='dropdown'><i class="material-icons blue white-text">help</i>Not&nbsp;An&nbsp;Admin</a>
								  
                               
                                  <a class="brand-logo left hide-on-small-and-down">Virtual&nbsp;ClassRoom</a>
                                  <a class="brand-logo center">Admin&nbsp;Login</a>
                                </div>
                            </div>
                    </nav>
            </div>
			<!-- Dropdown Structure -->
								  <ul id='dropdown' class='dropdown-content'>
									<li ><a href="../faculty/facultyLogin.php">Login&nbsp;As&nbsp;Faculty</a></li>
									<li class="divider" tabindex="-1"></li>
									<li><a href=../student/studentLogin.php">Login&nbsp;As&nbsp;Student</a></li>
									</ul>
				<body style="background-image:url('../img/login.jpg');background-size:cover;background-repeat:no-repeat;">
                <div class="row" style="margin-top:100px">
                    <div class="col l6 offset-l3 m8 offset-m2 s12">
                        <!-- change color for slider tab  here -->
                        <div class="card-panel center teal accent-1" style="margin-bottom:0px">
                            <ul class="tabs teal accent-1">
                                <li class="tab">
                                <a href="#login" class="black-text">Login</a>
                                </li>
                                
                            </ul>
                        </div>
                    
                    </div>
                    
                <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" >
                    <!-- change color for login tab here -->
                    <div class="card-panel center amber lighten-5" style="margin-top:1px">
                        <h5>Login To Continue</h5>
                        <?php
                            if(isset($_SESSION['message']))
                            {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            }
                        ?>
                            <form action="loginCheck.php" method="POST">
                                <div class="input-field">
                                    <input type="text" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="input-field">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <input type="submit" name="login" value="Login" class="btn">
                            </form>
                    </div>
                </div>

                
                </div>
                
          <!--JavaScript at end of body for optimized loading-->
	  <!-- import jquery before materialize.js -->
	  <script type="text/javascript" src="../js/jquery.js"></script>
	  <script type="text/javascript" src="../js/materialize.min.js"></script>
	  <script>
	    $(document).ready(function(){
			  $('.dropdown-button').dropdown({
				constrainWidth:false;
				
			  });


		//custom js & jquery code here 

	    });
	  </script>	

    </body>
  </html>
<?php

}
else
{
    unset($_SESSION['username']);
   header("Location: ../index.html");
}
?>
