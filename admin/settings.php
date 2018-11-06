<?php
include "navbar.php";
?>

<div class="main">
    <nav class="blue">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="" class="brand-logo right ">Settings</a>
                </div>

            </div>
        </nav>

    <div class="row" style="margin-top:100px">
        <div class="col l8 offset-l2 m8 offset-m2 s12">
            <div class="card-panel">
                <h5 class="center">Settings</h5>
                <?php
                if(isset($_SESSION['message']))
                {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                }
                ?>
                <form action="settings.php" method="POST">

                <div class="input-field">
                    <input type="password" name="password" id="password">
                    <label for="password">New&nbsp;Password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="conf_password" id="conf_password">
                    <label for="conf_password">Confirm&nbsp;New&nbsp;Password</label>
                </div>
                <div class="center">
                    <input type="submit" name="update" value="Change Password" class="btn">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>

<?php
if(isset($_POST['update']))
{
  $password=$_POST['password'];
  $password=mysqli_real_escape_string($conn,$password);
  $password=htmlentities($password);
  $conf_password=$_POST['conf_password'];
  $conf_password=mysqli_real_escape_string($conn,$conf_password);
  $conf_password=htmlentities($conf_password);
  if($conf_password===$password)
  {
    $username=$_SESSION['username'];
    $sql="update admin set password='$password' where username='$username'";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        $_SESSION['message']="<div class='chip green white-text'>Password Successfully Changed.</div>";
        header("Location: settings.php");
    }
    else
    {
        $_SESSION['message']="<div class='chip red black-text'>Sorry, Something went wrong, Please Try Again.</div>";
        header("Location: settings.php");
  }
}
else
{
  $_SESSION['message']="<div class='chip red black-text'>Password donot Match.</div>";
  header("Location: settings.php");
}
}
?>