<form method="post" class="d-flex justify-content-end">
    <select class="form-control text-capitalize mr-3" name="cat_id" id="category" required>
        <option value="select" <?php if (isset($_POST['cat_id']) && $_POST['cat_id'] == 'select') {
            echo 'selected';
        } ?>>--Select--</option>
        <?php
        $select = $DB->query("SELECT * FROM categorytable");
        if ($select->num_rows > 0) {
            while ($row = $select->fetch_assoc()) { ?>
                <option value="<?php echo $row['cat_id'] ?>" <?php if (isset($_POST['cat_id']) && $_POST['cat_id'] == $row['cat_id']) {
                    echo 'selected';
                } ?>><?php echo $row['category'] ?></option>
            <?php }
        } else { ?>
        <?php } ?>
    </select>
    <?php
    $selectedDate = isset($_POST['created_at']) ? $_POST['created_at'] : '';
    $selectedDate = (isset($_POST['cat_id']) && $_POST['cat_id'] == 'select') ? '' : $selectedDate;
    $select = $DB->query("SELECT created_at FROM approvedtable");
    $row = $select->fetch_object();
    ?>
    <input type="date" name="created_at" class="form-control" value="<?php echo $selectedDate ?>" required>
    <button type="submit" class="btn btn-primary mx-3" name="filter">Filter</button>
    <?php if(isset($_POST['filter']) && $_POST['cat_id'] !== 'select' ): ?>
    <button type="submit" class="btn btn-success" name="print" onclick="printPDF()">Print</button>
    <?php else: ?>
        <button type="submit" class="btn btn-success">Print</button>
    <?php endif; ?>
</form>

<script>
    function printPDF() {
        // call the PHP script
        window.open("invoice", "_blank");
    }
</script>