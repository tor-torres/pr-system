<?php
    if(isset($_POST["action"])){
        $output = '';
        if($_POST["action"] == "category"){       
            $query = $DB->query (" SELECT * FROM itemtable WHERE cat_id = '".$_POST["query"]."' GROUP BY item_name ");
            $output .= '<option value="">Select Item</option>';
            while($row = mysqli_fetch_assoc($query)){
            $output .= '<option value="'.$row["item_name"].'">'.$row["item_name"].'</option>';
            }
        }
        if($_POST["action"] == "item_name"){
            $query = $DB->query (" SELECT * FROM itemtable WHERE item_name = '".$_POST["query"]."'");
            $output .= '<option value="">Select Unit</option>';
            while($row = mysqli_fetch_assoc($query)){
                $output .= '<option value="'.$row["unit"].'">'.$row["unit"].'</option>';
            }
        }
        if($_POST["action"] == "unit"){
            $query = $DB->query (" SELECT * FROM itemtable WHERE unit = '".$_POST["query"]."'");
            $output .= '<option value="">Cost</option>';
            while($row = mysqli_fetch_assoc($query)){
                $output .= '<option value="'.$row["cost"].'">'.$row["cost"].'</option>';
            }
        }
        echo $output;
    }