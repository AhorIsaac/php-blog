<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> CodeBlog </title>

    <link href="../public/css/litera-bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../public/fontawesome/css/all.css" type="text/css" rel="stylesheet">
    <link href="../public/css/site-logo.css" type="text/css" rel="stylesheet">
    <link href="../public/vendor/toastr/toastr.min.css" type="text/css" rel="stylesheet">
    <link href="../public/css/navbar.css" type="text/css" rel="stylesheet">
    <link href="../public/css/main-style.css" type="text/css" rel="stylesheet">

    <link href="" rel="icon">
    <style>
        .site-logo {
            font-size: 35px;
            font-family: fantasy;
            background: #17a2b8;
            padding: 4px;
            color: #f8f9fa;
            text-shadow: 2px 1px 1px grey;
            border: 1px double black;
            box-shadow: 0 0 2px 1px #f8f9fa;
        }

        #input_group {
            border-radius: 20px;
            border: 1px solid white;
        }

        #sign-in-form {
            border: 1px solid #17a2b8;
            border-radius: 16px;
        }

        #eye-field {
            border-left: none;
        }

        input[type="password"] {
            border-right: none;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            font-family: monospace;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <!-- the navigation bar -->
        <?php // require('navbar.php'); 
        ?>
        <!-- * -->

        <div class="jumbotron container bg-light text-center mt-3 mt-lg-5 mt-md-5 mb-lg-5 mb-md-5">

            <div class="text-center mt-2 mb-2" style="font-family: monospace;">
                <?php
                if (isset($_SESSION['invalid_user'])) {
                ?>
                    <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                        <button type='button' class="close" data-dismiss="alert">
                            <i class='fa fa-times-circle fa-1x'></i>
                        </button>
                        <h6 class="alert-heading font-weight-bold"> Login Failed! </h6>
                        <p class="text-dark font-weight-bold">
                            <i class="fa fa-user-times fa-1x"></i> Invalid Account!
                        </p>
                    </div>
                <?php
                    unset($_SESSION['invalid_user']);
                }

                ?>

                <?php
                if (isset($_SESSION['input_error'])) {
                ?>
                    <div class='alert alert-danger alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                        <button type='button' class="close" data-dismiss="alert">
                            <i class='fa fa-times-circle fa-1x'></i>
                        </button>
                        <h6 class="alert-heading"> All input fields are required! </h6>
                    </div>
                <?php
                    unset($_SESSION['input_error']);
                }
                ?>

                <?php
                if (isset($_SESSION["wrong_password"])) {
                ?>
                    <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                        <button type='button' class="close" data-dismiss="alert">
                            <i class='fa fa-times-circle fa-1x'></i>
                        </button>
                        <h6 class="alert-heading font-weight-bold"> Login Failed! </h6>
                        <p class='text-dark font-weight-bold'>
                            <i class="fa fa-user-shield fa-1x"></i> Invalid Password!
                        </p>
                    </div>
                <?php
                    unset($_SESSION["wrong_password"]);
                }
                ?>
            </div>

            <div class="row justify-content-around text-center mt-5">
                <div class='col-md-6 col-lg-6 shadow-lg bg-transparent mt-3' id="sign-in-form">
                    <h2 class='text-info m-3' style="font-family: monospace">
                        <i class="fa fa-user-tie fa-1x"></i> Login
                    </h2>

                    <form action="../controllers/AdminController.php" method="POST" class="mt-2">

                        <div class="form-group row m-3">
                            <label for="email" class="col-form-label col-md-3 col-sm-1">
                                <i class="fa fa-envelope fa-1x"></i>
                            </label>
                            <div class="col-md-7">
                                <input type="email" class="form-control  shadow rounded border" placeholder="someone@example.com" name="email" id="email">
                            </div>
                        </div>

                        <div class="form-group row m-3">
                            <label for="email" class="col-form-label col-md-3 col-sm-1">
                                <i class="fa fa-key fa-1x"></i>
                            </label>
                            <div class="col-md-7">
                                <div class="input-group shadow rounded border">
                                    <input type="password" class="form-control" placeholder="input password" name="password1" id="password-field1">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white" id="eye-field">
                                            <i class='fa fa-eye-slash fa-1x' id="eye1" onclick="return viewPassword1()"> </i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mr-2 mt-2 justify-content-center">
                            <input type="reset" class="btn btn-outline-dark m-2" value='Reset' />
                            <input type="submit" class="btn btn-outline-info m-2" value='Login' name="admin_login" />
                            <a href='index.php' class="btn btn-outline-primary m-2">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Subscribers Modal & Footer -->
        <?php
        require("subscribe-modal.php");
        require('footer-small.php');
        ?>
        <!-- ************************** -->
    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/js/hideOrShowPassword.js"> </script>
    <script src="../public/vendor/sweetalert/sweetalert.min.js"> </script>

</body>

</html>