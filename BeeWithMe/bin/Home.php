<?php
$e=$_SESSION['Email'];
?>
<html>
<head>

    </head>
    <body>
<div class="card" style="margin-top:20px;">
           <div class="card-header">Profile Pictures</div>
                
                
                <div class="card-body"  id="scroll">
                    <?php
                    include("Connection.php");
                $q1="select * from proimage where Email='$e'";
                $result1=mysqli_query($con,$q1);
                $num1=mysqli_num_rows($result1);
                for($i=1;$i<=$num1;$i++)
                    {
                        $row1=mysqli_fetch_array($result1);
                        $val=$row1['Image'];
                        echo '<img src="../image/'.$val.'" width="200px" height="200px"  style="margin:30px;" class="img-fluid"/>';
                    }
                    ?>                                   
            </div>
           </div>    
    </body>
</html>