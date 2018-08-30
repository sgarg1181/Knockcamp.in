<?php
include_once("head.php");
		if(!func::checklogin($sdb))//check login state)
			{
				header("location:Admin.php");
				exit();			
			}
				echo "Welcome ". $_SESSION['user_username'] ."!"; 
		?>