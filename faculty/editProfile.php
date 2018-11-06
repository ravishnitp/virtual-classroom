<?php
  include "navbar.php";
  ?>
  

  <div class="main">
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
      <div class="card-panel center  teal lighten-5" style="margin-top:1px">
        <h5 style="font-variant: small-caps; font-weight: bold;">Edit&nbsp;Profile</h5>
        <?php
           if(isset($_SESSION['fmessage']))
           {
             echo $_SESSION['fmessage'];
             unset($_SESSION['fmessage']);
            }
        ?>
                            

        <form action="editProfileCheck.php" method="POST">
        <?php
                        $user=$_SESSION['fusername'];
                        $sql="select * from faculty where username='$user'";
                        $res=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($res);
                        //echo $row['email'];
        ?>
        
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input name="username" readonly value="<?php echo $_SESSION['fusername'];?>" id="username" type="text" class="validate" >
            <label for="username">Username</label>
          </div>
         
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="text" name="name" id="name"required value="<?php echo $row['name'];?> ">
            <label for="name">Name</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">email</i>
            <input type="email" name="email" id="email" class="validate" required value="<?php echo $row['email'];?>" >
            <label for="email" data-error="Invalid Email Format" data-success="Valid Email">Email</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">phone</i>
            <input id="phone_number" name="phoneNumber" type="tel" class="validate" value="<?php echo $row['phoneNumber'];?>"required>
            <label for="phone_number">Telephone</label>
          </div>
          
          
            <div class="input-field">
            <select name="department" id="department" >
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
            
          
          <input type="submit" name="update" value="Update" class="btn btn-large">
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



 