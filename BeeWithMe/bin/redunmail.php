<?php
include("Connection.php");
$evalue=$_GET['evalue'];
$q="select * from info where Email='$evalue'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num>0)
{
	echo "This Email Has Already taken by someone";
}
	mysqli_close($con);
?>