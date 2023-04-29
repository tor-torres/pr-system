<?php

if (isset($_POST['btn-submit'])) {
    // for the database
    $userID = stripslashes($_POST['userID']);
    $cat_id = stripslashes($_POST['cat_id']);
    $item_name = stripslashes($_POST['item_name']);
    $unit = stripslashes($_POST['unit']);
    $cost = stripslashes($_POST['cost']);
    $quantity = stripslashes($_POST['quantity']);
    $total_cost = stripslashes($_POST['total_cost']);
    $item_description = stripslashes($_POST['item_description']);
    $purpose = stripcslashes($_POST['purpose']);

    if (empty($error)) {

        $insert = "INSERT INTO pendingtable SET userID = '$userID', cat_id = '$cat_id', item_name = '$item_name', unit = '$unit', cost = '$cost', quantity = '$quantity', total_cost = '$total_cost', item_description = '$item_description', purpose = '$purpose' ";

        if ($DB->query($insert)) {
            $_SESSION['message'] = "Request Successfully!";
            goto_pendinglist();
        } else {
            $_SESSION['status'] = "404: ERROR in the Database";
            $_SESSION['status_code'] = "error";
        }

    }
}