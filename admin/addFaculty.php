<?php
  include "navbar.php";
  ?>
  

  <div class="main">
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
      <div class="card-panel center  teal lighten-5" style="margin-top:1px">
        <h5 style="font-variant: small-caps; font-weight: bold;">Add&nbsp;Faculty</h5>
        <?php
           if(isset($_SESSION['message']))
           {
             echo $_SESSION['message'];
             unset($_SESSION['message']);
            }
        ?>
                            

        <form action="addFaculty.php" method="POST">
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="text" id="username" name="username" required>
            <label for="username">Username</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="password" id="password" name="password" required>
            <label for="password">Password</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="text" name="name" id="name" required>
            <label for="name">Name</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">email</i>
            <input type="email" name="email" id="email" class="validate" required>
            <label for="email" data-error="Invalid Email Format" data-success="Valid Email">Email</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">phone</i>
            <input id="phone_number" name="phoneNumber" type="tel" class="validate" required>
            <label for="phone_number">Telephone</label>
          </div>
          
          
            <div class="input-field">
            <select name="department" id="department">
              <option value="civilEngineering">Civil&nbsp;Engineering</option>
              <option value="computerScience">Computer&nbsp;Science</option>
              <option value="electronicsAndCommunication">Electronics&nbsp;&&nbsp;Communication</option>
              <option value="electricalEngineering">Electrical&nbsp;Engineering</option>
              <option value="mechanicalEngineering">Mechanical&nbsp;Engineering</option>
              <option value="chemistry">Chemistry</option>
              <option value="physics">Physics</option>
              <option value="mathematics">Mathematics</option>
              
            </select>
            <label for="department">Department</label>
            </div>
            
          
          <input type="submit" name="submit" value="Submit" class="btn btn-large">
        </form>
      </div>
    </div>
  </div>
  <?php
include "footer.php";
?>

  
  <script>
    $(document).ready(function () {
      // Custom JS & jQuery here
      $('select').material_select();
    });
  </script>


<?php
     /* php code to add faculty */

 if($conn)
 {
     if(isset($_POST['submit'])) //
     {
         $email=$_POST['email'];
         $username=$_POST['username'];
         $password=$_POST['password'];
         $department=$_POST['department'];
         $phoneNumber=$_POST['phoneNumber'];
         $name=$_POST['name'];
        /* echo $email.'<br>';
         echo $username.'<br>';
         echo $password.'<br>';
         echo $department.'<br>';*/
         /*prevent sql injection */
         $email=mysqli_real_escape_string($conn,$email);
         $username=mysqli_real_escape_string($conn,$username);
         $password=mysqli_real_escape_string($conn,$password);
         $department=mysqli_real_escape_string($conn,$department);
         $phoneNumber=mysqli_real_escape_string($conn,$phoneNumber);
         $name=mysqli_real_escape_string($conn,$name);
         /* prevent scripting */

         $email=htmlentities($email);
         $username=htmlentities($username);
         $password=htmlentities($password);
         $department=htmlentities($department);
         $phoneNumber=htmlentities($phoneNumber);
         $name=htmlentities($name);
         
         $password=password_hash($password,PASSWORD_BCRYPT);
        /*echo $email.'<br>';
         echo $username.'<br>';
         echo $password.'<br>';
         echo $department.'<br>';
         echo strlen($password).'<br>';
         */
        
         $sql2="select * from faculty where email='$email' or username='$username'";
         
         $res2=mysqli_query($conn,$sql2);
         /*print_r($res1);
         echo 'signup'.'<br>';
         print_r($res2);
         echo '<br>';*/
 
         
 
         if(mysqli_num_rows($res2)>0)
         {
             header("Location: addFaculty.php");
             $_SESSION['message']="<div class='chip red black-text'>Account Already Exists</div>";
         }
         else
         {
             
             
             
                 $sql="insert into faculty(email,username,password,department,name,phoneNumber) values('$email','$username','$password','$department','$name',$phoneNumber)";
                 $res=mysqli_query($conn,$sql);
                 if($res)
                 {
                     header("Location: addFaculty.php");
                     $_SESSION['message']="<div class='chip green white-text'>Faculty Successfully Added</div>";
                 }
                 else
                 {
                     header("Location: addFaculty.php");
                     $_SESSION['message']="<div class='chip red black-text'>Sorry Something Went Wrong,Please try Again</div>";
                 }
             
             
         }
 
     }
     
 
 }
 else
 {
     $_SESSION['message']="<div class='chip red black-text'> Connection failed</div>";
     header("Location: addFaculty.php");
 }
 ?>
 
 



