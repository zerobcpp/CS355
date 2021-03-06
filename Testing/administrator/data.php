<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php include 'connection.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
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



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <a class="navbar-brand" href="./">Admin Panel</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="base.php"> <i class="menu-icon fa fa-dashboard"></i>Main Menu </a>
                    </li>
                    <h3 class="menu-title">Appending</h3><!-- /.menu-title -->
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-question-circle"></i> Add Set</a>
                    </li>
                    <li>
                        <a href="chooseset.php"> <i class="menu-icon fa fa-question-circle"></i> Add Question</a>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>--</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="#">--</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="#">--</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Stats</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Question Result</a>
                        <!--
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="#">-</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="#">-</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="#">-</a></li>
                        </ul> -->
                    </li>
                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->




    <!--/.col-->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Question Set</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Set Name</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $query = mysqli_query($conn,"select user,setname, (cast(correct as float)/cast(total_question as float)) as Percentage,finishedTime from exam_result");
                            while($row = mysqli_fetch_array($query))
                            {?>
                            <tr>
                            <th scope="row"><?php echo $row['user'] ?></th>
                            <td><?php echo $row['setname']?></td>
                            <td><?php echo $row['Percentage']?></td>
                            <td><?php echo $row['finishedTime']?></td>
                            </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

    <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php
