<?php
//session_start();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top p-4 my-navbar shadow" id="navigation">
    <a href="#" class="navbar-brand text-dark p-4">
        <span class="site-logo">CB</span>
    </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon text-dark"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php"> About </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php"> Services </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog.php"> Blog </a>
            </li>
            <li class="nav-item ml-md-5 ml-lg-5">
                <a class="nav-link" href="create-blog-post.php">
                    Create Post
                </a>
            </li>
            <?php
            // session_start();
            if (isset($_SESSION['admin_name'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin-homepage.php">
                        Admin <i class="fa fa-home fa-1x"></i>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>