<?php
include("Connection.php");
$gumber=$_GET['str'];
$mnumber="91".$gumber;
$q="select * from info where Mobile_Number='$mnumber'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
$numlength = mb_strlen($gumber);
if($gumber=="")
{
	echo "";
}
else
{
if($gumber<=0)
{
	echo "Please Write Your Number Correctly";
}
else
{
if($numlength!=10)
	{
		echo "Please Write Correct Phone Number";
	}
else
	{
if($num==1)
{
	echo "This Number is already registered by other id";
}
}
}
}
mysqli_close($con);
?>