<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$e=$_SESSION['Email'];
$p=$_SESSION['Password'];
$q="select * from info where Email='$e' && Password='$p'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
{
$row=mysqli_fetch_array($result);
$First=$row['First_Name'];
$Last=$row['Last_Name'];
$Birth=$row['Birthdate'];
$Gender=$row['Gender'];
$Email=$row['Email'];
}
?>
<html>
<head>
    <title>Profile Information</title>
    <link rel="stylesheet" type="text/css" href="Body-background.css"/>
    <link rel="stylesheet" type="text/css" href="../bin/Hiddenimage.css"/>
    </head>
    <body>
    <?php include("Upper.php");?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-4 col-md-6 d-none d-md-block">
                <?php include("Side.php");?>
            </div>
            
        <div class="col-lg-8 col-md-6">
            <div class="card" style="margin-top:30px;">
            <div class="card-header">
                <P><img src="../image/Bee.JPG" class="img-fluid rounded-circle myimg d-md-none"/>Profile Info...</P>
                </div>
                
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" style="height:380px;">
                <br/>
                <?php
                            echo '<p class="h5">First Name : <small>'.$First.'</small></p>
                <br/>
                <p class="h5">Last Name : <small>'.$Last.'</small></p>
                <br/>
                <p class="h5">Date Of Birth (yy/mm/dd): <small>'.$Birth.'</small></p>
                <br/>
                <p class="h5">Gender : <small>'.$Gender.'</small></p>
                <br/>
                <p class="h5"s>User ID : <small>'.$Email.'</small></p>
                <br/><br/>'
                    ?>
                <div class="text-center">
                <a href="update.php#"><Button class="btn btn-success">Update</Button></a>
                    </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>
</html>