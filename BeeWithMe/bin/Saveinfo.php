<?php
    include("Connection.php");
    $fname=$_POST['first'];
    $lname=$_POST['last'];
    $combined=$fname." ".$lname;
    $dob=$_POST['date'];
    $Gender=$_POST['gender'];
    $email=$_POST['email1'];
    $gumber=$_POST['hobile'];
	$mnumber="+91".$gumber;
    $password=$_POST['passwo1'];
    $q="insert into info (First_Name,Last_Name,Combined_name,Birthdate,Gender,Email,Mobile_Number,Password) values ('$fname','$lname','$combined','$dob','$Gender','$email',$mnumber,'$password')";
    $result=mysqli_query($con,$q);
    if($result==1)
    { 
    header('location:http://localhost/BeeWithMe/bin/index.php');
    }
else
    {
        header('location:http://localhost/BeeWithMe/bin/index.php');
    }
    mysqli_close($con);
    ?>