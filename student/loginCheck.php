<?php
    include "header.php";
?>


<?php
if($conn)
{
    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $username=mysqli_real_escape_string($conn,$username);
        $password=mysqli_real_escape_string($conn,$password);
        $username=htmlentities($username);
        $password=htmlentities($password);
        $sql="select password from students where username='$username'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $dbpass=$row['password'];
        if(password_verify($password,$dbpass)){  //$password === $dbpass replace if condition after database creation
            $_SESSION['susername']=$username;
            header("Location: studentDashboard.php");
        }
        else{
            $_SESSION['smessage']="<div class='chip red black-text'> Sorry, Credentials Don't Match</div>";
            header("Location: studentLogin.php");
        }
    }
    else
    {
        header("Location: studentLogin.php");
        $_SESSION['smessage']="<div class='chip red black-text'> Invalid Access</div>";
        header("Location: studentLogin.php");
    }

}
else
{
    $_SESSION['smessage']="<div class='chip red black-text'> Connection failed</div>";
    header("Location: studentLogin.php");
}
?>

