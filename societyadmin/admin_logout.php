<?php 
include_once("head.php");
func::deleteCookies();
header('location:home_thapar_university.php');
if(isset($_SESSION['society']))
{
	unset($_SESSION['society']);
}
 ?>