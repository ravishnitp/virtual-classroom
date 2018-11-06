<?php
include "header.php";
if(!isset($_SESSION['susername']))
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
      <title> Student&nbsp;Login&nbsp; </title>
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
                                  <a class="brand-logo left hide-on-small-and-down">Virtual&nbsp;ClassRoom</a>
                                  <a class="brand-logo center">Student&nbsp;Login</a>
								  <a class='dropdown-button btn blue right brand-logo' href='' data-beloworigin="true" data-activates='dropdown'><i class="material-icons blue white-text">help</i>Not&nbsp;A&nbsp;Student</a>

                                </div>
                            </div>
                    </nav>
            </div>
			
			<!-- Dropdown Structure -->
								  <ul id='dropdown' class='dropdown-content'>
									<li ><a href="../admin/adminLogin.php">Login&nbsp;As&nbsp;Admin</a></li>
									<li class="divider" tabindex="-1"></li>
									<li><a href="../faculty/facultyLogin.php">Login&nbsp;As&nbsp;Faculty</a></li>
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
                                <li class="tab">
                                <a href="#register" class="black-text">Register</a>
                                </li>
                            </ul>
                        </div>
                    
                    </div>
                    <!-- login page here -->

                <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" >
                    <!-- change color for login tab here -->
                    <div class="card-panel center amber lighten-5" style="margin-top:1px">
                        <h5>Login To Continue</h5>
                        <?php
                            if(isset($_SESSION['smessage']))
                            {
                            echo $_SESSION['smessage'];
                            unset($_SESSION['smessage']);
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

                <!-- signUp page here -->

                <div class="col l6 offset-l3 m8 offset-m2 s12" id="register">
                    <!-- change color for register tab here -->
                    <div class="card-panel center pink lighten-5" style="margin-top:1px">
                        <h5>Register Now</h5>
                        <form action="signupCheck.php" method="POST">
                        <div class="input-field">
                            <input type="email" name="email" id="email" placeholder="Enter Email" class="validate"> 
                            <label for="email" data-error="Invalid Email Format" data-success="Valid Email"></label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-field">
                        <input type="text" id="name" name="name" placeholder="name">
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">event</i>
                                <input type="number" min="1900" max="2099" step="1" value="2018" name="sYear" required id=sYear/>
                                <label for="session">Session</label>
                            </div>
                          
                            <input type="submit" name="register" class="btn btn-large" value="register">
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

		//custom js & jquery code here 
        $('select').material_select();
		$('.dropdown-button').dropdown({
				constrainWidth:false;
				
			  });
	    });
	  </script>	

    </body>
  </html>
  <?php

}
else
{
    $_SESSION['smessage']="<div class='chip red black-text'>Login To Continue</div>";
    header("Location: studentLogin.php");
}
?>