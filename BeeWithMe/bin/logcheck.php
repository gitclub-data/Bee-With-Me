<?php
include("Connection.php");
$e=$_GET['e'];
$p=$_GET['p'];
$q="select * from info where Email='$e' && Password='$p'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($e==""&&$p=="")
{
	echo "Please type your username and password";
}
else
{
if($e=="")
{
	echo "Please type your username";
}
else
{
	if($p=="")
	{
		echo "Please type your Password";
	}
	else
	{		
	if($num!=1)
	{
		echo "Your Password is wrong";
	}
	}
}
}
?>