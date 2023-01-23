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
        #create-post-frame {
            border: 1px solid #17a2b8;
        }

        #create-post-frame input {
            font-family: Georgia, 'Times New Roman', Times, serif;
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
        <?php include('subscribe-modal.php'); ?>

        <div class="jumbotron container text-center mt-4 bg-white shadow" id="create-post-frame">
            <h3 class="course-heading m-2"> Create Blog Post </h3>
            <form action="../controllers/PostController.php" method="POST" id="post-form" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="post_title" class="col-form-label col-md-2 font-weight-bold">
                        Title
                    </label>
                    <div class="col-md-10">
                        <input type="text" name="post_title" class="form-control" placeholder="input your post title" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_msg" class="col-form-label col-md-2 font-weight-bold">
                        Post
                    </label>
                    <div class="col-md-10">
                        <textarea id="editor" name="post_msg" class="form-control" required>
                            </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_image" class="col-form-label col-md-2 font-weight-bold">
                        Post Image
                    </label>
                    <div class="col-md-10">
                        <input type="file" name="post_image" class="form-control" onchange="previewFile(this)" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_user_name" class="col-form-label col-md-2 font-weight-bold">
                        Your Name
                    </label>
                    <div class="col-md-6">
                        <input type="text" name="post_user_name" class="form-control" placeholder="input your name" />
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-info btn-md" name="create-post">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <img id="previewImg" alt="post image" style="max-width: 350px; 
                        max-height: 200px; 
                        margin-top: 4px; 
                        border-radius: 20px;" />
                </div>
            </div>
        </div>

        <?php require('footer-small.php'); ?>

    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/vendor/ckeditor/js/ckeditor.js"> </script>
    <script src="../public/vendor/ckeditor/js/sample.js"> </script>
    <script src="../public/vendor/ckeditor/js/sf.js"> </script>
    <script src="../public/vendor/ckeditor/js/styles.js"> </script>

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        initSample();
    </script>
</body>

</html>