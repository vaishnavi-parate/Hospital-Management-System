<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('../db.php');

if(isset($_GET['Logout']))
{
$_SESSION['Auserid']= "";
$_SESSION['Ausername']= "";

unset($_SESSION['Auserid']);
unset($_SESSION['Ausername']);
}
elseif(isset($_SESSION['Auserid']) and isset($_SESSION['Ausername']))
{
		header("Location:Main.php");
}

?>

<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Login page </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">

        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-without-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        Press enter key or click the Submit button
                    </div>
                    <form method="post" action="Main.php" class="bootstrap-admin-login-form">
                        <h1>Admin Login</h1>
						<input type="hidden" name="signin">
                        <div class="form-group">
                            <input class="form-control" type="text" name="Email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
						<!--
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="remember_me">
                                Remember me
                            </label>
                        </div>-->
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
						<a href="../" class="btn btn-lg btn-primary" type="submit">Home</a>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {
                // Setting focus
                $('input[name="email"]').focus();

                // Setting width of the alert box
                var alert = $('.alert');
                var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                var alertPadding = parseInt($('.alert').css('padding'));

                if (isNaN(alertPadding)) {
                    alertPadding = parseInt($(alert).css('padding-left'));
                }

                $('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </body>
</html>
