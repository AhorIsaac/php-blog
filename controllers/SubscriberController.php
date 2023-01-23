<?php

session_start();

function __autoload($Class)
{
    require_once("../classes/$Class.php");
}

if (isset($_POST["subscribe_to_codeblog"])) {
    $email = $_POST["email"];
    $subscriber = new Subscriber();

    $already_exist = $subscriber->valid($email);
    if ($already_exist === TRUE) {
        $_SESSION["have_already_subscribed"] = TRUE;
        header("location: ../views/index.php");
        exit();
    }

    $fields =
        [
            "email" => $email
        ];

    $subscribe = $subscriber->store($fields);

    if ($subscribe === TRUE) {
        $receiver = $email;
        $sender = "codeblog@info.com";
        $title = "Subscription Successful!";
        $body = "You have successfully subscribed to CodeBlog. \n
                We will enable to send you latest updates, news and products in \n
                Technology. Make sure you visit CodeBlog on a daily base to know \n
                what is happening around you! \n
                Thank you!";
        $mail = new Mail();
        $mail->send($receiver, $sender, $title, $body);

        $_SESSION["subscription_success"] = tRUE;
        header("location: ../views/index.php");
        exit();
    }
}

if (isset($_POST["send_to_subscribers"])) {
    $title = $_POST["title"];
    $body = $_POST["body"];
    $email = $_POST["email"];

    $receiver = "";
    $sender = "$email";
    $title = "$title";
    $body = "$body";

    $mail = new Mail();

    $subscriber = new Subscriber();
    $subscribers = $subscriber->all();

    foreach ($subscribers as $subscriber) {
        $mail->send($subscriber->email, $sender, $title, $body);
    }

    $_SESSION["alert_all_subscribers"] = tRUE;
    header("location: ../views/admin-homepage.php");
    exit();
}
