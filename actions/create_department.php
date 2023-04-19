<?php

    if (isset($_POST['btn-submit'])) {
        // for the database
        $department = stripslashes($_POST['department']);

        if (empty($error)) {
            $select = "SELECT department FROM departmenttable WHERE department = '$department' ";
            $result = $DB->query($select);
            $check = mysqli_num_rows($result);
                if($check > 0){
                    $_SESSION['status'] = "Cannot be Save! Data is already Exist.";
                    $_SESSION['status_code'] = "warning";
                }
                else{
            
                    $insert = "INSERT INTO departmenttable SET department = '$department'";
                    
                    if($DB->query($insert)){
                        $_SESSION['message'] = "Added Successfully!";
                    } else {
                        $_SESSION['status'] = "There was an error in the Database";
                        $_SESSION['status_code'] = "error";
                    }
                }
        }
    }
