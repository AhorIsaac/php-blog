<?php
session_start();

function __autoload($Class)
{
    require_once("../classes/$Class.php");
}
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
        #single-post-frame {
            border: 1px solid #17a2b8;
        }

        #post_image {
            width: 370px;
            height: 220px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <?php require('navbar.php'); ?>

        <div id="posts">
            <div class="row mt-2">
                <?php
                $post = new Post();
                $posts = $post->initial();

                foreach ($posts as $post) {
                ?>

                    <div class="col-md-4">
                        <div class="container text-center mt-4 mb-4 bg-light rounded shadow" id="single-post-frame">
                            <img src="../public/storage/images-post/<?php echo $post->post_image ?>" alt="" id="post_image" class="mt-3 mb-3" />
                            <!-- POST STAR -->
                            <?php
                            switch ($post->star) {
                                case 0:
                                    echo "<p class='text-center'>
                                <i class='fa fa-star-half-alt fa-1x'></i>
                                No ratings yet!
                            </p>";
                                    break;
                                case 1:
                                    echo "<p class='text-center'> 
                                        <i class='fa fa-star fa-1x'></i> 
                                      </p>";
                                    break;
                                case 2:
                                    echo "<p class='text-center'> 
                                            <i class='fa fa-star fa-1x'></i>
                                            <i class='fa fa-star fa-1x'></i> 
                                    </p>";
                                    break;
                                case 3:
                                    echo "<p class='text-center'> 
                                        <i class='fa fa-star fa-1x'></i>
                                        <i class='fa fa-star fa-1x'></i> 
                                        <i class='fa fa-star fa-1x'></i>
                                    </p>";
                                    break;
                                case 4:
                                    echo "<p class='text-center'> 
                                        <i class='fa fa-star fa-1x'></i>
                                        <i class='fa fa-star fa-1x'></i> 
                                        <i class='fa fa-star fa-1x'></i>
                                        <i class='fa fa-star fa-1x'></i>
                                    </p>";
                                    break;
                                case 5:
                                    echo "<p class='text-center'> 
                                        <i class='fa fa-star fa-1x'></i>
                                        <i class='fa fa-star fa-1x'></i> 
                                        <i class='fa fa-star fa-1x'></i>
                                        <i class='fa fa-star fa-1x'></i>
                                        <i class='fa fa-star fa-1x'></i>
                                    </p>";
                                    break;
                                default:
                                    echo "<p class='text-center'>
                                        <i class='fa fa-star-half-alt fa-1x'></i>
                                        No ratings yet!
                                    </p>";
                                    break;
                            }
                            ?>
                            <!-- END OF POST STAR -->
                            <h3 class="text-left course-heading font-weight-bold text-info">
                                <form action="../controllers/PostController.php" method="POST" class="form-inline">
                                    <input type="hidden" name="post_id" value="<?php echo $post->id ?>" />
                                    <button type="submit" name="get_post" class="btn btn-outline-info">
                                        <?php echo $post->post_title ?>
                                    </button>
                                </form>
                            </h3>

                            <p class="text-left">
                                Post By
                                <span class="font-weight-bold text-success"><?php echo $post->user_name ?></span>
                                <!-- at  -->
                                <!-- <span class="font-weight-bold text-success"> <?php echo $post->created_at ?> </span> -->
                                <br />
                                <span class="font-weight-bold text-dark text-right">
                                    <i class="fa fa-clock fa-1x"></i>
                                    <?php
                                    $time = new Time();
                                    $time_ago = $time->time_ago($post->created_at, date("Y-m-d H:i:s"));
                                    echo $time_ago;
                                    ?>
                                </span>
                            </p>

                            <!-- START OF STAR AND DELETE POST BY ADMIN -->
                            <?php
                            if (isset($_SESSION["admin_name"])) {
                            ?>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <form class="form-inline" action="../controllers/PostController.php" method="POST">
                                                <input type="hidden" name="post_id" value="<?php echo $post->id; ?>" />
                                                <button type="submit" name="delete_post" class="btn btn-outline-danger btn-sm m-2" onclick="return confirm('Do you wish to delete this post?'); ">
                                                    <i class="fa fa-trash-alt fa-1x"></i> Post
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <form class="form-inline" action="../controllers/PostController.php" method="POST">
                                                <input type="hidden" name="post_id" value="<?php echo $post->id; ?>" />
                                                <button type="submit" name="star_post" class="btn btn-outline-success btn-sm m-2" onclick="return confirm('Do you wish to star this post?'); ">
                                                    <i class="fa fa-star fa-1x"></i> Post
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                            <!-- END OF STAR AND DELETE POST BY ADMIN --->
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>

        <div class="mt-3 mb-5 container text-center">
            <button class="btn btn-outline-info btn-md" id="load-posts-btn">
                Load More Posts
            </button>
        </div>

        <?php require('footer-small.php'); ?>

    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>

    <script src="../public/vendor/sweetalert/sweetalert.min.js"> </script>
    <script src="../public/vendor/toastr/toastr.min.js"> </script>

    <?php
    if (isset($_SESSION["post_created"])) {
    ?>
        <script>
            swal("Great Job", "Post Created Successfully!", "success", {
                button: "OK",
            });
        </script>
    <?php
        unset($_SESSION["post_created"]);
    }
    ?>

    <?php
    if (isset($_SESSION['post_deleted'])) {
    ?>
        <script>
            toastr.success("<?php echo $_SESSION["post_deleted"] ?>");
        </script>
    <?php
        unset($_SESSION["post_deleted"]);
    }
    ?>

    <?php
    if (isset($_SESSION['post_star'])) {
    ?>
        <script>
            toastr.success("<?php echo $_SESSION["post_star"] ?>");
        </script>
    <?php
        unset($_SESSION["post_star"]);
    }
    ?>
    <!-- LOAD MORE POSTS -->
    <script>
        $(document).ready(function() {
            let postsCount = 3;
            $("#load-posts-btn").click(function() {
                postsCount = postsCount + 3;
                $("#posts").load("load-more-posts.php", {
                    newPostCount: postsCount

                });
            });
        });
    </script>
    <!-- END OF LOAD MORE POSTS -->
</body>

</html>