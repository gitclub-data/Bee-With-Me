<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$e=$_SESSION['Email'];
$evalue=$_GET['evalue'];
$q="select * from info where Email='$evalue'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($evalue==$e)
{
	echo "";
}
	else
	{
if($num>0)
{
	echo "This Email Has Already taken by someone";
}
	}
?>