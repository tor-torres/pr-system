<?php

if (isset($_POST['btn-submit'])) {

    $id = $_GET['id'];
    $password = $_POST['password'];
    $password = crypt($_POST['password'], '$2a$10$'.bin2hex(random_bytes(22)));

    if (empty($error)) {

        $query = " UPDATE users SET password = '$password' WHERE id = '$id' ";

        if ($DB->query($query)) {
            $_SESSION['status'] = "Password Updated Successfully!";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "Eror: 404!";
            $_SESSION['status_code'] = "error";
        }
    }
}
