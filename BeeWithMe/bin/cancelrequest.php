<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$mail=$_GET['Email'];
$e=$_SESSION['Email'];
$q="delete from friend_request where Send_by='$e' && Received_by='$mail'";
$result=mysqli_query($con,$q) or die(mysqli_error($con));
header("location:http://localhost/BeeWithMe/bin/showpro.php?Email=$mail");
mysqli_close($con);
?>