<?php


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
    <link href="../public/vendor/ckeditor/css/samples.css" type="text/css" rel="stylesheet">
    <link href="../public/vendor/ckeditor/css/neo.css" type="text/css" rel="stylesheet">

    <link href="" rel="icon">
    <style>
        #services_images {
            width: 400px;
            height: 280px;
        }

        #_img {
            width: 700px;
            height: 420px;
        }

        #carousel-example-generic h4 {
            color: #f8f9fa;
            text-shadow: 2px 3px 2px #17a2b8;
        }
    </style>
</head>

<body class="bg-light">
    <?php require('navbar.php'); ?>
    <div class="container">
        <div class="jumbotron mt-3 mb-3" style="border: 1px dotted #17a2b8;">
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron bg-info text-center shadow" style="border: 1px dotted #17a2b8;">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-exampel-generic" data-slide-to="0" class="active"> </li>
                                <li data-target="#carousel-exampel-generic" data-slide-to="1"> </li>
                                <li data-target="#carousel-exampel-generic" data-slide-to="2"> </li>
                                <li data-target="#carousel-exampel-generic" data-slide-to="3"> </li>
                                <li data-target="#carousel-exampel-generic" data-slide-to="4"> </li>
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="first-slide img-fluid" src="../public/storage/images/1.jpg" alt="First slide" id="_img" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4> Digital Marketting </h4>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img class="second-slide img-fluid" src="../public/storage/images/2.jpg" alt="Second slide" id="_img" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4> Trey Corporation HeadQuarters </h4>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img class="third-slide img-fluid" src="../public/storage/images/3.jpg" alt="Third slide" id="_img" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4> Tech Communication & Connections </h4>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img class="fourth-slide img-fluid" src="../public/storage/images/4.jpg" alt="Fourth slide" id="_img" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4> Web Development </h4>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img class="fifth-slide img-fluid" src="../public/storage/images/5.jpg" alt="Third slide" id="_img" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4> Software Development </h4>
                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <i class="fa fa-arrow-alt-circle-left fa-1x text-light"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                    <i class="fa fa-arrow-alt-circle-right fa-1x text-light"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="text-info">
                        About Us
                    </h3>
                    <p class="text-left text-dark" style="font-size: 23px;">
                        Repudiandae perspiciatis, voluptate
                        assumenda beatae perferendis nostrum nulla! Ab,
                        consequuntur soluta non beatae aspernatur ad doloremque
                        doloribus neque illum odit nobis praesentium totam
                        alias vero perferendis corrupti libero quam animi
                        asperiores quis autem iste voluptatum repellat! Possimus,
                        consequatur, laudantium deserunt natus aspernatur sed esse
                        at quasi praesentium nisi qui voluptatibus neque laborum
                        ipsam error eveniet cumque! Sequi dolore, atque nihil
                        repellendus enim porro explicabo!
                    </p>
                </div>
            </div>
        </div>

        <?php require('subscribe-modal.php'); ?>
        <?php require('footer-small.php'); ?>
    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/js/hideOrShowPassword.js"> </script>
    <script src="../public/vendor/sweetalert/sweetalert.min.js"> </script>
    <script src="../public/vendor/toastr/toastr.min.js"> </script>
    <script src="../public/vendor/ckeditor/js/ckeditor.js"> </script>
    <script src="../public/vendor/ckeditor/js/sample.js"> </script>
    <script src="../public/vendor/ckeditor/js/sf.js"> </script>
    <script src="../public/vendor/ckeditor/js/styles.js"> </script>
</body>

</html>