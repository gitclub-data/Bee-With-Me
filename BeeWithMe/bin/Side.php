<?php
include("Connection.php");
$e=$_SESSION['Email'];
$p=$_SESSION['Password'];
$q="select * from info where Email='$e' && Password='$p'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
{
$row=mysqli_fetch_array($result);
$img=$row['Image'];
$about1=$row['About1'];
$about2=$row['About2'];
$about3=$row['About3'];
$about4=$row['About4'];
$com=$row['Combined_name'];
}
?>
<html>
<head>
    
    </head>
    <body>
     <div class="card" style="margin-top:30px;">
        <div class="card-header">
            <p class="h6"><?php echo $com; ?></p>
            
            </div>
            <?php
             echo'<div class="card-body text-center bg-secondary">
            <img src="../image/'.$img.'" width="200px" height="200px" class="img-fluid rounded-circle"/>'
            ?>
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
    </body>
</html>