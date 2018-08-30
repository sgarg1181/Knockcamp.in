<?php 

require_once('Include/DB.php');
require_once('Include/session.php');

?>
<?php 
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	exit;
}

function Login_Attempt($Username,$Password){
    global $connection;
    $Query="SELECT * FROM society_admins
    WHERE username='$Username' AND password='$Password'";
    $Execute=mysqli_query($connection,$Query);
    if($admin=mysqli_fetch_array($Execute)){
	return $admin;
    }else{
	return null;
    }
}
function Login(){
    if(isset($_SESSION["society"])){
	return true;
    }
}
 function Confirm_Login(){
    if(!Login()){
	$_SESSION["ErrorMessage"]="Login Required ! ";
	Redirect_to("societylogin.php");
    }
    
 }
?>
