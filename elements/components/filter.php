<div class="form-group">
    <form method="post" class="d-flex justify-content-end">
        <select class="text-capitalize mr-3" name="cat_id" required>
            <option value="all" <?php if(isset($_POST['cat_id']) && $_POST['cat_id'] == 'all') { echo 'selected'; } ?>>All</option>
            <?php 
            $select = $DB->query("SELECT * FROM categorytable");
            if ($select->num_rows > 0) {
                while ($row = $select->fetch_assoc()) { ?>
                    <option value="<?php echo $row['cat_id']?>" <?php if(isset($_POST['cat_id']) && $_POST['cat_id'] == $row['cat_id']) { echo 'selected'; } ?>><?php echo $row['category']?></option>
                <?php  }
            } else { ?>
            <?php } ?>
        </select>
        <?php
            $selectedDate = isset($_POST['created_at']) ? $_POST['created_at'] : '';
            $select = $DB->query("SELECT created_at FROM approvedtable");
            $row = $select->fetch_object();
        ?>
        <input type="date" name="created_at" class="form-control" value="<?php echo $selectedDate ?>" required>
        <button type="submit" class="btn btn-primary mx-3" name="filter">Filter</button>
        <button type="submit" class="btn btn-success btn-sm" name="print" onclick="printPDF()">Print</button>
    </form>
</div>

<script>
    function printPDF() {
        // call the PHP script
        window.open("invoice", "_blank");
    }
</script>