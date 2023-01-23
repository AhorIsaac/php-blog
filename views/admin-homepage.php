<?php

session_start();

if (!$_SESSION["admin_name"]) {
    header("location: sign-in.php");
    exit();
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
    <!-- <link href="../public/css/navbar.css" type="text/css" rel="stylesheet"> -->
    <link href="../public/css/main-style.css" type="text/css" rel="stylesheet">
    <link href="../public/vendor/ckeditor/css/samples.css" type="text/css" rel="stylesheet">
    <link href="../public/vendor/ckeditor/css/neo.css" type="text/css" rel="stylesheet">
    <link href="../public/vendor/sidebar/style-5.css" type='text/css' rel='stylesheet' />
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

        #admin_img {
            width: 140px;
            height: 140px;
            border-radius: 70px;
        }

        #logout_link {
            border-radius: 30px;
        }

        .wrapper li:hover {
            transform: translate(12px, 0px);
            transition: transform 400ms ease-in-out;
        }

        #admin_image {
            width: 280x;
            height: 280px;
            border-radius: 100px;
        }

        #eye-field {
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: none;
        }

        input[type="password"] {
            border-right: none;
        }

        #input_group {
            border-radius: 20px;
            border: 1px solid white;
        }

        #eye_frame {
            border-right: none;
            border-top: none;
            border-bottom: none;
            margin: none;
        }

        input[type="text"] {
            color: #17a2b8;
        }
    </style>
</head>

