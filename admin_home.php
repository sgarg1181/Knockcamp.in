<?php  
include_once("head.php");
?>

<section class="parent">
	<div class="child">

		<?php

        
		if(!func::checklogin($sdb))//check login state)
			{
				header("location:login.php");
				exit();			
			}
				echo "Welcome ". $_SESSION['user_username'] ."!";
				?><br><?php
				echo "First logout from account to access page"; 
		?>
		
	</div>
</section>

<?php  include_once("foot.php"); ?>