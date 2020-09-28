<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
$f=$_FILES['file'];
$m=$_SESSION['Email'];
include("Connection.php");
$g=rand(10000001,99999999);
$q2="select * from proimage where Image='$g'";
$result=mysqli_query($con,$q2);
$num=mysqli_num_rows($result);
if($num>=1)
{
    header("location:http://localhost/BeeWithMe/bin/Upper.php");
}
else
{
$q="insert into proimage(Email,Image) values ('$m','$g')";
$q1="update info set Image='$g' where Email='$m'";
$result2=mysqli_query($con,$q);
$result3=mysqli_query($con,$q1);
if($f['type']=="image/jpeg"||$f['type']=="image/png"||$f['type']=="image/jpg")
{
    move_uploaded_file($f['tmp_name'],"../image/".$g);
     header("location:http://localhost/BeeWithMe/bin/Homeshow.php");
}
else
{
     header("location:http://localhost/BeeWithMe/bin/Homeshow.php");
}
}
mysqli_close($con);
?>