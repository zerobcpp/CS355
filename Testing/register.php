<!doctype html>
<html class="no-js" lang="en">
<?php
include 'connection.php';
?>

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="description" content="Register System">
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
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</head>

<body>

    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center custom-login">
                <h3>Register Now</h3>

            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="# " id="LoginForm" name="LoginForm" method="POST">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>LastName</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="Submit" name="Submit" class="btn btn-success loginbtn" style="margin-bottom: 10px">Register</button>
                                <div class="alert alert-success" id="successtext" style="display:none;">
                                    <strong>Successful! </strong>Account registered</div>
                                <div class="alert alert-success" id="successtext2" style="display:none;">
                                    <strong></strong>redirecting in 4sec</div>
                                <div class="alert alert-danger" id="failtext" style="display:none;">
                                    <strong>Failed </strong>Username has been registered</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    if (isset($_POST["Submit"])) {
        $query = mysqli_query($conn, "select * from registration where username = '$_POST[username]'");
        $count = mysqli_num_rows($query);
        if ($count > 0) {
    ?>
            <script type="text/javascript">
                document.getElementById("successtext").style.display = "none";
                document.getElementById("failtext").style.display = "block";
            </script>
        <?php
        } else {
            mysqli_query($conn, "insert into registration VALUES(NULL,'$_POST[lastname]','$_POST[firstname]','$_POST[username]','$_POST[password]','$_POST[email]')");
        ?>
            <script type="text/javascript">
                document.getElementById("successtext").style.display = "block";
                document.getElementById("successtext2").style.display = "block";
                document.getElementById("failtext").style.display = "none";
            </script>
            <?php echo "<script> setTimeout(function(){location.href='index.php'},4000); </script>";
                exit;
            ?>
    <?php
        }
    }
    ?>



</body>

</html>