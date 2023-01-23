<?php

session_start();

function __autoload($Class)
{
    require_once("../classes/$Class.php");
}

if(isset($_POST['create-post']))
{
    $post_title = trim($_POST['post_title']);
    $post_msg = trim($_POST['post_msg']);
    $post_image = time() . '_' . $_FILES['post_image']['name'];

    $user_name = trim($_POST['post_user_name']);

    $post_image_target_dir = "../public/storage/images-post/";
    $post_image_target_file = $post_image_target_dir . basename($_FILES['post_image']['name']);
    $postImageFileType = strtolower(pathinfo($post_image_target_file, PATHINFO_EXTENSION));

    $fields = 
    [
        "post_title" => $post_title,
        "post_msg" => $post_msg,
        "post_image" => $post_image,
        "user_name" => $user_name,
    ];

    $extns = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array($postImageFileType, $extns))
    {
        move_uploaded_file($_FILES['post_image']['tmp_name'], $post_image_target_dir.$post_image);
        $post = new Post();
        $post->store($fields);
    }
    else
    {
        $_SESSION['img_error'] = TRUE;
        header('location: ../views/create-blog-post.php');
        exit();
    }
 
}


if(isset($_POST["get_post"]))
{
    $post_id = $_POST["post_id"];
    $post = new Post();
    $single_post = $post->show($post_id);

    if($single_post)
    {
        $_SESSION["post"] = $single_post;
        header('location: ../views/blog-single-post.php');
        exit();
    }
}

if(isset($_POST["delete_post"]))
{
    $post_id = $_POST["post_id"];
    $post = new Post();
    $delete = $post->delete($post_id);

    if($delete === TRUE)
    {
        $_SESSION["post_deleted"] = "Post Deleted Successfully!";
        header("location: ../views/blog.php");
        exit();
    }
}

if(isset($_POST["star_post"]))
{
    $post_id = $_POST["post_id"];
    $post = new Post();
    
    $current_post = $post->show($post_id);
    $current_star = $current_post->star;

    if($current_star == 5)
    {
        header("location: ../views/blog.php");
        exit();
    }
    else 
    {
        $new_star = (int)$current_star + 1;
        $star = $post->star($post_id, $new_star);
        
        if($star === TRUE)
        {
            $_SESSION["post_star"] = "Post <i class='fa fa-star fa-1x'></i> Successfully! ";
            header("location: ../views/blog.php");
            exit();
        }
    }
}
