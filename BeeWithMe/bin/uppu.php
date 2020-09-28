<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$e=$_SESSION['Email'];
$p=$_SESSION['Password'];
$about1=$_POST['about1'];
$about2=$_POST['about2'];
$about3=$_POST['about3'];
$about4=$_POST['about4'];
$q="update info set About1='$about1',About2='$about2',About3='$about3',About4='$about4' where Email='$e' && Password='$p'";
$result=mysqli_query($con,$q);
header("location:http://localhost/BeeWithMe/bin/Homeshow.php");
mysqli_close($con);
?>