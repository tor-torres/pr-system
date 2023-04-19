<?php
    if (isset($_POST['btn-submit'])) {

    $cat_id = stripslashes($_POST['cat_id']);
    $item_name = stripslashes($_POST['item_name']);
    $cost = ($_POST['cost']);
    $unit = stripslashes($_POST['unit']);

    if (empty($error)) {
        $result = $DB->query(" SELECT item_name FROM itemtable WHERE item_name = '$item_name' ");
        $check = mysqli_num_rows($result);
        if($check > 0)
        {
            $_SESSION['status'] = "Can't Saved! Item is already exist.";
            $_SESSION['status_code'] = "warning";
        }else{

            $update = " UPDATE itemtable SET cat_id = '$cat_id', item_name = '$item_name', cost = '$cost', unit = '$unit' WHERE id = ".$_GET['id'];
            if($DB->query($update)){
                $_SESSION['status'] = "Updated Successfully!";
                $_SESSION['status_code'] = "success";
                return_itemlist();
            }else{
                $_SESSION['status'] = "There was an error in updating";
                $_SESSION['status_code'] = "error";
            }
        }
    }
}
