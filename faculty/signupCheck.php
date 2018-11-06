<?php
    include "header.php";
?>


<?php
if($conn)
{
    if(isset($_POST['register'])) //
    {
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $department=$_POST['department'];
       /* echo $email.'<br>';
        echo $username.'<br>';
        echo $password.'<br>';
        echo $department.'<br>';*/
        $email=mysqli_real_escape_string($conn,$email);
        $username=mysqli_real_escape_string($conn,$username);
        $password=mysqli_real_escape_string($conn,$password);
        $email=htmlentities($email);
        $username=htmlentities($username);
        $password=htmlentities($password);
        $password=password_hash($password,PASSWORD_BCRYPT);
       /*echo $email.'<br>';
        echo $username.'<br>';
        echo $password.'<br>';
        echo $department.'<br>';
        echo strlen($password).'<br>';
        */
        $sql1="select * from facultySignUp where email='$email' or username='$username'";
        $sql2="select * from faculty where email='$email' or username='$username'";
        $res1=mysqli_query($conn,$sql1);
        $res2=mysqli_query($conn,$sql2);
        /*print_r($res1);
        echo 'signup'.'<br>';
        print_r($res2);
        echo '<br>';*/

        

        if(mysqli_num_rows($res2)>0)
        {
            header("Location: facultyLogin.php");
            $_SESSION['fmessage']="<div class='chip red black-text'>Account Already Exists,Please Login to Continue</div>";
			die("Account Already Exists");
        }
        else
        {
            
            if(mysqli_num_rows($res1)>0)
            {
                header("Location: facultyLogin.php");
                $_SESSION['fmessage']="<div class='chip red black-text'>Registration Request Exists , Wait For Verification</div>";
				die("Registration Request Exists");
            }
            else
            {
                $sql="insert into facultysignUp(email,username,password,department) values('$email','$username','$password','$department')";
                $res=mysqli_query($conn,$sql);
                if($res)
                {
                    header("Location: facultyLogin.php");
                    $_SESSION['fmessage']="<div class='chip green white-text'>Registration Request Submitted</div>";
					die("Registration Request Submitted");
                }
                else
                {
                    header("Location: signupCheck.php");
                    $_SESSION['fmessage']="<div class='chip red black-text'>Sorry Something Went Wrong,Please Register Again</div>";
					die("Sorry Something Went Wrong");
                }
            }
            
        }

    }
    else
    {
         $_SESSION['fmessage']="<div class='chip red black-text'> Invalid Access </div>";
       header("Location: facultyLogin.php");
	   die("Invalid Access");
    }

}
else
{
    $_SESSION['fmessage']="<div class='chip red black-text'> Connection failed</div>";
    header("Location: facultyLogin.php");
	die("Connection failed");
}
?>

