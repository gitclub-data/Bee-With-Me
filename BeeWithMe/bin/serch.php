 <?php
session_start();
if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']))
{
header('location:http://localhost/BeeWithMe/bin/index.php');
}
include("Connection.php");
    $getname=$_GET['gname'];
    $q="select * from info Where First_Name='$getname'";
    $q1="select * from info Where Last_Name='$getname'";
    $q2="select * from info Where Combined_name='$getname'";
    $q3="select * from info Where Email='$getname'";
    $result=mysqli_query($con,$q) or die(mysqli_error($con));
    $result1=mysqli_query($con,$q1) or die(mysqli_error($con));
    $result2=mysqli_query($con,$q2) or die(mysqli_error($con));
    $result3=mysqli_query($con,$q3) or die(mysqli_error($con));
    if(mysqli_num_rows($result)>0)
    {
        $mn=mysqli_num_rows($result);
        $result4=$result;
    }else
    {
        if(mysqli_num_rows($result1)>0)
        {
            $mn=mysqli_num_rows($result1);
            $result4=$result1;
        }
        else
        {
         if(mysqli_num_rows($result2)>0)
         {
             $mn=mysqli_num_rows($result2);
             $result4=$result2;
         }else
         {
             if(mysqli_num_rows($result3)>0)
             {
                 $mn=mysqli_num_rows($result3);
                 $result4=$result3;
             }else
             {
                 echo '<p class="h6 text-center">sorry we can not find this user</p>';
                 $mn=0;
             }
         }
        }
    }
    for($i=1;$i<=$mn;$i++)
    {
        $row=mysqli_fetch_array($result4);
        $cmname=$row['Combined_name'];
        $email=$row['Email'];
        $Img=$row['Image'];
        if($email==$_SESSION['Email'])
        {
            echo "";
        }
        else
        {
        echo '<ul class="list-unstyled"><li id="style-list"><a href="http://localhost/BeeWithMe/bin/showpro.php?Email='.$email.'" id="linki"><p class="h6">
        <img src="../image/'.$Img.'" class="img-fluid rounded-circle" width="50px" height="50px"/>
                        '.$cmname.' : '.$email.'</p></a></li></ul>
';
        }
    }
?>