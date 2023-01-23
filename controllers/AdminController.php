<?php

session_start();


require_once("../classes/Administrator.php");

function checkIfEmpty($input)
{
    if (empty($input)) {
        $_SESSION['input_error'] = TRUE;
        header('location: ../views/sign-in.php');
        exit();
    }
}

function passwordMatch($pass1, $pass2)
{
    if ($pass1 === $pass2) {
        return TRUE;
    } else {
        return FALSE;
    }
}


if (isset($_POST["admin_login"])) {
    $email = $_POST["email"];
    $password = $_POST["password1"];

    checkIfEmpty($email);
    checkIfEmpty($password);

    $administrator = new Administrator();
    $validAdmin = $administrator->valid($email);
    if ($validAdmin === TRUE) {
        $admin  = new Administrator();
        $login = $admin->login($email, md5($password));

        if ($login === FALSE) {
            $_SESSION['wrong_password'] = TRUE;
            header("location: ../views/sign-in.php");
            exit();
        }
    } else {
        $_SESSION['invalid_user'] = TRUE;
        header('location: ../views/sign-in.php');
        exit();
    }
}

if (isset($_POST["add_admin"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];

    $fields =
        [
            "name" => $name,
            "email" => $email,
            "password" => md5($phone),
            "phone" => $phone,
            "role" => $role
        ];

    $administrator = new Administrator();
    $account_already_exist = $administrator->valid($email);

    if ($account_already_exist === TRUE) {
        $_SESSION["account_already_exist"] = TRUE;
        header("location: ../views/admin-homepage.php#add_admin_frame");
        exit();
    } else {
        $new_administrator = $administrator->store($fields);
    }
}

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $status = $_POST["status"];

    $image = $_FILES['image']['name'];

    if (($image != "") || ($image != null)) {
        $image_target_dir = "../public/storage/admins/";
        $image_target_file = $image_target_dir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($image_target_file, PATHINFO_EXTENSION));

        $extns = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageFileType, $extns)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $image_target_dir . $image);
            $fields =
                [
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone,
                    "status" => $status,
                    "image" => $image
                ];
            $administrator = new Administrator();
            $update = $administrator->update_with_image($fields, $id);

            if ($update === TRUE) {
                $new_credentials = $administrator->new_credentials($email);
            }
        } else {
            $_SESSION['img_error'] = TRUE;
            header('location: ../views/admin-homepage.php');
            exit();
        }
    } else {
        $fields =
            [
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "status" => $status
            ];

        $administrator = new Administrator();
        $update = $administrator->update_without_image($fields, $id);

        if ($update === TRUE) {
            $new_credentials = $administrator->new_credentials($email);
        }
    }
}

if (isset($_POST["change_password"])) {
    $id = $_POST["admin_id"];
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password1"];
    $confirm_new_password = $_POST["new_password2"];

    $do_passwords_match = passwordMatch($new_password, $confirm_new_password);
    if ($do_passwords_match === FALSE) {
        $_SESSION["different_passwords"] = TRUE;
        header("location: ../views/admin-homepage.php");
        exit();
    }

    $administrator = new Administrator();

    $protected_old_password = md5($old_password);
    $valid_old_password = $administrator->valid_old_password($protected_old_password, $id);

    if ($valid_old_password === FALSE) {
        $_SESSION["wrong_old_password"] = TRUE;
        header("location: ../views/admin-homepage.php");
        exit();
    }

    $encrypted_new_password = md5($confirm_new_password);
    $change_password = $administrator->change_password($encrypted_new_password, $id);

    if ($change_password === TRUE) {
        $_SESSION["change_password_success"] = TRUE;
        header("location: ../views/admin-homepage.php");
        exit();
    }
}
