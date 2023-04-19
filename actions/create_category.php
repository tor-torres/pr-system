<?php

    if (isset($_POST['btn-submit'])) {
        // for the database
        $category = stripslashes($_POST['category']);

        if (empty($error)) {
            $select = "SELECT category FROM categorytable WHERE category = '$category' ";
            $result = $DB->query($select);
            $check = mysqli_num_rows($result);
                if($check > 0){
                    $_SESSION['status'] = "Cannot be Save! Data is already Exist.";
                    $_SESSION['status_code'] = "warning";
                }
                else{
            
                    $insert = "INSERT INTO categorytable SET category = '$category'";
                    
                    if($DB->query($insert)){
                        $_SESSION['message'] = "Added Successfully!";
                    } else {
                        $_SESSION['status'] = "404: ERROR in the Database";
                        $_SESSION['status_code'] = "error";
                    }
                }
        }
    }
