<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM itemtable WHERE id = $id");
    header("Location:" .SITE_URL . "/?page=item-list");
    $_SESSION['message'] = "Deleted Successfully!";
?>