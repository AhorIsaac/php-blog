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
    <link href="" rel="icon">
    <style>
        #navbarMenu .nav-item {
            padding-left: 8px;
            padding-right: 8px;
            font-weight: 600;
            font-family: Arial;
            font-size: 16px;
            color: #17a2b8;
        }

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

        #navbarMenu .nav-item:hover {
            color: #f8f9fa;
            background: #17a2b8;
            transform: translate(0, 10px);
            transition: transform 400ms ease-in-out;
        }

        #blog_button:hover {
            font-weight: bold;
            transform: rotateY(360deg);
            transition-delay: 1s;
            transition: transform 1s ease-in-out;
        }

        #icon_image {
            width: 40px;
            height: 40px;
            border-radius: 20px;
            border-bottom: 5px solid #17a2b8;
        }

        #footer_links .nav-item {
            font-size: 18px;
            color: #f8f9fa;
        }

        #footer_links .nav-item:hover {
            transform: translate(10px, 0);
            transition: 500ms transform ease-in-out;
            border-bottom: 1px double #17a2b8;
        }

        .fade {
            opacity: 1;
            -webkit-transition: opacity 1s linear;
            transition: opacity 1s linear;
        }

        #subscribe-frame {
            border: 2px double #17a2b8;
            border-radius: 10px;
            font-family: monospace;
        }

        #subscribe-addon {
            background: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <?php require('navbar.php'); ?>


        <div class="text-center mt-2 mb-2" style="font-family: monospace;">
            <?php
            if (isset($_SESSION['have_already_subscribed'])) {
            ?>
                <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                    <button type='button' class="close" data-dismiss="alert">
                        <i class='fa fa-times-circle fa-1x'></i>
                    </button>
                    <h6 class="alert-heading font-weight-bold text-center">
                        <i class="fa fa-thumbs-up fa-1x"></i> <br />
                        You have already subscribed!
                        <br /> Thank you!
                    </h6>
                </div>
            <?php
                unset($_SESSION['have_already_subscribed']);
            }
            ?>
        </div>


        <div class="jumbotron container shadow bg-info text-center mt-3 mt-lg-5 mt-md-5">
            <h1 class="text-light"> Welcome to CodeBlog! </h1>
            <h4 class="text-white"> The #1 official blog for Software Developers </h4>

            <p class="mt-2">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab recusandae officia saepe omnis adipisci, aliquam officiis, libero quidem neque laborum deserunt mollitia possimus ut sunt ex dolores, quisquam error tenetur voluptates nesciunt laudantium accusantium nam. Omnis quas eaque expedita necessitatibus, officiis laborum voluptatum rem modi itaque optio doloremque ut aut?
            </p>

            <a href="blog.php" class="btn btn-outline-light" id="blog_button">
                Explore
            </a>
        </div>

        <?php require('subscribe-modal.php'); ?>


        <div class="jumbotron bg-white shadow text-center mt-3">
            <?php require('footer.php'); ?>
        </div>

    </div>
    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/js/hideOrShowPassword.js"> </script>
    <script src="../public/vendor/sweetalert/sweetalert.min.js"> </script>
    <script src="../public/vendor/toastr/toastr.min.js"> </script>

    <?php
    if (isset($_SESSION["subscription_success"])) {
    ?>
        <script>
            swal("Great Job", "Subscription Successful!", "success", {
                button: "OK",
            });
        </script>
    <?php
        unset($_SESSION["subscription_success"]);
    }
    ?>
</body>

</html>