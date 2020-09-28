<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
$first=$_GET['first'];
$last=$_GET['last'];
$date=$_GET['date'];
$gender=$_GET['gender'];
$combine=$first." ".$last;
include("Connection.php");
$e=$_SESSION['Email'];
$p=$_SESSION['Password'];
$q="update info set First_Name='$first',Last_Name='$last',Combined_name='$combine',Birthdate='$date',Gender='$gender' where Email='$e' && Password='$p'";
$result=mysqli_query($con,$q);
mysqli_close($con);
?>