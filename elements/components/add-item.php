<h3 class="card-title">
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
        <i class="fa fa-plus-circle"></i> Add</button>
</h3>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="action" value="create_item">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="category">Category:</label>
                                <select class="form-control text-capitalize" id="category" name="cat_id" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    $select = $DB->query("SELECT * FROM categorytable");
                                    if ($select->num_rows > 0) {
                                        while ($row = $select->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['category'] ?></option>
                                        <?php }
                                    } else { ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="item_name">Item Name:</label>
                                <input type="text" class="form-control text-capitalize" id="item_name" name="item_name"
                                    placeholder="Enter Item Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="cost">Cost:</label>
                                <input type="number" class="form-control" id="cost" name="cost"
                                    placeholder="Enter Item Cost" min="1" oninput="validity.valid || (value='1');"
                                    required>
                            </div>
                            <div class="col-lg-6">
                                <label for="unit">Unit:</label>
                                <input type="text" class="form-control" id="unit" name="unit" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times-circle"></i> Cancel
                                </button>
                                <button type="submit" name="btn-submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>