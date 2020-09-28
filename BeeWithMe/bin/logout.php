<?php
session_start();
session_destroy();
header("location:http://localhost/BeeWithMe/bin/index.php");
?>