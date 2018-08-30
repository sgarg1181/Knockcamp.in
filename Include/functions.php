<?php 

require_once('Include/DB.php');
require_once('Include/session.php');

?>
<?php 
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	exit;
}
?>
