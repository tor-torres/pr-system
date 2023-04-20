<h3 class="card-title">
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
        <i class="fa fa-plus-circle"></i> Add</button>
</h3>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="action" value="create_category">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <label for="category">Category:</label>
                                <input type="text" class="form-control text-capitalize" id="category" name="category"
                                    placeholder="Enter Category" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times-circle"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-success btn-sm" name="btn-submit">
                                    <i class="fas fa-plus-circle"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>