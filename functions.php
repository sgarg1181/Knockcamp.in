<?php

 class func
 {
     
 	public static function checklogin($sdb)
 	{
		if(!isset($_SESSION))	
 			{
 				session_start();
 			}
 		if(isset($_COOKIE['userid']) && isset($_COOKIE['token']) && isset($_COOKIE['serial']))
 			{
 				$query = ("SELECT * FROM sessions WHERE sessions_userid = :userid AND sessions_token = :token AND sessions_serial= 
 					:serial");
 				$userid = $_COOKIE['userid'];
 				$token = $_COOKIE['token'];
 				$serial = $_COOKIE['serial'];

 				$stmt = $sdb->prepare($query);
 				$stmt->execute(array(':userid' => $userid,':token' => $token ,  ':serial' =>$serial));
 				$row = $stmt->fetch(PDO::FETCH_ASSOC); 

 				if ($row['sessions_userid']>0) {
 					if ($row['sessions_userid'] == $_COOKIE['userid'] &&
 						$row['sessions_token'] == $_COOKIE['token'] &&
 						$row['sessions_serial'] == $_COOKIE['serial']
 				)   {
 						if ($row['sessions_userid'] == $_SESSION['user_id'] &&
 							$row['sessions_token'] == $_SESSION['token'] &&
 							$row['sessions_serial'] == $_SESSION['serial']
 						) 
 						{
 							return true;		
 						}
 						else
 						{
 							func::createSession($_COOKIE['username'],$_COOKIE['userid'],$_COOKIE['token'],$_COOKIE['serial']);
 							return true;
 						}
 					}
 				}
 			}

 	}

 	public static function createRecord($sdb,$user_username,$user_id)
 	{
 	$sdb->prepare("DELETE FROM sessions WHERE sessions_userid = :sessions_userid;")->execute(array(':sessions_userid' => $user_id));
 	$token = func::createString(30);
 	$serial = func::createString(30);
	$query = "INSERT INTO sessions (sessions_userid, sessions_token, sessions_serial) VALUES (:user_id,:token,:serial)";
 	 
 	 	func::createCookie($user_username,$user_id,$token,$serial);	
 	 	func::createSession($user_username,$user_id,$token,$serial);

 	$stmt = $sdb->prepare($query);
	$stmt->execute(array(':user_id' => $user_id,':token' => $token ,  ':serial' =>$serial));			
 	}

 	public static function createCookie($user_username,$user_id,$token,$serial)
 	{
		setcookie('username',$user_username,time() + (1800),"/");
 		setcookie('userid',$user_id,time() + (1800),"/");//864000
 		setcookie('token',$token,time() + (1800),"/");
 		setcookie('serial',$serial,time() + (1800),"/");
 	}	

 	public static function deleteCookies()
 	{
		setcookie('username','',time() - 1,"/");
 		setcookie('userid','',time() - 1,"/");
 		setcookie('token','',time() - 1,"/");
 		setcookie('serial','',time() - 1,"/");
 		session_destroy();
 	}	

 	public static function createSession($user_username,$user_id,$token,$serial)
 	{
 		if(!isset($_SESSION))
 		{
 			session_start();
 		}
 		$_SESSION['user_username'] = $user_username;
 		$_SESSION['user_id'] = $user_id;
 		$_SESSION['token'] =  $token;
 		$_SESSION['serial'] = $serial;
  	}	

 	public static function createString($len)
 	{
 	 $string = "lqa1gfg2ffd3ggh5gf34y42456g8xbd7bsf2grb1gas6bgbfktndgb";
 	 $s = substr(str_shuffle($string), 0 , 30); 
 	 return($s);
 	}
 }
  ?>