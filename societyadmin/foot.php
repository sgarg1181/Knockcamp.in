<?php 
include_once("head.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<footer>
	<?php 
//echo '<a href="admin_home.php">Index</a> | <a href="Fullpost.php">Admin</a> |';
if(func::checklogin($sdb)) 
{ 
	echo'<a href="admin_logout.php">Logout</a>'; 
}
else
{
	echo '<a href="Admin.php">Login</a>';  
}
	?>
</footer>
</body>
</html>
