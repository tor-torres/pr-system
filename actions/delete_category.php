<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM categorytable WHERE id = $id");
    header("Location:" .SITE_URL . "?page=category");
    $_SESSION['message'] = "Deleted Successfully!";
?>