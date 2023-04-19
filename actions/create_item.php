<?php

    if (isset($_POST['btn-submit'])) {
        // for the database
        $cat_id = stripslashes($_POST['cat_id']);
        $item_name = stripslashes($_POST['item_name']);
        $cost = ($_POST['cost']);
        $unit = stripslashes($_POST['unit']);

        if (empty($error)) {
            $result = $DB->query(" SELECT item_name FROM itemtable WHERE item_name = '$item_name' ");
            $check = mysqli_num_rows($result);
                if($check > 0){
                    $_SESSION['status'] = "Cannot be Save! Item is already Exist.";
                    $_SESSION['status_code'] = "warning";
                }
                else{
                    $create = " INSERT INTO itemtable SET cat_id = '$cat_id', item_name = '$item_name', cost = '$cost', unit = '$unit' ";
                    
                    if($DB->query($create)){
                        $_SESSION['message'] = "Added Successfully!";
                    } else {
                        $_SESSION['status'] = "ERROR : 404 !";
                        $_SESSION['status_code'] = "error";
                    }
                }
        }
    }
