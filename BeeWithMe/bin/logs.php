<html>
<head>
<body>
<?php
include("Bootstrap.php");
 ?>
<div class="container">
<div class="row" style="">
<?php
$usname=$_GET['usname'];
$sname=$_GET['sname'];
include("Connection.php");
$q1="select * from message where Send_By='$usname' && Received_By='$sname'|| Send_By='$sname' && Received_By='$usname'";
$result1=mysqli_query($con,$q1);
$num=mysqli_num_rows($result1);
for($i=1;$i<=$num;$i++)
{
	$row=mysqli_fetch_array($result1);
	if($row['Send_By']==$usname && $row['Received_By']==$sname)
	{
	echo "
	<div class='col-sm-6' style='padding:4px;'>
	</div>
	<div class='col-sm-6' style='padding:4px;'>
<div class='text-right' style='border-radius:5px; background-color: antiquewhite;'>"
.$row['Message']."<br/></div>
</div>
";
	}
	else
	{
		if($row['Send_By']==$sname && $row['Received_By']==$usname)
		{
	echo "
	<div class='col-sm-6' style='padding:4px;'>
		<div style='border-radius:5px; background-color:aquamarine;' style='padding:4px;'>
		".$row['Message']."<br/>
	</div>
	</div>
	<div class='col-sm-6'>
	</div>
	";
		}
	}
	}
mysqli_close($con);
?>
</div>
</div>
</body>
</head>
</html>
