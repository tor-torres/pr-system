<?php
    if (isset($_POST['btn-submit'])) {

    $requestedfullname = stripslashes($_POST['requestedfullname']);
    $requesteddesignation = stripslashes($_POST['requesteddesignation']);
    $approvedfullname = stripslashes($_POST['approvedfullname']);
    $approveddesignation = stripslashes($_POST['approveddesignation']);
    $purpose = stripslashes($_POST['purpose']);

    if (empty($error)) {
        $update = " UPDATE invoice SET requestedfullname = '$requestedfullname', requesteddesignation = '$requesteddesignation', approvedfullname = '$approvedfullname', approveddesignation = '$approveddesignation', purpose = '$purpose'  ";
        if($DB->query($update)){
            $_SESSION['status'] = "Updated Successfully!";
            $_SESSION['status_code'] = "success";
        }else{
            $_SESSION['status'] = "There was an error in updating";
            $_SESSION['status_code'] = "error";
        }
    }
}
