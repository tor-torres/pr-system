<?php
    
if (isset($_POST['btn-submit'])) {
    
    $dept_id = $_POST['dept_id'];
    $fullname = stripslashes($_POST['fullname']);
    $username = stripslashes($_POST['username']);
    
    if (empty($error)) {

        $update = "UPDATE users INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id SET users.dept_id = '$dept_id', users.fullname = '$fullname', users.username = '$username' WHERE users.id = '{$_SESSION[AUTH_ID]}' ";

        if($DB->query($update))
        {
            $_SESSION['status'] = "Updated Successfully!";
            $_SESSION['status_code'] = "success";
        }else{
            $_SESSION['status'] = "Error: 404";
            $_SESSION['status_code'] = "error";
        }     
    }
}
?>
