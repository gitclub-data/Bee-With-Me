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
$com=$row['Combined_name'];
$img=$row['Image'];
$about1=$row['About1'];
$about2=$row['About2'];
$about3=$row['About3'];
$about4=$row['About4'];
}
?>
<html>
<head>
<style>
#scroll{
	overflow-x: hidden;
            overflow-y: scroll;
            height: 520px;
}
</style>
    <title>Home</title>
    <link rel="icon" href="../image/Bee.JPG"/>
    <link rel="stylesheet" type="text/css" href="../bin/Body-background.css"/>
    </head>
    <body>
        <?php include("Upper.php"); ?>
    <div class="container-fluid">
        <div class="row">
       <div class="col-lg-4 col-md-6">
         <div class="card" style="margin-top:20px;">
        <div class="card-header">
            <p class="h6"><?php echo $com; ?><span><button class="btn btn-outline-secondary d-md-none" data-toggle="modal" data-target="#moodel">Profile Pictures</button></span></p>
            
            </div>
            <?php
             echo'<div class="card-body text-center bg-secondary">
            <img src="../image/'.$img.'" width="200px" height="200px" class="img-fluid rounded-circle"/>';
            ?>
                <br/><br/>
                <form action="Upload.php" method="post" enctype="multipart/form-data">
                <input class="btn btn-sm btn-light" type="file" name="file" id=file required/>
                    <input class="btn btn-sm" type="submit" value="Upload"/>
                    </form>
            </div>
            <div class="card-footer">
                <p class="h6">About : <a href="#" data-toggle="modal" data-target="#mymodel">Update</a></p>
                <?php
                echo '<p>'.$about1.'</p>';
                echo '<p>'.$about2.'</p>';
                echo '<p>'.$about3.'</p>';
                echo '<p>'.$about4.'</p>';
                ?>
        </div>
        </div>
            </div>
            <div class="col-lg-8 col-md-6 d-none d-md-block" id="profile">
       <?php include("Home.php"); ?>
       </div>
        </div>
        <div class="modal fade" id="mymodel">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    About You
                    </div>
                    <div class="modal-body">
                    <form action="uppu.php" method="post">
                        <div class="form-group row">
                            <label class="col-sm-1 h5">1-</label>
                            <input type="text" class="form-control col-sm-10" name="about1"/></div>
                            <div class="form-group row">
                                <label class="col-sm-1 h5">2-</label>
                                <input type="text" class="form-control col-sm-10" name="about2"/></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 h5">3-</label>
                                    <input type="text" class="form-control col-sm-10" name="about3"/></div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 h5">4-</label>
                        <input type="text" class="form-control col-sm-10" name="about4"/>
                        </div>
                        <div class="form-group text-center">
                        <input type="submit" value="Save" class="btn btn-outline-danger"/>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
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
       <?php $q1="select * from proimage where Email='$e'";
                $result1=mysqli_query($con,$q1);
                $num1=mysqli_num_rows($result1);
                for($i=1;$i<=$num1;$i++)
                    {
                        $row1=mysqli_fetch_array($result1);
                        $val=$row1['Image'];
                        echo '<img src="../image/'.$val.'" width="200px" height="200px"  style="margin:30px;" class="img-fluid"/> <br>';
                    }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
mysqli_close($con);
?>