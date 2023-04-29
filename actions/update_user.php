<?php

if (isset($_POST['btn-submit'])) {

    $id = $_GET['id'];
    $dept_id = $_POST['dept_id'];
    $fullname = stripslashes($_POST['fullname']);
    $username = stripslashes($_POST['username']);

    if ($_FILES["avatar"]["error"] === 4) {
        $_SESSION['status'] = "ERROR: File does not exist!";
        $_SESSION['status_code'] = "error";
    } else {
        $file_name = $_FILES["avatar"]["name"];
        $file_size = $_FILES["avatar"]["size"];
        $tmp_name = $_FILES["avatar"]["tmp_name"];
        $valid_image_extension = ['jpg', 'jpeg', 'png'];
        $image_extension = explode(".", $file_name);
        $image_extension = strtolower(end($image_extension));

        if (!in_array($image_extension, $valid_image_extension)) {
            $_SESSION['status'] = "ERROR: Invalid Image Extension!";
            $_SESSION['status_code'] = "error";
        } else if ($file_size > 1000000) {
            $_SESSION['status'] = "Image size to large. Please select a file less than 1mb.";
            $_SESSION['status_code'] = "error";
        } else {
            $new_image_name = uniqid();
            $new_image_name .= "." . $image_extension;
            move_uploaded_file($tmp_name, "./assets/images/" . $new_image_name);
            $update = "UPDATE users INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id SET users.dept_id = '$dept_id', users.fullname = '$fullname', users.username = '$username', avatar = '$new_image_name' WHERE users.id = $id";

            if ($DB->query($update)) {
                $_SESSION['status'] = "Updated Successfully!";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "DATABASE ERROR : 404!";
                $_SESSION['status_code'] = "error";
            }
        }
    }
}

?>