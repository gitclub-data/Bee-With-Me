<?php 
$pass=$_GET['pass'];
$oldpass=$_GET['oldpass'];
    if($pass!=$oldpass)
    {
    echo "Please Enter The Same Password As Above";
    }
?>