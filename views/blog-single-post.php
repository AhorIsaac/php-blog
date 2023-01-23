<?php
session_start();

function __autoload($Class)
{
    require_once("../classes/$Class.php");
}

// if(isset($_POST["post_comment"]))
// {
//     $post_id = $_POST["post_id"];
//     $comment = $_POST["comment"];
//     $name = $_POST["user_name"];

//     $fields = [
//         "post_comment" => $comment,
//         "post_id" => $post_id,
//         "name" => $name
//     ];

//     $comment = new Comment();
//     $comment_on_post = $comment->store($fields);
//     if ($comment_on_post)
//     {
//         header('location: blog-single-post.php');
//     }
// }

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
    <link href="../public/vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
    <link href="../public/vendor/emoji-css/style.css" rel="stylesheet" type="text/css" />

    <link href="" rel="icon">
    <style>
        #single-post-frame {
            border: 1px solid #17a2b8;
        }

        #post_image {
            width: 400px;
            height: 220px;
        }

        #comment-form input[type="text"],
        #comment-form textarea {
            border: 1px dotted #17a2b8;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="text-center mt-3">
            <a href="blog.php" class="btn btn-outline-dark">
                <i class="fa fa-arrow-left fa-1x"></i> Back
            </a>
        </div>

        <?php
        if (isset($_SESSION["post"])) {
            $post = $_SESSION["post"];
            $_SESSION["post_id"] = $post->id;

            $comment = new Comment();
            $comments = $comment->initial($post->id);

            if ($comments === null) {
        ?>

                <div class="container text-center mt-4 mb-4 bg-white shadow" id="single-post-frame">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <img src="../public/storage/images-post/<?php echo $post->post_image ?>" alt="" id="post_image" class="mt-3 mb-3 text-center" />
                            <!-- POST STAR -->
                            <?php
                            switch ($post->star) {
                                case 0:
                                    echo "";
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
                            }
                            ?>
                            <!-- END OF POST STAR -->
                            <h3 class="text-info">
                                <?php echo $post->post_title ?>
                            </h3>

                            <p class="">
                                Post By
                                <span class="font-weight-bold text-success"> <?php echo $post->user_name ?></span>
                                at
                                <span class="font-weight-bold text-success"> <?php echo $post->created_at ?> </span>
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
                            <p class="text-left text-dark">
                                <?php echo $post->post_msg ?>
                            </p>
                            <form action="" method="POST" id="comment-form">
                                <p class="small"> Be the first to comment </p>
                                <div class="form-group row justify-content-around">
                                    <div class="col-md-6">
                                        <input type="hidden" id="comment_post_id" name="post_id" value="<?php echo $post->id ?>" />
                                        <input type="text" id="comment_user_name" name="user_name" class="form-control" placeholder="Your name" required />
                                    </div>
                                </div>
                                <div class="form-group row justify-content-around">
                                    <div class="col-md-6">
                                        <textarea class="form-control" data-emojiable="true" data-emoji-input="unicode" type="text" name="comment" id="comment" placeholder="Add a Message" style="border: 1px dotted #17a2b8;" required>
                                    </textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-around">
                                    <button type="submit" id="submit_comment" class="btn btn-outline-success" name="post_comment">
                                        Post Comment
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>

                <div class="container text-center mt-4 mb-4 bg-white shadow" id="single-post-frame">
                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-9 text-center">
                            <img src="../public/storage/images-post/<?php echo $post->post_image ?>" alt="" id="post_image" class="mt-3 mb-3 text-center" />
                            <!-- POST STAR -->
                            <?php
                            switch ($post->star) {
                                case 0:
                                    echo "";
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
                            }
                            ?>
                            <!-- END OF POST STAR -->
                            <h3 class="text-center text-info">
                                <?php echo $post->post_title ?>
                            </h3>

                            <p class="text-center">
                                Post By
                                <span class="font-weight-bold text-success"> <?php echo $post->user_name ?></span>
                                at
                                <span class="font-weight-bold text-success"> <?php echo $post->created_at ?> </span>
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
                            <p class="text-left text-dark">
                                <?php echo $post->post_msg ?>
                            </p>
                            <form action="" method="POST" id="comment-form">
                                <div class="form-group row justify-content-around">
                                    <div class="col-md-6">
                                        <input type="hidden" id="comment_post_id" name="post_id" value="<?php echo $post->id ?>" />
                                        <input type="text" id="comment_user_name" name="user_name" class="form-control" placeholder="Your name" required />
                                    </div>
                                </div>
                                <div class="form-group row justify-content-around">
                                    <div class="col-md-6">
                                        <textarea class="form-control" data-emojiable="true" data-emoji-input="unicode" type="text" name="comment" id="comment" placeholder="Add a Message" style="border: 1px dotted #17a2b8;" required>
                                    </textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-around">
                                    <button id="submit_comment" type="submit" class="btn btn-outline-success" name="post_comment">
                                        Post Comment
                                    </button>
                                </div>
                            </form>

                            <div id="comments">
                                <?php

                                $comment = new Comment();
                                $comments = json_decode($comment->initial($post->id));

                                foreach ($comments as $comment) {
                                ?>
                                    <div class="text-left bg-white shadow rounded m-2" style="border: 1px dotted #17a2b8;">
                                        <h5 class="text-info ml-1">
                                            <?php echo $comment->name; ?>
                                        </h5>
                                        <p class="text-dark ml-1">
                                            <?php echo $comment->post_comment; ?>
                                        </p>
                                        <p class="text-success ml-1">
                                            <i class="fa fa-clock fa-1x"></i>
                                            <?php
                                            $time = new Time();
                                            $time_ago = $time->time_ago($comment->timestamp, date("Y-m-d H:i:s"));
                                            echo $time_ago;
                                            ?>
                                            </span>
                                        </p>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>

                            <button class="btn btn-outline-info btn-md float-center mt-3 mb-4" id="load-comments-btn">
                                Load More Comments
                            </button>

                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        <?php
        }
        ?>

        <div class="text-center mt-3">
            <a href="blog.php" class="btn btn-outline-dark">
                <i class="fa fa-arrow-left fa-1x"></i> Return
            </a>
        </div>

        <div class="mt-5">
            <?php require('footer-small.php'); ?>
        </div>
    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/js/hideOrShowPassword.js"> </script>
    <script src="../public/vendor/sweetalert/sweetalert.min.js"> </script>
    <script src="../public/vendor/emoji-picker/lib/js/config.js"></script>
    <script src="../public/vendor/emoji-picker/lib/js/util.js"></script>
    <script src="../public/vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="../public/vendor/emoji-picker/lib/js/emoji-picker.js"></script>

    <script>
        $(function() {
            // Initializes and creates emoji set from sprite sheet
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '../public/vendor/emoji-picker/lib/img/',
                popupButtonClasses: 'icon-smile'
            });

            window.emojiPicker.discover();
        });
    </script>
    <!-- LOAD MORE POSTS -->
    <script>
        $(document).ready(function() {
            let post_id = "<?php echo $_SESSION["post"]->id ?>";
            console.log(post_id);
            let commentsCount = 3;
            $("#load-comments-btn").click(function() {
                commentsCount = commentsCount + 3;
                $("#comments").load("load-more-comments.php", {
                    newCommentCount: commentsCount,
                    post_id: post_id
                });
            });
        });
    </script>
    <!-- END OF LOAD MORE POSTS -->
    <script>
        $(document).on("click", "#submit_comment", function(e) {
            e.preventDefault();

            var id = $("#comment_post_id").val();
            var name = $("#comment_user_name").val();
            var comment = $("#comment").val();
            var submit_comment = $("#submit_comment").val();

            $.ajax({
                url: "controllers/CommentController.php",
                type: "post",
                data: {
                    post_id: id,
                    user_name: name,
                    comment: comment,
                    submit_comment: submit_comment
                },
                success: function(data) {
                    if (true) {
                        $("#comments").load("new-comments.php");
                        $("#comment-form")[0].reset();
                        $("#comment").val("");
                    }
                }
            });
        });
    </script>
</body>

</html>