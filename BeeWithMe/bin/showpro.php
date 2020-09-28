<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
$g=$_SESSION['Email'];
$email=$_GET['Email'];
$q="select * from info Where Email='$email'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
    {
        $row=mysqli_fetch_array($result);
        $cmname=$row['Combined_name'];
        $Img=$row['Image'];
        $about1=$row['About1'];
        $about2=$row['About2'];
        $about3=$row['About3'];
        $about4=$row['About4'];
}
$q2="select * from friend_request Where Send_by='$g' && Received_by='$email'";
$q23="select * from friend_request Where Send_by='$email' && Received_by='$g'";
$q9="select * from friend_request Where Send_by='$email' && Received_by='$g'";
$result9=mysqli_query($con,$q9) or die(mysqli_error($con));
$result2=mysqli_query($con,$q2) or die(mysqli_error($con));
$result23=mysqli_query($con,$q23) or die(mysqli_error($con));
$q7="select * from friend Where First_person='$g' && Second_person='$email'";
$result7=mysqli_query($con,$q7) or die(mysqli_error($con));
$q18="select * from friend Where First_person='$email'";
$q19="select * from friend Where Second_person='$email'";
$result18=mysqli_query($con,$q18) or die(mysqli_error($con));
$result19=mysqli_query($con,$q19) or die(mysqli_error($con));
$q8="select * from friend Where First_person='$email' && Second_person='$g'";
$result8=mysqli_query($con,$q8) or die(mysqli_error($con));
?>

<html>
<head>
        <link rel="stylesheet" type="text/css" href="Body-background.css"/>
    </head>
    <style>
        #lis{
        width:100px;
        background-color: white;
        opacity: .9;
        color: darkblue;
        text-align: center;
        display: block; 
        }
        #lis:hover
        {
            background-color: darkgrey;
        }
		#scroll
		{
			overflow-x: hidden;
            overflow-y: scroll;
            height: 480px;
		}
        #lis1
        {
         display: block;   
        }
        #lis2
        {
          display: none;   
        }
        #lis:hover #lis2
        {
        display: block;    
        }
    </style>
    <body>
<?php
include("Bootstrap.php");
include("Upper.php");
?>    
<div class="container-fluid">
        <div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="card" style="margin-top:20px;">
        <div class="card-header">
            <p class="h6"><?php echo $cmname;?><span><button class="btn btn-outline-secondary d-md-none" data-toggle="modal" data-target="#moodel">Profile Pictures</button></span></p>
            </div>
            <div class="card-body text-center bg-secondary">
                <?php
            if(mysqli_num_rows($result2)>0)
            {
            echo '<div class="text-left"><a href="cancelrequest.php?Email='.$email.'"><button class="btn btn-sm">Cancel Request</button></a></div>';
            }
            else
            {
                if(mysqli_num_rows($result2)==0&&mysqli_num_rows($result23)==0&&mysqli_num_rows($result7)==0&&mysqli_num_rows($result8)==0)
                {
            echo '<div class="text-left"><a href="Addfriend.php?Email='.$email.'"><button class="btn btn-sm">Add Friend</button></a></div>';
                }
                else
                {
                    if(mysqli_num_rows($result7)>0||mysqli_num_rows($result8)>0)
                    {
            echo '<ul class="list-unstyled">
            <li id="lis">Friends
           <ul class="list-unstyled" id="lis1">
            <li id="lis2"><a href="unfriend.php?Email='.$email.'">Unfriend</a></li>
           </ul>
                </li>';
                    }
                    else
                    {
                        if(mysqli_num_rows($result9)>0)
                        {
                       echo '<ul class="list-unstyled">
            <li id="lis"><a href="Confirm.php?Email='.$email.'">Accept</a>
           <ul class="list-unstyled" id="lis1">
            <li id="lis2"><a href="canceluserrequest.php?Email='.$email.'">Denay</a></li>
           </ul>
                </li>';
                        }
                    }
                }
            }
               ?>
                <spam style="position:fixed; top:150px;left:290px;color:white;">Total Friend : <?php echo mysqli_num_rows($result18)+mysqli_num_rows($result19);?></spam><p>
            
                <?php echo '<img src="../image/'.$Img.'" width="200px" height="200px" class="img-fluid rounded-circle"/>';?>
                <br/><br/>
                </div>
             <div class="card-footer">
                <p class="h6">About :</p>
                <?php
                echo '<p>'.$about1.'</p>';
                echo '<p>'.$about2.'</p>';
                echo '<p>'.$about3.'</p>';
                echo '<p>'.$about4.'</p>';
                ?>
                
        </div>
    </div>
        </div>
            
    
        <div  class="col-lg-8 col-md-6 d-none d-md-block">
        <div class="card" style="margin-top:20px;">
           <div class="card-header">Profile Pictures</div>
                
                <div class="card-body"  id="scroll">
                     <?php
                    include("Connection.php");
                $q1="select * from proimage where Email='$email'";
                $result1=mysqli_query($con,$q1);
                $num1=mysqli_num_rows($result1);
                      for($i=1;$i<=$num1;$i++)
                    {
                        $row1=mysqli_fetch_array($result1);
                        $val=$row1['Image'];
                        echo '<img src="../image/'.$val.'" width="200px" height="200px"  style="margin:30px;" class="img-fluid"/>';
                    }
                    ?>                   
            </div>
           </div>        
    </div>
            </div>
    <div class="modal fade" id="moodel">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                Profile Pictures
                    <div class="text-right">
                          <button class="btn btn-danger" data-dismiss="modal">X</button>
                      </div>
                </div>
                
                <div class="modal-body"  id="scroll">
                <?php  
                $q3="select * from proimage where Email='$email'";
                $result3=mysqli_query($con,$q3);
                    for($i=1;$i<=$num1;$i++)
                    {
                        $row1=mysqli_fetch_array($result3);
                        $val=$row1['Image'];
                        echo '<img src="../image/'.$val.'" width="200px" height="200px"  style="margin:30px;" class="img-fluid"/>';
                    }
                    mysqli_close($con);
                    ?>                   
                </div>
                </div>
            </div>
        </div>    
    </body>
</html>