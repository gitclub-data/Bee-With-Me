<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$e=$_SESSION['Email'];
$p=$_SESSION['Password'];
$old=$_POST['old'];
$new=$_POST['new'];
if($p==$old)
{
$q="update info set Password='$new' where Email='$e' && Password='$p'";
$result=mysqli_query($con,$q);
if($result==1)
{
header('location:http://localhost/BeeWithMe/bin/logout.php'); 
}
}
else
{
header('location:http://localhost/BeeWithMe/bin/wentwrong.php');
}
mysqli_close($con);
?>