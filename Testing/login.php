
<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include 'connection.php' 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>

</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Student Login</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm" name = "login" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="password" required="" value="" name="password" id="password" class="form-control">

                            </div>

                            <button type = "submit" name = "submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="register.php">Register</a>
                            <div class = "alert alert-danger" id ="loginfail" style="text-align:center; margin-top:10px; display:none;">
                                <strong>Failed </strong>No such account or password</div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>
    <?php
    if(isset($_POST["submit"]))
    {
        $query = mysqli_query($conn, "select * from registration where username ='$_POST[username]' and password ='$_POST[password]'");
        $count = mysqli_num_rows($query);
        if($count>0)
        {
            $_SESSION["username"]=$_POST["username"]; 
            echo "<script> setTimeout(function(){location.href='index.php'},25); </script>";
            exit();
        }else
        {
            ?>
            <script type = "text/javascript">
                document.getElementById("loginfail").style.display="block";
            </script>
            <?php
        }
    }
    ?>
</body>

</html>