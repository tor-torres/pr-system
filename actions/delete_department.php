<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM departmenttable WHERE dept_id = $id");
    header("Location:" .SITE_URL . "/?page=department");
    $_SESSION['message'] = "Deleted Successfully!";
?>