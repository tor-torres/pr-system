<?php

if (isset($_POST['btn-submit'])) {
    $id = $_GET['id'];
    $dept_id = $_POST['dept_id'];
    $fullname = stripslashes($_POST['fullname']);
    $username = stripslashes($_POST['username']);

    if (empty($error)) {
        $update = "UPDATE users INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id SET users.dept_id = '$dept_id', users.fullname = '$fullname', users.username = '$username' WHERE users.id = $id";
        if ($DB->query($update)) {
            $_SESSION['status'] = "Updated Successfully!";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "There was an error in updating";
            $_SESSION['status_code'] = "error";
        }
    }
}


?>