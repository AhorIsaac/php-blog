<?php

session_start();

if (!$_SESSION["admin_name"]) {
    header("location: sign-in.php");
    exit();
}

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
    <link href="../public/css/main-style.css" type="text/css" rel="stylesheet">
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
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="text-center mb-2 mt-2">
            <h4 class="site-logo d-inline-block text-center">CB</h4>
        </div>

        <div class="text-center mt-3 mb-3">
            <a href="admin-homepage.php" class="btn btn-outline-dark">
                <i class="fa fa-arrow-left fa-1x"></i> Back
            </a>
        </div>

        <h3 class="course-heading text-center"> All Codeblog Subscribers </h3>

        <div class="jumbotron bg-light shadow mt-3 mb-2" style="border: 1px solid #17a2b8;">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="m-3 p-2"> ID </th>
                        <th class="m-2 p-2"> <i class="fa fa-envelope fa-1x"></i> Email </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                    }

                    $total_records_per_page = 5;
                    $offset = ($page_no - 1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $subscriber = new Subscriber();
                    $total = $subscriber->total();

                    $total_records = $total->total;
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $subs = $subscriber->limited_number_of_subscribers($offset, $total_records_per_page);

                    foreach ($subs as $subscriber) {
                        echo
                        "<tr>
                            <td>" . $subscriber->id . "</td>
                            <td>" . $subscriber->email . "</td>
                        </tr>";
                    }
                    $database = new Database();
                    $database->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
        </div>

        <ul class="pagination">
            <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
            ?>

            <li <?php if ($page_no <= 1) {
                    echo "class='disabled'";
                } ?>>
                <a <?php if ($page_no > 1) {
                        echo "href='?page_no=$previous_page'";
                    } ?> class='p-2'>Previous</a>
            </li>

            <?php
            if ($total_no_of_pages <= 10) {
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                        echo "<li class='active'><a class='p-2'>$counter</a></li>";
                    } else {
                        echo "<li><a href='?page_no=$counter' class='p-2'>$counter</a></li>";
                    }
                }
            } elseif ($total_no_of_pages > 10) {
                if ($page_no <= 4) {
                    for ($counter = 1; $counter < 8; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a class='p-2'>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter' class='p-2'>$counter</a></li>";
                        }
                    }
                    echo "<li><a class='p-2'>...</a></li>";
                    echo "<li><a href='?page_no=$second_last' class='p-2'>$second_last</a></li>";
                    echo "<li><a href='?page_no=$total_no_of_pages' class='p-2'>$total_no_of_pages</a></li>";
                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                    echo "<li><a href='?page_no=1' class='p-2'>1</a></li>";
                    echo "<li><a href='?page_no=2' class='p-2'>2</a></li>";
                    echo "<li><a class='p-2'>...</a></li>";
                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a class='p-2'>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter' class='p-2'>$counter</a></li>";
                        }
                    }

                    echo "<li><a class='p-2'>...</a></li>";
                    echo "<li><a href='?page_no=$second_last' class='p-2'>$second_last</a></li>";
                    echo "<li><a href='?page_no=$total_no_of_pages' class='p-2'>$total_no_of_pages</a></li>";
                } else {
                    echo "<li><a href='?page_no=1' class='p-2'>1</a></li>";
                    echo "<li><a href='?page_no=2' class='p-2'>2</a></li>";
                    echo "<li><a class='p-2'>...</a></li>";

                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a class='p-2'>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter' class='p-2'>$counter</a></li>";
                        }
                    }
                }
            }
            ?>

            <li <?php if ($page_no >= $total_no_of_pages) {
                    echo "class='disabled'";
                } ?>>
                <a <?php if ($page_no < $total_no_of_pages) {
                        echo "href='?page_no=$next_page'";
                    } ?> class='p-2'> Next </a>
            </li>
            <?php if ($page_no < $total_no_of_pages) {
                echo "<li><a href='?page_no=$total_no_of_pages' class='p-2'>Last &rsaquo;&rsaquo;</a></li>";
            }
            ?>
        </ul>

        <?php require("footer-small.php"); ?>
    </div>

    <script src="../public/scripts/jquery-3.3.1.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/fontawesome/js/all.js"> </script>
    <script src="../public/vendor/sidebar/main-5.js"> </script>
</body>

</html>