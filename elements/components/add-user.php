<h3 class="card-title">
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
        <i class="fa fa-plus-circle"></i> Add</button>
</h3>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-12">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="action" value="create_user">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <label for="department">Department:</label>
                                <select class="form-control text-capitalize" id="dept_id" name="dept_id" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    $select = $DB->query("SELECT * FROM departmenttable");
                                    if ($select->num_rows > 0) {
                                        while ($row = $select->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['dept_id'] ?>"><?php echo $row['department'] ?>
                                            </option>
                                        <?php }
                                    } else { ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" class="form-control text-capitalize" id="fullname"
                                        name="fullname" placeholder="Enter Full Name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter Username" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <label for="usertype">Position:</label>
                                <select class="form-control" id="usertype" name="usertype" required>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
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