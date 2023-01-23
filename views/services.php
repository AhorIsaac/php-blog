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
    </style>
</head>

<body class="bg-light">
    <?php require('navbar.php'); ?>
    <div class="container">

        <div class="jumbotron mt-3 bg-light shadow" style="border: 1px dotted #17a2b8;">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-info text-left">
                        Software Development Promotion
                    </h4>
                    <p class="text-dark text-left">
                        Lorem ipsum, dolor sit amet consectetur
                        adipisicing elit. Cumque necessitatibus asperiores
                        quasi dolorum cum enim culpa ab aperiam nihil amet,
                        eos iste odio, dicta, corporis nulla quaerat optio
                        aliquam facere delectus ipsa provident? Officia,
                        uos laborum! Repudiandae perspiciatis, voluptate
                        assumenda beatae perferendis nostrum nulla! Ab,
                        consequuntur soluta non beatae aspernatur ad doloremque
                        doloribus neque illum odit nobis praesentium totam
                        alias vero perferendis corrupti libero quam animi
                        asperiores quis autem iste voluptatum repellat! Possimus
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="../public/storage/images/sdp1.jpg" id="services_images" alt="" />
                </div>
            </div>
        </div>

        <div class="jumbotron bg-info mt-3 shadow">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="../public/storage/images/dm.jpg" id="services_images" alt="" />
                </div>
                <div class="col-md-6">
                    <h4 class="text-light text-left">
                        Digital Marketting Promotion
                    </h4>
                    <p class="text-dark text-left">
                        Ab,
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

        <div class="jumbotron mt-3 bg-light shadow" style="border: 1px dotted #17a2b8;">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-info text-center">
                        Tech News
                    </h4>
                    <h6 class="text-dark text-left">
                        (A.I, Machine Learning, Deep Learning, Data Science, Cyber Security News)
                    </h6>
                    <p class="text-dark text-left">
                        Cumque necessitatibus asperiores
                        quasi dolorum cum enim culpa ab aperiam nihil amet,
                        eos iste odio, dicta, corporis nulla quaerat optio
                        aliquam facere delectus ipsa provident? Officia,
                        uos laborum! Repudiandae perspiciatis, voluptate
                        assumenda beatae perferendis nostrum nulla! Ab,
                        consequuntur soluta non beatae aspernatur ad doloremque
                        doloribus neque illum odit nobis praesentium totam
                        alias vero perferendis corrupti libero quam animi
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="../public/storage/images/news.jpg" id="services_images" alt="" />
                </div>
            </div>
        </div>

        <div class="jumbotron bg-info text-center shadow" style="border: 1px dotted #17a2b8;">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-exampel-generic" data-slide-to="0" class="active"> </li>
                    <li data-target="#carousel-exampel-generic" data-slide-to="1"> </li>
                    <li data-target="#carousel-exampel-generic" data-slide-to="2"> </li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="first-slide img-fluid" src="../public/storage/images/pro.jpg" alt="First slide" id="_img" />
                        <div class="carousel-caption d-none d-md-block">
                            <h3> Advertise Tech Products </h3>
                            <p>
                                perferendis nostrum nulla! Ab,
                                consequuntur soluta non beatae aspernatur ad doloremque
                                doloribus neque illum odit
                            </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="second-slide img-fluid" src="../public/storage/images/node1.jpg" alt="Second slide" id="_img" />
                        <div class="carousel-caption d-none d-md-block">
                            <h3> Gift Tech Tutorials </h3>
                            <p>
                                perferendis nostrum nulla! Ab,
                                consequuntur soluta non beatae aspernatur ad
                            </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="third-slide img-fluid" src="../public/storage/images/ft.jpg" alt="Third slide" id="_img" />
                        <div class="carousel-caption d-none d-md-block">
                            <h3> Discuss and analyze the future of Tech </h3>
                            <p>
                                perferendis nostrum nulla! Ab,
                                consequuntur soluta non beatae aspernatur ad doloremque
                            </p>
                        </div>
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


        <div class="jumbotron mt-3 bg-light shadow" style="border: 1px dotted #17a2b8;">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="../public/storage/images/ideas.jpg" id="services_images" alt="" />
                </div>
                <div class="col-md-6">
                    <h4 class="text-info text-center">
                        Shares Ideas, Solve Problems & Connect People
                    </h4>
                    <p class="text-dark text-left">
                        Cumque necessitatibus asperiores
                        quasi dolorum cum enim culpa ab aperiam nihil amet,
                        eos iste odio, dicta, corporis nulla quaerat optio
                        aliquam facere delectus ipsa provident? Officia,
                        uos laborum! Repudiandae perspiciatis, voluptate
                        assumenda beatae perferendis nostrum nulla! Ab,
                        consequuntur soluta non beatae aspernatur ad doloremque
                        doloribus neque illum odit nobis praesentium totam
                        alias vero perferendis corrupti libero quam animi
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
    <script src="../public/vendor/ckeditor/js/ckeditor.js"> </script>
    <script src="../public/vendor/ckeditor/js/sample.js"> </script>
    <script src="../public/vendor/ckeditor/js/sf.js"> </script>
    <script src="../public/vendor/ckeditor/js/styles.js"> </script>
</body>

</html>