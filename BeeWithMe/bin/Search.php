<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
?>
<html>
<head>
    <title>Search</title>
   <link rel="stylesheet" type="text/css" href="../bin/Body-background.css"/>
    <link rel="stylesheet" type="text/css" href="../bin/Hiddenimage.css"/>
    <style>
	#scroll
	{
			overflow-x: hidden;
            overflow-y: scroll;
            height: 480px;
	}
    #style-list
        {
            background-color: gainsboro;
        }
    #linki
        {
        color: gray;
        }
    </style>
	<script>
function submit(){
if(document.getElementById("input1").value==''){
	document.getElementById("error").innerHTML="Please Write Something First";
	return(false);
}
var gname=document.getElementById("input1").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","http://localhost/BeeWithMe/bin/serch.php?gname="+gname,true);
xmlhttp.send();
xmlhttp.onreadystatechange=function(){
	if(xmlhttp.status==200){
		document.getElementById("scroll").innerHTML=xmlhttp.responseText;
	}
}
}
	</script>
    </head>
    <body>
    <?php include("Upper.php"); ?>
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 d-none d-md-block">
            <?php include("Side.php"); ?>
            </div>
            <div class="col-lg-8 col-md-6">
            <div class="card" style="margin-top:30px;">
                <div class="card-header">
				   <div class="container">
					<div class="row">
					<div class="col-sm-10">
					<form>
					<input type="text" id="input1" class="text-capitalize form-control"/>
					</form>
					</div>
					<div class="col-sm-2">
					<a href="#" onclick="return submit()"><button class="btn btn-outline-info">search</button></a>
                </div>
				</div>
				</div>
				</div>
                <div class="card-body" id="scroll">                      
                </div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>