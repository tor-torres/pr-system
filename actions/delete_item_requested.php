<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM pendingtable WHERE request_id = $id");
    header("Location:" .SITE_URL . "/pending-list");
    $_SESSION['message'] = "Deleted Successfully!";
?>