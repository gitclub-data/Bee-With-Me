<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
?>
<html>
<head>
    <title>Friend Requests</title>
    <link rel="stylesheet" type="text/css" href="Body-background.css"/>
    <link rel="stylesheet" type="text/css" href="../bin/Hiddenimage.css"/>
    <style>
	#scroll
	{
			overflow-x: hidden;
            overflow-y: scroll;
            height: 500px;
	}
    #link
        {
            background-color: gainsboro;
            color:gray;
            text-decoration: none;
        }
        .myimg
        {
            height: 50px;
            width: 50px;
        }
    </style>
    </head>
    <body>
        <?php include("Upper.php"); ?>
        <?php include("Bootstrap.php"); ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-4 col-md-6 d-none d-md-block">
            <?php include("Side.php"); ?>
            </div>
            <div class="col-lg-8 col-md-6">
            <div class="card" style="margin-top:30px;">
                <div class="card-header">
                <p><?php include("Img.php"); ?>Friend Requests</p>
                </div>
                <div class="card-body" id="scroll">
                    <ul class="list-unstyled">
<?php
$e=$_SESSION['Email'];
include("Connection.php");
$q="select * from friend_request Where Received_by='$e'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
{
    $row=mysqli_fetch_array($result);
    $send=$row['Send_by'];
    $q1="select * from info where Email='$send'";
    $result1=mysqli_query($con,$q1);
    $num=mysqli_num_rows($result1);
    for($i=1;$i<=$num;$i++)
    {
        $row1=mysqli_fetch_array($result1);
        $cmname=$row1['Combined_name'];
        $email=$row1['Email'];
        $img=$row1['Image'];
        echo '<li id="style-list"><a href="http://localhost/BeeWithMe/bin/showpro.php?Email='.$email.'" id="linki"><p class="h6">
        <img src="../image/'.$img.'" class="img-fluid rounded-circle" width="50px" height="50px"/>
                        '.$cmname.':'.$email.'</p></a></li>
';
    }
}

?>
    </ul>
                </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>