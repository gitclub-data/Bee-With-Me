<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$email=$_GET['Email'];
$g=$_SESSION['Email'];
$q7="select * from friend Where First_person='$g' && Second_person='$email'";
$result7=mysqli_query($con,$q7) or die(mysqli_error($con));
$q8="select * from friend Where First_person='$email' && Second_person='$g'";
$result8=mysqli_query($con,$q8) or die(mysqli_error($con));
if(mysqli_num_rows($result7)>0)
{
    $q="delete from friend where First_person='$g' && Second_person='$email'";
}
else
{
if(mysqli_num_rows($result8)>0)
{
    $q="delete from friend where First_person='$email' && Second_person='$g'";
}
}
$result=mysqli_query($con,$q) or die(mysqli_error($con));
header("location:http://localhost/BeeWithMe/bin/showpro.php?Email=$email");
?>