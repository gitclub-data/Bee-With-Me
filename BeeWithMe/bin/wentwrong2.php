<?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
?>
<html>
<head>
    <title>Something Went Wrong</title>
    </head>
    <body>
    <?php
        include("Bootstrap.php");
        ?>
        <br><br>
        <p class="text-center" style="font-size:60px;">OOPS!</p>
        <p class="text-center" style="font-size:40px;">Something Went Wrong!</p>
    </body>
</html>