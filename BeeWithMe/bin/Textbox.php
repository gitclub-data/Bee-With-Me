<?php include("Bootstrap.php");
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
$email=$_GET['Email'];
$usemail=$_SESSION['Email'];
include("Connection.php");
$q="select * from info Where Email='$email'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
    {
        $row=mysqli_fetch_array($result);
        $cmname=$row['Combined_name'];
}
?>
<html>
<head>
<title>Text Message</title>
<link rel="stylesheet" type="text/css" href="../bin/Hiddenimage.css"/>
<style>
body{
            background: url(../image/Water.jpg);
            background-size: 1350px,660px;
        }
    #sc
        {
            overflow-x: hidden;
            overflow-y: scroll;
            height: 310px;
			transform:rotateX(180deg);
			-moz-transform:rotateX(180deg);
            -webkit-transform:rotateX(180deg);
			-ms-transform:rotateX(180deg);
            -o-transform:rotateX(180deg);
        }
		#chatlog
		{
			 transform:rotateX(180deg);
             -moz-transform:rotateX(180deg);
             -webkit-transform:rotateX(180deg);
			 -ms-transform:rotateX(180deg);
             -o-transform:rotateX(180deg);
		}
        #myimg
        {
            width: 40px;
            height: 40px;
        }
</style>
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script>
function submitchat(){
if(document.getElementById("input1").value==''){
	return(false);
}
var sname=document.getElementById("div1").innerHTML;
var rname=document.getElementById("div2").innerHTML;
var msg=document.getElementById("input1").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","http://localhost/BeeWithMe/bin/insert.php?sname="+sname+"&rname="+rname+"&msg="+msg,true);
xmlhttp.send();
xmlhttp.onreadystatechange=function(){
	if(xmlhttp.status==200){
		document.getElementById("chatlog").innerHTML=xmlhttp.responseText;
	}
}
}
</script>
</head>
<body>
<div class="container-fluid" style="margin-top:80px;">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <div class="card-header">
                <p>Text Message : <span><?php echo $cmname;?></span></p>
                </div>
                <div class="card-body" id="sc">
				<div id="chatlog">
				</div>
						 </div>
            <div class="card-footer">
<div style="color:red;" id="mydiv" class="text-center">
</div>
<form name="form1">
<textarea type="text" name="msg" id="input1" class="col-sm-12 form-control"></textarea><br/>
</form>
<div class="text-center">
<a href="?Email=<?php echo $email; ?>" onclick="return submitchat()"><button class="col-sm-3 form-control btn btn-outline-secondary">send</button></a>
</div>
</div>
                </div>
                </div>
            </div>
<div  id="div1" style="display:none;">
<?php echo $usemail;?>
</div>
<div  id="div2" style="display:none;">
<?php echo $email;?>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script type="text/javascript" src="ajax.js"></script>
</body>
</html>
