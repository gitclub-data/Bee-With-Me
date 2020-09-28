<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
?>
<html>
<head>
    <title>Update info...</title>
    <link rel="stylesheet" type="text/css" href="Body-background.css"/>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
	function chemail(str)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","http://localhost/BeeWithMe/bin/redunemail.php?evalue="+str,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("error").innerHTML=xmlhttp.responseText;
		}
		}
	}
	function sub()
	{
		var result=true;
		if(document.getElementById("error").innerHTML!="")
		{
			result=false;
		}
		return result;
	}
	
	function check1(str)
{
var j=document.getElementById("password").value;
var req=new XMLHttpRequest();
req.open("get","http://localhost/BeeWithMe/bin/check2.php?length="+j,true);
    req.send();
    req.onreadystatechange=function()
    {
        if(req.readyState==4&&req.status==200)
            {
document.getElementById("gs").innerHTML=req.responseText;
            }
    };
}

function myself()
{
var result=true;
	var se=document.getElementById("gs").innerHTML.length;
	if(se>1)
	{
		result=false;
	}
	return result;	
}
	</script>
    </head>
    <body>
        <?php
		$e=$_SESSION['Email'];
        include("Bootstrap.php");
        ?>
     <p class="text-center" style="font-size:60px;">Change Email & Password</p>
    <div class="coontainer">
            <div class="row">
               <div class="col-sm-6 offset-sm-3">
			   <form action="changeemail.php" method="post">
                    <div class="form-group text-center bg-secondary">
                     <label>We Will Send You To The Login After Changing The Password Or Email</label>
                    </div>
					<div class="form-group">
                      <label>Email :<span id="error" style="color:red;"></span></label>
                  <input  onchange="chemail(this.value)" type="email" class="Form-control" name="email" value="<?php echo $e;?>" required/>  
                    </div>
				<div class="form-group text-center">
                  <input onclick="return sub()" type="submit" class="btn btn-dark" value="Change Email"/>  
                    </div>
					</form>
                <form action="changepass.php" method="post" onsubmit="return myself()">
                  <div class="form-group">
                      <label>Old Password</label>
                  <input type="password" class="Form-control" name="old" required/>  
                    </div>
                 <div class="form-group">
                  <label>New Password :<span id="gs" style="color:red;"></span></label>
                     <input onchange="check1(this.value)" type="password" class="Form-control" name="new" id="password" required/>
                    </div>
                    <div class="form-group text-center">
                  <input type="submit" class="btn btn-dark" value="Change Password"/>  
                    </div>
                   </form>
                </div>
        </div>
        </div>
    </body>
</html>
