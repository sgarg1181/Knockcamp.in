<?php  
include_once("head.php");
?>

<section class="parent">
	<div class="child">

		<?php

		if(!func::checklogin($sdb))//check login state)
			{
				header("location:Admin.php");
				exit();			
			}
				?><br><?php
				echo "First logout from account to access page"; 
		?>
		
	</div>
</section>

<?php  include_once("foot.php"); ?>