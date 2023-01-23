<?php

function __autoload($Class)
{
    require_once("../classes/$Class.php");
}

$new_comments_count = $_POST["newCommentCount"];
$post_id = $_POST["post_id"];

$comment = new Comment();
$comments = json_decode($comment->comments($post_id, $new_comments_count));

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