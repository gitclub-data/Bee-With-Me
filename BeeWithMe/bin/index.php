<!doctype html>
<html>
<head>
<title>Login To Bee With Me</title>
<link rel="icon" href="../image/Bee.JPG">
<style>
#style-upper
          {
             height: 130px;
          }
          #style-paragraph
          {
              color:gold;
          }
body{
    width: 100%;
    height: 655px;
    background-image: url('../image/Water.jpg');
    background-size: 100% 100%;
}
</style>
<script>
function checking()
{
	var hate=document.getElementById("hate").value;
	var hatp=document.getElementById("hatp").value
var req=new XMLHttpRequest();
req.open("get","http://localhost/BeeWithMe/bin/logcheck.php?e="+hate+"&p="+hatp,true);
    req.send();
    req.onreadystatechange=function()
    {
        if(req.status==200)
            {
document.getElementById("biv").innerHTML=req.responseText;
            }
    };
}

function sub()
	{
		var result=true;
		if(document.getElementById("biv").innerHTML!="")
		{
			result=false;
		}
		return result;
	}
	
function chemail(str)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","http://localhost/BeeWithMe/bin/redunmail.php?evalue="+str,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("error").innerHTML=xmlhttp.responseText;
		}
		}
	}
	
function mnumber(str1)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","http://localhost/BeeWithMe/bin/mnumber.php?str="+str1,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("error1").innerHTML=xmlhttp.responseText;
		}
		}
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

function check(str)
{
    var i=document.getElementById("password").value;
    var req=new XMLHttpRequest();
    req.open("get","http://localhost/BeeWithMe/bin/check.php?pass="+str+"&oldpass="+i,true);
    req.send();
    req.onreadystatechange=function()
    {
        if(req.readyState==4&&req.status==200)
            {
     document.getElementById("vs").innerHTML=req.responseText;
            }
    };
}

function myself()
{
	var result=true;
	var m=document.getElementById("error").innerHTML.length;
	var y=document.getElementById("error1").innerHTML.length;
	var se=document.getElementById("gs").innerHTML.length;
	var lf=document.getElementById("vs").innerHTML.length;
	if(m>1||y>1||se>1||lf>1)
	{
		result=false;
	}
	return result;
}
</script>
</head>
<body>
<?php include("Bootstrap.php"); ?>
<div class="container">
          <div class="row">
          <div class="col-sm-12 bg-primary" id=style-upper>
 <p class="h2 text-center">Bee With Me</p>
              <p class="h6 text-center">A community which live with each Other</p>
              <div class="text-center">
              <img src="../image/Bee.JPG" class="img-fluid rounded-circle" width="130px" height="130px"/>
              </div>
              </div>
          </div>
      </div>
	  <br/><br/><br/><br/>
      <div class="container" >
          <div class="row">
          <div class="col-sm-4 offset-sm-4">
              <br/>
                <p class="h3 text-center">Login Form</p>
              
              <form action="Send.php" method="post">
                  <div class="form-group">
              <label>User ID :</label>
                  <input onchange="checking()" type="email" class="form-control" name="email" id="hate" required/>
                      </div>
                  <div class="form-group">
                  <label>Password :</label>
                  <input onchange="checking()" type="password" class="form-control" name="password" id="hatp" required/>
                  <div style="color:red;" id="biv" class="text-center"></div>
				  </div>
                  <div class="form-group text-center">
                  <input onclick="return sub()" type="submit" value="Login Here" class="btn btn-outline-dark "/>
                  </div>
              </form>
              <p class="text-center" id="style-paragraph">Wanna Part Of Our Community??</p>
              <p class="text-center">
              <button class="btn-link" data-toggle="modal" data-target="#model1">Sign Up Here</button>
              </p>
              </div>
          </div>
      </div>
	  
	     <div class="modal fade" id="model1">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header bg-danger">
                      Registration form
                      
                      <div class="text-right">
                          <button class="btn btn-secondary" data-dismiss="modal">X</button>
                      </div>
                      </div>
                      <div class="modal-body bg-secondary">
                          <form action="Saveinfo.php" method="post" onsubmit="return myself()">
                <div class="form-group">
              <label>First Name :</label>
                  <input type="text" class="form-control" placeholder="Type your First name here"
                         name="first" required/>
                      </div>
                  <div class="form-group">
                  <label>Last Name :</label>
                  <input type="text" class="form-control" placeholder="Type your Last name here" name="last" required/>
                  </div>
                <div class="form-group">
                  <label>Date of birth :</label>
                  <input type="Date" class="form-control" name="date" required/>
                  </div>
                <div class="form-group">
                  <label>Gender :</label>
                  <select class="form-control" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label>User ID :<span id="error" style="color:red;"></span></label>
                  <input onchange="chemail(this.value)" type="email" class="form-control" placeholder="Username should be unique" name="email1" required/>
                  </div>
                <div class="form-group">
                  <label>Mobile Number :<span id="error1" style="color:red;"></span></label>
                  <div><button style="border-radius:5px;">+91</button><input onchange="mnumber(this.value)" type="number" style="width:420px; border-radius:5px; height:40px;" placeholder="Mobile Number should be unique" name="hobile" required/></div>
                  </div>                  
                <div class="form-group">
                  <label>Password :<span id="gs" style="color:red; font-size:15px;"></span></label>
                  <input onchange="check1(this.value)" type="password" class="form-control" placeholder="Password should be unique" name="passwo1" id="password" required/>
                  </div>                  
                <div class="form-group">
                  <label>Confirm Password :<span id="vs" style="color:red; font-size:15px;"></span></label>
                  <input onchange="check(this.value)" type="password" class="form-control" placeholder="Both password and this should be match" name="confirm" required/>
                  </div>
                  <div class="form-group text-right">
                  <input type="submit" value="Sign up" class="btn btn-outline-dark"/>
                  </div>  
                          </form>
                      </div>
                  </div>
                  </div>
              </div>
</body>
</html>