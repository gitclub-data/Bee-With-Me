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
    <title>Update info...</title>
    <link rel="stylesheet" type="text/css" href="Body-background.css"/>
	<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
	<script>
	function update(){
if(document.getElementById("first").value==''||document.getElementById("last").value==''||document.getElementById("date").value==''||document.getElementById("gender").value==''){
	document.getElementById("span1").innerHTML="Please Fill All The Fields";
	return(false);
}
document.getElementById("span1").innerHTML="";
var fname=document.getElementById("first").value;
var lname=document.getElementById("last").value;
var date=document.getElementById("date").value;
var gender=document.getElementById("gender").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","http://localhost/BeeWithMe/bin/updda.php?first="+fname+"&last="+lname+"&date="+date+"&gender="+gender,true);
xmlhttp.send();
}
	</script>
    </head>
    <body>
        <?php
        include("Bootstrap.php");
        ?>
        <p class="text-center" style="font-size:60px;">Update Profile</p>
        <div class="coontainer">
            <div class="row">
               <div class="col-sm-6 offset-sm-3"> 
        <form>
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" id="first" value="<?php echo $First ?>"/>
            </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" id="last" value="<?php echo $Last ?>"/>
            </div>
        <div class="form-group">
            <label>BirthDate</label>
            <input type="date" class="form-control" id="date" value="<?php echo $Birth;?>"/>
            </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
            </div>
			<div style="color:red;" id="span1" class="form-group text-center">
			</div>
            <div class="form-group text-center">
            <a href="#" class="btn btn-link btn-info" onclick="return update()">Update<a/>
			</div>
        </form>	
				<div class="text-center">
                <a href="changing.php"><button class="btn btn-dark">Click Here To Update Email & Password</button></a>
                </div>
				</div>
            </div>
            </div>
    </body>
</html>