<?php
  include "navbar.php";
  ?>
  

  <div class="main">
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="padding:10px;">
      <div class="card-panel center  teal lighten-5" style="margin-top:1px">
        <h5 style="font-variant: small-caps; font-weight: bold;">Edit Details</h5>

        <form action="" method="POST">
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="text" id="username" name="username" required>
            <label for="username">Username</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="text" name="name" id="name" required>
            <label for="name">Name</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">phone</i>
            <input id="phone_number" name="phoneNo" type="tel" class="validate" required>
            <label for="phone_number">Telephone</label>
          </div>
          <div class="input-field">
            <select name="branch" id="branch">
              <option value="civilEngineering">Civil&nbsp;Engineering</option>
              <option value="computerScience">Computer&nbsp;Science</option>
              <option value="electronicsAndCommunication">Electronics&nbsp;&&nbsp;Communication</option>
              <option value="mechanicalEngineering">Mechanical&nbsp;Engineering</option>
              <option value="electricalEngineering">Electrical&nbsp;Engineering</option>
            </select>
            <label for="branch">Branch</label>

          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">event</i>
            <input type="number" min="1900" max="2099" step="1" value="2018" required/>
            <label for="year">Year</label>
          </div>
          <input type="submit" name="login" value="Login" class="btn">
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
