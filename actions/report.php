<?php

$id = $_GET['id'];

$query = $DB->query("SELECT * FROM pendingtable WHERE request_id = $id");

// Move the data to the approved table
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $request_id = $row['request_id'];
    $userID = $row['userID'];
    $cat_id = $row['cat_id'];
    $item_name = $row['item_name'];
    $unit = $row['unit'];
    $cost = $row['cost'];
    $quantity = $row['quantity'];
    $total_cost = $row['total_cost'];
    $created_at = $row['created_at'];

    // Insert the data into the approved table
    $insert = "INSERT INTO approvedtable SET request_id = '$request_id', userID = '$userID', cat_id = '$cat_id', item_name = '$item_name', unit = '$unit', cost = '$cost', quantity = '$quantity', total_cost = '$total_cost', created_at = '$created_at' ";

    if ($DB->query($insert)) {
        // Delete the data from the original table
        $delete = "DELETE FROM pendingtable WHERE request_id = $id";
        if ($DB->query($delete)) {
        $_SESSION['message'] = "Approved Success!";
        goto_pendinglist(); }
    } else {
        $_SESSION['status'] = "404: ERROR in the Database";
        $_SESSION['status_code'] = "error";
    }
}

?>
