<?php
session_start();

if (!($_SESSION["admin_name"])) {
    header("location: sign-in.php");
    exit();
}

require_once("../classes/Administrator.php");


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
    <link href="../public/css/main-style.css" type="text/css" rel="stylesheet">

    <link href="" rel="icon">
    <style>
        #admin_frame {
            border: 1px double #17a2b8;
            font-family: monospace;
        }

        #admin_image {
            width: 200px;
            height: 200px;
            border-radius: 100px;
            border: 1px double #17a2b8;
        }

        #admin_frame h3 {
            font-family: monospace;
            color: white;
        }

        #admin_frame p {
            font-family: monospace;
            font-size: 20px;
            color: black;
        }
    </style>
</head>

<body class="bg-white">
    <div class="container">

        <h3 class="text-center m-3" style="font-family: monospace;"> CodeBlog Administrators </h3>

        <div class="text-center mt-3 mb-3">
            <a href="admin-homepage.php" class="btn btn-outline-dark">
                <i class="fa fa-arrow-left fa-1x"></i> Back
            </a>
        </div>

        <?php
        $administrator = new Administrator();
        $administrators = $administrator->all();

        foreach ($administrators as $administrator) {
        ?>

            <div class="jumbotron text-center justify-content-center rounded shadow bg-light" id="admin_frame">
                <div class="row justify-content-around text-center">
                    <div class="col-md-5 col-lg-5">
                        <img src="../public/storage/admins/<?php echo $administrator->image ?>" alt="pic" id="admin_image" class="shadow-md" />
                        <h5 class="text-dark">
                            Administrator <?php echo $administrator->name ?>
                        </h5>
                    </div>
                    <div class="col-md-5 col-lg-5">
                        <p class="text-left text-info">
                            <i class="fa fa-user-circle fa-1x"></i>
                            Name : <?php echo $administrator->name ?>
                        </p>
                        <p class="text-left">
                            <i class="fa fa-envelope fa-1x"></i>
                            Email : <?php echo $administrator->email ?>
                        </p>
                        <p class="text-left">
                            <i class="fa fa-phone fa-1x"></i>
                            Phone : <?php echo $administrator->phone ?>
                        </p>
                        <p class="text-left">
                            <i class="fa fa-user-tie fa-1x"></i>
                            Role :
                            <?php if ($administrator->role === "super_admin") {
                                echo "Super Administrator";
                            } else {
                                echo "Administrator";
                            }
                            ?>
                        </p>
                        <p class="text-left">
                            Status :
                            <?php if ($administrator->status == 1) {
                                echo "Active <i class='fa fa-check-circle fa-1x'></i>";
                            } else {
                                echo "Inactive";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="text-center">
            <?php require("footer-small.php"); ?>
        </div>
    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/js/hideOrShowPassword.js"> </script>
</body>

</html>