<?php
include "header.php";
if(isset($_SESSION['fusername']))
{
unset($_SESSION['fusername']);
$_SESSION['fmessage']="<div class='chip green white-text'>You have been successfully Logged Out.</div>";
header("Location: facultyLogin.php");
die("Successfully Logged Out ");
}
else
{
  $_SESSION['fmessage']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location: facultyLogin.php");
  die("login to continue");
}
?>
