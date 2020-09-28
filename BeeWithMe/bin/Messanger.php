<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
?>
<html>
<head>
    <title>Messanger</title>
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
                <p><?php include("Img.php"); ?>Messanger</p>
                </div>
                <div class="card-body" id="scroll">
                <ul class="list-unstyled">
                    <?php
$e=$_SESSION['Email'];
include("Connection.php");
$q="select * from friend Where First_person='$e'";
$result=mysqli_query($con,$q) or die(mysqli_error($con));
$q1="select * from friend Where Second_person='$e'";
$result1=mysqli_query($con,$q1) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0)
{
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
{
    $row=mysqli_fetch_array($result);
    $person=$row['Second_person'];
    $q2="select * from info where Email='$person'";
    $result2=mysqli_query($con,$q2);
    $num2=mysqli_num_rows($result2);
    for($iw=1;$iw<=$num2;$iw++)
    {
        $row3=mysqli_fetch_array($result2);
        $cmname1=$row3['Combined_name'];
        $email1=$row3['Email'];
        $img1=$row3['Image'];
        echo '<li><a href="Textbox.php?Email='.$email1.'"><p id="link"><img src="../image/'.$img1.'" class="img-fluid rounded-circle myimg"/>'.$cmname1.'</p></a></li>';
    }
    
}
}
if(mysqli_num_rows($result1)>0)
{
$num1=mysqli_num_rows($result1);
for($j=1;$j<=$num1;$j++)
{
    $row1=mysqli_fetch_array($result1);
    $person1=$row1['First_person'];
    $q4="select * from info where Email='$person1'";
    $result4=mysqli_query($con,$q4);
    $num4=mysqli_num_rows($result4);
    for($ir=1;$ir<=$num4;$ir++)
    {
        $row4=mysqli_fetch_array($result4);
        $cmname=$row4['Combined_name'];
        $email=$row4['Email'];
        $img=$row4['Image'];
        echo '<li><a href="Textbox.php?Email='.$email.'"><p id="link"><img src="../image/'.$img.'" class="img-fluid rounded-circle myimg"/>'.$cmname.'</p></a></li>';
    }
        
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