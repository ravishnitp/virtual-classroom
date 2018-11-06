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
        $name=$_POST['name'];
        $sYear=$_POST['sYear'];
       /*echo $email.'<br>';
        echo $username.'<br>';
        echo $password.'<br>';
        echo $department.'<br>';*/
        $email=mysqli_real_escape_string($conn,$email);
        $username=mysqli_real_escape_string($conn,$username);
        $password=mysqli_real_escape_string($conn,$password);
        $sYear=mysqli_real_escape_string($conn,$sYear);
        $email=htmlentities($email);
        $username=htmlentities($username);
        $password=htmlentities($password);
        $password=password_hash($password,PASSWORD_BCRYPT);
        $sYear=htmlentities($sYear);
       /*echo $email.'<br>';
        echo $username.'<br>';
        echo $password.'<br>';
        echo $name.'<br>';
        echo strlen($password).'<br>';*/
        
 
        $sql2="select * from students where email='$email' or username='$username'";
        $res2=mysqli_query($conn,$sql2);
        /*print_r($res1);
        echo 'signup'.'<br>';
        print_r($res2);
        echo '<br>';*/

        

        if(mysqli_num_rows($res2)>0)
        {
            header("Location: studentLogin.php");
            $_SESSION['smessage']="<div class='chip red black-text'>Account Already Exists,Please Login to Continue</div>";
        }
        else
        {
            
        
                $sql="insert into students(username,password,name,email,sYear) values('$username','$password','$name','$email','$sYear')";
                $res=mysqli_query($conn,$sql);
                if($res)
                {
                    header("Location: studentLogin.php");
                    $_SESSION['smessage']="<div class='chip green white-text'>Registration&nbsp;Completed&nbsp;Successfully,&nbsp;Login&nbsp;To&nbsp;Continue</div>";
                }
                else
                {
                    header("Location: signupCheck.php");
                    $_SESSION['smessage']="<div class='chip red black-text'>Sorry Something Went Wrong,Please Register Again</div>";
                }
            
            
        }

    }
    else
    {
         $_SESSION['smessage']="<div class='chip red black-text'> Invalid Access </div>";
       header("Location: studentLogin.php");
    }

}
else
{
    $_SESSION['smessage']="<div class='chip red black-text'> Connection failed</div>";
    header("Location: studentLogin.php");
}
?>

