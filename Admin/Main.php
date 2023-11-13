<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('../db.php');

if(isset($_POST["signin"]))
{
$result=mysql_query("select * From main_admin where Aemail='".$_POST["Email"]."' and Apwd='".$_POST["password"]."'");

while($row=mysql_fetch_array($result))
	{	
$_SESSION['Auserid']= $row["Aid"];
$_SESSION['Ausername']= $row["Aname"];
	}
}

if(!isset($_SESSION['Auserid']) and !isset($_SESSION['Ausername']))
{
		header("Location:index.php");
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Docs -->

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme-change-size.css">

        <!-- Custom styles -->
        <style type="text/css">
            @font-face {
                font-family: Ubuntu;
                src: url('fonts/Ubuntu-Regular.ttf');
            }
            .bs-docs-masthead{
                background-color: #6f5499;
                background-image: linear-gradient(to bottom, #563d7c 0px, #6f5499 100%);
                background-repeat: repeat-x;
            }
            .bs-docs-masthead{
                padding: 0;
            }
            .bs-docs-masthead h1{
                color: #fff;
                font-size: 40px;
                margin: 0;
                padding: 34px 0;
                text-align: center;
            }
            .bs-docs-masthead a:hover{
                text-decoration: none;
            }
            .meritoo-logo a{
                background-color: #fff;
                border: 1px solid rgba(66, 139, 202, 0.4);
                display: block;
                font-family: Ubuntu;
                padding: 22px 0;
                text-align: center;
            }
            .meritoo-logo a,
            .meritoo-logo a:hover,
            .meritoo-logo a:focus{
                text-decoration: none;
            }
            .meritoo-logo a img{
                display: block;
                margin: 0 auto;
            }
            .meritoo-logo a span{
                color: #4e4b4b;
                font-size: 18px;
            }
            .row-urls{
                margin-top: 4px;
            }
            .row-urls .col-md-6{
                text-align: center;
            }
            .row-urls .col-md-6 a{
                font-size: 14px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-with-small-navbar">

<?php
include("Header.php");
?>

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
<?php
include("Leftbar.php");
?>
                <!-- content -->
                <div class="col-md-10">


<?php

if(!isset($_GET['page']) or $_GET['page']=='1' or $_GET['page']=='0')
{
include("Patient_Details.php");
}
elseif($_GET['page']=='2')
{
include("Hospital_Details.php");
}
elseif($_GET['page']=='3')
{
include("Pharmacy_Details.php");
}
elseif($_GET['page']=='4')
{
include("Lab_Details.php");
}
else
{
}
?>



                </div>
            </div>
        </div>

<?php
include("Footer.php");
?>

    </body>
</html>
