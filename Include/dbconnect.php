 <?php
 $mysqli_err='Couldn\'t connect to database';
 $mysqli_host='localhost';
 $mysqli_user='root';
 $mysqli_pass='';
 $mysqli_db='knockcamp';
$con_ser=@mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass);

$con_db=mysqli_select_db($con_ser,$mysqli_db);
if(!($con_ser) || !($con_db))
{
		die($mysqli_err);	
}

{
    // echo 'Connected to database!';
}


 ?>