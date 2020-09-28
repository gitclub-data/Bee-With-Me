<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$e=$_SESSION['Email'];
$p=$_SESSION['Password'];
$email=$_POST['email'];
$q="update info set Email='$email' where Email='$e' && Password='$p'";
$q1="update friend set First_person='$email' where First_person='$e'";
$q2="update friend set Second_person='$email' where Second_person='$e'";
$q3="update friend_request set Send_by='$email' where Send_by='$e'";
$q4="update friend_request set Received_by='$email' where Received_by='$e'";
$q5="update message set Send_By='$email' where Send_By='$e'";
$q6="update message set Received_By='$email' where Received_By='$e'";
$q7="update proimage set Email='$email' where Email='$e'";
$result=mysqli_query($con,$q);
$result1=mysqli_query($con,$q1);
$result2=mysqli_query($con,$q2);
$result3=mysqli_query($con,$q3);
$result4=mysqli_query($con,$q4);
$result5=mysqli_query($con,$q5);
$result6=mysqli_query($con,$q6);
$result7=mysqli_query($con,$q7);
if($result==1)
{
header('location:http://localhost/BeeWithMe/bin/logout.php'); 
}
else
{
header('location:http://localhost/BeeWithMe/bin/wentwrong2.php');
}
mysqli_close($con);
?>