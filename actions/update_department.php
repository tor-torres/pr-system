<?php
    if (isset($_POST['btn-submit'])) {

    $department = stripslashes($_POST['department']);

    if (empty($error)) {
        $result = $DB->query("SELECT department FROM departmenttable WHERE department = '$department'");
        $check = mysqli_num_rows($result);
        if($check > 0)
        {
            $_SESSION['status'] = "Can't Saved! Data is already exist.";
            $_SESSION['status_code'] = "warning";
        }else{
            $update = " UPDATE departmenttable SET department = '$department' WHERE id = ".$_GET['id'];
            if($DB->query($update)){
                $_SESSION['status'] = "Updated Successfully!";
                $_SESSION['status_code'] = "success";
                return_department();
            }else{
                $_SESSION['status'] = "There was an error in updating";
                $_SESSION['status_code'] = "error";
            }
        }
    }
}
