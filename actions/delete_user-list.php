<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM users WHERE id = $id");
    header("Location:" .SITE_URL . "/user-list");
    $_SESSION['message'] = "User deleted Successfully!";
?>