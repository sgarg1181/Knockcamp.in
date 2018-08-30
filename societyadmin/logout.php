<?php
//include 'core.php';
//session_start();
//echo $http_referer;
$_SESSION["society"]="";
session_destroy();


header('Location: /knockcamp/home_thapar_university.php');

?>