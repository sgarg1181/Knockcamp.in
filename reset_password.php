<?php
include 'Include/dbconnect.php';


if(isset($_GET['email']))
{
  $email = mysqli_real_escape_string($con_ser, $_GET['email']);


  $check = "SELECT * FROM teacher WHERE Email = '$email'";
  $res = mysqli_query($con_ser, $check);
  $count = mysqli_num_rows($res);
  if($count != 0){
    //echo "Send email to user with password";
    $str = "0123456789asdfghjklpoiumnbv";
    $str = str_shuffle($str);
    $str = substr($str, 0, 8);
    $pwd = md5($str);
     $query = "UPDATE teacher SET Password = '$pwd' WHERE Email = '$email'";
    $query_run = mysqli_query($con_ser, $query);

    echo "your new password is: $str ";
}
else 
{
	echo "please check your link...";
}
}
else
{
	header('location:student_admin.php');
	exit();
}

?>