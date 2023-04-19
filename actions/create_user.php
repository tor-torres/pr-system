<?php

    if (isset($_POST['btn-submit'])) {
        // for the database
        $dept_id = stripslashes($_POST['dept_id']);
        $fullname = stripslashes($_POST['fullname']);
        $username = stripslashes($_POST['username']);
        $password = md5($_POST['password']);
        $usertype = stripslashes($_POST['usertype']);

        if (empty($error)) {
            $query = $DB->query(" SELECT username FROM users WHERE username = '$username' ");
            $check = mysqli_num_rows($query);
                if($check > 0){
                    $_SESSION['status'] = "Cannot be Save! username is already Exist.";
                    $_SESSION['status_code'] = "warning";  
                }else{
                    $create = " INSERT INTO users SET dept_id = '$dept_id', fullname = '$fullname', username = '$username', password = '$password', usertype = '$usertype' ";

                    if($DB->query($create)){
                        $_SESSION['message'] = "Added Successfully!";
                        return_userlist();
                    } else {
                        $_SESSION['status'] = "DATABASE ERROR : 404!";
                        $_SESSION['status_code'] = "error";
                    }
                }
        }
    }
?>