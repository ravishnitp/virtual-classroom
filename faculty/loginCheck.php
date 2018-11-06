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
        $sql="select password from faculty where username='$username'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $dbpass=$row['password'];
        if(password_verify($password,$dbpass)){  //$password === $dbpass replace if condition after database creation
            $_SESSION['fusername']=$username;
            header("Location:  facultyDashboard.php");
			die("Login Done Successfully ");
        }
        else{
            $_SESSION['fmessage']="<div class='chip red black-text'> Sorry, Credentials Don't Match</div>";
            header("Location: facultyLogin.php");
			die("Credentials Don't Match");
        }
    }
    else
    {
        header("Location: facultyLogin.php");
        $_SESSION['fmessage']="<div class='chip red black-text'> Invalid Access</div>";
       die("Invalid Access");
    }

}
else
{
	header("Location: facultyLogin.php");
    $_SESSION['fmessage']="<div class='chip red black-text'> Connection failed</div>";
	die("Connection Failed");
    
}
?>

