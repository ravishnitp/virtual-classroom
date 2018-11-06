<?php
include "header.php";
if(isset($_SESSION['susername']))
{
unset($_SESSION['susername']);
$_SESSION['smessage']="<div class='chip green white-text'>You have been successfully Logged Out.</div>";
header("Location: studentLogin.php");
}
else
{
  $_SESSION['smessage']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location: studentLogin.php");
}
?>
