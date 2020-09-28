<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}

$login=$_POST['email'];
$pass=$_POST['password'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'messanger');
$q="select * from info where Email='$login' && Password='$pass'";
$i=mysqli_query($con,$q);
$num=mysqli_num_rows($i);
if($num==1)
{
    $_SESSION['Email']=$login;
    $_SESSION['Password']=$pass;
    header('location:http://localhost/BeeWithMe/bin/Homeshow.php');
}
else
{
    header('location:http://localhost/BeeWithMe/bin/index.php');
}
mysqli_close($con);
?>