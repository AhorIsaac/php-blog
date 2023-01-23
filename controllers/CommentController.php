<?php

session_start();

function __autoload($Class)
{
    require_once("../classes/$Class.php");
}

if (isset($_POST["submit_comment"])) {
    $post_id = $_POST["post_id"];
    $comment = $_POST["comment"];
    $name = $_POST["user_name"];

    $fields = [
        "post_comment" => $comment,
        "post_id" => $post_id,
        "name" => $name
    ];

    $comment = new Comment();
    $comment_on_post = $comment->store($fields);
    if ($comment_on_post) {
        return true;
    }
}
