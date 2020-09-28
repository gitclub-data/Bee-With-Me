 <?php
$value=$_GET['length'];
$length = mb_strlen($value);
if($value=="")
{
echo "";	
}else
{
if($length<8)
        {
            echo "The Password should be more than 7 letters";
        }
else
{
	echo "";
}
}
?>