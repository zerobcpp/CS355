<?php
session_start();
ob_start();
include("connect.php");
if(isset($_POST['Submit'])){
	if(isset($_POST['Username']) and isset($_POST['Password'])){
		//Ready to find user:
		$Username = mysql_real_escape_string($_POST['Username']);
		
		//Hashing password:
		$salt = 'Sharpprogramming';
		$Password = mysql_real_escape_string($_POST['Password']);
		$SaltedPW = $Password . $salt;
		$hashedPW = hash('sha256', $SaltedPW);
		
		$query = mysql_query("SELECT * FROM Users WHERE Username = '$Username' AND Password = '$hashedPW'");
		$User = mysql_fetch_array($query);
		if($Username = $User['Username'] and $hashedPW = $User['Password']){
			$_SESSION['Username'] = $Username;
			header('Location: ' . $_SERVER['HTTP_REFERER'] . "?Loggedin");
		}
		
	}else{
		header('Location: ' . $_SERVER['HTTP_REFERER'] . "?Error");
	}
}
?>