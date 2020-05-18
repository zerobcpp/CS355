<?php
session_start();
ob_start();
include("connect.php");
if(isset($_POST['Submit_Register'])){
	if(isset($_POST['First_Name']) and !empty($_POST['First_Name']) and isset($_POST['Last_Name']) and !empty($_POST['Last_Name']) and isset($_POST['Email']) and !empty($_POST['Email']) and isset($_POST['Username']) and !empty($_POST['Username']) and isset($_POST['Password']) and !empty($_POST['Password']) and isset($_POST['Password_Confirm']) and !empty($_POST['Password_Confirm'])){
		if($_POST['Password'] == $_POST['Password_Confirm']){
			if(isset($_POST['Rights'])){
				
				//Everything is fine:
				$First_Name = mysql_real_escape_string($_POST['First_Name']);
				$Last_Name = mysql_real_escape_string($_POST['Last_Name']);
				$Email = mysql_real_escape_string($_POST['Email']);
				$Username = mysql_real_escape_string($_POST['Username']);
				
				
				
				//Hashing password:
				$salt = 'Sharpprogramming';
				$Password = mysql_real_escape_string($_POST['Password']);
				$SaltedPW = $Password . $salt;
				$hashedPW = hash('sha256', $SaltedPW);
				
				
				//Rady to insert:
				$query = mysql_query("INSERT INTO Users (id , First_Name , Last_Name , Email , Username , Password) VALUES ('' , '$First_Name' , '$Last_Name' , '$Email' , '$Username' , '$hashedPW')");
				$_SESSION['Username'] = $Username;
				header('Location: index.php');
				
			}else{
				header('Location: ' . $_SERVER['HTTP_REFERER'] . "?Error=Password");
			}
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER'] . "?Error=Checkbox");
		}
	}else{
		header('Location: ' . $_SERVER['HTTP_REFERER'] . "?Error=Info");
	}
}

?>