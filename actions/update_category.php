<?php
    if (isset($_POST['btn-submit'])) {

    $category = stripslashes($_POST['category']);

    if (empty($error)) {
        // $result = $DB->query("SELECT category FROM categorytable WHERE category = '$category'");
        // $check = mysqli_num_rows($result);
        // if($check > 0)
        // {
        //     $_SESSION['status'] = "Can't Saved! Data is already exist.";
        //     $_SESSION['status_code'] = "warning";
        // }else{
            $update = " UPDATE categorytable SET category = '$category' WHERE cat_id = ".$_GET['id'];
            if($DB->query($update)){
                $_SESSION['status'] = "Updated Successfully!";
                $_SESSION['status_code'] = "success";
                return_category();
            }else{
                $_SESSION['status'] = "There was an error in updating";
                $_SESSION['status_code'] = "error";
            // }
        }
    }
}
