<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<?php
include "connection.php"
?>
<head>
    <meta charset="utf-8">
    <title>Admin Portal</title>
    <meta name="description" content="Admin Portal">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>




</head>

<body class="bg-white">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="padding-top:30%;">
                    <a href="index.php" style="color:black; ">
                        Login for lecturer
                    </a>
                </div>
                <div class="login-form">
                    <form name="adminform" method="POST">
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" name=username class="form-control" placeholder="UserName" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name=password class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label></label>

                        </div>
                        <button type="submit" name ="adminsubmit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                </div>
                <div class="register-link m-t-15 text-center">
                    <p>Don't have account ? <a href="#"> Stay in here :-)</a></p>
                </div>
                <div></div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php
    if(isset($_POST["adminsubmit"]))
    {
        $query = mysqli_query($conn, "select * from admin where username='$_POST[username]' and password ='$_POST[password]'");
        $count = mysqli_num_rows($query);
        if($count>0)
        {
            echo "<script> setTimeout(function(){location.href='base.php'},25); </script>";
            exit;
        }
    }
    ?>


</body>

</html>