<?php
session_start();
ob_start();
include("connect.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login and Registration</title>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="../../header_images/logo-w-foot.png">
</head>

<body style="background-color:#f4f4f4;">
<center>
<?php 
if(!isset($_GET['Register']) and !isset($_GET['Loggedin'])){
	?>
	<div id="Login_container">
	<form enctype="multipart/form-data" accept-charset="latin1" action="do_login.php" method="post">
    <?php
	//Error messages:
	if(isset($_GET['Error'])){
		echo "<span class='Error'>Username or password error, please try again.</span>";
	}else{
	}
	?>
	<input id="Login_Input" type="text" value="<?php echo $_SESSION['Username']; ?>" name="Username" align="middle" autofocus title="Username" placeholder="Username" alt="Enter username here."><br />
	<input id="Login_Input" type="password" name="Password" align="middle" title="Password" placeholder="Password" alt="Enter password here."><br />
	<span class="Info">Not yet registered? <a class="Register_link" href="index.php?Register"> Click here to create your account.</a></span>
	<input class="Submit_Input" type="submit" name="Submit" align="middle" value="Login"><br /><br />
	</form>
	</div>
	<?php
}if(isset($_GET['Register'])){
	?>
	<div class="Register_Container"><center>
    <form enctype="multipart/form-data" accept-charset="latin1" action="Do_Register.php" method="post">
    <span class="Error">
    <?php
	//Error messages:
	$Error = $_GET['Error'];
	if($Error == "Password"){
		echo "The two passwords must match.";
	}if($Error == "Checkbox"){
		echo "To register you must check the checkbox to confirm the terms of service.";
	}if($Error == "Info"){
		echo "To register, you must fill out the required fields marked with '*'. ";
	}else{}
	?>
    </span>
    <input id="Basic_Info" type="text" name="First_Name" align="middle" autocomplete="on" autofocus placeholder="First Name *" alt="Enter first name here.">
    <input id="Basic_Info" type="text" name="Last_Name" align="middle" autocomplete="on" placeholder="Last Name *" alt="Enter Last name here."><br />
    <input id="Expanded_Info" type="email" name="Email" align="middle" autocomplete="on" placeholder="Email *" alt="Enter email adress here."><br />
    <input id="Expanded_Info" type="text" name="Username" align="middle" autocomplete="on" placeholder="Username *" alt="Enter your wished username here."><br />
    <input id="Basic_Info" type="password" name="Password" align="middle" placeholder="Password *" alt="Enter password here">
    <input id="Basic_Info" type="password" name="Password_Confirm" align="middle" placeholder="Confirm password *" alt="Confirm password here"><br />
    <input class="Checkbox" type="checkbox" name="Rights" title="Checkbox" /><span class="Info">Click to confirm that you have read and accept <a class="Register_link" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" > the terms and condtions for the site. *</a></span><br /><br />
 
    </center>
    <div id="light" class="white_content">
    <p class="Lightbox_Text">
    <span class="White_Content_Title">Your company name here</span><br /><br />
    <span class="White_Title">Terms and Conditions:</span><br /><br />
    Your conditions here, can pretty much contain anything, it will display it all upon scroll...
    </a>
    </p>
    </div>
    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" ><div id="fade" class="black_overlay"></div></a>
    <center>
    <input class="Submit_Input" type="submit" name="Submit_Register" align="right" value="Register" alt="Click to register.">
    </form>
    </center></div>
	<?php
}if(isset($_GET['Loggedin'])){
	?>
    <div id="Login_container">
    <h1> You are logged in as: <?php echo $_SESSION['Username']; ?></h1>
    </div>
    <?php
}else{}
?>



</center>



</body>
</html>