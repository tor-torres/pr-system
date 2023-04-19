<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
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
                                                                        <option value="<?php echo $row['dept_id']?>"><?php echo $row['department']?></option>
                                                                    <?php  }
                                                                    } else { ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col-lg-12">
                                                                <label for="fullname">Full Name:</label>
                                                                <input type="text" class="form-control text-capitalize" id="fullname" name="fullname" placeholder="Enter Full Name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <label for="username">Username:</label>
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <label for="password">Password:</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
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
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Position</th>
                                        <th>Account Status</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $DB->query("SELECT * FROM users INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            if($row['usertype'] === "user") : ?>
                                            <tr>
                                                <td class="text-capitalize"><?php echo $row['department'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['fullname'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['usertype'] ?></td>
                                                <?php if ($row['status'] == 1) : ?>
                                                    <td class="text-center">
                                                        <div class="label label-success text-success">Activated</div>
                                                    </td>
                                                <?php elseif ($row['status'] == 0) : ?>
                                                    <td class="text-center">
                                                        <div class="label label-warning update-default text-danger" data-id="<?php echo $row['status'] ?>">Not Activated</div>
                                                    </td>
                                                <?php endif; ?>
                                                <td class="text-center">
                                                    <a href="<?php echo SITE_URL ?>/edit-user&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a data="<?php echo $row['id']; ?>" class="status-check btn-sm btn
                                                        <?php echo ($row['status']) ? 'btn-warning' : 'btn-success' ?>" >
                                                        <?php echo ($row['status']) ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>' ?>
                                                    </a>
                                                    <a href="delete_user-list&id=<?php echo $row['id'] ?>&action=delete_user-list" class="btn btn-danger btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php  }
                                    } else { ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= element('footer'); ?>