<body class="bg-light" onload="return show_admin_profile_frame();">
    <div class="">
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar" class="bg-info">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>

                <div class="p-4">

                    <div class="align-items-end text-center">
                        <img src="../public/storage/admins/<?php echo $_SESSION["admin_image"]; ?>" alt="" id="admin_img" />
                        <h6 class="m-2 mb-3 text-light"> <?php if (isset($_SESSION["admin_name"])) {
                                                                echo $_SESSION["admin_name"];
                                                            } ?> </h6>
                        <a href="admin-logout.php" id="logout_link" class="p-2 mt-2 btn btn-dark btn-sm shadow-lg border">
                            <i class="fa fa-power-off fa-1x"></i> Logout
                        </a>
                    </div>
                    <hr />

                    <div class="text-center">
                        <h4 class="site-logo d-inline-block text-center">CB</h4>
                    </div>

                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="index.php"><span class="fa fa-home mr-3"></span> Home</a>
                        </li>
                        <li>
                            <a href="about.php"><span class="fa fa-user mr-3"></span> About</a>
                        </li>
                        <li>
                            <a href="blog.php"><span class="fa fa-sticky-note mr-3"></span> Blog</a>
                        </li>
                        <!-- <li>
                        <a href="#" onclick="return show_top_post_frame();"><span class="fa fa-star mr-3"></span> Top Posts </a>
	                </li> -->
                        <li>
                            <a href="services.php"><span class="fa fa-cogs mr-3"></span> Services</a>
                        </li>
                        <li>
                            <a href="#" onclick="return show_admin_profile_frame();"> <span class="fa fa-user-tie fa-1x mr-3"></span> Profile </a>
                        </li>
                        <li>
                            <a href="#" onclick="return show_change_password_frame();">
                                <span class="fa fa-user-shield fa-1x mr-3"></span>
                                Change Password
                            </a>
                        </li>
                        <?php
                        if ($_SESSION["admin_role"] === "super_admin") {
                        ?>
                            <li>
                                <a href="#" onclick="return show_add_admin_frame();"><span class="fa fa-user-tie mr-3"></span>
                                    Add Administrator
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="subscribers.php" onclick="return show_sub_frame();"><span class="fa fa-users mr-3"></span>
                                Subscribers
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="return show_alert_sub_frame();"><span class="fa fa-location-arrow mr-3"></span>
                                Alert Subscribers
                            </a>
                        </li>
                        <li>
                            <a href="admins.php"><span class="fa fa-user-tie mr-3"></span>
                                Administrators
                            </a>
                        </li>

                    </ul>

                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5 text-center">
                <h2 class="mb-4"> CodeBlog Administrators <i class="fa fa-home fa-1x"></i> </h2>

                <div class="text-center mt-2 mb-2" style="font-family: monospace;">
                    <?php
                    if (isset($_SESSION['account_already_exist'])) {
                    ?>
                        <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold text-center">
                                <i class="fa fa-user-tie fa-1x"></i> <br />
                                Account Already Exist!
                            </h6>
                        </div>
                    <?php
                        unset($_SESSION['account_already_exist']);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['admin_reg_success'])) {
                    ?>
                        <div class='alert alert-success alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold">
                                <i class="fa fa-user-tie fa-1x"></i> <br />
                                <i class="fa fa-check-circle fa-1x"></i> Registration Successful!
                            </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['admin_reg_success']);
                    ?>

                    <?php
                    if (isset($_SESSION['img_error'])) {
                    ?>
                        <div class='alert alert-danger alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> Invalid <i class='fa fa-image fa-1x'></i> format </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['img_error']);
                    ?>

                    <?php
                    if (isset($_SESSION['account_update_success'])) {
                    ?>
                        <div class='alert alert-success alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold">
                                <i class="fa fa-user-tie fa-1x"></i> <br />
                                <i class="fa fa-check-circle fa-1x"></i> Account Successfully Updated!
                            </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['account_update_success']);
                    ?>

                    <?php
                    if (isset($_SESSION["different_passwords"])) {
                    ?>
                        <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold">
                                <i class="fa fa-key fa-1x"></i>
                                <i class="fa fa-plus-circle fa-1x"></i>
                                <i class="fa fa-lock fa-1x"></i>
                                <i class="fa fa-not-equal fa-1x"></i>
                                <i class="fa fa-lock-open fa-1x"></i>
                            </h6>
                            <p class='text-dark font-weight-bold'>
                                The two passwords do not match!
                            </p>
                        </div>
                    <?php
                        unset($_SESSION["different_passwords"]);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION["wrong_old_password"])) {
                    ?>
                        <div class='alert alert-danger alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold">
                                <i class="fa fa-key fa-1x"></i>
                                <i class="fa fa-plus-circle fa-1x"></i>
                                <i class="fa fa-lock fa-1x"></i>
                                <i class="fa fa-not-equal fa-1x"></i>
                                <i class="fa fa-lock-open fa-1x"></i>
                            </h6>
                            <p class='text-dark font-weight-bold'>
                                Wrong Old Password!
                            </p>
                        </div>
                    <?php
                        unset($_SESSION["wrong_old_password"]);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['change_password_success'])) {
                    ?>
                        <div class='alert alert-success alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold">
                                <i class="fa fa-user-shield fa-1x"></i> <br />
                                <i class="fa fa-check-circle fa-1x"></i> Password Successfully Updated!
                            </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['change_password_success']);
                    ?>

                    <?php
                    if (isset($_SESSION['alert_all_subscribers'])) {
                    ?>
                        <div class='alert alert-success alert-dismissible fade show d-inline-block' role="alert" id="msg_frame" style="font-family: monospace;">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold text-center">
                                <i class="fa fa-thumbs-up fa-1x"></i> <br />
                                <i class="fa fa-envelope fa-1x"></i> successfully sent to all subscribers!
                            </h6>
                        </div>
                    <?php
                        unset($_SESSION['alert_all_subscribers']);
                    }
                    ?>

                </div>


                <div class="jumbotron mt-3 bg-light shadow" style="border: 1px dotted #17a2b8;" id="admin_profile_frame">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-info text-center">
                                Admin Profile Information
                            </h4>
                            <p class="text-dark text-left">
                                Name : <?php echo $_SESSION["admin_name"] ?>
                            </p>
                            <br />
                            <p class="text-dark text-left">
                                Email : <?php echo $_SESSION["admin_email"]; ?>
                            </p>
                            <br />
                            <p class="text-dark text-left">
                                Role :
                                <?php if ($_SESSION["admin_role"] == "super_admin") {
                                    echo "Super Administrator";
                                } else {
                                    echo "Administrator";
                                }
                                ?>
                            </p>
                            <br />
                            <p class="text-dark text-left">
                                Status :
                                <?php if ($_SESSION["admin_status"] == 1) {
                                    echo "Active <i class='fa fa-check-circle fa-1x'></i>";
                                } else {
                                    echo "Inactive";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="../public/storage/admins/<?php echo $_SESSION["admin_image"] ?>" id="admin_image" alt="" />
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-info btn-md" style="border-radius: 20px;" onclick="return show_update_profile_frame();">
                        Update Profile
                    </a>
                </div>

                <!-- CHANGE PASSWORD FRAME -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="jumbotron  mt-3 bg-light shadow mb-2" style="border: 1px dotted #17a2b8; margin: auto;" id="change_password_frame">
                            <h3 class="text-dark text-center">
                                Change Your Password <i class="fa fa-user-shield fa-1x text-info"></i>
                            </h3>
                            <form action="../controllers/AdminController.php" method="POST">
                                <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />

                                <div class="form-group row m-3">
                                    <label for="old-password" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-key fa-1x"></i>
                                        Input Old Password
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group shadow rounded border">
                                            <input type="password" class="form-control" placeholder="input old password" name="old_password" id="password-field1" required>
                                            <div class="input-group-append" id="eye_frame">
                                                <span class="input-group-text bg-white" id="eye-field">
                                                    <i class='fa fa-eye-slash fa-1x' id="eye1" onclick="return viewPassword1()"> </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-3">
                                    <label for="new-password-1" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-lock fa-1x"></i>
                                        Input New Password
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group shadow rounded border">
                                            <input type="password" class="form-control" placeholder="input new password" name="new_password1" id="password-field2" required>
                                            <div class="input-group-append" id="eye_frame">
                                                <span class="input-group-text bg-white" id="eye-field">
                                                    <i class='fa fa-eye-slash fa-1x' id="eye2" onclick="return viewPassword2()"> </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-3">
                                    <label for="new-password-2" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-lock fa-1x"></i>
                                        Confirm New Password
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group shadow rounded border">
                                            <input type="password" class="form-control" placeholder="confirm new password" name="new_password2" id="password-field3" required>
                                            <div class="input-group-append" id="eye_frame">
                                                <span class="input-group-text bg-white" id="eye-field">
                                                    <i class='fa fa-eye-slash fa-1x' id="eye3" onclick="return viewPassword3()"> </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mr-2 mt-2 justify-content-center">
                                    <input type="reset" class="btn btn-outline-dark m-2" value='Reset' />
                                    <input type="submit" class="btn btn-outline-info m-2" name="change_password" value='Submit' />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END OF CHANGE PASSWORD FRAME -->

                <!-- ADD ADMIN FRAME -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="jumbotron  mt-3 bg-light shadow mb-2" style="border: 1px dotted #17a2b8; margin: auto;" id="add_admin_frame">
                            <h3 class="text-dark text-center">
                                Add Administrators <i class="fa fa-user-tie fa-1x text-info"></i>
                            </h3>
                            <form action="../controllers/AdminController.php" method="POST">
                                <div class="form-group row m-3">
                                    <label for="name" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-user fa-1x"></i>
                                        Name
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control border shadow rounded" placeholder="input username" name="name" required />
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="email" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-envelope fa-1x"></i>
                                        Email
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control  border shadow rounded" placeholder="someone@example.com" name="email" required />
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="phone" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-phone-square fa-1x"></i>
                                        Phone
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control  border shadow rounded" placeholder="input phone" name="phone" required />
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="role" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-user-tag fa-1x"></i>
                                        Role
                                    </label>
                                    <div class="col-md-9">
                                        <select name="role" class="form-control  border shadow rounded" required>
                                            <option value="admin" selected> Administrator </option>
                                            <option value="super_admin"> Super Administrator </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input-group mr-2 mt-2 justify-content-center">
                                    <input type="reset" class="btn btn-outline-dark m-2" value='Reset' />
                                    <input type="submit" class="btn btn-outline-info m-2" name="add_admin" value='Submit' />
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- END OF ADD ADMIN FRAME -->


                <!-- UPDATE PROFILE FRAME -->
                <div class="row justify-content-center" style="margin: auto;">
                    <div class="col-md-8 justify-content-center">
                        <div class="jumbotron  mt-3 bg-light shadow mb-2" style="border: 1px dotted #17a2b8; margin: auto;" id="update_profile_frame">
                            <h3 class="text-dark text-center">
                                Update Profile <i class="fa fa-user-tie fa-1x text-info"></i>
                            </h3>
                            <form action="../controllers/AdminController.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_SESSION["admin_id"] ?>" />
                                <div class="form-group row m-3">
                                    <label for="name" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-user fa-1x"></i>
                                        Name
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control border shadow rounded" name="name" value="<?php echo $_SESSION["admin_name"] ?>" required />
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="email" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-envelope fa-1x"></i>
                                        Email
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control  border shadow rounded" name="email" value="<?php echo $_SESSION["admin_email"] ?>" required />
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="phone" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-phone-square fa-1x"></i>
                                        Phone
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control  border shadow rounded" name="phone" required value="<?php echo $_SESSION["admin_phone"] ?>" />
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="status" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-check-circle fa-1x"></i>
                                        Status
                                    </label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control  border shadow rounded" required>
                                            <option value="1" selected> Active </option>
                                            <option value="0"> Inactive </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row m-3">
                                    <label for="image" class="col-form-label col-md-3 col-sm-1">
                                        <i class="fa fa-image fa-1x"></i>
                                        Image
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control  border shadow rounded" name="image" onchange="previewFile(this)" />
                                    </div>
                                </div>

                                <div class="input-group mr-2 mt-2 justify-content-center">
                                    <input type="reset" class="btn btn-outline-dark m-2" value='Reset' />
                                    <input type="submit" class="btn btn-outline-info m-2" name="update" value='Submit' />
                                </div>
                            </form>
                            <div class="border rounded">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img id="previewImg" alt="profile image" style="max-width: 350px; 
                                        max-height: 200px; 
                                        margin-top: 4px; 
                                        border-radius: 20px;" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END OF UPDATE PROFILE FRAME -->


                <!-- ALERT SUBSCRIBERS FRAME -->
                <div class="jumbotron  mt-3 bg-light shadow mb-2" style="border: 1px dotted #17a2b8; margin: auto;" id="alert_sub_frame">
                    <h3 class="text-dark text-center">
                        Alert Subscribers <i class="fa fa-location-arrow fa-1x text-info"></i>
                    </h3>
                    <form action="../controllers/SubscriberController.php" method="POST">
                        <div class="form-group row m-3">
                            <label for="title" class="col-form-label col-md-3 col-sm-1">
                                Title
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control border shadow rounded" placeholder="input title" name="title" required />
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label for="body" class="col-form-label col-md-3 col-sm-1">
                                Body
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control border shadow rounded" name="body" id="editor" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label for="email" class="col-form-label col-md-3 col-sm-1">
                                <i class="fa fa-envelope fa-1x"></i>
                                Email
                            </label>
                            <div class="col-md-9">
                                <input type="email" class="form-control  border shadow rounded" placeholder="codeblog@info.com" name="email" required />
                            </div>
                        </div>
                        <!-- <div class="form-group row m-3">
                            <label for="link" class="col-form-label col-md-3 col-sm-1">
                                <i class="fa fa-link fa-1x"></i>
                                Link
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control  border shadow rounded"  placeholder="" name="link" required/>
                            </div>
                        </div> -->
                        <!-- <div class="form-group row m-3">
                            <label for="file" class="col-form-label col-md-3 col-sm-1">
                                <i class="fa fa-file fa-1x"></i>
                                File
                            </label>
                            <div class="col-md-9">
                                <input type="file" class="form-control  border shadow rounded" placeholder="" name="file"/>
                            </div>
                        </div> -->

                        <div class="input-group mr-2 mt-2 justify-content-center">
                            <input type="reset" class="btn btn-outline-dark m-2" value='Reset' />
                            <input type="submit" class="btn btn-outline-info m-2" name="send_to_subscribers" value='Send Mail' />
                        </div>
                    </form>
                </div>

                <!-- END OF ALERT SUBSCRIBERS FRAME -->

                <!-- TOP POST FRAME -->
                <div class="jumbotron  mt-3 bg-light shadow mb-2" style="border: 1px dotted #17a2b8; margin: auto;" id="top_post_frame">
                </div>
                <!-- END OF TOP POST FRAME -->

                <!-- SUBSCRIBERS FRAME -->
                <div class="jumbotron  mt-3 bg-light shadow mb-2" style="border: 1px dotted #17a2b8; margin: auto;" id="sub_frame">
                </div>
                <!-- END OF SUBSCRIBERS FRAME -->

                <?php require('footer-small.php'); ?>
            </div>
        </div>
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
    <script src="../public/vendor/sidebar/main-5.js"> </script>

    <?php
    if (isset($_SESSION["admin_login_success"])) {
    ?>
        <script>
            swal("Welcome", "Administrator <?php echo $_SESSION["admin_name"]; ?>", "success", {
                button: "Thank you!",
            });
        </script>
    <?php
        unset($_SESSION["admin_login_success"]);
    }
    ?>

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
        function show_admin_profile_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "block";
            change_password_frame.style.display = "none";
            add_admin_frame.style.display = "none";
            sub_frame.style.display = "none";
            top_post_frame.style.display = "none"
            alert_sub_frame.style.display = "none";
            update_profile_frame.style.display = "none";
        }

        function show_change_password_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "none";
            change_password_frame.style.display = "block";
            add_admin_frame.style.display = "none";
            sub_frame.style.display = "none";
            top_post_frame.style.display = "none"
            alert_sub_frame.style.display = "none";
            update_profile_frame.style.display = "none";
        }

        function show_alert_sub_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "none";
            change_password_frame.style.display = "none";
            add_admin_frame.style.display = "none";
            sub_frame.style.display = "none";
            top_post_frame.style.display = "none";
            alert_sub_frame.style.display = "block";
            update_profile_frame.style.display = "none";
        }

        function show_add_admin_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "none";
            change_password_frame.style.display = "none";
            add_admin_frame.style.display = "block";
            sub_frame.style.display = "none";
            top_post_frame.style.display = "none";
            alert_sub_frame.style.display = "none";
            update_profile_frame.style.display = "none";
        }

        function show_sub_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "none";
            change_password_frame.style.display = "none";
            add_admin_frame.style.display = "none";
            sub_frame.style.display = "block";
            top_post_frame.style.display = "none";
            alert_sub_frame.style.display = "none";
            update_profile_frame.style.display = "none";
        }

        function show_top_post_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "none";
            change_password_frame.style.display = "none";
            add_admin_frame.style.display = "none";
            sub_frame.style.display = "none";
            top_post_frame.style.display = "block";
            alert_sub_frame.style.display = "none";
            update_profile_frame.style.display = "none";
        }

        function show_update_profile_frame() {
            var admin_profile_frame = document.getElementById("admin_profile_frame");
            var change_password_frame = document.getElementById("change_password_frame");
            var alert_sub_frame = document.getElementById("alert_sub_frame");
            var add_admin_frame = document.getElementById("add_admin_frame");
            var sub_frame = document.getElementById("sub_frame");
            var top_post_frame = document.getElementById("top_post_frame");
            var update_profile_frame = document.getElementById("update_profile_frame");

            admin_profile_frame.style.display = "none";
            change_password_frame.style.display = "none";
            add_admin_frame.style.display = "none";
            sub_frame.style.display = "none";
            top_post_frame.style.display = "none";
            alert_sub_frame.style.display = "none";
            update_profile_frame.style.display = "block";
        }
    </script>
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